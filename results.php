<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
    <h1>Гра "Екстрасенс"</h1>
        <form method="post" action="">
            <?php
                session_start();
                $password = $_SESSION["password"];
                $stats = $_SESSION["stats"];
                if (isset($_POST["choise"])) {
                    $choise = $_POST["choise"];
                    if ($password == $choise) {
                        echo ("<h2>Правильно, ви вгадали!</h2>");
                        $stats['countWins'] = 3;
                    } else {
                        echo ("<h2>Невірно, ви не вгадали!</h2>");
                        array_push($ansvers, "програш");
                        $stats['countWins'] = 0;
                    }
                }
                if ($stats["rangeWins"] == true && $stats['countWins'] == 1) {
                    echo ("<p><h3><span>Ви Оракул!</span></h3></p>");
                } else if (($stats["rangeWins"] == true && $stats['countWins'] == 2) || ($stats["rangeWins"] == false && $stats['countWins'] == 1)) {
                    echo ("<p><h3><span>Ви Суперекстрасенс!</span></h3></p>");
                } else if (($stats["rangeWins"] == true && $stats['countWins'] == 3) || ($stats["rangeWins"] == false && $stats['countWins'] == 2)) {
                    echo ("<p><h3><span>Ви Eрекстрасенс!</span></h3></p>");
                } else if (($stats["rangeWins"] == true && $stats['countWins'] == 0) || ($stats["rangeWins"] == false && $stats['countWins'] == 3)) {
                    echo ("<p><h3><span>Ви майже Екстрасенс.</span></h3></p>");
                } else if ($stats["rangeWins"] == false && $stats['countWins'] == 0) {
                    echo ("<p><h3><span>Ви не Екстрасенс, співчуваємо.</span></h3></p>");
                }
                echo ("<p><a class='button' href='index.php'>Почати спочатку</a></p>");
            ?>
        </form>
    </div>
</body>