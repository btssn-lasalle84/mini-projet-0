DROP DATABASE IF EXISTS `chauffage`;
CREATE DATABASE `chauffage` DEFAULT CHARACTER SET utf8;
USE `chauffage`;

--
-- Structure de la table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
    `idConfiguration` INT(11) NOT NULL DEFAULT '1' ,
    `periode` INT(11) NOT NULL DEFAULT '0' ,
    PRIMARY KEY (`idConfiguration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `mesures`
--

CREATE TABLE IF NOT EXISTS `mesures` (
    `idMesure` INT(11) NOT NULL AUTO_INCREMENT ,
    `temperature` FLOAT NOT NULL ,
    `horodatage` DATETIME NOT NULL ,
    PRIMARY KEY (`idMesure`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `configuration`
--

INSERT INTO `configuration` (`idConfiguration`, `periode`) VALUES (1, 60000);
