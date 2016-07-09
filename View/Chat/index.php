<nav class="nav-wrapper red accent-2 slidein-top">    

    <a href="#" class="flow-text left">Welcome  <?= $_SESSION['chatapp_user']->username ?>!</a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- Dropdown Trigger -->
        <li id="settings_bar"><a class='dropdown-button emerald btn white-text' href='#' data-activates='dropdown1'>Settings</a></li>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content flow-text emerald-text'>
            <li id="dropdownlist"><a href="view_online">Online Users</a></li>
            <li class="divider"></li>
            <li id="dropdownlist"><a href="edit_user">Edit Profile</a></li>
            <li class="divider"></li>
            <li id="dropdownlist"><a href="logout">Logout</a></li>
        </ul>
    </ul>

</nav>


<div id="result" style="height:250px">

</div>

<form method="post" id="searchForm" action="/chat/ajax/search" autocomplete="off" class="slidein-top-components">
    <div class="row">
        <div class="input-field col s6 offset-s3">          
            <input class="clouds-text moss-border bold flow-text" id="search_bar" type="text" name="search_bar">
            <label for="search_bar" class="moss-text center-align flow-text">Search by username or email</label>
        </div>
    </div>
</form>

<?if (isset($_SESSION['view_vars']->message)) :?>
<div class="row">
    <div class="form_message white-text col s12 center-align hvr-buzz-out-stay"><i class="inherit-font-size material-icons">error_outline</i><?= $_SESSION['view_vars']->message ?></div>
</div>
<?endif;?>

<script type="text/javascript" src="/js/userSetup.js"></script>

<!--
<div class="container input-field col s12">
    <i class="material-icons prefix">mode_edit</i>
    <textarea id="chat_messages_content" class="materialize-textarea belize-text moss-border bold flow-text"></textarea>
    <label class="moss-text flow-text" for="textarea1">Click. Type. Press enter.</label>
</div>

<div class="container input-field col s12">
    <textarea id="chat_messages_content" class="materialize-textarea belize-text moss-border bold flow-text"></textarea>
    <label class="moss-text flow-text" for="textarea1">Search</label>
</div>
--->