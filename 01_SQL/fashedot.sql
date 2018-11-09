-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Nov-2018 às 23:26
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashedot`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_edit_cliente` (IN `id` INT, IN `password` VARCHAR(50), IN `nome` VARCHAR(20), IN `apelido` VARCHAR(20), IN `datanasc` DATE, IN `morada` VARCHAR(100), IN `codigopostal` VARCHAR(11), IN `idpais` INT, IN `nif` INT, IN `tele` INT, IN `email` VARCHAR(100))  BEGIN
UPDATE cliente SET
  cliente_password = password,
  cliente_nome = nome,
  cliente_apelido = apelido,
  cliente_datanasc = datanasc,
  cliente_morada = morada,
  cliente_codigopostal = codigopostal,
  cliente_idpais = idpais,
  cliente_nif = nif,
  cliente_tele = tele,
  cliente_email = email
  WHERE cliente_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_login` (IN `username` VARCHAR(20), IN `password` VARCHAR(50))  BEGIN
SELECT cliente_id, cliente_tipo, cliente_username, cliente_nome, cliente_apelido, cliente_datanasc, cliente_morada, cliente_codigopostal, cliente_idpais, cliente_nif, cliente_tele, cliente_email, cliente_img_path
FROM cliente WHERE cliente_username like username AND cliente_password like password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_register_admin` (IN `username` VARCHAR(20), IN `password` VARCHAR(50), IN `nome` VARCHAR(20), IN `apelido` VARCHAR(20), IN `datanasc` DATE, IN `morada` VARCHAR(100), IN `codigopostal` VARCHAR(11), IN `idpais` INT, IN `nif` INT, IN `tele` INT, IN `email` VARCHAR(100), IN `img` VARCHAR(10000))  BEGIN
INSERT INTO cliente (cliente_username,cliente_password,cliente_nome,cliente_apelido,cliente_datanasc,cliente_morada,cliente_codigopostal,cliente_idpais,cliente_nif,cliente_tele,cliente_email,cliente_tipo,cliente_img_path)
  VALUES (username,password,nome,apelido,datanasc,morada,codigopostal,idpais,nif,tele,email,1,img);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_register_user` (IN `username` VARCHAR(20), IN `password` VARCHAR(50), IN `nome` VARCHAR(20), IN `apelido` VARCHAR(20), IN `datanasc` DATE, IN `morada` VARCHAR(100), IN `codigopostal` VARCHAR(11), IN `idpais` INT, IN `nif` INT, IN `tele` INT, IN `email` VARCHAR(100), IN `img` VARCHAR(10000))  BEGIN
INSERT INTO cliente (cliente_username,cliente_password,cliente_nome,cliente_apelido,cliente_datanasc,cliente_morada,cliente_codigopostal,cliente_idpais,cliente_nif,cliente_tele,cliente_email,cliente_tipo,cliente_img_path)
  VALUES (username,password,nome,apelido,datanasc,morada,codigopostal,idpais,nif,tele,email,0,img);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `carrinho_id` int(11) NOT NULL,
  `carrinho_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho_stock`
--

CREATE TABLE `carrinho_stock` (
  `carstock_id` int(11) NOT NULL,
  `carstock_idcarrinho` int(11) NOT NULL,
  `carstock_idproduto` int(11) NOT NULL,
  `carstock_quantproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nome`) VALUES
(1, 'Roupa'),
(2, 'Calçado'),
(3, 'Acessórios');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `cliente_username` varchar(20) NOT NULL,
  `cliente_password` varchar(50) NOT NULL,
  `cliente_nome` varchar(20) NOT NULL,
  `cliente_apelido` varchar(20) NOT NULL,
  `cliente_datanasc` date NOT NULL,
  `cliente_morada` varchar(100) NOT NULL,
  `cliente_codigopostal` varchar(11) NOT NULL,
  `cliente_idpais` int(11) NOT NULL,
  `cliente_nif` int(11) NOT NULL,
  `cliente_tele` int(11) NOT NULL,
  `cliente_email` varchar(100) NOT NULL,
  `cliente_tipo` int(11) NOT NULL,
  `cliente_img_path` varchar(10000) NOT NULL DEFAULT 'images/unkown.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `cliente_username`, `cliente_password`, `cliente_nome`, `cliente_apelido`, `cliente_datanasc`, `cliente_morada`, `cliente_codigopostal`, `cliente_idpais`, `cliente_nif`, `cliente_tele`, `cliente_email`, `cliente_tipo`, `cliente_img_path`) VALUES
(11, 'teste1', 'e959088c6049f1104c84c9bde5560a13', 'Goncalo', 'Lavrador', '2017-10-26', 'Sapiente quia et laboriosam occaecat in porro enim eum ullamco et consequatur dicta esse', '34-86', 0, 75, 47, 'goxyhosi@mailinator.net', 0, ''),
(12, 'teste2', '38851536d87701d2191990e24a7f8d4e', 'Nilton', 'Fontes', '2011-08-16', 'Harum eaque consequatur Omnis asperiores', '36-3', 0, 98, 26, 'jidesot@mailinator.com', 0, 'images/uploads/ZW3lc87l2syaeqeb8ja1qyUal4WELCXipBf9h8y033btKj845wPVQdLIvepbKP2lDkdLxZd7VSMbvBCzPgYN1VCxCwlaFdrWdnPQ.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id_imagem` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_imgcategoria` int(11) NOT NULL,
  `nome_imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imgcategoria`
--

CREATE TABLE `imgcategoria` (
  `id_imgcategoria` int(11) NOT NULL,
  `nome_imgcategoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imgcategoria`
--

INSERT INTO `imgcategoria` (`id_imgcategoria`, `nome_imgcategoria`) VALUES
(1, 'principal'),
(2, 'icon'),
(3, 'galeria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nome_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mes`
--

