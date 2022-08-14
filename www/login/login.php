<?php
/// HANDLE LOGIN ///

session_start();
$account_list = file_get_contents("../../account.db");
$json_account_list = json_decode($account_list, true);
$acc_len = count($json_account_list);


if (isset($_POST["Uname"]) && isset($_POST["Pword"]) && !isset($_SESSION["User"])){
    for ($i=0; $i < $acc_len; $i++){
        if ($json_account_list[$i]["username"] == $_POST["Uname"]){
            $pw_hash = $json_account_list[$i]["password"];
            if (password_verify($_POST["Pword"], $pw_hash)){
                $_SESSION["User"] = $_POST["Uname"];
                break;
            }
        }
    }
    if (!isset($_SESSION["User"])){
        $login_failed = true;
    }
}

if (isset($_SESSION["User"])){
    header("Location: /www/index.php");
    exit();
}

if ($login_failed){
    /// FAIL MESSAGE ///
    echo "<br><br><br>INVALID USERNAME/PASSWORD";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="login-style.css">
</head>

<body>
<!--HEADER START-->
<header>
    <!--need navigation item ideas-->
    <a href="#" class="navigation" id="navigation">Navigation</a>
</header>
<!--HEADER END-->

<section>
    <!--Form START-->
    <form method="POST">
        <div class="container">
            <div class="LoginBx">
                <div class="Lleft"></div>
                <div class="Lright">
                    <h2>Login</h2>
                    <br>
                    <div class="name">
                        <label for="Uname">Username</label>
                        <input type="text" class="field" name="Uname" placeholder="Username" required>
                        <span><a href="#">forgot username?</a></span>
                    </div>

                    <br>
                    <br>

                    <div class="passW">
                        <label for="Pword">Password</label>
                        <input type="password" class="field" name="Pword" placeholder="Password" required>
                        <span><a href="#">forgot password?</a></span>
                    </div>

                    <br>

                    <div class="rememberMe">
                        <input type="checkbox" value="lsRememberMe" id="rememberMe">
                        <label for="rememberMe">Remember me</label>
                    </div>

                    <br>
                    <br>
                    <br>
                    <br>

                    <div class="inputBx">
                        <input type="reset" value="Reset">
                        <input type="submit" value="Login">
                    </div>


                    <div class="signUp">
                        <input type="button" value="sign up?">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--Form END-->
</section>

<script src="login-script.js"></script>
</body>

</html>