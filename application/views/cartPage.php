<!-- <?php //defined('BASEPATH') or exit('No direct script access allowed'); ?>
<html>
	<head>
		<title>Cart Info</title>
	</head>
	<body>
		<h3>Cart Info</h3>
        <table border="1" cellpadding="2" cellspacing="2">
        	<tr>
        		<th>Id</th>
        		<th>Name</th>
        		<th>Photo</th>
        		<th>Price</th>
        		<th>Quantity</th>
        		<th>Sub Total</th>
        		<th>Action</th>
        	</tr>
        	<?php // foreach ($items as $item) { ?>
        		<tr>
        			<td><?php // echo $item['idPolozka']; ?></td>
        			<td><?php //echo $item['nazev']; ?></td>
        			<td><img src="<?php //echo base_url() ?>assets/images/<?php //echo $item['fotka']; ?>" width="50"></td>
        			<td><?php //echo $item['cena']; ?></td>
        			<td><?php //echo $item['quantity']; ?></td>
        			<td><?php //echo $item['cena'] * $item['quantity']; ?></td>
        			<td align="center">
        				<a href="<?php //echo site_url('cart/remove/'.$item['idPolozka']); ?>">X</a>
        			</td>
        		</tr>
        	<?php //} ?>
        		<tr>
        			<td colspan="6" align="right">Total</td>
        			<td><?php //echo $total; ?></td>
        		</tr>
        </table>
        <br>
        <a href="<?php //echo site_url('hlavni'); ?>">Continue Shopping</a>
	</body>
</html> -->

<!-- <style>
    .media-object {
        margin-right: 20px;


    }

</style>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table ">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="" style="width: 72px; height: 72px;"> </a>
                            <h5 href="#">Product name</h5>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                    <tr>
                        <td class="col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="" style="width: 72px; height: 72px;"> </a>
                            
                                <h5 href="#">Product name</h5>
                                
                                
                            
                        </div></td>
                        <td class="col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="2">
                        </td>
                        <td class="col-md-1 text-center"><strong>$4.99</strong></td>
                        <td class="col-md-1 text-center"><strong>$9.98</strong></td>
                        <td class="col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                    </tr>
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div> -->
