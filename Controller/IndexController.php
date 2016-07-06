<?php
//require_once("/Model/User.php");

class IndexController extends PHPProject_Controller {

    public function index_action()
    {
        // check if they are logged in or not
        if ($this->_is_logged_in()) {
            // they are logged in, redirect to chat controller
            $this->_redirect('','chat');
        } else {
            // they are NOT logged in, redirect them to the login page
            $this->_redirect('login');
        }
    }

    public function login_action()
    {
        $result = $this->_login_or_register(true, $_POST);
        $this->_generate_view_path(true, $result);
    }

    public function register_action()
    {
        
        $result = $this->_login_or_register(false, $_POST);
        $this->_generate_view_path(true, $result);
    }

    public function logout_action() 
    {
        // check if they are logged in already or not, redirect to login if they are not
        $this->_is_logged_in(null, 'login');
        
        session_start();

        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();

        // send them to the login page
        $this->_redirect('login');
    }
    
    protected function _login_or_register($is_login,$data)
    {
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
