<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use DateTime;
use DateTimeZone;
use Exception;
use SeedWork\View;
use Services\AuthenticationService;
use Services\DataAccessService;

class OrderController
{
    public function detail(?int $id = null): string
    {
        $orderId = (int)($id ?? $_GET["id"] ?? 0);
        if ($orderId === 0) {
            header("Location: /");
            exit();
        }
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $order = DataAccessService::getOrder($orderId);
        if (empty($order)) {
            header("Location: /");
            exit();
        }
        $viewData = [
            "_title" => "Order Detail",
            "_avatar" => $profile["picture"],
            "account" => $account,
            "profile" => $profile,
            "order" => $order
        ];
        return (string)View::make("order/detail", $viewData);
    }

    /**
     * @throws Exception
     */
    public function create(): string
    {
        $cart = $_COOKIE["cart"];
        if (empty($cart)) {
            header("Location: /");
            exit();
        }
        $orderItems = [];
        foreach ($cart as $item) {
            $product = DataAccessService::getProduct($item["id"]);
            $orderItems[] = [
                "productId" => $item["id"],
                "price" => $product["price"],
                "quantity" => $item["quantity"],
            ];
        }

        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);

        $order = [
            "id" => DataAccessService::getNextProductId(),
            "status" => "active",
            "customerId" => $profile["id"],
            "distributionId" => DataAccessService::getRandomDistribution() ?? null,
            "shipperId" => null,
            "orderDate" => new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh')),
            "items" => $orderItems
        ];
        DataAccessService::addOrder($order);
        unset($_COOKIE["cart"]);
        return $this->detail($order["id"]);
    }

    public function delivery(): void
    {
        $orderId = (int)($_GET["id"] ?? 0);
        if ($orderId > 0)
            DataAccessService::updateOrder($orderId, ["status" => "delivered"]);
        header("Location: /");
    }

    public function cancel(): void
    {
        $orderId = (int)($_GET["id"] ?? 0);
        if ($orderId > 0)
            DataAccessService::updateOrder($orderId, ["status" => "cancelled"]);
        header("Location: /");
    }
}