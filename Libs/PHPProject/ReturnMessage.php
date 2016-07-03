<?php

class PHPProject_ReturnMessage {
    
    public $success = false;
    public $messsage = '';
    public $data = null;
    
    public function __construct($structure = null) {
        if (is_array($structure)) {
            foreach ($structure as $s => $v) {
                $this->$s = $v;
            }
        }
    }
}

