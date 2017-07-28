/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
document.querySelector("#send").addEventListener("click", function (e) {
    e.preventDefault();
    let message = document.querySelector('#message').value;
    console.log(message);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'createmessage.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("message="+ message);
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let p = document.createElement('p');
                p.textContent = this.responseText;
                document.querySelector('#chat').appendChild(p);
            }
        }
    };
    
});
