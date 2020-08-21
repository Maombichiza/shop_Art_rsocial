<?php
session_start(); 
include("includes/dbconn.php");
include("functions/fonctions.php");

 ?>

<?php 
 if (isset($_GET['u_id'])) {
 	$client_id = $_GET['u_id'];
 }

 $ip_add = getRealIpUser();
 $status = "Entente";
$invoice_no = mt_rand();

$select_panier = "select * from t_panier where ip_add='$ip_add'";
$run_panier = mysqli_query($con,$select_panier);

while ($row_panier = mysqli_fetch_array($run_panier)) {
	$art_id = $row_panier['p_id'];
	$art_qty = $row_panier['qty'];
	$art_num = $row_panier['num'];
	$get_art = "select * from t_arts where id_Art='$art_id'";
	$run_arts = mysqli_query($con,$get_art);
	while ($row_arts = mysqli_fetch_array($run_arts)) 
	{
		$sub_total = $row_arts['prix_art']*$art_qty;
		$insert_client_order = "insert into t_client_orders (client_id,due_montant,invoice_no,qty,num,order_date,order_stutus) values 
		('$client_id','$sub_total','$invoice_no','$art_qty','$art_num',NOW(),'$status')";
		$run_client_order = mysqli_query($con,$insert_client_order);
		$insert_pending_order = "insert into t_pending_orders (client_id,invoice_no,art_id,qty,num,order_stutus) values 
		('$client_id','$invoice_no','$art_id','$art_qty','$art_num','$status')";
		$ru_pending_orders = mysqli_query($con,$insert_pending_order);
		$delete_panier = "delete from t_panier where ip_add='$ip_add'";
		$run_delete = mysqli_query($con,$delete_panier);
		echo "<script>alert('Ton Order a ete bien valider, Merci')</script>";
		echo "<script>window.open('customer/mon_compte.php?my_orders','_self')</script>";
	}	
}
 ?>