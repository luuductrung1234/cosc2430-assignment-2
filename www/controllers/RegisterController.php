<?php

declare(strict_types=1);

namespace Controllers;

require_once SERVICE_PATH . "DataAccessService.php";
require_once SEED_WORK_PATH . "View.php";

use SeedWork\View;

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

    public function detail(string $selectedRole = null, string $errorMessage = ""): string
    {
        $viewData = [
            "_title" => "Register Detail",
            "_show_header" => false,
            "_show_footer" => false,
            "selectedRole" => $selectedRole ?? $_GET["selectedRole"] ?? null,
            "invalid" => false,
            "errorMessage" => $errorMessage,
            "registerFailed" => false,
            "old" => []
        ];
        if (!empty($errorMessage)) {
            $viewData["invalid"] = true;
            $viewData["old"] = [
                "username" => $_POST["username"],
                "businessName" => $_POST["businessName"] ?? null,
                "businessAddress" => $_POST["businessAddress"] ?? null,
                "firstname" => $_POST["firstname"] ?? null,
                "lastname" => $_POST["lastname"] ?? null,
                "address" => $_POST["address"] ?? null,
                "distributionId" => $_POST["distribution"] ?? null,
                "email" => $_POST["email"],
                "phone" => $_POST["phone"],
            ];
        }
        return (string)View::make("register/detail", $viewData);
    }

    /// this function run when click continue ///
    public function register(): string
    {
        $usernamePattern = "/^[a-zA-Z0-9].{8,15}$/";
        $passwordPattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/";
        $generalPattern = "/^.{5,}$/";

        if (!preg_match($usernamePattern, $_POST["username"])) {
            return $this->detail($_SESSION["selectedRole"], "Username must contain only letters(lower or upper), digits and contains of 8-15 characters.");
        } else if (!preg_match($passwordPattern, $_POST["password"])) {
            return $this->detail($_SESSION["selectedRole"], "Password must contains at least one upper case letter, one lower case letter, one digit, and one special letter in the set !@#$%^&*, NO other kind of characters, must have 8 to 20 characters.");
        } else if (!preg_match($generalPattern, $_POST["email"])) {
            return $this->detail($_SESSION["selectedRole"], "Email must more than 5 characters.");
        } else if (!preg_match($generalPattern, $_POST["phone"])) {
            return $this->detail($_SESSION["selectedRole"], "Phone must more than 5 characters.");
        }

        if ($_SESSION["selectedRole"] == "vendor") {
            if (!preg_match($generalPattern, $_POST["businessName"])) {
                return $this->detail($_SESSION["selectedRole"], "Business name must more than 5 characters.");
            } else if (!preg_match($generalPattern, $_POST["businessAddress"])) {
                return $this->detail($_SESSION["selectedRole"], "Business address must more than 5 characters.");
            }
            return $this->validateVendor();
        } else {
            if (!preg_match($generalPattern, $_POST["firstname"])) {
                return $this->detail($_SESSION["selectedRole"], "Firstname must more than 5 characters.");
            } else if (!preg_match($generalPattern, $_POST["lastname"])) {
                return $this->detail($_SESSION["selectedRole"], "Lastname must more than 5 characters.");
            } else if (!preg_match($generalPattern, $_POST["address"])) {
                return $this->detail($_SESSION["selectedRole"], "Address must more than 5 characters.");
            }
            if ($_SESSION["selectedRole"] == "shipper") {
                return $this->validateShipper();
            } else if ($_SESSION["selectedRole"] == "customer") {
                return $this->validateCustomer();
            }
        }
        return "";
    }

    public function validateVendor(): string
    {
        $account_data = file_get_contents(DATA_PATH . "account.db");
        $vendor_data = file_get_contents(DATA_PATH . "vendor.db");

        $account = json_decode($account_data, true);
        $vendor = json_decode($vendor_data, true);

        $new_vendor = array(
            "id" => 0,
            "businessName" => $_POST["businessName"],
            "businessAddress" => $_POST["businessAddress"],
            "email" => $_POST["email"],
            "phone" => $_POST["phone"],
            "picture" => $_FILES["picture"],
        );
        $new_account = array(
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "email" => $_POST["email"],
            "role" => "vendor",
            "profileId" => 0
        );

        $username_unique = true;
        $business_unique = true;

        $curr_id = 0;
        for ($i = 0; $i < count($account); $i++) {
            if ($account[$i]["username"] == $new_account["username"]) {
                $username_unique = false;
                break;
            }
            if ($account[$i]["role"] == "vendor") {
                $curr_id = max($curr_id, $account[$i]["profileId"] + 1);
            }
        }
        $new_vendor["id"] = $curr_id;
        $new_account["profileId"] = $curr_id;


        for ($i = 0; $i < count($vendor); $i++) {
            if ($vendor[$i]["businessName"] == $new_vendor["businessName"] || $vendor[$i]["businessAddress"] == $new_vendor["businessAddress"]) {
                $business_unique = false;
                break;
            }
        }

        if ($username_unique && $business_unique) {
            if (!isset($_FILES["picture"]) || empty($_FILES["picture"]["name"])) {
                $new_vendor["picture"] = "";
            } else {
                $extension = explode('.', $_FILES["picture"]["name"])[1];
                $fileName = "vendor" . "-" . "$curr_id" . "." . $extension;
                move_uploaded_file($_FILES["picture"]["tmp_name"], IMAGE_PATH . $fileName);
                $new_vendor["picture"] = $fileName;
            }

            $pw = $new_account["password"];
            $hash_pw = password_hash($pw, PASSWORD_BCRYPT);
            $new_account["password"] = $hash_pw;

            array_push($vendor, $new_vendor);
            $vendor_encode = json_encode($vendor);
            file_put_contents(DATA_PATH . "vendor.db", $vendor_encode);

            array_push($account, $new_account);
            $account_encode = json_encode($account);
            file_put_contents(DATA_PATH . "account.db", $account_encode);

            unset($_SESSION["username_existed"]);
            echo "<script>
                    location.pathname = '/login';
                </script>";
        } else if (!$username_unique) {
            $_SESSION["username_existed"] = true;
            return $this->detail($_SESSION["selectedRole"], "Username already existed!");
        } else {
            $_SESSION["business_existed"] = true;
            return $this->detail($_SESSION["selectedRole"], "BusinessName or BusinessAddress already existed!");
        }
        return "";
    }

    public function validateShipper(): string
    {
        $account_data = file_get_contents(DATA_PATH . "account.db");
        $shipper_data = file_get_contents(DATA_PATH . "shipper.db");

        $account = json_decode($account_data, true);
        $shipper = json_decode($shipper_data, true);

        $new_account = array(
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "email" => $_POST["email"],
            "role" => "shipper",
            "profileId" => 0
        );
        $new_shipper = array(
            "id" => 0,
            "firstname" => $_POST["firstname"],
            "lastname" => $_POST["lastname"],
            "email" => $_POST["email"],
            "address" => $_POST["address"],
            "phone" => $_POST["phone"],
            "distributionId" => (int) $_POST["distribution"],
            "picture" => $_FILES["picture"],
        );

        $username_unique = true;
        $curr_id = 0;
        for ($i = 0; $i < count($account); $i++) {
            if ($account[$i]["username"] == $new_account["username"]) {
                $username_unique = false;
                break;
            }
            if ($account[$i]["role"] == "shipper") {
                $curr_id = max($curr_id, $account[$i]["profileId"] + 1);
            }
        }
        $new_shipper["id"] = $curr_id;
        $new_account["profileId"] = $curr_id;

        if ($username_unique) {
            if (!isset($_FILES["picture"]) || empty($_FILES["picture"]["name"])) {
                $new_shipper["picture"] = "";
            } else {
                $extension = explode('.', $_FILES["picture"]["name"])[1];
                $fileName = "shipper" . "-" . "$curr_id" . "." . $extension;
                move_uploaded_file($_FILES["picture"]["tmp_name"], IMAGE_PATH . $fileName);
                $new_shipper["picture"] = $fileName;
            }

            $pw = $new_account["password"];
            $hash_pw = password_hash($pw, PASSWORD_BCRYPT);
            $new_account["password"] = $hash_pw;

            array_push($shipper, $new_shipper);
            $shipper_encode = json_encode($shipper);
            file_put_contents(DATA_PATH . "shipper.db", $shipper_encode);

            array_push($account, $new_account);
            $account_encode = json_encode($account);
            file_put_contents(DATA_PATH . "account.db", $account_encode);

            unset($_SESSION["username_existed"]);
            echo "<script>
                    location.pathname = '/login';
                </script>";
        } else {
            $_SESSION["username_existed"] = true;
            return $this->detail($_SESSION["selectedRole"], "Username already existed!");
        }
        return "";
    }

    public function validateCustomer(): string
    {
        $account_data = file_get_contents(DATA_PATH . "account.db");
        $customer_data = file_get_contents(DATA_PATH . "customer.db");

        $account = json_decode($account_data, true);
        $customer = json_decode($customer_data, true);

        $new_account = array(
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "email" => $_POST["email"],
            "role" => "customer",
            "profileId" => 0
        );
        $new_customer = array(
            "id" => 0,
            "firstname" => $_POST["firstname"],
            "lastname" => $_POST["lastname"],
            "email" => $_POST["email"],
            "address" => $_POST["address"],
            "phone" => $_POST["phone"],
            "picture" => $_FILES["picture"],
        );

        $username_unique = true;
        $curr_id = 0;
        for ($i = 0; $i < count($account); $i++) {
            if ($account[$i]["username"] == $new_account["username"]) {
                $username_unique = false;
                break;
            }
            if ($account[$i]["role"] == "customer") {
                $curr_id = max($curr_id, $account[$i]["profileId"] + 1);
            }
        }
        $new_customer["id"] = $curr_id;
        $new_account["profileId"] = $curr_id;

        if ($username_unique) {
            if (!isset($_FILES["picture"]) || empty($_FILES["picture"]["name"])) {
                $new_customer["picture"] = "";
            } else {
                $extension = explode('.', $_FILES["picture"]["name"])[1];
                $fileName = "customer" . "-" . "$curr_id" . "." . $extension;
                move_uploaded_file($_FILES["picture"]["tmp_name"], IMAGE_PATH . $fileName);
                $new_customer["picture"] = $fileName;
            }

            $pw = $new_account["password"];
            $hash_pw = password_hash($pw, PASSWORD_BCRYPT);
            $new_account["password"] = $hash_pw;

            array_push($customer, $new_customer);
            $customer_encode = json_encode($customer);
            file_put_contents(DATA_PATH . "customer.db", $customer_encode);

            array_push($account, $new_account);
            $account_encode = json_encode($account);
            file_put_contents(DATA_PATH . "account.db", $account_encode);

            unset($_SESSION["username_existed"]);
            echo "<script>
                    location.pathname = '/login';
                </script>";
        } else {
            $_SESSION["username_existed"] = true;
            return $this->detail($_SESSION["selectedRole"], "Username already existed!");
        }
        return "";
    }
}

