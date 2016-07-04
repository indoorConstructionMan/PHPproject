<?php

class User extends PHPProject_Database_Table {
    public $table_name = 'users';
    protected $_object_class = "User_Object";
    protected $_set_class = "User_Set";
    
    public function find_user($value, $using = 'id') {
        $select = "SELECT * FROM `" . $this->table_name . "` WHERE `" . $using . "` = '" . mysql_real_escape_string($value) . "'";
        $result = mysql_query($select);
        $user = mysql_fetch_assoc($result);

        if ($user) {
            $user = new User_Object($user);
        }
        return $user;
    }
    
    public function find_by_email($email) {
        
        $user = $this->find_user($email, 'email');
        
        if ($user){
            return new PHPProject_ReturnMessage(array(
                'success' => true,
                'data' => $user
            ));
        } else {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "Incorrect email address or password."
            ));
        }
    }
    
    public function find_by_username($username) {
        
        $user = $this->find_user($username, 'username');
        if ($user){
            return new PHPProject_ReturnMessage(array(
                'success' => true,
                'data' => $user
            ));
        } else {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "Incorrect username or password."
            ));
        }
    }
    
    public function register($email, $password, $password_confirm) {
        $return = array(
            "success" => false,
            "message" => "",
            "user" => null
        );
        
        // checks if email/password have been provided
        if (!isset($email) || !isset($password) || !isset($password_confirm)) {
            $return["message"] = "Please provide an email and password.";
            return $return;
        }
        if($password != $password_confirm) {
            $return["message"] = "Passwords don't match.";
            return $return;
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $return["message"] = "Please provide a valid email address.";
            return $return;
        }
        
        //if user is true, there already exist a row, so sign in with that user
        $user = $this->find_by_email($email);
        if ($user) {
            return $this->login($email, $password, true);
        }
        //if not, just create the row in the database
        $user = $this->create(array(
            "email" => $email,
            "password" => md5($password)
        ));
        var_dump($user);
        if ($user) {
            $return['user'] = $user;   
            $result['success'] = true;
        }

        return $return;
        
        
        
    }
}