-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jun-2017 às 21:43
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `automac_lojavirtual`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_codigosalternativos`
--

CREATE TABLE IF NOT EXISTS `tb_codigosalternativos` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdProduto` bigint(20) NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Codigo` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_codigosalternativos_log`
--

CREATE TABLE IF NOT EXISTS `tb_codigosalternativos_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdCodigosAlternativos` bigint(20) NOT NULL,
  `IdProduto` bigint(20) NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Codigo` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cor`
--

CREATE TABLE IF NOT EXISTS `tb_cor` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(100) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tb_cor`
--

INSERT INTO `tb_cor` (`Id`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'Amarelo', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(2, 'Azul', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(3, 'Branco', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(4, 'Prata', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(5, 'Preto', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(6, 'Multicolorido', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(7, 'Bege', 1, '2017-06-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cst_csosn`
--

CREATE TABLE IF NOT EXISTS `tb_cst_csosn` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdCst_Csosn_Origem` bigint(20) NOT NULL,
  `IdCst_Csosn_SituacaoTributaria` bigint(20) NOT NULL,
  `IdEstado` bigint(20) NOT NULL,
  `Aliquota` decimal(7,2) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cst_csosn_log`
--

CREATE TABLE IF NOT EXISTS `tb_cst_csosn_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdCst_csosn` bigint(20) NOT NULL,
  `IdCst_Csosn_Origem` bigint(20) NOT NULL,
  `IdCst_Csosn_SituacaoTributaria` bigint(20) NOT NULL,
  `IdEstado` bigint(20) NOT NULL,
  `Aliquota` decimal(7,2) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedor`
--

CREATE TABLE IF NOT EXISTS `tb_fornecedor` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(100) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tb_fornecedor`
--

