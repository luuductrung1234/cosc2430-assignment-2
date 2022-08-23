<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;
use Services\AuthenticationService;
use Services\DataAccessService;

class ProductController
{
    public function detail(?int $productId = null): string
    {
        if (!isset($_GET["id"]) && is_null($productId) !== null) {
            header("Location: /");
            exit();
        }
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $product = DataAccessService::getProduct($_GET["id"] ?? $productId);
        $viewData = [
            "_title" => "Product",
            "_avatar" => $profile["picture"],
            "product" => $product
        ];
        return (string)View::make("product/detail", $viewData);
    }
    
    public function productForm(): string {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $viewData = [
            "_title" => "Product Form",
            "_avatar" => $profile["picture"],
        ];
        if (isset($_GET["id"])) {
            $product = DataAccessService::getProduct($_GET["id"]);
            $viewData["product"] = $product;
        }
        return (string)View::make("product/form", $viewData);
    }
    
    public function submit(): string {
        $productId = $_POST["id"];
        return $this->detail($productId);
    }
}
