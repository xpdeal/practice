<?php
//-------------------------------------------------------------------------------------------------------
//Widgets do Index ////////////////////////////////////////////////////////////////////////////////////||
//=======================================================================================================

//---------------------------------------------------------------\
////////////////   PERMISSÃO DE ADMN \\\\\\\\\\\\\\\\\\\\\\\\\\\\|
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

/////////// USUARIOS \\\\\\\\\\\\
//==================================\\
$sql ="SELECT * FROM sys_usuario
WHERE usu_ativo = '1'" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$usuarios = $rs->linhas;
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
//|    			CORES DA TAMPLATE                                  |
//|----------------------------------------------------------------/

/////////// COR DASHBOARD \\\\\\\\\\\\
//==================================\\
$sql ="SELECT * FROM sys_usuario a
JOIN sys_dashboard b ON a.usu_dashId = b.dash_id 
WHERE usu_ativo ='1' AND usu_cod = ".$_SESSION['usu_cod'] ;
$rs->FreeSql($sql);
$rs->GeraDados();	
$cordahboard = $rs->fld("dash_collor");
///==================================\\\
/////////// COR MENUTOP \\\\\\\\\\\\
//==================================\\
$sql ="SELECT * FROM sys_usuario a
JOIN sys_dashboard b ON a.usu_mnutopId = b.dash_id 
WHERE usu_ativo ='1' AND usu_cod = ".$_SESSION['usu_cod'] ;
$rs->FreeSql($sql);
$rs->GeraDados();	
$cormenutop = $rs->fld("dash_collor");
///==================================\\\
/////////// COR DA PAGINA \\\\\\\\\\\\
//==================================\\
$sql ="SELECT * FROM sys_usuario a
JOIN sys_dashboard b ON a.usu_pagId = b.dash_id 
WHERE usu_ativo ='1' AND usu_cod = ".$_SESSION['usu_cod'] ;
$rs->FreeSql($sql);
$rs->GeraDados();	
$corpagina = $rs->fld("dash_collor");
///==================================\\\

//|----------------------------------------------------------------\
//|    			FIM CORES                                          |
//|----------------------------------------------------------------/

//|----------------------------------------------------------------\
//|    			FIM PERMISSÃO DE ADMN                              |
//|----------------------------------------------------------------/

//---------------------------------------------------------------\
////////////////   PERMISSÃO DE USUARIO \\\\\\\\\\\\\\\\\\\\\\\\\|
//---------------------------------------------------------------/

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
$sql ="SELECT * FROM sys_departamento WHERE dp_Id=".$_SESSION['usu_departamento'];
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$departamento_local = $rs->linhas; 
///==================================\\\

/////////// USUARIOS \\\\\\\\\\\\
//==================================\\
$sql ="SELECT * FROM sys_usuario
WHERE usu_ativo = '1' AND usu_empId = ".$_SESSION['usu_empresa'];
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$usuario_local = $rs->linhas;
///==================================\\\

/////////// USUARIOS \\\\\\\\\\\\
//==================================\\
$sql ="SELECT * FROM at_equipamento
WHERE eq_ativo = '1' AND eq_empId = ".$_SESSION['usu_empresa'];   
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$equipamento_local = $rs->linhas;
///==================================\\\



//|----------------------------------------------------------------\
//|    			FIM PERMISSÃO DE ADMN                              |
//|----------------------------------------------------------------/























 
?>