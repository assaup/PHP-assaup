<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback form</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="#">
            <img src="logo.svg" alt="logo" class="header__logo">
        </a>
        <p class="header__text">
            Feedback form
        </p>
    </header>
    <main>
        <h1>Служба поддержки</h1>
        <form action="https://httpbin.org/post" method="post" class="form">
            <label>
                Имя: 
                <input name = "name" type="text" class="form__input">
            </label>
            <label>
                Email: 
                <input name = "email" type = "email" class="form__input">
            </label>
            <label for="type">Тип обращения:</label>
                <select id="type" name="type" class="form__select" required>
                    <option value="">Выберите тип</option>
                    <option value="жалоба">Жалоба</option>
                    <option value="предложение">Предложение</option>
                    <option value="благодарность">Благодарность</option>
                </select>
            <label>
                Опишите проблему:
                <textarea name="problem" class="form__textarea"></textarea>
            </label>
            <p class="form__label">Вариант ответа:</p>
                <label class="form__checkbox-label">
                    <input type="checkbox" name="response_sms" value="sms" class="form__checkbox"> SMS
                </label>
                <label class="form__checkbox-label">
                    <input type="checkbox" name="response_email" value="email" class="form__checkbox"> E-mail
                </label>
            <button type="submit" class="form-button">
                Отправить
            </button>
        </form>
        <div class="center">
        <a href="res.php" class="main__link">Перейти на следующую станицу</a>
        </div>
        
    </main>
    <footer>
        <p class="footer__text">Ассауп Самир</p>
    </footer>
</body>
</html>