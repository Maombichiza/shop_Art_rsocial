<?php
session_start();

if (!isset($_SESSION['client_email'])) {

    echo "<script>window.open(../checkout.php)</script>";
} else {

    include("includes/dbconn.php");
    include("functions/fonctions.php");

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
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <?php
                        if (!isset($_SESSION['client_email'])) {
                            echo "Bienvenue : Utilisateur";
                        } else {
                            echo "Bienvenue: " . $_SESSION['client_email'] . "";
                        }
                        ?>
                </a>
                <a href="checkout.php"><?php articles(); ?> article dans votre panier | Prix Total:
                    <?php prix_totals(); ?> </a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="../enregistrement.php">Enregistrement</a>
                    </li>
                    <li>
                        <a href="../login.php">Mon Compte</a>
                    </li>
                    <li>
                        <a href="../panier.php">Aller au Panier</a>
                    </li>
                    <li>
                        <a href="../checkout.php">
                            <?php
                                if (!isset($_SESSION['client_email'])) {
                                    echo "<a href='checkout.php'> Connexion </a>";
                                } else {
                                    echo "<a href='deconnexion.php'> Deconnexion </a>";
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
                    <img src="images/ecom-store-logo.png" alt="R Commercial Artistique" class="hidden-xs">
                    <img src="images/ecom-store-logo-mobile.png" alt="R Commercial Artistique" class="visible-xs">
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
                            <a href="../index.php">Accueil</a>
                        </li>
                        <li>
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
                    </ul>
                </div>
                <a href="../panier.php" class="btn navbar-btn btn-primary right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php articles(); ?> articles dans votre Panier</span>
                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse"
                        data-target="#search">
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

    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb ">
                    <li>
                        <a href="index.php">Accueil</a>
                    </li>
                    <li>Compte Utilisateur</li>
                </ul>

            </div>

            <div class="col-md-3">

                <?php
                    include("includes/sidebar.php");
                    ?>
            </div>
            <div class="col-md-9">

                <div class="box">
                    <!-- box begin -->

                    <?php
                        if (isset($_GET['my_orders'])) {
                            include("my_orders.php");
                        }
                        ?>
                    <?php
                        if (isset($_GET['pay_offline'])) {

                            include("pay_offline.php");
                        }
                        ?>
                    <?php
                        if (isset($_GET['edit_account'])) {

                            include("edit_account.php");
                        }
                        ?>
                    <?php
                        if (isset($_GET['change_pas'])) {

                            include("change_pas.php");
                        }
                        ?>
                    <?php
                        if (isset($_GET['delete_account'])) {

                            include("delete_account.php");
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

<?php
}
?>