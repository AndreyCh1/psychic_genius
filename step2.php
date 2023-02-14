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
        <?php
            session_start();
            $choise = $_POST["choise"];
            $password = $_SESSION["password"];
            $stats = $_SESSION["stats"];
            if (isset($_POST["results"])) {
                $page = "results.php";
            } else {
                $page = "step3.php";
            }
            if ($password == $choise) {
                $page = "results.php";
            }
        ?>
        <form method="post" action="<?= $page ?>">
            <?php
                $openingRange = $_POST["openingRange"];
                echo ("<p>Выбор: $choise</p>");
                echo ("<p>Сгенирировано: $password</p>");
                if ($password == $choise) {
                    echo ("<h2>Правильно, ви вгадали!</h2>");
                    $stats['countWins'] = 1;
                    echo ("<p><button class='button' type='submit' name='results'>Перейти до результатів</button></p>");
                } else {
                    if (($openingRange + 4) >= $password) {
                        $endOfRange = $openingRange + 4;
                    } else {
                        $endOfRange = $openingRange + 9;
                        $openingRange += 5;
                    }
                    echo ("<h2>Невірно, даємо підказку, число знаходиться в межах <span>$openingRange-$endOfRange</span>:</h2>");
                    $stats['countWins'] = 0;
                    echo ("<select class='choise' name='choise' required placeholder=''>");
                        echo ("<option value='' selected disabled>Виберіть число</option>");
                        for ($i = $openingRange; $i <= $endOfRange; $i++) { // создаем 5 вариантов выбора
                            echo ("<option value='". $i ."'>". $i ."</option>");
                        }
                    echo ("</select>");
                    echo ("<input type='hidden' name='openingRange' value='$openingRange'>");
                    echo ("<input type='hidden' name='endOfRange' value='$endOfRange'>");
                    echo ("<p><button class='button' type='submit'>Вибрати</button></p>");
                }
                $_SESSION["stats"] = $stats;
            ?>
        </form>
    </div>
</body>