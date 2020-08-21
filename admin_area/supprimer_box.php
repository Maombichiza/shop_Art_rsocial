<?php  
    if(!isset($_SESSION['admin_email'])){     
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php 
    if(isset($_GET['supprimer_box'])){     
        $delete_box_id = $_GET['supprimer_box'];    
        $delete_box = "delete from t_box where id_box='$delete_box_id'";   

        $run_delete = mysqli_query($con,$delete_box);   

        if($run_delete){
            echo "<script>alert('Un de Box est supprimer avec succes')</script>";
            echo "<script>window.open('index.php?voir_box','_self')</script>";       
        }    
    }
?>
<?php } ?>