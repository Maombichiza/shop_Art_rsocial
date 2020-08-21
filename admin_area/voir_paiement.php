<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> TableauBord/ Voir Paiement
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  Voir Paiement
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th>No: </th>
                                <th> No Facture: </th>
                                <th> Montant payé:  </th>
                                <th> Methode: </th>
                                <th> Refference No: </th>
                                <th> Code Paiement: </th>
                                <th> Date Paiement: </th>
                                <th> Supprimer Paiement: </th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
          
                                $i=0;
                            
                                $get_paiement = "select * from t_paiement";                                
                                $run_paie = mysqli_query($con,$get_paiement);
          
                                while($row_paie=mysqli_fetch_array($run_paie)){
                                    
                                    $paie_id = $row_paie['paie_id'];                                    
                                    $invoice_no = $row_paie['invoice_no'];                                    
                                    $montant = $row_paie['montant'];                                    
                                    $mode_paie = $row_paie['mode_paie'];                                    
                                    $ref_no = $row_paie['ref_no'];                                   
                                    $code = $row_paie['code'];
                                    $paie_date = $row_paie['paie_date'];                                   
                                    $i++;                           
                            ?>

                            <tr>
                                <td><?php echo $paie_id; ?></td>
                                <td><?php echo $invoice_no ; ?></td>
                                <td><?php echo $montant; ?>$</td>
                                <td><?php echo $mode_paie; ?></td>
                                <td><?php echo $ref_no; ?></td>
                                <td><?php echo $code; ?></td>
                                <td><?php echo $paie_date; ?></td>
                                
                                <td>
                                    <a href="index.php?supprimer_paiement=<?php echo $paie_id; ?>">
                                     <i class="fa fa-trash-o"></i>
                                    Supprimer</a> 
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