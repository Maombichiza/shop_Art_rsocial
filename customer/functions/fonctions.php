<?php 

$con = mysqli_connect("localhost","root","","db_commerceart");


// begin getRealIpUser fnctions///
function getRealIpUser(){
	switch (true) {

		case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
		case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
		case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
			
			default : return $_SERVER['REMOTE_ADDR']; 
	
	}
}
// finish getRealIpUser  fnctions///
// begin ajouter_panier fnctions///
function ajouter_panier(){

	global $con;

	if (isset($_GET['ajouter_panier'])) {
		
		$ip_add = getRealIpUser();

		$p_id = $_GET['ajouter_panier'];

		$product_qty = $_POST['product_qty']; 

		$product_size = $_POST['product_size'];

		$check_product = "select * from  t_panier where ip_add='$ip_add' AND p_id='$p_id'" ;

		$run_check = mysqli_query($con,$check_product);

		if(mysqli_num_rows($run_check)>0){

			echo "<script>alert('Cette oeuvre est deja ajouter dans le panier')</script>";

			echo "<script>window.open('details.php?art_id=$p_id','_self')</script>";
			
		}else{

			$query = "insert into t_panier (p_id,ip_add,qty,num) values ('$p_id','$ip_add','$product_qty','$product_size')";

			$run_query = mysqli_query($con,$query);

			echo "<script>window.open('details.php?art_id=$p_id','_self')</script>";


		}
	}


}
// finish ajouter_panier fnctions///


// begin getArt///

function getArt(){
	global $con;
	$get_arts = "select * from t_arts order by 1 DESC LIMIT 0,8";

	$run_arts = mysqli_query($con,$get_arts);

	while ($row_arts=mysqli_fetch_array($run_arts)) {

		$art_id = $row_arts['id_Art'];

		$art_titre =$row_arts['titre_Art'];

		$prix_art = $row_arts['prix_art'];
		
		$art_img1 = $row_arts['art_img1'];

		echo "

		<div class='col-md-4 col-sm-6 single'>
		   <div class='product'>
		   <a href='details.php?art_id=$art_id'>

		   <img class='img_responsive'  src='admin_area/product_images/$art_img1'>

		   </a>

		   <div class='text'>

		   <h3>

		      <a href='details.php?art_id=$art_id'>

		        $art_titre

		       </a>

		   </h3>

		   <p class='price'>

		   $prix_art $

		   </p>

		   <p class='button'>

		    <a class='btn btn-default' href='details.php?art_id=$art_id'>

		        Voir les Details

		       </a>
		         <a class='btn btn-primary' href='details.php?art_id=$art_id'>

		        <i class='fa fa-shopping_cart'></i> Ajouter dans le Panier

		       </a>

		       </p>

		     </div>

		   </div>

		</div>
      ";
		
	}

}

// end getArt///

// begin getAcateg///
function getAcateg(){
	global $con;
	$get_a_cats = "select * from t_arts_categorie";

	$run_a_cats = mysqli_query($con,$get_a_cats);

	while ($row_a_cats=mysqli_fetch_array($run_a_cats)) {
		$art_cat_id = $row_a_cats['art_cat_id'];
		$art_cat_titre = $row_a_cats['art_cat_titre'];

		echo "

		<li>

		<a href='shop.php?art_categ=$art_cat_id'>$art_cat_titre</a>

		</li>

		";
	}

}
// finish gettAcateg///

 // begin getcateg///
function getCateg(){
	global $con;
	$get_categ = "select * from categories";

	$run_categ = mysqli_query($con,$get_categ);

	while ($row_categ=mysqli_fetch_array($run_categ)) {
		$cat_id = $row_categ['cat_id'];
		$cat_titre = $row_categ['cat_titre'];

		echo "

		<li>

		<a href='shop.php?categ'>$cat_titre</a>

		</li>



		";
	}

}
/// finish getcateg///


