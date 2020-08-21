<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['modifier_a_cat'])){
        
        $edit_p_cat_id = $_GET['modifier_a_cat'];
        
        $edit_p_cat_query = "select * from t_arts_categorie where art_cat_id='$edit_p_cat_id'";
        
        $run_edit = mysqli_query($con,$edit_p_cat_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_cat_id = $row_edit['art_cat_id'];
        
        $p_cat_title = $row_edit['art_cat_titre'];
        
        $p_cat_desc = $row_edit['art_cat_descr'];
        
    }

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> Tableau de bord / Modifier categorie d'oeuvre d'art.
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-pencil fa-fw"></i> Modifier categorie d'oeuvre d'art.
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                           Titre  categorie d'oeuvre d'art
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input value=" <?php echo $p_cat_title; ?> " name="art_cat_titre" type="text" class="form-control">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                            Description categorie d'oeuvre d'art
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <textarea type='text' name="art_cat_desc" class="form-control"><?php echo $p_cat_desc; ?></textarea>
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input value="Modifier" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div>
                    
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

<?php  

          if(isset($_POST['update'])){
              
              $p_cat_title = $_POST['art_cat_titre'];
              
              $p_cat_desc = $_POST['art_cat_desc'];
              
              $update_p_cat = "update t_arts_categorie set art_cat_titre='$p_cat_title',art_cat_descr='$p_cat_desc' where art_cat_id='$p_cat_id'";
              
              $run_p_cat = mysqli_query($con,$update_p_cat);
              
              if($run_p_cat){
                  
                  echo "<script>alert('la  categorie oeuvre Art est modifier avec succes ')</script>";
                  
                  echo "<script>window.open('index.php?voir_a_cat','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 