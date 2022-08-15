<?php

$fistName = "Will";
$lastName = "Smith";

$name = $fistName . ' ' . $lastName;
echo $name . "<br/>";

$name = "$fistName $lastName";
echo $name . "<br/>";

$name = "${fistName} ${lastName}";
echo $name . "<br/>";

echo $name[0] . "<br/>";
echo $name[1] . "<br/>";
echo $name[-2] . "<br/>";
$name[1] = "I";
echo $name . "<br/>";
$name[20] = "I";
echo $name . "<br/>";

// Heredoc
$text = <<<TEXT
line 1 $fistName
line 2 ${lastName}
line 3 {$name}
TEXT;

echo $text . "<br/>";
echo nl2br($text) . "<br/>";

// Nowdoc
$text = <<<'TEXT'
line 1 $fistName
line 2 ${lastName}
line 3 {$name}
TEXT;

echo $text . "<br/>";
echo nl2br($text) . "<br/>";

?>