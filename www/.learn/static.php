<?php

$x = 5;

echo "x: $x<br/>";

function getValue()
{
    global $x;
    $x = 10;
    static $value = null;
    if ($value === null) {
        $value = someVeryExpensiveFunction();
    }
    return $value;
}

echo "x: $x<br/>";

function someVeryExpensiveFunction()
{
    sleep(2);
    echo "Processing (take long time)...<br/>";
    return 10;
}

echo getValue() . "<br/>";
echo getValue() . "<br/>";
echo getValue() . "<br/>";
