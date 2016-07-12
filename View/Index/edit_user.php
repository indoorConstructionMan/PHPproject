<nav class="nav-wrapper moss no-shadow">    

    <a href="#" class="flow-text clouds-text padding1-left left"><b>Welcome  <?= $_SESSION['chatapp_user']->username ?>!</b></a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- Dropdown Trigger -->
        <li id="settings_bar"><a class='dropdown-button emerald btn white-text' href='#' data-activates='dropdown1'>Settings</a></li>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content dropdown-menu-color  clouds-text flow-text emerald-text'>
            <li id="dropdownlist"><a href="/chat" class="dropdown-text-color" style="font-size: 18px;">Main Menu</a></li>
            <li class="divider dropdown-divider-color"></li>
            <li id="dropdownlist"><a href="/logout" class="dropdown-text-color" style="font-size: 18px;">Logout</a></li>
        </ul>
    </ul>

</nav>

<div class="row">
    <div class="slidein-top-components col s4 offset-s4 padding5">
        <form action="/edit_user" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                <div class="col s12">
                    <div class="center promo promo-example">
                        <i class="material-icons moss emerald-text icon">person_pin</i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="email" type="email" name="email" value="<?= (isset($_SESSION['chatapp_user']->email)) ? $_SESSION['chatapp_user']->email : ''; ?>" required>
                    <label for="email" class="moss-text flow-text">email address</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="username" type="text" name="username" pattern="^[a-zA-Z0-9-_\.]{3,20}$" value="<?= (isset($_SESSION['chatapp_user']->username)) ? $_SESSION['chatapp_user']->username : ''; ?>" required >
                    <label for="username" class="moss-text flow-text">username <i>3-20 characters</i></label>
                </div>
            </div>
            <div class="no-display row" id="new_password_row">
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="new_password" type="password" name="new_password" >
                    <label for="new_password" class="moss-text flow-text">new password</label>
                </div>
            </div>
            <div class="no-display row" id="new_password_confirm_row">
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold" id="new_password_confirm" type="password" name="new_password_confirm" >
                    <label for="new_password_confirm" class="moss-text ">new password confirm</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="password" type="password" name="password" required>
                    <label for="password" class="moss-text flow-text" >password</label>
                </div>
            </div>
            <div class="row">
                <input class="col s6" type="file" name="fileToUpload" id="fileToUpload">
                <a href="#" id="add_password_fields" class="col s6 form-link moss-text">change your password</a>
            </div>
            <button type="submit" value="/edit_user" name="submit" class="col s12 moss-text bold pulse-text-shadow">update profile</button>
        </form>
    </div>
</div>

<script type="text/javascript" src="/js/display_password_fields.js"></script>