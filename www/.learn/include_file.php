<?php

$x = 5;

$z = require_once "file.php";

echo $x . "<br/>";

require_once "file.php";

echo $x . "<br/>";

$y = require_once "file.php";

var_dump($y);
echo $y . "<br/>";

var_dump($z);
