-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 21 oct. 2019 à 11:46
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fashedot`
--

DELIMITER $$
--
-- Procédures
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
-- Structure de la table `ad_encomendas`
--

CREATE TABLE `ad_encomendas` (
  `ad_encomendas_id` int(11) NOT NULL,
  `ad_encomendas_preco` varchar(150) NOT NULL,
  `ad_encomendas_quantidades` int(11) NOT NULL,
  `ad_encomendas_data` varchar(100) NOT NULL,
  `ad_encomendas_estado` int(11) NOT NULL,
  `ad_encomendas_id_tabela` int(11) NOT NULL,
  `ad_encomendas_tabela` int(11) NOT NULL,
  `ad_encomendas_datafim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ad_encomendas`
--

INSERT INTO `ad_encomendas` (`ad_encomendas_id`, `ad_encomendas_preco`, `ad_encomendas_quantidades`, `ad_encomendas_data`, `ad_encomendas_estado`, `ad_encomendas_id_tabela`, `ad_encomendas_tabela`, `ad_encomendas_datafim`) VALUES
(2, '10€', 1, '2019/04/11 14:28:08', 3, 1, 1, '2019/04/11 14:33:08'),
(3, '20€', 2, '2019/04/11 15:14:38', 3, 1, 1, '2019/04/11 15:19:38'),
(4, '10€', 1, '2019/04/12 10:18:12', 3, 1, 1, '2019/04/12 10:23:12'),
(5, '36€', 3, '2019/04/30 15:45:10', 0, 2, 1, '2019/04/30 15:50:10'),
(6, '24€', 2, '2019/05/03 9:46:22', 0, 2, 1, '2019/05/03 11:27:22'),
(7, '30€', 3, '2019/05/03 11:36:12', 0, 1, 1, '2019/05/03 11:37:12'),
(8, '90€', 9, '2019/05/03 13:41:51', 0, 1, 1, '2019/05/03 13:46:51'),
(9, '48€', 4, '2019/05/03 13:59:50', 0, 2, 1, '2019/05/03 14:04:50'),
(10, '10€', 1, '2019/05/03 14:09:21', 0, 1, 1, '2019/05/03 14:14:21'),
(11, '12€', 1, '2019/05/03 14:09:24', 0, 2, 1, '2019/05/03 14:14:24'),
(12, '10€', 1, '2019/05/03 14:19:46', 0, 1, 1, '2019/05/03 14:24:46'),
(13, '24€', 2, '2019/06/06 13:11:33', 0, 2, 1, '2019/06/06 13:21:33'),
(14, '20€', 2, '2019/06/19 16:35:18', 0, 1, 1, '2019/06/19 16:45:18'),
(15, '50€', 5, '2019/06/26 10:13:16', 0, 1, 1, '2019/06/26 10:23:16'),
(16, '300€', 30, '2019/06/26 10:13:26', 0, 1, 1, '2019/06/26 10:23:26'),
(17, '10€', 1, '2019/06/26 11:01:01', 0, 1, 1, '2019/06/26 11:11:01'),
(18, '240€', 16, '2019/06/26 15:21:08', 0, 3, 1, '2019/06/26 15:31:08'),
(19, '60€', 5, '2019/08/27 15:25:29', 0, 2, 1, '2019/08/27 15:35:29'),
(20, '30€', 2, '2019/10/17 13:01:30', 0, 3, 1, '2019/10/17 13:11:30'),
(21, '15€', 1, '2019/10/17 13:09:48', 3, 3, 1, '2019/10/17 13:19:48'),
(25, '12€', 1, '2019/10/18 11:46:24', 3, 2, 1, '2019/10/18 11:56:24'),
(26, '10€', 1, '2019/10/18 13:54:44', 3, 1, 1, '2019/10/18 14:04:44'),
(27, '40€', 1, '2019/10/18 14:18:48', 3, 4, 1, '2019/10/18 14:18:53');

-- --------------------------------------------------------

--
-- Structure de la table `ad_notification`
--

CREATE TABLE `ad_notification` (
  `ad_notification_id` int(11) NOT NULL,
  `ad_notification_tipo` int(11) NOT NULL,
  `ad_notification_content` varchar(150) NOT NULL,
  `ad_notification_estado` int(11) NOT NULL,
  `ad_notification_tabela` int(11) NOT NULL,
  `ad_notification_idtabela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ad_notification`
--

INSERT INTO `ad_notification` (`ad_notification_id`, `ad_notification_tipo`, `ad_notification_content`, `ad_notification_estado`, `ad_notification_tabela`, `ad_notification_idtabela`) VALUES
(1, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 5),
(2, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 6),
(3, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 7),
(4, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 8),
(5, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 9),
(6, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 10),
(7, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 11),
(8, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 12),
(9, 3, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi cancelada.', 0, 2, 9),
(10, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 13),
(11, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 14),
(12, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 15),
(13, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 16),
(14, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 17),
(15, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 18),
(16, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 19),
(17, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 20),
(18, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 21),
(19, 3, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi cancelada.', 0, 2, 21),
(20, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 22),
(21, 3, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi cancelada.', 0, 2, 22),
(25, 3, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi cancelada.', 0, 2, 24),
(26, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 25),
(27, 3, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi cancelada.', 0, 2, 25),
(28, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 26),
(29, 3, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi cancelada.', 0, 2, 26),
(30, 1, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi entregue agora ao armazem.', 0, 2, 27),
(31, 3, 'A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi cancelada.', 0, 2, 27);

-- --------------------------------------------------------

--
-- Structure de la table `ad_notify`
--

CREATE TABLE `ad_notify` (
  `ad_notify_id` int(11) NOT NULL,
  `ad_notify_tabela` int(11) NOT NULL,
  `ad_notify_idtabela` int(11) NOT NULL,
  `ad_notify_tabela_2` int(11) NOT NULL,
  `ad_notify_idtabela_2` int(11) NOT NULL,
  `ad_notify_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ad_tabelas`
--

CREATE TABLE `ad_tabelas` (
  `ad_tabelas_id` int(11) NOT NULL,
  `ad_tabelas_nome` varchar(150) NOT NULL,
  `ad_tabelas_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ad_tabelas`
--

INSERT INTO `ad_tabelas` (`ad_tabelas_id`, `ad_tabelas_nome`, `ad_tabelas_num`) VALUES
(1, 'stock', 1),
(2, 'ad_encomendas', 2),
(4, 'produto', 3),
(5, 'marca', 4),
(6, 'sock', 5),
(7, 'imagem', 6),
(8, 'ad_notify', 7);

-- --------------------------------------------------------

--
-- Structure de la table `carrinho`
--

CREATE TABLE `carrinho` (
  `carrinho_id` int(11) NOT NULL,
  `carrinho_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `carrinho_stock`
