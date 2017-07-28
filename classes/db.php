<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author seb
 */
include_once '../classes/Message.php';
class db {

    private $dbh;

    function __construct() {
        $this->dbh = new PDO('mysql:host=localhost;dbname=ajax_chat', 'php', 'toor');
        //$this->dbh->setAttr$this->dbh = new PDO('mysql:host=localhost;dbname=knoibute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    function addmessage(Message $message){
        $query = $this->dbh->prepare("INSERT INTO messages (author, date, content) " .
                "VALUES (:author, :date, :content);");
        $query->bindValue(':author', $message->getAuthor());
        $query->bindValue(':date', $message);
        $query->bindValue(':content', $user->getEmail());
        $query->execute();
        return TRUE;
    }
}
