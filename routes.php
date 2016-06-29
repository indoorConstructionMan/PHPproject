<?php
// checks the url and redirects to appropriate controller action
switch ($_SERVER['REQUEST_URI']) {
    case "register":
        //include("Controller/IndexController.php");
        IndexController::register_action();
        break;
    case "login":
        //include("Controller/IndexController.php");
        IndexController::login_action();
        break;
    default:
        //include("Controller/IndexController.php");
        IndexController::index_action();
        break;
}

