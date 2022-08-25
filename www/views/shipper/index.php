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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shipper page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index-style.css">
</head>

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
                                                    <td><span class="badge badge-success">Fullfilled</span></td>
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
                                                    <td><span class="badge badge-info">Confirmed</span></td>
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
                                                    <td><span class="badge badge-danger">Partially shipped</span></td>
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
                                                    <td><span class="badge badge-success">Fullfilled</span></td>
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

<script src="index-script.js"></script>

</html>