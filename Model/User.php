<?php

class User extends PHPProject_Database_Table {
    public $table_name = 'users';
    protected $_object_class = "User_Object";
    protected $_set_class = "User_Set";

    public function find_user($value, $using = 'id') {
        $select = "SELECT * FROM `" . $this->table_name . "` WHERE `" . $using . "` = '" . mysql_real_escape_string(stripslashes($value)) . "'";
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

    public function register($data) {

        // makes sure all fields have been set, and grabs and sanitizes them.
        if(isset($data['email']) && isset($data['username']) &&
           isset($data['password']) && isset($data['password_confirm'])){

            $data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
            $data['username'] = filter_var($data['username'], FILTER_SANITIZE_STRING);
            $data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
            $data['password_confirm'] = filter_var($data['password_confirm'], FILTER_SANITIZE_STRING);

        }

        // Validation of email field
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "Email invalid."
            ));
        }

        // Checks to make sure password is between 3-20 characters
        if(strlen($data['username']) < 3 || strlen($data['username']) > 20) {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "Username length must be between 3 and 20 characters."
            ));
        }
        
        // Makes sure that password and password_confirm are both the same.
        if(strcmp($data['password'], $data['password_confirm'])) {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "Passwords don't match."
            ));
        }
        
        unset($data['password_confirm']);
        

        // All data has been validated/sanitized. Now check if user exists.
        $result = $this->find_by_email($data['email']);

        if($result->success && $result->data instanceof User_Object) {
            $result = $result->data->login($data['$password']);

            if(!$result->success) {
                return new PHPProject_ReturnMessage(array(
                    'success' => false,
                    'message' => "This email address is already in use."
                ));
            }
        } else {
            $user = new User_Object($data);
            
            $save_result = $user->save();
            
            if($save_result->success) {
                $login_result = $user->login();
                if($login_result->success) {
                    return new PHPProject_ReturnMessage(array(
                        'success' => true,
                        'message' => ""
                    ));
                }
            } else {

                return new PHPProject_ReturnMessage(array(
                    'success' => false,
                    'message' => "Database error!"
                ));
            }
        }
    }
}
