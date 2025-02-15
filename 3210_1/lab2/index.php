<?php
    /* $arr = [2, 'r', 3, 6];
    for ($i = 0; $i < sizeof($arr); $i++){
        echo $arr[$i].' ';
    }
    $arr2[1] = 2;
    $arr2['b'] = 'r';
    $arr2['c'] = 3;
    $arr2[4] = 6;
    echo $arr2[2].'<BR>';

    var_dump($arr2);
    echo '<BR>';

    for ($i = 0; $i < sizeof($arr2); $i++){
        echo $arr2[$i].' ';
    }

    $arr3 = [
        1 => 2,
        'b' => 'r',
        'c' => 6,
        4 => 8
    ];

    foreach($arr3 as $elem){
        echo "$elem ";
    }

    $a = array(1,2);
    $b = array(2,1); */


    /* $arr_2 = [
        1=>[1,2,3],
        'd'=>[5,6,'g','h'],
        3=>[5,6,7,8]
    ];
    foreach($arr_2 as $arr){
        foreach($arr as $elem){
            echo "$elem, ";
        }
        echo '<BR>';
    } */

    /* function f($a, $b): int
    {
        return $a * $b;
    }
    echo f(3,490); */


    //1
    $arr = ['a', 'b', 'c', 'd', 'a'];
    $c = array_count_values($arr);
    print_r($c);
    echo '<BR>';

    //7
    $arr1 = [1,2,3];
    $arr2 = ['a', 'b', 'c'];
    $merg = array_merge($arr1, $arr2);
    print_r($merg); 
    echo '<BR>';

    //6
    $arr = ['a', 'b', 'c', 'd', 'e'];
    $up = array_map('strtoupper', $arr);
    print_r($up);
    echo '<BR>';

    //10
    $arr = [
        'a' => 1,
        'b' => 2,
        'c' => 3
    ];
    $r = array_rand($arr);
    print_r($r);
    echo '<BR>';

    //15
    $arr = [1,2,3,4,5];
    array_unshift($arr, 0);
    array_push($arr, 6);
    print_r($arr);
    echo '<BR>';


    //22
    $arr = [1,2,3,4,5];
    $sum = array_sum($arr);
    print_r($sum);
