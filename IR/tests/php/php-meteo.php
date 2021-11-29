#!/usr/bin/php
<?php
// Mode CLI
// Affiche des informations météos (OpenWeather)
setlocale(LC_ALL, 'fr_FR');

echo "Météo OpenWeather openweathermap.org".PHP_EOL.PHP_EOL;

$appid = "a2157cdc4a03c47c79e8414161c59762";
$jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Avignon,FR&units=metric&lang=fr&appid=".$appid);
$jsondata = json_decode($jsonfile);
$currentTime = $jsondata->dt;

echo "Date : ".date("H:i", $currentTime)."".PHP_EOL;
$desc = ucwords($jsondata->weather[0]->description);
echo "Description : ".$desc."".PHP_EOL;
$img = "http://openweathermap.org/img/w/".$jsondata->weather[0]->icon.".png";
printf("Température : %.1f °C".PHP_EOL, $jsondata->main->temp);
echo "Humidité : ".$jsondata->main->humidity." %".PHP_EOL;
printf("Vent : %.1f km/h".PHP_EOL, ($jsondata->wind->speed*3.6));
echo "Pression : ".$jsondata->main->pressure." hPa".PHP_EOL.PHP_EOL;

$appid = "634746d10abe30ff9055d0693976af91";
$jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/forecast?id=6455379&units=metric&lang=fr&appid=".$appid);
$jsondata = json_decode($jsonfile);
$maintenant = time();
$aujourdhui  = mktime(23, 0, 0, date("m")  , date("d"), date("Y"));
for($i=0;$i<count($jsondata->list);$i++)
{
    $currentTime = $jsondata->list[$i]->dt;
    if($currentTime >= $maintenant && $currentTime <= $aujourdhui)
    {
        echo "Aujourd'hui à ".date("H:i", $currentTime)."".PHP_EOL;
        $desc = ucwords($jsondata->list[$i]->weather[0]->description);
        echo "Description : ".$desc."".PHP_EOL;
        $img = "http://openweathermap.org/img/w/".$jsondata->list[$i]->weather[0]->icon.".png";
        printf("Température : %.1f °C".PHP_EOL, $jsondata->list[$i]->main->temp);
        echo "Humidité : ".$jsondata->list[$i]->main->humidity." %".PHP_EOL;
        printf("Vent : %.1f km/h".PHP_EOL, ($jsondata->list[$i]->wind->speed*3.6));
        echo "Pression : ".$jsondata->list[$i]->main->pressure." hPa".PHP_EOL.PHP_EOL;
        break;
    }
}

$demain  = mktime(10, 0, 0, date("m")  , date("d")+1, date("Y"));
for($i=0;$i<count($jsondata->list);$i++)
{
    $currentTime = $jsondata->list[$i]->dt;
    if($currentTime == $demain)
    {
        echo "Demain à ".date("H:i", $currentTime)."".PHP_EOL;
        $desc = ucwords($jsondata->list[$i]->weather[0]->description);
        echo "Description : ".$desc."".PHP_EOL;
        $img ="http://openweathermap.org/img/w/".$jsondata->list[$i]->weather[0]->icon.".png";
        printf("Température : %.1f °C".PHP_EOL, $jsondata->list[$i]->main->temp);
        echo "Humidité : ".$jsondata->list[$i]->main->humidity." %".PHP_EOL;
        printf("Vent : %.1f km/h".PHP_EOL, ($jsondata->list[$i]->wind->speed*3.6));
        echo "Pression : ".$jsondata->list[$i]->main->pressure." hPa".PHP_EOL.PHP_EOL;
        break;
    }
}
?>
