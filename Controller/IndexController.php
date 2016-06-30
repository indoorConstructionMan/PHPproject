<?php
//require_once("/Model/User.php");

class IndexController extends PHPProject_Controller {
    
    public function index_action() 
    {
        $this->login_action();
        
        /*if (isset($_POST['email'])) {
            if (isset($_POST['password_confirm'])) {
                //var_dump("register action");
                // someone is trying to register
                $this->register_action();
            } else {
                // use is trying to login
                $this->login_action();
            }
            
        } else {
            // show login form
            $this->_generate_view_path(true);
        }*/
        
    }

    public function login_action() 
    {
        // are we logging in or viewing the form
        if (isset($_POST['email']) && isset($_POST['password'])) {
            // logging
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $user_model = new User();
            $result = $user_model->login($email, $password);
            if ($result['success']) {
                // @TODO populate the view
                // result doesn't exist
                $user = $result['user'];
                $this->index_action();
            } else {     
                // @TODO populate another damn view
                echo "Login fail";
                $this->login_action();
            }
            
        } else {
            // viewing the form
            $this->_generate_view_path(true);
        }
    }
    
    public function register_action() 
    {
        // are we registering or viewing the form
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            //sprintf("%s %s %s", $email, $password, $password_confirm);
            $user_model = new User();
            $result = $user_model->register($email, $password, $password_confirm);
            var_dump($result);
            if ($result['success']) {
                // @TODO populate the view
                $user = $result['user'];
                //var_dump($user);
                $this->index_action();
            } else {     
                echo "Register fail";
                $this->register_action();
            }
        } else {
            // viewing the form
            $this->_generate_view_path(true);
        }
        
    }
    
    public function main_action()
    {
        $this->_generate_view_path(true);    
    }
    
}
