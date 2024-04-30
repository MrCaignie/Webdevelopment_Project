<?php
// MySQL-connectie (vervang door jouw databasegegevens)
$conn = new mysqli("localhost", "root", "", "project");

// Controleer verbinding
if ($conn->connect_error) {
    die("Verbindingsfout: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash het wachtwoord voordat het wordt opgeslagen
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    // Voeg gebruiker toe aan database
    $stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);
    $stmt->execute();

    echo "Registratie geslaagd!";
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Pagina</title>
    <link rel="stylesheet" href="style_registreren.css"> <!-- Verwijst naar je CSS-stijlen -->
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

    <h1>Registreren</h1>
    <form method="post" action="registreren.php">
        Gebruikersnaam: <input type="text" name="username" required><br>
        Wachtwoord: <input type="password" name="password" required><br>
        <button type="submit">Registreren</button>
    </form>
</body>
</html>