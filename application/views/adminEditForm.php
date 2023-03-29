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
        </div><?php } else  echo base_url('adminForm') ?>



    <div class="row">
        <div class="col-md-8 marginrightauto">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2" style="text-align:center; ">Upravit položku</h4>
                </header>
                <article class="card-body">
                    <form action="<?php echo base_url('editForm/' . $editData['nazev']); ?>" method="post" enctype="multipart/form-data">

                        <!-- form-row end.// -->
                        <div class="form-group">

                            <small>Fotka</small>

                            <img src="<?= base_url("assets/images/" . $editData["fotka"]); ?>" id="upfile1" style="cursor:pointer; height: 150px; width: 150px" />
                            <input class="form-control" style="display:none" id="file1" name="fotka" type="file" placeholder="Photo" value="<?php echo $editData['fotka'] ?>">
                            <p><?php if (isset($error)) {
                                    echo $error;
                                } ?></p>
                            <script>
                                $('#file1').val(<?php echo $editData['fotka'] ?>);
                            </script>
                        </div>

                        <script>
                            $("#upfile1").click(function() {
                                $("#file1").trigger('click');
                            });
                        </script>

                        <div class="form-group ">
                            <small>Název</small>
                            <input type="text" name="nazev" class="form-control" value="<?php echo $editData['nazev'] ?>">
                            <small><?= form_error('nazev'); ?></small>
                        </div> <!-- form-group end.// -->
                        <!-- form-group end.// -->



                        <!-- form-row.// -->
                        <div class="form-group">
                            <small>Popis</small>
                            <textarea class="form-control" name="popis" type="text" value="<?php echo $editData['popis'] ?>"><?php echo $editData['popis'] ?></textarea>
                            <small><?= form_error('popis'); ?></small>
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <small>Cena</small>
                            <input class="form-control" name="cena" type="number" value="<?php echo $editData['cena'] ?>">
                            <small><?= form_error('cena'); ?></small>
                        </div>


                        <div class="form-group ">
                            <label for="nazevKategorie">Kategorie:</label>
                            <select id="nazevKategorie" name="nazevKategorie">
                                <option value="<?php echo $editData['idKategorie'] ?>"><?php echo $editData['nazevKategorie'] ?></option>
                                <?php foreach ($Kategorie as $row) {
                                    if ($row['idKategorie'] != $editData['idKategorie']) { ?>
                                        <option value="<?php echo $row['idKategorie'] ?>"><?php echo $row['nazevKategorie'] ?></option>
                                <?php }
                                } ?>
                            </select>


                        </div>
                        <br></br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block marginleftbutton"> Upravit </button>
                            <?php
                            //if(! error_log() == NULL){
                            //echo base_url('adminForm');
                            //};
                            ?>
                        </div> <!-- form-group// -->

                    </form>
                </article> <!-- card-body end .// -->

                <Table></Table>


                <div class="border-top card-body text-center"> <a type="button" class="btn btn-secondary marginrightbut" href="<?php echo base_url('admin'); ?>">Admin</a></div>
            </div> <!-- card.// -->
        </div> <!-- col.//-->

    </div> <!-- row.//-->


    </div>
    <!--container end.//-->



</body>

</html>