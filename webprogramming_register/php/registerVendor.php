<?php include_once("./register_detail_top.php")?>

          <div class="register">
            <div class="register_label">
              business name 
              <span class="color_red">*</span>
            </div>
            <div class="register_input">
              <input type="text" name="business_name" id="business_name">
            </div>
            <div>
              <input type="button" class="register_verify" onclick="verifyBusinessName()" value="verify">

              </input>
            </div>
            <div class="register_alert" id="business_name_alert">
      
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
           
<?php include_once("./register_detail_bottom.php")?>