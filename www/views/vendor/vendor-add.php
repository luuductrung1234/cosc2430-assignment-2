<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f945b90c71.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="vendor-style.css">
</head>

<body>
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 ps-5 align-middle title">
                                    View my products
                                </div>

                                <div class="col-12 text-center mt-3">
                                    <div class="row ps-5 pe-5 mt-3 align-items-center">
                                        <div class="col-6 px-3">
                                            <label for="#productname" class="col-form-label">Product Name</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" id="productname" class="form-control w-75" placeholder="enter product name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <div class="row ps-5 pe-5 mt-3 align-items-center">
                                        <div class="col-6 px-3">
                                            <label for="#description" class="col-form-label">Description</label>
                                        </div>
                                        <div class="col-6">
                                            <textarea class="form-control" id="desciprion"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 text center mt-3">
                                    <div class="row ps-5 pe-5 mt-3">
                                        <div class="col-6 px-3 text-center">
                                            Product image
                                        </div>
                                        <div class="col-6 product-div">
                                            <img id="photo" src="/www/images/imgblank.png" class="rounded">
                                            <input type="file" id="file">
                                            <label for="file" id="upload-button">Choose Photo</label>
                                        </div>
                                        <script src="vendor-add.js"></script>
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-3">
                                    <div class="row ps-5 pe-5 mt-3 align-items-center">
                                        <div class="col-6 px-3">
                                            <label for="#price" class="col-form-label">Price</label>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">$</span>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-3 pe-5 text-end">
                                    <button type="button" class="btn btn-primary"><a href="vendor.php">Back</a></button>
                                    <button type="button" class="btn btn-primary">save</button>
                                    <button type="button" class="btn btn-primary">add</button>
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