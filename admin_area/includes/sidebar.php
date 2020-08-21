<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>"; 
    }else{
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapseadmin_email">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php?tableaubord" class="navbar-brand">Administration</a>
    </div>
    <ul class="nav navbar-right top-nav"> 
        <li class="dropdown">
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">     
                <i class="fa fa-user"></i> <?php echo $admin_name; ?> <b class="caret"></b>    
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                        <i class="fa fa-fw fa-user"></i> Profil    
                    </a>
                </li> 
                <li>
                    <a href="index.php?voir_arts">
                        <i class="fa fa-fw fa-envelope"></i> Oeuvre d'Art
                        <span class="badge"><?php echo $count_products; ?></span>  
                    </a>
                </li>
                <li>
                    <a href="index.php?voir_clients="> 
                        <i class="fa fa-fw fa-users"></i> Clients   
                        <span class="badge"><?php echo $count_customers; ?></span>  
                    </a>
                </li>
                <li>
                    <a href="index.php?voir_cat">  
                        <i class="fa fa-fw fa-gear"></i> Categorie de l'Oeuvre d'Art
                        <span class="badge"><?php echo $count_p_categories; ?></span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Deconnexion
                    </a>
                </li>
            </ul> 
        </li>
    </ul>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?tableaubord">
                        <i class="fa fa-fw fa-tableaubord"></i> Taleau de Bord  
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                        <i class="fa fa-fw fa-tag"></i> Oeuvre d'Art
                        <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_Art"> Ajouter l'oeuvre d'art </a>
                    </li>
                    <li>
                        <a href="index.php?voir_arts"> Voir l'oeuvre d'Art </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                        
                        <i class="fa fa-fw fa-edit"></i> Categorie de l'oeuvre d'Art
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><
                
                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="index.php?ajouter_a_cat"> Ajouter Categorie de l'oeuvre d'art 
                    <li>
                        <a href="index.php?voir_a_cat"> Voir Categorie de  l'oeuvre d'art   </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#cat">
                        
                        <i class="fa fa-fw fa-edit"></i> Categories
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="cat" class="collapse">
                    <li>
                        <a href="index.php?ajouter_cat"> Ajouter la cotegories </a>
                    </li>
                    <li>
                        <a href="index.php?voir_cat"> Voir les Categories </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                        
                        <i class="fa fa-fw fa-gear"></i> Slides
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?ajouter_slide"> Ajouter Slide </a>
                    </li>
                    <li>
                        <a href="index.php?voir_slide">Voir Slides </a>
                    </li>
                </ul>
                
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#box">
                        
                        <i class="fa fa-fw fa-book"></i> Boxs_section
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="box" class="collapse">
                    <li>
                        <a href="index.php?ajouter_box"> Ajouter Box </a>
                    </li>
                    <li>
                        <a href="index.php?voir_box">Voir Boxs </a>
                    </li>
                </ul>
                
            </li>
            
            <li>>
                <a href="index.php?voir_clients">
                    <i class="fa fa-fw fa-users"></i> Voir Clients
                </a>
            </li>
            
            <li>
                <a href="index.php?voir_orders">
                    <i class="fa fa-fw fa-book"></i> Voir Orders
                </a>
            </li>
            
            <li>
                <a href="index.php?voir_paiement">
                    <i class="fa fa-fw fa-money"></i> Voir Paiements
                </a>
            </li>

            <li>
                <a href="index.php?modifier_css">
                    <i class="fa fa-fw fa-pencil"></i> Modifier CSS
                </a>
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                        
                        <i class="fa fa-fw fa-users"></i> Utilisateurs
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user"> Ajouter l'Utilisateur </a>
                    </li>
                    <li>
                        <a href="index.php?view_users"> Voird Utilisateurs </a>
                    </li>
                    <li>
                        <a href="index.php?user_update= <?php echo $admin_id; ?>"> Modifier Profil Utilisateur </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Deconnexion!
                </a>
            </li>
            
        </ul>
    </div>
    
</nav>
<?php } ?>