$(document).ready(function(){	
//-------------------------------------------------------------------------------------------------------------------------
/////////FUNÇÔES DO SISTEMA /////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================

//-------------------------------------------------------------------------------------------------------
//EMPRESA /////////////////////////////////////////////////////////////////////////////////////////////||
//=======================================================================================================

	/*---------------|FUNCAO PARA CADASTRAR A EMPRESA|--------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

	$(document.body).on("click","#btn_CadEmp", function(){		
	var container = $("#formerros"); 
	$("#FormCadEmp").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			emp_nome    : {required: true, minlength: 5},	
			emp_alias   : {required: true, minlength: 2},	
			emp_cnpj    : {required: true, minlength: 12},				
			cep         : {required: true, minlength: 8},	
			num         : {required: true},	
			emp_contato : {required: true, minlength: 5},
			emp_email   : {required: true, email:true},		
			emp_tel     : {required: true, minlength: 12}	
		},
		messages:{
			emp_nome    : {required:"Informe o nome da Empresa", minlength: "M&iacute;nimo de 5 caracteres."},
			emp_alias   : {required:"Informe o apelido da Empresa", minlength: "M&iacute;nimo de 2 caracteres."},
			emp_cnpj    : {required:"Informe o CNPJ da Empresa", minlength: "M&iacute;nimo de 12 caracteres."},			
			cep         : {required:"Informe Um CEP", minlength: "M&iacute;nimo de 8 caracteres."},
			num         : {required:"Informe Um N&uacute;mero"},
			emp_contato : {required:"Informe Um nome valido", minlength: "M&iacute;nimo de 5 caracteres."},
			emp_email	: {required:"Informe um e-mail valido", email:"Email Invalido"},
			emp_tel     : {required:"Informe o Telefone", minlength: "M&iacute;nimo de 12 caracteres."}
			
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
	//fim do validate
	if($("#FormCadEmp").valid()==true){		
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_record_data.php",
			{ 
			acao:			"Cadastra_Empresa",
			emp_nome:		$("#emp_nome").val(), 
			emp_alias:		$("#emp_alias").val(), 
			emp_cnpj:		$("#emp_cnpj").val(),
			emp_ie:     	$("#emp_ie").val(), 
			cep:    	    $("#cep").val(),
			log:    	    $("#log").val(),
			num:    	    $("#num").val(),
			compl:    	    $("#compl").val(),
			bai:    	    $("#bai").val(),
			cid:    	    $("#cid").val(),
			uf:    	        $("#uf").val(),						
			emp_contato:	$("#emp_contato").val(), 
			emp_email:		$("#emp_email").val(), 
			emp_tel:		$("#emp_tel").val(),
			emp_site:		$("#emp_site").val()
		
			},function(data){
				if (data.status == "OK") {					
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#FormCadEmp")[0].reset(); 
					console.log(data.query);
					// $("#Emp_cad").load("../view/sys_tbEmpresas.php");// atualiza a pagina com o campo inserido 
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-warning"></i> CNPJ j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_CadEmp").html("<i class='fas fa-plus'></i> Nova");
			}, "json");
		}
	});
/*---------------|FIM DO CADASTRO |-------------------------------*/		


    /*-----------------|FUNCAO PARA EDITAR A EMPRESA|---------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
			
	$(document.body).on("click","#btn_EditEmp",function(){	
		//Esse This faz o btn ficar processando
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		console.log("CLICK OK");
		var token = $("#token").val();
		var lista = $("#lista").val();
		cod = $("#emp_id").val();
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Edita_Empresa",
			emp_id: cod,
			emp_nome: 		$("#emp_nome").val(),
			emp_alias:		$("#emp_alias").val(),
			emp_cnpj: 		$("#emp_cnpj").val(),
			emp_ie:     	$("#emp_ie").val(), 
			cep:    	    $("#cep").val(),
			log:    	    $("#log").val(),
			num:    	    $("#num").val(),
			compl:    	    $("#compl").val(),
			bai:    	    $("#bai").val(),
			cid:    	    $("#cid").val(),
			uf:    	        $("#uf").val(),						
			emp_contato:	$("#emp_contato").val(), 
			emp_email:		$("#emp_email").val(), 
			emp_tel:		$("#emp_tel").val(),
			emp_site:		$("#emp_site").val()
		},
		function(data){
			if(data.status=="OK"){				
				$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				$("#FormEditEmp")[0].reset(); 
				console.log(data.query);
				//$("#confirma").modal("hide");
				// $("#aguarde").modal("show");					
				//location.reload();
				// $(location).attr('href','sys_edit_empresa.php?token='+token+'&acao=N&empid='+cod);   
			} 
			else{
				alert(data.mensagem);	 
			}
			$("#btn_EditEmp").html("<i class='fas fa-sync-alt'></i> Alterado");				
		},
		"json"
		);		
	});
/*---------------|FIM DE EDITAR |--------------------------------*/	

//|----------------------------------------------------------------\
///////////////// FIM EMPRESA \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//DEPARTAMENTO //////////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================

	/*--------|FUNCAO PARA CADASTRO DE DEPARTAMENTO|----------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_CadDp", function(){		
	var container = $("#formerros"); 
	$("#FormCadDp").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			sel_emp: {required: true }, 
			dp_nome : {required: true, minlength: 2}	 
		}, 
		messages:{
			sel_emp:  {required:"Selecione uma empresa para esse departamento"},
			dp_nome : {required:"Informe o nome do Departamento", minlength: "M&iacute;nimo de 2 caracteres."}
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
	//fim do validate
	if($("#FormCadDp").valid()==true){ 		
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_record_data.php",
			{
			acao:			"Cadastrar_Departamento",
			sel_emp:	    $("#sel_emp").val(),
			dp_nome:		$("#dp_nome").val() 
		
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#FormCadDp")[0].reset();
					console.log(data.query);
					// $("#Dp_cad").load("sys_tbDepartamentos.php");// atualiza a pagina com o campo inserido 
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-warning"></i> Departamento j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_CadDp").html("<i class='fas fa-plus'></i> Novo");
			}, "json");
		}
	});
/*---------------|FIM DO CADASTRO |-------------------------------*/

    /*------------|FUNCAO PARA EDITAR O DEPARTAMENTO|---------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/  
			
	$(document.body).on("click","#btn_Editdp",function(){
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		console.log("CLICK OK");
		var token = $("#token").val();
		var lista = $("#lista").val();
		cod = $("#dp_id").val();
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Edita_Departamento",
			dp_id: cod,
			dp_nome: $("#dp_nome").val()
		},
		function(data){
			if(data.status=="OK"){
				$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				$("#FormEditdp")[0].reset(); 
				console.log(data.query);
				// $("#confirma").modal("hide");
				// $("#aguarde").modal("show");
				//location.reload(); 
			} 
			else{
				alert(data.mensagem);	
			}
			$("#btn_Editdp").html("<i class='fas fa-sync-alt'></i> Alterado");				
		},
		"json");
	});
/*---------------|FIM DE EDITAR |----------------------------------*/

    /*-------|FUNCAO PARA SELECIONAR O DP REF A EMPRESA|-----------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$("#sel_emp").on("change", function(){
		$("#aguarde").modal("hide");
		
		$.post("../controller/sys_record_data.php",
		{
			acao: "populaCheckDp",  
			fami: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_dp").html(data);
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheck" |------------------*/
  
//|----------------------------------------------------------------\
///////////////// FIM DEPARTAMENTO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                      
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//USUARIO ///////////////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================
	
	/*---------------|CADASTRAR USUARIO|-----------------------*\
	| Author: 	Elvis Leite 				                 	|
	| Version: 	1.0 			            					|
	| Email: 	elvis7t@gmail.com 						        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/
	
	$("#btn_CadUsu").on("click",function(){		
		var container = $("#formerros");
		$("#FormCadUsu").validate({
			debug: true, 
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
			wrapper: 'li',
			rules: {
				usu_nome	: {required: true, minlength: 9},
				usu_email	: {required: true, email:true},
				usu_senha	: {required: true, minlength: 6 },
				usu_csenha	: {required: true, equalTo:"#usu_senha"},
				sel_emp  	: {required: true},                
				sel_dp	    : {required: true}, 
				usu_sexo	: {required: true}, 
				usu_pmail	: {required: true}, 
				usu_pchat	: {required: true}, 
				sel_class	: {required: true} 
			},
			messages: {
				usu_nome	: {required: "Digite o Nome Completo do usuario" , minlength: "Mome e sobrenome."},
				usu_email	: {required: "Informe um e-mail valido", email:"Email Invalido"},
				usu_senha	: {required: "Digite uma senha valida (Minimo 6 caracteres )", minlength: "M&iacute;nimo de 6 caracteres."},
				usu_csenha	: {required: "Digite a senha novamente (Confirme a senha)",equalTo:"As senhas não coincidem"},
				sel_emp  	: {required: "Selecione uma Empresa "},
				sel_dp	    : {required: "Selecione um Departamento"},
				usu_sexo	: {required: "Selecione o sexo"},
				usu_pmail	: {required: "Permissão de e-mail"},
				usu_pchat	: {required: "Permissão de Chat"},
				sel_class	: {required: "Selecione uma classe (Selecione uma Classe)"}
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
		//fim do validate		
		if($("#FormCadUsu").valid()==true){
			$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_record_data.php",
				{
				acao:			"Cadastra_Usuario",
				usu_nome:		$("#usu_nome").val(), 
				usu_email:		$("#usu_email").val(),
				usu_senha:		$("#usu_senha").val(),
				sel_emp:		$("#sel_emp").val(),				
				sel_dp:		    $("#sel_dp").val(),
				sel_class:		$("#sel_class").val(),				
				usu_chapa: 	    $("#usu_chapa").val(),
				usu_ramal:  	$("#usu_ramal").val(),
				usu_cel:    	$("#usu_cel").val(),				
				usu_pmail: 	    $("input[name=usu_pmail]:checked").val(), 
				usu_pchat: 	    $("input[name=usu_pchat]:checked").val(), 
				usu_pcalend:    $("input[name=usu_pcalend]:checked").val(), 
				usu_prel:   	$("input[name=usu_prel]:checked").val(), 
				usu_sexo: 	    $("input[name=usu_sexo]:checked").val() 

				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						 $("#FormCadUsu")[0].reset();// apaga os campos
						// console.log(data.query);
						// $("#usu_cad").load("sys_tbUsuarios.php");// atualiza a pagina com o campo inserido					
					}
					else {
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-exclamation-triangle""></i> Usu&aacute;rio cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_CadUsu").html("<i class='fas fa-plus'></i> Novo");
				}, "json");
		}
	});
/*---------------|FIM CADASTRO |-----------------------------------*/	

	/*-----------|FUNCAO PARA EDITAR USUARIO ATIVO|-----------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		 	
	$(document.body).on("click","#btn_Edit_Usuario",function(){   
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		console.log("CLICK OK");
		var token = $("#token").val(); 
		var lista = $("#lista").val();
		cod = $("#usu_cod").val();
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Edita_Usuario",
			usu_cod: cod,
			usucod:			$("#usu_cod").val(),        
			usu_nome:		$("#usu_nome").val(),
			usu_email:  	$("#usu_email").val(),
			sel_emp:    	$("#sel_emp").val(),        
			sel_dp:  		$("#sel_dp").val(),        
			sel_class:  	$("#sel_class").val(),			
			usu_ramal:  	$("#usu_ramal").val(),
			usu_cel:    	$("#usu_cel").val(),			
			usu_chapa: 		$("#usu_chapa").val(),			
			usu_senha:  	$("#usu_senha").val(),
			usu_ativo: 		($("#usu_ativo").prop("checked") == false?0:1), 
			usu_pmail:  	($("#usu_pmail").prop("checked") == false?0:1), 
			usu_pchat:  	($("#usu_pchat").prop("checked") == false?0:1), 	
			usu_pcalend:	($("#usu_pcalend").prop("checked") == false?0:1), 	
			usu_prelatorio:	($("#usu_prelatorio").prop("checked") == false?0:1), 	
			usu_sexo: 		$("input[name=usu_sexo]:checked").val()   
			  
		},
		function(data){ 
			if(data.status=="OK"){
				$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mensperfil");
				$("#FormEditUsuario")[0].reset(); 
				console.log(data.query);
			} 
			else{
				alert(data.mensagem);	 
			}
			$("#btn_Edit_Usuario").html("<i class='fas fa-sync-alt'></i> Alterado");				
		},
		"json");
	});
/*---------------|FIM DO EDITAR -----------------------------------*/	

	/*---------------|EDITAR DE SENHAS DOS USUÁRIOS |--------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016                 |
	| Botao para alterar senhas de usuário                          |
	\*-------------------------------------------------------------*/
	$("#bt_edit_senha").on("click", function(){
		var container = $("#formerros");	
		$("#FormEditSenha").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
			wrapper: 'li',
			rules: {			  
				sen_nova	: {required:true, minlength: 6 },
				rsen_nova	: {equalTo:"#sen_nova"}
			},
			messages: {				
				sen_nova  : {required: "Digite uma senha valida (Minimo 6 caracteres )", minlength: "M&iacute;nimo de 6 caracteres."},
				rsen_nova : {required: "Digite a senha novamente (Confirme a senha)", equalTo:"As senhas não coincidem"}
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
		
		if($("#FormEditSenha").valid()==true){
			$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
			cod = $("#usu_cod").val();
			$.post("../controller/sys_record_data.php",{
				acao	: "Edita_Senha",
				usu_cod: cod,			
				usucod  : $("#usu_cod").val(),			
				nsenha	: $("#sen_nova").val() 
				},
				function(data){
					if(data.status=="OK"){
						//altera o status tal qual url
						$("#bt_edit_senha").html("<i class='fas fa-save'></i> Salva");
						$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fa fa-check"></i> Senha alterada - ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						console.log(data.query);						
					} 
					else{
						alert(data.mensagem);
					}
				},
				"json"
			);
		}
	});
/*---------------|FIM EDITAR|------------------------------------*\


//|----------------------------------------------------------------\
///////////////// FIM USUARIO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                    
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//PERFIL DE USUARIO//////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================

	/*------------------|EDITAR DO PERFIL|-------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016                 |
	| Botao para alterar ou caastrar os dados do usuário			|
	\*-------------------------------------------------------------*/

	$("#btn_EditPerfil").on("click", function(){
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_record_data.php",{
			acao		: "Edita_Perfil",				
			usu_cod:    $("#usu_cod").val(),
			usu_nome:	$("#usu_nome").val(),
			usu_ramal:  $("#usu_ramal").val(),
			usu_cel:    $("#usu_cel").val(),			
			usu_chapa: 	$("#usu_chapa").val(),			
			cor: 	    $("#sel_cor_dashboard").val(),			
			corpag:	    $("#sel_cor_pag").val(),			
			cormenu:    $("#sel_cor_menu").val()			
			},
			function(data){
				if(data.status=="OK"){					
					$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> Alterado OK - ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mensperfil");	
					$("#FormEditPerfil")[0].reset(); 
					console.log(data.query);
				} 
				else{
					$("<div></div>").addClass("alert alert-danger alert-dismissable").html('<i class="fa fa-times"></i> Ocorreu um erro! ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mensperfil");	
				}				
				$("#btn_EditPerfil").html("<i class='fas fa-sync-alt'></i> Alterado");				
			},
			"json"
		);
	});
/*---------------|FIM ALTERAÇÃO DE PERFIL|------------------------*\
		
	/*---------------|EDITAR DE SENHAS DOS USUÁRIOS DO PERFIL|-----*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016					|
	| Botao para alterar senhas de usuário							|
	\*-------------------------------------------------------------*/
	$("#bt_edit_senha_perfil").on("click", function(){		
		var container = $("#formerros");
		$("#FormSenhaPerfil").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
			wrapper: 'li',
			rules: {			  
				sen_nova	: {required:true, minlength: 6 },
				rsen_nova	: {equalTo:"#sen_nova"}
			},
			messages: {				
				sen_nova : {required: "Digite uma senha valida (Minimo 6 caracteres )", minlength: "M&iacute;nimo de 6 caracteres."},
				rsen_nova	: {required: "Digite a senha novamente (Confirme a senha)", equalTo:"As senhas não coincidem"}
			}
		});		
		if($("#FormSenhaPerfil").valid()==true){
			$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_record_data.php",{
				acao	: "Altera_Senha",					
				nsenha	: $("#sen_nova").val() 
				},
				function(data){
					if(data.status=="OK"){
						//altera o status tal qual url
						$("#bt_edit_senha_perfil").html("<i class='fas fa-save'></i> Salvada");
						$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						console.log(data.query);
					} 
					else{
						alert(data.mensagem);
					}
					
				},
				"json"
			);
		}
	});
