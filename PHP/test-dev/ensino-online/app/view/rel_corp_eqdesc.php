<?php
require_once("../class/class.functions.php");
require_once("../model/recordset.php");
$rs = new recordset();
$func 	= new functions();
/*echo "<pre>";
print_r($_GET);
echo "</pre>";*/
extract($_GET);
$campo = "eq_datades";
$filtro='';
$sql = "SELECT * FROM ".$tabela."  a
		JOIN sys_empresa  b ON a.eq_empId  = b.emp_id 
		JOIN eq_marca     c ON a.eq_marcId = c.marc_id
		JOIN sys_usuario  d ON a.eq_usucad = d.usu_cod
		JOIN eq_tipo      e ON a.eq_tipoId = e.tipo_id
		JOIN at_status    f ON a.eq_statusId = f.status_id
		WHERE eq_ativo = '1'";  
if(isset($di) AND $di<>""){
	$sql.=" AND ".$campo." >='".$func->data_usa($di)." 00:00:00'";
	$filtro.= "Data Inicial: ".$di."<br>";
}
if(isset($df) AND $df<>""){
	$sql.=" AND ".$campo." <='".$func->data_usa($df)." 23:59:59'";
	$filtro.= "Data Final: ".$df."<br>";
}
$sql.=" ORDER BY emp_alias  ";   
$rs->FreeSql($sql); 
while($rs->GeraDados()): 
$data1 = $rs->fld("eq_datacad"); 
$data2 = $rs->fld("eq_datades");
$diferenca = strtotime($data2) - strtotime($data1);
$dias = floor($diferenca / (60 * 60 * 24));
?>
	<tr>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("tipo_desc");?></td>
		<td><?=$rs->fld("marc_nome");?></td>
		<td><?=$rs->fld("eq_modelo");?></td>
		<td><?=$rs->fld("eq_desc");?></td> 
		<td><?=$func->formata_din($rs->fld("eq_valor"));?></td>   
		<td><?=$rs->fld("usu_nome");?></td>   
		<td><?=$func->data_hbr($rs->fld("eq_datacad"));?></td>  
		<td><?=$func->data_hbr($rs->fld("eq_datades"));?></td>  
		<td><?=$dias;?> Dias</td>  
	</tr>
<?php endwhile;
echo "<tr><td><strong>".$rs->linhas." Registros</strong></td></tr>";
echo "<tr><td><address>".$filtro."</address></td></tr>";	
?>
	