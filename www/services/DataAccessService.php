<?php

declare(strict_types=1);

namespace Services;

class DataAccessService
{
    public static function getAccount(string $username, string $password): ?array
    {
        $accountData = file_get_contents(DATA_PATH . "account.db");
        $accounts = (array)json_decode($accountData, true);
        $account = array_filter($accounts, fn($a) => $a["username"] == $username && password_verify($password, $a["password"]));
        return empty($account) ? null : $account[0];
    }

    public static function getProfile(int $profileId, string $role): ?array
    {
        $profileData = match ($role) {
            "customer" => file_get_contents(DATA_PATH . "customer.db"),
            "vendor" => file_get_contents(DATA_PATH . "vendor.db"),
            "shipper" => file_get_contents(DATA_PATH . "shipper.db"),
            default => throw new \OutOfRangeException("User's role is not supported"),
        };
        $profiles = (array)json_decode($profileData, true);
        $profile = array_filter($profiles, fn($p) => $p["id"] === $profileId);
        return empty($profile) ? null : $profile[0];
    }
}