CREATE TABLE `mes` (
  `mes_id` int(11) NOT NULL,
  `mes_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mes`
--

INSERT INTO `mes` (`mes_id`, `mes_nome`) VALUES
(1, 'Janeiro'),
(2, 'Fevereiro'),
(3, 'Marco'),
(4, 'Abril'),
(5, 'Maio'),
(6, 'Junho'),
(7, 'Julho'),
(8, 'Agosto'),
(9, 'Setembro'),
(10, 'Outubro'),
(11, 'Novembro'),
(12, 'Dezembro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises`
--

CREATE TABLE `paises` (
  `paisId` int(11) NOT NULL,
  `paisNome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paises`
--

INSERT INTO `paises` (`paisId`, `paisNome`) VALUES
(1, 'AFEGANISTÃO'),
(2, 'ACROTÍRI E DECELIA'),
(3, 'ÁFRICA DO SUL'),
(4, 'ALBÂNIA'),
(5, 'ALEMANHA'),
(6, 'AMERICAN SAMOA'),
(7, 'ANDORRA'),
(8, 'ANGOLA'),
(9, 'ANGUILLA'),
(10, 'ANTÍGUA E BARBUDA'),
(11, 'ANTILHAS NEERLANDESAS'),
(12, 'ARÁBIA SAUDITA'),
(13, 'ARGÉLIA'),
(14, 'ARGENTINA'),
(15, 'ARMÉNIA'),
(16, 'ARUBA'),
(17, 'AUSTRÁLIA'),
(18, 'ÁUSTRIA'),
(19, 'AZERBAIJÃO'),
(20, 'BAHAMAS'),
(21, 'BANGLADECHE'),
(22, 'BARBADOS'),
(23, 'BARÉM'),
(24, 'BASSAS DA ÍNDIA'),
(25, 'BÉLGICA'),
(26, 'BELIZE'),
(27, 'BENIM'),
(28, 'BERMUDAS'),
(29, 'BIELORRÚSSIA'),
(30, 'BOLÍVIA'),
(31, 'BÓSNIA E HERZEGOVINA'),
(32, 'BOTSUANA'),
(33, 'BRASIL'),
(34, 'BRUNEI DARUSSALAM'),
(35, 'BULGÁRIA'),
(36, 'BURQUINA FASO'),
(37, 'BURUNDI'),
(38, 'BUTÃO'),
(39, 'CABO VERDE'),
(40, 'CAMARÕES'),
(41, 'CAMBOJA'),
(42, 'CANADÁ'),
(43, 'CATAR'),
(44, 'CAZAQUISTÃO'),
(45, 'CENTRO-AFRICANA REPÚBLICA'),
(46, 'CHADE'),
(47, 'CHILE'),
(48, 'CHINA'),
(49, 'CHIPRE'),
(50, 'COLÔMBIA'),
(51, 'COMORES'),
(52, 'CONGO'),
(53, 'CONGO REPÚBLICA DEMOCRÁTICA'),
(54, 'COREIA DO NORTE'),
(55, 'COREIA DO SUL'),
(56, 'COSTA DO MARFIM'),
(57, 'COSTA RICA'),
(58, 'CROÁCIA'),
(59, 'CUBA'),
(60, 'DINAMARCA'),
(61, 'DOMÍNICA'),
(62, 'EGIPTO'),
(63, 'EMIRADOS ÁRABES UNIDOS'),
(64, 'EQUADOR'),
(65, 'ERITREIA'),
(66, 'ESLOVÁQUIA'),
(67, 'ESLOVÉNIA'),
(68, 'ESPANHA'),
(69, 'ESTADOS UNIDOS'),
(70, 'ESTÓNIA'),
(71, 'ETIÓPIA'),
(72, 'FAIXA DE GAZA'),
(73, 'FIJI'),
(74, 'FILIPINAS'),
(75, 'FINLÂNDIA'),
(76, 'FRANÇA'),
(77, 'GABÃO'),
(78, 'GÂMBIA'),
(79, 'GANA'),
(80, 'GEÓRGIA'),
(81, 'GIBRALTAR'),
(82, 'GRANADA'),
(83, 'GRÉCIA'),
(84, 'GRONELÂNDIA'),
(85, 'GUADALUPE'),
(86, 'GUAM'),
(87, 'GUATEMALA'),
(88, 'GUERNSEY'),
(89, 'GUIANA'),
(90, 'GUIANA FRANCESA'),
(91, 'GUINÉ'),
(92, 'GUINÉ EQUATORIAL'),
(93, 'GUINÉ-BISSAU'),
(94, 'HAITI'),
(95, 'HONDURAS'),
(96, 'HONG KONG'),
(97, 'HUNGRIA'),
(98, 'IÉMEN'),
(99, 'ILHA BOUVET'),
(100, 'ILHA CHRISTMAS'),
(101, 'ILHA DE CLIPPERTON'),
(102, 'ILHA DE JOÃO DA NOVA'),
(103, 'ILHA DE MAN'),
(104, 'ILHA DE NAVASSA'),
(105, 'ILHA EUROPA'),
(106, 'ILHA NORFOLK'),
(107, 'ILHA TROMELIN'),
(108, 'ILHAS ASHMORE E CARTIER'),
(109, 'ILHAS CAIMAN'),
(110, 'ILHAS COCOS (KEELING)'),
(111, 'ILHAS COOK'),
(112, 'ILHAS DO MAR DE CORAL'),
(113, 'ILHAS FALKLANDS (ILHAS MALVINAS)'),
(114, 'ILHAS FEROE'),
(115, 'ILHAS GEÓRGIA DO SUL E SANDWICH DO SUL'),
(116, 'ILHAS MARIANAS DO NORTE'),
(117, 'ILHAS MARSHALL'),
(118, 'ILHAS PARACEL'),
(119, 'ILHAS PITCAIRN'),
(120, 'ILHAS SALOMÃO'),
(121, 'ILHAS SPRATLY'),
(122, 'ILHAS VIRGENS AMERICANAS'),
(123, 'ILHAS VIRGENS BRITÂNICAS'),
(124, 'ÍNDIA'),
(125, 'INDONÉSIA'),
(126, 'IRÃO'),
(127, 'IRAQUE'),
(128, 'IRLANDA'),
(129, 'ISLÂNDIA'),
(130, 'ISRAEL'),
(131, 'ITÁLIA'),
(132, 'JAMAICA'),
(133, 'JAN MAYEN'),
(134, 'JAPÃO'),
(135, 'JERSEY'),
(136, 'JIBUTI'),
(137, 'JORDÂNIA'),
(138, 'KIRIBATI'),
(139, 'KOWEIT'),
(140, 'LAOS'),
(141, 'LESOTO'),
(142, 'LETÓNIA'),
(143, 'LÍBANO'),
(144, 'LIBÉRIA'),
(145, 'LÍBIA'),
(146, 'LISTENSTAINE'),
(147, 'LITUÂNIA'),
(148, 'LUXEMBURGO'),
(149, 'MACAU'),
(150, 'MACEDÓNIA'),
(151, 'MADAGÁSCAR'),
(152, 'MALÁSIA'),
(153, 'MALAVI'),
(154, 'MALDIVAS'),
(155, 'MALI'),
(156, 'MALTA'),
(157, 'MARROCOS'),
(158, 'MARTINICA'),
(159, 'MAURÍCIA'),
(160, 'MAURITÂNIA'),
(161, 'MAYOTTE'),
(162, 'MÉXICO'),
(163, 'MIANMAR'),
(164, 'MICRONÉSIA'),
(165, 'MOÇAMBIQUE'),
(166, 'MOLDÁVIA'),
(167, 'MÓNACO'),
(168, 'MONGÓLIA'),
(169, 'MONTENEGRO'),
(170, 'MONTSERRAT'),
(171, 'NAMÍBIA'),
(172, 'NAURU'),
(173, 'NEPAL'),
(174, 'NICARÁGUA'),
(175, 'NÍGER'),
(176, 'NIGÉRIA'),
(177, 'NIUE'),
(178, 'NORUEGA'),
(179, 'NOVA CALEDÓNIA'),
(180, 'NOVA ZELÂNDIA'),
(181, 'OMÃ'),
(182, 'PAÍSES BAIXOS'),
(183, 'PALAU'),
(184, 'PALESTINA'),
(185, 'PANAMÁ'),
(186, 'PAPUÁSIA-NOVA GUINÉ'),
(187, 'PAQUISTÃO'),
(188, 'PARAGUAI'),
(189, 'PERU'),
(190, 'POLINÉSIA FRANCESA'),
(191, 'POLÓNIA'),
(192, 'PORTO RICO'),
(193, 'PORTUGAL'),
(194, 'QUÉNIA'),
(195, 'QUIRGUIZISTÃO'),
(196, 'REINO UNIDO'),
(197, 'REPÚBLICA CHECA'),
(198, 'REPÚBLICA DOMINICANA'),
(199, 'ROMÉNIA'),
(200, 'RUANDA'),
(201, 'RÚSSIA'),
(202, 'SAHARA OCCIDENTAL'),
(203, 'SALVADOR'),
(204, 'SAMOA'),
(205, 'SANTA HELENA'),
(206, 'SANTA LÚCIA'),
(207, 'SANTA SÉ'),
(208, 'SÃO CRISTÓVÃO E NEVES'),
(209, 'SÃO MARINO'),
(210, 'SÃO PEDRO E MIQUELÃO'),
(211, 'SÃO TOMÉ E PRÍNCIPE'),
(212, 'SÃO VICENTE E GRANADINAS'),
(213, 'SEICHELES'),
(214, 'SENEGAL'),
(215, 'SERRA LEOA'),
(216, 'SÉRVIA'),
(217, 'SINGAPURA'),
(218, 'SÍRIA'),
(219, 'SOMÁLIA'),
(220, 'SRI LANCA'),
(221, 'SUAZILÂNDIA'),
(222, 'SUDÃO'),
(223, 'SUÉCIA'),
(224, 'SUÍÇA'),
(225, 'SURINAME'),
(226, 'SVALBARD'),
(227, 'TAILÂNDIA'),
(228, 'TAIWAN'),
(229, 'TAJIQUISTÃO'),
(230, 'TANZÂNIA'),
(231, 'TERRITÓRIO BRITÂNICO DO OCEANO ÍNDICO'),
(232, 'TERRITÓRIO DAS ILHAS HEARD E MCDONALD'),
(233, 'TIMOR-LESTE'),
(234, 'TOGO'),
(235, 'TOKELAU'),
(236, 'TONGA'),
(237, 'TRINDADE E TOBAGO'),
(238, 'TUNÍSIA'),
(239, 'TURKS E CAICOS'),
(240, 'TURQUEMENISTÃO'),
(241, 'TURQUIA'),
(242, 'TUVALU'),
(243, 'UCRÂNIA'),
(244, 'UGANDA'),
(245, 'URUGUAI'),
(246, 'USBEQUISTÃO'),
(247, 'VANUATU'),
(248, 'VENEZUELA'),
(249, 'VIETNAME'),
(250, 'WALLIS E FUTUNA'),
(251, 'ZÂMBIA'),
(252, 'ZIMBABUÉ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `produto_id` int(11) NOT NULL,
  `produto_idcategoria` int(11) NOT NULL,
  `produto_nome` varchar(50) NOT NULL,
  `produto_idmarca` int(11) NOT NULL,
  `produto_desc` varchar(100) NOT NULL,
  `id_publico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publico`
--

CREATE TABLE `publico` (
  `id_publico` int(11) NOT NULL,
  `nome_publico` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `publico`
--

INSERT INTO `publico` (`id_publico`, `nome_publico`) VALUES
(1, 'Homem'),
(2, 'Mulher'),
(3, 'Unisexo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slider`
--

CREATE TABLE `slider` (
  `id_slide` int(11) NOT NULL,
  `slide_state` int(11) NOT NULL,
  `image_slide` varchar(150) NOT NULL,
  `title_slide` varchar(50) NOT NULL,
  `title_effect` varchar(50) NOT NULL,
  `title_anim` varchar(50) NOT NULL,
  `desc_slide` varchar(150) NOT NULL,
  `desc_anim` varchar(50) NOT NULL,
  `button_slide` varchar(10) NOT NULL DEFAULT 'off',
  `button_text` varchar(50) NOT NULL,
  `buton_anim` varchar(50) NOT NULL,
  `button_link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `slider`
--

INSERT INTO `slider` (`id_slide`, `slide_state`, `image_slide`, `title_slide`, `title_effect`, `title_anim`, `desc_slide`, `desc_anim`, `button_slide`, `button_text`, `buton_anim`, `button_link`) VALUES
(4, 1, 'images/slider/nC72yzDMTcSbzD6LUdHHQ3YIyJMG2gc5UMUQXATsHbUfl3B8PyOyDYudf9tbwO1UKChp0bE2D40i83zbnGg6BZCEDiCPizgk0UQ3.jpg', 'Novo Slider', 'bo6', 'fadeInUp', 'Este é dinamico !', 'fadeInDown', 'on', 'OLHA UM BUTAO', 'zoomIn', '#'),
(5, 1, 'images/slider/8WH71sWnUs2WPNM4FhohGb9JieZ3NUyndUoP8p4cTYvoUVVm9UGkOVegple1hvy9pDhUM3m9U0oei4sTBAzhqYJQe5SMIiPYsOry.jpg', 'Langerie', 'bo4', 'bounce', 'Sem butao', 'bounce', 'off', '', 'bounce', ''),
(6, 1, 'images/slider/5d475jS5eFaHqC43KR2AWZSuzpypKCjnSo75GpuYgo4ZMfsZirkOEqOy3RIll6C1prfAbKlZ8vU90JdgMcOxQ4bUsehJzBa42eWH.jpg', 'Nilton e uma russa', 'bo6', 'jackInTheBox', 'Ele tem gosto', 'jello', 'on', 'Manboas', 'lightSpeedIn', 'http://www.redtube.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slider_texteffects`
--

CREATE TABLE `slider_texteffects` (
  `id_texteffect` int(11) NOT NULL,
  `code_texteffect` varchar(50) NOT NULL,
  `desc_texteffect` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `slider_texteffects`
--

INSERT INTO `slider_texteffects` (`id_texteffect`, `code_texteffect`, `desc_texteffect`) VALUES
(1, 'bo1', 'white square'),
(2, 'bo2', 'start end stripes'),
(3, 'bo3', 'top bar'),
(4, 'bo4', 'square (light)'),
(5, 'bo5', 'square (bold)'),
(6, 'bo9', 'square (light rounder corners)'),
(7, 'bo6', 'top bottom stripes'),
(8, 'bo7', 'underline (light)'),
(9, 'bo4', 'underline (bold)'),
(10, 'bo8', 'open box'),
(11, 'bo10', 'stitched'),
(12, 'bo13', 'typing cursor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_idproduto` int(11) NOT NULL,
  `stock_quantidade` int(11) NOT NULL,
  `stock_prodtamanho` varchar(50) NOT NULL,
  `stock_prodpreco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `id_tamanho` int(11) NOT NULL,
  `nome_tamanho` varchar(20) NOT NULL,
  `id_categoria_tamanho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`id_tamanho`, `nome_tamanho`, `id_categoria_tamanho`) VALUES
(1, 'XS', 1),
(2, 'S', 1),
(3, 'M', 1),
(4, 'L', 1),
(5, 'XL', 1),
(6, 'XXL', 1),
(7, '38', 2),
(8, '39', 2),
(10, '40', 0),
(11, '41', 0),
(12, '42', 0),
(13, '43', 0),
(14, '44', 0),
(15, '40', 2),
(16, '41', 2),
(17, '42', 2),
(18, '43', 2),
(19, '44', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`carrinho_id`);

--
-- Indexes for table `carrinho_stock`
--
ALTER TABLE `carrinho_stock`
  ADD PRIMARY KEY (`carstock_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id_imagem`);

--
-- Indexes for table `imgcategoria`
--
ALTER TABLE `imgcategoria`
  ADD PRIMARY KEY (`id_imgcategoria`);

--
-- Indexes for table `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`paisId`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`produto_id`);

--
-- Indexes for table `publico`
--
ALTER TABLE `publico`
  ADD PRIMARY KEY (`id_publico`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `slider_texteffects`
--
ALTER TABLE `slider_texteffects`
  ADD PRIMARY KEY (`id_texteffect`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`id_tamanho`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `carrinho_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carrinho_stock`
--
ALTER TABLE `carrinho_stock`
  MODIFY `carstock_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imgcategoria`
--
ALTER TABLE `imgcategoria`
  MODIFY `id_imgcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `publico`
--
ALTER TABLE `publico`
  MODIFY `id_publico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `slider_texteffects`
--
ALTER TABLE `slider_texteffects`
  MODIFY `id_texteffect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `id_tamanho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
