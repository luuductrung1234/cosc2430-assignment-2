<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;
use Services\AuthenticationService;
use Services\DataAccessService;

class ShipperController
{
    public function index(): string
    {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $orders = DataAccessService::getOrders($profile["distributionId"], "active");
        $viewData = [
            "_title" => "Shipper",
            "_avatar" => $profile["picture"],
            "account" => $account,
            "shipper" => $profile,
            "orders" => $orders
        ];
        return (string)View::make("shipper/index", $viewData);
    }
}
