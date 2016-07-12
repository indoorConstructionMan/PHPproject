<?php

Class Chats_Object extends PHPProject_Database_Table_RowObject {
    
    public function get_users($add = false, $add_label = true, $remove_me = true) {
        $chatsusers_model = new ChatsUsers();
        $query = "SELECT * FROM `" .$chatsusers_model->table_name . "` INNER JOIN users ON " .$chatsusers_model->table_name . ".user_id = users.id WHERE " .$chatsusers_model->table_name . ".chat_id = " . $this->id;
        $users = $chatsusers_model->set_query($query);
        
        if ($add) {
            if ($add_label) {
                $this->users = "";
                foreach($users as $user) {
                    if ($remove_me && ($user->username == $_SESSION['chatapp_user']->username)) {
                        // do nothing
                    } else {
                        $this->users .= $user->username; 
                    }
                }
                $this->users = trim($this->users, ",");
            } else {
                $this->users = $users; 
            }
            
        }
        
        return $users;
    }
    
    public function get_messages($add = false) {
        $chatsmessages_model = new ChatsMessages();
        $query = "SELECT * FROM " .$chatsmessages_model->table_name . " INNER JOIN users ON " .$chatsmessages_model->table_name . ".user_id = users.id WHERE " .$chatsmessages_model->table_name . ".chat_id = " . $this->id;
        $messages = $chatsmessages_model->set_query($query);
        
        if ($add) {
            $this->messages = $messages;
        }
        
        return $messages;
    }
    
}
