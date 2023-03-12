<html>
<head>


</head>
<body>



<div class="container" style="margin-top: 30px">
  <h2>Seznam Objednávek</h2>
  
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
      
        <td><a type="button" href="<?php base_url()?> orderDetail/<?= $row['idObjednavka']  ?>" class="btn btn-primary" style="width:200px; height: 50px; float: right;">Detail</a> </td>

      </tr>
      
      
      <?php
}
?>
    </tbody>
  </table>
</div>
