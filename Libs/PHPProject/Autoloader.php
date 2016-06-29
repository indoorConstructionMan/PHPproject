<?php

$GLOBALS['INCLUDE_DIRS'] = array("Controller/","Model/","Libs/");

spl_autoload_register(function ($class_name) {
    
    foreach ($GLOBALS['INCLUDE_DIRS'] as $INCLUDE_DIR) {
        
        $not_found = false;

        try {
            require $INCLUDE_DIR . str_replace("_", "/", $class_name) . '.php'; 
        } catch (Exception $ex) {
            $not_found = true;
        }
        
        // did we find the class file? Great, stop searching.
        if ($not_found == false) {
            break;
        }
    }
});