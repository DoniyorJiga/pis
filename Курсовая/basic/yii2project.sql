-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 14 2018 г., 14:03
-- Версия сервера: 5.6.41
-- Версия PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `name`, `info`, `price`, `image`) VALUES
(1, 'BMW 740', 'Спецификация GCC BMW 740, черный седан с коричневым салоном. Он ', 300000, 'https://www.dubicars.com/images/c60a09/250x141/linda-motors/ad11d914-36b2-4cd6-83fb-3fe4034a625e.jpg'),
(2, 'BMW X6 M', 'Спецификация GCC BMW X6 M с тюнером / радиоприемником, 20-дюймовые колеса и климат-контроль.', 250003, 'https://www.dubicars.com/images/4e6b92/250x141/gulf-motors/db89a312-8984-49e2-8bf3-e402168f5718.jpg'),
(3, 'Alfa Romeo Giulia', 'Автоматическая Alfa Romeo Giulia с 19-дюймовыми колесами, задний датчик парковки, ABS, красный снаружи, черный интерьер.', 400000, 'https://www.dubicars.com/images/956cb0/250x141/gargash-motors-pre-owned-cars/9d38bfbd-dc8f-429e-a2d7-f1d12d9a1f54.jpg'),
(4, 'Bentley Continental GT Millionai', 'Автоматический 2014 Bentley Continental GT с 20-дюймовыми колесами, задний датчик парковки, люк на крыше, интерьер с загарками, серый / серебристый внешний вид.', 2500000, 'https://www.dubicars.com/images/652869/250x141/gulf-motors/2cdc66bb-45f0-464b-99a2-31b99a01a998.jpg'),
(5, '14x\r\nBentley Continental GTC', 'GCC, коричневый 8-цилиндровый кабриолет с бежевым салоном. В нем есть CD-плеер и климат-контроль.', 3434432, 'https://www.dubicars.com/images/9fd746/250x141/the-elite-cars/421998df-2ca7-4063-8a72-3defed4b1e72.jpg'),
(6, 'Audi A5', 'GCC spec с 4-цилиндровым двигателем, черным салоном и автоматической коробкой передач.', 4234223, 'https://www.dubicars.com/images/a715cf/250x141/private-sellers/8cf20aa6-5bac-4867-abfb-416897d0f3a3.jpeg'),
(7, 'Спецификация Audi R8 GCC', 'Красный 2015 спортивный автомобиль для AED 240 000. Черный интерьер. В нем есть блоки питания, 20-дюймовые колеса и тюнер / радио.', 7656882, 'https://www.dubicars.com/images/f3e0cc/250x141/car-vault/be9008c7-6ca0-491d-a7c3-32d54ab23119.jpg'),
(8, 'Jaguar XJ 3.0 AWD', 'Автоматический Jaguar XJ с 20-дюймовыми колесами, CD-плеер, подушки безопасности (спереди и сбоку), черный интерьер, белый внешний вид.', 3505454, 'https://www.dubicars.com/images/162749/250x141/al-ain-class-motors-dubai/b49c3149-b2c1-4eae-b0ce-8a7aa98594a1.JPG'),
(9, 'Hummer H1 ALPHA | 2004 |', 'AED 400 000 для этого автоматического Hummer H1 с 21-дюймовыми колесами, блокировкой питания, CD-плеером, черным интерьером, белым внешним видом.', 450545, 'https://www.dubicars.com/images/af8ab8/250x141/gulf-motors/198d7816-2bb6-4096-8e04-24483012a61e.jpg'),
(10, 'Ferrari 360 Challenge Stradale', 'Ferrari 360 для AED 965 000 с множеством функций, включая спортивные сиденья, весла, тюнер / радиоприемник. Черный с загарным салоном.', 4005453, 'https://www.dubicars.com/images/7de8e8/250x141/car-vault/de340162-7d3f-4ec3-baf6-51f287d91d44.jpg'),
(11, 'Ferrari 458', 'GCC spec Ferrari 458, white convertible with red interior. It features airbags (front and side), 20 inch wheels and xenon headlights.', 4005454, 'https://www.dubicars.com/images/359131/250x141/my-car-general-trading-llc/58bac7fe-8bf6-4360-a1d9-3b373d90332f.jpg'),
(12, 'Chevrolet Sonic 2015! GCC', 'GCC spec white sedan, beige interior with premium sound system, CD player and a 4 cylinder engine.', 3505454, 'https://www.dubicars.com/images/53fb71/250x141/carbon/785a406e-0ec8-4a26-a5f8-ae3966a52b63.jpg'),
(13, 'Chevrolet Camaro LT 2017 the Fifty Edition', 'GCC spec, red 6 cylinder coupe with black interior. It has phone set and CD player.', 300544, 'https://www.dubicars.com/images/559a9e/250x141/linda-motors/635372a9-5266-49f7-95a1-69b59f95fed6.jpg'),
(14, 'Chevrolet Tahoe', 'White 2015 SUV for AED 110,000. Grey interior. It features tuner/radio, 18 inch wheels and fog lights.', 250454, 'https://www.dubicars.com/images/6859cd/250x141/111-used-cars/60e72d39-c4a6-48e5-8820-692663c203f0.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1539247361),
('m181011_083614_create_user_table', 1539247452);

-- --------------------------------------------------------

--
-- Структура таблицы `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `record`
--

INSERT INTO `record` (`id`, `s_id`, `u_id`, `count`) VALUES
(12, 11, 23, 2),
(13, 11, 23, 2),
(15, 11, 23, 2),
(16, 12, 22, 1),
(22, 13, 23, 5),
(23, 12, 24, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shopping`
--

CREATE TABLE `shopping` (
  `id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `s_name` varchar(64) NOT NULL,
  `i_id` int(11) NOT NULL,
  `min_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shopping`
--

INSERT INTO `shopping` (`id`, `o_id`, `s_name`, `i_id`, `min_price`) VALUES
(11, 19, 'Совместная покупка №1', 1, 100000),
(12, 19, 'Совместная покупка №2', 2, 150000),
(13, 19, 'Совместная покупка №3', 7, 100000),
(14, 19, 'Совместная покупка №4', 4, 70000),
(15, 19, 'Совместная покупка №5', 12, 50000),
(16, 20, 'Совместная покупка №6', 12, 50000),
(17, 20, 'Совместная покупка №7', 3, 50055),
(18, 20, 'Совместная покупка №8', 14, 700655),
(19, 20, 'Совместная покупка №9', 5, 100056),
(20, 20, 'Совместная покупка №10', 13, 750565),
(21, 24, 'adwadad', 9, 1000000),
(22, 24, 'Автомобиль 12', 9, 1000000000),
(23, 24, 'sdsdffs', 1, 111212121);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'ava0.jpg',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `avatar`, `status`, `created_at`, `updated_at`, `admin`) VALUES
(19, 'Первый Организатор Покупки', 'Oidoj86eH9_V6STw7s1HGXG-dfoNW7E3', '$2y$13$deDU4KIGVQ15ef1WVHqiluzlT2VFcvWgEXCW1TtZidfKcl9KLRege', NULL, 'admin1@ya.ru', 'unnamed.png', 10, 1540451403, 1540451403, 0),
(20, 'Второй Организатор Покупки', 'VWhW6V_-u0G9xP4v_atc2SEJwR0Nyure', '$2y$13$deDU4KIGVQ15ef1WVHqiluzlT2VFcvWgEXCW1TtZidfKcl9KLRege', NULL, 'admin2@ya.ru', 'unnamed.png', 10, 1540451435, 1540451435, 1),
(21, 'Пользователь Первый Пользователь', 'Wg1IqGY6xCPWmvesxxseWv8Jj8DMj4pj', '$2y$13$deDU4KIGVQ15ef1WVHqiluzlT2VFcvWgEXCW1TtZidfKcl9KLRege', NULL, 'user1@ya.ru', 'unnamed.png', 10, 1540451459, 1540451459, 0),
(22, 'Пользователь Второй Пользователь', 'HY5L3AndPYTy5cdQI5LzLpbsNOOV19FD', '$2y$13$deDU4KIGVQ15ef1WVHqiluzlT2VFcvWgEXCW1TtZidfKcl9KLRege', NULL, 'user2@ya.ru', 'unnamed.png', 10, 1540451484, 1540451484, 0),
(23, 'Пользователь Третий Пользователь', '5n-q1tgLOIFkRQ3RM8YKUgbE6PnN6SC8', '$2y$13$deDU4KIGVQ15ef1WVHqiluzlT2VFcvWgEXCW1TtZidfKcl9KLRege', NULL, 'user3@ya.ru', 'unnamed.png', 10, 1540459830, 1540459830, 0),
(24, 'Дониёр', 'jAKB6r1FGk73pDfZrOWb1q7K5bdGsa66', '$2y$13$bpiKyltRftq/wgT4xe4Tg.oKtLLqHAPJjkcTHf7sgt.sbcyr9rpM.', NULL, 'doniyor.jiga@mail.ru', 'Boy-PNG-Free-Download.png', 10, 1542012981, 1542012981, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users22`
--

CREATE TABLE `users22` (
  `id` int(11) NOT NULL,
  `name` varchar(26) NOT NULL,
  `email` varchar(21) NOT NULL,
  `avatar` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users22`
--

INSERT INTO `users22` (`id`, `name`, `email`, `avatar`) VALUES
(1, 'Иванов Андрей Викторович', 'ivanov@mail.ru', 'ava1.jpg'),
(2, 'Петров Сергей Петрович', 'petr87@yandex.ru', 'ava2.png'),
(3, 'Сидоров Андрей Денисович', 'sidd1993@gmail.com', 'ava3.jpg'),
(4, 'Калугин Алексей Сергеевич', 'kalugin2000@gmail.com', 'ava4.jpg'),
(5, 'Веткина Вера Александровна', 'veravetka@gmail.com', 'ava6.jpg'),
(6, 'Стах Марина Анатольевна', 'stah@ya.ru', 'ava7.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `users22`
--
ALTER TABLE `users22`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `shopping`
--
ALTER TABLE `shopping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users22`
--
ALTER TABLE `users22`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
