<li class="padding3">
    <?if($user->is_online):?>
    <i class="material-icons circle emerald-text">thumb_up</i>
    <?else:?>
    <i class="material-icons circle alizarin-text">thumb_down</i>
    <?endif;?>
    <span class="clouds-text padding1-left"><?=$user->username;?></span>
    <a href="#!" class="secondary-content"><i class="material-icons clouds-text">chat</i></a>
</li>

