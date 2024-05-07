<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

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
        // Setup PHPMailer
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;  //Change to DEBUG_SERVER for detailed logs
            $mail->isSMTP();                      //Send using SMTP
            $mail->Host = 'smtp.example.com';     //Set the SMTP server to send through
            $mail->SMTPAuth = true;               //Enable SMTP authentication
            $mail->Username = 'user@example.com'; //SMTP username
            $mail->Password = 'secret';           //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //TLS encryption
            $mail->Port = 465;                    //TCP port for SMTPS, use 587 with STARTTLS

            //Recipients
            $mail->setFrom($email, $name);  // Set sender with user's email and name
            $mail->addAddress('contact@judoclub.nl', 'Judo Club'); //Recipient

            //Content
            $mail->isHTML(false);  // Plain text email
            $mail->Subject = "Contactverzoek van $name";
            $mail->Body = "Naam: $name\nE-mail: $email\nBericht:\n$message";

            // Send the email
            $mail->send();
            $success = "Bedankt voor het contact opnemen! We zullen zo snel mogelijk reageren.";
        } catch (Exception $e) {
            $error = "Er ging iets mis. Mailer Error: {$mail->ErrorInfo}";
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
            <li><a href="about.php">Info</a></li>
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