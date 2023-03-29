<html lang="cs">

<head>

  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/eternicode/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

</head>

<body>



  <div class="container" style="margin-top: 30px">
    <h2>Seznam Objednávek</h2>

    <form id="ordersByDateForm" method="post" action="<?php echo base_url(); ?>admin/ordersByDate">
      <div class="input-group mb-3">
        <input id="date" type="text" placeholder="Zadejte Datum" class="form-control datepicker" name="date">
        <button type="submit" class="btn btn-primary">Souhrn</button>
      </div>
      <p id="dateError" class="text-danger" style="display: none;">Vyplňte prosím toto pole.</p>
    </form>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Datum</th>
          <th>Stav</th>
        </tr>

      </thead>
      <tbody>
        <?php
        foreach ($orders as $row) {
        ?>
          <tr>
            <td><?php echo $row['idObjednavka'] ?></td>
            <td><?php echo $row['DatumObjednavky'] ?></td>
            <td>
              <?php if ($row['objednavkaAktivni'] == 1) { ?>
                <p style="color: green;">Potvrzena</p>
              <?php } else { ?>
                <p style="color: red;">Zrušena</p>
              <?php } ?>
            </td>
            <td><a type="button" href="<?php base_url() ?> orderDetail/<?= $row['idObjednavka']  ?>" class="btn btn-primary" style="width:200px; height: 50px; float: right;">Detail</a> </td>

          </tr>


        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <script type="text/javascript" src="<?php echo base_url(); ?>vendor/eternicode/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>vendor/eternicode/bootstrap-datepicker/dist/locales/bootstrap-datepicker.cs.min.js"></script>
  <script>
    $(document).ready(function() {
      $.fn.datepicker.defaults.language = 'cs';
      $('#date').datepicker({
        format: 'dd.mm.yyyy',
        autoclose: true,
        language: 'cs'
      });

      // Add custom validation for the datepicker field
      $("#ordersByDateForm").on("submit", function(e) {
        let dateValue = $("#date").val().trim();
        if (dateValue === "") {
          e.preventDefault();
          $("#dateError").show();
        } else {
          $("#dateError").hide();
        }
      });
    });
  </script>

</body>

</html>