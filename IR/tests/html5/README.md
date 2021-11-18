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
  - [Viewport et Responsive Web Design](#viewport-et-responsive-web-design)
  - [Conclusion](#conclusion)

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

## Notions de base

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

## Outils de validation

Lien : http://www.w3.org/QA/Tools/#validators et http://validator.w3.org/checklink

- HTML : http://validator.w3.org/
- CSS : http://jigsaw.w3.org/css-validator/
- Correction, conversion de code : http://www.w3.org/People/Raggett/tidy/

## Viewport et Responsive Web Design

Le _Viewport_ désigne la surface de la fenêtre du navigateur. Cependant, la notion de _viewport_ sur un appareil mobile est différente de celle sur un écran d’ordinateur : sur mobile, le navigateur ne dispose pas de « fenêtre » réelle, ni de barres de défilement car tout est prévu pour naviguer de manière tactile.

La surface physique correspond au nombre physique de pixels qui composent la matrice de l’écran, telle que le constructeur le décrit dans les caractéristiques ( résolution ou plutôt la définition).

Il existe aussi la surface utilisable (en "pixels CSS"), également appelée _device-width_, qui correspond au nombre de pixels virtuels que le terminal pense avoir et sur lequel il fonde son affichage.

> La surface utilisable ne correspond pas toujours à la surface physique, notamment pour les mobiles dits "retina" ou haute définition. Un "pixel CSS" n’est donc pas égal à un pixel physique.

Liens : https://www.mydevice.io/ ou http://screensiz.es

Par défaut la taille du _viewport_ d’un terminal mobile ne correspond ni à la taille de son écran réelle ni à celle en "pixels CSS". Elle est généralement supérieure à la surface physique, afin de pouvoir y affecter un niveau de (dé)zoom.

> La valeur initiale du _viewport_ ne dépend pas du terminal mais du navigateur mobile (et peut parfois même être modifiable par l’utilisateur dans ses réglages).

Pour s’affranchir de ce zoom, il est possible de modifier et d’imposer la taille de la surface du _viewport_ d’un périphérique mobile à l’aide d’un élément `<meta>`.

Les différentes valeurs de cet élément `meta` et de son attribut `content` offrent la possibilité de fixer la largeur de _viewport_ à la valeur souhaitée, voire de l’adapter automatiquement à la valeur de _device-width_ du terminal.

`<meta name="viewport" content="width=device-width, initial-scale=1.0">`

_Responsive Web Design_ (conception de sites web adaptatifs) est une conception web qui vise, grâce à différents principes et techniques, à offrir une consultation adaptée sur des écrans de tailles très différentes.
## Conclusion

Pour être de qualité, un site doit être à la fois :

- Utile (répondre à un besoin) et
- Utilisable (par tous).

Les bonnes pratiques web :

- Respect des standards Web,
- Architecture modulaire (séparation contenu/présentation/fonctionnement)
- Responsive web design ?

Lien : https://checklists.opquast.com/fr/

