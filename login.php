<!DOCTYPE html>
<?php
include('includes/connxion_pdo.php');
session_start();
$message = '';

if (isset($_SESSION['users_id'])) {
    header('location:index2.php');
}

if (isset($_POST['login'])) {
    $query = "SELECT * FROM tb_login WHERE log_email=:log_email";
    $statement = $conn->prepare($query);
    $statement->execute(array(':log_email' => $_POST['u_email']));
    $count = $statement->rowCount();
    if ($count > 0) {
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            if ($_POST['u_pass'] == $row['log_password']) {
                $_SESSION['users_id'] = $row['id_log'];
                $_SESSION['user_name'] = $row['log_nom'];
                $_SESSION['user_email'] = $row['log_email'];
                $_SESSION['user_photo'] = $row['log_photo'];
                $subquery = "INSERT INTO tb_login_details (ref_user) VALUES ('" . $row['id_log'] . "')";
                $statement = $conn->prepare($subquery);
                $statement->execute();
                $_SESSION['login_detail_id'] = $conn->lastInsertId();
                header('location:index2.php');
            } else {
                $message = '<label>Mot de passe Incorrect.</label>';
            }
        }
    } else {
        $message = "<label>Nom d'utilisateur incorrect.</label>";
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P-Shop-Art | Login</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style-login.css">
</head>

<body>
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">Create Account</a>
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

    <div id="content">
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="box-header">
                        <h2 id="login-title">Connectez-vous Ici</h2>
                        <p class="text-danger"> <?php echo $message; ?> </p>
                    </div>
                    <form method="post" action="#">
                        <div class="form-group">
                            <label>E-mail</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="u_email" autocomplete="off" type="text" class="form-control" id="bartxblogin" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input name="u_pass" type="password" class="form-control" required />
                            </div>
                        </div>
                        <div class="text-center">
                            <button name="login" class="btn btn-primary">
                                <i class="fa fa-sign-in"></i> Connexion
                            </button>
                        </div>
                    </form>
                    <div class="btn-action">
                        <a href="enregistrement.php">Mot de Passe Oubié ?</a>
                        <a href="enregistrement.php">Pas de Compte ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <li><a href='checkout.php'> Se Connecter </a></li>
                        <li><a href='customer/mon_compte.php?my_orders'>Mon compte</a></li>
                        <li><a href="enregistrement.php">S'enregistrer</a></li>
                    </ul>
                    <hr class="hidden-md hidden-lg hidden-sm">
                </div>
                <div class="col-sm-6 col-md-3">
                    <h4>Rejoignez-nous</h4>
                    <p>
                        <strong>R-Comm-Artistique inc</strong>
                        <br />WattsApp
                        <br />+243 971 921 094
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
                        <div class="input-group">
                            <input type="text" class="form-control" name="email">
                            <span class="input-group-btn">
                                <input type="submit" value="Commenter" class="btn btn-default">
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
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>

</html>