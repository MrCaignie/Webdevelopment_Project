<?php
session_start(); // Start de sessie om gegevens te behouden tussen verschillende verzoeken
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
            <li><a href="about.php">Info</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li class="login"><a href="login.php">Login</a></li> <!-- Log in knop aan de rechterkant -->
            <li class="registreren"><a href="registreren.php">Registreren</a></li>
        </ul>
    </nav>
    
</body>
</html>