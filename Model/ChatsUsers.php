<?php

class ChatsUsers extends PHPProject_Database_Table {

    public $table_name = "chats_users";
    protected $_object_class = "ChatsUsers_Object";
    protected $_set_class = "ChatsUsers_Set";
    
    public function chat_exists_between($user_id, $other_user_id)
    {
        $table = $this->table_name;
        $query = "SELECT p1.* FROM $table p1 JOIN $table p2 ON p1.chat_id = p2.chat_id WHERE p1.user_id = " . mysql_real_escape_string($user_id) . " AND p2.user_id = " . mysql_real_escape_string($other_user_id) . " LIMIT 1";
        $chat_user = $this->object_query($query);
        
        return $chat_user;
    }

}
