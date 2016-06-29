<?php

class PHPProject_Controller {
    
    const VIEWS_PATH = "View/";
    
    protected function _get_controller_name() {
        return str_replace('Controller', '',  get_class($this));
    }
    
    protected function _get_action_name($nested_level = 1) {
        return str_replace('_action', '', debug_backtrace()[$nested_level]['function']);
    }
    
    protected function _generate_view_path($ouput_include = false) {
        $path = SELF::VIEWS_PATH . $this->_get_controller_name() . "/" . $this->_get_action_name(2) . ".php";
        if ($ouput_include) {
            include($path);
        } else {
            return $path;
        }
    }
    
}

