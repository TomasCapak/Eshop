<style>
    .navbar {
        margin-top: 0 px;
    }

    .marginsearch {
        margin-left: 100px;

    }

    .marginnav {
        margin-left: auto;

    }
</style>




<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary ">
    <div class="container">
    <?php if ($this->ion_auth->logged_in()) { ?>
        <a class="navbar-brand" href="<?php echo base_url("admin"); ?>">Hlavní stránka</a>
        <?php } else {?>
            <a class="navbar-brand" href="<?php echo base_url("hlavni"); ?>">Hlavní stránka</a>
            <?php }?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
            </ul>

      



            <div class="mr-auto ">



                <form class="input-group marginsearch" action="<?php echo base_url('hlavni/'); ?>" method="get">

                    <input name="keyword" value="<?php if ($this->input->get('keyword')) echo $this->input->get('keyword'); ?>" type="search" id="form1" class="form-control" placeholder="Hledat" />
                    <button type="submit" class="btn btn-primary searchbtn">
                        <i class="fas fa-search"></i>
                    </button>

                </form>

            </div>

            </ul>
            <ul class="navbar-nav marginnav">
                <?php if ($this->ion_auth->logged_in()) { ?>
                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo base_url('orderList'); ?>">OBJEDNÁVKY</a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo base_url('categoryList'); ?>">KATEGORIE</a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo base_url('adminForm'); ?>"><i class="fas fa-plus"></i></a>
                    </li>
                <?php } ?>
                <li class="nav-item">

                    <a class="nav-link" href="<?php echo base_url('cart'); ?>"><i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="<?php
                                                if ($this->ion_auth->logged_in()) {
                                                    echo base_url('odhlaseni');
                                                } else {

                                                    echo base_url('prihlaseni');
                                                }

                                                ?>
                                "><i class="fas fa-sign-in-alt"></i> <?php
                                                                        if ($this->ion_auth->logged_in()) {
                                                                            echo 'Odhlášení';
                                                                        } else {

                                                                            echo 'Přihlášení';
                                                                        }

                                                                        ?></a>
                </li>
            </ul>


        </div>
    </div>
    




</nav>





