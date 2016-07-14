
<div class="chat_message_container valign-wrapper <?=($message->username != $_SESSION['chatapp_user']->username)? "chat_message_right right-align" : ""; ?>">
    <?if($message->username == $_SESSION['chatapp_user']->username): ?>
        <div class="chat_avatar border5 myrtle-border z-depth-2">

        </div>
        <div class="chat_pin">

        </div>
        <div class='chat_message regular-font-size z-depth-2'>
            <span class='emerald-text bold'><?= $message->username ?></span>: <span class=''><?= $message->content ?></span>
        </div>
    <?else:?>
        <div class='chat_message regular-font-size z-depth-2'>
            <span class='emerald-text bold'><?= $message->username ?></span>: <span class=''><?= $message->content ?></span>
        </div>
        <div class="chat_pin">

        </div>
        <div class="chat_avatar border5 myrtle-border z-depth-2">

        </div>
    <?endif;?>
</div>

