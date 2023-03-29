<div class="container" style="margin-top: 30px">
    <?php
    $input_date = $this->input->post('date');
    ?>
    <h2>Souhrn Objednávek pro <?php echo $input_date; ?></h2>
    <a type="button" href="<?php echo base_url(); ?>admin/orderList" class="btn btn-primary" style="width:150px; height: 50px; float: right;">Zpět</a>

    <?php if (count($orders) > 0) { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($orders as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['idObjednavka'] ?></td>
                        <td><?php echo $row['DatumObjednavky'] ?></td>
                        <td><a type="button" href="<?php echo base_url(); ?>admin/orderDetail/<?php echo $row['idObjednavka']; ?>" class="btn btn-primary" style="width:200px; height: 50px; float: right;">Detail</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            Žádné objednávky nebyly nalezeny pro tento den.
        </div>
        <a type="button" href="<?php echo base_url(); ?>admin/orderList" class="btn btn-primary" style="width:175px; height: 50px; float: left;">Zpět</a>
    <?php } ?>
</div>