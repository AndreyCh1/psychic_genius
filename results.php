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
                // session_destroy();
                $password = $_SESSION["password"];
                $stats = $_SESSION["stats"];
                $generalStats = ["Ви Оракул!", "Ви Суперекстрасенс!", "Ви Eрекстрасенс!", "Ви майже Екстрасенс.", "Ви не Екстрасенс, співчуваємо."];
                if (! empty($_SESSION["stats"])) {
                    $achievement = "";
                }
                if (isset($_SESSION["lastGameStatistics"])) {
                    $lastGameStatistics = $_SESSION["lastGameStatistics"];
                    echo ("<h2>Прошлые достижения:</h2>");
                    foreach ($lastGameStatistics as $achiev) {
                        echo ("<p><h3><span>" . $achiev . "</span></h3></p>");
                    }
                    echo ("<hr>");
                    $_SESSION["lastGameStatistics"] = $lastGameStatistics;
                } else {
                    $lastGameStatistics = [];
                }
                if (! empty($_SESSION["stats"])) {
                    echo ("<h2>Результат гри:</h2>");
                    if (isset($_POST["choise"])) {
                        $choise = $_POST["choise"];
                        if ($password == $choise) {
                            echo ("<h2>Правильно, ви вгадали!</h2>");
                            if (! empty($_SESSION["stats"])) {
                                $stats['countWins'] = 4;
                            }
                        } else {
                            echo ("<h2>Невірно, ви не вгадали!</h2>");
                            if (! empty($_SESSION["stats"])) {
                                $stats['countWins'] = 1;
                            }
                        }
                    }
                    if ($stats["rangeWins"] == true && $stats['countWins'] == 2) {
                        echo ("<p><h3><span>Ви Оракул!</span></h3></p>");
                        $achievement = $generalStats[0];
                    } else if (($stats["rangeWins"] == true && $stats['countWins'] == 3) || ($stats["rangeWins"] == false && $stats['countWins'] == 2)) {
                        echo ("<p><h3><span>Ви Суперекстрасенс!</span></h3></p>");
                        $achievement = $generalStats[1];
                    } else if (($stats["rangeWins"] == true && $stats['countWins'] == 4) || ($stats["rangeWins"] == false && $stats['countWins'] == 3)) {
                        echo ("<p><h3><span>Ви Eрекстрасенс!</span></h3></p>");
                        $achievement = $generalStats[2];
                    } else if (($stats["rangeWins"] == true && $stats['countWins'] == 1) || ($stats["rangeWins"] == false && $stats['countWins'] == 4)) {
                        echo ("<p><h3><span>Ви майже Екстрасенс.</span></h3></p>");
                        $achievement = $generalStats[3];
                    } else if ($stats["rangeWins"] == false && $stats['countWins'] == 1) {
                        echo ("<p><h3><span>Ви не Екстрасенс, співчуваємо.</span></h3></p>");
                        $achievement = $generalStats[4];
                    }
                    $stats = [];
                    array_push($lastGameStatistics, $achievement);
                }
                $_SESSION["lastGameStatistics"] = $lastGameStatistics;
                // header("Location: results.php");
                $_SESSION["stats"] = $stats;
                echo ("<p><a class='button' href='index.php'>Почати спочатку</a></p>");
            ?>
        </form>
    </div>
</body>