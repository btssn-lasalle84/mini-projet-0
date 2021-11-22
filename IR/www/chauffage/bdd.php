<?php
// Script appelé par Ajax

//error_reporting(E_ALL);
require_once ('./include/chauffage.inc.php');
require_once ('./include/bdd.inc.php');

function purger($table)
{
    $bdd = connecter();
    if($bdd)
    {
        $requete = "TRUNCATE TABLE ".$table.";";
        $ret = executer($bdd, $requete);
        deconnecter($bdd);
        return $ret;
    }
    return FALSE;
}

function getNbMesures($table)
{
    $resultat = 0;
    $bdd = connecter();
    if($bdd)
    {
        $requete = "SELECT COUNT(*) AS nb FROM ".$table.";";
        $resultat = selectionner($bdd, $requete);
        deconnecter($bdd);
        if(count($resultat) > 0)
            return $resultat[0]["nb"];
    }
    return $resultat;
}

function getDerniereMesure($table)
{
    $resultat = 0;
    $bdd = connecter();
    if($bdd)
    {
        $requete = "SELECT UNIX_TIMESTAMP(horodatage) as timestamp, temperature FROM ".$table." WHERE horodatage IN (SELECT max(horodatage) FROM ".$table.");";
        $resultat = selectionner($bdd, $requete);
        deconnecter($bdd);
        if(count($resultat) > 0)
            return $resultat[0];
    }
    return $resultat;
}

function getMoyenneDernieresMesures($table, $mesure, $nb)
{
    $resultat = 0;
    $bdd = connecter();
    if($bdd)
    {
        $requete = "SELECT AVG(".$mesure.") AS moyenne FROM (SELECT * FROM ".$table." ORDER BY horodatage DESC LIMIT ".$nb.") tmp ORDER BY horodatage ASC LIMIT ".$nb.";";
        $resultat = selectionner($bdd, $requete);
        deconnecter($bdd);
        if(count($resultat) > 0)
            return $resultat[0]["moyenne"];
    }
    return $resultat;
}

// Main
if(!Empty($_POST["op"]))
{
    switch($_POST["op"])
    {
        case "PURGE":
            $donnees["op"] = $_POST["op"];
            $donnees["table"] = $_POST["table"];
            if(purger($_POST["table"]))
            {
                $donnees["erreur"] = false;
                $donnees["message"] = "ok";
            }
            else
            {
                $donnees["erreur"] = true;
                $donnees["message"] = "erreur";
            }
            echo json_encode($donnees);
            break;
        case "GET":
            $donnees["op"] = $_POST["op"];
            $donnees["table"] = $_POST["table"];
            $donnees["action"] = $_POST["action"];
            switch($_POST["action"])
            {
                case "NB":
                    $donnees["nb"] = getNbMesures($_POST["table"]);
                    break;
                case "LAST":
                    $mesure = getDerniereMesure($_POST["table"]);
                    $donnees["temperature"] = $mesure["temperature"];
                    $donnees["timestamp"] = $mesure["timestamp"];
                    break;
                case "MOY":
                    $donnees["mesure"] = $_POST["mesure"];
                    $donnees["nb"] = $_POST["nb"];
                    $donnees["moyenne"] = getMoyenneDernieresMesures($_POST["table"], $_POST["mesure"], $_POST["nb"]);
                    break;
            }
            echo json_encode($donnees);
            break;
    }
}

exit;
?>
