-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2017 at 04:16 PM
-- Server version: 5.6.26-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oa1uszym_escala`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `privilegios` varchar(10) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `no_del` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nome`, `pass`, `privilegios`, `email`, `tipo`, `no_del`) VALUES
(25, 'Gestor', 'a55607442fca264cf37e935503d646c2', '0', 'vgvgs@gmail.com', 'Gestor', '0'),
(24, 'Admin', '21232f297a57a5a743894a0e4a801fc3', '2', 'pedro_viegas@oseubackoffice.com', 'Administrator', '1'),
(26, 'Gestorplus', 'd41d8cd98f00b204e9800998ecf8427e', '1', 'vgvgs@gmail.com', 'GestorPlus', '0'),
(32, 'Demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '2', 'demo@demo.pt', 'Administrator', '0');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_prods`
--

CREATE TABLE IF NOT EXISTS `categoria_prods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `visivel` varchar(6) NOT NULL DEFAULT '0',
  `tipo` int(10) NOT NULL,
  `favorito` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `categoria_prods`
--

INSERT INTO `categoria_prods` (`id`, `nome`, `visivel`, `tipo`, `favorito`) VALUES
(31, 'Golf31', '1', 1, 0),
(32, 'private', '1', 1, 0),
(28, 'Transfers28', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `classe_precos`
--

CREATE TABLE IF NOT EXISTS `classe_precos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `valor` varchar(25) NOT NULL DEFAULT '0',
  `prod_id` int(10) NOT NULL,
  `id_label` int(10) NOT NULL,
  `tipo` int(10) NOT NULL,
  `cat` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=686 ;

--
-- Dumping data for table `classe_precos`
--

INSERT INTO `classe_precos` (`id`, `valor`, `prod_id`, `id_label`, `tipo`, `cat`) VALUES
(674, '300', 219, 85, 1, 28),
(677, '0', 218, 89, 1, 28),
(678, '0', 219, 89, 1, 28),
(679, '25', 220, 83, 1, 28),
(680, '35', 220, 85, 1, 28),
(681, '45', 220, 89, 1, 28),
(682, '1', 221, 90, 1, 32),
(683, '2', 221, 91, 1, 32),
(684, '2', 222, 90, 1, 32),
(685, '', 222, 91, 1, 32),
(673, '200', 219, 83, 1, 28),
(672, '100', 218, 85, 1, 28),
(671, '50', 218, 83, 1, 28),
(670, '44', 217, 87, 1, 31),
(669, '33', 216, 87, 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `classe_prods`
--

CREATE TABLE IF NOT EXISTS `classe_prods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `tipo` int(10) NOT NULL,
  `min` int(3) NOT NULL DEFAULT '0',
  `max` int(3) NOT NULL DEFAULT '0',
  `cat` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `classe_prods`
--

INSERT INTO `classe_prods` (`id`, `nome`, `tipo`, `min`, `max`, `cat`) VALUES
(89, '9-12 pax', 1, 9, 12, 28),
(87, 'cat31', 1, 1, 4, 31),
(91, '3-4 Pax', 1, 3, 4, 32),
(85, '5-8 Pax', 1, 5, 8, 28),
(90, '1-2 Pax', 1, 1, 2, 32),
(83, '1-4 Pax', 1, 1, 4, 28);

-- --------------------------------------------------------

--
-- Table structure for table `codigo_promo`
--

CREATE TABLE IF NOT EXISTS `codigo_promo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `percentagem` int(3) NOT NULL,
  `visivel` tinyint(2) NOT NULL DEFAULT '0',
  `ativo` tinyint(2) NOT NULL DEFAULT '0',
  `data_ini` int(11) NOT NULL,
  `data_fim` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `codigo_promo`
--

INSERT INTO `codigo_promo` (`id`, `nome`, `percentagem`, `visivel`, `ativo`, `data_ini`, `data_fim`) VALUES
(29, 'OSB4Q', 21, 0, 0, 1478131200, 1478390400),
(30, 'OSB08Z', 20, 0, 0, 1477958400, 1522540800),
(36, 'OSB452', 15, 1, 1, 1477872000, 1480204800),
(42, 'OSB453', 33, 0, 0, 1478044800, 1478390400),
(40, 'ATARI', 12, 0, 0, 1477872000, 1485648000);

-- --------------------------------------------------------

--
-- Table structure for table `comissoes_fixo`
--

CREATE TABLE IF NOT EXISTS `comissoes_fixo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `zonas` varchar(50) NOT NULL,
  `cmx` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `comissoes_fixo`
--

INSERT INTO `comissoes_fixo` (`id`, `zonas`, `cmx`) VALUES
(2, 'zonaB', '.50'),
(3, 'zonaC', '1.5'),
(4, 'zonaD', '2.5'),
(5, 'zonaE', '5.5'),
(8, 'zonaJ', '6.5'),
(9, 'zonaX', '9');

-- --------------------------------------------------------

--
-- Table structure for table `companhia`
--

CREATE TABLE IF NOT EXISTS `companhia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `cod_postal` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `tlm` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  `nif` varchar(12) NOT NULL,
  `iban` varchar(50) NOT NULL,
  `desconto` varchar(10) NOT NULL DEFAULT '0',
  `hora_reserva` varchar(5) NOT NULL DEFAULT '0',
  `ravt` varchar(10) NOT NULL,
  `termos` varchar(20000) CHARACTER SET utf8 NOT NULL DEFAULT 'Termos e condicoes',
  `color` varchar(25) NOT NULL DEFAULT '#123456',
  `pp_email` varchar(25) NOT NULL,
  `motorista` varchar(10) NOT NULL DEFAULT 'Sim',
  `paypal` varchar(10) NOT NULL DEFAULT 'Sim',
  `trans_bancaria` varchar(10) NOT NULL DEFAULT 'Sim',
  `pp_taxa` decimal(3,1) NOT NULL DEFAULT '3.5',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `companhia`
--

INSERT INTO `companhia` (`id`, `nome`, `logo`, `morada`, `cod_postal`, `tel`, `tlm`, `email`, `site`, `nif`, `iban`, `desconto`, `hora_reserva`, `ravt`, `termos`, `color`, `pp_email`, `motorista`, `paypal`, `trans_bancaria`, `pp_taxa`) VALUES
(1, 'Osb Unipessoal, Lda', 'upload/logo1.png', 'Estrada Sta. Eulalia, Lt7', '8200-000 ALbufeira', '289150167', '914564564', 'geral@oseubackoffice.com', 'oseubackoffice.com', '123456789', 'PT50009870834234534534567', '0', '4', '1234', '<br><br>The following terms and conditions apply in relation to contracts arranged by Transfergest. as an agent and supplier, for transfers between the departure points and destinations specified in the written confirmation issued by Tavel, which is the trading name of Travel Lda. .<br><br>1. References to "you" and "your" in these terms and conditions mean all passengers listed in the written confirmation (including anyone who is substituted or added at a later date). "We", "us" and "our" means<br><br>', 'rgba(186,198,201,0.85)', 'contas@oseubackoffice.com', 'checked', 'checked', 'checked', '4.2');

-- --------------------------------------------------------

--
-- Table structure for table `criar_locais`
--

CREATE TABLE IF NOT EXISTS `criar_locais` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `local` varchar(50) NOT NULL,
  `tipo` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=214 ;

--
-- Dumping data for table `criar_locais`
--

INSERT INTO `criar_locais` (`id`, `local`, `tipo`) VALUES
(14, 'Faro Airport', 1),
(13, 'Quarteira', 1),
(12, 'Vilamoura', 1),
(130, 'Seia', 1),
(8, 'Silves', 1),
(9, 'Lagos, Algarve', 1),
(10, 'Sagres', 1),
(15, 'Monte Gordo', 1),
(135, 'Faro', 1),
(24, 'Vila Nova Mil Fontes', 1),
(26, 'Santarem', 1),
(27, 'OlhÃ£o', 1),
(31, 'Albufeira, GalÃ©', 1),
(32, 'Albufeira, Guia', 1),
(33, 'Albufeira, Montechoro', 1),
(34, 'Albufeira, Olhos de Agua', 1),
(35, 'Albufeira, Salgados', 1),
(36, 'Albufeira, SÃ£o Rafael', 1),
(37, 'Albufeira, Sesmarias', 1),
(38, 'Albufeira, Vale de Parra', 1),
(39, 'Alcantarilha', 1),
(123, 'Alcoutim', 1),
(41, 'Algoz', 1),
(42, 'Aljezur', 1),
(43, 'Almancil', 1),
(44, 'Alte', 1),
(45, 'Altura', 1),
(46, 'AlvÃ´r', 1),
(47, 'ArmaÃ§Ã£o de Pera', 1),
(48, 'Autodromo do Algarve, PortimÃ£o', 1),
(49, 'Ayamonte, Spain', 1),
(50, 'Beja', 1),
(51, 'Boliqueime', 1),
(52, 'LoulÃ©, Bordeira', 1),
(53, 'Budens', 1),
(54, 'Burgau', 1),
(55, 'Cabanas de Tavira', 1),
(56, 'Cadiz, Spain', 1),
(57, 'Carrapateira', 1),
(58, 'Carvoeiro', 1),
(59, 'Castro Marim', 1),
(60, 'Albufeira, Corcovada', 1),
(61, 'El Rompido, Spain', 1),
(62, 'Estoi', 1),
(63, 'LagÃ´a, Estombar', 1),
(65, 'Ferragudo', 1),
(66, 'Fuseta', 1),
(67, 'Gibraltar, Spain', 1),
(68, 'Granada, Spain', 1),
(69, 'Huelva, Spain', 1),
(70, 'Isla Canela, Spain', 1),
(72, 'Islantilla, Spain', 1),
(73, 'Jerez de la Frontera, Spain', 1),
(76, 'Lepe, Spain', 1),
(77, 'Lisbon', 1),
(78, 'LoulÃ©', 1),
(79, 'Luz Tavira', 1),
(80, 'Madrid, Spain', 1),
(81, 'Malaga, Spain', 1),
(82, 'Manta Rota', 1),
(83, 'Marbella, Spain', 1),
(84, 'Matalascanas, Spain', 1),
(85, 'Lagos, Meia Praia', 1),
(86, 'Messines', 1),
(87, 'Moncarapacho', 1),
(88, 'Monchique', 1),
(90, 'Nuevo Portil, Punta Umbria, Spain', 1),
(91, 'Lagos, Odiaxere', 1),
(93, 'Paderne', 1),
(94, 'LagÃ´a, Parchal', 1),
(95, 'Pedras Del Rei', 1),
(96, 'Penina', 1),
(97, 'Silves, Pera', 1),
(98, 'Porches, ArmaÃ§Ã£o de Pera', 1),
(99, 'PortimÃ£o', 1),
(100, 'Porto', 1),
(101, 'Lagos, Praia da Luz', 1),
(102, 'Praia da Rocha ', 1),
(104, 'Quinta do Lago', 1),
(105, 'S. B. Alportel', 1),
(107, 'Salema', 1),
(108, 'Faro, Santa Barbara de Nexe', 1),
(109, 'Albufeira, Santa Eulalia', 1),
(110, 'Tavira, Santa Luzia', 1),
(111, 'Sevilla, Spain', 1),
(114, 'Tavira', 1),
(115, 'Tunes', 1),
(116, 'Vale do Lobo', 1),
(117, 'Vila do Bispo', 1),
(118, 'Vila Nova de Cacela', 1),
(120, 'Vila Real Santo Antonio', 1),
(122, 'Zambujeira do Mar', 1),
(129, 'Vila Nova de Gaia', 1),
(137, 'LagÃ´a', 1),
(124, 'Golf-Penina', 1),
(128, 'Coimbra', 1),
(134, 'Albufeira', 1);

-- --------------------------------------------------------

--
-- Table structure for table `despesa_fixa`
--

CREATE TABLE IF NOT EXISTS `despesa_fixa` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `fatura` varchar(25) NOT NULL,
  `data` int(10) NOT NULL,
  `valor` varchar(25) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `despesa_fixa`
--

INSERT INTO `despesa_fixa` (`id`, `fatura`, `data`, `valor`, `descricao`) VALUES
(1, 'agost', 1472342400, '100', 'deue1242');

-- --------------------------------------------------------

--
-- Table structure for table `diario`
--

CREATE TABLE IF NOT EXISTS `diario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(10) NOT NULL,
  `km_inicio` int(10) NOT NULL DEFAULT '0',
  `km_fim` int(10) NOT NULL DEFAULT '0',
  `staff` varchar(20) NOT NULL,
  `combustivel` varchar(10) NOT NULL,
  `lavagem` varchar(10) NOT NULL,
  `portagem` varchar(10) NOT NULL,
  `diversos` varchar(10) NOT NULL,
  `data` int(11) NOT NULL,
  `fatura` varchar(50) NOT NULL,
  `selo` varchar(50) NOT NULL,
  `seguro` varchar(50) NOT NULL,
  `inspeccao` varchar(50) NOT NULL,
  `revisao` varchar(50) NOT NULL,
  `sinistro` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `mecanica` varchar(50) NOT NULL,
  `parque` varchar(10) NOT NULL,
  `validado` varchar(10) NOT NULL DEFAULT 'NÃ£o',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `diario`
--

INSERT INTO `diario` (`id`, `matricula`, `km_inicio`, `km_fim`, `staff`, `combustivel`, `lavagem`, `portagem`, `diversos`, `data`, `fatura`, `selo`, `seguro`, `inspeccao`, `revisao`, `sinistro`, `descricao`, `mecanica`, `parque`, `validado`) VALUES
(65, '77XX88', 999, 568, 'Pedro', '80', '', '', '', 1466726400, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(18, '88FF77', 214748, 222143, 'Pedro', '8', '8', '8', '8', 1462406400, '456DG', '52', '828.23', '3', '828', '88', 'descrcao', '88', '', 'Sim'),
(50, 'SS4444', 12, 0, 'Pedro', '', '', '', '', 1462924800, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(40, '77XX88', 100, 125, 'Pedro', '', '', '', '', 1462406400, '', '45.29', '11.57', '', '', '123', '', '', '', 'NÃ£o'),
(34, 'AA2345', 125, 150, 'Pedro', '129', '', '', '', 1466121600, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(69, 'SS4444', 0, 450, 'Pedro', '71', '', '', '', 1466726400, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(68, '77XX88', 568, 4568, 'Pedro', '56', '', '', '', 1467676800, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(70, 'AA2345', 150, 176, 'Pedro', '15', '', '', '', 1467676800, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(64, '88FF77', 222143, 222459, 'Pedro', '145', '', '', '', 1467676800, 'fa345', '', '', '', '', '', '', '', '', 'NÃ£o'),
(55, 'AA7812', 799, 999, 'Pedro', '100', '2', '3', '5', 1465948800, 'Fa456', '', '', '', '', '', '', '', '', 'NÃ£o'),
(71, '77XX88', 0, 0, 'Pedro', '123', '', '', '', 1467676800, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(72, 'SS7755', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(73, '88FF77', 222459, 222750, 'Demo', '45', '', '', '', 1472515200, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(74, '88FF77', 222750, 250258, 'Demo', '', '', '58', '', 1473033600, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(75, '69-00-zx', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(76, '88FF77', 250258, 250300, 'Demo', '50', '', '', '', 1474329600, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(77, '88FF77', 250300, 250500, 'JoÃ£o Pedro', '25', '', '', '', 1475020800, '', '', '', '', '', '', '', '', '', 'Sim'),
(78, '88FF77', 250600, 250800, 'A definir', '', '', '', '', 1475020800, '154532555625', '', '', '', '154', '', '', '', '', 'Sim'),
(79, '88FF77', 250800, 251100, 'Demo', '45', '', '', '', 1475193600, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(80, '88FF77', 251100, 260000, 'Demo', '50', '', '', '', 1475193600, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(81, '88FF77', 260000, 270000, 'Demo', '20', '', '', '', 1475798400, '', '', '', '', '', '', '', '', '', 'Sim'),
(82, '45FF45', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(83, '45FF45', 155000, 155000, 'Pedro', '', '', '', '', 1475798400, '2545538', '', '', '', '450', '', '', '', '', 'NÃ£o'),
(84, '88FF77', 270000, 0, 'Demo', '20', '', '', '', 1475798400, '', '', '', '', '', '', '', '', '', 'Sim'),
(85, 'SS4444', 450, 0, 'Luis', '45', '', '', '', 1476144000, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(86, '88FF77', 0, 0, 'Demo', '50', '', '', '', 1476316800, '', '', '', '', '', '', '', '', '', 'Sim'),
(87, '77XX88', 0, 0, 'Sara', '50', '', '', '', 1476316800, '', '', '', '', '', '', 'A definir', '', '', 'NÃ£o'),
(88, '88FF77', 270000, 271000, 'Luis', '50', '', '', '', 1476316800, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(89, '85JJ85', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(90, '37ET58', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(91, '77XX88', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(92, '21TR12', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(93, '54CZ90', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(94, 'QA7185', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(95, '45ZG02', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o'),
(96, '71TR64', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o');

-- --------------------------------------------------------

--
-- Table structure for table `excel`
--

CREATE TABLE IF NOT EXISTS `excel` (
  `data_servico` int(11) unsigned NOT NULL,
  `email` varchar(250) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `hrs` int(11) unsigned NOT NULL,
  `servico` varchar(255) NOT NULL,
  `voo` varchar(255) NOT NULL,
  `nome_cl` varchar(255) NOT NULL,
  `local_recolha` varchar(255) NOT NULL,
  `local_entrega` varchar(255) NOT NULL,
  `ponto_referencia` varchar(255) NOT NULL,
  `px` varchar(255) NOT NULL,
  `cr` varchar(255) NOT NULL,
  `bebe` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `operador` varchar(255) NOT NULL,
  `cobrar_operador` varchar(50) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` varchar(10) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cobrar_direto` varchar(50) NOT NULL DEFAULT '0',
  `cmx_st` varchar(50) NOT NULL DEFAULT '0',
  `cmx_op` varchar(50) NOT NULL DEFAULT '0',
  `data_criacao` varchar(50) NOT NULL,
  `rec_ope` varchar(10) NOT NULL DEFAULT 'NÃ£o',
  `rec_staf` varchar(10) NOT NULL DEFAULT 'NÃ£o',
  `pag_ope` varchar(10) NOT NULL DEFAULT 'NÃ£o',
  `pag_staf` varchar(10) NOT NULL DEFAULT 'NÃ£o',
  `matricula` varchar(6) NOT NULL,
  `referencia` varchar(25) NOT NULL DEFAULT '-/-',
  `telefone` varchar(50) NOT NULL,
  `pais` varchar(25) NOT NULL,
  `criado_direto` tinyint(1) NOT NULL DEFAULT '0',
  `nid` int(10) NOT NULL,
  `end` int(11) NOT NULL DEFAULT '1800',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16837 ;

--
-- Dumping data for table `excel`
--

INSERT INTO `excel` (`data_servico`, `email`, `staff`, `hrs`, `servico`, `voo`, `nome_cl`, `local_recolha`, `local_entrega`, `ponto_referencia`, `px`, `cr`, `bebe`, `obs`, `operador`, `cobrar_operador`, `id`, `ticket`, `estado`, `cobrar_direto`, `cmx_st`, `cmx_op`, `data_criacao`, `rec_ope`, `rec_staf`, `pag_ope`, `pag_staf`, `matricula`, `referencia`, `telefone`, `pais`, `criado_direto`, `nid`, `end`) VALUES
(1476403200, '', 'Luis', 1476451620, 'Chegada', 'Zb408', 'David Robertson', 'Faro Airport', 'Choro Mar Apartamentos', '', '2', '', '', 'cobrar 60â‚¬', 'Direto', '60', 7969, '', 'Aguarda', '', '13.2', '0', '0', '', '', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4800),
(1477008000, '', 'Luis', 1477031400, 'Partida', '', 'David Robertson', 'Choro Mar Apartamentos', 'Faro aeroport', '', '2', '', '', '', 'Site Motorista', '', 7970, '', 'Aguarda', '36', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 0),
(1474675200, '', 'Fixo', 1474715400, 'Chegada', 'Ls251', 'Andrew Burton', 'Faro aeroporto', 'Luna Olympus Vilamoura', '', '8', '', '', '', 'OperadorPerc', '', 8029, '', '', '', '', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2100),
(1479945600, '', 'Fixo', 1479979800, 'Partida', '', 'Andrew Burton', 'Luna Olympus Vilamoura', 'Faro aeroport', '', '8', '', '', '', 'Hotel por Pessoa', '45', 8030, '', 'Fechado', '', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 1800),
(1477612800, '', 'Pedro', 1477661400, 'Chegada', 'Ei490', 'Una OShea', 'Faro aeroporto', 'Prainha Clube Alvor', '', '2', '', '', 'cobrar 97â‚¬ confirmar hora retorno', 'Direto', '', 8064, '', 'Fechado', '19', '4.18', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4200),
(1477008000, '', 'Demo', 1477058400, 'Golf', 'Ei491', 'Una OShea', 'Prainha Clube Alvor', 'Faro aeroport', '', '2', '1', '', '', 'DiretoXride', '15', 8065, '', 'Aguarda', '', '1.2', '3', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 0, 0, 10200),
(1475280000, '', 'JoÃ£o Pedro', 1475302200, 'Interzone', '', 'Peter Lovenholm', 'Villa Palacete Albufeira', 'Old Course Vilamoura', '', '8', '', '3', 'confirmar hora retorno', 'Hotel Percentagem', '', 8119, '', 'Fechado', '55', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475280000, '', 'Nuno Moreira', 1475331300, 'Retorno', '', 'Peter Lovenholm', 'Old Course Vilamoura', 'Villa Palacete Albufeira', '', '8', '', '', '', 'Hotel Fixo', '', 8120, '', 'Fechado', '45', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1478044800, 'suporte@oseubackoffice.com', '', 1478086740, 'Chegada', 'XZD5789', 'Judite JoÃ£o', 'Faro Airport - -/-', 'Albufeira - Salgados', '', '4', '2', '2', 'RETORNO 162/5813557a | PP | OBS:', 'Site Paypal', '35', 16797, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:41:14', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5813557a', '77777777777', 'AUS', 1, 0, 3600),
(1477267200, '', 'Luis', 1477328400, 'Partida', 'TT-899', 'Carlos Andrade', 'OlhÃ£o', 'Faro Aeroporto', '', '2', '', '', '', 'Direto', '', 8122, '', 'Fechado', '50', '', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', 'AA7812', '0', '', '', 0, 0, 1800),
(1474502400, '', 'Fixo', 1474547400, 'Golf', '', 'Jaime Pinto', 'Ferreiras, Algarve', 'Golf Penina', 'EstaÃ§Ã£o Auto', '2', '', '', '3x Sacos Grandes', 'OperadorPerc', '', 8123, '', 'Fechado', '50', '6.75', '5', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'AA7812', '0', '', '', 0, 0, 0),
(1476748800, '', 'Demo', 1476810300, 'Golf', '', 'Peter Lovenholm', 'Silves Golf', 'Villa Palacete Albufeira', '', '8', '', '', '', 'OperadorFixo', '', 8124, '', 'Aguarda', '18', '0.78', '5', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 4200),
(1470787200, '', 'Pedro', 1470812700, 'Interzone', '', 'Peter Lovenholm', '37.0974532,-8.3308954', '37.1077408,-8.283599', '', '8', '', '', 'confirmar hora retorno', 'Direto', '', 8125, '', 'Aguarda', '15', '0.9', '0', '0', '', 'Sim', 'NÃ£o', 'Sim', '77XX88', '5a', '', '', 0, 0, 0),
(1475280000, '', 'JoÃ£o Pedro', 1475330400, 'Retorno', '', 'Peter Lovenholm', 'Pinhal Golf Vilamoura', 'Villa Palacete Albufeira', '', '8', '', '', '', 'Hotel por Pessoa', '54', 8126, '', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475280000, '', '', 1475304600, 'Interzone', '', 'Peter Lovenholm', 'Villa Palacete Albufeira', 'Golf Salgados', '', '8', '', '', 'confirmar hora retorno', 'Hotel Percentagem', '', 8127, '', 'Fechado', '45', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475280000, '', 'Nuno Moreira', 1475326800, 'Retorno', '', 'Peter Lovenholm', 'Golf Salgados', 'Villa Palacete Albufeira', '', '8', '', '', '', 'Hotel Tabela', '', 8128, '', 'Fechado', '45', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475280000, '', 'Carlos Costa', 1475333400, 'Partida', '', 'Peter Lovenholm', 'Villa Palacete Albufeira', 'Faro aeroport', '', '8', '', '', '', 'Hotel Percentagem', '50', 8129, '', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476748800, '', 'Sara', 1476814500, 'Chegada', 'Hv6607', 'Marco Martins', 'Faro aeroporto', 'Ferreiras avenida 25 de abril condominio tomilhos garden', '', '1', '', '', 'cobrar 57â‚¬ confirmar hora retorno', 'Direto', '', 8400, '', 'Aguarda', '56', '12.54', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3600),
(1476921600, 'geral@oseubackoffice.com', '', 1476984120, 'Chegada', 'rrrrr', 'kkkkkkkkkkkk', 'Faro Airport', 'Albufeira - Salgados - -/-', '', '10', '2', '0', '162/5808e17a | MTR | OBS: hhhhhhhhhhhhhhhhhhhhhh', 'Direto', '0', 16765, '', 'Aguarda', '4000', '0', '0', '2016-10-20 16:23:38', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808e17a', '77777777', '-/-', 1, 0, 3600),
(1476921600, 'vgspedro@gmail.com', '', 1476968760, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '0', '0', '163/5808a547 | TB | OBS: tr', 'Site Transf.Banco', '0.01', 16737, '', 'Aguarda', '0', '0', '0', '2016-10-20 12:06:47', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808a547', '8969638526', 'AUS', 1, 0, 9000),
(1479168000, '', 'Demo', 1479214800, 'Partida', 'Ezy8930', 'Anita Szabados', 'Sitio cama da vaca quinta do mar Burgau', 'Faro aeroport', '', '2', '', '', '', 'Aoperador', '', 8186, '', 'Fechado', '25', '3.3', '10', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', '37ET58', '0', '', '', 0, 0, 2700),
(1479168000, '', 'Demo', 1479225300, '', '', '', 'AlvÃ´r-', 'Tunes-', '', '1', '0', '0', '', 'Tabela', '45.00', 16828, '', '', '', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 1, 0, 5400),
(1480377600, '', 'Demo', 1480445100, 'Chegada', '', '', 'Albufeira, Corcovada-', 'Porches, ArmaÃ§Ã£o de Pera-', '', '1', '0', '0', '(TEM RETORNO) ', 'Direto', '45.00', 16829, '', '', '', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '583dbf3d', '', '', 1, 0, 5400),
(1480464000, 'vgspedro@gmail.com', 'Demo', 1480499520, 'Partida', '123dd', 'teste', 'Faro Airport-37, -8', 'Albufeira, GalÃ©-ali', 'Quintal (Recolha)', '1', '1', '1', '123 ons', 'Direto', '99', 16830, '123', 'Aguarda', '', '2.5', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '-/-', '123123123', 'pt', 1, 0, 1800),
(1480464000, 'vgspedro@gmail.com', '', 1480510560, '', 'voo1', 'teste', 'Faro Airport-37, -8', 'Albufeira-ali', 'Quintal (Recolha)', '1', '0', '0', '(TEM RETORNO) obs', 'Direto', '122', 16831, '123', 'Aguarda', '', '9', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '583ea2a7', '98654321321', 'pt', 1, 0, 1800),
(1480464000, 'vgspedro@gmail.com', 'Pedro', 1480507260, '', 'vpoofgr', 'teste', 'Faro Airport-37, -8', 'Albufeira, Corcovada-aqui', 'Quintal (Recolha)', '1', '2', '3', '(TEM RETORNO) obs', 'Direto', '34', 16832, 'q4564', 'Aguarda', '', '1.5', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '85JJ85', '583ea3ac', '98654321321', 'pt', 1, 0, 1800),
(1480550400, 'vgspedro@gmail.com', 'Pedro', 1480604580, '', 'vpoofgr', 'teste', 'Faro Airport-aqui', 'Albufeira, Corcovada-37, -8', 'Quintal (Recolha)', '1', '2', '3', '(RETORNO) obs', 'Direto', '34', 16833, 'q4564', 'Aguarda', '', '1.5', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '85JJ85', '583ea3ac', '98654321321', 'pt', 1, 0, 1800),
(1480464000, 'vgspedro@gmail.com', 'Demo', 1480504380, '', 'qw21', 'teste ', 'Albufeira, SÃ£o Rafael-37, -8', 'Faro Airport-ali', 'Quintal (Recolha)', '1', '2', '3', '(TEM RETORNO) obs', 'Direto', '12', 16834, '782', 'Aguarda', '', '2.5', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '583eb48c', '789456789', 'pt', 1, 0, 1800),
(1480464000, '', '', 1480504860, '', '', '', '37, -8', 'ali', 'Quintal (Recolha)', '1', '2', '3', '(TEM RETORNO) obs', 'Direto', '123', 16835, '123', 'Aguarda', '', '.50', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '45FF45', '583eb5e3', '', '', 1, 0, 1800),
(1480464000, 'vgspedro@gmail.com', 'Demo', 1480506420, 'Chegada', 'qw21', 'tetse ', 'Faro Airport-37, -8', 'Silves-ali', 'Quintal (Recolha)', '1', '2', '3', 'obs', 'Direto', '30', 16836, '123', 'Aguarda', '', '6.5', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '-/-', '963852852', 'PT', 1, 0, 1800),
(1475452800, '', 'Nuno Moreira', 1475499600, 'Chegada', 'Fr8248', 'Sandra Scholler', 'Faro aeroporto', 'Eden Resort Albufeira', '', '4', '', '', 'cobrar 54â‚¬ confirmar hora retorno', 'Hotel Percentagem', '45', 8258, '', 'Fechado', '', '', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475452800, '', 'Carlos Costa', 1475506800, 'Chegada', 'Fr8248', 'Sandra Scholler', 'Faro aeroporto', 'Eden Resort Albufeira', '', '5', '', '', 'cobrar 72â‚¬ confirmar hora retorno', 'Hotel Fixo', '45', 8260, '', 'Fechado', '', '', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476662400, '', 'Luis', 1476707400, 'Chegada', 'Be4533', 'Sandra Ana', 'Faro aeroporto', 'Albufeira', '', '7', '', '', 'cobrar 72â‚¬ confirmar hora retorno', 'Aoperador', '10', 8262, '', 'Aguarda', '', '0', '10', '0', '', '', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1467676800, '', 'Pedro', 1467716400, 'Golf', '', 'Sandra Scholler', 'Eden Resort Albufeira', 'Faro aeroport', '', '7', '', '', '', 'Direto', '', 8263, '', 'Fechado', '20', '4.4', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1476403200, '', 'Luis', 1476477000, 'Partida', 'Fr8249', 'Tancock Robert', 'Pedra dos Bicos', 'Faro aeroport', '', '2', '', '', '', 'Aoperador', '25', 8265, '2470', 'Aguarda', '', '3.3', '10', '0', '', 'Sim', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4800),
(1483920000, '', 'Fixo', 1483961400, 'Golf', 'Ei894', 'Nicole Taddei', 'Faro aeroporto', 'Clube Praia da Rocha PortimÃ£o', '', '3', '', '', 'cobrar 99â‚¬ confirmar hora retorno', 'Direto', '', 8267, '', 'Fechado', '15', '3.3', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1476403200, '', 'Pedro', 1476444600, 'Transfer', 'Fr994', 'Filipe  Manuel', 'Pedra dos Bicos', 'Fatacil, Lagoa', '', '3', '', '1', ' confirmar hora retorno', 'Direto', '', 8269, '', 'Aguarda', '40', '8.8', '0', '0', '', '', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4800),
(1477612800, '', 'Demo', 1477670400, 'Partida', '', 'Glen Dunphy', 'Cerro Malpique Albufeira', 'Faro aeroport', '', '3', '', '1', '', 'Direto', '', 8270, '', 'Iniciado', '22', '', '', '0', '', '', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4200),
(1478304000, '', 'Demo', 1478358000, 'Chegada', 'Ezy6793', 'Michael Moffit', 'Faro aeroporto', 'av 25 abril portimao', '', '2', '1', '', 'cobrar 70â‚¬', 'Direto', '25', 8271, '', 'Fechado', '', '3.75', '0', '0', 'Sim', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1476662400, '', 'Luis', 1476722400, 'Partida', '', 'Ana Maria', 'Silves', 'Faro Aeroporto', '', '2', '1', '', '', 'Direto', '', 8272, '', 'Aguarda', '11', '2.42', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4200),
(1476316800, 'vgspedro@gmail.com', '', 1476358680, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '5', '0', 'TEM RETORNO 162/57fe2f0b | MTR | OBS: -/-', 'Direto', '0', 16489, '', 'Aguarda', '70', '0', '0', '2016-10-12 13:39:39', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', '', '162/57fe2f0b', '963602608', 'PT', 1, 0, 3600),
(1478044800, '', 'Suporte', 1478077200, 'Partida', '', 'Michelle Butler45', 'Clube Alvorferias Alvor4', 'Faro aeroport', '', '4', '2', '111', '', 'OperadorPerc', '', 8284, '7987987', 'Aguarda', '', '', '', '0', 'Sim', 'Sim', 'Sim', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1479945600, '', 'Pedro', 1480007700, 'Chegada', 'Fr5712', 'Edgar Maurer', 'Faro aeroporto', 'Casa Arte Nova Bias do Sul Fuzeta Moncarapacho', '', '6', '', '', 'confirmar hora retorno', 'Aoperador', '', 8285, 't123', 'Aceite', '60', '11', '10', '0', '', '', 'NÃ£o', 'NÃ£o', '88FF77', '0', '', '', 0, 0, 2700),
(1468540800, '', 'Pedro', 1468593900, 'Partida', '5713', 'Edgar Maurer', 'restaurante jorge do peixe, quarteira', '8200-269', '', '6', '', '', '', 'Aoperador', '', 8288, '', 'Fechado', '45', '7.7', '10', '0', '', '', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 0),
(1476835200, '', 'Luis', 1476905400, 'Chegada', 'Ei498', 'Laura Jordan', 'Faro aeroporto', 'Albufeira Jardim Albufeira', '', '4', '2', '', 'cobrar 36â‚¬ marcar dia e hora de retorno informar paulo', 'Direto', '', 8293, '', 'Fechado', '23', '5.06', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4200),
(1476316800, 'vgspedro@gmail.com', 'Pedro', 1476361440, 'Chegada', 'V1', 'Pedro', 'Faro Airport', 'Tunes - Aqui', '', '1', '0', '0', 'TEM RETORNO 169/57fe39d7 | MTR | OBS: -/-', 'Site Transf.Banco', '246', 16496, '', 'Aguarda', '0', '0', '0', '2016-10-12 14:25:43', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe39d7', '963852147', 'FR', 1, 0, 1800),
(1475280000, '', 'Carlos Costa', 1475312700, 'Chegada', 'Ezy6793', 'Gary Cullen', 'Faro aeroporto', 'Pedra dos Bicos', '', '2', '', '', '', 'Hotel por Pessoa', '55', 8444, '2480', 'Fechado', '', '', '', '0', 'NÃ£o', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1468540800, '', 'Pedro', 1468591200, 'Chegada', 'Ezy6445', 'John Chubb', 'Faro aeroporto', 'Tivoli Lagos', '', '2', '', '', 'pago paypal voo das 20:00h', 'Direto', '', 8312, '', 'Fechado', '14.25', '3.135', '', '0', '', '', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 0),
(1474502400, '', 'Fixo', 1474545600, 'Partida', 'AQ-112', 'Jorge Jesus', 'Albufeira ', 'Lisboa Aeroporto', '', '2', '', '', '', 'OperadorPerc', '250', 8313, '', 'Aguarda', '', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'AA7812', '0', '', '', 0, 0, 0),
(1478044800, 'vgspedro@gmail.com', 'Demo', 1478074440, 'Partida', 'XZD5789', 'Pedro Rodrigues', 'Ayamonte - Spain - Ali', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/57fde357 | MTR | OBS: -/-', 'Site Paypal', '35', 16480, '', 'Aguarda', '0', '0', '0', '2016-10-12 08:16:39', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '160/57fde357', '+963852147', 'AU', 1, 0, 4200),
(1478044800, '', 'Demo', 1478086200, 'Partida', 'GT-420', 'Marlene Jacque', 'Alcantarilha', 'Faro Aeroporto', '', '4', '', '1', 'Cadeira Bebe 1x', 'Direto', '', 8322, '', 'Aceite', '30', '', '0', '0', 'Sim', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'AA7812', '0', '', '', 0, 0, 0),
(1475366400, '', 'Nuno Moreira', 1475407800, 'Partida', '', 'Majella Bunney', 'Ceerful way vila Rua Adriano Correia de Oliveira, Lote 160E Albufeira', '37.091526,-8.222964', '', '6', '', '', '', 'Hotel Percentagem', '', 8323, '', 'Fechado', '99', '59.9994', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 3000),
(1474502400, '', 'Fixo', 1474547400, 'Chegada', 'Fr2303', 'Anthony Ryan', 'Faro aeroporto', 'Clube Praia da Rocha PortimÃ£o', '', '3', '1', '1', 'pago paypal ', 'Site 604', '', 8324, '', 'Aguarda', '', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 900),
(1479168000, '', 'Sara', 1479214800, 'Partida', '', 'Anthony Ryan', 'Clube Praia Da Rocha PortimÃ£o', 'Faro aeroport', '', '2', '1', '1', 'pago paypal ', 'Site 604', '', 8325, '', 'Aguarda', '', '', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 12300),
(1475539200, '', 'Carlos Costa', 1475599800, 'Chegada', 'Ls815', 'Francis Gallacher', 'Faro aeroporto', 'Tivoli Lagos', '37.0910535Â°-8.2265955Â°', '2', '', '', 'confirmar hora retorno', 'Hotel Percentagem', '', 8340, '', 'Fechado', '136', '9.52', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 10800),
(1474502400, '', 'Fixo', 1474534800, 'Chegada', 'FE-450', 'Joao Victor', 'Faro Aeroporto', 'Lagos, Algarve', 'Largo Gil Eanes', '3', '', '1', 'Cadeira Bebe 1x', 'Direto', '', 8341, '', 'Aguarda', '20', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'AA7812', '0', '', '', 0, 0, 0),
(1477612800, 'suporte@oseubackoffice.com', '', 1477665420, 'Partida', 'rrrrr @ 18:37', 'tttttttttt', 'Albufeira - Salgados - -/-', 'Faro Airport', '', '3', '1', '0', '162/5813550a | PP | OBS: gggggggggggggggggg', 'Site Paypal', '20.96', 16795, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:39:22', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5813550a', '55555555', 'BUL', 1, 0, 3600),
(1477612800, 'suporte@oseubackoffice.com', '', 1477676340, 'Partida', 'Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§', 'fffffffffff', 'Albufeira - Salgados', 'Faro Airport - -/-', '', '4', '2', '2', 'TEM RETORNO 162/5813557a | PP | OBS: jjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'Site Paypal', '377.28', 16796, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:41:14', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5813557a', '77777777777', 'AUS', 1, 0, 3600),
(1476403200, '', 'Demo', 1476457500, 'Chegada', 'Zb580', 'Rachel Thomasson', 'Faro aeroporto', 'Vale DÂ´Rei', '', '2', '2', '', 'crianÃ§as 2 e 4 anos confirmar hora de partida com os clientes na recepÃ§Ã£o', 'Aoperador', '', 8358, '', 'Aguarda', '40', '6.6', '10', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4800),
(1476662400, '', 'Pedro', 1476709200, 'Partida', '', 'Manuel AntoÃ³nio', 'Vale DÂ´Rei ', 'Faro Aeroporto', '', '2', '2', '', 'crianÃ§as 2 e 4 anos a recepÃ§Ã£o ficou de informar hora de partida do cliente', 'Hotel Fixo', '40', 8359, '', 'Aguarda', '', '', '', '0', '', '', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4200),
(1476662400, 'patriciamlapa@gmail.com', 'Demo', 1476687000, 'Partida', 'Ggggg @ 10:50', 'Pat', 'Albufeira - Salgados - -/-', 'Faro Airport', '', '1', '0', '0', '162/58035bb8 | PP | OBS: -/-', 'Site Paypal', '0.10', 16706, '', 'Aguarda', '0', '0', '0', '2016-10-16 11:51:36', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58035bb8', '888', '-/-', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', 'Demo', 1478426400, 'Partida', '999-ss @ 13:47', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fe314d | MTR | OBS: -/-', 'Direto', '0', 16495, '', 'Aguarda', '0', '0', '0', '2016-10-12 13:49:17', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe314d', '963602608', 'PT', 1, 0, 3600),
(1476403200, '', 'Pedro', 1476478800, 'Partida', '', 'Shane Crosbie', 'Clube Alvor Ferias', 'Faro aeroport', '', '6', '', '1', 'bebe com 2 anos', 'Aoperador', '', 8366, '', 'Aguarda', '99', '19.58', '10', '0', '', 'Sim', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4800),
(1476489600, 'vgspedro@gmail.com', '', 1476527820, 'Chegada', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/5800c396 | TB | OBS: ss', 'Site Transf.Banco', '0.02', 16582, '', 'Aguarda', '0', '0', '0', '2016-10-14 12:37:58', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800c396', '963602608', 'PT', 1, 0, 9000),
(1479168000, '', 'Demo', 1479202200, 'Partida', 'BE1772', 'Darrin Mellor', 'The resort hotel Val do Lobo', 'Faro aeroport', '', '4', '', '', '', 'Hotel Fixo', '45', 8368, '', 'Fechado', '', '2.25', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '37ET58', '0', '', '', 0, 0, 3600),
(1474675200, '', 'Fixo', 1474722000, 'Partida', 'Fr4051', 'Stephani Hudson', 'Vale DÂ´Rei Carvoeiro', 'Faro aeroport', '', '2', '2', '', 'CrianÃ§as de 5 anos e um ano pedir voucher informar nr', 'OperadorPerc', '40', 8377, '', 'Aguarda', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1468800000, '', 'Pedro', 1468844100, 'Chegada', 'Fr7412', 'Lotte Verhoeve', 'Faro aeroporto', 'Villa Rita Albufeira', '', '8', '', '', 'confirmar hora de partida e informar', 'Elodie', '41', 8380, '', 'Fechado', '', '9.02', '', '0', '', '', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 0),
(1469664000, '', 'Pedro', 1469674800, 'Partida', 'Fr7411', 'Lotte Verhoeve', 'Villa Rita Albufeira', 'Faro aeroport', '', '8', '', '', '', 'Elodie', '41', 8382, '', 'Fechado', '', '9.02', '', '0', '', '', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 0),
(1475280000, '', 'Carlos Costa', 1475340300, 'Chegada', 'Dy1782', 'Mr.Frykholm', 'Faro aeroporto', 'Luna Olympus Vilamoura', '', '8', '', '', 'cliente com golfes', 'Hotel Tabela', '', 8384, '', 'Fechado', '405', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475366400, '', 'Nuno Moreira', 1475420400, 'Partida', '', 'Mr.Frykholm', 'Luna Olympus Vilamoura', 'Faro aeroport', '', '8', '', '', '', 'Hotel Fixo', '45', 8385, '', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476748800, '', 'Pedro', 1476813900, 'Golf', '', 'Mr.Frykholm', 'Luna Olympus Vilamoura', 'Vale do Lobo Golf', '', '8', '', '', '', 'Aoperador', '25', 8386, '', 'Aguarda', '', '1.5', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 4200),
(1476748800, '', 'Luis', 1476810000, 'Golf', '', 'Mr.Frykholm', 'Vale do Lobo Golf', 'Luna Olympus Vilamoura', '', '8', '', '', '', 'Direto', '', 8387, '', 'Aguarda', '78', '4.68', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 4200),
(1476662400, '', 'Nuno Moreira', 1476723900, 'Golf', '', 'Mr.Frykholm', 'Luna Olympus Vilamoura', 'Silves Golf', '', '8', '', '', '', 'OperadorPerc', '', 8388, '', 'Aguarda', '155', '8.37', '15.5', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 4200),
(1477267200, '', 'Luis', 1477341000, 'Golf', '', 'Mr.Frykholm', 'Golf Silves', 'Luna Olympus Vilamoura', '', '8', '', '', '', 'OperadorFixo', '100', 8389, '', 'Aceite', '', '5.7', '5', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 5400),
(1475280000, '', 'Nuno Moreira', 1475306700, 'Interzone', '', 'Mr.Frykholm', 'Luna Olympus Vilamoura', 'Quinta do Lago', '', '8', '', '', '', 'Hotel Fixo', '45', 8390, '', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475280000, '', 'JoÃ£o Pedro', 1475332200, 'Retorno', '', 'Mr.Frykholm', 'Quinta do Lago', 'Luna Olympus Vilamoura', '', '8', '', '', '', 'Hotel por Pessoa', '', 8391, '', 'Fechado', '45', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475280000, '', 'JoÃ£o Pedro', 1475304600, 'Interzone', '', 'Mr.Frykholm', 'Luna Olympus Vilamoura', 'Millenium Golf', '', '8', '', '', '', 'Hotel Fixo', '', 8392, '', 'Fechado', '60', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475280000, '', 'Carlos Costa', 1475328600, 'Retorno', '', 'Mr.Frykholm', 'Millenium Golf', 'Luna Olympus Vilamoura', '', '8', '', '', '', 'Hotel Tabela', '45', 8393, '', 'Fechado', '0', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1474502400, '', 'Fixo', 1474549200, 'Parques TemÃ¡ticos', '', 'Mr.Frykholm', '37.12668,-8.5425378', '37.4987353,-8.4497222', '', '8', '', '', '', 'OperadorPorPax', '', 8394, '', 'Fechado', '47', '3.9', '8', '0', '', 'Sim', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 3540),
(1479168000, '', 'Demo', 1479236700, 'Parques TemÃ¡ticos', '', 'Mr.Frykholm', '41.779905,-8.6058763', '37.129389,-7.7050777', '', '8', '', '', '', 'Hotel Percentagem', '', 8395, '', 'Fechado', '14', '3.08', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 3000),
(1475366400, '', 'Nuno Moreira', 1475394600, 'Interzone', '', 'Mr.Frykholm', 'Luna Olympus Vilamoura', '37.091526,-8.222964', '', '8', '', '', '', 'Hotel por Pessoa', '', 8396, '', 'Fechado', '78.96', '4.7376', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 3000),
(1476230400, '', 'Luis', 1476308880, 'Chegada', '', 'James Harlow', 'Faro aeroporto', 'Epic Sana Albufeira', '', '2', '3', '', 'nada a obs', 'OperadorPerc', '0', 8977, '', 'Aguarda', '125', '24.75', '12.5', '0', '', 'Sim', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4500),
(1476662400, '', 'Demo', 1476698400, 'Partida', 'YZF-1234', 'William Farrington', 'Eirasol', 'Faro aeroport', '', '1', '', '', 'confirmar esta hora de partida', 'Aoperador', '25', 8486, '', 'Aguarda', '', '3.3', '10', '0', '', '', 'NÃ£o', 'Sim', '77XX88', '0', '', '', 0, 0, 4800),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 15:08', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/57fe4414 | TB | OBS: -/-', 'Site Transf.Banco', '0', 16501, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:09:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe4414', '963602608', 'PT', 1, 0, 4200),
(1476316800, 'vgspedro@gmail.com', '', 1476364560, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fe4616 | TB | OBS: ed', 'Site Transf.Banco', '36', 16502, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:17:58', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe4616', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 15:15', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fe4616 | TB | OBS: ed', 'Site Transf.Banco', '0', 16503, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:17:58', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe4616', '963602608', 'PT', 1, 0, 3600),
(1474502400, '', 'Fixo', 1474544700, 'Chegada', 'Ei494', 'Francis Cummins', 'Faro aeroporto', 'Squash Hotel PortimÃ£o', '', '2', '', '', 'confirmar hora retorno e informar paulo ', 'TabelaXride', '', 8517, '', 'Fechado', '45', '6.75', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1474675200, '', 'Fixo', 1474709100, 'Partida', 'EI495', 'Francis Cummins', 'Squash Hotel PortimÃ£o', 'Faro aeroport', '', '2', '', '', 'Confirmar voo de partida', 'DiretoXride', '', 8518, '', '8', '', '', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1476921600, 'geral@oseubackoffice.com', '', 1476985020, 'Interzone', '', 'tttttttttttttt', 'Aljezur', 'Alte - -/-', '', '4', '0', '0', 'TEM RETORNO 163/5808e4e3 | TB | OBS: ffffffffffffffffffffffff', 'Site Transf.Banco', '200', 16770, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:38:11', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808e4e3', '2222222222', '-/-', 1, 0, 9000),
(1476921600, 'geral@oseubackoffice.com', '', 1476984840, 'Interzone', '', 'ppppppppppppppppp', 'Alte', 'Aljezur - -/-', '', '7', '1', '0', '163/5808e447 | MTR | OBS: fffffffffffffffffffff', 'Direto', '0', 16769, '', 'Aguarda', '200', '0', '0', '2016-10-20 16:35:35', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808e447', '2333333333', '-/-', 1, 0, 9000),
(1476921600, 'geral@oseubackoffice.com', '', 1476984780, 'Interzone', '', 'rrrrr', 'Aljezur', 'Alte - -/-', '', '1', '0', '0', '163/5808e3f7 | TB | OBS: jjjjjjjjjjjjjjjjjjjjjjjj', 'Site Transf.Banco', '90', 16768, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:34:15', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808e3f7', '914415818', '-/-', 1, 0, 9000),
(1476921600, 'geral@oseubackoffice.com', '', 1476984360, 'Chegada', 'eeeeee', 'sssssssssssss', 'Faro Airport', 'Ayamonte - Spain - Rua General Humberto Delgado, NÂº6, 2Âº esq', '', '3', '1', '0', '160/5808e2de | MTR | OBS: xxxxxxxxxxxxxxxxxxxxxxxx', 'Direto', '0', 16767, '', 'Aguarda', '18', '0', '0', '2016-10-20 16:29:34', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5808e2de', '2222222222', '-/-', 1, 0, 4200),
(1470873600, '', 'Pedro', 1470924000, 'Partida', 'Fr3669', 'Bastian Meijer', 'Villa Palma Albufeira', 'Faro aeroport', '', '8', '', '', '', 'Aoperador', '35', 8571, '', 'Fechado', '', '7.7', '', '0', '', 'Sim', 'NÃ£o', 'NÃ£o', '77XX88', '123AA', '', '', 0, 0, 0),
(1474675200, '', 'Fixo', 1474755000, 'Chegada', 'Fr7032', 'James Lynch', 'Faro aeroporto', 'Camping Trindade Lagos', '', '4', '', '', 'confirmar hora retorno', 'DiretoXride', '', 8572, '635', 'Aguarda', '122', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1476921600, 'geral@oseubackoffice.com', '', 1476984240, 'Chegada', 'ggggggggggggg', 'ttttttt', 'Faro Airport', 'Ayamonte - Spain - -/-', '', '5', '1', '0', '160/5808e1d1 | PP | OBS: bbbbbbbbbbbbbbbbbbbbbbb', 'Site Paypal', '186.3', 16766, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:25:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5808e1d1', '44444444', '-/-', 1, 0, 4200),
(1475884800, '', 'Demo', 1475917200, 'Partida', 'Ezy2016', 'Hamilton', 'Vale DÂ´Rei ', 'Faro aeroport', '', '2', '', '1', '', 'Hotel Percentagem', '40', 8593, '', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476316800, '', '', 1476366300, 'Interzone', '', 'Tom Morris', 'Crowne Plaza Vilamoura', 'Quinta do Lago Golf', '', '4', '', '', '', 'Hotel por Pessoa', '', 8599, '', 'Aguarda', '50', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476662400, '', 'Pedro', 1476724020, 'Golf', '', 'Tom Morris', 'Crowne Plaza Vilamoura', 'Quinta do Lago Golf', '', '4', '', '', '', 'OperadorFixo', '', 8601, '', 'Aguarda', '500', '29.7', '5', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 4200),
(1474502400, '', 'Fixo', 1474533000, 'Chegada', 'FE-741', 'Victor Pedro', 'Faro Aeroporto', 'Lagoa, Algarve', '', '2', '', '2', 'Cadeira Bebe 2x', 'OperadorPerc', '250', 8602, '', 'Aguarda', '', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'AA7812', '0', '', '', 0, 0, 0),
(1476748800, '', 'Sara', 1476806100, 'Chegada', 'Ab3166', 'Heidi Hartmann', 'Faro aeroporto', 'Hotel Baia de Cristal Carvoeiro', '', '1', '', '', 'marcar dia e hora retorno e informar', 'OperadorPerc', '', 8603, '', 'Fechado', '49', '6.615', '4.9', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1483920000, '', 'Pedro', 1483968000, 'Chegada', 'HG2364', 'Minttu Penttinen', 'Faro aeroporto', 'Areias Village Albufeira', '', '2', '1', '', '', 'ARV', '25', 8604, '', 'Iniciado', '', '', '', '0', '', '', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 0),
(1475798400, '', 'Nuno Moreira', 1475870400, 'Golf', 'Ei899', 'Daniel Cummins', 'Faro aeroporto', 'Luna Alvor Bay', '', '8', '', '', 'confirmar hora retorno e informar', 'Site', '', 8615, '637', 'Fechado', '121', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1478390400, 'vgspedro@gmail.com', '', 1478434680, 'Partida', '999-ss @ 12:18', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '3', '0', 'RETORNO 160/57fe1d87 | MTR | OBS: teste pax', 'Direto', '0', 16482, '', 'Aguarda', '0', '0', '0', '2016-10-12 12:24:55', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe1d87', '963602608', 'PT', 1, 0, 4200),
(1475366400, '', 'JoÃ£o Pedro', 1475399100, 'Chegada', 'Ei490', 'James Harlow', 'Faro aeroporto', 'Forte do Vale Albufeira', '', '7', '', '', '', 'Hotel Percentagem', '', 8620, '', 'Fechado', '80', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476144000, '', 'Luis', 1476184500, 'Partida', '', 'James Harlow', 'Forte do Vale Albufeira', 'Faro aeroport', '', '7', '', '', '', 'Hotel Fixo', '45', 8621, '', 'Aguarda', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476921600, 'geral@oseubackoffice.com', '', 1476983940, 'Chegada', 'uuuuuuuuuuuuuu', 'ggggggggggggggg', 'Faro Airport', 'Ayamonte - Spain - -/-', '', '6', '2', '0', '160/5808e096 | TB | OBS: bbbbbbbbbbbbbbbbbbbb', 'Site Transf.Banco', '200', 16764, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:19:50', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5808e096', '333333333', '-/-', 1, 0, 4200),
(1476057600, '', 'Sara', 1476107100, 'Interzone', '', 'James Harlow', 'Forte do Vale Albufeira', 'Old Course Vilamoura', '', '8', '', '', '', 'Hotel Tabela', '45', 8637, '', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476057600, '', 'Sara', 1476111600, 'Interzone', '', 'James Harlow', 'Forte do Vale Albufeira', 'Old Course Vilamoura', '', '2', '', '', '', 'Hotel Percentagem', '', 8638, '', 'Fechado', '110', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476144000, '', 'Demo', 1476194400, 'Partida', '', 'James Harlow', 'Old Course Vilamoura', 'Forte do Vale Albufeira', '', '8', '', '', '', 'Hotel Percentagem', '', 8639, '', 'Aguarda', '45', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2400),
(1476144000, '', 'Demo', 1476198000, 'Retorno', '', 'James Harlow', 'Old Course Vilamoura', 'Forte do Vale Albufeira', '', '2', '', '', '', 'Hotel Fixo', '', 8640, '', 'Aguarda', '45', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475452800, '', 'Nuno Moreira', 1475505000, 'Golf', '', 'James Harlow', 'Forte do Vale Albufeira', 'Laguna Golf Vilamoura', '', '8', '', '', '', 'Hotel Tabela', '', 8641, '', 'Fechado', '120', '23.76', '12', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475452800, '', 'JoÃ£o Pedro', 1475501400, 'Golf', '', 'James Harlow', 'Forte do Vale Albufeira', 'Laguna Golf Vilamoura', '', '2', '', '', '', 'Hotel por Pessoa', '', 8642, '', 'Fechado', '110', '24.2', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476057600, '', 'Luis', 1476120600, 'Retorno', '', 'James Harlow', 'Marina de Albufeira', 'Faro Airport', '', '8', '', '', '', 'Hotel por Pessoa', '', 8643, '', 'Fechado', '45', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2400),
(1476316800, '', '', 1476367200, 'Retorno', '', 'James Harlow', 'Laguna Golf  Vilamoura', 'Forte do Vale Albufeira', '', '2', '', '', '', 'Hotel por Pessoa', '', 8644, '', 'Aguarda', '45', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476057600, '', 'Demo', 1476100800, 'Interzone', '', 'James Harlow', 'Forte do Vale Albufeira', 'Pinhal do Golf Vilamoura', '', '2', '', '', '', 'Hotel Fixo', '', 8646, '', 'Fechado', '110', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476057600, '', 'Sara', 1476115200, 'Retorno', '', 'James Harlow', 'Pinhal do Golf Vilamoura', 'Forte do Vale Albufeira', '', '8', '', '', '', 'Hotel Percentagem', '', 8647, '', 'Fechado', '45', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475452800, '', 'Carlos Costa', 1475503080, 'Golf', 'voo', 'Mr.Frykholm', 'Albufeira', 'Eden Resort Albufeira', 'p ref', '1', '2', '3', 'obs', 'Hotel Percentagem', '12', 8974, 'ticket', 'Fechado', '', '2.376', '1.2', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476316800, '', 'Luis', 1476379200, 'Interzone', '', 'James Harlow', 'Forte do Vale Albufeira', 'Eden Resort Albufeira', '', '8', '', '', '', 'Hotel Tabela', '', 8649, '', 'Fechado', '45', '2.7', '0', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475452800, '', 'Nuno Moreira', 1475512200, 'Retorno', '', 'James Harlow', 'Laguna Golf  Vilamoura', 'Forte do Vale Albufeira', '', '2', '', '', '', 'Hotel por Pessoa', '', 8652, '', 'Fechado', '256', '56.32', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1477008000, '', 'Luis', 1477083600, 'Interzone', '', 'Joyce Pitt', 'Hotel Ibis Faro', 'Cacela Village', '', '4', '', '', 'confirmar hora de partida com o cliente e informar', 'Direto', '', 8653, '', 'Aguarda', '80', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 4200),
(1476921600, 'geral@oseubackoffice.com', '', 1476983820, 'Chegada', 'yyyyyyyyyyyyyyyy', 'gggggggggggggggg', 'Faro Airport', 'Ayamonte - Spain - -/-', '', '4', '0', '0', '160/5808e059 | PP | OBS: nnnnnnnnnnnnnnnnnnnn', 'Site Paypal', '18.63', 16763, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:18:49', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5808e059', '333333333', '-/-', 1, 0, 4200),
(1468368000, '', 'Pedro', 1468400400, 'Chegada', 'Fr5452', 'Maria Faria', 'Faro aeroporto', 'Riu Guarana', '', '2', '', '', 'confirmar hora de retorno e informar', 'Aoperador', '', 8655, '', 'Aguarda', '60', '11', '10', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1476921600, 'vgspedro@gmail.com', '', 1476972180, 'Partida', 'ie999 @ 18:03', 'Pedro', 'Albufeira - Salgados - wewe wewe', 'Faro Airport', '', '1', '0', '0', '162/5808dfa0 | PP | OBS: gf', 'Site Paypal', '20.7', 16762, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:15:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808dfa0', '8969638526', 'RM', 1, 0, 3600),
(1478995200, '', 'Sara', 1479078600, 'Chegada', 'Fr5486', 'Celia Coutinho', 'Faro aeroporto', 'Resort Hotel Morgadinhos Vilamoura', '', '3', '', '', 'marcar dia e hora retorno e informar', 'Direto', '', 8666, '', 'Aguarda', '23.75', '5.225', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 5400),
(1468540800, '', 'Jose', 1468584900, 'Partida', '', 'Elisa Hynes', 'Vilanova', 'Faro aeroport', '', '2', '', '', '', 'Direto', '', 8670, '644', 'Fechado', '74.96', '16.4912', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1470787200, '', 'Pedro', 1470823200, 'Partida', '', 'Phil', 'Apartamento Phil', 'Faro aeroport', '', '2', '', '', '', 'Direto', '', 8671, '', 'Aguarda', '50', '11', '', '0', '', 'Sim', 'NÃ£o', 'Sim', '', '5a', '', '', 0, 0, 0),
(1476144000, '', 'Luis', 1476197400, 'Chegada', 'Fr4031', 'Phil', 'Faro aeroporto', 'Apartamento Phil', '', '2', '', '', '', 'Hotel Fixo', '45', 8672, '', 'Aguarda', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476316800, '', '', 1476381600, 'Chegada', 'Fr6826', 'Anne Orr', 'Faro aeroporto', 'Pedra dos Bicos lote 9 Door 2 Albufeira', '', '2', '', '', 'pago paypal confirmar hora de partida', 'Hotel por Pessoa', '', 8673, '645', 'Aguarda', '30', '', '', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 6600),
(1480377600, '', 'Fixo', 1480413600, 'Partida', '', 'Anne Orr', 'Pedra dos Bicos lote 9 Door 2 Albufeira', 'Faro aeroport', '', '2', '', '', 'pago paypal ', 'DiretoXride', '', 8674, '645', 'Aguarda', '', '', '', '0', 'Sim', 'Sim', 'Sim', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1476316800, '', 'Sara', 1476374400, 'Partida', '', 'Margaret Doyle', 'Solaqua Albufeira', 'Faro aeroport', '', '4', '', '', '', 'Hotel Tabela', '', 8690, '649', 'Fechado', '45', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476489600, '', 'Demo', 1476543600, 'Partida', 'YZF-1234', 'Chris OÂ´Connell', 'Oura View Beach Clube', 'Faro aeroport', '', '4', '', '', '', 'Direto', '', 8692, '650', 'Aguarda', '85', '18.7', '0', '0', '', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 16:01', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 169/57fe5034 | TB | OBS: -/-', 'Site Transf.Banco', '0', 16513, '', 'Aguarda', '0', '0', '0', '2016-10-12 16:01:08', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe5034', '963602608', 'PT', 1, 0, 1800),
(1476316800, 'vgspedro@gmail.com', '', 1476367380, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '2', '0', '0', 'TEM RETORNO 162/57fe50ec | TB | OBS: ee', 'Site Transf.Banco', '40', 16514, '', 'Aguarda', '0', '0', '0', '2016-10-12 16:04:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe50ec', '963602608', 'PT', 1, 0, 6000),
(1475798400, '', 'Nuno Moreira', 1475831400, 'Chegada', 'Ls251', 'Richard Tovey', 'Faro aeroporto', 'Cascade Welness resort', '', '3', '1', '', 'confirmar hora retorno', 'LC', '', 8703, '', 'Fechado', '200', '', '', '0', '', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475884800, '', 'Demo', 1475925000, 'Partida', 'fr234', 'Richard Tovey', 'Cascade Welness resort Lagos', 'Faro aeroport', '', '3', '', '', '', 'Hotel Tabela', '45', 8704, '', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476921600, '', 'Sara', 1476986400, 'Chegada', 'Ba2696', 'Claire Pope', 'Faro aeroporto', 'Clube Praia da Oura', '', '4', '', '', '', 'DiretoXride', '', 8705, '', 'Aguarda', '60', '', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2700),
(1477267200, '', 'Luis', 1477335600, 'Partida', 'Ba2699', 'Claire Pope', 'Clube Praia da Oura', 'Faro aeroport', '', '4', '', '', '', 'OperadorPerc', '', 8706, '', 'Iniciado', '', '', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2100),
(1473984000, '', 'Suporte', 1474032600, 'Chegada', '', 'Tim Banks', 'Faro aeroporto', 'Pestana Alvor Beach Club', '', '2', '', '', 'pago paypal confirmar hora de partida', 'DiretoXride', '10', 8710, '', 'Iniciado', '', '2.2', '', '0', '', '', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 18000),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '1', '160/5800f8a2 | PP | OBS: g', 'Site Paypal', '0.01', 16630, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:24:18', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f8a2', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478442540, 'Interzone', '', 'pedro', 'Alte - aqqiu', 'Aljezur', '', '1', '0', '0', 'RETORNO 163/581352f9 | PP | OBS: sd', 'Site Paypal', '0', 16794, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:30:33', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/581352f9', '968527412', 'AST', 1, 0, 9000),
(1476316800, 'vgspedro@gmail.com', '', 1476357960, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '5', '0', '0', 'TEM RETORNO 162/57fe2e6b | MTR | OBS: -/-', 'Site Transf.Banco', '70', 16487, '', 'Aguarda', '0', '0', '0', '2016-10-12 13:36:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe2e6b', '963602608', 'PT', 1, 0, 3600),
(1476144000, '', 'Luis', 1476181800, 'Partida', '', 'William Quinlisk', 'Hotel Ondamar', 'Faro aeroport', '', '2', '', '', '', 'Hotel Fixo', '45', 8719, '653', 'Aceite', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2400),
(1476057600, '', 'Demo', 1476111600, 'Partida', '', 'Yvonne Casey', 'Villa Baia Jardim da Luz Praia da Luz', 'Faro aeroport', '', '4', '', '', '', 'Hotel Percentagem', '45', 8721, '656', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1479168000, 'vgspedro@gmail.com', 'Demo', 1479230040, 'Partida', 'V2 @ 17:14', 'Pedro', 'Tunes - -/-', 'Faro Airport', '', '1', '0', '0', 'RETORNO 169/57fde19c | MTR | OBS: -/-', 'Direto', '0', 16478, '', 'Aguarda', '0', '0', '0', '2016-10-12 08:09:16', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '37ET58', '169/57fde19c', '963+852147', 'PT', 1, 0, 1800),
(1477267200, '', 'Luis', 1477341600, 'Chegada', 'Zb216', 'Leonard Chapman', 'Faro aeroporto', 'Mar a Vista Albufeira', '', '2', '', '', 'pago paypal marcar dia e hora retorno', 'Hotel por Pessoa', '15', 8726, '660', 'Aceite', '', '', '2', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3600),
(1479945600, '', 'Pedro', 1479978000, 'Parques TemÃ¡ticos', 'To3428', 'Daniel Gaioni', 'Faro aeroporto', 'Palme Village', 'pt referencia', '4', '3', '1', 'observacoes tx', 'OperadorPorPax', '9', 8727, '12345', 'Fechado', '', '-0.22', '10', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '88FF77', '0', '', '', 0, 0, 1800),
(1476921600, 'geral@oseubackoffice.com', '', 1476972720, 'Partida', 'oooooooooooooo @ 18:12', 'ttttttttttttttttttt', 'Albufeira - Salgados - -/-', 'Faro Airport', '', '7', '0', '0', '162/5808df5f | PP | OBS: jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'Site Paypal', '207', 16761, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:14:39', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808df5f', '914415818', '-/-', 1, 0, 3600),
(1477008000, 'geral@oseubackoffice.com', '', 1477049280, 'Partida', 'hhhhhhhhhhhhhhhh @ 15:38', 'lllllllllllllll', 'Ayamonte - Spain - Estrada Sta EulÃ¡lia, Ed. Sta EulÃ¡lia Mar, Al11', 'Faro Airport', '', '3', '1', '0', 'RETORNO 160/5808d72e | MTR | OBS: nnnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'Direto', '0', 16756, '', 'Aguarda', '0', '0', '0', '2016-10-20 15:39:42', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5808d72e', '289150167', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', 'Demo', 1478426580, 'Partida', 'V2 @ 13:03', 'Pedro', 'Albufeira - Salgados - -/-', 'Faro Airport', '', '1', '0', '0', '162/581ef33a | MTR | OBS: alert();', 'Direto', '0', 16816, '', 'Aguarda', '20', '0', '0', '2016-11-06 09:09:14', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/581ef33a', '963602608', 'DE', 1, 0, 3600),
(1476921600, 'geral@oseubackoffice.com', '', 1476981480, 'Chegada', 'yyyyyyyyyyyyyyy', 'lllllllllllllll', 'Faro Airport', 'Ayamonte - Spain - -/-', '', '3', '1', '0', 'TEM RETORNO 160/5808d72e | MTR | OBS: nnnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'Direto', '0', 16755, '', 'Aguarda', '18', '0', '0', '2016-10-20 15:39:42', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5808d72e', '289150167', 'PT', 1, 0, 4200),
(1476921600, 'geral@oseubackoffice.com', '', 1476981300, 'Chegada', 'gggggggggggggg', 'jjjjjjjj', 'Faro Airport', 'Ayamonte - Spain - -/-', '', '6', '0', '0', 'TEM RETORNO 160/5808d696 | PP | OBS: mmmmmmmmmmmmmmmm', 'Site Paypal', '207', 16753, '', 'Aguarda', '0', '0', '0', '2016-10-20 15:37:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5808d696', '289150167', '-/-', 1, 0, 4200),
(1479945600, '', 'Fixo', 1479967200, 'Golf', 'DF-444', 'Jennifer Strain', 'Faro aeroport', 'Villa Laranjal urbanizaÃ§Ã£o Algarve Sol Quarteira', '', '2', '0', '0', '', 'Hotel Percentagem', '', 8746, '', 'Fechado', '15', '1.3', '2', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 10500),
(1476921600, 'geral@oseubackoffice.com', '', 1476972540, 'Partida', 'ffffffff @ 18:09', 'gggggggggggggg', 'Albufeira - Salgados - -/-', 'Faro Airport', '', '1', '0', '0', '162/5808de83 | TB | OBS: Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§Ã§', 'Site Transf.Banco', '20', 16760, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:10:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808de83', '289150167', '-/-', 1, 0, 3600),
(1476748800, 'vgspedro@gmail.com', '', 1476806940, 'Chegada', 'ei', 'Pedro', 'Faro Airport', 'Albufeira - Salgados - rua 5', '', '1', '0', '0', 'TEM RETORNO 162/5808d26c | PP | OBS:  weee', 'Site Paypal', '0.207', 16747, '', 'Aguarda', '0', '0', '0', '2016-10-20 15:19:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808d26c', '8969638526', 'PL', 1, 0, 3600),
(1477180800, 'vgspedro@gmail.com', 'Demo', 1477220940, 'Partida', 'ie999 @ 15:09', 'Pedro', 'Albufeira - Salgados - wewe wewe', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/5808d26c | PP | OBS:  weee', 'Site Paypal', '0', 16748, '', 'Aguarda', '0', '0', '0', '2016-10-20 15:19:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808d26c', '8969638526', 'PL', 1, 0, 3600),
(1476748800, 'vgspedro@gmail.com', '', 1476807600, 'Chegada', 'ei', 'Pedro', 'Faro Airport', 'Albufeira - Salgados - rua 5', '', '18', '0', '0', 'TEM RETORNO 162/5808d357 | PP | OBS: e', 'Site Paypal', '1.035', 16749, '', 'Aguarda', '0', '0', '0', '2016-10-20 15:23:19', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808d357', '8969638526', 'BUL', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478434740, 'Partida', 'ie999 @ 15:19', 'Pedro', 'Albufeira - Salgados - wewe wewe', 'Faro Airport', '', '18', '0', '0', 'RETORNO 162/5808d357 | PP | OBS: e', 'Site Paypal', '0', 16750, '', 'Aguarda', '0', '0', '0', '2016-10-20 15:23:19', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808d357', '8969638526', 'BUL', 1, 0, 3600),
(1477008000, 'geral@oseubackoffice.com', '', 1477067220, 'Chegada', 'eeeeeeeee', 'CCCCC', 'Faro Airport', 'Ayamonte - Spain - -/-', '', '1', '0', '0', 'TEM RETORNO 160/5808d543 | PP | OBS: vvvvvvvvvvvvvvvvvvvvv', 'Site Paypal', '18.63', 16751, '', 'Aguarda', '0', '0', '0', '2016-10-20 15:31:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5808d543', '289150167', '-/-', 1, 0, 4200),
(1468368000, '', 'Pedro', 1468393200, 'Interzone', '', 'Richard Duncan', '37.1327998,-8.4546078', 'Salgados Golf', '37.0985435,-8.2172177', '4', '', '', '', 'Direto', '', 8768, '', 'Aguarda', '40', '8.8', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1476748800, '', 'Pedro', 1476805200, 'Chegada', 'Fr5712', 'Antonio Garcia', 'Faro aeroporto', 'Sensimar', '', '2', '', '', '', 'Aoperador', '22.50', 8781, '', 'Fechado', '', '2.75', '10', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1472601600, '', 'Pedro', 1472626800, 'Chegada', '4U2648', 'Sra. Koehler', 'Faro aeroporto', 'Sensimar', '', '1', '', '', '', 'Direto', '22.50', 8782, '', 'Fechado', '', '4.95', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1468454400, '', 'Pedro', 1468483800, 'Chegada', 'Dy1782', 'Andreas Otter', 'Faro aeroporto', 'Pedra dos Bicos 1 3Âº C', '', '2', '2', '', '', 'Albufeira Rental', '25', 8787, '11002', 'Fechado', '', '5.5', '', '0', 'NÃ£o', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '1', '160/5800f902 | TB | OBS: g', 'Site Transf.Banco', '0.01', 16631, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:25:54', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f902', '963602608', 'PT', 1, 0, 4200);
INSERT INTO `excel` (`data_servico`, `email`, `staff`, `hrs`, `servico`, `voo`, `nome_cl`, `local_recolha`, `local_entrega`, `ponto_referencia`, `px`, `cr`, `bebe`, `obs`, `operador`, `cobrar_operador`, `id`, `ticket`, `estado`, `cobrar_direto`, `cmx_st`, `cmx_op`, `data_criacao`, `rec_ope`, `rec_staf`, `pag_ope`, `pag_staf`, `matricula`, `referencia`, `telefone`, `pais`, `criado_direto`, `nid`, `end`) VALUES
(1478390400, 'vgspedro@gmail.com', '', 1478473560, 'Chegada', 'V1', 'Pedro', 'Faro Airport', 'Tunes - Aqui', '', '1', '0', '0', 'TEM RETORNO 169/57fd62b1 | MTR | OBS: -/-', 'Site Transf.Banco', '470', 16475, '', 'Aguarda', '0', '0', '0', '2016-10-11 23:07:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd62b1', '963852147', 'PT', 1, 0, 1800),
(1474329600, '', 'Fixo', 1474371000, 'Interzone', '', 'David Hindson', 'SÃ£o Rafael Suite Hotel', 'Penina Golf Resort', '', '2', '', '', '(RETORNO) Cliente alterou pick up das 07:00 para as 06:30 - Apanhar cliente perto da paragem de autocarro que fica perto do SPA e do infantÃ¡rio xxx 4564456 46654654456 sdvvesvsdvsd dvsvevdwve weefwfefew', 'OperadorPorPax', '', 8791, '', 'Fechado', '225', '33.45', '2', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3600),
(1478044800, 'vgspedro@gmail.com', 'Sara', 1478095200, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '0', '0', '163/5808a4cb | MTR | OBS: -/-', 'Direto', '0', 16736, '', 'Fechado', '0.01', '0.00095', '0.0005', '2016-10-20 12:04:43', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808a4cb', '8969638526', 'DE', 1, 0, 9000),
(1476316800, 'vgspedro@gmail.com', 'Demo', 1476385200, 'Chegada', 'V1', 'Pedro', 'Faro Airport', 'Ayamonte - Spain - Aqui', '', '1', '0', '0', 'TEM RETORNO 160/57fe96bd | PP | OBS: -/-', 'Site Paypal', '16', 16556, '', 'Aguarda', '0', '0', '0', '2016-10-12 21:02:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe96bd', '963852147', 'PT', 1, 0, 4200),
(1475539200, '', 'Nuno Moreira', 1475589600, 'Partida', 'Fr4032', 'Stephen Farrel', 'Forte do Vale', 'Faro aeroport', '', '6', '', '', '', 'Hotel Tabela', '35', 8797, '', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 5400),
(1474675200, '', 'Fixo', 1474722000, 'Partida', '', '', 'Areias Village', 'Faro aeroport', '', '2', '', '', '', 'DiretoXride', '22.50', 8803, '6003', 'Aguarda', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2100),
(1478390400, 'vgspedro@gmail.com', '', 1478439900, 'Partida', '999-ss @ 16:55', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/58010033 | PP | OBS: -/-', 'Site Paypal', '0', 16649, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:56:35', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58010033', '963602608', 'PT', 1, 0, 4200),
(1475539200, '', 'JoÃ£o Pedro', 1475569200, 'Partida', 'Fr2304', 'Nestor', 'Vila Gale Ampalius', 'Faro aeroport', '', '8', '', '', '', 'Hotel Percentagem', '28', 8810, '', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1476316800, '', 'Luis', 1476361200, 'Partida', 'Fr2304', 'Nestor', 'Vila Gale Ampalius', 'Faro aeroport', '', '7', '', '', '', 'Hotel por Pessoa', '28', 8811, '', 'Aceite', '', '', '', '0', '', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476921600, '', 'Luis', 1476973800, 'Chegada', 'Ab3228', 'Thomas Heinritz', 'Faro aeroporto', 'Palme Village', '', '4', '', '', 'confirmar hora de partida com o cliente e informar paulo ', 'Direto', '27', 8812, '', 'Fechado', '', '5.94', '', '0', '', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1470009600, '', 'Pedro', 1470069900, 'Partida', 'Dy1783', 'Andreas Otter', 'Pedra dos Bicos lote 1 3ÂºC', 'Faro aeroport', '', '2', '2', '', '', 'Albufeira Rental', '25', 8815, '11003', 'Fechado', '', '5.5', '', '0', '', 'Sim', 'NÃ£o', 'NÃ£o', '', '123AA', '', '', 0, 0, 0),
(1478131200, '', 'Pedro', 1478188800, 'Chegada', 'Fr7034', 'Mairead Murphy', 'Faro aeroporto', 'Pedra dos Bicos lote 10 V', '', '2', '2', '', 'crianÃ§as 6 e 9 anos', 'Albufeira Rental', '30', 8816, '11004', 'Aguarda', '', '6.6', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1474675200, '', 'Fixo', 1474711200, 'Interzone', '', '', 'Grande Real St Eulalia', 'Marina Albufeira', '', '5', '', '', '', 'OperadorPerc', '12', 8821, '2002', 'Aguarda', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1475625600, '', 'Nuno Moreira', 1475688600, 'Retorno', '', 'Jony Lua', 'Marina Albufeira', 'Grande Real St Eulalia', '', '5', '', '', '', 'Hotel Tabela', '35', 8822, '2002', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476144000, '', 'Demo', 1476203100, 'Chegada', 'Ab3160', 'Sandra Wieser', 'Faro aeroporto', 'Riu Guarana', '', '6', '1', '', 'confirmar hora retorno e informar', 'Hotel por Pessoa', '', 8825, '', 'Aguarda', '80', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475798400, '', 'Demo', 1475868600, 'Partida', '', '', 'Oura Estrela', 'Faro aeroport', '', '2', '', '', '', 'Fot', '', 8835, '', 'Fechado', '25', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475625600, '', 'JoÃ£o Pedro', 1475654400, 'Chegada', 'Zb52', 'Phil Tovey', 'Faro aeroporto', 'Albufeira Sol', '', '8', '', '', '', 'Hotel Fixo', '', 8839, '', 'Fechado', '55', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1479945600, '', 'Pedro', 1479981600, 'Chegada', 'Zb52', 'Phil Tovey', 'Faro aeroporto', 'Albufeira Sol', '', '2', '', '', 'confirmar hora retorno cliente tem hora errada', 'Hotel Percentagem', '', 8840, '', 'Fechado', '140', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '88FF77', '0', '', '', 0, 0, 1800),
(1475107200, '', 'Fixo', 1475137800, 'Partida', 'Zb53', 'Phil Tovey', 'Albufeira Sol', 'Faro aeroport', '', '8', '', '', '', 'OperadorPerc', '', 8841, '', 'Iniciado', '', '', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2100),
(1475625600, '', 'JoÃ£o Pedro', 1475681400, 'Partida', 'Zb53', 'Phil Tovey', 'Albufeira Sol', 'Faro aeroport', '', '2', '2', '', '', 'Hotel Percentagem', '45', 8842, '', 'Fechado', '', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 6600),
(1476921600, 'geral@oseubackoffice.com', '', 1476971880, 'Partida', 'rrrrrrrrrr @ 17:58', 'kkkkkkkkkkkk', 'Albufeira - Salgados - Estrada Sta EulÃ¡lia, Ed. Sta EulÃ¡lia Mar, Al11', 'Faro Airport', '', '3', '1', '0', '162/5808dbd3 | MTR | OBS: xxxxxxxxxxxxxxxxxxx', 'Direto', '0', 16758, '', 'Aguarda', '20', '0', '0', '2016-10-20 15:59:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808dbd3', '914017738', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478428560, 'Partida', 'ie999 @ 13:46', 'Pedro', 'Ayamonte - Spain - wewe wewe', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/5808bda9 | TB | OBS: alert(&#34;ss&#34;)', 'Site Transf.Banco', '0', 16746, '', 'Aguarda', '0', '0', '0', '2016-10-20 13:50:49', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5808bda9', '', 'RS', 1, 0, 4200),
(1477267200, '', 'Luis', 1477338600, 'Chegada', 'EZY8925', 'Gillian Mohamed', 'Faro aeroporto', 'Sensimar', '', '2', '', '', '', 'TabelaXride', '22.50', 8851, '', 'Aceite', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1475539200, '', 'Carlos Costa', 1475574300, 'Chegada', 'Fr651', 'Linda Filippi', 'Faro aeroporto', 'Ka7 3pq 15 poplar way', '', '2', '1', '', 'confirmar hora retorno', 'Hotel Fixo', '', 8855, '671', 'Fechado', '122', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 4800),
(1477267200, '', 'Luis', 1477324800, 'Interzone', '', 'Joaquim Marta', 'Faro Aeroporto', 'Alvor, Algarve', '', '3', '', '', '', 'Direto', '', 8862, '', 'Fechado', '23', '', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'AA7812', '0', '', '', 0, 0, 1800),
(1479168000, '', 'Demo', 1479225600, 'Partida', '', 'Pat Allen', 'macdonalds, Lagos, Faro', 'Faro aeroport', '', '2', '', '', '', 'Aoperador', '', 8868, '676', 'Fechado', '61', '11.22', '10', '0', '', '', 'NÃ£o', 'NÃ£o', '77XX88', '0', '', '', 0, 0, 3000),
(1476921600, 'vgspedro@gmail.com', '', 1476974820, 'Chegada', 'ei', 'Pedro', 'Faro Airport', 'Ayamonte - Spain - rua 5', '', '1', '0', '0', 'TEM RETORNO 160/5808bda9 | TB | OBS: alert(&#34;ss&#34;)', 'Site Transf.Banco', '0.018', 16745, '', 'Aguarda', '0', '0', '0', '2016-10-20 13:50:49', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5808bda9', '', 'RS', 1, 0, 4200),
(1475539200, '', 'JoÃ£o Pedro', 1475592300, 'Chegada', 'Fr7032', 'Colin Self', 'Faro aeroporto', 'Mouragolf Village do Parque Volta do FaisÃ£o Vilamoura', '', '2', '', '', 'pago paypal confirmar hora de partida', 'Hotel Fixo', '35', 8871, '678', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 7200),
(1479945600, '', 'Pedro', 1479972600, 'Partida', '', 'Colin Self', 'Mouragolf Village do Parque Volta do FaisÃ£o Vilamoura', 'Faro aeroport', '', '2', '', '', '', 'OperadorPerc', '', 8872, '678', 'Aguarda', '55', '10.89', '5.5', '0', '', '', 'NÃ£o', 'NÃ£o', '88FF77', '0', '', '', 0, 0, 2700),
(1475366400, '', 'JoÃ£o Pedro', 1475398800, 'Chegada', 'Ei72', 'Jim Keery', 'Faro aeroporto', '37.091513,-8.222971', '', '2', '', '', 'confirmar hora retorno', 'Hotel por Pessoa', '', 8875, '', 'Fechado', '55', '3.3', '0', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476230400, '', 'Luis', 1476311700, 'Chegada', 'Fr7418', 'Dominique Maupin', 'Faro aeroporto', 'Avenue beira mar ArmaÃ§Ã£o de PÃªra', '', '2', '', '', 'confirmar hora de retorno cliente colocou hora de voo', 'Hotel Tabela', '', 8877, '', 'Aguarda', '82', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 6600),
(1468540800, '', 'Pedro', 1468587000, 'Partida', '', 'Killeen', 'Dom Pedro Golf, Vilamoura', 'Faro aeroport', '', '2', '', '', '', 'Direto', '17', 8880, '', 'Fechado', '', '3.74', '0', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1476921600, 'vgspedro@gmail.com', '', 1476974520, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/5808bbe6 | MTR | OBS: -/-', 'Direto', '0', 16744, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 13:43:18', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808bbe6', '8969638526', 'LX', 1, 0, 9000),
(1477267200, '', 'Luis', 1477326600, 'Partida', 'FV-128', 'John Phelps', 'Albufeira ', 'Lisboa Aeroporto', '', '3', '2', '2', 'Cadeira Bebe 2x ', 'Direto', '', 8884, '', 'Fechado', '41', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'AA7812', '0', '', '', 0, 0, 1800),
(1475366400, '', 'Carlos Costa', 1475385300, 'Partida', '', 'Margaret Tomas, Mary Odriscoll, Nora Keohane, Patrcia Hyde', 'Ondamar Albufeira', 'Faro aeroport', '', '4', '', '', '', 'Hotel Fixo', '21', 8885, '', 'Fechado', '', '1.26', '0', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475366400, '', 'JoÃ£o Pedro', 1475385300, 'Partida', '', 'Judith Payne', 'Ondamar Albufeira', 'Faro aeroport', '', '6', '', '', '', 'Hotel Tabela', '', 8886, '', 'Fechado', '33.23', '1.79442', '3.323', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1477008000, 'vgspedro@gmail.com', 'Demo', 1477040460, 'Partida', 'cccc @ 13:01', 'Pedro', 'Albufeira - Salgados - fdfd', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/5808b281 | TB | OBS: eee', 'Site Transf.Banco', '0', 16743, '', 'Aguarda', '0', '0', '0', '2016-10-20 13:03:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808b281', '8969638526', 'AST', 1, 0, 3600),
(1468368000, '', 'Pedro', 1468447800, 'Chegada', 'Fr7032', 'Brenda Fennesh', 'Faro aeroporto', 'Alagoamar Albufeira', '', '3', '', '', 'confirmar hora retorno', 'Direto', '', 8894, '682', 'Fechado', '54', '11.88', '0', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1474502400, '', 'Fixo', 1474556400, 'Chegada', 'YU-4560', 'Vitor Manuel', 'Faro Aeroporto', 'Ferragudo, Algarve', '', '6', '', '', '', 'Direto', '', 8895, '', 'Aguarda', '46', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'AA7812', '0', '', '', 0, 0, 0),
(1476921600, 'vgspedro@gmail.com', '', 1476972120, 'Chegada', 'ei', 'Pedro', 'Faro Airport', 'Albufeira - Salgados - rua 5', '', '1', '0', '0', 'TEM RETORNO 162/5808b281 | TB | OBS: eee', 'Site Transf.Banco', '0.2', 16742, '', 'Aguarda', '0', '0', '0', '2016-10-20 13:03:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808b281', '8969638526', 'AST', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478437080, 'Interzone', '', 'Pedro', 'Alte - dsdsds', 'Aljezur', '', '1', '0', '0', 'RETORNO 163/5808b18d | TB | OBS: re', 'Site Transf.Banco', '0', 16741, '', 'Aguarda', '0', '0', '0', '2016-10-20 12:59:09', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808b18d', '8969638526', 'AST', 1, 0, 9000),
(1476662400, '', '', 1476701700, 'Chegada', 'To3426', 'Elisabeth D.', 'Faro Aeroporto', 'Albufeira', '', '2', '1', '1', '', 'Aoperador', '25', 8898, '11007', 'Rejeitado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 4200),
(1483920000, '', 'Demo', 1483964580, 'Partida', '', 'Elisabeth Duthie', 'S. Vicent T Albufeira Est St Eulalia', 'Faro aeroport', '', '2', '', '', '', 'Direto', '', 8899, '11008', 'Fechado', '10', '2.2', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1468281600, '', 'Pedro', 1468341000, 'Partida', '', 'Mr. Deen', 'Silchoro Albufeira', 'Faro aeroport', '', '1', '', '', '', 'Aoperador', '', 8900, '', 'Fechado', '27', '3.74', '10', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1474675200, '', 'Fixo', 1474714800, 'Interzone', '', 'Andrea ', 'Vale DÂ´Rei Carvoeiro', 'Albufeira', '', '2', '', '', '', 'OperadorPorPax', '20', 8903, '', 'Aguarda', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1476921600, 'vgspedro@gmail.com', '', 1476967740, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '1', '1', '163/5808a138 | TB | OBS: hg', 'Site Transf.Banco', '0.01', 16734, '', 'Aguarda', '0', '0', '0', '2016-10-20 11:49:28', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808a138', '8969638526', 'BEL', 1, 0, 9000),
(1468368000, '', 'Pedro', 1468438500, 'Chegada', 'Fr7418', 'Dale Nachreiner', 'Faro aeroporto', 'Quinta santo phunuirius rua dom joÃ£o III Lagos close to intermarch.', '', '2', '', '', 'marcar dia e hora retorno e informar', 'Direto', '', 8906, '', 'Fechado', '68', '14.96', '0', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1478390400, 'vgspedro@gmail.com', '', 1478436780, 'Interzone', '', 'Pedro', 'Alte - wewe wewe', 'Aljezur', '', '1', '0', '0', 'RETORNO 163/5808b097 | TB | OBS: vb', 'Site Transf.Banco', '0', 16739, '', 'Aguarda', '0', '0', '0', '2016-10-20 12:55:03', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808b097', '8969638526', 'LX', 1, 0, 9000),
(1475884800, '', 'Demo', 1475925900, 'Chegada', 'LH1162', 'Kuivalainen Anssi', 'Faro aeroporto', 'Praia Senhora da Rocha Porches', '', '2', '', '', 'marcar dia e hora retorno e informar', 'Hotel Percentagem', '', 8913, '', 'Fechado', '30', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476576000, 'vgspedro@gmail.com', '', 1476616740, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '3', '0', 'TEM RETORNO 160/57fe1d87 | MTR | OBS: teste pax', 'Direto', '0', 16481, '', 'Aguarda', '16', '0', '0', '2016-10-12 12:24:55', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe1d87', '963602608', 'PT', 1, 0, 4200),
(1476144000, '', 'Demo', 1476193500, 'Partida', 'Fr9948', 'Loise Moynihan', 'Estrada St. Eulalia Albufeira', 'Faro aeroport', '', '2', '1', '2', '', 'Hotel por Pessoa', '45', 8917, '', 'Aguarda', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1474675200, '', 'Fixo', 1474742400, 'Chegada', 'Fr5953', 'Jane Dean', 'Faro aeroporto', 'Sensimar', '', '2', '', '', '', 'OperadorPorPax', '22.50', 8918, '', 'Fechado', '', '3.075', '2', '0', 'Sim', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1474502400, '', 'Fixo', 1474542000, 'Partida', 'DY_3621', 'Manuel Jose', 'Guia Shopping', 'Faro Aeroporto', '', '4', '', '', 'Na loja Y', 'Direto', '', 8919, '', 'Aguarda', '29', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'AA7812', '0', '', '', 0, 0, 0),
(1471564800, 'vgspedro15@sapo.pt', 'Sara', 1471603080, 'Partida', '', 'ida volta info obs', 'Aqui', 'slide', 'pt ref', '3', '3', '3', '(RETORNO) teste do retorno', 'Direto', '', 9296, '', 'Aguarda', '', '58', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '88FF77', 'a5', '1234567890', 'PT', 1, 0, 0),
(1475539200, '', 'Carlos Costa', 1475568600, 'Chegada', 'Fr7032', 'Avtandil Gutsaev', 'Faro aeroporto', 'Praia Senhora da Rocha Porches Pestana Viking', '', '3', '1', '1', 'marcar dia e hora retorno e informar', 'Hotel Fixo', '', 8926, '686', 'Fechado', '49', '', '', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2700),
(1474675200, '', 'Carlos Costa', 1474707600, 'Partida', 'Fr3711', 'Valerie Baddeley', 'Faro aeroporto', 'Pedra dos Bicos', '', '2', '', '', 'confirmar hora retorno cliente pediu paulo', 'Hotel por Pessoa', '', 8927, '687', 'Fechado', '54', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1474329600, '', 'Suporte', 1474363800, 'Partida', '', 'Valerie Baddeley', 'Pedra dos Bicos', 'Faro aeroport', '', '2', '', '', '(RETORNO) Cliente alterou pick up das 07:00 para as 06:30 - Apanhar cliente perto da paragem de autocarro que fica perto do SPA e do infantÃ¡rio xxx 4564456 46654654456 sdvvesvsdvsd dvsvevdwve weefwfefew', 'DiretoXride', '', 8928, '687', 'Aguarda', '', '', '', '0', 'Sim', 'Sim', 'Sim', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1474675200, '', 'Luis', 1474705800, 'Partida', '', 'Lopez', 'Pedra dos Bicos', 'Faro aeroport', '', '2', '', '', '', 'Hotel Fixo', '22.50', 8929, '3000', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1474675200, '', 'Fixo', 1474734600, 'Retorno', '', 'Michael Lee', 'Golf Alamos', 'SÃ£o Rafael Suite Hotel', '', '2', '', '', '', 'DiretoXride', '', 8931, '', 'Aguarda', '60', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1468368000, '', 'Pedro', 1468404000, 'Partida', '', '', 'Sensimar ', 'Faro aeroport', '', '1', '', '', '', 'OperadorPerc', '45', 8949, '', 'Fechado', '', '8.91', '4.5', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1475539200, '', 'Carlos Costa', 1475582400, 'Interzone', '', 'Andy Carmen', 'Forte do Vale Albufeira', 'Almancil', '', '2', '2', '', '', 'Hotel por Pessoa', '', 8932, '', 'Fechado', '54', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2400),
(1478390400, 'vgspedro@gmail.com', '', 1478438700, 'Partida', '999-ss @ 13:25', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '5', '0', '0', 'RETORNO 162/57fe2e6b | MTR | OBS: -/-', 'Site Transf.Banco', '0', 16488, '', 'Aguarda', '0', '0', '0', '2016-10-12 13:36:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe2e6b', '963602608', 'PT', 1, 0, 3600),
(1470528000, 'vgspedro15@sapo.pt', 'Pedro', 1470564780, 'Partida', '', 'teste ida e volta COM BOS   RETOR', 'slide', 'ali', '', '3', '3', '3', 'TEM RETORNO: sert-   com 3 dc', 'Direto', '', 9294, '123', 'Aguarda', '', '96', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '123AA', '1234567890', 'PT', 1, 0, 0),
(1475366400, '', 'Carlos Costa', 1475409000, 'Chegada', 'Zb210', 'Benjamin Ward', 'Faro aeroporto', 'Epic Sana Albufeira', '', '2', '', '1', 'BÃ©be com 7 meses', 'Hotel Fixo', '', 8934, '', 'Fechado', '60', '13.2', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476144000, '', 'Luis', 1476189000, 'Partida', 'Zb213', 'Benjamin Ward', 'Epic Sana Albufeira', 'Faro aeroport', '', '2', '', '1', 'BÃ©be com 7 meses', 'Hotel Percentagem', '45', 8935, '', 'Aguarda', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475452800, '', 'JoÃ£o Pedro', 1475492100, 'Chegada', 'Fr2658', 'Jorge', 'Faro aeroporto', 'Vale de Parra', '', '2', '', '', 'marcar dia e hora retorno e informar', 'OperadorPerc', '', 8941, '', 'Fechado', '27', '3', '2.7', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2700),
(1476662400, '', 'Sara', 1476723600, 'Partida', '', '', 'Forte do Vale Albufeira', 'Faro aeroport', '', '', '', '', '', 'DiretoXride', '22.50', 8944, '10004', 'Aceite', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1477094400, '', 'Sara', 1477151100, 'Chegada', 'Lh1799', 'JoÃ£o Fernandes', 'Faro aeroporto', 'Caminho da Fonte do Lume O LÂ´orangerie Vilamoura', '', '2', '', '', '', 'Tabela99', '', 8946, '', 'Aguarda', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1475539200, '', 'Nuno Moreira', 1475574300, 'Chegada', 'Fr5452', 'Almerinda Soares', 'Faro aeroporto', 'Luna Olympus Vilamoura', '', '4', '', '', 'confirmar hora de retorno', 'Hotel Tabela', '', 8947, '', 'Fechado', '50', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3300),
(1474588800, '', 'Fixo', 1474624800, 'Interzone', '', '', 'Vale DÂ´Rei Carvoeiro', 'Aqua Shoping  PortimÃ£o', '', '2', '', '', '(RETORNO) Cliente alterou pick up das 07:00 para as 06:30 - Apanhar cliente perto da paragem de autocarro que fica perto do SPA e do infantÃ¡rio xxx 4564456 46654654456 sdvvesvsdvsd dvsvevdwve weefwfefe', 'DiretoXride', '15', 8950, '', 'Aguarda', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1800),
(1475539200, '', 'JoÃ£o Pedro', 1475576700, 'Chegada', 'Fr4088', 'Andrew Hardacre', 'Faro aeroporto', 'Vila Gale Ampalius', '', '3', '1', '', 'confirmar hora de retorno para as 13:30pm', 'Hotel Percentagem', '', 8951, '', 'Fechado', '50', '2.25', '5', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1468540800, '', 'Pedro', 1468587600, 'Partida', '', 'Andrew Hardacre', 'Vila Gale Ampalius', 'Faro aeroport', '', '3', '1', '', '', 'Direto', '', 8952, '', 'Fechado', '12.99', '2.8578', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '1', '160/5800f649 | TB | OBS: g', 'Site Transf.Banco', '0', 16624, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:14:17', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f649', '963602608', 'PT', 1, 0, 4200),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '1', '160/5800f6c1 | TB | OBS: g', 'Site Transf.Banco', '0', 16625, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:16:17', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f6c1', '963602608', 'PT', 1, 0, 4200),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '1', '160/5800f7d0 | TB | OBS: g', 'Site Transf.Banco', '0.01', 16626, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:20:48', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f7d0', '963602608', 'PT', 1, 0, 4200),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '1', '160/5800f809 | PP | OBS: g', 'Site Paypal', '0.01', 16627, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:21:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f809', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476538140, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', '160/5800ed52 | TB | OBS: sdds', 'Site Transf.Banco', '0.02', 16616, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:36:02', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800ed52', '963602608', 'PT', 1, 0, 4200),
(1475798400, '', 'Nuno Moreira', 1475844840, 'Interzone', '', '', '', '', '', '', '', '', '', 'A definir', '45', 8964, '', 'Fechado', '', '', '', '0', '', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1474502400, '', 'Fixo', 1474538400, 'Golf', '', 'Carla Fernandes', 'Albufeira ', 'Golf Penina', '', '2', '', '', '', 'OperadorPerc', '52', 8967, '', 'Aguarda', '', '', '', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'AA7812', '0', '', '', 0, 0, 0),
(1484870400, '', 'Pedro', 1484877600, 'Parques TemÃ¡ticos', 'teste', 'teste', 'aqui', 'ali', '', '2', '2', '2', '', 'Aoperador', '145.85', 8971, '', 'Fechado', '', '29.887', '10', '0', '', '', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 0),
(1475366400, '', 'Carlos Costa', 1475422200, 'Golf', 't1', 'Mr.Frykholm', 'Forte do Vale Albufeira', '37.091535,-8.222971', '', '3', '3', '3', '', 'Hotel Tabela', '', 8972, '', 'Fechado', '8.96', '0.48384', '0.896', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475366400, '', 'JoÃ£o Pedro', 1475422380, 'Parques TemÃ¡ticos', '', 'Mr.Frykholm', 'Forte do Vale Albufeira', 'Albufeira', '', '2', '2', '2', '', 'Hotel por Pessoa', '14.25', 8973, '', 'Fechado', '', '3.135', '0', '0', 'NÃ£o', '', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1475452800, '', 'Carlos Costa', 1475492820, 'Golf', '', 'Mr.Frykholm', 'Albufeira', 'Eden Resort Albufeira', '', '4', '', '', '', 'Hotel Fixo', '50', 8975, '', 'Fechado', '', '11', '0', '0', 'Sim', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 3000),
(1476489600, 'vgspedro@gmail.com', '', 1476541740, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '1', '1', '163/5800f9e0 | TB | OBS: -/-', 'Site Transf.Banco', '0.02', 16634, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:29:36', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800f9e0', '963602608', 'PT', 1, 0, 9000),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '1', '160/5800f984 | MTR | OBS: g', 'Direto', '0', 16633, '', 'Aguarda', '0.01', '0', '0', '2016-10-14 16:28:04', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f984', '963602608', 'PT', 1, 0, 4200),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '1', '160/5800f95e | PP | OBS: g', 'Site Paypal', '0.01', 16632, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:27:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f95e', '963602608', 'PT', 1, 0, 4200),
(1476230400, '', 'Luis', 1476302400, 'Turismo', '', 'James Harlow', 'Epic Sana Albufeira', 'Estrada St. Eulalia Albufeira', '', '1', '2', '', 'Rty', 'Aoperador', '12.66', 8987, 'Rt456', 'Aguarda', '', '0.1596', '10', '0', '', '', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1476489600, 'vgspedro@gmail.com', '', 1476536220, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/5800e812 | PP | OBS: ocs teste ', 'Site Paypal', '0.017', 16603, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:13:38', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e812', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 14:57', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/5800e812 | PP | OBS: ocs teste ', 'Site Paypal', '0', 16604, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:13:38', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e812', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476536220, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/5800e88c | MTR | OBS: ocs teste ', 'Direto', '0', 16605, '', 'Aguarda', '0.017', '0', '0', '2016-10-14 15:15:40', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e88c', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 14:57', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/5800e88c | MTR | OBS: ocs teste ', 'Direto', '0', 16606, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:15:40', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e88c', '963602608', 'PT', 1, 0, 4200),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '1', '160/5800f82f | MTR | OBS: g', 'Direto', '0', 16628, '', 'Aguarda', '0.01', '0', '0', '2016-10-14 16:22:23', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f82f', '963602608', 'PT', 1, 0, 4200),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '1', '160/5800f86e | PP | OBS: g', 'Site Paypal', '0.01', 16629, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:23:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f86e', '963602608', 'PT', 1, 0, 4200),
(1476921600, 'vgspedro@gmail.com', '', 1476967920, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '1', '1', '163/5808a21e | MTR | OBS: qw', 'Direto', '0', 16735, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:53:18', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808a21e', '8969638526', 'AUS', 1, 0, 9000),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Faro Airport - Rua cirurgiao 28', 'Ayamonte - Spain', '', '1', '2', '1', '160/5800f144 | TB | OBS: g', 'Site Transf.Banco', '0', 16620, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:52:52', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f144', '963602608', 'PT', 1, 0, 4200),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Ayamonte - Spain', '', '1', '2', '1', '160/5800f267 | TB | OBS: g', 'Site Transf.Banco', '0', 16621, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:57:43', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f267', '963602608', 'PT', 1, 0, 4200),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '1', '160/5800f2c2 | TB | OBS: g', 'Site Transf.Banco', '0', 16622, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:59:14', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f2c2', '963602608', 'PT', 1, 0, 4200),
(1476576000, 'vgspedro@gmail.com', '', 1476619200, 'Partida', '999-ss @ 14:52', 'pedro', 'Faro Airport - Rua cirurgiao 28', 'Ayamonte - Spain', '', '1', '2', '1', '160/5800f5e2 | TB | OBS: g', 'Site Transf.Banco', '0', 16623, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:12:34', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800f5e2', '963602608', 'PT', 1, 0, 4200),
(1483920000, '', 'Pedro', 1484006340, 'Golf', '', '', '', '', '', '', '', '', '', 'Aoperador', '', 9034, '', 'Fechado', '2', '-1.76', '10', '0', '', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 0),
(1476489600, 'vgspedro@gmail.com', '', 1476538140, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', '160/5800edbf | MTR | OBS: sdds', 'Direto', '0', 16619, '', 'Aguarda', '0.02', '0', '0', '2016-10-14 15:37:51', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800edbf', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'camiloccferreira@gmail.com', '', 1476527100, 'Partida', 'Fg 147 @ 14:35', 'Manuel', 'Faro Airport - Rua da paz', 'Ayamonte - Spain', '', '4', '0', '0', '160/5800ed55 | TB | OBS: Teste', 'Site Transf.Banco', '0', 16617, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:36:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800ed55', '914017738', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476538140, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', '160/5800ed84 | PP | OBS: sdds', 'Site Paypal', '0.02', 16618, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:36:52', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800ed84', '963602608', 'PT', 1, 0, 4200),
(1477612800, 'vgspedro@gmail.com', '', 1477675680, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - ali', '', '1', '0', '0', '163/58135295 | PP | OBS: sd', 'Site Paypal', '104.8', 16792, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:28:53', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58135295', '968527412', 'BEL', 1, 0, 9000),
(1477612800, 'vgspedro@gmail.com', 'Demo', 1477658820, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '1', '1', '163/5808a0c4 | TB | OBS: d', 'Site Transf.Banco', '0.01', 16733, '', 'Aguarda', '0', '0', '0', '2016-10-20 11:47:32', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808a0c4', '8969638526', 'AUS', 1, 0, 9000),
(1479168000, 'vgspedro@gmail.com', 'Demo', 1479251160, 'Partida', 'V2 @ 23:06', 'Pedro', 'Tunes - Ali', 'Faro Airport', '', '1', '0', '0', 'RETORNO 169/57fd62b1 | MTR | OBS: -/-', 'Site Transf.Banco', '0', 16476, '', 'Aguarda', '0', '0', '0', '2016-10-11 23:07:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '54CZ90', '169/57fd62b1', '963852147', 'PT', 1, 0, 1800),
(1476316800, 'vgspedro@gmail.com', '', 1476375060, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '1', '4', '0', 'TEM RETORNO 169/57fe6ee8 | MTR | OBS: -/-', 'Direto', '0', 16540, '', 'Aguarda', '470', '0', '0', '2016-10-12 18:12:08', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe6ee8', '963602608', 'PT', 1, 0, 1800),
(1478390400, 'vgspedro@gmail.com', '', 1478446920, 'Partida', '999-ss @ 18:12', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '1', '4', '0', 'RETORNO 169/57fe6ee8 | MTR | OBS: -/-', 'Direto', '0', 16541, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:12:08', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe6ee8', '963602608', 'PT', 1, 0, 1800),
(1476316800, 'vgspedro@gmail.com', '', 1476376140, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '2', '0', 'TEM RETORNO 162/57fe7348 | TB | OBS: f', 'Site Transf.Banco', '40', 16542, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:30:48', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe7348', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478446080, 'Partida', '999-ss @ 18:28', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '0', 'RETORNO 162/57fe7348 | TB | OBS: f', 'Site Transf.Banco', '0', 16543, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:30:48', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe7348', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', '', 1476376500, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fe7481 | PP | OBS: f', 'Site Paypal', '40', 16544, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:36:01', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe7481', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478446440, 'Partida', '999-ss @ 18:34', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fe7481 | PP | OBS: f', 'Site Paypal', '0', 16545, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:36:01', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe7481', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', '', 1476376740, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/57fe754c | PP | OBS: a', 'Site Paypal', '16', 16546, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:39:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe754c', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478446080, 'Partida', '999-ss @ 18:38', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/57fe754c | PP | OBS: a', 'Site Paypal', '0', 16547, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:39:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe754c', '963602608', 'PT', 1, 0, 4200),
(1476316800, 'vgspedro@gmail.com', '', 1476377640, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 169/57fe78df | PP | OBS: e', 'Site Paypal', '246', 16548, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:54:39', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe78df', '963602608', 'PT', 1, 0, 1800),
(1478390400, 'vgspedro@gmail.com', '', 1478449500, 'Partida', '999-ss @ 18:55', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 169/57fe78df | PP | OBS: e', 'Site Paypal', '0', 16549, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:54:39', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe78df', '963602608', 'PT', 1, 0, 1800),
(1476316800, 'vgspedro@gmail.com', '', 1476378180, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Olhos de Agua - Rua cirurgiao 28', '', '1', '2', '0', 'TEM RETORNO 172/57fe7b00 | PP | OBS: w', 'Site Paypal', '50', 16550, '', 'Aguarda', '0', '0', '0', '2016-10-12 19:03:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '172/57fe7b00', '963602608', 'PT', 1, 0, 2700),
(1478390400, 'vgspedro@gmail.com', '', 1478449020, 'Partida', '999-ss @ 19:02', 'pedro', 'Albufeira - Olhos de Agua - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '0', 'RETORNO 172/57fe7b00 | PP | OBS: w', 'Site Paypal', '0', 16551, '', 'Aguarda', '0', '0', '0', '2016-10-12 19:03:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '172/57fe7b00', '963602608', 'PT', 1, 0, 2700),
(1476316800, 'vgspedro@gmail.com', '', 1476378300, 'Chegada', 'V1', 'Pedro', 'Faro Airport', 'Albufeira - Olhos de Agua - Aqui', '', '1', '0', '0', 'TEM RETORNO 172/57fe7ba0 | PP | OBS: -/-', 'Site Paypal', '50', 16552, '', 'Aguarda', '0', '0', '0', '2016-10-12 19:06:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '172/57fe7ba0', '963852147', 'PT', 1, 0, 2700),
(1478390400, 'vgspedro@gmail.com', '', 1478449200, 'Partida', 'V2 @ 19:05', 'Pedro', 'Albufeira - Olhos de Agua - Ali', 'Faro Airport', '', '1', '0', '0', 'RETORNO 172/57fe7ba0 | PP | OBS: -/-', 'Site Paypal', '0', 16553, '', 'Aguarda', '0', '0', '0', '2016-10-12 19:06:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '172/57fe7ba0', '963852147', 'PT', 1, 0, 2700),
(1476316800, 'vgspedro@gmail.com', '', 1476378720, 'Chegada', 'V1', 'Pedro', 'Faro Airport', 'Ayamonte - Spain - Aqui', '', '1', '0', '0', 'TEM RETORNO 160/57fe7d44 | PP | OBS: -/-', 'Site Paypal', '16', 16554, '', 'Aguarda', '0', '0', '0', '2016-10-12 19:13:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe7d44', '963852147', 'HL', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478448120, 'Partida', 'V2 @ 19:12', 'Pedro', 'Ayamonte - Spain - Ali', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/57fe7d44 | PP | OBS: -/-', 'Site Paypal', '0', 16555, '', 'Aguarda', '0', '0', '0', '2016-10-12 19:13:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe7d44', '963852147', 'HL', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476536220, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/5800e8f8 | TB | OBS: ocs teste ', 'Site Transf.Banco', '0.017', 16607, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:17:28', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e8f8', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 14:57', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/5800e8f8 | TB | OBS: ocs teste ', 'Site Transf.Banco', '0', 16608, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:17:28', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e8f8', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476536220, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/5800e944 | PP | OBS: ocs teste ', 'Site Paypal', '0.017', 16609, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:18:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e944', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 14:57', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/5800e944 | PP | OBS: ocs teste ', 'Site Paypal', '0', 16610, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:18:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e944', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476536220, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/5800e988 | MTR | OBS: ocs teste ', 'Direto', '0', 16611, '', 'Aguarda', '0.017', '0', '0', '2016-10-14 15:19:52', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e988', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 14:57', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/5800e988 | MTR | OBS: ocs teste ', 'Direto', '0', 16612, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:19:52', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e988', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476537660, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', '160/5800ea22 | TB | OBS: obs - - ', 'Site Transf.Banco', '0.017', 16613, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:22:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800ea22', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476538140, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', '160/5800ebf6 | PP | OBS: sdds', 'Site Paypal', '0.02', 16614, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:30:14', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800ebf6', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476538140, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', '160/5800ec54 | MTR | OBS: sdds', 'Direto', '0', 16615, '', 'Aguarda', '0.02', '0', '0', '2016-10-14 15:31:48', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800ec54', '963602608', 'PT', 1, 0, 4200),
(1476489600, '', 'Luis', 1476546120, 'Partida', 'voo-1231', 'William Farrington', 'Albufeira', 'Faro Airport', '', '4', '', '', 'Pagamento:Ao Motorista -> Email:vgspedro@gmail.com -> Telefone:123466789 -> Obs:nada a declarar', 'Direto', '0', 9080, '', 'Aguarda', '22.80', '5.016', '0', '2147483647', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1476316800, 'vgspedro@gmail.com', '', 1476380580, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '1', '0', 'TEM RETORNO 160/57fe685c | TB | OBS: c', 'Site Transf.Banco', '16', 16528, '', 'Aguarda', '0', '0', '0', '2016-10-12 17:44:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe685c', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478442720, 'Partida', '999-ss @ 17:42', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '1', '0', 'RETORNO 160/57fe685c | TB | OBS: c', 'Site Transf.Banco', '0', 16529, '', 'Aguarda', '0', '0', '0', '2016-10-12 17:44:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe685c', '963602608', 'PT', 1, 0, 4200),
(1476316800, 'vgspedro@gmail.com', '', 1476366420, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fe69a2 | TB | OBS: -/-', 'Site Transf.Banco', '40', 16530, '', 'Aguarda', '0', '0', '0', '2016-10-12 17:49:38', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe69a2', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478443560, 'Partida', '999-ss @ 17:46', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fe69a2 | TB | OBS: -/-', 'Site Transf.Banco', '0', 16531, '', 'Aguarda', '0', '0', '0', '2016-10-12 17:49:38', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe69a2', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', '', 1476385020, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 169/57fe6b90 | PP | OBS: d', 'Site Paypal', '246', 16532, '', 'Aguarda', '0', '0', '0', '2016-10-12 17:57:52', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe6b90', '963602608', 'PT', 1, 0, 3000),
(1478390400, 'vgspedro@gmail.com', '', 1478445960, 'Partida', '999-ss @ 17:56', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 169/57fe6b90 | PP | OBS: d', 'Site Paypal', '0', 16533, '', 'Aguarda', '0', '0', '0', '2016-10-12 17:57:52', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe6b90', '963602608', 'PT', 1, 0, 1800),
(1476316800, 'vgspedro@gmail.com', '', 1476374580, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fe6d02 | TB | OBS: z', 'Site Transf.Banco', '40', 16534, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:04:02', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe6d02', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478444640, 'Partida', '999-ss @ 18:04', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fe6d02 | TB | OBS: z', 'Site Transf.Banco', '0', 16535, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:04:02', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe6d02', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', 'Nuno Moreira', 1476374880, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Olhos de Agua - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 172/57fe6e1b | TB | OBS: F', 'Site Transf.Banco', '50', 16536, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:08:43', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '172/57fe6e1b', '963602608', 'PT', 1, 0, 2700),
(1478390400, 'vgspedro@gmail.com', '', 1478445840, 'Partida', '999-ss @ 18:09', 'pedro', 'Albufeira - Olhos de Agua - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 172/57fe6e1b | TB | OBS: F', 'Site Transf.Banco', '0', 16537, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:08:43', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '172/57fe6e1b', '963602608', 'PT', 1, 0, 2700),
(1476316800, 'vgspedro@gmail.com', '', 1476375000, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/57fe6e80 | PP | OBS: X', 'Site Paypal', '16', 16538, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:10:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe6e80', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478444460, 'Partida', '999-ss @ 18:11', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/57fe6e80 | PP | OBS: X', 'Site Paypal', '0', 16539, '', 'Aguarda', '0', '0', '0', '2016-10-12 18:10:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe6e80', '963602608', 'PT', 1, 0, 4200),
(1476489600, '', 'Pedro', 1476546120, 'Partida', 'voo-1231', 'William Farrington', 'Albufeira', 'Faro Airport', '', '4', '', '', 'Pagamento:Ao Motorista -> Email:vgspedro@gmail.com -> Telefone:123466789 -> Obs:nada a declarar', 'Direto', '0', 9094, '', 'Aguarda', '22.80', '5.016', '0', '2147483647', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1482192000, 'vgspedro@gmail.com', 'Demo', 1482256860, 'Chegada', '999-ss @ 17:01', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fe5e84 | TB | OBS: e', 'Site Transf.Banco', '0', 16527, '', 'Aceite', '0', '0', '0', '2016-10-12 17:02:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '37ET58', '162/57fe5e84', '963602608', 'PT', 1, 0, 3600),
(1476489600, '', 'Nuno Moreira', 1476546120, 'Partida', 'voo-1231', 'William Farrington', 'Albufeira', 'Faro Airport', '', '4', '', '', 'Pagamento:Ao Motorista -> Email:vgspedro@gmail.com -> Telefone:123466789 -> Obs:nada a declarar', 'Direto', '0', 9096, '', 'Aguarda', '22.80', '5.016', '0', '2147483647', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1478390400, 'vgspedro@gmail.com', '', 1478448060, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fe5e84 | TB | OBS: e', 'Site Transf.Banco', '40', 16526, '', 'Aguarda', '0', '0', '0', '2016-10-12 17:02:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe5e84', '963602608', 'PT', 1, 0, 3600),
(1476489600, '', 'Sara', 1476546120, 'Partida', 'voo-1231', 'William Farrington', 'Albufeira', 'Faro Airport', '', '4', '', '', 'Pagamento:Ao Motorista -> Email:vgspedro@gmail.com -> Telefone:123466789 -> Obs:nada a declarar', 'Direto', '33', 9098, '', 'Fechado', '', '7.26', '0', '2147483647', 'Sim', 'NÃ£o', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 16:03', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '2', '0', '0', 'RETORNO 162/57fe50ec | TB | OBS: ee', 'Site Transf.Banco', '0', 16515, '', 'Aguarda', '0', '0', '0', '2016-10-12 16:04:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe50ec', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', '', 1476367500, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fe514b | TB | OBS: erw', 'Site Transf.Banco', '40', 16516, '', 'Aguarda', '0', '0', '0', '2016-10-12 16:05:47', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe514b', '963602608', 'PT', 1, 0, 5400);
INSERT INTO `excel` (`data_servico`, `email`, `staff`, `hrs`, `servico`, `voo`, `nome_cl`, `local_recolha`, `local_entrega`, `ponto_referencia`, `px`, `cr`, `bebe`, `obs`, `operador`, `cobrar_operador`, `id`, `ticket`, `estado`, `cobrar_direto`, `cmx_st`, `cmx_op`, `data_criacao`, `rec_ope`, `rec_staf`, `pag_ope`, `pag_staf`, `matricula`, `referencia`, `telefone`, `pais`, `criado_direto`, `nid`, `end`) VALUES
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 16:06', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fe514b | TB | OBS: erw', 'Site Transf.Banco', '0', 16517, '', 'Aguarda', '0', '0', '0', '2016-10-12 16:05:47', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe514b', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', 'Luis', 1476369540, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 169/57fe5a81 | TB | OBS: e', 'Site Transf.Banco', '246', 16518, '', 'Aguarda', '0', '0', '0', '2016-10-12 16:45:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe5a81', '963602608', 'PT', 1, 0, 1800),
(1478390400, 'vgspedro@gmail.com', '', 1478426940, 'Partida', '999-ss @ 16:39', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 169/57fe5a81 | TB | OBS: e', 'Site Transf.Banco', '0', 16519, '', 'Aguarda', '0', '0', '0', '2016-10-12 16:45:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe5a81', '963602608', 'PT', 1, 0, 1800),
(1476316800, 'vgspedro@gmail.com', 'Demo', 1476370080, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 169/57fe5b54 | TB | OBS: fdfdfd', 'Site Transf.Banco', '246', 16520, '', 'Iniciado', '0', '0', '0', '2016-10-12 16:48:36', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe5b54', '963602608', 'PT', 1, 0, 1800),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 16:42', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 169/57fe5b54 | TB | OBS: fdfdfd', 'Site Transf.Banco', '0', 16521, '', 'Aguarda', '0', '0', '0', '2016-10-12 16:48:36', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe5b54', '963602608', 'PT', 1, 0, 1800),
(1476316800, 'vgspedro@gmail.com', 'Pedro', 1476370500, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '1', '0', 'TEM RETORNO 162/57fe5cf2 | TB | OBS: x', 'Site Transf.Banco', '40', 16522, '', 'Aguarda', '0', '0', '0', '2016-10-12 16:55:30', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe5cf2', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478440440, 'Partida', '999-ss @ 16:54', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '1', '0', 'RETORNO 162/57fe5cf2 | TB | OBS: x', 'Site Transf.Banco', '0', 16523, '', 'Aguarda', '0', '0', '0', '2016-10-12 16:55:30', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe5cf2', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', '', 1476381540, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/57fe5e01 | TB | OBS: f', 'Site Transf.Banco', '14.4', 16524, '', 'Aguarda', '0', '0', '0', '2016-10-12 17:00:01', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe5e01', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478440080, 'Partida', '999-ss @ 16:58', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/57fe5e01 | TB | OBS: f', 'Site Transf.Banco', '0', 16525, '', 'Aguarda', '0', '0', '0', '2016-10-12 17:00:02', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe5e01', '963602608', 'PT', 1, 0, 4200),
(1477612800, 'vgspedro@gmail.com', '', 1477664760, 'Partida', '12we @ 18:26', 'pedro', 'Albufeira - Salgados - -/-', 'Faro Airport', '', '1', '0', '0', '162/58135243 | PP | OBS: xc', 'Site Paypal', '20.96', 16791, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:27:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58135243', '968527412', 'AUS', 1, 0, 3600),
(1477612800, 'vgspedro@gmail.com', '', 1477662780, 'Partida', '12we @ 17:53', 'pedro', 'Albufeira - Salgados - aqqiu', 'Faro Airport', '', '1', '0', '0', '162/58134a8f | PP | OBS: -/-', 'Site Paypal', '20.96', 16783, '', 'Aguarda', '0', '0', '0', '2016-10-28 13:54:39', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58134a8f', '968527412', 'BEL', 1, 0, 3600),
(1477612800, 'vgspedro@gmail.com', '', 1477673700, 'Chegada', 'ee', 'pedro', 'Faro Airport', 'Ayamonte - Spain - ali', '', '1', '0', '0', '160/58134c24 | PP | OBS: -/-', 'Site Paypal', '20.96', 16784, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:01:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58134c24', '968527412', 'BEL', 1, 0, 4200),
(1476921600, 'vgspedro@gmail.com', '', 1476967320, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089f85 | MTR | OBS: -/-', 'Direto', '0', 16730, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:42:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089f85', '8969638526', 'BUL', 1, 0, 9000),
(1476403200, '', 'Demo', 1476475200, 'Transfer', '', 'William Farrington', 'Pedra dos Bicos', 'Albufeira', '', '2', '', '', '', 'Aoperador', '', 9224, '', 'Aguarda', '23', '2.86', '10', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1477612800, 'vgspedro@gmail.com', '', 1477675200, 'Chegada', 'ee', 'pedro', 'Faro Airport', 'Ayamonte - Spain - ali', '', '1', '0', '0', '160/58135105 | PP | OBS: sd', 'Site Paypal', '20.96', 16790, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:22:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58135105', '968527412', 'BEL', 1, 0, 4200),
(1477612800, 'vgspedro@gmail.com', '', 1477674120, 'Chegada', 'ee', 'pedro', 'Faro Airport', 'Ayamonte - Spain - ali', '', '1', '0', '0', '160/58134c76 | PP | OBS: -/-', 'Site Paypal', '20.96', 16785, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:02:46', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58134c76', '968527412', 'BUL', 1, 0, 4200),
(1476921600, 'vgspedro@gmail.com', '', 1476967200, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '0', '0', '163/58089f16 | MTR | OBS: re', 'Direto', '0', 16729, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:40:22', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089f16', '8969638526', 'AUS', 1, 0, 9000),
(1477612800, 'vgspedro@gmail.com', 'Pedro', 1477658160, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089e3a | MTR | OBS: -/-', 'Direto', '0', 16726, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:36:42', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', '', '163/58089e3a', '8969638526', 'AUS', 1, 0, 9000),
(1476921600, 'vgspedro@gmail.com', '', 1476967020, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '0', '0', '163/58089e79 | MTR | OBS: re', 'Direto', '0', 16727, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:37:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089e79', '8969638526', 'BUL', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478430600, 'Chegada', '12we @ 14:10', 'pedro', 'Faro Airport - -/-', 'Albufeira - Salgados', '', '1', '0', '0', 'RETORNO 162/58134fd5 | PP | OBS: -/-', 'Site Paypal', '0', 16789, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:17:09', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58134fd5', '968527412', 'AST', 1, 0, 3600),
(1477612800, 'vgspedro@gmail.com', 'Nuno Moreira', 1477654500, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '0', '0', '163/58089e11 | MTR | OBS: fd', 'Direto', '0', 16725, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:36:01', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089e11', '8969638526', 'AUS', 1, 0, 9000),
(1476921600, 'vgspedro@gmail.com', '', 1476966900, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089de4 | MTR | OBS: 1', 'Direto', '0', 16724, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:35:16', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089de4', '8969638526', 'AUS', 1, 0, 9000),
(1476921600, 'vgspedro@gmail.com', '', 1476966780, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089d81 | MTR | OBS: re', 'Direto', '0', 16723, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:33:37', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089d81', '8969638526', 'BEL', 1, 0, 9000),
(1477526400, 'vgspedro@gmail.com', 'Luis', 1477571460, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '0', '0', '163/58089d0a | MTR | OBS: er', 'Direto', '0', 16722, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:31:38', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089d0a', '8969638526', 'AUS', 1, 0, 9000),
(1476921600, 'vgspedro@gmail.com', '', 1476966540, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089c9a | MTR | OBS: gf', 'Direto', '0', 16721, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:29:46', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089c9a', '8969638526', 'NRG', 1, 0, 9000),
(1477526400, 'vgspedro@gmail.com', 'Nuno Moreira', 1477571280, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089c4a | MTR | OBS: -/-', 'Direto', '0', 16720, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:28:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089c4a', '8969638526', 'BUL', 1, 0, 9000),
(1476921600, 'vgspedro@gmail.com', '', 1476966300, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089bb1 | MTR | OBS: fd', 'Direto', '0', 16718, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:25:53', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089bb1', '8969638526', 'DE', 1, 0, 9000),
(1477526400, 'vgspedro@gmail.com', 'Nuno Moreira', 1477571160, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089bf0 | MTR | OBS: vb', 'Direto', '0', 16719, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:26:56', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089bf0', '8969638526', 'BR', 1, 0, 9000),
(1477526400, 'vgspedro@gmail.com', 'JoÃ£o Pedro', 1477570920, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089b01 | MTR | OBS: wew', 'Direto', '0', 16717, '', 'Aceite', '0.01', '0', '0', '2016-10-20 11:22:57', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089b01', '8969638526', 'AST', 1, 0, 9000),
(1477526400, 'vgspedro@gmail.com', 'Pedro', 1477570920, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089ad2 | MTR | OBS: wew', 'Direto', '0', 16716, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:22:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089ad2', '8969638526', 'AST', 1, 0, 9000),
(1477526400, 'vgspedro@gmail.com', 'Luis', 1477570680, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '0', '0', '163/58089a20 | MTR | OBS: sa', 'Direto', '0', 16715, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:19:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089a20', '8969638526', 'BUL', 1, 0, 9000),
(1477526400, 'vgspedro@gmail.com', 'Pedro', 1477570500, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089969 | MTR | OBS: e', 'Direto', '0', 16713, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:16:09', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '163/58089969', '8969638526', 'DE', 1, 0, 9000),
(1477526400, 'vgspedro@gmail.com', 'Sara', 1477570620, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '0', '0', '163/580899af | MTR | OBS: re', 'Direto', '0', 16714, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:17:19', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '163/580899af', '8969638526', 'BR', 1, 0, 9000),
(1477526400, 'vgspedro@gmail.com', 'Demo', 1477570320, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/580898bf | MTR | OBS: -/-', 'Direto', '0', 16712, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:13:19', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '163/580898bf', '8969638526', 'PT', 1, 0, 9000),
(1477526400, 'vgspedro@gmail.com', 'Demo', 1477570260, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '0', '0', 'TEM RETORNO 163/58089849 | MTR | OBS: -/-', 'Direto', '0', 16710, '', 'Aguarda', '12', '0', '0', '2016-10-20 11:11:21', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '163/58089849', '8969638526', 'PT', 1, 0, 9000),
(1477612800, 'vgspedro@gmail.com', 'Demo', 1477649400, 'Interzone', '', 'Pedro', 'Alte - wewe wewe', 'Aljezur', '', '1', '0', '0', 'RETORNO 163/58089849 | MTR | OBS: -/-', 'Direto', '0', 16711, '', 'Aguarda', '0', '0', '0', '2016-10-20 11:11:21', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089849', '8969638526', 'PT', 1, 0, 9000),
(1476662400, 'charles@gmail.com', 'Sara', 1476716400, 'Chegada', 'Ils4885', 'Mr Charles', 'Faro Airport-aeroporto', 'Albufeira - Montechoro-rua dos telemoveis', 'rotunda do globo', '2', '0', '0', '', 'Hotel Fixo', '', 16708, '', 'Fechado', '45', '4', '5', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '968855634', 'Turquia', 1, 0, 2400),
(1478390400, 'vgspedro@gmail.com', '', 1478451660, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/580103c5 | TB | OBS: trhgtrt ', 'Site Transf.Banco', '0', 16659, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:11:49', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/580103c5', '963602608', 'PT', 1, 0, 9000),
(1476662400, 'vgspedro15@sapo.pt', '', 1476698640, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - -/-', '', '1', '0', '0', '163/58035f16 | PP | OBS: -/-', 'Site Paypal', '0.01', 16707, '', 'Aguarda', '0', '0', '0', '2016-10-16 12:05:58', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58035f16', '963852147', '-/-', 1, 0, 9000),
(1476662400, 'vgspedro@gmail.com', '', 1476685620, 'Partida', 'Adfe @ 10:27', 'Pedro', 'Albufeira - Salgados - Ali', 'Faro Airport', '', '1', '0', '0', '162/58035659 | TB | OBS: -/-', 'Site Transf.Banco', '0.10', 16705, '', 'Aguarda', '0', '0', '0', '2016-10-16 11:28:41', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58035659', '963852147', '-/-', 1, 0, 3600),
(1476662400, 'patriciamlsilva@hotmail.com', 'Demo', 1476685380, 'Chegada', 'Ggggg @ 10:23', 'Pat', 'Albufeira - Salgados - -/-', 'Faro Airport', '', '1', '0', '0', '162/5803553e | TB | OBS: -/-', 'Site Transf.Banco', '0.10', 16704, '', 'Aguarda', '0', '0', '0', '2016-10-16 11:23:58', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5803553e', '888', '-/-', 1, 0, 3600),
(1478995200, '', 'Sara', 1479079200, 'Transfer', '', 'Manuel', 'PortimÃ£o-Inf.D.Henrique', 'Faro Aeroporto', '', '2', '3', '', '', 'DiretoXride', '', 9219, '', 'Fechado', '15', '3', '3', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '963963963', 'PT', 0, 0, 1800),
(1476403200, '', 'Sara', 1476452700, 'Parques TemÃ¡ticos', 'YZF-1234', 'Pedro', 'Faro Airport', 'Albufeira', 'morada esta ', '4', '', '', 'Provem: #9146 -> Pagamento:Trans.Bancaria -> Email:vgspedro@gmail.com -> Telefone:123123123 -> Obs:Hh', 'Direto', '0', 9147, '', 'Fechado', '22.80', '5.7', '0', '2147483647', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 4800),
(1477440000, 'patriciamlsilva@hotmail.com', '', 1477436400, 'Partida', 'Fgjjhggh @ 10:16', 'Tdtststd', 'Albufeira - Salgados - -/-', 'Faro Airport', '', '2', '0', '0', '162/580353dd | TB | OBS: -/-', 'Site Transf.Banco', '0.10', 16703, '', 'Aguarda', '0', '0', '0', '2016-10-16 11:18:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/580353dd', '95865', '-/-', 1, 0, 3600),
(1477612800, 'vgspedro@gmail.com', '', 1477674660, 'Partida', 'ee', 'pedro', 'Albufeira - Salgados', 'Faro Airport - ali', '', '1', '0', '0', 'TEM RETORNO 162/58134fd5 | PP | OBS: -/-', 'Site Paypal', '41.92', 16788, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:17:09', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58134fd5', '968527412', 'AST', 1, 0, 3600),
(1476576000, 'vgspedro@gmail.com', '', 1476627660, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - Aqui', '', '1', '0', '0', '163/5802498d | PP | OBS: -/-', 'Site Paypal', '0.01', 16702, '', 'Aguarda', '0', '0', '0', '2016-10-15 16:21:49', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5802498d', '963852147', 'DE', 1, 0, 9000),
(1476576000, 'vgspedro@gmail.com', '', 1476600180, 'Partida', 'V2 @ 10:53', 'Pedro', 'Ayamonte - Spain - Ali', 'Faro Airport', '', '1', '0', '0', '160/58020ae3 | PP | OBS: -/-', 'Site Paypal', '0.009', 16701, '', 'Aguarda', '0', '0', '0', '2016-10-15 11:54:27', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58020ae3', '963852147', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478476260, 'Chegada', 'V2 @ 11:51', 'Pedro', 'Faro Airport - Ali', 'Albufeira - Salgados', '', '1', '0', '0', 'RETORNO 162/58020a4b | PP | OBS: P', 'Site Paypal', '0', 16700, '', 'Aguarda', '0', '0', '0', '2016-10-15 11:51:55', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58020a4b', '963852147', 'PT', 1, 0, 3600),
(1476576000, 'vgspedro@gmail.com', '', 1476611400, 'Partida', 'V1', 'Pedro', 'Albufeira - Salgados', 'Faro Airport - Aqui', '', '1', '0', '0', 'TEM RETORNO 162/58020a4b | PP | OBS: P', 'Site Paypal', '0.2', 16699, '', 'Aguarda', '0', '0', '0', '2016-10-15 11:51:55', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58020a4b', '963852147', 'PT', 1, 0, 3600),
(1476489600, 'kndas@nd.com', '', 1476565740, 'Partida', '123 @ 00:54', 'pULO', 'Alte - -/-', 'Faro Airport', '', '1', '0', '0', '177/58017ea4 | PP | OBS: -/-', 'Site Paypal', '36', 16698, '', 'Aguarda', '0', '0', '0', '2016-10-15 01:56:04', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '177/58017ea4', '912393845', '-/-', 1, 0, 2700),
(1478390400, 'vgspedro@gmail.com', '', 1478440740, 'Chegada', 'V2 @ 17:00', 'Pedro', 'Faro Airport - Ali', 'Albufeira - Salgados', '', '1', '0', '0', 'RETORNO 162/58017cd8 | PP | OBS: -/-', 'Site Paypal', '0', 16697, '', 'Aguarda', '0', '0', '0', '2016-10-15 01:48:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58017cd8', '963852147', 'PT', 1, 0, 3600),
(1476576000, 'vgspedro@gmail.com', '', 1476575220, 'Partida', 'D', 'Pedro', 'Albufeira - Salgados', 'Faro Airport - Aqui', '', '1', '0', '0', 'TEM RETORNO 162/58017cd8 | PP | OBS: -/-', 'Site Paypal', '0.2', 16696, '', 'Aguarda', '0', '0', '0', '2016-10-15 01:48:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58017cd8', '963852147', 'PT', 1, 0, 3600),
(1476489600, 'vgspedro@gmail.com', '', 1476557400, 'Chegada', '355', 'Pedro', 'Faro Airport', 'Albufeira - Salgados - Aqui', '', '1', '0', '0', '162/58013744 | PP | OBS: -/-', 'Site Paypal', '0.2', 16695, '', 'Aguarda', '0', '0', '0', '2016-10-14 20:51:32', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58013744', '963852147', 'PT', 1, 0, 3600),
(1476489600, 'vgspedro@gmail.com', '', 1476554460, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - Aqui', '', '1', '0', '0', '163/58012bc7 | PP | OBS: Ergj', 'Site Paypal', '0.01', 16694, '', 'Aguarda', '0', '0', '0', '2016-10-14 20:02:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58012bc7', '963852147', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478445720, 'Partida', '999-ss @ 18:32', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/580116d8 | PP | OBS: wr', 'Site Paypal', '0', 16693, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:33:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/580116d8', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476549120, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/580116d8 | PP | OBS: wr', 'Site Paypal', '0.02', 16692, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:33:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/580116d8', '963602608', 'PT', 1, 0, 4200),
(1476576000, 'vgspedro@gmail.com', '', 1476638400, 'Interzone', '', 'Pedro', 'Alte - Ali', 'Aljezur', '', '1', '0', '0', 'RETORNO 163/58011440 | PP | OBS: Oo', 'Site Paypal', '0', 16691, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:22:08', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58011440', '963852147', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476548400, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - Aqui', '', '1', '0', '0', 'TEM RETORNO 163/58011440 | PP | OBS: Oo', 'Site Paypal', '0.02', 16690, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:22:08', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58011440', '963852147', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478456040, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/58011376 | TB | OBS: ew ', 'Site Transf.Banco', '0', 16689, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:18:46', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58011376', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476548100, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/58011376 | TB | OBS: ew ', 'Site Transf.Banco', '0.02', 16688, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:18:46', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58011376', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476548100, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/5801134c | TB | OBS: ew ', 'Site Transf.Banco', '0.02', 16686, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:18:04', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5801134c', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478456040, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/5801134c | TB | OBS: ew ', 'Site Transf.Banco', '0', 16687, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:18:04', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5801134c', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478456040, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/580112d0 | PP | OBS: ew ', 'Site Paypal', '0', 16685, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:16:00', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/580112d0', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476548100, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/580112d0 | PP | OBS: ew ', 'Site Paypal', '0.02', 16684, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:16:00', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/580112d0', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478444580, 'Partida', '999-ss @ 18:13', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '1', '0', 'RETORNO 160/58011268 | PP | OBS: qw', 'Site Paypal', '0', 16683, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:14:16', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58011268', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476547980, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '1', '0', 'TEM RETORNO 160/58011268 | PP | OBS: qw', 'Site Paypal', '0.02', 16682, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:14:16', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58011268', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478444280, 'Partida', '999-ss @ 18:08', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/58011146 | PP | OBS: h', 'Site Paypal', '0', 16681, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:09:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58011146', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476547740, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/58011146 | PP | OBS: h', 'Site Paypal', '0.02', 16680, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:09:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58011146', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478443800, 'Partida', '999-ss @ 18:00', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/58010f6d | TB | OBS: ftr', 'Site Transf.Banco', '0', 16679, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:01:33', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58010f6d', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476547260, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/58010f6d | TB | OBS: ftr', 'Site Transf.Banco', '0.02', 16678, '', 'Aguarda', '0', '0', '0', '2016-10-14 18:01:33', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58010f6d', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478443680, 'Partida', '999-ss @ 17:58', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/58010f0c | PP | OBS: cvc vc', 'Site Paypal', '0', 16677, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:59:56', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58010f0c', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476547140, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/58010f0c | PP | OBS: cvc vc', 'Site Paypal', '0.02', 16676, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:59:56', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58010f0c', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478443200, 'Partida', '999-ss @ 17:50', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/58010d38 | PP | OBS: fd', 'Site Paypal', '0', 16675, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:52:08', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58010d38', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478443080, 'Partida', '999-ss @ 17:48', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/58010ca1 | PP | OBS: sdds re', 'Site Paypal', '0', 16673, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:49:37', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58010ca1', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476546660, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/58010d38 | PP | OBS: fd', 'Site Paypal', '0.02', 16674, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:52:08', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58010d38', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476546540, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/58010ca1 | PP | OBS: sdds re', 'Site Paypal', '0.02', 16672, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:49:37', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58010ca1', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476545820, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/580109d3 | PP | OBS: fg lk', 'Site Paypal', '0.02', 16670, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:37:39', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/580109d3', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478442360, 'Partida', '999-ss @ 17:36', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/580109d3 | PP | OBS: fg lk', 'Site Paypal', '0', 16671, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:37:39', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/580109d3', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478451660, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/58010618 | PP | OBS: trhgtrt ', 'Site Paypal', '0', 16669, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:21:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58010618', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476543720, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/58010618 | PP | OBS: trhgtrt ', 'Site Paypal', '0.02', 16668, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:21:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58010618', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478451660, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/5801053d | PP | OBS: trhgtrt ', 'Site Paypal', '0', 16667, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:18:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5801053d', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478451660, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/58010518 | MTR | OBS: trhgtrt ', 'Direto', '0', 16665, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:17:28', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58010518', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476543720, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/5801053d | PP | OBS: trhgtrt ', 'Site Paypal', '0.02', 16666, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:18:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5801053d', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476543720, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/58010518 | MTR | OBS: trhgtrt ', 'Direto', '0', 16664, '', 'Aguarda', '0.02', '0', '0', '2016-10-14 17:17:28', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58010518', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478451660, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/580104fb | PP | OBS: trhgtrt ', 'Site Paypal', '0', 16663, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:16:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/580104fb', '963602608', 'PT', 1, 0, 9000),
(1476403200, '', 'Demo', 1476452100, 'Partida', 'YZF-1234', 'Pedrovv', 'Albufeira', 'Faro Airport', '', '4', '', '', 'Pagamento:Trans.Bancaria -> Email:vgspedro@gmail.com -> Telefone: -> Obs:', 'Aoperador', '25', 9200, '', 'Aguarda', '', '2.508', '0', '2147483647', 'Sim', 'NÃ£o', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1476316800, 'vgspedro@gmail.com', 'Luis', 1476364920, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fe475d | TB | OBS: -/-', 'Site Transf.Banco', '40', 16504, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:23:25', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe475d', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 15:21', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fe475d | TB | OBS: -/-', 'Site Transf.Banco', '0', 16505, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:23:25', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe475d', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', '', 1476365580, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - -/-', '', '1', '1', '0', 'TEM RETORNO 162/57fe4a8e | TB | OBS: -/-', 'Site Transf.Banco', '40', 16506, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:37:02', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe4a8e', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478426700, 'Partida', '999-ss @ 15:32', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '1', '0', 'RETORNO 162/57fe4a8e | TB | OBS: -/-', 'Site Transf.Banco', '0', 16507, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:37:02', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe4a8e', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', '', 1476366180, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '1', '0', 'TEM RETORNO 162/57fe4c36 | TB | OBS: -/-', 'Site Transf.Banco', '40', 16508, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:44:06', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe4c36', '963602608', 'PT', 1, 0, 3600),
(1476489600, '', 'Sara', 1476540000, 'Transfer', '', 'pedro', 'Pedra dos Bicos', 'lga', '', '1', '', '', '', 'OperadorPerc', '', 9218, '', 'Fechado', '45', '8.91', '4.5', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 15:42', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '1', '0', 'RETORNO 162/57fe4c36 | TB | OBS: -/-', 'Site Transf.Banco', '0', 16509, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:44:06', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe4c36', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', '', 1476366720, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '1', '0', 'TEM RETORNO 162/57fe4ebc | TB | OBS: -/-', 'Site Transf.Banco', '40', 16510, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:54:52', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe4ebc', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 15:51', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '1', '0', 'RETORNO 162/57fe4ebc | TB | OBS: -/-', 'Site Transf.Banco', '0', 16511, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:54:52', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe4ebc', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', '', 1476367200, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 169/57fe5034 | TB | OBS: -/-', 'Site Transf.Banco', '246', 16512, '', 'Aguarda', '0', '0', '0', '2016-10-12 16:01:08', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe5034', '963602608', 'PT', 1, 0, 1800),
(1476489600, '', 'Pedro', 1476538200, 'Transfer', '', 'Rui', 'Pedra dos Bicos', 'Albufeira', '', '1', '2', '', '', 'Operadortelefone', '', 9213, '234', 'Aguarda', '12', '2.508', '0.6', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1476835200, '', 'Sara', 1476903600, 'Transfer', '', 'Ruc', 'Lga', 'Ptm', '', '8', '8', '', 'Nada', 'Direto', '8', 9214, '876', 'Aguarda', '', '1.76', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 5400),
(1476489600, '', 'Demo', 1476530040, 'Chegada', 'vc123', 'William Farrington', 'Faro Airport', 'Albufeira', '', '4', '', '', 'Pagamento:Ao Motorista -> Email:vgspedro15@sapo.pt -> Telefone: -> Obs:', 'Direto', '11.05', 9215, '', 'Aguarda', '', '2.431', '0', '2147483647', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1476489600, '', 'Luis', 1476536400, 'Parques TemÃ¡ticos', '', 'Pedro Filipe Viegas', 'Pedra dos Bicos', 'Quarteira, Hotel Soleri', '', '4', '', '', '', 'OperadorPerc', '99', 9216, '', 'Aguarda', '', '19.602', '9.9', '0', 'Sim', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1476489600, '', 'Nuno Moreira', 1476539700, 'Parques TemÃ¡ticos', 'VC-789', 'Jose Manuel', 'Pedra dos Bicos', 'Albufeira', '', '1', '2', '', '', 'OperadorPerc', '45', 9217, '123', 'Aguarda', '', '8.91', '4.5', '0', 'Sim', 'NÃ£o', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4800),
(1478476800, '', 'Demo', 1478509500, 'Golf', 'As123', 'Pedro Manuel', 'Carvoeiro', 'Faro Airport', '', '4', '', '', 'Pagamento:Ao Motorista -> Email:vgspedro@gmail.com -> Telefone:963602608 -> Obs:Nada', 'OperadorPerc', '15', 9223, '', 'Fechado', '', '1.35', '1.5', '2147483647', 'Sim', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 1500),
(1476921600, '', 'Demo', 1476974100, 'Chegada', '', 'David Robertson', 'Faro aeroporto', 'Hotel Ibis Faro', '', '1', '1', '', '', 'Direto', '', 9225, '', 'Aguarda', '15', '3.3', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 0),
(1476921600, '', 'Demo', 1476977160, 'Chegada', '', 'David Robertson', 'Faro aeroporto', 'Hotel Ibis Faro', '', '2', '', '', '', 'Direto', '25', 9226, '', 'Aguarda', '', '5.5', '0', '0', 'Sim', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 4200),
(1476748800, '', 'Sara', 1476806400, 'Chegada', '', 'David Robertson', 'Faro aeroporto', 'rtg', '', '2', '2', '', '', 'Direto', '', 9227, '', 'Iniciado', '56', '12.32', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 4200),
(1478390400, 'vgspedro@gmail.com', 'Demo', 1478422800, 'Partida', 'V2 @ 14:24', 'Pedro', 'Tunes - Ali', 'Faro Airport', '', '1', '0', '0', 'RETORNO 169/57fe39d7 | MTR | OBS: -/-', 'Site Transf.Banco', '0', 16497, '', 'Aguarda', '0', '0', '0', '2016-10-12 14:25:43', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe39d7', '963852147', 'FR', 1, 0, 1800),
(1476316800, 'vgspedro@gmail.com', '', 1476363840, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Olhos de Agua - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 172/57fe4316 | MTR | OBS: -/-', 'Direto', '0', 16498, '', 'Rejeitado', '50', '0', '0', '2016-10-12 15:05:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '172/57fe4316', '963602608', 'PT', 1, 0, 2700),
(1478390400, 'vgspedro@gmail.com', '', 1478434740, 'Partida', '999-ss @ 15:04', 'pedro', 'Albufeira - Olhos de Agua - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 172/57fe4316 | MTR | OBS: -/-', 'Direto', '0', 16499, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:05:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '172/57fe4316', '963602608', 'PT', 1, 0, 2700),
(1476316800, 'vgspedro@gmail.com', '', 1476364080, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/57fe4414 | TB | OBS: -/-', 'Site Transf.Banco', '14.4', 16500, '', 'Aguarda', '0', '0', '0', '2016-10-12 15:09:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe4414', '963602608', 'PT', 1, 0, 4200),
(1476662400, '', 'Nuno Moreira', 1476709620, 'Partida', 'er123', 'Pedro Iria', 'Salema-Sagres', 'Faro Aeroporto', 'tetste', '8', '', '', 'Provem: #9235 -> Pagamento:Ao Motorista -> Email:vgspedro@gmail.com -> Telefone:32423423423423 -> Obs:rfrrferef', 'Direto', '0', 9236, '', 'Aguarda', '191.90', '0', '0', '2147483647', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 4200),
(1476316800, 'vgspedro@gmail.com', '', 1476358860, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fe2f92 | MTR | OBS: -/-', 'Site Transf.Banco', '40', 16490, '', 'Aguarda', '0', '0', '0', '2016-10-12 13:41:54', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe2f92', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478439720, 'Partida', '999-ss @ 13:42', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fe2f92 | MTR | OBS: -/-', 'Site Transf.Banco', '0', 16491, '', 'Aguarda', '0', '0', '0', '2016-10-12 13:41:54', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe2f92', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', '', 1476358980, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '5', '0', '0', 'TEM RETORNO 169/57fe3097 | MTR | OBS: -/-', 'Direto', '0', 16492, '', 'Aguarda', '470', '0', '0', '2016-10-12 13:46:15', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe3097', '963602608', 'PT', 1, 0, 1800),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 10:00', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '5', '0', '0', 'RETORNO 169/57fe3097 | MTR | OBS: -/-', 'Direto', '0', 16493, '', 'Aguarda', '0', '0', '0', '2016-10-12 13:46:15', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fe3097', '963602608', 'PT', 1, 0, 1800),
(1476316800, 'vgspedro@gmail.com', 'Pedro', 1476359280, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - -/-', '', '1', '0', '0', 'TEM RETORNO 162/57fe314d | MTR | OBS: -/-', 'Direto', '0', 16494, '', 'Aguarda', '34', '0', '0', '2016-10-12 13:49:17', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe314d', '963602608', 'PT', 1, 0, 3600),
(1477612800, '', 'Luis', 1477674000, 'Chegada', 'er123', 'Laura Jordan', 'Faro Airport', 'Salema-Sagres', '', '4', '', '', 'Pagamento:Trans.Bancaria -> Email:vgspedro@gmail.com -> Telefone:7899123657 -> Obs:gvxc', 'Direto', '0', 9243, '', 'Aguarda', '84.55', '0', '0', '2147483647', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '88FF77', '0', '', '', 0, 0, 4200),
(1476662400, '', 'Sara', 1476709200, 'Partida', '', 'Fernando JosÃ©', 'Carvoeiro', 'Faro Aeroporto', '', '4', '', '', 'Pagamento:Trans.Bancaria -> Email:jgfernandomanuel@gmail.com -> Telefone:918328535 -> Obs:', 'Direto', '0', 9244, '', 'Iniciado', '11.40', '0', '0', '2147483647', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 4200),
(1477612800, '', 'Luis', 1477650600, 'Chegada', '234er', 'VITOR', 'Faro Airport', 'Albufeira', '', '8', '', '', 'Pagamento:Trans.Bancaria -> Email:vgspedro@gmail.com -> Telefone:9636226235 -> Obs:teste ', 'Direto', '0', 9245, '', 'Aceite', '32.30', '0', '0', '2147483647', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1477353600, '', 'Sara', 1477393140, 'Partida', 'Chegada(234er)', 'Tom Morris', 'Albufeira', 'Faro Airport', 'teste ', '8', '', '', 'Provem: #9245 -> Pagamento:Trans.Bancaria -> Email:vgspedro@gmail.com -> Telefone:9636226235 -> Obs:teste ', 'Direto', '0', 9246, '', 'Aguarda', '32.30', '7.106', '0', '2147483647', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1477612800, '', 'Luis', 1477666800, 'Interzone', '12we', 'Laura Jordan', 'Albufeira Jardim Albufeira', 'Hotel Ibis Faro', 'erte', '5', '7', '10', 'obs', 'Aoperador', '', 9247, '', 'Aguarda', '45', '0', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1476835200, '', 'Demo', 1476887160, 'Interzone', '', 'Fernando JosÃ©', 'Albufeira Jardim Albufeira', 'faro', 'Casa JoÃ£o Av 25 abril, ptm (Recolha)', '2', '2', '', '', 'Aoperador', '', 9248, '123', 'Aguarda', '49', '8.58', '10', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '77XX99', '0', '', '', 0, 0, 4200),
(1476748800, '', 'Luis', 1476804660, 'Golf', '', 'Fernando JosÃ©', 'Albufeira Jardim Albufeira', 'Quinta do Lago Golf', 'Casa JoÃ£o Av 25 abril, ptm (Recolha)', '6', '', '', 'dff', 'Aoperador', '', 9249, '123e', 'Aguarda', '12', '0', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', 'AA2345', '0', '', '', 0, 0, 4200),
(1476748800, '', 'Luis', 1476816900, 'Chegada', 're23423', 'Sandra Ana', 'Faro Airport', 'Vila Nova Mil Fontes', '', '16', '', '', 'Pagamento:Trans.Bancaria -> Email:vgspedro@gmail.com -> Telefone:9636026582 -> Obs:sdcddsfsd', 'Direto', '0', 9250, '', 'Aguarda', '522.50', '0', '0', '2147483647', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1476748800, '', 'Demo', 1476802800, 'Interzone', '', 'Elisabeth D.', 'Albufeira Jardim Albufeira', 'Quinta do Lago Golf', '', '5', '6', '', 'ghjj', 'Direto', '', 9252, 'gh', 'Aguarda', '20', '4.4', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1477353600, '', 'Demo', 1477386000, 'Interzone', '', 'Elisabeth D.', 'Albufeira Jardim Albufeira', 'Salema-Sagres', '', '5', '6', '', 'ghjj', 'Direto', '', 9253, 'gh', 'Iniciado', '14', '3.08', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1476748800, '', 'Pedro', 1476804900, 'Transfer', '', 'Elisabeth D.', 'Albufeira Jardim Albufeira', 'Salema-Sagres', '', '5', '9', '', '', 'OperadorPerc', '8', 9254, 'fg', 'Aguarda', '8', '0', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1478217600, '', 'Sara', 1478270100, 'Transfer', '', 'Sara Marta', 'Alvor', 'Faro Aeroporto', '', '5', '9', '', '', 'OperadorPerc', '', 9255, 'fg', 'Aguarda', '8', '1.584', '0.8', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 900),
(1477353600, '', 'Pedro', 1477400400, 'Golf', '', 'Tom Morris', 'Albufeira Jardim Albufeira', 'Quinta do Lago Golf', '', '7', '8', '', 'obs nada', 'Aoperador', '4', 9256, '123', 'Aguarda', '5', '-1.32', '10', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1477612800, '', 'Luis', 1477681200, 'Interzone', '', 'Laura Jordan', 'Albufeira Jardim Albufeira', 'Salema-Sagres', '', '1', '1', '', 'obs', 'Direto', '25', 9258, '678', 'Aguarda', '0', '0', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1477612800, '', 'Pedro', 1477679400, 'Interzone', '', 'Sandra Ana', 'Albufeira Jardim Albufeira', 'Quinta do Lago Golf', '', '1', '1', '', 'obs', 'Direto', '35', 9259, '678', 'Aguarda', '0', '0', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1477353600, '', 'Luis', 1477402200, 'Transfer', '', 'Tom Morris', 'Albufeira Jardim Albufeira', 'Quinta do Lago Golf', '', '1', '1', '', 'obs', 'Direto', '2', 9260, '678', 'Aguarda', '2', '0.44', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1477612800, '', 'Luis', 1477656000, 'Interzone', '', 'Laura Jordan', 'Albufeira Jardim Albufeira', 'Hotel Ibis Faro', '', '4', '5', '', 'cg', 'Direto', '', 9261, 'fg', 'Aceite', '88', '0', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1477353600, '', 'Pedro', 1477389600, 'Interzone', '', 'Sandra Ana', 'Albufeira Jardim Albufeira', 'Quinta do Lago Golf', '', '7', '8', '', 'dgghn', 'Direto', '8', 9262, 'sd', 'Aguarda', '7', '1.76', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'Sim', '', '0', '', '', 0, 0, 4200),
(1478995200, '', 'Sara', 1479064740, 'Partida', '123', 'Manel', 'Albufeira', 'Faro Airport', '', '4', '', '', 'Pagamento:Trans.Bancaria -> Email:vgspedro@gmail.com -> Telefone:968529638 -> Obs:testw', 'Direto', '0', 9265, '', 'Aguarda', '32.30', '7.106', '0', '2147483647', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '0', '', '', 0, 0, 2460),
(1477612800, 'vgspedro@gmail.com', '', 1477674480, 'Chegada', 'ee', 'pedro', 'Faro Airport', 'Albufeira - Salgados - -/-', '', '1', '0', '0', '162/58134e05 | PP | OBS: -/-', 'Site Paypal', '41.92', 16787, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:09:25', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58134e05', '968527412', 'BR', 1, 0, 3600),
(1479945600, '', 'Fixo', 1479956400, 'Chegada', 'FD-123', 'Manuel', 'Carvoeiro', 'Faro Airport', '', '3', '1', '', 'Pagamento:Ao Motorista -> Email:vgspedro@gmail.com -> Telefone:46546456456 -> Obs:', 'Tabpercentagem', '15', 9267, '', 'Aguarda', '', '0.405', '1.5', '2147483647', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '37ET58', '-/-', '', '', 0, 0, 8940),
(1477612800, 'vgspedro@gmail.com', '', 1477663440, 'Partida', '12we @ 18:04', 'pedro', 'Albufeira - Salgados - -/-', 'Faro Airport', '', '1', '0', '0', '162/58134d86 | PP | OBS: -/-', 'Site Paypal', '20.96', 16786, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:07:18', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58134d86', '968527412', 'BEL', 1, 0, 3600),
(1476748800, '', 'Sara', 1476804600, 'Partida', 'Q789', 'Walter', 'Faro cidade', 'Faro Aeroporto', '', '3', '', '', '', 'Direto', '', 9270, '', 'Rejeitado', '19', '15', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '88FF77', '0', '919639630', 'PT', 0, 0, 1800),
(1475107200, '', 'JoÃ£o Pedro', 1475152200, 'Partida', '', 'teste', 'Lagos - Marina', 'Lisboa Aeroporto', '37.0914497Â°-8.222958Â°', '2', '', '', '', 'OperadorPorPax', '', 9271, '', 'Iniciado', '45', '', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'SS4444', '0', '', '', 0, 0, 10800),
(1478217600, '', 'Sara', 1478268000, 'Chegada', '', 'Marta Ana', 'ArmaÃ§Ã£o Pera', 'Faro Aeroporto', '37.0914769Â°-8.222923Â°', '2', '1', '', '', 'Direto', '', 9272, 'a12', 'Aguarda', '52', '1.1', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', '88FF77', '0', '', 'PT', 0, 0, 5400),
(1470614400, '', 'Pedro', 1470668400, 'Partida', '', 'tesdte', 'aqui', 'ali', '', '1', '1', '1', '', 'Direto', '', 9275, '', 'Iniciado', '250', '', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', '', '123AA', '', '', 0, 0, 0),
(1470700800, '', 'Pedro', 1470746580, 'Chegada', '', 'teste ida e volta', 'Aqui', 'ali', '', '3', '4', '5', '', 'Direto', '', 9278, '', 'Aguarda', '92', '', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', '77XX88', '123AA', '', '', 0, 0, 0),
(1470700800, '', 'Pedro', 1470747660, 'Chegada', '', 'teste ida e volta', 'Aqui', 'ali', 'pt ref', '5', '5', '5', '', 'Direto', '45', 9281, '', 'Aceite', '', '', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', '77XX88', '123AA', '', '', 0, 0, 0),
(1477612800, '', 'Nuno Moreira', 1477666200, 'Chegada', '', 'teste ida e volta', 'ali', '', '', '5', '5', '5', '9281', 'Direto', '', 9282, '', 'Iniciado', '', '', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '123AA', '', '', 0, 0, 3600),
(1470700800, '', 'Pedro', 1470749040, 'Chegada', '', 'teste ida e volta', 'Aqui', 'ali', 'pt ref', '4', '4', '4', '', 'Direto', '', 9283, '', 'Aguarda', '99', '', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', '88FF77', '123AA', '', '', 0, 0, 0),
(1477612800, 'vgspedro15@sapo.pt', 'Demo', 1477679100, 'Chegada', '', 'teste ida e volta', 'ali', 'sdf', 'pt ref ali', '2', '2', '2', '', 'Direto', '', 9286, '', 'Aguarda', '', '', '0', '0', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'SS4444', '123AA', '1234567890', 'PT', 0, 0, 3600),
(1470096000, 'suporte@oseubackoffice.com', 'Pedro', 1470124200, 'Interzone', 'FV_123', 'teste ida e volta', 'Aqui', 'ali', 'pt ref', '6', '6', '6', '', 'Direto', '', 9287, '123', 'Aguarda', '321', '182.23', '0', '0', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', 'SS4444', '123AA', '1234567890', 'PT', 0, 0, 0);
INSERT INTO `excel` (`data_servico`, `email`, `staff`, `hrs`, `servico`, `voo`, `nome_cl`, `local_recolha`, `local_entrega`, `ponto_referencia`, `px`, `cr`, `bebe`, `obs`, `operador`, `cobrar_operador`, `id`, `ticket`, `estado`, `cobrar_direto`, `cmx_st`, `cmx_op`, `data_criacao`, `rec_ope`, `rec_staf`, `pag_ope`, `pag_staf`, `matricula`, `referencia`, `telefone`, `pais`, `criado_direto`, `nid`, `end`) VALUES
(1476921600, 'geral@oseubackoffice.com', '', 1476972060, 'Partida', 'ffffffffffffff @ 18:01', 'jjjjjjjjjjj', 'Albufeira - Salgados - -/-', 'Faro Airport', '', '3', '0', '0', '162/5808dcae | TB | OBS: bbbbbbbbbbbbbbbbbb', 'Site Transf.Banco', '18', 16759, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:03:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808dcae', '289150167', 'PT', 1, 0, 3600),
(1476489600, 'vgspedro@gmail.com', '', 1476543720, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/580104fb | PP | OBS: trhgtrt ', 'Site Paypal', '0.02', 16662, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:16:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/580104fb', '963602608', 'PT', 1, 0, 9000),
(1477353600, '', 'JoÃ£o Pedro', 1477404000, 'Parques TemÃ¡ticos', '', '', '', '', '', '', '0', '0', '', 'Ze', '', 15959, '', 'Iniciado', '', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'Sjjajs', '-/-', '', '', 1, 0, 3600),
(1477267200, 'm@m.com', 'Luis', 1477336680, 'Interzone', '', 'Luis manuel', 'Albufeira-', 'Autodromo do Algarve - PortimÃ£o-', '1Âª Casa (Recolha)', '4', '0', '0', 'teste', 'Hotel Fixo', '50', 16778, '', 'Iniciado', '', '15', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', 'Torre de Belem', '289366091', 'Portugal', 1, 0, 2700),
(1477526400, '', 'Demo', 1477557000, 'Partida', 'fr4182', 'john lawrence', 'Carvoeiro-Hotel Tivoli', 'Faro Airport-Faro', '', '2', '0', '0', '', 'Hotel Percentagem', '', 16779, '', 'Aguarda', '', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 1, 0, 2700),
(1478563200, '', 'Demo', 1478617200, 'Partida', '', '', 'Lagos', 'Faro', '', '2', '0', '0', '', 'Direto', '105.00', 15964, '', 'Aceite', '', '3.0168', '4.44', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 1, 0, 2040),
(1479945600, '', '', 1479990120, '', '', '', 'Albufeira, Corcovada-', 'Albufeira, Guia-', '', '1', '5', '5', '', 'Albufeira, Guia', '1', 16820, '', 'Aguarda', '', '.50', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '37ET58', '-/-', '', '', 1, 0, 2100),
(1474243200, '', 'Suporte', 1474254000, 'Partida', '', 'valter', 'Alcantarilha2', 'Faro aeroport', '', '2', '1', '', '', 'DiretoXride', '', 15965, '', 'Fechado', '15', '1.8', '3', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 1, 0, 7200),
(1477612800, 'vgspedro@gmail.com', '', 1477672140, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - ali', '', '1', '0', '0', 'TEM RETORNO 163/58134825 | PP | OBS: rf', 'Site Paypal', '209.6', 16781, '', 'Aguarda', '0', '0', '0', '2016-10-28 13:44:21', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58134825', '968527412', 'BEL', 1, 0, 9000),
(1474243200, 'vgspedro@gmail.com', 'Suporte', 1474284480, 'Chegada', 'er-345', 'teste', 'Aqui', 'ALi', 'casa amadeus (Recolha)', '4', '2', '2', '', 'OperadorPorPax', '', 15966, '', 'Aguarda', '25', '12', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '414144144141', 'PT', 1, 0, 4200),
(1479945600, 'vgspedro@gmail.com', '', 1479989460, 'Partida', '234 @ 15:11', 'pedro', 'Albufeira - Salgados - aqui', 'Faro Airport', '', '1', '1', '0', '162/5819ca46 | TB | OBS: obs', 'Site Transf.Banco', '20', 16815, '', 'Aguarda', '0', '0', '0', '2016-11-02 11:13:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '45FF45', '162/5819ca46', '963852741', 'PT', 1, 0, 3600),
(1477612800, 'vgspedro@gmail.com', '', 1477675740, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - ali', '', '1', '0', '0', 'TEM RETORNO 163/581352f9 | PP | OBS: sd', 'Site Paypal', '209.6', 16793, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:30:33', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/581352f9', '968527412', 'AST', 1, 0, 9000),
(1431820800, 'clairemarkey33@yahoo.co.uk', '', 1431853200, '', '6793', 'Claire Markey', 'Aeroporto de Faro', 'Carvoeiro, Casa Felicidade, 16 Estrada do Algar Seco', '', '2', '0', '2', '(PAX:4 | DN | TEM RETORNO) OBS:Hi, can you supply a booster seat for our 4 year old and a toddler car seat for our almost 3 year old please? Many thanks, claire ', 'Bigeye Tours', '0', 16825, '', 'Aguarda', '93.10', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', 'AFAT-1005', '00447803044413', 'UK', 0, 1005, 1800),
(0, 'gg@gnail.com', '', 0, 'Interzone', 'F445', 'Gggg', 'Faro Airport', 'Ayamonte - Spain - Vila gale', '', '1', '0', '0', '160/58227fb6 | PP | OBS: -/-', 'Site Paypal', '13.546', 16819, '', 'Aguarda', '0', '0', '0', '2016-11-09 01:45:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58227fb6', '--', '-/-', 1, 0, 4200),
(1474243200, 'vgspedro@gmail.com', 'Pedro', 1474284480, 'Chegada', 'er-345', 'teste', 'Aqui', 'ALi', 'casa amadeus (Recolha)', '4', '2', '2', '', 'Hotel Fixo', '', 15967, '', 'Fechado', '25', '12', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '414144144141', 'PT', 1, 0, 4200),
(1479945600, '', 'Fixo', 1479990780, 'Interzone', '', '', '', '', '', '4', '0', '0', '', 'Hotel Fixo', '', 15968, '', 'Fechado', '25', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '-/-', '', '', 1, 0, 1740),
(1479945600, '', 'Pedro', 1479990300, 'Chegada', '', '', '', '', '', '3', '', '', '', 'Hotel Fixo', '', 15969, '', 'Fechado', '25', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '88FF77', '-/-', '', '', 1, 0, 1920),
(1479168000, '', 'Demo', 1479199440, 'Chegada', '', '', 'Faro Airport', 'Albufeira', '', '2', '1', '', 'Pagamento:Trans.Bancaria Obs:', 'Hotel Fixo', '', 15973, '', 'Fechado', '16.15', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '37ET58', '57ded1bb', '', '', 0, 0, 1800),
(1477872000, '', 'Pedro', 1477881300, 'Chegada', '', 'omeunome', 'aqui', 'ali', '', '2', '', '', 'Teste', 'Hotel Fixo', '', 16813, 'hg', 'Aguarda', '', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 0, 0, 1800),
(1477267200, '', 'Pedro', 1477330620, 'Chegada', 'Zb580', 'Paulo', 'Faro aeroport', 'Montechoro', '', '2', '0', '0', '(TEM RETORNO) ', 'Hotel Fixo', '50', 15971, '77777', 'Fechado', '', '6', '0', '', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', '', '57dadd1e', '', '', 1, 0, 1800),
(1476403200, 'vgspedro@gmail.com', 'Nuno Moreira', 1476457200, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '1', '1', '160/57ffafc3 | PP | OBS: gfbfg df gdf d  d gd', 'Site Paypal', '0.02', 16571, '', 'Aguarda', '0', '0', '0', '2016-10-13 17:01:07', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57ffafc3', '963602608', 'OUT', 1, 0, 4200),
(1479168000, '', 'Demo', 1479231000, 'Chegada', '', 'Toze', 'Albufeira', 'Faro', '', '2', '', '', '', 'Vilas universo ', '55', 15974, '', 'Fechado', '', '2.2', '11', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 0, 0, 1800),
(1475107200, '', 'JoÃ£o Pedro', 1475137800, 'Partida', '', 'Ze', 'Faro', 'Albufeira', '', '1', '', '', '', 'Vilas universo ', '55', 15975, '', 'Fechado', '', '6.6', '11', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 0, 0, 1800),
(1479168000, '', 'Demo', 1479202200, 'Chegada', '', '', '', '', '', '', '', '', '', 'Hotel Percentagem', '', 15976, '', 'Fechado', '45', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 0, 0, 1800),
(1475107200, 'jp.ferreira76@gmail.com', 'JoÃ£o Pedro', 1475172000, 'Partida', 'fr4184', 'john smith', 'Albufeira - Guia-rua nossa senhora da guia,115', 'Faro Airport-Faro Airport', '', '2', '0', '0', '(TEM RETORNO) wifi obrigatÃ³rio', 'DiretoXride', '45', 15977, '', 'Fechado', '0', '2.15', '2', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '57ebd04d', '916091248', 'Portugal', 1, 0, 2700),
(1475452800, '', 'JoÃ£o Pedro', 1475485200, 'Chegada', '', 'LuÃ­s Martinho', 'Faro aeroporto', 'Albufeira', '', '2', '', '', 'O cliente deseja serviÃ§o vip', 'Hotel ParaÃ­so', '', 15978, '', 'Fechado', '45', '0', '0', '', 'NÃ£o', 'Sim', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 0, 0, 1800),
(1478304000, 'geral@oseubackoffice.com', 'Demo', 1478350800, 'Partida', 'sssssssssssssss @ 15:28', 'CCCCC', 'Ayamonte - Spain - Rua General Humberto Delgado, NÂº6, 2Âº esq', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/5808d543 | PP | OBS: vvvvvvvvvvvvvvvvvvvvv', 'Site Paypal', '0', 16752, '', 'Iniciado', '0', '0', '0', '2016-10-20 15:31:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5808d543', '289150167', '-/-', 1, 0, 4200),
(1476921600, 'vgspedro@gmail.com', '', 1476967380, 'Interzone', '', 'Pedro', 'Alte', 'Aljezur - rua 5', '', '1', '0', '0', '163/58089fef | MTR | OBS: -/-', 'Direto', '0', 16732, '', 'Aguarda', '0.01', '0', '0', '2016-10-20 11:43:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58089fef', '8969638526', 'BUL', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478451660, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/580104c0 | TB | OBS: trhgtrt ', 'Site Transf.Banco', '0', 16661, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:16:00', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/580104c0', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476543720, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/580104c0 | TB | OBS: trhgtrt ', 'Site Transf.Banco', '0.02', 16660, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:16:00', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/580104c0', '963602608', 'PT', 1, 0, 9000),
(1476921600, 'vgspedro@gmail.com', '', 1476971880, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '0', '0', 'TEM RETORNO 163/5808b18d | TB | OBS: re', 'Site Transf.Banco', '0.02', 16740, '', 'Aguarda', '0', '0', '0', '2016-10-20 12:59:09', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808b18d', '8969638526', 'AST', 1, 0, 9000),
(1475798400, 'camiloccferreira@gmail.com', 'Nuno Moreira', 1475846580, 'Chegada', 'li256', 'Manuel Ferreira', 'Faro Airport-faro aeroporto', 'Albufeira - GalÃ©-rua do ...', '', '4', '1', '0', '', 'Hotel Fixo', '35', 15979, '', 'Fechado', '', '12', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '+351914017738', 'Portugal', 1, 0, 3000),
(1476921600, 'vgspedro@gmail.com', '', 1476971640, 'Interzone', '', 'Pedro', 'Aljezur', 'Alte - rua 5', '', '1', '0', '0', 'TEM RETORNO 163/5808b097 | TB | OBS: vb', 'Site Transf.Banco', '0.02', 16738, '', 'Aguarda', '0', '0', '0', '2016-10-20 12:55:03', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808b097', '8969638526', 'LX', 1, 0, 9000),
(1476921600, 'geral@oseubackoffice.com', '', 1476971820, 'Partida', 'dddddd @ 17:57', 'aaaaaaaaaaaaa', 'Albufeira - Salgados - Rua General Humberto Delgado, NÂº6, 2Âº esq', 'Faro Airport', '', '5', '2', '0', '162/5808db8d | PP | OBS: lllllllllllllllllll', 'Site Paypal', '186.3', 16757, '', 'Aguarda', '0', '0', '0', '2016-10-20 15:58:21', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808db8d', '289150167', '-/-', 1, 0, 3600),
(1476489600, 'vgspedro@gmail.com', '', 1476543360, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/58010033 | PP | OBS: -/-', 'Site Paypal', '0.02', 16648, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:56:35', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/58010033', '963602608', 'PT', 1, 0, 4200),
(1475798400, '', 'Demo', 1475866800, 'Chegada', '', '', '', '', '', '', '', '', '', '', '', 15981, '', 'Fechado', '', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 0, 0, 1800),
(1475798400, '', 'JoÃ£o Pedro', 1475866800, 'Interzone', '', 'marcis', 'hotel lusiada', 'marina', '', '2', '', '', '', 'di', '', 15982, '', 'Fechado', '20', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 0, 0, 1800),
(1476057600, '', 'Demo', 1476115200, 'Chegada', 'il5553', 'joao joao', 'Faro City-Faro aeroport', 'Albufeira - Montechoro-rua do carmo', 'rotunda dos golfinhos', '2', '0', '0', '', 'Hotel Fixo', '', 15983, '', 'Fechado', '40', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 1, 0, 1800),
(1478044800, 'vgspedro@gmail.com', 'Demo', 1478088000, 'Chegada', 'V1', 'Pedro', 'Faro Airport', 'Tunes - -/-', '', '1', '0', '0', 'TEM RETORNO 169/57fde19c | MTR | OBS: -/-', 'Direto', '0', 16477, '', 'Iniciado', '246', '0', '0', '2016-10-12 08:09:16', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fde19c', '963+852147', 'PT', 1, 0, 1800),
(1476144000, 'g@g.com', 'Luis', 1476204000, 'Partida', '', 'Luis Murta', 'Albufeira - Olhos de Agua-rua nossa senhora da guia,115', 'Faro Airport-aeroporto', '', '3', '1', '0', 'ggggg fffff', 'Hotel Fixo', '', 15984, '', 'Fechado', '35', '3', '5', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '123456789', 'Portugal', 1, 0, 1800),
(1477008000, 'vgspedro@gmail.com', 'Pedro', 1477043820, 'Chegada', 'qw-123', 'manuel jose', '37.095580, -8.224018', 'ALi', 'rotunda globo (Recolha)', '1', '0', '0', '(TEM RETORNO) nada', 'Hotel Fixo', '25', 16709, '123', 'Aguarda', '', '12', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '5808953d', '123456789', 'PT', 1, 0, 1800),
(1476316800, 'vgspedro@gmail.com', '', 1476356100, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '11', '0', '0', 'TEM RETORNO 162/57fe24da | MTR | OBS: -/-', 'Site Transf.Banco', '80', 16483, '', 'Aguarda', '0', '0', '0', '2016-10-12 12:56:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe24da', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478436840, 'Partida', '999-ss @ 12:54', 'pedro', 'Albufeira - Salgados - fdfd', 'Faro Airport', '', '11', '0', '0', 'RETORNO 162/57fe24da | MTR | OBS: -/-', 'Site Transf.Banco', '0', 16484, '', 'Aguarda', '0', '0', '0', '2016-10-12 12:56:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fe24da', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', '', 1476357420, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '4', '0', 'TEM RETORNO 160/57fe2be5 | MTR | OBS: -/-', 'Site Transf.Banco', '36', 16485, '', 'Aguarda', '0', '0', '0', '2016-10-12 13:26:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe2be5', '963602608', 'PT', 1, 0, 4200),
(1476057600, 'sjkjk@ss.pt', 'Pedro', 1476104700, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '1', '3', '0', 'rr', 'Direto', '0', 15996, '', 'Fechado', '470', '0', '0', '2016-10-10 14:27:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fb973e', '963602608', 'PT', 1, 0, 1800),
(1478390400, 'vgspedro@gmail.com', '', 1478438220, 'Partida', '999-ss @ 13:17', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '4', '0', 'RETORNO 160/57fe2be5 | MTR | OBS: -/-', 'Site Transf.Banco', '0', 16486, '', 'Aguarda', '0', '0', '0', '2016-10-12 13:26:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fe2be5', '963602608', 'PT', 1, 0, 4200),
(1476057600, 'sjkjk@ss.pt', 'Demo', 1476109380, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO | PAG: MTR | OBS: -/-', 'Direto', '0', 16010, '', 'Fechado', '40', '0', '0', '2016-10-10 15:24:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fba4ad', '963602608', 'PT', 1, 0, 3600),
(1476057600, 'sjkjk@ss.pt', 'Sara', 1476109380, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fba4e6 | PAG: MTR | OBS: -/-', 'Direto', '0', 16014, '', 'Fechado', '40', '0', '0', '2016-10-10 15:25:42', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fba4e6', '963602608', 'PT', 1, 0, 3600),
(1476057600, 'sjkjk@ss.pt', 'Nuno Moreira', 1476109380, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fba542 | PAG: MTR | OBS: -/-', 'Direto', '0', 16016, '', 'Fechado', '40', '0', '0', '2016-10-10 15:27:14', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fba542', '963602608', 'PT', 1, 0, 3600),
(1477785600, 'vgspedro@gmail.com', '', 1477818000, 'Chegada', 'V1', 'Pedro', 'Faro Airport', 'Ayamonte - Spain - Aqui', '', '1', '0', '0', 'TEM RETORNO 160/57fde357 | MTR | OBS: -/-', 'Site Paypal', '47.6', 16479, '', 'Aguarda', '0', '0', '0', '2016-10-12 08:16:39', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fde357', '+963852147', 'AU', 1, 0, 4200),
(1476316800, 'sjkjk@ss.pt', '', 1476368580, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fba5df | PAG: MTR | OBS: -/-', 'Direto', '0', 16018, '', 'Aguarda', '40', '0', '0', '2016-10-10 15:29:51', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fba5df', '963602608', 'PT', 1, 0, 3600),
(1476057600, 'sjkjk@ss.pt', 'Sara', 1476109380, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57fba63a | MTR | OBS: -/-', 'Direto', '0', 16020, '', 'Fechado', '40', '0', '0', '2016-10-10 15:31:22', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fba63a', '963602608', 'PT', 1, 0, 3600),
(1476489600, 'vgspedro@gmail.com', '', 1476543720, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/580103c5 | TB | OBS: trhgtrt ', 'Site Transf.Banco', '0.02', 16658, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:11:49', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/580103c5', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476543720, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/58010191 | PP | OBS: trhgtrt ', 'Site Paypal', '0.02', 16650, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:02:25', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58010191', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478451660, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/58010191 | PP | OBS: trhgtrt ', 'Site Paypal', '0', 16651, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:02:25', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58010191', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476543720, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/580101d6 | MTR | OBS: trhgtrt ', 'Direto', '0', 16652, '', 'Aguarda', '0.02', '0', '0', '2016-10-14 17:03:34', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/580101d6', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478451660, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/580101d6 | MTR | OBS: trhgtrt ', 'Direto', '0', 16653, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:03:34', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/580101d6', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476543720, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/58010254 | MTR | OBS: trhgtrt ', 'Direto', '0', 16654, '', 'Aguarda', '0.02', '0', '0', '2016-10-14 17:05:40', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58010254', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478451660, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/58010254 | MTR | OBS: trhgtrt ', 'Direto', '0', 16655, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:05:40', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58010254', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476543720, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/5801028b | TB | OBS: trhgtrt ', 'Site Transf.Banco', '0.02', 16656, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:06:35', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5801028b', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478451660, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/5801028b | TB | OBS: trhgtrt ', 'Site Transf.Banco', '0', 16657, '', 'Aguarda', '0', '0', '0', '2016-10-14 17:06:35', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5801028b', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476541920, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '1', '1', '163/5800fc66 | MTR | OBS: x', 'Direto', '0', 16641, '', 'Aguarda', '0.01', '0', '0', '2016-10-14 16:40:22', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800fc66', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478457540, 'Interzone', '999-ss @ 18:39', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/57fd2397 | MTR | OBS: erre retere retrre', 'Direto', '0', 16461, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:38:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57fd2397', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476541920, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '1', '1', '163/5800fc04 | TB | OBS: x', 'Site Transf.Banco', '0.01', 16639, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:38:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800fc04', '963602608', 'PT', 1, 0, 9000),
(1479945600, 'vgspedro@gmail.com', 'Fixo', 1480012860, 'Partida', '999-ss @ 18:41', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 169/57fd24c1 | MTR | OBS: fdgre teter ', 'Site Paypal', '0', 16463, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:43:29', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '88FF77', '169/57fd24c1', '963602608', 'PT', 1, 0, 1800),
(1476489600, 'vgspedro@gmail.com', '', 1476541740, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '1', '1', '163/5800fa57 | TB | OBS: -/-', 'Site Transf.Banco', '0.02', 16635, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:31:35', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800fa57', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476541920, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '1', '1', '163/5800fb1d | TB | OBS: x', 'Site Transf.Banco', '0.01', 16636, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:34:53', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800fb1d', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478457840, 'Partida', '999-ss @ 18:44', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fd253b | MTR | OBS: xz cvcew dedsd', 'Site Transf.Banco', '0', 16465, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:45:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fd253b', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478458860, 'Partida', '999-ss @ 19:01', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fd2911 | MTR | OBS: sadsadafd ', 'Direto', '0', 16468, '', 'Aguarda', '0', '0', '0', '2016-10-11 19:01:53', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fd2911', '963602608', 'PT', 1, 0, 3600),
(1476316800, 'vgspedro@gmail.com', 'Pedro', 1476381840, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 169/57fd29db | MTR | OBS: -/-', 'Site Transf.Banco', '470', 16469, '', 'Aguarda', '0', '0', '0', '2016-10-11 19:05:15', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd29db', '963602608', 'PT', 1, 0, 2700),
(1478390400, 'vgspedro@gmail.com', '', 1478459160, 'Partida', '999-ss @ 19:06', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 169/57fd29db | MTR | OBS: -/-', 'Site Transf.Banco', '0', 16470, '', 'Aguarda', '0', '0', '0', '2016-10-11 19:05:15', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd29db', '963602608', 'PT', 1, 0, 1800),
(1476316800, 'vgspedro@gmail.com', 'Sara', 1476382140, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '1', '2', '3', 'TEM RETORNO 169/57fd2b40 | MTR | OBS: wqqwddw weq  rq rwqqwr qrwr ', 'Site Transf.Banco', '221.4', 16471, '', 'Fechado', '0', '0', '0', '2016-10-11 19:11:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd2b40', '963602608', 'PT', 1, 0, 2700),
(1482192000, 'vgspedro@gmail.com', 'Demo', 1482261060, 'Golf', '999-ss @ 19:11', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '3', 'RETORNO 169/57fd2b40 | MTR | OBS: wqqwddw weq  rq rwqqwr qrwr ', 'Site Transf.Banco', '0', 16472, '', 'Aguarda', '0', '0', '0', '2016-10-11 19:11:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd2b40', '963602608', 'PT', 1, 0, 1800),
(1478390400, 'vgspedro@gmail.com', '', 1478459940, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '1', '3', '5', 'TEM RETORNO 169/57fd2deb | MTR | OBS: fd  revfrevervre r eg eg e ger', 'Site Paypal', '221.4', 16473, '', 'Aguarda', '0', '0', '0', '2016-10-11 19:22:35', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd2deb', '963602608', 'PT', 1, 0, 1800),
(1482192000, 'vgspedro@gmail.com', 'Demo', 1482265080, 'Partida', '999-ss @ 19:18', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '1', '3', '5', 'RETORNO 169/57fd2deb | MTR | OBS: fd  revfrevervre r eg eg e ger', 'Site Paypal', '0', 16474, '', 'Aguarda', '0', '0', '0', '2016-10-11 19:22:35', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '88FF77', '169/57fd2deb', '963602608', 'PT', 1, 0, 1800),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 14:57', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/5800e4f4 | PP | OBS: ocs teste ', 'Site Paypal', '0', 16602, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:00:20', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e4f4', '963602608', 'PT', 1, 0, 4200),
(1482192000, 'vgspedro@gmail.com', 'Fixo', 1482259740, 'Interzone', 'V2 @ 20:59', 'Pedro', 'Ayamonte - Spain - Ali', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/57fe96bd | PP | OBS: -/-', 'Site Paypal', '0', 16557, '', 'Aguarda', '0', '0', '0', '2016-10-12 21:02:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '37ET58', '160/57fe96bd', '963852147', 'PT', 1, 0, 4200),
(1476662400, 'sjkjk@ss.pt', 'Nuno Moreira', 1476691800, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '4', '0', 'TEM RETORNO 162/57ff4fb0 | PP | OBS: -/-', 'Site Paypal', '70', 16558, '', 'Aguarda', '0', '0', '0', '2016-10-13 10:11:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57ff4fb0', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'sjkjk@ss.pt', 'Demo', 1478416140, 'Partida', '999-ss @ 10:09', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '4', '0', 'RETORNO 162/57ff4fb0 | PP | OBS: -/-', 'Site Paypal', '0', 16559, '', 'Rejeitado', '0', '0', '0', '2016-10-13 10:11:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57ff4fb0', '963602608', 'PT', 1, 0, 3600),
(1476662400, 'vgspedro@gmail.com', 'Luis', 1476695940, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '1', '0', 'TEM RETORNO 162/57ff5fb9 | PP | OBS: obs', 'Site Paypal', '0.01', 16560, '', 'Aguarda', '0', '0', '0', '2016-10-13 11:19:37', 'Sim', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57ff5fb9', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', 'Demo', 1478420400, 'Partida', '999-ss @ 11:20', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '1', '0', 'RETORNO 162/57ff5fb9 | PP | OBS: obs', 'Site Paypal', '0', 16561, '', 'Aguarda', '0', '0', '0', '2016-10-13 11:19:37', 'Sim', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57ff5fb9', '963602608', 'PT', 1, 0, 3600),
(1476403200, '', 'Luis', 1476447900, 'Chegada', '', '', '', '', '', '2', '0', '0', '', 'Hotel', '', 16562, '', 'Iniciado', '', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '77XX88', '-/-', '', '', 1, 0, 1800),
(1476403200, 'vgspedro@gmail.com', 'Demo', 1476446040, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '4', '0', 'TEM RETORNO 162/57ff8446 | PP | OBS: e', 'Site Paypal', '70', 16563, '', 'Aguarda', '0', '0', '0', '2016-10-13 13:55:34', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57ff8446', '963602608', 'PT', 1, 0, 3600),
(1477785600, 'vgspedro@gmail.com', '', 1477821600, 'Partida', '999-ss @ 13:55', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '4', '0', 'RETORNO 162/57ff8446 | PP | OBS: e', 'Site Paypal', '0', 16564, '', 'Aguarda', '0', '0', '0', '2016-10-13 13:55:34', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57ff8446', '963602608', 'PT', 1, 0, 3600),
(1476489600, 'vgspedro@gmail.com', 'Sara', 1476532620, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Tunes - Rua cirurgiao 28', '', '1', '2', '0', 'TEM RETORNO 169/57ff84e6 | PP | OBS: nhj', 'Site Paypal', '221.4', 16565, '', 'Fechado', '0', '0', '0', '2016-10-13 13:58:14', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57ff84e6', '963602608', 'PT', 1, 0, 1800),
(1478390400, 'vgspedro@gmail.com', '', 1478431500, 'Partida', '999-ss @ 13:55', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '1', '2', '0', 'RETORNO 169/57ff84e6 | PP | OBS: nhj', 'Site Paypal', '0', 16566, '', 'Aguarda', '0', '0', '0', '2016-10-13 13:58:14', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57ff84e6', '963602608', 'PT', 1, 0, 1800),
(1476403200, 'vgspedro@gmail.com', 'Sara', 1476446940, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Albufeira - Salgados - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 162/57ff878f | PP | OBS: rd', 'Site Paypal', '40', 16567, '', 'Fechado', '0', '0', '0', '2016-10-13 14:09:35', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57ff878f', '963602608', 'PT', 1, 0, 3600),
(1478476800, 'vgspedro@ggg.pt', 'Demo', 1478515980, 'Partida', 'fdfdfd @ 13:53', 'per', 'Albufeira - Salgados - fdfdd', 'Faro Airport', '', '1', '0', '0', '162/58204f38 | MTR | OBS: fdefref('')', 'Direto', '0', 16817, '', 'Aguarda', '20', '0', '0', '2016-11-07 09:54:00', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58204f38', '96385258', 'PT', 1, 0, 3600),
(1476403200, 'vgspedro@gmail.com', 'JoÃ£o Pedro', 1476449220, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/57ff9078 | PP | OBS: f', 'Site Paypal', '0.02', 16569, '', 'Aguarda', '0', '0', '0', '2016-10-13 14:47:36', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57ff9078', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', 'Demo', 1478432280, 'Partida', '999-ss @ 14:48', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/57ff9078 | PP | OBS: f', 'Site Paypal', '0', 16570, '', 'Aguarda', '3', '0', '0', '2016-10-13 14:47:36', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'SS4444', '160/57ff9078', '963602608', 'PT', 1, 0, 4200),
(1476403200, 'vgspedro@gmail.com', 'JoÃ£o Pedro', 1476447480, 'Partida', '999-ss @ 16:28', 'pedro', 'Faro Airport - Rua cirurgiao 28', 'Ayamonte - Spain', '', '1', '1', '1', '160/57ffc280 | MTR | OBS: fsdfsdfsd rwer ', 'Direto', '0', 16572, '', 'Aguarda', '0', '0', '0', '2016-10-13 18:21:04', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57ffc280', '963602608', 'OTR', 1, 0, 4200),
(1476403200, 'vgspedro@gmail.com', 'JoÃ£o Pedro', 1476447480, 'Partida', '999-ss @ 16:28', 'pedro', 'Faro Airport - Rua cirurgiao 28', 'Ayamonte - Spain', '', '1', '1', '1', '160/57ffc2c1 | MTR | OBS: fsdfsdfsd rwer ', 'Direto', '0', 16573, '', 'Aguarda', '0', '0', '0', '2016-10-13 18:22:09', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57ffc2c1', '963602608', 'OTR', 1, 0, 4200),
(1476403200, 'vgspedro@gmail.com', 'Nuno Moreira', 1476447480, 'Partida', '999-ss @ 16:28', 'pedro', 'Faro Airport - Rua cirurgiao 28', 'Ayamonte - Spain', '', '1', '1', '1', '160/57ffc3aa | MTR | OBS: fsdfsdfsd rwer ', 'Direto', '0', 16574, '', 'Aguarda', '0', '0', '0', '2016-10-13 18:26:02', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57ffc3aa', '963602608', 'OTR', 1, 0, 4200),
(1476403200, 'vgspedro@gmail.com', 'Nuno Moreira', 1476447480, 'Partida', '999-ss @ 16:28', 'pedro', 'Faro Airport - Rua cirurgiao 28', 'Ayamonte - Spain', '', '1', '1', '1', '160/57ffc3fe | MTR | OBS: fsdfsdfsd rwer ', 'Direto', '0', 16575, '', 'Aguarda', '0', '0', '0', '2016-10-13 18:27:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/57ffc3fe', '963602608', 'OTR', 1, 0, 4200),
(1476403200, 'vgspedro@gmail.com', 'Luis', 1476463680, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '0', '0', '163/57ffc908 | TB | OBS: q', 'Site Transf.Banco', '0.02', 16576, '', 'Aguarda', '0', '0', '0', '2016-10-13 18:48:56', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/57ffc908', '963602608', 'PT', 1, 0, 9000),
(1476403200, 'vgspedro@gmail.com', 'Luis', 1476463860, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '0', '0', '163/57ffc999 | PP | OBS: -/-', 'Site Paypal', '0.02', 16577, '', 'Aguarda', '0', '0', '0', '2016-10-13 18:51:21', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/57ffc999', '963602608', 'PT', 1, 0, 9000),
(1476403200, 'vgspedro@gmail.com', 'JoÃ£o Pedro', 1476464640, 'Chegada', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/57ffcce1 | TB | OBS: y', 'Site Transf.Banco', '0.02', 16578, '', 'Aguarda', '0', '0', '0', '2016-10-13 19:05:21', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/57ffcce1', '963602608', 'PT', 1, 0, 9000),
(1476403200, 'vgspedro@gmail.com', 'JoÃ£o Pedro', 1476464820, '', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/57ffcd71 | PP | OBS: hg', 'Site Paypal', '0.02', 16579, '', 'Aguarda', '0', '0', '0', '2016-10-13 19:07:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/57ffcd71', '963602608', 'PT', 1, 0, 9000),
(1476403200, 'camiloccferreira@gmail.com', 'Sara', 1476468480, 'Interzone', '', 'oseubackoffice', 'Aljezur', 'Alte - Rua General Humberto Delgado', '', '3', '1', '0', '163/57ffd844 | MTR | OBS: Teste de reserva', 'Direto', '0', 16580, '', 'Fechado', '0.02', '0', '0', '2016-10-13 19:53:56', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/57ffd844', '289150167', 'PT', 1, 0, 9000),
(1476403200, 'mrjack@gmail.com', 'Pedro', 1476458100, '', 'il554d', 'Mr Jack', 'Faro Airport-Faro aeroport', 'Albufeira - SÃ£o Rafael- rua do lirios n2 ', 'ao pe do mini-preco', '2', '1', '0', '', 'Hotel Fixo', '', 16581, '', 'Aguarda', '50', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '0044 8755974', '', 1, 0, 2700),
(1476489600, 'vgspedro@gmail.com', '', 1476527820, 'Chegada', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/5800c64d | MTR | OBS: ss', 'Direto', '0', 16583, '', 'Aguarda', '0.02', '0', '0', '2016-10-14 12:49:33', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800c64d', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476529320, '', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/5800c964 | MTR | OBS: ss', 'Direto', '0', 16584, '', 'Aguarda', '0.02', '0', '0', '2016-10-14 13:02:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800c964', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478437260, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'TEM RETORNO 163/5800c964 | MTR | OBS: ss', 'Direto', '0', 16585, '', 'Aguarda', '0', '0', '0', '2016-10-14 13:02:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800c964', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476529320, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/5800cadc | MTR | OBS: ss', 'Direto', '0', 16586, '', 'Aguarda', '0.02', '0', '0', '2016-10-14 13:09:00', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800cadc', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478437260, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/5800cadc | MTR | OBS: ss', 'Direto', '0', 16587, '', 'Aguarda', '0', '0', '0', '2016-10-14 13:09:00', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800cadc', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476529320, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/5800cb99 | TB | OBS: ss', 'Site Transf.Banco', '0.02', 16588, '', 'Aguarda', '0', '0', '0', '2016-10-14 13:12:09', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800cb99', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478437260, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/5800cb99 | TB | OBS: ss', 'Site Transf.Banco', '0', 16589, '', 'Aguarda', '0', '0', '0', '2016-10-14 13:12:09', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800cb99', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476529320, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 163/5800cc01 | PP | OBS: ss', 'Site Paypal', '0.02', 16590, '', 'Aguarda', '0', '0', '0', '2016-10-14 13:13:53', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800cc01', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478437260, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '0', '0', 'RETORNO 163/5800cc01 | PP | OBS: ss', 'Site Paypal', '0', 16591, '', 'Aguarda', '0', '0', '0', '2016-10-14 13:13:53', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800cc01', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476534300, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '0', '0', '163/5800dcfa | TB | OBS: obs', 'Site Transf.Banco', '0.02', 16592, '', 'Aguarda', '0', '0', '0', '2016-10-14 14:26:18', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800dcfa', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476534300, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '0', '0', '163/5800dd29 | PP | OBS: obs', 'Site Paypal', '0.02', 16593, '', 'Aguarda', '0', '0', '0', '2016-10-14 14:27:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800dd29', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476534300, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '0', '0', '163/5800dd50 | MTR | OBS: obs', 'Direto', '0', 16594, '', 'Aguarda', '0.02', '0', '0', '2016-10-14 14:27:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800dd50', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476534300, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '0', '0', '163/5800dd76 | TB | OBS: obs', 'Site Transf.Banco', '0.02', 16595, '', 'Aguarda', '0', '0', '0', '2016-10-14 14:28:22', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800dd76', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476534300, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '0', '0', '163/5800dd7d | PP | OBS: obs', 'Site Paypal', '0.02', 16596, '', 'Aguarda', '0', '0', '0', '2016-10-14 14:28:29', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800dd7d', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476534300, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '0', '0', '163/5800dd96 | MTR | OBS: obs', 'Direto', '0', 16597, '', 'Aguarda', '0.02', '0', '0', '2016-10-14 14:28:54', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800dd96', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476534300, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '0', '0', '163/5800df47 | MTR | OBS: obs', 'Direto', '0', 16598, '', 'Aguarda', '0.02', '0', '0', '2016-10-14 14:36:07', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800df47', '963602608', 'PT', 1, 0, 9000),
(1476489600, 'vgspedro@gmail.com', '', 1476536220, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/5800e49a | TB | OBS: ocs teste ', 'Site Transf.Banco', '0.017', 16599, '', 'Aguarda', '0', '0', '0', '2016-10-14 14:58:50', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e49a', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478426400, 'Partida', '999-ss @ 14:57', 'pedro', 'Ayamonte - Spain - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 160/5800e49a | TB | OBS: ocs teste ', 'Site Transf.Banco', '0', 16600, '', 'Aguarda', '0', '0', '0', '2016-10-14 14:58:50', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e49a', '963602608', 'PT', 1, 0, 4200),
(1476489600, 'vgspedro@gmail.com', '', 1476536220, 'Chegada', '111-ss', 'pedro', 'Faro Airport', 'Ayamonte - Spain - Rua cirurgiao 28', '', '1', '0', '0', 'TEM RETORNO 160/5800e4f4 | PP | OBS: ocs teste ', 'Site Paypal', '0.017', 16601, '', 'Aguarda', '0', '0', '0', '2016-10-14 15:00:20', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/5800e4f4', '963602608', 'PT', 1, 0, 4200),
(1478390400, 'vgspedro@gmail.com', '', 1478458080, 'Partida', '999-ss @ 18:48', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fd25da | MTR | OBS:   dvcsdvsdvvc w efwe ', 'Site Transf.Banco', '0', 16467, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:48:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/57fd25da', '963602608', 'PT', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478454300, 'Partida', '999-ss @ 17:45', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '3', '2', '1', 'RETORNO 169/57fd1d2b | MTR | OBS: sfvsdsd  efdsf', 'Site Paypal', '0', 16451, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:11:07', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd1d2b', '963602608', 'PT', 1, 0, 1800),
(1476489600, 'vgspedro@gmail.com', '', 1476541920, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '1', '1', '163/5800fb7b | PP | OBS: x', 'Site Paypal', '0.01', 16637, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:36:27', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800fb7b', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478454300, 'Partida', '999-ss @ 17:45', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '3', '2', '1', 'RETORNO 169/57fd1d46 | MTR | OBS: sfvsdsd  efdsf', 'Site Transf.Banco', '0', 16453, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:11:34', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd1d46', '963602608', 'PT', 1, 0, 1800),
(1476489600, 'vgspedro@gmail.com', '', 1476541920, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '1', '1', '163/5800fbbd | MTR | OBS: x', 'Direto', '0', 16638, '', 'Aguarda', '0.01', '0', '0', '2016-10-14 16:37:33', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800fbbd', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478454300, 'Partida', '999-ss @ 17:45', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '3', '2', '1', 'RETORNO 169/57fd1d4b | MTR | OBS: sfvsdsd  efdsf', 'Site Paypal', '0', 16455, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:11:39', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd1d4b', '963602608', 'PT', 1, 0, 1800),
(1477785600, 'vgspedro@gmail.com', '', 1477832400, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '1', '1', 'RETORNO 163/5800fef4 | TB | OBS: teste ida e volta interzone', 'Site Transf.Banco', '0', 16645, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:51:16', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800fef4', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478454300, 'Partida', '999-ss @ 17:45', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '3', '2', '1', 'RETORNO 169/57fd1d50 | MTR | OBS: sfvsdsd  efdsf', 'Direto', '0', 16457, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:11:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd1d50', '963602608', 'PT', 1, 0, 1800),
(1477785600, 'vgspedro@gmail.com', '', 1477836000, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '1', '1', 'RETORNO 163/5800fdc0 | TB | OBS: teste ida e volta interzone', 'Site Transf.Banco', '0', 16643, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:46:08', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800fdc0', '963602608', 'PT', 1, 0, 9000),
(1479168000, 'vgspedro@gmail.com', 'Demo', 1479234240, 'Partida', '999-ss @ 18:24', 'pedro', 'Albufeira - Salgados - Rua cirurgiao 28', 'Faro Airport', '', '1', '0', '0', 'RETORNO 162/57fd20d2 | MTR | OBS:  EFFREFW FWF WE', 'Site Transf.Banco', '0', 16459, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:26:42', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '37ET58', '162/57fd20d2', '963602608', 'PT', 1, 0, 3600),
(1442275200, '', '', 1442314200, '', 'LS815', 'Mr John  Taylor', 'Aeroporto de Faro', 'Alvor, Penina Golf Resort', '', '4', '0', '0', '(PAX:4 | DN ) OBS:Golf Escapes Booking Ref:	10920', 'Golf Escapes', '0', 16827, '', 'Aguarda', '54.00', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', 'GEH-1006', '', 'UK', 0, 1006, 1800),
(1432425600, 'clairemarkey33@yahoo.co.uk', '', 1432447200, '', '6794', 'Claire Markey', 'Carvoeiro, Casa Felicidade, 16 Estrada do Algar Seco, Carvoeiro ', 'Aeroporto de Faro', '', '2', '0', '2', '(PAX:4 | DN | RETORNO) OBS:Hi, can you supply a booster seat for our 4 year old and a toddler car seat for our almost 3 year old please? Many thanks, claire ', 'Bigeye Tours', '0', 16826, '', 'Aguarda', '0', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', 'AFAT-1005', '00447803044413', 'UK', 0, 0, 1800),
(1479945600, '', 'Fixo', 1479997740, '', '', '', '', '', '', '1', '0', '0', '', '', '', 16821, '', '', '', '1.5', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '88FF77', '-/-', '', '', 1, 0, 1800),
(1479168000, '', 'Demo', 1479220140, '', '', '', '', '', '', '1', '0', '0', '', '', '', 16822, '', '', '', '1.5', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '37ET58', '-/-', '', '', 1, 0, 1800),
(1479168000, '', 'Demo', 1479168000, 'Interzone', '', '', 'Albufeira, Corcovada-', 'Albufeira-', '', '1', '0', '0', '', 'Albufeira', '25', 16823, '', '', '', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '37ET58', '-/-', '', '', 1, 0, 1800),
(1480032000, '', 'Pedro', 1480039200, 'Interzone', '', '', 'Albufeira-', 'Albufeira, Guia-', '', '1', '0', '0', '', 'Site Paypal', '', 16824, '', '', '', '12', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '45FF45', '-/-', '', '', 1, 0, 1800),
(1478131200, 'luis@gmail.com', '', 1478192400, 'Chegada', 'XZD5789', 'LuÃ­s Mascaranhas', 'Faro Airport', 'Albufeira - Salgados - Hotel Mar Sol', '', '2', '1', '1', '162/5817a4b2 | MTR | OBS: Preciso de uma confirmaÃ§Ã£o', 'Direto', '0', 16814, '', 'Aguarda', '16', '0', '0', '2016-10-31 20:08:18', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5817a4b2', '123456789', 'BR', 1, 0, 3600),
(1477785600, 'j@j.com', '', 1477846800, 'Interzone', '', 'Joseph', 'Albufeira-Hotel Xpto', 'PortimÃ£o-Azul', 'teste', '4', '0', '0', 'teste', 'directo', '', 16812, '', 'Aguarda', '55', '1.5', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '123456789', 'Portugal', 1, 0, 3000),
(1477785600, '', 'Pedro', 1477807620, 'Chegada', '', 'Teteste', '', '', '', '6', '0', '0', '', 'Site Motorista', '', 16811, '', 'Aguarda', '12', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', 1, 0, 1800),
(1477612800, '', '', 1477664700, 'Chegada', 'FR4071', 'GUALTER FERNANDES', 'Faro Airport-AERO', 'Albufeira-HOTEL MONTECHORO', '', '2', '1', '1', 'MUITA BAGAGEM', 'TEE TIMES', '0', 16810, 'FILE 12100', 'Aguarda', '', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', 'FILE 121000', '', '', 1, 0, 1800),
(1477612800, 'vgspedro@gmail.com', '', 1477678920, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - ali', '', '1', '0', '0', '163/58135f53 | PP | OBS: ew', 'Site Paypal', '104.8', 16809, '', 'Aguarda', '0', '0', '0', '2016-10-28 15:23:15', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58135f53', '968527412', 'LX', 1, 0, 9000),
(1478044800, 'suporte@oseubackoffice.com', 'Demo', 1478051400, 'Chegada', 'XZD5789', 'Marcos Mendes', 'Faro Airport - -/-', 'Ayamonte - Spain', '', '10', '0', '0', 'RETORNO 160/581357c3 | PP | OBS:', 'Site Paypal', '35', 16808, '', 'Rejeitado', '0', '0', '0', '2016-10-28 14:50:59', 'Sim', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/581357c3', '333333333333333', 'LX', 1, 0, 4200),
(1477612800, 'suporte@oseubackoffice.com', '', 1477676940, 'Partida', '66666666666666', 'ggggggggggg', 'Ayamonte - Spain', 'Faro Airport - -/-', '', '10', '0', '0', 'TEM RETORNO 160/581357c3 | PP | OBS: cccccccccccccccccccccccc', 'Site Paypal', '1886.4', 16807, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:50:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '160/581357c3', '333333333333333', 'LX', 1, 0, 4200),
(1477612800, 'suporte@oseubackoffice.com', '', 1477667880, 'Partida', '99999999999999 @ 18:48', 'ppppppppppppppp', 'Carvoeiro - -/-', 'Faro Airport', '', '1', '0', '0', '180/58135767 | PP | OBS: jjjjjjjjjjjjjjjjjj', 'Site Paypal', '2.8296', 16806, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:49:27', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '180/58135767', '5555555555555', '-/-', 1, 0, 1800);
INSERT INTO `excel` (`data_servico`, `email`, `staff`, `hrs`, `servico`, `voo`, `nome_cl`, `local_recolha`, `local_entrega`, `ponto_referencia`, `px`, `cr`, `bebe`, `obs`, `operador`, `cobrar_operador`, `id`, `ticket`, `estado`, `cobrar_direto`, `cmx_st`, `cmx_op`, `data_criacao`, `rec_ope`, `rec_staf`, `pag_ope`, `pag_staf`, `matricula`, `referencia`, `telefone`, `pais`, `criado_direto`, `nid`, `end`) VALUES
(1477785600, 'suporte@oseubackoffice.com', '', 1477825200, 'Interzone', '', 'ddddddddddd', 'Aljezur - -/-', 'Alte', '', '2', '3', '3', 'RETORNO 163/5813571b | PP | OBS: nnnnnnnnnnnnnnnnnnnnnn', 'Site Paypal', '0', 16805, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:48:11', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5813571b', '00000000000', 'MCB', 1, 0, 9000),
(1477612800, 'suporte@oseubackoffice.com', '', 1477676820, 'Interzone', '', 'ddddddddddd', 'Alte', 'Aljezur - -/-', '', '2', '3', '3', 'TEM RETORNO 163/5813571b | PP | OBS: nnnnnnnnnnnnnnnnnnnnnn', 'Site Paypal', '419.2', 16804, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:48:11', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5813571b', '00000000000', 'MCB', 1, 0, 9000),
(1477612800, 'suporte@oseubackoffice.com', '', 1477676700, 'Chegada', '666666666666', 'wwwwwwwwwwwww', 'Faro Airport', 'Albufeira - Salgados - -/-', '', '3', '1', '0', '162/581356c1 | PP | OBS: ttttttttttttttttttttttttttttttttttt', 'Site Paypal', '18.864', 16803, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:46:41', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/581356c1', '1111111111111111', 'PL', 1, 0, 3600),
(1477612800, 'suporte@oseubackoffice.com', '', 1477676640, 'Chegada', 'uuuuuuuuuuuuuuuu', 'rrrrrrrrrrrrr', 'Faro Airport', 'Albufeira - Salgados - -/-', '', '6', '3', '0', '162/58135679 | PP | OBS: jjjjjjjjjjjjjjjjjjj', 'Site Paypal', '2096', 16802, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:45:29', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/58135679', '7777777777777', 'JP', 1, 0, 3600),
(1477612800, 'vgspedro@gmail.com', '', 1477665900, 'Partida', '12we @ 18:45', 'pedro', 'Albufeira - Salgados - aqqiu', 'Faro Airport', '', '1', '0', '0', '162/5813566a | PP | OBS: sasa', 'Site Paypal', '20.96', 16801, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:45:14', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5813566a', '968527412', 'AST', 1, 0, 3600),
(1477612800, 'suporte@oseubackoffice.com', '', 1477676580, 'Interzone', '', 'nnnnnnnnnnnnnn', 'Aljezur', 'Alte - -/-', '', '2', '2', '0', '163/58135627 | PP | OBS: bbbbbbbbbbbbbbbbbbbbbbbbb', 'Site Paypal', '104.8', 16800, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:44:07', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58135627', '4444444444', 'FR', 1, 0, 9000),
(1477612800, 'suporte@oseubackoffice.com', '', 1477676520, 'Interzone', '', 'mmmmmmmmmmmmm', 'Aljezur', 'Alte - -/-', '', '5', '2', '0', '163/581355f6 | PP | OBS: ffffffffffffffffffffffff', 'Site Paypal', '209.6', 16799, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:43:18', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/581355f6', '666666666', 'BUL', 1, 0, 9000),
(1477612800, 'suporte@oseubackoffice.com', '', 1477665660, 'Partida', 'yyyyyyyyyyyyyy @ 18:41', 'iiiiiiiiiiiiiiiiii', 'Albufeira - Salgados - -/-', 'Faro Airport', '', '10', '0', '2', '162/581355b4 | PP | OBS: mmmmmmmmmmmmmmmmmmmmmm', 'Site Paypal', '1886.4', 16798, '', 'Aguarda', '0', '0', '0', '2016-10-28 14:42:12', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/581355b4', '000000000000', 'DE', 1, 0, 3600),
(1477785600, 'vgspedro@gmail.com', '', 1477828800, 'Chegada', 'ie999 @ 19:02', 'Pedro', 'Faro Airport - wewe wewe', 'Albufeira - Salgados', '', '1', '0', '0', 'RETORNO 162/580a5809 | TB | OBS: trtrhrthr tr yrty tr', 'Site Transf.Banco', '0', 16777, '', 'Aguarda', '0', '0', '0', '2016-10-21 19:01:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/580a5809', '8969638526', 'BEL', 1, 0, 3600),
(1477008000, 'vgspedro@gmail.com', '', 1477072860, 'Partida', 'ei', 'Pedro', 'Albufeira - Salgados', 'Faro Airport - rua 5', '', '1', '0', '0', 'TEM RETORNO 162/580a5809 | TB | OBS: trtrhrthr tr yrty tr', 'Site Transf.Banco', '40', 16776, '', 'Aguarda', '0', '0', '0', '2016-10-21 19:01:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/580a5809', '8969638526', 'BEL', 1, 0, 3600),
(1477008000, 'geral@oseubackoffice.com', 'Sara', 1477053960, 'Chegada', 'uuuuuuuuuuuuuuuu @ 16:46', 'hhhhhhhhhhhhhhhh', 'Faro Airport - -/-', 'Albufeira - Salgados', '', '1', '0', '0', 'RETORNO 162/5808e6dc | TB | OBS: cccccccccccccccc', 'Site Transf.Banco', '0', 16775, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:46:36', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808e6dc', '00000000000000', '-/-', 1, 0, 3600),
(1478390400, 'vgspedro@gmail.com', '', 1478438880, 'Interzone', '', 'pedro', 'Alte - aqqiu', 'Aljezur', '', '1', '0', '0', 'RETORNO 163/58134825 | PP | OBS: rf', 'Site Paypal', '0', 16782, '', 'Aguarda', '0', '0', '0', '2016-10-28 13:44:21', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/58134825', '968527412', 'BEL', 1, 0, 9000),
(1476921600, 'geral@oseubackoffice.com', '', 1476985500, 'Partida', 'kkkkkkkkkkkkkkkkk', 'hhhhhhhhhhhhhhhh', 'Albufeira - Salgados', 'Faro Airport - -/-', '', '1', '0', '0', 'TEM RETORNO 162/5808e6dc | TB | OBS: cccccccccccccccc', 'Site Transf.Banco', '40', 16774, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:46:36', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '162/5808e6dc', '00000000000000', '-/-', 1, 0, 3600),
(1476921600, 'geral@oseubackoffice.com', '', 1476985140, 'Interzone', '', 'iiiiiiiiiiiiiiiiiiiiii', 'Aljezur', 'Alte - -/-', '', '7', '1', '0', 'TEM RETORNO 163/5808e599 | PP | OBS: ffffffffffffffff', 'Site Paypal', '360', 16772, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:41:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808e599', '22222222222222', '-/-', 1, 0, 9000),
(1477094400, 'geral@oseubackoffice.com', 'Pedro', 1477150620, 'Interzone', '', 'tttttttttttttt', 'Alte - -/-', 'Aljezur', '', '4', '0', '0', 'RETORNO 163/5808e4e3 | TB | OBS: ffffffffffffffffffffffff', 'Site Transf.Banco', '0', 16771, '', 'Aguarda', '0', '0', '0', '2016-10-20 16:38:11', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5808e4e3', '2222222222', '-/-', 1, 0, 9000),
(1476576000, 'vgspedro@gmail.com', '', 1476629040, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '1', '1', 'TEM RETORNO 163/5800fdc0 | TB | OBS: teste ida e volta interzone', 'Site Transf.Banco', '0.02', 16642, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:46:08', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800fdc0', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478454300, 'Partida', '999-ss @ 17:45', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '3', '2', '1', 'RETORNO 169/57fd1a6a | MTR | OBS: sfvsdsd  efdsf', 'Site Transf.Banco', '0', 16439, '', 'Aguarda', '0', '0', '0', '2016-10-11 17:59:22', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd1a6a', '963602608', 'PT', 1, 0, 1800),
(1477785600, 'vgspedro@gmail.com', '', 1477839600, 'Interzone', '', 'pedro', 'Aljezur - Rua cirurgiao 28', 'Alte', '', '1', '1', '1', 'RETORNO 163/5800ff2a | PP | OBS: teste ida e volta interzone', 'Site Paypal', '0', 16647, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:52:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800ff2a', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478454300, 'Partida', '999-ss @ 17:45', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '3', '2', '1', 'RETORNO 169/57fd1acb | MTR | OBS: sfvsdsd  efdsf', 'Site Transf.Banco', '0', 16441, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:00:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd1acb', '963602608', 'PT', 1, 0, 1800),
(1476576000, 'vgspedro@gmail.com', '', 1476629040, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '1', '1', 'TEM RETORNO 163/5800ff2a | PP | OBS: teste ida e volta interzone', 'Site Paypal', '0.02', 16646, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:52:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800ff2a', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478454300, 'Partida', '999-ss @ 17:45', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '3', '2', '1', 'RETORNO 169/57fd1b2e | MTR | OBS: sfvsdsd  efdsf', 'Site Transf.Banco', '0', 16443, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:02:38', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd1b2e', '963602608', 'PT', 1, 0, 1800),
(1476489600, 'vgspedro@gmail.com', '', 1476541920, 'Interzone', '', 'pedro', 'Aljezur', 'Alte - Rua cirurgiao 28', '', '1', '1', '1', '163/5800fc30 | PP | OBS: x', 'Site Paypal', '0.01', 16640, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:39:28', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800fc30', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478454300, 'Partida', '999-ss @ 17:45', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '3', '2', '1', 'RETORNO 169/57fd1be7 | MTR | OBS: sfvsdsd  efdsf', 'Site Transf.Banco', '0', 16445, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:05:43', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd1be7', '963602608', 'PT', 1, 0, 1800),
(1478390400, 'vgspedro@gmail.com', '', 1478454300, 'Partida', '999-ss @ 17:45', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '3', '2', '1', 'RETORNO 169/57fd1c35 | MTR | OBS: sfvsdsd  efdsf', 'Direto', '0', 16447, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:07:01', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd1c35', '963602608', 'PT', 1, 0, 1800),
(1476576000, 'vgspedro@gmail.com', '', 1476629040, 'Interzone', '', 'pedro', 'Alte', 'Aljezur - Rua cirurgiao 28', '', '1', '1', '1', 'TEM RETORNO 163/5800fef4 | TB | OBS: teste ida e volta interzone', 'Site Transf.Banco', '0.02', 16644, '', 'Aguarda', '0', '0', '0', '2016-10-14 16:51:16', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '163/5800fef4', '963602608', 'PT', 1, 0, 9000),
(1478390400, 'vgspedro@gmail.com', '', 1478454300, 'Partida', '999-ss @ 17:45', 'pedro', 'Tunes - Rua cirurgiao 28', 'Faro Airport', '', '3', '2', '1', 'RETORNO 169/57fd1c3e | MTR | OBS: sfvsdsd  efdsf', 'Site Paypal', '0', 16449, '', 'Aguarda', '0', '0', '0', '2016-10-11 18:07:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '169/57fd1c3e', '963602608', 'PT', 1, 0, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `locais`
--

CREATE TABLE IF NOT EXISTS `locais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(50) NOT NULL,
  `local_fim` varchar(50) NOT NULL,
  `visivel` varchar(5) NOT NULL DEFAULT '0',
  `duracao` int(11) NOT NULL DEFAULT '1800',
  `tipo` int(10) NOT NULL,
  `cat` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=223 ;

--
-- Dumping data for table `locais`
--

INSERT INTO `locais` (`id`, `local`, `local_fim`, `visivel`, `duracao`, `tipo`, `cat`) VALUES
(216, 'Albufeira', 'Almancil', '1', 1800, 1, 31),
(217, 'Albufeira, Corcovada', 'Alcoutim', '1', 1800, 1, 31),
(218, 'Vilamoura', 'Albufeira', '1', 1800, 1, 28),
(219, 'Zambujeira do Mar', 'Albufeira', '1', 1800, 1, 28),
(220, 'Albufeira', 'Vilamoura', '1', 1800, 1, 28),
(221, 'Albufeira', 'Algoz', '1', 1800, 1, 32),
(222, 'Albufeira, Montechoro', 'Alte', '1', 1800, 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `logfile`
--

CREATE TABLE IF NOT EXISTS `logfile` (
  `lat` float NOT NULL,
  `datetime` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff` varchar(50) NOT NULL,
  `servico` int(11) NOT NULL,
  `accao` varchar(25) NOT NULL,
  `causa` varchar(25) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `hora` varchar(12) NOT NULL,
  `lng` float NOT NULL,
  `matricula` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1059 ;

--
-- Dumping data for table `logfile`
--

INSERT INTO `logfile` (`lat`, `datetime`, `id`, `staff`, `servico`, `accao`, `causa`, `tipo`, `hora`, `lng`, `matricula`) VALUES
(37.087, 1482253874, 1058, 'Demo', 16527, 'Aceite', '', 'Chegada', '17:11:15', -8.11021, '37ET58'),
(37.0868, 1482253828, 1057, 'Demo', 0, 'Recebido', '', '', '17:10:29', -8.11019, '');

-- --------------------------------------------------------

--
-- Table structure for table `operador`
--

CREATE TABLE IF NOT EXISTS `operador` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `responsavel` varchar(25) NOT NULL,
  `comissao` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `utilizador` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gestao` varchar(10) NOT NULL DEFAULT 'false',
  `rel_diario` varchar(10) NOT NULL DEFAULT 'false',
  `rel_semana` varchar(10) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `operador`
--

INSERT INTO `operador` (`id`, `nome`, `responsavel`, `comissao`, `email`, `tipo`, `utilizador`, `tel`, `password`, `gestao`, `rel_diario`, `rel_semana`) VALUES
(25, 'Site Paypal', 'Paypal', '', 'paypal@paypal.com', 'Tabela Percentagem', 'Asf', '000000000', '$GAiOTgdz3prA', 'false', 'false', 'false'),
(26, 'Site Transf.Banc', 'Transf.Banc', '1.45', 'companhia@companhia.com', 'Fixo', 'Fixo', '0000000000', '$G.RaWkNu.lXA', 'false', 'checked', 'false'),
(28, 'Direto', 'Dr.JoÃ£o', '', 'joao@directo.pt', 'Tabela', 'joao', '967525252', '$GpQ.YnYfwwTU', 'checked', 'false', 'checked'),
(29, 'Tabela', 'tabela', '', 'fdgf@drff.pt', 'Tabela', 'tabela', '45645645456456', '$GdCQUkUyFM2.', 'false', 'false', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `operador_percentagem`
--

CREATE TABLE IF NOT EXISTS `operador_percentagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `valor` decimal(3,2) NOT NULL DEFAULT '0.00',
  `id_operador` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `operador_precos`
--

CREATE TABLE IF NOT EXISTS `operador_precos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `valor` varchar(25) NOT NULL DEFAULT '0',
  `prod_id` int(10) NOT NULL,
  `id_label` int(10) NOT NULL,
  `id_operador` int(10) NOT NULL,
  `id_categoria` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1197 ;

--
-- Dumping data for table `operador_precos`
--

INSERT INTO `operador_precos` (`id`, `valor`, `prod_id`, `id_label`, `id_operador`, `id_categoria`) VALUES
(1188, '0.00', 222, 91, 28, 32),
(1145, '0.00', 219, 89, 29, 28),
(1172, '270.00', 219, 85, 25, 28),
(1173, '0.00', 219, 89, 25, 28),
(1174, '22.50', 220, 83, 25, 28),
(1175, '31.50', 220, 85, 25, 28),
(1176, '40.50', 220, 89, 25, 28),
(1158, '56.00', 218, 83, 28, 28),
(1159, '112.00', 218, 85, 28, 28),
(1144, '270.00', 219, 85, 29, 28),
(1143, '180.00', 219, 83, 29, 28),
(1142, '0.00', 218, 89, 29, 28),
(1167, '29.50', 217, 87, 28, 31),
(1166, '22.50', 216, 87, 28, 31),
(1141, '90.00', 218, 85, 29, 28),
(1162, '336.00', 219, 85, 28, 28),
(1163, '0.00', 219, 89, 28, 28),
(1151, '55.00', 217, 87, 29, 31),
(1150, '41.50', 216, 87, 29, 31),
(1140, '45.00', 218, 83, 29, 28),
(1171, '180.00', 219, 83, 25, 28),
(1170, '0.00', 218, 89, 25, 28),
(1169, '90.00', 218, 85, 25, 28),
(1168, '45.00', 218, 83, 25, 28),
(1161, '224.00', 219, 83, 28, 28),
(1160, '0.00', 218, 89, 28, 28),
(1186, '1.00', 221, 91, 28, 32),
(1187, '1.00', 222, 90, 28, 32),
(1185, '0.50', 221, 90, 28, 32),
(1196, '0.00', 222, 91, 25, 32),
(1195, '0.50', 222, 90, 25, 32),
(1194, '0.50', 221, 91, 25, 32),
(1193, '0.50', 221, 90, 25, 32);

-- --------------------------------------------------------

--
-- Table structure for table `operador_tab_calc`
--

CREATE TABLE IF NOT EXISTS `operador_tab_calc` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `valor` varchar(6) DEFAULT '0',
  `id_operador` int(6) NOT NULL,
  `id_categoria` int(6) NOT NULL,
  `count_prods` int(6) NOT NULL,
  `count_labels` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `operador_tab_calc`
--

INSERT INTO `operador_tab_calc` (`id`, `valor`, `id_operador`, `id_categoria`, `count_prods`, `count_labels`) VALUES
(84, '0.25', 25, 32, 2, 2),
(76, '-0.1', 29, 28, 2, 3),
(83, '-0.5', 28, 32, 2, 2),
(82, '-0.1', 25, 28, 3, 3),
(66, '-0.1', 29, 28, 2, 2),
(61, '0.25', 29, 31, 2, 1),
(81, '0.12', 28, 28, 2, 3),
(80, '-0.1', 28, 31, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `txnid` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_general_mysql500_ci NOT NULL,
  `itemid` varchar(25) COLLATE utf8_general_mysql500_ci NOT NULL,
  `createdtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(25) NOT NULL,
  `m10` varchar(10) NOT NULL DEFAULT 'false',
  `m11` varchar(10) NOT NULL DEFAULT 'false',
  `m12` varchar(10) NOT NULL DEFAULT 'false',
  `m13` varchar(10) NOT NULL DEFAULT 'false',
  `m14` varchar(10) NOT NULL DEFAULT 'false',
  `m20` varchar(10) NOT NULL DEFAULT 'false',
  `m21` varchar(10) NOT NULL DEFAULT 'false',
  `m22` varchar(10) NOT NULL DEFAULT 'false',
  `m23` varchar(10) NOT NULL DEFAULT 'false',
  `m24` varchar(10) NOT NULL DEFAULT 'false',
  `m25` varchar(10) NOT NULL DEFAULT 'false',
  `m30` varchar(10) NOT NULL DEFAULT 'false',
  `m31` varchar(10) NOT NULL DEFAULT 'false',
  `m32` varchar(10) NOT NULL DEFAULT 'false',
  `m33` varchar(10) NOT NULL DEFAULT 'false',
  `m34` varchar(10) NOT NULL DEFAULT 'false',
  `m40` varchar(10) NOT NULL DEFAULT 'false',
  `m41` varchar(10) NOT NULL DEFAULT 'false',
  `m42` varchar(10) NOT NULL DEFAULT 'false',
  `m43` varchar(10) NOT NULL DEFAULT 'false',
  `m50` varchar(10) NOT NULL DEFAULT 'false',
  `m51` varchar(10) NOT NULL DEFAULT 'false',
  `m52` varchar(10) NOT NULL DEFAULT 'false',
  `m53` varchar(10) NOT NULL DEFAULT 'false',
  `m60` varchar(10) NOT NULL DEFAULT 'false',
  `m61` varchar(10) NOT NULL DEFAULT 'false',
  `m62` varchar(10) NOT NULL DEFAULT 'false',
  `m63` varchar(10) NOT NULL DEFAULT 'false',
  `m70` varchar(10) NOT NULL DEFAULT 'false',
  `m71` varchar(10) NOT NULL DEFAULT 'false',
  `m72` varchar(10) NOT NULL DEFAULT 'false',
  `m73` varchar(10) NOT NULL DEFAULT 'false',
  `m80` varchar(10) NOT NULL DEFAULT 'false',
  `m81` varchar(10) NOT NULL DEFAULT 'false',
  `m82` varchar(10) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `privilegios`
--

INSERT INTO `privilegios` (`id`, `tipo`, `m10`, `m11`, `m12`, `m13`, `m14`, `m20`, `m21`, `m22`, `m23`, `m24`, `m25`, `m30`, `m31`, `m32`, `m33`, `m34`, `m40`, `m41`, `m42`, `m43`, `m50`, `m51`, `m52`, `m53`, `m60`, `m61`, `m62`, `m63`, `m70`, `m71`, `m72`, `m73`, `m80`, `m81`, `m82`) VALUES
(1, 'SuperUser', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked1', 'checked1', 'checked', 'checked', 'checked', 'checked1', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked1', 'checked1', 'checked', 'checked', 'checked'),
(2, 'Administrator', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked'),
(3, 'GestorPlus', 'checked', 'checked', 'checked', 'false', 'false', 'checked', 'checked', 'false', 'checked', 'checked', 'false', 'checked', 'false', 'false', 'false', 'false', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'false', 'false', 'false', 'false', 'false', 'false', 'checked', 'false', 'false', 'checked', 'false', 'false'),
(4, 'Gestor', 'checked', 'false', 'checked', 'checked', 'false', 'false', 'checked', 'checked', 'checked', 'false', 'false', 'checked', 'false', 'false', 'false', 'false', 'checked', 'checked', 'checked', 'false', 'false', 'checked', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'checked', 'false', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `pr_admin`
--

CREATE TABLE IF NOT EXISTS `pr_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `equipa` varchar(25) NOT NULL,
  `lat` varchar(25) NOT NULL,
  `sessao` int(11) NOT NULL,
  `comissao` varchar(6) NOT NULL,
  `vencimento` varchar(6) NOT NULL,
  `lng` varchar(25) NOT NULL,
  `tipo` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `pr_admin`
--

INSERT INTO `pr_admin` (`id`, `name`, `email`, `password`, `equipa`, `lat`, `sessao`, `comissao`, `vencimento`, `lng`, `tipo`) VALUES
(3, '', 'vgspedro@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Demo', '', 0, '3', '601', '', 'Percentagem'),
(53, '', 'fernando.grave@everywhere.pt', 'e28bab7890c85f1ced15a49da5b3461d', 'Fixo', '', 0, '10', '600', '', 'Fixo'),
(54, '', 'pedro@pedro.pt', 'c6cc8094c2dc07b700ffcc36d64e2138', 'Pedro', '', 0, '15', '500', '', 'Percentagem');

-- --------------------------------------------------------

--
-- Table structure for table `recolha_operadores`
--

CREATE TABLE IF NOT EXISTS `recolha_operadores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `local_recolha` varchar(50) NOT NULL,
  `operador_nome` varchar(50) NOT NULL,
  `id_operador` int(10) NOT NULL,
  `pt_ref_recolha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `recolha_operadores`
--

INSERT INTO `recolha_operadores` (`id`, `local_recolha`, `operador_nome`, `id_operador`, `pt_ref_recolha`) VALUES
(12, '37, -8', 'Direto', 28, 'Quintal');

-- --------------------------------------------------------

--
-- Table structure for table `su_sudo`
--

CREATE TABLE IF NOT EXISTS `su_sudo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `privilegios` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `no_del` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `su_sudo`
--

INSERT INTO `su_sudo` (`id`, `nome`, `pass`, `privilegios`, `email`, `tipo`, `no_del`) VALUES
(1, 'Pedro', 'c6cc8094c2dc07b700ffcc36d64e2138', '3', 'vgspedro@gmail.com', 'SuperUser', '1'),
(2, 'Ferreira', 'a0099ac6dd1c32b1524709810a5c9b5e', '3', 'geral@oseubackoffice.com', 'SuperUser', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_servico`
--

CREATE TABLE IF NOT EXISTS `tipo_servico` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `servico` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tipo_servico`
--

INSERT INTO `tipo_servico` (`id`, `servico`) VALUES
(1, 'Chegada'),
(2, 'Partida'),
(3, 'Interzone'),
(15, 'Golf');

-- --------------------------------------------------------

--
-- Table structure for table `veiculos`
--

CREATE TABLE IF NOT EXISTS `veiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(10) NOT NULL,
  `marca` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `veiculos`
--

INSERT INTO `veiculos` (`id`, `matricula`, `marca`) VALUES
(18, '37ET58', 'Ford Mondeo'),
(6, '88FF77', 'Seat Alhambra'),
(19, '77XX88', 'Dacia Sandero'),
(16, '45FF45', 'Renault Megane'),
(17, '85JJ85', 'Mercedes E300'),
(20, '21TR12', 'Audi A4 Avant'),
(21, '54CZ90', 'Volkwagen Sharan'),
(22, 'QA7185', 'Volvo V70'),
(23, '45ZG02', 'Bmw 535d'),
(24, '71TR64', 'Skoda Fabia');

-- --------------------------------------------------------

--
-- Table structure for table `zonas_operadores`
--

CREATE TABLE IF NOT EXISTS `zonas_operadores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_operador` int(10) NOT NULL,
  `id_prod` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
