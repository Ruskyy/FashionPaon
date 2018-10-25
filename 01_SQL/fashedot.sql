-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Out-2018 às 23:46
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
(8, 'Proident iste nostru', 'Pa$$w0rd!', 'Cameran Mclaughlin', 'Nita Barker', '2016-01-25', 'Anim ex numquam ratione est laboris ut voluptas quia eaque labore animi ratione id', '2345-123', 0, 0, 0, 'suvofyxuza@mailinator.com', 0, 'images/unkown.png'),
(9, 'Suscipit ex ut nihil', 'Pa$$w0rd!', 'Dale Gillespie', 'Geraldine Hendrix', '2001-08-08', 'Quidem illum enim laboriosam id quas incidunt velit', '1212-21212', 0, 152551255, 712455, 'rehudeg@mailinator.com', 0, 'images/unkown.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `produto_id` int(11) NOT NULL,
  `produto_idcategoria` int(11) NOT NULL,
  `produto_nome` varchar(50) NOT NULL,
  `produto_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_idproduto` int(11) NOT NULL,
  `stock_quantidade` int(11) NOT NULL,
  `stock_prodtamanho` int(11) NOT NULL,
  `stock_prodpreco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`produto_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

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
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
