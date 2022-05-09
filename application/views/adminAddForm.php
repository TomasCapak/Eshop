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

</style>
</head>

<body>
<div class="row">
<div class="col-md-8 marginrightauto">
<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2">Add Item</h4>
</header>
<article class="card-body">
<form>

	 <!-- form-row end.// -->
     <div class="form-group">

	    <input class="form-control" name="photo" type="file" placeholder="Photo">
	</div>
	<div class="form-group ">

		<input type="text" name="name" class="form-control" placeholder="Name">
	</div> <!-- form-group end.// -->
	 <!-- form-group end.// -->
	


	 <!-- form-row.// -->
	<div class="form-group">

	    <textarea class="form-control" name="desc" type="text" placeholder="Description"></textarea>
	</div> <!-- form-group end.// -->  
    <div class="form-group">
	
	    <input class="form-control" name="price" type="number" placeholder="Price">
	</div>


    <div class="form-group ">
            <label for="cars">Category:</label>
            <select id="cars" name="cars">
            <?php foreach ($Kategorie as $row) { ?>        
            <option value="<?php echo $row['nazevKategorie']?>"><?php echo $row['nazevKategorie']?></option>
                    
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
<div class="border-top card-body text-center">Have an account? <a href="prihlaseni">Log In</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->

</body>
</html>