<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql ="SELECT * FROM eq_tipo";
		$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr>
			<td> Nenhuma Tipo...</td>
			<td></td>
			<td></td>
			<td></td>			
		</tr>"; 
	else:

$rs->FreeSql($sql);
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("tipo_id");?></td>		
		<td><?=$rs->fld("tipo_desc");?></td>
		<td>
			<div class="button-group">
				<a 	class="btn btn-primary btn-xs" data-toggle='tooltip' data-placement='bottom' title='Editar'     a href="eq_edit_tipo.php?token=<?=$_SESSION['token']?>&acao=N&tipoid=<?=$rs->fld('tipo_id');?>"><i class="fas fa-edit"></i></a>				
				<a 	class="btn btn-xs btn-info"    data-toggle='tooltip' data-placement='bottom' title='Visualizar' a href="eq_vis_tipo.php?token=<?=$_SESSION['token']?>&acao=N&tipoid=<?=$rs->fld("tipo_id");?>"><i class="far fa-eye"></i></a>
			</div>
		</td> 
		  
	</tr>
<?php  
}
   
endif;
?>	
 </tbody>
 <tfoot>
    <tr>
	   
	</tr>
 </tfoot>