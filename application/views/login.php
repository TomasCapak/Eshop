<html>
<!------ Include the above in your HEAD tag ---------->
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<style>
.card-body {
    border-radius: 10px;

}
.card {
    margin-left: auto;
    margin-top: 100px;
    width: 300px;
    border-radius: 10px;

}
.marginleftbutton{
    margin-left: 35%;
}

</style>
</head>

<body>



    <div class="container">
<div class="row">
<div class="col-md-7">
<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2">Log In</h4>
</header>
<article class="card-body">
<form>

	 <!-- form-row end.// -->
	<div class="form-group">

		<input type="username" name="username" class="form-control" placeholder="Username">
	</div> <!-- form-group end.// -->
	 <!-- form-group end.// -->
	
	 <!-- form-row.// -->
	<div class="form-group">

	    <input class="form-control" name="password" type="password" placeholder="Password">
	</div> <!-- form-group end.// -->  
   
    <br></br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block marginleftbutton"> Login  </button>
    
    </div> <!-- form-group// -->      
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Doesnt have an account? <a href="registrace">Register</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->

</div>
</div> 
<!--container end.//-->
<?= var_dump($objednavky)?>
</body>
</html>