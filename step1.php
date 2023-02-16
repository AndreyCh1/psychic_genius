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
        <form method="post" action="step2.php">
            <?php
                session_start();
                $submit = 0;
                if (isset($_POST["submit"])) { // если были отправки распаковывается количество отправок
                    $submit = $_POST["submit"];
                }
                if (isset($_POST["choise"])) { // если выбран вариант ответа записываем его в переменную $choise
                    $choise = $_POST["choise"];
                    $submit++; // при каждой отправке в переменную $submit добавляется +1
                    echo ("<p>Отправка: $submit</p>");
                    $endOfRange = $choise + 9;
                    echo ("<p>Выбор: $choise-$endOfRange</p>");
                    if ($submit == 1) {
                        $password = rand(1, 100);
                        $_SESSION["password"] = $password;
                        $openingRange = floor(($password - 1) / 10) * 10 + 1;
                        echo ("<p>Сгенерировано: $password</p>");
                        echo ("<p>Превращено: $openingRange</p>");
                    }
                }
                $endOfRange = $openingRange + 9;
                $stats = [];
                if ($openingRange == $choise) {
                    echo ("<h2>Ви вгадали діапазон, залишилось вгадати число:</h2>");
                    $stats["rangeWins"] = true;
                } else {
                    echo ("<h2>Невірно, вірний діапазон <span>$openingRange-$endOfRange</span>. Може вам вдасться вгадати число:</h2>");
                    $stats["rangeWins"] = false;
                }
                echo ("<select class='choise' name='choise' required placeholder=''>");
                    echo ("<option value='' selected disabled>Виберіть число</option>");
                    for ($i = $openingRange; $i <= $endOfRange; $i++) { // создаем 10 вариантов выбора
                        echo ("<option value='". $i ."'>". $i ."</option>");
                    }
                echo ("</select>");
                echo ("<input type='hidden' name='openingRange' value='$openingRange'>");
                $_SESSION["stats"] = $stats;
                echo ("<p><button class='button' type='submit'>Вибрати</button></p>");
            ?>
        </form>
    </div>
</body>