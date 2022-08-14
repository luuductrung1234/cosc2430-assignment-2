<html lang="en">
<body>
<h1><?="Hello, html!"?></h1>
<?php
//phpinfo();
//xdebug_info();

//echo & print
echo "Hello, php!", "<br/>";
echo "Thomas's ", "first php app!", "<br/>";
$is_success = print "Another hello, php!<br/>";
if($is_success == 1)
    echo "print a line successfully. (received ", $is_success, ")", "<br/>";

//variables
$x = 1;
$y = $x;
$z = &$x;
$x = 2;

echo "y: ", $y, "<br/>";
echo "z: ", $z, "<br/>";

$author = "thomas luu";

echo 'author: $author', "<br/>";
echo "author: $author", "<br/>";

?>
</body>
</html>
