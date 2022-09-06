<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;
use Services\AuthenticationService;
use Services\DataAccessService;

class StaticController
{
    public function about(): string
    {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $viewData = [
            "_title" => "About Us",
            "_avatar" => $profile["picture"],
        ];
        return (string)View::make("about.html", $viewData);
    }
    
    public function policy(): string
    {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $viewData = [
            "_title" => "Policy",
            "_avatar" => $profile["picture"],
        ];
        return (string)View::make("policy.html", $viewData);
    }
    
    public function contact(): string
    {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $viewData = [
            "_title" => "Contact Us",
            "_avatar" => $profile["picture"],
        ];
        return (string)View::make("contact.html", $viewData);
    }
    
    public function helps(): string
    {
        $account = AuthenticationService::getAccount();
        $profile = DataAccessService::getProfile($account["profileId"], $account["role"]);
        $viewData = [
            "_title" => "Helps",
            "_avatar" => $profile["picture"],
        ];
        return (string)View::make("helps.html", $viewData);
    }
}
