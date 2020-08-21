<center><!-- center begin-->
	<h2>Mes ordres</h2>
	<p class="lead"> Votre Permission on one place</p>
	<p class="text-muted">
		si tu as une question, n'hesitez pas a nous contacter sur <a href="..contact.php">Contactez-nous</a>notre service travail <strong>24h/24</strong>
	</p>
</center>
<hr>
<div class="table-responsive">

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>  No :  </th>
				<th>  Montant dû: </th>
				<th>  No Facture d'achat: </th>
				<th>  Qt: </th>
				<th>  Format de cadrage: </th>
				<th>  Date Permission: </th>
				<th>  Payé/Non Payé:  </th>
				<th>  Statu: </th>
			</tr>
		</thead>
		<tbody>

			<?php 

			$client_session = $_SESSION['client_email'];
			$get_client = "select * from t_clients where client_email='$client_session'";
			$run_client = mysqli_query($con,$get_client);
			$row_client = mysqli_fetch_array($run_client);
			$client_id = $row_client['client_id'];
			$get_orders = "select *  from t_client_orders where client_id='$client_id'";
			$run_orders = mysqli_query($con,$get_orders);
			$i = 0;
			while ($row_orders = mysqli_fetch_array($run_orders)){
				$order_id = $row_orders['order_id'];
				$due_montant = $row_orders['due_montant'];
				$invoice_no = $row_orders['invoice_no'];
				$qty = $row_orders['qty'];
				$num = $row_orders['num'];
				$order_date = substr($row_orders['order_date'],0,11) ;
				$order_status = $row_orders['order_stutus'];
				$i++;

				if ($order_status=='Entente') {
					$order_status = 'Non Payer';		
				}else{
					$order_status = 'Payé';
				}
			 ?>	
			<tr>
				<th>  <?php echo $i; ?>  </th>
				<td>  <?php echo $due_montant; ?>$</td>
				<td>  <?php echo $invoice_no; ?>  </td>
				<td>  <?php echo $qty; ?> </td>
				<td>  <?php echo $num; ?>  </td>
				<td>  <?php echo $order_date; ?>  </td>
				<td>  <?php echo $order_status; ?>  </td>

				<td>	
              <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn-sm"> Veillez confirmer paiement</a>
				</td>
			</tr>
		<?php } ?>			
		</tbody>
	</table>
</div>