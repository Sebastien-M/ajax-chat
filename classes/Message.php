<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author seb
 */
class Message {
    private $author;
    private $date;
    private $content;
    
    function __construct($author, $content) {
        $this->author = $author;
        $this->content = $content;
        $this->date = date("Y-m-d H:i:s");
    }

    function getAuthor() {
        return $this->author;
    }

    function getDate() {
        return $this->date;
    }

    function getContent() {
        return $this->content;
    }

}
