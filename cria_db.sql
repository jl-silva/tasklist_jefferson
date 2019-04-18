-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Abr-2019 às 03:17
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasklist`
--
CREATE DATABASE IF NOT EXISTS `tasklist` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tasklist`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tasklist`
--

CREATE TABLE `tasklist` (
  `id` int(11) NOT NULL COMMENT 'PK da tabela',
  `executor` varchar(100) NOT NULL COMMENT 'Nome do executor da tarefa',
  `tarefa` varchar(250) NOT NULL COMMENT 'Descricao da tarefa',
  `situacao` varchar(1) NOT NULL COMMENT 'Situacao da tabela (Ativo/Inativo)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tasklist`
--

INSERT INTO `tasklist` (`id`, `executor`, `tarefa`, `situacao`) VALUES
(1, 'Jefferson', 'Realizar a tarefa X', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasklist`
--
ALTER TABLE `tasklist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `I_EXECUTOR` (`executor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasklist`
--
ALTER TABLE `tasklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK da tabela', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
