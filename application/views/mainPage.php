<?php
//$catalog = array($polozky);
//$_SESSION['cart']['nazev']['quantity'] = 5;
//$cart = $this->session->cart;
//$cart = $catalog; 
?>

<html>

<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Eshop</title>

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

    .pagination a:hover:not(.active) {
      background-color: #ddd;
    }

    .row>* {
      padding-left: unset;
    }

    .btnn {
      width: 100%;
      display: block;
      height: 75px;
      text-align: center;
      box-sizing: unset;
    }

    .a {
      width: 100%;
      display: block;
    }

    .btn {
      display: inline-flex;
      justify-content: center;
      /* center the content horizontally */
      align-items: center;
      /* center the content vertically */
      --padding-x: 1.2em;
      border-color: black;
      /* hide button border */
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
      border-radius: 5px 5px 0 0;
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
      border-top: 2px solid #eee;
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

    figure figcaption {
      display: block;
      height: 300px;
    }

    .price {
      margin-top: 10px;
    }

    .container {
      margin-top: 10px;
    }

    .sortSelect {
      border-radius: 3px;
      border: solid;
      border-color: lightgrey;

    }

    .marginp {
      margin-top: 30px;
    }

    .truncate {
      position: relative;
      display: -webkit-box;
      -webkit-line-clamp: 4;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .truncate a.show-more {
      position: absolute;
      bottom: 0;
      right: 0;
      background-color: white;
      padding-left: 5px;
    }

    .gear-button-container {
      position: absolute;
      bottom: 10px;
      width: 100%;
    }

    .gear-button {
      display: inline-block;
      margin-top: 10%;
      cursor: pointer;
      color: #ffffff;
      background-color: black;
      padding: 4px 42.5%;

    }

    .trash-button {
      display: inline-block;
      margin-top: 1%;
      cursor: pointer;
      color: #ffffff;
      background-color: #d9534f;
      padding: 4px 43%;

    }

    .gear-button:hover {
      background-color: grey;
      text-decoration: none;
    }
  </style>

  <?php
  //$catalog = array($polozky);
  //$_SESSION['cart']['nazev']['quantity'] = 5;
  //$cart = $this->session->cart;
  //$cart = $catalog; 
  ?>
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
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="sticky-top">
          <div class="d-flex justify-content-between d-lg-flex d-none" role="group" aria-label="..." style="z-index:9999; margin-top: 15px">
            <?php foreach ($mainCategory as $row) : ?>
              <a type="button" href="<?php echo base_url("hlavni?kategorie=" . urlencode($row['nazevKategorie'])) ?>" class="btn btnn btn-danger flex-fill mr-1"><?php echo $row['nazevKategorie'] ?></a>
            <?php endforeach; ?>
          </div>
          <div class="d-lg-none mt-2">
            <div class="row">
              <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" style="text-align: center" data-target="#menu-collapse" aria-expanded="false" aria-controls="menu-collapse">
                <span class="navbar-toggler-icon" style="text-align: center; "></span>
                Menu
                <span class="navbar-toggler-icon" style="text-align: center; "></span>
              </button>
              <div class="collapse" id="menu-collapse">
                <div class="btn-group-vertical w-100 d-lg-block" role="group" aria-label="...">
                  <?php foreach ($mainCategory as $row) : ?>
                    <a type="button" href="<?php echo base_url("hlavni?kategorie=" . urlencode($row['nazevKategorie'])) ?>" class="btn btn-block btnn btn-danger"><?php echo $row['nazevKategorie'] ?></a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="d-flex justify-content-between">
          <?php
          if (isset($data)) {
            foreach ($data as $row) {
          ?>
              <a type="button" href="<?php echo base_url("hlavni?kategorie=" . urlencode($row)) ?>" class="btn btnn btn-primary flex-fill mr-1"><?php echo $row ?></a>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php
  //print_r($_SESSION['cart']);
  //echo getBy('idPolozka', 1, $catalog);



  ?>

  <!-- Add this button in your view -->


  <div class="container">

    <div class="row">


      <div class="col-10">
        <div class="form-group" style="height: 100px; width: 200px;">

          <script type="text/javascript">
            function handleSelect(elm) {
              var baseUrl = '<?php echo base_url('hlavni') ?>';
              var urlParams = new URLSearchParams(window.location.search);
              urlParams.set('order', elm.value);
              window.location.href = baseUrl + '?' + urlParams.toString();
            }
          </script>

          <select class="form-control sortSelect" id="sort" onchange="handleSelect(this)">
            <?php
            if (!isset($sortBy)) {
              $sortBy = '';
            }
            ?>
            <option value="default" disabled <?php echo $sortBy == '' ? 'selected' : '' ?>>Seřadit</option>
            <option value="price_asc" <?php echo $sortBy == 'price_asc' ? 'selected' : '' ?>>Cena(Od nejnižší)</option>
            <option value="price_desc" <?php echo $sortBy == 'price_desc' ? 'selected' : '' ?>>Cena(Od nejvyšší)</option>
            <option value="name_asc" <?php echo $sortBy == 'name_asc' ? 'selected' : '' ?>>Název A až Z</option>
            <option value="name_desc" <?php echo $sortBy == 'name_desc' ? 'selected' : '' ?>>Název Z až A</option>
          </select>
        </div>
      </div>


      <div class="col-2" style="margin-top: 0px; margin-bottom: 0px; float: right">

        <?php if ($this->ion_auth->logged_in()) { ?>
          <a href="<?= base_url('neaktivni') ?>" class="btn btn-primary">Obnovit Položku
          </a>
        <?php } ?>

      </div>

      <div class="col-2-sm">
        <nav aria-label="Page navigation example" style="float: right">
          <ul class="pagination justify-content-center">
            <?php echo $pagination_links; ?>
          </ul>
        </nav>
      </div>
    </div>


    <?php if ($this->session->flashdata('success_message')) : ?>
      <div class="alert alert-success">
        <?php echo $this->session->flashdata('success_message'); ?>
      </div>
    <?php endif; ?>



    <div class="container" id="cardsContainer" style="margin-top: 
    0px;">
      <div class="row">
        <?php foreach ($polozky as $row) { ?>
          <div class="col-md-3">
            <a href="<?= base_url("detail/") . $row['nazev'] ?>">
              <figure class="card card-product">
                <div class="img-wrap">
                  <img src="<?php echo base_url() ?>assets/images/<?php echo $row['fotka'] ?>">
                </div>
                <figcaption class="info-wrap">
                  <h6 class="title text-dots"><a href="<?= base_url("detail/") . $row['nazev'] ?>"><?php echo $row['nazev'] ?></a></h6>
                  <p><?php echo $row['nazevKategorie'] ?></p>
                  <div class="action-wrap">
                    <div class="price-wrap h5">
                      <span class="price-new marginleftprice"><?php echo $row['cena'] ?> CZK</span>
                      <a type="button" href="<?= base_url('addToCart/' . $row['idPolozka']); ?>" class="btn btn-primary btn-sm float-right marginleftbutton"> Koupit </a>
                      <?php if ($this->ion_auth->logged_in()) { ?>
                        <a href="<?= base_url('editForm') . "/" . $row['nazev'] ?>" class="gear-button">
                          <i class="fas fa-cog"></i>
                        </a>
                        <a href="<?= base_url('admin') ?>/delete/<?= $row['idPolozka'] ?>" class="trash-button">
                          <i class="fas fa-trash"></i>
                        </a>
                      <?php } ?>
                    </div> <!-- price-wrap.// -->
                  </div> <!-- action-wrap -->
                  <?php if ($this->ion_auth->logged_in()) { ?>
                  <?php } else { ?>
                    <p class="truncate marginp"><?php echo $row['popis'] ?><a href="<?= base_url("detail/") . $row['nazev'] ?>" class="show-more">Ukázat více...</a></p>
                  <?php } ?>
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




  <script>
    $('#sort').change(function() {
      var value = $(this).val();
      $.ajax({
        url: "<?php echo base_url('sort_cards'); ?>",
        method: "POST",
        data: {
          sort_by: value
        },
        success: function(data) {
          $("#cardsContainer").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.error("AJAX request failed: " + textStatus + " - " + errorThrown);
        }
      });
    });
  </script>


</body>

</html>