DROP DATABASE IF EXISTS `monitoring`;
CREATE DATABASE `monitoring` DEFAULT CHARACTER SET utf8;
USE `monitoring`;

--
-- Structure de la table `salles`
--

CREATE TABLE IF NOT EXISTS `salles` (
  `idSalle` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,  
  `ip` varchar(15) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,  
  PRIMARY KEY (`idSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `salles`
--

INSERT INTO `salles` (`idSalle`, `nom`, `description`, `ip`, `port`, `etat`) VALUES
(1, 'B20', 'salle BTS SN', '192.168.52.30', 5000, 1),
(2, 'B22', 'salle BTS SN', '192.168.52.31', 5000, 1);

