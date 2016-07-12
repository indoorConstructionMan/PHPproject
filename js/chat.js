
Chat = {
    chats: [],
    $chatArea: null,
    $chatTabs: null,
    
    init: function() {
        Chat.$chatArea = $('#chat_area .chat_tabs');
        Chat.$chatTabs = Chat.$chatArea.find('ul.tabs');
        
        // attach handler to all elements with the chat_link class
        $('.chat_link').click(function(e){
            e.preventDefault();
            var user_id = $(this).attr('user_id');
            if (undefined !== user_id) {
               Chat.createNewChat(user_id); 
            }
        });
    },
    
    gotoTab: function(chat_id) {
        Chat.$chatTabs.tabs('select_tab', 'chat_window_' + chat_id);
    },
    
    createNewChat: function(user_id) {
        $.post("/chat/ajax/create_chat", {
            "user_id" : user_id
        }, function(result){
            if (result.exists) {
                Chat.gotoTab(result.chat_id);
            } else {
                Chat.$chatTabs.append(result.chat_tab).tabs();
                Chat.$chatArea.append(result.chat_window); 
            }
        }, 'json');
    },
    
    registerNewChat: function (chat_id) {
        Chat.chats.push(chat_id);
        $('#chat_window_' + chat_id + ' textarea').on("keypress", function (e) {
            // check if they pressed enter
            if (e.which == 13) {
                e.preventDefault();
                Chat.sendMessage(chat_id);
            }
        });
        
        // scroll to bottom of chat window
        $output = $('#chat_window_' + chat_id + ' .chat_window_output');
        $output.animate({ scrollTop: $output.prop("scrollHeight")}, 200);
    },
    
    sendMessage: function (chat_id) {
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
                content: message
            }, function (result) {
                console.log(result);
                // populate the chat output
                $output.append(result);
                $output.animate({ scrollTop: $output.prop("scrollHeight")}, 200);
            });
        }
    }
};

$(document).ready(function(){
    Chat.init();
});

