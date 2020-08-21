<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['modifier_cat'])){   
        $edit_cat_id = $_GET['modifier_cat'];  
        $edit_cat_query = "select * from categories where cat_id='$edit_cat_id'"; 

        $run_edit = mysqli_query($con,$edit_cat_query);
        $row_edit = mysqli_fetch_array($run_edit);
        
        $cat_id = $row_edit['cat_id']; 
        $cat_title = $row_edit['cat_titre']; 
        $cat_desc = $row_edit['cat_descr'];
    }       
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Modifier
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-pencil fa-fw"></i> Modifier Categorie
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                            Titre categorie
                        
                        </label>
                        
                        <div class="col-md-6">
                            <input value=" <?php echo $cat_title; ?> " name="cat_titree" type="text" class="form-control">
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                            Description Categorie
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <textarea type='text' name="cat_descri" class="form-control"><?php echo $cat_desc; ?></textarea>
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                             
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input value="Modifier" name="modifier" type="submit" class="form-control btn btn-primary">
                        
                        </div>
                    
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

<?php  

          if(isset($_POST['modifier'])){
              
              $cat_title = $_POST['cat_titree'];
              
              $cat_desc = $_POST['cat_descri'];
              
              $update_cat = "update categories set cat_titre='$cat_title',cat_descr='$cat_desc' where cat_id='$cat_id'";
              
              $run_cat = mysqli_query($con,$update_cat);
              
              if($run_cat){
                  
                  echo "<script>alert('La Categorie est Modifier avec Succes')</script>";
                  
                  echo "<script>window.open('index.php?voir_cat','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 