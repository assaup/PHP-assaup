<?php
//1
// $str = 'a1b2c3';
// $res = preg_replace_callback('/\d/', function($match){
//     return $match[0] . $match[0];
// }, $str);
// echo $res;

//2
// $str = 'https://site.ru';
// $reg = '/^https?:\/\/[a-z0-9-]+(\.[a-z]{2,})$/i';
// if (preg_match($reg, $str)){
//     echo "Строка является валидным доменом с http/https.";
// } else{
//     echo "Строка НЕ является валидным доменом.";
// }


// 5
// $str = 'site.ru';
// $str = 'site.com';
// $str = 'my-site123.com';
// $pattern = '/^([a-z0-9-]+\.)+[a-z]{2,}$/i';
// if (preg_match($pattern, $str)){
//     echo "valid";
// } else{
//     echo "invalid";
// }

//15
// $str = 'a\a abc';
// $result = preg_replace('/a\\\\a/', '!', $str);
// echo $result;

//37
$str = 'a1a a2a a3a a4a a5a aba aca';
preg_match_all('/a\da/', $str, $matches);
print_r($matches);
