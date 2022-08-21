<?php
/**
 * @var array $customer
 */
?>

<header class="customer-header">
    <h2 class="customer-header-title">Customer Page</h2>
    <div class="customer-header-content">
        <div class="alert alert-success" role="alert">
            Welcome back <?= $customer["firstname"] ?>!
        </div>
    </div>
</header>