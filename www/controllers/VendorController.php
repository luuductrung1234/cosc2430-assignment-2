<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;

class VendorController
{
    public function index(): string
    {
        $viewData = [
            "_title" => "Vendor",
            "vendor" => [
                "name" => "Alice"
            ]
        ];
        return (string)View::make("vendor/index", $viewData);
    }
}
