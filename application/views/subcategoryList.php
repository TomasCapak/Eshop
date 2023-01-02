
<html>
<head>


</head>
<body>



<div class="container" style="margin-top: 30px">
  <h2>Seznam Podkategorií</h2>
  
  
  <?php echo anchor('podkategorie/'.$nadkategorie, 'Zpět', 'class="btn btn-primary btn-sm" style="float: right"'); ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Název Kategorie</th>
      </tr>
      
    </thead>
    <tbody>
    <?php  
foreach ($subcategory as $row) {
?>
      <tr>
        <td><?php echo $row['nazevKategorie'] ?>
    
        
    </td>
    
      <td><a type="button" href="<?php echo base_url("podkategorie/".$row['idKategorie'])?>" class="btn btn-block btnn btn-primary" style="width:200px;height: 50px" >Podkategorie</a></td>

        <td><a type="button" href="<?= base_url('Admin')?>/deleteCategory/<?= $row['idKategorie']?>" class="btn btn-danger btn-sm" style="float: right;">Odstranit</a> </td>

      </tr>
      
      
      <?php
}
?>
    </tbody>
  </table>
</div>




</body>

</html>