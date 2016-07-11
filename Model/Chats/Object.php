<?php

Class Chats_Object extends PHPProject_Database_Table_RowObject {
    
    public function get_users($add = false) {
        $chatsusers_model = new ChatsUsers();
        $query = "SELECT * FROM `" .$chatsusers_model->table_name . "` WHERE chat_id = " . $this->id;
        $users = $chatsusers_model->set_query($query);
        
        if ($add) {
            $this->users = $users;
        }
        
        return $users;
    }
    
    public function get_messages($add = false) {
        $chatsmessages_model = new ChatsMessages();
        $query = "SELECT * FROM " .$chatsmessages_model->table_name . " INNER JOIN users ON " .$chatsmessages_model->table_name . ".user_id = users.id WHERE chat_id = " . $this->id;
        $messages = $chatsmessages_model->set_query($query);
        
        if ($add) {
            $this->messages = $messages;
        }
        
        return $messages;
    }
    
}
