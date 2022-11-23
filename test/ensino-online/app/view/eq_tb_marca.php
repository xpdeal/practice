<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql ="SELECT 
			a.marc_id,
			b.tipo_desc,
			a.marc_nome
		FROM eq_marca a
		JOIN eq_tipo b ON b.tipo_id = a.marc_tipoId";
		$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr>
			<td> Nenhuma Marca...</td>
			<td></td>
			<td></td>
			<td></td>			
		</tr>";  
	else:

$rs->FreeSql($sql);
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("marc_id");?></td>
		<td><?=$rs->fld("tipo_desc");?></td>
		<td><?=$rs->fld("marc_nome");?></td>
		<td>
			<div class="button-group">
				<a 	class="btn btn-primary btn-xs" data-toggle='tooltip' data-placement='bottom' title='Editar'     a href="eq_edit_marca.php?token=<?=$_SESSION['token']?>&acao=N&marcaid=<?=$rs->fld('marc_id');?>"><i class="fas fa-edit"></i></a>				
				<a 	class="btn btn-xs btn-info"    data-toggle='tooltip' data-placement='bottom' title='Visualizar' a href="eq_vis_marca.php?token=<?=$_SESSION['token']?>&acao=N&marcaid=<?=$rs->fld("marc_id");?>"><i class="far fa-eye"></i></a>
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