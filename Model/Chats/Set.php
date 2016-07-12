<?php

Class Chats_Set extends PHPProject_Database_Table_RowSet {
    
    public function get_messages() {
        foreach ($this as $key => $chat) {
            $chat->get_messages(true);
        }
    }
    
    public function get_users($label = false, $remove_me = true) {
        foreach ($this as $key => $chat) {
            $chat->get_users(true, $label, $remove_me);
        }
    }
    
}