/*---------------|FIM EDITAR|------------------------------------*\

//|----------------------------------------------------------------\
///////////////// FIM PERFIL USUARIO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                  
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//E-MAIL/////////////////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================

    /*--------------------|ENVIAR MAIL|----------------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
 	
	$(document.body).on("click","#btn_Envia_mail",function(){ 
		var container = $("#formerros");		
			$("#Envia").validate({
				debug: true,
				errorClass: "error",
				errorContainer: container,
				errorLabelContainer: $("ol", container),
				wrapper: 'li',
				rules: {
					sel_contato     : {required: true},
					assunto     	: {required: true, minlength: 5, maxlength: 20},
					Mensagen    	: {required: true, minlength: 5}					
				}, 
				messages:{				
				sel_contato  	: {required: "Selecione um Contato "},
				assunto	    	: {required: "Informe o Assunto",  minlength: "M&iacute;nimo de 5 caracteres.",  maxlength: "Maximo de 20 caracteres."},
				Mensagen		: {required: "Escreva a mensagen"}			
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
			
		if($("#Envia").valid()==true){ 
			$("#btn_Envia_mail").html("<i class='fas fa-spin fa-spinner'></i> Processando...");				
			$.post("../controller/sys_record_data.php",
				{ 
				acao: "Envia_Mail",				
				sel_contato:	   		$("#sel_contato").val(), 
				assunto:   				$("#assunto").val(),
				Mensagen: 				$("#Mensagen").val()				    
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
						location.reload();  
				} 
				else{
					alert(data.mensagem);	
				}
			},  "json");
		}
	});		
/*---------------|FIM DE ENVIAR MAIL|------------------------------*/

    /*---------------|EDITAR STATUS MAIL LID0|---------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016  				|
	| Botao para alterar ou caastrar os dados do usuário			|
	\*-------------------------------------------------------------*/
	
	$(document.body).on("click","#btn_Lermail",function(){ 
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");		
		console.log("CLICK Ver msn");
		var token = $("#token").val();			
		
		$.post("../controller/sys_record_data.php",{
			acao		: "Mail_lido",
			mail_Id 	: $("#mail_Id").val()
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','sys_pg_mailbox.php?token='+token);   
				} 
				else{
					alert(data.mensagem);	
				}			
			},
			"json"
		);
	});
