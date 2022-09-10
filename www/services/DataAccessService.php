<?php

declare(strict_types=1);

namespace Services;

class DataAccessService
{
    // =========================================================
    // ACCOUNT
    // =========================================================

    public static function getAccount(string $username, string $password): ?array
    {
        $accounts = self::loadAccounts();
        $account = array_values(array_filter($accounts, fn($a) => $a["username"] == $username && password_verify($password, $a["password"])));
        return empty($account) ? null : $account[0];
    }

    // =========================================================
    // PRODUCT
    // =========================================================

    public static function getProducts(?int $vendorId = null, ?string $name = null, ?float $fromPrice = null, ?float $toPrice = null): ?array
    {
        $products = self::loadProducts();
        if (!is_null($vendorId))
            $products = array_values(array_filter($products, fn($a) => $a["vendorId"] == $vendorId));
        if (!empty($name)) {
            $products = array_values(array_filter($products, fn($a) => str_contains(strtolower($a["name"]), strtolower($name))));
        }
        if (!is_null($fromPrice)) {
            $products = array_values(array_filter($products, fn($a) => $a["price"] >= $fromPrice));
        }
        if (!is_null($toPrice)) {
            $products = array_values(array_filter($products, fn($a) => $a["price"] <= $toPrice));
        }
        return $products;
    }

    public static function getTopOrderedProducts(?int $vendorId = null, ?string $name = null): ?array
    {
        $orders = self::loadOrders();
        $orderItemLists = array_map(fn($order) => $order["items"], $orders);
        $orderItems = array_reduce($orderItemLists, fn($mergedItems, $orderItemList) => array_merge($mergedItems, $orderItemList), []);
        $orderItems = array_reduce(
            $orderItems,
            function ($groupedItems, $orderItem) {
                foreach ($groupedItems as &$existedItem) {
                    if ($existedItem["productId"] === $orderItem["productId"]) {
                        $existedItem["quantity"] += $orderItem["quantity"];
                        return $groupedItems;
                    }
                }
                $groupedItems[] = $orderItem;
                return $groupedItems;
            },
            []
        );
        $orderedProductIds = array_map(fn($item) => $item["productId"], $orderItems);
        $products = self::loadProducts();
        if (!empty($orderItems))
            $products = array_values(array_filter($products, fn($a) => in_array($a["id"], $orderedProductIds)));
        if (!is_null($vendorId))
            $products = array_values(array_filter($products, fn($a) => $a["vendorId"] == $vendorId));
        if (!is_null($name))
            $products = array_values(array_filter($products, fn($a) => $a["name"] == $name));
        return $products;
    }

    public static function getProduct(int $id): ?array
    {
        $products = self::loadProducts();
        $product = array_values(array_filter($products, fn($p) => $p["id"] == $id));
        $product = empty($product) ? null : $product[0];
        if (is_null($product)) return null;

        $vendor = self::getProfile($product["vendorId"], VENDOR_ROLE);
        $product["vendorName"] = $vendor["businessName"];
        $product["vendorAddress"] = $vendor["businessAddress"];
        $product["vendorPhone"] = $vendor["phone"];
        return $product;
    }

    public static function getNextProductId(): int
    {
        $products = self::loadProducts();
        return count($products) + 1;
    }

    public static function addProduct(array $product): ?array
    {
        $products = self::loadProducts();
        $products[] = [
            "id" => $product["id"],
            "name" => $product["name"],
            "price" => $product["price"],
            "pictures" => $product["pictures"],
            "description" => $product["description"],
            "vendorId" => $product["vendorId"],
        ];
        self::saveProducts($products);
        return $products;
    }

    public static function addOrUpdateProfile(int $productId, array $data): ?array
    {
        $products = self::loadProducts();
        foreach ($products as &$productToUpdate) {
            if ($productToUpdate["id"] === $productId) {
                foreach ($data as $fieldName => $fieldValue) {
                    if ((is_string($fieldValue) || is_array($fieldValue)) && empty($fieldValue))
                        continue;
                    if (is_numeric($fieldValue) && $fieldValue < 0)
                        continue;
                    $productToUpdate[$fieldName] = $fieldValue;
                }
                self::saveProducts($products);
                return $productToUpdate;
            }
        }
        return self::addProduct($data);
    }

    // =========================================================
    // PROFILE
    // =========================================================

    public static function getProfile(int $profileId, string $role): ?array
    {
        $profiles = self::loadProfiles($role);
        $profile = array_values(array_filter($profiles, fn($p) => $p["id"] === $profileId));
        return empty($profile) ? null : $profile[0];
    }

    public static function updateProfile(int $profileId, string $role, array $data): ?array
    {
        $profiles = self::loadProfiles($role);
        foreach ($profiles as &$profileToUpdate) {
            if ($profileToUpdate["id"] === $profileId) {
                foreach ($data as $fieldName => $fieldValue) {
                    $profileToUpdate[$fieldName] = $fieldValue;
                }
                self::saveProfiles($role, $profiles);
                return $profileToUpdate;
            }
        }
        return null;
    }

    // =========================================================
    // ORDER
    // =========================================================

