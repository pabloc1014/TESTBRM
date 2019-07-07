<?php include("db.php");
$query = "SELECT ClientId, InvoiceTotal FROM invoice";
$result = mysqli_query($conn, $query);
$rowi = mysqli_fetch_assoc($result);
$ClientId = $rowi["ClientId"];
$queryn = "SELECT ClientName FROM client WHERE ClientId = '$ClientId'";
$resultn = mysqli_query($conn, $queryn);
$rown = mysqli_fetch_assoc($resultn);  
?>
<?php include('includes/header.php'); ?>

<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Client Name</th>
      <th scope="col">Invoice Total</th>
      
    </tr>
  </thead>
  <tbody>
          <?php   
          $rowcount=0;
          while($rowi = mysqli_fetch_assoc($result)) { 
          $rowcount++; ?>
          <tr>
            <td><?php echo $rowcount; ?></td>
            <td><?php echo $rown['ClientName']; ?></td>
            <td><?php echo $rowi['InvoiceTotal']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
</table>
</div>

<?php include('includes/footer.php'); ?>
