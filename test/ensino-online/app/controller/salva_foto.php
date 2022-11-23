<?php
session_start();
require_once("../model/recordset.php");
$rs_imagem = new recordset();
$nome = substr($_POST['nome'], 0, 3); 
define('UPLOAD_DIR', '../images/perfil/');// Diretorio que salva a Imagem
$local = "/images/perfil/"; // Diretorio pra gravar no banco
$img = $_POST['purl']; //base64 string
$data = file_get_contents($img); 
// $file = UPLOAD_DIR . uniqid() . '.png';
$file = UPLOAD_DIR . $nome .'_' . $_POST['perfil'] .'.png';
$path2 = $local . $nome . '_' . $_POST['perfil'] . '.png';
$success = file_put_contents($file, $data);

if (file_put_contents($file, $data)){
		$dados['usu_foto']	= $path2;	
		$whr = "usu_cod =".$_POST['perfil']; 		
		
		if(!$rs_imagem->Altera($dados,"sys_usuario",$whr)){
			$resul['status'] = "OK";
			$resul['mensagem'] = "Foto cadastrada com sucesso!";
			}
			else{
				$resul['status'] = "Erro";
				$resul['mensagem'] = $rs->sql;
				}
	echo json_encode($resul);
	exit;
}
print $success ? $file : 'Unable to save the file.';


// AUTHOR https://gist.github.com/RomeoDenis
// // define ('UPLOAD_DIR', 'imagens /');
// // $ img = $ _POST ['img']; // base64 string
// // $ data = file_get_contents ($ img);
// // $ arquivo = UPLOAD_DIR. uniqid (). '.png';
// // $ success = file_put_contents ($ arquivo, $ dados);
// print $ sucesso? $ file: 'Não foi possível salvar o arquivo.';
// https://gist.github.com/fazlurr/9802071
?>