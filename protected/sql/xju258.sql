-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3308
-- Létrehozás ideje: 2020. Máj 14. 07:42
-- Kiszolgáló verziója: 8.0.18
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `xju258`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `species` tinyint(1) NOT NULL,
  `ill` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `vaccination` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Undefined',
  `owned` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `animals`
--

INSERT INTO `animals` (`id`, `name`, `species`, `ill`, `gender`, `vaccination`, `owned`) VALUES
(6, 'Tuki', 0, 'Nincs', 1, 'Minden', 1),
(7, 'Husi', 1, 'Nincs', 0, 'Minden', 1),
(8, 'Günter', 1, 'Nincs', 2, 'Minden', 2),
(9, 'Gusztáv', 0, 'Orrpolip', 1, 'Minden', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `permission` int(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `permission`) VALUES
(3, 'Zsadányi', 'Rózsa', 'zsadanyi.rozsa@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1),
(5, 'Admin', 'Admin', 'admin@admin.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `volunteers`
--

DROP TABLE IF EXISTS `volunteers`;
CREATE TABLE IF NOT EXISTS `volunteers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` tinyint(1) NOT NULL,
  `country` tinyint(1) NOT NULL,
  `postal` int(5) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `days` tinyint(11) NOT NULL,
  `note` text NOT NULL,
  `gender` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `volunteers`
--

INSERT INTO `volunteers` (`id`, `first_name`, `last_name`, `address`, `city`, `country`, `postal`, `email`, `phone`, `days`, `note`, `gender`) VALUES
(3, 'Peter', 'Nagy', 'Keleti Street', 1, 0, 123456, 'peter.nagy@gmail.com', '0630234612', 1, 'None', 1),
(4, 'Dani', 'Nagy', 'Sima Street 3', 2, 0, 123456543, 'nagy.dani@gmail.com', '06205326312', 3, 'I love all animals', 1),
(5, 'Petra', 'Nagy', 'Tiszta Street 3', 1, 0, 2147483647, 'petra.nagy@gmail.com', '06302846234', 4, 'I love animals', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
