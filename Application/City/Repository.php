<?php

namespace Application\City;

class Repository extends \Siht\Repository {

    public function __construct() {
        
    }

    public function findAll() {
        $fetchs = array();
        return $fetchs;
    }

    public function findById($id) {
        if ($fetch = $this->sql->prepare($sql)->value(":id", $id)->execute()->fetch()) {
            $city = new City();
            $city->setId($fetch->id);
            $city->setName($fetch->name);
            $city->setEmail($fetch->email);
            $city->setActive($fetch->active);
            return $city;
        } else {
            return false;
        }
    }

    public function create(City $city) {

        $id = $this->sql->insert("City")
                        ->value("name", $city->getName())
                        ->value("email", $city->getEmail())
                        ->value("password", $city->getPassword())
                        ->value("active", $city->getActive())
                        ->execute()->lastInsertId();
        return $this->findById($id);
    }

    public function update(City $city) {
        $this->sql->update("City")
                ->value("name", $city->getName())
                ->value("email", $city->getEmail())
                ->valueIf("password", $city->getPassword(), trim($city->getPassword()))
                ->value("active", $city->getActive())
                ->where("id", "=", $city->getId())
                ->execute();

        return $this->findById($city->getId());
    }

    public function remove($id) {
        return $this->sql->delete()->from("City")->where("id", "=", $id)->execute()->rowCount() == 1;
    }

}
