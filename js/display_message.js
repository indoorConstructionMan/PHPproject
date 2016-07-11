$(document).ready(function () {
    var $content = $('#chat_messages_content');

    $content.keyup(function (e) {

        if (e.which == 13)
        {
            var p_open_tag = "<p>",
                    p_close_tag = "</p>",
                    content = $content.val();

            var html_val = p_open_tag.concat(content);
            var html_final = html_val.concat(p_close_tag);

            var html_final_newline_stripped = html_final.replace(/\r?\n|\r/g, "").trim();
            
            $('#messages_area').html(html_final_newline_stripped);
            $.ajax({
                type: 'POST', // Use POST with X-HTTP-Method-Override or a straight PUT if appropriate.
                dataType: 'json', // Set datatype - affects Accept header
                url: "/chat/ajax/new_message", // A valid URL
                data: '{"content": content}' // Some data e.g. Valid JSON as a string
            });


            console.log(html_final_newline_stripped);
        }

    });
});