<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;
use Services\AuthenticationService;
use Services\DataAccessService;

class CustomerController
{
    public function index(): string
    {
        $searchName = $_GET["searchName"] ?? null;
        $fromPrice = isset($_GET["fromPrice"]) && !empty($_GET["fromPrice"]) ? (float)$_GET["fromPrice"] : null;
        $toPrice = isset($_GET["toPrice"]) && !empty($_GET["toPrice"]) ? (float)$_GET["toPrice"] : null;

        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $products = DataAccessService::getProducts(name: $searchName, fromPrice: $fromPrice, toPrice: $toPrice);
        $viewData = [
            "_title" => "Customer",
            "_avatar" => $profile["picture"],
            "customer" => $profile,
            "products" => $products ?? [],
            "oldSearchName" => $searchName,
            "oldFromPrice" => $fromPrice,
            "oldToPrice" => $toPrice
        ];
        return (string)View::make("customer/index", $viewData);
    }

    public function listOrder(): string
    {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $orders = DataAccessService::getOrders();
        $viewData = [
            "_title" => "Orders",
            "_avatar" => $profile["picture"],
            "account" => $account,
            "customer" => $profile,
            "orders" => $orders
        ];
        return (string)View::make("customer/order", $viewData);
    }
}