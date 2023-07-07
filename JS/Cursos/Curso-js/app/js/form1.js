
var botaoAdicionar = document.querySelector("#adicionar-paciente")
botaoAdicionar.addEventListener("click",function(event){
	//Permite segurar uma ão de envento do html
	event.preventDefault();

	var form = document.querySelector("#form-adiciona");
	// console.log("Voce clickou aqui");
	// console.log(form);
	// console.log(form.altura);
	// console.log(form.altura.value);


// Pegar o valor de um input por meio da propriedade .value

	var nome = form.nome.value;
	// // console.log(nome);
	var peso = form.peso.value;
	var altura = form.altura.value;	
	var gordura = form.gordura.value;
	
    // PErmite cirar qualquer elemento do html
	var pacienteTr = document.createElement("tr");
	// console.log(pacienteTr);

	var nomeTd = document.createElement("td");
	var pesoTd = document.createElement("td");
	var alturaTd = document.createElement("td");
	var gorduraTd = document.createElement("td");
	var imcTd = document.createElement("td");

	//Pegar a td e inserir o valor (conteudo de texto ) esta vindo dos compos do form.var.value
	// usando o .textContent:
	nomeTd.textContent = nome;
	pesoTd.textContent = peso;
	alturaTd.textContent = altura;
	gorduraTd.textContent = gordura;
	imcTd.textContent =calculaImc(peso, altura);

	//Colocar um elemento dentro de outro tds dentro de tr
	//posicionar as <td>'s dentro de cada <tr>'s. 
	//Vamos fazer isso através da função appendChild()
	pacienteTr.appendChild(nomeTd);
	pacienteTr.appendChild(pesoTd);
	pacienteTr.appendChild(alturaTd);
	pacienteTr.appendChild(gorduraTd);
	pacienteTr.appendChild(imcTd);

	console.log(pacienteTr);
	//Por último precisamos adicionar esta <tr> na tabela
	var tabela = document.querySelector("#tabela-pacientes");
	tabela.appendChild(pacienteTr);
	console.log(tabela);
	
});

