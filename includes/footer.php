<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<h4>Pages</h4>
				<ul>
                    <li><a href="panier.php">Carte d'Achat</a></li> 
					<li><a href="contact.php">Contactez-nous</a></li>
					<li><a href="shop.php">Boutique</a></li>
					<li><a href="customer/mon_compte.php">Mon Compte</a></li>
				</ul>
				<h4>Section utilisateur</h4>
				<ul>
                           <?php 
                           if(!isset($_SESSION['client_email'])){     
                             echo "<a href='checkout.php'> Se Connecter </a>";
                           }else{
                              echo "<a href='customer/mon_compte.php?my_orders'>Mon compte</a>";
                           }
                            ?>
					<li><a href="enregistrement.php">S'enregistrer</a></li>
				</ul>

				<hr class="hidden-md hidden-lg hidden-sm">
			</div>
			<div class="com-sm-6 col-md-3">
			<h4>Categories des oeuvres d'arts </h4>

			<ul>
		<?php 
             $get_a_categ = "SELECT * FROM t_arts_categorie";
             $run_a_categ = mysqli_query($con,$get_a_categ);
             while ($row_a_categ=mysqli_fetch_array($run_a_categ)) {
             	$art_cat_id = $row_a_categ['art_cat_id'];
             	$art_cat_titre = $row_a_categ['art_cat_titre'];
             	$art_cat_descr= $row_a_categ['art_cat_descr'];
             	echo "
             	<li>
             	<a href='shop.php?a_cat=$art_cat_id'>
             	$art_cat_titre
             	</a>
             	</li>
             	";
             }
		 ?>
			</ul>

			<hr class="hidden-md hidden-lg">
			</div>
             <div class="col-sm-6 col-md-3">
             	<h4>Rejoignez-nous</h4>
             	<p>
             		<strong>R-Comm-Artistique inc</strong>
             		<br/>WattsApp
             		<br/>+243 971 921 094
             		<strong> chizampenzi01gmail.com</strong>
             	</p>
             	<a href="contact.php">Voir notre Page de Contact</a>
             	<hr class="hidden-md hidden-lg">
             </div>
             <div class="col-sm-6 col-md-3">
             	<h4>Savoir du nouveaux</h4>
             	<p class="text-muted">
             		Ne manquez-pas nos mise a jour des nos publications!
             	</p>
             	<form action="get" method="post">
             		<div  class="input-group">
             			<input type="text" class="form-control" name="email">
             			<span class="input-group-btn">
             				<input type="submit" value="Commenter" class="btn btn-default" >
             			</span>
             		</div>
             	</form>
             	<hr>
             	<h4>
             		Keep In Touch
             	</h4>
             	<p class="social">
             		<a href="#" class="fa fa-facebook"></a>
             		<a href="#" class="fa fa-twitter"></a>
             		<a href="#" class="fa fa-instagram"></a>
             		<a href="#" class="fa fa-google-plus"></a>
             		<a href="#" class="fa fa-envelope"></a>
             	</p>
             </div>
		</div>
	</div>
</div>
<div id="copyright">
	<div class="container">
		<div class="col-dm-6">
			 <p class="pull-left">&copy; 2020 R-Comm-Artistique</p>
		</div>

		<div class="col-dm-6">
			 <p class="pull-right">Theme by: <a href="#">CMMjames</a></p>
		</div>
	</div>
</div>
    