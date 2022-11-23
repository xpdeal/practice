<?php
$sess = "HOME";
$pag = "home.php";
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
require_once("../model/recordset.php");
$fn = new functions();
?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Chatter</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Sistema</a></li>
							<li class="breadcrumb-item active">Chatter</li>	
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<!-- Default box -->
			
			<div class="row">
				<div class="col-sm-4"></div>	
				<div class="col-sm-4">
					<!-- DIRECT CHAT -->
					<div class="card card-success direct-chat direct-chat-info">
						<div class="card-header">
							<?php
							$func = new functions();
							$para = (isset($_GET["para"])?$_GET["para"] : 0);
							
							$rs2 = new recordset();
							?>
							<h4 class="card-title">
							<?php
							if($para <> 0){
							$nome = explode(" ", $rs2->pegar("usu_nome","sys_usuario","usu_cod=".$para));
							echo $nome[0];
							}
							else{
							 echo "Nenhum usuario";
							}
							$cua = $_SESSION["usu_cod"];
							$sql = "SELECT * FROM sys_chat WHERE chat_para = ". $cua ." AND chat_lido = 0";
							$rsa->FreeSql($sql);
							?>
							</h4>
							<div class="card-tools">
								<?php if ($rsa->linhas > 0): ?>
								<span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary"><?=$rsa->linhas;?></span>
								 <?php endif;?>
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
										<i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
										<i class="fas fa-user-friends"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove">
										<i class="fas fa-times"></i>
									</button>
							</div>
						</div>
						<!-- /.card-header -->
						
						<div class="card-body">
							<!-- Conversations are loaded here -->
							<div id="chatContent" class="direct-chat-messages">
								<div id="msgs">	
									<?php 
									
									$cua = $_SESSION["usu_cod"];
									$sq_chat = "UPDATE sys_chat SET chat_lido=1, chat_view = NOW() WHERE chat_de = ".$para." AND chat_para = ".$cua;
									$rs2->FreeSql($sq_chat);
									$sq_chat = "SELECT * FROM sys_chat a 
									JOIN sys_usuario b ON  b.usu_cod = a.chat_para
									JOIN sys_usuario c ON  c.usu_cod = a.chat_de
									WHERE (chat_de = ".$cua. " AND chat_para = ".$para.") OR (chat_de = ".$para. " AND chat_para = ".$cua.") 
									GROUP BY chat_id
									ORDER BY chat_hora ASC";						
									$rs2->FreeSql($sq_chat);

									while($rs2->GeraDados()){
									$ms=0;
									if($ant == $rs2->fld("chat_de"))	: $ms = 1;
									else							: $ms = 0;
									endif;
									
									if($rs2->fld("chat_de")==$cua):
									?>                  

									<!-- Message. Default to the left -->
									<div class="direct-chat-msg">
									   <?php if($ms==1): ?>
										<div class="direct-chat-infos clearfix">
											<span class="direct-chat-name float-left"><?=$rs2->fld("usu_nome");?></span>
											<span class="direct-chat-timestamp float-right"><?=$func->data_hbr($rs2->fld("chat_hora"));?></span>
										</div>
										<!-- /.direct-chat-infos -->
										<div class="direct-chat-text">
											<small><i class="<?=($rs2->fld("chat_lido")==0?"fa fa-check-circle-o":"fa fa-check-circle text-primary");?>"></i>
											</small> <?=$rs2->fld("chat_msg");?>
										</div>
									   <?php else: ?>
										<div class="direct-chat-infos clearfix">
											<span class="direct-chat-name float-left"><?=$rs2->fld("usu_nome");?></span>
											<span class="direct-chat-timestamp float-right"><?=$func->data_hbr($rs2->fld("chat_hora"));?></span>
										</div>
										<!-- /.direct-chat-infos -->
										<img class="direct-chat-img" src="<?=$hosted;?>/<?=$rs2->fld("usu_foto");?>" alt="message user image">
										<!-- /.direct-chat-img -->
										<div class="direct-chat-text">
											<?=$rs2->fld("chat_msg");?>
										</div>
										<!-- /.direct-chat-text -->
									   <?php endif; ?>
									</div>
									
								  <?php else:?>
									
									<!-- Message to the right -->
									<div class="direct-chat-msg right">
									  <?php if($ms==1): ?>
										<!-- /.direct-chat-infos -->
										<div class="direct-chat-infos clearfix">											
											<span class="direct-chat-timestamp float-left"><?=$func->data_hbr($rs2->fld("chat_hora"));?></span>
										</div>
										<div class="direct-chat-text">
											<?=$rs2->fld("chat_msg");?>
										</div>
									  <?php else :?>
										<!-- /.direct-chat-infos -->
										<div class="direct-chat-info clearfix">
											<span class="direct-chat-name float-right"><?=$rs2->fld("usu_nome");?></span>
											<span class="direct-chat-timestamp float-left"><?=$func->data_hbr($rs2->fld("chat_hora"));?></span>
										</div>
										<!-- /.direct-chat-img -->
										<img class="direct-chat-img" src="<?=$hosted;?>/<?=$rs2->fld("usu_foto");?>" alt="message user image">
										<div class="direct-chat-text">
											<?=$rs2->fld("chat_msg");?>
										</div>
										<!-- /.direct-chat-text -->
									  <?php endif; ?>
									</div>
									<!-- /.direct-chat-msg -->
									<?php
									endif; 
									$ant = $rs2->fld("chat_de");
									$hora = $rs2->fld("chat_view");
									}
									?>						
								</div>
								<!-- /.div-msg -->
							</div>
							<!--/.direct-chat-messages-->

							<!-- Contacts are loaded here -->
							<div class="direct-chat-contacts">
								<ul class="contacts-list">
									<?php
									$rs_chat = new recordset();
									$sql = "SELECT * FROM sys_usuario LEFT JOIN sys_logado on usu_email = log_user WHERE usu_cod<>".$_SESSION['usu_cod']." AND usu_ativo ='1' AND usu_pchat ='1'
									GROUP BY usu_email ORDER BY usu_nome ASC";
									// $sql = "SELECT a.usu_cod, a.usu_nome, a.usu_foto, a.usu_email, b.log_horario  FROM sys_usuario a LEFT JOIN sys_logado b on a.usu_email = b.log_user WHERE usu_cod<>".$_SESSION['usu_cod']." AND usu_ativo ='1' AND usu_pchat ='1' AND log_status ='1'
									// ORDER BY usu_nome ASC";
									$rs_chat->FreeSql($sql);
									while($rs_chat->GeraDados()){
									?>
									<li>
										<a href="sys_chatter.php?para=<?=$rs_chat->fld("usu_cod");?>&token=<?=$_SESSION["token"];?>">
											<img class="contacts-list-img" src="<?=$hosted;?><?=$rs_chat->fld("usu_foto");?>">
											<div class="contacts-list-info">
												<span class="contacts-list-name">
													<?php echo $rs_chat->fld("usu_nome");?>
													<small class="contacts-list-date float-right"><?php echo ($rs_chat->fld("log_horario")? "Online":"Offline");?></small>
												</span>
												<span class="contacts-list-msg">
													<?php echo $rs_chat->fld("usu_email");?>
												</span>
											</div>
											<!-- /.contacts-list-info -->
										</a>
									</li>
									<!-- End Contact Item -->
									<?php }	?>
								</ul>
								<!-- /.contacts-list -->
							</div>
							<!-- /.direct-chat-pane -->
						</div>
						 <!-- /.card-body -->
						 
						<div class="card-footer">
							<form action="#" method="post">
							  <div class="input-group">
								<input type="text" id="message" name="message" placeholder="Menssagem ..." class="form-control">
								<input type="hidden" id="usu_cod" value="<?=$cua;?>">
								<input type="hidden" id="para" value="<?=$para;?>">
								<span class="input-group-append">
								  <button type="button"  id="btChatEnvia" class="btn btn-success"><i class="fas fa-comment-alt"></i></button>
								</span>
							  </div>
							</form>
						</div>
						<!-- /.card-footer-->
					</div>
					<!--/.direct-chat -->
				</div>
					
				<div class="col-sm-4"></div>
				
			</div>
			<!-- /.card -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
  <?php require_once("../config/footer.php");?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=$hosted;?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=$hosted;?>/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=$hosted;?>/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=$hosted;?>/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=$hosted;?>/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=$hosted;?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=$hosted;?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?=$hosted;?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=$hosted;?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=$hosted;?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=$hosted;?>/assets/dist/js/pages/dashboard.js"></script>
<!--Chama o java script -->
<script src="<?=$hosted;?>/js/action_system.js"></script>
<!-- Validation --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
</body>
</html>


