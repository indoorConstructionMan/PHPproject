<?
//error_reporting(E_ERROR);
header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign In form</title>
        <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
    </head>
    
    <body>
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