<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css?var1">
  <title>Document</title>
</head>
<body>
  <form action="#" method="post" class="product_info5" >
    <div class="product_quantity">
      <div class="product_form_title">
        <label for="product_quantity">
          quantity
        </label>
      </div>
      <div>
        <input type="number" name="product_quantity" id="product_quantity">
      </div>
    </div>
    <div >
      <div class="product_form_title">
        <label>
          delivery option
        </label>
      </div>
      <div class="product_form">
        <div class="product_form_input"> 
          <label for="delivery_fast">
            fast
          </label>
          <input type="radio" name="delivery" id="delivery_fast">

        </div>
        <div class="product_form_input"> 
          <label for="delivery_normal">
            normal
          </label>
          <input type="radio" name="delivery" id="delivery_normal">

        </div>
        <div class="product_form_input"> 
          <label for="delivery_slow">
            slow
          </label>
          <input type="radio" name="delivery" id="delivery_slow" >
        </div>

      </div>
      
      

    </div>
          
          
        
     


      <div >
        <div class="product_form_title">
          <label>
            payment option
          </label>
        </div>
        <div class="product_form"> 
          <div class="product_form_input">
            <label for="payment_cash">
              cash
            </label>
            <input type="radio" name="payment" id="payment_cash">

          </div>
          <div class="product_form_input">
            <label for="payment_wire">
              wire
            </label>
            <input type="radio" name="payment" id="payment_wire">

          </div>
          <div class="product_form_input">
            <label for="payment_card">
              card
            </label>
            <input type="radio" name="payment" id="payment_card">

          </div> 
        </div>
        
      </div>
      <div >
        <div class="product_form_title">
          <label>
            warranty
          </label>
        </div>
        <div class="product_form"> 
          <div class="product_form_input">
            <label for="warranty_1year">
              1 year
            </label>
            <input type="radio" name="warranty" id="warranty_1year">

          </div>
          <div class="product_form_input">
            <label for="warranty_6month">
              6 month
            </label>
            <input type="radio" name="warranty" id="warranty_6month">

          </div>
          <div class="product_form_input">
            <label for="warranty_none">
              none
            </label>
            <input type="radio" name="warranty" id="warranty_none">

          </div>
          
          
      
        </div>
        
      </div>
      <div class="go_cart_button">
        <input type="submit" value="go to the cart">
      </div>
    </form>
  <script src="../js/productDetail.js?ver123"></script>
</body>
</html>
