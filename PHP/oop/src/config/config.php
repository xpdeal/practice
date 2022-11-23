<?php
date_default_timezone_set('America/Sao_paulo');

define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','projeto_mvc');



$con  = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME)or die(mysqli_error($con));


// if(!$con){
//     echo "Sem conexão"; exit;
// } else {
//     echo"Conectado porra!";
// }

