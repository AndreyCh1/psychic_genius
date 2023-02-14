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
        <form method="post" action="step5.php">
            <?php
                $password = $_POST["password"];
                $choise = $_POST["choise"];
                $openingRange = $_POST["openingRange"];
                $endOfRange = $_POST["endOfRange"];
                $direction = $_POST["direction"];
                $win = $_POST["win"];
                echo ("<p>Выбор: $choise</p>");
                echo ("<p>Сгенирировано: $password</p>");
                if ($password == $choise) {
                    echo ("<h2>Правильно, ви вгадали!</h2>");
                    $win++;
                } else {
                    echo ("<h2>Невірно, даємо підказку, число <span>$direction</span> обраного.</h2>");
                    echo ("<select class='choise' name='choise' placeholder=''>");
                        echo ("<option value='' selected disabled>Виберіть число</option>");
                        for ($i = $openingRange; $i <= $endOfRange; $i++) { // создаем 5 вариантов выбора
                            echo ("<option value='". $i ."'>". $i ."</option>");
                        }
                    echo ("</select>");
                    echo ("<input type='hidden' name='password' value='$password'>");
                    echo ("<input type='hidden' name='openingRange' value='$openingRange'>");
                    echo ("<input type='hidden' name='endOfRange' value='$endOfRange'>");
                    echo ("<input type='hidden' name='direction' value='$direction'>");
                    echo ("<p><button class='button' type='submit'>Вибрати</button></p>");
                }
                echo ("<input type='hidden' name='win' value='$win'>");
            ?>
        </form>
    </div>
</body>