/*---------------|FIM EDITAR|-------------------------------------*\

    /*----------------------|RESPONDER MAIL|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
 	
	$(document.body).on("click","#btn_Respmail",function(){ 
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		var token = $("#token").val();	
		var container = $("#formerrosRespMail");		
			$("#Formrespmail").validate({
				debug: true,
				errorClass: "error",
				errorContainer: container,
				errorLabelContainer: $("ol", container),
				wrapper: 'li',
				rules: {
				}, 
				messages:{				
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
		if($("#Formrespmail").valid()==true){ 
			$("#btn_Respmail").html("<i class='fas fa-spin fa-spinner'></i> Processando...");				
			$.post("../controller/sys_record_data.php",
				{ 
				acao: "Responder_Mail",				
				destinatario:	   		$("#destinatario").val(), 
				assunto:   				$("#assunto").val(),
				Mensagen: 				$("#Mensagen").val()				    
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','sys_pg_mailbox.php?token='+token);   
				} 
				else{
					alert(data.mensagem);	
				}
			},  "json");
		}
	});		
/*---------------|FIM RESPONDER MAIL|----------------------------*/

//|----------------------------------------------------------------\
///////////////// FIM MAIL \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                      
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//CHATTER/////////////////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================
		
    /*---------------|CHAT ENVIA MENAGEM|--------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 	02/2016												|
	\*-------------------------------------------------------------*/
	
	$(document.body).on("click","#btChatEnvia",function(){
		if($("#para").val()==0 || $("#message").val()==""){
			alert("Selecione um destinatário / escreva uma mensagem");
		}
		else{
			$("#btChaEnvia").attr("disabled",true).html("Enviando... <i class='fas  fa-spin fa-spinner'></i>");
			$.post("../controller/sys_record_data.php",{
			acao		: "ChatEnvia",
			usu_cod		: $("#usu_cod").val(),
			para		: $("#para").val(),
			mensagem	: $("#message").val()
			},
			function(data){
				if(data.status=="OK"){
					$("#message").val("");
					$("#btChatEnvia").attr("disabled",false).html("<i class='fas fa-comment-alt'></i>");
					$("#chatContent").load(location.href+" #msgs");
					//location.reload();
				} 
				else{
					alert("NOK");
					//location.reload();
				}
			},
			"json"
		);
		}
		$("#sys_chatContent").scrollTop($("#msgs").height());
	});
