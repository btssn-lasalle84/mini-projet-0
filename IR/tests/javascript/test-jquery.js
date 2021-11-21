$(document).ready(function()
{
    console.log("jQuery prêt");

    function fonctionPeriodique()
    {
        console.log("fonctionPeriodique()");
        compteur = parseInt($("#compteur").text()); // conversion en entier
        console.log("compteur = " + compteur);
        compteur = compteur + 1;
        $("#compteur").text(compteur);
    }

    // Installe une fonction périodique
    setInterval(fonctionPeriodique, 5000);

    // Les sélecteurs : https://www.w3schools.com/jquery/jquery_selectors.asp
    // # -> attribut id
    $("#bouton").click(function()
    {
        console.log("clic bouton");
        // Exemples :
        // valeur des éléments d'un formulaire
        if($("#module").val())
            alert("Module : " + $("#module").val());
        // contenu des éléments du document
        if($("#bouton").html() == "ON") // cf. text()
        {
            $("#bouton").html('OFF');
            // . -> attribut class
            $(".message").hide();
            horodatage = new Date(); // cf. https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/Date
            console.log("Timestamp : "+horodatage.getTime());
            evenement = "ON : " + horodatage.getDate() + "/" + (horodatage.getMonth()+1) + "/" + horodatage.getFullYear() + " " + horodatage.getHours() + ":" + horodatage.getMinutes() + ":" + horodatage.getSeconds();
            // balise
            $("ol").append("<li>" + evenement + "</li>");
        }
        else if($("#bouton").html() == "OFF")
        {
            $("#bouton").html('ON');
            // . -> attribut class
            $(".message").show();
            horodatage = new Date(); // cf. https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/Date
            console.log("Timestamp : "+horodatage.getTime());
            evenement = "OFF : " + horodatage.getDate() + "/" + (horodatage.getMonth()+1) + "/" + horodatage.getFullYear() + " " + horodatage.getHours() + ":" + horodatage.getMinutes() + ":" + horodatage.getSeconds();
            // balise
            $("ol").append("<li>" + evenement + "</li>");
        }
        else
        {
            console.log("erreur !");
        }
    });
});
