<div id="chat_area_<?=$chat_id?>" class="padding1 full-height-100">
    <div class="chat_tabs full-height-100">
        <div class="chat_window full-height-100">
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
    Chat.registerNewChat(<?=$chat_id?>);
});    
</script>