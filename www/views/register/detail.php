<?php
/**
 * @var bool $registerFailed
 * @var bool $invalid
 * @var ?string $errorMessage
 * @var ?string $selectedRole
 * @var ?array $old
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
        <?php if($invalid): ?>
            <p class='alert alert-danger'><?= $errorMessage ?><p/>
        <?php endif ?>
        <div class="register_form">
            <form action="/register" method="POST" enctype="multipart/form-data">
                <div class="register">
                    <div class="register_label">Username<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="text" name="username" id="username" onkeyup="verifyName()" required value="<?= $old["username"] ?? "" ?>">
                    </div>
                    <div class="register_alert" id="username_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">Password<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="password" name="password" id="password" onkeyup="verifyPassword()" required>
                    </div>
                    <div class="register_alert" id="password_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">Password Confirm<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="password" name="confirmedPassword" id="password_confirm" onkeyup="matchPassword()" required>
                    </div>
                    <div class="register_alert" id="password_confirm_alert"></div>
                </div>
                <?php if (isset($selectedRole) && ($selectedRole === 'shipper' || $selectedRole === 'customer')): ?>
                    <div class="register">
                        <div class="register_label">First Name<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <input type="text" name="firstname" id="firstname" onkeyup="verifyFirstName()" value="<?= $old["firstname"] ?? "" ?>" required>
                        </div>
                        <div class="register_alert" id="firstname_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">Last Name<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <input type="text" name="lastname" id="lastname" onkeyup="verifyLastName()" value="<?= $old["lastname"] ?? "" ?>" required>
                        </div>
                        <div class="register_alert" id="lastname_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">Address<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <input type="text" name="address" id="address" onkeyup="verifyAddress()" value="<?= $old["address"] ?? "" ?>" required>
                        </div>
                        <div class="register_alert" id="address_alert"></div>
                    </div>
                <?php elseif (isset($selectedRole) && $selectedRole === 'vendor'): ?>
                    <div class="register">
                        <div class="register_label">Business Name<span class="color_red">*</span></div>
                        <div class="register_input">
                            <input type="text" name="businessName" id="business_name" onkeyup="verifyBusinessName()" value="<?= $old["businessName"] ?? "" ?>" required>
                        </div>
                        <div class="register_alert" id="business_name_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">Business Address<span class="color_red">*</span></div>
                        <div class="register_input">
                            <input type="text" name="businessAddress" id="business_address" onkeyup="verifyBusinessAddress()" value="<?= $old["businessAddress"] ?? "" ?>" required>
                        </div>
                        <div class="register_alert" id="business_address_alert"></div>
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
                                <option value="3" selected>Sai Gon South</option>
                            </select>
                        </div>
                        <div class="register_alert"></div>
                    </div>
                <?php endif; ?>
                <div class="register">
                    <div class="register_label">Email<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="email" name="email" id="email" onkeyup="verifyEmail()" value="<?= $old["email"] ?? "" ?>" required>
                    </div>
                    <div class="register_alert" id="email_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">Phone<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="number" name="phone" id="phone" onkeyup="verifyPhone()" value="<?= $old["phone"] ?? "" ?>" required>
                    </div>
                    <div class="register_alert" id="phone_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">Picture</div>
                    <div class="register_input">
                        <input type="file" name="picture" id="profile" multiple accept="image/*" required>
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