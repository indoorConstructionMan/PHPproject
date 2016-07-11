$(document).ready(function () {
    // Attach a submit handler to the form
    $("#searchForm").submit(function (event) {

        // Stop form from submitting normally
        event.preventDefault();
        event.stopPropagation();
        
        // Get some values from elements on the page:
        var     $form = $(this),
                term = $form.find("input[name='search_bar']").val(),
                url = $form.attr("action");
        
        $form.find("div[name='error_message']").val("");
        
        // Send the data using post
        var posting = $.post(url, {search_bar: term});
        
        
        // Put the results in a div
        posting.done(function (data) {
            console.log(data);
            $( "#search_result" ).html( data ).removeClass("no_height");
        });
    });
});