<?php
// Script appelé par Ajax

//error_reporting(E_ALL);
require_once ('./include/chauffage.inc.php');
require_once ('./include/communication.inc.php');
require_once ('./include/bdd.inc.php');

function recevoir($module)
{
    $donnees = array();
    $donnees["module"] = $module;
    $donnees["mode"] = "periodique";
    $port = ouvrirPort($GLOBALS['config']['nomPort'], $GLOBALS['config']['modeOuverture'], $GLOBALS['config']['bloquant']);
    if(!$port)
    {
        $donnees["erreur"] = true;
        $donnees["message"] = "erreur ouverture port !";
        echo json_encode($donnees);
        return;
    }

    configurerPort($GLOBALS['config']['nomPort'], $GLOBALS['config']['configurationPort']);

    $trameRecue = recevoirTrame($port);
    $donnees["trame"] = $trameRecue;
    $champs = explode(";", $trameRecue);
    if($champs[0] == '$'.$module)
    {
        $donnees["temperature"] = $champs[1];
        enregistrer($donnees["temperature"]);
        $donnees["humidite"] = $champs[3];
        $donnees["erreur"] = false;
        $donnees["message"] = "ok";
    }
    else
    {
        $donnees["erreur"] = true;
        $donnees["message"] = "erreur reception";
    }

    fermerPort($port);

    echo json_encode($donnees);
}

function commander($module, $action="")
{
    $donnees = array();
    $donnees["module"] = $module;
    $donnees["action"] = $action;
    $port = ouvrirPort($GLOBALS['config']['nomPort'], $GLOBALS['config']['modeOuverture'], $GLOBALS['config']['bloquant']);
    if(!$port)
    {
        $donnees["erreur"] = true;
        $donnees["message"] = "erreur ouverture port !";
        echo json_encode($donnees);
        return;
    }

    configurerPort($GLOBALS['config']['nomPort'], $GLOBALS['config']['configurationPort']);

    // Exemple : $SET;CHAUFFAGE;ON\r\n"
    $trame = DELIMITEUR_DEBUT."SET".DELIMITEUR_CHAMP.$module.DELIMITEUR_CHAMP.$action.DELIMITEUR_FIN;
    $donnees["trame"] = $trame;
    $retour = envoyerTrame($port, $trame);
    if($retour)
    {
        $donnees["erreur"] = false;
        $donnees["message"] = "ok";
    }
    else
    {
        $donnees["erreur"] = true;
        $donnees["message"] = "erreur";
    }

    fermerPort($port);

    echo json_encode($donnees);
}

function interroger($module)
{
    $donnees = array();
    $donnees["mode"] = "interrogation";
    $donnees["module"] = $module;
    $port = ouvrirPort($GLOBALS['config']['nomPort'], $GLOBALS['config']['modeOuverture'], $GLOBALS['config']['bloquant']);
    if(!$port)
    {
        $donnees["erreur"] = true;
        $donnees["message"] = "erreur ouverture port !";
        echo json_encode($donnees);
        return;
    }

    configurerPort($GLOBALS['config']['nomPort'], $GLOBALS['config']['configurationPort']);

    // Exemple requête : $GET;SONDE\r\n"
    $trame = DELIMITEUR_DEBUT."GET".DELIMITEUR_CHAMP.$module.DELIMITEUR_FIN;
    $donnees["requete"] = $trame;
    $retour = envoyerTrame($port, $trame);
    if($retour)
    {
        usleep(100000);
        // Exemple réponse : $SONDE;21.5;C;43;%\r\n"
        $trameRecue = recevoirTrame($port);
        $donnees["reponse"] = $trameRecue;
        $champs = explode(";", $trameRecue);
        if($champs[0] == '$'.$module)
        {
            $donnees["temperature"] = $champs[1];
            enregistrer($donnees["temperature"]);
            $donnees["humidite"] = $champs[3];
            $donnees["erreur"] = false;
            $donnees["message"] = "ok";
        }
        else
        {
            $donnees["erreur"] = true;
            $donnees["message"] = "erreur reception";
        }
    }
    else
    {
        $donnees["erreur"] = true;
        $donnees["message"] = "erreur emission";
    }

    fermerPort($port);

    echo json_encode($donnees);
}

// Main
if(!Empty($_POST["mode"]))
{
    switch($_POST["mode"])
    {
        case "GET": // mode requête/réponse
            interroger($_POST["module"]);
            break;
        case "SET": // mode commande
            commander($_POST["module"], $_POST["action"]);
            break;
        case "READ": // mode périodique
            recevoir($_POST["module"]);
            break;
        default:
            $donnees["mode"] = $_POST["mode"];
            $donnees["erreur"] = true;
            $donnees["message"] = "erreur mode";
            echo json_encode($donnees);
            break;
    }
}

exit;
?>
