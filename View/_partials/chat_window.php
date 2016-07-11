<link rel="stylesheet" href="/css/chat.css">
<div id="chat_area" class="padding1 full-height-100">
    <div class="chat_tabs full-height-100">
        <div class="s12 tab-chat-fix ">
            <ul class="tabs">
              <li class="tab col s3"><a href="#chat_window_<?=$chat_id?>">general chat</a></li>
              <li class="tab col s3"><a href="#chat_window_2">second chat</a></li>
              <li class="tab col s3"><a href="#chat_window_3">third chat</a></li>
              <li class="tab col s3"><a href="#chat_window_4">fourth chat</a></li>
            </ul>
        </div>
        <div id="chat_window_<?=$chat_id?>" class="chat_window full-height-100 chat-tab-fix">
            <div class="chat_window_output full-height-80 clouds padding1">

            </div>
            <div class="chat_window_input full-height-20">
                <textarea class="full-height-100 full-width moss clouds-border clouds-text large-font-size padding1"></textarea>
            </div>
        </div>   
        <div id="chat_window_2" class="chat_window full-height-100 chat-tab-fix">
            <div class="chat_window_output full-height-80 clouds padding1">
                
            </div>
            <div class="chat_window_input full-height-20">
                <textarea class="full-height-100 full-width moss clouds-border clouds-text large-font-size padding1"></textarea>
            </div>
        </div> 
        <div id="chat_window_3" class="chat_window full-height-100 chat-tab-fix">
            <div class="chat_window_output full-height-80 clouds padding1">
                
            </div>
            <div class="chat_window_input full-height-20">
                <textarea class="full-height-100 full-width moss clouds-border clouds-text large-font-size padding1"></textarea>
            </div>
        </div> 
        <div id="chat_window_4" class="chat_window full-height-100 chat-tab-fix">
            <div class="chat_window_output full-height-80 clouds padding1">
                
            </div>
            <div class="chat_window_input full-height-20">
                <textarea class="full-height-100 full-width moss clouds-border clouds-text large-font-size padding1"></textarea>
            </div>
        </div> 
    </div>
</div>
<script>
$(document).ready(function(){
    Chat.registerNewChat("<?=$chat_id?>");
    Chat.registerNewChat(2);
    Chat.registerNewChat(3);
    Chat.registerNewChat(4);
});    
</script>