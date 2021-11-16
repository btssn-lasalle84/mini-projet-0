#!/usr/bin/php
<?php
// Mode CLI
// Test de base de données SQLite3
// sous GNU/Linux
// Pré-requis : sudo apt install php-sqlite3
$nomBDD = "salles.db";
$salles = array();

// Programme principal en 5 étapes
echo 'Base de données SQLite3 : '.$nomBDD.''.PHP_EOL;

// 1. Ouverture de la base de données
$base = new SQLite3($nomBDD);
if(!$base)
    die("Erreur ouverture BD : ".$nomBDD.PHP_EOL);

// 2. Requête SQL
$requete = "SELECT salles.* FROM salles ORDER BY `nom` ASC";
echo 'Requête SQL : "'.$requete.'"'.PHP_EOL;
if ($result = $base->query($requete))
{
    echo 'Résultats :'.PHP_EOL;
    $n = 0;
    do
    {
        $salle = $result->fetchArray();
        if($salle)
        {
            $salles[$n++] = $salle;

            //var_dump($salle);
            for($i = 0; $i < $result->numColumns(); $i++)
            {
                $nomColonne = $result->columnName($i);
                $valeurColonne = $salle[$nomColonne];
                echo "\t$nomColonne -> $valeurColonne".PHP_EOL;
            }
            echo "".PHP_EOL;
        }
    }
    while($salle);
}

// 3. Fermeture de la base de données
if($base != NULL)
    $base->close();
?>