<?php
$my_cart_json = $_COOKIE["cart"];
$my_cart = json_decode($my_cart_json, true);

$my_product_json = file_get_contents(DATA_PATH . "product.db");
$my_product = json_decode($my_product_json, true);

$total_price = 0;
foreach ($my_cart as $item): $total_price += floatval($my_product[$item["id"] - 1]["price"]) * $item["quantity"];
endforeach;
?>

<div class="container mt-4 p-3 rounded card d-flex">
    <div class="row no-gutters">
        <div class="col-12">
            <div class="product-details me-2 w-100">
                <div class="d-flex justify-content-between">
                    <div class="flex-row align-items-center">
                        <a href="/"><img class="icon-img" src="../../images/back-icon.png" alt="backward icon"/><span class="ms-2">Continue Shopping</span></a>
                    </div>
                    <div class="flex-row align-items-center">
                        <span><?= date('M j, Y') ?></span>
                    </div>
                </div>
                <hr>
                <h6 class="mb-1 fw-bold">Shopping cart</h6>
                <div class="d-flex justify-content-between text-muted">
                    <span>You have <?= count($my_cart) ?> different item(s) in your cart</span>
                </div>
                <div class="d-flex flex-row align-items-center"><span class="bold">Total amount:</span>
                    <div class="price ms-2">
                        <span class="bold"><?= "$" . number_format($total_price, 2, '.', ',') ?></span>
                    </div>
                </div>
                <div class="items">
                    <?php foreach ($my_cart as $item): ?>
                        <div class="d-flex justify-content-between align-items-center mt-3 p-2 item rounded">
                            <div class="d-flex flex-row">
                                <img class="rounded item-img" src="<?= "../../images/" . $my_product[$item["id"] - 1]["pictures"][0] ?>" alt="product image">
                                <div class="ms-2">
                                    <a class="item-link"
                                       href="/product-detail?id=<?= $my_product[$item["id"] - 1]["id"] ?>">
                                        <span class="fw-bold d-block "><?= $my_product[$item["id"] - 1]["name"] ?></span>
                                    </a>
                                    <span class="spec text-muted"><?= $my_product[$item["id"] - 1]["description"] ?></span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <span class="d-block  fw-bold"><?= "$" . number_format(floatval($my_product[$item["id"] - 1]["price"]) * $item["quantity"], 2, '.', ',') ?></span>
                                <span class="d-block ms-5"><?= $item["quantity"] ?></span>
                                <button type="button" class="trash-button ms-2" id="<?= (int)$item["id"] ?>"
                                        onclick="removeItemFromCart(this.id)"><img
                                            class="icon-img ms-3" src="../../images/trash-can.png" alt="trash can icon"/></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-12 mt-3 summary">
                    <div><h6 class="mt-3 mb-1 fw-bold">Payment</h6></div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="bankPayment" onclick="bankPaymentSelected()">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Bank transfer
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="payment" id="codPayment" onclick="codPaymentSelected()" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Cash on Delivery (COD)
                        </label>
                    </div>
                    <div class="collapse" id="bankInformation">
                        <div class="card card-body">
                            <p><strong>Bank Name: </strong>Vietcombank</p>
                            <p><strong>Account Holder Name: </strong>Lazada Company</p>
                            <p><strong>Account Number: </strong>123456789</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row-reverse mt-3">
                    <div class="price ms-2">
                        <span class="bold">Total amount:</span>
                        <span class="bold footer-total ms-2"><?= "$" . number_format($total_price, 2, '.', ',') ?></span>
                    </div>
                </div>
                <form action="/order" method="POST" class="d-flex flex-row-reverse mt-3">
                    <button id="placeOrderBtn" class="btn place-order-btn ms-5" type="submit" onclick="clearCart()">Place Order</button>
                </form>
            </div>
        </div>
    </div>
</div>