--

CREATE TABLE `carrinho_stock` (
  `carstock_id` int(11) NOT NULL,
  `carstock_idcarrinho` int(11) NOT NULL,
  `carstock_idproduto` int(11) NOT NULL,
  `carstock_quantproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nome`) VALUES
(1, 'Roupa'),
(2, 'Calçado'),
(3, 'Acessórios');

-- --------------------------------------------------------

--
-- Structure de la table `cliente`
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
-- Déchargement des données de la table `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `cliente_username`, `cliente_password`, `cliente_nome`, `cliente_apelido`, `cliente_datanasc`, `cliente_morada`, `cliente_codigopostal`, `cliente_idpais`, `cliente_nif`, `cliente_tele`, `cliente_email`, `cliente_tipo`, `cliente_img_path`) VALUES
(11, 'teste1', 'e959088c6049f1104c84c9bde5560a13', 'Goncalo', 'Lavrador', '2017-10-26', 'Sapiente quia et laboriosam occaecat in porro enim eum ullamco et consequatur dicta esse', '34-86', 0, 75, 47, 'goxyhosi@mailinator.net', 0, ''),
(12, 'teste2', '38851536d87701d2191990e24a7f8d4e', 'Nilton', 'Fontes', '2011-08-16', 'Harum eaque consequatur Omnis asperiores', '36-3', 0, 98, 26, 'jidesot@mailinator.com', 0, 'images/uploads/ZW3lc87l2syaeqeb8ja1qyUal4WELCXipBf9h8y033btKj845wPVQdLIvepbKP2lDkdLxZd7VSMbvBCzPgYN1VCxCwlaFdrWdnPQ.jpg'),
(13, 'dsa', '202cb962ac59075b964b07152d234b70', 'das', 'asd', '0000-00-00', 'das/123', '1232-123', 1, 2147483647, 123123123, 'dsa@gmail.com', 1, 'images/unknown.png');

-- --------------------------------------------------------

--
-- Structure de la table `desconto`
--

CREATE TABLE `desconto` (
  `Desconto_id` int(11) NOT NULL,
  `Desconto_nome` varchar(150) NOT NULL,
  `Desconto_descricao` varchar(150) NOT NULL,
  `Desconto_quantidade` int(11) NOT NULL,
  `Desconto_genero` int(11) NOT NULL,
  `Desconto_categoria` int(11) NOT NULL,
  `Desconto_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `imagem`
