-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Jul-2023 às 04:28
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `skatrex`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(128) NOT NULL,
  `category_description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Calçado', 'Categoria onde tem calçados para si'),
(2, 'Acessórios', 'Categoria onde tem acessórios para si'),
(3, 'Skates', 'Categoria onde tem skates para si'),
(4, 'Roupas', 'Categoria onde tem roupas para si');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_address` varchar(256) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `prod_name` varchar(128) NOT NULL,
  `prod_price` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `stock` int(64) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`prod_id`, `category_id`, `prod_name`, `prod_price`, `img`, `stock`, `create_date`) VALUES
(1, 1, 'DC SHOES MANUAL LE ELASTIC LACE SHOES KIDS', 49.99, 'DcShoesManualPreto.JPG', 5, '2023-01-07'),
(2, 1, 'DC SHOES CRISIS 2 SKATE SHOES', 79.99, 'DcShoesCrisisPreto.JPG', 10, '2023-01-07'),
(3, 1, 'DC SHOES PURE KIDS', 49.99, 'DcShoesPure.JPG', 10, '2023-01-07'),
(4, 1, 'VANS BERLE PRO', 94.99, 'VansBerleProPreto.JPG', 5, '2023-01-07'),
(5, 1, 'CARIUMA THE BERRICS', 119.99, 'CariumaTheBerrics.JPG', 10, '2023-01-07'),
(6, 2, 'VANS BY CLASSIC PATCH HAT', 19.99, 'VansClassicHat.JPG', 7, '2023-01-07'),
(7, 2, 'VISSLA DAGGER HAT', 34.99, 'VisslaDaggerHat.JPG', 2, '2023-01-07'),
(8, 2, 'DC UPROAR GOLFER CLIPBACK HAT', 29.99, 'DcUproarGolferHat.JPG', 6, '2023-01-07'),
(9, 2, 'CARHARTT PLAINS BUCKET HAT', 49.99, 'CarharttBucketHat.JPG', 2, '2023-01-07'),
(10, 2, 'CARHARTT JAKE SHOULDER POUCH BAG', 39.99, 'CarharttJakePouchBag.JPG', 8, '2023-01-07'),
(11, 4, 'MERGE4 PINK CAMO', 14.99, 'Merger4PinkCamo.JPG', 13, '2023-01-07'),
(12, 4, 'MERGE4 HAVEN TALL BLUE', 14.99, 'Merge4HavenTallBlue.JPG', 8, '2023-01-07'),
(13, 4, 'MERGE4 CHECK YELLOW / BLACK', 14.99, 'Merge4CheckYellowBlack.JPG', 4, '2023-01-07'),
(15, 3, 'G2 RAMONES SKATEBOARD 7.75', 129.99, 'G2RamonesSkateboard.jpg', 5, '2023-02-08'),
(16, 3, 'ELEMENT HIERO SKATEBOARD 7.75', 109.99, 'ElementHieroSkateboard.jpg', 3, '2023-02-08'),
(17, 3, 'BLIND BUST OUT REAPER WHITE SKATEBOARD 7.625', 94.99, 'BlindBustOutReaperWhite.jpg', 7, '2023-02-08'),
(18, 3, 'ENJOI CANDY COATED PINK SKATEBOARD 8.25', 94.99, 'EnjoiCandyCoatedPink.jpg', 6, '2023-02-08'),
(19, 3, 'ELEMENT FAUNA PARTY 7.75 SKATEBOARD', 109.99, 'ElementFaunaPartySkateboard.jpg', 2, '2023-02-14'),
(20, 3, 'ENJOI CREEPER MINT 8.0 SKATEBOARD', 94.99, 'EnjoiCreeperMintSkateboard.jpg', 4, '2023-02-14'),
(21, 3, 'SANTA CRUZ OBSCURE DOT MINI 7.75 SKATEBOARD', 99.99, 'SantaCruzObscureDotMiniSkateboard.jpg', 6, '2023-02-14'),
(22, 3, 'SANTA CRUZ MANDALA HAND FULL 8.0 SKATEBOARD', 99.99, 'SantaCruzMandaaHandFullSkateboard.jpg', 3, '2023-02-14'),
(23, 3, 'SANTA CRUZ FLIER HAND LARGE 8.25 SKATEBOARD', 99.99, 'SantaCruzFlierHandLargeSkateboard.jpg', 5, '2023-02-14'),
(24, 2, 'CARHARTT MADISON LOGO CAP (White)', 34.99, 'CarharttMadisonLogoCapWhite.jpg', 7, '2023-02-14'),
(25, 2, 'CARHARTT MADISON LOGO CAP (Green)', 34.99, 'CarharttMadisonLogoCapGreen.jpg', 6, '2023-02-14'),
(26, 2, 'REKD ELITE 2.0 BLACK HELMET', 44.99, 'RekdEliteBlackHelmet.jpg', 4, '2023-02-14'),
(28, 2, 'REKD ELITE 2.0 WHITE HELMET', 44.99, 'RekdEliteWhiteHelmet.jpg', 7, '2023-02-14'),
(29, 2, 'REKD JUNIOR ELITE 2.0 HELMET', 44.99, 'RekdEliteBlackHelmetJunior.jpg', 4, '2023-02-14'),
(30, 2, 'REKD JUNIOR ELITE 2.0 HELMET WHITE', 44.99, 'RekdEliteWhiteHelmetJunior.jpg', 5, '2023-02-14'),
(31, 4, 'Vans Opposite Unite', 39.99, 'Vans-OppositeUnite.jpeg', 9, '2023-07-12'),
(32, 4, 'Vans Classic Grey', 34.99, 'VansClassicGrey.jpeg', 4, '2023-07-12'),
(33, 4, 'T-Shirt Trasher Flame Logo Black', 44.99, 't-shirt_trasher_flame_black.jpg', 5, '2023-07-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `IsAdmin` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `first_name`, `last_name`, `phone_number`, `created_at`, `IsAdmin`) VALUES
(5, 'admin@gmail.com', '$2y$10$qm9smVPCWrjNHhkVohaafeAsvkXt0KoFGqHU2gbFw/KZhiOSMTurK', 'Admin', 'Test', 987654321, '0000-00-00', b'1'),
(10, 'ibecas2021@hotmail.com', '$2y$10$eGqCeTxH7OWYJ/E1nK2.deoV30yEEUJRQfmaY2OomCTLUDwxTiQ.O', 'Irene', 'Bartolo', 912798312, '0000-00-00', b'0');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `UserOrder` (`user_id`);

--
-- Índices para tabela `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_orderid` (`order_id`),
  ADD KEY `order_details_prodid` (`prod_id`);

--
-- Índices para tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Índices para tabela `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_categoryid` (`category_id`),
  ADD KEY `product_categories_prodid` (`prod_id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Emails` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `UserOrder` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Limitadores para a tabela `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_orderid` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_prodid` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`);

--
-- Limitadores para a tabela `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_categoryid` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_categories_prodid` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
