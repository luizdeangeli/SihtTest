<?php

namespace Application\City;

class HandleIn extends \Siht\Handle {

    public function create(User $object) {
        Validate::expected($object->getName(), "Campo Nome Obrigatório")->isNotNull()->isNotEmpty();
    }

    public function update(User $object) {
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
