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
        <h3>Who are you?</h3>
        <div id="register_row">
            <a href="/register?selectedRole=vendor" class="register_col">
                <img src="../../images/select-vendor.jpg" alt="vendor">
                <h4 class="<?php if(isset($selectedRole) && $selectedRole === 'vendor'): ?>register_checked<?php endif; ?>">vendor</h4>
            </a>
            <a href="/register?selectedRole=customer" class="register_col">
                <img src="../../images/select-customer.jpg" alt="customer">
                <h4 class="<?php if(isset($selectedRole) && $selectedRole === 'customer'): ?>register_checked<?php endif; ?>">customer</h4>
            </a>
            <a href="/register?selectedRole=shipper" class="register_col">
                <img src="../../images/select-shipper.jpg" alt="shipper">
                <h4 class="<?php if(isset($selectedRole) && $selectedRole === 'shipper'): ?>register_checked<?php endif; ?>">shipper</h4>
            </a>
        </div>
    </section>
    <div id="register_button">
        <a href="#" class="register_button">go back</a>
        <?php if (isset($selectedRole) && $selectedRole === 'customer'): ?>
            <a class="register_button" href="/register-detail?selectedRole=<?= $selectedRole ?>">continue</a>
        <?php elseif (isset($selectedRole) && $selectedRole === 'vendor'): ?>
            <a class="register_button" href="/register-detail?selectedRole=<?= $selectedRole ?>">continue</a>
        <?php elseif (isset($selectedRole) && $selectedRole === 'shipper'): ?>
            <a class="register_button" href="/register-detail?selectedRole=<?= $selectedRole ?>">continue</a>
        <?php else: ?>
            <a class="register_button disabled_button" href="#">continue</a>
        <?php endif; ?>
    </div>
</main>