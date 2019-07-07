<?php include("db.php");
$query = "SELECT ProductId, ProductName, LotNumber FROM products";
$result = mysqli_query($conn, $query);  
?>

<?php include('includes/header.php'); ?>
<script src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
			$(document).ready(function(){
				$("#product").change(function () {
					$("#product option:selected").each(function () {
						ProductId = $(this).val();
						$.post("includes/getProductInfo.php", { ProductId: ProductId }, function(data, status){
							$("#ProductPrice").html(data);
						});            
					});
				})
			});
		</script>
		
	</head>
	
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
				<form action="save_purchase.php" method="POST">
				<div class="form-group">
				<label for="Client">Client Name</label>
					<input id="Client" name="Client" class="form-control" required></textarea>
				</div>
				<div class="form-group">
					<label for="ProductName">Product</label>
					<select name="product" id="product" class="form-control">
					<?php while($row = mysqli_fetch_assoc($result)) { ?>  
					<option value="<?php echo $row['ProductId'].'-'.$row['LotNumber']; ?>"><?php echo $row['ProductName'].' lot '.$row['LotNumber']; ?></option>
					<?php } ?>
					</select>
				</div>
				<div id=ProductPrice class="form-group">
				</div>
				<div class="form-group">
					<input type="number" id="Quantity" name="Quantity" class="form-control" placeholder="Quantity" oninput="updateInput()" required></textarea>
				</div>
				<div class="form-group">
					<input id="Total" name="Total" class="form-control" placeholder="Total" ></textarea>
				</div>
				<input type="submit" name="saveProduct" class="btn btn-primary btn-block" value="Save to Preview">
				</form>
			</div>
			</div>
		</div>
	</main>
	<script>
		function updateInput() {
		var cost = document.getElementsByName('Quantity')[0].value;
		var price = document.getElementsByName('product_price')[0].value;
		var totalprice = price * cost;
		console.log(totalprice);
		document.getElementsByName('Total')[0].value = totalprice;
		}
	</script>
<?php include('includes/footer.php'); ?>
