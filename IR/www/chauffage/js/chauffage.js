const graphiqueTemperature = document.getElementById('graphiqueTemperature');

const graphe = {
    autosize: true,
    titlefont: {
        //family: 'Roboto',
        family: 'Courier New, monospace',
        //size: 14,
        color: '#000'
    },
    xaxis: {
        //autorange: false,
        //fixedrange: true,
        //tickangle: 90,
        //nticks: 5,
        linewidth: 2
    },
    yaxis: {
        titlefont: {
            family: 'Courier New, monospace',
            //size: 14,
            color: '#000'
        },
        linecolor: 'black',
        linewidth: 2,
        autosize: false,
    },
    margin: {
        autoexpand: false,
        l: 60,
        r: 10,
        b: 20,
        t: 35,
        pad: 0
    }
};

let grapheTemperature = JSON.parse(JSON.stringify(graphe));
grapheTemperature.title = '<b>Température</b>';
grapheTemperature.yaxis.title = '<b>°C</b>';
grapheTemperature.yaxis.range = [0, 50];
let timestamps = [];
let temperatures = [];

$(document).ready(function()
{
    console.log("jQuery prêt");

    // Pour la led
    $(".industrial").industrial({});

    function allumerLed()
    {
        $('#led').attr('class','meter green');
        $(".industrial.led").industrial(true);
    }

    function eteindreLed()
    {
        $('#led').attr('class','meter red');
        $(".industrial.led").industrial(true);
    }

    function desactiverLed()
    {
        $('#led').attr('class','meter');
        $(".industrial.led").industrial(false);
    }

    function dessinerGraphiques(mesure)
    {
        const options = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
        //const options = { hour: '2-digit', minute: '2-digit' };
        var horodatage = (new Date()).toLocaleTimeString('fr-FR', options);
        timestamps.push(horodatage);
        temperatures.push(parseFloat(mesure));
        if(temperatures.length > 10)
        {
            timestamps.shift();
            temperatures.shift();
        }

        var donneesTemperature = {
            x: timestamps,
            y: temperatures,
            mode: 'lines+markers',
            marker: {
                color: 'rgb(55, 128, 191)',
                size: 8
            },
            line: {
                shape: 'spline',
                color: 'rgb(55, 128, 191)',
                width: 1
            }
            //type: 'scatter',
            //connectgaps: true
        };

        var donnees = [donneesTemperature];
        Plotly.newPlot(graphiqueTemperature, donnees, grapheTemperature, { responsive: true, locale: 'fr' });
    }

    function recupererDonnees()
    {
        console.log("Acquisition des données");
        $.ajax({
            type: "POST",
            url: "communication.php",
            //data: "mode=READ&module=SONDE",    // trame périodique
            data: "mode=GET&module=SONDE", // trame requête/réponse
            dataType : 'json',
            success: function(data)
            {
                console.log(data);
                if(!data["erreur"])
                {
                    if(parseFloat(data["temperature"]) > -270)
                    {
                        $("#valeurTemperature").html(data["temperature"] + "°C");
                        dessinerGraphiques(data["temperature"]);
                    }
                    if(data["humidite"])
                    {
                        $("#valeurHumidite").html(data["humidite"] + "%");
                    }
                    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
                    var str = (new Date()).toLocaleDateString('fr-FR', options);
                    String.prototype.ucFirst=function(){return this.substr(0,1).toUpperCase()+this.substr(1);}
                    var horodatage = str.ucFirst().replace(',','<br>');
                    $('#horodatageTemperature').html(horodatage);
                    $('#horodatageHumidite').html(horodatage);
                }
                else
                {
                    desactiverLed();
                }
            },
            error: function() {
                console.log("Erreur !");
                desactiverLed();
            }
        });
    }

    function recupererBDD()
    {
        console.log("Récupération des données");
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
        var str = (new Date()).toLocaleDateString('fr-FR', options);
        String.prototype.ucFirst=function(){return this.substr(0,1).toUpperCase()+this.substr(1);}
        var horodatage = str.ucFirst().replace(',',' ');
        $('#horodatage-serveur').html(horodatage);
        $.ajax({
            type: "POST",
            url: "bdd.php",
            data: "op=GET&table=mesures&action=NB",
            dataType : 'json',
            success: function(data)
            {
                console.log(data);
                if(!data["erreur"])
                {
                    $("#nb-mesures").html("Nb mesures : " + data["nb"]);
                }
            },
            error: function() {
                console.log("Erreur !");
            }
        });
        $.ajax({
            type: "POST",
            url: "bdd.php",
            data: "op=GET&table=mesures&action=LAST",
            dataType : 'json',
            success: function(data)
            {
                console.log(data);
                if(!data["erreur"] && data["temperature"] != null)
                {
                    $("#last").html("Mesure : " + parseFloat(data["temperature"]) + " °C");
                }
                else
                    $("#last").html("Mesure : -- °C");
            },
            error: function() {
                console.log("Erreur !");
            }
        });
        $.ajax({
            type: "POST",
            url: "bdd.php",
            data: "op=GET&table=mesures&action=MOY&mesure=temperature&nb=10",
            dataType : 'json',
            success: function(data)
            {
                console.log(data);
                if(!data["erreur"] && data["moyenne"] != null)
                {
                    $("#moyenne").html("Moyenne : " + parseFloat(data["moyenne"]).toFixed(1) + " °C");
                }
                else
                $("#moyenne").html("Moyenne : -- °C");
            },
            error: function() {
                console.log("Erreur !");
            }
        });
    }

    function commander(action)
    {
        $.ajax({
            type: "POST",
            url: "communication.php",
            data: "mode=SET&module=CHAUFFAGE&action="+action,
            dataType : 'json',
            success: function(data)
            {
                console.log(data);
                if(!data["erreur"])
                {
                    if(action == "ON")
                    {
                        allumerLed();
                        $("#commande").html('Eteindre');
                    }
                    else if(action == "OFF")
                    {
                        eteindreLed();
                        $("#commande").html('Allumer');
                    }
                }
                else
                {
                    desactiverLed();
                }
            },
            error: function() {
                console.log("Erreur !");
                desactiverLed();
            }
        });
    }

    function afficherMeteo()
    {
        $.ajax({
            type: "POST",
            url: "meteo.php",
            dataType : 'html',
            success: function(data)
            {
                //console.log(data);
                $('#meteo').html(data);
            },
            error: function() {
                console.log("Erreur !");
            }
        });
    }

    recupererDonnees();
    console.log("Période acquisition : " + $("#periode-acquisition").val());
    setInterval(recupererDonnees, $("#periode-acquisition").val());

    recupererBDD();
    console.log("Période bdd : " + $("#periode-bdd").val());
    setInterval(recupererBDD, $("#periode-bdd").val());

    afficherMeteo();
    setInterval(afficherMeteo, 10*60000); // 10 minutes

    $("#commande").click(function()
    {
        console.log("Commande chauffage : " + $("#commande").html());
        if($("#commande").html() == "Allumer")
        {
            commander("ON");
        }
        else if($("#commande").html() == "Eteindre")
        {
            commander("OFF");
        }
    });

    $("#purge").click(function()
    {
        $.ajax({
            type: "POST",
            url: "bdd.php",
            data: "op=PURGE&table=mesures",
            dataType : 'json',
            success: function(data)
            {
                console.log(data);
            },
            error: function() {
                console.log("Erreur !");
            }
        });
        $.ajax({
            type: "POST",
            url: "bdd.php",
            data: "op=GET&table=mesures&action=NB",
            dataType : 'json',
            success: function(data)
            {
                console.log(data);
                if(!data["erreur"])
                {
                    $("#nb-mesures").html("Nb mesures : " + data["nb"]);
                }
            },
            error: function() {
                console.log("Erreur !");
            }
        });
    });
});
