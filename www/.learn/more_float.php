<?php
$x = 13.5;
var_dump($x);
echo $x . "<br/>";

$x = 13.5e3;
var_dump($x);
echo $x . "<br/>";

$x = 13.5e-3;
var_dump($x);
echo $x . "<br/>";

$x = 13_000.5e-3;
var_dump($x);
echo $x . "<br/>";

$x = PHP_FLOAT_MAX;
var_dump($x);
echo $x . "<br/>";

$x = floor((0.1 + 0.7) * 10);
var_dump($x);
echo $x . "<br/>";

$x = 0.23;
$y = 1 - 0.77;
var_dump($x, $y);
if($x == $y)
    echo "same";
else
    echo "different";

$x = (float) "5.93";
var_dump($x);
echo $x . "<br/>";

$x = (float) "23.3abc";
var_dump($x);
echo $x . "<br/>";

$x = (float) "abc";
var_dump($x);
echo $x . "<br/>";

?>