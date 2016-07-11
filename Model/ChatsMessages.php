<?php

class ChatsMessages extends PHPProject_Database_Table {
    public $table_name = "chats_messages";
    protected $_object_class = "Chats_MessagesObject";
    protected $_set_class = "ChatsMessages_Set";
    
    /*
     * Get chat messages dated after a given date for a given chat
     */
    public function get_messages_for($chat_id, $after = null, $order = array("timestamp", "ASC"), $page = null)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE `chat_id` = " . (int)$chat_id;
        
        if ($after) {
            $query .= " AND WHERE `timestamp` > " . (int)$after;
        }
        
        //order
        $query .= " ORDER BY `" . mysql_real_escape_string($order[0]) . "` " . mysql_real_escape_string($order[1]);
        
        //page
        if (isset($page[0]) && !empty($page[0])) {
            $query .= " LIMIT ". (int)$page[0];

            if (!empty($page[1])) {
                $query .= " ". (int)$page[1];
            }
        }
        
        var_dump($query);
        
        $messages = $this->set_query($query);
        
        return $messages;
        
    }
    
    public function save_message() {
        
    }
}

