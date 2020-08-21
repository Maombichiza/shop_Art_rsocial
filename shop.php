
<?php 
   $active='Boutique';
  include("includes/header.php");
  include("includes/dbconn.php");
   ?>
   <div id="content">
     	<div class="container">
     		<div class="col-md-12">
     			<ul class="breadcrumb ">
     				<li>
     				<a href="index.php">Accueil</a>
     				</li>
     				<li>Boutique</li>
     			</ul>
     		</div>

     		<div class="col-md-3">
  <?php 
include("includes/sidebar.php");
 ?>
 	</div>

     		<div class="col-md-9">
          <?php  
          if (!isset($_GET['art_categ'])) {
           if (!isset($_GET['art_categ'])) {
             echo"
     			    <div class='box'><!-- box begin -->
     			     	<h2 class='text-center'>Boutique</h2>
     				      <p>Bienvenu dans notre Boutique en Ligne genre Galerie des ouevres d'arts, ici vous Pouvez voir nos oeuvres d'arts disponibles.</p>
     			     </div>
              ";
             }
          }
          ?>
     		 <div class="row">
          <?php 
           if (!isset($_GET['art_categ'])) {
           if (!isset($_GET['categ'])) {
           $per_page=6;
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
              }else{
                $page=1;
                }      
              $start_from = ($page-1) * $per_page;
              $get_arts = "SELECT * FROM t_arts ORDER BY 1 DESC LIMIT $start_from,$per_page ";
              $run_arts = mysqli_query($con,$get_arts);
              while ($row_arts= mysqli_fetch_array($run_arts)) {
                $art_id = $row_arts['id_Art'];
                $art_titre =$row_arts['titre_Art'];
                $prix_art = $row_arts['prix_art'];
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
                        $prix_art$
                      </p>
                      <p class='buttons'>
                      <a class='btn btn-default' href='details.php?art_id=$art_id'> Voir details</a>
                      <a class='btn btn-primary' href='details.php?art_id=$art_id'>
                       <i class='fa fa-shopping-cart'></i>Ajouter Panier</a>
                      </p>
                     </div>
                  </div>
                </div>
                ";              
            }
           ?>
         </div>
       
     <center>
     	<ul class="pagination">
        <?php 
        $query = "select * from t_arts";
         $result = mysqli_query($con,$query);
         $total_records = mysqli_num_rows($result);
         $total_pages = ceil($total_records / $per_page);
             echo "
             <li>
               <a href='shop.php?page=1'>".'Premier Page'."</a> 
              </li>
             ";
             for ($i=1; $i <= $total_pages; $i++) { 
              echo "
               <li>
                <a href='shop.php?page=".$i."'> ".$i."</a>
               </li>
              ";              
             };
             echo "
              <li>
                <a href='shop.php?page=$total_pages'> ".'Dernier Page'."</a>
              </li>
           ";
        }
      }
       ?>	
     	</ul>
     </center>                 
      <?php
       getAcatArt(); 
       getcatoeuvreArt();
      ?>   
   </div>
  </div>
 </div>
   <?php 
include("includes/footer.php");
 ?>
   <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>