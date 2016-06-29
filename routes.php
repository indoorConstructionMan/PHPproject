<?php
var_dump($_SERVER['REQUEST_URI']);
// checks the url and redirects to appropriate controller action
switch ($_SERVER['REQUEST_URI']) {
    
    // Index Controller
    case "register":
        //include("Controller/IndexController.php");
        $controller = new IndexController();
        $controller->register_action();
        break;
    case "login":
        //include("Controller/IndexController.php");
        $controller = new IndexController();
        $controller->login_action();
        break;
    
    // Spotify Controller
    case "/spotify":
        $controller = new SpotifyController();
        $controller->auth_action();
        break;
    case "/spotify/auth":
        $controller = new SpotifyController();
        $controller->auth_redirect_action();
        break;
    
    default:
        //include("Controller/IndexController.php");
        $controller = new IndexController();
        $controller->index_action();
        break;
}

