<?php

class Chats extends PHPProject_Database_Table {

    public $table_name = "chats";
    protected $_object_class = "Chats_Object";
    protected $_set_class = "Chats_Set";
    
    public function get_all_chats_for_user($user_id)
    {
        $chatsusers_model = new ChatsUsers();
        $chatsusers_table = $chatsusers_model->table_name;
        $query = "SELECT * FROM " . $this->table_name . " INNER JOIN $chatsusers_table ON " . $this->table_name . ".id = $chatsusers_table.chat_id WHERE id != " . $GLOBALS['config']['general_chat_id'];
        $chats = $this->set_query($query);
        
        return $chats;
    }

}
