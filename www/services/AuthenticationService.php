<?php

declare(strict_types=1);

namespace Services;

class AuthenticationService
{
    public static function rememberAccount(array $loggedInAccount): void
    {
        $_SESSION["User"] = $loggedInAccount;
    }
    
    public static function getAccount(): ?array
    {
        return $_SESSION["User"] ?? null;
    }
    
    public static function clearAccount(): void
    {
        unset($_SESSION["User"]);
    }

    public static function isLoggedIn(): bool
    {
       return isset($_SESSION["User"]);
    }
}