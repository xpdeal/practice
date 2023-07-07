// var pacientes = document.querySelectorAll(".paciente");
var tabela = document.querySelector("table");

tabela.addEventListener("dblclick", function(event) {
    // var alvoEvento = event.target;
    // var paiDoAlvo = alvoEvento.parentNode;// TR = paciente = remopver
    // paiDoAlvo.remove();
    event.target.parentNode.classList.add("fadeOut");
    
    setTimeout(function() {
        event.target.parentNode.remove();
    }, 500);
})

// pacientes.forEach(function(paciente){
//     paciente.addEventListener("dblclick", function(){
//         this.remove();
//         // console.log("fui clicado");
//     })
// });

// console.log(pacientes);