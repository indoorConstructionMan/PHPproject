<? if (isset($_SESSION['view_vars']->data->username)) :  ?>

    <div class="row">
        <div class="col s12">
            <div class="center promo promo-example">
                <p><?= $_SESSION['view_vars']->data->username ?></p>
                <p><?= $_SESSION['view_vars']->data->is_online ?></p>
            </div>
        </div>
    </div>
<? endif; ?>

<? if (!is_null($_SESSION['view_vars']->message)) : ?>
    <div class="row">
        <div id="error_message" name="error_message" class="form_message white-text col no-float s10 margin-auto center-align hvr-buzz-out-stay"><i class="inherit-font-size material-icons">error_outline</i><?= $_SESSION['view_vars']->message ?></div>
    </div>
<? endif; ?>