<?php

$paymentStatus = 1;

//=============================================
// Switch
//=============================================

switch ($paymentStatus) {
    case 1:
        echo "Paid" . "<br/>";
        break;
    case 2:
    case 3:
        echo "Payment Declined" . "<br/>";
        break;
    case 0:
        echo "Pending Payment" . "<br/>";
        break;
    default:
        echo "Unknown Payment Status" . "<br/>";
}

//=============================================
// Match
//=============================================

$paymentStatusDisplay = match ($paymentStatus) {
    1 => "Paid",
    2, 3 => "Payment Declined",
    0 => "Pending Payment",
    default => "Unknown Payment Status"
};

echo $paymentStatusDisplay . "<br/>";