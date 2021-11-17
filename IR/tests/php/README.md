# PHP

- [PHP](#php)
  - [Présentation](#présentation)
  - [Ressources](#ressources)
  - [Éléments de syntaxe](#éléments-de-syntaxe)
  - [Typage](#typage)
  - [Programmer en PHP sous Ubuntu](#programmer-en-php-sous-ubuntu)
  - [Base de données](#base-de-données)
  - [Tests](#tests)
    - [Port série et Fichiers](#port-série-et-fichiers)
    - [SQLite](#sqlite)
    - [MySQL](#mysql)

## Présentation

PHP est un langage de programmation interprété.

> Le langage PHP a été créé en 1994 par Rasmus Lerdorf pour son site web. C’était à l’origine une bibliothèque logicielle en langage C dont il se servait pour conserver une trace des visiteurs qui venaient consulter son CV. PHP s’appelait alors PHP/FI (_Personal Home Page Tools/Form Interpreter_). En 1997, deux étudiants, Andi Gutmans et Zeev Suraski, ont redéveloppé le coeur de PHP/FI. Ce travail a abouti un an plus tard à la version 3 de PHP, devenu alors PHP (_Hypertext PreProcessor_). Peu de temps après, Andi Gutmans et Zeev Suraski ont commencé la réécriture du moteur interne de PHP. C'est ce nouveau moteur appelé Zend Engine qui a servi de base à la version 4 de PHP. Comme de nombreux projets Open Source, PHP possède une mascotte. Il s’agit de l’éléPHPant, dessiné en 1998 par El Roubio.

Le langage PHP est placé sous une licence libre et fonctionne sur la plupart des plates-formes informatiques (Windows, Unix, GNU/Linux, macOS, Android, iOS, ...).
PHP est un langage de programmation libre principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP, mais il peut également fonctionner comme n’importe quel langage interprété de façon locale (notion de script).

PHP a permis de créer un grand nombre de sites web célèbres, comme Facebook, Wikipédia, etc. Le langage PHP est un langage populaire notamment pour la programmation web côté serveur où il est le plus utilisé depuis plusieurs années (75 % de part de marché depuis 2010 puis 82 % en 2016). En 2013, PHP était utilisé par plus de 244 millions de sites Web à travers le monde.

## Ressources

- Site officiel : https://secure.php.net/
- Documentation : https://www.php.net/docs.php
- Manuel : https://www.php.net/manual/fr/
- Cours PHP : http://tvaira.free.fr/web/cours-php.pdf et http://tvaira.free.fr/web/coursPHP5-OO.pdf
- Autres : http://tvaira.free.fr/web/

## Éléments de syntaxe

Le langage PHP utilise une syntaxe très proche de celle utilisée en C/C++.

Le code PHP doit être inséré entre les balises `<?php` et `?>` ou `<?` et `?>`.

Les variables sont préfixées par le symbole `$`.

L’opérateur de concaténation de chaîne de caractères est le point `.`.

PHP permet la programmation orientée objet. La partie POO du langage est très inspirée de celle de C++ et Java. Pour accèder aux membres d’un objet, il faut obligatoirement utilisé l’autopointeur `$this`.

## Typage

Tous les langages de programmation permettent de manipuler des valeurs avec des variables. Le typage d’une variable consiste à associer à son nom un « type » de donnée.

> Pour rappel, le « type » est la convention d’interprétation (codage) de la séquence de bits qui constitue la variable. Le type de la variable spécifie aussi la longueur de cette séquence (8 bits, 32 bits, 64 bits, ...).

PHP est doté d’un typage dynamique faible :

- Typage dynamique : il consiste à laisser l’interpréteur réaliser cette opération de typage « à la volée » lors de l’exécution du code. C’est la valeur affectée à la variable qui précisera son type. Exemples de langage à typage dynamique : PHP, Perl, Python, Javascript, bash (shell Linux)
- Typage faible : Un langage de programmation est dit faiblement typé lorsqu’il ne considère pas comme une erreur les changements de types. Exemples de langage faiblement typé : PHP, Javascript, C (car il accepte les transtypages implicites comme par exemple int vers short)

Exemple d’utilisation des types en PHP :

```php
<?php
$a = 1; // un entier
$b = 2.5; // un nombre à virgule flottante
$c = "hello"; // une chaîne de caractères

// afficher le type d'une variable :
var_dump($a); // int(1)
var_dump($b); // float(2.5)
var_dump($c); // string(5) "hello"

// transtypage :
$a = (int)$b; // a vaut 2
?>
```

## Programmer en PHP sous Ubuntu

Lien : https://doc.ubuntu-fr.org/php

Version de PHP :

```sh
$ php --version
PHP 7.2.19-0ubuntu0.18.04.2 (cli) (built: Aug 12201919:34:28) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
with Zend OPcache v7.2.19-0ubuntu0.18.04.2, Copyright (c) 1999-2018, by Zend Technologies

$ php -m

$ which php
/usr/bin/php
```

Un script PHP (mode CLI) :

```php
#!/usr/bin/php
<?php

// un commentaire : mon premier programme PHP !

// saisie d'une chaîne de caractères
$langue = readline("Quelle est votre langue (fr, ...) ? ");

// une instruction conditionnelle
if ($langue == "fr") // test de la valeur
//if ($langue === "fr") // test de la valeur et du type
{
    $message = "Bonjour le monde";
}
else
{
    $message = "Hello world";
}

// saisie d'un entier
$nb = readline("Donnez un nombre : ");

$i = 0;
// une boucle
while ($i < $nb)
{
    //echo $message.PHP_EOL;
    echo $message . " " . ($i + 1) . " fois".PHP_EOL;
    $i += 1;
}
?>
```

> La première ligne sert à préciser le chemin de l’interpréteur précédé des caractères `̀#!`̀ (le _shebang_) qui exécutera le script. Cette ligne est inutile dans le cas d’une programmation web.

Il existe plusieurs manières d’exécuter un script PHP de façon locale :

- le rendre exécutable :

```sh
$ chmod +x helloworld.php

$ ./helloworld.php
```

- utiliser l’interpréteur PHP :

```sh
$ php helloworld.php
```

## Base de données

Parmi les nombreux atouts du langage PHP, un des plus connus est son interfaçage avec la majorité des bases de données du marché. Parmi les plus connues, on peut citer : **MySQL**, **SQLite**, PostgreSQL, Oracle, Ingres, Interbase, Informix, Microsoft SQL Server, mSQL, Sybase, FrontBase, dBase, etc ...

Documentation : https://www.php.net/manual/fr/mysql.php

## Tests

Ce dossier contient quelques programmes d'exemples utiles pour la réalisation du mini-projet :

- `php-version.php` : permet de tester la présence de l'interpréteur PHP en affichant sa version
- `php-portserie.php` : réalise un test de communication série avec un Arduino sous GNU/Linux
- `php-sqlite.php` : met en oeuvre la base de données SQLite
- `php-mysql.php` : met en oeuvre la base de données MySQL

### Port série et Fichiers

Port série :

- http://tvaira.free.fr/projets/activites/activite-port-serie.html
- http://tvaira.free.fr/projets/activites/activite-peripherique-usb.html
- http://tvaira.free.fr/projets/activites/peripherique-usb.html

Fonctions sur les systèmes de fichiers : https://www.php.net/manual/fr/ref.filesystem.php
### SQLite

SQLite est une bibliothèque écrite en C qui propose un moteur de base de données relationnelle accessible par le langage SQL.

L’intégralité de la base de données (déclarations, tables, index et données) est stockée dans un fichier indépendant de la plateforme.

> Contrairement aux serveurs de bases de données traditionnels, comme MySQL ou PostgreSQL, sa particularité est de ne pas reproduire le schéma habituel client-serveur mais d’être directement intégrée aux programmes. SQLite est le moteur de base de données le plus distribué au monde, grâce à son utilisation dans de nombreux logiciels grand public comme Firefox, Skype, Google Gears, dans certains produits d’Apple, d’Adobe et de McAfee et dans les bibliothèques standards de nombreux langages comme PHP ou Python. De par son extrême légèreté (moins de 300 Kio), SQLite est également très populaire sur les systèmes embarqués, notamment sur la plupart des smartphones modernes : l’iPhone ainsi que les systèmes d’exploitation mobiles Symbian et Android l’utilisent comme base de données embarquée.

Exemple de base de données SQLite :

```sh
$ file salles.db
salles.db: SQLite 3.x database, last written using SQLite version 3031001
```

Structure et contenu en SQL :

```sql
CREATE TABLE salles (
    "idSalle" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "nom" VARCHAR(255) NOT NULL UNIQUE,
    "description" VARCHAR(255),
    "ip" VARCHAR(15) NOT NULL UNIQUE,
    "port" INTEGER NOT NULL,
    "etat" INTEGER NOT NULL
);

INSERT INTO salles (idSalle, nom, description, ip, port, etat) VALUES
(1, 'B20', 'salle BTS SN', '192.168.52.30', 5000, 1),
(2, 'B22', 'salle BTS SN', '192.168.52.31', 5000, 1),
(3, 'C12', 'salle', '192.168.52.32', 5000, 1);
```

### MySQL

Une des bases de données les plus utilisées avec PHP est sans aucun doute : MySQL, un SGDBR (Système de Gestion de Base de Données Relationnelle) GPL implémentant le langage de requête SQL (_Structured Query Language_).

> Il existe un outil libre et gratuit développé en PHP par la communauté des programmeurs libres : phpMyAdmin, qui permet l'administration aisée des bases de données MySQL avec PHP.

Avec MySQL vous pouvez créer plusieurs bases de données sur un serveur. Une base est composée de tables contenant des enregistrements.

PHP offre 3 APIs différentes pour se connecter à MySQL : les extensions mysql (obsolète depuis PHP 5.5), mysqli et PDO.

> Une API (_Application Programming Interface_) est une interface de programmation d'application qui définit les classes, méthodes, fonctions et variables dont une application va faire usage pour exécuter différentes tâches.

L'extension `mysqli` fournit une interface de fonctions et aussi orientée objet.

PHP fournit un grand choix de fonctions permettant de manipuler une base de données MySQL. Toutefois, parmi celles-ci quatre fonctions sont essentielles :

- La fonction de connexion au serveur (`mysqli_connect` ou `mysqli_real_connect`)
- La fonction de choix de la base de données (`mysqli_select_db`)
- La fonction de requête (`mysqli_query`)
- La fonction de déconnexion (`mysqli_close`)

L’exécution d’une requête `SELECT` avec `mysqli_query()` retournera retournera un objet résultat de type `mysqli_result` (ou TRUE pour les autres types de requêtes).

Les fonctions de traitements de résultat d’une requête sont au choix :

- `mysqli_fetch_row()` : récupère une ligne de résultat sous forme de tableau indexé
- `mysqli_fetch_array()` : retourne une ligne de résultat sous la forme d’un tableau associatif, d’un tableau indexé, ou les deux
- `mysqli_fetch_assoc()` : récupère une ligne de résultat sous forme de tableau associatif
- `mysqli_fetch_object()` : retourne la ligne courante d’un jeu de résultat sous forme d’objet
- et `mysqli_free_result()` : libère la mémoire associée à un résultat

Liens :

- `mysqli` : http://fr.php.net/manual/fr/book.mysqli.php
- La classe `mysqli` : https://www.php.net/manual/fr/class.mysqli.php

`PDO` fournit une interface d’abstraction à l’accès de données, ce qui signifie que vous utilisez les mêmes fonctions pour exécuter des requêtes ou récupérer les données quelque soit la base de données utilisée.

Liens :

- `PDO` : http://www.php.net/manual/fr/book.pdo.php
- La classe `PDO` : https://www.php.net/manual/fr/class.pdo.php

Mise en oeuvre d'une base de données MySQL sous Ubuntu :

```sh
# Installation :
$ sudo apt install mysql-server

# État du service MySQL :
$ sudo systemctl status mysql.service

# Démarrage du serveur MySQL :
$ sudo systemctl start mysql.service

# Redémarrage du serveur MySQL :
$ sudo systemctl restart mysql.service

# Arrêt du serveur MySQL :
$ sudo systemctl stop mysql.service

# Accès à la console mysql :
$ mysql -uroot -ppassword -hlocalhost
mysql>

# Liste les bases de données :
mysql> show databases;

# Sélection d'une base de données :
mysql> use maBase;

# Liste les tables d’une base de données :
mysql> show tables;

# Sélection des données d’une table :
mysql> select * from mesures;

...
```

Lien : https://doc.ubuntu-fr.org/mysql

Pour installer une base de données, il faut :

- créer la base de données (`CREATE DATABASE maBase`)
- créer les tables (`CREATE TABLE mesures` ... etc ...)
- insérer des données dans les tables (`INSERT INTO mesures` ... etc ...)

L’ensemble de ces commandes peut être sauvegardé dans un fichier `.sql`.

```sh
$ mysql -uroot -ppassword -hlocalhost < maBase.sql
```

Structure et contenu en SQL d'une base de données `salles` :

```sql
DROP DATABASE IF EXISTS `salles`;
CREATE DATABASE `salles` DEFAULT CHARACTER SET utf8;
USE `salles`;

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
```

Voir aussi :

- http://tvaira.free.fr/projets/activites/activite-base-donnees.html
- http://tvaira.free.fr/projets/activites/activite-base-donnees-schema.html
