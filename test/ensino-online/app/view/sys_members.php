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
				<div class="col-sm-3"></div>	
				    <div class="col-sm-6">
					 <!-- USERS LIST -->
                     <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Usuários</h3>
                    <?php
                    $sql ="SELECT * FROM sys_usuario
                    WHERE usu_cod<>".$_SESSION['usu_cod']." AND usu_ativo ='1' AND usu_ativo = '1'" ;
                    $rs->FreeSql($sql);
                    while($rs->GeraDados()){ }
                    $usuarios = $rs->linhas;
                    ?>
                    <div class="card-tools">
                      <span class="badge badge-danger"><?=$usuarios?> Usuários</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                    <?php
                    $rs_chat = new recordset();
                    $sql = "SELECT * FROM sys_usuario  WHERE usu_cod<>".$_SESSION['usu_cod']." AND usu_ativo ='1' AND usu_pchat ='1'
                    GROUP BY usu_nome ORDER BY usu_nome ASC";                    
                    $rs_chat->FreeSql($sql);
                    while($rs_chat->GeraDados()){
                    ?>
                      <li>
                        <img src="<?=$hosted;?><?=$rs_chat->fld("usu_foto");?>" alt="User Image">
                        <a class="users-list-name" href="sys_chatter.php?para=<?=$rs_chat->fld("usu_cod");?>&token=<?=$_SESSION["token"];?>"><?php echo $rs_chat->fld("usu_nome");?></a>
                        <!-- <span class="users-list-date">Today</span> -->
                        <a href="sys_chatter.php?para=<?=$rs_chat->fld("usu_cod");?>&token=<?=$_SESSION["token"];?>" class="btn btn-sm bg-teal">
                            <i class="fas fa-comments"></i>
                        </a>
                      </li>
                    <?php }	?>  
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <!-- <a href="javascript:">View All Users</a> -->
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
					</div>
					<!--/.direct-chat -->
				</div>
					
				<div class="col-sm-3"></div>
				
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


