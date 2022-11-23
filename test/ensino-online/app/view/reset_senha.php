<?php
require_once("../config/sessions.php");
require_once("../config/modals.php");
/*
echo "<pre>";
	print_r($_SESSION);
echo "</pre>";
*/
//session_destroy();
?>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="reset_senha.php" class="h1"><b>Admin</b>LTE</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Entre com suas credenciais:</p>
				<form action="" method="post" id="login">
					<div class="input-group mb-3">
						<input type="email" class="form-control" required id="lg_email" placeholder="Email">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-at"></span>
							</div>
						</div>
					</div>					
					<div class="input-group mb-3">
						<input type="password" class="form-control" id="lg_password" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8"></div><!-- /.col -->
						<div class="col-4">
							<button type="button" id="bt_entrar" class="btn btn-primary btn-block">Entrar</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<div class="col-13" id="ers">
					<ul id="erros_frm"></ul>
				</div>
				<p class="mb-1">
					<a href="confirma_email.php">esqueci minha senha</a>
				</p>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
	<!-- jQuery -->
	<script src="<?= $hosted; ?>/assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= $hosted; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= $hosted; ?>/assets/dist/js/adminlte.min.js"></script>
	<!-- Java -->
	<script src="<?= $hosted; ?>/js/reset_senha.js"></script>

</body>

</html>