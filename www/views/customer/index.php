<?php
/**
 * @var array $account
 * @var array $customer
 * @var array $products
 * @var string $oldSearchName
 * @var string $oldFromPrice
 * @var string $oldToPrice
 */
?>

<section>
    <div class="container py-3">
        <div class="alert alert-success" role="alert">
            Welcome back <strong><?= $customer["firstname"] ?></strong>! Let find out the items you need!
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <nav>
                                <div class="nav nav-tabs profileNav" id="nav-tab">
                                    <form action="/" method="GET" id="searchForm" class="row mb-3" role="search">
                                        <div class="col-sm-12 col-md-4">
                                            <input class="form-control" id="searchName" type="search" name="searchName"
                                                   placeholder="Search" value="<?= $oldSearchName ?? "" ?>"
                                                   aria-label="Search">
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <input class="form-control" type='number' id="fromPrice"
                                                   name="fromPrice" step="0.01" placeholder="From Price"
                                                   value="<?= $oldFromPrice ?? "" ?>" aria-label="From Price">
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <input class="form-control" type='number' id="toPrice"
                                                   name="toPrice" step="0.01" placeholder="To Price"
                                                   value="<?= $oldToPrice ?? "" ?>" aria-label="To Price">
                                        </div>
                                        <div class="col-sm-12 col-md-2 search-btn-list">
                                            <button class="btn btn-outline-secondary btn-sm search-btn" type="submit">
                                                <img class="search-icon" src="../../images/search-icon.png"
                                                     alt="search icon">
                                            </button>
                                            <button class="btn btn-outline-secondary btn-sm search-btn" type="submit" onclick="resetForm()">
                                                <img class="search-icon" src="../../images/reset-icon.png"
                                                     alt="reset icon">
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="all-items"
                                     aria-labelledby="nav-all-items">
                                    <div class="row pe-4 ps-4 text-dark">
                                        <?php foreach ($products as $product): ?>
                                            <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                                                <div class="card">
                                                    <img src="<?= "../../images/" . $product["pictures"][0] ?>"
                                                         class="card-img-top" alt="product image">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a
                                                                    href="/product-detail?id=<?= $product["id"] ?>"
                                                                    class="card-title-link"><?= $product["name"] ?></a>
                                                        </h5>
                                                        <p class="card-text">
                                                            <small class="text-muted"><?= $product["description"] ?></small>
                                                        </p>
                                                        <button onclick="onAddToCart(<?= $product["id"] ?>)"
                                                                class="card-link add-cart-btn" type="button"><img
                                                                    class="add-cart-icon"
                                                                    src="../../images/cart-sm-icon.png"
                                                                    alt="edit icon"></button>
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