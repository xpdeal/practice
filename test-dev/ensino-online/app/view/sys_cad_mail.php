<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "MAIL";
$pag = "sys_compor_mail.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
$rs = new recordset();
$sql ="SELECT * FROM sys_mail 		
		WHERE mail_statusId = '1' AND mail_destino_usuId =".$_SESSION['usu_cod'];
	$rs->FreeSql($sql);
	$rs->GeraDados();
	$td = $rs->fld("mail_statusId");
?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Escrever Mensagem</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
						  <li class="breadcrumb-item"><a href="#">Mailbox</a></li>
						  <li class="breadcrumb-item active">Escrever</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<a href="sys_pg_mailbox.php?token=<?=$_SESSION['token'];?>" class="btn btn-primary btn-block mb-3">Retornar a Caixa de entrada</a>
						<!-- Menu side -->
						<?php require_once("../config/mail_menu.php");?>	
						<!-- /.Menu side-->	
					</div>
					<!-- /.col -->
					<div class="col-md-9">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title">Mensagem</h3>
							</div>
							<!-- /.card-header -->
							<form role="form" id="Envia"> 
								<div class="card-body">
									<div class="form-group">
										<div class="select2-lightblue">
											<select class="select2" multiple="multiple" data-dropdown-css-class="select2-purple" id="sel_contato" style="width: 100%;" name="sel_contato" placeholder="Place some text here"/>    
												<option value=''>Para...</option>
												<?php
												$whr = "usu_cod <> 0 AND usu_ativo ='1' AND usu_pmail ='1'";
												$rs->Seleciona("*","sys_usuario",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option  value="<?=$rs->fld("usu_cod");?>"> <?=$rs->fld("usu_nome");?></option>      
												<?php
												}  
												?>
											</select>  
										</div>
									</div>
									<div class="form-group">
										<input class="form-control" maxlength="30" id="assunto" name="assunto" placeholder="Assunto:"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token"/>
									</div>
									<div class="form-group">
										<textarea class="textarea" id="Mensagen" name="Mensagen"  style="height: 500px;" placeholder="Place some text here">									
										<?php
										$sql =" SELECT 
													a.usu_nome,
													a.usu_ramal,
													c.emp_nome,
													c.emp_tel,
													d.dp_nome
																										
												FROM sys_usuario a
													JOIN sys_classe b ON a.usu_classeId = b.classe_id 
													JOIN sys_empresa c ON a.usu_empId = c.emp_id
													JOIN sys_departamento d ON a.usu_dpId = d.dp_id 
												WHERE usu_cod = ".$_SESSION['usu_cod'];
										$rs->FreeSql($sql);
										$rs->GeraDados();										
										?>
										<p>
										&nbsp;
										&nbsp;
										&nbsp;
										<p/>
										
										 <p>Atenciosamente  <?=$rs->fld('usu_nome');?></p>
										 
										 <b>Empresa:</b>&nbsp;<?=$rs->fld('emp_nome');?><br>
										 <b>Departamento:</b>&nbsp;<?=$rs->fld('dp_nome');?><br>
										 <b>Telefone:</b>&nbsp;<?=$rs->fld('emp_tel');?> <b>Ramal:</b>&nbsp;<?=$rs->fld('usu_ramal');?>
										</textarea>
									</div>								
								</div>
								<!-- /.card-body -->							 
								<div id="formerros" class="clearfix" style="display:none;"> 
									<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h5><i class="icon fas fa-ban"></i> Alerta!</h5>
									<h4>Erros no preenchimento do formul&aacute;rio.</h4>
									<p>Verifique os erros no preenchimento acima:</p>
									<ol>
										<!-- Erros são colocados aqui pelo validade --> 
									</ol>
									</div>
								</div>								 
								<!-- /.box-footer -->
								<div class="card-footer">
									<div class="float-right">								  
										<button type="submit" id="btn_Envia_mail" class="btn btn-primary"><i class="far fa-paper-plane"></i> Enviar</button>
									</div>								
								</div>
								<!-- /.card-footer -->
							</form>
							<!-- /.form -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->				  
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<?php
	require_once("../config/footer.php");	
	?> 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 -->
<script src="<?=$hosted;?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="<?=$hosted;?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!--Chama o java script -->
<script src="<?=$hosted;?>/js/action_system.js"></script>  
<!-- Validation --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  });
  </script>
  <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })   

  })
</script>
</body>
</html>
