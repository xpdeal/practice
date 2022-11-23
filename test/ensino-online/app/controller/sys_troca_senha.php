<?php
date_default_timezone_set('America/Sao_Paulo');
extract($_POST);
require_once("../model/recordset.php");
require_once("../config/gera_senha.php");
$rs = new recordset();
//-------------------------------------------------------------------------------------------------------
//FUNÇÂO  /////////////////////////////////////////////////////////////////////////////////////////////||
//=======================================================================================================

	/*-----------|RESETAR SENHA E ENVIAR NO E-MAIL|----------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       02/03/2020						   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Sender"){
		$senha = generatePassword(6);
		$sql="SELECT usu_cod, usu_email, usu_nome FROM sys_usuario WHERE usu_email ='".$mail."'";
		$rs->Freesql($sql);
		
			if($rs->linhas<>0){
				$rs->GeraDados();

				$link ="http://localhost/primebase/view/reset_senha.php";
				$destinatarios = $rs->fld("usu_email");
				$nome = $rs->fld("usu_nome");
				$name ="Administrador";
				$from ="noreply@portalprime.com.br";
				$assunto = "Troca-Senha"; 
				$mensagem = file_get_contents("../view/send_troca_senha_email.html");
				$mensagem = str_replace("{LINK}", $link, $mensagem );
				$mensagem = str_replace("{SENHA}", $senha, $mensagem );
				$mensagem = str_replace("{NOME}", $nome, $mensagem );
				$message = $mensagem;
				$senhamd5 = md5($senha);

				$sql2="UPDATE sys_usuario SET usu_senha ='".$senhamd5."' WHERE usu_cod =".$rs->fld("usu_cod");
				$rs->Freesql($sql2);

				$headers = "From: {$name} <{$from}>\r\n"; 
				$headers .= "Reply-To: elvis7t@gmail.com\r\n";
				//$headers .= "CC: adouglas@niff.com.br\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$usuario = "infraprimesystema@gmail.com";
				$senha = "c0rp.@dm!n"; 
				$nomeDestinatario = $usuario;
				
				
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
				
				else {
				$msg["mensagem"] = "E-Mail n&atilde;o encondrado!";
					echo json_encode($msg);
					exit;
				}
	}
//|----------------------------------------------------------------\
///////////////// FIM DA FUNÇÂO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       |
//|----------------------------------------------------------------/
?>