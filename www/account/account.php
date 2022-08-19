<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account (Profile)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="account-style.css">
</head>

<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5 profile-div">
                    <img class="rounded-circle mt-5" id="photo" src="/www/images/profile.png">
                    <input type="file" id="file">
                    <label for="file" id="upload-button">Choose Photo</label>
                    <span class="font-weight-bold">User</span><span class="text-black-50">user@gmail.com</span>
                </div>

                <script src="account-script.js"></script>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5 type2">
                    <div class="d-flex justify-content-between align-items-center"><span>User Type</span><span class="border px-3 p-1 user-type">Type</span></div><br>
                    <div class="col-md-12"><label class="content">User Bio</label><input type="text" class="form-control" placeholder="bio"></div>
                </div>
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="content">First Name</label><input type="text" class="form-control" placeholder="first name"></div>
                        <div class="col-md-6"><label class="content">Last Name</label><input type="text" class="form-control" placeholder="last name"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="content">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number"></div>
                        <div class="col-md-12"><label class="content">Address</label><input type="text" class="form-control" placeholder="enter adress"></div>
                        <div class="col-md-12"><label class="content">Zip Code</label><input type="text" class="form-control" placeholder="enter zip code"></div>
                        <div class="col-md-12"><label class="content">City</label><input type="text" class="form-control" placeholder="enter city"></div>
                        <div class="col-md-12"><label class="content">Email</label><input type="text" class="form-control" placeholder="enter email"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5 type1">
                    <div class="d-flex justify-content-between align-items-center"><span>User Type</span><span class="border px-3 p-1 user-type">Type</span></div><br>
                    <div class="col-md-12"><label class="content">User Bio</label><input type="text" class="form-control" placeholder="bio"></div>
                </div>
            </div>
        </div>
</body>

</html>