<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Tableau de Bord / Voir les clients
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  Voir les clients
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th> No: </th>
                                <th> Nom: </th>
                                <th> Image: </th>
                                <th> Adress mail: </th>
                                <th> Pays: </th>
                                <th> Ville: </th>
                                <th> Address: </th>
                                <th> Contact: </th>
                                <th> Supprimer: </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
          
                                $i=0;
                            
                                $get_c = "select * from t_clients";
                                
                                $run_c = mysqli_query($con,$get_c);
          
                                while($row_c=mysqli_fetch_array($run_c)){
                                    
                                    $c_id = $row_c['client_id'];
                                    
                                    $c_name = $row_c['client_nom'];
                                    
                                    $c_img = $row_c['client_photo'];
                                    
                                    $c_email = $row_c['client_email'];
                                    
                                    $c_country = $row_c['client_pays'];
                                    
                                    $c_city = $row_c['client_ville'];
                                    
                                    $c_address = $row_c['client_adress'];
                                    
                                    $c_contact = $row_c['client_contact'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $c_name; ?> </td>
                                <td> <img src="../customer/customer_images/<?php echo $c_img; ?>" width="60" height="60"></td>
                                <td> <?php echo $c_email; ?> </td>
                                <td> <?php echo $c_country; ?></td>
                                <td> <?php echo $c_city; ?> </td>
                                <td> <?php echo $c_address ?> </td>
                                <td> <?php echo $c_contact ?> </td>
                                <td> 
                                     
                                     <a href="index.php?supprimer_client=<?php echo $c_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Supprimer
                                    
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