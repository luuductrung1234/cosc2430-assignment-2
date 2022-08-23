<?php
/**
 * @var array $account
 * @var array $profile
 * @var array $product
 */
?>

<div class='container rounded bg-white mt-3 mb-5'>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $product["name"] ?></li>
        </ol>
    </nav>
    <div class='row'>
        <div class='col-md-4 border-right'>
            <div class='d-flex flex-column align-items-center text-center p-3 py-5 profile-div'>
                <div>
                    <img id="main-img" src="<?= "../../images/" . $product["pictures"][0] ?>" class="img-fluid product-main-img"
                         alt="...">
                </div>
                <div>
                    <?php foreach ($product["pictures"] as $picture): ?>
                        <img onclick="onSelectPicture('<?= "../../images/". $picture ?>')" src="<?= "../../images/" . $picture ?>" class="product-sub-img" alt="...">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class='col-md-5 border-right'>
            <div class='p-3 py-5'>
                <div class='d-flex justify-content-between align-items-center mb-3'>
                    <h4 class='text-right'>General</h4>
                </div>
                <div class='row mt-2'>
                    <div class='col-md-8'>
                        <p class='info-label'>Product Name</p>
                        <p class="info-value"><?= $product["name"] ?></p>
                    </div>
                    <div class='col-md-4'>
                        <p class='info-label'>Price</p>
                        <p class="info-value info-price">$<?= number_format($product["price"], 2, '.', ',') ?></p>
                    </div>
                </div>
                <div class='row mt-3'>
                    <div class='col-md-12'>
                        <p class='info-label'>Description</p>
                        <p class="info-value"><?= $product["description"] ?></p>
                    </div>
                </div>
                <?php if ($account["role"] === CUSTOMER_ROLE): ?>
                    <div class='mt-5 text-center'>
                        <button onclick="onAddToCart(<?= $product["id"] ?>)"
                                class='btn product-btn' type='button'><img
                                    src="../../images/cart-sm-black-icon.png"
                                    class="product-btn-img"
                                    alt="cart icon"></button>
                    </div>
                <?php endif; ?>
                <?php if ($account["role"] === VENDOR_ROLE): ?>
                    <div class='mt-3 text-center'>
                        <a href="/product-edit?id=<?= $product["id"] ?>" class='btn product-btn' type='button'><img
                                    src="../../images/edit-icon.png"
                                    class="product-btn-img"
                                    alt="cart icon"></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='p-3 py-5'>
                <div class='d-flex justify-content-between align-items-center'>
                    <h4 class='text-right'>Origin</h4>
                </div>
                <div class='row mt-2'>
                    <div class='col-md-12'>
                        <p class='info-label'>Vendor</p>
                        <p class="info-value"><?= $product["vendorName"] ?></p>

                        <p class="info-value-sm"><img class="info-icon" src="../../images/address-icon.png"
                                                      alt="address icon"><?= $product["vendorAddress"] ?></p>
                        <p class="info-value-sm"><img class="info-icon" src="../../images/phone-icon.png"
                                                      alt="phone icon"><?= $product["vendorPhone"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
