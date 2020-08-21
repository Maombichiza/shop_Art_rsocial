<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['modifier_box'])){
        
        $edit_box_id = $_GET['modifier_box'];
        
        $edit_box = "select * from t_box where id_box='$edit_box_id'";
        
        $run_edit_box = mysqli_query($con,$edit_box);
        
        $row_edit_box = mysqli_fetch_array($run_edit_box);
        
        $box_id = $row_edit_box['id_box'];
        
        $titre_box = $row_edit_box['titre_box'];
        
        $desc_box = $row_edit_box['desc_box'];
        
    }

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i>Tableau de Bord / Modifier slide
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-money fa-fw"></i> Modifier slide
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                           Titre Box
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input name="titre_box" type="text" class="form-control" value="<?php echo $titre_box; ?>">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                           Description de Box
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                                <textarea type="text" name="desc_box"  class="form-control" ><?php echo $desc_box; ?></textarea>
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label> 

                        <div class="col-md-6">
                            <input type="submit" name="update" value="Modifier le Box" class="btn btn-primary form-control">  
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php  

    if(isset($_POST['update'])){  
        $titre_box = $_POST['titre_box'];
        $desc_box = $_POST['desc_box'];

        $update_box = "update t_box set titre_box='$titre_box',desc_box='$desc_box' where id_box='$box_id'";
        $run_update_box = mysqli_query($con,$update_box);
        
        if($run_update_box){
            echo "<script>alert('Le Box est modifier avec Succes')</script>"; 
            echo "<script>window.open('index.php?voir_box','_self')</script>";
            
        }  
    }
?>

<?php } ?>