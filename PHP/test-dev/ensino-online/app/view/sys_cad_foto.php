<?php
$sess = "HOME";
$pag = "home.php";
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
//require_once("../class/class.functions.php");
//require_once("../controller/acao_graficos.php");
require_once("../model/recordset.php");
//$fn = new functions();
?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Blank Page</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Blank Page</li>	
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<!-- Default box -->
			<div class="card">
				<div class="card-header">
				    <h3 class="card-title">Title</h3>
				    <div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
					</div>
				</div>
				<div class="card-body">
					<div id="my_photo_booth">
						<div id="my_camera"></div>

					<!-- First, include the Webcam.js JavaScript Library -->
						<script type="text/javascript" src="<?=$hosted;?>/js/webcam.min.js"></script>

				
					<!-- A button for taking snaps -->
					<form>
					<div id="pre_take_buttons">
					<input type="hidden" id="perfil" name="perfil" value="<?=$_SESSION['usu_cod'];?>" >
					<input type="hidden" id="nome" name="nome" value="<?=$_SESSION['nome_usu'];?>" >
					<!-- This button is shown before the user takes a snapshot -->
					<input type=button value="Take Snapshot" onClick="preview_snapshot()">
					</div>
					<div id="post_take_buttons" style="display:none">
					<!-- These buttons are shown after a snapshot is taken -->
					<input type=button value="&lt; Take Another" onClick="cancel_preview()">
					<input type=button value="Save Photo &gt;" onClick="save_photo()" style="font-weight:bold;">
					</div>
					</form>
					</div>

					<div id="results" style="display:none">
					<!-- Your captured image will appear here... -->
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">

				</div>
				<!-- /.card-footer-->
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
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.js"></script>
<!-- JS -->
<script src="<?=$hosted;?>/js/action_foto.js"></script>

</body>
</html>


