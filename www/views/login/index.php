<?php
/**
 * @var bool $loginFailed
 * @var bool $invalid
 */
?>

<section>
    <form action="/login" method="POST">
        <div class="container">
            <div class="login-box">
                <div class="login-box-left">
                </div>
                <div class="login-box-right">
                    <h2 class="login-box-title">Login</h2>
                    <?php if($loginFailed): ?>
                        <p class='alert alert-danger'>invalid username or password<p/>
                    <?php endif ?>
                    <?php if($invalid): ?>
                        <p class='alert alert-danger'>Please enter username or password<p/>
                    <?php endif ?>
                    <div class="login-input-group clearfix">
                        <label for="Uname" class="login-input-label">Username</label>
                        <input id="Uname" type="text" class="login-input-field" name="username" placeholder="Username" required>
                        <span class="login-input-hint"><a href="#">forgot username?</a></span>
                    </div>
                    <div class="login-input-group clearfix">
                        <label for="Pword" class="login-input-label">Password</label>
                        <input id="Pword" type="password" class="login-input-field" name="password" placeholder="Password" required>
                        <span class="login-input-hint"><a href="#">forgot password?</a></span>
                    </div>
                    <div class="remember-me">
                        <input type="checkbox" value="lsRememberMe" id="rememberMe">
                        <label for="rememberMe">Remember me</label>
                    </div>
                    <div class="login-input-group">
                        <input class="login-btn color-bg-secondary" type="reset" value="reset">
                        <input class="login-btn color-bg-primary" type="submit" value="login">
                    </div>
                    <div class="login-input-group">
                        <input class="login-btn color-bg-muted" type="button" value="sign up">
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>