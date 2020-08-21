<?php   
    if(!isset($_SESSION['admin_email'])){     
        echo "<script>window.open('login.php','_self')</script>";     
    }else{
?>
<?php 
    if(isset($_GET['suuprimer_cat'])){     
        $delete_cat_id = $_GET['supprimer_cat'];     
        $delete_cat = "delete from categories where cat_id='$delete_cat_id'";
        
        $run_delete = mysqli_query($con,$delete_cat);
        
        if($run_delete){ 
            echo "<script>alert('Une de categorie est supprimer avec succes')</script>"; 
            echo "<script>window.open('index.php?voir_cat','_self')</script>";       
        }   
    }
?>
<?php } ?>