<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php 
    if(isset($_GET['modifier_art'])){      
        $edit_id = $_GET['modifier_art'];

        $get_p = "SELECT * FROM t_arts WHERE id_Art='$edit_id'";

        $run_edit = mysqli_query($con,$get_p);
        $row_edit = mysqli_fetch_array($run_edit);

        $p_id = $row_edit['id_Art'];
        $p_title = $row_edit['titre_Art'];
        $p_cat = $row_edit['art_cat_id'];
        $cat = $row_edit['id_cat'];
        $p_image1 = $row_edit['art_img1'];
        $p_image2 = $row_edit['art_img2'];
        $p_image3 = $row_edit['art_img3'];
        $p_price = $row_edit['prix_art'];
        $p_keywords = $row_edit['art_motcles'];
        $p_desc = $row_edit['art_desc'];
        }  

        $get_p_cat = "SELECT * FROM t_arts_categorie WHERE art_cat_id='$p_cat'";

        $run_p_cat = mysqli_query($con,$get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['art_cat_titre'];
        $get_cat = "select * from categories where cat_id='$cat'";

        $run_cat = mysqli_query($con,$get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_title = $row_cat['cat_titre'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Ajouter Oeuvre d'Art </title>
</head>
<body>  
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Modifier l'Oeuvre d'art
            </li>
        </ol>
    </div>
</div>
 
<div class="row"><
      <div class="col-lg-12">
        <div class="panel panel-default">

           <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-money fa-fw"></i> Ajouter l'oeuvre d'art
               </h3>
           </div> 
           
           <div class="panel-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">

                   <div class="form-group">
                      <label class="col-md-3 control-label">Titte de l'art </label> 
                      <div class="col-md-6"> 
                          <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">     
                      </div>      
                   </div>
                   
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Categorie de l' oeuvre d'art</label> 
                      <div class="col-md-6">

                          <select name="product_cat" class="form-control">
                              <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>  
                              <?php 
                              $get_p_cats = "SELECT * FROM t_arts_categorie";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  $p_cat_id = $row_p_cats['art_cat_id'];
                                  $p_cat_title = $row_p_cats['art_cat_titre'];
                                  echo "
                                  <option value='$p_cat_id'> $p_cat_title </option> 
                                  "; 
                              } 
                              ?>
                          </select>

                      </div>
                   </div>
                   
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Categorie </label> 
                      <div class="col-md-6">
                          <select name="cat" class="form-control">
                              <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>
                              <?php 
                              $get_cat = "select * from categories";
                              $run_cat = mysqli_query($con,$get_cat);
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_titre'];
                                  echo "
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";  
                              }
                              
                              ?>  
                          </select>
                      </div>
                   </div>

                   <div class="form-group">
                      <label class="col-md-3 control-label"> Oeuvre Art Image 1 </label> 
                      <div class="col-md-6">    
                          <input name="product_img1" type="file" class="form-control" required>
                          <br>
                          <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                      </div>
                   </div>
                   
                   <div class="form-group">  
                      <label class="col-md-3 control-label"> Oeuvre Art Image 2 </label>  
                      <div class="col-md-6"> 
                          <input name="product_img2" type="file" class="form-control">
                          <br>
                          <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>"> 
                      </div>  
                   </div>
                   
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Oeuvre Art Image 3 </label> 
                      <div class="col-md-6">
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          <br>
                          <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                      </div>   
                   </div>
                   
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Prix de l'oeuvre d'art </label> 
                      <div class="col-md-6">
                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                      </div>   
                   </div>
                   
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Resurer clé sur l'Art</label>   
                      <div class="col-md-6">
                          <input name="product_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">
                      </div> 
                   </div>

                   <div class="form-group">
                      <label class="col-md-3 control-label"> Description de l'oeuvre d'art </label> 
                      <div class="col-md-6">   
                          <textarea name="product_desc" cols="19" rows="6" class="form-control">
                              <?php echo $p_desc; ?> 
                          </textarea>   
                      </div>  
                   </div>
                   
                   <div class="form-group">
                      <label class="col-md-3 control-label"></label>   
                      <div class="col-md-6"> 
                          <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control"> 
                      </div>
                   </div>
                   
               </form> 
           </div>            
        </div>  
    </div> 
</div>
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){

    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc']; 
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");

    $update_product = "update t_arts set art_cat_id='$product_cat',id_cat='$cat',date=NOW(),titre_Art='$product_title',art_img1='$product_img1',art_img2='$product_img2',art_img3='$product_img3',art_motcles='$product_keywords',art_desc='$product_desc',prix_art='$product_price' where id_Art='$p_id'"; 

    $run_product = mysqli_query($con,$update_product);
    
    if($run_product){   
       echo "<script>alert('La Modification a ete bien effectuer')</script>";   
       echo "<script>window.open('index.php?voir_art','_self')</script>";     
    }   
}

?>


<?php } ?>