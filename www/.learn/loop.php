<?php
//===========================================
// For Loop
//===========================================
for ($i = 0; $i < 10; $i++) {
    echo $i;
}
echo "<br/>";

for ($i = 0; $i < 10; print $i, $i++) {
    //echo $i;
}
echo "<br/>";

for ($i = 0; print $i, $i < 10; $i++) {
    //echo $i;
}
echo "<br/>";

$text = "hello world";
for ($i = 0; $i < strlen($text); $i++) {
    echo $text[$i];
}
echo "<br/>";

$text = ["a", "b", "c", "d"];
for ($i = 0; $i < count($text); $i++) {
    echo $text[$i];
}
echo "<br/>";

for ($i = 0, $length = count($text); $i < $length; $i++) {
    echo $text[$i];
}
echo "<br/>";

//===========================================
// ForEach Loop
//===========================================

foreach ($text as $char) {
    echo $char;
}
echo "<br/>";

$text = ["a" => 1, "b" => 2, "c" => "xyz", "d" => 5.2];
foreach ($text as $key => $value) {
    echo "key: $key, value: $value <br/>";
}

$user = [
    "name" => "Test",
    "email" => "test_123@yopmail.com",
    "skills" => ["php", "graphql", "react"],
    "address" => [
        "line1" => "123 ABC",
        "line2" => "123 BDC",
        "postal" => 1000
    ]
];
foreach ($user as $key => $value) {
    if (is_array($value)) {
        echo "key: $key, value: " . implode(",", $value) . " <br/>";
        continue;
    }
    if (is_object($value)) {
        echo "key: $key, value: " . json_encode($value) . " <br/>";
        continue;
    }
    echo "key: $key, value: $value <br/>";
}

?>