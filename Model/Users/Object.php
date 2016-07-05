<?php

class Users_Object extends PHPProject_Database_Table_RowObject {

    public function __construct($data) {
        parent::__construct($data);
    }

    public function login($password, $new_user = false) {
        $return = new PHPProject_ReturnMessage();

        // checks if password have been provided
        if (!isset($password)) {
            $return->success = false;
            $return->message = "Please provide a password.";
            return $return;
        }

        // hashing it out (password)
        $hashed_password = md5($password);

        if($new_user) {
            $this->password = md5($this->password);
        }
      
        // see if the password is correct
        if ($hashed_password != $this->password) {
            $return->success = false;
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
