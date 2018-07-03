-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2018 às 20:23
-- Versão do servidor: 5.6.17
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oa1uszym_escala2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
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
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id`, `nome`, `pass`, `privilegios`, `email`, `tipo`, `no_del`) VALUES
(25, 'Gestor', 'a55607442fca264cf37e935503d646c2', '0', 'vgvgs@gmail.com', 'Gestor', '0'),
(24, 'Admin', '21232f297a57a5a743894a0e4a801fc3', '2', 'pedro_viegas@oseubackoffice.com', 'Administrator', '1'),
(26, 'Gestorplus', 'd41d8cd98f00b204e9800998ecf8427e', '1', 'vgvgs@gmail.com', 'GestorPlus', '0'),
(32, 'Demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '2', 'demo@demo.pt', 'Administrator', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bugs`
--

CREATE TABLE IF NOT EXISTS `bugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Extraindo dados da tabela `bugs`
--

INSERT INTO `bugs` (`id`, `link`, `descricao`, `referencia`) VALUES
(32, 'mas', 'aaa', '59d5f1fc/36'),
(33, 'aa', 'aaa', '59d5f238/36'),
(34, 'pedro', 'aaa', '59d5f2b0/36'),
(35, 'mas', 'aaa', '59d5f328/36'),
(36, 'mma', 'aaa', '59d5f364/36'),
(37, 'easy', 'aaaa', '59d5f3a0/36'),
(38, 'ma', 'aa', '59d5f3dc/36'),
(39, 'm', 'a', '59d5f454/36'),
(40, 'joo', 'aaa', '59d5f454/36'),
(41, 'aaaa', 'aaaa', '59d5f508/36'),
(42, 'mas', 'aaaa', '59d5f508/36'),
(43, 'link1', 'admin1', '59d5f508/36'),
(44, 'llll', 'aaa', '59d5f508/36'),
(45, 'aa', 'aa', '59d5fc88/36'),
(46, 'aa', 'aaa', '59d5fd3c/36'),
(47, 'aaa', 'aa', '59d5fe2c/36'),
(48, 'aa', '<aaa', '59d5fea4/36'),
(49, 'aa', 'aaaa', '59d5fea4/36'),
(50, 'aaa', 'sss', '59d5ff94/35'),
(51, 'aaa', 'aaa', '59d60084/36'),
(52, 'Link1', 'aaaa', '59d62028/36'),
(53, 'Link2', 'bbbb', '59d62028/36'),
(54, 'Ln', '1', '59d620a0/36'),
(55, 'Ln2', '2', '59d620a0/36'),
(56, 'Ln4', '4', '59d620a0/36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_prods`
--

CREATE TABLE IF NOT EXISTS `categoria_prods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `visivel` varchar(6) NOT NULL DEFAULT '0',
  `tipo` int(10) NOT NULL,
  `favorito` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `categoria_prods`
--

INSERT INTO `categoria_prods` (`id`, `nome`, `visivel`, `tipo`, `favorito`) VALUES
(40, 'Transfers', '1', 1, 0),
(41, 'Golf', '1', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe_precos`
--

CREATE TABLE IF NOT EXISTS `classe_precos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `valor` varchar(25) NOT NULL DEFAULT '0',
  `prod_id` int(10) NOT NULL,
  `id_label` int(10) NOT NULL,
  `tipo` int(10) NOT NULL,
  `cat` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=774 ;

--
-- Extraindo dados da tabela `classe_precos`
--

INSERT INTO `classe_precos` (`id`, `valor`, `prod_id`, `id_label`, `tipo`, `cat`) VALUES
(771, '67', 244, 103, 1, 40),
(770, '56', 244, 102, 1, 40),
(769, '47', 244, 101, 1, 40),
(768, '55', 243, 103, 1, 40),
(767, '44', 243, 102, 1, 40),
(766, '33', 243, 101, 1, 40),
(765, '67', 242, 103, 1, 40),
(764, '54', 242, 102, 1, 40),
(763, '43', 242, 101, 1, 40),
(762, '41', 241, 103, 1, 40),
(761, '32', 241, 102, 1, 40),
(760, '21', 241, 101, 1, 40),
(759, '46', 240, 103, 1, 40),
(758, '34', 240, 102, 1, 40),
(757, '20', 240, 101, 1, 40),
(772, '200', 245, 104, 1, 41),
(773, '400', 245, 105, 1, 41);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe_prods`
--

CREATE TABLE IF NOT EXISTS `classe_prods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `tipo` int(10) NOT NULL,
  `min` int(3) NOT NULL DEFAULT '0',
  `max` int(3) NOT NULL DEFAULT '0',
  `cat` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Extraindo dados da tabela `classe_prods`
--

INSERT INTO `classe_prods` (`id`, `nome`, `tipo`, `min`, `max`, `cat`) VALUES
(101, '1-4 Pax', 1, 1, 4, 40),
(102, '5-8 Pax', 1, 5, 8, 40),
(103, '9-12 Pax', 1, 9, 12, 40),
(104, 'Golf110', 1, 1, 10, 41),
(105, 'Golf1120', 1, 11, 20, 41);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `quarto` int(10) unsigned NOT NULL,
  `pais` varchar(50) CHARACTER SET utf8 NOT NULL,
  `operador_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `email`, `nome`, `telefone`, `quarto`, `pais`, `operador_id`) VALUES
