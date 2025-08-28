-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 27 août 2025 à 21:10
-- Version du serveur : 11.4.8-MariaDB
-- Version de PHP : 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zabo3326_portfolioliza`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$Xu9GNDkcBP5Aa4shcuXaXe8qFIJrh9nIpeRFh.yw7qCSqyFm.z9pC');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `image`) VALUES
(1, 'Oeuvres', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `lastname`, `firstname`, `email`, `message`, `date`) VALUES
(1, 'Nastic', 'Jim', 'jimnastic@test.be', 'blabla', '2025-08-25 21:23:15');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `id_works` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id`, `nom`, `image`) VALUES
(25, 'word', '1941610315microsoft-word-icon.svg'),
(20, 'vscode', '1234620873vs.svg'),
(26, 'teams', '614362116Microsoft-Office-Teams-2018-Aepresent-.svg'),
(18, 'photoshop', '1078784697ps.svg'),
(17, 'indesign', '391758839id.svg'),
(16, 'discord', '1405281761discord.svg'),
(15, 'audition', '1491001409au.svg'),
(14, 'animate', '1111779094an.svg'),
(13, 'illustrator', '558710500ai.svg'),
(12, 'aftereffect', '1987287029ae.svg');

-- --------------------------------------------------------

--
-- Structure de la table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `programmes` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `works`
--

INSERT INTO `works` (`id`, `nom`, `description`, `programmes`, `image`, `categorie`) VALUES
(1, 'Réalisation 1', 'Lorem ipsum', 'Lorem ipsum', '1524059588photographer-1702074-1280.jpg', 1),
(2, 'Réalisation 2', 'Lorem ipsum', 'Lorem ipsum', '1439036566bridge-8496195-640.jpg', 1),
(3, 'Réalisation 3', 'Lorem ipsum', 'Lorem ipsum', '668888722lake-1781692-640.jpg', 1),
(4, 'Réalisation 4', 'Lorem ipsum', 'Lorem ipsum', '483748615website-6898411-640.png', 1),
(5, 'Réalisation 5', 'Lorem ipsum', 'Lorem ipsum', '1237018263money-5459709-640.png', 1),
(6, 'Réalisation 8', 'Lorem ipsum', 'Lorem ipsum', '1703297927video-making-771413-640.jpg', 1),
(7, 'Réalisation 6', 'Lorem ipsum', 'Lorem ipsum', '1446956827boy-2736656-640.jpg', 1),
(8, 'Réalisation 7', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ornare a diam non varius. Cras dignissim enim non libero convallis consequat. Praesent laoreet nunc porta mollis pharetra. Nunc blandit posuere nunc. Ut ac orci vel dolor lobortis mollis a et ex. Nulla neque urna, viverra at efficitur ut, suscipit sed nulla. Ut eget velit a purus sagittis aliquam. Praesent commodo erat viverra, aliquet felis at, ullamcorper dui. Donec sodales, nulla vel congue consequat, mauris turpis vehicula elit, vel viverra ex odio a lorem. Phasellus vel suscipit sapien. Nam vel sagittis purus. Curabitur dignissim sodales blandit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum fermentum placerat mattis.\r\n\r\nVivamus rutrum sit amet nisl a mollis. Sed ac lectus convallis, tristique mauris eu, aliquet metus. Curabitur in mauris non justo convallis tempus. Aliquam imperdiet hendrerit ligula at viverra. Ut dapibus justo sed convallis feugiat. Aenean eget iaculis eros. Morbi tempus ac velit eu dapibus. Nullam feugiat enim sit amet quam cursus malesuada. Integer vel rutrum dui, vitae imperdiet libero. Maecenas id enim elit. Nulla ut lacus felis.\r\n\r\nVivamus at enim tincidunt, ultrices quam vitae, pretium libero. Duis scelerisque diam eros, sed pretium magna consectetur sit amet. Maecenas nisi diam, scelerisque ut nulla nec, congue porta dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas efficitur lobortis enim pulvinar bibendum. In a ligula quis ante ultrices vestibulum. Phasellus nec libero consequat, ultricies metus a, vehicula mauris. Etiam et quam purus. Donec luctus eu sapien quis iaculis. Vivamus eget iaculis ante.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rutrum velit accumsan neque scelerisque, sed viverra tortor hendrerit. Nulla est leo, molestie ornare tincidunt et, accumsan eget felis. Donec rhoncus et magna blandit venenatis. Morbi vel congue lorem, quis varius turpis. Proin bibendum condimentum porta. Praesent id hendrerit ligula. Donec efficitur mollis pulvinar. Sed vitae dignissim elit. Donec ac nunc at sapien placerat vestibulum at nec lectus. Quisque sit amet pretium metus, in sodales lectus. Integer in justo et magna finibus porttitor sit amet et ligula. Integer diam nulla, mollis sit amet porttitor eget, fermentum id felis. Maecenas arcu arcu, ultrices ac mollis vitae, fringilla non dolor. Praesent elit est, rhoncus vel tempor sit amet, tempus quis felis. ', 'Lorem ipsum', '1516351528graduation-7287004-640.jpg', 1),
(9, 'Réalisation 9', 'uat. Praesent laoreet nunc porta mollis pharetra. Nunc blandit posuere nunc. Ut ac orci vel dolor lobortis mollis a et ex. Nulla neque urna, viverra at efficitur ut, suscipit sed nulla. Ut eget velit a purus sagittis aliquam. Praesent commodo erat viverra, aliquet felis at, ullamcorper dui. Donec sodales, nulla vel congue consequat, mauris turpis vehicula elit, vel viverra ex odio a lorem. Phasellus vel suscipit sapien. Nam vel sagittis purus. Curabitur dignissim sodales blandit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum fermentum placerat mattis. Vivamus rutrum sit amet nisl a mollis. Sed ac lectus convallis, tristique mauris eu, aliquet metus. Curabitur in mauris non justo convallis tempus. Aliquam imperdiet hendrerit ligula at viverra. Ut dapibus justo sed convallis feugiat. Aenean eget iaculis eros. Morbi tempus ac velit eu dapibus. Nullam feugiat enim sit amet quam cursus malesuada. Integer vel rutrum dui, vitae imperdiet libero. Maecenas id enim elit. Nulla ', 'Lorem ipsum', '1062214407cat-9752539-640.jpg', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_works` (`id_works`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie` (`categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
