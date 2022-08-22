<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;
use Services\AuthenticationService;
use Services\DataAccessService;

class ProfileController
{
    public function index(): string
    {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $viewData = [
            "_title" => "Profile",
            "_avatar" => $profile["picture"],
            "account" => $account,
            "profile" => $profile
        ];
        return (string)View::make("profile/index", $viewData);
    }

    public function update(): string
    {
        $account = AuthenticationService::getAccount();
        $extension = explode('.', $_FILES["picture"]["name"])[1];
        $fileName = $account["role"] . '-' . $account["profileId"] . '.' . $extension;
        $filePath = IMAGE_PATH . $fileName;
        move_uploaded_file($_FILES["picture"]["tmp_name"], $filePath);
        return "";
    }
}
