<?php
	 include("../db.php"); 
	
	$ProductId = $_POST['ProductId'];
	
	$query = "SELECT ProductPrice, ExpirationDate, LotNumber FROM products WHERE ProductId = '$ProductId'";
	$result = mysqli_query($conn, $query);
          
	
	while($row = mysqli_fetch_assoc($result)) {
		$html= "<input class='form-control' id='product_price' name='product_price' value='".$row['ProductPrice']."' disabled></textarea>";
		
	}
	
	echo $html;
?>