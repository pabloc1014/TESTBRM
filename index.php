<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Expiration Date</th>
      <th scope="col">Product Price</th>
      <th scope="col">Lot Number</th>
      <th scope="col">Quantity</th>
      
    </tr>
  </thead>
  <tbody>
          <?php
          $query = "SELECT * FROM products";
          $products = mysqli_query($conn, $query);    
          $rowcount=0;
          while($row = mysqli_fetch_assoc($products)) { 
          if($row["Quantity"] > 0){
          $rowcount++; ?>
          <tr>
            <td><?php echo $rowcount; ?></td>
            <td><?php echo $row['ProductName']; ?></td>
            <td><?php echo $row['ExpirationDate']; ?></td>
            <td><?php echo $row['ProductPrice']; ?></td>
            <td><?php echo $row['LotNumber']; ?></td>
            <td><?php echo $row['Quantity']; ?></td>
          </tr>
          <?php }} ?>
        </tbody>
</table>
</div>


<?php include('includes/footer.php'); ?>
