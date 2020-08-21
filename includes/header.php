<?php
session_start();
include("functions/fonctions.php");
?>
<?php
if (isset($_GET['art_id'])) {
    $id_Art = $_GET['art_id'];

    $get_art = "SELECT  * FROM t_arts WHERE id_Art ='$id_Art'";

    $run_art = mysqli_query($con, $get_art);
    $row_art = mysqli_fetch_array($run_art);

    $art_cat_id = $row_art['art_cat_id'];
    $titre_Art = $row_art['titre_Art'];
    $art_prix = $row_art['prix_art'];
    $art_desc = $row_art['art_desc'];
    $art_img1 = $row_art['art_img1'];
    $art_img2 = $row_art['art_img2'];
    $art_img3 = $row_art['art_img3'];
    
    $get_a_cat = "SELECT * FROM t_arts_categorie WHERE art_cat_id='$art_cat_id'";
    $run_a_cat = mysqli_query($con, $get_a_cat);
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
    <link rel="stylesheet" href="styles/style-login.css">
</head>

<body>
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="login.php" class="btn btn-success btn-sm">Connexion</a>
                <a href="panier.php"><?php articles(); ?> article dans votre panier | Prix Total:
                    <?php prix_totals(); ?> </a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="enregistrement.php">Enregistrement</a>
                    </li>
                    <li>
                        <a href="login.php">Mon Compte</a>
                    </li>
                    <li>
                        <a href="panier.php">Aller au Panier</a>
                    </li>
                    <li>
                        <a href="checkout.php">
                            <?php
                            if (!isset($_SESSION['client_email'])) {
                                echo "<a href='checkout.php'> Se Connecter </a>";
                            } else {
                                echo "<a href='checkout.php'> Se Deconnecter </a>";
                            }
                            ?>
                        </a>
                    </li>
                </ul>
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
                        <li class="<?php if ($active == 'Accueil') echo "active"; ?>">
                            <a href="index.php">Accueil</a>
                        </li>
                        <li class="<?php if ($active == 'Boutique') echo "active"; ?>">
                            <a href="shop.php">Boutique</a>
                        </li>
                        <li class="<?php if ($active == 'Mon compte') echo "active"; ?>">
                            <?php
                            if (!isset($_SESSION['client_email'])) {
                                echo "<a href='checkout.php'>Mon compte</a>";
                            } else {
                                echo "<a href='customer/mon_compte.php?my_orders'>Mon compte</a>";
                            }

                            ?>
                        </li>
                        <li class="<?php if ($active == 'Panier') echo "active"; ?>">
                            <a href="panier.php">Panier</a>
                        </li>
                        <li class="<?php if ($active == 'Contact-nous') echo "active"; ?>">
                            <a href="contact.php">Contacts</a>
                        </li>
                        <li>
                            <a href="login.php">Connexion</a>
                        </li>
                    </ul>
                </div>
                <a href="panier.php" class="btn navbar-btn btn-primary right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php articles(); ?> article dans votre Panier</span>
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
                                < </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>