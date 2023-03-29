<html>

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
        </div><?php } else  echo base_url('adminForm') ?>



    <div class="row">
        <div class="col-md-8 marginrightauto">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2" style="text-align:center; ">Přidat položku</h4>
                </header>
                <article class="card-body">
                    <form action="<?php echo base_url('adminForm'); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">


                            <input type="button" class="fakebutton btn" id="loadFileXml" value="Vybrat Fotku" onclick="document.getElementById('file').click();" />
                            <input class="form-control" style="display:none;" id="file" name="fotka" type="file" placeholder="Photo">
                            <p><?php if (isset($error)) {
                                    echo $error;
                                } ?></p>
                        </div>
                        <div class="form-group ">

                            <input type="text" name="nazev" class="form-control" placeholder="Název">
                            <small><?= form_error('nazev'); ?></small>
                        </div>



                        <div class="form-group">

                            <textarea class="form-control" name="popis" type="text" placeholder="Popis"></textarea>
                            <small><?= form_error('popis'); ?></small>
                        </div>
                        <div class="form-group">

                            <input class="form-control" name="cena" type="number" placeholder="Cena">
                            <small><?= form_error('cena'); ?></small>
                        </div>


                        <div class="form-group ">
                            <label for="nazevKategorie">Kategorie:</label>
                            <select id="nazevKategorie" name="nazevKategorie">
                                <?php foreach ($Kategorie as $row) { ?>
                                    <option value="<?php echo $row['idKategorie'] ?>"><?php echo $row['nazevKategorie'] ?></option>

                                <?php   } ?>
                            </select>


                        </div>
                        <br></br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block marginleftbutton"> Přidat </button>
                            <?php
                            //if(! error_log() == NULL){
                            //echo base_url('adminForm');
                            //};
                            ?>
                        </div>

                    </form>
                </article>
                <div class="border-top card-body text-center"> <button type="reset" class="btn btn-block marginrightbut"> Smazat
                        <Table></Table>
                    </button></div>

                <div class="border-top card-body text-center"> <a type="button" class="btn btn-primary marginrightbut" href="<?php echo base_url('admin'); ?>">Zpět<Table></Table></a></div>
                <div class="border-top card-body text-center"> <a type="text" href="<?php echo base_url('excel'); ?>">Přidat pomocí excelu<Table></Table></a></div>
            </div>
        </div>

    </div>
    </div>


</body>

</html>