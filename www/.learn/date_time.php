<?php

// Date Format  https://www.php.net/manual/en/datetime.format.php
// Time Zones   https://www.php.net/manual/en/timezones.php
// Relative Format   https://www.php.net/manual/en/datetime.formats.relative.php

//====================================
// Time
//====================================

$currencyTime = time();

echo $currencyTime . "<br/>";

echo $currencyTime + 5 * 24 * 60 * 60 . "<br/>";

echo $currencyTime - 60 * 60 * 24 . "<br/>";

//====================================
// Date
//====================================

echo date("m/d/Y g:ia") . "<br/>";

date_default_timezone_set("UTC");

echo date("m/d/Y g:ia") . "<br/>";

date_default_timezone_set("Asia/Ho_Chi_Minh");

echo date("m/d/Y g:ia") . "<br/>";

echo date("m/d/Y g:ia", mktime(0, 0, 0, 4, 10, null)) . "<br/>";

echo date("m/d/Y g:ia", strtotime("now")) . "<br/>";

echo date("m/d/Y g:ia", strtotime("tomorrow")) . "<br/>";

echo date("m/d/Y g:ia", strtotime("2010-01-08")) . "<br/>";

$date = date("m/d/Y g:ia", strtotime("first day of next month")) . "<br/>";

echo "<pre>";
print_r(date_parse($date));
echo "</pre>";



