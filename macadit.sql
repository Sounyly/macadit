-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Mer 26 Juillet 2017 à 17:54
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `macadit`
--

-- --------------------------------------------------------

--
-- Structure de la table `accessoires`
--

CREATE TABLE `accessoires` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `marque` int(11) NOT NULL,
  `connexion` int(11) NOT NULL,
  `link-contenu` varchar(250) NOT NULL,
  `img` varchar(255) NOT NULL,
  `link_shop` varchar(250) NOT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `accessoires`
--

INSERT INTO `accessoires` (`id`, `name`, `category`, `os`, `marque`, `connexion`, `link-contenu`, `img`, `link_shop`, `date_ajout`) VALUES
(1, 'HD 435', 1, 3, 1, 1, '', 'hd435.png', '', '2017-07-26 16:00:00'),
(2, 'Ti-Combinaison', 3, 1, 3, 4, '/Users/sounyly/Sites/ulysses/accessoires/ti-combi/index.html', '', 'https://www.amazon.fr/Ti-combinaison-dordinateur-magnésium-aluminium-ordinateurs-intelligents/dp/B01D9PYDUA', '2017-07-26 16:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Casque'),
(2, 'Audio'),
(3, 'Supports'),
(4, 'Objets Connectés'),
(5, 'Musique'),
(6, 'Logiciel'),
(7, 'Jeux');

-- --------------------------------------------------------

--
-- Structure de la table `connection_type`
--

CREATE TABLE `connection_type` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `connection_type`
--

INSERT INTO `connection_type` (`id`, `name`) VALUES
(1, 'Filaire'),
(2, 'Bluetooth'),
(3, 'Bluetooth/Filaire'),
(4, 'NULL');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Productivité'),
(2, 'Aventure');

-- --------------------------------------------------------

--
-- Structure de la table `logiciel`
--

CREATE TABLE `logiciel` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `lien-article` varchar(255) NOT NULL,
  `img` varchar(250) NOT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `logiciel`
--

INSERT INTO `logiciel` (`id`, `name`, `category`, `genre`, `os`, `lien-article`, `img`, `date_ajout`) VALUES
(1, 'Wunderlist', 6, 1, 3, '/Users/sounyly/Sites/ulysses/logiciels/wunderlist/index.html', 'logiciel/wunderlist.png', '2017-07-26 16:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `marques`
--

INSERT INTO `marques` (`id`, `name`) VALUES
(1, 'Sennheiser'),
(2, 'Sony'),
(3, 'Spinido');

-- --------------------------------------------------------

--
-- Structure de la table `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `os`
--

INSERT INTO `os` (`id`, `name`) VALUES
(1, 'macOS'),
(2, 'iOS'),
(3, 'macOS/iOS');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accessoires`
--
ALTER TABLE `accessoires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `os` (`os`),
  ADD KEY `marque` (`marque`),
  ADD KEY `connexion` (`connexion`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `connection_type`
--
ALTER TABLE `connection_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logiciel`
--
ALTER TABLE `logiciel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `genre` (`genre`),
  ADD KEY `os` (`os`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `accessoires`
--
ALTER TABLE `accessoires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `connection_type`
--
ALTER TABLE `connection_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `logiciel`
--
ALTER TABLE `logiciel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `accessoires`
--
ALTER TABLE `accessoires`
  ADD CONSTRAINT `accessoires_ibfk_1` FOREIGN KEY (`connexion`) REFERENCES `connection_type` (`id`),
  ADD CONSTRAINT `accessoires_ibfk_2` FOREIGN KEY (`os`) REFERENCES `os` (`id`),
  ADD CONSTRAINT `accessoires_ibfk_3` FOREIGN KEY (`marque`) REFERENCES `marques` (`id`),
  ADD CONSTRAINT `accessoires_ibfk_4` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `logiciel`
--
ALTER TABLE `logiciel`
  ADD CONSTRAINT `logiciel_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `logiciel_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `logiciel_ibfk_3` FOREIGN KEY (`os`) REFERENCES `os` (`id`);
