-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 24-Mar-2017 às 18:05
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oseuback_transfergest`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `operador`
--

CREATE TABLE `operador` (
  `id` int(6) NOT NULL,
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
  `taxa_de_servico` tinyint(1) NOT NULL,
  `tipo_taxa_de_servico` varchar(100) CHARACTER SET utf8 NOT NULL,
  `valor_taxa_de_servico` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `operador`
--

INSERT INTO `operador` (`id`, `nome`, `responsavel`, `comissao`, `email`, `tipo`, `utilizador`, `tel`, `password`, `gestao`, `rel_diario`, `rel_semana`, `taxa_de_servico`, `tipo_taxa_de_servico`, `valor_taxa_de_servico`) VALUES
(25, 'Site Paypal', 'Paypal', '', 'paypal@paypal.com', 'Tabela Percentagem', 'Asf', '000000000', '$GAiOTgdz3prA', 'false', 'false', 'false', 0, '', ''),
(26, 'Site Transf.Banc', 'Transf.Banc', '1.45', 'companhia@companhia.com', 'Fixo', 'Fixo', '0000000000', '$G.RaWkNu.lXA', 'false', 'checked', 'false', 0, '', ''),
(28, 'Direto', 'Dr.JoÃ£o', '', 'joao@directo.pt', 'Tabela', 'admin', '967525252', '$GTr9bV7AbxeY', 'checked', 'false', 'checked', 0, '', ''),
(29, 'Tabela', 'tabela', '', 'fdgf@drff.pt', 'Tabela', 'tabela', '45645645456456', '$GdCQUkUyFM2.', 'false', 'false', 'false', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `operador`
--
ALTER TABLE `operador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `operador`
--
ALTER TABLE `operador`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
