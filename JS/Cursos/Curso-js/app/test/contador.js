function atualizaCaracteres() {
    
    var postagem = document.querySelector("#corpo-postagem").value;
    var caracteres = postagem.length;
    console.log("Click");
    var contador = document.querySelector("#numero-caracteres");
    contador.innerHTML = caracteres;
    
}

var campoPostagem = document.querySelector("#corpo-postagem");
    campoPostagem.addEventListener("input", atualizaCaracteres);