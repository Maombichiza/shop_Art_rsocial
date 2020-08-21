<div class="text-center"> Modifier votre Mot de Pass</div>
<form action="" method="post" enctype="multpart/form-data">
	<div class="form-group">
		<label>Ancien Mot de pass: </label> 
		<input type="text" name="old_pass" class="form-control" required>
	</div>

	<div class="form-group">
		<label>Nouveau Mogt de Pass: </label>
		<input type="text" name="new_pass" class="form-control" required>
	</div>

	<div class="form-group">
		<label>Confirmer votre nouveau mot de Pass: </label>
		<input type="text" name="new_pass_again" class="form-control" required>
	</div>
	
	<div class="text-center">
		<button type="submit" name="submit" class="btn btn-primary">
			<i class="fa fa-user-md"></i>  Modifier Maintenant
		</button>
	</div>
</form>

<?php 
if (isset($_POST['submit'])) {
	$u_email = $_SESSION['client_email'];
	$u_old_pass = $_POST['old_pass'];
	$u_new_pass = $_POST['new_pass'];
	$u_new_pass_again = $_POST['new_pass_again'];
	$sel_u_old_pass = "select * from t_clients where client_password='$u_old_pass'";
	$run_u_old_pass = mysqli_query($con,$sel_u_old_pass);
	$check_u_old_pass = mysqli_fetch_array($run_u_old_pass);
	if ($check_u_old_pass==0) {
		echo "<script>alert('Desolé, ton encien mot de pass n'est pas valide Essaie encore Svp!!!)</script>";
		exit();
	}
	if ($u_new_pass!=$u_new_pass_again) {		
		echo "<script>alert('Les deux Nouveau mot de pass ne concorde pas svp veillez verifier!!!')</script>";
		exit();
	}
	$update_u_pass = "update t_clients set client_password='$u_new_pass' where client_email='$u_email'";
	$run_u_pass = mysqli_query($con,$update_u_pass);
	if ($run_u_pass) {		
		echo "<script>alert('Votre Mot de Pass à été Modifier avec Succès')</script>";
		echo "<script>window.open('mom_compte.php?my_orders','_self')</script>";
	}
}
 ?>