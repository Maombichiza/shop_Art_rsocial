<?php   
    if(!isset($_SESSION['admin_email'])){       
        echo "<script>window.open('login.php','_self')</script>";       
    }else{
?>

<?php 
    if(isset($_GET['supprimer_slide'])){
        
        $delete_slide_id = $_GET['supprimer_slide'];
        
        $delete_slide = "delete from slider where id_slide='$delete_slide_id'";
        
        $run_delete = mysqli_query($con,$delete_slide);
        
        if($run_delete){
            
            echo "<script>alert('Un de slide est supprimer avec succes')</script>";   
            echo "<script>window.open('index.php?voir_slide','_self')</script>";   
        }  
    }

?>
<?php } ?>