<?php
$token = (isset($_SESSION['token']) ? "?token=" . $_SESSION['token'] : "");
require_once("../model/recordset.php");
$rs = new recordset();
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $hosted; ?>/view/index.php?token=<?= $_SESSION['token']; ?>" class="brand-link">
        <img src="<?= $hosted; ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <?php if (isset($_SESSION["nome_usu"])) : ?>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$hosted;?><?=$_SESSION["usu_foto"]; ?>" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="<?= $hosted; ?>/view/sys_edit_perfil_usuario.php?token=<?= $_SESSION['token']; ?>&acao=N&usucod=<?= $_SESSION["usu_cod"]; ?>"
                    class="d-block"><?= $_SESSION['nome_usu']; ?></a>
            </div>
        </div>
        <?php else : ?>
        <div></div>
        <?php endif; ?>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= $hosted; ?>/view/index.php?token=<?= $_SESSION['token']; ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard                            
                        </p>
                    </a>
                </li>
<!-- -----------------------------------------------------------------------------------------------------
//Administrador  //////////////////////////////////////////////////////////////////////////////////////||
//======================================================================================================= -->
                <?php if ($_SESSION['usu_classe'] == 1) : // A partir do Administrador?>
                <!-- Sistema -->
                <li class="nav-item has-treeview <?= ($sess == "SYS" ? "menu-open" : ""); ?>">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Sistema
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $hosted; ?>/view/sys_pg_empresa.php?token=<?= $_SESSION['token']; ?>"
                                class="nav-link <?= ($pag == "sys_pg_empresa.php" ? "active" : ""); ?>">
                                <i class="fas fa-city nav-icon"></i>
                                <p>Empresa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $hosted; ?>/view/sys_pg_departamento.php?token=<?= $_SESSION['token']; ?>"
                                class="nav-link <?= ($pag == "sys_pg_departamento.php" ? "active" : ""); ?>">
                                <i class="fas fa-building"></i>
                                <p>Departamento</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $hosted; ?>/view/sys_pg_usuario.php?token=<?= $_SESSION['token']; ?>"
                                class="nav-link <?= ($pag == "sys_pg_usuario.php" ? "active" : ""); ?>">
                                <i class="fas fa-users-cog nav-icon"></i>
                                <p>Usuario</p>
                            </a>
                        </li>
                    </ul>
                    <!-- /.Sistema -->
                </li>
                <?php endif; ?>

                <!-- Relatorio -->
                <?php if ($_SESSION['usu_prelatorio'] == 1) : //PERMISSÂO ?>
                <li class="nav-item has-treeview">
                    <a href="<?= $hosted; ?>/view/sys_pg_relatorio.php?token=<?= $_SESSION['token']; ?>"
                        class="nav-link <?= ($sess == "REL" ? "active" : ""); ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Relat&oacute;rio
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <!-- /.Relatorio -->

                <li class="nav-item has-treeview <?= ($sess == "GRA" ? "menu-open" : ""); ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Grafico
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $hosted; ?>/view/sys_pg_grafico.php?token=<?= $_SESSION['token']; ?>"
                                class="nav-link <?= ($pag == "sys_pg_grafico.php" ? "active" : ""); ?>">
                                <i class="fas fa-chart-pie nav-icon"></i>
                                <p>Base</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $hosted; ?>/view/sys_grafico_chartJS.php?token=<?= $_SESSION['token']; ?>"
                                class="nav-link <?= ($pag == "sys_grafico_chartJS.php" ? "active" : ""); ?>">
                                <i class="fas fa-chart-bar nav-icon"></i>
                                <p>Chart</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $hosted; ?>/view/sys_grafico_float.php?token=<?= $_SESSION['token']; ?>"
                                class="nav-link <?= ($pag == "sys_grafico_float.php" ? "active" : ""); ?>">
                                <i class="fas fa-chart-area nav-icon"></i>
                                <p>Float</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $hosted; ?>/view/sys_grafico_inline.php?token=<?= $_SESSION['token']; ?>"
                                class="nav-link <?= ($pag == "sys_grafico_inline.php" ? "active" : ""); ?>">
                                <i class="fas fa-chart-line nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $hosted; ?>/view/sys_grafico_uplot.php?token=<?= $_SESSION['token']; ?>"
                                class="nav-link <?= ($pag == "sys_grafico_uplot.php" ? "active" : ""); ?>">
                                <i class="far fa-chart-bar nav-icon"></i>
                                <p>uPlot</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Calendario -->
                <?php if ($_SESSION['usu_pcalend'] == 1) : //PERMISSÂO ?>
                <li class="nav-item">
                    <a href="<?= $hosted; ?>/view/sys_calendario.php?token=<?= $_SESSION['token']; ?>"
                        class="nav-link <?= ($sess == "CAL" ? "active" : ""); ?>">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendario
                            <?php $sql = "SELECT * FROM sys_calendario a
                            JOIN sys_evento b ON a.cal_eveid = b.eve_id
                            WHERE (cal_eveusu like '%" . [$_SESSION['usu_cod']] . "%' OR cal_eveusu like '%[9999]%')
                            AND cal_datafim = CURDATE( )";
                            $rs->FreeSql($sql);
                            $rs->GeraDados();
                            ?>
                            <?php if ($rs->linhas > 0) : ?>
                            <span class="badge badge-info right"><?= $rs->linhas; ?></span>
                            <?php endif; ?>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <!-- /.Calendario -->

                <!-- E-mail -->
                <?php if ($_SESSION['usu_pmail'] == 1) : //PERMISSÂO?>
                <li class="nav-item">
                    <a href="<?= $hosted; ?>/view/sys_pg_mailbox.php?token=<?= $_SESSION['token']; ?>"
                        class="nav-link <?= ($sess == "MAIL" ? "active" : ""); ?>">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mail
                            <?php $sql = "SELECT * FROM sys_mail 
                            WHERE mail_statusId = '1' AND mail_destino_usuId =" . $_SESSION['usu_cod'];
                            $rs->FreeSql($sql);
                            $rs->GeraDados();
                            $td = $rs->fld("mail_statusId");
                            ?>
                            <?php if ($td == 1) : ?>
                              <span class="badge badge-info right"><?= $rs->linhas; ?></span>
                            <?php endif; ?>
                              <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <!-- /.E-mail -->
<!-- -----------------------------------------------------------------------------------------------------
//TODOS Veem  //////////////////////////////////////////////////////////////////////////////////////||
//======================================================================================================= -->
                <li class="nav-header">FUN&Ccedil;&Otilde;ES</li>
                <!-- UI -->
                <li class="nav-item has-treeview <?= ($sess == "EQ" ? "menu-open" : ""); ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-keyboard"></i>
                        <p>
                            Equipamento
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $hosted; ?>/view/eq_pg_tipo.php?token=<?= $_SESSION['token']; ?>"
                                class="nav-link <?= ($pag == "eq_pg_tipo.php" ? "active" : ""); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tipo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $hosted; ?>/view/eq_pg_marca.php?token=<?= $_SESSION['token']; ?>"
                                class="nav-link <?= ($pag == "eq_pg_marca.php" ? "active" : ""); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Marca</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $hosted; ?>/view/at_pg_equipamento.php?token=<?= $_SESSION['token']; ?>"
                                class="nav-link <?= ($pag == "at_pg_equipamento.php" ? "active" : ""); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Equipamento</p>
                            </a>
                        </li>
                    </ul>
                    <!-- /.UI -->
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>