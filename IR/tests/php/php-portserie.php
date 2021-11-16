#!/usr/bin/php
<?php
// Mode CLI
// Test de communication série avec une Arduino
// sous GNU/Linux
$nomPort = "/dev/ttyUSB0"; // ou "/dev/ttyACM0"
$mode = "r+b";
$bloquant = true; // Mode bloquant ou non bloquant
$ouvert = false;

// Constantes
define("DELIMITEUR_FIN", "\r\n"); // cf. protocole
define("TAILLE_BUFFER", 16); // à définir

// Programme principal en 5 étapes
echo 'Port : '.$nomPort.''.PHP_EOL;

// 1. Ouverture du port : https://www.php.net/manual/fr/function.fopen.php
// Remarque : @ désactive les messages d'erreurs retournés par une fonction
$port = @fopen($nomPort, $mode);
if ($port !== false)
{
    // configure le mode bloquant : https://www.php.net/manual/fr/function.stream-set-blocking.php
    stream_set_blocking($port, $bloquant);
    $ouvert = true;
}
else
{
    die("Erreur ouverture port : ".$nomPort.PHP_EOL);
}

// 2. Configuration du port
// Exemple : 9600,8,1,N
$debit = 9600;
$nbBits = 8;
$stop = "-cstopb"; // 1 bit de STOP
$parite = "-parenb"; // pas de parité
// Pour Linux voir la commande stty
$commandeConfiguration = "stty -F ".$nomPort." ".(int)$debit." cs".(int)$nbBits." ".$stop." ".$parite." -echo";
// Pour Windows : mode COMx BAUD=9600 DATA=... STOP=... PARITY=...
if (preg_match("/linux/i", php_uname()))
{
    exec($commandeConfiguration);
}

// 3. Test émission : https://www.php.net/manual/fr/function.fwrite.php
if($ouvert)
{
    $trame = '$HELLO'.DELIMITEUR_FIN;
    if (fwrite($port, $trame) === FALSE)
    {
        echo "Erreur envoi !";
    }
    echo 'Envoi trame : '.str_replace("\r\n", "", $trame).''.PHP_EOL;
}

// 4. Test réception :
/*
Documentation :
    https://www.php.net/manual/fr/function.fgets.php
    https://www.php.net/manual/fr/function.stream-get-line.php
    https://www.php.net/manual/fr/function.fread.php
*/
if($ouvert)
{
    //$trame = fgets($port, TAILLE_BUFFER); // laisse le délimiteur de fin de ligne
    // cf. man ascii
    //echo bin2hex($trame).PHP_EOL;
    //echo 'Réception trame : '.$trame.PHP_EOL;

    //$trame = stream_get_line($port, TAILLE_BUFFER, DELIMITEUR_FIN); // cf. bug #44607 si "\r\n"
    // donc :
    $trame = stream_get_line($port, TAILLE_BUFFER, "\n"); // retire le délimiteur de fin de ligne
    // cf. man ascii
    //echo bin2hex($trame).PHP_EOL;
    // Si besoin
    $trame = str_replace("\r", "", $trame);
    echo 'Réception trame : '.$trame.PHP_EOL;
}

// 5. Fermeture du port : https://www.php.net/manual/fr/function.fclose.php
if($ouvert)
{
    fclose($port);
    echo 'Fermeture du port'.PHP_EOL;
}
?>