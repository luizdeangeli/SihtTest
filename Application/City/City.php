<?php

namespace Application\City;

class City extends \Siht\Model implements \JsonSerializable {

    private $id;
    private $name;

    public function jsonSerialize() {
        return get_object_vars($this);
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

}
