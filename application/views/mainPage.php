<style>
  
  .pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}


  
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
  
  <?php 
  //if(isset($data)){
  //foreach($data as $row){
  //echo $row;
  //}} 
    ?> 
  







  <!-- 
  <a href="#" class="button" role="button">Link Button</a> -->
  <div class="container-fluid sticky-top">
  <div class="row">


    <?php
    foreach ($mainCategory as $row) {
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
      
  <div class="row">
  <?php
    if(isset($data)){

    
    foreach ($data as $row) {
    ?>
      <div class="col-lg">
        
        <a type="button" href="<?php echo base_url("kategorie/".$row)?>" class="btn btn-block btnn btn-primary"><?php echo $row ?></a>
          
       
    </div>
        <?php
      }}

       //echo anchor('kategorie/'.$kategorieById, 'Zpět', 'class="btn btn-primary btn-sm" style="float: right"');

        ?>
  </div>

  
 
  <?php 
//print_r($_SESSION['cart']);
//echo getBy('idPolozka', 1, $catalog);

?>

<div class="container">
    <div class="row">
        <?php foreach ($results as $row) { ?>
        <div class="col-md-3">
            <a href="<?= base_url("detail/"). $row['nazev'] ?>">
                <figure class="card card-product">
                    <div class="img-wrap">
                        <img src="<?php echo base_url()?>assets/images/<?php echo $row['fotka'] ?>">
                    </div>
                    <figcaption class="info-wrap">
                        <h6 class="title text-dots"><a href="<?= base_url("detail/"). $row['nazev'] ?>"><?php echo $row['nazev'] ?></a></h6>
                        <p><?php echo $row['nazevKategorie'] ?></p>
                        <div class="action-wrap">
                            <div class="price-wrap h5">
                                <span class="price-new marginleftprice"><?php echo $row['cena'] ?> CZK</span>
                                <a type="button" href="<?= base_url('addToCart/'.$row['idPolozka']);?>" class="btn btn-primary btn-sm float-right marginleftbutton"> Koupit </a>
                            </div> <!-- price-wrap.// -->
                        </div> <!-- action-wrap -->
                        <p class="marginp"><?php echo $row['popis'] ?></p>
                    </figcaption>
                </figure> <!-- card // -->
            </a>
        </div><!-- col // -->
        <?php } ?>
    </div>
</div>

<div class="container">
    <div class="row">
        
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php echo $pagination_links; ?>
  </ul>
</nav>
        </div>
    </div>
</div>

  <?php  ?>


  <?php
  echo anchor(utf8_encode('kategorie/Oblečení'),  'test', 'class="btn btn-danger"');
$normal_word = normalizer::normalize("Oblečení", Normalizer::FORM_KD);
echo $normal_word;


echo Normalizer::normalize("a´", Normalizer::FORM_C); // á  
echo Normalizer::normalize("á", Normalizer::FORM_D); // a´


if (normalizer_is_normalized($normal_word, Normalizer::FORM_KD)) {
  echo $normal_word." is normalized";
} else {
  echo $normal_word." is not normalized";
}

if (extension_loaded('intl')) {
  echo "intl extension is loaded";
} else {
  echo "intl extension is not loaded";
}

$string = "Oblečení";
$transliterator = Transliterator::createFromRules(':: Any-Latin; :: Latin-ASCII; :: NFD; :: [:Nonspacing Mark:] Remove; :: NFC;', Transliterator::FORWARD);
echo $normalized = $transliterator->transliterate($string);



?>



</body>

</html>