-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2018 às 20:22
-- Versão do servidor: 5.6.17
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oa1uszym_admin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_del` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id`, `nome`, `pass`, `email`, `no_del`) VALUES
(1, 'Pedro', 'c6cc8094c2dc07b700ffcc36d64e2138', 'vgspedro@gmail.com', '1'),
(2, 'Ferreira', '8d13ed81f15ff53688df90dd38cbd6d6', 'geral@oseubackoffice.com', '0');

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
(37, 1495929600, 'Transfergest Pro', 'Johan', 111222333, 'Joao Carvalho', 963354089, 0, 0, 'joaocarvalho@hotmail.com', 'transfergest.com', 'Wall Street');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `suporte`
--

INSERT INTO `suporte` (`id`, `data_hora_suporte`, `assistencia_nome`, `assistencia_obs`, `nome_operador`, `duracao`, `solucao_problema`, `proxima_data`, `nome_pessoa`, `telefone`, `obs_suporte`, `id_cliente_assistencia`, `referencia`) VALUES
(1, 1494418080, 'Joao Goncalo', 'Falta Banners', 'Sara Sequeira', 92, 'NÃ£o', 1494633600, 'Manuel ferreira', 963354089, '', 36, '59d620a0/36'),
(2, 1494418260, 'KKk', 'LOjas Online', 'Pedro Viegas', 39, 'NÃ£o', 1494374400, 'aa', 963354089, '', 36, '59d62154/36'),
(3, 1494419040, 'Joao', 'Lops', 'Pedro Viegas', 281000, 'Sim', 0, '', 0, '', 36, '59d62460/36'),
(4, 1494420360, 'Jorge', '', 'Jose saraiva', 21000, 'Sim', 0, '', 0, '', 36, '59d62988/36'),
(5, 1494425460, 'Jonas Goncalves', 'Pistolas', 'Jose Saraiva', 35000, 'Sim', 0, '', 0, '', 36, '59d63d74/36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
