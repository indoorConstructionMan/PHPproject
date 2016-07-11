<nav class="nav-wrapper lime-green-nav slidein-top">    

    <a href="#" class="flow-text clouds-text padding-leftside left"><b>Welcome  <?= $_SESSION['chatapp_user']->username ?>!</b></a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- Dropdown Trigger -->
        <li id="settings_bar"><a class='dropdown-button emerald btn white-text' href='#' data-activates='dropdown1'>Settings</a></li>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content dropdown-menu-color  clouds-text flow-text emerald-text'>
            <li class='dropdown-text-color dropdown-menu-color  clouds-text flow-text ' id="dropdownlist_online_users" ><a href="/chat/ajax/view_online" style="font-size: 18px;">Online Users</a></li>
            <li class="divider dropdown-divider-color"></li>
            <li id="dropdownlist"><a href="/main_menu" class="dropdown-text-color" style="font-size: 18px; font">Main Page</a></li>
            <li class="divider dropdown-divider-color"></li>
            <li id="dropdownlist"><a href="/edit_user" class="dropdown-text-color" style="font-size: 18px;">Edit Profile</a></li>
            <li class="divider dropdown-divider-color"></li>
            <li id="dropdownlist"><a href="/logout" class="dropdown-text-color" style="font-size: 18px;">Logout</a></li>
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


<div id="result"></div>
<div id="view_online_result"></div>

<script type="text/javascript" src="/js/user_search.js"></script>
<script type="text/javascript" src="/js/view_online.js"></script>
<script type="text/javascript" src="/js/display_message.js"></script>