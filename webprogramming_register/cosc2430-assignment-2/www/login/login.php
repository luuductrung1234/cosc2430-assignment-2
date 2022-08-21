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
    <a href="../index.php" class="navigation" id="navigation">Navigation</a>
</header>
<!--HEADER END-->

<section>
    <!--Form START-->
    <form>
        <div class="container">
            <div class="LoginBx">
                <div class="Lleft"></div>
                <div class="Lright">
                    <h2>Login</h2>
                    <br>
                    <div class="name">
                        <label for="Uname">Username</label>
                        <input type="text" class="field" id="Uname" placeholder="Username" required>
                        <span><a href="#">forgot username?</a></span>
                    </div>

                    <br>
                    <br>

                    <div class="passW">
                        <label for="Pword">Password</label>
                        <input type="text" class="field" id="Pword" placeholder="Password" required>
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