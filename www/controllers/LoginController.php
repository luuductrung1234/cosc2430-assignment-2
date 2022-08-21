<?php

declare(strict_types=1);

namespace Controllers;

require_once SERVICE_PATH . "AuthenticationService.php";
require_once SERVICE_PATH . "DataAccessService.php";
require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;
use Services\AuthenticationService;
use Services\DataAccessService;

class LoginController
{
    public function index(): string
    {
        if (AuthenticationService::isLoggedIn()) {
            header("Location: /");
        }

        $viewData = [
            "_title" => "Login",
            "_show_header" => false,
            "_show_footer" => false,
            "invalid" => $_GET["invalid"] ?? false,
            "loginFailed" => $_GET["loginFailed"] ?? false
        ];
        return (string)View::make("login/index", $viewData);
    }

    public function login(): void
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (!isset($username) || !isset($password)) {
            header("Location: " . LOGIN_URL . "?invalid=true");
        }

        $account = DataAccessService::getAccount($username, $password);

        if (isset($account) && !empty($account)) {
            AuthenticationService::rememberAccount([
                "username" => $account["username"],
                "role" => $account["role"],
                "profileId" => $account["profileId"]
            ]);
            header("Location: /");
            return;
        }

        header("Location: " . LOGIN_URL . "?loginFailed=true");
    }

    public function logout(): void
    {
        AuthenticationService::clearAccount();
        header("Location: " . LOGIN_URL);
    }
}
