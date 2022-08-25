<?php

/**
 * @var array $shipper
 */
?>

<header class="shipper-header">
    <h2 class="shipper-header-title">Shipper Page</h2>
    <div class="shipper-header-content">
        <div class="alert alert-success" role="alert">
            Welcome back <?= $shipper["name"] ?>!
        </div>
    </div>
</header>

<body>
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h3>View order</h3>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="rounded">
                                    <div class="table-responsive table-bordered">
                                        <table class="table">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Order #ID</th>
                                                    <th>Customer name</th>
                                                    <th>Item</th>
                                                    <th>Quantity</th>
                                                    <th>Order Status</th>
                                                    <th>Total</th>
                                                    <th>Date</th>
                                                    <th>View order</th>
                                                    <th>Deliver</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-body text-center">
                                                <tr>
                                                    <td>#9999999</td>
                                                    <td>Name</td>
                                                    <td>Product</td>
                                                    <td>item</td>
                                                    <td><span class="badge bg-success">Delivered</span></td>
                                                    <td>$124.00</td>
                                                    <td>Today</td>
                                                    <td><a href="index-detail.php"><button type="button" class="btn btn-dark btn-sm text-center">View order</button></a></td>

                                                </tr>
                                                <tr>
                                                    <td>#9999999</td>
                                                    <td>Name</td>
                                                    <td>Product</td>
                                                    <td>item</td>
                                                    <td><span class="badge bg-info">Active</span></td>
                                                    <td>$34.00</td>
                                                    <td>Yesterday</td>
                                                    <td><a href="index-detail.php"><button type="button" class="btn btn-dark btn-sm text-center">View order</button></a></td>
                                                    <td><button type="button" class="btn btn-primary btn-sm text-center">Deliver</button></td>
                                                </tr>
                                                <tr>
                                                    <td>#9999999</td>
                                                    <td>Name</td>
                                                    <td>Product</td>
                                                    <td>item</td>
                                                    <td><span class="badge bg-danger">Cancelled</span></td>
                                                    <td>$6.00</td>
                                                    <td>July 12,2022</td>
                                                    <td><a href="index-detail.php"><button type="button" class="btn btn-dark btn-sm text-center">View order</button></a></td>

                                                </tr>
                                                <tr>
                                                    <td>#9999999</td>
                                                    <td>Name</td>
                                                    <td>Product</td>
                                                    <td>item</td>
                                                    <td><span class="badge bg-success">Delivered</span></td>
                                                    <td>$65.00</td>
                                                    <td>August 21,2022</td>
                                                    <td><a href="index-detail.php"><button type="button" class="btn btn-dark btn-sm text-center">View order</button></a></td>
                                                </tr>
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