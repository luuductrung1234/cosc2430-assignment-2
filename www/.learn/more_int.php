<?php
$x = 0x324;
var_dump($x);
echo $x . "<br/>";

$x = 0b11011;
var_dump($x);
echo $x . "<br/>";

$x = 2_000_000_000;
var_dump($x);
echo $x . "<br/>";

$x = PHP_INT_MAX;
var_dump($x);
echo $x . "<br/>";

$x = PHP_INT_MAX + 1;
var_dump($x);
echo $x . "<br/>";

$x = (int) 5.93;
var_dump($x);
echo $x . "<br/>";

$x = (int) "5.93";
var_dump($x);
echo $x . "<br/>";

$x = (int) "23abc";
var_dump($x);
echo $x . "<br/>";

$x = (int) "abc";
var_dump($x);
echo $x . "<br/>";

$x = (int) null;
var_dump($x);
echo $x . "<br/>";

?>