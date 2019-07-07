<?php include("db.php");
 $query = "SELECT ProductId, ProductName, LotNumber FROM products";
 $result = mysqli_query($conn, $query); 
?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
  <div class="col-md-3"></div>
    <div class="col-md-5">

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>
      
      <div class="card card-body">
        <form action="saveProduct.php" method="POST">
          <div class="form-group">
            <label for="ProductName">Product</label>
            <select name="ProductId" class="form-control">
             <?php while($row = mysqli_fetch_assoc($result)) { ?>  
            <option value="<?php echo $row['ProductId']; ?>"><?php echo $row['ProductName'].' lot '. $row['LotNumber']; ?></option>
            <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="ExpirationDate">Expiration Date</label>
            <input type="date" name="ExpirationDate" class="form-control" id="ExpirationDate" required></textarea>
          </div>
          <div class="form-group">
            <input type="number" name="ProductPrice" class="form-control" placeholder="Product Price" required></textarea>
          </div>
          <div class="form-group">
            <input type="number" name="LotNumber" class="form-control" placeholder="Lot Number" required></textarea>
          </div>
          <div class="form-group">
            <input type="number" name="Quantity" class="form-control" placeholder="Quantity" required></textarea>
          </div>
          <input type="submit" name="saveProduct" class="btn btn-primary btn-block" value="Save Product">
        </form>
      </div>
    </div>
  </div>
</main>
<?php include('includes/footer.php'); ?>
