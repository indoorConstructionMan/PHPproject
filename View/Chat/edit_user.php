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

<div class="row">
    <div class="col s4 offset-s4 padding5">
        <form method="post" action="edit_user" autocomplete="off" class="slidein-top-components">
            <div class="row">
                <div class="col s12">
                    <div class="center promo promo-example">
                        <i class="material-icons moss emerald-text icon">person_pin</i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="email" type="email" name="email" value="<?= (isset($_SESSION['view_vars']['data']['email'])) ? $_SESSION['view_vars']['data']['email'] : ''; ?>" required>
                    <label for="email" class="moss-text flow-text">email addreass</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="username" type="text" name="username" pattern="^[a-zA-Z0-9-_\.]{3,20}$" value="<?= (isset($_SESSION['view_vars']['data']['username'])) ? $_SESSION['view_vars']['data']['username'] : ''; ?>" required >
                    <label for="username" class="moss-text flow-text">username <i>3-20 characters</i></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="password" type="password" name="password" required>
                    <label for="password" class="moss-text flow-text">password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="password_confirm" type="password" name="password_confirm" required>
                    <label for="password_confirm" class="moss-text flow-text">confirm password</label>
                </div>
            </div>
            <button type="submit" class="col s12 moss-text bold pulse-text-shadow hvr-buzz" style="">Save Edits</button>
    </div>
</form>
</div>
</div>
