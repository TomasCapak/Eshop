<style>
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

    .gear-button-container {
        position: absolute;
        bottom: 10px;
        width: 100%;
    }

    .gear-button {
        display: inline-block;
        margin: 0 auto;
        cursor: pointer;
        color: #ffffff;
        background-color: black;
        padding: 4px 35%;

    }

    .gear-button:hover {
        background-color: grey;
        text-decoration: none;
    }

    .truncate {
        position: relative;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="container">
    <h1 style="margin-top: 50px">Seznam neaktivních položek</h1>
</div>


<div class="container" id="cardsContainer" style="margin-top: 50px;">
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
                                </div> <!-- price-wrap.// -->
                            </div> <!-- action-wrap -->
                            <p class="marginp truncate"><?php echo $row['popis'] ?></p>

                            <div class="gear-button-container">
                                <a href="<?= base_url('activate') . "/" . $row['idPolozka'] ?>" class="gear-button">
                                    Obnovit
                                </a>
                            </div>

                        </figcaption>
                    </figure> <!-- card // -->
                </a>
            </div><!-- col // -->
        <?php } ?>
    </div>
</div>