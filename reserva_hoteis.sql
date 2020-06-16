-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jun-2020 às 13:14
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `reserva_hoteis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cliente_fid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `email`, `cliente_fid`) VALUES
(4, 'iago', '999999999', 'teste@teste', 12),
(5, 'Alberto Luiz', '77 3426-3426', 'Alberto@hotmail.com', 7),
(20, 'Leornado', '11 99999 9999', '2@2.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `data_entrada` varchar(20) NOT NULL,
  `data_saida` varchar(20) NOT NULL,
  `dia_semana` varchar(20) NOT NULL,
  `hotel` varchar(20) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `valor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id`, `data_entrada`, `data_saida`, `dia_semana`, `hotel`, `cliente`, `valor`) VALUES
(130, '2020-06-16', '2020-06-17', 'Domingo', 'Jardim Botânico', '5', '50'),
(131, '2020-06-16', '2020-06-17', 'Sexta', 'Jardim Botânico', '5', '50'),
(132, '2020-06-16', '2020-06-17', 'Quarta', 'Jardim Botânico', '5', '110'),
(133, '2020-06-16', '2020-06-17', 'Quarta', 'Parque das Flores', '5', '80'),
(134, '2020-06-16', '2020-06-17', 'Quarta', 'Mar Atlantico', '4', '100'),
(135, '2020-06-16', '2020-06-17', 'Domingo', 'Mar Atlantico', '4', '40'),
(136, '2020-06-16', '2020-06-17', 'Domingo', 'Parque das Flores', '4', '80'),
(137, '2020-06-16', '2020-06-30', 'Sexta', 'Mar Atlantico', '20', '2100');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
