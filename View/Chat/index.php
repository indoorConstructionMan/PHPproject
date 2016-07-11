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

<form method="post" id="searchForm" action="/chat/ajax/search" autocomplete="off" class="slidein-top-components">
    <div class="row">
        <div class="input-field col s6 offset-s3">          
            <input class="clouds-text moss-border bold flow-text" id="search_bar" type="text" name="search_bar" required>
            <label for="search_bar" class="moss-text center-align flow-text">Search by username or email</label>
        </div>
    </div>
</form>

<div>
    
</div>

<script type="text/javascript" src="/js/user_search.js"></script>
<script type="text/javascript" src="/js/view_online.js"></script>

