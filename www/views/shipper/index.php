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
                                                <tr>
                                                    <th>Confirm</th>
                                                    <th>Order #ID</th>
                                                    <th>Customer name</th>
                                                    <th>Item</th>
                                                    <th>Quantity</th>
                                                    <th>Order Status</th>
                                                    <th>Total</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-body">
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="toggle-btn">
                                                            <div class="inner-circle"></div>
                                                        </div>
                                                    </td>
                                                    <td>#9999999</td>
                                                    <td>Name</td>
                                                    <td>Product</td>
                                                    <td>item</td>
                                                    <td><span class="badge bg-success">Fullfilled</span></td>
                                                    <td>$124.00</td>
                                                    <td>Today</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="toggle-btn">
                                                            <div class="inner-circle"></div>
                                                        </div>
                                                    </td>
                                                    <td>#9999999</td>
                                                    <td>Name</td>
                                                    <td>Product</td>
                                                    <td>item</td>
                                                    <td><span class="badge bg-info">Confirmed</span></td>
                                                    <td>$34.00</td>
                                                    <td>Yesterday</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="toggle-btn">
                                                            <div class="inner-circle"></div>
                                                        </div>
                                                    </td>
                                                    <td>#9999999</td>
                                                    <td>Name</td>
                                                    <td>Product</td>
                                                    <td>item</td>
                                                    <td><span class="badge bg-danger">Partially shipped</span></td>
                                                    <td>$6.00</td>
                                                    <td>July 12,2022</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="toggle-btn">
                                                            <div class="inner-circle"></div>
                                                        </div>
                                                    </td>
                                                    <td>#9999999</td>
                                                    <td>Name</td>
                                                    <td>Product</td>
                                                    <td>item</td>
                                                    <td><span class="badge bg-success">Fullfilled</span></td>
                                                    <td>$65.00</td>
                                                    <td>August 21,2022</td>
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