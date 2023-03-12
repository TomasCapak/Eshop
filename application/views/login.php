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
    margin-left: 28%;
}

.form-group {
 margin-bottom:10px;

}

</style>
</head>

<body>



    <div class="container">
<div class="row">
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
<div class="col-md-7">
<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2" style="text-align:center;">Přihlášení</h4>
</header>
<article class="card-body">
<?php echo form_open('loginAuth'); ?>

	 <!-- form-row end.// -->
	<div class="form-group">

		<input type="username" name="identity" class="form-control" placeholder="Username">
	</div> <!-- form-group end.// -->
	 <!-- form-group end.// -->
	
	 <!-- form-row.// -->
	<div class="form-group">

	    <input class="form-control" name="password" type="password" placeholder="Password">
	</div> <!-- form-group end.// -->  
   
    <br></br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block marginleftbutton"> Přihlásit  </button>
    
    </div> <!-- form-group// -->      
    <?php echo form_close(); ?>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Ještě nemáte účet? <a href="registrace">Registrujte se!</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->

</div>
</div> 
<!--container end.//-->

</body>
</html>