<?php
session_start();

function getMessages($conn) {
    $query = "SELECT * FROM messages";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Klassen toewijzen op basis van wie het bericht heeft gepost
            $class = ($_SESSION['username'] === $row["username"]) ? 'user-message' : 'other-message';
            echo "<div class='$class'><strong>" . $row["username"] . ":</strong> " . $row["message"] . "</div>";
            if ($_SESSION['rol'] === 'admin') {
                echo '<a href="?delete=' . $row['id'] . '">Verwijder</a><br>';
            }
        }
    } else {
        echo "Geen berichten gevonden.";
    }
}


// Verbinding met de database maken
$conn = new mysqli("localhost", "root", "", "project");
if ($conn->connect_error) {
    die("Verbindingsfout: " . $conn->connect_error);
}

// Bericht posten
if (isset($_POST['message'])) {
    if (!isset($_SESSION['username'])) {
        echo "Je moet ingelogd zijn om een bericht te plaatsen.";
    } else {
        $message = $_POST['message'];
        $username = $_SESSION['username'];
        $timestamp = date("Y-m-d"); // Huidige datum
        
        $stmt = $conn->prepare("INSERT INTO messages (username, message, date) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Fout bij voorbereiden van de query: " . $conn->error);
        }
        
        $bind_result = $stmt->bind_param("sss", $username, $message, $timestamp);
        if (!$bind_result) {
            die("Fout bij binden van parameters: " . $stmt->error);
        }
        
        $execute_result = $stmt->execute();
        if (!$execute_result) {
            die("Fout bij uitvoeren van de query: " . $stmt->error);
        }
        
        $stmt->close();
    
        header("Location: ".$_SERVER['PHP_SELF']); // Refresh de pagina om het nieuwe bericht weer te geven
        exit;
    }
}


// Bericht verwijderen (alleen voor admins)
if (isset($_GET['delete']) && $_SESSION['rol'] === 'admin') {
    $message_id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM messages WHERE id = ?");
    $stmt->bind_param("i", $message_id);
    $stmt->execute();
    $stmt->close();
    
    header("Location: ".$_SERVER['PHP_SELF']); // Refresh de pagina om het verwijderde bericht niet meer weer te geven
    exit;
}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style__contact.css">
    <title>Gastenboek</title>
</head>
<body>
    <h1>GastenBoek/ Klantenservice</h1>
    <h2>Als er vragen zijn stuur via deze pagina we zullen zo snel mogelijk reageren. Onderaan deze pagina staan er ook nog andere manieren om ons te contacteren.</h1>
    
    <section>
    <!-- Berichtformulier -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <textarea name="message" rows="4" cols="50" required class="message"></textarea><br>
        <button type="submit" class="send">Bericht versturen</button>
    </form>
    </section>
    <section>
    <!-- Weergeven van berichten -->
    <?php getMessages($conn); ?>
    </section>
    <section>
    <!-- Uitlogknop (optioneel) -->
    <?php if (isset($_SESSION['username'])): ?>
        <form method="post" action="index.php">
            <button type="submit" class="logout">Uitloggen</button>
        </form>
    <?php endif; ?>
    </section>
    <section>
        <div class="contacteren">
        <p>Telefoonnummer: +32 0494 49 20 21</p> <!-- Vervang met je telefoonnummer -->
        <p>E-mail: <a href="mailto: info@neko-ieper.be">e-mail</a></p> <!-- Vervang met je e-mailadres -->
        </div>
    </section>
</body>
</html>

<?php
$conn->close();
?>
