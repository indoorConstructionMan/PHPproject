<?php
$route = str_replace("params=", "", $_SERVER['PATH_INFO']);
// checks the url and redirects to appropriate controller action
switch ($route) {
    
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
    
    case "/spotify/auth":
        $controller = new SpotifyController();
        $controller->auth_redirect_action();
        break;
    case "/spotify/artists":
        $controller = new SpotifyController();
        $controller->artists_action();
        break;
    case "/spotify":
        $controller = new SpotifyController();
        $controller->auth_action();
        break;
    
    default:
        //include("Controller/IndexController.php");
        $controller = new IndexController();
        $controller->index_action();
        break;
}

