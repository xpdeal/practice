<?php
date_default_timezone_set('America/Sao_paulo');
session_start();
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
date_default_timezone_set("America/Sao_Paulo");
$fn = new functions(); 
$rs = new recordset();
extract($_POST);
$resul = array(); 
$res = array();
$dados = array();
//-------------------------------------------------------------------------------------------------------------------------
/////////FUNÇÔES DO SYSTEMA /////////////////////////////////////////////////////////////////////////////////////////////||
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

	if($acao == "Cadastra_Empresa"){
		$logo ="/images/logo_emp/default-logo.png";
		//Busca informação no bando se o nome já exixte
			$rs->seleciona("emp_cnpj","sys_empresa","emp_cnpj='{$emp_cnpj}'");
			if($rs->linhas<>0){
				$resul['status'] = "Erro";
				$resul['status'] = "CNPJ j&aacute; cadastrado";
				$resul['mensagem'] = $rs->sql;  
			}
			ELSE{	
				$cod = $rs->autocod("emp_id","sys_empresa");
				$dados['emp_id']        = $cod;
				$dados["emp_nome"]	    = $emp_nome; 
				$dados["emp_alias"] 	= $emp_alias; 
				$dados["emp_cnpj"]   	= $emp_cnpj;
				$dados["emp_ie"]	    = $emp_ie; 
				$dados["emp_cep"]	    = $cep;   
				$dados["emp_log"]	    = $log;
				$dados["emp_num"]	    = $num;   
				$dados["emp_compl"]	    = $compl;   
				$dados["emp_bai"]	    = $bai;   
				$dados["emp_cid"]	    = $cid;   
				$dados["emp_uf"]	    = $uf;   
				$dados["emp_contato"]	= $emp_contato; 
				$dados["emp_email"]	    = $emp_email; 
				$dados["emp_tel"]		= $emp_tel; 
				$dados["emp_site"]		= $emp_site;   
				$dados["emp_logo"]		= $logo;   
														
				if(!$rs->Insere($dados,"sys_empresa")){
					$resul['status'] = "OK";
					$resul['mensagem'] = "Empresa cadastrada com sucesso!";
				}
				else{
					$resul['status'] = "Erro";
					$resul['mensagem'] = $rs->sql;
					}
				}
		
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DO CADASTRO|--------------------------------*/	

    /*-----------------|FUNCAO PARA EDITAR A EMPRESA|---------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Edita_Empresa"){
		$dados['emp_nome']		= $emp_nome; 	
		$dados['emp_alias']		= $emp_alias;	
		$dados['emp_cnpj']		= $emp_cnpj;
		$dados['emp_ie']	    = $emp_ie; 
		$dados['emp_cep']	    = $cep;   
		$dados['emp_log']	    = $log;
		$dados['emp_num']	    = $num;   
		$dados['emp_compl']	    = $compl;   
		$dados['emp_bai']	    = $bai;   
		$dados['emp_cid']	    = $cid;   
		$dados['emp_uf']	    = $uf;   
		$dados['emp_contato']	= $emp_contato; 
		$dados['emp_email']	    = $emp_email; 
		$dados['emp_tel']		= $emp_tel; 
		$dados['emp_site']		= $emp_site; 
		$whr = "emp_id=".$emp_id; 
		
		if(!$rs->Altera($dados, "sys_empresa",$whr)){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Empresa atualizada!"; 		  
		}
		else{
			$resul['mensagem']	= "Ocorreu um erro..."; 
			$resul['sql']		= $rs->sql;  
			}	
		echo json_encode($resul);
		exit;
	}	
/*---------------|FIM DO EDITAR|---------------------------------*/	

//|----------------------------------------------------------------\
///////////////// FIM EMPRESA \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//DEPARTAMENTO //////////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================
	
	/*-----|FUNCAO PARA CADASTRO DE DEPARTAMENTO|---------------\
	| Author: 	Cleber Marrara Prado 				           	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/
	
	if($acao == "Cadastrar_Departamento"){  
		$sql ="SELECT dp_nome FROM sys_departamento a
			JOIN sys_empresa b ON b.emp_id = a.dp_empId
			WHERE dp_nome = '".$dp_nome."'And dp_empId=".$sel_emp;	
			$rs->FreeSql($sql);
			if($rs->linhas <>0){
				$resul['status'] = "Erro";
				$resul['status'] = "Nome j&aacute; cadastrado";
				$resul['mensagem'] = $rs->sql;  
			}ELSE{
			$cod = $rs->autocod("dp_id","sys_departamento");
			$dados['dp_id']     = $cod;
			$dados["dp_empId"]	= $sel_emp; 
			$dados["dp_nome"]	= $dp_nome;
		
		if(!$rs->Insere($dados,"sys_departamento")){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Departamento cadastrado com sucesso!";
		}
		else{
			$resul['status'] = "Erro";
			$resul['mensagem'] = $rs->sql;
			
			}
		}		
		echo json_encode($resul); 
		exit;
	}
/*---------------|FIM DO CADASTRO |--------------------------------*/	

    /*------------|FUNCAO PARA EDITARR A DEPARTAMENTO|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Edita_Departamento"){
		$dados['dp_nome']	= $dp_nome;	 
		$whr = "dp_id=".$dp_id; 
		
		if(!$rs->Altera($dados, "sys_departamento",$whr)){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Departamento atualizado!"; 
			$resul['sql'] = $rs->sql;
			  
		}
		else{
			$resul['mensagem']	= "Ocorreu um erro..."; 
			$resul['sql']		= $rs->sql;  
		}	
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DO EDITAR |-----------------------------*/	

    /*---|FUNCA PARA SELECIONAR O DP REF A EMPRESA|------------*\
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/	 
	
	if($acao == "populaCheckDp"){
		$sql = "SELECT * FROM sys_departamento WHERE dp_empId=".$fami;
		$rs->FreeSql($sql); 
		$opt = "<option value=''>Selecione...</option>";
		while($rs->GeraDados()){
			$opt .= "<option value='".$rs->fld('dp_id')."'>".$rs->fld('dp_nome')."</option>";
		}
		echo $opt;
	}
/*---------------|FIM DA FUNCAO "populaCheckDp |------------------*/

//|----------------------------------------------------------------\
///////////////// FIM DEPARTAMENTO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//USUARIO ///////////////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================
	
    /*---------------|AÇÂO PARA CADASTRAR USUARIO|-------------*\
	| Author: 	Elvis Leite 				                 	|
	| Version: 	1.0 			            					|
	| Email: 	elvis7t@gmail.com 						        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/
	if($acao == "Cadastra_Usuario"){
		//Define imagem por genero
		if($usu_sexo == 'M'){
			$foto ="/images/perfil/masc.jpg";
		}
		ELSE{
			$foto ="/images/perfil/fem.jpg";
			}
			//Busca informação no bando se o nome já exixte
			$rs->seleciona("usu_email","sys_usuario","usu_email='{$usu_email}'");
		if($rs->linhas<>0){
			$resul['status'] = "Erro";
			$resul['status'] = "Nome j&aacute; cadastrado";
			$resul['mensagem'] = $rs->sql;  
		}ELSE{	
				$cod = $rs->autocod("usu_cod","sys_usuario");
				$dados['usu_cod']       = $cod;
				$dados["usu_nome"] 		= $usu_nome;
				$dados["usu_email"]	    = $usu_email; 
				$dados["usu_senha"] 	= trim(md5($usu_senha));
				$dados["usu_empId"] 	= $sel_emp ; 
				$dados["usu_dpId"] 	    = $sel_dp ;
				$dados["usu_classeId"] 	= $sel_class;				
				$dados["usu_chapa"]    	= $usu_chapa;
				$dados["usu_ramal"] 	= $usu_ramal;
				$dados["usu_cel"] 	   	= $usu_cel;		
				$dados['usu_foto']	    = $foto ;  
				$dados["usu_ativo"] 	= "1";
				$dados["usu_pmail"]	    = $usu_pmail;
				$dados["usu_pchat"]	    = $usu_pchat;
				$dados["usu_prelatorio"]= $usu_prel;
				$dados["usu_sexo"] 	    = $usu_sexo;
				$dados["usu_online"] 	= "0";
				$dados["usu_dashId"]	= "1"; 
				$dados["usu_mnutopId"]	= "7"; 
				$dados["usu_pagId"]		= "10"; 
				$dados["usu_datacad"]   = date("Y-m-d H:i:s");
				$dados["usu_usucadId"] 	= $_SESSION['usu_cod']; 
				
				if(!$rs->Insere($dados,"sys_usuario")){
					$resul['status'] = "OK";
					$resul['mensagem'] = "Usuario cadastrado com sucesso!";
				}
				else{ 
					$resul['status'] = "Erro";
					$resul['mensagem'] = $rs->sql;
				}
			}
		echo json_encode($resul);
		exit; 
	}
/*---------------|FIM CADASTRO|------------------------------------*/	

	/*-----------|FUNCAO PARA EDITAR USUARIO ATIVO|-----------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Edita_Usuario"){
		$dados["usu_nome"]	    = $usu_nome;  
		$dados["usu_email"]	    = $usu_email; 
		$dados["usu_empId"]	    = $sel_emp;
		$dados["usu_dpId"]	    = $sel_dp;	   
		$dados["usu_classeId"]	= $sel_class; 			
		$dados["usu_ramal"] 	= $usu_ramal;	
		$dados["usu_cel"] 	    = $usu_cel;			
		$dados["usu_chapa"]    	= $usu_chapa;		
		$dados["usu_ativo"]	    = $usu_ativo; 
		$dados["usu_pmail"]	    = $usu_pmail; 
		$dados["usu_pchat"]	    = $usu_pchat; 
		$dados["usu_pcalend"]   = $usu_pcalend; 
		$dados["usu_prelatorio"]= $usu_prelatorio; 
		$dados["usu_sexo"]	    = $usu_sexo; 	
		$whr = "usu_cod=".$usucod; 
		
		if(!$rs->Altera($dados, "sys_usuario",$whr)){
				$resul["status"] = "OK";
				$resul["mensagem"] = "Dados Alterados!";
				$resul["sql"] = $rs->sql;
			} else {
				$resul["status"] = "ERRO";
				$resul["mensagem"] = "Falha no envio";
				$resul["sql"] = $rs->sql; 
			}	
		echo json_encode($resul); 
		exit; 
	}
/*---------------|FIM DO EDITAR|-----------------------------------*/	

    /*---------------|EDITAR DE SENHA DO USUÁRIO ------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016                 |
	| Botao para alterar ou caastrar os dados do usuário			|
	\*-------------------------------------------------------------*/

	if($acao == "Edita_Senha"){
			$dados["usu_senha"] = md5($nsenha);
			$whr = "usu_cod=".$usucod; 
			
			if(!$rs->Altera($dados, "sys_usuario",$whr)){
				$resul["status"] = "OK";
				$resul["mensagem"] = " OK!";
				$resul["sql"] = $rs->sql;
			} else {
				$resul["status"] = "ERRO";
				$resul["mensagem"] = "Falha no envio";
				$resul["sql"] = $rs->sql; 
			}			
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM EDITAR|------------------------------------*\


//|----------------------------------------------------------------\
///////////////// FIM USUARIO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//PERFIL DE USUARIO//////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================

	/*---------------|EDITAR  PERFIL|------------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016                 |
	| Botao para alterar ou caastrar os dados do usuário			|
	\*-------------------------------------------------------------*/

	if($acao == "Edita_Perfil"){
		$dados["usu_nome"]	    = $usu_nome;
		$dados["usu_ramal"] 	= $usu_ramal;	
		$dados["usu_cel"] 	    = $usu_cel;			
		$dados["usu_chapa"]    	= $usu_chapa;			
		$dados["usu_dashId"]	= $cor;	
		$dados["usu_pagId"] 	= $corpag;	
		$dados["usu_mnutopId"]	= $cormenu;	
		
		$whr = "usu_cod=".$usu_cod; 
		if(!$rs->Altera($dados, "sys_usuario",$whr)){
				$resul["status"] = "OK";
				$resul["mensagem"] = "Dados Alterados!";
				$resul["sql"] = $rs->sql;
			} else {
				$resul["status"] = "ERRO";
				$resul["mensagem"] = "Falha no envio";
				$resul["sql"] = $rs->sql; 
			}
		 echo json_encode($resul);
		exit;
	}
/*---------------|FIM EDITAR|-------------------------------------*\

    /*---------------|EDITAR DE SENHA DO USUÁRIO ------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016                 |
	| Botao para alterar ou caastrar os dados do usuário			|
	\*-------------------------------------------------------------*/

	if($acao == "Altera_Senha"){
			$dados["usu_senha"] = md5($nsenha);
			$whr = "usu_cod =".$_SESSION['usu_cod'];
			
			if(!$rs->Altera($dados, "sys_usuario",$whr)){
				$resul["status"] = "OK";
				$resul["mensagem"] = "Senha Alterada!";
				$resul["sql"] = $rs->sql;
			} else {
				$resul["status"] = "ERRO";
				$resul["mensagem"] = "Falha no envio";
				$resul["sql"] = $rs->sql; 
			}			
		echo json_encode($resul);
		exit;
	}
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
	
	if($acao == "Envia_Mail"){
			foreach ($sel_contato as $value) {
			$cod = $rs->autocod("mail_Id","sys_mail");
			$dados["mail_Id"]		            = $cod;
			$dados["mail_envio_usuempId"]		= $_SESSION['usu_empresa']; 
			$dados["mail_envio_usudpId"]	    = $_SESSION['usu_departamento']; 
			$dados["mail_envio_usuId"]	        = $_SESSION['usu_cod']; 	
			$dados["mail_destino_usuId"] 	    = addslashes($value);
			$dados["mail_assunto"]          	= $assunto;
			$dados["mail_mensagem"] 		    = $Mensagen;
			$dados["mail_data"] 		        = date('Y-m-d H:i:s');
			$dados["mail_envio_statusId"] 		= '3';
			$dados["mail_statusId"] 		    = '1';
			
			if(!$rs->Insere($dados,"sys_mail")){
				$resul['status']   = "OK";
				$resul['mensagem'] = "Mensagem enviada com sucesso!";
			}
			else{
				$resul['status'] = "Erro";
				$resul['mensagem'] = $rs->sql;
			}
		}
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DE ENVIAR MAIL|------------------------------*/

    /*---------------|EDITAR STATUS MAIL LID0|---------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016  				|
	| Botao para alterar ou caastrar os dados do usuário			|
	\*-------------------------------------------------------------*/

	if($acao == "Mail_lido"){
		//echo $arr_habil;
		$dados["mail_statusId"]      = "2";
		$dados["mail_data_lido"]     = date('Y-m-d H:i:s');
		$whr = "mail_Id =".$mail_Id;   
		
		if(!$rs->Altera($dados, "sys_mail",$whr)){
				$resul["status"] = "OK";
				$resul["mensagem"] = "Dados Alterados!";
				$resul["sql"] = $rs->sql;
			} else {
				$resul["status"] = "ERRO";
				$resul["mensagem"] = "Falha no envio";
				$resul["sql"] = $rs->sql;
			}		 
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM AEDITAR|------------------------------------*\

    /*----------------------|RESPONDER MAIL|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	if($acao == "Responder_Mail"){
			
			$cod = $rs->autocod("mail_Id","sys_mail");
			$dados["mail_Id"]		            = $cod;
			$dados["mail_envio_usuempId"]		= $_SESSION['usu_empresa']; 
			$dados["mail_envio_usudpId"]	    = $_SESSION['usu_departamento']; 
			$dados["mail_envio_usuId"]	        = $_SESSION['usu_cod']; 	
			$dados["mail_destino_usuId"] 	    = $destinatario;
			$dados["mail_assunto"]          	= $assunto;
			$dados["mail_mensagem"] 		    = $Mensagen;
			$dados["mail_data"] 		        = date('Y-m-d H:i:s');
			$dados["mail_envio_statusId"] 		= '3';
			$dados["mail_statusId"] 		    = '1';
			
			if(!$rs->Insere($dados,"sys_mail")){
				$resul['status'] = "OK";
				$resul['mensagem'] = "Mensagem enviada com sucesso!";
			}
			else{
				$resul['status'] = "Erro";
				$resul['mensagem'] = $rs->sql;
			}
		echo json_encode($resul);
		exit;
	}
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

	if($acao == "ChatEnvia"){
		$cod = $rs->autocod("chat_id","sys_chat");
		$dados["chat_id"]	= $cod;
		$dados["chat_msg"]	= addslashes($mensagem);
		$dados["chat_de"] 	= $usu_cod;
		$dados["chat_para"] = $para;
		$dados["chat_lido"]	= 0;
		$dados["chat_hora"] = date("Y-m-d H:i:s"); 
		if (!$rs->Insere($dados,"sys_chat")) {
			$resul["status"] = "OK";
			$resul["mensagem"] = "Novo evento cadastrado!";
			$resul["sql"] = $rs_eve->sql;
		} else {
			$resul["status"] = "ERRO";
			$resul["mensagem"] = "Falha no envio";
			$resul["sql"] = $rs_eve->sql;
		}
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DA MENSAGEM DO CHAT|------------------*/	

//|----------------------------------------------------------------\
///////////////// FIM CHATTER \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       
//|----------------------------------------------------------------/


//------------------------------------------------------------------------------------------------------------
//EVENTO//////////////////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================

	/*---------------|CADASTRAR EVENTO|----------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - 27/04/2016 - Cleber Marrara Prado					|
	| Inserir docs no banco de dados								|
	\*-------------------------------------------------------------*/

	if($acao == "Cadastrar_evento"){
		$dados["eve_desc"]	= $desc;
		$dados["eve_cor"]	= $cor;
		$dados["eve_tema"]	= $tema;
		$dados["eve_dep"]	= "[".$_SESSION['usu_cod']."]";
		$rs->Insere($dados, "sys_evento");
		exit;
	}
/*---------------|FIM CADASTRO|-----------------------------------*/	

	/*-----------|CADASTRAR CALENDÁRIO|----------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - 27/04/2016 - Cleber Marrara Prado					|
	| Inserir docs no banco de dados								|
	\*-------------------------------------------------------------*/

	if($acao == "Cadastrar_calendario"){
		
		$meses = array("Jan"=>1,"Feb"=>2,"Mar"=>3,"Apr"=>4,"May"=>5,"Jun"=>6, "Jul"=>7,"Aug"=>8, "Sep"=>9, "Oct"=>10, "Nov"=>11,"Dec"=>12);
		$dat_ = explode(" ",$dt);
		$dte = $dat_[3]."-".$meses[$dat_[1]]."-".$dat_[2];
		$us="";
		if(!empty($users)){
			foreach($users as $user){
				$us.= "[".$user."]";
			}
		}else{
			$us = "[".$_SESSION['usu_cod']."]";
		}
		$dados["cal_id"]		= $nc;
		$dados["cal_eveid"]		= $evento;
		$dados["cal_eveusu"]	= ($vpt == 1? "[9999]" : $us);
		$dados['cal_dataini']	= $dte;
		$dados['cal_horaini']	= date('H:i');;
		$dados['cal_datafim']	= $dte;
		$dados["cal_url"]		= "sys_vis_evecal.php?calid=".$nc;
		$dados["cal_criado"]	= $_SESSION['usu_cod'];

		if(!$rs->Insere($dados,"sys_calendario")){
			$resul['mensagem'] = $fn->data_br($dte);
		}
		else{$resul["mensagem"] = "ERRO";}
		echo json_encode($resul);	
		exit;
	}
/*---------------|FIM CADASTRAR|-----------------------------------*/	


	/*---------------|EDITA CALENDÁRIO|----------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - 27/04/2016 - Cleber Marrara Prado					|
	| Inserir docs no banco de dados								|
	\*-------------------------------------------------------------*/

	if($acao == "Edita_calendario"){
		$us="";
		if(!empty($eveusu)){
			foreach($eveusu as $user){
				$us.= "[".$user."]";
			}
		}else{
			$us = "[".$_SESSION['usu_cod']."]";
		}
		$dados['cal_dataini']	= $fn->data_usa($dataini);
		$dados['cal_datafim']	= $fn->data_usa($datafim);
		$dados['cal_horaini']	= $horaini;
		$dados['cal_horafim']	= $horafim;
		$dados["cal_eveusu"]	= $us;
		$dados['cal_obs']		= addslashes($obs);
		$whr = "cal_id = ".$calid;
		if(!$rs->Altera($dados, "sys_calendario", $whr)){
			$resul['status']	= "OK";
			$resul['mensagem']	= "Evento alterado com sucesso!";
			$resul['link']		= "sys_calendario.php";
		}
		else{
			$resul['mensagem']	= "Ocorreu um erro...";
			$resul['sql']		= $rs->sql;
		}
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DO EDITAR |---------------------------------*/	

	/*---------------|EXCLUIR EVENTO CALENDÁRIO|-------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 	13/06/2016											|
	\*-------------------------------------------------------------*/

	if ($acao == "excluir_evecal") {
		if(!$rs->Exclui("sys_calendario","cal_id=".$codigo)){
			$resul['status'] = "OK";
			$resul['mensagem']="Dado excluido da tabela sys_calendario";
			$resul['sql']=$rs->sql;
		}
		else{
			$resul['status']="NOK";
			$resul['mensagem']="Falha no SQL";
			$resul['sql']=$rs->sql;
		}
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DO EXCLUIR CALENDÁRIO |--------------------*/	

//|----------------------------------------------------------------\
//////////////// FIM EVENTO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/	

//---------------------------------------------------------------------------------------------------------------------------------
/////////FIN DAS FUNÇÔES DO SYSTEMA /////////////////////////////////////////////////////////////////////////////////////////////||
//=================================================================================================================================


//-------------------------------------------------------------------------------------------------------------------------
///////// FUNÇÔES  //////////////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================


//------------------------------------------------------------------------------------------------------------
//TIPO DE EQUIPAMENTO//////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================

	/*-----|FUNCAO PARA CADASTRO DE TIPO DE EQUIPAMENTO|--------\
	| Author: 	Cleber Marrara Prado 				           	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/
	
	if($acao == "Cadastrar_Tipo_Equipamento"){  
		$sql ="SELECT tipo_desc FROM eq_tipo 
			WHERE tipo_desc = '".$tipo_nome."'";	
			$rs->FreeSql($sql);
			if($rs->linhas <>0){
				$resul['status'] = "Erro";
				$resul['status'] = "Nome j&aacute; cadastrado";
				$resul['mensagem'] = $rs->sql;  
			}ELSE{
			$cod = $rs->autocod("tipo_id","eq_tipo");
			$dados['tipo_id']   = $cod;		
			$dados["tipo_desc"]	= $tipo_nome;
		
		if(!$rs->Insere($dados,"eq_tipo")){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Tipo de equipameno cadastrado com sucesso!";
		}
		else{
			$resul['status'] = "Erro";
			$resul['mensagem'] = $rs->sql;
			
			}
		}
		
		echo json_encode($resul); 
		exit;
	}
/*---------------|FIM DO CADASTRO TIPO DE EQUIPAMENTO |------------------*/	

    /*------------|FUNCAO PARA EDITARR O TIPO DE EQUIPAMENTO|-------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Edita_Tipo_Equipamento"){
		$dados['tipo_desc']	= $tipo_desc;	 
		$whr = "tipo_id=".$tipo_id; 
		
		if(!$rs->Altera($dados, "eq_tipo",$whr)){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Nome atualizado!"; 
			$resul['sql'] = $rs->sql;
			  
		}
		else{
			$resul['mensagem']	= "Ocorreu um erro..."; 
			$resul['sql']		= $rs->sql;  
		}	
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DO EDITAR A TIPO DE EQUIPAMENTO |------------------*/	

//|----------------------------------------------------------------\
//////////////// FIM TIPO DE EQUIPAMENTO\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/

//-------------------------------------------------------------------------------------------------------
//MARCA //////////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================
	
	/*------------|FUNCAO PARA CADASTRO DE MARCA|---------------\
	| Author: 	Cleber Marrara Prado 				           	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/
	
	if($acao == "Cadastrar_Marca"){  
		$sql ="SELECT marc_nome FROM eq_marca a
			JOIN eq_tipo b ON b.tipo_id = a.marc_tipoId
			WHERE marc_nome = '".$marc_nome."' And marc_tipoId=".$marc_tipoId;	
			$rs->FreeSql($sql);
			if($rs->linhas <>0){
				$resul['status'] = "Erro";
				$resul['status'] = "Nome j&aacute; cadastrado";
				$resul['mensagem'] = $rs->sql;  
			}ELSE{
			$cod = $rs->autocod("marc_id","eq_marca");
			$dados['marc_id']       = $cod;
			$dados["marc_tipoId"]	= $marc_tipoId; 
			$dados["marc_nome"]	= $marc_nome;
		
		if(!$rs->Insere($dados,"eq_marca")){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Marca cadastrada com sucesso!";
		}
		else{
			$resul['status'] = "Erro";
			$resul['mensagem'] = $rs->sql;
			
			}
		}
		
		echo json_encode($resul); 
		exit;
	}
/*---------------|FIM DO CADASTRO MARCA |------------------*/	

    /*------------|FUNCAO PARA EDITARR MARCA|-----------------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Edita_Marca"){
		$dados['marc_nome']	= $marc_nome;	 
		$whr = "marc_id=".$marc_id; 
		
		if(!$rs->Altera($dados, "eq_marca",$whr)){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Marca atualizada!"; 
			$resul['sql'] = $rs->sql;
			  
		}
		else{
			$resul['mensagem']	= "Ocorreu um erro..."; 
			$resul['sql']		= $rs->sql;  
		}	
		echo json_encode($resul);
		exit;
	}
/*-------------------|FIM DO EDITAR MARCA |------------------------------*/	

//|----------------------------------------------------------------\
//////////////// FIM TIPO DE MARCA\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/	

//------------------------------------------------------------------------------------------------------------
//EQUIPAMENO//////////////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================

	/*-----|FUNCAO PARA SELECIONAR A MARCA REF AO TIPO|--------*\
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/	
	
	if($acao == "populaCheckMarcaEq"){
		$sql = "SELECT * FROM eq_marca WHERE marc_tipoId=".$id;
		$rs->FreeSql($sql);
		$opt = "<option value=''>Selecione...</option>";
		while($rs->GeraDados()){
			$opt .= "<option value='".$rs->fld('marc_id')."'>".$rs->fld('marc_nome')."</option>";
		}
		echo $opt;
	}
/*---------------|FIM DA FUNCAO "populaCheckMarcaeq |------------------*/

	/*------------|FUNCAO PARA CADASTRAR EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/

	if($acao == "Cadastrar_Equipamento"){ 
			//Busca informação no bando se o nome já exixte
			$rs->seleciona("eq_serial","at_equipamento","eq_serial='{$eq_serial}'");
			if($rs->linhas<>0){
				$resul['status'] = "Erro";
				$resul['status'] = "Nome j&aacute; cadastrado";  
				$resul['mensagem'] = $rs->sql;  
			}ELSE{
			$cod = $rs->autocod("eq_id","at_equipamento");
			$dados['eq_id']       	= $cod;		
			$dados["eq_empId"]    	= $sel_empeq; 		
			$dados["eq_usuEmpId"] 	= '0'; 		
			$dados["eq_dpId"] 		= '0'; 		
			$dados["eq_usuId"] 		= '0'; 		
			$dados["eq_mqEmpId"]	= '0'; 		
			$dados["eq_mqId"]		= '0'; 		
			$dados["eq_tipoId"]   	= $sel_tipoeq;		
			$dados["eq_marcId"]   	= $sel_marcaeq;	  	
			$dados["eq_modelo"]   	= $eq_modelo;	  	
			$dados["eq_serial"]   	= trim($eq_serial);		
			$dados["eq_desc"]       = $eq_desc; 	
			$dados["eq_statusId"]   = $sel_eqstatus;			
			$dados["eq_valor"]    	= $eq_valor;			
			$dados["eq_ativo"]    	= "1";			
			$dados["eq_datacad"]  	= date('Y-m-d H:i:s');		
			$dados["eq_usucad"]   	= $_SESSION['usu_cod']; 
			
			 
		if(!$rs->Insere($dados,"at_equipamento")){
			$resul['status'] = "OK";
			$resul['mensagem'] = "Equipamento cadastrado com sucesso!";
		} 
		else{
			$resul['status'] = "Erro";
			$resul['mensagem'] = $rs->sql;        
			  
		}
		}
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DO CADASTRO DE EQUIPAMENTOS |------------------*/	

	/*--------------|FUNCAO PARA ALTERAR EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Editar_Equipamento"){
		$dados['eq_serial']		= trim($eq_serial);   
		$dados['eq_desc']		= trim($eq_desc); 
		$dados["eq_modelo"] 	= $eq_modelo;	
		$dados['eq_statusId']	= $sel_eqstatus; 	
		$dados['eq_valor']		= $eq_valor; 	 	
		$whr = "eq_id=".$eq_id; 
		
		if(!$rs->Altera($dados, "at_equipamento",$whr)){ 

		$resul['status'] = "OK";

		$resul['mensagem'] = "Equipamento atualizado!"; 

		 $resul['sql'] = $rs->sql;
			  
		}
		else{
			$resul['mensagem']	= "Ocorreu um erro..."; 
			$resul['sql']		= $rs->sql;  
		}	
		echo json_encode($resul);
		exit;
	}	
/*---------------|FIM DO ALTERA A EQUIPAMENTOS |------------------*/

//|----------------------------------------------------------------\
//////////////// FIM EQUIPAMENTO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/	


//-------------------------------------------------------------------------------------------------------------------------
///////// FIM FUNÇÔES DE EQUIPAMENTO  ///////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================

//-------------------------------------------------------------------------------------------------------------------------
///////// ENVIO DE E_MAIL  ///////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================

	/*---------------|FUNCAO PARA CADASTRO RECLAMAÇÂO|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Cadastra_Reclamacao"){
		$emp_areaId = $rs->pegar("emp_areaId","sys_empresa","emp_id =".$_SESSION['usu_empresa']);						
		$at_emptpId = $rs->pegar("emp_tipoId","sys_empresa","emp_id =".$_SESSION['usu_empresa']);						
		//Tratamento devido ao banco do site
		if($sel_linha == ''){ 
			$sel_linha ='0';
		}
		if($sel_emtu == ''){
			$sel_emtu ='0';
		}
		$sql=" 	SELECT 
					a.usu_cod,
					c.emp_id,
					d.dp_id					
				FROM sys_usuario a					
					JOIN sys_empresa c ON a.usu_empId = c.emp_id
					JOIN sys_departamento d ON a.usu_dpId = d.dp_id		
				WHERE usu_classeId = '6' AND usu_areaId =".$sel_area." AND usu_empId =".$_SESSION["usu_empresa"];
		$rs->Freesql($sql);			
		$rs->GeraDados();
		$emp	= $rs->fld("emp_id"); 		
		$dp		= $rs->fld("dp_id"); 		
		$apu	= $rs->fld("usu_cod"); 
		
		
		$cod = $rs->autocod("at_id","sac_atendimento");
		$dados["at_id"]         = $cod;
		$dados["at_empId"]	    = $_SESSION["usu_empresa"];  
		$dados["at_usuempId"] 	= $_SESSION["usu_empresa"]; 
		$dados["at_usudpId"]   	= $_SESSION['usu_departamento']; 
		$dados["at_usuId"]	    = $_SESSION['usu_cod']; 
		$dados["at_apuempId"]	= $emp; 		
		$dados["at_apudpId"]	= $dp;		
		$dados["at_apuId"]		= $apu;						
		$dados["at_tipoId"]		= "2"; 
		$dados["at_origId"]     = $sel_orig;
		$dados["at_linhaId"]	= $sel_linha;   
		$dados["at_emtuId"]		= $sel_emtu;   
		$dados["at_areaId"]		= $sel_area;   
		$dados["at_areaempId"]  = $emp_areaId;
		$dados["at_emptpId"]    = $at_emptpId;
		$dados["at_cli_nome"]	= $at_cli_nome;   
		$dados["at_cli_email"]	= $at_cli_email;   
		$dados["at_cli_tel"]	= $at_cli_tel;   
		$dados["at_descricao"]	= $at_descricao; 		
		$dados["at_statusId"]	= "2";
		$dados["at_cli_anonimo"]= $infochecbox; 
		$dados["at_data_ini"]	= date('Y-m-d H:i:s'); 				 		 		
		$dados["at_ativo"]	    = "1";   	  
				
		
		if(!$rs->Insere($dados,"sac_atendimento")){
			$resul['status'] = "OK";
			$resul['mensagem'] = "Atendimento cadastrado com sucesso!";
		}
		else{
			$resul['status'] = "Erro";
			$resul['mensagem'] = $rs->sql;
		}		
		echo json_encode($resul);
		exit;
	}
	/*-----------|ENVIAR E-MAIL RECLAMACAO|------------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       02/03/2020						   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Envia_email_reclamacao"){		
		//não usar  acentos
		$assunto ="Registro de Reclamacao";		
		$sql="SELECT  usu_email, usu_nome FROM sys_usuario WHERE usu_classeId = '6' AND usu_areaId =".$sel_area."  AND usu_empId =".$_SESSION["usu_empresa"];
		$rs->Freesql($sql);			
		$rs->GeraDados();

			$link ="http://www.niff.com.br/sac/view/login.php";
			$destinatarios = $rs->fld("usu_email");
			$nome = $rs->fld("usu_nome");
			$name = $rs->pegar("usu_nome","sys_usuario","usu_cod =".$_SESSION['usu_cod']);							
			$from ="noreply@esac.com.br";			 
			$mensagem = file_get_contents("../view/sac_email.html");
			$mensagem = str_replace("{LINK}", $link, $mensagem );				
			$mensagem = str_replace("{NOME}", $nome, $mensagem );
			$mensagem = str_replace("{NAME}", $name, $mensagem );
			$mensagem = str_replace("{ASSUNTO}", $assunto, $mensagem );
			$message = $mensagem;							

				$headers  = "From: {$name} <{$from}>\r\n"; 
				$headers .= "NOReply-To: esacprime@gmail.com\r\n";
				//$headers .= "CC: adouglas@niff.com.br\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$usuario  = "esacprime@gmail.com";
				$senha	  = "Usu@ri0$"; 
				$nomeDestinatario = $usuario;
				//Habilitar no Gmail para poder enviar
				//https://myaccount.google.com/u/0/lesssecureapps?pli=1
				
				
				//-------------------------------------------------------------------------------------------------------
				//ENVIAR EMAIL ////////////////////////////////////////////////////////////////////////////////////////||
				//=======================================================================================================

				/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/

				require_once("../class/PHPMailer_5.2.0/class.phpmailer.php");
				$To = $destinatarios;
				$Subject = $assunto;
				$Message = $message;
				//$Host = "smtps.bol.com.br"; 
				$Host = 'smtp.gmail.com'; 
				//$Host = 'smtp.'.substr(strstr($usuario, '@'), 1);
				$Username = $usuario;
				$Password = $senha;
				$Port = "587"; 
				$mail = new PHPMailer(); 
				$body = $Message;
				$mail->IsSMTP(); // telling the class to use SMTP
				$mail->Host = $Host; // SMTP server
				$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
				$mail->SMTPSecure = 'tls';
				// 1 = errors and messages
				// 2 = messages only
				$mail->SMTPAuth = true; // enable SMTP authentication
				//$mail->SMTPSecure = 'ssl';
				$mail->Port = $Port; // set the SMTP port for the service server
				$mail->Username = $Username; // account username
				$mail->Password = $Password; // account password
				$mail->SetFrom($from, $nomeDestinatario);
				$mail->Subject = $Subject;
				$mail->MsgHTML($body);
				$mail->AddAddress($To, "");								
				/*---------------|FIM DE ENVIAR E_MAIL |------------------*/	
				
					if(!$mail->Send()){
						$msg["status"] =  "ERRO";
						$msg['erros'] = $mail->ErrorInfo;
						$msg["mensagem"] = "E-Mail nao enviado!";				
					}
					else {			
						$msg["status"] =  "OK";
						$msg["mensagem"] = "E-Mail enviado!";
						$msg['erros'] = $mail->ErrorInfo;				
						
						echo json_encode($msg);
						exit;
					}						
				
	}

/*-------------------|FIM DO CADASTRO |------------------------------*/	

//-------------------------------------------------------------------------------------------------------------------------
///////// FIM ENVIA E_MAIL  ///////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================
	
//---------------------------------------------------------------------------------------------------------------------------------
/////////FIN DAS FUNÇÔES  /////////////////////////////////////////////////////////////////////////////////////////////||||||||||||
//=================================================================================================================================
?>	