INSERT INTO `tb_fornecedor` (`Id`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'Azaleia', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 'Capricho', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 'Corello', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(4, 'Dakota', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(5, 'Ellus', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(6, 'Aramis', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(7, 'Lyssa Baby', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(8, 'Hurley', 1, '2017-06-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedor_log`
--

CREATE TABLE IF NOT EXISTS `tb_fornecedor_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdFornecedor` bigint(20) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fotos_produtos`
--

CREATE TABLE IF NOT EXISTS `tb_fotos_produtos` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdProduto` bigint(20) NOT NULL,
  `NomeArquivo` varchar(250) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tb_fotos_produtos`
--

INSERT INTO `tb_fotos_produtos` (`Id`, `IdProduto`, `NomeArquivo`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 1, 'Sapatilha AZALEIA Conforto Branca_01.jpg', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 1, 'Sapatilha AZALEIA Conforto Branca_02.jpg', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 2, 'Camisa Polo Aramis Bordado Degradê Azul_01.jpg', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(4, 2, 'Camisa Polo Aramis Bordado Degradê Azul_02.jpg', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(5, 2, 'Camisa Polo Aramis Bordado Degradê Azul_03.jpg', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(6, 3, 'BOLSA MATERNIDADE LYSSA BABY_01.jpg', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(7, 4, 'Long John Hurley Phantom Limites 202_01.jpg', 1, '2017-06-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fotos_produtos_log`
--

CREATE TABLE IF NOT EXISTS `tb_fotos_produtos_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdFotos_produtos` bigint(20) NOT NULL,
  `IdProduto` bigint(20) NOT NULL,
  `NomeArquivo` varchar(250) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupo`
--

CREATE TABLE IF NOT EXISTS `tb_grupo` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(50) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_grupo`
--

INSERT INTO `tb_grupo` (`Id`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'Calçados', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 'Roupas', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 'Bolsas e Acessórios', 1, '2017-06-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupo_log`
--

CREATE TABLE IF NOT EXISTS `tb_grupo_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdGrupo` bigint(20) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_preco`
--

CREATE TABLE IF NOT EXISTS `tb_preco` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdTipoPreco` bigint(20) NOT NULL,
  `Preco` decimal(7,2) NOT NULL,
  `IdProduto` bigint(20) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_preco`
--

INSERT INTO `tb_preco` (`Id`, `IdTipoPreco`, `Preco`, `IdProduto`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 1, '89.00', 1, 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 1, '129.00', 2, 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(3, 1, '149.00', 3, 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(4, 1, '1799.99', 4, 1, '2017-06-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_preco_log`
--

CREATE TABLE IF NOT EXISTS `tb_preco_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdPreco` bigint(20) NOT NULL,
  `IdTipoPreco` bigint(20) NOT NULL,
  `Preco` decimal(7,2) NOT NULL,
  `IdProduto` bigint(20) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE IF NOT EXISTS `tb_produto` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(50) NOT NULL COMMENT 'Código Principal',
  `Descricao` varchar(250) NOT NULL COMMENT 'Descricao do Produto',
  `IdUnidadeApresentacao` bigint(20) NOT NULL,
  `IdGrupo` bigint(20) DEFAULT NULL COMMENT 'Grupo - Item - Categoria',
  `IdSubGrupo` bigint(20) DEFAULT NULL COMMENT 'SubGrupo - SubItem - Subcategoria',
  `IdSetor` bigint(20) DEFAULT NULL COMMENT 'Setor - Marca',
  `IdFornecedor` bigint(20) DEFAULT NULL,
  `IdTipo` bigint(20) DEFAULT NULL,
  `Id_CST_CSOSN` bigint(20) NOT NULL,
  `Id_NCM_SH` bigint(20) NOT NULL,
  `IdCest` bigint(20) DEFAULT NULL,
  `IdTipoPrecoApresentacao` bigint(20) NOT NULL DEFAULT '1',
  `IdTamanho` bigint(20) DEFAULT NULL,
  `IdCor` bigint(20) DEFAULT NULL,
  `PesoLiquido` decimal(7,3) NOT NULL,
  `PesoBruto` decimal(7,3) NOT NULL,
  `Qtde_Estoque` int(11) NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`),
  UNIQUE KEY `Codigo` (`Codigo`),
  UNIQUE KEY `Descricao` (`Descricao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`Id`, `Codigo`, `Descricao`, `IdUnidadeApresentacao`, `IdGrupo`, `IdSubGrupo`, `IdSetor`, `IdFornecedor`, `IdTipo`, `Id_CST_CSOSN`, `Id_NCM_SH`, `IdCest`, `IdTipoPrecoApresentacao`, `IdTamanho`, `IdCor`, `PesoLiquido`, `PesoBruto`, `Qtde_Estoque`, `IdOrigem`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`) VALUES
(1, 'COD001', 'Sapatilha AZALEIA Conforto Branca', 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 3, '0.000', '0.000', 5, 1, 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'COD002', 'Camisa Polo Aramis Bordado Degradê Azul', 1, 2, 7, 2, 6, NULL, 0, 0, NULL, 1, 2, 2, '0.000', '0.000', 10, 1, 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'COD003', 'BOLSA MATERNIDADE LYSSA BABY', 1, 3, 11, 3, 7, NULL, 0, 0, NULL, 1, 10, 7, '0.000', '0.000', 23, 1, 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 'COD004', 'Long John Hurley Phantom Limites 202', 1, 2, 6, 4, 8, NULL, 0, 0, NULL, 1, 3, 6, '0.000', '0.000', 3, 1, 1, '2017-06-30 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_log`
--

CREATE TABLE IF NOT EXISTS `tb_produto_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdProduto` bigint(20) NOT NULL,
  `Codigo` varchar(50) NOT NULL COMMENT 'Código Principal',
  `CodigosAlternativos` varchar(250) NOT NULL COMMENT 'Lista - Codigos Alternativos',
  `Descricao` varchar(250) NOT NULL COMMENT 'Descricao do Produto',
  `IdUnidadeApresentacao` bigint(20) NOT NULL,
  `IdGrupo` bigint(20) DEFAULT NULL COMMENT 'Grupo - Item - Categoria',
  `IdSubGrupo` bigint(20) DEFAULT NULL COMMENT 'SubGrupo - SubItem - Subcategoria',
  `IdSetor` bigint(20) DEFAULT NULL COMMENT 'Setor - Marca',
  `IdFornecedor` bigint(20) DEFAULT NULL,
  `IdTipo` bigint(20) DEFAULT NULL,
  `Id_CST_CSOSN` bigint(20) NOT NULL,
  `Id_NCM_SH` bigint(20) NOT NULL,
  `IdCest` bigint(20) DEFAULT NULL,
  `IdTipoPrecoApresentacao` bigint(20) NOT NULL DEFAULT '1',
  `Qtde_Estoque` int(11) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`),
  UNIQUE KEY `Codigo` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_promocao`
--

CREATE TABLE IF NOT EXISTS `tb_promocao` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdProduto` bigint(20) NOT NULL,
  `Qtde` int(11) NOT NULL,
  `IsMaiorQue` bit(1) NOT NULL,
  `IsIgualA` bit(1) NOT NULL,
  `PorcentagemDesconto` decimal(10,0) NOT NULL,
  `PrecoFixoDesconto` decimal(10,0) NOT NULL,
  `VigenciaPartirDe` datetime NOT NULL,
  `VigenciaAte` datetime NOT NULL,
  `DiasSemana` varchar(10) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_promocao_log`
--

CREATE TABLE IF NOT EXISTS `tb_promocao_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdPromocao` bigint(20) NOT NULL,
  `IdProduto` bigint(20) NOT NULL,
  `Qtde` int(11) NOT NULL,
  `IsMaiorQue` bit(1) NOT NULL,
  `IsIgualA` bit(1) NOT NULL,
  `PorcentagemDesconto` decimal(10,0) NOT NULL,
  `PrecoFixoDesconto` decimal(10,0) NOT NULL,
  `VigenciaPartirDe` datetime NOT NULL,
  `VigenciaAte` datetime NOT NULL,
  `DiasSemana` varchar(10) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_setor`
--

CREATE TABLE IF NOT EXISTS `tb_setor` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(50) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_setor`
--

INSERT INTO `tb_setor` (`Id`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'Feminino', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 'Masculino', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 'Infantil', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(4, 'Esporte', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_setor_log`
--

CREATE TABLE IF NOT EXISTS `tb_setor_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdSetor` bigint(20) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_subgrupo`
--

CREATE TABLE IF NOT EXISTS `tb_subgrupo` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdGrupo` bigint(20) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tb_subgrupo`
--

INSERT INTO `tb_subgrupo` (`Id`, `IdGrupo`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 1, 'Botas', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 1, 'Mocassim', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 1, 'Sapatilhas', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(4, 1, 'Sapatos', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(5, 1, 'Tênis', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(6, 2, 'Camisetas', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(7, 2, 'Polos', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(8, 2, 'Camisas', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(9, 2, 'Casacos e Jaquetas', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(10, 2, 'Ternos', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(11, 3, 'Bolsas Maternidade', 1, '2017-06-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_subgrupo_log`
--

CREATE TABLE IF NOT EXISTS `tb_subgrupo_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdSubGrupo` bigint(20) NOT NULL,
  `IdGrupo` bigint(20) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_cest`
--

CREATE TABLE IF NOT EXISTS `tb_sys_cest` (
  `Id` bigint(11) NOT NULL AUTO_INCREMENT,
  `Codigo` bigint(20) NOT NULL,
  `Id_NCM-SH` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_cst_csosn_origem`
--

CREATE TABLE IF NOT EXISTS `tb_sys_cst_csosn_origem` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(1) NOT NULL,
  `Descricao` varchar(250) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_cst_csosn_situacaotributaria`
--

CREATE TABLE IF NOT EXISTS `tb_sys_cst_csosn_situacaotributaria` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(3) NOT NULL,
  `Descricao` varchar(250) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_estado`
--

CREATE TABLE IF NOT EXISTS `tb_sys_estado` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `UF` varchar(2) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_info_campos`
--

CREATE TABLE IF NOT EXISTS `tb_sys_info_campos` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Tabela` varchar(100) NOT NULL,
  `Coluna` varchar(100) NOT NULL,
  `HasInfo` bit(1) NOT NULL,
  `Informacao` text NOT NULL,
  `IdInfo` bigint(20) NOT NULL,
  `IdInfo_Descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_ncm_sh`
--

CREATE TABLE IF NOT EXISTS `tb_sys_ncm_sh` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(15) NOT NULL,
  `Descricao` varchar(250) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_origem`
--

CREATE TABLE IF NOT EXISTS `tb_sys_origem` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_sys_origem`
--

INSERT INTO `tb_sys_origem` (`Id`, `Descricao`) VALUES
(1, 'Loja Virtual'),
(2, 'Automac');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_tamanho`
--

CREATE TABLE IF NOT EXISTS `tb_sys_tamanho` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(11) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `tb_sys_tamanho`
--

INSERT INTO `tb_sys_tamanho` (`Id`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'P', 2, '2017-06-30 00:00:00', NULL, NULL, 1),
(2, 'M', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(3, 'G', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(4, 'GG', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(5, '34', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(6, '35', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(7, '36', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(8, '37', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(9, '38', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(10, 'Único', 1, '2017-06-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_unidadeapresentacao`
--

CREATE TABLE IF NOT EXISTS `tb_sys_unidadeapresentacao` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(6) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_sys_unidadeapresentacao`
--

INSERT INTO `tb_sys_unidadeapresentacao` (`Id`, `Codigo`, `Descricao`) VALUES
(1, 'UN', 'Unidade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo`
--

CREATE TABLE IF NOT EXISTS `tb_tipo` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(100) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipopreco`
--

CREATE TABLE IF NOT EXISTS `tb_tipopreco` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(20) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_tipopreco`
--

INSERT INTO `tb_tipopreco` (`Id`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'Site', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipopreco_log`
--

CREATE TABLE IF NOT EXISTS `tb_tipopreco_log` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdTipoPreco` bigint(20) NOT NULL,
  `Descricao` varchar(20) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_log`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdTipo` bigint(20) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`Id`, `Nome`, `Email`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'Gerensys', 'comercial@gerensys.com', 1, '2017-06-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios_log`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios_log` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `TipoAcao` varchar(50) NOT NULL,
  `DataAcao` datetime NOT NULL,
  `IdUsuarioAcao` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
