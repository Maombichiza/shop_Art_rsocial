<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<?php 
		$client_session = $_SESSION['client_email'];
		$get_client = "select * from t_clients where client_email = '$client_session'";
		$run_client = mysqli_query($con,$get_client);
		$row_client = mysqli_fetch_array($run_client);
		$client_image = $row_client['client_photo'];
		$client_nom = $row_client['client_nom'];
		if (!isset($_SESSION['client_email'])) {
		}else{
			echo "
			<div class='imageprofile'>
			<center>
			<img src='customer_images/$client_image' class='img_responsive' >
			</center>
			</div>
			<br/>
			<h3 class='panel_title' align=center>
			Nom: $client_nom
			";
		}
		 ?>	
	</div>
	<div class="panel-body " >
		<ul class="nav-pills nav-stacked nav">
			<li class="<?php if(isset($GET['my_orders'])){ echo "active" ; } ?>">
				<a href="mon_compte.php?my_orders">
					<i class="fa fa-list"></i>  Mes Ordres
				</a>

			</li>
			<li class="<?php if(isset($GET['pay_offline'])){ echo "active" ; } ?>">
				<a href="mon_compte.php?pay_offline">
					<i class="fa fa-bolt"></i>  Payer Hors Ligne
				</a>
			</li>
			<li class="<?php if(isset($GET['edit_account'])){echo "active" ; } ?>">
				<a href="mon_compte.php?edit_account">
					<i class="fa fa-pencil"></i>  Mofidier le Compte
				</a>
			</li>
			<li class="<?php if(isset($GET['change_pas'])){echo "active" ; } ?>">
				<a href="mon_compte.php?change_pas">
					<i class="fa fa-user"></i>  Changer Mot de Pass
				</a>
			</li>
			<li class="<?php if(isset($GET['delete_account'])){echo "active" ; } ?>">
				<a href="mon_compte.php?delete_account">
					<i class="fa fa-trash-o"></i>  Supprimer le Compte
				</a>
			</li>
			<li >
				<a href="deconnexion.php">
					<i class="fa fa-sign-out">Deconnexion</i>  
				</a>
			</li>						
		</ul>		
	</div>
</div>