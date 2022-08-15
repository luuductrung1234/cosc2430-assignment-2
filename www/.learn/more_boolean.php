<?php
$isCompleted = [''];

// integers 0, -0 = false
// floats 0.0, -0.0 = false
// '' = false
// '0' = false
// [] = false
// null = false

echo $isCompleted . "<br/>";

if ($isCompleted) {
    echo "success" . "<br/>";
} else {
    echo "fail" . "<br/>";
}

?>