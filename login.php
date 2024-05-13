<?php
session_start();

// MySQL-connectie
$conn = new mysqli("localhost", "root", "", "project");

if ($conn->connect_error) {
    die("Verbindingsfout: " . $conn->connect_error);
}

// Controleer of de gebruiker probeert in te loggen
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Voorbereiding van de query met een prepared statement
    $stmt = $conn->prepare("SELECT * FROM login WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Controleer of het ingevoerde wachtwoord overeenkomt met het wachtwoord in de database
        if (password_verify($password, $row['password'])) {
            // Start een sessie en sla gebruikersgegevens op
            $_SESSION['username'] = $username;
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
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Pagina</title>
    <link rel="stylesheet" href="style__login.css"> <!-- Verwijst naar je CSS-stijlen -->
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
    <h1>Inloggen</h1>
    <form method="post" action="login.php">
        Gebruikersnaam: <input type="text" name="username" required><br>
        Wachtwoord: <input type="password" name="password" required><br>
        <button type="submit">Inloggen</button>
    </form>
</body>
</html>
