# Partie IR

- [Partie IR](#partie-ir)
  - [Présentation](#présentation)
  - [Objectifs](#objectifs)
  - [Partie Web](#partie-web)
  - [Partie Base de données](#partie-base-de-données)
  - [Tests](#tests)
  - [Bac à sable et développement en ligne](#bac-à-sable-et-développement-en-ligne)
  - [Ressources](#ressources)

## Présentation

Il s'agit de présenter les objectifs, contraintes et exigences de l'application réalisée par un (ou plusieurs) étudiants IR.

## Objectifs

Il s'agit de réaliser une application logicielle web afin d'interagir avec un système numérique réalisé conjointement par des étudiants IR et EC.

Les fonctionnalités demandées sont :

- communiquer via une liaison série avec un système embarqué réalisé par l'étudiant EC afin de :
  - récupérer des données en provenance du module électronique
  - envoyer des commandes et/ou paramètres de configuration au module électronique
- produire une IHM web afin :
  - d'afficher des données en provenance du module électronique
  - de commander et/ou paramétrer le module électronique
- stocker des données et/ou des paramètres de configuration (base de données et/ou fichiers)
- éventuellement d'exporter des données au format CSV et/ou JSON

## Partie Web

Le logiciel sera réalisé à partir des langages utilisés habituellement pour une application web :

- HTML5
- CSS
- JavaScript
- PHP

L'utilisation de _framework_ est recommandée (Bootstrap, jQuery, ...). Les choix doivent être validés par l'équipe enseignante.

L'application web sera hébergée sur un serveur Apache. Le poste serveur pourra être un PC (Linux ou Windows) ou un Raspberry Pi.

Arborescence de l'application web `xxx` :

```
www
└── xxx
    ├── include : contient les scripts PHP (inaccessibles à partir d'une URL)
    ├── css : contient le(s) feuille(s) de style
    ├── js : contient le(s) scripts JavaScript
    ├── sql : contient le(s) scripts SQL pour initialiser une base de données
    └── images : contient le(s) images
```

Extensions recommandées pour les fichiers :

- `.html` pour les pages web
- `.php` pour les scripts PHP accessibles à partir d'une URL
- `.inc.php` pour les fichiers PHP contenant des fonctions et/ou des données de configuration (inaccessibles à partir d'une URL)
- `.class.php` pour les scripts PHP contenant des classes (non demandé)
- `.css` pour les feuilles de style
- `.js` pour les scripts JavaScript
- `.md` pour les fichiers de documentation au format Markdown
- `.json` pour les fichiers JSON

Exigences :

- respect des normes et standard (notamment W3C)
- responsive web design (rendu pour PC, tablette et smartphone)

## Partie Base de données

Le choix de la base de données relationnelles se fera entre SQLite et MySQL (ou MariaDB). Il doit être validé par l'équipe enseignante.

L’étudiant devra fournir :

- un schéma relationnel de la base de données
- deux fichiers SQL permettant de créer et d'initialiser la base de données :
  - un fichier `.sql` de définition des données (LDD) : `ALTER`, `CREATE`, `DROP` ;
  - un fichier `.sql` de manipulation de données (LMD) : `INSERT` ;


## Tests

Le dossier `tests` fournit des ressources et contient des programmes d'exemples utiles pour la réalisation de la partie Web (HTML/CSS/JS/PHP/SQL) du mini-projet :

- `html5` :
  - `test-hello-world.html` : met en oeuvre les balises HTML5 de base
- `bootstrap` :
  - `test-hello-world.html` : permet de tester l'installation du _framework_
  - `test-grille.html` : met en oeuvre le système de grille
- `javascript` :
  - `test-hello-world-1.html` : met en oeuvre du code javascript intégré à une page web
  - `test-hello-world-2.html` : met en oeuvre du code javascript externe à une page web
  - `test-plotly.html` : montre l'affichage d'un graphique à partir d'un bibliothèque JavaScript
- `php` :
  - `php-version.php` : permet de tester la présence de l'interpréteur PHP en affichant sa version
  - `php-portserie.php` : réalise un test de communication série avec un Arduino sous GNU/Linux
  - `php-sqlite.php` : met en oeuvre la base de données SQLite
  - `php-mysql.php` : met en oeuvre la base de données MySQL

## Bac à sable et développement en ligne

Il est souvent nécessaire de passer par un "bac à sable".

> En informatique, le bac à sable (_sandbox_) est une zone d'essai permettant d'exécuter des programmes en phase de test ou dans lesquels la confiance est incertaine. C'est notamment très utilisé en sécurité informatique pour sa notion d'isolation.

Il existe de nombreux sites web qui fournissent des EDI (Environnement de Développement Intégré) en ligne pour tester du code ou des services : un espace d'apprentissage séparé. Ils permettent aussi d'échanger des exemples.

Quelques sites :

- JSFiddle : https://jsfiddle.net/ pour HTML, CSS et JavaScript
- Codeply : https://www.codeply.com/ pour les frameworks JavaScript
- Coding Ground For Developers : https://www.tutorialspoint.com/codingground.htm pour tout !
  - PHP : https://www.tutorialspoint.com/execute_php_online.php
  - MySQL : https://www.tutorialspoint.com/php_mysql_online.php
  - SQLite : https://www.tutorialspoint.com/execute_sql_online.php
  - Markdown : https://www.tutorialspoint.com/online_markdown_editor.php
- Visual Studio Code Online : https://vscode.dev/
- Gitpod : https://www.gitpod.io/
- Codeanywhere (Cloud IDE) : https://codeanywhere.com/
- Arduino : https://codecast.france-ioi.org/v4/

Pour les tests en local côté client, il faut utiliser les **outils de développement** fournis par les navigateurs Chrome et Firefox.

## Ressources

