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
     				<li>Boutique</li>
           <li>   
              <a href="shop.php?art_categ<?php echo $art_cat_id; ?>"><?php echo $art_cat_titre; ?></a>
            </li>
            <li> <?php echo $titre_Art; ?></li>
            </li>
     			</ul>   			
     		</div> 
     		<div class="col-md-3">
  <?php 
include("includes/sidebar.php");
 ?>
     	</div>
 <div class="col-md-9 ">
  <div id="productMain" class="row">
    <div class="col-sm-6">
      <div id="mainImage">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" >
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>    
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <center><img class="img-responsive" src="admin_area/product_images/<?php echo $art_img1; ?>" alt="Art_a"></center>   
            </div>
            <div class="item">
              <center><img class="img-responsive" src="admin_area/product_images/<?php echo $art_img2; ?>" alt="Art_a1"></center>  
            </div>
             <div class="item">
              <center><img class="img-responsive" src="admin_area/product_images/<?php echo $art_img3; ?>" alt="Art_a2"></center>  
            </div>
          </div>
          <a href="#"class="left carousel-control" data-slide="prev" >
          <spa class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Retour</span>
          </a>
          <a href="#"class="right carousel-control" data-slide="next" >
          <spa class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Retour</span>
          </a>
      </div>    
      </div>
    </div>
    <div class="col-sm-6">
      <div class="box">
        <h1 class="text-center"><?php echo $titre_Art ?></h1>
        <?php ajouter_panier(); ?>
        <form action="details.php?ajouter_panier=<?php echo $id_Art; ?>" class="form-horizontal" method="post">
          <div class="form-group">
            <label for="" class="col-md-5 control-label">Spécifier la Quantité</label>
            <div class="col-md-7">
              <select name="product_qty" id="product_qty" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-5 control-label">Cadrage</label>
              <div class="col-md-7">
                <select name="product_size" class="form-control" required oninput="setCustomValidity('')"
                oninvalid="setCustomValidity('Vous devez specifier le format de l Art svp!!!')">
                <option disabled selected>Format de d'Art  </option>
                <option> 152px </option>
                <option> 550px</option>
                <option> 1000px </option>
                <option> 1800px </option>
                </select>
              </div>
          </div>
          <p class="price"><?php echo $art_prix; ?> $</p>
          <p class="text-center button"><button class="btn btn-primary fa fa-shopping-cart"> Mettre dans le Panier</button></p>
        </form>
      </div>
      <div class="row" id="thumbs">
        <div class="col-xs-4">
          <a  data-target="#myCarousel" data-slide-to="0" href="#" class="thumb" >
            <img src="admin_area/product_images/<?php echo $art_img1; ?>" alt="Art_a"  class="img-responsive" >
          </a>
        </div>
        <div class="col-xs-4">
          <a  data-target="#myCarousel" data-slide-to="2" href="#" class="thumb" >
            <img src="admin_area/product_images/<?php echo $art_img2; ?>" alt="Art_a1"  class="img-responsive" >
          </a>
        </div>
        <div class="col-xs-4">
           <a  data-target="#myCarousel" data-slide-to="1" href="#" class="thumb" >
            <img src="admin_area/product_images/<?php echo $art_img3; ?>" alt="Art_a2"  class="img-responsive" >
          </a>
        </div>

      </div>
    </div>
  </div>
  <div class="box" id="details">
    <h4>Details de l'Art</h4>
    <p> 
     <?php echo "$art_desc"; ?>
    </p><br><br>       
    <hr>
  </div>
        <div id="row same-height-row">
            <div class="col-md-4 col-sm-6">
                <div class="box same-height headline">
                   <h3>Vous pouvez Aimer</h3>
                </div>
             </div>

             <?php 
             $get_arts = "SELECT * FROM t_arts ORDER BY 1 DESC LIMIT 0,3";
             $run_arts = mysqli_query($con,$get_arts);
             while ($row_arts=mysqli_fetch_array($run_arts)) {
              $art_id = $row_arts['id_Art'];
               $titre_Art = $row_arts['titre_Art'];
               $art_img1 = $row_arts['art_img1'];
               $prix_art = $row_arts['prix_art'];
               echo "
                 <div class='col-md-3 col-sm-6 center-responsive'>
                   <div class='product same-height' >
                       <a href='details.php?art_id=$art_id'>
                       <img class='img-responsive' src='admin_area/product_images/$art_img1'>
                       </a>
                       <div class='text'>
                         <h3> <a href='details.php?art_id=$art_id'> $titre_Art </a></h3>
                         <p class='price'> $prix_art $ </p>
                         </div>
                       </div>
                </div>
              ";
            }
          ?>
     </div>
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
