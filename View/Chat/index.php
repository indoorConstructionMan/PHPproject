<nav class="nav-wrapper red accent-2 slidein-top">
    
    
    <a href="#" class="flow-text left">Welcome  <?= $_SESSION['chatapp_user']->username ?>!</a>
    
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- Dropdown Trigger -->
        <li><a class='dropdown-button emerald btn white-text' href='#' data-activates='dropdown1'>Settings</a></li>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content emerald-text'>
            <li><a href="#!">Edit Profile</a></li>
            <li class="divider"></li>
            <li><a href="logout">Logout</a></li>
        </ul>
    </ul>
    
    
    
    <!---<a href="#"><i class="material-icons center-align">search</i></a>--->
</nav>

<div class="input-field col s12">
    <i class="material-icons prefix">mode_edit</i>
    <textarea id="textarea1" class="materialize-textarea belize-text moss-border bold flow-text"></textarea>
    <label class="moss-text flow-text" for="textarea1">Click. Type. Press enter.</label>
</div>