-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 29 2023 г., 16:44
-- Версия сервера: 5.7.39-log
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `teststore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Category1'),
(2, 'Category2'),
(3, 'Category3');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `image_path`, `data`, `category_id`) VALUES
(1, 'Ноутбук Acer Aspire 7 A715', '22945.00', 'image/1image.jpg', '2021-02-23', 1),
(2, 'Ноутбук Acer Aspire 8 A545', '29945.00', 'image/2image.jpg', '1502-06-21', 1),
(3, 'Ноутбук Samsung Aspire 8 A545', '32945.00', 'image/3image.jpg', '2004-09-21', 1),
(4, 'Ноутбук Samsung Aspire 8 A545', '33955.00', 'image/4image.jpg', '2004-05-21', 1),
(5, 'Ноутбук Asus 6 A545', '43955.00', 'image/5image.jpg', '2006-09-21', 1),
(6, 'Ноутбук Dell  A525', '4955.00', 'image/6image.jpg', '2014-09-21', 1),
(7, 'Ноутбук Trell 89', '21546.00', 'image/7image.jpg', '2001-09-21', 1),
(8, 'Ноутбук Pass 569', '52955.00', 'image/8image.jpg', '2004-01-06', 2),
(9, 'Ноутбук Lkss 69', '2255.00', 'image/9image.jpg', '2004-05-21', 2),
(10, 'Ноутбук GTFs 245', '12255.00', 'image/10image.jpg', '2002-07-15', 2),
(11, 'Ноутбук JHY 632', '12345.00', 'image/11image.jpg', '2003-11-21', 2),
(12, 'Ноутбук TYRE 6', '66321.00', 'image/12image.jpg', '2013-06-12', 2),
(13, 'Ноутбук LKOU 354', '85211.00', 'image/13image.jpg', '2009-08-15', 2),
(14, 'Ноутбук ASDF 693', '25211.00', 'image/14image.jpg', '2009-03-05', 2),
(15, 'Ноутбук UIKJ 231', '21251.00', 'image/15image.jpg', '2003-08-12', 3),
(16, 'Ноутбук UYU 21', '65421.00', 'image/16image.jpg', '2006-08-01', 3),
(17, 'Ноутбук IKJ 231', '22251.00', 'image/17image.jpg', '1994-09-21', 3),
(18, 'Ноутбук OIUY lj1', '26351.00', 'image/18image.jpg', '1999-09-21', 3),
(19, 'Ноутбук uhgjh 24', '25351.00', 'image/19image.jpg', '1996-09-21', 3),
(20, 'Ноутбук Apple 231', '121251.00', 'image/20image.jpg', '1997-09-21', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_category` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
