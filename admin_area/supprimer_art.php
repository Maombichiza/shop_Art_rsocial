<?php  
    if(!isset($_SESSION['admin_email'])){     
        echo "<script>window.open('login.php','_self')</script>";     
    }else{
?>
<?php 
    if(isset($_GET['supprimer_art'])){     
        $delete_id = $_GET['supprimer_art'];    
        $delete_pro = "delete from t_arts where id_Art='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);   
        if($run_delete){
            
            echo "<script>alert('cette Oeuvre Art est supprimer avec succes')</script>";     
            echo "<script>window.open('index.php?voir_arts','_self')</script>";   
        }    
    }
?>

<?php } ?>