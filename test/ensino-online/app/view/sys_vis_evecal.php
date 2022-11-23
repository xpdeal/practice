<?php
$sess = "CAL";
$pag = "sys_vis_evcal.php";
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
require_once("../model/recordset.php");

$calid = $_GET['calid'];
$rs = new recordset();
$rs2 = new recordset();
$rs3 = new recordset();
$fn = new functions();
$sql_cal = "SELECT * FROM sys_calendario a 
JOIN sys_evento b ON a.cal_eveid = b.eve_id
WHERE cal_id=" . $calid;
$rs->FreeSql($sql_cal);
$rs->GeraDados();
$cal_criado = $rs->fld('cal_criado');
if (($rs->fld("cal_criado") == $_SESSION['usu_cod']) or ($_SESSION['classe'] == 1)) {
	$per = "";
} else {
	$per = "DISABLED";
}
//echo $per;

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Visualizar Eventos</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Calend&aacute;rio</a></li>
						<li class="breadcrumb-item active">Evento</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="card <?= $rs->fld("eve_tema"); ?>">
			<div class="card-header">
				<h3 class="card-title"><?= $rs->fld("eve_desc"); ?></h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
					<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
				</div>
			</div>

			<div class="card-body">
				<form role="form" id="FormEditEvento">
					<div class="card-body">
						<?php
								$sql = "SELECT * FROM sys_usuario a
							JOIN sys_empresa c ON a.usu_empId = c.emp_id
							JOIN sys_departamento d ON a.usu_dpId = d.dp_id 								
							WHERE usu_cod =" . $cal_criado;
						$rs3->FreeSql($sql);
						$rs3->GeraDados();
						?>
						<div class="form-group row">							
							<label for="" class="col-sm-2 col-form-label">Empresa:</label>
							<div class="col-sm-4">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-city"></i></span>
									</div>
									<input type="text" disabled class="form-control" value="<?=$rs3->fld("emp_alias");?>" />
									<!-- /.form-group -->
								</div>
							</div>
						</div>

						<div class="form-group row">							
							<label for="" class="col-sm-2 col-form-label">Departamento:</label>
							<div class="col-sm-4">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-building"></i></span>
									</div>
									<input type="text" disabled class="form-control" value="<?=$rs3->fld("dp_nome");?>" />
									<!-- /.form-group -->
								</div>
							</div>
						</div>

						<div class="form-group row">							
							<label for="" class="col-sm-2 col-form-label">Criardo Por::</label>
							<div class="col-sm-4">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
									</div>
									<input type="text" disabled class="form-control" value="<?=$rs3->fld("usu_nome");?>" />
									<!-- /.form-group -->
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label for="vcal_datai" class="col-sm-2 col-form-label">In&iacute;cio:</label>
							<div class="col-sm-2">
								<div class="input-group date" id="calendario" data-target-input="nearest">
									<input type="data" class="form-control" id="vcal_datai" name="vcal_datai" value="<?= $fn->data_br($rs->fld("cal_dataini")); ?>" <?= $per; ?>>
									<div class="input-group-append" data-target="#calendario" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="far fa-calendar-check"></i></div>
									</div>
								</div>
							</div>

							<div class="col-sm-2">
								<div class="input-group date" id="timepicker" data-target-input="nearest">
									<input type="text" id="vcal_horai" name="vcal_horai" value="<?= $rs->fld("cal_horaini"); ?>" <?= $per; ?> class="form-control datetimepicker-input" data-target="#timepicker" />
									<div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="far fa-clock"></i></div>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label for="vcal_dataf" class="col-sm-2 col-form-label">Termino:</label>
							<div class="col-sm-2">
								<div class="input-group date" id="calendario1" data-target-input="nearest">
									<input type="data" class="form-control" id="vcal_dataf" name="vcal_dataf" value="<?= $fn->data_br($rs->fld("cal_datafim")); ?>" <?= $per; ?> data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
									<div class="input-group-append" data-target="#calendario1" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="far fa-calendar-check"></i></div>
									</div>
								</div>
							</div>

							<div class="col-sm-2">
								<div class="input-group date" id="timepicker1" data-target-input="nearest">
									<input type="text" id="vcal_horaf" name="vcal_horaf" value="<?= $rs->fld("cal_horafim"); ?>" <?= $per; ?> class="form-control datetimepicker-input" data-target="#timepicker" />
									<div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="far fa-clock"></i></div>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label for="vcal_qpv" class="col-sm-2 col-form-label">Visualizando:</label>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-user-check"></i></span>
										</div>
										<select class="form-control select2bs4" name="vcal_eveusu" id="vcal_eveusu" <?= $per; ?> MULTIPLE>
											<?php
											$seld = $rs->fld("cal_eveusu");
											$sq = "SELECT * FROM sys_usuario WHERE usu_ativo='1'";
											$rs2->FreeSql($sq);
											$n = "";
											while ($rs2->GeraDados()) {
												$slc = "";
												if (strpos($seld, "[" . $rs2->fld("usu_cod") . "]")) {
													$slc = "SELECTED";
													$n .= "[" . $rs2->fld("usu_cod") . "]";
												}
											?>
												<option value="<?= $rs2->fld("usu_cod") ?>" <?= $slc; ?>>
													<?= $rs2->fld("usu_nome"); ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
						</div>
					</div>

					<div class="card-body pad">
						<div class="mb-3">
							<label for="vcal_obs">Observa&ccedil;&atilde;o: <small>(Opcional)</small></label>
							<textarea name="vcal_obs" id="vcal_obs" class='form-control' <?= $per; ?>><?= $rs->fld("cal_obs"); ?></textarea>
						</div>
						<input type="hidden" class="form-control" id="vcal_id" name="vcal_id" value="<?= $rs->fld("cal_id"); ?>" READONLY>
						<input type="hidden" value="<?= $_SESSION['token']; ?>" name="token" id="token" />
					</div>
					<div id="mens"></div>
				</form>
				<!-- /.form -->
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button class="btn btn-sm btn-info" <?= $per; ?> type="button" id="bt_EditEv"><i class="fas fa-sync-alt"></i> Alterar</button>
				<a class="btn btn-sm btn-secondary" type="button" href="javascript:history.go(-1);"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
				<?php if ($_SESSION['usu_classe'] == 1) : // A partir do Administrador
				?>
					<button class="btn btn-sm btn-danger pull-right" id="Exc_evecal" data-evento=<?= $rs->fld("cal_id"); ?>><i class="fas fa-trash"></i> Excluir</button>
				<?php endif; ?>
			</div>
			<!-- /.card-footer-->
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once("../config/footer.php"); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= $hosted; ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= $hosted; ?>/js/jquery-ui-timepicker-addon.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= $hosted; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= $hosted; ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= $hosted; ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?= $hosted; ?>/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?= $hosted; ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= $hosted; ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= $hosted; ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $hosted; ?>/assets/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="<?= $hosted; ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!--Chama o java script -->
<script src="<?= $hosted; ?>/js/action_system.js"></script>
<!-- Validation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<!-- Page script -->
<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})

		$("#calendario").datetimepicker({
			format: 'DD/MM/YYYY',
			pickDate: false,
			pickSeconds: false,
			pick12HourFormat: false
		})

		$("#calendario1").datetimepicker({
			format: 'DD/MM/YYYY',
			pickDate: false,
			pickSeconds: false,
			pick12HourFormat: false
		})

		//Timepicker
		$('#timepicker').datetimepicker({
			format: 'HH:mm',
			pickDate: false,
			pickSeconds: false,
			pick12HourFormat: false
		})
		$('#timepicker1').datetimepicker({
			format: 'HH:mm',
			pickDate: false,
			pickSeconds: false,
			pick12HourFormat: false
		})


		//Bootstrap Duallistbox
		// $('.duallistbox').bootstrapDualListbox()

		//Colorpicker
		$('.my-colorpicker1').colorpicker()
		//color picker with addon
		$('.my-colorpicker2').colorpicker()

		$('.my-colorpicker2').on('colorpickerChange', function(event) {
			$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
		});

		$("input[data-bootstrap-switch]").each(function() {
			$(this).bootstrapSwitch('state', $(this).prop('checked'));
		});

	})
</script>
</body>

</html>