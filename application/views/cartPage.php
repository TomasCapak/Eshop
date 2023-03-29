<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<html>

<head>
    <style>
        .media-object {
            margin-right: 20px;



        }

        .prodName {
            font-size: large;
            padding-top: 10px;
        }
    </style>
</head>

<body>

    <?php if ($cart_empty) : ?>


        <div class="container">
            <div class="col-sm-12 col-md-10 col-md-offset-1">

                <table class="table ">
                    <thead>
                        <tr>
                            <th>Položka</th>
                            <th></th>
                            <th></th>
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
                                <h1>Váš košík je prázdný.<h1>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                    </tbody>
                </table>
            </div>
        </div>



    <?php else : ?>

        <script>
            function incrementQuantity(id) {
                $.ajax({
                    url: "<?php echo base_url('cart/increment_quantity/') ?>" + id,
                    type: "POST",
                    success: function(data) {
                        location.reload();
                    }
                });
            }

            function decrementQuantity(id) {
                $.ajax({
                    url: "<?php echo base_url('cart/decrement_quantity/') ?>" + id,
                    type: "POST",
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        </script>


        <div class="container">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <?php foreach ($items as $item) { ?>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>Položka</th>
                                <th>Přidat</th>
                                <th>Odebrat</th>
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
                                        <a class="thumbnail pull-left" href="detail/<?php echo $item["nazev"] ?>"> <img class="media-object" src="<?php echo base_url() ?>assets/images/<?php echo $item['fotka']; ?>" style="width: 72px; height: 72px;"> </a>

                                    </div>
                                <td>
                                    <button class="btn btn-primary" onclick="incrementQuantity(<?php echo $item['idPolozka']; ?>)" style="width: 40px; height: 40px; padding: 0; font-size: 16px;">+</button>
                                </td>
                                <td>
                                    <button class="btn btn-primary" onclick="decrementQuantity(<?php echo $item['idPolozka']; ?>)" style="width: 40px; height: 40px; padding: 0; font-size: 16px;">-</button>
                                </td>


                                <td>
                                    <a class="prodName" href="<?php echo base_url('detail/' . $item['nazev']) ?>"><?php echo $item['nazev']; ?></a>
                                </td>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                    <strong id="quantity"><?php echo $item['quantity']; ?></strong>
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $item['cena'] . "Kč"; ?></strong></td>
                                <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $item['cena'] * $item['quantity']; ?></strong></td>
                                <td class="col-sm-1 col-md-1">
                                    <a type="button" class="btn btn-danger" href="<?php echo site_url('cart/remove/' . $item['idPolozka']); ?>">Odebrat</a>
                                </td>
                            </tr>
                        <?php } ?>

                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>
                                <h3>Cena</h3>
                            </td>
                            <td class="text-right">
                                <h3><span><?php echo $total . "Kč"; ?></span></h3>
                            </td>

                        </tr>
                        <tr>

                            <td><a type="button" class="btn btn-primary" href="<?php echo site_url('hlavni'); ?>">Pokračovat</a></td>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><a type="button" class="btn btn-success" href="<?php echo site_url('createOrder'); ?>">Objednat</a></td>
                        </tr>
                        </tbody>
                    </table>
            </div>
        </div>
        </div>
    <?php endif; ?>