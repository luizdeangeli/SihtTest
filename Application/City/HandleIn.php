<?php

namespace Application\City;

use Siht\Validate;

class HandleIn extends \Siht\Handle {

    public function create(City $object) {
        Validate::expected($object->getName(), "Field Name Required")->isNotNull()->isNotEmpty();
    }

    public function update(City $object) {
        Validate::expected($object->getId(), "Field Id Required")->isInteger()->isNotNull()->isNotEmpty();
        Validate::expected($object->getName(), "Field Name Required")->isNotNull()->isNotEmpty();
    }

    public function findById($id) {
        Validate::expected($id, "Field Id Required")->isInteger()->isNotNull()->isNotEmpty();
    }

    public function remove($id) {
        Validate::expected($id, "Field Id Required")->isInteger()->isNotNull()->isNotEmpty();
    }

}
