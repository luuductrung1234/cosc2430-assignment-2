<script src="https://kit.fontawesome.com/f945b90c71.js" crossorigin="anonymous"></script>

<?php
    $my_cart_json = $_COOKIE["cart"]; 
    $my_cart = json_decode($my_cart_json, true);
    
    $my_product_json = file_get_contents(DATA_PATH . "product.db");
    $my_product = json_decode($my_product_json, true);

    $total_price = 0;
    foreach ($my_cart as $item): $total_price += floatval($my_product[$item["id"]-1]["price"]);
    endforeach;
?>

<body>
    <div id="localStorage-var"></div>
    <div class="container mt-4 p-3 rounded card d-flex">
        <div class="row no-gutters">
            <div class="col-12">
                <div class="product-details me-2 w-100">
                    <div class="d-flex flex-row align-items-center"><a href="/"><i class="fa fa-long-arrow-left"></i><span class="ms-2">Continue Shopping</span></a></div>
                    <hr>
                    <h6 class="mb-1 fw-bold">Shopping cart</h6>
                    <div class="d-flex justify-content-between"><span>You have <? echo count($my_cart) ?> items in your cart</span></div>
                        <div class="d-flex flex-row align-items-center"><span class="bold">Tocal price:</span>
                            <div class="price ms-2"><span class="bold"><? echo "$".$total_price ?></span></div>
                        </div>
                    <?php foreach ($my_cart as $item): ?>
                    <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                        <div class="d-flex flex-row"><img class="rounded" src="<?= "../../images/" . $my_product[$item["id"]-1]["pictures"][0] ?>" width="40">
                            <div class="ms-2"><span class="fw-bold d-block "><? echo $my_product[$item["id"]-1]["name"] ?></span>
                            <span class="spec"><? echo $my_product[$item["id"]-1]["description"] ?></span>
                        </div>
                        </div>
                        <div class="d-flex flex-row align-items-center"><span class="d-block"><?echo $item["quantity"]?></span>
                        <span class="d-block ms-5 fw-bold"><? echo "$".floatval($my_product[$item["id"]-1]["price"])*$item["quantity"] ?></span>
                        <button type="button" class="trash-button" id="<?= intval($item["id"]) ?>" onclick="removeItemFromCart(this.id)"><i class="fa fa-trash-o ms-3 text-black-50"></i></button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>