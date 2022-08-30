<?php

/**
 * @var array $account
 * @var array $customer
 * @var array $orders
 */
?>

<body>
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h3>Orders</h3>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="rounded">
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                        <tr class="text-center table-row">
                                            <th>#Id</th>
                                            <th>Customer name</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Order Status</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-body text-center">
                                        <?php foreach ($orders as $order): ?>
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
                                            <tr class="order">
                                                <td><?= $order["id"] ?></td>
                                                <td><?= $order["customerName"] ?></td>
                                                <td><?= $order["totalQuantity"] ?></td>
                                                <td>$<?= number_format($order["totalAmount"], 2, '.', ',') ?></td>
                                                <td class="order-status">
                                                    <span class="badge <?= $statusClass ?>"><?= $order["status"] ?></span>
                                                </td>
                                                <td><?= date('M j, Y', strtotime($order["orderDate"]["date"])) ?></td>
                                                <td>
                                                    <a href="/order-detail?id=<?= $order["id"] ?>"
                                                       class="btn btn-outline-light btn-sm text-center order-btn"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="detail">
                                                        <img src="../../images/detail-icon.png" class="detail-img"
                                                             alt="delivery icon">
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>