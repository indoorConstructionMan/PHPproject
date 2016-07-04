<div class="row /*slidein-top*/">
    <div class="col s4 offset-s4 padding5 min-width-400">
        <form method="post" action="login" autocomplete="off" class="slidein-top-components">
            <div class="row">
                <div class="col s12">
                    <div class="center promo promo-example">
                      <i class="material-icons moss emerald-text icon">lock_open</i>
                    </div>
                </div>
            </div>
            <div class="row"> 
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="email" type="text" name="email" required>
                    <label for="email" class="moss-text flow-text">email address or username</label>
                </div>
            </div>
            <div class="row"> 
                <div class="input-field col s12">
                    <input class="clouds-text moss-border bold flow-text" id="password" type="password" name="password" required>
                    <label for="password" class="moss-text flow-text">password</label>
                </div>
            </div>
            <?if (isset($_SESSION['view_vars']->message)) :?>
            <div class="row">
                <div class="form_message white-text col s12 center-align"><i class="inherit-font-size material-icons">error_outline</i><?=$_SESSION['view_vars']->message?></div>
            </div>
            <?endif;?>
            <div class="row">
                <button type="submit" class="col s12 moss-text bold pulse-text-shadow" style="">login</button>
                <a href="register" class="form-link moss-text" style="">or click here to create an account</a>
            </div>
        </form>
    </div>
</div>


