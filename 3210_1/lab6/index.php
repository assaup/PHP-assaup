<?php
// 1
//session_start(); // Запускаем сессию

// // Если в сессии ещё нет значения 'text', устанавливаем его
// if (!isset($_SESSION['text'])) {
//     $_SESSION['text'] = 'test';
//     echo "Текст записан в сессию. Обновите страницу.<br>";
// } else {
//     echo "Содержимое сессии: " . $_SESSION['text'] . "<br>";
// }
// 

// 3
// Проверяем, существует ли счетчик в сессии
// if (!isset($_SESSION['refresh_count'])) {
//     $_SESSION['refresh_count'] = 0;
//     echo "Вы ещё не обновляли страницу.";
// } else {
//     $_SESSION['refresh_count']++;
//     echo "Вы обновили страницу " . $_SESSION['refresh_count'] . " раз.";
// }


// 5
// session_start();
// if (!isset($_SESSION['visit'])){
//     $_SESSION['visit'] = time();
//     echo "вы только что зашли на сайт";
// } else {
//     $second = time() - $_SESSION['visit'];
//     echo "вы зашли на сайт $second секунд назад";
// }


// 7
// if (!isset($_COOKIE['test'])) {
//     setcookie('test', '123', time() + 3600);
//     echo "'test' установлен";
// } else {
//     echo "'test': " . $_COOKIE['test'];
// }

//8 
// setcookie('test', '', time() - 3600);


// 9
// if (isset($_COOKIE['visit'])){
//     $visit = $_COOKIE['visit'] + 1;
// } else {
//     $visit = 1;
// }
// setcookie('visit', $visit, time()+3600);
// echo "вы посетили наш $visit раз!";