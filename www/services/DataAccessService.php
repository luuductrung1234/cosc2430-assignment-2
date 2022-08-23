<?php

declare(strict_types=1);

namespace Services;

class DataAccessService
{
    public static function getAccount(string $username, string $password): ?array
    {
        $accounts = self::loadAccounts();
        $account = array_values(array_filter($accounts, fn($a) => $a["username"] == $username && password_verify($password, $a["password"])));
        return empty($account) ? null : $account[0];
    }

    public static function getProducts(?int $vendorId = null, ?string $name = null): ?array
    {
        $products = self::loadProducts();
        if (!is_null($vendorId))
            $products = array_values(array_filter($products, fn($a) => $a["vendorId"] == $vendorId));
        if (!is_null($name))
            $products = array_values(array_filter($products, fn($a) => $a["name"] == $name));
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
        if(!empty($orderItems))
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
        $products[] = [
            "id" => $product["id"],
            "price" => $product["price"],
            "pictures" => $product["pictures"],
            "description" => $product["description"],
            "vendorId" => $product["vendorId"],
        ];
        self::saveProducts($products);
        return $products;
    }

    public static function getProfile(int $profileId, string $role): ?array
    {
        $profiles = self::loadProfiles($role);
        $profile = array_filter($profiles, fn($p) => $p["id"] === $profileId);
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
}