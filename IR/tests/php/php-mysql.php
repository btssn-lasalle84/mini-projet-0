#!/usr/bin/php
<?php
// Mode CLI
// Test de base de données MySQL
// sous GNU/Linux
// Pré-requis : sudo apt install php-mysql
// Documentation : https://www.php.net/manual/fr/mysql.php

// Vérification des extensions
// mysqli ?
if (!extension_loaded('mysqli'))
  die("L'extension mysqli n'est pas présente !".PHP_EOL);
if (!class_exists('mysqli'))
  die("La classe mysqli n'est pas présente !".PHP_EOL);
// ou :
//if(!in_array("mysqli", get_declared_classes()))
//  die("La classe mysqli n'est pas présente !".PHP_EOL);

// PDO ?
if(!in_array("PDO", get_loaded_extensions()))
  die("L'extension PDO n'est pas présente !".PHP_EOL);
if(!in_array("pdo_mysql", get_loaded_extensions()))
  die("L'extension pdo_mysql n'est pas présente !".PHP_EOL);

// Configuration d'accès à la base de données
$serveur = "localhost";
$utilisateur = "test";
$motDePasse = "password";
$nomBase = "salles";

// Programme principal en 5 étapes (2 versions)
echo 'Base de données MySQL : '.$nomBase.''.PHP_EOL;

// Version a1 : fonctions mysqli
echo 'Fonctions mysqli'.PHP_EOL;

// 1. Connexion à la base de données
$bdd = mysqli_connect($serveur, $utilisateur, $motDePasse, $nomBase);
if (!$bdd)
  die('Echec de connexion au serveur de base de données : '.mysqli_connect_error().'('.
mysqli_connect_errno().')'.PHP_EOL);

// Affichage de la version du serveur
echo "MySQL server version : ".mysqli_get_server_info($bdd)."".PHP_EOL;

// 2. Requête SQL
$requete = "SELECT salles.* FROM salles ORDER BY `nom` ASC";
echo 'Requête SQL : "'.$requete.'"'.PHP_EOL;

if ($resultat = mysqli_query($bdd, $requete))
{
  printf("La requête a retourné %d enregistrement(s).".PHP_EOL, mysqli_num_rows($resultat));
  // Tableau indexé
  while($ligne = mysqli_fetch_array($resultat, MYSQLI_NUM))
  {
    print_r($ligne);
  }
  // Libération des résultats
  mysqli_free_result($resultat);
}

if ($resultat = mysqli_query($bdd, $requete))
{
  printf("La requête a retourné %d enregistrement(s).".PHP_EOL, mysqli_num_rows($resultat));
  // Tableau associatif
  while($ligne = mysqli_fetch_array($resultat))
  {
    print_r($ligne);
  }
  // Libération des résultats
  mysqli_free_result($resultat);
}

// 3. Fermeture de la connexion
mysqli_close($bdd);

// Version a2 : classe mysqli
echo 'Classe mysqli'.PHP_EOL;

// 1. Connexion à la base de données
$bdd = new mysqli($serveur, $utilisateur, $motDePasse, $nomBase);
if ($bdd->connect_error)
  die('Echec de connexion au serveur de base de données : '.mysqli_connect_error().'('.
mysqli_connect_errno().')'.PHP_EOL);

// 2. Requête SQL
$requete = "SELECT salles.* FROM salles ORDER BY `nom` ASC";
echo 'Requête SQL : "'.$requete.'"'.PHP_EOL;

if ($resultat = $bdd->query($requete))
{
  printf("La requête a retourné %d enregistrement(s).".PHP_EOL, $resultat->
  num_rows);
  // Tableau associatif
  while($ligne = $resultat->fetch_array())
  {
    print_r($ligne);
  }
  // Libération des résultats
  $resultat->free();
}

// 3. Fermeture de la connexion
$bdd->close();

// Version b : PDO
echo 'Classe PDO'.PHP_EOL;

// 1. Connexion à la base de données
$bdd = new PDO('mysql:host='.$serveur.';dbname='.$nomBase.'', $utilisateur, $motDePasse) or die("Echec de la création de l'instance PDO !".PHP_EOL);

// 2. Requête SQL
$requete = "SELECT salles.* FROM salles ORDER BY `nom` ASC";
echo 'Requête SQL : "'.$requete.'"'.PHP_EOL;

if ($resultat = $bdd->query($requete))
{
  printf("La requête a retourné %d enregistrement(s).".PHP_EOL, $resultat->rowCount());

  // Tableau indexé
  /*while($ligne = $resultat->fetch(PDO::FETCH_NUM))
  {
    print_r($ligne);
  }*/
  //printf ("%s - %s<br />\n", $row[0], $row[1]);
  // Tableau associatif
  /*while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
  {
    print_r($ligne);
  }*/
  // ou tous les résultats de la requête
  $lignes = $resultat->fetchAll();
  print_r($lignes);
}

// 3. Fermeture de la connexion
unset($bdd);
?>