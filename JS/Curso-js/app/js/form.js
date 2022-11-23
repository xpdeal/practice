var botaoAdicionar = document.querySelector("#adicionar-paciente")
botaoAdicionar.addEventListener("click",function(event){
	//Permite segurar uma ão de envento do html
	event.preventDefault();
	var form = document.querySelector("#form-adiciona");
	//Extrai informações do paciente do form
	var paciente = obtemPacienteDoform(form);
	var erros = validaPaciente(paciente);	
	if(erros.length > 0){
		exibeMensagensDeErro(erros);		
		return;
	}
	//Cria a tr ea td do paciente
	adicionaPacienteNaTabela(paciente);
	//Reseta o form
	form.reset();
	// Reseta os erros do form ao add o paciente
	var msn = document.querySelector("#mensagens-erro");
	msn.innerHTML = "";	
});

function adicionaPacienteNaTabela(paciente){
	//Cria a tr ea td do paciente
	var pacienteTr = montaTr(paciente);
	//Por último precisamos adicionar esta <tr> na tabela
	var tabela = document.querySelector("#tabela-pacientes");
	tabela.appendChild(pacienteTr);

}

//pra cada item do array cria um item e adiciona uma li 
function exibeMensagensDeErro(erros){
	// pega o elemento UL
	var ul = document.querySelector("#mensagens-erro");
	ul.innerHTML = "";// função que limpa o html de cada campo
	//recebe o Array percorre ele e add um ui
	//pra cada item do array executa uma ação
	erros.forEach(function(erro){
		// cria o elemento li
		var li = document.createElement("li");
		//o conteudo de texto desse elemento sera o erro definido no array erros
		li.textContent = erro;
		//coloca dentro da ul o li criado
		ul.appendChild(li);
	});
}
function obtemPacienteDoform(form) {

	var paciente ={// usar essa sintaxe para criar objetos
		nome: form.nome.value,
		peso: form.peso.value,
		altura: form.altura.value,
		gordura: form.gordura.value,
		imc: calculaImc(form.peso.value, form.altura.value)

	}

	return paciente;
	
}

function montaTr(paciente){
	var pacienteTr = document.createElement("tr");
	pacienteTr.classList.add("paciente");

	pacienteTr.appendChild(montaTd(paciente.nome, "info-nome"));
	pacienteTr.appendChild(montaTd(paciente.peso, "info-peso"));
	pacienteTr.appendChild(montaTd(paciente.altura, "info-altura"));
	pacienteTr.appendChild(montaTd(paciente.gordura, "info-gordura"));
	pacienteTr.appendChild(montaTd(paciente.imc, "info-imc"));

	return pacienteTr;
}

function montaTd(dado, classe){
	var td = document.createElement("td");
	td.textContent = dado;
	td.classList.add(classe);

	return td;
}

function validaPaciente(paciente){
	var erros = []; //declarando um array
	// remover as chaves pois é um if simples
	if(!validaPeso(paciente.peso)) erros.push("O peso é invalido"); //FUnção em js que empura um bvalor para um array		
	
	if(!validaAltura(paciente.altura)) erros.push("A altura está invalida"); //FUnção em js que empura um bvalor para um array
	
	if(paciente.nome.length == 0){
		erros.push("O nome não pode ser vasio");
	}
	if(paciente.gordura.length == 0){
		erros.push("O gordura não pode ser vasio");
	}
	if(paciente.peso.length == 0){
		erros.push("O peso não pode ser vasio");
	}
	if(paciente.altura.length == 0){
		erros.push("A altura não pode ser vasio");
	}
	return erros;
}