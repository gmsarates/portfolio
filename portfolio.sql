-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jan-2020 às 04:20
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `portfolio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `idconfig` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`idconfig`, `nome`, `valor`) VALUES
(1, 'GrupoAdmin', '1'),
(2, 'GrupoCliente', '5'),
(3, 'TempoTimeout', '60'),
(4, 'TiposDeProjetos', 'Tipo 1,Tipo 7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `idgrupo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`idgrupo`, `nome`, `cor`) VALUES
(1, 'Admin', 'badge-success'),
(5, 'Cliente', 'badge-danger');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `idprojeto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `valor` varchar(255) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `grupo` varchar(255) NOT NULL,
  `idprojeto` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `usuario`, `senha`, `email`, `telefone`, `grupo`, `idprojeto`, `descricao`) VALUES
(1, 'Gabriel Sarates', 'gabriel', '6aad97b71db04e5d9e2926ebaf32d6a4', 'gabrielmartins11@live.com', '51 9 9115-5222', '1', 0, ''),
(12, 'Cliente Teste', 'teste', '202cb962ac59075b964b07152d234b70', 'teste@teste.com', 'telefone teste', '5', 0, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`idconfig`);

--
-- Índices para tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idgrupo`);

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`idprojeto`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `idconfig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `idprojeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
