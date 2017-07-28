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
include_once 'Message.php';
class db {

    private $dbh;

    function __construct() {
        $this->dbh = new PDO('mysql:host=localhost;dbname=ajax_chat', 'root', 'toor');
    }
    
    function addmessage(Message $message){
        $query = $this->dbh->prepare("INSERT INTO messages (author, content, postdate) " .
                "VALUES (:author, :content, :postdate)");
        $query->bindValue(':author', $message->getAuthor());
        $query->bindValue(':content', $message->getContent());
        $query->bindValue(':postdate', $message->getDate());
        $query->execute();
//        $this->dbh->exec("INSERT INTO messages (author) VALUES ('aaa')");
        return TRUE;
    }
    function readmessages(){
        $array = [];
        $query = $this->dbh->prepare("SELECT * FROM messages");
        $query->execute();
        while($row = $query->fetch()){
            $array[$row["id"]] ["author"] = $row["author"];
            $array[$row["id"]] ["content"] = $row["content"];
            $array[$row["id"]] ["postdate"] = $row["postdate"];
        }
        return $array;
    }
}
