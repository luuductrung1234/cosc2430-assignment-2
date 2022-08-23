<?php
/**
 * @var ?array $product
 */
?>

<form action="/product" method="POST" enctype="multipart/form-data" class='container rounded bg-white mt-3 mb-5'>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Products</a></li>
            <?php if (!empty($product)): ?>
                <li class="breadcrumb-item" aria-current="page"><a
                            href="/product-detail?id=<?= $product["id"] ?>"><?= $product["name"] ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">edit</li>
            <?php else: ?>
                <li class="breadcrumb-item active" aria-current="page">add</li>
            <?php endif; ?>
        </ol>
    </nav>
    <div class='row'>
        <div class='col-md-6 border-right'>
            <div class='p-3 py-5'>
                <div class='d-flex justify-content-between align-items-center mb-3'>
                    <h4 class='text-right'>General</h4>
                </div>
                <div class='row mt-2'>
                    <input type='hidden' name="id" class='form-control'
                           value='<?= !empty($product) ? $product["id"] : 0 ?>' readonly>
                    <div class='col-md-8'>
                        <label class='info-label'>Product Name</label>
                        <input type='text' name="name" class='form-control' placeholder="name"
                               value='<?= !empty($product) ? $product["name"] : "" ?>'>
                    </div>
                    <div class='col-md-4'>
                        <label class='info-label'>Price</label>
                        <input type='number' name="name" step="0.01" class='form-control'
                               value='<?= !empty($product) ? $product["price"] : 0.0 ?>'>
                    </div>
                </div>
                <div class='row mt-3'>
                    <div class='col-md-12'>
                        <label class='info-label'>Description</label>
                        <textarea name="description" class='form-control'
                                  placeholder='description'><?= !empty($product) ? $product["description"] : "" ?></textarea>
                    </div>
                </div>
                <div class='row mt-3'>
                    <div class='mt-3 text-center'>
                        <button class='btn product-btn' type='submit'><img src="../../images/save-icon.png"
                                                                           class="product-btn-img"
                                                                           alt="cart icon"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='p-3 py-5'>
                <div class='d-flex justify-content-between align-items-center'>
                    <h4 class='text-right'>Images</h4>
                </div>
                <div class='row mt-2'>
                    <div class="input-group col-md-12">
                        <input type="file" name="pictures[]" class="form-control" id="upload-avatar">
                        <label class="input-group-text" for="upload-avatar">Main</label>
                    </div>
                </div>
                <div class='row mt-4'>
                    <div class="input-group col-md-12">
                        <input type="file" name="pictures[]" class="form-control" id="upload-avatar">
                        <label class="input-group-text" for="upload-avatar">Sub</label>
                    </div>
                </div>
                <div class='row mt-4'>
                    <div class="input-group col-md-12">
                        <input type="file" name="pictures[]" class="form-control" id="upload-avatar">
                        <label class="input-group-text" for="upload-avatar">Sub</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
