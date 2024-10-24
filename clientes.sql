-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/10/2024 às 00:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `2mloja`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fone` varchar(16) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `bloqueado` tinyint(1) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `obs` text NOT NULL,
  `salt` varchar(255) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT current_timestamp(),
  `alterado_em` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `renda` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `email`, `fone`, `senha`, `data_nascimento`, `sexo`, `bloqueado`, `cidade`, `obs`, `salt`, `criado_em`, `alterado_em`, `renda`) VALUES
(1, 'Augusto César', '123.456.789-99', '', '', '', '0000-00-00', '', 0, 'Surubim', '', '', '2024-10-01 21:40:50', '0000-00-00 00:00:00', 0.00),
(2, 'Isabela Maria', '987.654.321-00', '', '', '', '0000-00-00', '', 0, 'Casinhas', '', '', '2024-10-01 21:42:33', '0000-00-00 00:00:00', 0.00),
(3, 'Pedro Augusto', '654.987.321-87', '', '', '', '0000-00-00', '', 0, 'João Alfredo', '', '', '2024-10-01 21:42:33', '0000-00-00 00:00:00', 0.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
