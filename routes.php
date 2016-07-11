<?php
// grab the portion of the current request url after .domain (ie. /controller/action for hello.com/controller/action)
$route = str_replace("params=", "", $_SERVER['PATH_INFO']);

// checks the url and calls the appropriate controller action
switch ($route) {
    
    // Index Controller
    case "/register":
        $controller = new IndexController();
        $controller->register_action();
        break;
    case "/login":
        $controller = new IndexController();
        $controller->login_action();
        break;
    case "/logout":
        $controller = new IndexController();
        $controller->logout_action();
        break;
    case "/guest_login":
        $controller = new IndexController();
        $controller->guest_login_action();
        break;

    
    //Chats Controller
    case "/chat":
        $controller = new ChatController();
        $controller->index_action();
        break;
    case "/chat/new_chat":
        $controller = new ChatController();
        $controller->new_chat_action();
        break;
    case "/chat/_new_message":
        $controller = new ChatController();
        $controller->_new_message_action();
        break;
    case "/chat/ajax/search":
        $controller = new ChatController();
        $controller->_search_action();
        break;
    case "/edit_user":
        $controller = new ChatController();
        $controller->edit_user_action();
        break;
    case "/chat/ajax/view_online":
        $controller = new ChatController();
        $controller->_view_online_action();
        break;
    case "/main_menu":
        $controller = new IndexController();
        $controller->index_action();
        break;
    
    
    case "/chat/ajax/get-messages":
        $controller = new ChatController();
        $controller->_get_messages_action();
        break;
    case "/chat/ajax/new-message":
        $controller = new ChatController();
        $controller->_new_message_action();
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
        $controller = new IndexController();
        $controller->index_action();
        break;
}

