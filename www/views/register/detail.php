<?php
/**
 * @var bool $registerFailed
 * @var bool $invalid
 * @var ?string $selectedRole
 */
?>

<main id="register_main">
    <h2>Welcome to LAZADA</h2>
    <section id="register_container">
        <h3 id="register_vendor_heading">sign up</h3>
        <div class="register_form">
            <form action="/register" method="POST">
                <div class="register">
                    <div class="register_label">user name<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="text" name="username" id="username">
                    </div>
                    <div>
                        <input type="button" class="register_verify" onclick="verifyName()" value="verify">
                    </div>
                    <div class="register_alert" id="username_alert"></div>
                </div>
                <div class="register">
                    <div class="register_label">password<span class="color_red">*</span></div>
                    <div class="register_input">
                        <input type="text" name="password" id="password">
                    </div>
                    <div class="register_alert"></div>
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
                        <div>
                            <button class="register_verify">verify</button>
                        </div>
                        <div class="register_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">last name<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <input type="text" name="lastname" id="lastname">
                        </div>
                        <div>
                            <button class="register_verify">verify</button>
                        </div>
                        <div class="register_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">address<span class="color_red">*</span>
                        </div>
                        <div class="register_input">
                            <input type="text" name="address" id="address">
                        </div>
                        <div>
                            <button class="register_verify">verify</button>
                        </div>
                        <div class="register_alert"></div>
                    </div>
                <?php elseif (isset($selectedRole) && $selectedRole === 'vendor'): ?>
                    <div class="register">
                        <div class="register_label">business name<span class="color_red">*</span></div>
                        <div class="register_input">
                            <input type="text" name="businessName" id="business_name">
                        </div>
                        <div>
                            <input type="button" class="register_verify" onclick="verifyBusinessName()" value="verify">
                        </div>
                        <div class="register_alert" id="business_name_alert"></div>
                    </div>
                    <div class="register">
                        <div class="register_label">business address<span class="color_red">*</span></div>
                        <div class="register_input">
                            <input type="text" name="businessAddress" id="business_address">
                        </div>
                        <div>
                            <button class="register_verify">verify</button>
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
                    <div class="register_label">profile</div>
                    <div class="register_input">
                        <input type="file" name="picture" id="profile">
                    </div>
                    <div class="register_alert"></div>
                </div>
            </form>
        </div>
    </section>
    <div id="register_vendor_button">
        <button class="register_vendor_button" id="register_gobackbutton">
            <a href="/register">go back</a>
        </button>
        <button class="register_vendor_button" id="register_continuebutton">continue</button>
    </div>
</main>