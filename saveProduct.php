<?php

include('db.php');

if (isset($_POST['saveProduct'])) {
  $ProductId = $_POST['ProductId'];
  $ExpirationDate = $_POST['ExpirationDate'];
  $ProductPrice = $_POST['ProductPrice'];
  $LotNumber = $_POST['LotNumber'];
  $Quantity = $_POST['Quantity'];

  $queryn = "SELECT ProductName FROM products WHERE ProductId = '$ProductId'";
  $resultn = mysqli_query($conn, $queryn);
  $row = mysqli_fetch_assoc($resultn);
  $ProductName = $row["ProductName"];

  $queryp = "SELECT Quantity FROM products WHERE ProductId = '$ProductId' && LotNumber = '$LotNumber' ";
  $resultp = mysqli_query($conn, $queryp);
  if($resultp){
    $row = mysqli_fetch_assoc($resultp);
    $newQ = intval($Quantity) + intval($row["Quantity"]);
    $Quantity = $newQ;

    $query = "UPDATE products SET ExpirationDate = '$ExpirationDate', ProductPrice = '$ProductPrice',
    Quantity = '$Quantity' WHERE ProductId = '$ProductId' && LotNumber = '$LotNumber'";
   
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed1.");
    } 

  }else
  {
    $queryl = "INSERT INTO lot(LotNumber) VALUES ('$LotNumber')";
    $resultl = mysqli_query($conn, $queryl);
    if($resultl)
    {
      $query = "INSERT INTO products(ProductName, ExpirationDate, ProductPrice,
        LotNumber, Quantity) VALUES ('$ProductName', '$ExpirationDate', '$ProductPrice', '$LotNumber', '$Quantity')";
        $result = mysqli_query($conn, $query);
        if(!$result) {
          die("Query Failed.");
        }
    }else{
      die("Query Failed.");
    }
  }

  
  

  $_SESSION['message'] = 'Product delivered';
  $_SESSION['message_type'] = 'success';
  header('Location: deliver.php');

}

?>
