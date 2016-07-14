<nav class="nav-wrapper moss no-shadow">    

    <a href="#" class="flow-text clouds-text padding1-left left"><b>Welcome  <?= $_SESSION['chatapp_user']->username ?>!</b></a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- Dropdown Trigger -->
        <li id="settings_bar"><a class='dropdown-button emerald btn white-text' href='#' data-activates='dropdown1'>Settings</a></li>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content dropdown-menu-color  clouds-text flow-text emerald-text'>
            <li id="dropdownlist"><a href="/edit_user" class="dropdown-text-color" style="font-size: 18px;">Edit Profile</a></li>
            <li class="divider dropdown-divider-color"></li>
            <li id="dropdownlist"><a href="/logout" class="dropdown-text-color" style="font-size: 18px;">Logout</a></li>
        </ul>
    </ul>

</nav>

<div class="row margin-bottom-none">
    
    <div class="col s10 full-height no-padding slate padding45p">
        <link rel="stylesheet" href="/css/chat.css">
        <div id="chat_area" class="full-height-100">
            <div class="chat_tabs full-height-100">
                <div class="s12 tab-chat-fix">
                    <ul class="tabs">
                        <li class="tab col"><a class="valign-wrapper mantis transition-all" href="#chat_window_<?=$GLOBALS['config']['general_chat_id']?>">general chat</a></li>
                        <?foreach ($_SESSION['view_vars']->chat_windows as $key => $chat_window) :?>
                            <?require('/View/_partials/chat_tab.php');?>
                        <?endforeach;?>
                    </ul>
                </div>
                <!--GENERAL CHAT-->
                <?$chat_window = $_SESSION['view_vars']->chat_general; require('/View/_partials/chat_window.php');?>
                <!--USER CHATS-->
                <?foreach ($_SESSION['view_vars']->chat_windows as $key => $chat_window) :?>
                    <?require('/View/_partials/chat_window.php');?>
                <?endforeach;?>
            </div>
        </div>
    </div>
    
    <div class="col s2 slate full-height overflow-auto custom-scrollbar">
        <div id="search" class="">
            <h5 class="emerald-text margin-bottom-none padding3 medium-font-size">search users</h5>
            <form method="post" id="searchForm" action="/chat/ajax/search" autocomplete="off" class="">
                <div class="input-field padding3 margin-top-none">          
                    <input class="clouds-text emerald-border bold flow-text regular-font-size" id="search_bar" type="text" name="search_bar" required>
                    <label for="search_bar" class="emerald-text center-align flow-text regular-font-size padding3">Search by username or email</label>
                </div>
            </form>
            <div id="search_result" class="transition-all"></div>
        </div>
        <div class="divider moss"></div>
        <div id="online_users">
            <h5 class="emerald-text margin-bottom-none padding3 medium-font-size">online users</h5>
            <ul class="margin-top-none">
                <? foreach ($_SESSION['view_vars']->online_users as $key => $user) : ?>
                    <? require("/View/_partials/list_user.php"); ?>
                <? endforeach; ?>
            </ul>
        </div>
    </div>

</div>

<script type="text/javascript" src="/js/user_search.js"></script>
