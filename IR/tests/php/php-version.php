#!/usr/bin/php
<?php
// Mode CLI
// Affiche la version de PHP et des informations sur le système

// https://www.php.net/manual/fr/function.phpversion.php
echo 'Version PHP : '.phpversion()."".PHP_EOL;

if (defined('PHP_VERSION_ID'))
{
    //echo 'PHP_VERSION_ID      : '.PHP_VERSION_ID."".PHP_EOL;
    $version = explode('.', PHP_VERSION);
    //var_dump($version);
    echo 'PHP_MAJOR_VERSION   : '.$version[0]."".PHP_EOL;
    echo 'PHP_MINOR_VERSION   : '.$version[1]."".PHP_EOL;
    echo 'PHP_RELEASE_VERSION : '.$version[2]."".PHP_EOL;
}

echo 'Système : '.php_uname().PHP_EOL;

// Sinon l'incontournable :
// https://www.php.net/manual/fr/function.phpinfo.php
//phpinfo();
?>