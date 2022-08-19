<?php

// https://www.php.net/manual/en/ini.list.php
// https://www.php.net/manual/en/ini.core.php

// error_reporting,

var_dump(ini_get("error_reporting"));
var_dump(E_ALL);

ini_set("error_reporting", E_ALL & ~E_WARNING);

$array = [1];

echo $array[3];

// error_log
var_dump(ini_get("error_log"));

// display_errors
var_dump(ini_get("display_errors"));

// max_execution_time
var_dump(ini_get("max_execution_time"));

// memory_limit
var_dump(ini_get("memory_limit"));

// file_uploads
var_dump(ini_get("file_uploads"));

// upload_tmp_dir
var_dump(ini_get("upload_tmp_dir"));

// date.timezone
var_dump(ini_get("date.timezone"));

// include_path
var_dump(ini_get("include_path"));











