<?php
// checks the url and redirects to appropriate controller action
switch ($_SERVER['REQUEST_URI']) {
    case "register":
        include("Controller/IndexController.php");
            Index_Controller::register_action();
        break;
    case "login":
        include("Controller/IndexController.php");
            Index_Controller::login_action();
        break;
    default:
        include("Controller/IndexController.php");
            Index_Controller::index_action();
        break;
}

