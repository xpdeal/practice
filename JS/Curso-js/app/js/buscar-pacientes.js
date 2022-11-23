var botaoBuscar = document.querySelector("#buscar-pacientes");

botaoBuscar.addEventListener("click", function(){
    console.log("Buscando");
    var xhr = new XMLHttpRequest();
    //abre a conexão enviando requisição
    xhr.open("GET","http://api-pacientes.herokuapp.com/pacientes");
    //Pega resposta quando a resp tiver carregada "load"vc execua uma função pra min
    xhr.addEventListener("load", function(){
        var erroAjax = document.querySelector("#erro-ajax");
        if(xhr.status === 200){
            erroAjax.classList.add("invisivel");
            var resposta = xhr.responseText;
            var pacientes = JSON.parse(resposta);            
            pacientes.forEach(function(paciente){
                adicionaPacienteNaTabela(paciente);
            });
        }else{
            console.log( xhr.status);
            console.log( xhr.responseText);
            
            erroAjax.classList.remove("invisivel");
        }
       

    });//escutador de evento
    // Pega a conexão e enviam
    xhr.send();
    //Exibir os dados escutando a resposta

});