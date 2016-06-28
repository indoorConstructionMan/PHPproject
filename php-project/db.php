<?php
$link = mysql_connect('localhost', 'root');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

if (!mysql_select_db("php-project")) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}
