<?
// hide all warning and notice level messsages
error_reporting(E_ERROR);
// enable CORS https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS
header("Access-Control-Allow-Origin: *");
?>
<!-- DOCTYPE used to tell the browser what version of the html spec we're using (html5 in this case) -->
<!DOCTYPE html>
<html>
    <head>
        <title>Chat App</title>
        <!-- favicon links -->
        <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />
        
        <!-- Materialize CSS Framwork (css component) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <!-- Materialize icon font for displaying icons as a font -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- our default stylesheet, contains styles used on many pages -->
        <link rel="stylesheet" href="/css/default.css">
        <!-- hover effects stylesheet, contains styles used on many pages -->
        <link rel="stylesheet" href="/css/hover.css">
        
        <!-- jquery -->
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <!-- Materialize CSS Framework (JavaScript component) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    </head>
    
    <body class="emerald">
        <?
        try {
            // setup autoloading for PHPProject classes
            require_once("Libs/PHPProject/Autoloader.php");
            // database connection
            require_once('db.php');  
            // start session (used for logging in)
            session_start();
            // route to appropriate controller action
            $GLOBALS['config'] = array(
                "site_url" => "http://dubs.stink.com"
            );
            require_once('routes.php');
        } catch (Exception $e) {
            die($e->getMessage());
        }
        ?>
        
    </body>

</html>