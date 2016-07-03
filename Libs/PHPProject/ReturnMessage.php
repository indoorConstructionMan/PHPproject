<?php

class PHPProject_ReturnMessage extends PHPProject_Object {

    public function __construct($data = array(
        "success" => false,
        "message" => "",
        "data" => null
    )) {
        parent::__construct($data);
    }
}

