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
                if (isset($_POST["reset"])) { // если нажата кнопка "Очистити статистику ігор" очистить массивы лога достижений и их цветов
                    $lastGameStatistics = [];
                    $gradationByClass = [];
                    $_SESSION["lastGameStatistics"] = $lastGameStatistics;
                    $_SESSION["gradationByClass"] = $gradationByClass;
                }
                // session_destroy();
                $password = $_SESSION["password"];
                $generalStats = ["Ви Оракул!", "Ви Суперекстрасенс!", "Ви Eрекстрасенс!", "Ви майже Екстрасенс.", "Ви не Екстрасенс, співчуваємо."];
                $achievement_classes = ["class='top_achievement'", "class='high_achievement'", "class='normal_achievement'", "class='low_achievement'", "class='bottom_achievement'"];
                if (! empty($_SESSION["stats"])) {
                    $stats = $_SESSION["stats"];
                }
                echo ("<h2>Результат гри:</h2>");
                if (isset($_POST["choise"])) {
                    $choise = $_POST["choise"];
                    if ($password == $choise) {
                        echo ("<h2>Правильно, ви вгадали!</h2>");
                        if (! empty($_SESSION["stats"])) {
                            $_SESSION["stats"]["countWins"] = 3;
                        }
                    } else {
                        echo ("<h2>Невірно, ви не вгадали!</h2>");
                        if (! empty($_SESSION["stats"])) {
                            $_SESSION["stats"]["countWins"] = 0;
                        }
                    }
                }
                if (isset($_SESSION["lastGameStatistics"])) {
                    $lastGameStatistics = $_SESSION["lastGameStatistics"];
                    $gradationByClass = $_SESSION["gradationByClass"];
                } else {
                    $lastGameStatistics = [];
                    $gradationByClass = [];
                    echo ("труляля");
                }
                if (isset($_SESSION["password"])) {
                    if (! empty($_SESSION["stats"])) {
                        $achievement = "";
                        if ($_SESSION["stats"]["rangeWins"] == true && $stats['countWins'] == 1) {
                            echo ("<p><h3><span class='top_achievement'>Ви Оракул!</span></h3></p>");
                            $achievement = $generalStats[0];
                            $achievement_class = $achievement_classes[0];
                        } else if (($_SESSION["stats"]["rangeWins"] == true && $_SESSION["stats"]['countWins'] == 2) || ($_SESSION["stats"]["rangeWins"] == false && $_SESSION["stats"]['countWins'] == 1)) {
                            echo ("<p><h3><span class='high_achievement'>Ви Суперекстрасенс!</span></h3></p>");
                            $achievement = $generalStats[1];
                            $achievement_class = $achievement_classes[1];
                        } else if (($_SESSION["stats"]["rangeWins"] == true && $_SESSION["stats"]['countWins'] == 3) || ($_SESSION["stats"]["rangeWins"] == false && $_SESSION["stats"]['countWins'] == 2)) {
                            echo ("<p><h3><span class='normal_achievement'>Ви Eрекстрасенс!</span></h3></p>");
                            $achievement = $generalStats[2];
                            $achievement_class = $achievement_classes[2];
                        } else if (($_SESSION["stats"]["rangeWins"] == true && $_SESSION["stats"]['countWins'] == 0) || ($_SESSION["stats"]["rangeWins"] == false && $_SESSION["stats"]['countWins'] == 3)) {
                            echo ("<p><h3><span class='low_achievement'>Ви майже Екстрасенс.</span></h3></p>");
                            $achievement = $generalStats[3];
                            $achievement_class = $achievement_classes[3];
                        } else if ($_SESSION["stats"]["rangeWins"] == false && $_SESSION["stats"]['countWins'] == 0) {
                            echo ("<p><h3><span class='bottom_achievement'>Ви не Екстрасенс, співчуваємо.</span></h3></p>");
                            $achievement = $generalStats[4];
                            $achievement_class = $achievement_classes[4];
                        }
                        $_SESSION["stats"] = [];
                        array_push($lastGameStatistics, $achievement);
                        array_push($gradationByClass, $achievement_class);
                        $latestAchievement = $achievement;
                        $lastAchievementСlass = $achievement_class;
                        $_SESSION["latestAchievement"] = $latestAchievement;
                        $_SESSION["lastAchievementСlass"] = $lastAchievementСlass;
                        // $password = 0;
                        // $_SESSION["password"] = $password;
                    }
                    if (! empty($_SESSION["lastGameStatistics"])) {
                        echo ("<h2>Минулі досягнення:</h2>");
                        for ($i = 0; $i < (count($lastGameStatistics) - 1); $i++) {
                            echo ("<p><h3><span " . $gradationByClass[$i] . ">" . $lastGameStatistics[$i] . "</span></h3></p>");
                        }
                        echo ("<hr>");
                        echo ("<p><button class='button' type='submit' name='reset' value='reset'>Очистити статистику ігор</button></p>");
                    }
                    $_SESSION["gradationByClass"] = $gradationByClass;
                    $_SESSION["lastGameStatistics"] = $lastGameStatistics;
                } else {
                    $latestAchievement = $_SESSION["latestAchievement"];
                    $lastAchievementСlass = $_SESSION["lastAchievementСlass"];
                    echo ("<p><h3><span " . $lastAchievementСlass . ">" . $latestAchievement . "</span></h3></p>");
                }
                echo ("<hr>");
                echo ("<p><a class='button' href='index.php'>Почати спочатку</a></p>");
            ?>
        </form>
    </div>
</body>