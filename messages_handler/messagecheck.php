<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../classes/Message.php';
require_once '../classes/db.php';
$db = new db();
$verif = $db->maxid();
echo $verif;
