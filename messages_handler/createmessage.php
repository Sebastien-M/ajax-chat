<?php

require_once '../classes/Message.php';
require_once '../classes/db.php';
session_start();
$db = new db();
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if (isset($post['message'])) {
    if (!empty($post['message'])) {
        $message = new Message($_SESSION['pseudo'], $post['message']);
        $db->addmessage($message);
        
    }
}
