<?php

require_once("Libs/spotify-web-api-php/src/SpotifyWebAPIException.php");
require_once("Libs/spotify-web-api-php/src/SpotifyWebAPI.php");
require_once("Libs/spotify-web-api-php/src/Request.php");
require_once("Libs/spotify-web-api-php/src/Session.php");

class SpotifyController extends PHPProject_Controller {
    
    const SPOTIFY_CLIENTID = "99591b0ab6944c3aaf959e0c6c34ef8e";
    const SPOTIFY_CLIENTSECRET = "dff5d8ed0211435ca16b1674ac9c1ba6";
    const SPOTIFY_REDIRECT_AUTH = "http://dubs.stink.com:9080/spotify/auth-callback";
    
    public function auth_action() {
        // create new session using out clientId, clientSecret, and our auth redirect
        $session = new SpotifyWebAPI\Session(SELF::SPOTIFY_CLIENTID, SELF::SPOTIFY_CLIENTSECRET, SELF::SPOTIFY_REDIRECT_AUTH);
        
        // the permissions we're asking for
        $scopes = array(
            'playlist-read-private',
            'user-read-private',
            'user-library-read',
            'user-follow-read'
        );
        
        $authorizeUrl = $session->getAuthorizeUrl(array(
            'scope' => $scopes
        ));
        
        // redirect to the spotify auth url
        header('Location: ' . $authorizeUrl);
        die();
    }
    
    public function auth_redirect_action() {
        
        $session = new SpotifyWebAPI\Session(SELF::SPOTIFY_CLIENTID, SELF::SPOTIFY_CLIENTSECRET, SELF::SPOTIFY_REDIRECT_AUTH);
        $api = new SpotifyWebAPI\SpotifyWebAPI();

        // Request a access token using the code from Spotify
        $session->requestAccessToken($_GET['code']);
        $accessToken = $session->getAccessToken();

        // Set the access token on the API wrapper
        $api->setAccessToken($accessToken);
        
        $this->_generate_view_path(true);
    }
    
    
}

