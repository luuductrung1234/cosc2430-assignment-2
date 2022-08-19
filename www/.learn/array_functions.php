<?php

// https://www.php.net/manual/en/book.array.php

$arr1 = ['a', 'b', 'c'];
$arr2 = [5, 10, 15];

//=======================================
// Chunk
//=======================================

echo "<pre>";
print_r(array_chunk($arr1, 2));
echo "</pre>";

//=======================================
// Combine
//=======================================

echo "<pre>";
print_r(array_combine($arr1, $arr2));
echo "</pre>";

//=======================================
// Filter
//=======================================

echo "<pre>";
print_r(array_filter($arr2, fn($num) => $num % 2 === 0));
echo "</pre>";

echo "<pre>";
print_r(array_filter($arr2, fn($key) => $key < 1, ARRAY_FILTER_USE_KEY));
echo "</pre>";

echo "<pre>";
print_r(array_filter($arr2, fn($num, $key) => $num % 2 === 0 && $key < 1, ARRAY_FILTER_USE_BOTH));
echo "</pre>";

//=======================================
// Map
//=======================================

$nums1 = ['a' => 1, 'b' => 2, 'c' => 3];
$nums2 = ['d' => 4, 'e' => 5, 'f' => 6, 'h' => 7];

echo "<pre>";
print_r(array_map(fn($num1, $num2) => $num1 * $num2, $nums1, $nums2));
echo "</pre>";

//=======================================
// Merge
//=======================================

echo "<pre>";
print_r(array_merge($arr1, $nums1, $nums2));
echo "</pre>";

//=======================================
// Reduce
//=======================================

$invoiceItems = [
    ["price" => 9.99, "qty" => 3, "desc" => "Item 1"],
    ["price" => 29.99, "qty" => 1, "desc" => "Item 2"],
    ["price" => 149, "qty" => 3, "desc" => "Item 3"],
    ["price" => 14.99, "qty" => 6, "desc" => "Item 4"],
    ["price" => 3.99, "qty" => 2, "desc" => "Item 5"]
];

echo array_reduce($invoiceItems, fn($sum, $invoice) => $sum + $invoice["price"] * $invoice["qty"]) . "<br/>";

//=======================================
// Search
//=======================================

$chars = ['a', 'b', 'c', 'D', 'E', 'ab', 'bc', 'cd', 'b', 'd'];

$found_key = array_search('D', $chars);

if ($found_key) {
    echo "found" . "<br/>";
} else {
    echo "not found" . "<br/>";
}

//=======================================
// Search
//=======================================

$arr = ['d' => 3, 'b' => 1, 'c' => 4, 'a' => 2];

asort($arr);

echo "<pre>";
print_r($arr);
echo "</pre>";

ksort($arr);

echo "<pre>";
print_r($arr);
echo "</pre>";

usort($arr, fn($a, $b) => $a <=> $b);

echo "<pre>";
print_r($arr);
echo "</pre>";

//=======================================
// Destruction
//=======================================

[$a, $b, $c, $d] = $arr;

echo join(", ", [$a, $b, $c, $d]);









