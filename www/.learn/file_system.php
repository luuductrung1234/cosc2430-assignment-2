<?php

// https://www.php.net/manual/en/refs.fileprocess.file.php

$dir = scandir(__DIR__);

var_dump($dir);

mkdir("foo/bar", recursive: true);

rmdir("foo/bar");

rmdir("foo");

touch("foo.txt");

if (file_exists("foo.txt")) {
    echo filesize("foo.txt") . "<br/>";
    file_put_contents("foo.txt", "hello\nworld");
    clearstatcache();
    echo filesize("foo.txt") . "<br/>";
} else {
    echo "File not found<br/>";
}

$myFile = fopen("foo.txt", "r");
$myCsvFile = fopen("foo.csv", "r");

while(($line = fgets($myFile)) !== false){
    echo $line . "<br/>";
}

while(($line = fgetcsv($myCsvFile)) !== false){
    echo print_r($line) . "<br/>";
}

fclose($myFile);
fclose($myCsvFile);

file_put_contents("bar.txt", "hello\n");
file_put_contents("bar.txt", "world", FILE_APPEND);
clearstatcache();
echo filesize("bar.txt") . "<br/>";

echo "<pre>";
print_r(pathinfo("bar.txt"));
echo "</pre>";

unlink("foo.txt");
unlink("bar.txt");
