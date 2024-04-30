<?php
session_start();

// MySQL-connectie
$conn = new mysqli("localhost", "root", "", "project");

if ($conn->connect_error) {
    die("Verbindingsfout: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Zoek de gebruiker op basis van de gebruikersnaam
    $stmt = $conn->prepare("SELECT password FROM login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        // Inlog succesvol
        $_SESSION["username"] = $username;
        echo "Ingelogd als " . $username;
    } else {
        echo "Ongeldige gebruikersnaam of wachtwoord";
    }

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
    <link rel="stylesheet" href="style.css"> <!-- Verwijst naar je CSS-stijlen -->
</head>
<body>
    <nav> <!-- Verzamelt alle navigatie-items -->
        <ul>
            <li><a href=index.php>Home</a></li> <!-- Links aan de linkerkant -->
            <li><a href="about.php">About</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li class="login"><a href="login.php">Login</a></li> <!-- Log in knop aan de rechterkant -->
            <li class="registreren"><a href="registreren.php">Registreren</a></li>
        </ul>
    </nav>
    <h1>Inloggen</h1>
    <form method="post" action="login.php">
        Gebruikersnaam: <input type="text" name="username" required><br>
        Wachtwoord: <input type="password" name="password" required><br>
        <button type="submit">Inloggen</button>
    </form>
</body>
</html>