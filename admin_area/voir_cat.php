<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Voir Categorie
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-tags fa-fw"></i> Voir Categorie
                
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">table-bordered begin -->
                        
                        <thead>
                            <tr>
                                <th>  ID  Categorie</th>
                                <th>  Titre Categorie</th>
                                <th>  Description Categorie</th>
                                <th> Modifier Categorie  </th>
                                <th> Supprimer Categorie  </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
                            
                                $i=0;
          
                                $get_cats = "select * from categories";
          
                                $run_cats = mysqli_query($con,$get_cats);
          
                                while($row_cats=mysqli_fetch_array($run_cats)){
                                    
                                    $cat_id = $row_cats['cat_id'];
                                    
                                    $cat_title = $row_cats['cat_titre'];
                                    
                                    $cat_desc = $row_cats['cat_descr'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $cat_title; ?> </td>
                                <td width="300"> <?php echo $cat_desc; ?> </td>
                                <td> 
                                    <a href="index.php?modifier_cat= <?php echo $cat_id; ?> ">
                                        <i class="fa fa-pencil"></i> Modifier
                                    </a>
                                </td>
                                <td> 
                                    <a href="index.php?supprimer_cat= <?php echo $cat_id; ?> ">
                                        <i class="fa fa-trash"></i> Supprimer
                                    </a>
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                        
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>


<?php } ?>