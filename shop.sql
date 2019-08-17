-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Aug 2019 um 18:44
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ddos_frontend`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `botshop_orders`
--

CREATE TABLE `botshop_orders` (
  `id` int(11) NOT NULL,
  `api_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `load_amount` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `botshop_orders`
--

INSERT INTO `botshop_orders` (`id`, `api_id`, `load_amount`, `user_id`, `created_at`) VALUES
(1, 'dc03e1c8e6b0aa361a8d40c24687325e', 20, '1', '2019-08-11 21:22:38'),
(2, '70422bc0ff22e364007e48c50a6a5b34', 2, '2', '2019-08-17 10:39:13'),
(3, 'ffc42b1546104b4204e62cba8e9d27ff', 20, '2', '2019-08-17 11:03:47'),
(4, 'c84d01d8c35759fd486a7db5982f5a4c', 20, '2', '2019-08-17 11:09:08');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `botshop_pricelist`
--

CREATE TABLE `botshop_pricelist` (
  `id` int(11) NOT NULL,
  `iso_short` varchar(10) DEFAULT NULL,
  `price_usd` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `botshop_pricelist`
--

INSERT INTO `botshop_pricelist` (`id`, `iso_short`, `price_usd`, `created_at`) VALUES
(1, 'mix', '0.10', '2019-08-05 18:41:48'),
(2, 'AE', '0.20', '2019-08-05 18:41:51'),
(3, 'AO', '0.20', '2019-08-05 18:41:51'),
(4, 'AR', '0.20', '2019-08-05 18:41:51'),
(5, 'BA', '0.20', '2019-08-05 18:41:51'),
(6, 'BD', '0.20', '2019-08-05 18:41:51'),
(7, 'BF', '0.20', '2019-08-05 18:41:51'),
(8, 'BG', '0.20', '2019-08-05 18:41:51'),
(9, 'BR', '0.20', '2019-08-05 18:41:51'),
(10, 'BZ', '0.20', '2019-08-05 18:41:51'),
(11, 'CL', '0.20', '2019-08-05 18:41:51'),
(12, 'CO', '0.20', '2019-08-05 18:41:51'),
(13, 'CZ', '0.40', '2019-08-05 18:41:51'),
(14, 'DE', '0.60', '2019-08-05 18:41:51'),
(15, 'DZ', '0.20', '2019-08-05 18:41:51'),
(16, 'EC', '0.20', '2019-08-05 18:41:51'),
(17, 'EG', '0.20', '2019-08-05 18:41:51'),
(18, 'ES', '0.40', '2019-08-05 18:41:51'),
(19, 'ET', '0.20', '2019-08-05 18:41:51'),
(20, 'FR', '0.60', '2019-08-05 18:41:51'),
(21, 'GB', '0.70', '2019-08-05 18:41:51'),
(22, 'GH', '0.20', '2019-08-05 18:41:51'),
(23, 'GR', '0.40', '2019-08-05 18:41:51'),
(24, 'HR', '0.40', '2019-08-05 18:41:51'),
(25, 'HU', '0.40', '2019-08-05 18:41:51'),
(26, 'ID', '0.20', '2019-08-05 18:41:51'),
(27, 'IN', '0.20', '2019-08-05 18:41:51'),
(28, 'IQ', '0.20', '2019-08-05 18:41:52'),
(29, 'IT', '0.40', '2019-08-05 18:41:52'),
(30, 'JO', '0.20', '2019-08-05 18:41:52'),
(31, 'JP', '0.20', '2019-08-05 18:41:52'),
(32, 'KR', '0.20', '2019-08-05 18:41:52'),
(33, 'LB', '0.20', '2019-08-05 18:41:52'),
(34, 'LK', '0.20', '2019-08-05 18:41:52'),
(35, 'MA', '0.20', '2019-08-05 18:41:52'),
(36, 'ME', '0.20', '2019-08-05 18:41:52'),
(37, 'MX', '0.20', '2019-08-05 18:41:52'),
(38, 'MY', '0.20', '2019-08-05 18:41:52'),
(39, 'NA', '0.20', '2019-08-05 18:41:52'),
(40, 'NP', '0.20', '2019-08-05 18:41:52'),
(41, 'PE', '0.20', '2019-08-05 18:41:52'),
(42, 'PG', '0.20', '2019-08-05 18:41:52'),
(43, 'PK', '0.20', '2019-08-05 18:41:52'),
(44, 'PL', '0.40', '2019-08-05 18:41:52'),
(45, 'PS', '0.20', '2019-08-05 18:41:52'),
(46, 'PT', '0.40', '2019-08-05 18:41:52'),
(47, 'RS', '0.40', '2019-08-05 18:41:52'),
(48, 'SA', '0.20', '2019-08-05 18:41:52'),
(49, 'SD', '0.20', '2019-08-05 18:41:52'),
(50, 'SG', '0.20', '2019-08-05 18:41:53'),
(51, 'SV', '0.20', '2019-08-05 18:41:53'),
(52, 'SY', '0.20', '2019-08-05 18:41:53'),
(53, 'SZ', '0.20', '2019-08-05 18:41:53'),
(54, 'TH', '0.20', '2019-08-05 18:41:53'),
(55, 'TN', '0.20', '2019-08-05 18:41:53'),
(56, 'TR', '0.40', '2019-08-05 18:41:53'),
(57, 'TT', '0.20', '2019-08-05 18:41:53'),
(58, 'UA', '0.20', '2019-08-05 18:41:53'),
(59, 'UG', '0.20', '2019-08-05 18:41:53'),
(60, 'unknow', '0.20', '2019-08-05 18:41:53'),
(61, 'US', '0.70', '2019-08-05 18:41:53'),
(62, 'VE', '0.20', '2019-08-05 18:41:53'),
(63, 'VN', '0.20', '2019-08-05 18:41:53'),
(64, 'ZA', '0.20', '2019-08-05 18:41:53'),
(65, 'ZM', '0.20', '2019-08-05 18:41:53'),
(66, 'AL', '0.20', '2019-08-08 04:40:16'),
(67, 'AT', '0.40', '2019-08-08 04:40:16'),
(68, 'AU', '0.70', '2019-08-08 04:40:16'),
(69, 'BB', '0.20', '2019-08-08 04:40:16'),
(70, 'BE', '0.40', '2019-08-08 04:40:16'),
(71, 'BN', '0.20', '2019-08-08 04:40:17'),
(72, 'BO', '0.20', '2019-08-08 04:40:17'),
(73, 'BS', '0.20', '2019-08-08 04:40:17'),
(74, 'BW', '0.20', '2019-08-08 04:40:17'),
(75, 'CA', '0.70', '2019-08-08 04:40:17'),
(76, 'CH', '0.40', '2019-08-08 04:40:17'),
(77, 'CM', '0.20', '2019-08-08 04:40:17'),
(78, 'CR', '0.20', '2019-08-08 04:40:17'),
(79, 'CU', '0.20', '2019-08-08 04:40:17'),
(80, 'CY', '0.40', '2019-08-08 04:40:17'),
(81, 'DO', '0.20', '2019-08-08 04:40:17'),
(82, 'FI', '0.40', '2019-08-08 04:40:17'),
(83, 'GD', '0.20', '2019-08-08 04:40:17'),
(84, 'GF', '0.20', '2019-08-08 04:40:17'),
(85, 'GT', '0.20', '2019-08-08 04:40:17'),
(86, 'HK', '0.20', '2019-08-08 04:40:17'),
(87, 'HN', '0.20', '2019-08-08 04:40:17'),
(88, 'IE', '0.40', '2019-08-08 04:40:17'),
(89, 'IL', '0.20', '2019-08-08 04:40:17'),
(90, 'KE', '0.20', '2019-08-08 04:40:17'),
(91, 'KH', '0.20', '2019-08-08 04:40:17'),
(92, 'KW', '0.20', '2019-08-08 04:40:17'),
(93, 'LA', '0.20', '2019-08-08 04:40:17'),
(94, 'LT', '0.20', '2019-08-08 04:40:17'),
(95, 'LU', '0.40', '2019-08-08 04:40:17'),
(96, 'LV', '0.20', '2019-08-08 04:40:18'),
(97, 'LY', '0.20', '2019-08-08 04:40:18'),
(98, 'MG', '0.20', '2019-08-08 04:40:18'),
(99, 'MK', '0.20', '2019-08-08 04:40:18'),
(100, 'MM', '0.20', '2019-08-08 04:40:18'),
(101, 'MN', '0.20', '2019-08-08 04:40:18'),
(102, 'MQ', '0.20', '2019-08-08 04:40:18'),
(103, 'MZ', '0.20', '2019-08-08 04:40:18'),
(104, 'NG', '0.20', '2019-08-08 04:40:18'),
(105, 'NL', '0.40', '2019-08-08 04:40:18'),
(106, 'OM', '0.20', '2019-08-08 04:40:18'),
(107, 'PA', '0.20', '2019-08-08 04:40:18'),
(108, 'PH', '0.20', '2019-08-08 04:40:18'),
(109, 'PY', '0.20', '2019-08-08 04:40:18'),
(110, 'QA', '0.20', '2019-08-08 04:40:18'),
(111, 'RE', '0.20', '2019-08-08 04:40:18'),
(112, 'RO', '0.40', '2019-08-08 04:40:18'),
(113, 'RU', '0.20', '2019-08-08 04:40:18'),
(114, 'SE', '0.40', '2019-08-08 04:40:18'),
(115, 'SI', '0.20', '2019-08-08 04:40:18'),
(116, 'SK', '0.20', '2019-08-08 04:40:18'),
(117, 'SR', '0.20', '2019-08-08 04:40:18'),
(118, 'TG', '0.20', '2019-08-08 04:40:18'),
(119, 'UY', '0.20', '2019-08-08 04:40:18'),
(120, 'ZW', '0.20', '2019-08-08 04:40:18'),
(121, 'AF', '0.20', '2019-08-10 11:45:19'),
(122, 'CI', '0.20', '2019-08-10 11:45:19'),
(123, 'EE', '0.20', '2019-08-10 11:45:20'),
(124, 'MT', '0.20', '2019-08-10 11:45:20'),
(125, 'NO', '0.20', '2019-08-10 11:45:20'),
(126, 'SN', '0.20', '2019-08-10 11:45:20'),
(127, 'ST', '0.20', '2019-08-10 11:45:20'),
(128, 'TL', '0.20', '2019-08-10 11:45:20'),
(129, 'TZ', '0.20', '2019-08-10 11:45:20');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cronjob_log`
--

CREATE TABLE `cronjob_log` (
  `id` int(11) NOT NULL,
  `cron_job` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `execution_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `cronjob_log`
--

INSERT INTO `cronjob_log` (`id`, `cron_job`, `status`, `execution_date`) VALUES
(1, 'payment_sync', '', '2019-08-17 16:21:43');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fileserver`
--

CREATE TABLE `fileserver` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `api_key` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `fileserver`
--

INSERT INTO `fileserver` (`id`, `url`, `api_key`, `last_update`) VALUES
(1, 'http://files.securitylabs.me/up.php', 'R47XnbEa9NLXPzTf2tDWg2jEGMT_n', '2019-08-17 11:05:47');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `loader_api`
--

CREATE TABLE `loader_api` (
  `id` int(11) NOT NULL,
  `api_key` varchar(112) COLLATE utf8_bin NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `api_url` varchar(112) COLLATE utf8_bin NOT NULL,
  `min_loads_target` int(11) NOT NULL DEFAULT '200',
  `min_loads` int(11) NOT NULL DEFAULT '200',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `loader_api`
--

INSERT INTO `loader_api` (`id`, `api_key`, `active`, `api_url`, `min_loads_target`, `min_loads`, `created_at`) VALUES
(1, '7c6dd66201ca812f599f8c0a2ea51826', 1, 'http://10.0.0.9', 200, 20, '2019-08-12 18:50:45'),
(2, '', 1, 'smoke', 200, 200, '2019-08-12 20:13:52');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `payments_btc`
--

CREATE TABLE `payments_btc` (
  `id` int(11) NOT NULL,
  `user_id` int(25) NOT NULL,
  `balance_usd` varchar(25) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `private_key` varchar(255) COLLATE utf8_bin NOT NULL,
  `public_key` varchar(255) COLLATE utf8_bin NOT NULL,
  `min_btc` varchar(25) COLLATE utf8_bin NOT NULL DEFAULT '0.00000000',
  `recived_btc` varchar(25) COLLATE utf8_bin NOT NULL DEFAULT '0.00000000',
  `payed` int(11) NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `payments_btc`
--

INSERT INTO `payments_btc` (`id`, `user_id`, `balance_usd`, `private_key`, `public_key`, `min_btc`, `recived_btc`, `payed`, `create_date`) VALUES
(3, 1, '10', 'cUqeqPnYJ89xatvoRZETKSiLsbipR42q7JDU44z7LyToWkiL42Yo', 'mkMswfwZzWzyca7KAvKz5VmmyVUJoFi3ja', '0.00087872', '0', 2, '2019-08-11 15:22:36'),
(4, 1, '10', 'cQsJtQWPJdgpWVWubggJ8oHoZptjLuVDKdxSPPNiMNMdocKdPrzb', 'mt5meVZXjP6tsSHbdHeyaJ1jW7C2XCgqj9', '0.00087694', '0', 0, '2019-08-12 17:34:57');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '1',
  `type` varchar(25) COLLATE utf8_bin NOT NULL DEFAULT 'day',
  `name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'default',
  `price` varchar(25) COLLATE utf8_bin NOT NULL DEFAULT '5.00',
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `plans`
--

INSERT INTO `plans` (`id`, `time`, `type`, `name`, `price`, `active`) VALUES
(1, 24, 'hours', 'demo', '1.00', 1),
(2, 30, 'days', 'Member', '15.00', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(25) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'new',
  `description` text COLLATE utf8_bin,
  `status` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'new',
  `create_date` timestamp(1) NOT NULL DEFAULT CURRENT_TIMESTAMP(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `title`, `description`, `status`, `create_date`) VALUES
(1, 1, 'test', 'TST', 'waiting_for_admin', '0000-00-00 00:00:00.0'),
(2, 1, 'asd', 'asd', 'closed', '2019-08-11 17:45:59.9'),
(3, 2, 'sdfsdf', 'fsdfsd', 'closed', '2019-08-11 18:13:51.6'),
(4, 1, 'test', 'gh', 'new', '2019-08-12 19:42:19.7');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `ticket_messages`
--

INSERT INTO `ticket_messages` (`id`, `ticket_id`, `user_id`, `description`, `created_at`) VALUES
(1, 2, 1, 'asasd', '2019-08-11 17:53:18'),
(2, 2, 1, 'adwsd', '2019-08-11 17:53:31'),
(3, 2, 1, 'sdf', '2019-08-11 17:56:34'),
(4, 2, 1, 'fsd', '2019-08-11 17:57:21'),
(5, 1, 1, 'asdasd', '2019-08-11 18:00:05'),
(6, 3, 1, 'dsfsdf', '2019-08-11 18:14:30'),
(7, 3, 2, 'sdf', '2019-08-11 18:15:08'),
(8, 3, 2, 'asd', '2019-08-11 18:16:48'),
(9, 3, 1, 'asd', '2019-08-11 18:17:20'),
(10, 2, 1, 'asd', '2019-08-11 18:17:49'),
(11, 1, 1, 'asd', '2019-08-11 18:17:57'),
(12, 1, 1, 'sfd', '2019-08-11 18:23:38'),
(13, 3, 2, 'fsdf', '2019-08-12 19:42:50'),
(14, 1, 2, 'fgd', '2019-08-12 20:57:13'),
(15, 1, 1, 'fsd', '2019-08-13 15:42:58'),
(16, 1, 1, 'help me', '2019-08-13 15:48:37'),
(17, 1, 2, 'whats up bro', '2019-08-13 15:48:48'),
(18, 1, 1, 'im not sure if i should position admin messages on right\r\nand user on left side ', '2019-08-13 15:49:36');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plan_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank` int(1) NOT NULL DEFAULT '1',
  `amount_btc` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00000000',
  `amount_in_usd` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `passwort`, `plan_id`, `rank`, `amount_btc`, `amount_in_usd`, `created_at`, `updated_at`, `expire`) VALUES
(1, 'asd', '$2y$10$fKD/HV.w077RPQjeaPVvYegzveVlWMIXehIDbvr2lJDYpuW/9fjQq', '2', 1, '0.00263616', '6.80', '2019-08-10 19:20:51', NULL, NULL),
(2, 'test', '$2y$10$Cbo0j8xQNQQ8nHqxg4I5uOPLCqDACWvRC0NDy.iV/WTtb8X7ykhm2', NULL, 100, '0.00000000', '198.40', '2019-08-11 18:13:42', NULL, NULL),
(3, 'test2', '$2y$10$hqhh1wzsEWNEfJMlc6LinOPjw8vrP.Feawj9NkMJwc1s40aFPcyPC', NULL, 1, '0.00000000', '0.00', '2019-08-13 15:40:10', NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `botshop_orders`
--
ALTER TABLE `botshop_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `botshop_pricelist`
--
ALTER TABLE `botshop_pricelist`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `cronjob_log`
--
ALTER TABLE `cronjob_log`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `fileserver`
--
ALTER TABLE `fileserver`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `loader_api`
--
ALTER TABLE `loader_api`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `payments_btc`
--
ALTER TABLE `payments_btc`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `botshop_orders`
--
ALTER TABLE `botshop_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `botshop_pricelist`
--
ALTER TABLE `botshop_pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT für Tabelle `cronjob_log`
--
ALTER TABLE `cronjob_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `fileserver`
--
ALTER TABLE `fileserver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `loader_api`
--
ALTER TABLE `loader_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `payments_btc`
--
ALTER TABLE `payments_btc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
