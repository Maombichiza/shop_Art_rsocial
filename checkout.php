 <?php

  $active = 'Mon compte';
  include("includes/header.php");

  ?>
 <div id="content">
     <div class="container">
         <div class="col-md-12">
             <ul class="breadcrumb ">
                 <li><a href="index.php">Accueil</a></li>
                 <li>Enregistrement des nouveaux Membres
                 </li>
             </ul>
         </div>
         <div class="col-md-3">
            
             <?php
        
        ?>
         </div>
         <div class="col-md-9">
             <?php

        if (!isset($_SESSION['client_email'])) {
          include("customer/client_login.php");
        } else {
          include("option_payement.php");
        }
        ?>
         </div>
 </div>
 <?php
  include("includes/footer.php");
  ?>
 <script src="js/jquery-331.min.js"></script>
 <script src="js/bootstrap-337.min.js"></script>
 </body>

 </html>