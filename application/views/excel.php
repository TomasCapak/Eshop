<html>

<head>
    <style>
        .fakebutton {
            margin-left: 40%;
            display: block;
            border-width: 1px;
            border-style: solid;
            border-color: black;

        }
    </style>

</head>

<body>
    <!-- <form style="margin-top: 100px;" action="<?php echo base_url(); ?>admin/import_products" method="post" enctype="multipart/form-data">
        <input type="button" class="fakebutton btn" id="loadFileExcel" value="Vybrat Soubor" onclick="document.getElementById('excel').click();" />

        <input id="excel" type="file" style="display: none;" name="products_excel" accept=".xls,.xlsx" required>
        <input type="submit" value="Upload">
    </form> -->
    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-md-8 marginrightauto">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2" style="text-align:center; ">Přidat položky pomocí excelu</h4>
                    </header>
                    <article class="card-body">
                        <form style="text-align:center; " action="<?php echo base_url(); ?>admin/import_products" method="post" enctype="multipart/form-data">
                            <input type="button" class="fakebutton btn" id="loadFileExcel" value="Vybrat Soubor" onclick="document.getElementById('excel').click();" />

                            <input id="excel" type="file" style="display: none;" name="products_excel" accept=".xls,.xlsx" required>

                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('error_message')) : ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error_message'); ?>
                                </div>
                            <?php endif; ?>


                            <input style="margin-top: 20px" class="btn btn-success" type="submit" value="Přidat">


                        </form>

                </div>


                </article>
            </div>

        </div>
    </div>

</body>

</html>