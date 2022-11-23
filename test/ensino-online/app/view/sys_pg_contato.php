<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "SYS";
$pag = "sys_pg_empresa.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$maximo = '3'; //RESULTADOS POR PÁGINA
$inicio = ($pageno * $maximo) - $maximo;
$sql = "SELECT * FROM sys_usuario a
		JOIN sys_classe b ON a.usu_classeId = b.classe_id
		JOIN sys_empresa c ON a.usu_empId = c.emp_id
		JOIN sys_departamento d ON a.usu_dpId = d.dp_id
		WHERE usu_ativo = '1' GROUP BY usu_email ORDER BY usu_nome ASC LIMIT ".$inicio.",".$maximo;
$rs->FreeSql($sql);
$total_pages = $rs->linhas / $maximo;
?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Contatos</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
						  <li class="breadcrumb-item"><a href="#">Home</a></li>
						  <li class="breadcrumb-item active">Contatos</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<!-- Default box -->
			<div class="card card-solid">
				<div class="card-body pb-0">
					<div class="row d-flex align-items-stretch">
						<?php 
						$rs->FreeSql($sql);
						while($rs->GeraDados()):				
						?>
						<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
							<div class="card bg-light">
								<div class="card-header text-muted border-bottom-0">
								  <?=$rs->fld("usu_escol");?>
								</div>
								<div class="card-body pt-0">
									<div class="row">
										<div class="col-7">
										  <h2 class="lead"><b><?=$rs->fld("usu_nome");?></b></h2>
										  <p class="text-muted text-sm"><b>Sobre: </b> <?=$rs->fld("emp_alias");?> / <?=$rs->fld("dp_nome");?> </p>
										  <ul class="ml-4 mb-0 fa-ul text-muted">
											<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Endere&ccedil;o: , <?=$rs->fld("emp_log");?> <?=$rs->fld("emp_num");?>, <?=$rs->fld("emp_bai");?>, <?=$rs->fld("emp_cid");?>, <?=$rs->fld("emp_uf");?></li>
											<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>Telefone :<?=$rs->fld("emp_tel");?> Ramal: <?=$rs->fld("usu_ramal");?></li>
										  </ul>
										</div>
										<div class="col-5 text-center">
										  <img src="<?=$hosted;?>/<?=$rs->fld("usu_foto");?>" alt="" class="img-circle img-fluid">
										</div>
									</div>
								</div>
								<div class="card-footer">
									<div class="text-right">
										<a href="sys_chatter.php?para=<?=$rs->fld("usu_cod");?>&token=<?=$_SESSION["token"];?>" class="btn btn-sm bg-teal">
										  <i class="fas fa-comments"></i>
										</a>
										<a href="sys_edit_usuario.php?token=<?=$_SESSION['token']?>&acao=N&usucod=<?=$rs->fld('usu_cod');?>" class="btn btn-sm btn-primary">
										  <i class="fas fa-user"></i> Editar Usu&aacute;rio
										</a>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
					<!-- /.card-body -->
					<div class="card-footer"> 
						<nav aria-label="Contacts Page Navigation"> 
							<ul class="pagination justify-content-center m-0">
								<li class="page-item">
									<a class="page-link" href="?pageno=1&token=<?=$_SESSION['token'];?>">First</a>
								</li>
								<li class="page-item">
										<a class="page-link" href="<?php echo"?pageno=".($pageno - 1)."&token=".$_SESSION['token']; ?>">Prev</a>
								</li>
								<li class="page-item">
										<a class="page-link"  href="<?php echo "?pageno=".($pageno + ($total_pages<1?1:0))."&token=".$_SESSION['token']; ?>" disabled>Next</a>
								</li>
								<li class="page-item">
										<a class="page-link" href="?pageno=<?php echo $total_pages."&token=".$_SESSION['token']; ?>">Last</a>
								</li>
							</ul>
						</nav>
					</div>
					<!-- /.card-footer -->
				</div>
				<!-- /.card -->
			</div>
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
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
</body>
</html>
