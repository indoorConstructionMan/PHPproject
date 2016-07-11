<?php

class PHPProject_Controller {

    const VIEWS_PATH = "View/";

    protected function _get_controller_name() {
        return str_replace('Controller', '', get_class($this));
    }

    protected function _get_action_name($nested_level = 1) {
        return str_replace('_action', '', debug_backtrace()[$nested_level]['function']);
    }

    protected function _generate_view_path($output_include = false, $view_vars = null) {
        // clean view vars from session
        $_SESSION['view_vars'] = array();
        if ($view_vars) {
            if (is_array($view_vars)) {
                $_SESSION['view_vars'] = new PHPProject_ViewVars($view_vars);
            } elseif ($view_vars instanceof PHPProject_Object) {
                $_SESSION['view_vars'] = new PHPProject_ViewVars($view_vars->to_array());
            }
        }
        $path = SELF::VIEWS_PATH . $this->_get_controller_name() . "/" . $this->_get_action_name(2) . ".php";
        if ($output_include) {
            include($path);
        } else {
            return $path;
        }
    }

    protected function _redirect($action, $controller = null) {
        if (is_null($controller)) {
            header("Location: " . $GLOBALS['config']['site_url'] . "/" . $action);
        } else {
            if ($action == '') {
                header("Location: " . $GLOBALS['config']['site_url'] . "/" . $controller);
            } else {
                header("Location: " . $GLOBALS['config']['site_url'] . "/" . $controller . "/" . $action);
            }
        }
    }

    protected function _is_logged_in($redirect_loggedin = null, $redirect_notloggedin = null) {
        if (isset($_SESSION['chatapp_user']) && $_SESSION['chatapp_user'] instanceof Users_Object) {
            // they are logged in
            if (!is_null($redirect_loggedin)) {
                $this->_redirect($redirect_loggedin);
            } else {
                return true;
            }
        } else {
            // they are NOT logged in
            if (!is_null($redirect_notloggedin)) {
                $this->_redirect($redirect_notloggedin);
            } else {
                return false;
            }
        }
    }

}
