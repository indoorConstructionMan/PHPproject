<?php

class PHPProject_ReturnMessage extends PHPProject_Object {
    
    public $success = false;
    public $messsage = '';
    public $data = null;
    
    public function __construct($data) {
        parent::__construct($data);
    }
}

