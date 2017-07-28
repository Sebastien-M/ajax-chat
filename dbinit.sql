/**
 * Author:  Seb
 * Created: 28 juil. 2017
 */
CREATE DATABASE ajax_chat;
USE ajax_chat;
CREATE TABLE messages (id INT PRIMARY KEY AUTO_INCREMENT, author VARCHAR(300), content VARCHAR(10000), postdate DATETIME);