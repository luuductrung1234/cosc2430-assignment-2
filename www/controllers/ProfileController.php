<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;
use Services\AuthenticationService;
use Services\DataAccessService;

class ProfileController
{
    public function index(?bool $updateSuccess = null): string
    {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $distribution = null;
        if ($account["role"] == SHIPPER_ROLE)
            $distribution = DataAccessService::getDistribution($profile["distributionId"]);
        $viewData = [
            "_title" => "Profile",
            "_avatar" => $profile["picture"],
            "account" => $account,
            "profile" => $profile,
            "distribution" => $distribution,
            "updateSuccess" => $updateSuccess ?? false
        ];
        return (string)View::make("profile/index", $viewData);
    }

    public function update(): string
    {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $newFileName = $this->uploadPicture($account, $profile);
        if (is_null($newFileName)) {
            return $this->index(false);
        }

        DataAccessService::updateProfile($account["profileId"], $account["role"], [
            "picture" => $newFileName
        ]);
        return $this->index(true);
    }

    private function uploadPicture(array $account, array $profile): ?string
    {
        if (!isset($_FILES["picture"]) || empty($_FILES["picture"]["name"])) {
            return null;
        }

        if (is_file(IMAGE_PATH . $profile["picture"])) {
            // delete old picture
            unlink(IMAGE_PATH . $profile["picture"]);
        }

        // move new picture, from temporary php host directory to /images/ directory
        $extension = explode('.', $_FILES["picture"]["name"])[1];
        $fileName = $account["role"] . '-' . $account["profileId"] . '.' . $extension;
        move_uploaded_file($_FILES["picture"]["tmp_name"], IMAGE_PATH . $fileName);
        return $fileName;
    }
}
