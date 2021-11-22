<?php

define("HOME_PATH", "/var/www/html/chauffage/");

// Application
$config['nom'] = 'Chauffage';
$config['titre'] = 'Mini-projet Chauffage';
$config['description'] = 'Mini-projet 0 : Chauffage';
$config['signature'] = '©&nbsp;2021&nbsp;v0.1&nbsp;BTS SN La Salle Avignon';
$config['charset'] = 'utf-8';
$config['periode-acquisition'] = 60 * 1000; // en ms
//$config['periode-acquisition'] = 5 * 1000; // en ms
$config['periode-bdd'] = 30 * 1000; // en ms

// Base de données
$config['bd'] = "mysql"; // Choix possible : "mysql" (ou "sqlite")
$config['dbname'] = "chauffage"; // pour "mysql" (ou "sqlite")
$config['host'] = "localhost"; // seulement pour "mysql"
$config['username'] = "chauffage"; // seulement pour "mysql"
$config['passwd'] = "password"; // seulement pour "mysql"

// Communication
$config['nomPort'] = "/dev/ttyUSB0"; // ou "/dev/ttyACM0"
$config['modeOuverture'] = "r+b";
$config['bloquant'] = true;
$config['configurationPort'] = "9600,8,1,N";

?>
