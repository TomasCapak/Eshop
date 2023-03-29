<html>

<head>

  <style>
    body {

      overflow-x: hidden;
    }

    img {
      max-width: 100%;
    }

    .preview {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
    }

    @media screen and (max-width: 996px) {
      .preview {
        margin-bottom: 20px;
      }
    }

    .preview-pic {
      -webkit-box-flex: 1;
      -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
      flex-grow: 1;
    }


    .tab-content {
      overflow: hidden;
    }

    .tab-content img {
      width: 100%;
      -webkit-animation-name: opacity;
      animation-name: opacity;
      -webkit-animation-duration: .3s;
      animation-duration: .3s;
    }

    .card {
      margin-top: 50px;
      background: #eee;
      padding: 3em;
      line-height: 1.5em;
    }

    @media screen and (min-width: 997px) {
      .wrapper {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
      }
    }

    .details {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
    }

    .colors {
      -webkit-box-flex: 1;
      -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
      flex-grow: 1;
    }

    .product-title,
    .price,
    .sizes,
    .colors {
      text-transform: UPPERCASE;
      font-weight: bold;
    }

    .checked,
    .price span {
      color: #ff9f1a;
    }

    .product-title,
    .product-description,
    .price,
    .vote,
    .sizes {
      margin-bottom: 15px;
    }

    .product-title {
      margin-top: 0;
    }

    .size {
      margin-right: 10px;
    }

    .size:first-of-type {
      margin-left: 40px;
    }

    .color {
      display: inline-block;
      vertical-align: middle;
      margin-right: 10px;
      height: 2em;
      width: 2em;
      border-radius: 2px;
    }

    .color:first-of-type {
      margin-left: 20px;
    }

    .add-to-cart,
    .like {
      background: #000000;
      padding: 1.2em 1.5em;
      border: none;
      font-weight: bold;
      color: #fff;
      -webkit-transition: background .3s ease;
      transition: background .3s ease;
    }

    .add-to-cart:hover,
    .like:hover {
      background: #5A5A5A;
      color: #fff;
    }



    .tooltip-inner {
      padding: 1.3em;
    }

    @-webkit-keyframes opacity {
      0% {
        opacity: 0;
        -webkit-transform: scale(3);
        transform: scale(3);
      }

      100% {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
      }
    }

    @keyframes opacity {
      0% {
        opacity: 0;
        -webkit-transform: scale(3);
        transform: scale(3);
      }

      100% {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
      }
    }


    .gear-button-container {
      position: absolute;
      top: 10px;
      right: 10px;
    }

    .gear-button {
      display: inline-block;
      cursor: pointer;
      color: #ffffff;
      background-color: black;
      padding: 5px 8px;
    }

    .trash-button {
      display: inline-block;
      cursor: pointer;
      color: #ffffff;
      background-color: #d9534f;
      padding: 5px 8px;
    }

    .gear-button:hover {
      background-color: grey;
      text-decoration: none;
    }
  </style>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Popis produktu</title>

</head>

<body>


  <div style="margin: 40px">
    <div class="container">
      <div class="card">
        <div class="container-fluid">
          <div class="wrapper row">
            <div class="preview col-md-6">
              <div class="preview-pic tab-content">
                <div class="tab-pane active" id="pic-1"><img src="<?= base_url("assets/images/" . $polozkaByName["fotka"]); ?>" /></div>
              </div>
            </div>
            <div class="details col-md-6">
              <h3 class="product-title"> <?= $polozkaByName["nazev"]; ?></h3>
              <?php if ($this->ion_auth->logged_in()) { ?>
                <div class="gear-button-container">
                  <a href="<?= base_url('editForm') . "/" . $polozkaByName["nazev"] ?>" class="gear-button">
                    <i class="fas fa-cog"></i>
                  </a>
                  <a href="<?= base_url('admin') ?>/delete/<?= $polozkaByName['idPolozka'] ?>" class="trash-button">
                    <i class="fas fa-trash"></i>
                  </a>
                </div>
              <?php } ?>
              <div class="rating colors">
                <span class="">Kategorie: <?= $polozkaByName["nazevKategorie"]; ?></span>
              </div>
              <p class="product-description"><?= $polozkaByName["popis"]; ?></p>
              <h4 class="price colors">Cena: <span><?= $polozkaByName["cena"]; ?> Kč</span></h4>
              <div class="action">
                <a href=" <?= base_url('addToCart/' . $polozkaByName["idPolozka"]); ?>" class="add-to-cart btn btn-default" type="button">Přidat do košíku</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



</body>

</html>