(5, '11knum15@gmail.com', 'Rui', '963 354 089', 1111, 'pt', 28),
(2, 'r.peleira@hotmail.com', 'Joao', '963 354 089', 1234, 'pt', 28),
(3, 'vgspedro@gmail.com', 'teste', '456 456 564 65', 123, 'pt', 28),
(4, 'manuel.ferreira@oseubackoffice.com', 'Manuel Ferreira', '289 150 167', 305, 'pt', 28),
(6, 'ricardo@oseubackoffice.com', 'Ricky M', '963 354 089', 1111, 'pt', 28),
(7, 'info@wowchauffers.com', 'valter', '963 963 963', 0, 'pt', 28),
(8, 'mpeleira@cmo.pt', 'Maria de Fatiam', '964228092', 0, 'PT', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes_assistencia`
--

CREATE TABLE IF NOT EXISTS `clientes_assistencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `nif` int(9) NOT NULL,
  `responsavel` varchar(255) NOT NULL,
  `tel1` int(15) NOT NULL,
  `tel2` int(15) NOT NULL,
  `tel3` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dominio` varchar(255) NOT NULL,
  `perfil` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Extraindo dados da tabela `clientes_assistencia`
--

INSERT INTO `clientes_assistencia` (`id`, `data`, `categoria`, `cliente`, `nif`, `responsavel`, `tel1`, `tel2`, `tel3`, `email`, `dominio`, `perfil`) VALUES
(34, 1500422400, 'Web Design', 'Wow Chaffeurs 111', 220112990, 'Valter Matos', 988123000, 999111222, 111222333, 'valter@wowchaffeurs.pt', 'transfergest.com', ''),
(35, 1498348800, 'Design GrÃ¡fico', 'TravelLine', 503079502, 'Maria de Fatima', 112444555, 111222333, 0, 'joao@travels.pt', 'transfergest.com', ''),
(36, 1499558400, 'Transfergest Pro', 'Aqua Go Transfers', 137749406, 'Helio Cabral', 912009176, 0, 0, 'heliocabral@gmail.com', 'transfergest.com', 'Joao Pedro\n\nPedro Fresco'),
(37, 1495843200, 'Transfergest Pro', 'Johan', 111222333, 'Joao Carvalho', 963354089, 0, 0, 'joaocarvalho@hotmail.com', 'transfergest.com', 'Wall Street');

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigo_promo`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Extraindo dados da tabela `codigo_promo`
--

INSERT INTO `codigo_promo` (`id`, `nome`, `percentagem`, `visivel`, `ativo`, `data_ini`, `data_fim`) VALUES
(29, 'OSB4Q', 21, 0, 1, 1488326400, 1503100800),
(30, 'OSB08Z', 20, 0, 0, 1477958400, 1522540800),
(43, 'ASR', 10, 0, 0, 1487203200, 1487462400),
(42, 'OSB453', 33, 0, 0, 1478044800, 1478390400),
(40, 'ATARI', 12, 0, 0, 1477872000, 1485648000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissoes_fixo`
--

CREATE TABLE IF NOT EXISTS `comissoes_fixo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `zonas` varchar(50) NOT NULL,
  `cmx` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `comissoes_fixo`
--

INSERT INTO `comissoes_fixo` (`id`, `zonas`, `cmx`) VALUES
(2, 'zonaalvor', '15'),
(3, 'zonaC', '1.5'),
(4, 'zonaD', '2.5'),
(5, 'zonaE', '5.5'),
(8, 'zonaJ', '6.5'),
(9, 'zonaX', '9');

-- --------------------------------------------------------

--
-- Estrutura da tabela `companhia`
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
  `termos` text CHARACTER SET utf8,
  `color` varchar(25) NOT NULL DEFAULT '#123456',
  `pp_email` varchar(50) NOT NULL,
  `motorista` varchar(10) NOT NULL DEFAULT 'Sim',
  `paypal` varchar(10) NOT NULL DEFAULT 'Sim',
  `trans_bancaria` varchar(10) NOT NULL DEFAULT 'Sim',
  `pp_taxa` decimal(3,1) NOT NULL DEFAULT '3.5',
  `publicidade` varchar(255) NOT NULL,
  `noturno` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `companhia`
--

INSERT INTO `companhia` (`id`, `nome`, `logo`, `morada`, `cod_postal`, `tel`, `tlm`, `email`, `site`, `nif`, `iban`, `desconto`, `hora_reserva`, `ravt`, `termos`, `color`, `pp_email`, `motorista`, `paypal`, `trans_bancaria`, `pp_taxa`, `publicidade`, `noturno`) VALUES
(1, 'Osb Unipessoal, Lda', 'upload/logo1.png', 'Estrada Sta. Eulalia, Lt7', '8200-000 ALbufeira', '289150167', '914564564', '11knum15@gmail.com', 'oseubackoffice.com', '123456789', 'PT50009870834234534534567', '0', '4', '1234', '<p><strong>What are Terms and Conditions</strong></p><p>Terms and Conditions are a set of rules and guidelines that a user must agree to in order to use your website or mobile app. It acts as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app.</p><p>Itâ€™s up to you to set the rules and guidelines that the user must agree to. You can think of your Terms and Conditions agreement as the legal agreement where you maintain your rights to exclude users from your app in the event that they abuse your app, and where you maintain your legal rights against potential app abusers, and so on.</p><p><strong>Terms and Conditions are also known as Terms of Service or Terms of Use.</strong></p><p>This type of legal agreement can be used for both your website and your mobile app. Itâ€™s not required (itâ€™s not recommended actually) to have separate Terms and Conditions agreements: one for your website and one for your mobile app.</p>', 'rgba(186,198,201,0.85)', 'contas@oseubackoffice.com', 'checked', 'checked', 'checked', '4.2', 'publicidade', '79200,18000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `criar_locais`
--

CREATE TABLE IF NOT EXISTS `criar_locais` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `local` varchar(50) NOT NULL,
  `tipo` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=214 ;

--
-- Extraindo dados da tabela `criar_locais`
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
-- Estrutura da tabela `despesa_fixa`
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
-- Extraindo dados da tabela `despesa_fixa`
--

INSERT INTO `despesa_fixa` (`id`, `fatura`, `data`, `valor`, `descricao`) VALUES
(1, 'agost', 1472342400, '100', 'deue1242');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diario`
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
  `responsavel` varchar(50) NOT NULL,
  `tipo_manutencao` varchar(50) NOT NULL,
  `tipo_despesa` varchar(50) NOT NULL,
  `entidade` varchar(50) NOT NULL,
  `localidade` varchar(50) NOT NULL,
  `proximo_km` int(10) NOT NULL,
  `data_inicio` int(10) NOT NULL,
  `tipo_periodicidade` varchar(50) NOT NULL,
  `data_fim` int(10) NOT NULL,
  `hora_inicio` int(10) NOT NULL,
  `horas_fim` int(10) NOT NULL,
  `lat_inicio` varchar(25) NOT NULL,
  `long_inicio` varchar(25) NOT NULL,
  `lat_fim` varchar(25) NOT NULL,
  `long_fim` varchar(25) NOT NULL,
  `total` varchar(50) NOT NULL DEFAULT '0',
  `dia` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Extraindo dados da tabela `diario`
--

INSERT INTO `diario` (`id`, `matricula`, `km_inicio`, `km_fim`, `staff`, `combustivel`, `lavagem`, `portagem`, `diversos`, `data`, `fatura`, `selo`, `seguro`, `inspeccao`, `revisao`, `sinistro`, `descricao`, `mecanica`, `parque`, `validado`, `responsavel`, `tipo_manutencao`, `tipo_despesa`, `entidade`, `localidade`, `proximo_km`, `data_inicio`, `tipo_periodicidade`, `data_fim`, `hora_inicio`, `horas_fim`, `lat_inicio`, `long_inicio`, `lat_fim`, `long_fim`, `total`, `dia`) VALUES
(140, '86AG85', 0, 0, 'Demo', '', '', '', '', 1488931200, '113891', '', '', '', '', '', '', '', '', 'NÃ£o', '', 'Diaria', 'Combustivel', '502543949', 'Faro', 0, 0, '', 0, 0, 0, '', '', '', '', '28.87', 0),
(138, '09LJ23', 0, 0, 'Demo', '', '', '', '', 1488931200, '', '', '', '', '', '', 'Extracto de 03-03-2017', '', '', 'Sim', '', 'Diaria', 'Portagem', 'Via Verde', '', 0, 0, '', 0, 0, 0, '', '', '', '', '54.25', 0),
(139, '86AG85', 0, 0, 'Leal', '', '', '', '', 1488931200, '', '', '', '', '', '', 'Extracto de 03-03-2017', '', '', 'NÃ£o', '', 'Diaria', 'Parque', 'ANA', 'Aeroporto Faro', 0, 0, '', 0, 0, 0, '', '', '', '', '2.80', 0),
(137, '86AG85', 0, 0, 'Leal', '', '', '', '', 1485820800, '', '', '', '', '', '', 'Extracto de 03-03-2017', '', '', 'NÃ£o', '', 'Diaria', 'Portagem', 'Via Verde', '', 0, 0, '', 0, 0, 0, '', '', '', '', '30.20', 0),
(136, '09LJ23', 0, 135880, 'Cavaco', '', '', '', '', 1488412800, '', '', '', '', '', '', 'Lavagem bomba aeroporto', '', '', 'Sim', '', 'Diaria', 'Lavagem', 'CEPSA', 'Faro', 0, 0, '', 0, 0, 0, '', '', '', '', '1', 0),
(142, '21TR12', 0, 789788797, 'Demo', '', '', '', '', 1488931200, '12', '', '', '', '', '', 'obs', '', '', 'NÃ£o', '', 'Diaria', 'Portagem', 'at', 'ptm', 0, 0, '', 0, 0, 0, '', '', '', '', '22', 0),
(127, '09LJ23', 0, 0, 'Demo', '', '', '', '', 1487721600, 'FT FR2017195/03249', '', '', '', '', '', '', '', '', 'Sim', '', 'Fixa', 'inspeccao', 'Controlauto', '', 0, 1487721600, 'Anual', 1519257600, 0, 0, '', '', '', '', '30.70', 17),
(126, '09LJ23', 0, 135300, 'Demo', '', '', '', '', 1487548800, '', '', '', '', '', '', 'MudanÃ§a de Ã“leo + Filtro de Ã“leo', '', '', 'Sim', '', 'Manutencao', 'RevisÃ£o', 'Luis Madeira', 'Faro', 155000, 0, '', 0, 0, 0, '', '', '', '', '75', 0),
(124, '86AG85', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '', '', '', '0', 0),
(133, '09LJ23', 0, 0, 'ZÃ©', '', '', '', '', 1487980800, '105860', '', '', '', '', '', '22.66 Lt', '', '', 'Sim', '', 'Diaria', 'Combustivel', '502543949', 'Faro', 0, 0, '', 0, 0, 0, '', '', '', '', '28.87', 0),
(134, '86AG85', 0, 0, 'ZÃ©', '', '', '', '', 1488067200, '105966', '', '', '', '', '', '23.55 Lt', '', '', 'NÃ£o', '', 'Diaria', 'Combustivel', '502543949', 'Faro', 0, 0, '', 0, 0, 0, '', '', '', '', '30', 0),
(135, '09LJ23', 0, 135888, 'Leal', '', '', '', '', 1488931200, '106275', '', '', '', '', '', '37.62 Lts', '', '', 'Sim', '', 'Diaria', 'Combustivel', '502543949', 'Faro', 0, 0, '', 0, 0, 0, '', '', '', '', '48.12', 0),
(125, '09LJ23', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '', '', '', '0', 0),
(123, '86AG84', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '', '', '', '0', 0),
(141, '21TR12', 0, 123466565, 'Demo', '', '', '', '', 1488931200, '123', '', '', '', '', '', 'obs', '', '', 'NÃ£o', '', 'Diaria', 'Combustivel', 'at', 'ptm', 0, 0, '', 0, 0, 0, '', '', '', '', '100', 0),
(132, '8999SM', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'NÃ£o', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '', '', '', '0', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `excel`
--

CREATE TABLE IF NOT EXISTS `excel` (
  `data_servico` int(11) unsigned NOT NULL,
  `email` varchar(250) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `hrs` int(11) unsigned NOT NULL,
  `servico` varchar(255) NOT NULL,
  `voo` varchar(255) NOT NULL,
  `voo_horario` int(11) NOT NULL,
  `nome_cl` varchar(255) NOT NULL,
  `local_recolha` varchar(255) NOT NULL,
  `local_entrega` varchar(255) NOT NULL,
  `morada_recolha` varchar(100) CHARACTER SET utf8 NOT NULL,
  `morada_entrega` varchar(100) CHARACTER SET utf8 NOT NULL,
  `morada_recolha_gps` varchar(100) CHARACTER SET utf8 NOT NULL,
  `morada_entrega_gps` varchar(100) CHARACTER SET utf8 NOT NULL,
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
  `criado_direto` varchar(100) NOT NULL DEFAULT '0' COMMENT 'campo que define o proveniencia dos serviços,  0 = Aplicaçao, 1 = Administração, 2 = Operadores, dominios = da loja',
  `nid` varchar(10) NOT NULL,
  `end` int(11) NOT NULL DEFAULT '1800',
  `created_by` varchar(50) NOT NULL,
  `navigator` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17686 ;

--
-- Extraindo dados da tabela `excel`
--

INSERT INTO `excel` (`data_servico`, `email`, `staff`, `hrs`, `servico`, `voo`, `voo_horario`, `nome_cl`, `local_recolha`, `local_entrega`, `morada_recolha`, `morada_entrega`, `morada_recolha_gps`, `morada_entrega_gps`, `ponto_referencia`, `px`, `cr`, `bebe`, `obs`, `operador`, `cobrar_operador`, `id`, `ticket`, `estado`, `cobrar_direto`, `cmx_st`, `cmx_op`, `data_criacao`, `rec_ope`, `rec_staf`, `pag_ope`, `pag_staf`, `matricula`, `referencia`, `telefone`, `pais`, `criado_direto`, `nid`, `end`, `created_by`, `navigator`) VALUES
(1513036800, '11knum15@gmail.com', '', 1513088160, 'Chegada', 'FR443', 1513001700, 'Joao HÃ©lio', 'Faro Airport', 'Albufeira', 'Aeroporto de Faro, Faro, Portugal', 'Santa EulÃ¡lia, Albufeira, Portugal', '37.0175956, -7.9697200', '37.0892492, -8.2213283', '', '2', '0', '1', 'RETORNO 241/5a2a67e9 (1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17685, '', 'Pendente', '0', '0', '0', '2017-12-08 10:22:33', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/5a2a67e9', '963354089', 'Portugal', 'localhost', '', 1800, 'localhost@2017-12-08 10:22:33', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36'),
(1512950400, '11knum15@gmail.com', '', 1512993000, 'Partida', 'FR223', 1513001700, 'Joao HÃ©lio', 'Albufeira', 'Faro Airport', 'Santa EulÃ¡lia, Albufeira, Portugal', 'Aeroporto de Faro, Faro, Portugal', '37.0892492, -8.2213283', '37.0175956, -7.9697200', '', '2', '0', '1', 'TEM RETORNO 241/5a2a67e9 (1-4 Pax)  | MTR | OBS: -/- Pickup Recommended/Recomendado: 11/12/2017 11:45', 'Direto', '0', 17684, '', 'Pendente', '42', '0', '0', '2017-12-08 10:22:33', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/5a2a67e9', '963354089', 'Portugal', 'localhost', '', 1800, 'localhost@2017-12-08 10:22:33', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36'),
(1507939200, '11knum15@gmail.com', '', 1507977240, 'Interzone', '', 0, 'Joao', 'Vilamoura', 'Albufeira', 'Avenida Infante Dom Henrique A, Lisboa, Portugal', 'Joane, Portugal', '38.7082433, -9.1321237', '41.4384406, -8.4137229', '', '1', '0', '0', 'RETORNO 245/59dc6a33 (Golf110)  | MTR | OBS: -/-', 'Site Transf.Banco', '0', 17683, '', 'Pendente', '0', '0', '0', '2017-10-10 07:35:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/59dc6a33', '963354089', 'Portugal', 'localhost', '', 1800, 'localhost@2017-10-10 07:35:31', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'),
(1507939200, '11knum15@gmail.com', '', 1507977240, 'Interzone', '', 0, 'Joao', 'Albufeira', 'Vilamoura', 'Joane, Portugal', 'Avenida Infante Dom Henrique A, Lisboa, Portugal', '41.4384406, -8.4137229', '38.7082433, -9.1321237', '', '1', '0', '0', 'TEM RETORNO 245/59dc6a33 (Golf110)  | MTR | OBS: -/-', 'Site Transf.Banco', '400', 17682, '', 'Pendente', '0', '0', '0', '2017-10-10 07:35:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/59dc6a33', '963354089', 'Portugal', 'localhost', '', 1800, 'localhost@2017-10-10 07:35:31', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'),
(1508544000, '11knum15@gmail.com', '', 1508572320, 'Partida', '112 @ 11:22', 1508581320, 'Joao', 'Albufeira', 'Faro Airport', 'Lopes & Lopes, Lda., AlgueirÃ£o-Mem Martins, Portugal', '-/-', '38.7802430, -9.3515700', '-/-', '', '1', '0', '0', '(1-4 Pax) 241/59dc6758 | MTR | OBS: -/- Pickup Recommended/Recomendado: 21/10/2017 08:52', 'Direto', '0', 17681, '', 'Pendente', '21', '0', '0', '2017-10-10 07:23:20', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/59dc6758', '963354089', 'Alemanha', 'localhost', '', 1800, 'localhost@2017-10-10 07:23:20', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'),
(1507939200, '11knum15@gmail.com', '', 1507967160, 'Partida', '112 @ 11:18', 1507976280, 'Joao', 'Albufeira, Guia', 'Faro Airport', 'Rua Doutor MÃ¡rio Sacramento MA, SÃ£o JoÃ£o da Talha, Portugal', '-/-', '38.8251108, -9.1061260', '-/-', '', '1', '0', '0', '(1-4 Pax) 243/59dc667d | MTR | OBS: -/- Pickup Recommended/Recomendado: 14/10/2017 08:46', 'Direto', '0', 17680, '', 'Pendente', '33', '0', '0', '2017-10-10 07:19:41', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '243/59dc667d', '963354089', 'Portugal', 'localhost', '', 1920, 'localhost@2017-10-10 07:19:41', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'),
(1505952000, 'r.peleira@hotmail.com', '', 1506003300, 'Chegada', '132', 1505999820, 'Joao', 'Faro Airport', 'Albufeira', 'Rua Alegria MA, Almada, Portugal', 'Marinha Grande, Portugal', '38.6559883, -9.1507175', '39.7503802, -8.9318059', '', '1', '0', '0', 'RETORNO 241/59b8f928 (1-4 Pax)  | MTR | OBS: -/- Pickup Recommended/Recomendado: 21/09/2017 11:47', 'Site Paypal', '0', 17679, '', 'Pendente', '0', '0', '0', '2017-09-13 10:23:52', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/59b8f928', '963354089', 'Portugal', 'localhost', '', 1800, 'localhost@2017-09-13 10:23:52', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36'),
(1505952000, 'r.peleira@hotmail.com', '', 1505990820, 'Partida', '199', 1505999820, 'Joao', 'Albufeira', 'Faro Airport', 'Marinha Grande, Portugal', 'Rua Alegria MA, Almada, Portugal', '39.7503802, -8.9318059', '38.6559883, -9.1507175', '', '1', '0', '0', 'TEM RETORNO 241/59b8f928 (1-4 Pax)  | MTR | OBS: -/- Pickup Recommended/Recomendado: 21/09/2017 11:47', 'Site Paypal', '43.764', 17678, '', 'Pendente', '0', '0', '0', '2017-09-13 10:23:52', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/59b8f928', '963354089', 'Portugal', 'localhost', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36'),
(1493596800, 'mpeleira@cmo.pt', 'Avelino', 1493637360, 'Chegada', '12', 1493659020, 'Maria de Fatima', 'Albufeira, Guia', 'Faro Airport', 'Zoomarine, EN 125 - Km 65', 'Aeroporto Faro, Aeroporto de Faro', '37.1251512, -8.3155475', '37.021006, -7.969839', '', '1', '0', '0', '(RETORNO) ', 'loja_1', '125', 17676, 'T1234', 'Pendente', '0', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', 'K1222', '964228092', 'PT', '1', '', 1800, '@30/04/2017 12:17:54', ''),
(1505347200, '11knum15@gmail.com', '', 1505391900, 'Partida', '112 @ 15:55', 1505400900, 'Joao', 'Albufeira', 'Faro Airport', 'Mafra, Portugal', '-/-', '38.9443106, -9.3320856', '-/-', '', '1', '0', '0', '(1-4 Pax) 241/59b8f831 | MTR | OBS: -/- Pickup Recommended/Recomendado: 14/09/2017 13:25', 'Direto', '0', 17677, '', 'Pendente', '21', '0', '0', '2017-09-13 10:19:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/59b8f831', '963354089', 'AustrÃ¡lia', 'localhost', '', 1800, 'localhost@2017-09-13 10:19:45', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36'),
(1493596800, 'mpeleira@cmo.pt', 'Avelino', 1493637360, 'Chegada', '12', 1493659020, 'Maria de Fatima', 'Faro Airport', 'Albufeira, Guia', 'Aeroporto Faro, Aeroporto de Faro', 'Zoomarine, EN 125 - Km 65', '37.021006, -7.969839', '37.1251512, -8.3155475', '', '1', '0', '0', '', 'loja_1', '125', 17675, 'T1234', 'Pendente', '0', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', 'K1222', '964228092', 'PT', '1', '', 1800, '@30/04/2017 12:17:34', ''),
(1493510400, 'mpeleira@cmo.pt', 'Avelino', 1493547000, 'Tours', '123', 1493633460, 'Maria de Fatima', 'Lisbon', 'Quarteira', 'Aeroporto Lisboa, Alameda das Comunidades Portuguesas', 'Aquashow, Estrada Nacional 396', '38.769401, -9.127501', '37.093707, -8.0771089', '', '1', '0', '0', '', 'loja_1', '0', 17674, 'G12', 'Aguarda', '25', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', 'M12', '964228092', 'PT', '1', '', 1800, '@30/04/2017 11:11:54', ''),
(1493510400, 'r.peleira@hotmail.com', 'Avelino', 1493511660, 'Partida', '112', 1493943720, 'Joao', 'Faro Airport', 'Faro Airport', 'Aeroporto Faro, Aeroporto de Faro', 'Aeroporto Faro, Aeroporto de Faro', '37.021006, -7.969839', '37.021006, -7.969839', '', '1', '0', '0', '', 'loja_1', '0', 17672, 'MM12', 'Cancelado', '20', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '1233', '963354089', 'pt', '1', '', 1800, '@30/04/2017 01:22:45', ''),
(1493510400, 'r.peleira@hotmail.com', 'Avelino', 1493511660, 'Partida', '112', 1493943720, 'Joao', 'Faro Airport', 'Faro Airport', 'Aeroporto Faro, Aeroporto de Faro', 'Aeroporto Faro, Aeroporto de Faro', '37.021006, -7.969839', '37.021006, -7.969839', '', '1', '0', '0', '(RETORNO) ', 'loja_1', '0', 17673, 'MM12', 'Cancelado', '20', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '1233', '963354089', 'pt', '1', '', 1800, '@30/04/2017 01:23:12', ''),
(1493510400, 'r.peleira@hotmail.com', 'Avelino', 1493511540, 'Chegada', '112', 1494116400, 'Joao', 'Faro Airport', 'Faro Airport', 'Aeroporto Faro, Aeroporto de Faro', 'Aeroporto Faro, Aeroporto de Faro', '37.021006, -7.969839', '37.021006, -7.969839', '', '1', '0', '0', '', 'loja_1', '121', 17671, 'MM12', 'Cancelado', '0', '11', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '112', '963354089', 'pt', '1', '', 1800, '@30/04/2017 01:20:37', ''),
(1493510400, 'r.peleira@hotmail.com', 'Avelino', 1493510820, 'Chegada', '', 0, 'Joao', '', '', '', '', '', '', '', '1', '0', '0', '', 'loja_1', '0', 17669, '112', 'Confirmado', '0', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '222', '963354089', 'pt', '0', '', 1800, '', ''),
(1493510400, 'r.peleira@hotmail.com', 'Demo', 1493513700, 'Chegada', '112', 1494118500, 'Joao', 'Algoz', 'Alcantarilha', 'Krazy World, Lagoa de Viseu - Estrada Algoz', 'Aqualand, Estrada Nacional 125 - SÃ­tio das Areias', '37.1822015, -8.2839042', '37.134894, -8.3692491', '', '1', '0', '0', '', 'loja_1', '12', 17670, '1MM12', 'Confirmado', '0', '111', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '123', '963354089', 'pt', '', '', 1800, '@30/04/2017 01:17:32', ''),
(1493424000, '11knum15@gmail.com', 'Avelino', 1493501700, 'Chegada', '', 0, 'Hioao', '', '', '', '', '', '', '', '1', '1', '1', '', '', '0', 17667, '', 'Confirmado', '0', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '12343', '963354089', 'PT', '0', '', 1800, '', ''),
(1493424000, 'mpeleira@cmo.pt', 'Avelino', 1493501940, 'Partida', '', 0, 'Maria de Fatiam', '', '', '', '', '', '', '', '1', '0', '0', '', 'loja_1', '0', 17668, '', 'Confirmado', '0', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', 'mas13', '964228092', 'PT', '0', '', 1800, '', ''),
(1493424000, '', '', 1493483100, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 17663, '', 'Confirmado', '0', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', '0', '', 1800, '', ''),
(1493424000, '', '', 1493483280, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 17664, '', 'Confirmado', '0', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', '0', '', 1800, '', ''),
(1493424000, '', '', 1493484420, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 17665, '', 'Confirmado', '0', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', '0', '', 1800, '', ''),
(1493424000, '', '', 1493486040, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 17666, '', 'Confirmado', '0', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '-/-', '', '', '0', '', 1800, '', ''),
(1493424000, '', '', 1493483100, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 17662, '', 'Confirmado', '0', '0', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', '0', '', 1800, '', ''),
(1488931200, '11knum15@gmail.com', 'Demo', 1493478000, 'Interzone', '', 1493481600, 'Joao', 'Vilamoura - Luna Olympus Hotel, LoulÃ©, Portugal', 'Albufeira', 'Marina de Lagos, Lagos, Portugal', '-/-', '37.1093907, -8.6747950', '-/-', '', '1', '0', '0', 'RETORNO 245/58ea2655 (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '625.2', 17661, '', 'Aguarda', '0', '0', '0', '2017-04-09 13:17:25', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '21TR12', '245/58ea2655', '963354089', 'Austria', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493481600, 'Interzone', '', 1493481600, 'Joao', 'Albufeira - Marina de Lagos, Lagos, Portugal', 'Vilamoura', 'Marina de Lagos, Lagos, Portugal', '-/-', '37.1093907, -8.6747950', '-/-', '', '1', '0', '0', 'TEM RETORNO 245/58ea2655 (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '625.2', 17660, '', 'Aguarda', '0', '0', '0', '2017-04-09 13:17:25', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58ea2655', '963354089', 'Austria', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493472600, 'Partida', '1110 @ 17:00', 1493481600, 'Joao', 'Albufeira', 'Faro Airport', '-/-', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '', '1', '0', '0', '(1-4 Pax) 241/58e914e4 | TB | OBS: -/-', 'Site Transf.Banco', '21', 17659, '', 'Aguarda', '0', '0', '0', '2017-04-08 17:50:44', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e914e4', '963354089', 'BulgÃ¡ria', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493510400, '11knum15@gmail.com', '', 1493555340, 'Partida', '1123 @ 14:14', 1493555340, 'Joao', 'Algoz', 'Faro Airport', '-/-', 'Marina de Vilamoura, S.A., Portugal', '-/-', '37.0777589, -8.1196968', '', '1', '0', '0', '(1-4 Pax) 244/58e9125f | MTR | OBS: -/-', 'Direto', '0', 17658, '', 'Aguarda', '47', '0', '0', '2017-04-08 17:39:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '244/58e9125f', '963354089', 'Alemanha', 'localhost/loja/', '', 2700, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492905600, '11knum15@gmail.com', '', 1492977600, 'Interzone', '', 1492981200, 'Joao', 'Lagos, Algarve - Rua Alegria MA, Almada, Portugal', 'Albufeira', 'Rua Columbano Bordalo Pinheiro T, Albufeira, Portugal', '-/-', '37.0875760, -8.2351639', '-/-', '', '5', '3', '0', 'RETORNO 242/58e911bf (5-8 Pax)  | MTR | OBS: -/-', 'Site Paypal', '112.536', 17657, '', 'Aguarda', '0', '0', '0', '2017-04-08 17:37:20', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e911bf', '963354089', 'AustrÃ¡lia', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492905600, '11knum15@gmail.com', '', 1492981200, 'Interzone', '', 1492981200, 'Joao', 'Albufeira - Rua Columbano Bordalo Pinheiro T, Albufeira, Portugal', 'Lagos, Algarve', 'Rua Columbano Bordalo Pinheiro T, Albufeira, Portugal', '-/-', '37.0875760, -8.2351639', '-/-', '', '5', '3', '0', 'TEM RETORNO 242/58e911bf (5-8 Pax)  | MTR | OBS: -/-', 'Site Paypal', '112.536', 17656, '', 'Aguarda', '0', '0', '0', '2017-04-08 17:37:19', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e911bf', '963354089', 'AustrÃ¡lia', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492642800, 'Chegada', '112', 1492642800, 'Joao', 'Faro Airport', 'Vilamoura', 'Rua Alegria MA, Almada, Portugal', '-/-', '38.6559883, -9.1507175', '-/-', '', '1', '0', '0', '(1-4 Pax) 240/58e83957 | MTR | OBS: -/-', 'Site Paypal', '13.53558', 17655, '', 'Aguarda', '0', '0', '0', '2017-04-08 02:13:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e83957', '963354089', 'AustrÃ¡lia', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492732800, '11knum15@gmail.com', '', 1492729200, 'Chegada', '111', 1492729200, 'Joao', 'Faro Airport', 'Algoz', 'AQUASHOW PARK HOTEL, Quarteira, Portugal', '-/-', '37.0930630, -8.0725690', 'NaN, NaN', '', '7', '0', '0', '(5-8 Pax) 244/58e83785 | MTR | OBS: -/-', 'Site Transf.Banco', '93.89462', 17654, '', 'Aguarda', '0', '0', '0', '2017-04-08 02:06:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '45FF45', '244/58e83785', '963354089', 'Alemanha', 'localhost/loja/', '', 2700, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492732800, '11knum15@gmail.com', '', 1492794000, 'Chegada', '22H1', 1492794000, 'Joao', 'Faro Airport', 'Albufeira, Guia', 'Zoomarine Algarve, Albufeira, Portugal', '-/-', '37.1251641, -8.3144451', '-/-', '', '1', '0', '0', '(1-4 Pax) 243/58e8368e | MTR | OBS: -/-', 'Site Transf.Banco', '34.386', 17653, '', 'Aguarda', '0', '0', '0', '2017-04-08 02:02:06', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '243/58e8368e', '963354089', 'Alemanha', 'localhost/loja/', '', 1920, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493337600, '11knum15@gmail.com', '', 1493389800, 'Partida', '112 @ 18:00', 1493389800, 'Joao', 'Albufeira', 'Faro Airport', '-/-', 'Estrada de Santa EulÃ¡lia, Albufeira, Portugal', '-/-', '37.0917081, -8.2224126', '', '1', '0', '0', '(1-4 Pax) 241/58e835ba | PP | OBS: -/-', 'Site Transf.Banco', '21.882', 17652, '', 'Aguarda', '0', '0', '0', '2017-04-08 01:58:34', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e835ba', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492720200, 'Chegada', '110', 1492729200, 'Joao', 'Faro Airport - Rua da Fonte LO, Peniche, Portugal', 'Albufeira', '-/-', 'Rua da Fonte LO, Peniche, Portugal', '-/-', '39.3266572, -9.3551285', '', '1', '0', '0', 'RETORNO 241/58e8135e (1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17651, '', 'Aguarda', '42', '0', '0', '2017-04-07 23:31:58', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e8135e', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492732800, '11knum15@gmail.com', '', 1492729200, 'Partida', '112', 1492729200, 'Joao', 'Albufeira - Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal', 'Faro Airport', 'Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal', '-/-', '37.1351413, -8.0144699', '-/-', '', '1', '0', '0', 'TEM RETORNO 241/58e8135e (1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17650, '', 'Aguarda', '42', '0', '0', '2017-04-07 23:31:58', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e8135e', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492560000, '11knum15@gmail.com', '', 1492626600, 'Chegada', '113', 1492635600, 'Joao', 'Faro Airport - Mafra, Portugal', 'Albufeira', '-/-', 'Mafra, Portugal', '-/-', '38.9443106, -9.3320856', '', '1', '0', '0', 'RETORNO 241/58e80a59 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '43.764', 17647, '', 'Aguarda', '0', '0', '0', '2017-04-07 22:53:29', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e80a59', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492560000, '11knum15@gmail.com', '', 1492635600, 'Partida', '112', 1492635600, 'Joao', 'Albufeira - Tibaldinho, Mangualde, Portugal', 'Faro Airport', 'Tibaldinho, Mangualde, Portugal', '-/-', '40.6008001, -7.8443297', '-/-', '', '1', '0', '0', 'TEM RETORNO 241/58e80a59 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '43.764', 17646, '', 'Aguarda', '0', '0', '0', '2017-04-07 22:53:29', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e80a59', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492693200, 'Partida', '', 1492693200, 'Joao', 'Albufeira - Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal', 'Faro Airport', 'Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal', '-/-', '37.1351413, -8.0144699', '-/-', '', '1', '0', '0', 'TEM RETORNO 241/58e8128c (1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17648, '', 'Aguarda', '42', '0', '0', '2017-04-07 23:28:28', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e8128c', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492684200, 'Chegada', '114', 1492693200, 'Joao', 'Faro Airport - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Albufeira', '-/-', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '', '1', '0', '0', 'RETORNO 241/58e8128c (1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17649, '', 'Aguarda', '42', '0', '0', '2017-04-07 23:28:28', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e8128c', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493420400, 'Interzone', '', 1493420400, 'Joao', 'Lagos, Algarve - Rua Columbano Bordalo Pinheiro T, Albufeira, Portugal', 'Albufeira', 'Avenida NaÃ§Ãµes Unidas M, Lisboa, Portugal', '-/-', '38.7636400, -9.1799279', '-/-', '', '1', '0', '0', 'RETORNO 242/58e7c8f0 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '90.07048', 17643, '', 'Aguarda', '0', '0', '0', '2017-04-07 18:14:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7c8f0', '963354089', 'Brasil', 'localhost/loja/?lang=pt', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493420400, 'Interzone', '', 1493420400, 'Joao', 'Albufeira - Avenida NaÃ§Ãµes Unidas M, Lisboa, Portugal', 'Lagos, Algarve', 'Avenida NaÃ§Ãµes Unidas M, Lisboa, Portugal', '-/-', '38.7636400, -9.1799279', '-/-', '', '1', '0', '0', 'TEM RETORNO 242/58e7c8f0 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '90.07048', 17642, '', 'Aguarda', '0', '0', '0', '2017-04-07 18:14:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7c8f0', '963354089', 'Brasil', 'localhost/loja/?lang=pt', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492732800, '11knum15@gmail.com', '', 1492729200, 'Chegada', '111', 1492729200, 'Joao', 'Faro Airport', 'Albufeira, Guia', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', '(1-4 Pax) 243/58e7c775 | MTR | OBS: -/-', 'Direto', '0', 17641, '', 'Aguarda', '33', '0', '0', '2017-04-07 18:08:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '243/58e7c775', '963354089', 'Alemanha', 'localhost/loja/?lang=pt', '', 1920, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493420400, 'Chegada', '1123', 1493420400, 'Joao', 'Faro Airport', 'Albufeira, Guia', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '-/-', '', '', '1', '0', '0', '(1-4 Pax) 243/58e7c675 | MTR | OBS: -/-', 'Direto', '0', 17640, '', 'Aguarda', '33', '0', '0', '2017-04-07 18:03:49', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '243/58e7c675', '963354089', 'AustrÃ¡lia', 'localhost/loja/?lang=pt', '', 1920, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492732800, '11knum15@gmail.com', '', 1492806600, 'Partida', '1121 @ 00:00', 1492806600, 'Jomas', 'Albufeira', 'Faro Airport', '-/-', 'GrÃ¢ndola, Portugal', '-/-', '38.1762557, -8.5662971', '', '1', '0', '0', '(1-4 Pax) 241/58e7c56e | MTR | OBS: -/-', 'Direto', '0', 17639, '', 'Aguarda', '21', '0', '0', '2017-04-07 17:59:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e7c56e', '963354089', 'Brasil', 'localhost/loja/?lang=pt', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492819200, '11knum15@gmail.com', '', 1492889100, 'Partida', '112 @ 23:00', 1492889100, 'Joao', 'Vilamoura', 'Faro Airport', '-/-', 'Avenida Infante Dom Henrique J, Lisboa, Portugal', '-/-', '38.7403154, -9.1022668', '', '1', '0', '0', '(1-4 Pax) 240/58e7c28e | MTR | OBS: -/-', 'Direto', '0', 17638, '', 'Aguarda', '12.99', '0', '0', '2017-04-07 17:47:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e7c28e', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493337600, '11knum15@gmail.com', '', 1493406900, 'Partida', '111 @ 23:00', 1493406900, 'Joao', 'Algoz', 'Faro Airport', '-/-', 'Rua Adriano Correia de Oliveira JO, Loures, Portugal', '-/-', '38.7931220, -9.1405509', '', '1', '0', '0', '(1-4 Pax) 244/58e7c22b | MTR | OBS: -/-', 'Direto', '0', 17637, '', 'Aguarda', '40.12', '0', '0', '2017-04-07 17:45:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '244/58e7c22b', '963354089', 'Brasil', 'localhost/loja/', '', 2700, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493510400, '11knum15@gmail.com', '', 1493589600, 'Chegada', '110', 1493589600, 'Joao', 'Faro Airport', 'Vilamoura', 'Rua Columbano Bordalo Pinheiro T, Albufeira, Portugal', '-/-', '-/-', '', '', '6', '0', '0', '(5-8 Pax) 240/58e7c1dd | MTR | OBS: -/-', 'Direto', '0', 17636, '', 'Aguarda', '30.99', '0', '0', '2017-04-07 17:44:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e7c1dd', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492722000, 'Interzone', '', 1492725600, 'Joao', 'Vilamoura - Faro, Portugal', 'Albufeira', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'RETORNO 245/58e7c143 (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '625.2', 17635, '', 'Aguarda', '0', '0', '0', '2017-04-07 17:41:39', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58e7c143', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492725600, 'Interzone', '', 1492725600, 'Joao', 'Albufeira - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Vilamoura', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 245/58e7c143 (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '625.2', 17634, '', 'Aguarda', '0', '0', '0', '2017-04-07 17:41:39', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58e7c143', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492128000, '11knum15@gmail.com', '', 1492171200, 'Interzone', '', 1492272000, 'Joao', 'Lagos, Algarve - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Albufeira', 'PraÃ§a Choupal FA, Mealhada, Portugal', '-/-', '40.3796862, -8.4530315', '-/-', '', '1', '0', '0', 'RETORNO 242/58e7c03f (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '89.612', 17633, '', 'Aguarda', '0', '0', '0', '2017-04-07 17:37:19', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7c03f', '963354089', 'AustrÃ¡lia', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492214400, '11knum15@gmail.com', '', 1492272000, 'Interzone', '', 1492272000, 'Joao', 'Albufeira - PraÃ§a Choupal FA, Mealhada, Portugal', 'Lagos, Algarve', 'PraÃ§a Choupal FA, Mealhada, Portugal', '-/-', '40.3796862, -8.4530315', '-/-', '', '1', '0', '0', 'TEM RETORNO 242/58e7c03f (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '89.612', 17632, '', 'Aguarda', '0', '0', '0', '2017-04-07 17:37:19', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7c03f', '963354089', 'AustrÃ¡lia', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492732800, '11knum15@gmail.com', '', 1492806600, 'Chegada', '10091', 1492815600, 'Jooa', 'Faro Airport - Avenida NaÃ§Ãµes Unidas M, Lisboa, Portugal', 'Albufeira', '-/-', 'Avenida NaÃ§Ãµes Unidas M, Lisboa, Portugal', '-/-', '38.7636400, -9.1799279', '', '1', '0', '0', 'RETORNO 241/58e7bf85 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '42', 17631, '', 'Aguarda', '0', '0', '0', '2017-04-07 17:34:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e7bf85', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492819200, '11knum15@gmail.com', '', 1492815600, 'Partida', '1100', 1492815600, 'Jooa', 'Albufeira - Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal ', 'Faro Airport', 'Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal', '-/-', '37.1351413, -8.0144699', '-/-', '', '1', '0', '0', 'TEM RETORNO 241/58e7bf85 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '42', 17630, '', 'Aguarda', '0', '0', '0', '2017-04-07 17:34:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e7bf85', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492732800, '11knum15@gmail.com', '', 1492805700, 'Partida', '1111000 @ 00:00', 1492805700, 'Pedro', 'Algoz', 'Faro Airport', '-/-', 'Miranda do Corvo, Portugal', '-/-', '40.0901981, -8.3296401', '', '1', '0', '0', '(1-4 Pax) 244/58e7be45 | PP | OBS: -/-', 'Site Transf.Banco', '41.80504', 17629, '', 'Aguarda', '0', '0', '0', '2017-04-07 17:28:53', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '244/58e7be45', '963354089', 'AustrÃ¡lia', 'localhost/loja/', '', 2700, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492642800, 'Chegada', '11000', 1492642800, 'Joao', 'Faro Airport', 'Algoz', 'Time Out Market, Avenida 24 de Julho, Lisboa, Portugal', '-/-', '-/-', '', '', '1', '0', '0', '(1-4 Pax) 244/58e7bded | MTR | OBS: -/-', 'Site Transf.Banco', '40.12', 17628, '', 'Aguarda', '0', '0', '0', '2017-04-07 17:27:25', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '244/58e7bded', '963354089', 'AustrÃ¡lia', 'localhost/loja/', '', 2700, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1491955200, '11knum15@gmail.com', '', 1492002000, 'Chegada', '11100', 1492002000, 'Joao', 'Faro Airport', 'Albufeira', '-/-', '', '-/-', '', '', '1', '0', '0', '(1-4 Pax) 241/58e7bce0 | MTR | OBS: -/-', 'Direto', '0', 17627, '', 'Aguarda', '21', '0', '0', '2017-04-07 17:22:56', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e7bce0', '963354089', 'Alemanha', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492041600, '11knum15@gmail.com', '', 1492099200, 'Interzone', '', 1492102800, 'Joao', 'Albufeira - Santa EulÃ¡lia, Albufeira, Portugal', 'Lagos, Algarve', 'Rua Columbano Bordalo Pinheiro T, Albufeira, Portugal', '-/-', '37.0875760, -8.2351639', '-/-', '', '1', '0', '0', 'RETORNO 242/58e7b4e0 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '89.612', 17626, '', 'Aguarda', '0', '0', '0', '2017-04-07 16:48:48', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7b4e0', '963354089', 'Brasil', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492041600, '11knum15@gmail.com', '', 1492102800, 'Interzone', '', 1492102800, 'Joao', 'Lagos, Algarve - Rua Columbano Bordalo Pinheiro T, Albufeira, Portugal', 'Albufeira', 'Rua Columbano Bordalo Pinheiro T, Albufeira, Portugal', '-/-', '37.0875760, -8.2351639', '-/-', '', '1', '0', '0', 'TEM RETORNO 242/58e7b4e0 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '89.612', 17625, '', 'Aguarda', '0', '0', '0', '2017-04-07 16:48:48', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7b4e0', '963354089', 'Brasil', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492642800, 'Interzone', '', 1492642800, 'Joao', 'Lagos, Algarve - Faro, Portugal', 'Albufeira', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'RETORNO 242/58e7b3a1 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '90.07048', 17624, '', 'Aguarda', '0', '0', '0', '2017-04-07 16:43:29', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7b3a1', '963354089', 'Brasil', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492642800, 'Interzone', '', 1492642800, 'Joao', 'Albufeira - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Lagos, Algarve', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 242/58e7b3a1 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '90.07048', 17623, '', 'Aguarda', '0', '0', '0', '2017-04-07 16:43:29', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7b3a1', '963354089', 'Brasil', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492642800, 'Interzone', '', 1492642800, 'Joao', 'Lagos, Algarve - Rua Columbano Bordalo Pinheiro T, Albufeira, Portugal', 'Albufeira', '-/-', 'Rua Columbano Bordalo Pinheiro T, Albufeira, Portugal', '-/-', '37.0875760, -8.2351639', '', '1', '0', '0', 'RETORNO 242/58e7b191 (1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17622, '', 'Aguarda', '86.44', '0', '0', '2017-04-07 16:34:41', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7b191', '963354089', 'Brasil', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492642800, 'Interzone', '', 1492642800, 'Joao', 'Albufeira - JoÃ£o AntÃ£o, Guarda, Portugal', 'Lagos, Algarve', 'JoÃ£o AntÃ£o, Guarda, Portugal', '-/-', '40.4605555, -7.2409377', '-/-', '', '1', '0', '0', 'TEM RETORNO 242/58e7b191 (1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17621, '', 'Aguarda', '86.44', '0', '0', '2017-04-07 16:34:41', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7b191', '963354089', 'Brasil', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493420400, 'Interzone', '', 1493420400, 'Joao', 'Albufeira - JoÃ£o AntÃ£o, Guarda, Portugal', 'Lagos, Algarve', 'JoÃ£o AntÃ£o, Guarda, Portugal', '-/-', '40.4605555, -7.2409377', '-/-', '', '1', '0', '0', 'TEM RETORNO 242/58e7b0cf (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '86.44', 17620, '', 'Aguarda', '0', '0', '0', '2017-04-07 16:31:27', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7b0cf', '963354089', 'Brasil', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493485260, 'Interzone', '', 1493485260, 'Joao', 'Albufeira - Avenida NaÃ§Ãµes Unidas M, Lisboa, Portugal', 'Lagos, Algarve', 'Avenida NaÃ§Ãµes Unidas M, Lisboa, Portugal', '-/-', '38.7636400, -9.1799279', '-/-', '', '1', '0', '0', 'TEM RETORNO 242/58e7af2c (1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17619, '', 'Aguarda', '86', '0', '0', '2017-04-07 16:24:28', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7af2c', '963354089', 'BulgÃ¡ria', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492041600, '11knum15@gmail.com', '', 1492038000, 'Interzone', '112', 1492038000, 'Joao', 'Albufeira - Rua Alegria MA, Almada, Portugal', 'Albufeira, Corcovada', 'Rua Alegria MA, Almada, Portugal', '-/-', '111.0000000, 111.0000000', '111.0000000, 111.0000000', '', '1', '0', '0', 'TEM RETORNO 242/58e7adfb (1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17618, '', 'Aguarda', '86.44', '0', '0', '2017-04-07 16:19:23', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e7adfb', '963354089', 'AustrÃ¡lia', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492128000, '11knum15@gmail.com', '', 1492201800, 'Partida', '1112 @ 00:00', 1492201800, 'Joao', 'Albufeira', 'Faro Airport', '-/-', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '', '1', '0', '0', '241/58e79c31 | TB | OBS: -/-', 'Site Transf.Banco', '21', 17617, '', 'Aguarda', '0', '0', '0', '2017-04-07 15:03:29', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e79c31', '963354089', 'AustrÃ¡lia', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492473600, '11knum15@gmail.com', '', 1492547400, 'Partida', '1111 @ 00:00', 1492547400, 'Joao', 'Albufeira - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Faro Airport', '-/-', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '', '1', '0', '0', '241/58e79b6e | MTR | OBS: -/-', 'Direto', '0', 17616, '', 'Aguarda', '21', '0', '0', '2017-04-07 15:00:14', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e79b6e', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492560000, '11knum15@gmail.com', '', 1492633800, 'Partida', '11122 @ 00:00', 1492633800, 'Joao', 'Albufeira - Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal', 'Faro Airport', '-/-', 'Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal', '-/-', '37.1351413, -8.0144699', '', '1', '0', '0', '241/58e79abd | PP | OBS: -/-', 'Site Transf.Banco', '21.882', 17615, '', 'Aguarda', '0', '0', '0', '2017-04-07 14:57:17', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e79abd', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492387200, '11knum15@gmail.com', '', 1492461000, 'Partida', '1234 @ 00:00', 1492461000, 'Joao', 'Albufeira - Estrada de Chelas, Lisboa, Portugal', 'Faro Airport', '-/-', 'Estrada de Chelas, Lisboa, Portugal', '-/-', '38.7342810, -9.1172760', '', '1', '0', '0', '241/58e799d0 | MTR | OBS: -/-', 'Direto', '0', 17614, '', 'Aguarda', '21', '0', '0', '2017-04-07 14:53:20', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e799d0', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492560000, '11knum15@gmail.com', '', 1492633800, 'Partida', '1119 @ 00:00', 1492633800, 'Joao', 'Albufeira - Avenida da Liberdade 98, Lisboa, Portugal', 'Faro Airport', '-/-', 'Avenida da Liberdade 98, Lisboa, Portugal', '-/-', '38.7185505, -9.1434988', '', '1', '0', '0', '241/58e795f9 | PP | OBS: -/-', 'Site Transf.Banco', '21.882', 17613, '', 'Aguarda', '0', '0', '0', '2017-04-07 14:36:57', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e795f9', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492560000, '11knum15@gmail.com', '', 1492633800, 'Partida', '1112 @ 00:00', 1492633800, 'Joao', 'Albufeira - Avenida Infante Dom Henrique J, Lisboa, Portugal', 'Faro Airport', '-/-', 'Avenida Infante Dom Henrique J, Lisboa, Portugal', '-/-', '38.7403154, -9.1022668', '', '1', '0', '0', '241/58e794d5 | MTR | OBS: -/-', 'Direto', '0', 17612, '', 'Aguarda', '21', '0', '0', '2017-04-07 14:32:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e794d5', '963354089', 'BulgÃ¡ria', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1491523200, '11knum15@gmail.com', '', 1491586140, 'Partida', '1112 @ 21:14', 1491586140, 'Joao', 'Algoz - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Algoz', '-/-', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '', '1', '0', '0', '244/58e79233 | PP | OBS: -/-', 'Site Transf.Banco', '41.80504', 17611, '', 'Aguarda', '0', '0', '0', '2017-04-07 14:20:51', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '244/58e79233', '963354089', 'BulgÃ¡ria', 'localhost/loja/', '', 2700, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492720200, 'Partida', '1111 @ 00:00', 1492720200, 'Joao', 'Albufeira - Avenida Infante Dom Henrique J, Lisboa, Portugal', 'Albufeira', '-/-', 'Avenida Infante Dom Henrique J, Lisboa, Portugal', '-/-', '38.7403154, -9.1022668', '', '1', '0', '0', '241/58e790d8 | MTR | OBS: -/-', 'Direto', '0', 17610, '', 'Aguarda', '21', '0', '0', '2017-04-07 14:15:04', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e790d8', '963354089', 'BulgÃ¡ria', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492819200, '11knum15@gmail.com', '', 1492885800, 'Golf', '991', 1492894800, 'Joao', 'Vilamoura - Rua Alegria MA, Almada, Portugal', 'Albufeira', '-/-', 'Rua Alegria MA, Almada, Portugal', '-/-', '38.6559883, -9.1507175', '', '1', '0', '0', 'RETORNO 245/58e7753b (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '416.8', 17609, '', 'Aguarda', '0', '0', '0', '2017-04-07 12:17:15', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58e7753b', '963354089', 'BulgÃ¡ria', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492819200, '11knum15@gmail.com', '', 1492894800, 'Golf', '11123', 1492894800, 'Joao', 'Albufeira - JoÃ£o AntÃ£o, Guarda, Portugal', 'Vilamoura', 'JoÃ£o AntÃ£o, Guarda, Portugal', '-/-', '40.4605555, -7.2409377', '-/-', '', '1', '0', '0', 'TEM RETORNO 245/58e7753b (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '416.8', 17608, '', 'Aguarda', '0', '0', '0', '2017-04-07 12:17:15', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58e7753b', '963354089', 'BulgÃ¡ria', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492725600, 'Interzone', '', 1492725600, 'Joao', 'Lagos, Algarve', 'Albufeira', 'Marinha Grande, Portugal', '-/-', '39.7503802, -8.9318059', '-/-', '', '1', '0', '0', '(1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17606, '', 'Aguarda', '43.22', '0', '0', '2017-04-07 12:13:56', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e77474', '963354089', 'Austria', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492686000, 'Interzone', '', 1492686000, 'Joao', 'Albufeira', 'Lagos, Algarve', 'JÃ³ia do PalÃ¡cio, Rua Latino Coelho, Lisboa, Portugal', '-/-', '38.7328734, -9.1498321', '-/-', '', '1', '0', '0', '(1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17607, '', 'Aguarda', '43', '0', '0', '2017-04-07 12:15:05', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e774b9', '96354089', 'Alemanha', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492560000, '11knum15@gmail.com', '', 1492556400, 'Interzone', '', 1492556400, 'Joao', 'Albufeira', 'Lagos, Algarve', 'Marinha Grande, Portugal', '-/-', '39.7503802, -8.9318059', '-/-', '', '1', '0', '0', '(1-4 Pax)  | TB | OBS: -/-', 'Site Paypal', '35.39674', 17605, '', 'Aguarda', '0', '0', '0', '2017-04-07 12:09:04', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e77350', '963354089', 'Portugal', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492560000, '11knum15@gmail.com', '', 1492633500, 'Chegada', '1113', 1492642800, 'Joao', 'Faro Airport - Faro Airport, Faro, Portugal', 'Vilamoura', '-/-', 'Faro Airport, Faro, Portugal', '-/-', '37.0175956, -7.9697200', '', '1', '0', '0', 'RETORNO 240/58e77223 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '16.4636', 17604, '', 'Aguarda', '0', '0', '0', '2017-04-07 12:04:03', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e77223', '963354089', 'Alemanha', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492642800, 'Partida', '1112', 1492642800, 'Joao', 'Vilamoura - JoÃ£o AntÃ£o, Guarda, Portugal', 'Faro Airport', 'JoÃ£o AntÃ£o, Guarda, Portugal', '-/-', '40.4605555, -7.2409377', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e77223 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '16.4636', 17603, '', 'Aguarda', '0', '0', '0', '2017-04-07 12:04:03', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e77223', '963354089', 'Alemanha', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492473600, '11knum15@gmail.com', '', 1492547100, 'Chegada', '1112', 1492556400, 'Joao', 'Faro Airport - Faro Airport, Faro, Portugal', 'Vilamoura', '-/-', 'Faro Airport, Faro, Portugal', '-/-', '37.0175956, -7.9697200', '', '1', '0', '0', 'RETORNO 240/58e77145 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '13.006244', 17602, '', 'Aguarda', '0', '0', '0', '2017-04-07 12:00:21', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e77145', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492560000, '11knum15@gmail.com', '', 1492556400, 'Partida', '1111', 1492556400, 'Joao', 'Vilamoura - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e77145 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '13.006244', 17601, '', 'Aguarda', '0', '0', '0', '2017-04-07 12:00:21', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e77145', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492387200, '11knum15@gmail.com', '', 1492460700, 'Chegada', '111', 1492470000, 'Joao', 'Faro Airport - Avenida Infante Dom Henrique J, Lisboa, Portugal', 'Vilamoura', '-/-', 'Avenida Infante Dom Henrique J, Lisboa, Portugal', '-/-', '38.7403154, -9.1022668', '', '1', '0', '0', 'RETORNO 240/58e7707b (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '27.07116', 17600, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:56:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e7707b', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36');
INSERT INTO `excel` (`data_servico`, `email`, `staff`, `hrs`, `servico`, `voo`, `voo_horario`, `nome_cl`, `local_recolha`, `local_entrega`, `morada_recolha`, `morada_entrega`, `morada_recolha_gps`, `morada_entrega_gps`, `ponto_referencia`, `px`, `cr`, `bebe`, `obs`, `operador`, `cobrar_operador`, `id`, `ticket`, `estado`, `cobrar_direto`, `cmx_st`, `cmx_op`, `data_criacao`, `rec_ope`, `rec_staf`, `pag_ope`, `pag_staf`, `matricula`, `referencia`, `telefone`, `pais`, `criado_direto`, `nid`, `end`, `created_by`, `navigator`) VALUES
(1492473600, '11knum15@gmail.com', '', 1492470000, 'Partida', '1112', 1492470000, 'Joao', 'Vilamoura - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e7707b (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '27.07116', 17599, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:56:59', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e7707b', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492300800, '11knum15@gmail.com', '', 1492297200, 'Interzone', '', 1492297200, 'Joao', 'Vilamoura', 'Faro Airport', 'Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal', 'Tivoli', '37.1351413, -8.0144699', '112.0120000, 1111.0000000', '', '1', '0', '0', '(1-4 Pax)  | TB | OBS: -/-', 'Site Paypal', '6.503122', 17597, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:45:48', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76ddc', '963354089', 'AustrÃ¡lia', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492041600, '11knum15@gmail.com', '', 1492088400, 'Interzone', '', 1492088400, 'Joao', 'Albufeira', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', '(1-4 Pax)  | TB | OBS: -/-', 'Site Paypal', '13.6565562', 17598, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:49:43', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e76ec7', '963354089', 'Alemanha', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492642800, 'Interzone', '', 1492642800, 'Jooa', 'Vilamoura', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', '(1-4 Pax)  | TB | OBS: -/-', 'Site Paypal', '6.776253124', 17596, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:43:33', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76d55', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492732800, '11knum15@gmail.com', '', 1492802700, 'Chegada', '11111', 1492812000, 'Ricardo', 'Faro Airport - Rua Adriano Correia de Oliveira JO, Loures, Portugal', 'Vilamoura', '-/-', 'Rua Adriano Correia de Oliveira JO, Loures, Portugal', '-/-', '38.7931220, -9.1405509', '', '1', '0', '0', 'RETORNO 240/58e76c21 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '27.07116', 17595, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:38:25', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76c21', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492732800, '11knum15@gmail.com', '', 1492812000, 'Partida', '11111', 1492812000, 'Ricardo', 'Vilamoura - Rua Adriano Correia de Oliveira JO, Loures, Portugal', 'Faro Airport', 'Rua Adriano Correia de Oliveira JO, Loures, Portugal', '-/-', '38.7931220, -9.1405509', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e76c21 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '27.07116', 17594, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:38:25', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76c21', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492694700, 'Chegada', '11190', 1492704000, 'Joao', 'Faro Airport - Rua Major JoÃ£o LuÃ­s de Moura AN, Odivelas, Portugal', 'Vilamoura', '-/-', 'Rua Major JoÃ£o LuÃ­s de Moura AN, Odivelas, Portugal', '-/-', '38.7859714, -9.2078806', '', '1', '0', '0', 'RETORNO 240/58e76b11 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '20.84', 17593, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:33:53', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76b11', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492704000, 'Partida', '1122', 1492704000, 'Joao', 'Vilamoura - JoÃ£o AntÃ£o, Guarda, Portugal', 'Faro Airport', 'JoÃ£o AntÃ£o, Guarda, Portugal', '-/-', '40.4605555, -7.2409377', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e76b11 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '20.84', 17592, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:33:53', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76b11', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492214400, '11knum15@gmail.com', '', 1492284600, 'Chegada', '111190', 1492293600, 'Joao', 'Faro Airport - Faro Airport, Faro, Portugal', 'Albufeira', '-/-', 'Faro Airport, Faro, Portugal', '-/-', '37.0175956, -7.9697200', '', '1', '0', '0', 'RETORNO 241/58e7699d (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '45.602088', 17591, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:27:41', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e7699d', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492214400, '11knum15@gmail.com', '', 1492293600, 'Partida', '1111', 1492293600, 'Joao', 'Albufeira - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 241/58e7699d (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '45.602088', 17590, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:27:41', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e7699d', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492128000, '11knum15@gmail.com', '', 1492197900, 'Chegada', '1190', 1492207200, 'Joao', 'Faro Airport - Marinha Grande, Portugal', 'Vilamoura', '-/-', 'Marinha Grande, Portugal', '-/-', '39.7503802, -8.9318059', '', '1', '0', '0', 'RETORNO 240/58e768d8 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '28.20814872', 17589, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:24:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e768d8', '96354089', 'AustrÃ¡lia', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492128000, '11knum15@gmail.com', '', 1492207200, 'Partida', '11091', 1492207200, 'Joao', 'Vilamoura - JoÃ£o AntÃ£o, Guarda, Portugal', 'Faro Airport', 'JoÃ£o AntÃ£o, Guarda, Portugal', '-/-', '40.4605555, -7.2409377', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e768d8 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '28.20814872', 17588, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:24:24', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e768d8', '96354089', 'AustrÃ¡lia', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1491955200, '11knum15@gmail.com', '', 1491989100, 'Chegada', '110911', 1491998400, 'Joao', 'Faro Airport - Marinha Grande, Portugal', 'Vilamoura', '-/-', 'Marinha Grande, Portugal', '-/-', '39.7503802, -8.9318059', '', '1', '0', '0', 'RETORNO 240/58e76875 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17587, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:22:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76875', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1491955200, '11knum15@gmail.com', '', 1491998400, 'Partida', '11109', 1491998400, 'Joao', 'Vilamoura - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal ', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e76875 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17586, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:22:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76875', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1491955200, '11knum15@gmail.com', '', 1492028700, 'Chegada', '100191', 1492038000, 'Joao', 'Faro Airport - Marinha Grande, Portugal', 'Vilamoura', '-/-', 'Marinha Grande, Portugal', '-/-', '39.7503802, -8.9318059', '', '1', '0', '0', 'RETORNO 240/58e767da (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '51.96', 17585, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:20:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e767da', '963354089', 'BulgÃ¡ria', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492041600, '11knum15@gmail.com', '', 1492038000, 'Partida', '112334', 1492038000, 'Joao', 'Vilamoura - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal ', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e767da (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '51.96', 17584, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:20:10', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e767da', '963354089', 'BulgÃ¡ria', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1491955200, '11knum15@gmail.com', '', 1492028700, 'Chegada', '10091', 1492038000, 'Joao', 'Faro Airport - Marina de Lagos, Lagos, Portugal', 'Vilamoura', '-/-', 'Marina de Lagos, Lagos, Portugal', '-/-', '37.1093907, -8.6747950', '', '1', '0', '0', 'RETORNO 240/58e76619 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17583, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:12:41', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76619', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492041600, '11knum15@gmail.com', '', 1492038000, 'Partida', '1112', 1492038000, 'Joao', 'Vilamoura - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal ', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e76619 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17582, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:12:41', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76619', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492716300, 'Chegada', '1111', 1492725600, 'Joao', 'Faro Airport - Andorinha, Portugal', 'Vilamoura', '-/-', 'Andorinha, Portugal', '-/-', '40.2784401, -8.5710330', '', '1', '0', '0', 'RETORNO 240/58e76506 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17581, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:08:06', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76506', '96354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492725600, 'Partida', '11233', 1492725600, 'Joao', 'Vilamoura - Rua Alegria MA, Almada, Portugal ', 'Faro Airport', 'Rua Alegria MA, Almada, Portugal', '-/-', '38.6559883, -9.1507175', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e76506 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17580, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:08:06', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76506', '96354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493493900, 'Chegada', '1111', 1493503200, 'Pedro', 'Faro Airport - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Vilamoura', '-/-', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '', '1', '0', '0', 'RETORNO 240/58e763b7 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17579, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:02:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e763b7', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493503200, 'Partida', '111000', 1493503200, 'Pedro', 'Vilamoura - JoÃ£o AntÃ£o, Guarda, Portugal ', 'Faro Airport', 'JoÃ£o AntÃ£o, Guarda, Portugal', '-/-', '40.4605555, -7.2409377', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e763b7 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17578, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:02:31', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e763b7', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492698300, 'Chegada', '10019', 1492707600, 'Joao', 'Faro Airport - Marinha Grande, Portugal', 'Vilamoura', '-/-', 'Marinha Grande, Portugal', '-/-', '39.7503802, -8.9318059', '', '1', '0', '0', 'RETORNO 240/58e76369 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17577, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:01:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76369', '963354089', 'BulgÃ¡ria', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492646400, '11knum15@gmail.com', '', 1492707600, 'Partida', '1199', 1492707600, 'Joao', 'Vilamoura - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal ', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e76369 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17576, '', 'Aguarda', '0', '0', '0', '2017-04-07 11:01:13', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76369', '963354089', 'BulgÃ¡ria', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492041600, '11knum15@gmail.com', '', 1492115100, 'Chegada', '1119', 1492124400, 'Jooa', 'Faro Airport - Marinha Grande, Portugal', 'Vilamoura', '-/-', 'Marinha Grande, Portugal', '-/-', '39.7503802, -8.9318059', '', '1', '0', '0', 'RETORNO 240/58e76008 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17575, '', 'Aguarda', '0', '0', '0', '2017-04-07 10:46:48', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76008', '963354089', 'Portugal', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492128000, '11knum15@gmail.com', '', 1492124400, 'Partida', '1112', 1492124400, 'Jooa', 'Vilamoura - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal ', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e76008 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17574, '', 'Aguarda', '0', '0', '0', '2017-04-07 10:46:48', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e76008', '963354089', 'Portugal', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493337600, '11knum15@gmail.com', '', 1493416800, 'Interzone', '', 1493416800, 'Joao', 'Albufeira - Rua Alegria MA, Almada, Portugal', 'Lagos, Algarve', '-/-', 'Rua Alegria MA, Almada, Portugal', '-/-', '38.6559883, -9.1507175', '', '1', '0', '0', 'RETORNO 242/58e75dcb (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '89.612', 17573, '', 'Aguarda', '0', '0', '0', '2017-04-07 10:37:15', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e75dcb', '963354089', 'Brasil', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493337600, '11knum15@gmail.com', '', 1493416800, 'Interzone', '', 1493416800, 'Joao', 'Lagos, Algarve - Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal', 'Albufeira', 'Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal', '-/-', '37.1351413, -8.0144699', '-/-', '', '1', '0', '0', 'TEM RETORNO 242/58e75dcb (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '89.612', 17572, '', 'Aguarda', '0', '0', '0', '2017-04-07 10:37:15', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e75dcb', '963354089', 'Brasil', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492041600, '11knum15@gmail.com', '', 1492065000, 'Chegada', '1111', 1492074000, 'Joao', 'Faro Airport - Joane, Portugal', 'Albufeira', '-/-', 'Joane, Portugal', 'NaN, NaN', '41.4384406, -8.4137240', '', '6', '0', '0', 'RETORNO 241/58e75d0a (5-8 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '64', 17571, '', 'Aguarda', '0', '0', '0', '2017-04-07 10:34:02', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e75d0a', '963354089', 'Portugal', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492041600, '11knum15@gmail.com', '', 1492074000, 'Partida', '1112', 1492074000, 'Joao', 'Albufeira - Avenida Infante Dom Henrique J, Lisboa, Portugal ', 'Faro Airport', 'Avenida Infante Dom Henrique J, Lisboa, Portugal', '-/-', '38.7403154, -9.1022668', '-/-', '', '6', '0', '0', 'TEM RETORNO 241/58e75d0a (5-8 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '64', 17570, '', 'Aguarda', '0', '0', '0', '2017-04-07 10:34:02', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e75d0a', '963354089', 'Portugal', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493493900, 'Chegada', '1001', 1493503200, 'Ricardo', 'Faro Airport - Joane, Portugal', 'Vilamoura', '-/-', 'Joane, Portugal', '-/-', '41.4384406, -8.4137229', '', '1', '0', '0', 'RETORNO 240/58e75b50 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '20.84', 17569, '', 'Aguarda', '0', '0', '0', '2017-04-07 10:26:40', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e75b50', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493503200, 'Partida', '1119', 1493503200, 'Ricardo', 'Vilamoura - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e75b50 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '20.84', 17568, '', 'Aguarda', '0', '0', '0', '2017-04-07 10:26:40', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e75b50', '963354089', 'Brasil', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492041600, '11knum15@gmail.com', '', 1492081200, 'Interzone', '', 1492084800, 'Joao', 'Lagos, Algarve - Praceta GuinÃ© GA, Sintra, Portugal', 'Albufeira', '-/-', 'Praceta GuinÃ© GA, Sintra, Portugal', '-/-', '38.7813154, -9.3322237', '', '1', '0', '0', 'RETORNO 242/58e75a74 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '86', 17567, '', 'Aguarda', '0', '0', '0', '2017-04-07 10:23:00', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e75a74', '963354089', 'Brasil', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492041600, '11knum15@gmail.com', '', 1492084800, 'Interzone', '', 1492084800, 'Joao', 'Albufeira - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal ', 'Lagos, Algarve', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 242/58e75a74 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '86', 17566, '', 'Aguarda', '0', '0', '0', '2017-04-07 10:23:00', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '242/58e75a74', '963354089', 'Brasil', 'localhost/loja/', '', 2760, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492905600, '11knum15@gmail.com', '', 1492939800, 'Golf', '100912', 1492948800, 'Joao', 'Albufeira', 'Albufeira', '-/-', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '12.0000000, 111.0000000', '37.1187840, -8.5282010', '', '1', '0', '0', 'RETORNO 245/58e750cd (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '329.272', 17565, '', 'Aguarda', '0', '0', '0', '2017-04-07 09:41:49', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58e750cd', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492905600, '11knum15@gmail.com', '', 1492948800, 'Golf', '1123', 1492948800, 'Joao', 'Albufeira - Faro Airport, Faro, Portugal', 'Vilamoura', 'Faro Airport, Faro, Portugal', '-/-', '37.0175956, -7.9697200', '-/-', '', '1', '0', '0', 'TEM RETORNO 245/58e750cd (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '329.272', 17564, '', 'Aguarda', '0', '0', '0', '2017-04-07 09:41:49', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58e750cd', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492905600, '11knum15@gmail.com', '', 1492963200, 'Interzone', '', 1492963200, 'Joao', 'Albufeira', 'Vilamoura', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', '(Golf110)  | TB | OBS: -/-', 'Site Paypal', '208.4', 17563, '', 'Aguarda', '0', '0', '0', '2017-04-07 08:07:11', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58e73a9f', '963354089', 'AustrÃ¡lia', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493510400, '11knum15@gmail.com', '', 1493506800, 'Interzone', '', 1493506800, 'Joao', 'Albufeira, Guia', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', '(1-4 Pax)  | TB | OBS: -/-', 'Site Paypal', '34.386', 17562, '', 'Aguarda', '0', '0', '0', '2017-04-06 23:35:57', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '243/58e6c2cd', '963354089', 'Portugal', 'localhost/loja/', '', 1920, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492732800, '11knum15@gmail.com', '', 1492779600, 'Interzone', '', 1492779600, 'Joao', 'Albufeira, Guia', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', '(1-4 Pax)  | TB | OBS: -/-', 'Site Transf.Banco', '33', 17561, '', 'Aguarda', '0', '0', '0', '2017-04-06 23:27:32', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '243/58e6c0d4', '96354089', 'AustrÃ¡lia', 'localhost/loja/', '', 1920, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493510400, '11knum15@gmail.com', '', 1493580600, 'Golf', '11109', 1493589600, 'Joao', 'Vilamoura - Faro, Portugal', 'Albufeira', '-/-', 'Faro, Portugal', '-/-', '37.0193548, -7.9304397', '', '1', '0', '0', 'RETORNO 245/58e6bfd7 (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '329.272', 17560, '', 'Aguarda', '0', '0', '0', '2017-04-06 23:23:19', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58e6bfd7', '96354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493510400, '11knum15@gmail.com', '', 1493589600, 'Golf', '11234', 1493589600, 'Joao', 'Albufeira - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Vilamoura', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 245/58e6bfd7 (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '329.272', 17559, '', 'Aguarda', '0', '0', '0', '2017-04-06 23:23:19', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58e6bfd7', '96354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493510400, '11knum15@gmail.com', '', 1493562600, 'Chegada', '1111', 1493571600, 'Joao', 'Faro Airport - Faro Airport, Faro, Portugal', 'Albufeira', '-/-', 'Faro Airport, Faro, Portugal', '-/-', '37.0175956, -7.9697200', '', '1', '0', '0', 'RETORNO 241/58e6bef4 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '43.764', 17558, '', 'Aguarda', '0', '0', '0', '2017-04-06 23:19:32', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e6bef4', '963354089', 'Alemanha', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493510400, '11knum15@gmail.com', '', 1493571600, 'Partida', '11120', 1493571600, 'Joao', 'Albufeira - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Faro Airport', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '-/-', '', '1', '0', '0', 'TEM RETORNO 241/58e6bef4 (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '43.764', 17557, '', 'Aguarda', '0', '0', '0', '2017-04-06 23:19:32', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e6bef4', '963354089', 'Alemanha', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493510400, '11knum15@gmail.com', '', 1493579700, 'Chegada', '1001', 1493589600, 'Joao', 'Faro Airport - Kais Restaurante Bar, Lisboa, Portugal', 'Algoz', '-/-', 'Kais Restaurante Bar, Lisboa, Portugal', '-/-', '38.7049372, -9.1567065', '', '1', '0', '0', 'RETORNO 244/58e6be4a (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '97.948', 17556, '', 'Aguarda', '0', '0', '0', '2017-04-06 23:16:42', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '244/58e6be4a', '963354089', 'Alemanha', 'localhost/loja/', '', 2700, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493510400, '11knum15@gmail.com', '', 1493589600, 'Partida', '1112', 1493589600, 'Joao', 'Algoz - JoÃ£o AntÃ£o, Guarda, Portugal', 'Faro Airport', 'JoÃ£o AntÃ£o, Guarda, Portugal', '-/-', '40.4605555, -7.2409377', '-/-', '', '1', '0', '0', 'TEM RETORNO 244/58e6be4a (1-4 Pax)  | MTR | OBS: -/-', 'Site Paypal', '97.948', 17555, '', 'Aguarda', '0', '0', '0', '2017-04-06 23:16:42', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '244/58e6be4a', '963354089', 'Alemanha', 'localhost/loja/', '', 2700, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492905600, '11knum15@gmail.com', '', 1492975500, 'Partida', '10001', 1492984800, 'Joao', 'Vilamoura - Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', 'Faro Airport', '-/-', 'Tivoli Marina PortimÃ£o, Rotunda da Marina, PortimÃ£o, Portugal', '-/-', '37.1187840, -8.5282010', '', '1', '0', '0', 'RETORNO 240/58e6bda8 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17554, '', 'Aguarda', '0', '0', '0', '2017-04-06 23:14:00', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e6bda8', '963354089', 'Alemanha', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492905600, '11knum15@gmail.com', '', 1492984800, 'Chegada', '1123', 1492984800, 'Joao', 'Faro Airport - Faro, Portugal ', 'Vilamoura', 'Faro, Portugal', '-/-', '37.0193548, -7.9304397', '-/-', '', '1', '0', '0', 'TEM RETORNO 240/58e6bda8 (1-4 Pax)  | MTR | OBS: -/-', 'Site Transf.Banco', '20', 17553, '', 'Aguarda', '0', '0', '0', '2017-04-06 23:14:00', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '240/58e6bda8', '963354089', 'Alemanha', 'localhost/loja/', '', 2100, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1491436800, '', '', 1491515580, '', '', 0, '', '', '', '', '', '', '', '', '1', '0', '0', '', 'loja_1', '12', 17551, '', 'Pendente', '0', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', '1', '-', 1800, 'Demo@06/04/2017 22:53:33', ''),
(1492819200, '11knum15@gmail.com', '', 1492815600, 'Interzone', '', 1492815600, 'Joao', 'Albufeira', 'Faro Airport', 'JoÃ£o AntÃ£o, Guarda, Portugal', '-/-', '40.4605555, -7.2409377', '-/-', '', '1', '0', '0', '(1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17552, '', 'Aguarda', '21', '0', '0', '2017-04-06 22:56:20', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e6b984', '963354089', 'Austria', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492819200, '11knum15@gmail.com', '', 1492857000, 'Golf', '1113', 1492866000, 'Joao', 'Vilamoura - Faro, Portugal', 'Albufeira', '-/-', 'Faro, Portugal', '-/-', '37.0193548, -7.9304397', '', '1', '0', '0', 'RETORNO 245/58e6a1a2 (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '329.272', 17550, '', 'Aguarda', '0', '0', '0', '2017-04-06 20:14:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58e6a1a2', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492819200, '11knum15@gmail.com', '', 1492866000, 'Golf', '1112', 1492866000, 'Joao', 'Albufeira - Avenida Infante Dom Henrique J, Lisboa, Portugal', 'Vilamoura', 'Avenida Infante Dom Henrique J, Lisboa, Portugal', '-/-', '38.7403154, -9.1022668', '-/-', '', '1', '0', '0', 'TEM RETORNO 245/58e6a1a2 (Golf110)  | MTR | OBS: -/-', 'Site Paypal', '329.272', 17549, '', 'Aguarda', '0', '0', '0', '2017-04-06 20:14:26', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '245/58e6a1a2', '963354089', 'Brasil', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493476080, 'Chegada', '19901', 1493485200, 'Joao', 'Faro Airport - FarminhÃ£o, Viseu, Portugal', 'Albufeira, Guia', '-/-', 'FarminhÃ£o, Viseu, Portugal', '-/-', '40.6154968, -8.0122119', '', '1', '0', '0', 'RETORNO 243/58e6a0db (1-4 Pax)  | MTR | OBS: aaaa', 'Site Transf.Banco', '66', 17548, '', 'Aguarda', '0', '0', '0', '2017-04-06 20:11:07', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '243/58e6a0db', '963354089', 'Alemanha', 'localhost/loja/', '', 1920, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1493424000, '11knum15@gmail.com', '', 1493485200, 'Partida', '1123', 1493485200, 'Joao', 'Albufeira, Guia - Faro, Portugal ', 'Faro Airport', 'Faro, Portugal', '-/-', '37.0193548, -7.9304397', '-/-', '', '1', '0', '0', 'TEM RETORNO 243/58e6a0db (1-4 Pax)  | MTR | OBS: aaaa', 'Site Transf.Banco', '66', 17547, '', 'Aguarda', '0', '0', '0', '2017-04-06 20:11:07', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '243/58e6a0db', '963354089', 'Alemanha', 'localhost/loja/', '', 1920, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1491436800, '', '', 1491507000, '', '', 0, '', '', '', '', '', '', '', '', '1', '0', '0', '', 'loja_1', '0', 17546, '', 'Pendente', '10', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', '1', '', 1800, '', ''),
(1491436800, '', 'Avelino', 1491506400, '', '', 0, '', '', '', '', '', 'NaN, NaN', 'NaN, NaN', '', '1', '0', '0', '', 'loja_1', '120', 17542, '', 'Fechado', '0', '23.52', '2.4', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', '1', '-', 1800, 'Demo@06/04/2017 18:18:07', ''),
(1491436800, '', '', 1491506220, '', '', 0, '', '', '', '', '', '', '', '', '1', '0', '0', '', 'loja_1', '9', 17543, '', 'Pendente', '0', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', '1', '-', 1800, 'Demo@06/04/2017 18:19:01', ''),
(1491436800, '', '', 1491506460, '', '', 0, '', '', '', '', '', '', '', '', '1', '0', '0', '', 'loja_1', '10', 17544, '', 'Pendente', '0', '', '0', '', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '-/-', '', '', '1', '-', 1800, 'Demo@06/04/2017 18:21:57', ''),
(1492732800, '11knum15@gmail.com', '', 1492732800, 'Interzone', '', 1492732800, 'Joao', 'Albufeira', 'Faro Airport', 'aaaaa', '-/-', '', '-/-', '', '1', '0', '0', '(1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17545, '', 'Aguarda', '21', '0', '0', '2017-04-06 18:27:45', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '241/58e688a1', '963354089', 'Alemanha', 'localhost/loja/', '', 1800, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36'),
(1492473600, '11knum15@gmail.com', '', 1492516800, 'Interzone', '', 1492516800, 'Joao', 'Albufeira, Guia', 'Faro Airport', 'Rua MaurÃ­cio SÃ£o Monteiro TI, LoulÃ©, Portugal', '-/-', '37.1351413, -8.0144699', '-/-', '', '1', '0', '0', '(1-4 Pax)  | MTR | OBS: -/-', 'Direto', '0', 17541, '', 'Aguarda', '33', '0', '0', '2017-04-06 17:37:01', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'NÃ£o', '', '243/58e67cbd', '963354089', 'Portugal', 'localhost/loja/', '', 1920, '', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=246 ;

--
-- Extraindo dados da tabela `locais`
--

INSERT INTO `locais` (`id`, `local`, `local_fim`, `visivel`, `duracao`, `tipo`, `cat`) VALUES
(240, 'Faro Airport', 'Vilamoura', '1', 2100, 1, 40),
(241, 'Faro Airport', 'Albufeira', '1', 1800, 1, 40),
(242, 'Albufeira', 'Lagos, Algarve', '1', 2760, 1, 40),
(243, 'Faro Airport', 'Albufeira, Guia', '1', 1920, 1, 40),
(244, 'Faro Airport', 'Algoz', '1', 2700, 1, 40),
(245, 'Albufeira', 'Vilamoura', '1', 1800, 1, 41);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais_frequentes`
--

CREATE TABLE IF NOT EXISTS `locais_frequentes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `zona` varchar(50) CHARACTER SET utf8 NOT NULL,
  `morada_gps` varchar(250) CHARACTER SET utf8 NOT NULL,
  `morada` varchar(250) CHARACTER SET utf8 NOT NULL,
  `referencias` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `locais_frequentes`
--

INSERT INTO `locais_frequentes` (`id`, `nome`, `zona`, `morada_gps`, `morada`, `referencias`) VALUES
(1, 'Zoomarine', 'Albufeira, Guia', '37.1251512, -8.3155475', 'EN 125 - Km 65', ''),
(6, 'Aqualand', 'Alcantarilha', '37.134894, -8.3692491', 'Estrada Nacional 125 - SÃ­tio das Areias', ''),
(7, 'Krazy World', 'Algoz', '37.1822015, -8.2839042', 'Lagoa de Viseu - Estrada Algoz', ''),
(4, 'Aquashow', 'Quarteira', '37.093707, -8.0771089', 'Estrada Nacional 396', ''),
(8, 'Zoo de Lagos', 'Lagos, Algarve', '37.145191, -8.768708', 'BarÃ£o de SÃ£o JoÃ£o', 'Estrada de Bensafrim'),
(9, 'Aeroporto Faro', 'Faro Airport', '37.021006, -7.969839', 'Aeroporto de Faro', ''),
(10, 'Aeroporto Lisboa', 'Lisbon', '38.769401, -9.127501', 'Alameda das Comunidades Portuguesas', ''),
(11, 'Vila Qta Lago 12 Lira', 'Vilamoura', '37.021006, -7.969839', 'Rua 5 de F', 'sdcscdsdc');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logfile`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1233 ;

--
-- Extraindo dados da tabela `logfile`
--

INSERT INTO `logfile` (`lat`, `datetime`, `id`, `staff`, `servico`, `accao`, `causa`, `tipo`, `hora`, `lng`, `matricula`) VALUES
(37.1278, 1490295122, 1232, 'Demo', 0, 'Recebido', '', '', '18:52:01', -8.27983, ''),
(0, 1490294981, 1231, 'Demo', 0, 'Recebido', '', '', '18:49:40', 0, ''),
(37.0914, 1490097480, 1230, 'Demo', 0, 'Recebido', '', '', '11:57:06', -8.22247, ''),
(0, 1490094025, 1229, 'Demo', 0, 'Recebido', '', '', '10:59:31', 0, ''),
(0, 1490093918, 1228, 'Demo', 0, 'Recebido', '', '', '10:57:43', 0, ''),
(0, 1490093878, 1227, 'Demo', 0, 'Recebido', '', '', '10:57:04', 0, ''),
(0, 1490093665, 1226, 'Demo', 0, 'Recebido', '', '', '10:53:31', 0, ''),
(0, 1490093644, 1225, 'Demo', 0, 'Recebido', '', '', '10:53:10', 0, ''),
(0, 1490093626, 1224, 'Demo', 0, 'Recebido', '', '', '10:52:52', 0, ''),
(0, 1490093409, 1223, 'Demo', 0, 'Recebido', '', '', '10:49:14', 0, ''),
(0, 1490092847, 1222, 'Demo', 0, 'Recebido', '', '', '10:39:52', 0, ''),
(0, 1490092828, 1221, 'Demo', 0, 'Recebido', '', '', '10:39:33', 0, ''),
(0, 1490014140, 1220, 'Demo', 0, 'Recebido', '', '', '12:48:06', 0, ''),
(37.0912, 1490014078, 1219, 'Demo', 0, 'Recebido', '', '', '12:47:56', -8.22284, ''),
(0, 1490012191, 1218, 'Demo', 0, 'Recebido', '', '', '12:15:37', 0, ''),
(37.0914, 1490012184, 1217, 'Demo', 0, 'Recebido', '', '', '12:16:23', -8.22309, ''),
(0, 1490012159, 1216, 'Demo', 0, 'Recebido', '', '', '12:15:04', 0, ''),
(37.0914, 1490012151, 1215, 'Demo', 0, 'Recebido', '', '', '12:15:50', -8.22309, ''),
(0, 1490012020, 1214, 'Demo', 0, 'Recebido', '', '', '12:12:46', 0, ''),
(37.0914, 1490011829, 1213, 'Demo', 17198, 'Aceite', '', 'Transfer', '12:10:28', -8.22309, ''),
(37.0914, 1490011794, 1212, 'Demo', 0, 'Recebido', '', '', '12:09:53', -8.22309, ''),
(0, 1490011725, 1211, 'Demo', 0, 'Recebido', '', '', '12:07:51', 0, ''),
(37.0914, 1490011454, 1210, 'Demo', 0, 'Recebido', '', '', '12:04:13', -8.22309, ''),
(0, 1490010889, 1209, 'Demo', 17145, 'Fechado', '', 'Chegada', '11:53:55', 0, '71TR64'),
(0, 1490010870, 1208, 'Demo', 17145, 'Iniciado', '', 'Chegada', '11:53:36', 0, '71TR64'),
(0, 1490010857, 1207, 'Demo', 17145, 'Aceite', '', 'Chegada', '11:53:23', 0, '71TR64'),
(0, 1490010813, 1206, 'Demo', 17145, 'Iniciado', '', 'Chegada', '11:52:39', 0, '71TR64'),
(0, 1490010810, 1205, 'Demo', 17145, 'Aceite', '', 'Chegada', '11:52:36', 0, '71TR64'),
(0, 1490010235, 1204, 'Demo', 0, 'Recebido', '', '', '11:43:00', 0, ''),
(37.0916, 1489768276, 1203, 'Demo', 0, 'Recebido', '', '', '16:31:16', -8.22297, ''),
(37.0914, 1489755172, 1202, 'Demo', 17156, 'Iniciado', '', 'Parques TemÃ¡ticos', '12:52:52', -8.22309, ''),
(37.0914, 1489755089, 1201, 'Demo', 0, 'Recebido', '', '', '12:51:29', -8.22309, ''),
(37.0914, 1489755059, 1200, 'Demo', 0, 'Recebido', '', '', '12:50:59', -8.22309, ''),
(37.0914, 1489755012, 1199, 'Demo', 17104, 'Aceite', '', 'Partida', '12:50:12', -8.22309, ''),
(37.0914, 1489754985, 1198, 'Demo', 17156, 'Aceite', '', 'Parques TemÃ¡ticos', '12:49:45', -8.22309, ''),
(37.0914, 1489754951, 1197, 'Demo', 0, 'Recebido', '', '', '12:49:11', -8.22309, ''),
(0, 1489590333, 1196, 'Demo', 0, 'Recebido', '', '', '15:04:38', 0, ''),
(0, 1489406394, 1195, 'Demo', 17102, 'Fechado', '', 'Interzone', '11:58:59', 0, ''),
(0, 1489406392, 1194, 'Demo', 17102, 'Iniciado', '', 'Interzone', '11:58:56', 0, ''),
(0, 1489406388, 1193, 'Demo', 17102, 'Aceite', '', 'Interzone', '11:58:52', 0, ''),
(0, 1489406074, 1192, 'Demo', 17105, 'Fechado', '', 'Interzone', '11:53:38', 0, ''),
(0, 1489406071, 1191, 'Demo', 17105, 'Iniciado', '', 'Interzone', '11:53:35', 0, ''),
(0, 1489406068, 1190, 'Demo', 17105, 'Aceite', '', 'Interzone', '11:53:32', 0, ''),
(0, 1489406055, 1189, 'Demo', 17104, 'Fechado', '', 'Partida', '11:53:19', 0, ''),
(0, 1489406052, 1188, 'Demo', 17104, 'Iniciado', '', 'Partida', '11:53:17', 0, ''),
(0, 1489406048, 1187, 'Demo', 17104, 'Aceite', '', 'Partida', '11:53:12', 0, ''),
(0, 1489406034, 1186, 'Demo', 17102, 'Fechado', '', 'Interzone', '11:52:58', 0, ''),
(0, 1489406020, 1185, 'Demo', 17102, 'Iniciado', '', 'Interzone', '11:52:44', 0, ''),
(0, 1489406017, 1184, 'Demo', 17102, 'Aceite', '', 'Interzone', '11:52:41', 0, ''),
(0, 1489405957, 1183, 'Demo', 0, 'Recebido', '', '', '11:51:42', 0, ''),
(37.1376, 1489312630, 1182, 'Demo', 0, 'Recebido', '', '', '09:56:14', -8.45216, ''),
(37.1376, 1489312553, 1181, 'Demo', 17082, 'Rejeitado', 'Acidente', 'Chegada', '09:54:56', -8.45216, '21TR12'),
(37.1376, 1489312544, 1180, 'Demo', 17082, 'Aceite', '', 'Chegada', '09:54:48', -8.45216, '21TR12'),
(37.1376, 1489312493, 1179, 'Demo', 0, 'Recebido', '', '', '09:53:57', -8.45216, ''),
(37.1376, 1489312390, 1178, 'Demo', 0, 'Recebido', '', '', '09:52:14', -8.45216, ''),
(37.0914, 1489159721, 1177, 'Demo', 17098, 'Iniciado', '', 'Transfers', '15:27:44', -8.22309, ''),
(37.0914, 1489159711, 1176, 'Demo', 17098, 'Aceite', '', 'Transfers', '15:27:33', -8.22309, ''),
(37.0914, 1489159697, 1175, 'Demo', 0, 'Recebido', '', '', '15:27:20', -8.22309, ''),
(37.0914, 1488480454, 1174, 'Demo', 17089, 'Fechado', '', 'Chegada', '18:46:36', -8.22309, '21TR12'),
(37.0914, 1488480449, 1173, 'Demo', 17089, 'Iniciado', '', 'Chegada', '18:46:31', -8.22309, '21TR12'),
(37.0914, 1488480445, 1172, 'Demo', 17089, 'Aceite', '', 'Chegada', '18:46:27', -8.22309, '21TR12'),
(37.0914, 1488479995, 1171, 'Demo', 17089, 'Fechado', '', 'Chegada', '18:38:57', -8.22309, '21TR12'),
(37.0914, 1488479815, 1170, 'Demo', 17089, 'Fechado', '', 'Chegada', '18:35:56', -8.22309, '21TR12'),
(37.0914, 1488479810, 1169, 'Demo', 17089, 'Iniciado', '', 'Chegada', '18:35:52', -8.22309, '21TR12'),
(37.0914, 1488479806, 1168, 'Demo', 17089, 'Aceite', '', 'Chegada', '18:35:47', -8.22309, '21TR12'),
(37.0914, 1488479158, 1167, 'Demo', 17089, 'Iniciado', '', 'Chegada', '18:25:00', -8.22309, '21TR12'),
(37.0914, 1488479148, 1166, 'Demo', 17089, 'Aceite', '', 'Chegada', '18:24:50', -8.22309, '21TR12'),
(37.0917, 1488476428, 1165, 'Demo', 17090, 'Fechado', '', 'Chegada', '17:39:30', -8.22307, '21TR12'),
(37.0917, 1488476423, 1164, 'Demo', 17090, 'Iniciado', '', 'Chegada', '17:39:25', -8.22307, '21TR12'),
(37.0917, 1488476419, 1163, 'Demo', 17090, 'Aceite', '', 'Chegada', '17:39:21', -8.22306, '21TR12'),
(37.0917, 1488476409, 1162, 'Demo', 17091, 'Fechado', '', 'Chegada', '17:39:11', -8.22305, '21TR12'),
(37.0917, 1488476405, 1161, 'Demo', 17091, 'Iniciado', '', 'Chegada', '17:39:07', -8.22309, '21TR12'),
(37.0916, 1488476400, 1160, 'Demo', 17091, 'Aceite', '', 'Chegada', '17:39:02', -8.22313, '21TR12'),
(37.0916, 1488476379, 1159, 'Demo', 17092, 'Fechado', '', 'Chegada', '17:38:41', -8.22288, '21TR12'),
(37.0915, 1488476374, 1158, 'Demo', 17092, 'Iniciado', '', 'Chegada', '17:38:36', -8.22291, '21TR12'),
(37.0914, 1488476324, 1157, 'Demo', 17092, 'Aceite', '', 'Chegada', '17:37:45', -8.22309, '21TR12'),
(37.0914, 1488471924, 1156, 'Demo', 17093, 'Fechado', '', 'Chegada', '16:24:26', -8.22309, '21TR12'),
(37.0914, 1488471840, 1155, 'Demo', 17093, 'Fechado', '', 'Chegada', '16:23:01', -8.22309, '21TR12'),
(37.0914, 1488471835, 1154, 'Demo', 17093, 'Iniciado', '', 'Chegada', '16:22:56', -8.22309, '21TR12'),
(37.0914, 1488471812, 1153, 'Demo', 17076, 'Fechado', '', 'Chegada', '16:22:34', -8.22309, '21TR12'),
(37.0914, 1488471776, 1152, 'Demo', 17093, 'Aceite', '', 'Chegada', '16:21:58', -8.22309, '21TR12'),
(37.0914, 1488471745, 1151, 'Demo', 17076, 'Fechado', '', 'Chegada', '16:21:27', -8.22309, '21TR12'),
(37.0914, 1488471739, 1150, 'Demo', 17076, 'Iniciado', '', 'Chegada', '16:21:20', -8.22309, '21TR12'),
(37.0914, 1488471725, 1149, 'Demo', 17076, 'Aceite', '', 'Chegada', '16:21:07', -8.22309, '21TR12'),
(37.0914, 1488471640, 1148, 'Demo', 0, 'Recebido', '', '', '16:19:42', -8.22309, ''),
(0, 1487749885, 1147, 'Demo', 0, 'Recebido', '', '', '07:50:25', 0, ''),
(0, 1487686520, 1146, 'Demo', 7969, 'Fechado', '', 'Chegada', '14:14:20', 0, '77XX88'),
(0, 1487686518, 1145, 'Demo', 7969, 'Iniciado', '', 'Chegada', '14:14:17', 0, '77XX88'),
(0, 1487686515, 1144, 'Demo', 7969, 'Aceite', '', 'Chegada', '14:14:15', 0, '77XX88'),
(0, 1487684739, 1143, 'Demo', 7970, 'Fechado', '', 'Interzone', '13:44:39', 0, '77XX88'),
(0, 1487684736, 1142, 'Demo', 7970, 'Iniciado', '', 'Interzone', '13:44:36', 0, '77XX88'),
(0, 1487684733, 1141, 'Demo', 7970, 'Aceite', '', 'Interzone', '13:44:33', 0, '77XX88'),
(0, 1487684629, 1140, 'Demo', 17067, 'Fechado', '', 'Partida', '13:42:49', 0, ''),
(0, 1487684626, 1139, 'Demo', 17067, 'Iniciado', '', 'Partida', '13:42:46', 0, ''),
(0, 1487684623, 1138, 'Demo', 17067, 'Aceite', '', 'Partida', '13:42:43', 0, ''),
(0, 1487684478, 1137, 'Demo', 17066, 'Fechado', '', 'Partida', '13:40:17', 0, ''),
(0, 1487684475, 1136, 'Demo', 17066, 'Iniciado', '', 'Partida', '13:40:15', 0, ''),
(0, 1487684472, 1135, 'Demo', 17066, 'Aceite', '', 'Partida', '13:40:12', 0, ''),
(0, 1487684237, 1134, 'Demo', 17067, 'Fechado', '', 'Partida', '13:36:17', 0, ''),
(0, 1487684235, 1133, 'Demo', 17067, 'Iniciado', '', 'Partida', '13:36:14', 0, ''),
(0, 1487684231, 1132, 'Demo', 17067, 'Aceite', '', 'Partida', '13:36:11', 0, ''),
(0, 1487684190, 1131, 'Demo', 17066, 'Fechado', '', 'Partida', '13:35:30', 0, ''),
(0, 1487684187, 1130, 'Demo', 17066, 'Iniciado', '', 'Partida', '13:35:27', 0, ''),
(0, 1487684184, 1129, 'Demo', 17066, 'Aceite', '', 'Partida', '13:35:24', 0, ''),
(0, 1487684084, 1128, 'Demo', 17061, 'Fechado', '', 'Chegada', '13:33:44', 0, '21TR12'),
(0, 1487684081, 1127, 'Demo', 17061, 'Iniciado', '', 'Chegada', '13:33:41', 0, '21TR12'),
(0, 1487684074, 1126, 'Demo', 17064, 'Fechado', '', 'Chegada', '13:33:34', 0, '21TR12'),
(0, 1487684071, 1125, 'Demo', 17064, 'Iniciado', '', 'Chegada', '13:33:31', 0, '21TR12'),
(0, 1487684066, 1124, 'Demo', 17064, 'Aceite', '', 'Chegada', '13:33:27', 0, '21TR12'),
(0, 1487684054, 1123, 'Demo', 7969, 'Fechado', '', 'Chegada', '13:33:14', 0, '77XX88'),
(0, 1487684050, 1122, 'Demo', 7969, 'Iniciado', '', 'Chegada', '13:33:10', 0, '77XX88'),
(0, 1487684040, 1121, 'Demo', 7969, 'Aceite', '', 'Chegada', '13:33:00', 0, '77XX88'),
(0, 1487684012, 1120, 'Demo', 7970, 'Fechado', '', 'Interzone', '13:32:33', 0, '77XX88'),
(0, 1487684009, 1119, 'Demo', 7970, 'Iniciado', '', 'Interzone', '13:32:29', 0, '77XX88'),
(0, 1487684005, 1118, 'Demo', 7970, 'Aceite', '', 'Interzone', '13:32:25', 0, '77XX88'),
(0, 1487683969, 1117, 'Demo', 17067, 'Fechado', '', 'Partida', '13:31:49', 0, ''),
(0, 1487683963, 1116, 'Demo', 17067, 'Iniciado', '', 'Partida', '13:31:44', 0, ''),
(0, 1487683960, 1115, 'Demo', 17067, 'Aceite', '', 'Partida', '13:31:40', 0, ''),
(0, 1487683911, 1114, 'Demo', 17066, 'Fechado', '', 'Partida', '13:30:52', 0, ''),
(0, 1487683906, 1113, 'Demo', 17066, 'Iniciado', '', 'Partida', '13:30:47', 0, ''),
(0, 1487683902, 1112, 'Demo', 17066, 'Aceite', '', 'Partida', '13:30:42', 0, ''),
(0, 1487683869, 1111, 'Demo', 0, 'Recebido', '', '', '13:30:09', 0, ''),
(37.0914, 1487071850, 1110, 'Demo', 0, 'Recebido', '', '', '11:30:41', -8.22309, ''),
(37.0921, 1487071842, 1109, 'Demo', 0, 'Recebido', '', '', '11:29:41', -8.22284, ''),
(37.0914, 1487071405, 1108, 'Demo', 0, 'Recebido', '', '', '11:23:17', -8.22309, ''),
(37.0914, 1487071398, 1107, 'Demo', 0, 'Recebido', '', '', '11:22:17', -8.22309, ''),
(37.0914, 1487071213, 1106, 'Demo', 0, 'Recebido', '', '', '11:19:12', -8.22309, ''),
(37.0914, 1487069342, 1105, 'Demo', 17064, 'Iniciado', '', 'Chegada', '10:48:54', -8.22309, '21TR12'),
(37.0914, 1487069322, 1104, 'Demo', 17067, 'Fechado', '', 'Partida', '10:48:33', -8.22309, ''),
(37.0914, 1487069310, 1103, 'Demo', 17067, 'Iniciado', '', 'Partida', '10:48:22', -8.22309, ''),
(37.0914, 1487069293, 1102, 'Demo', 17067, 'Aceite', '', 'Partida', '10:48:04', -8.22309, ''),
(37.0914, 1487069245, 1101, 'Demo', 0, 'Recebido', '', '', '10:46:24', -8.22309, ''),
(37.0914, 1487069241, 1100, 'Demo', 0, 'Recebido', '', '', '10:47:20', -8.22309, ''),
(37.0914, 1487069232, 1099, 'Demo', 0, 'Recebido', '', '', '10:47:03', -8.22309, ''),
(37.0914, 1487068931, 1098, 'Demo', 17066, 'Fechado', '', 'Partida', '10:42:09', -8.22309, ''),
(37.0914, 1487068809, 1097, 'Demo', 17066, 'Iniciado', '', 'Partida', '10:40:07', -8.22309, ''),
(37.0914, 1487068796, 1096, 'Demo', 17066, 'Aceite', '', 'Partida', '10:39:52', -8.22309, ''),
(37.0914, 1487068748, 1095, 'Demo', 0, 'Recebido', '', '', '10:38:07', -8.22309, ''),
(37.0914, 1487068597, 1094, 'Demo', 0, 'Recebido', '', '', '10:36:36', -8.22309, ''),
(37.0914, 1487068587, 1093, 'Demo', 17064, 'Aceite', '', 'Chegada', '10:36:26', -8.22309, '21TR12'),
(37.0914, 1487068575, 1092, 'Demo', 7969, 'Aceite', '', 'Chegada', '10:36:15', -8.22309, '77XX88'),
(37.0914, 1487068459, 1091, 'Demo', 0, 'Recebido', '', '', '10:34:11', -8.22309, ''),
(37.0914, 1487068283, 1090, 'Demo', 0, 'Recebido', '', '', '10:31:22', -8.22309, ''),
(37.0914, 1487068163, 1089, 'Demo', 0, 'Recebido', '', '', '10:29:22', -8.22309, ''),
(37.0918, 1487067972, 1088, 'Demo', 0, 'Recebido', '', '', '10:25:11', -8.22299, ''),
(37.0914, 1485344562, 1087, 'Demo', 0, 'Recebido', '', '', '11:41:37', -8.22309, ''),
(37.0914, 1485344390, 1086, 'Demo', 0, 'Recebido', '', '', '11:38:45', -8.22309, ''),
(37.0914, 1485344059, 1085, 'Demo', 0, 'Recebido', '', '', '11:33:14', -8.22309, ''),
(37.0914, 1485343983, 1084, 'Demo', 0, 'Recebido', '', '', '11:31:58', -8.22309, ''),
(37.0914, 1485343854, 1083, 'Demo', 0, 'Recebido', '', '', '11:29:48', -8.22309, ''),
(37.0914, 1485343369, 1082, 'Demo', 0, 'Recebido', '', '', '11:21:44', -8.22309, ''),
(37.0914, 1485342603, 1081, 'Demo', 0, 'Recebido', '', '', '11:08:57', -8.22309, ''),
(37.0916, 1485341562, 1080, 'Demo', 0, 'Recebido', '', '', '10:51:37', -8.22305, ''),
(37.0914, 1484930911, 1079, 'Demo', 16987, 'Fechado', '', 'Chegada', '16:47:25', -8.22305, ''),
(37.0915, 1484930860, 1078, 'Demo', 16987, 'Iniciado', '', 'Chegada', '16:46:35', -8.22296, ''),
(37.0914, 1484930845, 1077, 'Demo', 16987, 'Aceite', '', 'Chegada', '16:46:20', -8.22305, ''),
(37.0914, 1484930805, 1076, 'Demo', 8768, 'Fechado', '', 'Interzone', '16:45:40', -8.22305, ''),
(37.0914, 1484930789, 1075, 'Demo', 8768, 'Iniciado', '', 'Interzone', '16:45:24', -8.22305, ''),
(37.0914, 1484930782, 1074, 'Demo', 8768, 'Aceite', '', 'Interzone', '16:45:17', -8.22305, ''),
(37.0914, 1484930741, 1073, 'Demo', 8971, 'Fechado', '', 'Parques TemÃ¡ticos', '16:44:36', -8.22305, ''),
(37.0914, 1484930727, 1072, 'Demo', 8971, 'Iniciado', '', 'Parques TemÃ¡ticos', '16:44:22', -8.22305, ''),
(37.0914, 1484930709, 1071, 'Demo', 8971, 'Aceite', '', 'Parques TemÃ¡ticos', '16:44:04', -8.22305, ''),
(37.0914, 1484930229, 1070, 'Demo', 0, 'Recebido', '', '', '16:36:04', -8.22305, ''),
(37.0914, 1484930068, 1069, 'Demo', 16987, 'Rejeitado', 'Acidente', 'Chegada', '16:33:23', -8.22305, ''),
(37.0914, 1484929998, 1068, 'Demo', 16987, 'Iniciado', '', 'Chegada', '16:32:13', -8.22305, ''),
(37.0914, 1484929986, 1067, 'Demo', 16987, 'Aceite', '', 'Chegada', '16:32:01', -8.22305, ''),
(37.0914, 1484929936, 1066, 'Demo', 0, 'Recebido', '', '', '16:31:11', -8.22305, ''),
(37.0914, 1484929765, 1065, 'Demo', 0, 'Recebido', '', '', '16:28:20', -8.22305, ''),
(37.0914, 1484929598, 1064, 'Demo', 0, 'Recebido', '', '', '16:25:33', -8.22305, ''),
(37.0914, 1484929099, 1063, 'Demo', 0, 'Recebido', '', '', '16:17:14', -8.22305, ''),
(37.0914, 1484928252, 1062, 'Demo', 8655, 'Iniciado', '', 'Chegada', '16:03:08', -8.22305, ''),
(37.0914, 1484928204, 1061, 'Demo', 8655, 'Aceite', '', 'Chegada', '16:02:20', -8.22305, ''),
(37.0914, 1484928132, 1060, 'Demo', 0, 'Recebido', '', '', '16:01:06', -8.22305, ''),
(37.0914, 1484927911, 1059, 'Demo', 0, 'Recebido', '', '', '15:57:25', -8.22305, ''),
(37.087, 1482253874, 1058, 'Demo', 16527, 'Aceite', '', 'Chegada', '17:11:15', -8.11021, '37ET58'),
(37.0868, 1482253828, 1057, 'Demo', 0, 'Recebido', '', '', '17:10:29', -8.11019, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `operador`
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
  `loja` varchar(10) NOT NULL DEFAULT 'false',
  `dominio` varchar(100) DEFAULT 'false',
  `taxa_de_servico` tinyint(1) NOT NULL,
  `tipo_taxa_de_servico` varchar(100) NOT NULL,
  `valor_taxa_de_servico` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Extraindo dados da tabela `operador`
--

INSERT INTO `operador` (`id`, `nome`, `responsavel`, `comissao`, `email`, `tipo`, `utilizador`, `tel`, `password`, `gestao`, `loja`, `dominio`, `taxa_de_servico`, `tipo_taxa_de_servico`, `valor_taxa_de_servico`) VALUES
(35, 'loja_1', 'Transfers', '2', '11knum15@gmail.com', 'Tabela Percentagem', 'admin', '963354089', '$GTr9bV7AbxeY', 'checked', 'checked', 'localhost', 0, '', ''),
(36, 'Loja_2', 'Loja2', '', '11knum15@gmail.com', 'Tabela', 'demo', '963354089', '$G2ESy9ieGSLc', 'checked', 'false', 'localhost', 0, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `operador_noturno`
--

CREATE TABLE IF NOT EXISTS `operador_noturno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `valor` varchar(25) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_label` int(6) NOT NULL,
  `prod_id` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=512 ;

--
-- Extraindo dados da tabela `operador_noturno`
--

INSERT INTO `operador_noturno` (`id`, `id_categoria`, `valor`, `id_operador`, `id_label`, `prod_id`) VALUES
(457, 40, '55.99', 28, 103, 243),
(456, 40, '44.99', 28, 102, 243),
(455, 40, '33.99', 28, 101, 243),
(454, 40, '67.99', 28, 103, 242),
(453, 40, '54.99', 28, 102, 242),
(452, 40, '43.99', 28, 101, 242),
(451, 40, '41.99', 28, 103, 241),
(450, 40, '32.99', 28, 102, 241),
(449, 40, '21.99', 28, 101, 241),
(448, 40, '46.99', 28, 103, 240),
(447, 40, '34.99', 28, 102, 240),
(446, 40, '23.99', 28, 101, 240),
(475, 40, '67', 32, 103, 244),
(474, 40, '56', 32, 102, 244),
(473, 40, '47', 32, 101, 244),
(472, 40, '55', 32, 103, 243),
(471, 40, '44', 32, 102, 243),
(470, 40, '33', 32, 101, 243),
(469, 40, '67', 32, 103, 242),
(468, 40, '54', 32, 102, 242),
(467, 40, '43', 32, 101, 242),
(466, 40, '41', 32, 103, 241),
(465, 40, '32', 32, 102, 241),
(464, 40, '21', 32, 101, 241),
(463, 40, '46', 32, 103, 240),
(462, 40, '34', 32, 102, 240),
(461, 40, '23', 32, 101, 240),
(460, 40, '67.99', 28, 103, 244),
(459, 40, '56.99', 28, 102, 244),
(458, 40, '47.99', 28, 101, 244),
(476, 40, '112', 35, 101, 240),
(477, 40, '111', 35, 102, 240),
(478, 40, '112', 35, 103, 240),
(479, 40, '20', 35, 101, 241),
(480, 40, '11', 35, 102, 241),
(481, 40, '555', 35, 103, 241),
(482, 40, '40', 35, 101, 242),
(483, 40, '60', 35, 102, 242),
(484, 40, '70', 35, 103, 242),
(485, 40, '33', 35, 101, 243),
(486, 40, '44', 35, 102, 243),
(487, 40, '55', 35, 103, 243),
(488, 40, '40.12', 35, 101, 244),
(489, 40, '90.11', 35, 102, 244),
(490, 40, '100.12', 35, 103, 244),
(511, 41, '600', 35, 105, 245),
(510, 41, '300', 35, 104, 245),
(493, 41, '200', 36, 104, 245),
(494, 41, '400', 36, 105, 245);

-- --------------------------------------------------------

--
-- Estrutura da tabela `operador_precos`
--

CREATE TABLE IF NOT EXISTS `operador_precos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `valor` varchar(25) NOT NULL DEFAULT '0',
  `prod_id` int(10) NOT NULL,
  `id_label` int(10) NOT NULL,
  `id_operador` int(10) NOT NULL,
  `id_categoria` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1817 ;

--
-- Extraindo dados da tabela `operador_precos`
--

INSERT INTO `operador_precos` (`id`, `valor`, `prod_id`, `id_label`, `id_operador`, `id_categoria`) VALUES
(1748, '54.00', 244, 101, 28, 40),
(1747, '63.50', 243, 103, 28, 40),
(1746, '50.50', 243, 102, 28, 40),
(1745, '38.00', 243, 101, 28, 40),
(1744, '77.00', 242, 103, 28, 40),
(1743, '62.00', 242, 102, 28, 40),
(1742, '49.50', 242, 101, 28, 40),
(1741, '47.00', 241, 103, 28, 40),
(1740, '37.00', 241, 102, 28, 40),
(1739, '24.00', 241, 101, 28, 40),
(1738, '53.00', 240, 103, 28, 40),
(1736, '26.50', 240, 101, 28, 40),
(1737, '39.00', 240, 102, 28, 40),
(1778, '42.50', 244, 101, 32, 40),
(1779, '50.50', 244, 102, 32, 40),
(1780, '60.50', 244, 103, 32, 40),
(1777, '49.50', 243, 103, 32, 40),
(1776, '39.50', 243, 102, 32, 40),
(1775, '29.50', 243, 101, 32, 40),
(1774, '60.50', 242, 103, 32, 40),
(1773, '48.50', 242, 102, 32, 40),
(1772, '38.50', 242, 101, 32, 40),
(1771, '37.00', 241, 103, 32, 40),
(1770, '29.00', 241, 102, 32, 40),
(1769, '19.00', 241, 101, 32, 40),
(1768, '41.50', 240, 103, 32, 40),
(1767, '30.50', 240, 102, 32, 40),
(1766, '20.50', 240, 101, 32, 40),
(1750, '77.00', 244, 103, 28, 40),
(1749, '64.50', 244, 102, 28, 40),
(1781, '10', 240, 101, 35, 40),
(1782, '20', 240, 102, 35, 40),
(1783, '11', 240, 103, 35, 40),
(1784, '21', 241, 101, 35, 40),
(1785, '32', 241, 102, 35, 40),
(1786, '41', 241, 103, 35, 40),
(1787, '43', 242, 101, 35, 40),
(1788, '54', 242, 102, 35, 40),
(1789, '67', 242, 103, 35, 40),
(1790, '33', 243, 101, 35, 40),
(1791, '44', 243, 102, 35, 40),
(1792, '55', 243, 103, 35, 40),
(1793, '47', 244, 101, 35, 40),
(1794, '56', 244, 102, 35, 40),
(1795, '67', 244, 103, 35, 40),
(1816, '401', 245, 105, 35, 41),
(1815, '200', 245, 104, 35, 41),
(1798, '300', 245, 104, 36, 41),
(1799, '500', 245, 105, 36, 41);

-- --------------------------------------------------------

--
-- Estrutura da tabela `operador_tab_calc`
--

CREATE TABLE IF NOT EXISTS `operador_tab_calc` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `valor` varchar(6) DEFAULT '0',
  `id_operador` int(6) NOT NULL,
  `id_categoria` int(6) NOT NULL,
  `count_prods` int(6) NOT NULL,
  `count_labels` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Extraindo dados da tabela `operador_tab_calc`
--

INSERT INTO `operador_tab_calc` (`id`, `valor`, `id_operador`, `id_categoria`, `count_prods`, `count_labels`) VALUES
(124, '-0.1', 32, 40, 0, 0),
(102, '-0.55', 29, 28, 0, 0),
(123, '0.15', 28, 40, 0, 0),
(125, '0.02', 35, 40, 0, 0),
(129, '', 35, 41, 0, 0),
(127, '', 36, 41, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `operador_utilizadores`
--

CREATE TABLE IF NOT EXISTS `operador_utilizadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `utilizador` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 NOT NULL,
  `operador_id` int(10) unsigned NOT NULL,
  `isLocked` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `utilizador_UNIQUE` (`utilizador`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `operador_utilizadores`
--

INSERT INTO `operador_utilizadores` (`id`, `nome`, `email`, `utilizador`, `password`, `operador_id`, `isLocked`) VALUES
(1, 'demo1234', 'teste@teste.pt', 'demo1234', '$GGYvHUR2FqSo', 30, 0),
(2, 'Ferreira', 'manuel.ferreira@oseubackoffice.com', 'Ferreira', '$GyX3MRQqNvcE', 28, 0),
(3, 'pedro', 'vgspedro@gmail.com', 'pedro', '$G7Jsrv/EBHrE', 28, 0),
(4, 'Joao Peleira', '11knum15@gmail.com', 'joao', '$GkWqSS5PrOxo', 35, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `payments`
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
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `link`, `descricao`, `referencia`) VALUES
(1, 'aa', 'aaa', '59d611a0/36'),
(2, 'p1', '1', '59d620a0/36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_orcamento`
--

CREATE TABLE IF NOT EXISTS `pedido_orcamento` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `data_hora_actual` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `privilegios`
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
-- Extraindo dados da tabela `privilegios`
--

INSERT INTO `privilegios` (`id`, `tipo`, `m10`, `m11`, `m12`, `m13`, `m14`, `m20`, `m21`, `m22`, `m23`, `m24`, `m25`, `m30`, `m31`, `m32`, `m33`, `m34`, `m40`, `m41`, `m42`, `m43`, `m50`, `m51`, `m52`, `m53`, `m60`, `m61`, `m62`, `m63`, `m70`, `m71`, `m72`, `m73`, `m80`, `m81`, `m82`) VALUES
(1, 'SuperUser', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked'),
(2, 'Administrator', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked'),
(3, 'GestorPlus', 'checked', 'checked', 'checked', 'false', 'false', 'checked', 'checked', 'false', 'checked', 'checked', 'false', 'checked', 'false', 'false', 'false', 'false', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'checked', 'false', 'checked', 'false', 'false', 'false', 'checked', 'checked', 'false', 'false', 'checked', 'false', 'false'),
(4, 'Gestor', 'checked', 'false', 'checked', 'checked', 'false', 'checked', 'checked', 'checked', 'checked', 'false', 'false', 'checked', 'false', 'false', 'false', 'false', 'checked', 'checked', 'checked', 'false', 'checked', 'checked', 'false', 'false', 'checked', 'false', 'false', 'false', 'checked', 'false', 'false', 'false', 'checked', 'false', 'false');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pr_admin`
--

CREATE TABLE IF NOT EXISTS `pr_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `equipa` varchar(25) NOT NULL,
  `lat` varchar(25) NOT NULL,
  `sessao` int(11) NOT NULL,
  `comissao` varchar(6) NOT NULL,
  `vencimento` varchar(6) NOT NULL,
  `lng` varchar(25) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `regua` varchar(10) NOT NULL DEFAULT 'Staff',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Extraindo dados da tabela `pr_admin`
--

INSERT INTO `pr_admin` (`id`, `grupo`, `email`, `password`, `equipa`, `lat`, `sessao`, `comissao`, `vencimento`, `lng`, `tipo`, `regua`) VALUES
(3, '-/-', 'suporte@oseubackoffice.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Demo', '', 0, '12', '100', '', 'Percentagem', 'Staff'),
(53, '-/-', 'vgspedro@gmail.com', 'de01c1d48db6c321c637457113ed80d5', 'Mytravel', '', 0, '', '600', '', 'Fixo', 'Forn.'),
(63, '', 'luis@luis.com', 'e10adc3949ba59abbe56e057f20f883e', 'LuÃ­s AntÃ³nio', '', 0, '20', '0', '', 'Percentagem', 'Staff'),
(62, '35-Junior_Bus', 'xtabela@ff.pt', '8fa1153e586a3f2b181c401853705e71', 'JoÃ£o Paulo', '', 0, '', '450', '', 'Fixo Tabela', 'Staff'),
(64, '', 'avelino@teste.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Avelino', '', 0, '20', '500', '', 'Percentagem', 'Staff');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recolha_operadores`
--

CREATE TABLE IF NOT EXISTS `recolha_operadores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `local_recolha` varchar(50) NOT NULL,
  `operador_nome` varchar(50) NOT NULL,
  `id_operador` int(10) NOT NULL,
  `pt_ref_recolha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `recolha_operadores`
--

INSERT INTO `recolha_operadores` (`id`, `local_recolha`, `operador_nome`, `id_operador`, `pt_ref_recolha`) VALUES
(27, '37.0889352,-8.2239032', 'Direto', 28, 'Cerro Mar Garden, Albufeira'),
(24, '37.0889352,-8.2239032', 'Direto', 28, 'Hotel Apartamentos SolÃ¡qua, Albufeira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `staff_calc_tab`
--

CREATE TABLE IF NOT EXISTS `staff_calc_tab` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_cat_staff` int(10) NOT NULL,
  `id_cat_prod` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Extraindo dados da tabela `staff_calc_tab`
--

INSERT INTO `staff_calc_tab` (`id`, `id_cat_staff`, `id_cat_prod`) VALUES
(104, 34, 28),
(103, 33, 28),
(105, 35, 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `staff_calc_values`
--

CREATE TABLE IF NOT EXISTS `staff_calc_values` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_group` int(10) NOT NULL,
  `id_category` int(10) NOT NULL,
  `id_prod` int(10) NOT NULL,
  `id_label` int(10) NOT NULL,
  `total` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=182 ;

--
-- Extraindo dados da tabela `staff_calc_values`
--

INSERT INTO `staff_calc_values` (`id`, `id_group`, `id_category`, `id_prod`, `id_label`, `total`) VALUES
(167, 34, 28, 223, 83, '2'),
(166, 33, 28, 219, 89, '10'),
(165, 33, 28, 219, 85, '8'),
(161, 33, 28, 218, 83, '1'),
(162, 33, 28, 218, 85, '2'),
(163, 33, 28, 218, 89, '3'),
(164, 33, 28, 219, 83, '7'),
(148, 33, 28, 223, 89, '3'),
(149, 33, 28, 224, 83, '1.5'),
(157, 33, 28, 225, 89, '30'),
(155, 33, 28, 225, 83, '15'),
(156, 33, 28, 225, 85, '20'),
(151, 33, 28, 224, 89, '4.5'),
(150, 33, 28, 224, 85, '3'),
(147, 33, 28, 223, 85, '2'),
(146, 33, 28, 223, 83, '1'),
(168, 34, 28, 223, 85, '3'),
(169, 34, 28, 223, 89, '4'),
(170, 34, 28, 224, 83, '2'),
(171, 34, 28, 224, 85, '2.5'),
(172, 34, 28, 224, 89, '4'),
(173, 34, 28, 225, 83, '17'),
(174, 34, 28, 225, 85, '21'),
(175, 34, 28, 225, 89, '25'),
(176, 34, 28, 218, 83, '2'),
(177, 34, 28, 218, 85, '3'),
(178, 34, 28, 218, 89, '4'),
(179, 34, 28, 219, 83, '6'),
(180, 34, 28, 219, 85, '8'),
(181, 34, 28, 219, 89, '10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `staff_cat_tabela`
--

CREATE TABLE IF NOT EXISTS `staff_cat_tabela` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Extraindo dados da tabela `staff_cat_tabela`
--

INSERT INTO `staff_cat_tabela` (`id`, `nome`) VALUES
(33, 'Junior'),
(34, 'Senior'),
(35, 'Junior_Bus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestao`
--

CREATE TABLE IF NOT EXISTS `sugestao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `sugestao`
--

INSERT INTO `sugestao` (`id`, `link`, `descricao`, `referencia`) VALUES
(1, 'aa', 'aaa', '59d5fea4/36'),
(2, 'aa1', 'aaa1', '59d5fea4/36'),
(3, 'sss', 'ddd', '59d5ff94/35'),
(4, 'mm', 'mmm', '59d60084/36'),
(5, 'lok', '1', '59d62028/36'),
(6, 'sug1', '1', '59d620a0/36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `suporte`
--

CREATE TABLE IF NOT EXISTS `suporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora_suporte` int(15) NOT NULL,
  `assistencia_nome` varchar(255) NOT NULL,
  `assistencia_obs` varchar(255) NOT NULL,
  `nome_operador` varchar(255) NOT NULL,
  `duracao` int(15) NOT NULL,
  `solucao_problema` varchar(10) NOT NULL,
  `proxima_data` int(15) NOT NULL,
  `nome_pessoa` varchar(255) NOT NULL,
  `telefone` int(15) NOT NULL,
  `obs_suporte` varchar(255) NOT NULL,
  `id_cliente_assistencia` int(11) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `suporte`
--

INSERT INTO `suporte` (`id`, `data_hora_suporte`, `assistencia_nome`, `assistencia_obs`, `nome_operador`, `duracao`, `solucao_problema`, `proxima_data`, `nome_pessoa`, `telefone`, `obs_suporte`, `id_cliente_assistencia`, `referencia`) VALUES
(1, 1494418080, 'Joao Goncalo', 'Falta Banners', 'Sara Sequeira', 92, 'NÃ£o', 1494633600, 'Manuel ferreira', 963354089, '', 36, '59d620a0/36'),
(2, 1494418260, 'KKk', 'LOjas Online', 'Pedro Viegas', 39, 'NÃ£o', 1494374400, 'aa', 963354089, '', 36, '59d62154/36'),
(3, 1494419040, 'Joao', 'Lops', 'Pedro Viegas', 281000, 'Sim', 0, '', 0, '', 36, '59d62460/36'),
(4, 1494420360, 'Jorge', '', 'Jose saraiva', 21000, 'Sim', 0, '', 0, '', 36, '59d62988/36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `su_sudo`
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
-- Extraindo dados da tabela `su_sudo`
--

INSERT INTO `su_sudo` (`id`, `nome`, `pass`, `privilegios`, `email`, `tipo`, `no_del`) VALUES
(1, 'Pedro', 'c6cc8094c2dc07b700ffcc36d64e2138', '3', 'vgspedro@gmail.com', 'SuperUser', '1'),
(2, 'Ferreira', 'a0099ac6dd1c32b1524709810a5c9b5e', '3', 'geral@oseubackoffice.com', 'SuperUser', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_servico`
--

CREATE TABLE IF NOT EXISTS `tipo_servico` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `servico` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `tipo_servico`
--

INSERT INTO `tipo_servico` (`id`, `servico`) VALUES
(1, 'Chegada'),
(2, 'Partida'),
(3, 'Interzone'),
(15, 'Golf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE IF NOT EXISTS `veiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(10) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `data_matricula` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `km_iniciais` int(7) NOT NULL,
  `lugares` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `matricula`, `marca`, `data_matricula`, `modelo`, `km_iniciais`, `lugares`) VALUES
(6, '88FF77', 'Seat', 1462838400, 'Alhandra', 8134123, 7),
(19, '77XX88', 'Dacia', 1462838400, 'Sandero', 123456, 4),
(16, '45FF45', 'Renault', 1462838400, 'Megane', 4567, 4),
(17, '85JJ85', 'Mercedes', 1462838400, 'E300', 985467, 4),
(20, '21TR12', 'Audi', 1462838400, 'A4 Avant', 85741, 4),
(21, '54CZ90', 'Volkwagen', 1462838400, 'Sharan', 98125, 4),
(22, 'QA7185', 'Volvo', 1462838400, 'V70', 215896, 4),
(23, '45ZG02', 'BMW', 1462838400, '535d', 789852, 4),
(24, '71TR64', 'Skoda', 1462838400, 'Fabia', 1123520, 4),
(26, 'IO4707', 'Honda', 1486944000, 'Accord', 452528, 5),
(27, 'TR7812', 'Sabb', 1486944000, 'E930', 8123456, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `zonas_operadores`
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
