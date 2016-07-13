<?php
// hide all warning and notice level messsages
error_reporting(E_ERROR);
// enable CORS https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS
header("Access-Control-Allow-Origin: *");
try {
    // setup autoloading for PHPProject classes
    require_once("Libs/PHPProject/Autoloader.php");
    // database connection
    require_once('db.php');
    // start session (used for logging in)
    session_start();
    // route to appropriate controller action
    $GLOBALS['config'] = array(
        "site_url" => "http://dubs.stink.com",
        "general_chat_id" => 1,
        "target_dir"    => "uploads/",
        "chat_colors" => array(
            "blue" => "#3290BE",
            "sunshine" => "#FF805F",
            "pumpkin" => "#d35400",
            "pomegranate" => "#c0392b",
            "peter" => "#3498DB",
            "belize" => "#2980B9",
            "alizarin" => "#e74c3c",
            "greensea" => "#16a085",
            "moss" => "#2B8551",
            "myrtle" => "#2D714A",
            "avacado" => "#2D8F57",
            "nephritis" => "#27ae60",
            "asphalt" => "#34495e",
            "sunflower" => "#f1c40f",
            "turquoise" => "#1abc9c",
            "emerald" => "#2ecc71"
        ),
        'chat_colors_default' => array(
            "asphalt" => "#34495e"
        )
    );
} catch (Exception $e) {
    die($e->getMessage());
}
if (stripos($_SERVER['PATH_INFO'], "ajax") === false) :
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
            <!-- chat -->
            <script src="/js/chat.js"></script>
        </head>

        <body class="emerald">
            <?php require_once('routes.php'); ?>
        </body>

    </html>
<?php else: ?>
    <?php require_once('routes.php'); ?>
<?php endif; ?>