<?php
require_once ('./include/config.inc.php');
define('DEBUG', true);

function verifierSupportMySQL()
{
    if (extension_loaded('mysqli'))
        return TRUE;
    return FALSE;
}

$host    = $_SERVER['HTTP_HOST'];
$uri     = rtrim(dirname($_SERVER['REQUEST_URI']), '/\\');

define('LOAD', true);

// Fonctions pour le débogage
function debug($var, $nom="")
{
    if (!defined('DEBUG'))
        return;
    echo "<pre style=\"padding: 10px 10px 10px 10px; color: #ff4000; border: 1px dashed red;overflow-x: auto;\"><code>";
    if(!Empty($nom))
        echo "<b>-> $".$nom." :</b>&nbsp;";
    var_dump($var);
    echo "</code></pre>";
}

function toString($var)
{
    $v = print_r($var, true);
    $s = str_replace("\n", "", $v);
    $str = preg_replace('/\s\s+/', ' ', $s);
    return $str;
}

?>