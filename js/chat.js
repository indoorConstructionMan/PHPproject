
Chat = {
    
    chats: [],
    
    registerNewChat: function(chat_id){
        Chat.chats.push(chat_id);
        $('#chat_window_' + chat_id + ' textarea').on("keypress", function(e){
            // check if they pressed enter
            if(e.which == 13) {
                e.preventDefault();
                Chat.sendMessage(chat_id);
            }
        });
    },
    sendMessage: function(chat_id) {
        var $chat = $('#chat_window_' + chat_id),
            $input = $chat.find('textarea'),
            $output = $chat.find('.chat_window_output'),
            message = $input.val();
    
            console.log($output);
    
        if (message != '') {
            // empty the input
            $input.val('');
            // send request
            $.post("/chat/ajax/new_message", {
                chat_id: chat_id,
                message: message
            }, function(result){
                console.log(result);
                // populate the chat output
                $output.append(result);
                $output.animate({
                    scrollTop: $('#chat_window_' + chat_id + ' .chat_message:last-child').offset().top
                }, 200);
            });
        }
    }
};

