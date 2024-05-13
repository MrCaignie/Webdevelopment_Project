<?php
session_start(); // Start de sessie om gegevens te behouden tussen verschillende verzoeken
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Pagina</title>
    <link rel="stylesheet" href="style__index1.css"> <!-- Verwijst naar je CSS-stijlen -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script> 
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow"); // Toggle between slide down and slide up
            });

        // Slide up the panel when the page has finished loading (wil niet werken)
        // $(window).on('load', function(){
        //    $("#panel").slideUp(); // Speed up the slide animation
        //  });
        });

</script>
</head>
<body>
    <nav> <!-- Verzamelt alle navigatie-items -->
        <ul class="navigatie">
            <li><a id="flip">Onze Club</a></li>
            <li><a href="about.php">Info</a></li>
            <li><a href="loginVereist.php">Contact</a></li>
            <li class="login"><a href="login.php">Login</a></li> <!-- Log in knop aan de rechterkant -->
            <li class="registreren"><a href="registreren.php">Registreren</a></li>
        </ul>
        <div id="panel">
            <ul>
                <li><a href="bestuur.php">Bestuursleden</a></li> <!-- Links aan de linkerkant -->
                <li><a href="trainers.php">Trainers</a></li>
                <li><a href="index.php">Visie</a></li>
            </ul>
        </div>
    </nav>
    </head>
    <!-- Clubinformatie -->
    <div class="container">
        <h1>Judo, een hobby, een passie.</h1>
        <section>
        <div class="visie">
            <h2>Onze visie</h2>
            <p>Neko wil zijn leden inspireren. Bij ons is iedereen welkom; starten kan vanaf 3 jaar, maar je bent nooit te oud om in te stappen. Judo beginnen als tiener of volwassene kan zeker ook, wij zijn er om het je te leren!  Bij Neko geloven wij dat sporten is niet alleen goed voor het lichaam, maar ook voor de geest. Gewoon voor het plezier, of heb je toch grotere ambities? Onze trainers tonen je de knepen van het vak en begeleiden de judoka’s op weg naar hun eerste gordel en zelfs naar die felbegeerde zwarte gordel.</p>
            <img src="image/2015-training.png" alt="Onze visie" class="training2015">
            <p>Kinderen met ADHD, autisme of andere fysieke verhinderingen zijn zeker ook welkom. Sporten, en zeker judo, biedt vaak een ideale uitlaatklep. Contacteer ons voor vragen.</p>
        </div>
        </section>
        <section>
        <div class="kwaliteit">
            <h3>Kwalitatieve club</h3>
            <img src="image/Jeugdsport.png" alt="Kwalitatieve club" class="Jeugdsport">
            <p>Judoclub Neko is drager van de hoogste Vlaamse Judofederatie erkenning: jeugdjudo met gouden label. Er zijn slechts 27 gouden clubs in België. Met deze hoogste erkenning weet je meteen dat je bij onze club uitstekend zit.</p>
            <p>Wil je eens een judotraining van dichtbij zien? Dat kan! Breng dan gerust een bezoekje aan onze dojo (trainigszaal in het Japans) tijdens de trainingsuren. Vooraf een seintje per email of telefoon is steeds handig om zeker te zijn of de training effectief doorgaat of niet. Spelenderwijs judo beoefenen en genieten van deze leuke sport. Wie weet heb je een groot talent en word jij wel de volgende Gella Vandecaveye (Medailles op Olympische Spelen, WK, EK, BK, Wereldjeugdkampioene judo & Europees jeugdkampioene), Dirk Van Tichelt 'De Beer van Brecht' (Medailles op Ek en BK) of Ulla Werbrouck (Medailles op Olympische Spelen, WK, EK, BK en Europees jeugdkampioene judo) en zovele anderen.</p>
        </div>
        </section>
    </div>

    <!-- Contactinformatie -->
    <section class="contact-info">
        <h2>Contactinformatie</h2>
        <p>Adres: Brugseweg, 12, Ieper, 8900</p> <!-- Vervang met je clubadres -->
        <p>Telefoonnummer: +32 0494 49 20 21</p> <!-- Vervang met je telefoonnummer -->
        <p>E-mail: <a href="mailto: info@neko-ieper.be">e-mail</a></p> <!-- Vervang met je e-mailadres -->
    </section>
</body>
</html>