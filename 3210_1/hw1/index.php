<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Homework-1 Assaup</title>
</head>
<body>
    <header>
        <a class="header__link" href="https://mospolytech.ru/?ysclid=m73gij3vi2856702515">
            <img class="header__logo" src="logo.svg" alt="Московский политех">
        </a>
        <p class="header__text">2.1.Домашняя работа: Hello, World!</p>
    </header>
    <main>
        <h1>Текущая дата:</h1>
        <p class = "text">
            <?php echo date('Y-m-d'); ?>
        </p>
        <?php $randomNumber = rand(1, 100); ?>
        <p class="text">
        Случайное число: <?php echo $randomNumber; ?>
        </p>
    </main>
    <footer>
        <p class="footer__text">Создать веб-страницу с динамическим контентом.</p>
        <p class="footer__text">Ассауп Самир</p>
    </footer>
</body>
</html>