-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2017 às 16:10
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
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_codigosalternativos`
--

INSERT INTO `tb_codigosalternativos` (`Id`, `IdProduto`, `Codigo`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 1, 'A1', 1, '2017-06-08 00:00:00', NULL, NULL, 1);

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
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_cst_csosn`
--

INSERT INTO `tb_cst_csosn` (`Id`, `IdCst_Csosn_Origem`, `IdCst_Csosn_SituacaoTributaria`, `IdEstado`, `Aliquota`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 1, 1, 1, '18.00', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1);

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
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_fornecedor`
--

INSERT INTO `tb_fornecedor` (`Id`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'MONDELEZ ', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1);

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
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_fotos_produtos`
--

INSERT INTO `tb_fotos_produtos` (`Id`, `IdProduto`, `NomeArquivo`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(3, 1, 'ADAMS CHIC BUBBALOO 60 UN BANANA.jpg', 1, '2017-06-06 00:00:00', 1, '2017-06-06 00:00:00', 1);

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
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_grupo`
--

INSERT INTO `tb_grupo` (`Id`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'CHICLETES', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1);

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
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_preco`
--

INSERT INTO `tb_preco` (`Id`, `IdTipoPreco`, `Preco`, `IdProduto`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 1, '9.00', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 2, '8.99', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1);

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
  `IdCodigosAlternativos` bigint(20) NOT NULL COMMENT 'Lista - Codigos Alternativos',
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
  `PesoLiquido` decimal(7,3) NOT NULL,
  `PesoBruto` decimal(7,3) NOT NULL,
  `Qtde_Estoque` int(11) NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`),
  UNIQUE KEY `Codigo` (`Codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`Id`, `Codigo`, `IdCodigosAlternativos`, `Descricao`, `IdUnidadeApresentacao`, `IdGrupo`, `IdSubGrupo`, `IdSetor`, `IdFornecedor`, `IdTipo`, `Id_CST_CSOSN`, `Id_NCM_SH`, `IdCest`, `IdTipoPrecoApresentacao`, `PesoLiquido`, `PesoBruto`, `Qtde_Estoque`, `IdOrigem`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`) VALUES
(1, '7622300992620', 1, 'ADAMS CHIC BUBBALOO 60 UN BANANA', 1, 1, NULL, 1, 1, 1, 1, 1, NULL, 1, '0.000', '0.000', 5, 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_sys_cst_csosn_origem`
--

INSERT INTO `tb_sys_cst_csosn_origem` (`Id`, `Codigo`, `Descricao`) VALUES
(1, '0', 'Produto Nacional');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_cst_csosn_situacaotributaria`
--

CREATE TABLE IF NOT EXISTS `tb_sys_cst_csosn_situacaotributaria` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(3) NOT NULL,
  `Descricao` varchar(250) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_sys_cst_csosn_situacaotributaria`
--

INSERT INTO `tb_sys_cst_csosn_situacaotributaria` (`Id`, `Codigo`, `Descricao`) VALUES
(1, '00', 'Tributada Integralmente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_estado`
--

CREATE TABLE IF NOT EXISTS `tb_sys_estado` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `UF` varchar(2) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_sys_estado`
--

INSERT INTO `tb_sys_estado` (`Id`, `UF`, `Descricao`) VALUES
(1, 'SP', 'São Paulo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_sys_info_campos`
--

INSERT INTO `tb_sys_info_campos` (`Id`, `Tabela`, `Coluna`, `HasInfo`, `Informacao`, `IdInfo`, `IdInfo_Descricao`) VALUES
(1, 'tb_produto', 'preco', b'0', '', 1, 'Tipo de Preço Preferêncial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_ncm_sh`
--

CREATE TABLE IF NOT EXISTS `tb_sys_ncm_sh` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(15) NOT NULL,
  `Descricao` varchar(250) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_sys_ncm_sh`
--

INSERT INTO `tb_sys_ncm_sh` (`Id`, `Codigo`, `Descricao`) VALUES
(1, '1704.10.00', 'Gomas de mascar, mesmo revestidas de açúcar');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_tipo`
--

INSERT INTO `tb_tipo` (`Id`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'GERAL', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipopreco`
--

CREATE TABLE IF NOT EXISTS `tb_tipopreco` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(20) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_tipopreco`
--

INSERT INTO `tb_tipopreco` (`Id`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'Site', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 'Balcão', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`Id`, `Nome`, `Email`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 'Sistema', 'comercial!gerensys.com.br', 1, '2017-06-02 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 'Sistema', 'comercial@gerensys.com.br', 1, '2017-06-02 00:00:00', NULL, NULL, 1);

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
