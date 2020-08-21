
<?php 

    session_start();
    include("includes/dbconn.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

         $admin_session = $_SESSION['admin_email'];
        $get_admin = "select * from t_admins where email_admin='$admin_session'";

        $run_admin = mysqli_query($con,$get_admin);
        $row_admin = mysqli_fetch_array($run_admin); 

        $admin_id = $row_admin['admin_id'];       
        $admin_name = $row_admin['nom_admin'];       
        $admin_email = $row_admin['email_admin'];       
        $admin_image = $row_admin['image_admin'];        
        $admin_country = $row_admin['pays_admin'];        
        $admin_about = $row_admin['apropos_admin'];        
        $admin_contact = $row_admin['contact _admin'];       
        $admin_job = $row_admin['ocup_admin'];       
        $get_products = "select * from t_arts";   

        $run_products = mysqli_query($con,$get_products);       
        $count_products = mysqli_num_rows($run_products); 

        $get_customers = "select * from t_clients";     

        $run_customers = mysqli_query($con,$get_customers);       
        $count_customers = mysqli_num_rows($run_customers);

        $get_p_categories = "select * from t_arts_categorie";  

        $run_p_categories = mysqli_query($con,$get_p_categories);     
        $count_p_categories = mysqli_num_rows($run_p_categories);  

        $get_pending_orders = "select * from t_pending_orders";    

        $run_pending_orders = mysqli_query($con,$get_pending_orders);     
        $count_pending_orders = mysqli_num_rows($run_pending_orders);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="wrapper"> 
       <?php include("includes/sidebar.php"); ?> 
        <div id="page-wrapper">
            <div class="container-fluid">
                 <?php
                    if(isset($_GET['tableaubord'])){                      
                       include("tableaubord.php");   
                                           
                }   if(isset($_GET['insert_Art'])){                       
                        include("insert_Art.php");    
                    } 
                    if(isset($_GET['voir_arts'])){                        
                        include("voir_arts.php");  

                }   if(isset($_GET['supprimer_art'])){                        
                        include("supprimer_art.php"); 

                }   if(isset($_GET['modifier_art'])){                        
                        include("modifier_art.php");                        
                }
                if(isset($_GET['ajouter_a_cat'])){                        
                        include("ajouter_a_cat.php");                        
                }
                if(isset($_GET['voir_a_cat'])){                       
                        include("voir_a_cat.php");
                        
                }
                if(isset($_GET['modifier_a_cat'])){                       
                        include("modifier_a_cat.php");                       
                }
                if(isset($_GET['supprimer_a_cat'])){                        
                        include("supprimer_a_cat.php");                       
                }
                if(isset($_GET['ajouter_cat'])){                       
                        include("ajouter_cat.php");                       
                }
               if(isset($_GET['voir_cat'])){                        
                        include("voir_cat.php");          
                }
                if(isset($_GET['modifier_cat'])){                        
                        include("modifier_cat.php");                        
                }
                if(isset($_GET['supprimer_cat'])){                        
                        include("supprimer_cat.php");                        
                }
                 if(isset($_GET['ajouter_slide'])){                        
                        include("ajouter_slider.php");                        
                }
                if(isset($_GET['voir_slide'])){                        
                        include("voir_slide.php");                        
                }
                if(isset($_GET['modifier_slide'])){                       
                       include("modifier_slide.php");
                                        }
                if(isset($_GET['supprimer_slide'])){                        
                        include("supprimer_slide.php");
                                        }
                if(isset($_GET['voir_clients'])){                        
                        include("voir_clients.php");                        
                }
                if(isset($_GET['supprimer_client'])){
                        
                        include("supprimer_client.php");
                        
                }
                if(isset($_GET['voir_orders'])){        
                        include("voir_orders.php");                        
                }
                if(isset($_GET['supprimer_order'])){                       
                        include("supprimer_order.php");                       
                }
                if (isset($_GET["ajouter_box"])) {                  
                    include("ajouter_box.php");
                }
                if (isset($_GET['voir_box'])) {
                    include("voir_box.php");
                }
                if (isset($_GET['modifier_box'])) {
                    include("modifier_box.php");                   
                }
                if (isset($_GET["supprimer_box"])) {
                    include("supprimer_box.php");                   
                }
                if (isset($_GET["modifier_css"])) {
                    include("modifier_css.php");                  
                }
                 if (isset($_GET["voir_paiement"])) {
                    include("voir_paiement.php");                  
                }
                if (isset($_GET["supprimer_paiement"])) {
                    include("supprimer_paiement.php");                   
                } 
                if (isset($_GET["supprimer_paiement"])) {
                    include("supprimer_paiement.php");                   
                } 
                ?> 
            </div>
        </div>
    </div>
<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>
<?php } ?>