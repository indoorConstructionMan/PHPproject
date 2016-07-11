<?php

class ChatController extends PHPProject_Controller {

    public function index_action() {
        // get online users
        $user_model = new Users();
        $online_users = $user_model->get_online_users();
        
        // get general chat
        $chats_model = new Chats();
        $general_chat = $chats_model->find($GLOBALS['config']['general_chat_id']);
        // get the messages for general chat (assigned to messages)
        $general_chat->get_messages(true);
        // get all other chats user is involved in
        $chat_windows = $chats_model->get_all_chats_for_user($_SESSION['chatapp_user']->id);
        
        // if they are involved in any chats other than general, get the messages for those chats (assigned to messages)
        if (!is_null($chat_windows)) { 
            $chat_windows->get_messages();
        }
        
        $this->_generate_view_path(true, array(
            "online_users" => $online_users, 
            "chat_general" => $general_chat,
            "chat_windows" => $chat_windows
        ));
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

        if ($user_found->success) {

            $result->success = true;
            $user_found->data->password = "";
            $result->data = $user_found->data;

            if ($result->success) {
                $this->_generate_view_path(true, $result);
                return;
            }
        }

        $result->success = false;
        $result->message = "no user found";

        $this->_generate_view_path(true, $result);
        return;
    }

    public function edit_user_action() {
        $this->_generate_view_path(true);
        return;
    }

    // Need to clean up this function, spits back correct results from db.
    // Still need to exclude guest_xxxxx formatting.
    public function _view_online_action() {
        $user_model = new Users();
        $online_users = $user_model->get_online_users();

        $this->_generate_view_path(true, $online_users);
    }

    public function _get_messages_action() {
        var_dump("get messages action");
    }

    public function _new_message_action() {

        if (isset($_POST['chat_id']) && ($_POST['content'])) {
            $data = array_merge($_POST, array("user_id" => $_SESSION['chatapp_user']->id));
            $message = new ChatsMessages_Object($data);
            $message_result = $message->save();
            if ($message_result->success) {
                // add username to message
                $message->username = $_SESSION['chatapp_user']->username;
                $this->_generate_view_path(true, array(
                    "message" => $message
                ));
            }
        }
    }

    // need to save to chats table the id's of the two people involved.
    public function new_chat_action() {
        $this->_generate_view_path(true);
        return;
    }

}
