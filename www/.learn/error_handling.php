<?php

// https://www.php.net/manual/en/function.set-error-handler.php
// https://www.php.net/manual/en/errorfunc.constants.php

// error_reporting(E_ALL & ~E_WARNING);

function errorHandler(
    int $type,
    string $msg,
    ?string $file = null,
    ?int $line = null
){
    echo $type . ": " . $msg . " in " . $file . " on line " . $line;
    exit;
}

set_error_handler("errorHandler", E_ALL);

echo $not_existed_variable;