--

CREATE TABLE `imagem` (
  `id_imagem` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_imgcategoria` int(11) NOT NULL,
  `nome_imagem` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `imagem`
--

INSERT INTO `imagem` (`id_imagem`, `id_produto`, `id_imgcategoria`, `nome_imagem`) VALUES
(1, 2, 2, 'images/uploads/e2j9u1pDwu0NEXrOFhzAuqcOL1jkIuK83Z6fPmzqALuvYDtaXr7D7JVqbkzCtDilRZqotPz5mDOCGSb8W9aTMLnFUAsnM5wcS7N7.png'),
(2, 3, 3, 'images/uploads/FdYg28zM0qDbZGeDvlZdtQMlay79dDYZ8KfelKwKobQ5slb9jhmnAFX3wNdFxhFMk0FgB2WyXwbOCx5dsIc619cDY32icYe0y310.png'),
(3, 3, 1, 'images/uploads/843LGYB2oruD8NJPyCBOWRszCOXX3Nhf7KWjVXTEgcq5eP2uJ8tiWjwMxzP2sgWCwexkPghDBkEGky8Y0G8LD8Qf1EYj2W0lJLtl.png');

-- --------------------------------------------------------

--
-- Structure de la table `imgcategoria`
--

CREATE TABLE `imgcategoria` (
  `id_imgcategoria` int(11) NOT NULL,
  `nome_imgcategoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `imgcategoria`
--

INSERT INTO `imgcategoria` (`id_imgcategoria`, `nome_imgcategoria`) VALUES
(1, 'principal'),
(2, 'icon'),
(3, 'galeria');

-- --------------------------------------------------------

--
-- Structure de la table `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `prod_marca_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nome_marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nome_marca`) VALUES
(1, 'Average'),
(2, 'Hugo Employee'),
(3, 'Coentros'),
(4, 'Mara'),
(5, 'Y&Z'),
(6, 'Clean Girl'),
(7, 'Luis Vitor'),
(8, 'Gutchy'),
(9, 'Intimisimisimisimisimi'),
(10, 'Aclidas'),
(11, 'Nlke'),
(12, 'PacoRoubbame'),
(13, 'Timberlinde');

-- --------------------------------------------------------

--
-- Structure de la table `mes`
--

CREATE TABLE `mes` (
  `mes_id` int(11) NOT NULL,
  `mes_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mes`
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
-- Structure de la table `paises`
--

CREATE TABLE `paises` (
  `paisId` int(11) NOT NULL,
  `paisNome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paises`
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
-- Structure de la table `parallax`
--

CREATE TABLE `parallax` (
  `id` int(11) NOT NULL,
  `img_path` varchar(150) NOT NULL,
  `first_line` varchar(35) NOT NULL,
  `second_line` varchar(35) NOT NULL,
  `btn` int(11) NOT NULL,
  `btn_text` varchar(15) NOT NULL,
  `btn_video` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `parallax`
--

INSERT INTO `parallax` (`id`, `img_path`, `first_line`, `second_line`, `btn`, `btn_text`, `btn_video`) VALUES
(1, 'img/parallax/parallax.jpg', 'hehe', 'Im chinese and i can see you', 1, 'Play Video', 'https://www.youtube.com/embed/RV5jJrv2kjY?rel=0&amp;showinfo=0');

-- --------------------------------------------------------

--
-- Structure de la table `produto`
--

CREATE TABLE `produto` (
  `produto_id` int(11) NOT NULL,
  `produto_idcategoria` int(11) NOT NULL,
  `produto_nome` varchar(50) NOT NULL,
  `produto_idmarca` int(11) NOT NULL,
  `produto_desc` varchar(100) NOT NULL,
  `id_publico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produto`
--

INSERT INTO `produto` (`produto_id`, `produto_idcategoria`, `produto_nome`, `produto_idmarca`, `produto_desc`, `id_publico`) VALUES
(2, 1, 'ssw', 0, 'ss', 1),
(3, 1, 'ttt', 0, 'tt', 1),
(4, 3, 'zx', 0, 'afgfgnfgtregn', 3),
(5, 2, 'cxv', 0, 'zcxczxc', 1),
(6, 3, 'xx', 0, '<zx', 3),
(7, 3, 'vc', 0, '', 3),
(8, 2, 'czx', 0, 'czx', 2);

-- --------------------------------------------------------

--
-- Structure de la table `publico`
--

CREATE TABLE `publico` (
  `id_publico` int(11) NOT NULL,
  `nome_publico` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publico`
--

INSERT INTO `publico` (`id_publico`, `nome_publico`) VALUES
(1, 'Homem'),
(2, 'Mulher'),
(3, 'Unisexo');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
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
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`id_slide`, `slide_state`, `image_slide`, `title_slide`, `title_effect`, `title_anim`, `desc_slide`, `desc_anim`, `button_slide`, `button_text`, `buton_anim`, `button_link`) VALUES
(5, 0, 'images/slider/8WH71sWnUs2WPNM4FhohGb9JieZ3NUyndUoP8p4cTYvoUVVm9UGkOVegple1hvy9pDhUM3m9U0oei4sTBAzhqYJQe5SMIiPYsOry.jpg', 'Langerie', 'bo4', 'bounce', 'Sem butao', 'bounce', 'off', '', 'bounce', ''),
(6, 0, 'images/slider/8WH71sWnUs2WPNM4FhohGb9JieZ3NUyndUoP8p4cTYvoUVVm9UGkOVegple1hvy9pDhUM3m9U0oei4sTBAzhqYJQe5SMIiPYsOry.jpg', 'Langerie', 'bo4', 'bounce', 'Sem butao', 'bounce', 'off', '', 'bounce', ''),
(7, 1, 'images/slider/nC72yzDMTcSbzD6LUdHHQ3YIyJMG2gc5UMUQXATsHbUfl3B8PyOyDYudf9tbwO1UKChp0bE2D40i83zbnGg6BZCEDiCPizgk0UQ3.jpg', 'Novo Slider', 'bo6', 'fadeInUp', 'Este é dinamico !', 'fadeInDown', 'on', 'OLHA UM BUTAO', 'zoomIn', '');

