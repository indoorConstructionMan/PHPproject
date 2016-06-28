<?php

class Table {
    public $table_name;
    public $primary_key = 'id';
    
    public function find_by_email($email) {
        $select = "SELECT * FROM " . $this->table_name . " WHERE email='" . mysql_real_escape_string($email) . "'";
        $result = mysql_query($select);
        $user = mysql_fetch_assoc($result);
        
        if ($user){
            return true;
        }
        return false;
    }
    
    public function get_all_rows()
    {
        $query = "SELECT * FROM `$this->table_name`";
        $result = mysql_query($query);
        $rows = mysql_fetch_assoc($result);
        
        return $rows;
    }
    
    public function find($id){
        echo "hey FIND";
        try {
        $id = (int)$id;
        $query = "SELECT * FROM `$this->table_name` WHERE `$this->primary_key` = $id";
        var_dump($query);
        $result = mysql_query($query);
        var_dump($result);
        $row = mysql_fetch_assoc($result);
        var_dump($row);
        var_dump(mysql_error());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        var_dump($row);
        return $row;
    }
    
    public function create($data = array()) {
        $return = false;
        $insert = "INSERT INTO `$this->table_name` ";
        $values = "VALUES (";
        $fields = "(";
        $length = count($data) - 1;
        foreach($data as $key => $value) {
            $value = mysql_real_escape_string($value);
            $fields .= $key;                       
            $values .= "'".$value."'"; 
            if($length){
                $values .= ",";
                $fields .= ",";
                $length--;
            }
        }
        $values .= ")";
        $fields .= ")";
        $insert .= $fields . ' ' . $values;
        echo $insert;
        $result = mysql_query($insert);
        var_dump($result);
        try {
        if ($result) {
            $id = mysql_insert_id();
            var_dump($id);
            if (!$id) {
                $return = false;
            } else {
                $return = $this->find($id);
            }
            
            var_dump($return);
        }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
        return $return;
    }
}
