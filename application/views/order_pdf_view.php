<html>

<head>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <h2>Souhrn objednávky v pdf</h2>
                <table border="1" cellspacing="0" cellpadding="10" width="100%">
                    <thead>
                        <tr>

                            <th>Název</th>
                            <th>Množství</th>
                            <th class="text-center">Cena</th>
                            <th class="text-center">Celková Cena</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderData as $item) { ?>
                            <tr>

                                <td>
                                    <a href="<?php echo base_url('detail/' . $item['nazev']) ?>"><?php echo $item['nazev']; ?></a>
                                </td>
                                <td class="text-center">
                                    <strong><?php echo $item['pocet']; ?></strong>
                                </td>
                                <td class="text-center"><strong><?php echo $item['cena'] . " CZK"; ?></strong></td>
                                <td class="text-center"><strong><?php echo $item['cena'] * $item['pocet'] . " CZK"; ?></strong></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>