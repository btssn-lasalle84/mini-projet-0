$(document).ready(function()
{
    console.log("jQuery prêt");

    afficherHorodatage();
    afficherFortune();

    function afficherHorodatage()
    {
        /*var date = new Date();
        var hours = "0" + date.getHours();
        var minutes = "0" + date.getMinutes();
        var seconds = "0" + date.getSeconds();
        var formattedTime = hours.substr(-2) + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);*/
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
        var str = (new Date()).toLocaleDateString('fr-FR', options);
        String.prototype.ucFirst=function(){return this.substr(0,1).toUpperCase()+this.substr(1);}
        var horodatage = str.ucFirst();
        $('#horodatage').html(horodatage);
    }

    function afficherFortune()
    {
        $.ajax({
            type: "POST",
            url: "http://tvaira.free.fr/chromecast/fortune.php",
            dataType : 'html', // voir aussi 'json'
            success: function(data)
            {
                //console.log(data);
                $('#fortune').html(data);
            },
            error: function() {
                console.log('Erreur ajax');
            }
        });
    }

    setInterval(afficherHorodatage, 1000); // 1 seconde
    setInterval(afficherFortune, 5*60000); // 5 minutes
});
