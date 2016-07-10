$(document).ready(function () {
    // Attach a submit handler to the form
    $("#dropdownlist_online_users").click(function (event) {

        // Stop form from submitting normally
        event.preventDefault();
        event.stopPropagation();
        
        
        // Send the data using post
        var posting = $.get("/chat/ajax/view_online");
        
        
        // Put the results in a div
        posting.done(function (data) {
            $( "#view_online_result" ).html( data );
        });
    });
});