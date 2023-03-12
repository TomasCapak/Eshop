<html>
<!------ Include the above in your HEAD tag ---------->

<head>
    <style>
        .card-body {
            border-radius: 10px;

        }

        .card {
            margin-left: auto;
            margin-top: 100px;
            width: 475px;
            border-radius: 10px;
        }

        .marginrightauto {

            margin-right: auto;
        }

        .marginleftbutton {
            margin-left: 35%;
        }

        .marginleftbutton2 {
            margin-left: 36%;
        }

        .form-contorol2 {

            height: 200px;

        }

        .form-control {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .marginrightbut {
            margin-right: 6%;

        }

        .margintop {
            margin-top: 20px;

        }

        .fakebutton {
            display: block;
            border-width: 1px;
            border-style: solid;
            border-color: black;

        }
    </style>
</head>

<body>

    <?php if ($this->session->flashdata("status")) { ?>
        <div class="alert alert-success margintop">
            <?= $this->session->flashdata("status"); ?>
        </div><?php } else  echo base_url('categoryForm') ?>



    <div class="row">
        <div class="col-md-8 marginrightauto">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2" style="text-align:center; ">Upravit kategorii</h4>
                </header>
                <article class="card-body">
                    <form action="<?= base_url('categoryEditForm/'. $KategorieById['idKategorie']); ?>" method="POST" enctype="multipart/form-data">

                        <!-- form-row end.// -->
                      
                        <div class="form-group ">

                            <input type="text" name="nazevKategorie" class="form-control" value="<?= $KategorieById['nazevKategorie'] ?>">
                            <small><?= form_error('nazevKategorie'); ?></small>
                        </div> <!-- form-group end.// -->
                        <!-- form-group end.// -->

                        <label for="nadKategorie">Nadkategorie:</label>
                       <select id="nadKategorie" name="nadKategorie">
    <?php if ($KategorieById['nadKategorie'] != "") { ?>
        <?php
        $nadKategorie = "";
        foreach ($Kategorie as $row) {
            if ($row['idKategorie'] == $KategorieById['nadKategorie']) {
                $nadKategorie = $row['nazevKategorie'];
                break;
            }
        }
        ?>
        <option value="<?= $KategorieById['nadKategorie'] ?>"><?= $nadKategorie ?></option>
    <?php } ?>
    <option value="">Hlavní Kategorie</option>
    
    <?php foreach ($Kategorie as $row) {
        if ($row['idKategorie'] != $KategorieById['idKategorie'] && $row['nadKategorie'] != "Hlavní Kategorie") {
            if($row['nazevKategorie'] != $nadKategorie) {?>
            <option value="<?= $row['idKategorie'] ?>"><?= $row['nazevKategorie'] ?></option>
            
            <?php }?>
        <?php }
    } ?>
</select>
                       
                        <br></br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block marginleftbutton"> Upravit </button>
                            <?php
                            //if(! error_log() == NULL){
                            //echo base_url('categoryForm');
                            //};
                            ?>
                        </div> <!-- form-group// -->

                    </form>
                </article> <!-- card-body end .// -->
                <div class="border-top card-body text-center"> <button type="reset" class="btn btn-block marginrightbut"> Smazat
                        <Table></Table>
                    </button></div>

                <div class="border-top card-body text-center"> <a type="button" class="btn btn-primary marginrightbut" href="<?php echo base_url('categoryList'); ?>">Zpět<Table></Table></a></div>
            </div> <!-- card.// -->
        </div> <!-- col.//-->

    </div> <!-- row.//-->





    </div>
    <!--container end.//-->

</body>

</html>