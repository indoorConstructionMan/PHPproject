<?php

class PHPProject_Database_Table_RowObject extends PHPProject_Object {

    public function __construct() {
        parent::__construct();
    }
    
    public function save() {
        $query = "INSERT INTO ". $this->get_table_name();
        foreach ($this->to_array() as $key => $value) {
            var_dump($key, $value);
        }
        var_dump($this->_data);
        $query .= " (email, password, username) VALUES ( ";
       
        $query .= " );";
        var_dump($query);
    }

    public function get_table_name() {
        $extracted_table_name = get_class($this);
        
        return $extracted_table_name;
    }


}