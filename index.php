<?
error_reporting(E_ERROR);
header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chat App</title>
        <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        
        <link rel="stylesheet" href="css/default.css">
    </head>
    
    <body class="emerald">
        <?
        try {
            // setup autoloading for PHPProject classes
            require_once("Libs/PHPProject/Autoloader.php");
            // database connection
            require_once('db.php');             
            // route to appropriate controller action
            require_once('routes.php');
        } catch (Exception $e) {
            die($e->getMessage());
        }
        ?>
        
    </body>

</html>