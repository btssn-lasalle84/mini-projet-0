# Bootstrap

- [Bootstrap](#bootstrap)
  - [Présentation](#présentation)
  - [Installation](#installation)
  - [Notions de base](#notions-de-base)
    - [Conteneur](#conteneur)
    - [La grille](#la-grille)
    - [Composants](#composants)
  - [Documentation](#documentation)
  - [Tests](#tests)
  - [Voir aussi](#voir-aussi)

## Présentation

Bootstrap est un _framework_ CSS. Propriété Twitter, il est sous licence open source.

> CSS (_Cascading Style Sheets), généralement appelées feuilles de style (en cascade), est un langage informatique qui décrit la présentation des documents HTML et XML. Les standards définissant CSS sont publiés par le W3C (_World Wide Web Consortium_).

> Un _framework_ désigne un ensemble de composants et d'outils logiciels qui sert à développer tout ou une partie d'un logiciel (architecture). Il est souvent fourni sous la forme d'une (ou plusieurs) bibliothèques logicielles et une manière (un "cadre") de l'utiliser.

Bootstrap est un ensemble de fichiers CSS et JavaScript.

> JavaScript est un langage de programmation de scripts principalement employé dans les pages web interactives et à ce titre est une partie essentielle des applications web. Avec les technologies HTML et CSS, JavaScript est parfois considéré comme l'une des technologies cœur du _World Wide Web_. Une grande majorité des sites web l'utilisent, et la majorité des navigateurs web disposent d'un moteur JavaScript. JavaScript a été créé en 1995 par Brendan Eich. Il a été standardisé sous le nom d'ECMAScript en juin 1997 par Ecma International dans le standard ECMA-262. JavaScript est une implémentation d'ECMAScript, celle mise en œuvre par la fondation Mozilla. Il existe d'autres implémentations (JScript par Microsoft, ActionScript par Adobe Systems, ...). JavaScript est aussi employé pour les serveurs avec l'utilisation (par exemple) de Node.js.

Bootstrap un ensemble qui contient des codes HTML et CSS, des formulaires, boutons, outils de navigation et autres éléments interactifs, ainsi que des extensions (_plugins_) JavaScript en option.

Depuis la version 2, le _framework_ adopte la conception de sites web adaptatifs (_responsive web design_), permettant aux projets utilisant Bootstrap de s'adapter dynamiquement au format des supports depuis lesquels on accède (PC, tablette, smartphone).

> Un site web _responsive_ utilise la technologie CSS3 (les _media queries_ permettent à la page d'utiliser des règles CSS différentes en fonction des caractéristiques du terminal), une extension de la règle `@media` pour adapter la mise en page à l'environnement de consultation grâce à une grille fluide dans laquelle se disposent les différents contenus de la page (dimensionnement relatif des différents blocs et redimensionnement des images en unité relative).

La dernière version de Bootstrap est la 5 (depuis 2020). Le changement majeur par rapport à la version 4 est l'abandon de jQuery en faveur de simple Javascript.

## Installation

Bootstrap est essentiellement composé :

- d'une feuille de style CSS à intégrer dans une balise `<link>` dans le `<head>` du document HTML
- de dépendances JavaScript à placer dans une balise `<script>` à la fin du document HTML juste avant la balise `<body>`

Bootstrap peut être téléchargé (https://getbootstrap.com/docs/5.1/getting-started/download/) ou utilisé à partir d'une source CDN :

Exemple pour la version 5 :

```html
<!doctype html>
<html lang="fr">
  <head>
    <!-- balises meta requises -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- balise titre requise -->
    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <!-- TODO : en construction -->

    <!-- Option 1 : Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2 : Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
```

Remarque : Popper est utilisé pour les listes déroulantes pour l'affichage et le positionnement, les infobulles, popovers pour l'affichage et le positionnement.

## Notions de base

### Conteneur

Le conteneur est l’élément de base qui possède un contenu (généralement des éléments `div`). Le conteneur est utilisé avec le système de grille. Il dispose de deux types de largeur : taille fixe, adaptée à la taille du terminal, (`class="container"`) ou fluide, 100% de la largeur disponible, (`class="container-fluid"`).

Lien : https://getbootstrap.com/docs/5.1/layout/containers/

### La grille

La grille permet de gérer la largeur des blocs de contenu pour une page.

Bootstrap gère une grille de 12 colonnes. La gouttière est l’espace qui sépare deux colonnes. Il peut être supprimé avec `no-gutters`.

Dans une grille, les lignes (`row`) servent de conteneurs (flexibles) aux colonnes (`col` ou `col-n`, _n_ précisant le nombre de colonnes).

Si on ne précise pas explicitement le nombre de colonnes alors l’espace dans la ligne sera distribué équitablement entre chacune des colonnes créées.

Le système de grille de Bootstrap peut s'adapter à la taille du terminal avec ces six points d'arrêt par défaut :

- Très petit (préfixe `xs`) < 576 pixels
- Petit (préfixe `sm`) >= 576 pixels
- Moyen (préfixe `md`) >= 768 pixels
- Grand (préfixe `lg`) >= 992 pixels
- Très grand (préfixe `xl`) >= 1200 pixels
- Extra extra large (préfixe `xxl`) >= 1400 pixels

Lien : https://getbootstrap.com/docs/5.1/layout/grid/

Par défaut, les colonnes vont occuper toute la hauteur d’une ligne. On peut modifier l'alignement avec les classes `class="align-items-x"` pour toutes les colonnes d'une ligne ou `class="align-self-x"` pour aligner des colonnes individuellement. `x` précise le type d'alignement avec les valeurs suivantes : `start` en début (en haut), `center` au centre ou `end` en fin (en bas) de la ligne. Il existe aussi les classe classes `justify-content-x` pour un alignement horizontal des colonnes dans la ligne.

Pour forcer le renvoi de colonnes à la ligne, on insère généralement un élement `div` avec une largeur de 100% avec `class="w-100"`.

Lien : https://getbootstrap.com/docs/5.1/layout/columns/

Il est possible d'imbriquer des lignes dans des colonnes pour créer des grilles complexes.

### Composants

Bootstrap fournit une feuille de style CSS qui contient des définitions de base pour tous les composants HTML, ce qui permet de disposer d'une apparence uniforme pour les textes, tableaux et les éléments de formulaires.

Le _framework_ fournit également nombre d'éléments graphiques au format standardisé : boutons, libellés, icônes, miniatures, barres de progression ...

Lien : https://getbootstrap.com/docs/5.1/components/

## Documentation

Lien : https://getbootstrap.com/docs/

## Tests

Il existe de nombreux sites qui fournissent un éditeur en ligne :

- https://www.codeply.com/
- https://onecompiler.com/bootstrap
- ...

Exemple Bootstrap version 4 :

```html
<h1>Exemples Bootstrap</h1>

<h2>Quelques composants</h2>
<!-- Quelques composants ... -->
<div class="container">
    <p>Un paragraphe (sans lead)</p>
    <p class="lead">Un paragraphe (avec lead)</p>
    <div class="alert alert-primary" role="alert">Une alerte avec <a href="#" class="alert-link">un lien</a>.</div>
    <button type="button" class="btn btn-secondary mb-2">Un bouton</button>
    <a class="btn btn-primary btn-lg" href="#" role="button">Un autre bouton</a>
    <div class="jumbotron">
        <h1 class="display-3">Un titre</h1>
        <p class="lead">Bla bla bla...</p>
        <hr class="my-4">
        <p>Bla bla bla...</p>
        <button type="button" class="btn btn-primary mb-5">Messages<span class="badge badge-light">42</span></button>
    </div>
</div>

<!-- Les classes bg-xxx ajoutent un fond de couleur aux éléments -->

<h2>Fluid or not fluid</h2>
<!-- Fluid or not fluid -->
<div class="container bg-info">
    Conteneur responsive de taille fixe (dépend de la taille du terminal)
</div>

<div class="container-fluid bg-success">
    Conteneur responsive fluide (toujours 100% de l'espace disponible)
</div>

<h2>Une simple grille</h2>
<!-- Une simple grille -->
<div class="container">
    <div class="row">
        <div class="col bg-info">Colonne 1</div>
        <div class="col bg-warning">Colonne 2</div>
        <div class="col bg-success">Colonne 3</div>
    </div>
</div>

<h2>Grille avec des colonnes de tailles différentes</h2>
<!-- Grille avec des colonnes de tailles différentes -->
<div class="container">
    <div class="row">
        <div class="col-2 bg-info">col-2</div>
        <div class="col-4 bg-warning">col-4</div>
        <div class="col-6 bg-success">col-6</div>
    </div>
</div>

<h2>Grille responsive (tablette/mobile)</h2>
<!-- Grille responsive (tablette/mobile) -->
<div class="container">
    <div class="row">
        <div class="col-2 col-md-2 bg-info">col-2</div>
        <div class="col-4 col-md-4 bg-warning">col-4</div>
        <div class="col-6 col-md-6 bg-success">col-6</div>
    </div>
</div>
```

Pour tester le _responsive_, il suffit de modifier la taille du terminal (cf. points d'arrêt).

## Voir aussi

- Material Design pour Bootstrap : https://mdbootstrap.com/

