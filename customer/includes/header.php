
<?php 
session_start();
include("includes/dbconn.php");
include("functions/fonctions.php");

 ?>

<?php 

   if (isset($_GET['art_id'])) {

       $id_Art = $_GET['art_id'];

       $get_art = "select * from t_arts where id_Art ='$id_Art'";

       $run_art = mysqli_query($con,$get_art);

       $row_art = mysqli_fetch_array($run_art);

       $art_cat_id = $row_art['art_cat_id'];

       $titre_Art = $row_art['titre_Art'];

       $art_prix = $row_art['prix_art'];

       $art_desc = $row_art['art_desc'];

       $art_img1 = $row_art['art_img1'];

       $art_img2 = $row_art['art_img2'];

       $art_img3 = $row_art['art_img3'];

       $get_a_cat = "select * from t_arts_categorie where art_cat_id='$art_cat_id'";

       $run_a_cat = mysqli_query($con,$get_a_cat);

       $row_a_cat = mysqli_fetch_array($run_a_cat);

       $art_cat_titre = $row_a_cat['art_cat_titre'];

   }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>P-Shop-Art</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body> 
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">

                <?php 

               if(!isset($_SESSION['client_email'])){

                echo "Bienvenue : Utilisateur";

               }else{

                echo "Bienvenue: ".$_SESSION['client_email']."";
               }

                ?>

               </a>
               <a href="checkout.php"><?php articles(); ?> article dans votre panier | Prix Total: <?php prix_totals(); ?> </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="../enregistrement.php">Enregistrement</a>
                   </li>
                   <li>
                       <a href="mon_compte.php">Mon Compte</a>
                   </li>
                   <li>
                       <a href="../panier.php">Aller au Panier</a>
                   </li>
                   <li>
                       <a href="../checkout.php">

                 <?php 

               if(!isset($_SESSION['client_email'])) {

                     echo "<a href='checkout.php'> Connexion </a>";

               }else{

                    echo "<a href='deconnexion.php'> Deconnexion </a>";
               }

                ?>

                       </a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->     
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li>
                           <a href="../index.php">Accueil</a>
                       </li>
                       <li >
                           <a href="../shop.php">Boutique</a>
                       </li>
                       <li class="active">
                           <a href="../customer/compte_user.php">Mon compte</a>
                       </li>
                       <li>
                           <a href="../panier.php">Panier</a>
                       </li>
                       <li>
                           <a href="../contact.php">Contact-nous</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="../panier.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php articles(); ?> articles dans votre Panier</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Rechercher</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->      
   </div><!-- navbar navbar-default Finish -->
