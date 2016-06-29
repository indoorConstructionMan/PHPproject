<?php
//require_once("/Model/User.php");

class IndexController extends PHPProject_Controller {
    
    public static function index_action() 
    {
        if (isset($_POST['email'])) {
            if (isset($_POST['password_confirm'])) {
                //var_dump("register action");
                // someone is trying to register
                self::register_action();
            } else {
                // use is trying to login
                self::login_action();
            }
            
        } else {
            // show login form
            include('/View/index.php');
        }
        
    }

    public static function login_action() 
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user_model = new User();
        $result = $user_model->login($email, $password);
        if ($result['success']) {
            // @TODO populate the view
            // result doesn't exist
            $user = $result['user'];
            self::main_action();
        } else {     
            // @TODO populate another damn view
            echo "Login fail";
            include("/View/index.php");
        }
    }
    
    public static function register_action() 
    {
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
            self::main_action();
        } else {     
            // @TODO populate another damn view
            include("/View/index.php");
        }
    }
    
    public static function main_action()
    {
        include("/View/main.php");    
    }
    
}
