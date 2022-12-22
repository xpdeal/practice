<?php
require_once("../config/sessions.php");
require_once("../config/modals.php");
?>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="confirma_email.php" class="h1"><b>Admin</b>LTE</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Confirme seu e-mail.</p>
				<form action="" method="post" id="Formcmail">
					<div class="input-group mb-3">
						<input type="email" id="mail" name="mail" value="" REQUIRED class="form-control" placeholder="email">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-at"></span>
							</div>
						</div>
					</div>
					<div id="erros_frm" class="clearfix" style="display:none;">
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<ol>
								<!-- Erros são colocados aqui pelo validade -->
							</ol>
						</div>
					</div>
					<!-- Mensagem  -->
					<div id="mensCmail"></div>
					<!-- /.Mensagem -->
					<div class="row">
						<div class="col-12">
							<button type="submit" id="btn_confirma_email" class="btn btn-primary btn-block"><i class="fas fa-retweet"></i> Resetar senha</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<p class="mt-3 mb-1">
					<a href="login.php">Login</a>
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
	<script src="<?= $hosted; ?>/js/action_reset_email.js"></script>
	<!-- Validation -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
</body>

</html>