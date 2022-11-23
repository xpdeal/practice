<?php
$sess = "HOME";
$pag = "home.php";
header("Refresh: 10");
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
require_once("../controller/sys_data_widgets.php");
require_once("../model/recordset.php");
$fn = new functions();
$rs = new recordset();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
<!-- -----------------------------------------------------------------------------------------------------
//Administrador  //////////////////////////////////////////////////////////////////////////////////////||
//======================================================================================================= -->
            <?php if($_SESSION['usu_classe']==1):// A partir do Administrador?>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$empresas;?></h3>

                            <p>Empresas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_empresa.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$departamentos;?></h3>

                            <p>Departamentos</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-building"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_departamento.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$usuarios?></h3>

                            <p>Usu&aacute;rios</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_usuario.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$equipamentos;?></h3>

                            <p>Equipamentos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/at_pg_equipamento.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="fas fa-city"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Empresas</span>
                            <span class="info-box-number"><?=$empresas;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$empresas;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="far fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Departamentos</span>
                            <span class="info-box-number"><?=$departamentos;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$departamentos;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="ion ion-person-add"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usu&aacute;rios</span>
                            <span class="info-box-number"><?=$usuarios?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width:<?=$usuarios?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="ion ion-pie-graph"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Equipamentos</span>
                            <span class="info-box-number"><?=$equipamentos;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$equipamentos;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="fas fa-city"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Empresas</span>
                            <span class="info-box-number"><?=$empresas;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="far fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Departamentos</span>
                            <span class="info-box-number"><?=$departamentos;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="ion ion-person-add"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usu&aacute;rios</span>
                            <span class="info-box-number"><?=$usuarios?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="ion ion-pie-graph"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Equipamentos</span>
                            <span class="info-box-number"><?=$equipamentos;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <?php endif; ?>
            <!-- -------------------------------------------------------------------------------------------------------
//USUARIO ////////////////////////////////////////////////////////////////////////////////////////////////||
//======================================================================================================= --!>
			<?php if($_SESSION['usu_classe']==2):// A partir do USUARIO?>			
			<!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$empresas;?></h3>

                            <p>Empresas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_empresa.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$departamentos;?></h3>

                            <p>Departamentos</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-building"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_departamento.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$usuarios?></h3>

                            <p>Usu&aacute;rios</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_usuario.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$equipamentos;?></h3>

                            <p>Equipamentos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/at_pg_equipamento.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="fas fa-city"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Empresas</span>
                            <span class="info-box-number"><?=$empresas;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$empresas;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="far fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Departamentos</span>
                            <span class="info-box-number"><?=$departamentos;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$departamentos;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="ion ion-person-add"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usu&aacute;rios</span>
                            <span class="info-box-number"><?=$usuarios?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width:<?=$usuarios?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="ion ion-pie-graph"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Equipamentos</span>
                            <span class="info-box-number"><?=$equipamentos;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$equipamentos;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="fas fa-city"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Empresas</span>
                            <span class="info-box-number"><?=$empresas;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="far fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Departamentos</span>
                            <span class="info-box-number"><?=$departamentos;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="ion ion-person-add"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usu&aacute;rios</span>
                            <span class="info-box-number"><?=$usuarios?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="ion ion-pie-graph"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Equipamentos</span>
                            <span class="info-box-number"><?=$equipamentos;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <?php endif; ?>

            <!-- --------------------------------------------------------------------------------------------------
//CLIENTE  //////////////////////////////////////////////////////////////////////////////////////////||
//====================================================================================================== --!>
		<?php if($_SESSION['usu_classe']==3):// A partir do USUARIO?>			
			<!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$empresa_local;?></h3>

                            <p>Empresas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_empresa.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$departamento_local;?></h3>

                            <p>Departamentos</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-building"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_departamento.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$usuario_local?></h3>

                            <p>Usu&aacute;rios</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_usuario.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$equipamento_local;?></h3>

                            <p>Equipamentos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/at_pg_equipamento.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="fas fa-city"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Empresas</span>
                            <span class="info-box-number"><?=$empresa_local;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$empresas;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="far fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Departamentos</span>
                            <span class="info-box-number"><?=$departamento_local;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$departamento_local;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="ion ion-person-add"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usu&aacute;rios</span>
                            <span class="info-box-number"><?=$usuario_local?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width:<?=$usuario_local?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="ion ion-pie-graph"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Equipamentos</span>
                            <span class="info-box-number"><?=$equipamento_local;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$equipamento_local;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="fas fa-city"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Empresas</span>
                            <span class="info-box-number"><?=$empresa_local;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="far fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Departamentos</span>
                            <span class="info-box-number"><?=$departamento_local;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="ion ion-person-add"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usu&aacute;rios</span>
                            <span class="info-box-number"><?=$usuario_local?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="ion ion-pie-graph"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Equipamentos</span>
                            <span class="info-box-number"><?=$equipamento_local;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <?php endif; ?>

            <!-- --------------------------------------------------------------------------------------------------
//GESTOR //////////////////////////////////////////////////////////////////////////////////////////////||
//====================================================================================================== --!>
		<?php if($_SESSION['usu_classe']==4):// A partir do USUARIO?>			
			<!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$empresa_local;?></h3>

                            <p>Empresas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_empresa.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$departamento_local;?></h3>

                            <p>Departamentos</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-building"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_departamento.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$usuario_local?></h3>

                            <p>Usu&aacute;rios</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/sys_pg_usuario.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-<?=$cordahboard;?>">
                        <div class="inner">
                            <h3><?=$equipamento_local;?></h3>

                            <p>Equipamentos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?=$hosted;?>/view/at_pg_equipamento.php?token=<?=$_SESSION['token'];?>"
                            class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="fas fa-city"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Empresas</span>
                            <span class="info-box-number"><?=$empresa_local;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$empresas;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="far fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Departamentos</span>
                            <span class="info-box-number"><?=$departamento_local;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$departamento_local;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="ion ion-person-add"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usu&aacute;rios</span>
                            <span class="info-box-number"><?=$usuario_local?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width:<?=$usuario_local?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-<?=$cordahboard;?>">
                        <span class="info-box-icon"><i class="ion ion-pie-graph"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Equipamentos</span>
                            <span class="info-box-number"><?=$equipamento_local;?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: <?=$equipamento_local;?>%"></div>
                            </div>
                            <span class="progress-description">
                                Totais
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="fas fa-city"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Empresas</span>
                            <span class="info-box-number"><?=$empresa_local;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="far fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Departamentos</span>
                            <span class="info-box-number"><?=$departamento_local;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="ion ion-person-add"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usu&aacute;rios</span>
                            <span class="info-box-number"><?=$usuario_local?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-<?=$cordahboard;?>"><i class="ion ion-pie-graph"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Equipamentos</span>
                            <span class="info-box-number"><?=$equipamento_local;?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <?php endif; ?>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<?php require_once("../config/footer.php"); ?>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= $hosted; ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= $hosted; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $hosted; ?>/assets/dist/js/adminlte.js"></script>
</body>

</html>