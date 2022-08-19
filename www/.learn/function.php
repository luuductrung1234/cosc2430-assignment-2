<?php

foo();
bar();  // foo() must be called before bar()
$number = [2, 3, 4.5, 5.2];
echo sum(2, 3, 4.5, 5.2) . "<br/>";
echo sum(...$number) . "<br/>";
echo binarySum($y = 5, $x = 10) . "<br/>";
echo binarySum(y: 5, x: 10) . "<br/>";

$arr = ["x" => 1, "y" => 2];
echo binarySum(...$arr) . "<br/>";

$arr = ["y" => 2, "x" => 1];
echo binarySum(...$arr) . "<br/>";

$arr = [1, "x" => 2];
echo binarySum(...$arr) . "<br/>";


function sum(int $x, int $y, ...$nums): int|float
{
    $sum = 0;
    foreach ($nums as $num) {
        $sum += $num;
    }
    return $x + $y + $sum;
}

function binarySum(int $x, int $y): int|float
{
    return $x + $y;
}

function foo(): int
{
    echo "Foo<br/>";
    function bar(): void
    {
        echo "Bar<br/>";
    }

    function bip(): ?int
    {
        echo "Bip<br/>";
        return null;
    }

    function bop(int &$num): int|float|array
    {
        echo "Bip<br/>";
        if ($num > 10) {
            return 4.3;
        }
        $num = ["1", "2", "a", 1.4];
        return $num;
    }

    function fot(int|float $num = 10): mixed
    {
        echo "Bip<br/>";
        if ($num > 10) {
            return 4.3;
        } else if ($num == 5.5) {
            return null;
        }
        return ["1", "2", "a", 1.4];
    }

    return 1;
}