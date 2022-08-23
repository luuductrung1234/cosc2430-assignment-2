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
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $products = DataAccessService::getProducts();
        $topOrderedProducts = DataAccessService::getTopOrderedProducts();
        $viewData = [
            "_title" => "Customer",
            "_avatar" => $profile["picture"],
            "customer" => $profile,
            "products" => $products ?? [],
            "topOrderProducts"=> $topOrderedProducts ?? []
        ];
        return (string)View::make("customer/index", $viewData);
    }
}