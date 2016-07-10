<nav class="nav-wrapper sunshine slidein-top">    

    <a href="#" class="flow-text  padding-leftside left">Welcome  <?= $_SESSION['chatapp_user']->username ?>!</a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- Dropdown Trigger -->
        <li id="settings_bar"><a class='dropdown-button emerald btn white-text' href='#' data-activates='dropdown1'>Settings</a></li>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content flow-text emerald-text'>
            <li id="dropdownlist_online_users"><a href="/chat/ajax/view_online">Online Users</a></li>
            <li class="divider"></li>
            <li id="dropdownlist"><a href="main_menu">Main Menu</a></li>
            <li class="divider"></li>
            <li id="dropdownlist"><a href="edit_user">Edit Profile</a></li>
            <li class="divider"></li>
            <li id="dropdownlist"><a href="logout">Logout</a></li>
        </ul>
    </ul>

</nav>

<div id="result"></div>
<div id="view_online_result"></div>

<div id="messages_area" class="container moss input-field col s12 z-depth-3" style="height: 650px;">
    
</div>


<div class="container input-field col s12">
    <i class="material-icons prefix">mode_edit</i>
    <textarea style="font-size: 30px" id="chat_messages_content" class="materialize-textarea belize-text moss-border bold flow-text"></textarea>
    <label class="moss-text flow-text" for="textarea1" style="font-size: 20px">Click. Type. Press enter.</label>
</div>


<script type="text/javascript" src="/js/user_search.js"></script>
<script type="text/javascript" src="/js/view_online.js"></script>
