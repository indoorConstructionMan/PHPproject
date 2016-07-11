$(document).ready(function () {
    var $new_password_link = $('#add_password_fields');
    $new_password_link.click(function () {
        $('#new_password').toggle();
        $('#new_password_confirm').toggle();

        if ($new_password_link.text() == "change your password") {
            $new_password_link.text("don't change your password");
        } else {
            $new_password_link.text("change your password");
        }
    });

});