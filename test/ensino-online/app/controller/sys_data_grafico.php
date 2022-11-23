<?php
//-------------------------------------------------------------------------------------------------------
//GRAFICOS ////////////////////////////////////////////////////////////////////////////////////||
//=======================================================================================================

//---------------------------------------------------------------\
////////////////   PERMISSÃO DE ADMN \\\\\\\\\\\\\\\\\\\\\\\\\\\\|
//---------------------------------------------------------------/

//-------------------------------------------------------------------------
//EVENTOS ////////////////////////////////////////////////////////////////
//=========================================================================

//---------------------------------------------------------------\
////////////////  EVENTO 1 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|
//---------------------------------------------------------------/


//////// EVENTO 1 MES 1 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
// $sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)=(MONTH(NOW())-1)" ;
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 1 AND  cal_eveid =1" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$jan_ev1 = $rs->linhas; 
///=============================\\\

//////// EVENTO 1 MES 2 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 2 AND  cal_eveid =1" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$fev_ev1 = $rs->linhas; 
///=============================\\\

//////// EVENTO 1 MES 3 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 3 AND  cal_eveid =1" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mar_ev1 = $rs->linhas; 
///=============================\\\

//////// EVENTO 1 MES 4 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 4 AND  cal_eveid =1" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$abr_ev1 = $rs->linhas; 
///=============================\\\

//////// EVENTO 1 MES 5 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 5 AND  cal_eveid =1" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mai_ev1 = $rs->linhas; 
///=============================\\\

//////// EVENTO 1 MES 6 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 6 AND  cal_eveid =1" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$jun_ev1 = $rs->linhas; 
///=============================\\\

//////// EVENTO 1 MES 7 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 7 AND  cal_eveid =1" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$jul_ev1 = $rs->linhas; 
///=============================\\\

//---------------------------------------------------------------\
////////////////  EVENTO 2 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|
//---------------------------------------------------------------/

//////// EVENTO 2 MES 1 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
// $sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)=(MONTH(NOW())-1)" ;
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 1 AND  cal_eveid =2" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$jan_ev2 = $rs->linhas; 
///=============================\\\

//////// EVENTO 2 MES 2 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 2 AND  cal_eveid =2" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$fev_ev2 = $rs->linhas; 
///=============================\\\

//////// EVENTO 2 MES 3 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 3 AND  cal_eveid =2" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mar_ev2 = $rs->linhas; 
///=============================\\\

//////// EVENTO 2 MES 4 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 4 AND  cal_eveid =2" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$abr_ev2 = $rs->linhas; 
///=============================\\\

//////// EVENTO 2 MES 5 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 5 AND  cal_eveid =2";
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mai_ev2 = $rs->linhas; 
///=============================\\\

//////// EVENTO  2 MES 6 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 6 AND  cal_eveid =2" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$jun_ev2 = $rs->linhas; 
///=============================\\\

//////// EVENTO 2 MES 7 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 7 AND  cal_eveid =2" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$jul_ev2 = $rs->linhas; 
///=============================\\\

//---------------------------------------------------------------\
////////////////   EVENTO TOTAL \\\\ \\\\\\\\\\\\\\\\\\\\\\\\\\\\|
//---------------------------------------------------------------/

//////// EVENTO MES 1 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
// $sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)=(MONTH(NOW())-1)" ;
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 1" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$jan_ev = $rs->linhas; 
///=============================\\\

//////// EVENTO MES 2 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 2" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$fev_ev = $rs->linhas; 
///=============================\\\

//////// EVENTO MES 3 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 3" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mar_ev = $rs->linhas; 
///=============================\\\

//////// EVENTO MES 4 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 4" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$abr_ev = $rs->linhas; 
///=============================\\\

//////// EVENTO MES 5 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 5" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mai_ev = $rs->linhas; 
///=============================\\\

//////// EVENTO MES 6 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 6" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$jun_ev = $rs->linhas; 
///=============================\\\

//////// EVENTO MES 7 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 7" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$jul_ev = $rs->linhas; 
///=============================\\\

//////// EVENTO MES 8 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 8" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$ago_ev = $rs->linhas; 
///=============================\\\

//////// EVENTO MES 9 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 9" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$set_ev = $rs->linhas; 
///=============================\\\

//////// EVENTO MES 10 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 10" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$out_ev = $rs->linhas; 
///=============================\\\

//////// EVENTO MES 11 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 11" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$nov_ev = $rs->linhas; 
///=============================\\\

//////// EVENTO MES 12 \\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_calendario a JOIN sys_evento b ON a.cal_eveid = b.eve_id WHERE MONTH(`cal_datafim`)= 12" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$dez_ev = $rs->linhas; 
///=============================\\\

//|----------------------------------------------------------------\
//|    			FIM EVENTO                                         |
//|----------------------------------------------------------------/


//---------------------------------------------------------------\
////////////////   GRAFICO SYSTEMA \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|
//---------------------------------------------------------------/

/////////// EMPRESAS \\\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_empresa" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$empresas = $rs->linhas; 
///=============================\\\

/////////// DEPARTAMENTOS \\\\\\\\\\\\
//==================================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_departamento" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$departamentos = $rs->linhas; 
///==================================\\\

/////////// EMPRESAS \\\\\\\\\\\\
//==============================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_empresa WHERE emp_Id=".$_SESSION['usu_empresa'];
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$empresa_local = $rs->linhas; 
///=============================\\\

/////////// DEPARTAMENTOS \\\\\\\\\\\\
//==================================\\
$rs = new recordset();
$sql ="SELECT * FROM sys_departamento" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$departamentos = $rs->linhas; 
///==================================\\\

/////////// USUARIOS \\\\\\\\\\\\
//==================================\\
$sql ="SELECT * FROM sys_usuario
WHERE usu_ativo = '1'" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$usuarios = $rs->linhas;
///==================================\\\

/////////// EQUIPAMENTOS \\\\\\\\\\\\
//==================================\\
$sql ="SELECT * FROM at_equipamento
WHERE eq_ativo = '1'" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$equipamentos = $rs->linhas;
///==================================\\\

//|----------------------------------------------------------------\
//|    			FIM PERMISSÃO DE ADMN                              |
//|----------------------------------------------------------------/





















 
?>