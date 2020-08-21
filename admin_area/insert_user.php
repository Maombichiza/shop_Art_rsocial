<?php 

include("includes/dbconn.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inserer les oeuvres d'Arts</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">

</head>
<body>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Tableau de Bord / Ajouter l'oeuvre d'art
                </li>
            </ol>
            
        </div>
        
    </div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i>   Ajouter l'oeuvre d'art
                </h3>
                
            </div>

        <div class="panel-body">

            <form method="post" class="form-horizontal" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-md-3 control-label">Titre Arts </label>
                    <div class="col-md-6">

                        <input name="titre_ArtT" type="text" class="form-control" required>
                    </div>
                    
                </div>
                <div class="form-group ">

                    <label class="col-md-3 control-label">Categories Arts </label>

                    <div class="col-md-6">

                        <select name="art_categorieT" class="form-control ">

                            <option> Selectionne la categorie de  l'art</option>
                            <?php 
                            $get_art_cats = "select * from t_arts_categorie";
                            $run_art_cats = mysqli_query($con,$get_art_cats);

                            while ($row_art_cats=mysqli_fetch_array($run_art_cats)) {
                                $art_cat_id = $row_art_cats['art_cat_id'];
                                $art_cat_titre = $row_art_cats['art_cat_titre'];
                                $art_cat_descr = $row_art_cats['art_cat_descr'];

                                echo "
                                <option value='$art_cat_id'> $art_cat_titre</option>
                                ";
                            }
                             ?> 
                        </select>.
                    </div>
                </div>
                <div class="form-group ">

                    <label class="col-md-3 control-label">Categories </label>

                    <div class="col-md-6">

                        <select name="categorieT" class="form-control ">

                            <option> Selectionne la categorie </option>
                            <?php 
                            $get_cat = "select * from categories";
                            $run_cat = mysqli_query($con,$get_cat);

                            while ($row_cat=mysqli_fetch_array($run_cat)) {
                                $cat_id = $row_cat['cat_id'];
                                $cat_titre = $row_cat['cat_titre'];
                                $cat_descr = $row_cat['cat_descr'];

                                echo "
                                <option value='$cat_id'>$cat_titre</option>
                                ";
                            }

                             ?>
    
                        </select>.
                    </div>
                </div>
                   <div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">Image Art 1 </label>

                    <div class="col-md-6">
                        <input name="art_img1T" type="file" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Image Art 2 </label>
                    <div class="col-md-6">

                        <input name="art_img2T" type="file" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Image Art 3 </label>
                    <div class="col-md-6">

                        <input name="art_img3T" type="file" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Prix de l'oeuvre </label>
                    <div class="col-md-6">

                        <input name="prix_artT" type="text" class="form-control" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Mot clés de l'oeuvre </label>
                    <div class="col-md-6">

                        <input name="art_motclesT" type="text" class="form-control" required>
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="col-md-3 control-label">Description </label>
                    <div class="col-md-6">
                        <textarea name="art_descT" cols="19" rows="6" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <input name="submit" value="INSERER L'OEUVRE D'ART" type="submit" class="btn btn-primary form-control">
                    
                </div>
            </div>
            </form>
            
        </div>      
      </div>
    </div>  
</div>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script >tinymce.init({selector:'textarea'});</script>
</body>
</html>
<?php 
if (isset($_POST['submit'])) {
    $titre_Art = $_POST['titre_ArtT'];
    $art_categorie = $_POST['art_categorieT'];
    $categorie = $_POST['categorieT'];
    $prix_art = $_POST['prix_artT'];
    $art_motcles = $_POST['art_motclesT'];
    $art_desc = $_POST['art_descT'];

    $art_img1 = $_FILES['art_img1T']['name'];
    $art_img2 = $_FILES['art_img2T']['name'];
    $art_img3 = $_FILES['art_img3T']['name'];

    $temp_name1 = $_FILES['art_img1T']['tmp_name'];
    $temp_name2 = $_FILES['art_img2T']['tmp_name'];
    $temp_name3 = $_FILES['art_img3T']['tmp_name'];

    move_uploaded_file($temp_name1, "product_images/$art_img1");
    move_uploaded_file($temp_name2, "product_images/$art_img2");
    move_uploaded_file($temp_name3, "product_images/$art_img3");

    $insert_art = "insert into t_arts (art_cat_id,id_cat,date,titre_Art,art_img1,art_img2,art_img3,prix_art,art_motcles,art_desc) values 
    ('$art_categorie','$categorie',NOW(),'$titre_Art','$art_img1','$art_img2','$art_img3','$prix_art','$art_motcles','$art_desc')";

    $run_art = mysqli_query($con,$insert_art);
    if ($run_art) {
        
        echo "<script>alert('Art à été enregistré  avec Succès')</script>";
        echo "<script>window.open('index.php?voir_arts','_self')</script>";
    }

}
 ?>
