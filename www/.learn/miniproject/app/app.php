<?php

declare(strict_types=1);

function getTransactionFiles(string $dirPath): array
{
    $files = [];
    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) continue;
        $files[] = $dirPath . $file;
    }
    return $files;
}

function getTransactions(string $fileName, ?callable $parser): array
{
    if (!file_exists($fileName)) {
        trigger_error("File '" . $fileName . "' does not exist" . E_USER_ERROR);
    }
    $file = fopen($fileName, "r");
    $metaData = fgetcsv($file);
    $lines = [];
    while (($line = fgetcsv($file)) !== false) {
        $lines[] = $line;
    }
    $transactions = [];
    foreach ($lines as $data) {
        $transaction = array_combine($metaData, $data);
        if ($parser !== null) {
            $transaction = $parser($transaction);
        }
        $transactions[] = $transaction;
    }
    return $transactions;
}

function parseAmountField(array $dataRow): array
{
    $dataRow["amount"] = (float)str_replace(['$', ','], '', $dataRow["amount"]);
    return $dataRow;
}

function calculateTotals(array $transactions): array
{
    $totals = ["netTotal" => 0, "totalIncome" => 0, "totalExpense" => 0];

    foreach ($transactions as $transaction) {
        $totals["netTotal"] += $transaction["amount"];
        if ($transaction["amount"] >= 0) {
            $totals["totalIncome"] += $transaction["amount"];
        } else {
            $totals["totalExpense"] += $transaction["amount"];
        }
    }

    return $totals;
}