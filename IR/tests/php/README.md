# PHP

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

## Éléments de syntaxe

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

`̀``php
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
`̀``

## Programmer en PHP sous Ubuntu

Lien : https://doc.ubuntu-fr.org/php

Version de PHP :

`̀``sh
$ php --version
PHP 7.2.19-0ubuntu0.18.04.2 (cli) (built: Aug 12201919:34:28) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
with Zend OPcache v7.2.19-0ubuntu0.18.04.2, Copyright (c) 1999-2018, by Zend Technologies

$ php -m

$ which php
/usr/bin/php
`̀``

Un script PHP (mode CLI) :

`̀``php
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
`̀``

> La première ligne sert à préciser le chemin de l’interpréteur précédé des caractères `̀#!`̀ (le _shebang_) qui exécutera le script. Cette ligne est inutile dans le cas d’une programmation web.

Il existe plusieurs manières d’exécuter un script PHP de façon locale :

- le rendre exécutable :

`̀``sh
$ chmod +x helloworld.php

$ ./helloworld.php
`̀``

- utiliser l’interpréteur PHP :

`̀``sh
$ php helloworld.php
`̀``

## Tests

Ce dossier contient quelques programmes d'exemples utiles pour la réalisation du mini-projet :

- `php-version.php` : permet de tester la présence de l'interpréteur PHP en affichant sa version
- `php-portserie.php` : réalise un test de communication série avec un Arduino sous GNU/Linux
- `php-sqlite.php` : met en oeuvre la base de données SQLite

Le fichier `salles.db` est une base de données SQLite :

`̀``sh
$ file salles.db
salles.db: SQLite 3.x database, last written using SQLite version 3031001
`̀``

Structure et contenu en SQL :

`̀``sql
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
`̀``

