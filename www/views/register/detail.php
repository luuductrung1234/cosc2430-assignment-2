<?php
/**
 * @var bool $registerFailed
 * @var bool $invalid
 * @var ?string $selectedRole
 */

$_SESSION["selectedRole"] = $selectedRole;
?>

<main id="register_main">
    <div class="register-title">
        <h2><span>W</span>elcome to <span>L</span>AZADA</h2>
    </div>
    <section id="register_container">
        <h3 class="register_vendor_heading">
            <span>S</span>ign up
        </h3>
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
                    <div class="register_label">Username<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="text" name="username" id="username" onkeyup="verifyName()">
                    </div>
                    <div class="register_alert" id="username_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">Password<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="password" name="password" id="password" onkeyup="verifyPassword()">
                    </div>
                    <div class="register_alert" id="password_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">Password Confirm<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="password" name="confirmedPassword" id="password_confirm" onkeyup="matchPassword()">
                    </div>
                    <div class="register_alert" id="password_confirm_alert"></div>
                </div>
                <?php if (isset($selectedRole) && ($selectedRole === 'shipper' || $selectedRole === 'customer')): ?>
                    <div class="register">
                        <div class="register_label">First Name<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <input type="text" name="firstname" id="firstname">
                        </div>
                        <div class="register_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">Last Name<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <input type="text" name="lastname" id="lastname">
                        </div>
                        <div class="register_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">Address<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <input type="text" name="address" id="address">
                        </div>
                        <div class="register_alert"></div>
                    </div>
                <?php elseif (isset($selectedRole) && $selectedRole === 'vendor'): ?>
                    <div class="register">
                        <div class="register_label">Business Name<span class="color_red">*</span></div>
                        <div class="register_input">
                            <input type="text" name="businessName" id="business_name" require>
                        </div>
                        <div class="register_alert" id="business_name_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">Business Address<span class="color_red">*</span></div>
                        <div class="register_input">
                            <input type="text" name="businessAddress" id="business_address" require>
                        </div>
                        <div class="register_alert"></div>
                    </div>
                <?php endif; ?>
                <?php if (isset($selectedRole) && $selectedRole === 'shipper'): ?>
                    <div class="register">
                        <div class="register_label">Distribution<span class="color_red">*</span>
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
                    <div class="register_label">Email</div>
                    <div class="register_input">
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="register_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">Phone</div>
                    <div class="register_input">
                        <input type="number" name="phone" id="phone">
                    </div>
                    <div class="register_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">Picture</div>
                    <div class="register_input">
                        <input type="file" name="picture" id="profile" multiple accept="image/*">
                    </div>
                    <div class="register_alert"></div>
                </div>
                <div id="register_vendor_button">
                    <button type="button" class="register_vendor_button back">
                        <a href="/register">go back</a>
                    </button>
                    <input type="button" class="register_confirm_button" onclick="isVerified()" value="Confirm" readonly>
                    <button type="submit" class="register_vendor_button continue" id="register_continuebutton" disabled>continue</button>
                </div>
            </form>
        </div>
    </section>
</main>