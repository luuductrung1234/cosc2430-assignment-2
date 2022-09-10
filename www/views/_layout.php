<?php
/**
 * @var string $_title
 * @var array $_styles
 * @var string $_content
 * @var array $_scripts
 * @var bool $_show_header
 * @var bool $_show_footer
 * @var bool $_show_cart
 * @var bool $_show_order_history
 * @var string $_avatar
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_title ?? "" ?></title>
    <link rel="icon" type="image/x-icon" href="../images/logo-icon.ico">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= STATIC_FILE_PATH . "style.css" ?>">
    <?php if (is_array($_styles) && !empty($_styles)): ?>
        <?php foreach ($_styles as $style): ?>
            <link rel="stylesheet" href="<?= $style ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
<?php if ($_show_header): ?>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img class="navbar-logo" src="../images/logo-big.png" alt="lazada logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a id="nav-home" class="nav-link active" aria-current="page" href="/">Lazada</a>
                        </li>
                        <?php if ($_show_order_history): ?>
                            <li class="nav-item">
                                <a id="nav-order" class="nav-link" aria-current="page" href="/order">Order History</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="navbar-side">
                        <?php if ($_show_cart): ?>
                            <div class="cart">
                                <a id="cartBtn" class="cart-btn" href="/cart" onclick="openCart()">
                                    <img class="cart-img" src="../images/cart-icon.png" alt="shopping cart"/>
                                </a>
                                <span id="cart-quantity" class="notified-quantity">0</span>
                            </div>
                        <?php endif; ?>
                        <a href="/logout" type="button" class="logout-btn" onclick="clearCart()">Logout</a>
                        <a class="avatar-btn" href="/profile">
                            <img class="avatar-img rounded-pill" src="<?= "../images/" . $_avatar ?>" alt="avatar">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
<?php endif; ?>
<main class="main-content">
    <?= $_content ?? "" ?>
</main>
<?php if ($_show_footer): ?>
    <footer class="main-footer">
        <div class="footer-body">
            <img class="footer-logo" src="../images/footer-logo.png" alt="">
            <p class="copyright">Copyright &copy; 2022 by Group 8.</p>
        </div>
        <nav class="footer-nav">
            <ul class="footer-nav-items">
                <li class="footer-nav-item"><a href="/about">About Us</a></li>
                <li class="footer-nav-item"><a href="/helps">Helps</a></li>
            </ul>
        </nav>
        <nav class="footer-nav">
            <ul class="footer-nav-items">
                <li class="footer-nav-item"><a href="/contact">Contact</a></li>
                <li class="footer-nav-item"><a href="/policy">Privacy Policy</a></li>
            </ul>
        </nav>
    </footer>
<?php endif; ?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
<script src="<?= STATIC_FILE_PATH . "script.js" ?>"></script>
<?php if (is_array($_scripts) && !empty($_scripts)): ?>
    <?php foreach ($_scripts as $script): ?>
        <script rel="script" src="<?= $script ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
</body>

</html>