<?php

namespace Application\City;

use Siht\Validate;

class HandleIn extends \Siht\Handle {

    public function create(City $object) {
        Validate::expected($object->getName(), "Campo Nome Obrigatório")->isNotNull()->isNotEmpty();
    }

    public function update(City $object) {
        Validate::expected($object->getId(), "Campo ID Obrigatório")->isInteger()->isNotNull()->isNotEmpty();
        Validate::expected($object->getName(), "Campo Nome Obrigatório")->isNotNull()->isNotEmpty();
    }

    public function findById($id) {
        Validate::expected($id, "Campo ID Obrigatório")->isInteger()->isNotNull()->isNotEmpty();
    }

    public function remove($id) {
        Validate::expected($id, "Campo ID Obrigatório")->isInteger()->isNotNull()->isNotEmpty();
    }

}
