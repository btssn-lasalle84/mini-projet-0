# JavaScript

- [JavaScript](#javascript)
  - [Présentation](#présentation)
  - [Un peu d'histoire](#un-peu-dhistoire)
  - [Documentations](#documentations)
  - [Éléments de syntaxe](#éléments-de-syntaxe)
  - [Typage](#typage)
  - [Bac à sable](#bac-à-sable)
  - [Autres](#autres)
    - [XMLHttpRequest](#xmlhttprequest)
    - [Ajax](#ajax)
    - [JSON](#json)
    - [jQuery](#jquery)
    - [Divers](#divers)

## Présentation

JavaScript (qui est souvent abrégé en « JS ») est un langage de script léger, orienté objet, principalement connu comme le langage de script des pages web.

> JavaScript ne doit pas être confondu avec le langage de programmation Java.

Le standard pour JavaScript est ECMAScript.

Site officiel : https://developer.mozilla.org/fr/docs/Web/JavaScript

Le code JavaScript a besoin d’un objet global pour y rattacher les déclarations (variables et fonctions) avant d’exécuter des instructions. La situation la plus connue est celle de l’objet `window` obtenu dans le contexte d’une page web.

Du code JavaScript peut être intégré directement au sein des pages web (avec les balises `<script></script>`, pour y être exécuté sur le poste client. C’est alors le navigateur web qui prend en charge l’exécution de ces programmes appelés scripts.

Du code JavaScript intégré directement dans une page web :

```html
<!DOCTYPE html>
<html dir="ltr" lang="fr">
  <head>
    <meta charset="utf8" />
    <title>Du code JavaScript intégré directement dans une page web</title>
    <script>
    alert('Hello world!');
    </script>
  </head>
  <body>
  </body>
</html>
```

Le code JavaScript peut être placé dans un (ou plusieurs) fichiers séparés (extension par défaut `.js`) :

```html
<!DOCTYPE html>
<html dir="ltr" lang="fr">
  <head>
    <meta charset="utf8" />
    <title>Du code JavaScript externe</title>
    <script src="test.js"></script>
  </head>
  <body>
  </body>
</html>
```

## Un peu d'histoire

JavaScript a été créé en 1995 par Brendan Eich.

Il a été standardisé sous le nom d'ECMAScript en juin 1997 par Ecma International dans le standard ECMA-262. JavaScript est une implémentation d'ECMAScript, celle mise en œuvre par la fondation Mozilla.

## Documentations

Liens :

- https://developer.mozilla.org/fr/docs/Web/JavaScript
- https://jquery.com/ et surtout https://api.jquery.com/
- https://jquerymobile.com/ et surtout https://api.jquerymobile.com/

## Éléments de syntaxe

Le langage JavaScript utilise une syntaxe très proche de celle utilisée en C/C++.

En C, chaque instruction se termine par un point-virgule `;`. JavaScript est plus souple, permettant à une fin de ligne de marquer implicitement la fin d’une instruction. Cet usage est déconseillé.

## Typage

Tous les langages de programmation permettent de manipuler des valeurs avec des variables. Le typage d’une variable consiste à associer à son nom un « type » de donnée.

> Pour rappel, le « type » est la convention d’interprétation (codage) de la séquence de bits qui constitue la variable. Le type de la variable spécifie aussi la longueur de cette séquence (8 bits, 32 bits, 64 bits, ...).

JavaScript est doté d’un typage dynamique faible :

- Typage dynamique : il consiste à laisser l’interpréteur réaliser cette opération de typage « à la volée » lors de l’exécution du code. C’est la valeur affectée à la variable qui précisera son type. Exemples de langage à typage dynamique : PHP, Perl, Python, Javascript, bash (shell Linux)
- Typage faible : Un langage de programmation est dit faiblement typé lorsqu’il ne considère pas comme une erreur les changements de types. Exemples de langage faiblement typé : PHP, Javascript, C (car il accepte les transtypages implicites comme par exemple int vers short)

Exemple d’utilisation des types en JavaScript :

```js
var a = 1; // un nombre
var b = 2.5; // un nombre
var c = "hello"; // une chaine de caracteres
var d; // undefined

console.log(typeof a);
console.log(typeof b);
console.log(typeof c);
console.log(typeof d);

d = a; // un nombre
console.log(a);
console.log(b);
console.log(c);
console.log(d);

var x = "5"; // une chaine de caracteres
var y = 1+ y; // un nombre
console.log(typeof x);
console.log(typeof y);

console.log(y); // NaN (Not a Number)
```

## Bac à sable

Il est souvent nécessaire de passer par le "bac à sable".

> En informatique, le bac à sable (_sandbox_) est une zone d'essai permettant d'exécuter des programmes en phase de test ou dans lesquels la confiance est incertaine. C'est notamment très utilisé en sécurité informatique pour sa notion d'isolation.

On peut par exemple utiliser JSFiddle (https://jsfiddle.net/) pour avoir un espace d'apprentissage séparé.

JSFiddle est un service IDE en ligne pour tester du code HTML, CSS et JavaScript. Il permet en plus d'échanger des exemples.

Dans JSFiddle, il y a 4 zones dont 3 éditables :

- HTML : le code HTML mais seulement à partir de la balise <body> (non incluse)
- CSS : le code CSS directement
- JavaScript : le code JavaScript en pouvant choisir différents frameworks : JavaScript + jQuery 1.9.1 (la version la plus proche du projet).
- Navigateur : pour l’affichage et une console pour les logs.

On peut ajouter des ressources (des liens vers des APIs) dans le panneau de gauche.

Exemples :

- Notion de fonction → https://jsfiddle.net/tvaira/3uqn6hev/4/
- Notion de classe/objet → https://jsfiddle.net/tvaira/w1ubdc0j/14/

## Autres

### XMLHttpRequest

XMLHttpRequest est un objet ActiveX ou Javascript qui permet d’obtenir des données au format XML, mais aussi HTML, ou encore texte simple à l’aide de requêtes HTTP.

L’avantage principal est dans le côté **asynchrone**. La page entière ne doit plus être rechargée en totalité lorsqu’une partie doit changer ce qui entraîne un gain de temps et une meilleure interaction avec le serveur et donc le client.

### Ajax

AJAX est un acronyme signifiant _Asynchronous JavaScript and XML_ et désignant une solution informatique libre pour le développement d’applications Web.

AJAX n’est pas une technologie en elle-même, mais un terme qui évoque l’utilisation conjointe d’un ensemble de technologies libres couramment utilisées sur le Web :

- HTML (ou XHTML) pour la structure sémantique des informations ;
- CSS pour la présentation des informations ;
- DOM et JavaScript pour afficher et interagir dynamiquement avec l’information présentée ;
- l’objet XMLHttpRequest pour échanger et manipuler les données de manière asynchrone avec le serveur Web.
- XML/JSON pour le format des données informatives et visuelles

Voir : [jQuery](#jquery)

### JSON

JSON (_JavaScript Object Notation_) est un format de données textuelles dérivé de la notation des objets du langage JavaScript.

Il permet de représenter de l’information structurée comme le permet XML par exemple.

Un document JSON comprend deux types d’éléments structurels : des ensembles de paires « nom » (alias « clé ») / « valeur » et des listes ordonnées de valeurs.

Ces mêmes éléments représentent trois types de données : des objets, des tableaux et des valeurs génériques de type tableau, objet, booléen, nombre, chaîne de caractères ou null.

Il est notamment utilisé comme langage de transport de données par AJAX et les services Web. D’autres solutions sont possibles comme XML.

Exemple JSON:

```json
{
  "menu": {
    "id": "file",
    "value": "File",
    "popup": {
      "menuitem": [
        { "value": "New", "onclick": "CreateNewDoc()" },
        { "value": "Open", "onclick": "OpenDoc()" },
        { "value": "Close", "onclick": "CloseDoc()" }
      ]
    }
  }
}
```

### jQuery

jQuery est une bibliothèque JavaScript libre et multiplateforme créée pour faciliter l’écriture de scripts côté client dans le code HTML des pages web.

Le but de la bibliothèque étant le parcours et la modification du DOM. Elle contient de nombreuses fonctionnalités : notamment des animations, la manipulation des feuilles de style en cascade (accessibilité des classes et attributs), la gestion des évènements, etc.

L’utilisation d’Ajax est facilitée et de nombreux _plugins_ sont présents.

jQuery a connu un large succès auprès des développeurs Web et son apprentissage est aujourd’hui un des fondamentaux de la formation aux technologies du Web. Il est à l’heure actuelle la bibliothèque _front-end_ la plus utilisée au monde (plus de la moitié des sites Internet en ligne intègrent jQuery).

> Émergence de nouvelles librairies : React (JavaScript) et Vue.js, AngularJS, ...

jQuery se présente comme un unique fichier JavaScript contenant toutes les fonctions de base.

Il peut être inclus dans une page web de plusieurs façons :

- en téléchargeant le fichier source à partir du site officiel jquery.com :

`< script src="/chemin/vers/jQuery.js"></script>`

- parmi les CDN (_Content Delivery Networks_) proposés, par exemple :

`<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>`

Tous les appels jQuery sont faits dans une seule fonction anonyme (sans nom !) :

```js
$(function() {
  // le code jQuery ...
});

// ou :

$(document).ready(function() {
  // le code jQuery ...
});
```

jQuery permet d’accèder aux éléments du DOM. Plusieurs types de sélecteurs sont prévus. Par exemple il est possible de sélectionner :

- à partir de l’attribut id d’un élément HTML :

`$('#idElement')`

• à partir du type d’élément :

`$('p')`

- à partir d’une classe CSS :

`$('.uneClasse')`

Quelques exemples :

```js
// écrire un message dans une balise <p id='exemple'> :
$('#exemple').html('Un message');

// cacher la balise <p id='exemple'> :
$('#exemple').hide();

// afficher la balise <p id='exemple'> :
$('#exemple').show();

// exécuter un code lorsqu'on clique sur la balise <p id='exemple'> :
$("#exemple").click(function() {
  // Le code à exécuter ...
});

// modifier les attributs d'une balise <p class='paragraphe'> :
$('.paragraphe').css('background','black');
$('.paragraphe').css('color','white');

// récupérer un attribut d'une balise :
var lien = $('a').attr('href');
alert(lien);
```

### Divers

Il existe de très très nombreuses bibliothèques JavaScript.

En voici quelques unes :

**jQuery UI** est une collection de widgets, effets visuels et thèmes implémentés avec jQuery, des feuilles de style en cascade, et du HTML. jQuery UI permet le glisser-déposer (drag & drop), le redimensionnement, la sélection, et le classement (tri).

**DataTables** est un _plugin_ jQuery open-source permettant de dynamiser un tableau HTML. Cette bibliothèque écrite en Javascript offre un grand nombre de configurations pour améliorer l’ergonomie des grilles de données, surtout lorsqu’elles ont des proportions imposantes.

**Plotly** est une bibliothèque graphique JavaScript permettant de créer notamment des diagrammes graphiques. Lien : https://plotly.com/javascript/

**Industrial.js** fournit quelques _widgets_ techniques. Lien : http://brennana.github.io/industrial-js/

**Canvas Gauge** fournit des _widgets_ jauges. Lien : https://canvas-gauges.com/documentation/examples/ Voir aussi : (https://bernii.github.io/gauge.js/)

**JQuery Mobile** est un _framework_ d’interface optimisé pour les appareils mobiles tactiles. Son objectif est de permettre de rapidement développer des applications mobiles ou des applications web monopage en réponse à la grande diversité des Smartphones et tablettes sur le marché. Il est développé par l’équipe du projet JQuery. Il s’appuie sur l’utilisation des technologies du web : HTML5, CSS3, DOM, Javascript, Ajax.

Exemples :

- Test jQuery Mobile → https://jsfiddle.net/tvaira/e67ho3jb/29/
- TP jQuery Mobile - Séquence 2 : navigation → https://jsfiddle.net/tvaira/m3ev4r0x/9/
- Événement pagecontainerbeforeshow → https://jsfiddle.net/tvaira/s4fp8q06/30/

