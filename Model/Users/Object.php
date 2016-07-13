<?php

class Users_Object extends PHPProject_Database_Table_RowObject {

    public function __construct($data) {
        parent::__construct($data);
    }

    public function login($password, $new_user = false) {

        $return = $this->check_password($password, $new_user);

        // Update database
        $this->is_online = TRUE;
        $this->update();

        // all good, log them in
        $return->data = $this;
        $return->success = true;
        $_SESSION['chatapp_user'] = $this;

        return $return;
    }

    public function check_password($password, $new_user = false) {

        $return = new PHPProject_ReturnMessage(array(
            "success" => false,
            "message" => "",
            "data" => array()
        ));

        // checks if password have been provided
        if (!isset($password)) {
            $return->message = "Please provide a password.";
            $return->success = false;
        } 
        
        if ($new_user) {
            $this->password = md5($this->password);
        }

        var_dump($this->password);
        var_dump($password);
        
        // see if the password is correct
        if ($password != $this->password) {
            $return->message = "Password or email provided is incorrect.";
            $return->success = false;
        } else {
            $return->success = true;
        }
        return $return;
    }
    
    public function merge_data($data = array()) {
        $this->_data = array_merge($this->_data, $data);
    }

}
