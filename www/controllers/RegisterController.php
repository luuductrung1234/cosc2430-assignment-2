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
    
    /// this function run when click continue ///
    public function register(): void {
        $viewData = [
            "_title" => "Register Success",
            "_show_header" => false,
            "_show_footer" => false
        ];
        if ($_SESSION["selectedRole"] = "vendor"){
            $this->validateVendor();
        }
    }
    
    public function validateVendor(): void{
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

        if (!isset($_FILES["picture"]) || empty($_FILES["picture"]["name"])) {
            $new_vendor["picture"] = "";
        }
        else{
            $extension = explode('.', $_FILES["picture"]["name"])[1];
            $fileName = uniqid() . "." . $extension;
            move_uploaded_file($_FILES["picture"]["tmp_name"], IMAGE_PATH . $fileName);
            $new_vendor["picture"] = $fileName;
        }

        $username_unique = true;
        $business_unique = true;
    
        for($i = 0; $i < count($account); $i++){
            if ($account[$i]["username"] == $new_account["username"]){
                $username_unique = false;
                break;
            }
            $new_vendor["id"] = $account[$i]["profileId"] +1;
            $new_account["profileId"] = $account[$i]["profileId"] +1;
        }  


        for($i = 0; $i < count($vendor); $i++){
            if ($vendor[$i]["businessName"] == $new_vendor["businessName"] || $vendor[$i]["businessAddress"] == $new_vendor["businessAddress"]){
                $business_unique = false;
                break;
            }
        }

        if ($username_unique && $business_unique){
            $pw = $new_account["password"];
            $hash_pw = password_hash($pw, PASSWORD_BCRYPT);
            $new_account["password"] = $hash_pw;

            array_push($vendor, $new_vendor);
            $vendor_encode = json_encode($vendor);
            file_put_contents(DATA_PATH . "vendor.db", $vendor_encode);

            array_push($account, $new_account);
            $account_encode = json_encode($account);
            file_put_contents(DATA_PATH . "account.db", $account_encode);

            echo "'<script>alert('Registraion successful!');</script>';";
            header("Location: " . "/login");
        }
        else if (!$username_unique){
            echo "<script>alert('Username not available!');</script>";
            header("Location: " . "/register-detail" . "selectedRole=vendor");
        }
        else{
            echo "<script>alert('Business Name/Address already exsited');</script>";
            header("Location: " . "/register-detail" . "selectedRole=vendor");
        }
    }

    public function validateShipper(){
        return;
    }
}

