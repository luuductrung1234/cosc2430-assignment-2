<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css">
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
              <button class="register_verify" onclick="verifyUsername()">
                verify
              </button>
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
              <input type="text" name="password_confirm" id="password_confirm">
            </div>
            <div class="register_alert" id="password_confirm_alert">
 
            </div>
          </div>

         

          <div class="register">
            <div class="register_label">
              business address
              <span class="color_red">*</span>
            </div>
            <div class="register_input">
              <input type="text" name="business_address" id="business_address">
            </div>
            <div>
              <button class="register_verify">
                verify
              </button>
            </div>
            <div class="register_alert">
          
            </div>
              
          </div>
          <div class="register">
            <div class="register_label">
              profile
            </div>
            <div class="register_input">
              <input type="file" name="profile" id="profile">
            </div>
            <div class="register_alert">
            </div>

          </div>

          <div class="register">
            <div class="register_label">
              distribution nub
              <span class="color_red">*</span>
            </div>
            <div class="register_input">
              <select name="register_distribution_hub" id="register_distribution_hub">
                <option value="option1">option1</option>
              </select>
              
            </div>
            <div class="register_alert">
            </div>

          </div>

          
         

            
         


        </form>
     

      

     
    </section>
    </div>
    <div id="register_vendor_button">
      <button class="register_vendor_button" id="register_gobackbutton">
        <a href="./register.php">
          go back
        </a>
      </button>

      <button class="register_vendor_button">
        save
      </button>
      <button class="register_vendor_button" id="register_continuebutton">
        continue
      </button>

     
    </div>

      

 
    
  </main>
  <footer>
    <!-- footer -->
  </footer>
  <script src="../javascript/register.js"></script>
</body>
</html>