<?php
$sess = "REL";
$pag = "sys_pg_relatorio.php";
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
require_once("../model/recordset.php");
$fn = new functions();
$rs = new recordset();
?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Relat&oacute;rios</h1>
					</div>
					
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Relat&oacute;rios</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
			   
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
					 <!-- /.card -->
						<div class="card card-secondary card-outline">
							<div class="card-header">
							  <h3 class="card-title"> Filtros</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
									<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
								</div>
							</div>
							<!-- /.card-header -->
							
							<div class="card-body">
								<div class="form-group row">									
									<div class="col-sm-2">
										<div class="form-group">
										  <label>Data Inicial:</label>
											<div class="input-group">
												<div class="input-group date" id="calendario" data-target-input="nearest">
													<div class="input-group-append" data-target="#calendario" data-toggle="datetimepicker">
														<div class="input-group-text" ><i class="far fa-calendar-check"></i></div>
													</div>
													<input type="text" class="form-control data_br" name="rel_di" id="rel_di" value=""/>																												
												</div>
											</div>
										</div>
									</div>
									
									<div class="form-group col-sm-2">
										<div class="form-group">
										  <label for="rel_df">Data Final:</label>
											<div class="input-group">
												<div class="input-group date" id="calendario1" data-target-input="nearest">
													<div class="input-group-append" data-target="#calendario1" data-toggle="datetimepicker">
														<div class="input-group-text" ><i class="far fa-calendar-check"></i></div>
													</div>
													<input type="text" class="form-control  data_br" name="rel_df" id="rel_df" />																
												</div>									
											</div>		  
										</div>	<input type="hidden" value="at_equipamento" name="rel_tbl" id="rel_tbl">			
									</div>
									
									<div class="form-group">
										<!--CSS QUe alinha o botão -->
										<style>.row .btn { margin-top: 7px;}</style>
											<br/>
											<button class="btn  btn-primary" type="button" id="bt_relEqdesc"><i class="far fa-file-alt"></i>  Gerar </button>
									</div>									
								</div>
								<!-- /.row -->			
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /card-outline -->


						<!-- Main content -->
						<div class="invoice p-3 mb-3">
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
									<img class="img-fluid img-thumbnail img-responsive " src="<?=$hosted;?><?=$rs->fld('emp_logo');?>" alt="Logo da Empresa">																	
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
											<tbody id="rls"></tbody>
										</tbody>
									</table>
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->					 

							<!-- this row will not appear when printing -->
							<div class="row no-print">
								<div class="col-12">
									<a  id="bt_print" href="#" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>								  
									<a id="bt_excel" href="#" class="btn btn-success float-right" style="margin-right: 5px;"><i class="fas fa-file-excel-o"></i> Gerar Excel</a></button>								
								</div>
							</div>	
						</div>
						<!-- /.invoice -->
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
<script src="<?=$hosted;?>/js/jquery-ui-timepicker-addon.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
<!-- InputMask -->
<script src="<?=$hosted;?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?=$hosted;?>/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="<?=$hosted;?>/js/maskinput.js"></script>
<script src="<?=$hosted;?>/js/jmask.js"></script>
<!--Chama o java script para mascara e cep -->
<!-- date-range-picker -->
<script src="<?=$hosted;?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!--Chama o java script -->
<script src="<?=$hosted;?>/js/action_system.js"></script>  
<!-- Validation --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script>
  $(function () {
  

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

     $("#calendario").datetimepicker({
       format: 'DD/MM/YYYY',
       
        pickTime: false,
        pickSeconds: false,
        pick12HourFormat: false  
    })
	$("#calendario1").datetimepicker({
       format: 'DD/MM/YYYY',
       
        pickTime: false,
        pickSeconds: false,
        pick12HourFormat: false  
    })
   

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
</body>
</html>