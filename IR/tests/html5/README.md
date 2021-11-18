# HTML5

- [HTML5](#html5)
  - [Présentation](#présentation)
  - [Un peu d'histoire](#un-peu-dhistoire)
    - [Notions de base](#notions-de-base)
    - [Version d'un document HTML](#version-dun-document-html)
    - [DTD](#dtd)
    - [Encodage](#encodage)
    - [Éléments](#éléments)
    - [Attributs](#attributs)
    - [Document](#document)
    - [L’en-tête du document](#len-tête-du-document)
    - [Le corps du document](#le-corps-du-document)
    - [Exemple](#exemple)
    - [Outils de validation](#outils-de-validation)
  - [Conclusion](#conclusion)
  - [Notions de base](#notions-de-base-1)
    - [Conteneur](#conteneur)
    - [La grille](#la-grille)
    - [Composants](#composants)
  - [Documentation](#documentation)
  - [Tests](#tests)

## Présentation

HTML signifie _HyperText Markup Language_.

C’est un langage de description de document conçu pour représenter des documents hypertextuels (notion de liens), appelés aujourd’hui « pages web ».

Il permet également de structurer sémantiquement et de mettre en forme le contenu des pages en utilisant des balises (_Markup Language_).

Il est initialement dérivé du SGML (_Standard Generalized Markup Language_), jugé trop complexe.

> HTML n’est ni un protocole ni un langage de programmation.

L’utilisation conjointe d’un ensemble de technologies permet la réalisation de « documents web » :

- Document HTML (ou XHTML) pour la structure sémantique des informations ;
- Feuille de style CSS (_Cascading Style Sheets_) pour la présentation des informations ;
- Interface DOM (_Document Object Model_) et langage de programmation JavaScript pour afficher et interagir dynamiquement avec l’information présentée ;

> L’ensemble de ces technologies sont interprétés côté client (par le navigateur par exemple).

## Un peu d'histoire

[Tim Berners-Lee](https://fr.wikipedia.org/wiki/Tim_Berners-Lee) est un informaticien britannique, principal inventeur du _World Wide Web_ (WWW) au tournant des années 1990 lors de ses travaux au CERN.

« Je n’ai fait que prendre le principe d’hypertexte et le relier au principe du TCP et du DNS et alors - boum ! - ce fut le World Wide Web ! »

Le _World Wide Web_ est basé sur trois inventions, le protocole de communication client/serveur HTTP (_Hypertext Transfer Protocol_), les adresses web (URI/URL) et le langage HTML (_HyperText Markup Language_).

La spécification HTML5 a été finalisé en 2014.

### Notions de base

### Version d'un document HTML

Un doctype (« type de document ») est une instruction au début des documents SGML et XML (et donc HTML) spécifiant sa DTD.

La déclaration de type de document indique la définition de type de document (DTD) en vigueur pour le document.

Un document HTML valide doit donc déclarer la version HTML qu’il utilise :

Pour HTML 5, il faut préciser :

```html
<!doctype html>
```

### DTD

La _Document Type Definition_ (DTD), ou Définition de Type de Document, est un document permettant de décrire un modèle de document SGML, XML ou HTML.

Une DTD indique les noms des éléments pouvant apparaître et leur contenu, c’est-à-dire les sous-éléments et les attributs. En dehors des attributs, le contenu est spécifié en indiquant le nom, l’ordre et le nombre d’occurrences autorisées des sous-éléments. L’ensemble constitue la définition des hiérarchies valides d’éléments et de texte.

Le document sera jugé valide lorsqu’il possède et respecte sa DTD.

### Encodage

Le processus de détection de l’encodage a également été modifié et s’effectue dans l’ordre :

- la vérification de la présence d’un en-tête HTTP Content-Type :


```html
<!-- version courte en HTML5 -->
<meta charset="utf-8">

<!-- ou version longue -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
```

- ensuite la détection du BOM (_Byte Order Mark_) en début de fichier, qui indique l’utilisation d’un encodage unicode ainsi que l’ordre des octets. En UTF-8, l’indicateur d’ordre des octets est codé par la séquence `EF BB BF`.

Le choix de l’UTF-8 est désormais préconisé par le W3C.

### Éléments

Le langage HTML utilise d’éléments (ou balise ou _tag_) pour structurer et décrire un document.

`<balise>...</balise>` ou `<balise>` ou `<balise />` (auto-fermante)

Les fonctionnalités implémentées par HTML peuvent être réparties ainsi : structure générale d’un document HTML, informations sur la langue, marquage sémantique, listes, tables, hyperliens, inclusion d’images, d’applets et d’objets divers, éléments de regroupement, style de la présentation, marquage de présentation du texte, cadres, formulaire pour l’insertion interactive de données, scripts.

La spécification HTML5 en anglais : https://html.spec.whatwg.org/multipage/

La version HTML5 a supprimé notamment les balises suivantes :

- `basefont`, `big`, `center`, `font`, `strike`, `tt` et `u` car leurs effets étaient purement représentatifs ce qui est le rôle de CSS.
- `frame`, `frameset` et `noframes` pour des problèmes d’accessibilité et d’utilisation
- `acronym`, `isindex` et `dir` (utilisé alors `ul`)
- `applet` est remplacé par `object`

La version HTML5 a ajouté des nouvelles balises, notamment celles-ci pour la structure d’un document :

- `main` : définit le contenu principal de la page, il doit être unique dans la page.
- `section` : définit les sections du document, telles que les chapitres, en-têtes, pieds de page
- `article` : partie indépendante d’un site, comme un commentaire
- `header` : spécifie un en-tête (comme une introduction ou des éléments de navigation)
- `footer` : définit le pied de page d’un article ou un document
- `nav` : définit une section dans la navigation.

Et d’autres nouvelles balises importantes : `figure` (et `figcaption`), `audio`, `video`, `embed`, `time`, `canvas`, ...

### Attributs

Les attributs permettent de préciser les propriétés des éléments HTML.

`<balise attribut="valeur">...</balise>`

Remarque : Il y avait par exemple 188 attributs dans la version 4 de HTML.

Certains attributs s’appliquent à presque tous les éléments. D’autres attributs sont propres à un élément unique (ou similaire).

La plupart des attributs sont facultatifs. Quelques éléments ont cependant des attributs obligatoires (attributs `src` et `alt` pour l’élément `img`).

Certains attributs sont enfin de type booléen (exemple `selected`).

La spécification HTML5 en anglais (de nombreux attributs ont été ajoutés) : https://html.spec.whatwg.org/multipage/

### Document

Un document HTML est défini par une balise racine nommée `html`. Cette balise accepte l’attribut `lang` qui précise la langue utilisée pour le contenu de la page : 

`<html lang="fr">`

Le document comprend deux parties : un en-tête (pour les métadonnées sur le document) délimité par `head` et le corps du document défini par `body`.

Exemple simple HTML5 :

```html
<!doctype html>
<html lang="fr">
  <head>
    <!-- balise titre requise -->
    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
  </body>
</html>
```

Remarque : Les balises `<!-- ... -->` sont des commentaires en HTML.

Lien : https://www.w3.org/TR/html5-diff/

### L’en-tête du document

L’entête (optionnel) du document HTML est délimité par l’élement `head` qui contient des informations sur le document, tels que son titre (élément `title` obligatoire), et d’autres données (les métadonnées) qui ne sont pas considérées comme faisant partie du contenu du document (`body`).

L’élément `meta` représente un mécanisme générique pour spécifier des métadonnées. On peut utiliser l’élément `meta` pour identifier les propriétés d’un document (par exemple, l’auteur, la date d’expiration, une liste de mots-clés, etc.) et assigner des valeurs à ces propriétés.

- les propriétés du document : Chaque élément `meta` spécifie un couple propriété/valeur. L’attribut `name` identifie la propriété et l’attribut `content` en spécifie la valeur. Par exemple : `<meta name="Auteur" content="Thierry Vaira">`

- les en-têtes HTTP : l’attribut http-equiv (à la place de name), a un sens particulier quand les documents sont ramenés via le protocole HTTP. Par exemple : `<meta http-equiv="Expires" content="Tue, 20 Aug 1996 14:25:27 GMT">`

- les moteurs de recherche : une utilisation courante consiste à spécifier des mots-clés qu’un moteur de recherche peut utiliser pour améliorer la pertinence du résultat d’une recherche. Par exemple : `<meta name="keywords" lang="fr" content="vacances, soleil">`

Exemple classique HTML5 :

```html
<!doctype html>
<html lang="fr">
  <head>
    <!-- balises meta requises -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- balise titre requise -->
    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
  </body>
</html>
```

On utilise généralement l’élément `meta` pour spécifier les informations par défaut sur un document dans les cas suivants :

- le langage de script par défaut ;
- le langage de feuille de style CSS par défaut ;
- l’encodage de caractères du document.

### Le corps du document

Le corps du document (élément `body`) représente le contenu du document.

On peut assimiler le corps à un canevas dans lequel s’inscrit le contenu : le texte, les images, les couleurs, les graphiques, etc.

Puisque les feuilles de style (CSS) sont désormais le moyen conseillé de spécifier la présentation d’un document, les attributs de présentation des éléments sont donc proscrits.

Le W3C recommande aux auteurs et aux développeurs de séparer la structure et la présentation.

### Exemple

```html
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exemple</title>
  </head>
  <body>
    <header>En-tête</header>
    <!-- <nav>Navigation</nav> -->
    <main>
      <article>Un article</article>
      <article>Un seconde article</article>
    </main>
    <footer>Pied de page</footer>
  </body>
</html>
```

### Outils de validation

Lien : http://www.w3.org/QA/Tools/#validators et http://validator.w3.org/checklink

- HTML : http://validator.w3.org/
- CSS : http://jigsaw.w3.org/css-validator/
- Correction, conversion de code : http://www.w3.org/People/Raggett/tidy/

## Conclusion

Pour être de qualité, un site doit être à la fois :

- Utile (répondre à un besoin) et
- Utilisable (par tous).

Les bonnes pratiques web :

- Respect des standards Web,
- Architecture modulaire (séparation contenu/présentation/fonctionnement)
- Responsive web design ?

Lien : https://checklists.opquast.com/fr/

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

