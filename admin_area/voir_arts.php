<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> TableauBord/ Voir les Oeuvres d'Arts
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  Voir les Oeuvres d'Arts
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th>Code Oeuvre Art: </th>
                                <th> Titre Oeuvre Art: </th>
                                <th> Image Oeuvre Art:  </th>
                                <th> Prix Oeuvre Art: </th>
                                <th> Sold Oeuvre Art: </th>
                                <th> Mot cle Oeuvre Art: </th>
                                <th> Date Oeuvre Art: </th>
                                <th> Supprimer Oeuvre Art: </th>
                                <th> Modifier Oeuvre Art: </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
          
                                $i=0;
                            
                                $get_pro = "select * from t_arts";
                                
                                $run_pro = mysqli_query($con,$get_pro);
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $pro_id = $row_pro['id_Art'];
                                    
                                    $pro_title = $row_pro['titre_Art'];
                                    
                                    $pro_img1 = $row_pro['art_img1'];
                                    
                                    $pro_price = $row_pro['prix_art'];
                                    
                                    $pro_keywords = $row_pro['art_motcles'];
                                    
                                    $pro_date = $row_pro['date'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $pro_title; ?> </td>
                                <td> <img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"></td>
                                <td> $ <?php echo $pro_price; ?> </td>
                                <td> <?php 
                                    
                                        $get_sold = "select * from t_pending_orders where art_id='$pro_id'";
                                    
                                        $run_sold = mysqli_query($con,$get_sold);
                                    
                                        $count = mysqli_num_rows($run_sold);
                                    
                                        echo $count;
                                    
                                     ?> 
                                </td>
                                <td> <?php echo $pro_keywords; ?> </td>
                                <td> <?php echo $pro_date ?> </td>
                                <td> 
                                     
                                     <a href="index.php?supprimer_art=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Supprimer
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?modifier_art=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Modifier
                                    
                                     </a> 
                                    
                                </td>
                            </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php } ?>