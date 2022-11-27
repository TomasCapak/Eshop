
<html>
<head>


</head>
<body>



<div class="container" style="margin-top: 30px">
  <h2>Seznam Podkategorií</h2>
  
  <a type="button" href="<?= base_url('categoryList');?>" class="btn btn-primary btn-sm" style="float: right;"> Zpět </a>
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
        <td><?php echo $row['nazevPodkategorie'] ?>
    
        
    </td>
    
      
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