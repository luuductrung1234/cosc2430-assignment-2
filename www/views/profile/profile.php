<?php
session_start();
  
if (!isset($_SESSION["User"])){
    header("Location: ../login/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account (Profile)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="profile-style.css">
</head>

<body>
    <?php
        $current_user_username = $_SESSION["User"]["username"];
        $current_user_role = $_SESSION["User"]["role"];
        $current_user_profileId = $_SESSION["User"]["profileId"];

        if ($current_user_role == "customer"){
            $is_vendor = false;

            $get_customer_account = file_get_contents("../../database/customer.db");
            $customer_profile_list = json_decode($get_customer_account, true);
            $len = count($customer_profile_list);

            for($i=0; $i < $len; $i++){
                if ($customer_profile_list[$i]["id"] == $current_user_profileId){
                    $current_user_firstname = $customer_profile_list[$i]["firstname"];
                    $current_user_lastname = $customer_profile_list[$i]["lastname"];
                    $current_user_phone = $customer_profile_list[$i]["phone"];
                    $current_user_address = $customer_profile_list[$i]["address"];  
                    $current_user_email = $customer_profile_list[$i]["email"];
                    $current_user_profileImg = $customer_profile_list[$i]["picture"];
                    break;
                }
            }
        }
        elseif ($current_user_role == "shipper"){
            $is_vendor = false;

            $get_shipper_account = file_get_contents("../../database/shipper.db");
            $shipper_profile_list = json_decode($get_shipper_account, true);
            $len = count($shipper_profile_list);

            for($i=0; $i < $len; $i++){
                if ($shipper_profile_list[$i]["id"] == $current_user_profileId){
                    $current_user_firstname = $shipper_profile_list[$i]["firstname"];
                    $current_user_lastname = $shipper_profile_list[$i]["lastname"];
                    $current_user_phone = $shipper_profile_list[$i]["phone"];
                    $current_user_address = $shipper_profile_list[$i]["address"];  
                    $current_user_email = $shipper_profile_list[$i]["email"];
                    $current_user_profileImg = $shipper_profile_list[$i]["picture"];
                    break;
                }
            }
        }
        elseif ($current_user_role == "vendor"){
            $is_vendor = true;

            $get_vendor_account = file_get_contents("../../database/vendor.db");
            $vendor_profile_list = json_decode($get_vendor_account, true);
            $len = count($vendor_profile_list);

            for($i=0; $i < $len; $i++){
                if ($vendor_profile_list[$i]["id"] == $current_user_profileId){
                    $current_user_name = $vendor_profile_list[$i]["businessName"];
                    $current_user_phone = $vendor_profile_list[$i]["phone"];
                    $current_user_address = $vendor_profile_list[$i]["businessAddress"];  
                    $current_user_email = $vendor_profile_list[$i]["email"];
                    $current_user_profileImg = $vendor_profile_list[$i]["picture"];
                    break;
                }
            }
        }

        if (!$is_vendor){
            echo "
        <div class='container rounded bg-white mt-5 mb-5'>
            <div class='row'>
                <div class='col-md-3 border-right'>
                    <div class='d-flex flex-column align-items-center text-center p-3 py-5 profile-div'>
                        <img class='rounded-circle mt-5' id='photo' src='/www/$current_user_profileImg'>
                        <span class='font-weight-bold'>$current_user_username</span><span class='text-black-50'>$current_user_email</span>
                    </div>

                    <script src='profile-script.js'></script>
                </div>
                <div class='col-md-5 border-right'>
                    <div class='p-3 py-5 type2'>
                        <div class='d-flex justify-content-between align-items-center'><span>User Type</span><span class='border px-3 p-1 user-type'>$current_user_role</span></div><br>
                        <div class='col-md-12'><label class='content'>User Bio</label><input type='text' class='form-control' placeholder='bio'></div>
                    </div>
                    <div class='p-3 py-5'>
                        <div class='d-flex justify-content-between align-items-center mb-3'>
                            <h4 class='text-right'>Profile Settings</h4>
                        </div>
                        <div class='row mt-2'>
                            <div class='col-md-6'><label class='content'>First Name</label><input type='text' class='form-control' value=$current_user_firstname readonly></div>
                            <div class='col-md-6'><label class='content'>Last Name</label><input type='text' class='form-control' value=$current_user_lastname readonly></div>
                        </div>
                        <div class='row mt-3'>
                            <div class='col-md-12'><label class='content'>Mobile Number</label><input type='text' class='form-control' value=$current_user_phone readonly></div>
                            <div class='col-md-12'><label class='content'>Address</label><input type='text' class='form-control' value='$current_user_address' readonly></div>
                            <div class='col-md-12'><label class='content'>Email</label><input type='text' class='form-control' value=$current_user_email readonly></div>
                        </div>
                        <div class='mt-5 text-center'><button class='btn btn-primary profile-button' type='button'>Save Profile</button></div>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='p-3 py-5 type1'>
                        <div class='d-flex justify-content-between align-items-center'><span>User Type</span><span class='border px-3 p-1 user-type'>$current_user_role</span></div><br>
                        <div class='col-md-12'><label class='content'>User Bio</label><input type='text' class='form-control' placeholder='bio'></div>
                    </div>
                </div>
            </div>
            ";
        }else{
            echo "
            <div class='container rounded bg-white mt-5 mb-5'>
            <div class='row'>
                <div class='col-md-3 border-right'>
                    <div class='d-flex flex-column align-items-center text-center p-3 py-5 profile-div'>
                        <img class='rounded-circle mt-5' id='photo' src='/www/$current_user_profileImg'>
                        <span class='font-weight-bold'>$current_user_username</span><span class='text-black-50'>$current_user_email</span>
                    </div>

                    <script src='profile-script.js'></script>
                </div>
                <div class='col-md-5 border-right'>
                    <div class='p-3 py-5 type2'>
                        <div class='d-flex justify-content-between align-items-center'><span>User Type</span><span class='border px-3 p-1 user-type'>$current_user_role</span></div><br>
                        <div class='col-md-12'><label class='content'>User Bio</label><input type='text' class='form-control' placeholder='bio'></div>
                    </div>
                    <div class='p-3 py-5'>
                        <div class='d-flex justify-content-between align-items-center mb-3'>
                            <h4 class='text-right'>Profile Settings</h4>
                        </div>
                        <div class='row mt-2'>
                            <div class='col-md-6'><label class='content'>Business Name</label><input type='text' class='form-control' value='$current_user_name' readonly></div>
                        </div>
                        <div class='row mt-3'>
                            <div class='col-md-12'><label class='content'>Mobile Number</label><input type='text' class='form-control' value=$current_user_phone readonly></div>
                            <div class='col-md-12'><label class='content'>Address</label><input type='text' class='form-control' value='$current_user_address' readonly></div>
                            <div class='col-md-12'><label class='content'>Email</label><input type='text' class='form-control' value=$current_user_email readonly></div>
                        </div>
                        <div class='mt-5 text-center'><button class='btn btn-primary profile-button' type='button'>Save Profile</button></div>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='p-3 py-5 type1'>
                        <div class='d-flex justify-content-between align-items-center'><span>User Type</span><span class='border px-3 p-1 user-type'>$current_user_role</span></div><br>
                        <div class='col-md-12'><label class='content'>User Bio</label><input type='text' class='form-control' placeholder='bio'></div>
                    </div>
                </div>
            </div>
            ";
        }
    ?>
<!--
    <div class='container rounded bg-white mt-5 mb-5'>
        <div class='row'>
            <div class='col-md-3 border-right'>
                <div class='d-flex flex-column align-items-center text-center p-3 py-5 profile-div'>
                    <img class='rounded-circle mt-5' id='photo' src='/www/images/default-img.png'>
                    <input type='file' id='file'>
                    <label for='file' id='upload-button'>Choose Photo</label>
                    <span class='font-weight-bold'>User</span><span class='text-black-50'>user@gmail.com</span>
                </div>

                <script src='profile-script.js'></script>
            </div>
            <div class='col-md-5 border-right'>
                <div class='p-3 py-5 type2'>
                    <div class='d-flex justify-content-between align-items-center'><span>User Type</span><span class='border px-3 p-1 user-type'>Type</span></div><br>
                    <div class='col-md-12'><label class='content'>User Bio</label><input type='text' class='form-control' placeholder='bio'></div>
                </div>
                <div class='p-3 py-5'>
                    <div class='d-flex justify-content-between align-items-center mb-3'>
                        <h4 class='text-right'>Profile Settings</h4>
                    </div>
                    <div class='row mt-2'>
                        <div class='col-md-6'><label class='content'>First Name</label><input type='text' class='form-control' placeholder='first name'></div>
                        <div class='col-md-6'><label class='content'>Last Name</label><input type='text' class='form-control' placeholder='last name'></div>
                    </div>
                    <div class='row mt-3'>
                        <div class='col-md-12'><label class='content'>Mobile Number</label><input type='text' class='form-control' placeholder='enter phone number'></div>
                        <div class='col-md-12'><label class='content'>Address</label><input type='text' class='form-control' placeholder='enter adress'></div>
                        <div class='col-md-12'><label class='content'>Email</label><input type='text' class='form-control' placeholder='enter email'></div>
                    </div>
                    <div class='mt-5 text-center'><button class='btn btn-primary profile-button' type='button'>Save Profile</button></div>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='p-3 py-5 type1'>
                    <div class='d-flex justify-content-between align-items-center'><span>User Type</span><span class='border px-3 p-1 user-type'>Type</span></div><br>
                    <div class='col-md-12'><label class='content'>User Bio</label><input type='text' class='form-control' placeholder='bio'></div>
                </div>
            </div>
        </div>
    -->
</body>

</html>