<?php
// Start een sessie
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_bestuur.css">
    <title>Clubbestuur</title>
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

    <div class="container">
        <h1>Clubbestuur</h1>
        <p>Hallo, leuk je te leren kennen.</p>
        <p>Een club bestaat natuurlijk niet enkel uit trainers en leden, maar ook uit bestuursleden die zich vrijwillig inzetten achter de schermen. We stellen ze aan je voor.</p>
        
        <div class="member">
            <img src="image/Jean-Philippe.jpg" alt="Jean-Philippe">
            <h2>Jean-Philippe Luypaert</h2>
            <p>Voorzitter</p>
            <p>Jean-Philippe is naast trainer ook actief als voorzitter van de club. Hij zorgt voor de algemene leiding van de club en is de eindverantwoordelijke.</p>
        </div>
        
        <div class="member">
            <img src="image/Ann.jpg" alt="An Dewaele">
            <h2>An Dewaele</h2>
            <p>Secretaris</p>
            <p>An houdt zich bezig met het dagelijks bestuur van de club.  Bij An kan je terecht met al jullie vragen!</p>
        </div>

        <div class="member">
            <img src="image/trainer.png" alt="Korneel Maes">
            <h2>Korneel Maes</h2>
            <p>Penningmeester</p>
            <p>Korneel houdt zich bezig met de taken die nodig zijn voor de financiële administratie van de club.</p>
        </div>

        <div class="member">
            <img src="image/Karlheinz.jpg" alt="Karlheinz Bouciqué">
            <h2>Karlheinz Bouciqué</h2>
            <p>Bestuurslid</p>
            <p>Karlheinz houdt zich bezig met het dagelijks bestuur van de club.</p>
        </div>

        <div class="member">
            <img src="image/Gunter.jpg" alt="Gunter Archie">
            <h2>Gunter Archie</h2>
            <p>Bestuurslid</p>
            <p>Gunter houdt zich bezig met het dagelijks bestuur van de club.</p>
        </div>

        <div class="member">
            <img src="image/Wouter.jpg" alt="Wouter Luypaert">
            <h2>Wouter Luypaert</h2>
            <p>Bestuurslid, hoofdtrainer</p>
            <p>Wouter houdt zich bezig met het dagelijks bestuur van de club en is hoofdtrainer.</p>
        </div>

        <!-- Voeg hier andere bestuursleden toe -->

    </div>
</body>
</html>