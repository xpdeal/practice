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
$mail_Id=$_GET['mail_Id'];
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
						<h1>Ler Mensagem</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
						  <li class="breadcrumb-item"><a href="#">Mailbox</a></li>
						  <li class="breadcrumb-item active">Ler</li>
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
						<a href="sys_pg_mailbox.php?token=<?=$_SESSION['token'];?>"

						class="btn btn-primary btn-block mb-3">Retornar a Caixa de entrada</a>
						<!-- Menu side -->
						<?php require_once("../config/mail_menu.php");?>	
						<!-- /.Menu side-->	
					</div>
					<!-- /.col -->
					<div class="col-md-9">
						<?php
						$sql="SELECT * FROM sys_mail  a
						JOIN sys_empresa       b ON a.mail_envio_usuempId  = b.emp_id 
						JOIN sys_departamento  c ON a.mail_envio_usudpId   = c.dp_id 
						JOIN sys_usuario      d ON a.mail_envio_usuId     = d.usu_cod
						JOIN sys_mail_status   e ON a.mail_statusId  = e.status_Id	  
						WHERE mail_Id=".$mail_Id;
						$rs->FreeSql($sql);
						$rs->GeraDados();
						$status 			= $rs->fld("mail_statusId");
						$mail_envio_usuId 	= $rs->fld("mail_envio_usuId");
						$usu 				= $_SESSION['usu_cod'];
						$nome_des  			=  $rs->fld("usu_nome");
						$data 				= $fn->data_hbr($rs->fld("mail_data"));
						$td = $rs->fld("mail_statusId");
						?>
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title">Mensagem</h3>
								<div class="card-tools">
								<a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
								<a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
							<!-- /.card-header -->							
							<div class="card-body p-0">
								<div class="mailbox-read-info">									
									<h5>De <?=$nome_des ;?></h5>
									<?php							
									$sql="SELECT * FROM sys_mail  a
									JOIN sys_usuario d ON a.mail_destino_usuId     = d.usu_cod							 
									WHERE mail_Id=".$mail_Id;
									$rs->FreeSql($sql);
									$rs->GeraDados();	
									$status =$rs->fld('mail_statusId');
									?>
									<h6>Para <?=$rs->fld("usu_nome");?>
									  <span class="mailbox-read-time float-right"><?=$data;?></span></h6>
								</div>
								<!-- /.mailbox-read-info -->
								<div class="mailbox-read-info">
									<h3><b><?=$rs->fld("mail_assunto");?></b> 
									<?php if($td==2 ): ?>
									<a a href="sys_cad_mail_responder.php?token=<?=$_SESSION['token']?>&acao=N&mail=<?=$mail_Id;?>" class="btn btn-sm btn-default" data-toggle='tooltip' data-placement='bottom' title="Reesponder"><i class="fas fa-reply-all"></i></a></h3>
									<?php endif; ?>	
										<input type="hidden" value="<?=$rs->fld("mail_Id");?>" name="mail_Id" id="mail_Id">
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
								</div>
								 <div class="mailbox-read-message">
									<?=$rs->fld("mail_mensagem");?>  
								
								</div>								
							</div>					 
							<!-- /.box-footer -->
							<div class="card-footer">
								<div class="float-left">								  
									
								<?php if($status==1 ): ?>
							  <button id="btn_Lermail" class="btn btn-primary" type="submit"><i class="fas fa-eye"></i> Marcar como lido</button>
								<?php endif;?>
								</div>								
							</div>
							<!-- /.card-footer -->							
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
