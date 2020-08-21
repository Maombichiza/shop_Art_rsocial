<?php  
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?> 

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">  </h1>
        
        <ol class="breadcrumb">
            <li class="active">
            
                <i class="fa fa-dashboard"></i> Table de Bord
            
            </li>
        </ol>
        
    </div>
</div>

<div class="row">
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_products; ?> </div>    
                        <div> Oeuvre d'Arts </div>    
                    </div>
                </div>
            </div>
            <a href="index.php?voir_arts">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        Voir les  Details 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_customers; ?> </div>
                           
                        <div> Clients </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?voir_clients">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        Voir Details 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
        </div>
    </div>
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-orange">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-tags fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_p_categories; ?> </div>
                           
                        <div> Categories Arts</div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?voir_a_cat">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir Details 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_pending_orders; ?> </div>
                           
                        <div> Permission </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?voir_orders">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        Voir Details 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    
                    <i class="fa fa-money fa-fw"></i> Nouveau Permission
                    
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                          
                            <tr>
                           
                                <th> Order no: </th>
                                <th> Client Email: </th>
                                <th> Invoice No: </th>
                                <th> Oeuvre Art ID: </th>
                                <th>  Qt: </th>
                                <th> Format Art: </th>
                                <th> Status: </th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                          
                                $i=0;
          
                                $get_order = "select * from t_pending_orders order by 1 DESC LIMIT 0,5";
          
                                $run_order = mysqli_query($con,$get_order);
          
                                while($row_order=mysqli_fetch_array($run_order)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['client_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $art_id = $row_order['art_id'];
                                    
                                    $qty = $row_order['qty'];
                                    
                                    $num = $row_order['num'];
                                    
                                    $order_status = $row_order['order_stutus'];
                                    
                                    $i++;
                            
                            ?>
                           
                            <tr>
                               
                                <td> <?php echo $order_id; ?> </td>
                                <td>
                                    
                                    <?php 
                                    
                                        $get_client = "select * from t_clients where client_id='$c_id'";
                                    
                                        $run_client = mysqli_query($con,$get_client);
                                    
                                        $row_client = mysqli_fetch_array($run_client);
                                    
                                        $client_email = $row_client['client_email'];
                                    
                                        echo $client_email;
                                    
                                    ?>
                                    
                                </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $art_id; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> <?php echo $num; ?> </td>
                                <td>
                                    
                                    <?php 
                                    
                                        if($order_status=='pending'){
                                            
                                            echo $order_status='pending';
                                            
                                        }else{
                                            
                                            echo $order_status='Complete';
                                            
                                        }
                                    
                                    ?>
                                    
                                </td>
                                
                            </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>
                </div>
                
                <div class="text-right">
                    
                    <a href="index.php?voir_orders">
                        Voir  Toutes les Permissions <i class="fa fa-arrow-circle-right"></i> 
                    </a>
                    
                </div>
                
            </div>
            
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="mb-md thumb-info">

                    <img src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>" class="rounded img-responsive">
                    
                    <div class="thumb-info-title">
                       
                        <span class="thumb-info-inner"> <?php echo $admin_name; ?> </span>
                        <span class="thumb-info-type"> <?php echo $admin_job; ?> </span>
                        
                    </div>

                </div>
                
                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i> <span> Adress Mail: </span> <?php echo $admin_email; ?> <br/>
                        <i class="fa fa-flag"></i> <span> Pays: </span> <?php echo $admin_country; ?> <br/>
                        <i class="fa fa-envelope"></i> <span> Contact: </span> <?php echo $admin_contact; ?> <br/>
                    </div>
                    
                    <hr class="dotted short">
                    
                    <h5 class="text-muted"> Apropos de moi </h5>
                    
                    <p>
                        
                        <?php echo $admin_about; ?>
                        
                    </p>
                    
                </div>
                
            </div>
        </div>
    </div>
    
</div>
<?php } ?>