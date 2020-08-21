<div id="footer"><!-- #footer begin -->
	<div class="container"><!-- #container begin -->
		<div class="row"><!-- #row begin -->
			<div class="col-sm-6 col-md-3"><!--col-sm-6 col-dm-3 begin -->
				<h4>Pages</h4>
				<ul><!-- ul begin -->
					<li><a href="../panier.php">Carte d'Achat</a></li> 
					<li><a href="../contact.php">Contactez-nous</a></li>
					<li><a href="../shop.php">Boutique</a></li>
					<li><a href="mon_compte.php">Mon Compte</a></li>
				</ul><!-- ul finish -->

				<h4>Section utilisateur</h4>
				   <?php 

                           if(!isset($_SESSION['client_email'])){
                             
                             echo "<a href='../checkout.php'> Se Connecter </a>";

                           }else{

                              echo "<a href='mon_compte.php?my_orders'>Mon compte</a>";

                           }

                            ?>
                              <li>

                         <?php 

                           if(!isset($_SESSION['client_email'])){
                             
                             echo "<a href='../checkout.php'> Se Connecter </a>";

                           }else{

                              echo "<a href='mon_compte.php?edit_account'>Modifier Compte</a>";

                           }

                            ?>
      
                              </li>
                        </ul><!-- ul finish -->


				<hr class="hidden-md hidden-lg hidden-sm">
			</div><!--col-sm-6 col-dm-3  finih -->
			<div class="com-sm-6 col-md-3"><!--com-sm-6 col-dm-3  finih -->
			<h4>Categories des oeuvres d'arts </h4>
			<ul><!-- ul begin -->

		<?php 
             $get_a_categ = "select * from t_arts_categorie";

             $run_a_categ = mysqli_query($con,$get_a_categ);

             while ($row_a_categ=mysqli_fetch_array($run_a_categ)) {
             	$art_cat_id = $row_a_categ['art_cat_id'];
             	$art_cat_titre = $row_a_categ['art_cat_titre'];
             	$art_cat_descr= $row_a_categ['art_cat_descr'];

             	echo "

             	<li>
             	<a href='../shop.php?a_cat=$art_cat_id'>

             	$art_cat_titre

             	</a>
             	</li>

             	";
             }

		 ?>

			</ul><!-- ul finish -->
			<hr class="hidden-md hidden-lg">
			</div><!--com-sm-6 col-dm-3  finih -->
             <div class="col-sm-6 col-md-3"><!--col-sm-6 col-dm-3 begin -->
             	<h4>Rejoignez-nous</h4>
             	<p><!-- p start begin-->
             		<strong>R-Comm-Artistique inc</strong>
             		<br/>WattsApp
             		<br/>+243 971 921 094
             		<strong> chizampenzi01gmail.com</strong>
             		
             	</p><!-- p start  finish-->

             	<a href="../contact.php">Voir notre Page de Contact</a>

             	<hr class="hidden-md hidden-lg">

             </div><!--col-sm-6 col-dm-3  finih -->

             <div class="col-sm-6 col-md-3">

             	<h4>Savoir du nouveaux</h4>
             	<p class="text-muted">
             		Ne manquez-pas nos mise a jour des nos publications!
             	</p>
             	<form action="get" method="post"><!-- form begin -->
             		<div  class="input-group"><!-- input-group begin -->
             			<input type="text" class="form-control" name="email">
             			<span class="input-group-btn"><!-- input-group-btn begin -->
             				<input type="submit" value="Commenter" class="btn btn-default" >
             			</span><!-- input-group-btn finish -->
             		</div><!-- input-group finish -->
             	</form><!-- form finih -->
             	<hr>
             	<h4>
             		Keep In Touch
             	</h4>
             	<p class="social">
             		<a href="../#" class="fa fa-facebook"></a>
             		<a href="../#" class="fa fa-twitter"></a>
             		<a href="../#" class="fa fa-instagram"></a>
             		<a href="../#" class="fa fa-google-plus"></a>
             		<a href="../#" class="fa fa-envelope"></a>
             	</p>

             </div>
             
		</div><!-- #row finih -->
	</div><!-- #conatainer finih -->
</div><!-- #footer finish -->
<div id="copyright"><!-- #copyright begin -->
	<div class="container"><!-- container begin -->
		<div class="col-dm-6"><!-- col-dm-6 begin -->
			 <p class="pull-left">&copy; 2020 R-Comm-Artistique</p>
		</div><!-- col-dm-6 finish -->

		<div class="col-dm-6"><!-- col-dm-6 begin -->
			 <p class="pull-right">Theme by: <a href="#">CMMjames</a></p>
		</div><!-- ccol-dm-6 finish -->
	</div><!-- container finish -->
</div><!-- #copyright finish -->
    