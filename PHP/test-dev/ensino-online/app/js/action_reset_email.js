$(document).ready(function(){
//-------------------------------------------------------------------------------------------------------
//FUNÇÂO  /////////////////////////////////////////////////////////////////////////////////////////////||
//=======================================================================================================

	/*-----------|RESETAR SENHA E ENVIAR NO E-MAIL|----------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       02/03/2020						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_confirma_email", function(){
	var container = $("#erros_frm");
	mail = $("#mail").val(); 
	console.log("CLICK OK");

	$("#Formcmail").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			 
		 mail	: {required: true, email:true}
		
		}, 
		messages:{
		   
			mail	 : {required: "Informe um e-mail valido",email:"Email Invalido"}
						
		},

	errorElement: 'span',
	errorPlacement: function (error, element) {
	error.addClass('invalid-feedback');
	element.closest('.form-group').append(error);

	},
	highlight: function (element, errorClass, validClass) {
		$(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element).removeClass('is-invalid');
	}
	}); 
	if($("#Formcmail").valid()==true){ 
		$("#btn_confirma_email").html("<i class='fas fa-spinner'></i> Processando...");
		$.post("../controller/sys_troca_senha.php",
			{  
			acao: "Sender",
			
			mail    : $("#mail").val()                
						 
			},function(data){ 
				if (data.status == "OK") {
					// $("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#Formcmail")[0].reset();
					$(location).attr('href','emailok.php?acao=N&mail='+mail);				
					
			} 
			else{
				$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-ban"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mensCmail");
					console.log(data.query);
					// location.href='emailnoook.php';
			}
			$("#btn_confirma_email").html("<i class='fas fa-undo'></i> Tentar  novamente");
		}, "json");
		}
	});			 

/*---------------|FIM DA FUNCAO|------------------*/
//|----------------------------------------------------------------\
///////////////// FIM DA FUNÇÂO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       |
//|----------------------------------------------------------------/		
});	