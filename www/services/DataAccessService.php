<?php

declare(strict_types=1);

namespace Services;

class DataAccessService
{
    public static function getAccount(string $username, string $password): ?array
    {
        $accountData = file_get_contents(DATA_PATH . "account.db");
        $accounts = (array)json_decode($accountData, true);
        $account = array_values(array_filter($accounts, fn($a) => $a["username"] == $username && password_verify($password, $a["password"])));
        return empty($account) ? null : $account[0];
    }

    public static function loadProfiles(string $role): array
    {
        $profileData = match ($role) {
            "customer" => file_get_contents(DATA_PATH . "customer.db"),
            "vendor" => file_get_contents(DATA_PATH . "vendor.db"),
            "shipper" => file_get_contents(DATA_PATH . "shipper.db"),
            default => throw new \OutOfRangeException("User's role is not supported"),
        };
        return (array)json_decode($profileData, true);
    }

    public static function saveProfiles(string $role, array $profiles): void
    {
        $profileData = json_encode($profiles);
        $_ = match ($role) {
            "customer" => file_put_contents(DATA_PATH . "customer.db", $profileData),
            "vendor" => file_put_contents(DATA_PATH . "vendor.db", $profileData),
            "shipper" => file_put_contents(DATA_PATH . "shipper.db", $profileData),
            default => throw new \OutOfRangeException("User's role is not supported"),
        };
    }

    public static function getProfile(int $profileId, string $role): ?array
    {
        $profiles = self::loadProfiles($role);
        $profile = array_filter($profiles, fn($p) => $p["id"] === $profileId);
        return empty($profile) ? null : $profile[0];
    }

    public static function updateProfile(int $profileId, string $role, array $data): ?array
    {
        $profiles = self::loadProfiles($role);
        foreach ($profiles as &$profileToUpdate) {
            if ($profileToUpdate["id"] === $profileId) {
                foreach ($data as $fieldName => $fieldValue){
                    $profileToUpdate[$fieldName] = $fieldValue;
                }
                self::saveProfiles($role, $profiles);
                return $profileToUpdate;
            }
        }
        return null;
    }
}