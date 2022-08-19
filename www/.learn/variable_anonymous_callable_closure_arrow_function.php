<?php

// ===========================================
// Callable Variable or Function Variable
// ===========================================

function sum(int|float ...$numbers): int|float
{
    return array_sum($numbers);
}

$x = "sum";
$y = "sub";

echo $x(1, 2, 10, 8) . "<br/>";
// if a pair of parenthesis next to the variable
// php detects that $x is a function, and it looks for the definition of it in this file.

if (is_callable($y)):
    echo $y(1, 2, 10, 8) . "<br/>";
endif;
echo "$y is not callable" . "<br/>";

// ===========================================
// Anonymous Functions
// ===========================================

$seed = 10;
$salt = 10;

$my_sum = function (int|float ...$numbers) use ($seed, &$salt): int|float {
    $seed = 20;
    $salt = 20;
    echo "seed: $seed<br/>";    // access variables out of local scope
    echo "salt: $salt<br/>";    // access variables out of local scope
    return array_sum($numbers);
};
$also_my_sum = $my_sum;

echo "seed: $seed<br/>";
echo "salt: $salt<br/>";

echo $my_sum(1, 2, 3) . "<br/>";
echo $also_my_sum(1, 2, 3) . "<br/>";

// ===========================================
// Callback Functions
// ===========================================

$arr = [1, 2, 3, 4];

$arr2 = array_map(function ($item) {
    return $item * 2;
}, $arr);

echo "<pre>";
print_r($arr2);
echo "</pre>";


$upgraded_sum = function (callable $markup, int|float ...$numbers): int|float {
    return $markup(array_sum($numbers));
};

echo $upgraded_sum(function ($item): int|float {
        return $item + 10;
    }, ...$arr) . "<br/>";


// ===========================================
// Arrow Functions
// ===========================================

$a = 5;

$arr2 = array_map(fn($item) => $item * $a, $arr);

echo "<pre>";
print_r($arr2);
echo "</pre>";



