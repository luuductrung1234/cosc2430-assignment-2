<?php

//======================================
// Array
//======================================
$language = ["PHP", "Java", "Python", "C#"];

var_dump(isset($language[3]));
var_dump(isset($language[4]));

$language[1] = "C++";
var_dump($language);

echo "<pre>";
print_r($language);
echo "</pre>";

array_push($language, "Go");
$language[] = "C";
echo "<pre>";
print_r($language);
echo "</pre>";

//======================================
// Array with key
//======================================
$language = [
    "PHP" => "8.1",
    "Python" => "3.9"
];

echo "<pre>";
print_r($language);
echo "</pre>";

var_dump($language["PHP"]);

$language["Java"] = [
    "creator" => "",
    "extension" => ".java",
    "isOpenSource" => true,
    "versions" => [
        ["version" => 7, "releaseDate" => ""],
        ["version" => 8, "releaseDate" => ""],
        ["version" => 11, "releaseDate" => ""],
        ["version" => 15, "releaseDate" => ""],
        ["version" => 17, "releaseDate" => ""],
    ]
];
echo "<pre>";
print_r($language);
echo "</pre>";

echo $language["Java"]["versions"][3]["version"] . "<br/>";

//======================================
// Array key casting & re-index
//======================================
$array = [true => "a", 1 => "b", "1" => "c", 1.8 => "d", null => "e"];
echo "<pre>";
print_r($array);
echo "</pre>";

$array = ["a", "b", 50 => "c", "d", "e"];
echo "<pre>";
print_r($array);
echo "</pre>";

array_shift($array);
echo "<pre>";
print_r($array);
echo "</pre>";

$array = [1, 2, 3];
unset($array[0], $array[1], $array[2]);
$array[] = 4;
echo "<pre>";
print_r($array);
echo "</pre>";


//======================================
// Array casting
//======================================
$x = 5;
$array = ["a" => 1, "b" => null];

var_dump((array)$x);
var_dump(array_key_exists("b", $array));
var_dump(isset($array["b"]));


?>