-- --------------------------------------------------------

--
-- Structure de la table `slider_texteffects`
--

CREATE TABLE `slider_texteffects` (
  `id_texteffect` int(11) NOT NULL,
  `code_texteffect` varchar(50) NOT NULL,
  `desc_texteffect` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `slider_texteffects`
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
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_idproduto` int(11) NOT NULL,
  `stock_quantidade` int(11) NOT NULL,
  `stock_prodtamanho` varchar(50) NOT NULL,
  `stock_prodpreco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_idproduto`, `stock_quantidade`, `stock_prodtamanho`, `stock_prodpreco`) VALUES
(1, 2, 49, '3', 10),
(2, 2, 12, '2', 12),
(3, 3, 18, '3', 15),
(4, 4, 0, '20', 40);

-- --------------------------------------------------------

--
-- Structure de la table `tamanho`
--

CREATE TABLE `tamanho` (
  `id_tamanho` int(11) NOT NULL,
  `nome_tamanho` varchar(20) NOT NULL,
  `id_categoria_tamanho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tamanho`
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
(16, '41', 2),
(17, '42', 2),
(18, '43', 2),
(19, '44', 2),
(20, '15mm', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ad_encomendas`
--
ALTER TABLE `ad_encomendas`
  ADD PRIMARY KEY (`ad_encomendas_id`);

--
-- Index pour la table `ad_notification`
--
ALTER TABLE `ad_notification`
  ADD PRIMARY KEY (`ad_notification_id`);

--
-- Index pour la table `ad_notify`
--
ALTER TABLE `ad_notify`
  ADD PRIMARY KEY (`ad_notify_id`);

--
-- Index pour la table `ad_tabelas`
--
ALTER TABLE `ad_tabelas`
  ADD PRIMARY KEY (`ad_tabelas_id`);

--
-- Index pour la table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`carrinho_id`);

