-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Mar-2018 às 21:40
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusu` int(11) NOT NULL,
  `adm` varchar(3) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `identidade` int(13) NOT NULL,
  `cpf` int(11) NOT NULL,
  `nascimento` date NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `cep` int(7) NOT NULL,
  `complemento` varchar(11) NOT NULL,
  `numero` float NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusu`, `adm`, `nome`, `identidade`, `cpf`, `nascimento`, `endereco`, `cep`, `complemento`, `numero`, `bairro`, `cidade`, `estado`, `email`, `senha`) VALUES
(1, 'sim', 'Salum Lima', 123, 456, '1993-04-05', 'rua para', 26265540, 'Casa', 414, 'Jardim Nova Era', 'Nova IguaÃ§u', 'RJ', 'abc@cba', 'MTIz'),
(2, 'nao', 'Cristiano Medeiros', 0, 0, '0000-00-00', '', 0, '', 0, '', '', '0', 'cris@gmail.com', 'MTIz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
