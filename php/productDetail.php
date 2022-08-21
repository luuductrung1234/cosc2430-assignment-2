<?php 
include_once("./productDetailHeader.php");


if(isset($_GET['name'])){
  
if($_GET['name']=='pic1'){
  echo'<main class="product_detail_page">
  <section class="product_info1">
    <div class="product_detail_img_display">
      <div class="mobile_only product_detail_arrows">
        <img src="../img/arrow_back_ios_FILL0_wght400_GRAD0_opsz48.svg" alt="previous picture">

      </div>
      <div class="product_img">
      
        <a href="productDetail.php?name=pic1" class="product_detail_pic1">

        </a>
        <a href="productDetail.php?name=pic2" class="product_detail_pic2">
        
        </a>
        <a href="productDetail.php?name=pic3" class="product_detail_pic3">
        
        </a>
        <a href="productDetail.php?name=pic4" class="product_detail_pic4">
          
        </a>

      </div>
      
      <div class="mobile_only product_detail_arrows">
        <img src="../img/arrow_forward_ios_FILL0_wght400_GRAD0_opsz48.svg" alt="next picture">

      </div>
    </div>

    ';

}elseif($_GET['name']=='pic2'){
  echo'<main class="product_detail_page">
  <section class="product_info1">
    <div class="product_detail_img_display">
      <div class="mobile_only product_detail_arrows">
        <img src="../img/arrow_back_ios_FILL0_wght400_GRAD0_opsz48.svg" alt="previous picture">

      </div>
      <div class="product_img">
      
        <a href="productDetail.php?name=pic2" class="product_detail_pic2">

        </a>
        <a href="productDetail.php?name=pic1" class="product_detail_pic1">
        
        </a>
        <a href="productDetail.php?name=pic3" class="product_detail_pic3">
        
        </a>
        <a href="productDetail.php?name=pic4" class="product_detail_pic4">
          
        </a>

      </div>
      
      <div class="mobile_only product_detail_arrows">
        <img src="../img/arrow_forward_ios_FILL0_wght400_GRAD0_opsz48.svg" alt="next picture">

      </div>
    </div>

    ';
}else if($_GET['name']=='pic3'){
  echo'<main class="product_detail_page">
  <section class="product_info1">
    <div class="product_detail_img_display">
      <div class="mobile_only product_detail_arrows">
        <img src="../img/arrow_back_ios_FILL0_wght400_GRAD0_opsz48.svg" alt="previous picture">

      </div>
      <div class="product_img">
      
        <a href="productDetail.php?name=pic3" class="product_detail_pic3">

        </a>
        <a href="productDetail.php?name=pic1" class="product_detail_pic1">
        
        </a>
        <a href="productDetail.php?name=pic2" class="product_detail_pic2">
        
        </a>
        <a href="productDetail.php?name=pic4" class="product_detail_pic4">
          
        </a>

      </div>
      
      <div class="mobile_only product_detail_arrows">
        <img src="../img/arrow_forward_ios_FILL0_wght400_GRAD0_opsz48.svg" alt="next picture">

      </div>
    </div>

    ';
}else if($_GET['name']=='pic4'){
  echo'<main class="product_detail_page">
  <section class="product_info1">
    <div class="product_detail_img_display">
      <div class="mobile_only product_detail_arrows">
        <img src="../img/arrow_back_ios_FILL0_wght400_GRAD0_opsz48.svg" alt="previous picture">

      </div>
      <div class="product_img">
      
        <a href="productDetail.php?name=pic4" class="product_detail_pic4">

        </a>
        <a href="productDetail.php?name=pic2" class="product_detail_pic2">
        
        </a>
        <a href="productDetail.php?name=pic3" class="product_detail_pic3">
        
        </a>
        <a href="productDetail.php?name=pic1" class="product_detail_pic1">
          
        </a>

      </div>
      
      <div class="mobile_only product_detail_arrows">
        <img src="../img/arrow_forward_ios_FILL0_wght400_GRAD0_opsz48.svg" alt="next picture">

      </div>
    </div>

    ';
}}else{
  echo'<main class="product_detail_page">
  <section class="product_info1">
    <div class="product_detail_img_display">
      <div class="mobile_only product_detail_arrows">
        <img src="../img/arrow_back_ios_FILL0_wght400_GRAD0_opsz48.svg" alt="previous picture">

      </div>
      <div class="product_img">
      
        <a href="productDetail.php?name=pic1" class="product_detail_pic1">

        </a>
        <a href="productDetail.php?name=pic2" class="product_detail_pic2">
        
        </a>
        <a href="productDetail.php?name=pic3" class="product_detail_pic3">
        
        </a>
        <a href="productDetail.php?name=pic4" class="product_detail_pic4">
          
        </a>

      </div>
      
      <div class="mobile_only product_detail_arrows">
        <img src="../img/arrow_forward_ios_FILL0_wght400_GRAD0_opsz48.svg" alt="next picture">

      </div>
    </div>

    ';
}

?>
  
      
<?php include_once("./productDetailbody.php")?>   


  