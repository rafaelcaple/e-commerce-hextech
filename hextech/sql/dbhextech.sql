-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2022 às 23:55
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbhextech`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `idcadastro` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL,
  `cpf` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`idcadastro`, `nome`, `email`, `senha`, `cpf`) VALUES
(27, 'Usuario', 'usuario@gmail.com', '123', 12345678101);

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idprod` bigint(255) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `preco` double(9,2) NOT NULL,
  `imagem` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idprod`, `nome`, `preco`, `imagem`) VALUES
(8, '6', 6.00, '2.png'),
(11, 'c', 100.00, '1.png'),
(13, 'Processador AMD Ryzen 5 3600 3.6GHz (4.2GHz Turbo), 6-Cores 12-Threads, Cooler Wraith Stealth, AM4, 100-100000031SBX, Sem vídeo', 629.00, 'ryzen53.png'),
(15, 'Processador AMD Ryzen 5 4600 3.6GHz (4.2GHz Turbo), 6-Cores 12-Threads, Cooler Wraith Stealth, AM4, 100-100000031SBX, Sem vídeo', 960.00, 'ryzen54.png'),
(16, 'Processador AMD Ryzen 5 5600G, 3.9GHz (4.4GHz Max Turbo), Cache 19MB, 6 Núcleos, 12 Threads, Vídeo Integrado, AM4 - 100-100000252BOX', 999.99, 'ryzen55.png'),
(17, 'Processador AMD Ryzen 7 5800X, 3.8GHz (4.7GHz Max Turbo), Cache 36MB, Octa Core, 16 Threads, AM4 - 100-100000063WOF', 1749.99, 'ryzen75.png'),
(18, 'Processador Intel Core i3-10105, 3.7GHz (4.4GHz Max Turbo), Cache 6MB, Quad Core, 8 Threads, LGA 1200, Vídeo Integrado - BX8070110105', 655.00, 'i310.png'),
(19, 'Processador Intel Core i5-11400F, 2.6 GHz (4.4GHz Turbo), Cache 12MB, 6 Núcleos, 12 Threads, LGA1200 - BX8070811400F', 860.00, 'i511.png'),
(20, 'Processador Intel Core i5-12400, 2.5GHz (4.4GHz Max Turbo), Cache 18MB, LGA 1700 - BX8071512400\r\n', 1319.99, 'i512.png'),
(21, 'Processador Intel Pentium Gold G6400 Processor, 4.00 GHz, Cache 4MB, Dual Core, 4 Threads, LGA1200 - BX80701G6400', 355.00, 'pentiumgold.png'),
(22, 'Processador Intel Core i7-10700F, 2.9GHz (4.8GHz Max Turbo), Cache 16MB, LGA 1200 - BX8070110700F\r\n', 1519.99, 'i710.png'),
(23, 'Processador Intel Core i7-10700K Marvel\'s Avengers Collector\'s Edition Packaging, 5.1GHz, Cache 16MB, LGA1200 - BX8070110700KA\r\n', 2900.00, 'i710avenger.png'),
(24, 'Processador Intel Core i7-12700K, 3.6GHz (5.0GHz Max Turbo), Cache 25MB, 3.6GHz (5.0GHz Max Turbo), 12 Núcleos, 20 Threads, LGA 1700, Vídeo Integrado - BX8071512700K', 2700.00, 'i712.png'),
(25, 'Mouse Gamer Razer Deathadder V2 Pro Sem Fio , Chroma, Optical Switch, 8 Botões, 20000DPI - RZ01-03350100-R3U1', 600.00, 'deathadder2pro.png'),
(26, 'Teclado Mecânico Gamer Razer BlackWidow Tournament V2, Chroma, Razer Switch Orange, US - RZ03-02190700-R3M1', 879.99, 'blackwidow.png'),
(27, 'Placa de Vídeo RTX 2060 Ventus GP OC MSI NVIDIA GeForce, 6GB GDDR6, Ray Tracing - GeForce RTX 2060 VENTUS GP OC', 1499.99, 'rtx2060.png'),
(28, 'Placa de Vídeo GTX 1660 Super (1-Click OC) Galax NVIDIA GeForce, 6GB, GDDR6 - 60SRL7DSY91S', 1399.99, 'gtx1660.png'),
(29, 'Placa de Vídeo Gigabyte, Nvidia GeForce GTX 1050 2GB, GDDR5, Gigabyte GV-N1050G1, Gaming 2G\r\n', 590.00, 'gtx1050.png'),
(30, 'Placa de Vídeo RX 550 Sapphire AMD Radeon Pulse, 4GB GDDR5 - 11268-01-20G', 450.00, 'rx550.png'),
(31, 'Placa de Vídeo RX 580 PowerColor Red Dragon AMD Radeon, 8GB GDDR5 - AXRX 580 8GBD5-DHD', 998.99, 'rx580.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`idcadastro`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idprod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `idcadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idprod` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
