-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jan-2022 às 13:16
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `system_prime`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `at_equipamento`
--

CREATE TABLE `at_equipamento` (
  `eq_id` int(11) NOT NULL,
  `eq_desc` varchar(255) CHARACTER SET latin1 NOT NULL,
  `eq_tipoId` int(11) NOT NULL,
  `eq_empId` int(11) NOT NULL,
  `eq_usuEmpId` int(11) DEFAULT NULL,
  `eq_dpId` int(11) DEFAULT NULL,
  `eq_usuId` int(11) DEFAULT NULL,
  `eq_marcId` int(11) DEFAULT NULL,
  `eq_modelo` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `eq_mqEmpId` int(11) DEFAULT NULL,
  `eq_mqId` int(11) DEFAULT NULL,
  `eq_statusId` int(50) DEFAULT NULL,
  `eq_ativo` enum('0','1') CHARACTER SET latin1 NOT NULL,
  `eq_datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `eq_datades` timestamp NOT NULL DEFAULT current_timestamp(),
  `eq_datadoa` date DEFAULT NULL,
  `eq_usucad` int(11) DEFAULT NULL,
  `eq_usudes` int(11) DEFAULT NULL,
  `eq_usudoa` int(11) DEFAULT NULL,
  `eq_serial` varchar(255) CHARACTER SET latin1 NOT NULL,
  `eq_serial2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eq_valor` double(11,2) DEFAULT NULL,
  `eq_descmotivo` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `id_inst` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `at_equipamento`
--

INSERT INTO `at_equipamento` (`eq_id`, `eq_desc`, `eq_tipoId`, `eq_empId`, `eq_usuEmpId`, `eq_dpId`, `eq_usuId`, `eq_marcId`, `eq_modelo`, `eq_mqEmpId`, `eq_mqId`, `eq_statusId`, `eq_ativo`, `eq_datacad`, `eq_datades`, `eq_datadoa`, `eq_usucad`, `eq_usudes`, `eq_usudoa`, `eq_serial`, `eq_serial2`, `eq_valor`, `eq_descmotivo`, `id_inst`) VALUES
(1, 'Smartphone', 1, 1, 0, 0, 0, 1, 'Iphone 10', 0, 0, 1, '1', '2022-01-12 20:01:26', '2022-01-12 20:01:26', NULL, 1, NULL, NULL, 'e88883393993399', NULL, 10000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `at_status`
--

CREATE TABLE `at_status` (
  `status_id` int(11) NOT NULL,
  `status_classe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status_desc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status_color` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `at_status`
--

INSERT INTO `at_status` (`status_id`, `status_classe`, `status_desc`, `status_color`) VALUES
(1, 'fas fa-grin-alt ', 'Novo', 'text-success'),
(2, 'fas fa-frown-open ', 'Usado', 'text-warning'),
(3, 'fas fa-dizzy', 'Descartado', 'text-danger');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eq_marca`
--

CREATE TABLE `eq_marca` (
  `marc_id` int(11) NOT NULL,
  `marc_tipoId` int(11) NOT NULL,
  `marc_nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `eq_marca`
--

INSERT INTO `eq_marca` (`marc_id`, `marc_tipoId`, `marc_nome`) VALUES
(1, 1, 'Apple');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eq_tipo`
--

CREATE TABLE `eq_tipo` (
  `tipo_id` int(11) NOT NULL,
  `tipo_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `eq_tipo`
--

INSERT INTO `eq_tipo` (`tipo_id`, `tipo_desc`) VALUES
(1, 'Telefonia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_calendario`
--

CREATE TABLE `sys_calendario` (
  `cal_id` int(11) NOT NULL,
  `cal_eveid` int(11) DEFAULT NULL,
  `cal_eveusu` varchar(200) DEFAULT NULL,
  `cal_dataini` date DEFAULT NULL,
  `cal_horaini` time DEFAULT NULL,
  `cal_datafim` date DEFAULT NULL,
  `cal_horafim` time DEFAULT NULL,
  `cal_url` varchar(200) DEFAULT NULL,
  `cal_criado` int(11) DEFAULT NULL,
  `cal_obs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='calendário de eventosUtiliza tabela eventos';

--
-- Extraindo dados da tabela `sys_calendario`
--

INSERT INTO `sys_calendario` (`cal_id`, `cal_eveid`, `cal_eveusu`, `cal_dataini`, `cal_horaini`, `cal_datafim`, `cal_horafim`, `cal_url`, `cal_criado`, `cal_obs`) VALUES
(1, 1, '[1]', '2022-01-12', '17:11:00', '2022-01-13', '05:00:00', 'sys_vis_evecal.php?calid=1', 1, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_chat`
--

CREATE TABLE `sys_chat` (
  `chat_id` int(11) NOT NULL,
  `chat_msg` varchar(500) DEFAULT NULL,
  `chat_de` int(11) DEFAULT NULL,
  `chat_para` int(11) DEFAULT NULL,
  `chat_lido` int(11) DEFAULT NULL,
  `chat_hora` timestamp NULL DEFAULT NULL,
  `chat_view` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena conversas online com o Admin';

--
-- Extraindo dados da tabela `sys_chat`
--

INSERT INTO `sys_chat` (`chat_id`, `chat_msg`, `chat_de`, `chat_para`, `chat_lido`, `chat_hora`, `chat_view`) VALUES
(1, 'Teste', 1, 2, 1, '2022-01-12 20:06:12', '2022-01-12 21:04:44'),
(2, 'teste ok', 2, 1, 0, '2022-01-12 21:04:40', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_classe`
--

CREATE TABLE `sys_classe` (
  `classe_id` int(11) NOT NULL,
  `classe_desc` varchar(30) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `sys_classe`
--

INSERT INTO `sys_classe` (`classe_id`, `classe_desc`) VALUES
(1, 'Administrador'),
(2, 'Usuário'),
(3, 'Cliente'),
(4, 'Gestor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_dashboard`
--

CREATE TABLE `sys_dashboard` (
  `dash_id` int(11) NOT NULL,
  `dash_collor` varchar(20) NOT NULL,
  `dash_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sys_dashboard`
--

INSERT INTO `sys_dashboard` (`dash_id`, `dash_collor`, `dash_desc`) VALUES
(1, 'primary', 'Azul'),
(2, 'secondary', 'Cinza'),
(3, 'info', 'Azul claro'),
(4, 'success', 'Verde'),
(5, 'warning', 'Amarelo'),
(6, 'black', 'Preto'),
(7, 'light', 'light'),
(8, 'gray-dark', 'Cinza Escuro'),
(9, 'gray', 'Cinza Claro'),
(10, 'white', 'Branco'),
(11, 'cyan', 'Cyan'),
(12, 'teal', 'Verde Claro'),
(13, 'pink', 'Rosa'),
(14, 'purple', 'Roxo'),
(16, 'dark', 'Dark'),
(17, 'orange', 'Laranja');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_departamento`
--

CREATE TABLE `sys_departamento` (
  `dp_id` int(11) NOT NULL,
  `dp_empId` int(255) NOT NULL,
  `dp_nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `sys_departamento`
--

INSERT INTO `sys_departamento` (`dp_id`, `dp_empId`, `dp_nome`) VALUES
(1, 2, 'Informatica'),
(2, 1, 'Informatica'),
(3, 1, 'Recursos Humanos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_empresa`
--

CREATE TABLE `sys_empresa` (
  `emp_id` int(11) NOT NULL,
  `emp_nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  `emp_alias` varchar(255) CHARACTER SET latin1 NOT NULL,
  `emp_cnpj` varchar(255) CHARACTER SET latin1 NOT NULL,
  `emp_ie` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `emp_cep` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `emp_log` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emp_num` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emp_compl` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `emp_bai` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `emp_cid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emp_uf` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `emp_contato` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `emp_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `emp_tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emp_site` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_logo` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela das Empresas';

--
-- Extraindo dados da tabela `sys_empresa`
--

INSERT INTO `sys_empresa` (`emp_id`, `emp_nome`, `emp_alias`, `emp_cnpj`, `emp_ie`, `emp_cep`, `emp_log`, `emp_num`, `emp_compl`, `emp_bai`, `emp_cid`, `emp_uf`, `emp_contato`, `emp_email`, `emp_tel`, `emp_site`, `emp_logo`) VALUES
(1, 'Niff Empreendimentos e Participações Ltda.', 'NIFF', '08.834.514/0001-54', '111.111.111.111', '07134170', 'Rua Águas de Lindóia', '156', '', 'Vila Marilda', 'Guarulhos', 'SP', 'Anderson Douglas', 'niff@niff.com.br', '(11)2468-7400', 'http://www.niff.com.br/', '/images/logo_emp/grupo_niff.png'),
(2, 'Empresa de Ônibus Vila Galvao Ltda	', 'Vila Galvao', '49.068.737/0001-35', '336.412.774.110', '07034000', 'Rodovia Presidente Dutra', '8174', '', 'Porto da Igreja', 'Guarulhos', 'SP', 'Elvis Leite', 'vilagalvao@vilagalvao.com.br', '(11)2468-7400', 'http://www.vilagalvao.com.br/', '/images/logo_emp/vila_galvao_novo.png'),
(3, 'ABC Transportes Coletivos Vale do Paraiba Ltda', 'ABC', '45.176.864/0001-05', '688.082.582.110', '12051571', 'Avenida José Benedito Miguel de Paula', '2000', '', 'Pinhão', 'Taubaté', 'SP', 'Valmar', 'abctransportes@abctransportes.', '(12)3634-8500', 'https://www.cartaorapidotaubate.com.br/', '/images/logo_emp/default-logo.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_evento`
--

CREATE TABLE `sys_evento` (
  `eve_id` int(11) NOT NULL,
  `eve_desc` varchar(50) NOT NULL DEFAULT '0',
  `eve_tema` varchar(50) NOT NULL DEFAULT '0',
  `eve_cor` varchar(50) NOT NULL DEFAULT '0',
  `eve_dep` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cria eventos no Sistema';

--
-- Extraindo dados da tabela `sys_evento`
--

INSERT INTO `sys_evento` (`eve_id`, `eve_desc`, `eve_tema`, `eve_cor`, `eve_dep`) VALUES
(1, 'Ida a Campinas', 'bg-blue', '#0056b3', '[1]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_logado`
--

CREATE TABLE `sys_logado` (
  `log_id` int(11) NOT NULL,
  `log_user` varchar(100) NOT NULL DEFAULT '0',
  `log_classe` tinyint(4) NOT NULL DEFAULT 0,
  `log_token` varchar(100) NOT NULL DEFAULT '0',
  `log_horario` timestamp NULL DEFAULT NULL,
  `log_expira` timestamp NULL DEFAULT NULL,
  `log_status` enum('1','0') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabela para Logados';

--
-- Extraindo dados da tabela `sys_logado`
--

INSERT INTO `sys_logado` (`log_id`, `log_user`, `log_classe`, `log_token`, `log_horario`, `log_expira`, `log_status`) VALUES
(1, 'admin@infraprime.com', 1, 'e0038092843760c2b11d2b4c8456103b', '2022-01-12 19:37:36', '2022-01-12 20:37:36', '0'),
(2, 'cmprado@infraprime.com', 3, '60f987a70778ed39f0f2b35dc20a910a', '2022-01-12 21:02:29', '2022-01-12 22:02:29', '0'),
(3, 'admin@infraprime.com', 1, '2f83040ed5b54a97d914dc15b4d20fdc', '2022-01-13 11:35:57', '2022-01-13 12:35:57', '0'),
(4, 'cmprado@infraprime.com', 3, '53152d5be31b6792ecdeb6ffb377a683', '2022-01-13 11:36:25', '2022-01-13 12:36:25', '0'),
(5, 'admin@infraprime.com', 1, '185fb58dfe6a886633a4b3f9b130b718', '2022-01-13 11:36:33', '2022-01-13 12:36:33', '0'),
(6, 'cmprado@infraprime.com', 3, '2e5dc38d3a19ffedcaedfc8c46732b02', '2022-01-13 11:36:59', '2022-01-13 12:36:59', '0'),
(7, 'admin@infraprime.com', 1, 'd89da521d3273370bbab483f633b0b71', '2022-01-13 11:40:02', '2022-01-13 12:40:02', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_mail`
--

CREATE TABLE `sys_mail` (
  `mail_Id` int(11) NOT NULL,
  `mail_envio_usuempId` int(11) NOT NULL,
  `mail_envio_usudpId` int(11) NOT NULL,
  `mail_envio_usuId` int(11) NOT NULL,
  `mail_destino_usuId` int(11) NOT NULL,
  `mail_assunto` varchar(255) DEFAULT NULL,
  `mail_mensagem` text NOT NULL,
  `mail_data` timestamp NULL DEFAULT NULL,
  `mail_data_lido` timestamp NULL DEFAULT NULL,
  `mail_envio_statusId` int(11) NOT NULL,
  `mail_statusId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sys_mail`
--

INSERT INTO `sys_mail` (`mail_Id`, `mail_envio_usuempId`, `mail_envio_usudpId`, `mail_envio_usuId`, `mail_destino_usuId`, `mail_assunto`, `mail_mensagem`, `mail_data`, `mail_data_lido`, `mail_envio_statusId`, `mail_statusId`) VALUES
(1, 2, 1, 1, 2, 'Participação no test', '									\n																				<p>Preezados,<br>Novo retorno da Hostifiber:<br>\"Prezados, boa tarde.<br>Nossos técnicos já chegaram no trecho e estão neste momento realizando o lançamento e fusões necessárias para devolver a normalidade ao circuito. Estimamos que o retorno aconteça em até 2 horas. Manteremos os senhores atualizados.\"<br></p><p>\n										\n										 </p><p>Atenciosamente  Elvis Leite</p>\n										 \n										 <b>Empresa:</b>&nbsp;Empresa de Ônibus Vila Galvao Ltda	<br>\n										 <b>Departamento:</b>&nbsp;Informatica<br>\n										 <b>Telefone:</b>&nbsp;(11)2468-7400 <b>Ramal:</b>&nbsp;7445										', '2022-01-12 20:07:17', NULL, 3, 1),
(2, 2, 1, 1, 2, 'Teste', '									\n																				<p>\n										 \n										 \n										 \n										<p/>\n										\n										 <p>Atenciosamente  Elvis Leite</p>\n										 \n										 <b>Empresa:</b> Empresa de Ônibus Vila Galvao Ltda	<br>\n										 <b>Departamento:</b> Informatica<br>\n										 <b>Telefone:</b> (11)2468-7400 <b>Ramal:</b> 7445										', '2022-01-12 20:07:45', '2022-01-12 21:04:18', 3, 2),
(3, 1, 2, 2, 1, 'Resp. Teste', '									\n																				<p>\n										&nbsp;\n										&nbsp;&nbsp; sssssssssss</p><p>\n										\n										 </p><p>Atenciosamente  Cleber Marrara Prado</p>\n										 \n										 <b>Empresa:</b>&nbsp;Niff Empreendimentos e Participações Ltda.<br>\n										 <b>Departamento:</b>&nbsp;Informatica<br>\n										 <b>Telefone:</b>&nbsp;(11)2468-7400 <b>Ramal:</b>&nbsp;										 \n										 \n										 <div class=\"mailbox-read-info\">	\n													<h7><b>De</b> Elvis Leite</h7><br>								\n													<h7><b>Para</b> Cleber Marrara Prado													<span class=\"mailbox-read-time float-right\"><b>Enviado em:  </b>12/01/2022 às 17:07:45</span></h7><br>\n												</div>		\n												<div class=\"mailbox-read-message\">\n													<h7><b>Assunto:</b> Teste</h7>\n																						\n																				<p>\n										&nbsp;\n										&nbsp;\n										&nbsp;\n										</p><p>\n										\n										 </p><p>Atenciosamente  Elvis Leite</p>\n										 \n										 <b>Empresa:</b>&nbsp;Empresa de Ônibus Vila Galvao Ltda	<br>\n										 <b>Departamento:</b>&nbsp;Informatica<br>\n										 <b>Telefone:</b>&nbsp;(11)2468-7400 <b>Ramal:</b>&nbsp;7445																						</div>\n										', '2022-01-12 21:04:27', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_mail_status`
--

CREATE TABLE `sys_mail_status` (
  `status_id` int(11) NOT NULL,
  `status_desc` varchar(50) NOT NULL,
  `status_classe` varchar(15) NOT NULL,
  `status_icon` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sys_mail_status`
--

INSERT INTO `sys_mail_status` (`status_id`, `status_desc`, `status_classe`, `status_icon`) VALUES
(1, 'Não lido', 'primary', '<i class=\"far fa-envelope fa-2x\"></'),
(2, 'Lido', 'info', '<i class=\"far fa-envelope-open fa-2x\"></'),
(3, 'Enviado', 'success', '<i class=\"fas fa-paper-plane \"></i>'),
(4, 'Excluido', 'danger', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_sistema`
--

CREATE TABLE `sys_sistema` (
  `sys_id` int(11) NOT NULL,
  `sys_nome` varchar(20) COLLATE utf8_bin NOT NULL,
  `sys_versao` varchar(10) COLLATE utf8_bin NOT NULL,
  `sys_retorno` varchar(255) COLLATE utf8_bin NOT NULL,
  `sys_empresa` varchar(50) COLLATE utf8_bin NOT NULL,
  `sys_cnpj` varchar(18) COLLATE utf8_bin NOT NULL,
  `sys_mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `sys_senha` varchar(20) COLLATE utf8_bin NOT NULL,
  `sys_logo` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `sys_dominio` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `sys_sistema`
--

INSERT INTO `sys_sistema` (`sys_id`, `sys_nome`, `sys_versao`, `sys_retorno`, `sys_empresa`, `sys_cnpj`, `sys_mail`, `sys_senha`, `sys_logo`, `sys_dominio`) VALUES
(1, 'portaria-prime', '1.0', 'infraprimesystema@gmail.com', 'Priore Sistemas', '23.072.748/0001-03', 'infraprimesystema@gmail.com', 'marra1109', 'images/logo_niff.png', 'http://192.168.5.248/portariaprime');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_usuario`
--

CREATE TABLE `sys_usuario` (
  `usu_cod` int(11) NOT NULL,
  `usu_nome` varchar(30) NOT NULL DEFAULT '0',
  `usu_senha` varchar(36) CHARACTER SET utf8 DEFAULT 'c65b0c751648454fbe595faa4ac69ece',
  `usu_empId` int(11) NOT NULL,
  `usu_dpId` int(11) NOT NULL,
  `usu_classeId` int(3) NOT NULL,
  `usu_email` varchar(50) DEFAULT '0',
  `usu_ativo` enum('0','1') DEFAULT '0',
  `usu_online` enum('0','1') DEFAULT '0',
  `usu_foto` varchar(25) DEFAULT '0',
  `usu_datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `usu_datades` timestamp NULL DEFAULT current_timestamp(),
  `usu_chapa` varchar(6) DEFAULT NULL,
  `usu_sexo` enum('F','M') DEFAULT NULL,
  `usu_ramal` varchar(6) DEFAULT NULL,
  `usu_cel` varchar(15) DEFAULT NULL,
  `usu_dashId` int(11) DEFAULT NULL,
  `usu_mnutopId` int(11) NOT NULL,
  `usu_pagId` int(11) NOT NULL,
  `usu_usucadId` int(11) DEFAULT NULL,
  `usu_pmail` enum('0','1') DEFAULT NULL,
  `usu_pchat` enum('0','1') DEFAULT NULL,
  `usu_pcalend` enum('0','1') DEFAULT NULL,
  `usu_prelatorio` enum('0','1') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Armazena usuarios do sistema';

--
-- Extraindo dados da tabela `sys_usuario`
--

INSERT INTO `sys_usuario` (`usu_cod`, `usu_nome`, `usu_senha`, `usu_empId`, `usu_dpId`, `usu_classeId`, `usu_email`, `usu_ativo`, `usu_online`, `usu_foto`, `usu_datacad`, `usu_datades`, `usu_chapa`, `usu_sexo`, `usu_ramal`, `usu_cel`, `usu_dashId`, `usu_mnutopId`, `usu_pagId`, `usu_usucadId`, `usu_pmail`, `usu_pchat`, `usu_pcalend`, `usu_prelatorio`) VALUES
(1, 'Elvis Leite', '4badaee57fed5610012a296273158f5f', 2, 1, 1, 'admin@infraprime.com', '1', '0', '/images/perfil/Elv_1.png', '2022-01-12 03:00:00', '2021-02-16 03:00:00', '1103', 'M', '7445', '(11)9 4749-1646', 7, 16, 16, 1, '1', '1', '1', '1'),
(2, 'Cleber Marrara Prado', '4297f44b13955235245b2497399d7a93', 1, 2, 3, 'cmprado@infraprime.com', '1', '0', '/images/perfil/Cle_2.png', '2022-01-12 19:44:35', '2022-01-12 19:44:35', '', 'M', '', '', 1, 7, 10, 1, '1', '1', '1', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `at_equipamento`
--
ALTER TABLE `at_equipamento`
  ADD PRIMARY KEY (`eq_id`);

--
-- Índices para tabela `at_status`
--
ALTER TABLE `at_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Índices para tabela `eq_marca`
--
ALTER TABLE `eq_marca`
  ADD PRIMARY KEY (`marc_id`);

--
-- Índices para tabela `eq_tipo`
--
ALTER TABLE `eq_tipo`
  ADD PRIMARY KEY (`tipo_id`);

--
-- Índices para tabela `sys_calendario`
--
ALTER TABLE `sys_calendario`
  ADD PRIMARY KEY (`cal_id`);

--
-- Índices para tabela `sys_chat`
--
ALTER TABLE `sys_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Índices para tabela `sys_classe`
--
ALTER TABLE `sys_classe`
  ADD PRIMARY KEY (`classe_id`);

--
-- Índices para tabela `sys_dashboard`
--
ALTER TABLE `sys_dashboard`
  ADD PRIMARY KEY (`dash_id`);

--
-- Índices para tabela `sys_departamento`
--
ALTER TABLE `sys_departamento`
  ADD PRIMARY KEY (`dp_id`);

--
-- Índices para tabela `sys_empresa`
--
ALTER TABLE `sys_empresa`
  ADD PRIMARY KEY (`emp_id`);

--
-- Índices para tabela `sys_evento`
--
ALTER TABLE `sys_evento`
  ADD PRIMARY KEY (`eve_id`);

--
-- Índices para tabela `sys_logado`
--
ALTER TABLE `sys_logado`
  ADD PRIMARY KEY (`log_id`);

--
-- Índices para tabela `sys_mail`
--
ALTER TABLE `sys_mail`
  ADD PRIMARY KEY (`mail_Id`);

--
-- Índices para tabela `sys_mail_status`
--
ALTER TABLE `sys_mail_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Índices para tabela `sys_sistema`
--
ALTER TABLE `sys_sistema`
  ADD PRIMARY KEY (`sys_id`);

--
-- Índices para tabela `sys_usuario`
--
ALTER TABLE `sys_usuario`
  ADD PRIMARY KEY (`usu_cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `at_equipamento`
--
ALTER TABLE `at_equipamento`
  MODIFY `eq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `at_status`
--
ALTER TABLE `at_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `eq_marca`
--
ALTER TABLE `eq_marca`
  MODIFY `marc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `eq_tipo`
--
ALTER TABLE `eq_tipo`
  MODIFY `tipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sys_calendario`
--
ALTER TABLE `sys_calendario`
  MODIFY `cal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sys_chat`
--
ALTER TABLE `sys_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sys_classe`
--
ALTER TABLE `sys_classe`
  MODIFY `classe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sys_dashboard`
--
ALTER TABLE `sys_dashboard`
  MODIFY `dash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `sys_departamento`
--
ALTER TABLE `sys_departamento`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sys_empresa`
--
ALTER TABLE `sys_empresa`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `sys_evento`
--
ALTER TABLE `sys_evento`
  MODIFY `eve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sys_logado`
--
ALTER TABLE `sys_logado`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `sys_mail`
--
ALTER TABLE `sys_mail`
  MODIFY `mail_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sys_mail_status`
--
ALTER TABLE `sys_mail_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sys_sistema`
--
ALTER TABLE `sys_sistema`
  MODIFY `sys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sys_usuario`
--
ALTER TABLE `sys_usuario`
  MODIFY `usu_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
