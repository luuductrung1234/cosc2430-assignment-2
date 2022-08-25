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

        if ($_SESSION["selectedRole"] == "vendor"){
            $this->validateVendor();
        }else if ($_SESSION["selectedRole"] == "shipper"){
            $this->validateShipper();
        }else if ($_SESSION["selectedRole"] == "customer"){
            $this->validateCustomer();
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

        $username_unique = true;
        $business_unique = true;
    
        $curr_id = 0;
        for($i = 0; $i < count($account); $i++){
            if ($account[$i]["username"] == $new_account["username"]){
                $username_unique = false;
                break;
            }
            if ($account[$i]["role"] == "vendor"){
                $curr_id = max($curr_id, $account[$i]["profileId"]+1);
            }
        }
        $new_vendor["id"] = $curr_id;
        $new_account["profileId"] = $curr_id;


        for($i = 0; $i < count($vendor); $i++){
            if ($vendor[$i]["businessName"] == $new_vendor["businessName"] || $vendor[$i]["businessAddress"] == $new_vendor["businessAddress"]){
                $business_unique = false;
                break;
            }
        }

        if ($username_unique && $business_unique){
            if (!isset($_FILES["picture"]) || empty($_FILES["picture"]["name"])) {
                $new_vendor["picture"] = "";
            }
            else{
                $curr_id = $new_account['profileId'];
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
        }
        else if (!$username_unique){
            $_SESSION["username_existed"] = true;
            echo "<script>
                    window.history.back();
                </script>";
        }
        else{
            $_SESSION["business_existed"] = true;
            echo "<script>
                    window.history.back();
                </script>";
        }  
    }

    public function validateShipper(): void{
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
            "distributionId" => $_POST["distribution"],
            "picture" => $_FILES["picture"],
        );

        $username_unique = true;
        $curr_id = 0;
        for($i = 0; $i < count($account); $i++){
            if ($account[$i]["username"] == $new_account["username"]){
                $username_unique = false;
                break;
            }
            if ($account[$i]["role"] == "shipper"){
                $curr_id = max($curr_id, $account[$i]["profileId"]+1);
            }
        }
        $new_shipper["id"] = $curr_id;
        $new_account["profileId"] = $curr_id;

        if ($username_unique){
            if (!isset($_FILES["picture"]) || empty($_FILES["picture"]["name"])) {
                $new_shipper["picture"] = "";
            }
            else{
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
        }else{
            $_SESSION["username_existed"] = true;
            echo "<script>
                    window.history.back();
                </script>";
        }
    }

    public function validateCustomer(): void{
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
        for($i = 0; $i < count($account); $i++){
            if ($account[$i]["username"] == $new_account["username"]){
                $username_unique = false;
                break;
            }
            if ($account[$i]["role"] == "customer"){
                $curr_id = max($curr_id, $account[$i]["profileId"]+1);
            }
        }
        $new_customer["id"] = $curr_id;
        $new_account["profileId"] = $curr_id;
        
        if ($username_unique){
            if (!isset($_FILES["picture"]) || empty($_FILES["picture"]["name"])) {
                $new_customer["picture"] = "";
            }
            else{
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
        }else{
            $_SESSION["username_existed"] = true;
            echo "<script>
                    window.history.back();
                </script>";
        }
    }
}

