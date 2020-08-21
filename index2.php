<!DOCTYPE html>

<?php

session_start();
include("includes/dbconn.php");
include("functions/fonctions.php");
//include("includes/header.php");
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>P-Shop-Art | Home</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style-login.css">
</head>

<body>
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offer">
                    <img src="profile_images/<?php echo $_SESSION['user_photo']; ?>" width="35" class="img img-circle"
                        alt="User Profile" />
                    <span class="text-success text-uppercase"
                        style="text-decoration: underline;"><b><?php echo $_SESSION['user_name']; ?></b></span>
                    <a href="logout.php" class="text-danger"><small class="text-danger">Déconnexion</small></a>
                </div>
            </div>

        </div>
    </div>
    <div id="navbar" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                    <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
                </a>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>

                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav left">
                        <li>
                            <a href="index.php">Accueil</a>
                        </li>
                        <li>
                            <a href="shop.php">Boutique</a>
                        </li>
                        <li>
                            <a href='checkout.php'>Mon compte</a>
                        </li>
                        <li>
                            <a href="panier.php">Panier</a>
                        </li>
                        <li>
                            <a href="contact.php">Contacts</a>
                        </li>
                        <li>
                            <a href="login.php">Connexion</a>
                        </li>
                        <li>
                            <a href="chats.php">Messages</a>
                        </li>
                    </ul>
                </div>
                <a href="panier.php" class="btn navbar-btn btn-primary right">
                    <i class="fa fa-shopping-cart"></i>
                    <span>article dans votre Panier</span>
                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse"
                        data-target="#search">
                        <span class="sr-only">Rechercher</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="collapse clearfix" id="search">
                    <form method="get" action="results.php" class="navbar-form">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                            <span class="input-group-btn">
                                <button type="submit" name="search" value="Search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="slider">
        <div class="col-md-12">
            <div class="carousel slide" id="myCarousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $get_slides = "SELECT * FROM slider  LIMIT 0,1";
                    $run_slider = mysqli_query($con, $get_slides);
                    while ($row_slides = mysqli_fetch_array($run_slider)) {
                        $slide_name = $row_slides['nom_slide'];
                        $slide_image = $row_slides['image_slide'];
                    }
                    echo "
                         <div class='item active'>
                         <img src='admin_area/slides_images/$slide_image'>
                         </div>
                       ";
                    $get_slides = "SELECT * FROM slider  LIMIT 1,3";
                    $run_slider = mysqli_query($con, $get_slides);
                    while ($row_slides = mysqli_fetch_array($run_slider)) {
                        $slide_name = $row_slides['nom_slide'];
                        $slide_image = $row_slides['image_slide'];
                        echo "
                         <div class='item'>
                         <img src='admin_area/slides_images/$slide_image'>
                         </div>
                         ";
                    }
                    ?>
                </div>
                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Precedent</span>
                </a>
                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </div>
    </div>
    <div id="advantages">
        <div class="container">
            <div class="same-height-row">
                <?php
                $get_boxes = "SELECT * FROM t_box";
                $run_boxes = mysqli_query($con, $get_boxes);
                while ($run_boxes_section = mysqli_fetch_array($run_boxes)) {
                    $box_id = $run_boxes_section['id_box'];
                    $box_titre = $run_boxes_section['titre_box'];
                    $box_desc = $run_boxes_section['desc_box'];
                ?>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3><a href="#"><?php echo $box_titre; ?> </a></h3>
                        <p><?php echo?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div id="hot">
                        <h2>
                            La liste de nos Produits
                        </h2>
                    </div>
        </div>
        <div id="content" class="container">
            <div class="row">
                <?php
                getArt();
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