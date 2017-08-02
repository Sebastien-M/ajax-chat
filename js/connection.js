/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
document.querySelector("#pseudosub").addEventListener("click", function (e) {
    e.preventDefault();
    document.querySelector("#pseudo_error").textContent = "";
    let pseudo = document.querySelector("#pseudo").value;

    if (pseudo === "") {
        document.querySelector("#pseudo_error").textContent = "Invalid pseudo";
    } else {
        document.querySelector(".cover").style.opacity = 0;
        setTimeout(function () {
            document.querySelector(".cover").remove();
        }, 1000);
        
        
        let headers = new Headers({"Content-Type":"application/x-www-form-urlencoded"});
        //headers.append();
        let url = "parts/connected.php";
        
        fetch(url, {
            method: "POST",
            headers: headers,
            body: "pseudo=" + pseudo
        }).then(function (response) {
            return response.text();
        }).then(function (text) {
            console.log(text);
        });
    }
});