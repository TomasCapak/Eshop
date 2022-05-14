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
    margin-left: 25%;
}

.displayflex {
	display: flex;	
	justify-content: center;

}
.form-group {
 margin-bottom:10px;

}
</style>
</head>

<body>
<div class="container-fluid">
<div class="row ">
<div class="col-md-7">
<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2" style="text-align:center;">Registrace</h4>
</header>
<article class="card-body">
<form>

	 <!-- form-row end.// -->
	<div class="form-group">

		<input type="username" name="username" class="form-control" placeholder="Uživatelské Jméno">
	</div> <!-- form-group end.// -->
	 <!-- form-group end.// -->
	
	 <!-- form-row.// -->
	<div class="form-group">

	    <input class="form-control" name="password" type="password" placeholder="Nové Heslo">
	</div> <!-- form-group end.// -->  
    <div class="form-group">
	
	    <input class="form-control" name="repeatPassword" type="password" placeholder="Zopakovat Heslo">
	</div>
    <br></br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block marginleftbutton"> Registrovat  </button>
    
    </div> <!-- form-group// -->      
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Již máte účet? <a href="prihlaseni">Přihlašte se!</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->

</body>
</html>
