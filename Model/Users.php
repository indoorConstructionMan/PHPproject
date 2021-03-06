<?php

class Users extends PHPProject_Database_Table {

    protected $_object_class = "Users_Object";
    protected $_set_class = "User_Set";

    public function find_user($value, $using = 'id') {
        $select = "SELECT * FROM `" . $this->table_name . "` WHERE `" . $using . "` = '" . mysql_real_escape_string(stripslashes($value)) . "'";
        $result = mysql_query($select);
        $user = mysql_fetch_assoc($result);

        if ($user) {
            $user = new Users_Object($user);
        }
        return $user;
    }

    public function setup_guest_data() {
        // User_Object constructor data
        $guest_data = array();

        // Determine the highest value in database, add one to value.
        $number = $this->find_max();
        $number += 1;

        // Assign values for database 
        $guest_data['id'] = null;
        $guest_data['username'] = "guest_" . $number;
        $guest_data['email'] = "guest@" . $number . ".com";
        $guest_data['password'] = "";
        $guest_data['is_online'] = False;

        return $guest_data;
    }

    public function find_by($value) {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            // check for email
            $result = $this->find_by_email($value);
        } else {
            // check for username
            $result = $this->find_by_username($value);
        }

        return $result;
    }

    public function find_by_email($email) {

        $user = $this->find_user($email, 'email');

        if ($user) {
            return new PHPProject_ReturnMessage(array(
                'success' => true,
                'message' => "",
                'data' => $user
            ));
        } else {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "incorrect email address or password",
                'data' => null
            ));
        }
    }

    public function find_by_username($username) {

        $user = $this->find_user($username, 'username');
        if ($user) {
            return new PHPProject_ReturnMessage(array(
                'success' => true,
                'message' => "",
                'data' => $user
            ));
        } else {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "incorrect username or password",
                'data' => null
            ));
        }
    }

    public function update_user_profile($file, $post_variables) {
        
        // check to see if new password should be changed
        $assign_new_password = false;
        $password_valid = false;
        
        // Ain't nobody care about this key val pair, unset it.
        unset($post_variables['submit']);
        
        // The famous returnMessage woot
        $return = new PHPProject_ReturnMessage(array(
            'success' => false,
            'message' => "",
            'data' => array()
        ));

        // Filtering through all fields, and assigning the ones needed in db.
        $post_variables['email'] = filter_var($post_variables['email'], FILTER_SANITIZE_EMAIL);
        $post_variables['password'] = filter_var($post_variables['password'], FILTER_SANITIZE_STRING);
        $post_variables['username'] = filter_var($post_variables['username'], FILTER_SANITIZE_STRING);
        $post_variables['is_online'] = true;
        $post_variables['avatar_abs_path'] = null;
        
        $old_avatar_location = $_SESSION['chatapp_user']->avatar_abs_path;
        

        // Validation of email field
        if (!filter_var($post_variables['email'], FILTER_VALIDATE_EMAIL)) {
            $return['message'] = "email invalid.";
            $return['success'] = false;
            return $return;
        }

        // Check to see if the new_password and new_password_confirm has been set.
        if (!($post_variables['new_password'] == "" || $post_variables['new_password_confirm'] == "")) {
            
            $post_variables['new_password_confirm'] = filter_var($post_variables['new_password_confirm'], FILTER_SANITIZE_STRING);
            $post_variables['new_password'] = filter_var($post_variables['new_password'], FILTER_SANITIZE_STRING);

            // Makes sure that password and password_confirm are both the same.
            if (!strcmp($post_variables['new_password'], $post_variables['new_password_confirm'])) {
                $assign_new_password = true;
                $return['success'] = true;
            } else {
                $return['message'] = "new_password != new_password_confirm";
                $return['success'] = false;
                return $return;
            }
        }
        
        // Checks to make sure password is between 3-20 characters
        if (strlen($post_variables['username']) < 3 || strlen($post_variables['username']) > 20) {
            $return['message'] = 'username length must be between 3 and 20 characters';
            $return['success'] = false;
            return $return;
        }

        $save_ok = PHPProject_FileInputOutput::save_file($file);
        if($save_ok->success) {
            $post_variables['avatar_abs_path'] = $GLOBALS['config']['target_dir'] . $file['name']; 
        } else {
            $post_variables['avatar_abs_path'] = $old_avatar_location;
        }
        
        
        if ($_SESSION['chatapp_user']->check_password($post_variables['password'])->success) {
            $password_valid = true;
        } else {
            $return->message = "password invalid.";
            $return['success'] = false;
            return $return;
         }
        
        if($assign_new_password) {
            $post_variables['password'] = md5($post_variables['new_password']);
        } else {
            $post_variables['password'] = md5($post_variables['password']);
        }

        unset($post_variables['new_password']);
        unset($post_variables['new_password_confirm']);
        
        if ($password_valid) {
            
            $_SESSION['chatapp_user']->merge_data($post_variables);
            $ret = $_SESSION['chatapp_user']->update();
             
            if ($ret->success) {
                $return['success'] = true;
            } else {
                $return['message'] = "Failure to update.";
            }
            
        } else {
            $return->message = "passwords did not match.";
        }
        return $return;
    }

    public function get_online_users() {
        $query = "SELECT * FROM `$this->table_name` WHERE `is_online` = 1;";
        $users = $this->set_query($query);
        return $users;
    }

    public function login_user($data) {
        // sanitization
        if (isset($data['email']) && isset($data['password'])) {

            $data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
            $data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
        } else {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "please provide a email or username and a password",
                'data' => $data
            ));
        }

        // try to find a user associated with the email or username provided
        $find_result = $this->find_by($data['email']);

        // check if we found a user
        if ($find_result->success && $find_result->data instanceof Users_Object) {
            // if we did, try to log them in using the password provided
            $login_result = $find_result->data->login($data['password']);
            if ($login_result->success) {
                // they are now logged in
                return $login_result;
            } else {
                // they failed to login
                $login_result->data = $data;
                return $login_result;
            }
        } else {
            // we failed to find a user with their email
            $find_result->data = $data;
            return $find_result;
        }
    }

    public function register_user($data) {

        // makes sure all fields have been set, and grabs and sanitizes them.
        if (isset($data['email']) && isset($data['username']) &&
                isset($data['password']) && isset($data['password_confirm'])) {

            $data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
            $data['username'] = filter_var($data['username'], FILTER_SANITIZE_STRING);
            $data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
            $data['password_confirm'] = filter_var($data['password_confirm'], FILTER_SANITIZE_STRING);
            $data['is_online'] = FALSE;
            $data['avatar_abs_path'] = null;
        } else {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "all fields need a valid entry",
                'data' => $data
            ));
        }

        // Validation of email field
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "email invalid.",
                'data' => $data
            ));
        }

        // Checks to make sure password is between 3-20 characters
        if (strlen($data['username']) < 3 || strlen($data['username']) > 20) {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "username length must be between 3 and 20 characters",
                'data' => $data
            ));
        }

        // Makes sure that password and password_confirm are both the same.
        if (strcmp($data['password'], $data['password_confirm'])) {
            return new PHPProject_ReturnMessage(array(
                'success' => false,
                'message' => "passwords don't match",
                'data' => $data
            ));
        }

        unset($data['password_confirm']);

        // All data has been validated/sanitized. Now check if user exists.
        $find_result = $this->find_by_email($data['email']);

        if ($find_result->success && $find_result->data instanceof Users_Object) {
            $login_result = $find_result->data->login($data['password']);

            if ($login_result->success) {
                return $login_result;
            } else {
                return new PHPProject_ReturnMessage(array(
                    'success' => false,
                    'message' => "this email address is already in use",
                    'data' => $data
                ));
            }
        } else {

            // check if the username is already in use
            $find_result = $this->find_by_username($data['username']);

            if ($find_result->success && $find_result->data instanceof Users_Object) {
                return new PHPProject_ReturnMessage(array(
                    'success' => false,
                    'message' => "this username is already in use",
                    'data' => $data
                ));
            }

            $user = new Users_Object($data);
            $save_result = $user->save();
            if ($save_result->success) {
                $login_result = $user->login($data['password'], true);

                if ($login_result->success) {
                    return $login_result;
                } else {
                    return new PHPProject_ReturnMessage(array(
                        'success' => false,
                        'message' => "there was a problem logging you in, please try logging in manually",
                        'data' => $data
                    ));
                }
            } else {
                return new PHPProject_ReturnMessage(array(
                    'success' => false,
                    'message' => "database error! Users' table.",
                    'data' => $data
                ));
            }
        }
    }

}
