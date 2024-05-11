<?php
session_start(); // Start de sessie om gegevens te behouden tussen verschillende verzoeken
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Pagina</title>
    <link rel="stylesheet" href="style_index1.css"> <!-- Verwijst naar je CSS-stijlen -->
</head>
<body>
    <nav> <!-- Verzamelt alle navigatie-items -->
        <ul>
            <li><a href=index.php>Home</a></li> <!-- Links aan de linkerkant -->
            <li><a href="about.php">Info</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li class="login"><a href="login.php">Login</a></li> <!-- Log in knop aan de rechterkant -->
            <li class="registreren"><a href="registreren.php">Registreren</a></li>
        </ul>
    </nav>
    </head>
    <!-- Clubinformatie -->
    <header>
        <!-- Clubnaam en logo -->
        <div class="club-info">
            <img src="image/neko_logo_low.png" alt="Clublogo" class="club-logo"> <!-- Vervang 'club_logo.png' door je logo -->
            <h1>Koninklijke Ieperse Judoclub Neko</h1> <!-- Vervang met je clubnaam -->
        </div>

        <!-- Overzicht van de club -->
        <p class="club-overview">
            Welkom bij Koninklijke Ieperse Judoclub Neko ! Neko wil zijn leden inspireren. Bij ons is iedereen welkom; starten kan vanaf 3 jaar, maar je bent nooit te oud om in te stappen. Judo beginnen als tiener of volwassene kan zeker ook, wij zijn er om het je te leren!  Bij Neko geloven wij dat sporten is niet alleen goed voor het lichaam, maar ook voor de geest. Gewoon voor het plezier, of heb je toch grotere ambities? Onze trainers tonen je de knepen van het vak en begeleiden de judoka’s op weg naar hun eerste gordel en zelfs naar die felbegeerde zwarte gordel. Kinderen met ADHD, autisme of andere fysieke verhinderingen zijn zeker ook welkom. 
        </p> <!-- Pas dit aan met je clubgegevens -->
    </header>

    <!-- Contactinformatie -->
    <section class="contact-info">
        <h2>Contactinformatie</h2>
        <p>Adres: Brugseweg, 12, Ieper, 8900</p> <!-- Vervang met je clubadres -->
        <p>Telefoonnummer: +32 0494 49 20 21</p> <!-- Vervang met je telefoonnummer -->
        <p>E-mail: <a href="mailto: info@neko-ieper.be">e-mail</a></p> <!-- Vervang met je e-mailadres -->

        <!-- Sociale media-links -->
        <div class="social-media">
            <a href="https://www.facebook.com/KJCNekoIeper">Facebook</a> <!-- Vervang met je Facebook-link -->
            <a href="https://www.instagram.com/kjc_neko_ieper/">Instagram</a> <!-- Vervang met je Instagram-link -->
        </div>
</body>
</html>