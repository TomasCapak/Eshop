<?php foreach ($polozky as $row) { ?>
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