<style>



.btnn {

    width: 200px;
    height: 75px;
    text-align: center;
    margin-top: 15px;

}
.divbtn {
    justify-content: center;
}

.card-product:after {
    content: "";
    display: table;
    clear: both;
    visibility: hidden; }
  .card-product .price-new, .card-product .price {
    margin-right: 5px; }
  .card-product .price-old {
    color: #999; }
  .card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center; }
    .card-product .img-wrap img {
      max-height: 100%;
      max-width: 100%;
      object-fit: cover; }
      
      .card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee; }
  .card-product .action-wrap {
    padding-top: 4px;
    margin-top: 4px; }
  .card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee; }
  .card-product .title {
    margin-top: 0; }
  .button {
    background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

    }

    .price {
      margin-top: 10px;

    }
.container {
    margin-top: 20px;
}




</style>
<html>
<head>



<!------ Include the above in your HEAD tag ---------->
  </head>
  <body>
<!-- 
  <a href="#" class="button" role="button">Link Button</a> -->
  <div class="row">
            <div class="col-lg-12">

                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btnn btn-default">Default</button>
                    <button type="button" class="btn btnn btn-primary">Primary</button>
                    <button type="button" class="btn btnn btn-success">Success</button>
                    <button type="button" class="btn btnn btn-info">Info</button>
                    <button type="button" class="btn btnn btn-warning">Warning</button>
                    <button type="button" class="btn btnn btn-danger">Danger</button>
                    <button type="button" class="btn btnn btn-danger">Danger</button>
                    <button type="button" class="btn btnn btn-danger">Danger</button>
                    <button type="button" class="btn btnn btn-danger">Danger</button>
                    <button type="button" class="btn btnn btn-danger divbtn">Danger</button>

                </div>


                </div >
</div>

<div class="container">
<div class="row">

<?php 
foreach ($polozky as $row) {
?>                  
 <div class="col-md-3"> 
	<figure class="card card-product">
		<div class="img-wrap"> 
			<img src="<?php echo $row['fotka']?>">
		</div>
		<figcaption class="info-wrap">
			<h6 class="title text-dots"><a href="#"><?php echo $row['nazev']?></a></h6><p><?php echo $row['nazevKategorie']?></p>
      
            <p><?php echo $row['popis']?></p>
			<div class="action-wrap">
			

				<div class="price-wrap h5">
                    
					<span class="price-new marginleftprice"><?php echo $row['cena'] ?> CZK</span>
					<button href="#" class="btn btn-primary btn-sm float-right marginleftbutton"> Order </a>
					<!-- <del class="price-old">$1980</del> -->
				</div> <!-- price-wrap.// -->
			</div> <!-- action-wrap -->
		</figcaption>
	</figure> <!-- card // -->
  </div><!-- col // -->

<?php 
}
?>
</div></div>

<?php echo var_dump($polozky);?>


 
  </body>
</html>