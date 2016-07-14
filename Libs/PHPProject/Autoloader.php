<?php

// setting an array with keys for each folder we want the autoload to check when looking for our files
$GLOBALS['INCLUDE_DIRS'] = array("Libs/", "Model/", "Controller/");

// built-in php autoloader function, get's called automatically whenever a class is used (ie. new Users() or User::somefunction())
spl_autoload_register('autoloader');
function autoloader ($class_name) {

    // loop through each of the directories we put in the array above
    foreach ($GLOBALS['INCLUDE_DIRS'] as $INCLUDE_DIR) {

        $not_found = false;

        try {
            // look for the file firstpart_secondpart_name.php in the directory/firstpart/secondpart/name.php
            if (file_exists($INCLUDE_DIR . str_replace("_", "/", $class_name) . '.php') == true) {
                // if the file exists, require it (same as include)
                require $INCLUDE_DIR . str_replace("_", "/", $class_name) . '.php';
            } else {
                // else mark as not found in that directory
                $not_found = true;
            }
        } catch (Exception $ex) {
            $not_found = true;
        }

        // did we find the class file? Great, stop searching.
        if ($not_found == false) {
            break;
        }
    }
}
