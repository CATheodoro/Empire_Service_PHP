-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jun-2021 às 19:45
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `empire`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `computador`
--

CREATE TABLE `computador` (
  `id` int(10) NOT NULL,
  `descricaoCom` varchar(50) DEFAULT NULL,
  `idLaboratorio` int(5) DEFAULT NULL,
  `idStatus` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `computador`
--

INSERT INTO `computador` (`id`, `descricaoCom`, `idLaboratorio`, `idStatus`) VALUES
(44, 'PC 1', 18, 2),
(47, 'pc xuxa', 23, 3),
(48, 'pc lab 5', 23, 1),
(49, '123', 23, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE `funcao` (
  `id` int(10) NOT NULL,
  `descricaoFuncao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcao`
--

INSERT INTO `funcao` (`id`, `descricaoFuncao`) VALUES
(1, 'Admin'),
(2, 'Estagiário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id` int(10) NOT NULL,
  `descricaoLab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `laboratorio`
--

INSERT INTO `laboratorio` (`id`, `descricaoLab`) VALUES
(18, 'Laboratório 1'),
(19, 'Laboratório 2'),
(20, 'laboratório 3'),
(21, 'Laboratório 4'),
(22, 'Lab 5'),
(23, 'remover');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(10) NOT NULL,
  `idComputador` int(10) DEFAULT NULL,
  `idLaboratorio` int(10) DEFAULT NULL,
  `dataAbertura` date DEFAULT NULL,
  `dataFechamento` date DEFAULT NULL,
  `idStatus` int(10) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `componentes` varchar(100) DEFAULT NULL,
  `custo` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `idComputador`, `idLaboratorio`, `dataAbertura`, `dataFechamento`, `idStatus`, `descricao`, `componentes`, `custo`) VALUES
(49, 44, 18, '2020-11-09', '2020-11-12', 2, '', '', 0.00),
(50, 47, 21, '2020-11-11', '2020-11-12', 2, '', '', 10.00),
(51, 47, 19, '2020-11-12', NULL, 3, '', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(10) NOT NULL,
  `descricaoStatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `descricaoStatus`) VALUES
(1, 'Disponível'),
(2, 'Concluído'),
(3, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `idFuncao` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `nome`, `idFuncao`) VALUES
(1, 'carlos@gmail.com', '202cb962ac59075b964b07152d234b70', 'Carlos Alexandre', 1),
(2, 'ruan@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ruan', 1),
(3, 'bocao@gmail.com', '202cb962ac59075b964b07152d234b70', 'bocão', 2),
(4, 'almiro@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'almiro', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `computador`
--
ALTER TABLE `computador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLaboratorio` (`idLaboratorio`),
  ADD KEY `idStatus` (`idStatus`);

--
-- Índices para tabela `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idComputador` (`idComputador`),
  ADD KEY `idLaboratorio` (`idLaboratorio`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFuncao` (`idFuncao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `computador`
--
ALTER TABLE `computador`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `funcao`
--
ALTER TABLE `funcao`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `computador`
--
ALTER TABLE `computador`
  ADD CONSTRAINT `computador_ibfk_1` FOREIGN KEY (`idLaboratorio`) REFERENCES `laboratorio` (`id`),
  ADD CONSTRAINT `computador_ibfk_2` FOREIGN KEY (`idStatus`) REFERENCES `status` (`id`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `servicos_ibfk_2` FOREIGN KEY (`idComputador`) REFERENCES `computador` (`id`),
  ADD CONSTRAINT `servicos_ibfk_3` FOREIGN KEY (`idLaboratorio`) REFERENCES `laboratorio` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idFuncao`) REFERENCES `funcao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
