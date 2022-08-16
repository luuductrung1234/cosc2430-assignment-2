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
    <section id="register_container">

      <h3>
        Who are you?
      </h3>

      <div id="register_row">

        <a href="register.php?name=vendor" class="register_col">  
          
            <img src="../img/vendor1.jpg" alt="vendor">
            <h4>
              vendor
            </h4>
          
        </a>

        
     
        
        <a href="register.php?name=customer" class="register_col"> 
               
            <img src="../img/customer1.jpg" alt="customer">

            <h4>
              customer
            </h4>
    
        </a>

        
        

        <a href="register.php?name=delivery" class="register_col">   
        
            <img src="../img/delivery.jpg" alt="delivery">
            <h4>
              shipper
            </h4>     
        </a>

      </div>
    </section>

      

    <div id="register_button">
        <button class="register_button">
          go back
        </button>
        <button class="register_button">
          <?php 
          if(isset($_GET['name'])){
            if($_GET['name']=='customer'){
              echo '<a href="registerCustomer.php">
                      continue
                    </a>';
            }elseif($_GET['name']=='vendor'){
              echo '<a href="registerVendor.php">
                      continue
                    </a>'; 
            }elseif($_GET['name']=='delivery'){
              echo '<a href="registerDelivery.php">
                      continue
                    </a>';

          }}else{
            echo '<a href="register.php" onclick="registerAlert()">continue</a>';
          }?>
          
        </button>
    </div>
    
  </main>
  <footer>
    <!-- footer -->
  </footer>
  <script src="../javascript/register.js"></script>
</body>
</html>