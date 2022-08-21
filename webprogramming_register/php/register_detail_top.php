<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css?var1">
</head>
<body>
  <header>
    <nav>
      <!-- nav -->
    </nav>    
  </header>  
  <main id="register_main">
    <h2>
      Welcome to LAZADA
    </h2>
    <section id="register_container" >

      <h3 id="register_vendor_heading">
        sign up
      </h3>
      <div class="register_form">
        <form action="#" method="post" >
          <div class="register">
            <div class="register_label">
              user name 
              <span class="color_red">*</span>
            </div>
            <div class="register_input">
              <input type="text" name="username" id="username">
            </div>
            <div>
              <input type="button" class="register_verify" onclick="verifyName()" value="verify">
                
              </input>
            </div>
            <div class="register_alert" id="username_alert">
              
     

            </div>
          </div>

            <div class="register">
              <div class="register_label">
                password
                <span class="color_red">*</span>
              </div>
              <div class="register_input">
                <input type="text" name="password" id="password">
              </div>
              <div class="register_alert">

              </div>
          </div>

          <div class="register">
            <div class="register_label">
              password confirm
              <span class="color_red">*</span>
            </div>
            <div class="register_input">
              <input type="text" name="password_confirm" id="password_confirm" onkeyup="matchPassword()">
            </div>
            <div class="register_alert" id="password_confirm_alert">
 
            </div>
          </div>