<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql = " SELECT 
			a.eq_id,
			b.emp_alias,
			c.marc_nome,
			a.eq_modelo,
			a.eq_serial,
			a.eq_desc,
			f.status_color,
			f.status_classe,
			a.eq_datacad,
			d.usu_nome

		FROM at_equipamento a
			JOIN sys_empresa  b ON a.eq_empId    = b.emp_id 
			JOIN eq_marca     c ON a.eq_marcId   = c.marc_id
			JOIN sys_usuario  d ON a.eq_usucad   = d.usu_cod
			JOIN eq_tipo      e ON a.eq_tipoId   = e.tipo_id
			JOIN at_status    f ON a.eq_statusId = f.status_id
		WHERE eq_ativo = '1'";
$rs->FreeSql($sql);
if ($rs->linhas == 0) :
	echo "<tr>
			<td> Nenhum Equipamento...</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>			
			<td></td>
		</tr>";
else :
	while ($rs->GeraDados()) { ?>
		<tr>
			<td><?= $rs->fld("eq_id"); ?></td>
			<td><?= $rs->fld("emp_alias"); ?></td>
			<td><?= $rs->fld("marc_nome"); ?></td>
			<td><?= $rs->fld("eq_modelo"); ?></td>
			<td><?= $rs->fld("eq_serial"); ?></td>
			<td><?= $rs->fld("eq_desc"); ?></td>
			<td>
				<p class="<?= $rs->fld("status_color"); ?>"><i class="<?= $rs->fld("status_classe"); ?> "></i></p>
			</td>
			<td><?= $fn->data_hbr($rs->fld("eq_datacad")); ?></td>
			<td><?= $rs->fld("usu_nome"); ?></td>
			<td>
				<div class="button-group">
					<a class="btn btn-primary btn-xs" data-toggle='tooltip' data-placement='bottom' title='Editar' a href="eq_edit_equipamento.php?token=<?= $_SESSION['token'] ?>&acao=N&eqid=<?= $rs->fld('eq_id'); ?>"><i class="fas fa-edit"></i></a>
					<a class="btn btn-xs btn-info" data-toggle='tooltip' data-placement='bottom' title='Visualizar' a href="eq_vis_equipamento.php?token=<?= $_SESSION['token'] ?>&acao=N&eqid=<?= $rs->fld("eq_id"); ?>"><i class="far fa-eye"></i></a>
				</div>
			</td>

		</tr>
<?php }
endif;
?>