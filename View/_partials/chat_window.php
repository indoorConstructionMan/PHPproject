<div id="chat_window_<?= $chat_window->id ?>" class="chat_window myrtle full-height-100 chat-tab-fix">
    <div class="chat_window_output custom-scrollbar shadow-inset border10 full-height-80 asphalt myrtle-border padding1 overflow-auto">
        <?if (isset($chat_window->messages) && !empty($chat_window->messages)) :?>
            <?foreach ($chat_window->messages as $message) :?>
                <?require("/View/_partials/chat_message.php");?>
            <?endforeach;?>
        <?endif;?>
    </div>
    <div class="chat_window_input full-height-20 myrtle"><textarea class="full-height-100 full-width white shadow-inset-light border-top-none <?=$GLOBALS['config']['chat_colors_default']['name']?>-text medium-font-size padding1 myrtle-border border10"></textarea></div>
</div>
<script>
    $(document).ready(function () {
        Chat.registerNewChat("<?= $chat_window->id ?>");
    });
</script>