/*---------------|FIM DA MENSAGEM DO CHAT|-------------------------*/	

	/*--------|ENVIAR MENSAGEM DO CHAT COM A TECLA ENTER|----------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	\*-------------------------------------------------------------*/

	$("#message").on("keypress",function(e){
		
		var tecla = (e.keyCode?e.keyCode:e.which);
		if(tecla == 13){
			$("#btChatEnvia").trigger("click");
		}
	});
/*--------|FIM ENVIAR MENSAGEM DO CHAT COM A TECLA ENTER|---------*/	

//|----------------------------------------------------------------\
///////////////// FIM CHATTER \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                     
//|----------------------------------------------------------------/


//------------------------------------------------------------------------------------------------------------
//CALENDÁRIO//////////////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================	

	/*---------------|EDITAR CALENDÁRIO|---------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - 27/04/2016 - Cleber Marrara Prado					|
	| Inserir docs no banco de dados								|
	\*-------------------------------------------------------------*/
	
	$("#bt_EditEv").on("click", function(){
		var container = $("#formerros");
		//e.preventDefault;
		$("#FormEditEvento").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
			wrapper: 'li',
			rules: {
				vcal_datai : {required: true},
				vcal_dataf : {required: true}
			},
			messages: {
				vcal_datai : {required: "Data inicial Obrigat&oacute;ria"},
				vcal_dataf : {required: "Data final Obrigat&oacute;ria"}
			}
		});
		
		if($("#FormEditEvento").valid()==true){
			$("#bt_EditEv").html("<i class='fas fa-spin fa-spinner'></i> Processando...");
			// alert($("#vcal_horaf").data("DateTimePicker").time());
			$.post("../controller/sys_record_data.php",{
				acao	: "Edita_calendario",
				dataini : $("#vcal_datai").val(),
				datafim	: $("#vcal_dataf").val(),
				horaini	: $("#vcal_horai").val(),
				horafim	: $("#vcal_horaf").val(),
				eveusu 	: $("#vcal_eveusu").val(),
				obs 	: $("#vcal_obs").val(),
				calid 	: $("#vcal_id").val()
				},
				function(data){
					if(data.status=="OK"){
						//altera o status tal qual url
						$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-flag-checkered"></i> '+data.mensagem+' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						$("#bt_EditEv").html("<i class='fas fa-sync-alt'></i> Alterado");
					} 					
					else{
						$("<div></div>").addClass("alert alert-danger alert-dismissable").html('<i class="fas fa-times"></i> Ocorreu um erro! ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");	
					}					
					console.log(data.sql);//TO DO mensagem OK
				},
				"json"
			);
		}
	});
