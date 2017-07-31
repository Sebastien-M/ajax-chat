/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var lastid;

function postmessage() {
    document.querySelector("#send").addEventListener("click", function (e) {
        e.preventDefault();
        let message = document.querySelector('#message').value;
        console.log(message);
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'messages_handler/createmessage.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("message=" + message);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    return true;
                }
            }
        };
    });
}

function messageshow() {
    document.querySelector('#chat').innerHTML = "";
    //document.querySelector('#chat').scrollTo(0, 0);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'messages_handler/messageshow.php', true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let messages = JSON.parse(this.responseText);
                for (let message in messages) {
                    let p = document.createElement('p');
                    p.className = "message";
                    p.textContent = messages[message].author + " : " + messages[message].content;
                    document.querySelector('#chat').appendChild(p);
                }
                lastid = messages[Object.keys(messages).length].id;
                messageupdate(lastid);
            }
        }
    };
}

function messageupdate(id) {
    setInterval(function () {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'messages_handler/messageupdate.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let messages = JSON.parse(this.responseText);
                    for (let message in messages) {
                        let p = document.createElement('p');
                        p.className = "message";
                        p.textContent = messages[message].author + " : " + messages[message].content;
                        document.querySelector('#chat').appendChild(p);
                    }
                }
            }
        };
        xhr.send("id=" + id);
    }, 500);
}


postmessage();
messageshow();
//messageupdate(lastid);