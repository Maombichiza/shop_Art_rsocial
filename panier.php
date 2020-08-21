
<?php 
   $active='Panier';
  include("includes/header.php");
   ?>
   <div id="content">
     	<div class="container">
     		<div class="col-md-12">
     			<ul class="breadcrumb ">
     				<li>
     				<a href="index.php">Accueil</a>
     				</li>
     				<li>Panier</li>
     			</ul>
   	    </div>

     		<div id="panier" class="col-md-9">
     			<div class="box">
     				<form action="panier.php" method="post" enctype="multipart/form-data">
     					<h1>Panier pour l'achat</h1>
                        <?php 
                        $ip_add = getRealIpUser();
                        $select_panier = "select * from t_panier where ip_add='$ip_add'";
                        $run_panier = mysqli_query($con,$select_panier);
                        $count = mysqli_num_rows($run_panier);
                         ?>
     					<p class="text-muted"> Actuellement vous avez <?php echo $count; ?> Article(s) dans votre Panier</p>
     					<div class="table-responsive"> 

     						<table class="table">
     							<thead>
     								<tr>
     									<th colspan="2">Oeuvre d'art</th>
     									<th >Quantite</th>
     									<th >Prix Unitaire</th>
     									<th >Format</th>
     									<th colspan="1">Supprimer</th>
     									<th colspan="2">Total/Art</th>
     								</tr> 								
     							</thead>
     							<tbody>

                           <?php 
                             $total = 0;
                             while ($row_panier = mysqli_fetch_array($run_panier)) {
                             $id_Art = $row_panier['p_id'];
                             $size = $row_panier['num'];
                             $art_qty = $row_panier['qty'];
                             $get_arts = "select * from t_arts where id_Art='$id_Art'";
                             $run_arts = mysqli_query($con,$get_arts);
                             while ($row_arts = mysqli_fetch_array($run_arts)) {
                             $titre_Art = $row_arts['titre_Art'];
                             $art_img1 = $row_arts['art_img1'];
                             $only_prix = $row_arts['prix_art'];
                             $sub_total = $row_arts['prix_art']*$art_qty;
                             $total += $sub_total;
                             ?>
     								<tr>
     									<td>									
     										<img class="img-responsive" src="admin_area/product_images/<?php echo $art_img1; ?>" alt="product3">
     									</td>
     									<td>
     										<a href="details.php?art_id=<?php echo $id_Art; ?>"><?php echo $titre_Art; ?></a>
     									</td>
     									<td>
     									<?php echo $art_qty; ?>
    									</td>
     									<td>
     										<?php echo $only_prix; ?>$
     									</td>
     									<td>    										
     										<?php echo $size;  ?>
     									</td>
     									<td>
    										<input type="checkbox" name="remove[]" value="<?php echo $id_Art; ?>">
     									</td>
     									<td>    										
     										<?php echo $sub_total; ?>$
     									</td>
     								</tr>
                          <?php    
                               }
                                 } ?>
     							</tbody>
     							<tfoot>
                               <tr>
                               	<td>	
                               		<th colspan="5">Totals</th>
                               		<th colspan="2"><?php echo $total; ?>$</th>
                               	</td>
                            </tr>

     							</tfoot>
     						</table>
     					</div>
     					<div class="box-footer">
     						<div class="pull-left">
     							<a href="shop.php" class="btn btn-default">
     								
                             <i class="fa fa-chevron-left"></i>Continue l'achat !

     							</a>		
     						</div>
     						<div class="pull-left">
     							<button type="submit" name="update" value="update cart" class="btn btn-default">					
                      <i class="fa fa-refresh"></i>Modifier le Panier!
     							</button>
     						<a href="checkout.php" class=" btn btn-primary">Procedure a la Caisse
     							 <i class="fa fa-right"></i>
     						</a>		
     					</div>
     					</div>
     				</form>
     			</div>
                <?php 
                function modifier_panier(){
                    global $con;
                    if (isset($_POST['update'])) {
                        foreach ($_POST['remove'] as $remove_id) {
                           $supprimer_art = "delete from t_panier where p_id='$remove_id'";
                           $run_delete = mysqli_query($con,$supprimer_art);
                           if ($run_delete) { 
                            echo "<script>window.open('panier.php','_self')</script";  
                         }
                        }                       
                   }
                }
                echo @$up_panier = modifier_panier();
                 ?>
     			<div id="row same-height-row">
  <div class="col-md-3 col-sm-6 center-responsive">
    <div class="box same-height headline">
      <h3>  ça aussi peut vous Intéresser </h3>
    </div>
  </div><hr><hr><hr>

  <?php 

    $get_arts = " SELECT * FROM t_arts ORDER by rand() LIMIT 0,3 ";
    $run_arts = mysqli_query($con,$get_arts);
     while ($row_arts = mysqli_fetch_array($run_arts)) {
            $art_id = $row_arts['id_Art'];
            $titre_Art = $row_arts['titre_Art'];
            $prix_art = $row_arts['prix_art'];
            $art_img1 = $row_arts['art_img1'];
           echo "
      <div class='col-md-3 col-sm-6 center-responsive'>
        <div class='product same-height'>
          <a href='details.php?art_id=$art_id'>
            <img class='img-responsive' src='admin_area/product_images/$art_img1' alt='produit1'>
          </a>
          <div class='text'>
            <h3><a href='details.php?art_id=$art_id'>$titre_Art</a></h3>
            <p class='price'>$prix_art $</p>
          </div>
        </div>
   </div> 
 ";
   }
  ?>
      </div>
 </div>
<div class="col-md-3">
	<div id="order-summary" class="boxx">
		<div class="box-header">
			<h5>Message de permession</h5>			 
		</div>
		<p class="text-muted">

			.<table class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<td> Montant Total à payé </td>
							<th><?php echo $total; ?>$</th>					
						</tr>
						<tr>				
							<td> Chargement et Traitement</td>
							<td>0$</td>                   
						</tr>
						<tr>					
							<td>taxe</td>
							<th>0$</th>                 
						</tr>
						<tr>			
							<td class="total">Totals</td>
							<th><?php echo $total; ?>$</th>                
						</tr>				
					</tbody>
				</table>
			</table>
		</p>		
	</div>
</div>
  </div>
 </div
   <?php 
include("includes/footer.php");
 ?>
   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>
</body>
</html>