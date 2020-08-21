<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<?php
include("includes/connxion_pdo.php");
include("functions/fonctions.php");
session_start();
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
    <title>P-Shop-Art | Messages</title>
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
                            <a href="logout.php">Déconnexion</a>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="boxchat">
                        <div class="box-header">
                            <h2 id="chat-title">Contacts</h2>
                        </div>
                        <div id="user_details">

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="boxchat">
                        <div class="box-header">
                            <h4 id="chat-title"><span id="user"> Discussion </span></h4>
                        </div>
                        <div class="panel paneldefaut">
                            <div class="panel-body">
                                <div id="user_model_details">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="boxchat">
                        <div class="box-header">
                            <h3 id="chat-title" class="text-center"><span id="user_name"> Discussion
                                </span></h3>
                        </div>
                        <center> <img src="images/avatar.png" alt="" class="img img-circle text-center" width="150">
                        </center><br>
                        <ul class="list-unstyled">
                            <li><label>E-mail</label> : exemple@gmail.com</li>
                            <li><label>Pays</label> : République Démocratique du Congo</li>
                            <li><label>Ville</label> : Goma</li>
                            <li><label>Adresse</label> : Q. Murara Av. lac vert</li>
                            <li><label>Contacts</label> : +243 971 921 094</li>
                        </ul>

                    </div>
                </div>
                <hr>
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
    <script>
    $(function() {
        load_user();

        setInterval(function() {
            last_activity();
            load_user();
            update_chat_history();
        }, 5000)

        function load_user() {
            $.ajax({
                url: "querys/load_user.php",
                method: "POST",
                success: function(data) {
                    $("#user_details").html(data);
                }
            });
        }

        function last_activity() {
            $.ajax({
                url: "querys/last_activity.php",
                success: function() {

                }
            });
        }

        function chat_dialog_box(to_user_id, to_user_name) {
            $("#user").html("Chat with " + to_user_name);
            $("#user_name").html(to_user_name);
            var modal_content = '<div id="user_dialog_' + to_user_id +
                '" class="user_dialog">';
            modal_content +=
                '<div style="height:400px; border:1px solid #ccc; overflow-y:scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' +
                to_user_id + '" id="chat_history_' + to_user_id + '">';

            modal_content += chat_real_time(to_user_id);

            modal_content += '</div>';
            modal_content += '<div class="form-goup">';
            modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id +
                '" class="form-control"></textarea>';
            modal_content += '</div><br>';
            modal_content +=
                '<div class="form-group" align="right"><button type="button" name="send_chat" id="' +
                to_user_id +
                '"class="btn btn-primary send_chat">Envoyer <i class="fa fa-send"></i></button></div></div>';
            $("#user_model_details").html(modal_content);
        }

        $(document).on("click", ".start_chat", function() {
            var to_user_id = $(this).data("touserid");
            var to_user_name = $(this).data("tousername");
            chat_dialog_box(to_user_id, to_user_name);
            $("#user_dialog_".to_user_id).dialog({
                autoOpen: false,
                width: 400
            });

            $("#user_dialog_" + to_user_id).dialog("open");
        });

        $(document).on("click", ".send_chat", function() {
            var to_user_id = $(this).attr("id");
            var chat_message = $("#chat_message_" + to_user_id).val();
            $.ajax({
                url: "querys/insert_chat.php",
                method: "POST",
                data: {
                    to_user_id: to_user_id,
                    chat_message: chat_message
                },
                success: function(data) {
                    $("#chat_message_" + to_user_id).val("");
                    $("#chat_history_" + to_user_id).html(data);
                }
            });
        });

        function chat_real_time(to_user_id) {
            $.ajax({
                url: "querys/chat_real_time.php",
                method: "POST",
                data: {
                    to_user_id: to_user_id
                },
                success: function(data) {
                    $("#chat_history_" + to_user_id).html(data);
                }
            });

        }

        function update_chat_history() {
            $(".chat_history").each(function() {
                var to_user_id = $(this).data("touserid");
                chat_real_time(to_user_id);
            });
        }
    });
    </script>
</body>

</html>