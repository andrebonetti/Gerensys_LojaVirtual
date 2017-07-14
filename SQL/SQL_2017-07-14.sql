-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jul-2017 às 18:43
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
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(250) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Foto` varchar(250) DEFAULT NULL,
  `Telefone` varchar(20) NOT NULL,
  `Senha` varchar(250) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`Id`, `Nome`, `Email`, `Foto`, `Telefone`, `Senha`, `DataInclusao`, `DataAlteracao`, `IdOrigem`) VALUES
(6, 'André Bonetti de Oliveira', 'andrebonetti2@gmail.com', NULL, '11975356753', '13ef0066ced516d68fc0c308f174cfb5', '2017-07-13 10:23:16', '0000-00-00 00:00:00', 0),
(7, 'Comercial', 'comercial@gerensys.com', NULL, '975506180', '13ef0066ced516d68fc0c308f174cfb5', '2017-07-13 10:25:26', '0000-00-00 00:00:00', 0),
(8, 'Comercial 2', 'comercial2@gmail.com', NULL, '11975356754', '13ef0066ced516d68fc0c308f174cfb5', '2017-07-13 10:32:19', '0000-00-00 00:00:00', 0),
(9, 'Teste 5', 'comercial3@gerensys.com', NULL, '11975506181', '06afa6c8b54d3cc80d269379d8b6a078', '2017-07-13 11:24:43', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente_enderecos`
--

