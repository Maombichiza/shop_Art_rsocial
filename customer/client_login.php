<div class="box">
    <div class="box-header">
        <center>
            <p class="lead"> As-tu deja un Compte ? </p>

        </center>
    </div>
    <form method="post" action="checkout.php">
        <div class="form-group">
            <label>Adress Mail</label>
            <input name="u_email" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mot de Pass</label>
            <input name="u_pass" type="password" class="form-control" required>
        </div>
        <div class="text-center">
            <button name="login" class="btn btn-primary">
                <i class="fa fa-sign-in">Connexion</i>
            </button>
        </div>
    </form>
    <center>
        <a href="enregistrement.php">
            <h4>Avez_vous pas un Compte...? Cliquer ici pour creer un compte
        </a></h4>
    </center>
</div>
<?php
if (isset($_POST['login'])) {
	$client_email = $_POST['u_email'];
	$client_pass = $_POST['u_pass'];
	$select_client = "select * from t_clients where client_email='$client_email' AND client_password ='$client_pass'";

	$run_client = mysqli_query($con, $select_client);
	$get_ip = getRealIpUser();
	$check_client = mysqli_num_rows($run_client);

	$select_panier = "select * from t_panier where ip_add='$get_ip'";

	$run_panier = mysqli_query($con, $select_panier);
	$check_panier = mysqli_num_rows($run_panier);
	if ($check_client == 0) {
		echo "<script>alert('Ton adress mail ou ton mot de Pass est incorrect')</script>";
		exit();
	}
	if ($check_client == 1 and $check_panier == 0) {
		$_SESSION['client_email'] = $client_email;
		echo "<script>alert('Connexion Reussi')</script>";
		echo "<script>window.open('customer/mon_compte.php?my_orders','_self')</script>";
	} else {
		$_SESSION['client_email'] = $client_email;
		echo "<script>alert('Connexion Reussi')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
}

?>