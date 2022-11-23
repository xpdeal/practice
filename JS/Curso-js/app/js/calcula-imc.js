// var titulo = document.querySelector("h1");
var titulo = document.querySelector(".titulo");
titulo.textContent = "Aparecida Nutricionista";

// var paciente = document.querySelector("#primeiro-paciente");
var pacientes = document.querySelectorAll(".paciente");

for(var i = 0; i < pacientes.length ; i++) {

	var paciente = pacientes[i];
	var tdPeso = paciente.querySelector(".info-peso");
	var peso = tdPeso.textContent;

	var tdAltura = paciente.querySelector(".info-altura");
	var altura = tdAltura.textContent;

	var tdImc = paciente.querySelector(".info-imc");

	//validação
	var pesoEhvalido = validaPeso(peso);
	var alturaEhvalida = validaAltura(altura);

	if(!pesoEhvalido){
		console.log("Peso invalido");
		pesoEhvalido = false;
		tdImc.textContent = "Peso invalido";
		paciente.classList.add("paciente-invalido");
	}

	if(!alturaEhvalida){
		console.log("Altura invalido!");
		alturaEhvalida = false;
		tdImc.textContent = "Altura invalida";
		paciente.classList.add("paciente-invalido");
	}

	if (alturaEhvalida && pesoEhvalido){
		var imc = calculaImc(peso, altura);
		tdImc.textContent = imc;
	}
}

function validaPeso(peso){
	if(peso >= 0 && peso <1000){
		return true;
	}else{
		return false;
	}
}

function validaAltura(altura){
	if(altura >= 0 && altura <= 3.0){
		return true;
	}else{
		return false;
	}
}

function calculaImc(peso, altura){
	var imc = 0;
	imc = peso / (altura * altura);
	return imc.toFixed(2);// tofixed retorna 2 casas dec
}
// titulo.addEventListener("click", mostramsn);
// function mostramsn(){
// 	console.log("Most");
// }



// var btn = document.querySelector("#adicionar-paciente");
// btn.addEventListener("click",function(){
// 	console.log("Most");

// });




// console.log(imc);
	
			//PEgar elemento h1 e alterar seu valor
			// console.log(document.querySelector("h1"));
			// var titulo = document.querySelector("h1");
			//console.log(titulo);
			// console.log(titulo.textContent);	
			// console.log(titulo.textContent);	