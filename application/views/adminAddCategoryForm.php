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
                    <h4 class="card-title mt-2" style="text-align:center; ">Přidat kategorii</h4>
                </header>
                <article class="card-body">
                    <form action="<?php echo base_url('categoryForm'); ?>" method="POST" enctype="multipart/form-data">

                        <!-- form-row end.// -->

                        <div class="form-group ">

                            <input type="text" name="nazevKategorie" class="form-control" placeholder="Název Kategorie">
                            <small><?= form_error('nazevKategorie'); ?></small>
                        </div> <!-- form-group end.// -->
                        <!-- form-group end.// -->

                        <label for="nadKategorie">Nadkategorie:</label>
                        <select id="nadKategorie" name="nadKategorie">
                            <option value="<?php echo NULL ?>">Hlavní Kategorie</option>
                            <?php foreach ($Kategorie as $row) { ?>
                                <option value="<?php echo $row['idKategorie'] ?>"><?php echo $row['nazevKategorie'] ?></option>

                            <?php   } ?>

                        </select>

                        <br></br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block marginleftbutton"> Přidat </button>
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