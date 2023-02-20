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
require_once("../class/class.functions.php");
$rs = new recordset();
$fn = new functions();
extract($_GET);

$sql="SELECT * FROM sys_mail  a
JOIN sys_empresa       b ON a.mail_envio_usuempId  = b.emp_id 
JOIN sys_departamento  c ON a.mail_envio_usudpId   = c.dp_id 
JOIN sys_usuario      d ON a.mail_envio_usuId     = d.usu_cod
JOIN sys_mail_status   e ON a.mail_statusId  = e.status_Id	  
WHERE mail_Id=".$mail;
$rs->FreeSql($sql);
$rs->GeraDados();
$td = $rs->fld("mail_statusId");
$destinatario = $rs->fld("usu_cod");
$remetente_nome = $rs->fld("usu_nome");
$mail_assunto = $rs->fld("mail_assunto");
$mail_mensagem = $rs->fld("mail_mensagem");
$mail_data = $fn->data_hbr($rs->fld("mail_data"));

?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Responder Mail</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
						  <li class="breadcrumb-item"><a href="#">Mailbox</a></li>
						  <li class="breadcrumb-item active">Responder</li>
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
								<h3 class="card-title">Responder Mensagem</h3>
							</div>
							<!-- /.card-header -->
							<form role="form" id="Formrespmail"> 
								<div class="card-body">
									<div class="card-header">
									<h3 class="card-title">Responder Para  <?=$remetente_nome;?></h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-0">								
									<!-- /.mailbox-read-info -->
									<div class="mailbox-read-info">
										<h3><b>Resp. <?=$rs->fld("mail_assunto");?></b></h3>
									</div>
									<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token"/>
									<input type="hidden" value="<?=$destinatario;?>" name="destinatario" id="destinatario"/>
									<input type="hidden" value="Resp. <?=$rs->fld("mail_assunto");?>" name="assunto" id="assunto"/>							
								</div>
									<div class="form-group">
										<textarea class="textarea" id="Mensagen" name="Mensagen"  style="height: 500px;" placeholder="Place some text here"/>									
										<?php
										$sql ="SELECT * FROM sys_usuario a
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
										 
										 
										 <div class="mailbox-read-info">	
													<h7><b>De</b> <?=$remetente_nome;?></h7><br>								
													<h7><b>Para</b> <?=$rs->fld("usu_nome");?>
													<span class="mailbox-read-time float-right"><b>Enviado em:  </b><?=$mail_data;?></span></h7><br>
												</div>		
												<div class="mailbox-read-message">
													<h7><b>Assunto:</b> <?=$mail_assunto;?></h7>
													<?=$mail_mensagem;?>
												</div>
										</textarea>
									</div>								
								</div>
								<!-- /.card-body -->	
								
								<!-- /.box-footer -->
								<div class="card-footer">
									<div class="float-right">								  
										<button type="submit" id="btn_Respmail" class="btn btn-primary"><i class="far fa-paper-plane"></i> Enviar</button>
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
