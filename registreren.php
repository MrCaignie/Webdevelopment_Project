<?php
session_start();

// MySQL-connectie
$conn = new mysqli("localhost", "root", "", "project");

if ($conn->connect_error) {
    die("Verbindingsfout: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Query om te controleren of de gebruikersnaam al bestaat
    $check_query = "SELECT * FROM login WHERE username='$username'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        echo "Gebruikersnaam bestaat al. Kies een andere gebruikersnaam.";
    } else {
        // Hash het wachtwoord voordat het wordt opgeslagen
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Stel standaardrol in voor nieuwe gebruikers
        $default_role = "gebruiker";

        // Voorbereiding van de query
        $stmt = $conn->prepare("INSERT INTO login (username, password, rol) VALUES (?, ?, ?)");
        
        // Controleer of de query succesvol is voorbereid
        if ($stmt === false) {
            die("Fout bij voorbereiden van de query: " . $conn->error);
        }
        
        // Binding parameters aan de query
        $bind_result = $stmt->bind_param("sss", $username, $hashed_password, $default_role);
        
        // Controleer of de parameters succesvol zijn gebonden
        if ($bind_result === false) {
            die("Fout bij binden van parameters: " . $stmt->error);
        }
        
        // Voer de query uit
        $execute_result = $stmt->execute();
        
        // Controleer of de query succesvol is uitgevoerd
        if ($execute_result === false) {
            die("Fout bij uitvoeren van de query: " . $stmt->error);
        }

        echo "Registratie geslaagd!";
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Pagina</title>
    <link rel="stylesheet" href="style__registreren.css"> <!-- Verwijst naar je CSS-stijlen -->
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

        // JavaScript om het modale venster te openen
function openModal() {
    document.getElementById('myModal').style.display = "block";
}

// JavaScript om het modale venster te sluiten
function closeModal() {
    document.getElementById('myModal').style.display = "none";
}

// Sluit het modale venster als de gebruiker klikt buiten het venster
window.onclick = function(event) {
    var modal = document.getElementById('myModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
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

    <h1>Registreren</h1>
    <form method="post" action="registreren.php">
        Gebruikersnaam: <input type="text" name="username" required><br>
        Wachtwoord: <input type="password" name="password" required><br>
        <button type="submit">Registreren</button>
    </form>
    
</body>
</html>
