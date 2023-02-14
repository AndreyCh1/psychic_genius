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
        <form method="post" action="step1.php">
            <h2>Комп'ютер згенерував число від 1 до 100.</h2>
            <h2>Спочатку вгадайте в якому діапазоні число:</h2>
            <?php
                echo ("<select class='choise' name='choise' required placeholder=''>");
                    echo ("<option value='' selected disabled>Виберіть діапазон</option>");
                    for ($i = 1, $k = 10; $k <= 100; $i += 10, $k += 10) { // создаем 10 вариантов выбора
                        echo ("<option value='". $i ."'>". $i ."-". $k ."</option>");
                    }
                echo ("</select>");
                echo ("<p><button class='button' type='submit'>Вибрати</button></p>");
            ?>
        </form>
    </div>
</body>