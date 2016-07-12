<?php

//require_once("/Model/User.php");

class IndexController extends PHPProject_Controller {

    public function index_action() {
        // check if they are logged in or not
        if ($this->_is_logged_in()) {
            // they are logged in, redirect to chat controller
            $this->_redirect('', 'chat');
        } else {
            // they are NOT logged in, redirect them to the login page
            $this->_redirect('login');
        }
    }

    // Good portion of this was found here: http://www.w3schools.com/php/php_file_upload.asp
    public function edit_user_action() {
        //var_dump($_FILES["fileToUpload"]["name"]);
        //var_dump($_POST["submit"]);
       
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $user_model = new Users();
            $user_model->save_avatar($_FILES["fileToUpload"]);
            
            $this->_generate_view_path(true);
            //$this->_redirect('', 'chat');
        } else {
            $this->_generate_view_path(true);
        }
        return;
    }

    public function login_action() {
        $result = $this->_login_or_register(true, $_POST);
        $this->_generate_view_path(true, $result);
    }

    public function register_action() {
        $result = $this->_login_or_register(false, $_POST);
        $this->_generate_view_path(true, $result);
    }

    public function guest_login_action() {
        $user_model = new Users();
        $guest_data = $user_model->setup_guest_data();

        $guest = new Users_Object($guest_data);
        if ($guest->save()->success) {
            if ($guest->login('', true)->success) {
                $this->_redirect('', 'chat');
                return;
            } else {
                var_dump('Login failed.');
            }
        }
    }

    public function logout_action() {
        // check if they are logged in already or not, redirect to login if they are not
        $this->_is_logged_in(null, 'login');

        session_start();

        $_SESSION['chatapp_user']->is_online = False;
        $_SESSION['chatapp_user']->update();

        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();



        // send them to the login page
        $this->_redirect('login');
    }

    protected function _login_or_register($is_login) {
        // check if they are logged in already or not, redirect to index if they are
        $this->_is_logged_in('');

        // are we registering or viewing the form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_model = new Users();

            if ($is_login) {
                $result = $user_model->login_user($_POST);
            } else {
                $result = $user_model->register_user($_POST);
            }

            if ($result->success) {
                $this->_redirect();
                return;
            }

            return $result;
        } else {
            return null;
        }
    }

}
