<?php

namespace Application\City;

class Repository extends \Siht\Repository {

    private $pdo;

    public function __construct() {
        if ($this->pdo = new \PDO('sqlite:mysqlitedb.db')) {
            $sql = "CREATE TABLE city (id INTEGER PRIMARY KEY AUTOINCREMENT, name varchar(100));";
            $this->pdo->query($sql);
        } else {
            die($sqliteerror);
        }
    }

    public function findAll() {
        $fetchs = array();

        $sql = "SELECT id, name FROM city";
        $result = $this->pdo->prepare($sql);
        $result->execute();

        while ($fetch = $result->fetch(\PDO::FETCH_OBJ)) {
            $city = new City();
            $city->setId($fetch->id);
            $city->setName($fetch->name);
            $fetchs[] = $city;
        }

        return $fetchs;
    }

    public function findById($id) {
        $sql = "SELECT id, name FROM city WHERE id=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":id", $id, \PDO::PARAM_INT);
        $result->execute();

        if ($fetch = $result->fetch(\PDO::FETCH_OBJ)) {
            $city = new City();
            $city->setId($fetch->id);
            $city->setName($fetch->name);
            return $city;
        } else {
            return false;
        }
    }

    public function create(City $city) {

        $sql = "INSERT INTO city(name) VALUES(:name)";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":name", $city->getName(), \PDO::PARAM_STR);
        $result->execute();

        $id = $this->pdo->lastInsertId();

        return $this->findById($id);
    }

    public function update(City $city) {
        $sql = "UPDATE city SET name=:name WHERE id=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":id", $city->getId());
        $result->bindValue(":name", $city->getName());
        $result->execute();

        return $this->findById($city->getId());
    }

    public function remove($id) {
        $sql = "DELETE FROM city WHERE id=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":id", $id);
        $result->execute();

        return $result->rowCount() == 1;
    }

}
