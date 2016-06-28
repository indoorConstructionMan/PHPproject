<?php

trait PHPProject_CamelCaseSupport {
    
    public function __call($name, $args) {
        if (property_exists(get_class(), $name)) {
            if (! empty($args)) {
                //set a value
                $this->$name = $args[0];
                return $this;
            } else {
                return $this->$name;
            }
        } else {
            $results = array();
            preg_match_all('/[A-Z][^A-Z]*/',ucfirst($name),$results);
            $method_string = implode('_',$results[0]);
            $method_string = strtolower($method_string);
            call_user_method_array($method_string, $this, $args);
        }
    }
    
}

