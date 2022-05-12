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

.marginleftbutton{
    margin-left: 35%;
}

.marginleftbutton2{
    margin-left: 36%;
}

.form-contorol2 {

    height: 200px;

}
.form-control {
    margin-top: 5px;
    margin-bottom: 5px;
}

.marginrightbut{
margin-right: 6%;

}
.margintop{
  margin-top:20px;

}
</style>
</head>

<body>

<?php if($this->session->flashdata("status")); ?>
            <div class="alert alert-success margintop">
                <?= $this->session->flashdata("status"); ?>
            </div>



<div class="row">
<div class="col-md-8 marginrightauto">
<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2">Add Item</h4>
</header>
<article class="card-body">
<form action="<?php echo base_url('adminForm');?>" method="post" enctype="multipart/form-data">

	 <!-- form-row end.// -->
     <div class="form-group">

	    <input class="form-control" name="fotka" type="file" placeholder="Photo">
        <p><?php if(isset($error)) { echo $error; } ?></p>
	</div>
	<div class="form-group ">

		<input type="text" name="nazev" class="form-control" placeholder="Name">
	</div> <!-- form-group end.// -->
	 <!-- form-group end.// -->
	


	 <!-- form-row.// -->
	<div class="form-group">

	    <textarea class="form-control" name="popis" type="text" placeholder="Description"></textarea>
	</div> <!-- form-group end.// -->  
    <div class="form-group">
	
	    <input class="form-control" name="cena" type="number" placeholder="Price">
	</div>


    <div class="form-group ">
            <label for="nazevKategorie">Category:</label>
            <select id="nazevKategorie" name="nazevKategorie">
            <?php foreach ($Kategorie as $row) { ?>        
            <option value="<?php echo $row['idKategorie']?>"><?php echo $row['nazevKategorie']?></option>
                    
            <?php   } ?>
                </select>


	</div>
    <br></br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block marginleftbutton"> Submit </button>
    
    </div> <!-- form-group// -->
    
    <div class="form-group">
        <button type="reset" class="btn btn-block marginleftbutton2"> Reset </button>
    
</div>
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center"> <a type="button" class="btn btn-primary marginrightbut" href="<?php echo base_url('admin');?>">BACK</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->

</body>
</html>