<?php
// connect to our mysql database server
$link = mysql_connect('localhost', 'root');
if (!$link) {
    // if connection failed, stop execution and show error message
    die('Could not connect: ' . mysql_error());
}
// select which db from our database server we want to use for all requests from this point on (in this case php-project)
if (!mysql_select_db("php-project")) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}
