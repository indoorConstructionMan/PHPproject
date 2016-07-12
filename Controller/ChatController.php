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
            $chat_windows->get_users(true, true);
        } else {
            $chat_windows = array();
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
    
    public function _create_chat_action() {
        
        if (isset($_POST['user_id']) && $_POST['user_id'] != $_SESSION['chatapp_user']->id) {
            
            // see if we're already chatting with this user (and ONLY this user)
            $chatsusers_model = new ChatsUsers();
            $chatsuser = $chatsusers_model->chat_exists_between($_POST['user_id'], $_SESSION['chatapp_user']->id);
            
            if (!is_null($chatsuser)) {
                // chat already exists
                $this->_generate_view_path(true, array(
                    "exists" => true,
                    "chat_id" => $chatsuser->chat_id, 
                    "chat_window" => null,
                    "chat_tab" => null
                ));
            } else {
                // create a new chat and save it
                $chat = new Chats_Object(array(
                    "timestamp" => date('Y-m-d H:i:s', time())
                ));
                $chat_result = $chat->save();

                if ($chat_result->success) {
                    // create the appropriate chat users
                    $chat_user_self = new ChatsUsers_Object(array(
                        "user_id" => $_SESSION['chatapp_user']->id,
                        "chat_id" => $chat->id
                    ));
                    $chat_user_self->save();
                    $chat_user = new ChatsUsers_Object(array(
                        "user_id" => $_POST['user_id'],
                        "chat_id" => $chat->id
                    ));
                    $chat_user->save();

                    // add user data to the chat
                    $chat->get_users(true, true, true);
                    
                    // process partials required
                    $chat_window_partial = $this->_process_partial("/View/_partials/chat_window.php", array(
                        "chat_window" => $chat
                    ));
                    $chat_tab_partial = $this->_process_partial("/View/_partials/chat_tab.php", array(
                        "chat_window" => $chat
                    ));
                    
                    $this->_generate_view_path(true, array(
                        "exists" => false,
                        "chat_id" => $chat->id, 
                        "chat_window" => $chat_window_partial,
                        "chat_tab" => $chat_tab_partial
                    ));
                }
            }
        }
        
    }
    
    public function _get_chat_window_action() {
        
        
        
    }
    
    public function _get_chat_tab_action() {
        
    }

    public function _get_messages_action() {
        var_dump("get messages action");
    }

    public function _new_message_action() {

        if (isset($_POST['chat_id']) && ($_POST['content'])) {
            $data = array_merge($_POST, array(
                "user_id" => $_SESSION['chatapp_user']->id, 
                "timestamp" => date('Y-m-d H:i:s', time()), 
                "chats_messagetypes_id" => ChatsMessageTypes::TEXT
            ));
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
