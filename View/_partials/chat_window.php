<div id="chat_window_<?= $chat_window->id ?>" class="chat_window full-height-100 chat-tab-fix">
    <div class="chat_window_output full-height-80 clouds white-border border15 padding1">
        <?if (is_array($chat_window->messages) && !empty($chat_window->messages)) :?>
            <?foreach ($chat_window->messages as $message) :?>
                <?require("/View/_partials/chat_message.php");?>
            <?endforeach;?>
        <?endif;?>
    </div>
    <div class="chat_window_input full-height-20">
        <textarea class="full-height-100 full-width moss clouds-border clouds-text large-font-size padding1"></textarea>
    </div>
</div>
<script>
    $(document).ready(function () {
        Chat.registerNewChat("<?= $chat_window->id ?>");
    });
</script>
