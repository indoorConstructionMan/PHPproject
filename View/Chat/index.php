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

<form method="post" id="searchForm" action="/chat/ajax/search" autocomplete="off" class="slidein-top-components">
    <div class="row">
        <div class="input-field col s6 offset-s3">          
            <input class="clouds-text moss-border bold flow-text" id="search_bar" type="text" name="search_bar" required>
            <label for="search_bar" class="moss-text center-align flow-text">Search by username or email</label>
        </div>
    </div>
</form>

<script type="text/javascript" src="/js/user_search.js"></script>
<script type="text/javascript" src="/js/view_online.js"></script>

