-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 04 2023 г., 14:47
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `text`, `head_id`) VALUES
(1, 'Сколько времени занимает доставка?', 'Среднее время доставки занимает 3-7 дней. ', 2),
(2, 'Можно ли оплатить заказ сразу при оформлении его?', 'К сожалению в данный момент у наших клиентов нет возможности оплачивать заказы при оформлении. Оплата происходит непосредственно в момент получения заказа. В скором времени мы добавим дополнительный способ оплаты.', 2),
(3, 'Таблица размеров', 'Делая покупки в интернет-магазине, важно не ошибиться с выбором размера. В мировой индустрии моды существует множество различных обозначений размерного ряда, в которых легко запутаться.  Для того, чтобы вам было проще выбрать размер, в карточках товаров представлены измерения одежды, обуви и аксессуаров: длина изделия, длина рукава, ширина рукава, длина шагового шва, обхват, глубина и т.д. Мы поможем вам правильно сделать замеры перед покупкой.', 4),
(4, 'Как правильно снять мерки?', 'Посадка изделия зависит от её кроя и фасона. Будьте внимательны!', 4),
(5, 'Unifflo', 'Компания “Unifflo” основана в 2021 году. Она объединяет большое количество самых стильных и качественных брендов. Стратегия развития компании направлена на устойчивую моду и удобство. Отличающей чертой является то, что мы не стремимся удешевить производство и отдать коллекции на отшив подрядчикам в Китай. Unifflo совмещает в себе как спокойные повседневные модели с неформальными деталями, так и неординарные и яркие вещи. В коллекциях Unifflo много базовых моделей и вневременных трендов — классические юбки миди, шотландские юкби, джинсовые и готические изделия.', 1),
(6, 'LOEWE', 'Джонатану Андерсону, кажется, очень понравились экспериментальные форматы презентаций — и он не устает придумывать новые варианты и удивлять свою аудиторию, В этот раз новую коллекцию Loewe он\r\nпоказал в виде большого альбома, в котором перемежаются снимки фотографа Дэвида Симса и работы\r\nхудожника Флориана Кревера, которого Андерсон считает «самым талантливым в его поколении». Сама\r\nколлекция посвящена клубной культуре — это те вещи, которые Андерсон мечтает увидеть на посетителях вечеринок, когда наконец они соберутся в клубах после пандемии. Неон, анималистичные принты, вещи без гендерных ярлыков, экологичные материалы вроде кактусовой кожи и столь любимые дизайнером ремесленные техники смешиваются в причудливый коктейль, который уже не терпится попробовать.', 6),
(7, 'PRADA', 'Над коллекциями Prada вместе с Миуччей Прадой продолжает работать Раф Симонс, и становится очевидно,\r\n что этот творческий союз только крепнет. Дизайнеры раскрывают свои лучшие умения: Прада отвечает за сдержанную, но очень актуальную посадку вещей, Симонс экспериментирует с силуэтом — поэтому в коллекции мы видим баланс из ультракоротких шорт-юбок и ладно скроенных жакетов, графичных принтов и насыщенного цвета, архитектурных панам и рубашек с кракенами на спине. А еще сильной стороной Prada\r\nбыло и остается внимание к деталям. Треугольные кармашки с логотипом прямо на удлиненной задней\r\nчасти панамы, в ней же — прорези для дужек очков (кто сказал, что носить очки поверх головного убора — дурной тон?) и сумки, напоминающие непромокаемые дайверские мешки, — все это создает цельную картину о столь долгожданном отдыхе на море.', 6),
(8, 'STREET STYLE', 'Стритстайл на Неделе мужской моды осень-зима 2022 в МиланеУлицы итальянской столицы моды вновь\r\nпестрят всеми цветами радуги. На показы Zegna, Alyx, Dolce & Gabbana, Prada, Fendi и других модных\r\nДомов съехались редакторы, модели, блогеры и даже футболисты национальных сборных, а Асиель,\r\nфотограф Vogue и создательница Style Du Monde, ловит самых ярких из них в объектив своей камеры.', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `articles_heads`
--

CREATE TABLE `articles_heads` (
  `id` int UNSIGNED NOT NULL,
  `head` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles_heads`
--

INSERT INTO `articles_heads` (`id`, `head`) VALUES
(1, 'О нас'),
(2, 'Вопросы и ответы'),
(4, 'Гид по размерам'),
(6, 'Показы мод');

-- --------------------------------------------------------

--
-- Структура таблицы `articles_photos`
--

CREATE TABLE `articles_photos` (
  `id` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles_photos`
--

INSERT INTO `articles_photos` (`id`, `photo`, `article_id`) VALUES
(1, 'http://myshop/upload/helps/Таблица размеров.jpg', 3),
(2, 'http://myshop/upload/helps/Снять мерки.jpg', 4),
(3, 'http://myshop/upload/показ LOEWE/1.jpg', 6),
(4, 'http://myshop/upload/показ LOEWE/2.jpg', 6),
(5, 'http://myshop/upload/показ LOEWE/3.jpg', 6),
(6, 'http://myshop/upload/показ LOEWE/4.jpg', 6),
(7, 'http://myshop/upload/показ LOEWE/5.jpg', 6),
(8, 'http://myshop/upload/показ PRADA/1.jpg', 7),
(9, 'http://myshop/upload/показ PRADA/2.jpg', 7),
(10, 'http://myshop/upload/показ PRADA/3.jpg', 7),
(11, 'http://myshop/upload/показ PRADA/4.jpg', 7),
(12, 'http://myshop/upload/показ PRADA/5.jpg', 7),
(13, 'http://myshop/upload/показ StreetStyle/1.jpg', 8),
(14, 'http://myshop/upload/показ StreetStyle/2.jpg', 8),
(15, 'http://myshop/upload/показ StreetStyle/3.jpg', 8),
(16, 'http://myshop/upload/показ StreetStyle/4.jpg', 8),
(17, 'http://myshop/upload/показ StreetStyle/5.jpg', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `baskets`
--

INSERT INTO `baskets` (`id`, `quantity`, `product_id`, `size_id`, `user_id`) VALUES
(21, 2, 4, 2, 3),
(36, 1, 4, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Челябинск');

-- --------------------------------------------------------

--
-- Структура таблицы `collections`
--

CREATE TABLE `collections` (
  `id` bigint UNSIGNED NOT NULL,
  `main_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `collections`
--

INSERT INTO `collections` (`id`, `main_photo`, `name`, `description`) VALUES
(1, 'http://myshop/upload/casual_fashion.jpg', 'casual fashion', 'Если вы любите удобные, стильные вещи, то повседневная мода должна прийтись вам по вкусу'),
(3, 'http://myshop/upload/gothic_vibes.jpg', 'gothic vibes', 'Черный цвет, рваные линии, утонченность и опасность - вот, что содержит в себе коллекция \"Готические вайбы\"'),
(7, 'http://myshop/upload/scottish_style.jpg', 'scottish style', 'Клетчатая ткань, плиссированные юбки и вдали звуки волынки...о чем еще можно мечтать?');

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

CREATE TABLE `materials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`id`, `name`) VALUES
(1, 'хлопок'),
(2, 'джинса'),
(3, 'полиэстер'),
(6, 'Сталь'),
(7, '');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `cancel_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_type` enum('карта','наличные') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `point_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `cancel_reason`, `pay_type`, `status_id`, `user_id`, `point_id`) VALUES
(9, '2023-03-27 16:08:27', '2023-03-27 16:08:27', NULL, 'карта', 4, 2, 14),
(10, '2023-03-29 20:46:31', '2023-03-31 11:55:38', 'Апрор ываправывап ваы', 'карта', 5, 2, 16),
(11, '2023-03-31 10:29:19', '2023-03-31 11:34:43', NULL, 'карта', 2, 2, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders_products`
--

INSERT INTO `orders_products` (`id`, `quantity`, `order_id`, `product_id`, `size_id`) VALUES
(10, 1, 9, 8, 1),
(11, 1, 10, 4, 2),
(12, 1, 11, 4, 2),
(13, 1, 11, 8, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `points`
--

CREATE TABLE `points` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_time` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `points`
--

INSERT INTO `points` (`id`, `name`, `work_time`, `city_id`) VALUES
(12, 'улица Горького, 5', '9:00-21:00', 1),
(13, 'улица Агалакова, 66', '10:00-21:00', 1),
(14, 'улица Аношкина, 8', '10:00-21:00', 1),
(15, 'проспект Ленина, 14', '10:00-21:00', 1),
(16, 'Новороссийская улица, 86', '9:00-21:00', 1),
(17, 'Комсомольский проспект, 33', '11:00-21:00', 1),
(18, 'улица 250-летия Челябинска, 17', '10:00-21:00', 1),
(19, 'улица Братьев Кашириных, 10А', '10:00-21:00', 1),
(20, 'Свердловский проспект, 86', '10:00-21:00', 1),
(21, 'Салютная улица, 21', '10:00-21:00', 1),
(22, 'улица Зыкова, 23', '10:00-21:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `count` int NOT NULL,
  `product_position_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`count`, `product_position_id`, `size_id`) VALUES
(1, 2, 2),
(2, 2, 4),
(5, 4, 2),
(3, 5, 2),
(9, 5, 3),
(5, 5, 4),
(2, 6, 1),
(4, 6, 2),
(2, 8, 1),
(2, 8, 2),
(5, 30, 3),
(5, 30, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `products_positions`
--

CREATE TABLE `products_positions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `material_id` bigint UNSIGNED NOT NULL,
  `collection_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products_positions`
--

INSERT INTO `products_positions` (`id`, `name`, `description`, `photo`, `price`, `created_at`, `material_id`, `collection_id`) VALUES
(1, 'LOEWE', 'Свободная юбка для мужчин в классическом стиле', 'http://myshop/upload/loewe.jpg', '2436', '2023-03-15 09:03:13', 1, 1),
(2, 'INCERUN', 'Мужская лоскутная юбка с эластичной талией', 'http://myshop/upload/1680515263_incerun.webp', '1239', '2023-03-14 00:00:00', 1, 3),
(4, 'TIGO', 'Дизайнерская юбка-трапеция с карманами', 'http://myshop/upload/1680515231_tigo.webp', '3575', '2023-03-01 00:00:00', 3, 3),
(5, 'MORUFE', 'Винтажная юбка в шотландском стиле с карманами и плиссировкой', 'http://myshop/upload/morufe.jpg', '817', '2023-03-09 09:04:09', 2, 3),
(6, 'MIMITO', 'Полосатая юбка на пуговицах в уличном стиле', 'http://myshop/upload/mimito.webp', '896', '2023-03-15 00:00:00', 3, 1),
(8, 'RUNNICE', 'Юбка с запахом до колена', 'http://myshop/upload/runnice.jpg', '908', '2023-03-06 00:00:00', 3, 3),
(30, 'CAGUNO', 'Клетчатая юбка в комплекте с кожаной сумкой', 'http://myshop/upload/caguno.jpg', '1200', '2023-03-31 11:10:38', 1, 7),
(31, 'NOTGUILTY', 'Шотландская юбка из плотной ткани', 'http://myshop/upload/notguilty.jpg', '890', '2023-03-31 00:00:00', 2, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'администратор'),
(2, 'клиент'),
(3, 'суперадминистратор');

-- --------------------------------------------------------

--
-- Структура таблицы `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `value` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sizes`
--

INSERT INTO `sizes` (`id`, `value`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'новый'),
(2, 'подтвержденный'),
(4, 'завершенный'),
(5, 'отмененный');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `email`, `password`, `role_id`) VALUES
(1, 'Анастасия', 'Холзунова', 'nasty', 'holzunovaa@yandex.ru', '$2y$10$tAfO/hUMJ1A0c4lXh6KMYue/JtJD8yPEtdvDFx8cCre66ZGKaB.qW', 3),
(2, 'Виталий', 'Михайлов', 'vitalik', 'vat@mail.ru', '$2y$10$Xoy3V.8roY7w.VFR6OPf3evnFuYKxZp/trZs2CLrhbqcFHHbEtKM.', 1),
(3, 'Виктор', 'Костин', 'viktor', 'vika@mail.ru', '$2y$10$.8nmYKoZFjPIzKHOQVi7oumDI949jFoR0E7KU.BgSvs7Q1kl/5OWG', 2),
(4, 'Александр', 'Солодченков', 'sasha', 'mb@g.s', '$2y$10$wupp6.3fQQtOaI2zF6OBCeD1rknmHgEAExFzBsDxc8YnXe9erFZMu', 2),
(5, 'Елизавета', 'Борисова', 'ebori', 'mb@g.s', '$2y$10$1cmVX8rqBzWvVCDycYhOC.Zm8S65nhbkZ4inzWg.CSPIYqgW7liYe', 2),
(6, 'Наталья', 'Костина', 'nata', 'rtyu@yijm.fjd', '$2y$10$wSGh51.P7hapbpaabSVfZ.4ok2c70FtzIIICr/cHb.avP9TFePXDu', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `head_id` (`head_id`);

--
-- Индексы таблицы `articles_heads`
--
ALTER TABLE `articles_heads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles_photos`
--
ALTER TABLE `articles_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`,`size_id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `point_id` (`point_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`,`size_id`);

--
-- Индексы таблицы `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_position_id`,`size_id`),
  ADD KEY `size_product_id` (`size_id`);

--
-- Индексы таблицы `products_positions`
--
ALTER TABLE `products_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `collection_id` (`collection_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `articles_heads`
--
ALTER TABLE `articles_heads`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `articles_photos`
--
ALTER TABLE `articles_photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `products_positions`
--
ALTER TABLE `products_positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`head_id`) REFERENCES `articles_heads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `articles_photos`
--
ALTER TABLE `articles_photos`
  ADD CONSTRAINT `articles_photos_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `baskets_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baskets_ibfk_3` FOREIGN KEY (`product_id`,`size_id`) REFERENCES `products` (`product_position_id`, `size_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`point_id`) REFERENCES `points` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`product_id`,`size_id`) REFERENCES `products` (`product_position_id`, `size_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_position_id`) REFERENCES `products_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products_positions`
--
ALTER TABLE `products_positions`
  ADD CONSTRAINT `products_positions_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_positions_ibfk_2` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
