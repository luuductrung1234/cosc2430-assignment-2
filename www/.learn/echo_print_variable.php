<html lang="en">
<body>
<h1><?="Hello, html!"?></h1>
<?php
//phpinfo();
//xdebug_info();

//==========================================
//echo & print
//==========================================
echo "Hello, php!" . "<br/>";
echo "Thomas's " . "first php app!" . "<br/>";
$is_success = print "Another hello, php!<br/>";
if($is_success == 1)
    echo "print a line successfully. (received " . $is_success, ")" . "<br/>";

//==========================================
//variables
//==========================================
$x = 1;
$y = $x;
$z = &$x;
$x = 2;

echo "y: ", $y, "<br/>";
echo "z: ", $z, "<br/>";

$author = "thomas luu";

echo 'author: $author', "<br/>";
echo "author: $author", "<br/>";

//==========================================
//constants
//==========================================
const STATUS_PAID = "paid";
$channel = "CHANNEL";
define("PAYMENT_" . $channel, "bank");

echo STATUS_PAID . "<br/>";
echo PAYMENT_CHANNEL . "<br/>";
echo PHP_BINARY . "<br/>";    // pre-defined constants
echo PHP_VERSION . "<br/>";   // pre-defined constants
echo __DIR__ . "<br/>";   // magic constants
echo __FILE__ . "<br/>";  // magic constants
echo __CLASS__ . "<br/>"; // magic constants
echo __LINE__ . "<br/>";  // magic constants

//==========================================
//variable variable
//==========================================

$foo = "haha";
$$foo = "bar";

echo "$foo, {$$foo}" . "<br/>";
echo "$foo, ${$foo}" . "<br/>";
echo "$foo, ${foo}" . "<br/>";

?>
</body>
</html>
