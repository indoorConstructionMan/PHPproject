<?php

Class Chats_Set extends PHPProject_Database_Table_RowSet {
    
    public function get_messages() {
        foreach ($this as $key => $chat) {
            $chat->get_messages(true);
        }
    }
    
}
