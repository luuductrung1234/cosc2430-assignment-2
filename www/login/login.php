<?php
/// HANDLE LOGIN ///

session_start();
$account_list = file_get_contents("../../database/account.db");
$json_account_list = json_decode($account_list, true);
$acc_len = count($json_account_list);
$login_failed = false;


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
    header("Location: ../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="login-style.css">
</head>

<body>
<!--HEADER START-->
<header class="clearfix">
    <nav class="header-nav clearfix">
        <!--need navigation item ideas-->
        <a href="#" class="navigation" id="navigation">Navigation</a>
    </nav>
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
                    <?php
                    if ($login_failed){
                    /// FAIL MESSAGE ///
                    echo "<p class='alert alert-danger'>invalid username/password<p/>";
                    }
                    ?>
                    <div class="name">
                        <label for="Uname">Username</label>
                        <input id="Uname" type="text" class="field" name="Uname" placeholder="Username" required>
                        <span><a href="#">forgot username?</a></span>
                    </div>

                    <br>
                    <br>

                    <div class="passW">
                        <label for="Pword">Password</label>
                        <input id="Pword"  type="password" class="field" name="Pword" placeholder="Password" required>
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
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="login-script.js"></script>
</body>

</html>