<?php

class User_Object extends PHPProject_Object {

    public function __construct($data) {
        parent::__construct($data);
    }
    
    public function login($password) {
        $return = new PHPProject_ReturnMessage();
        
        // checks if password have been provided
        if (!isset($password)) {
            $return->message = "Please provide a password.";
            return $return;
        }
        
        // hashing it out (password)
        $hashed_password = md5($password);

        // see if the password is correct
        if ($hashed_password != $this->password) {
            $return->message = "Password or email provided is incorrect.";
            return $return;
        }
        
        // all good, log them in
        $return->data = $this;
        $return->success = true;
        $_SESSION['chatapp_user'] = $this;
        
        return $return;
    }
    
}

