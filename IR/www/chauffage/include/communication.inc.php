<?php
require_once ('./include/config.inc.php');

// Constantes
define("DELIMITEUR_DEBUT", "$"); // cf. protocole
define("DELIMITEUR_FIN", "\r\n"); // cf. protocole
define("DELIMITEUR_CHAMP", ";"); // cf. protocole
define("TAILLE_BUFFER", 32); // à définir

function ouvrirPort($nomPort, $modeOuverture="r+b", $bloquant=true)
{
    $port = @fopen($nomPort, $modeOuverture);
    if ($port !== false)
    {
        stream_set_blocking($port, $bloquant);
    }
    return $port;
}

function configurerPort($nomPort, $configurationPort="9600,8,1,N")
{
    // TODO : assurer les vérifications de la configuration
    list($debit, $nbBits, $nbBitsStop, $choixParite) = explode(",", $configurationPort);
    if(nbBitsStop == "1")
        $stop = "-cstopb"; // 1 bit de STOP
    if($choixParite)
        $parite = "-parenb"; // pas de parité

    $commandeConfiguration = "stty -F ".$nomPort." ".(int)$debit." cs".(int)$nbBits." ".$stop." ".$parite." -echo";
    // TODO Pour Windows : mode COMx BAUD=9600 DATA=... STOP=... PARITY=...
    if (preg_match("/linux/i", php_uname()))
    {
        exec($commandeConfiguration);
    }
}

function fermerPort($port)
{
    if ($port !== false)
    {
        fclose($port);
    }
}

function envoyerTrame($port, $trame)
{
    if ($port !== false)
    {
        if (fwrite($port, $trame) === FALSE)
        {
            return false;
        }
        fflush($port);
        return true;
    }
    return false;
}

function recevoirTrame($port)
{
    $trame = "";
    if ($port !== false)
    {
        $trame = stream_get_line($port, TAILLE_BUFFER, "\n");
        $trame = str_replace("\r", "", $trame);
    }
    return $trame;
}

?>