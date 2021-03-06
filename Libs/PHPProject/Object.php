<?php

class PHPProject_Object extends ArrayObject {

    protected $_data = array();

    public function __construct(array $data = array(), $params = null) {
        $this->populate($data);
        $this->init();
    }

    public function init() {
        //print_r($this);
    }

    /*
     * populate the object
     */

    public function populate(array $data) {
        foreach ($data as $key => $value) {
            // if this value is a string and the first and last values are { and }, treat as json
            $is_json = is_string($value) && '' != $value && ('{' == $value[0] && '}' == substr($value, -1));
            // check if it's a string value, if so, strip slashes out of it
            $this->_data[$key] = is_string($value) && !$is_json ? stripslashes($value) : $value;
        }
        //print_r($this);
        return $this;
    }

    /*
     * magic getter
     */

    public function __get($key) {

        if (!array_key_exists($key, $this->_data)) {
            throw new Exception("Property '$key' does not exist.");
        }

        return $this->_data[$key];
    }

    /*
     * magic setter
     */

    public function __set($key, $value) {
        /*if (!array_key_exists($key, $this->_data)) {
            throw new Exception("Column '$key' is not in the table.");
        }*/

        $this->_data[$key] = $value;
    }

    // array access method
    public function __isset($key) {
        return array_key_exists($key, $this->_data);
    }

    // array access method
    public function offsetExists($offset) {
        return $this->__isset($offset);
    }

    // array access method
    public function offsetGet($offset) {
        return $this->__get($offset);
    }

    // array access method
    public function offsetSet($offset, $value) {
        $this->__set($offset, $value);
    }

    // array access method
    public function offsetUnset($offset) {
        
    }

    /*
     * return as array
     */

    public function to_array() {
        return $this->_data;
    }

}
