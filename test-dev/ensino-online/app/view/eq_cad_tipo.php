<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "EQ";
$pag = "eq_pg_tipo.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Cadastrar Tipo de Equipamento</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Tipo</a></li>
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
						<h3 class="card-title">Tipo</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form role="form" id="FormCadTipoeq">  
							<div class="row">								
								<div class="col-sm-5">
									<div class="form-group">
									  <label for="dp_nome">#Nome:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-server"></i></span>
											</div>
											<input type="text"  class="form-control"  id="tipo_desc" name="tipo_desc" maxlength="20" placeholder="Desc. do Nome"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
							</div>
							<!-- /.row --> 
							
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
							<!-- Mensagem  -->
								<div id="mens"></div>
							<!-- /.Mensagem -->		
						</form>
						<!-- /.form -->
					</div>
					<!-- /.card-body -->
					<div class="card-footer">					
						<button type="button" id="btn_CadTipoeq" class="btn btn-info btn-sm" type="submit"><i class="fas fa-save"></i> Salvar</button>
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
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?=$hosted;?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?=$hosted;?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
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