    public static function getOrders(?int $distributionId = null, ?string $status = null, ?int $customerId = null): ?array
    {
        $orders = self::loadOrders();
        if (!is_null($distributionId))
            $orders = array_values(array_filter($orders, fn($a) => $a["distributionId"] == $distributionId));
        if (!is_null($status))
            $orders = array_values(array_filter($orders, fn($a) => $a["status"] == $status));
        if (!is_null($customerId))
            $orders = array_values(array_filter($orders, fn($a) => $a["customerId"] == $customerId));

        $customers = self::loadProfiles(CUSTOMER_ROLE);
        foreach ($orders as &$order) {
            $order["totalAmount"] = array_reduce($order["items"], fn($total, $item) => $total += $item["price"]);
            $order["totalQuantity"] = array_reduce($order["items"], fn($total, $item) => $total += $item["quantity"]);

            $customer = array_values(array_filter($customers, fn($c) => $c["id"] == $order["customerId"]));
            $customer = empty($customer) ? null : $customer[0];
            if (is_null($customer)) continue;
            $order["customerName"] = $customer["firstname"] . " " . $customer["lastname"];
        }
        return $orders;
    }

    public static function getOrder(int $id): ?array
    {
        $orders = self::loadOrders();
        $order = array_values(array_filter($orders, fn($o) => $o["id"] == $id));
        $order = empty($order) ? null : $order[0];
        if (is_null($order)) return null;

        $order["totalAmount"] = array_reduce($order["items"], fn($total, $item) => $total += $item["price"]);

        $customer = self::getProfile($order["customerId"], CUSTOMER_ROLE);
        if (is_null($customer)) return null;
        $order["customerName"] = $customer["firstname"] . " " . $customer["lastname"];
        $order["customerAddress"] = $customer["address"];
        $order["customerPhone"] = $customer["phone"];
        
        $distribution = self::getDistribution($order["distributionId"]);
        if (is_null($distribution)) return null;
        $order["distributionName"] = $distribution["name"];

        if (!is_null($order["shipperId"])) {
            $shipper = self::getProfile($order["shipperId"], SHIPPER_ROLE);
            $order["shipperName"] = $shipper["firstname"] . " " . $shipper["lastname"];
        }

        $products = self::loadProducts();
        foreach ($order["items"] as &$item) {
            $product = array_values(array_filter($products, fn($p) => $p["id"] == $item["productId"]));
            $product = empty($product) ? null : $product[0];
            if (is_null($product)) continue;
            $item["name"] = $product["name"];
            $item["pictures"] = $product["pictures"];
            $item["description"] = $product["description"];
        }
        return $order;
    }

    public static function updateOrder(int $id, array $data): ?array
    {
        $orders = self::loadOrders();
        foreach ($orders as &$orderToUpdate) {
            if ($orderToUpdate["id"] === $id) {
                foreach ($data as $fieldName => $fieldValue) {
                    $orderToUpdate[$fieldName] = $fieldValue;
                }
                self::saveOrders($orders);
                return $orderToUpdate;
            }
        }
        return null;
    }

    public static function addOrder(array $order): ?array
    {
        $orders = self::loadOrders();
        $orders[] = $order;
        self::saveOrders($orders);
        return $order;
    }
    
    public static function getNextOrderId(): int
    {
        $orders = self::loadOrders();
        return count($orders) + 1;
    }

    // =========================================================
    // DISTRIBUTION
    // =========================================================

    public static function getDistribution(int $id): ?array
    {
        $distributions = self::loadDistributions();
        $distribution = array_values(array_filter($distributions, fn($d) => $d["id"] == $id));
        return empty($distribution) ? null : $distribution[0];
    }

    public static function getRandomDistribution(): ?array
    {
        $distributions = self::loadDistributions();
        if(empty($distributions)) return null;
        $randomIndex = array_rand($distributions);
        return $distributions[$randomIndex];
    }

    // =========================================================
    // PRIVATE HELPERS
    // =========================================================

    private static function loadAccounts(): array
    {
        $accountData = file_get_contents(DATA_PATH . "account.db");
        return (array)json_decode($accountData, true);
    }

    private static function saveAccounts(array $accounts): void
    {
        $accountData = json_encode($accounts);
        file_put_contents(DATA_PATH . "account.db", $accountData);
    }

    private static function loadProfiles(string $role): array
    {
        $profileData = match ($role) {
            "customer" => file_get_contents(DATA_PATH . "customer.db"),
            "vendor" => file_get_contents(DATA_PATH . "vendor.db"),
            "shipper" => file_get_contents(DATA_PATH . "shipper.db"),
            default => throw new \OutOfRangeException("User's role is not supported"),
        };
        return (array)json_decode($profileData, true);
    }

    private static function saveProfiles(string $role, array $profiles): void
    {
        $profileData = json_encode($profiles);
        $_ = match ($role) {
            "customer" => file_put_contents(DATA_PATH . "customer.db", $profileData),
            "vendor" => file_put_contents(DATA_PATH . "vendor.db", $profileData),
            "shipper" => file_put_contents(DATA_PATH . "shipper.db", $profileData),
            default => throw new \OutOfRangeException("User's role is not supported"),
        };
    }

    private static function loadProducts(): array
    {
        $productData = file_get_contents(DATA_PATH . "product.db");
        return (array)json_decode($productData, true);
    }

    private static function saveProducts(array $products): void
    {
        $productData = json_encode($products);
        file_put_contents(DATA_PATH . "product.db", $productData);
    }

    private static function loadOrders(): array
    {
        $orderData = file_get_contents(DATA_PATH . "order.db");
        return (array)json_decode($orderData, true);
    }

    private static function saveOrders(array $orders): void
    {
        $orderData = json_encode($orders);
        file_put_contents(DATA_PATH . "order.db", $orderData);
    }

    private static function loadDistributions(): array
    {
        $distributionData = file_get_contents(DATA_PATH . "distribution.db");
        return (array)json_decode($distributionData, true);
    }
}