/*---------------|FIM DO EDITAR CALENDÁRIO |---------------------*/	

	/*---------------|EXCLUIR EVENTO CALENDÁRIO|-------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 	13/06/2016											|
	\*-------------------------------------------------------------*/
	
	$(document.body).on("click","#Exc_evecal",function(){		
		$.post("../controller/sys_record_data.php",
		{
			acao    : "excluir_evecal",	   
			codigo  : $(this).data("evento")
		},
		function(data){
			if(data.status=="OK"){
				$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fas fa-flag-checkered"></i> '+data.mensagem+' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mensEvent");					   
				console.log(data.mensagem);
				 location.href = "sys_calendario.php?token=" +$("#token").val();
			} else{
				$("<div></div>").addClass("alert alert-danger alert-dismissable").html('<i class="fas fa-times"></i> Ocorreu um erro! ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mensEvent");
			}
			console.log(data.sql);//TO DO mensagem OK
		},
		"json");
	});
/*---------------|FIM DO EXCLUIR CALENDÁRIO |------------------*/	

//|----------------------------------------------------------------\
//////////////// FIM CALENDÁRIO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/	

//---------------------------------------------------------------------------------------------------------------------------------
/////////FIM DAS FUNÇÔES DO SYSTEMA /////////////////////////////////////////////////////////////////////////////////////////////||
//=================================================================================================================================


