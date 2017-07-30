/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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

function messageupdate() {
    setInterval(function () {
        document.querySelector('#chat').innerHTML="";
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'messages_handler/messageupdate.php', true);
//        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let messages = JSON.parse(this.responseText);
                    for (let message in messages){
                        let p = document.createElement('p');
                        p.className = "message";
                        p.textContent = messages[message].author + " : " + messages[message].content;
                        document.querySelector('#chat').appendChild(p);
                    }
                    
//                    p.textContent = this.responseText;
//                    document.querySelector('#chat').innerHTML =  this.responseText;
                }
            }
        };
    }, 500);
}

postmessage();
messageupdate();