<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");  
$fn = new functions();
$rs = new recordset();
$sql =" SELECT 
			a.mail_Id,
			b.usu_nome,
			a.mail_assunto,
			c.status_classe,
			c.status_icon,
			a.mail_statusId,
			a.mail_data

		FROM sys_mail  a
			JOIN sys_usuario       b ON a.mail_destino_usuId     = b.usu_cod
			JOIN sys_mail_status   c ON a.mail_envio_statusId    = c.status_Id		
		WHERE mail_envio_statusId = '3' AND mail_envio_usuId =".$_SESSION['usu_cod'];
		$sql.=" ORDER BY mail_data DESC ";   
	$rs->FreeSql($sql);
	
	if($rs->linhas==0):
	echo "	<tr>
				<td> Nenhuma mensagem...</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>";
	else:
		while($rs->GeraDados()){?> 
		<tr>
			
			<td class="mailbox-attachment"><a href="sys_vis_mail_enviado.php?token=<?=$_SESSION['token'];?>&acao=N&mail_Id=<?=$rs->fld("mail_Id");?>"><?=$rs->fld("usu_nome");?></a></td>
			<td class="mailbox-subject"><b><?=$rs->fld("mail_assunto");?></b></td>								
			<td><span class="badge bg-<?=$rs->fld("status_classe");?> "><?=$rs->fld("status_icon");?></span></td>
			</td>
			<?php if($rs->fld("mail_statusId")==2): ?>
					<td class="mailbox-star"><i class="fas fa-eye text-blue"></i></a></td>					 
				<?php else: ?>
					<td class="mailbox-star"><i class="fas fa-eye-slash text-red"></i></a></td>
				<?php endif;?>
			<td class="mailbox-date"><?=$fn->data_hbr($rs->fld("mail_data"));?></td>		
		</tr>
<?php                    
	}endif;
?>