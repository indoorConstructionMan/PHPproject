<?php

require_once("Libs/spotify-web-api-php/src/SpotifyWebAPIException.php");
require_once("Libs/spotify-web-api-php/src/SpotifyWebAPI.php");
require_once("Libs/spotify-web-api-php/src/Request.php");
require_once("Libs/spotify-web-api-php/src/Session.php");

class SpotifyController extends PHPProject_Controller {

    const SPOTIFY_CLIENTID = "99591b0ab6944c3aaf959e0c6c34ef8e";
    const SPOTIFY_CLIENTSECRET = "dff5d8ed0211435ca16b1674ac9c1ba6";
    const SPOTIFY_REDIRECT_AUTH = "http://dubs.stink.com:9080/spotify/auth";
    const SPOTIFY_REDIRECT_ARTISTS = "http://dubs.stink.com:9080/spotify/artists";
    const SPOTIFY_ACCESSTOKEN = 'AQBq0appPufmWkxffw--Gdt0dXvBH5ZZCM5R6uMOwSa_fH7ui8WJejXoy1uHngI9jsvJB8LVVqHJMP3r5oGLq8Wexh1Q8hT-LbQ1HSuD7Y2OKLkKsMsQw4yL4fDyj-Zja89m5IDJyjVtONAmwb1BLZQv6cIBpcUxFh4q8ehgIwkIDj1geeuWRJbfe2QL8tEm2PdwQDIYLK0gALPgyp7BHfKyeuE4ZxBQfU6NMynMG2_KgKeD9Xfxrb4lIUBUyl1yxZYnxTgElawJH__gveKmczZZBx-yxVWTFFu5-irAiC6QZ6-stBBCR38m5NUtlezr67GUPkM';

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
        //die();
    }

    public function auth_redirect_action() {

        var_dump($_GET['code']);

        $session = new SpotifyWebAPI\Session(SELF::SPOTIFY_CLIENTID, SELF::SPOTIFY_CLIENTSECRET, SELF::SPOTIFY_REDIRECT_AUTH);
        $api = new SpotifyWebAPI\SpotifyWebAPI();

        // Request a access token using the code from Spotify
        if ($session->requestAccessToken($_GET['code'])) {
            var_dump("ACCESS CODE FETCHED FROM SERVER");
        } else {
            var_dump("FAILED TO FETCH ACCESS CODE FROM SERVER");
        }
        $accessToken = $session->getAccessToken();

        // Set the access token on the API wrapper
        $api->setAccessToken($accessToken);

        // Set API wrapper to use associative arrays
        $api->setReturnAssoc(true);

        $artists = $api->getUserFollowedArtists();

        $this->_generate_view_path(true);
    }

    public function artists_action() {
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        var_dump("ARTISTS");
    }

}