--
-- Index pour la table `carrinho_stock`
--
ALTER TABLE `carrinho_stock`
  ADD PRIMARY KEY (`carstock_id`);

--
-- Index pour la table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Index pour la table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Index pour la table `desconto`
--
ALTER TABLE `desconto`
  ADD PRIMARY KEY (`Desconto_id`);

--
-- Index pour la table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id_imagem`);

--
-- Index pour la table `imgcategoria`
--
ALTER TABLE `imgcategoria`
  ADD PRIMARY KEY (`id_imgcategoria`);

--
-- Index pour la table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Index pour la table `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`paisId`);

--
-- Index pour la table `parallax`
--
ALTER TABLE `parallax`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`produto_id`);

--
-- Index pour la table `publico`
--
ALTER TABLE `publico`
  ADD PRIMARY KEY (`id_publico`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slide`);

--
-- Index pour la table `slider_texteffects`
--
ALTER TABLE `slider_texteffects`
  ADD PRIMARY KEY (`id_texteffect`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Index pour la table `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`id_tamanho`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ad_encomendas`
--
ALTER TABLE `ad_encomendas`
  MODIFY `ad_encomendas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `ad_notification`
--
ALTER TABLE `ad_notification`
  MODIFY `ad_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `ad_notify`
--
ALTER TABLE `ad_notify`
  MODIFY `ad_notify_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ad_tabelas`
--
ALTER TABLE `ad_tabelas`
  MODIFY `ad_tabelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `carrinho_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `carrinho_stock`
--
ALTER TABLE `carrinho_stock`
  MODIFY `carstock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `desconto`
--
ALTER TABLE `desconto`
  MODIFY `Desconto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `imgcategoria`
--
ALTER TABLE `imgcategoria`
  MODIFY `id_imgcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `parallax`
--
ALTER TABLE `parallax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produto`
--
ALTER TABLE `produto`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `publico`
--
ALTER TABLE `publico`
  MODIFY `id_publico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `slider_texteffects`
--
ALTER TABLE `slider_texteffects`
  MODIFY `id_texteffect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `id_tamanho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
