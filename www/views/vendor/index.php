<?php
/**
 * @var array $account
 * @var array $vendor
 * @var array $products
 * @var array $topOrderProducts
 */
?>

<section>
    <div class="container py-3">
        <div class="alert alert-light" role="alert">
            Welcome back <strong><?= $vendor["businessName"] ?></strong>! Checkout your latest products!
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <nav>
                                <div class="nav nav-tabs profileNav" id="nav-tab" role="tablist">
                                    <button class="nav-link active text-dark" id="nav-all-items" data-bs-toggle="tab"
                                            data-bs-target="#all-items" type="button" role="tab"
                                            aria-controls="nav-all-items" aria-selected="true">All Items
                                    </button>
                                    <button class="nav-link text-dark" id="nav-current-items" data-bs-toggle="tab"
                                            data-bs-target="#current-items" type="button" role="tab"
                                            aria-controls="nav-current-items" aria-selected="false">Top Ordered
                                    </button>
                                    <li class="nav-item">
                                        <a class="nav-link add-product-btn" href="/product-add"><img
                                                    class="add-product-img" src="../../images/add-outline-icon.png"
                                                    alt="add icon"> Add Product</a>
                                    </li>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="all-items" role="tabpanel"
                                     aria-labelledby="nav-all-items">
                                    <div class="row pe-4 ps-4 text-dark">
                                        <?php foreach ($products as $product): ?>
                                            <div class="col-md-6 col-lg-4 mt-3">
                                                <div class="card">
                                                    <img src="<?= "../../images/" . $product["pictures"][0] ?>"
                                                         class="card-img-top" alt="product image">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a href="/product-detail?id=<?= $product["id"] ?>" class="card-title-link"><?= $product["name"] ?></a></h5>
                                                        <p class="card-text">
                                                            <small class="text-muted"><?= $product["description"] ?></small>
                                                        </p>
                                                        <a href="/product-edit?id=<?= $product["id"] ?>" class="card-link card-edit-btn"><img
                                                                    class="card-edit-icon"
                                                                    src="../../images/edit-icon.png"
                                                                    alt="edit icon"></a>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <span class="card-price">$<?= number_format($product["price"], 2, '.', ',') ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="current-items" role="tabpanel"
                                     aria-labelledby="nav-current-items">
                                    <br>
                                    <div class="row pe-4 ps-4 text-dark">
                                        <?php foreach ($topOrderProducts as $product): ?>
                                            <div class="col-md-6 col-lg-4 mt-3">
                                                <div class="card">
                                                    <img src="<?= "../../images/" . $product["pictures"][0] ?>"
                                                         class="card-img-top" alt="product image">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a href="/product-detail?id=<?= $product["id"] ?>" class="card-title-link"><?= $product["name"] ?></a></h5>
                                                        <p class="card-text">
                                                            <small class="text-muted"><?= $product["description"] ?></small>
                                                        </p>
                                                        <a href="/product-edit?id=<?= $product["id"] ?>" class="card-link card-edit-btn"><img
                                                                    class="card-edit-icon"
                                                                    src="../../images/edit-icon.png"
                                                                    alt="edit icon"></a>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <span class="card-price">$<?= number_format($product["price"], 2, '.', ',') ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>