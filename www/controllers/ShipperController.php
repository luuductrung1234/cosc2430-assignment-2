<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;

class ShipperController
{
    public function index(): string
    {
        $viewData = [
            "_title" => "Shipper",
            "shipper" => [
                "name" => "John"
            ]
        ];
        return (string)View::make("shipper/index", $viewData);
    }
}