//-------------------------------------------------------------------------------------------------------------------------
///////// FUNÇÔES  //////////////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================

//-------------------------------------------------------------------------------------------------------------------------
///////// FUNÇÔES DE EQUIPAMENTO  //////////////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================

//------------------------------------------------------------------------------------------------------------
//TIPO DE EQUIPAMENTO//////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================

	/*--------|FUNCAO PARA CADASTRO DE TIPO DE EQUIPAMENTO|---------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_CadTipoeq", function(){
	var container = $("#formerros"); 
	$("#FormCadTipoeq").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			tipo_desc : {required: true, minlength: 3}	 
		}, 
		messages:{		
			tipo_desc : {required:"Informe o nome ", minlength: "M&iacute;nimo de 2 caracteres."}
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
	//fim do validate
	if($("#FormCadTipoeq").valid()==true){ 
		$("#btn_CadTipoeq").html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_record_data.php",
			{
			acao:			"Cadastrar_Tipo_Equipamento",
			tipo_nome:		$("#tipo_desc").val() 
		
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#FormCadTipoeq")[0].reset();
					console.log(data.query);
					// $("#Dp_cad").load("sys_tbDepartamentos.php");// atualiza a pagina com o campo inserido 
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-exclamation-triangle""></i> Tipo de equipamento j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_CadTipoeq").html("<i class='fas fa-plus'></i> Novo");
			}, "json");
		}
	});
/*---------------|FIM DO CADASTRO DE TIPO DE EQUIPAMENTO |------------------*/

	/*------------|FUNCAO PARA EDITAR A TIPO DE EQUIPAMENTO|--------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/  
			
	$(document.body).on("click","#btn_Edit_Tipo",function(){   
		console.log("CLICK OK");
		var token = $("#token").val();
		var lista = $("#lista").val();
		cod = $("#tipo_id").val();
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Edita_Tipo_Equipamento",
			tipo_id: cod,
			tipo_desc: $("#tipo_desc").val()
		},
		function(data){
			if(data.status=="OK"){
				$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				$("#FormEditaTipoeq")[0].reset(); 
				console.log(data.query);
				// $("#confirma").modal("hide");
				// $("#aguarde").modal("show");
				//location.reload(); 
			} 
			else{
				alert(data.mensagem);	
			}
			$("#btn_Edit_Tipo").html("<i class='fas fa-sync-alt'></i> Alterado");				
		},
		"json");
	});
/*---------------|FIM DE EDITAR TIPO DE EQUIPAMENTO|------------------*/



//|----------------------------------------------------------------\
//////////////// FIM TIPO DE EQUIPAMENTO\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/


//------------------------------------------------------------------------------------------------------------
//MARCA//////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================

	/*---------------|FUNCAO PARA CADASTRO DE MARCA|----------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_CadMarca", function(){
	var container = $("#formerros"); 
	$("#FormCadMarca").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			marc_tipoId: {required: true }, 
			marc_nome : {required: true, minlength: 2}	 
		}, 
		messages:{
			marc_tipoId: {required:"Selecione um tipo para essa marca"},
			marc_nome : {required:"Informe o nome ", minlength: "M&iacute;nimo de 2 caracteres."}
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
	//fim do validate
	if($("#FormCadMarca").valid()==true){ 
		$("#btn_CadMarca").html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_record_data.php",
			{
			acao:			"Cadastrar_Marca",
			marc_tipoId:	$("#marc_tipoId").val(),
			marc_nome:		$("#marc_nome").val() 
		
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#FormCadMarca")[0].reset();
					console.log(data.query);
					// $("#Dp_cad").load("sys_tbDepartamentos.php");// atualiza a pagina com o campo inserido 
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-warning"></i> Departamento j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_CadMarca").html("<i class='fas fa-plus'></i> Nova");
			}, "json");
		}
	});
/*-----------------------|FIM DO CADASTRO DE MARCA |------------------*/

    /*------------|FUNCAO PARA EDITAR A MARCA|----------------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/  
			
	$(document.body).on("click","#btn_EditMarca",function(){   
		console.log("CLICK OK");
		var token = $("#token").val();
		var lista = $("#lista").val();
		cod = $("#marc_id").val();
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Edita_Marca",
			marc_id: cod,
			marc_nome: $("#marc_nome").val()
		},
		function(data){
			if(data.status=="OK"){
				$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				$("#FormEditMarca")[0].reset(); 
				console.log(data.query);
				// $("#confirma").modal("hide");
				// $("#aguarde").modal("show");
				//location.reload(); 
			} 
			else{
				alert(data.mensagem);	
			}
			$("#btn_EditMarca").html("<i class='fas fa-sync-alt'></i> Alterado");
		},
		"json");
	});
/*---------------|FIM DE EDITAR MARCA|------------------*/

