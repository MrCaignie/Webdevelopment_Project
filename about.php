<?php
session_start(); // Start de sessie om gegevens te behouden tussen verschillende verzoeken
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Pagina</title>
    <link rel="stylesheet" href="style_info.css"> <!-- Verwijst naar je CSS-stijlen -->
</head>
<body>
    <nav> <!-- Verzamelt alle navigatie-items -->
        <ul class="navigatie">
            <li><a href=index.php>Home</a></li> <!-- Links aan de linkerkant -->
            <li><a href="about.php">Info</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li class="login"><a href="login.php">Login</a></li> <!-- Log in knop aan de rechterkant -->
            <li class="registreren"><a href="registreren.php">Registreren</a></li>
        </ul>
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
    <ul>
        <li>3 tot 6 jaar: kleuterjudo à €80/jaar (35 trainingen)</li>
        <li>7 tot 12 jaar: kinderjudo à €150/jaar (120 trainingen)</li>
        <li>+12 tot 55 jaar: tiener- en volwassenjudo à €160/jaar (120 trainingen)</li>
        <li>+55 tot 99 jaar: volwassenjudo à €160/jaar (45 trainingen)</li> 
        <br><br><br><br><br>
        <a>2e lid van hetzelfde gezin = -€10</a>
    </ul>
    </div>

    <div class="img3">
    <img src="image/Judo1.png" alt="Wedstreit 2024 Ieper">
    </div>
    <img src="image/Judohordel1.png" alt="Hordel Judo">
    <img src="image/Judohordel2.png" alt="Hordel Judo">
</section>
    
</body>
</html>