<?php

require_once '../classes/Message.php';
require_once '../classes/db.php';
session_start();
$db = new db();

$messages = $db->readmessages();
echo json_encode($messages);