//|----------------------------------------------------------------\
//////////////// FIM TIPO DE MARCA\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/	

//------------------------------------------------------------------------------------------------------------
//EQUIPAMENO//////////////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================

	/*----------|FUNCA PARA SELECIONAR A MARCA REF AO TIPO|--------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sel_tipoeq").on("change", function(){ 
		$("#aguarde").modal("hide");
		$.post("../controller/sys_record_data.php",
		{
			acao: "populaCheckMarcaEq",  
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_marcaeq").html(data);
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckMarcaeq |------------------*/
  
	/*---------|FUNCAO PARA CADASTRO DE EQUIPAMENTOS|---------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_CadEq", function(){
        var container = $("#formerros"); 
		$("#FormCadEq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				sel_empeq  : {required: true},
                sel_tipoeq : {required: true},
                sel_marcaeq: {required: true},
                eq_modelo  : {required: true, minlength: 2},
                eq_serial  : {required: true, minlength: 5},
                eq_desc    : {required: true, minlength: 3},
                sel_eqstatus  : {required: true},
                eq_valor   : {required: true}
                
			}, 
			messages:{
				sel_empeq   : {required: "Selecione uma Empresa"}, 
                sel_tipoeq  : {required: "Selecione um Tipo"},
                sel_marcaeq : {required: "Selecione uma Marca"},
                eq_modelo   : {required: "Desc. o Modelo", minlength: "M&iacute;nimo de 2 caracteres."},
                eq_serial   : {required: "Desc. o serial", minlength: "M&iacute;nimo de 5 caracteres."},
                eq_desc	    : {required: "Des. o equipamento", minlength: "M&iacute;nimo de 3 caracteres."},
                sel_eqstatus   : {required: "Selecione o Status"},
                eq_valor    : {required: "Desc. o Valor R$"}
            				
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
		if($("#FormCadEq").valid()==true){ 
			$("#btn_CadEq").html("<i class='fas fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_record_data.php",
				{  
				acao:			"Cadastrar_Equipamento",  
				sel_empeq:		$("#sel_empeq").val(), 
			    sel_tipoeq:	   	$("#sel_tipoeq").val(), 
			    sel_marcaeq:   	$("#sel_marcaeq").val(),  
			    eq_modelo:    	$("#eq_modelo").val(), 
			    eq_serial:    	$("#eq_serial").val(), 
			    eq_desc:	   	$("#eq_desc").val(),  
			    sel_eqstatus:	$("#sel_eqstatus").val(),
			    eq_valor:	   	$("#eq_valor").val()
							 
				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						$("#FormCadEq")[0].reset();
						console.log(data.query);
						// $("#eq_cad").load("at_tbEquipamentos.php");// atualiza a pagina com o campo inserido 
		 			}
					else { 
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-exclamation-triangle""></i> Serial j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_CadEq").html("<i class='fas fa-plus'></i> Novo");
				}, "json");
			}
	}); 
/*---------------|FIM DO CADASTRO DE EQUIPAMENTOS |------------------*/	

    /*---------------|ALTERAR  EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_EditEq", function(){        
		console.log("CLICK OK");
		var token = $("#token").val(); 
		var lista = $("#lista").val();
		cod = $("#eq_id").val(); 
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Editar_Equipamento", 
			eq_id: cod,
			eq_serial: $("#eq_serial").val(),
			eq_desc:   $("#eq_desc").val(),
			eq_modelo: $("#eq_modelo").val(), 
			sel_eqstatus: $("#sel_eqstatus").val(),   				     
			eq_valor:  $("#eq_valor").val()
			
		},
		function(data){
				if(data.status=="OK"){
					$("#btn_EditEq").html("<i class='fas fa-sync-alt'></i> Alterado");		
					$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#FormEditEq")[0].reset(); 
					console.log(data.query);
					// $("#confirma").modal("hide");
					// $("#aguarde").modal("show");
					//location.reload(); 
				} 
				else{
					alert(data.mensagem);	
				}
			},	"json");
			
	}); 
/*---------------|FIM DE ALTERAR EQUIPAMENTOS|------------------*/	

    /*-------------|FUNÇÂO GERAR QRCODE  DE  EQUIPAMENTOS|---------*\
	|	Author: 	Elvis Leite da Silva							| 
	|	E-mail: 	elvis7t@gmail.com				            	|
	|	Version:	1.0												|
	|	Date:       14/09/2017						   				|
	\--------------------------------------------------------------*/ 
 
	$(document.body).on("click","#btn_qrcodeEq",function(){
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Gerando...");	
		console.log("CLICK OK");
		var token = $("#token").val();
		var lista = $("#lista").val(); 
		cod = $("#eq_id").val();		
		
		$.post("../images/qrcode_img/acao_Qrcode.php",{ 
			acao: "Gerar_qrcodeEq",
			eq_id: cod, 
			  
		},
		function(data){
			if(data.status=="OK"){
				$("#aguarde").modal("show");							
				$(location).attr('href','eq_edit_equipamento.php?token='+token+'&acao=N&eqid='+cod); 
			} 
			else{
				alert(data.mensagem);	
			}
		},
		"json");
	});	
	
