<?php

namespace Application\City;

class HandleOut extends \Siht\Handle {

    public function findById($response) {
        if (!$response)
            $this->exception("Registro não encontrado!");

        return $response;
    }

    public function remove($response) {
        if (!$response)
            $this->exception("Registro não encontrado!");

        return $response;
    }

}
