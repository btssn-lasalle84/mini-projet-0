<?php
//error_reporting(E_ALL);
//require_once ('./config.inc.php');
//require_once ('./include/chauffage.inc.php');
//require_once ('./chauffage.inc.php');

function enregistrer($mesure)
{
    $bdd = connecter();
    if($bdd)
    {
        $requete = "INSERT INTO mesures (temperature, horodatage) VALUES (".$mesure.", NOW());";
        executer($bdd, $requete);
        deconnecter($bdd);
    }
}

function connecter()
{
    $bdd = FALSE;
    if(verifierSupportMySQL())
        $bdd = mysqli_connect($GLOBALS['config']['host'], $GLOBALS['config']['username'], $GLOBALS['config']['passwd'], $GLOBALS['config']['dbname']);
    return $bdd;
}

function deconnecter($bdd)
{
    if($bdd)
        mysqli_close($bdd);
}

function selectionner($bdd, $requete)
{
    $resultats = array();
    if(!$bdd)
        return $resultats;
    if ($resultat = mysqli_query($bdd, $requete))
    {
        if(mysqli_num_rows($resultat) < 1)
            return $resultats;
        $n = 0;
        while($ligne = mysqli_fetch_array($resultat))
        {
            $resultats[$n] = $ligne;
            $n++;
        }
        mysqli_free_result($resultat);
    }
    return $resultats;
}

function executer($bdd, $requete)
{
    if(!$bdd)
        return FALSE;
    $resultat = mysqli_query($bdd, $requete);
    return $resultat;
}

?>