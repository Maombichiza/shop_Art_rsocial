<?php 
$con = mysqli_connect("localhost","root","","db_commerceart");
   $user = "select * from t_clients";
   $run_user = mysqli_query($con, $user);
   while ($row_user= mysqli_fetch_array($run_user)) {
   	      $user_id = $row_user['client_id'];
   	      $user_name = $row_user['client_nom'];
   	      $user_profile = $row_user['client_photo'];
   	      echo "
   	        <li>
   	             <div class='chat-left-img'>
   	             <img src='$user_profile'>
   	             </div>
   	             <div class='chat-left-details'>
   	             <p><a href='homec.php?client_nom=$user_name'>$user_name</a></p>";

   	             if ($login == 'en ligne') {
   	             	echo "<span><i class='fa fa-circle' aria-hidden='true'>En ligne</i></span>";
   	             }else{
   	             	echo "<span><i class='fa fa-circle-o' aria-hidden='true'>En ligne</i></span>";
   	             }	
   	             ";
   	             </div>
   	        </li>

   	      ";
   	  }
 ?>