$(document).ready(function () {
    var $new_password_link = $('#add_password_fields'),
        $new_password = $('#new_password'),
        $new_password_confirm = $('#new_password_confirm'),
        $new_password_confirm_row = $('#new_password_confirm_row'),
        $new_password_row = $('#new_password_row');
    
    $new_password_link.click(function () {
        $new_password_row.toggle();
        $new_password_confirm_row.toggle();

        if ($new_password_link.text() == "change your password") {
            $new_password.attr('required', true);
            $new_password_confirm.attr('required', true);
            $new_password_link.text("don't change your password");
        } else {
            $new_password.attr('required', false);
            $new_password_confirm.attr('required', false);
            $new_password_link.text("change your password");
        }
    });

});