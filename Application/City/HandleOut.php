<?php

namespace Application\City;

class HandleOut extends \Siht\Handle {

    public function findById($response) {
        if (!$response)
            $this->exception("No records found!");

        return $response;
    }

    public function remove($response) {
        if (!$response)
            $this->exception("No records found!");

        return $response;
    }

}