CREATE TABLE IF NOT EXISTS `tb_cliente_enderecos` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdCliente` bigint(20) NOT NULL,
  `IsPrincipal` tinyint(1) NOT NULL,
  `CEP` varchar(15) NOT NULL,
  `Endereco` varchar(250) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Complemento` varchar(10) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_cliente_enderecos`
--

INSERT INTO `tb_cliente_enderecos` (`Id`, `IdCliente`, `IsPrincipal`, `CEP`, `Endereco`, `Numero`, `Complemento`, `DataInclusao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 6, 1, '03627-100', 'Rua André Ansaldo', 2, 'A', '2017-07-13 10:44:08', NULL, 1),
(2, 6, 0, '04725800', 'Rua João Fidelis', 45, 'B', '2017-07-13 10:56:55', NULL, 1),
(3, 6, 0, '03627-100', 'Rua Cândido Borges Monteiro', 13, 'A', '2017-07-13 16:01:34', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cor`
--

CREATE TABLE IF NOT EXISTS `tb_cor` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(100) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Descricao` (`Descricao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

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
(7, 'Bege', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(8, 'Bordo', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(9, 'Cinza', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(10, 'Rosa', 1, '2017-07-03 00:00:00', NULL, NULL, 1);

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
-- Estrutura da tabela `tb_fornecedor`
--

CREATE TABLE IF NOT EXISTS `tb_fornecedor` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `NomeFantasia` varchar(100) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
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
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Estrutura da tabela `tb_marca`
--

CREATE TABLE IF NOT EXISTS `tb_marca` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdGrupo` bigint(20) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Descricao` (`Descricao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `tb_marca`
--

INSERT INTO `tb_marca` (`Id`, `IdGrupo`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 1, 'Azaleia', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 2, 'Capricho', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 3, 'Corello', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(4, 1, 'Dakota', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(5, 3, 'Ellus', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(6, 2, 'Aramis', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(7, 3, 'Lyssa Baby', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(8, 2, 'Hurley', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(9, 2, 'Manola', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(10, 2, 'Calvin Klein', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(11, 1, 'Tatibella Baby', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(12, 3, 'Lacoste', 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(13, 2, 'Nigambi', 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(14, 3, 'Drop Family', 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(15, 1, 'Nike', 1, '2017-07-04 00:00:00', NULL, NULL, 1);

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
  `IdMarca` bigint(20) DEFAULT NULL,
  `IdFornecedor` bigint(20) DEFAULT NULL,
  `IdTipo` bigint(20) DEFAULT NULL,
  `IdCor` bigint(20) DEFAULT NULL,
  `MediaClassificacao` decimal(2,2) DEFAULT NULL,
  `EstoqueTotal` int(11) DEFAULT NULL,
  `NumeroMaximoParcelas` int(11) DEFAULT NULL,
  `JurosAPartirDe` int(11) DEFAULT NULL,
  `PorcentagemJuros` decimal(7,0) DEFAULT NULL,
  `Id_CST_CSOSN` bigint(20) NOT NULL,
  `Id_NCM_SH` bigint(20) NOT NULL,
  `IdCest` bigint(20) DEFAULT NULL,
  `IdTipoPrecoApresentacao` bigint(20) NOT NULL DEFAULT '1',
  `Detalhes` text,
  `Informacoes_Adicionais` text,
  `PesoLiquido` decimal(7,3) NOT NULL,
  `PesoBruto` decimal(7,3) NOT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`),
  UNIQUE KEY `Codigo` (`Codigo`),
  UNIQUE KEY `Descricao` (`Descricao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`Id`, `Codigo`, `Descricao`, `IdUnidadeApresentacao`, `IdGrupo`, `IdSubGrupo`, `IdSetor`, `IdMarca`, `IdFornecedor`, `IdTipo`, `IdCor`, `MediaClassificacao`, `EstoqueTotal`, `NumeroMaximoParcelas`, `JurosAPartirDe`, `PorcentagemJuros`, `Id_CST_CSOSN`, `Id_NCM_SH`, `IdCest`, `IdTipoPrecoApresentacao`, `Detalhes`, `Informacoes_Adicionais`, `PesoLiquido`, `PesoBruto`, `IdOrigem`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`) VALUES
(1, 'AZ747SHF47UGM', 'Sapatilha AZALEIA Conforto Branca', 1, 1, 1, 1, 1, 0, 0, 3, '0.00', 0, 8, 6, '25', 0, 0, 0, 1, 'Sapatilha AZALEIA Conforto Branca, com bico redondo, cabedal envernizado e solado flatform de 4cm no tamanho 38.', 'Material Externo	Sintético\nMaterial Interno	Têxtil\nMaterial externo da sola	EVA\nCor	Branco\nTipo de salto	Plano\nExata altura do salto em cm	4.000\nTipo de frete:	Leve', '0.000', '0.000', 1, 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'COD002', 'Camisa Polo Aramis Bordado Degradê Azul', 1, 2, 7, 2, 6, 0, NULL, 2, '0.00', 0, 11, 8, '20', 0, 0, NULL, 1, 'Camisa Polo Manga Curta Aramis Bordado Degradê Azul-Marinho, com bordado do logo da marca, fendas laterais, abertura no peitilho de fecho por botões, friso 3 cores degradê nas mangas e gola. Possui gola de ponta, mangas curtas e modelagem reta.', 'Confeccionada em malha piquet 100% Algodão.\n\nMedidas: Ombro: 14cm / Manga: 21cm / Tórax: 108cm / Comprimento: 77cm. Tamanho: M.\n\nMedidas do Modelo: Altura 1,87m / Tórax 99cm / Manequim 40. Modelo	Aramis PO.01.1001\nMaterial	Algodão\nComposição	100% Algodão\nCor	Azul\nLavagem	Lavar a mão\nTipo de frete:	Leve', '0.000', '0.000', 1, 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'COD003', 'BOLSA MATERNIDADE LYSSA BABY', 1, 3, 11, 3, 7, 0, NULL, 10, '0.00', 0, 8, 7, '40', 0, 0, NULL, 1, '1.Bolsa: Material corino Sintético, Fechamento Zíper, 02 Alças de Mão, 01 Alça de Ombro, Ajustável e Removível, Bolsos:01 Frontal, 02 Laterais, Forro: Material 100% PVC Impermeável;', NULL, '0.000', '0.000', 1, 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 'COD004', 'Long John Hurley Phantom Limites 202', 1, 2, 6, 4, 8, 0, NULL, 6, '0.00', 0, 5, 3, '10', 0, 0, NULL, 1, 'Long John Hurley Phantom Limites 202 Fullsuit Camo;Composição: 100% neoprene;Entrada do peito;Desempenho comprovado com selo à prova de água, garantindo também flexibilidade;Ponto de solda reforçado;Fita local projetada em todas as áreas de tensão;Joelhos com material Jersey Supratex resistente à abrasão;Design da perna pré-curvado e reforçado na parte de trás do joelho;Ótimo conforto, flexibilidade alta, secagem rápida;Gola alta, mangas curtas, costuras seladas;Estampa na parte frontal e na perna direita.', NULL, '0.000', '0.000', 1, 1, '2017-06-30 00:00:00', NULL, NULL),
(5, 'MO050APF85JFA', 'Vestido manola babado bordô', 1, 2, 12, 1, 9, 0, NULL, 8, '0.00', 0, 10, 0, NULL, 0, 0, NULL, 1, 'De malha bordô e com uma modelagem retrô, este vestido é ideal para aquelas que querem uma peça clássica e cheia de estilo', 'Material	Poliéster\r\nComposição	90%poliester e 10%elastano\r\nCor	bordo vermelho\r\nLavagem	Pode ser lavado na máquina\r\nGarantia do Fornecedor	Sem Garantia\r\nFrete Adicional	2\r\nTipo de frete:	Marketplace', '0.000', '0.000', 1, 1, '2017-07-03 00:00:00', NULL, NULL),
(6, 'CA957SHM03DKM', 'Sapatênis Calvin Klein Estampa Cinza', 1, 1, 5, 2, 10, 0, NULL, 9, '0.00', 0, 12, 3, '5', 0, 0, NULL, 1, 'Sapatênis Calvin Klein Estampa Cinza, com cabedal têxtil, recortes em couro e estampa do nome da marca. Possui fechamento por amarração.', 'Modelo	Calvin Klein CM61D43TE036\nMaterial Externo	Têxtil\nMaterial Interno	Têxtil\nMaterial externo da sola	Borracha\nCor	Cinza\nTipo de frete:	Leve', '0.000', '0.000', 1, 1, '2017-07-03 00:00:00', NULL, NULL),
(7, 'TA202SHM05OMS', 'Pantufa Tatibella Baby Coroa Rosa', 1, 1, 13, 3, 11, 0, NULL, 10, '0.00', 0, 9, 7, '20', 0, 0, NULL, 1, 'Sapatinho Pantufa confeccionado em tricoline 100% algodão (inclusive o solado) e estruturado com manta. Possui elástico que se ajusta ao pezinho delicado do bebê deixando-os confortáveis e quentinhos. \r\n\r\nNumeração e Tamanho das nossas Pantufas: \r\nNúmero 16 - De 0 a 3 meses - 10cm \r\nNúmero 17 – De 3 a 6 meses – 11cm \r\nNúmero 18 - De 6 a 9 meses – 11,5cm \r\nNúmero 19 – De 9 a 12 meses – 12,3cm \r\nNúmero 20 – De 12 a 18 meses - 13cm \r\n\r\nDica para acertar no tamanho: \r\nMeça o comprimento do pezinho do bebe (do dedão até o calcanhar) e acrescente mais 1,5cm de folga, a Pantufa ficará mais confortável e você poderá usá-la por mais tempo.', 'ID	TA202SHM05OMS\r\nMaterial Externo	Algodão\r\nMaterial Interno	Algodão\r\nLargura do Sapato	regular\r\nCor	ROSA BEBE\r\nGarantia do Fornecedor	1 Mês\r\nTipo de frete:	Marketplace', '0.000', '0.000', 1, 1, '2017-07-03 00:00:00', NULL, NULL),
(8, 'EL648ACF68LBJ', 'Bolsa Shopping Ellus Tag Preta', 1, 3, 13, 1, 5, 0, NULL, 5, '0.00', 0, 12, 10, '35', 0, 0, NULL, 1, 'Bolsa Shopping Ellus Tag Preta, com acabamento texturizado, tag da marca e fecho por botão magnético. Possui alças de ombro de 52cm. Medidas: 30x35x12cm. (LxAxP)', 'SKU	EL648ACF68LBJ\r\nModelo	Ellus 46ZW009\r\nMaterial Externo	Sintético\r\nMaterial Interno	Têxtil\r\nCor	Preto\r\nAltura	35\r\nLargura	30\r\nProfundidade	12\r\nTipo de frete:	Leve', '0.000', '0.000', 1, 1, '2017-07-03 00:00:00', NULL, NULL),
(9, 'LA136ACU34FPD', 'Óculos De Sol Lacoste L781S 106 Branco', 1, 3, 15, 2, 12, NULL, NULL, 3, '0.99', 12, 4, 3, '18', 0, 0, NULL, 1, 'Óculos De Sol Lacoste L781S 106 Branco', 'SKU	LA136ACU34FPD\r\nCor	BRANCO\r\nGarantia do Fornecedor	1 Mês\r\nTipo de frete:	Marketplace', '0.000', '0.000', 1, 1, '2017-07-04 00:00:00', NULL, NULL),
(10, 'NI906APU72VOP', 'Macacão Longo em Suedine Nigambi Joanin', 1, 2, 16, 3, 13, NULL, NULL, 8, NULL, 40, 10, 7, '15', 0, 0, NULL, 1, 'Macacão Longo em Suedine Joaninha Nigambi Vermelho \r\n\r\nPrincipais características: \r\n\r\nMacacão: \r\nEstampa frontal; \r\nAbertura entrepernas em botões de pressão; \r\nGola envelope; \r\nConfeccionado em suedine 100% algodão; \r\nLavar com cores similares e não deixar de molho.', 'SKU	NI906APU72VOP\r\nMaterial	Algodão\r\nComposição	100% Algodão\r\nCor	VERMELHO\r\nGarantia do Fornecedor	1 Mês\r\nTipo de frete:	Marketplace', '0.000', '0.000', 1, 1, '2017-07-04 00:00:00', NULL, '0000-00-00 00:00:00'),
(11, 'DR181ACU17GXE', 'Relógio Drop Dead Analog Camu Brown', 1, 3, 17, 4, 14, NULL, NULL, 11, NULL, 15, 6, 0, '0', 0, 0, NULL, 1, 'Quando o alto design alia-se ao estilo. O DD Analog respira o life style do skate, sem perder a classe. Manobras merecem aplausos, mas o estilo merece respeito! seja andando de skate ou quanto for sair para curtir, sem  perder a hora. Resistente à água. Pulseira de borracha.', 'ID	DR181ACU17GXE\r\nCor	Camuflado\r\nTipo de frete:	Marketplace', '0.000', '0.000', 1, 1, '2017-07-04 00:00:00', NULL, NULL),
(12, 'NI288SCM66WKF', 'Tênis Nike Zoom Winflo 4 Azul', 1, 1, 5, 4, 15, NULL, NULL, 7, NULL, NULL, 7, 5, '30', 0, 0, NULL, 1, 'Tênis Nike Zoom Winflo 4 Azul \r\nTipo de Produto: Tênis\r\nPisada: Neutra\r\nTamanho: 38\r\nFechamento: Cadarço\r\nOcasião/Estilo: Esporte\r\nMaterial: Sintético\r\nMaterial Interno: Têxtil\r\nMaterial da Sola: EVA\r\nCaracterísticas Especiais: Possui a tecnologia no cabedal: Flywire: Oferece suporte leve usando fibras de tensão estrategicamente posicionadas na parte superior do calçado, que envolvem a parte intermediária do pé e o arco pela parte de baixo, fornecendo um suporte extremamente leve e confortável para o seu pé.\r\nSolado: Solado Waffle: Durável, utiliza formas amplas, profundas e ampliadas no antepé para proporcionar excelente tração multissuperfícies, além de propulsionar o atleta para frente.\r\nEntressola: Nike Zoom: Permite resposta rápida de movimentos com leveza, oferecendo proteção contra impactos, maior estabilidade e sensação de baixo perfil.\r\nCushlon: Espuma que proporciona amortecimento macio e impulsivo com responsividade, além de uma sensação de maciez, conforto e suporte.\r\nPlamilha: \r\nSistema Fitsole: Fornece conforto, leve amortecimento e suporte na planta do pé.', 'SKU	NI288SCM66WKF\r\nModelo	Nike 898466-440\r\nCaracterísticas Especiais	Possui a tecnologia no cabedal: Flywire: Oferece suporte leve usando fibras de tensão estrategicamente posicionadas na parte superior do calçado, que envolvem a parte intermediária do pé e o arco pela parte de baixo, fornecendo um suporte extremamente lev\r\nCor	Azul\r\nTipo de frete:	Leve', '0.000', '0.000', 1, 1, '2017-07-04 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_classificacao`
--

CREATE TABLE IF NOT EXISTS `tb_produto_classificacao` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdProduto` decimal(1,1) NOT NULL,
  `Aparencia` float(1,1) NOT NULL,
  `Qualidade` float(1,1) NOT NULL,
  `Preco` int(11) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_codigosalternativos`
--

CREATE TABLE IF NOT EXISTS `tb_produto_codigosalternativos` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdProduto` bigint(20) NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Codigo` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_comentarios`
--

CREATE TABLE IF NOT EXISTS `tb_produto_comentarios` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdProduto` bigint(20) NOT NULL,
  `Texto` text NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tb_produto_comentarios`
--

INSERT INTO `tb_produto_comentarios` (`Id`, `IdProduto`, `Texto`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 8, 'A bolsa é bonita, grande e o material um tanto diferente... Vai durar um tempão. Estou satisfeita.', 1, '2017-07-03 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 8, 'O produto que recebi é de boa qualidade. A entrega aconteceu antes do prazo. Gostei muito de realizar a minha primeira compra na Dafiti.', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(3, 8, 'Bolsa linda!!!!!Estou satisfeita. ..da foto top pop na entrega.', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(4, 2, 'Camiseta linda, veste perfeito, o caimento é ótimo, é muito confortável e elegante. Recomendo!', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(5, 2, 'CAMISA DE OTIMA QUALIDADE. ADMIRO OS PRODUTOS DA MARCA ARAMIS. . O CAIMENTO E PERFEITO', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(6, 2, 'Camisa muito bonita, material de ótima qualidade e a entrega super rápida', 1, '2017-07-03 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_destaques`
--

CREATE TABLE IF NOT EXISTS `tb_produto_destaques` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Ordem` int(11) NOT NULL,
  `IdProduto` bigint(20) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_produto_destaques`
--

INSERT INTO `tb_produto_destaques` (`Id`, `Ordem`, `IdProduto`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 5, 1, 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(2, 4, 2, 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(3, 3, 3, 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(4, 2, 4, 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(5, 1, 5, 1, '2017-07-04 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_estoque`
--

CREATE TABLE IF NOT EXISTS `tb_produto_estoque` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdProduto` bigint(20) NOT NULL,
  `IdTamanho` bigint(20) NOT NULL,
  `IdCor` bigint(20) NOT NULL,
  `Qtde_estoque` int(11) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tb_produto_estoque`
--

INSERT INTO `tb_produto_estoque` (`Id`, `IdProduto`, `IdTamanho`, `IdCor`, `Qtde_estoque`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 1, 5, 3, 12, 1, '2017-07-03 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 1, 6, 3, 4, 1, '2017-07-03 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 1, 7, 3, 16, 1, '2017-07-03 00:00:00', 0, '0000-00-00 00:00:00', 1),
(4, 2, 1, 2, 5, 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(5, 2, 2, 2, 6, 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(6, 2, 3, 2, 8, 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(7, 2, 4, 2, 2, 1, '2017-07-03 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_fotos`
--

CREATE TABLE IF NOT EXISTS `tb_produto_fotos` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdProduto` bigint(20) NOT NULL,
  `IsPrincipal` tinyint(1) NOT NULL DEFAULT '0',
  `NomeArquivo` varchar(250) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `tb_produto_fotos`
--

INSERT INTO `tb_produto_fotos` (`Id`, `IdProduto`, `IsPrincipal`, `NomeArquivo`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 1, 1, 'Sapatilha AZALEIA Conforto Branca_01.jpg', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 1, 0, 'Sapatilha AZALEIA Conforto Branca_02.jpg', 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 2, 1, 'Camisa Polo Aramis Bordado Degrade Azul_01.jpg', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(4, 2, 0, 'Camisa Polo Aramis Bordado Degrade Azul_02.jpg', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(5, 2, 0, 'Camisa Polo Aramis Bordado Degrade Azul_03.jpg', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(6, 3, 1, 'BOLSA MATERNIDADE LYSSA BABY_01.jpg', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(7, 4, 1, 'Long John Hurley Phantom Limites 202_01.jpg', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(8, 5, 1, 'Vestido manola babado bordo_01.jpg', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(9, 5, 0, 'Vestido manola babado bordo_02.jpg', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(10, 6, 1, 'Sapatenis Calvin Klein Estampa Cinza_01.jpg', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(11, 6, 0, 'Sapatenis Calvin Klein Estampa Cinza_02.jpg', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(12, 6, 0, 'Sapatenis Calvin Klein Estampa Cinza_03.jpg', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(13, 7, 1, 'Pantufa Tatibella Baby Coroa Rosa_01.jpg', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(14, 7, 0, 'Pantufa Tatibella Baby Coroa Rosa_01.jpg', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(15, 8, 1, 'Bolsa Shopping Ellus Tag Preta_01.jpg', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(16, 8, 0, 'Bolsa Shopping Ellus Tag Preta_02.jpg', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(17, 9, 1, 'Oculos De Sol Lacoste L781S 106 Branco_01.jpg', 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(18, 10, 1, 'Macacao Longo em Suedine Nigambi Joanin_01.jpg', 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(19, 11, 1, 'Relogio Drop Dead Analog Camu Brown_01.jpg', 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(20, 12, 1, 'Tenis Nike Zoom Winflo 4 Azul_01.jpg', 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(21, 12, 0, 'Tenis Nike Zoom Winflo 4 Azul_02.jpg', 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(22, 12, 0, 'Tenis Nike Zoom Winflo 4 Azul_03.jpg', 1, '2017-07-04 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_preco`
--

CREATE TABLE IF NOT EXISTS `tb_produto_preco` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdTipoPreco` bigint(20) NOT NULL,
  `Preco` decimal(7,2) NOT NULL,
  `IdProduto` bigint(20) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tb_produto_preco`
--

INSERT INTO `tb_produto_preco` (`Id`, `IdTipoPreco`, `Preco`, `IdProduto`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 1, '89.00', 1, 1, '2017-06-30 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 1, '129.00', 2, 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(3, 1, '149.00', 3, 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(4, 1, '500.99', 4, 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(5, 1, '39.90', 5, 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(6, 1, '154.99', 6, 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(7, 1, '35.00', 7, 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(8, 1, '184.99', 8, 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(9, 1, '294.95', 9, 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(10, 1, '49.90', 10, 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(11, 1, '99.00', 11, 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(12, 1, '400.00', 12, 1, '2017-07-04 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_promocao`
--

CREATE TABLE IF NOT EXISTS `tb_produto_promocao` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdProduto` bigint(20) NOT NULL,
  `Qtde` int(11) DEFAULT NULL,
  `IsMaiorQue` bit(1) DEFAULT NULL,
  `IsIgualA` bit(1) DEFAULT NULL,
  `PorcentagemDesconto` decimal(10,0) DEFAULT NULL,
  `PrecoFixoDesconto` decimal(10,0) DEFAULT NULL,
  `VigenciaPartirDe` datetime DEFAULT NULL,
  `VigenciaAte` datetime DEFAULT NULL,
  `DiasSemana` varchar(10) DEFAULT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_produto_promocao`
--

INSERT INTO `tb_produto_promocao` (`Id`, `IdProduto`, `Qtde`, `IsMaiorQue`, `IsIgualA`, `PorcentagemDesconto`, `PrecoFixoDesconto`, `VigenciaPartirDe`, `VigenciaAte`, `DiasSemana`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 2, NULL, NULL, NULL, '10', NULL, '2017-07-06 00:00:00', '2017-07-13 00:00:00', NULL, 1, '2017-07-06 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 3, NULL, NULL, NULL, NULL, '110', '2017-07-06 00:00:00', '2017-07-13 00:00:00', NULL, 1, '2017-07-06 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 4, NULL, NULL, NULL, '20', '0', '2017-07-06 00:00:00', '0000-00-00 00:00:00', NULL, 1, '2017-07-06 00:00:00', 0, '0000-00-00 00:00:00', 1),
(4, 10, NULL, NULL, NULL, '10', NULL, '2017-07-06 00:00:00', '2017-07-13 00:00:00', NULL, 1, '2017-07-06 00:00:00', NULL, NULL, 1),
(5, 11, NULL, NULL, NULL, NULL, '40', '2017-07-06 00:00:00', '2017-07-13 00:00:00', NULL, 1, '2017-07-06 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_setor`
--

CREATE TABLE IF NOT EXISTS `tb_setor` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(50) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
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
-- Estrutura da tabela `tb_subgrupo`
--

CREATE TABLE IF NOT EXISTS `tb_subgrupo` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdGrupo` bigint(20) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

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
(11, 3, 'Bolsas Maternidade', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(12, 2, 'Vestidos', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(13, 1, 'Pantufas', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(14, 3, 'Bolsas', 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(15, 3, 'Óculos', 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(16, 2, 'Macacão', 1, '2017-07-04 00:00:00', NULL, NULL, 1),
(17, 3, 'Relógios', 1, '2017-07-04 00:00:00', NULL, NULL, 1);

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
  `IdGrupo` bigint(20) NOT NULL,
  `Descricao` varchar(11) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Descricao` (`Descricao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `tb_sys_tamanho`
--

INSERT INTO `tb_sys_tamanho` (`Id`, `IdGrupo`, `Descricao`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, 2, 'P', 2, '2017-06-30 00:00:00', NULL, NULL, 1),
(2, 2, 'M', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(3, 2, 'G', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(4, 2, 'GG', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(5, 1, '34', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(6, 1, '35', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(7, 1, '36', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(8, 1, '37', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(9, 1, '38', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(10, 3, 'Único', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(11, 1, '39', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(12, 1, '40', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(13, 1, '41', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(14, 1, '42', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(15, 1, '16', 1, '2017-07-03 00:00:00', NULL, NULL, 1);

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
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) NOT NULL,
  `DataAlteracao` datetime NOT NULL,
  `IdOrigem` bigint(20) NOT NULL DEFAULT '1',
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
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Senha` varchar(250) NOT NULL,
  `Nome` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `IdUsuarioInclusao` bigint(20) NOT NULL,
  `DataInclusao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdUsuarioAlteracao` bigint(20) DEFAULT NULL,
  `DataAlteracao` datetime DEFAULT NULL,
  `IdOrigem` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`Id`, `Senha`, `Nome`, `Email`, `IdUsuarioInclusao`, `DataInclusao`, `IdUsuarioAlteracao`, `DataAlteracao`, `IdOrigem`) VALUES
(1, '', 'Gerensys', 'comercial@gerensys.com', 1, '2017-06-30 00:00:00', NULL, NULL, 1),
(2, '', 'Cliente X', 'clientex@teste.com.br', 1, '2017-07-03 00:00:00', NULL, NULL, 1),
(3, '', 'Cliente Y', 'clientey@teste.com.br', 1, '2017-07-03 00:00:00', NULL, NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
