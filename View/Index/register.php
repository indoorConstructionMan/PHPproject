<div class="row">
    <div class="col s4 offset-s4 padding5">
        <form method="post" action="register" autocomplete="off" class="slidein-top-components">
            <div class="row">
                <div class="col s12">
                    <div class="center promo promo-example">
                      <i class="material-icons moss emerald-text icon">person_pin</i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="email" type="email" name="email" value="<?=(isset($_SESSION['view_vars']['data']['email']))?$_SESSION['view_vars']['data']['email']:'';?>" required>
                    <label for="email" class="moss-text flow-text">email address</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="username" type="text" name="username" pattern="^[a-zA-Z0-9-_\.]{3,20}$" value="<?=(isset($_SESSION['view_vars']['data']['username']))?$_SESSION['view_vars']['data']['username']:'';?>" required >
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
            <?if (isset($_SESSION['view_vars']->message)) :?>
            <div class="row">
                <div class="form_message white-text col s12 center-align hvr-buzz-out-stay"><i class="inherit-font-size material-icons">error_outline</i><?=$_SESSION['view_vars']->message?></div>
            </div>
            <?endif;?>
            <div class="row">
                <button type="submit" class="col s12 moss-text bold pulse-text-shadow hvr-buzz" style="">create account</button>
                <a href="register" class="form-link moss-text" style="">click here to create an account</a>
                <a href="guest_login" class="form-link clouds-text" style="">sign in as guest</a>
            </div>
        </form>
    </div>
</div>
