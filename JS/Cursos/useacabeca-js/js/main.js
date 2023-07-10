 hello();
 touchRock();

function hello() {
    now = new Date
    if (now.getHours() > 12) {
        alert("Boa tarde truta")
    }
    else {
        alert("bom dia mano")
    }

}


function touchRock(){
var id = document.querySelector(".rock");
var user = prompt("Qual seu nome parça?","Enter ypur name here");
if(user){
alert("ènois mano", + user.textContent +".");
id.classList.add("smile");
}

}