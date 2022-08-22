<?php

declare(strict_types=1);

namespace Controllers;

require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;

class ErrorController
{
    public function notfound(): string
    {
        $viewData = [
            "_title" => "404",
            "_show_header" => false,
            "_show_footer" => false
        ];
        return (string)View::make("error/404", $viewData);
    }
    
    public function internalError(): string
    {
        $viewData = [
            "_title" => "500",
            "_show_header" => false,
            "_show_footer" => false
        ];
        return (string)View::make("error/500", $viewData);
    }
}
