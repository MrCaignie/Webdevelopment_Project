<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainers</title>
    <link rel="stylesheet" href="style_trainers.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script> 
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow");
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <nav>
            <ul class="navigatie">
                <li><a id="flip">Onze Club</a></li>
                <li><a href="about.php">Info</a></li>
                <li><a href="loginVereist.php">Contact</a></li>
                <li class="login"><a href="login.php">Login</a></li>
                <li class="registreren"><a href="registreren.php">Registreren</a></li>
            </ul>
            <div id="panel">
                <ul>
                    <li><a href="bestuur.php">Bestuursleden</a></li>
                    <li><a href="trainers.php">Trainers</a></li>
                    <li><a href="index.php">Visie</a></li>
                </ul>
            </div>
        </nav>   

        <div class="trainers">
            <h1>Trainers</h1>
            <?php
                // Trainers array
                $trainers = array(
                    array("Wouter.jpg", "Wouter Luypaert, hoofdtrainer", "instructeur B", "4x zwarte gordel (4e dan)"),
                    array("Jean-Philippe.jpg", "Jean-Philippe Luypaert", "trainer A", "3x zwarte gordel (3e dan)"),
                    array("Jurgen.jpg", "Jürgen Dujardin", "trainer +12 jarigen", "1x zwarte gordel (1e dan)"),
                    array("Kelly.jpg", "Kelly Verbrugghe, jeugdsportbegeleider", "instructeur B", "1x zwarte gordel (1e dan)"),
                    array("trainer.png", "Jill Bentein", "initiator", "1x zwarte gordel (1e dan)"),
                    array("trainer.png", "Amber Ryheul", "initiator", "1x zwarte gordel (1e dan)"),
                    array("trainer.png", "Morgane Garreyn", "lesgever", "Zwarte gordel (1e dan)"),
                    array("Gunter.jpg", "Gunter Archie", "lesgever", "bruine gordel (1e kyu)")
                );

                // Loop through trainers array and display each trainer
                foreach ($trainers as $trainer) {
                    echo "<div class='trainer'>";
                    echo "<img src='image/{$trainer[0]}' alt='{$trainer[1]}'>";
                    echo "<h2>{$trainer[1]}</h2>";
                    echo "<p>{$trainer[2]}</p>";
                    echo "<p>{$trainer[3]}</p>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>
