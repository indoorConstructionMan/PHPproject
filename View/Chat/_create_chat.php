<?
echo json_encode(array(
    "exists" => $_SESSION['view_vars']['exists'],
    "chat_id" => $_SESSION['view_vars']['chat_id'],
    "chat_tab" => $_SESSION['view_vars']['chat_tab'],
    "chat_window" => $_SESSION['view_vars']['chat_window']
));