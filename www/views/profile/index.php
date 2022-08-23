<?php
/**
 * @var array $profile
 * @var array $account
 * @var bool $updateSuccess
 */
?>

<?php if ($account["role"] != VENDOR_ROLE): ?>
    <form action="/profile" method="POST" enctype="multipart/form-data" class='container rounded bg-white mt-5 mb-5'>
        <?php if($updateSuccess): ?>
            <p class='alert alert-success'>update profile successfully.<p/>
        <?php endif ?>
        <div class='row'>
            <div class='col-md-3 border-right'>
                <div class='d-flex flex-column align-items-center text-center p-3 py-5 profile-div'>
                    <img class='rounded-circle mt-5' id='photo' src='<?= "../../images/" . $profile["picture"] ?>'>
                    <span class='font-weight-bold'><?= $account["username"] ?></span>
                    <span class='text-black-50'><?= $profile["email"] ?></span>
                    <a class="profile-logout-btn" href="/logout"><img class="profile-logout-icon" src="../../images/logout-icon.png" alt="logout icon"></a>
                </div>
            </div>
            <div class='col-md-5 border-right'>
                <div class='p-3 py-5'>
                    <div class='d-flex justify-content-between align-items-center mb-3'>
                        <h4 class='text-right'>Profile Settings</h4>
                    </div>
                    <div class='row mt-2'>
                        <div class='col-md-6'>
                            <label class='content'>First Name</label>
                            <input type='text' name="firstname" class='form-control' value='<?= $profile["firstname"] ?>' readonly>
                        </div>
                        <div class='col-md-6'>
                            <label class='content'>Last Name</label>
                            <input type='text' name="lastname" class='form-control' value='<?= $profile["lastname"] ?>' readonly>
                        </div>
                    </div>
                    <div class='row mt-3'>
                        <div class='col-md-12'>
                            <label class='content'>Mobile Number</label>
                            <input type='text' name="phone" class='form-control' value='<?= $profile["phone"] ?>' readonly>
                        </div>
                        <div class='col-md-12'>
                            <label class='content'>Address</label>
                            <input type='text' name="address" class='form-control' value='<?= $profile["address"] ?>' readonly>
                        </div>
                        <div class='col-md-12'>
                            <label class='content'>Email</label>
                            <input type='text' name="email" class='form-control' value='<?= $profile["email"] ?>' readonly>
                        </div>
                    </div>
                    <div class='row mt-3'>
                        <div class="input-group col-md-12">
                            <input type="file" name="picture" class="form-control" id="upload-avatar">
                            <label class="input-group-text" for="upload-avatar">Avatar</label>
                        </div>
                    </div>
                    <div class='mt-5 text-center'>
                        <button class='btn btn-primary profile-button' type='submit'>Save Profile</button>
                    </div>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='p-3 py-5 type1'>
                    <div class='d-flex justify-content-between align-items-center'>
                        <span>User Type</span>
                        <span class='border px-3 p-1 user-type'><?= $account["role"] ?></span>
                    </div>
                    <br>
                    <div class='col-md-12'>
                        <label class='content'>User Bio</label>
                        <textarea name="bio" class='form-control' placeholder='bio'></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php else: ?>
    <form action="/profile" method="POST" enctype="multipart/form-data" class='container rounded bg-white mt-5 mb-5'>
        <?php if($updateSuccess): ?>
            <p class='alert alert-success'>update profile successfully.<p/>
        <?php endif ?>
        <div class='row'>
            <div class='col-md-3 border-right'>
                <div class='d-flex flex-column align-items-center text-center p-3 py-5 profile-div'>
                    <img class='rounded-circle mt-5' id='photo' src='<?= "../../images/" . $profile["picture"] ?>'>
                    <span class='font-weight-bold'><?= $account["username"] ?></span>
                    <span class='text-black-50'><?= $profile["email"] ?></span>
                    <a class="profile-logout-btn" href="/logout"><img class="profile-logout-icon" src="../../images/logout-icon.png" alt="logout icon"></a>
                </div>
            </div>
            <div class='col-md-5 border-right'>
                <div class='p-3 py-5'>
                    <div class='d-flex justify-content-between align-items-center mb-3'>
                        <h4 class='text-right'>Profile Settings</h4>
                    </div>
                    <div class='row mt-3'>
                        <div class='col-md-12'>
                            <label class='content'>Business Name</label>
                            <input type='text' name="businessName" class='form-control' value='<?= $profile["businessName"] ?>' readonly>
                        </div>
                    </div>
                    <div class='row mt-3'>
                        <div class='col-md-12'>
                            <label class='content'>Mobile Number</label>
                            <input type='text' name="phone" class='form-control' value='<?= $profile["phone"] ?>' readonly>
                        </div>
                        <div class='col-md-12'>
                            <label class='content'>Address</label>
                            <input type='text' name="businessAddress" class='form-control' value='<?= $profile["businessAddress"] ?>' readonly>
                        </div>
                        <div class='col-md-12'>
                            <label class='content'>Email</label>
                            <input type='text' name="email" class='form-control' value='<?= $profile["email"] ?>' readonly>
                        </div>
                    </div>
                    <div class='row mt-3'>
                        <div class="input-group col-md-12">
                            <input type="file" name="picture" class="form-control" id="upload-avatar">
                            <label class="input-group-text" for="upload-avatar">Avatar</label>
                        </div>
                    </div>
                    <div class='mt-5 text-center'>
                        <button class='btn btn-primary profile-button' type='submit'>Save Profile</button>
                    </div>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='p-3 py-5 type1'>
                    <div class='d-flex justify-content-between align-items-center'>
                        <span>User Type</span>
                        <span class='border px-3 p-1 user-type'><?= $account["role"] ?></span>
                    </div>
                    <br>
                    <div class='col-md-12'>
                        <label class='content'>User Bio</label>
                        <textarea name="bio" class='form-control' placeholder='bio'></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endif; ?>