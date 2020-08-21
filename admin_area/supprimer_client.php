<?php 
    if(!isset($_SESSION['admin_email'])){    
        echo "<script>window.open('login.php','_self')</script>";   
    }else{
?>
<?php 
    if(isset($_GET['supprimer_client'])){    
        $delete_id = $_GET['supprimer_client'];    
        $delete_c = "delete from t_clients where client_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_c);
        
        if($run_delete){   
            echo "<script>alert('le client  a ete supprimer avec succes')</script>";  
            echo "<script>window.open('index.php?voir_clients','_self')</script>";      
        }  
    }
?>
<?php } ?>