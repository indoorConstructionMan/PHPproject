<?php

class ChatController extends PHPProject_Controller {

    public function index_action() {
        $this->_generate_view_path(true);
    }

    // TODO can't seem to access $_SESSION['view_vars']
    // debuggin required
    public function _search_action() {
        
        $result = new PHPProject_ReturnMessage(array(
            "success" => false,
            "message" => null,
            "data" => array()
        ));
        
        $user_model = new Users();        
        $user_found = $user_model->find_by($_POST['search_bar']);
        
        if($user_found->success) {
            
            $result->success = true;
            $user_found->data->password = "";
            $result->data = $user_found->data;
            
            if ($result->success) {
                $this->_generate_view_path(true, $result);
                return;
            }
  
        } 
        
        $result->success = false;
        $result->message = "Username or email does not exit. Try again.";
        
        $this->_generate_view_path(true, $result);
        return;
    }

    public function _edit_user_action() {
        var_dump("Edit user placeholder");
    }

    // Need to clean up this function, spits back correct results from db.
    // Still need to exclude guest_xxxxx formatting.
    public function _view_online_action() {
        $user_model = new Users();
        $online_users = $user_model->get_online_users();

        var_dump($online_users);
        
    }
    
    public function _get_messages_action() {
        var_dump("get messages action");
    }

    public function _new_message_action() {
        
    }

}
