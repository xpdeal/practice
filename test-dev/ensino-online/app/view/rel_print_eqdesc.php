<?php
date_default_timezone_set('America/Sao_Paulo'); 
error_reporting(E_ALL & E_NOTICE & E_WARNING); 
session_start();
require_once("../class/class.functions.php");
require_once("../model/recordset.php");
$fn = new functions();
$rs = new recordset();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Relatorio </title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap 4 -->
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	
	<body>
		<div class="wrapper">
			<!-- Main content -->
			<section class="invoice">
			<!-- title row -->
				<div class="row">
					<div class="col-12">
					<?php
						$rs = new recordset();
						$sql ="SELECT * FROM sys_usuario a						
						JOIN sys_empresa c ON a.usu_empId = c.emp_id
						JOIN sys_departamento d ON a.usu_dpId = d.dp_id 
						WHERE usu_cod =".$_SESSION['usu_cod']; 
						$rs->FreeSql($sql);
						$rs->GeraDados(); 
						$data = date("Y-m-d");
						?>	
						<h4>									
							<small class="float-right">Date: <?=$fn->data_br($data);?></small>
						</h4>
					</div> 
					
					<div class="col-12">												  
						<img class="img-fluid img-thumbnail img-responsive " src="../<?=$rs->fld('emp_logo');?>" alt="Logo da Empresa">																	
					</div>
					<!-- /.col -->
					
					<div class="col-12"> 
						<h4>							
							<small class="float-right"></small>
						</h4>
					</div>
					<!-- /.col -->	
					
					<div class="col-12">
						<h4>
							<i class="fas fa-globe"></i> <?=$rs->fld("emp_nome");?>
						</h4>
					</div> 
					<!-- /.col -->					
				</div>
				<!-- info row -->

				<div class="row  invoice-info">
					<div class="col-sm-4 invoice-col">						   
						<address>
							<strong>CNPJ: <?=$rs->fld("emp_cnpj");?></strong><br>
							CEP: <?=$rs->fld("emp_cep");?><br>
							<?=$rs->fld("emp_log");?>, <?=$rs->fld("emp_num");?> <?=$rs->fld("emp_comp1");?><br>
							<?=$rs->fld("emp_bai");?>, <?=$rs->fld("emp_cid");?>,  <?=$rs->fld("emp_uf");?><br>
							Telefone: <?=$rs->fld("emp_tel");?><br>							  
						</address>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">					   
						<address>
							<strong><?=$rs->fld("usu_nome");?></strong><br>
							<?=$rs->fld("usu_email");?><br>
							Departamento:  <?=$rs->fld("dp_nome");?><br>								
							Ramal: <?=$rs->fld('usu_ramal');?><br>
							Celular: <?=$rs->fld('usu_cel');?>								
						</address>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<!-- Table row -->						
				<div class="row">
					<div class="col-12 table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Empresa</th> 
									<th>Tipo</th>
									<th>Marca</th>
									<th>Modelo</th>
									<th>Equipamento</th>
									<th>Valor</th>
									<th>Descartado por:</th> 
									<th>Comprado em:</th>
									<th>Descartado em:</th> 
									<th>Vida &Uacute;til</th>
								</tr>
							</thead>
							<tbody>
								<tbody id="rls">								
									<?php require_once("rel_corp_eqdesc.php"); ?>
								</tbody>
							</tbody>
						</table>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->					 

			</section>
			<!-- /.content -->
		</div>
		<!-- ./wrapper -->

		<script type="text/javascript"> 
		  window.addEventListener("load", window.print());
		</script>
	</body>
</html>
