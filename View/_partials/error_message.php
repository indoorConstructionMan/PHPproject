<? if (isset($_SESSION['view_vars']->message)) : ?>
<div class="row">
    <div class="form_message white-text col s12 center-align hvr-buzz-out-stay"><i class="inherit-font-size material-icons">error_outline</i><?= $_SESSION['view_vars']->message ?></div>
</div>
<? endif; ?>