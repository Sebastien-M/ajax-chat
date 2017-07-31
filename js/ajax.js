/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var objectnb = [];
var objectemp = [];
var maxid;
document.querySelector("#send").addEventListener("click", function (e) {
    e.preventDefault();
    let message = document.querySelector('#message').value;
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
                objectnb.push(messages[message].id);
                document.querySelector('#chat').appendChild(p);
            }
            for (let keys in objectnb) {
                objectemp.push(objectnb[keys]);
            }
            maxid = Math.max.apply(null, objectemp);

        }
    }
};


function update() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'messages_handler/messageupdate.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let newmessages = JSON.parse(this.responseText);
                for (let message in newmessages) {
                    let p = document.createElement('p');
                    p.className = "message";
                    p.textContent = newmessages[message].author + " : " + newmessages[message].content;
                    document.querySelector('#chat').appendChild(p);
                    objectnb = [];
                    objectemp = [];
                    maxid;
                    objectnb.push(newmessages[message].id);
                }
                for (let keys in objectnb) {
                    objectemp.push(objectnb[keys]);
                }
                maxid = Math.max.apply(null, objectemp);
            }
        }
    };
    xhr.send("id=" + maxid);

}
setInterval(function () {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'messages_handler/messagecheck.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let server = parseInt(this.responseText);
                if (maxid < server) {
                    update();
                    console.log("added");
                }
            }
        }
    };

    xhr.send();
}, 500);