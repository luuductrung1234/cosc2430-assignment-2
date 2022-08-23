<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;
use Services\AuthenticationService;
use Services\DataAccessService;

class VendorController
{
    public function index(): string
    {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $products = DataAccessService::getProducts($account["profileId"]);
        $viewData = [
            "_title" => "Vendor",
            "_avatar" => $profile["picture"],
            "vendor" => $profile,
            "products" => $products
        ];
        return (string)View::make("vendor/index", $viewData);
    }
    
    public function addProduct(): string {
        
        
        return $this->index();
    }
}
