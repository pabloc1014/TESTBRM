<?php
	 include("db.php");
	$Client = $_POST['Client'];
	$Info = $_POST['product'];
	$ProductLot = explode("-", $Info);
	$ProductId = $ProductLot[0];
	$LotNumber = $ProductLot[1];
	$Total = $_POST['Total'];
	$Quantity = $_POST['Quantity'];

	$queryc = "INSERT INTO client(ClientName) VALUES ('$Client')";
	$resultc = mysqli_query($conn, $queryc);
	$ClientId = mysqli_insert_id($conn);
	if($resultc){
		$query = "INSERT INTO invoice (ClientId, ProductId, InvoiceTotal) VALUES ('$ClientId','$ProductId','$Total')";
		$result = mysqli_query($conn, $query);
		
		$queryp = "SELECT Quantity FROM products WHERE ProductId = '$ProductId' && LotNumber = '$LotNumber'";
		$resultp = mysqli_query($conn, $queryp);
		$row = mysqli_fetch_assoc($resultp);
		$NewQ = intval($row["Quantity"]) - intval($Quantity);

		$queryq = "UPDATE products SET Quantity = '$NewQ' WHERE ProductId = '$ProductId' && LotNumber = '$LotNumber'";
		$resultq = mysqli_query($conn, $queryq);
	}

	$_SESSION['message'] = 'Product purchased';
 	$_SESSION['message_type'] = 'success';
  	header('Location: purchase.php');




?>
