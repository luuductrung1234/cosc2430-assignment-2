<?php
/**
 * @var bool $registerFailed
 * @var bool $invalid
 * @var ?string $selectedRole
 */

$_SESSION["selectedRole"] = $selectedRole;
?>

<main id="register_main">
    <h2>Welcome to LAZADA</h2>
    <section id="register_container">
        <h3 id="register_vendor_heading">sign up</h3>
        <?php if (isset($_SESSION["username_existed"]) && $_SESSION["username_existed"]): ?>
            <p class="color_red" id="register_vendor_heading">Username already existed</p>
            <? unset($_SESSION["username_existed"]); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION["business_existed"]) && $_SESSION["business_existed"]): ?>
            <p class="color_red" id="register_vendor_heading">Business Name/Address already existed</p>
            <? unset($_SESSION["business_existed"]); ?>
        <?php endif; ?>
        <div class="register_form">
            <form action="/register" method="POST" enctype="multipart/form-data">
                <div class="register">
                    <div class="register_label">user name<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="text" name="username" id="username" onkeyup="verifyName()">
                    </div>
                    <div class="register_alert" id="username_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">password<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="text" name="password" id="password" onkeyup="verifyPassword()">
                    </div>
                    <div class="register_alert" id="password_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">password confirm<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="text" name="confirmedPassword" id="password_confirm" onkeyup="matchPassword()">
                    </div>
                    <div class="register_alert" id="password_confirm_alert"></div>
                </div>
                <?php if (isset($selectedRole) && ($selectedRole === 'shipper' || $selectedRole === 'customer')): ?>
                    <div class="register">
                        <div class="register_label">first name<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <input type="text" name="firstname" id="firstname">
                        </div>
                        <div class="register_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">last name<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <input type="text" name="lastname" id="lastname">
                        </div>
                        <div class="register_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">address<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <input type="text" name="address" id="address">
                        </div>
                        <div class="register_alert"></div>
                    </div>
                <?php elseif (isset($selectedRole) && $selectedRole === 'vendor'): ?>
                    <div class="register">
                        <div class="register_label">business name<span class="color_red">*</span></div>
                        <div class="register_input">
                            <input type="text" name="businessName" id="business_name" require>
                        </div>
                        <div class="register_alert" id="business_name_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">business address<span class="color_red">*</span></div>
                        <div class="register_input">
                            <input type="text" name="businessAddress" id="business_address" require>
                        </div>
                        <div class="register_alert"></div>
                    </div>
                <?php endif; ?>
                <?php if (isset($selectedRole) && $selectedRole === 'shipper'): ?>
                    <div class="register">
                        <div class="register_label">distribution hub<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <select name="distribution" id="register_distribution_hub">
                                <option value="1">Thu Duc Central</option>
                                <option value="2">Sai Gon Central</option>
                                <option value="3">Sai Gon South</option>
                            </select>
                        </div>
                        <div class="register_alert"></div>
                    </div>
                <?php endif; ?>
                <div class="register">
                    <div class="register_label">email</div>
                    <div class="register_input">
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="register_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">phone</div>
                    <div class="register_input">
                        <input type="number" name="phone" id="phone">
                    </div>
                    <div class="register_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">profile picture</div>
                    <div class="register_input">
                        <input type="file" name="picture" id="profile" multiple accept="image/*">
                    </div>
                    <div class="register_alert"></div>
                </div>
                <div id="register_vendor_button">
                    <button type="button" class="register_vendor_button" id="register_gobackbutton">
                        <a href="/register">go back</a>
                    </button>
                    <input type="button" class="register_vendor_button" onclick="isVerified()" value="Confirm" readonly>
                    <button type="submit" class="register_vendor_button" id="register_continuebutton" disabled>continue</button>
                </div>
            </form>
        </div>
    </section>
</main>