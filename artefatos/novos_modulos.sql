-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jul-2022 às 01:29
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metalcon_2022`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `posicao` int(11) DEFAULT NULL,
  `descricao` blob,
  `ativo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo_arquivo`
--

CREATE TABLE `modulo_arquivo` (
  `idmodulo_arquivo` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `idmodulo_subcategoria` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` blob,
  `arquivo` varchar(140) DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo_categoria`
--

CREATE TABLE `modulo_categoria` (
  `idcategoria` int(11) NOT NULL,
  `idmodulo` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `posicao` int(11) DEFAULT NULL,
  `icone` varchar(160) DEFAULT NULL,
  `descricao` blob,
  `url` varchar(100) DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo_download`
--

CREATE TABLE `modulo_download` (
  `idmodulo_download` int(11) NOT NULL,
  `idmodulo_arquivo` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo_subcategoria`
--

CREATE TABLE `modulo_subcategoria` (
  `idmodulo_subcategoria` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `posicao` int(11) DEFAULT NULL,
  `descricao` blob,
  `ativo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_acesso`
--

CREATE TABLE `perfil_acesso` (
  `idperfil_acesso` int(11) NOT NULL,
  `idperfil` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `ativo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idperfil` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_recuperasenha`
--

CREATE TABLE `usuario_recuperasenha` (
  `idusuario_recuperasenha` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `data_valido` datetime DEFAULT NULL,
  `token` varchar(180) DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indexes for table `modulo_arquivo`
--
ALTER TABLE `modulo_arquivo`
  ADD PRIMARY KEY (`idmodulo_arquivo`),
  ADD KEY `fk_modulo_arquivo_modulo_subcategoria1_idx` (`idmodulo_subcategoria`);

--
-- Indexes for table `modulo_categoria`
--
ALTER TABLE `modulo_categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD KEY `fk_modulo_categoria_modulo1_idx` (`idmodulo`);

--
-- Indexes for table `modulo_download`
--
ALTER TABLE `modulo_download`
  ADD PRIMARY KEY (`idmodulo_download`),
  ADD KEY `fk_modulo_download_modulo_arquivo1_idx` (`idmodulo_arquivo`),
  ADD KEY `fk_modulo_download_usuario1_idx` (`idusuario`);

--
-- Indexes for table `modulo_subcategoria`
--
ALTER TABLE `modulo_subcategoria`
  ADD PRIMARY KEY (`idmodulo_subcategoria`),
  ADD KEY `fk_modulo_subcategoria_modulo_categoria1_idx` (`idcategoria`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperfil`);

--
-- Indexes for table `perfil_acesso`
--
ALTER TABLE `perfil_acesso`
  ADD PRIMARY KEY (`idperfil_acesso`),
  ADD KEY `fk_perfil_acesso_perfil1_idx` (`idperfil`),
  ADD KEY `fk_perfil_acesso_modulo_categoria1_idx` (`idcategoria`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_perfil1_idx` (`idperfil`);

--
-- Indexes for table `usuario_recuperasenha`
--
ALTER TABLE `usuario_recuperasenha`
  ADD PRIMARY KEY (`idusuario_recuperasenha`),
  ADD KEY `fk_usuario_recuperasenha_usuario1_idx` (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modulo_arquivo`
--
ALTER TABLE `modulo_arquivo`
  MODIFY `idmodulo_arquivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modulo_categoria`
--
ALTER TABLE `modulo_categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modulo_download`
--
ALTER TABLE `modulo_download`
  MODIFY `idmodulo_download` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modulo_subcategoria`
--
ALTER TABLE `modulo_subcategoria`
  MODIFY `idmodulo_subcategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perfil_acesso`
--
ALTER TABLE `perfil_acesso`
  MODIFY `idperfil_acesso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario_recuperasenha`
--
ALTER TABLE `usuario_recuperasenha`
  MODIFY `idusuario_recuperasenha` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `modulo_arquivo`
--
ALTER TABLE `modulo_arquivo`
  ADD CONSTRAINT `fk_modulo_arquivo_modulo_subcategoria1` FOREIGN KEY (`idmodulo_subcategoria`) REFERENCES `modulo_subcategoria` (`idmodulo_subcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `modulo_categoria`
--
ALTER TABLE `modulo_categoria`
  ADD CONSTRAINT `fk_modulo_categoria_modulo1` FOREIGN KEY (`idmodulo`) REFERENCES `modulo` (`idmodulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `modulo_download`
--
ALTER TABLE `modulo_download`
  ADD CONSTRAINT `fk_modulo_download_modulo_arquivo1` FOREIGN KEY (`idmodulo_arquivo`) REFERENCES `modulo_arquivo` (`idmodulo_arquivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_modulo_download_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `modulo_subcategoria`
--
ALTER TABLE `modulo_subcategoria`
  ADD CONSTRAINT `fk_modulo_subcategoria_modulo_categoria1` FOREIGN KEY (`idcategoria`) REFERENCES `modulo_categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `perfil_acesso`
--
ALTER TABLE `perfil_acesso`
  ADD CONSTRAINT `fk_perfil_acesso_modulo_categoria1` FOREIGN KEY (`idcategoria`) REFERENCES `modulo_categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perfil_acesso_perfil1` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario_recuperasenha`
--
ALTER TABLE `usuario_recuperasenha`
  ADD CONSTRAINT `fk_usuario_recuperasenha_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
