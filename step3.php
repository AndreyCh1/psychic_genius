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
        <form method="post" action="results.php">
            <?php
                session_start();
                $choise = $_POST["choise"];
                $openingRange = $_POST["openingRange"];
                $endOfRange = $_POST["endOfRange"];
                $password = $_SESSION["password"];
                echo ("<input type='hidden' name='choise' value='$choise'>");
                echo ("<p>Выбор: $choise</p>");
                echo ("<p>Сгенирировано: $password</p>");
                if ($password == $choise) {
                    $_SESSION["stats"]["countWins"] = 2;
                    header ("Location: results.php");
                } else {
                    if ($password < $choise) {
                        $direction = "менше";
                    } else {
                        $direction = "більше";
                    }
                    echo ("<h2>Невірно, даємо підказку, число <span>$direction</span> обраного.</h2>");
                    $_SESSION["stats"]["countWins"] = 0;
                    echo ("<select class='choise' name='choise' required>");
                        echo ("<option value='' selected disabled>Виберіть число</option>");
                        for ($i = $openingRange; $i <= $endOfRange; $i++) { // создаем 5 вариантов выбора
                            echo ("<option value='". $i ."'>". $i ."</option>");
                        }
                    echo ("</select>");
                    echo ("<input type='hidden' name='openingRange' value='$openingRange'>");
                    echo ("<input type='hidden' name='endOfRange' value='$endOfRange'>");
                    echo ("<input type='hidden' name='direction' value='$direction'>");
                    echo ("<p><button class='button' type='submit'>Вибрати</button></p>");
                }
            ?>
        </form>
    </div>
</body>