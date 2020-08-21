<?php 

 $active='Contact-nous';
  include("includes/header.php");

   ?>

   <div id="content">
     	<div class="container">
     		<div class="col-md-12">
     			<ul class="breadcrumb ">
     				<li>
     				<a href="index.php">Accueil</a>
     				</li>
     				<li>Contactez-nous
            </li>
     			</ul>
     			
     		</div>

     		<div class="col-md-3">

  <?php 
include("includes/sidebar.php");
 ?>
     		</div>

<div class="col-md-6">
            <div class="boxcontact">
              <div class="box-header">
                <center>
                  <h2> Passer  Contact Gratuit</h2>
                  <p class="text-muted">
                    Si tu a n'importe quel suggestion, Contact-nous gratuitrment, Notre Saervice client travail <strong>24/24</strong> 
                    
                  </p>
                   </center>
                  <form action="contact.php" method="post">
                    <div class="form-group">
                      <label>Nom</label>
                      <input type="text" class="form-control" name="name" required></input>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email" required></input>
                    </div>
                    <div class="form-group">
                      <label>Suggestion</label>
                      <input type="text" class="form-control" name="suggestion" required></input>
                    </div>
                    <div class="form-group">
                      <label>Message</label>
                      <textarea name="message" class="form-control"></textarea>
                    </div>

                    <div class="text-center" >
                      <button  type="submit" name="submit" class="btn btn-primary"><i class="fa fa-user-md">  Envoyer  le message</i> </button>

                    </div>
                  </form>

                  <?php
                  if (isset($_POST['submit'])) {
                    
                  /// Admnin receive message with ///

                  $sender_name = $_POST['name'];
                  $sender_email = $_POST['email'];
                  $sender_suggestion = $_POST['suggestion'];
                  $sender_message = $_POST['message'];
                 $receive_email = "chizampenzi01@gmail.com";
                 mail($receive_email,$sender_name,$sender_suggestion,$sender_message,$sender_email);

                 /// auto reply to sender with this///

                 $email = $_POST['email'];
                 $subject = "Bienvenu sur mon Site Web";
                 $msg = "Merci de nous avoir Envoyer ce Message. Nous allons vous repondres";
                 $from ="chizaisrael@gmail.com";
                 mail($email,$subject,$msg,$from);

                 echo "<h2> Votre Message est Envoyer avec Succes</h2>";

                  }

                   ?>               
              </div>              
            </div>           
          </div>

        </div>
 </div>
   <?php 
include("includes/footer.php");
 ?>
   <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>