<?php
require_once("../config/sessions.php");
require_once("../config/modals.php");
require_once("../model/recordset.php");
session_start();
extract($_GET); 
$rs = new recordset();
$sql = "SELECT * FROM `sys_usuario` WHERE `usu_email` LIKE '%".$mail."%'";  
$rs->FreeSql($sql);
$rs->GeraDados();
?>
<body class="hold-transition lockscreen">
	<!-- Automatic element centering -->
	<div class="lockscreen-wrapper">
		<div class="lockscreen-logo">
		<a href="../index.php" class="h1"><b>Admin</b>LTE</a>
		</div>
		<!-- User name -->
		<div class="lockscreen-name"><?=$rs->fld("usu_nome");?></div>

		<div class="help-block text-center">
			Sua senha foi resetada com suceso!! foi enviado em seu e-mail a nova senha e o link para a troca de senha.
		</div>
		<div class="text-center">
			<i class="fa fa-check text-green fa-4x"></i>
		</div>	
		<p class="mt-3 mb-1 text-center">
			<a href="<?=$hosted;?>/view/login.php">Login</a>
		</p>
	</div>
<!-- /.center -->

<!-- jQuery -->
<script src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
