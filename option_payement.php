<div class="box">

	<?php 
	$session_email = $_SESSION['client_email'];
	$select_client  = "select * from t_clients where client_email='$session_email'";
	 $run_client = mysqli_query($con,$select_client);
	 $row_client = mysqli_fetch_array($run_client);
	 $client_id = $row_client['client_id'];
	 ?>
<h1 class="text-center">Options de Payement</h1>
		<p class="lead text-center">	
			<a  href="order.php?u_id=<?php echo $client_id ?>"> Paiement  Hors Ligne</a>
		</p>
		<center>		
			<p class="lead">
				<a href="#">Payement par PayPal
				<img class="img-responsive" src="images/ " alt="Image PayPal">
			</p>
			</a>
		</center>		
</div>
