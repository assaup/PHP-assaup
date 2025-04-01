<?php
$currentUri = $_SERVER['REQUEST_URI']; // Текущий URI запроса
$pageTitle = "Мой блог"; // Заголовок по умолчанию

// Определяем заголовок в зависимости от страницы
if (strpos($currentUri, '/hello/') !== false) {
    $pageTitle = "Страница приветствия";
}

// Подключаем соответствующий header
$headerPath = (strpos($currentUri, '/hello/') !== false) 
    ? dirname(__DIR__) . '/main/new_header.php' 
    : dirname(__DIR__) . '/header.php';

require $headerPath;
?>

<h5>Hello, <?= htmlspecialchars($name); ?>!</h5>

<?php require dirname(__DIR__) . '/footer.php'; ?>