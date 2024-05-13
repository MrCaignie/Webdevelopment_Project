<?php
session_start();

// MySQL-connectie
$conn = new mysqli("localhost", "root", "", "project");

if ($conn->connect_error) {
    die("Verbindingsfout: " . $conn->connect_error);
}

// Controleer of de gebruiker probeert in te loggen
if (isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])) {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    // Query om gebruikersgegevens op te halen uit de database
    $query = "SELECT * FROM gebruikers WHERE gebruikersnaam='$gebruikersnaam'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Controleer of het ingevoerde wachtwoord overeenkomt met het wachtwoord in de database
        if ($row['wachtwoord'] === $wachtwoord) {
            // Start een sessie en sla gebruikersgegevens op
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            $_SESSION['rol'] = $row['rol'];
            header("Location: contact.php"); // Stuur de gebruiker door naar de beveiligde pagina
            exit;
        } else {
            echo "Ongeldige gebruikersnaam of wachtwoord";
        }
    } else {
        echo "Gebruiker niet gevonden";
    }
}

// Stuur de gebruiker door naar de inlogpagina als deze niet is ingelogd
header("Location: login.php");
exit;
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Pagina</title>
    <link rel="stylesheet" href="style.css"> <!-- Verwijst naar je CSS-stijlen -->
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
</body>
</html>