/// begin getAcatArt ///

  function getAcatArt(){

  	  global $con;

  	  if (isset($_GET['art_categ'])) {
 
     $art_cat_id = ($_GET['art_categ']);

     $get_a_cat =  "select * from t_arts_categorie where art_cat_id='$art_cat_id'";

     $run_a_cat = mysqli_query($con,$get_a_cat);

     $row_a_cat = mysqli_fetch_array($run_a_cat);

     $art_cat_titre = $row_a_cat['art_cat_titre'];

     $art_cat_descr = $row_a_cat['art_cat_descr'];

     $run_a_cat = mysqli_query($con,$get_a_cat);


     $get_arts =  "select * from t_arts where art_cat_id='$art_cat_id'";
     
          $run_arts = mysqli_query($con,$get_arts);

          $count = mysqli_num_rows($run_arts);

             if ($count==0) {

             	echo "

             	<div class='box'>

             	<h1> Aucune Oeuvre d'Art trouver dans cette Categorie</h1>


             	</div>


             	";

             	}else{

             		echo "

             		<div class='box'

             		<h1>  $art_cat_titre </h1>

             		<p> $art_cat_descr </p>

             	
             		</div>


             		";

             }

               while ($row_arts=mysqli_fetch_array($run_arts)) {

               $art_id = $row_arts['id_Art'];

		       $art_titre =$row_arts['titre_Art'];

		       $prix_art = $row_arts['prix_art'];
		
		       $art_img1 = $row_arts['art_img1'];



		echo "


		  <div class='col-md-4 col-sm-6 center-responsive'>
		   <div class='product'>
		   <a href='details.php?art_id=$art_id'>

		   <img class='img_responsive'  src='admin_area/product_images/$art_img1'>

		   </a>

		   <div class='text'>

		   <h3>

		      <a href='details.php?art_id=$art_id'>

		        $art_titre

		       </a>

		   </h3>

		   <p class='price'>

		   $prix_art $

		   </p>

		   <p class='button'>

		    <a class='btn btn-default' href='details.php?art_id=$art_id'> Voir les Details</a>
		         <a class='btn btn-primary' href='details.php?art_id=$art_id'>

		        <i class='fa fa-shopping_cart'></i> Ajouter dans le Panier</a>

		       </p>

		       </div>

		     </div>

		  </div>

		";

             }
       }

  }


/// finish getAcatArt ///


  ///  begin getcatoeuvreArt ///
 function getcatoeuvreArt(){

 	global $con;

 	if(isset($_GET['categ'])){

 		$cat_id = $_GET['categ'];

 		$get_categ = "select * from categories where cat_id='$cat_id' LIMIT 0,6";

 		$run_categ = mysqli_query($con,$get_categ);

 		$row_categ = mysqli_fetch_array($run_categ);

 		$cat_titre = $row_categ['cat_titre'];

 		$cat_descr = $row_categ['cat_descr'];

 		$get_categ = "select * from t_arts where id_cat='$cat_id'";

 		$run_arts = mysqli_query($con,$get_categ);


 		$count = mysqli_num_rows($run_arts);


 		if ($count==0) {


 			echo "

                <div class='box'>

                 <h1> Aucune Oeuvre d'art trouver en present dans cette categorie</h1>


                 </div>

 			";
 		}else{


 			echo "


 			 <div class='box'>

 			    <h1> $cat_titre </h1>

 			    <p>  $cat_descr  </p>

 			 </div>


 			";
 		}
 			while ($row_arts=mysqli_fetch_array($run_arts)) {

               $art_id = $row_arts['id_Art'];

		       $art_titre =$row_arts['titre_Art'];

		       $prix_art = $row_arts['prix_art'];

		       $art_desc =$row_arts['art_desc'];
		
		       $art_img1 = $row_arts['art_img1'];


 			echo "

                <div class='col-md-4 col-sm-6 center-responsive'>

                  <div class='product'>
                    <a href='details.php?art_id=$art_id'> 

                     <img class='img-responsive'src='admin_area/product_images/$art_img1'>

                     </img>


                     </a>

                     <div class='text'>
                      <h3>
                          <a href='details.php?art_id=$art_id'>$art_titre</a>

                      </h3>
                      <p class='price'>

                        $prix_art

                      </p>

                      <p class='buttons'>

                      <a class='btn btn-default' href='details.php?art_id=$art_id'>Voir les details</a>
                      <a class='btn btn-primary' href='details.php?art_id=$art_id'>
                       <i class='fa fa-shopping-cart'></i>Ajouter au Panier</a>

                      </p>

                     </div>


                  </div>

                </div>


 			";

 			
 			
 		}



 	}



 }

  /// finish getcatoeuvreArt ///


  /// begin articles function ///

 function articles(){

   global $con;

   $ip_add = getRealIpUser();

   $get_articles = "select * from t_panier where ip_add='$ip_add'";

   $run_articles = mysqli_query($con,$get_articles);

   $count_articles  = mysqli_num_rows($run_articles);

   echo $count_articles;

 }
  /// finish articles function  ///

  /// gegin prix_total function  ///
function prix_totals(){

	global $con;

	$ip_add = getRealIpUser();

	$total = 0;

	$select_panier = "select * from t_panier where ip_add='$ip_add'";

	$run_panier= mysqli_query($con,$select_panier);

	while($record=mysqli_fetch_array($run_panier)){

		$ar_id = $record['p_id'];

		$ar_qty = $record['qty'];

		$get_prix = "select * from t_arts where id_Art='$ar_id'";

		$run_prix = mysqli_query($con,$get_prix);

		while ($row_prix=mysqli_fetch_array($run_prix)) {

			$sub_total = $row_prix['prix_art']*$ar_qty;

            $total += $sub_total;
			
		}
	}


	echo $total . "$";

}
  /// finish prix_total function  ///
 ?>