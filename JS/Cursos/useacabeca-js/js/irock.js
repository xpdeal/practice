hello();
touchRock();
setTime();

function hello() {
    now = new Date
    if (now.getHours() > 12) {
        alert("Boa tarde truta")
    }
    else {
        alert("bom dia mano")
    }

}


function touchRock() {
    var id = document.querySelector(".rock");    
    var user = prompt("Qual seu nome parça?", "Enter your name here");
    setCookie(user);
    if (user) {
        alert("è nois mano "+ user);
        id.classList.add("smile");
    }
    console.log(user);
    

}

function setTime() {

    setInterval(() => {
        alert("Não me ama!!!");
        var det = document.getElementById("test");
        det.classList.remove("visually-hidden");
    }, 10000);
}

function resizeRock() {
    document.getElementById("image").style.height = (document.body.clientHeight - 100) * 9;
}


    const setCookie = (value) => {
        const cookieName = "nome_user";
        const cookieValue = encodeURIComponent(value);
        const expirationDate = new Date();
        const sameSite = "SameSite=restrict";
        const secure = "Secure";
        expirationDate.setTime(expirationDate.getTime() + 24 * 60 * 60 * 1000);
        document.cookie = `${cookieName}=${cookieValue};expires=${expirationDate.toUTCString()};${sameSite};${secure}`;    
    }
    
    console.log(setCookie)
