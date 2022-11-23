<?php
session_start();
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fna = new functions();
$rsa = new recordset();
$cua = $_SESSION["usu_cod"];
//marcando mensagens como lidas com o ID do PARA
$para = (isset($_GET["para"]) ? $_GET["para"] : 0);
$msg = (isset($_COOKIE["msgant"]) ? $_COOKIE["msgant"] : 0);
setcookie("msg_lido", 1);
//Verificando novas mensagens não lidas
$sql ="SELECT * FROM sys_usuario a
JOIN sys_dashboard b ON a.usu_pagId = b.dash_id 
WHERE usu_ativo ='1' AND usu_cod = ".$_SESSION['usu_cod'] ;
$rsa->FreeSql($sql);
$rsa->GeraDados();	
$corpagina = $rsa->fld("dash_collor");

$sql ="SELECT * FROM sys_usuario a
JOIN sys_dashboard b ON a.usu_mnutopId = b.dash_id 
WHERE usu_ativo ='1' AND usu_cod = ".$_SESSION['usu_cod'] ;
$rsa->FreeSql($sql);
$rsa->GeraDados();	
$cormenutop = $rsa->fld("dash_collor");
///==================================\\\
?>
<!--Modo Dark da Pagina -->
<body class="hold-transition <?=$corpagina;?>-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= $hosted; ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar --> <!-- Mudar a cor -->
        <nav class="main-header navbar navbar-expand navbar-<?=$cormenutop;?>">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= $hosted; ?>/view/index.php?token=<?= $_SESSION['token']; ?>" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <?php if ($_SESSION['usu_pcalend'] == 1) : //PERMISSÂO?>
                <li class="nav-item dropdown">
                  <?php
                  $sql = "SELECT * FROM sys_calendario a
                  JOIN sys_evento b ON a.cal_eveid = b.eve_id
                  WHERE (cal_eveusu like '%[".$_SESSION['usu_cod']."]%' OR cal_eveusu like '%[9999]%')
                  AND cal_datafim = CURDATE( )";
                  $rsa->FreeSql($sql);
                  $rsa->GeraDados();
                  $evedesc = $rsa->fld("eve_desc");
                  if ($rsa->linhas >= 1) :
                  $evt = $rsa->linhas;
                  ?>
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <span class="badge badge-success navbar-badge"><?= $evt; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <?php
                    $rsa->FreeSql($sql);
                    while ($rsa->GeraDados()) :
                    $link_page = "sys_vis_evecal.php?calid=" . $rsa->fld("cal_id") . "&token=" . $_SESSION["token"];
                    $cor = substr($rsa->fld("eve_tema"), 3);
                    ?>
                      <a href="<?= $link_page; ?>" class="dropdown-item">
                          <!-- Message Start -->
                          <div class="media">
                              <div class="media-body">
                                  <h3 class="dropdown-item-title">
                                      <?= $rsa->fld("eve_desc"); ?>
                                      <span class="float-right text-sm"><i
                                              class="fas fa-calendar-check  text-<?= $cor; ?> mr-2"></i></span>
                                  </h3>
                                  <p class="text-sm"></p>
                                  <p class="text-sm text-muted"><i
                                          class="far fa-clock mr-1"></i><?= $fna->data_br($rsa->fld("cal_datafim")); ?>
                                  </p>
                              </div>
                          </div>
                          <!-- Message End -->
                      </a>
                      <?php endwhile; ?>
                      <div class="dropdown-divider"></div>
                      <a href="<?= $hosted; ?>/view/sys_calendario.php?token=<?= $_SESSION['token']; ?>"
                          class="dropdown-item dropdown-footer"><i class="fas fa-calendar-alt"></i> Acessar o Calendarior
                      </a>
                  </div>                  
                    <?php else : ?>
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <span class="badge badge-success navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Não h&aacute; Eventos hoje
                                    </h3>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= $hosted; ?>/view/sys_calendario.php?token=<?= $_SESSION['token']; ?>"
                            class="dropdown-item dropdown-footer"><i class="fas fa-calendar-alt"></i> Acessar o
                            Calendarior</a>
                    </div>
                    <?php endif; ?>
                </li>
                <?php endif; ?>
                <!-- /.Calendario -->
                <!-- Notifications Dropdown Menu -->

                <!-- Messages Dropdown Menu -->
                <!-- Chatter -->
                <?php if ($_SESSION['usu_pchat'] == 1) : //PERMISSÂO?>
                <li class="nav-item dropdown">
                  <?php
                  $sql = "SELECT * FROM sys_chat a
                  JOIN sys_usuario b
                  ON a.chat_de = b.usu_cod
                  WHERE chat_para = " . $cua . " AND chat_lido = 0 ORDER BY chat_id DESC ";
                  $rsa->FreeSql($sql);
                  /*|VERIFICAR MENSAGENS PARA EXIBIR NOTIFICAÇÕES|*/
                  if ($rsa->linhas > 0) :
                  $nova = $rsa->linhas;
                  $rsa->GeraDados();

                  if (!(isset($_COOKIE['msgant'])) or ($_COOKIE['msgant'] <> $rsa->fld("chat_id"))) {
                  setcookie("msg_lido", 0);
                  setcookie("msgant", $rsa->fld("chat_id"));
                  $messages = $rsa->fld('chat_msg');
                  setcookie("mensagem", $messages);
                  //$nm = explode(" ",$rsa->fld("usu_nome"));
                  setcookie("user", $rsa->fld("usu_nome"));
                  $link_page = "sys_chatter.php?token=" . $_SESSION["token"] . "&para=" . $rsa->fld("chat_de");
                  setcookie("pag", $link_page);
                  }
                  ?>
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge"><?= $rsa->linhas; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <?php
                      $rsa->FreeSql($sql);
                      while ($rsa->GeraDados()) :
                      $link_page = "sys_chatter.php?token=" . $_SESSION["token"] . "&para=" . $rsa->fld("chat_de");
                      ?>     
                        <div class="dropdown-divider"></div>                 
                        <a href="<?= $link_page; ?>" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="<?= $hosted; ?>/<?= $rsa->fld("usu_foto"); ?>" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                    <?php
                                    list($nome, $sobre) = explode(" ", $rsa->fld("usu_nome"));
                                    echo $nome . " " . $sobre;
                                    ?>
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm"><?= $rsa->fld("chat_msg"); ?></p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= $fna->calc_dh($rsa->fld("chat_hora")); ?></p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <?php endwhile;
                        // Setando mensagens como lida
                        $sq_chat = "UPDATE sys_chat SET chat_lido=1,chat_view = NOW()  WHERE chat_de = " . $para . " AND chat_para = " . $cua;
                        $rsa->FreeSql($sq_chat);
                        echo "<!--" . $rsa->sql . "-->";
                        ?>
                        <div class="dropdown-divider"></div>
                        <a href="<?=$hosted;?>/view/sys_chatter.php?token=<?=$_SESSION['token'];?>" class="dropdown-item dropdown-footer"><i class="far fa-comment-alt"></i>  Acessar o chatter</a>
                    </div>
                    <?php else : ?>                    
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Não h&aacute; novas mensagens
                                    </h3>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= $hosted; ?>/view/sys_chatter.php?token=<?= $_SESSION['token']; ?>"
                            class="dropdown-item dropdown-footer"><i class="far fa-comment-alt"></i> Acessar o
                            chatter</a>
                    </div>
                    <?php endif; ?>
                </li>
                <?php endif; ?>
                <!-- /.CHatter -->

                <!-- E-mails Dropdown Menu -->
                <?php if ($_SESSION['usu_pmail'] == 1) : //PERMISSÂO ?>
                <li class="nav-item dropdown">
                    <?php $sql = "SELECT * FROM sys_mail 
                    WHERE mail_statusId = '1' AND mail_destino_usuId =" . $_SESSION['usu_cod'];
                    $rsa->FreeSql($sql);
                    $rsa->GeraDados();
                    $td1 = $rsa->fld("mail_statusId");
                    if ($td1 == 1) :
                    $emailm = $rsa->linhas;
                    ?>
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge"><?= $emailm; ?></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="sys_vis_mail.php?token=<?= $_SESSION['token']; ?>&acao=N&mail_Id=<?= $rsa->fld("mail_Id"); ?>"
                            class="dropdown-item">
                            <?php if ($emailm == 1) : ?>
                            <i class="fas fa-envelope mr-2"></i> <?= $emailm; ?> novo E-mail
                            <?php else : ?>
                            <i class="fas fa-envelope mr-2"></i> <?= $emailm; ?> novos E-mails
                            <?php endif; ?>
                            <span class="float-right text-muted text-sm"><i class="far fa-clock mr-1"></i>
                                <?= $fna->calc_dh($rsa->fld("mail_data")); ?></span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= $hosted; ?>/view/sys_pg_mailbox.php?token=<?= $_SESSION['token']; ?>"
                            class="dropdown-item dropdown-footer">Ver e-mails</a>
                    </div>
                    <?php else : ?>
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="nav-icon far fa-envelope"></i>
                        <span class="badge badge-info navbar-badge"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> Não h&aacute; novos e-mails
                            <span class="float-right text-muted text-sm"></span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= $hosted; ?>/view/sys_pg_mailbox.php?token=<?= $_SESSION['token']; ?>"
                            class="dropdown-item dropdown-footer">Ver e-mails</a>
                    </div>
                    <?php endif; ?>
                </li>
                <?php endif; ?>
                <li class="nav-item dropdown user-menu">
                    <!-- /.E-mail -->

                    <!-- User Menu -->
                    <?php
                    $sql = "SELECT usu_datacad, usu_nome, usu_foto, dp_nome   FROM sys_usuario a
                    JOIN sys_classe b ON a.usu_classeId = b.classe_id 
                    JOIN sys_empresa c ON a.usu_empId = c.emp_id
                    JOIN sys_departamento d ON a.usu_dpId = d.dp_id 					
                    WHERE usu_cod = " . $_SESSION['usu_cod'];
                    $rsa->FreeSql($sql);
                    $rsa->GeraDados();

                    $data1 = $rsa->fld("usu_datacad");
                    $data2 = date("Y-m-d H:i:s");
                    $diferenca = strtotime($data2) - strtotime($data1);
                    $dias = floor($diferenca / (60 * 60 * 24));
                    ?>
                    <a href="<?= $hosted; ?>/view/sys_edit_perfil_usuario.php?token=<?= $_SESSION['token']; ?>&acao=N&usucod=<?= $_SESSION["usu_cod"]; ?>"
                        class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $hosted; ?>/<?= $_SESSION['usu_foto']; ?>"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline"><?= $_SESSION['nome_usu']; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="<?= $hosted; ?>/<?= $_SESSION['usu_foto']; ?>" class="img-circle elevation-2"
                                alt="User Image">
                            <p>
                                <?= $_SESSION['nome_usu']; ?> - <?= $rsa->fld("dp_nome"); ?>
                                <small>Ativo h&aacute; <?= $dias; ?> Dias</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="<?= $hosted; ?>/view/sys_edit_perfil_usuario.php?token=<?= $_SESSION['token']; ?>&acao=N&usucod=<?= $_SESSION["usu_cod"]; ?>"
                                class="btn btn-default btn-flat">Perfil</a>
                            <a href="<?= $hosted; ?>/view/logout.php" class="btn btn-default btn-flat float-right">Sign
                                out</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->