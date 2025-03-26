<?php
// 2
//file_put_contents('test.txt', "12345");


// 3


// $arr = ['1.txt', '2.txt', '3.txt'];
// $combined = '';
// foreach ($arr as $file){
//     $content = file_get_contents($file);
//     $combined .= $content;
// }
// file_put_contents('new.txt', $combined);

// 4
// file_put_contents('1.txt', 'abc');
// file_put_contents('2.txt', 'hi');
// file_put_contents('3.txt', 'php');

// $arr = ['1.txt', '2.txt', '3.txt'];
// foreach ($arr as $file){
//     $open = fopen($file, 'a+');
//     if ($open) {
//         fwrite($open, '!');
//     }
// }


// 12
// $old_file = 'old.txt';
// $new_file = 'newFile.txt';

// rename($old_file, $new_file);


//16
$file_find = 'test.txt';
if (file_exists($file_find)) {
    echo 'Файл успешно найден'.'</br>';
} else {
    echo 'Файл не существует'.'</br>';
}


