<?php
/**
 * @var array $account
 * @var array $profile
 * @var array $order
 */
?>

<?php
$statusClass = "";
switch ($order["status"]) {
    case "active":
    {
        $statusClass = "bg-info";
        break;
    }
    case "delivered":
    {
        $statusClass = "bg-success";
        break;
    }
    case "cancelled":
    {
        $statusClass = "bg-danger";
        break;
    }
}
?>

<div class="container mt-4 p-3 rounded card d-flex">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php if ($account["role"] === SHIPPER_ROLE): ?>
                <li class="breadcrumb-item"><a href="/">Orders</a></li>
            <?php elseif ($account["role"] === CUSTOMER_ROLE): ?>
                <li class="breadcrumb-item"><a href="/order">Orders</a></li>
            <?php endif; ?>
            <li class="breadcrumb-item active" aria-current="page">#<?= $order["id"] ?></li>
        </ol>
    </nav>
    <div class="d-flex flex-row align-items-center">
        <span class="bold"><?= $order["customerName"] ?></span>
        <span class="bold">&nbsp;-&nbsp;<?= $order["customerPhone"] ?></span>
        <span class="badge ms-2 <?= $statusClass ?>"><?= $order["status"] ?></span>
    </div>
    <div class="d-flex flex-row align-items-center mt-2">
        <span class="text-muted">address:&nbsp;&nbsp;&nbsp;</span>
        <span class="bold"><?= $order["customerAddress"] ?></span>
    </div>
    <div class="d-flex flex-row align-items-center mt-2">
        <span class="text-muted">date:&nbsp;&nbsp;&nbsp;</span>
        <span class="bold"><?= date('M j, Y', strtotime($order["orderDate"]["date"])) ?></span>
    </div>
    <div class="d-flex flex-row align-items-center mt-2">
        <span class="text-muted">stored and handled by&nbsp;</span>
        <span class="bold"><?= $order["distributionName"] ?></span>
    </div>
    <?php if (!empty($order["shipperName"])): ?>
        <div class="d-flex flex-row align-items-center mt-2">
            <span class="bold">delivered by&nbsp;</span>
            <span class="bold"><?= $order["shipperName"] ?></span>
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-between mt-2">
        <div class="d-flex justify-content-between text-muted">
            <span>You ordered <?= count($order["items"]) ?> different item(s) in your cart</span>
        </div>
        <div class="d-flex flex-row align-items-center">
            <span class="text-muted">Total amount:</span>
            <div class="price ms-2">
                <span class="bold"><?= "$" . number_format($order["totalAmount"], 2, '.', ',') ?></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row no-gutters">
        <div class="col-12">
            <div class="product-details me-2 w-100">
                <div class="items">
                    <?php foreach ($order["items"] as $item): ?>
                        <div class="d-flex justify-content-between align-items-center mt-3 p-2 item rounded">
                            <div class="d-flex flex-row">
                                <img class="rounded item-img"
                                     src="<?= "../../images/" . $item["pictures"][0] ?>" alt="product image">
                                <div class="ms-2">
                                    <a class="item-link"
                                       href="/product-detail?id=<?= $item["productId"] ?>">
                                        <span class="fw-bold d-block "><?= $item["name"] ?></span>
                                    </a>
                                    <span class="spec text-muted"><?= $item["description"] ?></span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <span class="d-block  fw-bold"><?= "$" . number_format(floatval($item["price"]) * $item["quantity"], 2, '.', ',') ?></span>
                                <span class="d-block ms-5"><?= $item["quantity"] ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($account["role"] === SHIPPER_ROLE): ?>
                    <div class="d-flex flex-row-reverse mt-3">
                        <a href="/order-delivery?id=<?= $order["id"] ?>"
                           class="btn btn-success"
                           data-bs-toggle="tooltip" data-bs-placement="top" title="delivery">
                            Delivery
                        </a>
                        <a href="/order-cancel?id=<?= $order["id"] ?>"
                           class="btn btn-danger me-3"
                           data-bs-toggle="tooltip" data-bs-placement="top" title="cancel">
                            Cancel
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
