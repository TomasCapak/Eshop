<style>
    .media-object {
        margin-right: 20px;


    }
</style>
<div class="container">

    <td><a type="button" class="btn btn-primary" style="margin-top: 30px" href="<?php echo base_url('admin/generate_pdf/' . $orderData[0]['idObjednavka']); ?>">PDF</a></td>

    <div class="row">


        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <?php foreach ($orderData as $item) {
                $order_id = $item['idObjednavka'];
            ?>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Položka</th>
                            <th>Název</th>
                            <th>Množství</th>
                            <th class="text-center">Cena</th>
                            <th class="text-center">Celková Cena</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="<?php echo base_url('detail/' . $item['nazev']) ?>"> <img class="media-object" src="<?php echo base_url() ?>assets/images/<?php echo $item['fotka']; ?>" style="width: 72px; height: 72px;"> </a>

                                </div>
                            </td>
                            <td>
                                <a href="<?php echo base_url('detail/' . $item['nazev']) ?>"><?php echo $item['nazev']; ?></a>
                            </td>
                            </td>
                            <td class="col-sm-1 col-md-1 text-center">
                                <strong id="quantity"><?php echo $item['pocet']; ?></strong>
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $item['cena'] . "Kč"; ?></strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $item['cena'] * $item['pocet']; ?></strong></td>

                        </tr>
                    <?php } ?>

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>




                    </tr>
                    <tr>

                        <td><a type="button" class="btn btn-danger" href="<?= base_url('disableObjednavka/' . $order_id); ?>">Zrušit</a></td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><a type="button" class="btn btn-success" href="<?= base_url('activateObjednavka/' . $order_id); ?>">Potvrdit</a></td>
                    </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>