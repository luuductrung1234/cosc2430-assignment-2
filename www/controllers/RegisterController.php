<?php

declare(strict_types=1);

namespace Controllers;

require_once SERVICE_PATH . "DataAccessService.php";
require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;
use Services\DataAccessService;

class RegisterController
{
    public function index(): string
    {
        $viewData = [
            "_title" => "Register",
            "_show_header" => false,
            "_show_footer" => false,
            "selectedRole" => $_GET["selectedRole"] ?? null,
            "invalid" => false,
            "registerFailed" => false
        ];
        return (string)View::make("register/index", $viewData);
    }
    
    public function detail(): string {
        $viewData = [
            "_title" => "Register Detail",
            "_show_header" => false,
            "_show_footer" => false,
            "selectedRole" => $_GET["selectedRole"] ?? null,
            "invalid" => false,
            "registerFailed" => false
        ];
        return (string)View::make("register/detail", $viewData);
    }
    
    public function register(): string {
        $viewData = [
            "_title" => "Register Success",
            "_show_header" => false,
            "_show_footer" => false
        ];
        return (string)View::make("register/success", $viewData);
    }
}