/*---------------|FIM DE FUNÇÂO GERAR QRCODE  DE  EQUIPAMENTOS|------------------*/	

//|----------------------------------------------------------------\
//////////////// FIM EQUIPAMENTO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/	


//-------------------------------------------------------------------------------------------------------------------------
///////// FIM FUNÇÔES DE EQUIPAMENTO  //////////////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================


//------------------------------------------------------------------------------------------------------------
//RELATÒRIO//////////////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================

	/*------------|RELATORIO DE EQUIPAMENTOS INATIVOS|-------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	\*-------------------------------------------------------------*/
	$(document.body).on("click","#bt_relEqdesc", function(){
	var tabela 	= $("#rel_tbl").val();
	var di 		= $("#rel_di").val(); 
	var df 		= $("#rel_df").val();
		if(tabela == ""){
			alert("Preencha o campo Tabela!"); 
		} 
		else{
			$(this).html("<i class='fas fa-spinner'></i> Gerando...");
			

			$("#rls").load('rel_corp_eqdesc.php?tabela='+tabela+'&di='+di+'&df='+df);
			$("#bt_print").attr({
				'href':'rel_print_eqdesc.php?tabela='+tabela+'&di='+di+'&df='+df
			});
			$("#bt_excel").attr({
				'href':'rel_excel_eqdesc.php?tabela='+tabela+'&di='+di+'&df='+df
			}); 
			console.log('rel_corp_eqdesc.php?tabela='+tabela+'&di='+di+'&df='+df);			
		}
		$(this).html("<i class='fas fa-file-pdf'></i> Gerado");
	});
/*---------------|FIM DE EQUIPAMENTO INATIVOS|------------------*/	

//---------------------------------------------------------------------------------------------------------------------------------
/////////FIN RELATORIO  /////////////////////////////////////////////////////////////////////////////////////////////||
//=================================================================================================================================

//-------------------------------------------------------------------------------------------------------------------------
///////// ENVIO DE E_MAIL  ///////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================

	/*---------------|FUNCAO PARA CADASTRO RECLAMAÇÂO|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_CadRec", function(){
	var token = $("#token").val();	
	var container = $("#formerros"); 
	var checkeditems = $('input:checkbox[name="cli_anonimo[]"]:checked')
	.map(function() { return $(this).val() })
                   .get()
                   .join(";");
	$("#FormCadRec").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			sel_orig    	: {required: true},	 
			sel_area    	: {required: true},	 
			at_cli_nome    	: {required: true, minlength: 5}
		}, 
		messages:{		
			sel_orig 	 : {required:"Selecione a Origem "},
			sel_area 	 : {required:"Selecione a Area "},
			at_cli_nome	 : {required:"Informe o Nome ", minlength: "M&iacute;nimo de 5 caracteres."}
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
	//fim do validate
	if($("#FormCadRec").valid()==true){ 
		$("#btn_CadRec").html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_record_data.php",
			{
			acao:			"Cadastra_Reclamacao",
			infochecbox 	: checkeditems,
			sel_orig		:	$("#sel_orig").val(), 
			sel_linha		:	$("#sel_linha").val(), 
			sel_emtu		:	$("#sel_emtu").val(), 
			sel_area		:	$("#sel_area").val(), 
			at_cli_nome		:	$("#at_cli_nome").val(), 
			at_cli_email	:	$("#at_cli_email").val(), 
			at_cli_tel		:	$("#at_cli_tel").val(), 
			at_descricao	:	$("#at_descricao").val()
				
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$(location).attr('href','sac_pg_reclamacao.php?token='+token);   
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-exclamation-triangle""></i> Tipo de equipamento j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_CadRec").html("<i class='fas fa-plus'></i> Novo");
			}, "json");
		}
	});
	
	
	/*----------------|FUNCAO PARA ENVAIR E_MAIL |------------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_CadRec", function(){
        var token = $("#token").val();
		var container = $("#formerros"); 		
		if($("#FormCadRec").valid()==true){ 
			$("#btn_CadRec").html("<i class='fas fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_record_data.php",
				{  
				acao:			"Envia_email_reclamacao",  				 			   
			    sel_area:     	$("#sel_area").val()
							 
				},function(data){
					if(data.status=="OK"){
					console.log(data.query);					
				} 
				else{
					alert(data.mensagem);	
				}
			}, "json");
			}
	}); 

/*-----------------------|FIM DO CADASTRO |------------------*/
//-------------------------------------------------------------------------------------------------------------------------
///////// FIM ENVIA E_MAIL  ///////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================



//---------------------------------------------------------------------------------------------------------------------------------
/////////FIN DAS FUNÇÔES  /////////////////////////////////////////////////////////////////////////////////////////////||
//=================================================================================================================================
});	