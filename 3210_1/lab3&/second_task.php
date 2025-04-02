<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Правители России по векам</title>
</head>
<body>
    <h1>Правители России по векам</h1>
    <p>Выберите век, чтобы узнать кто правил в этот период:</p>
    <form method="GET" action="">
        <label for="century">
            Век царствования:
            <select name="century" id="century" required>
                <option value="">-- Выберите век --</option>
                <option value="XVI">XVI век</option>
                <option value="XVIII">XVIII век</option>
                <option value="XIX">XIX век</option>
            </select>
        </label>
        <button type="submit">Узнать</button>
    </form>
    
    <?php
    // Данные о правителях
    $XVI = "Иван Васильевич (Иван Грозный)";
    $XVIII = "Пётр Алексеевич (Пётр Великий)";
    $XIX = "Николай Павлович (Николай I)";
    
    if (isset($_GET["century"]) && !empty($_GET["century"])) {
        $century = $_GET["century"];
        if (isset($$century)) {
            echo "<strong>В $century веке царствовал:</strong> " . $$century;
        } 
    }
    ?>
</body>
</html>