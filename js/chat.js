
Chat = {
    
    chats: [],
    
    registerNewChat: function(chat_id, user_id){
        chats.push(chat_id);
        $('#chat_window_' + chat_id + ' textarea').on("keypress", function(e){
            // check if they pressed enter
            if(e.which == 13) {
                sendMessage(chat_id);
            }
        });
    },
    sendMessage: function(chat_id) {
        var $chat = $('#chat_window_' + chat_id),
            $input = $chat.find('textarea'),
            $output = $chat.find('.chat_window_output'),
            message = $input.val();
    
        if (message != '') {
            // empty the input
            $input.val('');
            // send request
            $.post("/chat/ajax/new_message", function(result){
                // populate the chat output
                $output.append(result);
                $output.animate({
                    scrollTop: $('#chat_window_' + chat_id + ' .chat_message:last-child').offset().top
                }, 200);
            });
        }
    }
};

