<?php
//
// Voor inlog als admin -> wachtwoord is dan: kC140905 (puur voor leerkracht indien nodig)
// Pagina voor mijn github: https://github.com/MrCaignie/Webdevelopment_Project
//
// Start een sessie
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Pagina</title>
    <link rel="stylesheet" href="style_about.css"> <!-- Verwijst naar je CSS-stijlen -->
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

<h1>Waarom sporten bij Neko?</h1>

<section>
    <div class="textblok1">
    <h2>Over de Club</h2>
    <p>
        Judoclub Neko Ieper is een dynamische club met een gevarieerd aanbod. Onze trainers begeleiden de judoka's op een leuke manier op weg naar de gewenste gordel. We werken met verschillende leeftijdsgroepen, maar ook met grootte, gewicht en ervaring wordt rekening gehouden. Benieuwd om dat van dichtbij te zien? Je bent meer dan welkom om met of zonder afspraak een les mee te volgen vanuit onze cafetaria of een proefles te doen.
    </p>
    </div>

    <div class="img1">
    <img src="image/training +18.jpg" alt="Treining +18">
    </div>
</section>

<section>
    <div class="textblok2">
    <h2>Proeflessen</h2>
    <p>
        Judo eerst eens proberen? Dat kan! Onze club biedt standaard gratis judolessen aan. De judomicrobe te pakken? Dan kun je je gewoon inschrijven.
    </p>
    <ul>
        <li>Kinderen jonger dan 6 jaar: 1 gratis judoles</li>
        <li>Kinderen van 6 tot 18 jaar: 10 gratis proeflessen</li>
        <li>Volwassenen boven 18 jaar: 3 gratis proeflessen</li>
    </ul>
    </div>

    <div class="img2">
    <img src="image/kleuterjudo.jpg" alt="Kleuterjudo">
    </div>
</section>

<section>
    <div class="textblok3">
    <h2>Prijzen</h2>
    <p>
        Het lidgeld wordt jaarlijks betaald en loopt van de maand waarop men zich inschrijft tot het jaar daarop dezelfde maand.
    </p>
    </div>

    <table class="tbl">
        <tr>
            <th>Leeftijdsgroep</th>
            <th>Soort Judo</th>
            <th>Jaarlijkse kosten</th>
            <th>Aantal trainingen</th>
        </tr>
        <tr>
            <td>3 tot 6 jaar</td>
            <td>Kleuterjudo</td>
            <td>€80</td>
            <td>35</td>
        </tr>
        <tr>
            <td class="highlight">7 tot 12 jaar</td>
            <td class="highlight">Kinderjudo</td>
            <td class="highlight">€150</td>
            <td class="highlight">120</td>
        </tr>
        <tr>
            <td>+12 tot 55 jaar</td>
            <td>Tiener- en Volwassenjudo</td>
            <td>€160</td>
            <td>120</td>
        </tr>
        <tr>
            <td>+55 tot 99 jaar</td>
            <td>Volwassenjudo</td>
            <td>€160</td>
            <td>45</td>
        </tr>
    </table>
        
    <br>
    <a>2e lid van hetzelfde gezin = -€10</a>

    <div class="img3">
    <img src="image/Judo1.png" alt="Wedstreit 2024 Ieper">
    </div>
</section>
<section>
    <img src="image/Judohordel1.png" alt="Hordel Judo">
    <img src="image/Judohordel2.png" alt="Hordel Judo">
</section>

<!-- Sociale media-links -->
<div class="social-media">
            <a href="https://www.facebook.com/KJCNekoIeper">Facebook</a> <!-- Vervang met je Facebook-link -->
            <a href="https://www.instagram.com/kjc_neko_ieper/">Instagram</a> <!-- Vervang met je Instagram-link -->
    </div>
    
</body>
</html>