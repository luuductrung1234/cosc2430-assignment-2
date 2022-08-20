<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR . "miniproject" . DIRECTORY_SEPARATOR;

define("APP_PATH", $root . 'app' . DIRECTORY_SEPARATOR);
define("FILES_PATH", $root . 'data' . DIRECTORY_SEPARATOR);
define("VIEWS_PATH", $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . "app.php";
require APP_PATH . "helpers.php";

$fileNames = getTransactionFiles(FILES_PATH);

$transactions = [];

foreach ($fileNames as $fileName) {
    $transactions = array_merge($transactions, getTransactions($fileName, "parseAmountField"));
}

//echo "<pre>";
//print_r($transactions);
//echo "</pre>";

$totals = calculateTotals($transactions);

//echo "<pre>";
//print_r($totals);
//echo "</pre>";

require VIEWS_PATH . "transactions.php";
