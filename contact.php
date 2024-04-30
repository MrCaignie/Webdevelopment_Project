<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verzamelen van gegevens uit het formulier
    $name = trim($_POST["name"]);  // Verwijder onnodige spaties
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);  // Sanitize e-mail
    $message = htmlspecialchars($_POST["message"]);  // Bescherm tegen HTML-injectie

    // Valideren van gegevens
    if (empty($name) || empty($email) || empty($message)) {
        $error = "Vul alle velden in.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Ongeldig e-mailadres.";
    } else {
        // Stuur een e-mail naar de judo-club
        $to = "contact@judoclub.nl";  // Vervang door het juiste e-mailadres
        $subject = "Contactverzoek van $name";
        $headers = "From: $email";

        // Body van de e-mail
        $email_body = "Naam: $name\n";
        $email_body .= "E-mail: $email\n";
        $email_body .= "Bericht:\n$message\n";

        // Stuur de e-mail
        if (mail($to, $subject, $email_body, $headers)) {
            $success = "Bedankt voor het contact opnemen! We zullen zo snel mogelijk reageren.";
        } else {
            $error = "Er ging iets mis. Probeer het later opnieuw.";
        }
    }
}

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

    <h1>Contact opnemen met de Judo Club</h1>
    
    <?php if (isset($success)) { ?>
        <p><?php echo $success; ?></p>  <!-- Bericht bij succesvolle verzending -->
    <?php } elseif (isset($error)) { ?>
        <p><?php echo $error; ?></p>  <!-- Bericht bij een fout -->
    <?php } ?>
    
    <form method="post" action="">
        Naam: <input type="text" name="name" required><br>
        E-mail: <input type="email" name="email" required><br>
        Bericht: <textarea name="message" required></textarea><br>
        <button type="submit">Verstuur</button>
    </form>
</body>
</html>