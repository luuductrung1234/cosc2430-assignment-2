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
        $product = DataAccessService::getProduct((int)$_GET["id"] ?? $productId);
        $viewData = [
            "_title" => "Product",
            "_avatar" => $profile["picture"],
            "account" => $account,
            "profile" => $profile,
            "product" => $product
        ];
        return (string)View::make("product/detail", $viewData);
    }

    public function productForm(): string
    {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $viewData = [
            "_title" => "Product Form",
            "_avatar" => $profile["picture"],
        ];
        if (isset($_GET["id"])) {
            $product = DataAccessService::getProduct((int)$_GET["id"]);
            $viewData["product"] = $product;
        }
        return (string)View::make("product/form", $viewData);
    }

    public function submit(): string
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";

        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $productId = $_POST["id"] === 0 ? DataAccessService::getNextProductId() : $_POST["id"];
        $product = [
            "id" => $productId,
            "name" => $_POST["name"],
            "description" => $_POST["description"],
            "pictures" => [],
            "vendorId" => $profile["id"]
        ];
        return "";
    }

    private function uploadPictures(array $product): ?array
    {
        if (!isset($_FILES["pictures"]) || empty($_FILES["pictures"]["name"])) {
            return null;
        }

        foreach ($product["pictures"] as $picture) {
            if (is_file(IMAGE_PATH . $picture)) {
                // delete old picture
                unlink(IMAGE_PATH . $picture);
            }
        }
        
        $fileNames = [];

        // move new picture, from temporary php host directory to /images/ directory
        for ($i = 0; $i < count($_FILES["pictures"]["name"]); $i++) {
            $extension = explode('.', $_FILES["pictures"]["name"][$i])[1];
            $fileName = 'product-' . $product["id"] . '-' . $i . '.' . $extension;
            move_uploaded_file($_FILES["pictures"]["tmp_name"][$i], IMAGE_PATH . $fileName);
            $fileNames[] = $fileName;
        }

        return $fileNames;
    }
}
