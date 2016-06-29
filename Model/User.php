<?php

class User extends Table {
    public $table_name = 'users';
    protected $_object_class = "User_Object";
    protected $_set_class = "User_Set";
    
    public function find_by_email($email) {
        $select = "SELECT * FROM " . $this->table_name . " WHERE email='" . mysql_real_escape_string($email) . "'";
        $result = mysql_query($select);
        $user = mysql_fetch_assoc($result);
        
        if ($user){
            return true;
        }
        return false;
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
    
    public function login($email, $password, $from_register = false) {
        
        $return = array(
            "success" => false,
            "message" => "",
            "user" => null
        );
        
        // checks if email/password have been provided
        if (!isset($email) || !isset($password)) {
            $return["message"] = "Please provide an email and password.";
            return $return;
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $return["message"] = "Please provide a valid email address.";
            return $return;
        }
        
        // protection against sql injection
        $email = mysql_real_escape_string($email);
        $password = mysql_real_escape_string($password);
        // hashing it out (password)
        $password = md5($password);

        //sql query making sure email and password match table row 
        $query = sprintf("SELECT * from %s WHERE email='%s' and password='%s'", $this->table_name, $email, $password);
        // result from sql query stored in result
        $result = mysql_query($query);
        if (!$result) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }

        // user holds the associative array for the query
        $user = mysql_fetch_assoc($result);
        
        
        // if there is a user add success and user to return array, else error msg
        if ($user) {
           $return["success"] = true; 
           $return["user"] = $user; 
        } else {
            if ($from_register) {
                $return["message"] = "A user already exist with this email, please use another email address.";
            } else {
                $return["message"] = "We didn't recognize this email and password.";
            }
           
        }
        
        // return array
        return $return;
    }
}