ajouer<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>    
                <i class="fa fa-dashboard"></i> Tableau de Bord /Ajouter Box  
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Ajouter Box
                </h3>
            </div>

            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> 
                           Titre Box                     
                        </label>               
                        <div class="col-md-6">
                            <input name="titre_box" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">
                              Description box
                        </label> 
                       <div class="col-md-6">
                       	<textarea name="desc_box" type="text" class="form-control" rows="6" cols="18"></textarea>   	
                       </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Ajouter le Box" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php  
    if(isset($_POST['submit'])){     
        $titre_box = $_POST['titre_box'];       
        $desc_boxe = $_POST['desc_box'];
        $ajouer_box = "insert into t_box (titre_box,desc_box) values ('$titre_box','$desc_box')";     
        $run_box = mysqli_query($con,$ajouer_box);
        echo "<script>alert('Nouveau Box a ete ajouter avec succes')</script>";
        echo "<script>window.open(index.php?voir_boxs)</script>";      
    }
?>
<?php } ?>