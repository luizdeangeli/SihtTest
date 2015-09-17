<?php

namespace Application\City;

class Factory extends \Siht\Factory {

    public function create(\stdClass $object) {
        $factory = new City();
        $factory->setName(isset($object->name) ? $object->name : FALSE);
        return $factory;
    }

    public function update(\stdClass $object) {
        $factory = new City();
        $factory->setId(isset($object->id) ? (int) $object->id : FALSE);
        $factory->setName(isset($object->name) ? $object->name : FALSE);
        return $factory;
    }

    public function findById($id) {
        return (int) $id;
    }

    public function remove($id) {
        return (int) $id;
    }

}
