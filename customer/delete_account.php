<div class="text-center"><h3> Etes-vous vraiment Sur de vouloir supprimer votre  Compte ?</h3></div>
<center>
<form action="" method="post">
	<input type="submit" name="Oui" value="Oui, Je veux supprimeé" class="btn btn-danger">
	<input type="submit" name="Non" value="Non, Je ne veux pas Supprimé" class="btn btn-primary">
</form>
</center>
<?php 
$u_email = $_SESSION['client_email'];
if (isset($_POST['Oui'])) {	
	$delete_client = "delete from t_clients where client_email='$u_email'";
	$run_detete_client = mysqli_query($con,$delete_client);
	if ($run_detete_client) {
		session_destroy();
		echo "<script>alert('votre compte a été Supprimé Avec Succès')</script>";
		echo "<script>window.open('../index.php','_self'<script>)";
	}
}
if (isset($_POST['Non'])) {
	echo "<script>window.open('./mon_compte.php?my_orders','_self')</script>";	
}
 ?>
