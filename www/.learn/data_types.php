<?php
#declare(strict_types=1);    // strict mode not allowed after php 7.0

//=======================================
// 4 Scalar Types
//=======================================
// bool - true / false
$completed = true;
$failed = false;
# int (no decimal)
$score = 75;
# float
$price = 0.99;
# string
$greeting = "hello world";

echo $completed . "<br/>";
echo $failed . "<br/>";
echo $score . "<br/>";
echo $price . "<br/>";
echo $greeting . "<br/>";

echo gettype($completed) . "<br/>";
echo gettype($price) . "<br/>";

var_dump($completed);
var_dump($score);

//=======================================
// Compound Types
//=======================================
# array
$companies = [1, 2, "hello", "text", true, false, 2.45];
echo $companies . "<br/>";  // fail, because the machine doesn't know how to display an array
print_r($companies);
# object
# callable
# iterable

//=======================================
// 2 Special Types
//=======================================
# resource
# null

//=======================================
// Type Juggling / Type Coercion
//=======================================

$sum = sum(2, 3);
echo "sum: $sum";
$sum = sum(2, "3");
echo "sum: $sum";
$sum = sum(2.523, "3");
echo "sum: $sum";
$sum = sum(2, "abc");   // fail, because of unsupported type cast
echo "sum: $sum";

function sum($x, $y)
{
    var_dump($x, $y);
    return $x + $y;
}

?>