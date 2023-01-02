<style>
  
  
  
  .row>* {
    
   
     padding-left: unset;
   


  }
  .btnn {

    
    width: 100%;
    display:block;
    height: 75px;
    text-align: center;
    
    box-sizing: unset;

  }

  .a {
    width: 100%;
    display:block;

  }

  .btn {
    display: inline-flex;
    justify-content: center; /* center the content horizontally */
    align-items: center; /* center the content vertically */
    --padding-x: 1.2em;
    border-color: black; /* hide button border */
    border: 1px solid;
    
  }

  .divbtn {
    justify-content: center;
  }

  .card-product:after {
    content: "";
    display: table;
    clear: both;
    visibility: hidden;
  }

  .card-product .price-new,
  .card-product .price {
    margin-right: 5px;
  }

  .card-product .price-old {
    color: #999;
  }

  .card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center;
  }

  .card-product .img-wrap img {
    max-height: 100%;
    max-width: 100%;
    object-fit: cover;
  }

  .card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee;
  }

  .card-product .action-wrap {
    padding-top: 4px;
    margin-top: 4px;
  }

  .card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee;
  }

  .card-product .title {
    margin-top: 0;
  }

  /* .button {
    background-color: #4CAF50;
    /* Green */
    /* border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;

  } */ 
  figure figcaption {
           display:block;
           height:300px;
  
}
  

  .price {
    margin-top: 10px;

  }

  .container {
    margin-top: 20px;
  }
  .marginp {

    margin-top: 30px;
  }

  

</style>

<?php 
//$catalog = array($polozky);
//$_SESSION['cart']['nazev']['quantity'] = 5;
//$cart = $this->session->cart;
//$cart = $catalog; 
?> 

<html>

<head>
<title>Eshop</title>


  <!------ Include the above in your HEAD tag ---------->
</head>

<body>







  <!-- 
  <a href="#" class="button" role="button">Link Button</a> -->
  <div class="container-fluid sticky-top">
  <div class="row">


    <?php
    foreach ($category as $row) {
      ?>
      <div class="col-lg">
        <div class="" role="group" aria-label="...">
          <a type="button" href="<?php echo base_url("kategorie/".$row['nazevKategorie'])?>" class="btn btn-block btnn btn-danger"><?php echo $row['nazevKategorie'] ?></a>
          
    </div>
    </div>
        <?php
      }
      ?>
    
        
      </div>
  </div>
      <?php if (isset($kategorie)) {
        echo "Kategorie: " . $kategorie;
      }
      ?>
  <div class="row">
  <?php
    if(isset($podkategorie)){

    
    foreach ($podkategorie as $row) {
    ?>
      <div class="col-lg-1">
        
        <a type="button" href="<?php echo base_url("kategorie/".$row['nazevKategorie'])?>" class="btn btn-block btnn btn-secondary"><?php echo $row['nazevKategorie'] ?></a>
        
          

    </div>
        <?php
      }}
        ?>
  </div>

  

 
  <?php 
//print_r($_SESSION['cart']);
//echo getBy('idPolozka', 1, $catalog);

?>



  <div class="container">
    <div class="row">

      <?php
      foreach ($polozky as $row) {
      ?>
        <div class="col-md-3">
          <figure class="card card-product">
            <div class="img-wrap">
              <img src="<?php echo base_url()?>assets/images/<?php echo $row['fotka'] ?>">
            </div>
            <figcaption class="info-wrap">
              <h6 class="title text-dots"><a href="#"><?php echo $row['nazev'] ?></a></h6>

              <p><?php echo $row['nazevKategorie'] ?></p>
              <div class="action-wrap">


                <div class="price-wrap h5">

                  <span class="price-new marginleftprice"><?php echo $row['cena'] ?> CZK</span>
                  <a type="button" href="<?= base_url('cart');?>" class="btn btn-primary btn-sm float-right marginleftbutton"> Koupit </a>
                    <!-- <del class="price-old">$1980</del> -->
                </div> <!-- price-wrap.// -->
              </div> <!-- action-wrap -->

              <p class="marginp"><?php echo $row['popis'] ?></p>
              
            </figcaption>
          </figure> <!-- card // -->
        </div><!-- col // -->

      <?php
      }
      ?>
    </div>
  </div>

  <?php echo var_dump($polozky); ?>



</body>

</html>