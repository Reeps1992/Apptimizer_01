-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  mar. 09 juin 2020 à 10:17
-- Version du serveur :  10.3.14-MariaDB
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `apptimizer`
--

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`firstname`, `lastname`, `customer_id`, `email`, `phone`, `adress`, `zip_code`, `city`, `fullname`) VALUES
('Kévin', 'Conversin', 1, 'conversin.k.pro@gmail.com', 157896423, '86 rue petit champ', '44000', 'Nantes', 'Kévin Conversin'),
('Ano', 'Nyme', 2, 'anonyme@gmail.com', 633289563, '12 Le Roch', '35190', 'TREVERIEN', 'Ano Nyme'),
('Bernard', 'L\'herrmite', 3, 'BL@gmail.com', 755274965, '27 rue Bourbignan', '22000', 'DINAN', 'Bernard L\'hermite'),
('Christophe', 'Jacquet', 4, 'cj@arobaz.com', 633276962, '8 Grand Place', '66000', 'LE MANS', 'Christophe Jacquet'),
('Jean', 'Legor\'c', 5, 'jlg@gmail.com', 632353664, '158 les roboiries', '77500', 'POISSY', 'Jean Legor\'c');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_number` varchar(255) NOT NULL,
  `serial_number_item` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `supplier_id` int(100) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`item_id`, `part_number`, `serial_number_item`, `designation`, `supplier_id`) VALUES
(1, '12554', 'CD5896A', 'Altimètres', 1),
(2, '74657', 'SDFG582545', 'Panneau de contrôle', 1),
(3, '24555', 'WH369', 'ROUES CESSN X120', 1),
(4, '58963', 'CBL25M', 'RELAIS DEPLOI X120', 1),
(5, '000000', '000000', 'Inconnu', 8);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `identifiant` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  UNIQUE KEY `identifiant` (`identifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`identifiant`, `password`) VALUES
('root', '63a9f0ea7bb98050796b649e85481845');

-- --------------------------------------------------------

--
-- Structure de la table `ot`
--

DROP TABLE IF EXISTS `ot`;
CREATE TABLE IF NOT EXISTS `ot` (
  `ot_id` int(11) NOT NULL AUTO_INCREMENT,
  `number_ot` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `comment` text NOT NULL,
  `state` int(11) NOT NULL,
  `plane_list` varchar(255) DEFAULT NULL,
  `archive` varchar(255) DEFAULT NULL,
  `item_list` varchar(255) DEFAULT NULL,
  `worker_list` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `crs_path` varchar(255) DEFAULT NULL,
  `easa_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ot_id`),
  UNIQUE KEY `number_ot` (`number_ot`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ot`
--

INSERT INTO `ot` (`ot_id`, `number_ot`, `title`, `start_date`, `end_date`, `comment`, `state`, `plane_list`, `archive`, `item_list`, `worker_list`, `img_path`, `pdf_path`, `crs_path`, `easa_path`) VALUES
(7, 4569, 'test', '2020-03-01', '2020-03-31', 'balablalb', 0, '5', 'b35', '1', NULL, '../../DATA/OT/4569/IMG', '../../DATA/OT/4569/PDF', '../../DATA/OT/4569/CRS', '../../DATA/OT/4569/EASA'),
(10, 78910, 'Remplacement de cablages', '2020-05-31', '2020-05-31', 'Masse défaillantes', 1, '1,7', 'B35', '5', NULL, '../../DATA/OT/78910/IMG', '../../DATA/OT/78910/PDF', '../../DATA/OT/78910/CRS', '../../DATA/OT/78910/EASA');

-- --------------------------------------------------------

--
-- Structure de la table `plane`
--

DROP TABLE IF EXISTS `plane`;
CREATE TABLE IF NOT EXISTS `plane` (
  `plane_id` int(11) NOT NULL AUTO_INCREMENT,
  `immat` varchar(255) NOT NULL,
  `serial_number_plane` varchar(255) NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `plane_img` varchar(255) DEFAULT 'default_plane.png',
  PRIMARY KEY (`plane_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plane`
--

INSERT INTO `plane` (`plane_id`, `immat`, `serial_number_plane`, `customer_id`, `type`, `nationalite`, `plane_img`) VALUES
(1, 'F-GZOH', '152ZEE', '1', 'CESSNA 172', 'FR', '../../DATA/PLANES/F-GZOH/DESCRIPTION_IMG/avion_test_siba.jpg'),
(2, 'G-ZFRB', '1598BFG', '1', 'PIPER M600', 'GB', 'default_plane.png'),
(3, 'F-ARCG', '152ZEF', '1', 'CESSNA 182', 'FR', 'default_plane.png'),
(5, 'OO-Y24', '5878EFC', '1', 'CIRRUS SR22', 'BE', 'default_plane.png'),
(7, 'F-ZFOL', '5878XXXX', '2', 'AVIAT PITTS', 'FR', 'default_plane.png');

-- --------------------------------------------------------

--
-- Structure de la table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `adress` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `company` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `indicatif` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `adress`, `city`, `zip_code`, `email`, `phone`, `company`, `country`, `indicatif`) VALUES
(1, 'Nicolas', '25 Hautpstrasse', 'Junginge', 72417, 'winter.instruments@yahoo.de', 7477262, 'GEBR. WINTER GMBH &amp; CO KG', 'Allemagne', '+0049'),
(3, NULL, '8 Kugelstrass', 'METZ', 57000, 'contact@safrangroup.fr', 299732199, 'SAFRAN GROUP', 'FRANCE', '0'),
(8, NULL, 'none', 'NONE', 111111, 'none@none.none', 1111111, 'INCONNU', 'NONE', NULL),
(7, NULL, '158 av G. de Gaulle', 'LILLE', 59000, 'contact@seam.avionique.fr', 548786512, 'SEAM AVIONIQUE', 'FRANCE', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `last_connexion_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `skill_date` date NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `birthdate`, `last_connexion_date`, `skill_date`, `fullname`, `email`) VALUES
(1, 'Perrin', 'Bridou', '1984-11-04', '2020-05-05 15:49:21', '2019-12-31', 'Perrin Bridou', 'p.bridou@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
