<!DOCTYPE html>
<?php
include("includes/connxion_pdo.php");
include("functions/fonctions.php");

$message = '';
$classe = '';
if (isset($_POST['create'])) {
    $profile = time() . '_' . $_FILES['u_image']['name'];
    $target = 'profile_images/' . $profile;
    if (move_uploaded_file($_FILES['u_image']['tmp_name'], $target)) {
        $query = 'INSERT INTO tb_login (log_nom, log_email, log_password, log_pays, log_ville, log_contact, log_adresse, log_photo) 
            VALUES (:log_nom, :log_email, :log_password, :log_pays, :log_ville, :log_contact, :log_adresse, :log_photo)';
        $statement = $conn->prepare($query);
        if ($statement->execute(array(':log_nom' => $_POST['u_name'], ':log_email' => $_POST['u_email'], ':log_password' => $_POST['u_pass'], ':log_pays' => $_POST['u_pays'], ':log_ville' => $_POST['u_ville'], ':log_contact' => $_POST['u_contacts'], ':log_adresse' => $_POST['u_adress'], ':log_photo' => $profile))) {
            $classe = 'alert-default text-success';
            $message = 'Compte créé avec succès !!!';
        } else {
            $classe = 'alert-default text-danger';
            $message = 'Echec';
        }
    } else {
        $classe = 'alert-danger';
        $message = 'Failed to upload image.';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P-Shop-Art | create Account</title>
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
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header">
                            <h2 id="login-title">Créer un Compte</h2> <span class="<?php echo $classe; ?>">
                                <?php echo $message; ?> </span>
                        </div>
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" autocomplete="off" class="form-control" name="u_name"
                                            required="" />
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" autocomplete="off" class="form-control" name="u_email"
                                            required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mot de passe</label>
                                        <input type="password" class="form-control" name="u_pass" id="u_pass"
                                            required="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pays</label>
                                        <select name="u_pays" id="u_pays" class="form-control">
                                            <optgroup label="Afrique Centrale">
                                                <option value="République Démocratique du Congo">République Démocratique
                                                    du
                                                    Congo</option>
                                                <option value="République Central Afrique">République Central Afrique
                                                </option>
                                                <option value="Congo Brazzaville">Congo Brazzaville</option>
                                            </optgroup>
                                            <optgroup label="Afriquer de L'Est">
                                                <option value="Burundi">Burundi</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Kenya">Kenya</option>
                                            </optgroup>
                                        </select>
                                        <!--<input type="text" class="form-control" name="u_pays" required></input>-->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ville</label>
                                <input type="text" name="u_ville" id="u_ville" required="" autocomplete="off"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Tes contacts</label>
                                <input type="text" class="form-control" name="u_contacts" required="" autocomplete="" />
                            </div>
                            <div class="form-group">
                                <label>Adresse</label>
                                <input type="text" class="form-control" name="u_adress" required="" autocomplete="" />
                            </div>
                            <div class="form-group">
                                <label>Photo de Profil</label>
                                <input type="file" class="form-control form-height-customer" name="u_image" required=""
                                    autocomplete="" />
                            </div>
                            <div class="text-center">
                                <button type="submit" name="create" class="btn btn-primary"><i
                                        class="glyphicon glyphicon-ok"></i>
                                    Enregistrer</button>
                            </div>
                        </form>
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