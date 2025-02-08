<?php
    $a; /* переменная */
    define('pi', 3.14); /*  const  */
    $R = 2;
    $L = 2 * pi * $R;
    
    $a = 2;
    $b = '2';

    var_dump($a!==$b);
    echo '<BR>';


    $c = $a + $b;
    echo $c.'</br>';
    $c = (string)$a.$b;
    echo gettype($a).'</br>';
    echo $c.'</br>';

    $s = 3.2;
    echo 'floor '.floor($s).'</br>';
    echo "floor $s <BR>";

    echo 'ceil '.ceil($s).'</br>';
    echo 'round '.round($s).'</br>';

    $a=2/3;

    print "a=$a<BR>";//a=0.666666666667

    print strlen($a)."<BR>"; //14 знаков

    $a=sprintf("%.2f",$a);

    print "a=$a<BR>";//a=0.67

    /* 1 */
    $a = 27;
    $b = 12;
    $s = sqrt(pow($a, 2) + pow($b, 2));
    $h = round($s, 2);
    echo $h."<BR>";

    /* 2 */
    $h = 27;
    $b = 12;
    $s = sqrt(pow($a, 2) - pow($b, 2));
    $a = round($s, 2);
    echo $a.'<BR>';

    /* 8 */
    $a = true;
    $b = false;
    var_dump($a);
    echo '<BR>';
    var_dump($b);
    echo '<BR>';

    /* 25 */
    $a = 148;
    $b = 76;
    $c = ' голубя';
    $res = $a - $b.$c;
    echo $res.'<BR>';

    /* 22 */
    $a = 4;
    $b = 3;
    $c = ' мандаринок';
    $res = $a * $b.$c;
    echo $res.'<BR>';

?>