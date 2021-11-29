<?php
setlocale(LC_ALL, 'fr_FR');

$jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Avignon,FR&units=metric&lang=fr&appid=a2157cdc4a03c47c79e8414161c59762");
$jsondata = json_decode($jsonfile);
$currentTime = $jsondata->dt;
echo "<div class='col-lg-3'>";
echo "        <div class='card bg-light'>";
echo "            <div class='card-header'>À ".date("H:i", $currentTime)."</div>";
echo "            <div class='card-body'>";
$desc = ucwords($jsondata->weather[0]->description);
echo "              <span class='card-text'><img src='http://openweathermap.org/img/w/".$jsondata->weather[0]->icon.".png' class='weather-icon' />$desc</span>";
printf( "              <h4 class='card-title'>Température : %.1f &deg;C</h4>", $jsondata->main->temp);
echo "                 <h4 class='card-title'>Humidité : ".$jsondata->main->humidity." %</h4>";
printf( "              <h4 class='card-title'>Vent : %.1f km/h</h4>", ($jsondata->wind->speed*3.6));
echo "                 <h4 class='card-title'>Pression : ".$jsondata->main->pressure." hPa</h4>";
echo "            </div>";
echo "        </div>";
echo "</div>";

$jsonfile = file_get_contents("http://api.openweathermap.org/data/2.5/forecast?id=6455379&units=metric&lang=fr&appid=634746d10abe30ff9055d0693976af91");
$jsondata = json_decode($jsonfile);
$maintenant = time();
$aujourdhui  = mktime(23, 0, 0, date("m")  , date("d"), date("Y"));
for($i=0;$i<count($jsondata->list);$i++)
{
    $currentTime = $jsondata->list[$i]->dt;
    if($currentTime >= $maintenant && $currentTime <= $aujourdhui)
    {
        echo "<div class='col-lg-3'>";
        echo "        <div class='card bg-light'>";
        echo "            <div class='card-header'>Aujourd'hui à ".date("H:i", $currentTime)."</div>";
        echo "            <div class='card-body'>";
        $desc = ucwords($jsondata->list[$i]->weather[0]->description);
        echo "              <span class='card-text'><img src='http://openweathermap.org/img/w/".$jsondata->list[$i]->weather[0]->icon.".png' class='weather-icon' />$desc</span>";
        printf( "           <h4 class='card-title'>Température : %.1f &deg;C</h4>", $jsondata->list[$i]->main->temp);
        echo "              <h4 class='card-title'>Humidité : ".$jsondata->list[$i]->main->humidity." %</h4>";
        printf( "           <h4 class='card-title'>Vent : %.1f km/h</h4>", ($jsondata->list[$i]->wind->speed*3.6));
        echo "              <h4 class='card-title'>Pression : ".$jsondata->list[$i]->main->pressure." hPa</h4>";
        echo "            </div>";
        echo "        </div>";
        echo "</div>";
        break;
    }
}

$demain  = mktime(10, 0, 0, date("m")  , date("d")+1, date("Y"));
for($i=0;$i<count($jsondata->list);$i++)
{
    $currentTime = $jsondata->list[$i]->dt;
    if($currentTime == $demain)
    {
        echo "<div class='col-lg-3'>";
        echo "        <div class='card bg-light'>";
        echo "            <div class='card-header'>Demain à ".date("H:i", $currentTime)."</div>";
        echo "            <div class='card-body'>";
        $desc = ucwords($jsondata->list[$i]->weather[0]->description);
        echo "              <span class='card-text'><img src='http://openweathermap.org/img/w/".$jsondata->list[$i]->weather[0]->icon.".png' class='weather-icon' />$desc</span>";
        printf( "           <h4 class='card-title'>Température : %.1f &deg;C</h4>", $jsondata->list[$i]->main->temp);
        echo "              <h4 class='card-title'>Humidité : ".$jsondata->list[$i]->main->humidity." %</h4>";
        printf( "           <h4 class='card-title'>Vent : %.1f km/h</h4>", ($jsondata->list[$i]->wind->speed*3.6));
        echo "              <h4 class='card-title'>Pression : ".$jsondata->list[$i]->main->pressure." hPa</h4>";
        echo "            </div>";
        echo "        </div>";
        echo "</div>";
        break;
    }
}
?>
