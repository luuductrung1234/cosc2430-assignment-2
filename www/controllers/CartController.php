<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;
use Services\AuthenticationService;
use Services\DataAccessService;

class CartController
{
    public function index(): string
    {
        if(!isset($_COOKIE["cart"])) {
            header("Location: /");
            exit();
        }
            
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $products = DataAccessService::getProducts();
        $viewData = [
            "_title" => "Cart",
            "_avatar" => $profile["picture"],
            "customer" => $profile,
            "products" => $products ?? [],
        ];
        return (string)View::make("cart/index", $viewData);
    }
}