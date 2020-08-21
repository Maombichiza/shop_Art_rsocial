
<?php 
$client_session = $_SESSION['client_email'];
$get_client =  "select * from t_clients where client_email='$client_session'";
$run_client = mysqli_query($con,$get_client);
$row_client = mysqli_fetch_array($run_client);
$client_id = $row_client['client_id'];
$client_nom = $row_client['client_nom'];
$client_email = $row_client['client_email'];
$client_pays = $row_client['client_pays'];
$client_ville = $row_client['client_ville'];
$client_contact = $row_client['client_contact'];
$client_address = $row_client['client_adress'];
$client_image = $row_client['client_photo'];
 ?>

<center>Modifier votre Compte</center>
<form action="" method="post" enctype="multpart/form-data">
	<div class="form-group">
		<label>Nom: </label>
		<input type="text" name="u_nom" class="form-control" value="<?php echo $client_nom; ?>" required>
	</div>

	<div class="form-group">
		<label>Adress Mail: </label>
		<input type="text" name="u_email" class="form-control" value="<?php echo $client_email; ?>" required>
	</div>
	<div class="form-group">
		<label>Pays: </label>
		<input type="text" name="u_pays" class="form-control" value=" <?php echo $client_pays; ?>" required>
	</div>
	<div class="form-group">
		<label>Ville: </label>
		<input type="text" name="u_ville" class="form-control" value="<?php echo $client_ville; ?>" required>
	</div>
	<div class="form-group">
		<label>Contact: </label>
		<input type="text" name="u_contact" class="form-control" value="<?php echo $client_contact; ?>" required>
	</div>
	<div class="form-group">
		<label>Adress: </label>
		<input type="text" name="u_adress" class="form-control" value="<?php echo $client_address; ?>"  required>
	</div>
	<div class="form-group">

		<label>Photo de profile: </label>
		<input  name="u_image" type="file" class="form-control form-height-customer" required>
		<img class="img-responsive" src="customer_images/<?php echo $client_image; ?>" alt=" Image Client ">
	</div>
	<div class="text-center">
		<button name="update" class="btn btn-primary">
			<i class="fa fa-user-md"></i> Modifier Maintenant
		</button>
	</div>
</form>
<?php 
if (isset($_POST['update'])) {
	$update_id = $client_id;
	$u_nom = $_POST['u_nom'];
	$u_email = $_POST['u_email'];
	$u_pays = $_POST['u_pays'];
	$u_ville = $_POST['u_ville'];
	$u_adress = $_POST['u_adress'];
	$u_contact = $_POST['u_contact'];
	$p_image = $_FILES['u_image'];
	$u_image_tmp = $_FILES['u_image']['tmp_name'];
	move_uploaded_file($u_image_tmp, "customer_images/$u_image");
	$update_client = " update t_clients set client_nom ='$u_nom', client_email='$u_email', client_pays='$u_pays', client_ville='$u_ville', client_adress='$u_adress', client_contact='$u_contact', client_photo='$p_image' where client_id='$update_id'";
	if ($run_client) {
		echo "<script>alert('$u_nom,Votre ocompte a été modifié avec succès Réconnectez-vous pour en etes sur!!!'></script>";
		echo "<script>window.open('deconnexion.php','_self')</script>";
	}
}
 ?>