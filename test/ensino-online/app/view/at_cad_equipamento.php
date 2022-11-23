<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "EQ";
$pag = "at_pg_equipamento.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
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
						<h1>Cadastrar Equipamento</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Equipamento</a></li>
							<li class="breadcrumb-item active">Cadastro</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="card card-secondary card-outline">
					<div class="card-header">					
						<h3 class="card-title">Empresa</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form role="form" id="FormCadEq">  
							<div class="row">					    
								<!-- /.col --> 
								<div class="col-sm-3">
									<div class="form-group">
									  <label for="emp_nome">Selecione a Empresa:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-city"></i></span>
											</div>											
											<select class="form-control select2bs4" id="sel_empeq" name="sel_empeq"/>    
												<option value="">Selecione:</option>
												<?php
												$whr = "emp_Id<>0";
												$rs->Seleciona("*","sys_empresa",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição															 
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("emp_id");?>"> <?=$rs->fld("emp_alias");?></option>      
												<?php
												}  
												?> 
											</select>											
										</div>										
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-3">
									<div class="form-group">
									  <label for="sel_class">Selecione o Tipo:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-server"></i></span>
											</div>
											<select class="form-control select2bs4" id="sel_tipoeq" name="sel_tipoeq"/>    
												<option value="">Selecione:</option>
												<?php
												$whr = "tipo_id<>0";
												$rs->Seleciona("*","eq_tipo",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição															 
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("tipo_id");?>"> <?=$rs->fld("tipo_desc");?></option>      
												<?php
												}  
												?> 
											</select> 
										</div>
									</div>
									<!-- /.form-group -->
								</div>	
								<!-- /.col --> 
								<div class="col-sm-3">
									<div class="form-group">
									  <label for="sel_class">Selecione A Marca:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-apple-alt"></i></span>
											</div>
											<select class="form-control select2bs4" id="sel_marcaeq" name="sel_marcaeq"/>    
												<option value="">Selecione:</option>
												 
											</select> 
										</div>
									</div>
									<!-- /.form-group -->
								</div> 								             
							</div>
							<!-- /.row -->
							
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Modelo:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-mobile"></i></span>
											</div>
											<input type="text"  class="form-control" value="" id="eq_modelo" name="eq_modelo" maxlength="20" placeholder="Desc. o Modelo"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>						 
								<!-- /.col -->								
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#N&ordm; Serial:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-mobile"></i></span>
											</div>
											<input type="text" class="form-control" id="eq_serial" name="eq_serial" maxlength="20" placeholder="Desc. o N&ordm; Serial"value="" />
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Equipamento:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-mobile"></i></span>
											</div>
											<input class="form-control input-sm text-uppercase" id="eq_desc" name="eq_desc" maxlength="30" placeholder="Desc. o Equipamento" value="" />
										</div>
									</div>
									<!-- /.form-group -->
								</div>				             
							</div>
							<!-- /.row -->
							
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
									  <label for="sel_class">Selecione A Status:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-mobile"></i></span>
											</div>
											<select class="form-control select2bs4" id="sel_eqstatus" name="sel_eqstatus"/>    
												<option value="">Selecione:</option>
												<?php
													$whr = "status_id<>0";
													$rs->Seleciona("*","at_status",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
													while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
													?>
													<option value="<?=$rs->fld("status_id");?>"><?=$rs->fld("status_desc");?></option>
													<?php
													} 
												?> 
											</select> 
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-2">
									<div class="form-group">
									  <label>#Valor:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
											</div>
											<input class="form-control moeda" id="eq_valor" name="eq_valor" placeholder="Compl. o Valor:" value="" />
										</div>
									</div>
									<!-- /.form-group -->
								</div>
							</div>							
							<!-- /.row --> 
							
							<div class="row">
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
								<!-- /.formerros -->
							</div>
							<!-- /.row -->
							<!-- Mensagem  -->
								<div id="mens"></div>
							<!-- /.Mensagem -->	
						</form>
						<!-- /.form -->
					</div>
					<!-- /.card-body -->
					
					<div class="card-footer">					
						<button type="button" id="btn_CadEq" class="btn btn-info btn-sm" type="submit"><i class="fas fa-save"></i> Salvar</button>
						<a href="javascript:history.go(-1);" class="btn btn-sm btn-secondary"><i class="fas fa-hand-point-left"></i> Voltar</a>							
					</div>
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
<!-- Select2 -->
<script src="<?=$hosted;?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
<!-- InputMask Mscara java-->
<script src="<?=$hosted;?>/js/maskinput.js"></script>
<script src="<?=$hosted;?>/js/jmask.js"></script>
<script src="<?=$hosted;?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?=$hosted;?>/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!--Chama o java script -->
<script src="<?=$hosted;?>/js/action_system.js"></script>
<!-- Validation --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
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
