<?php
$p_title = 'Event Ticket | ChES';
include('includes/header.html');?>

<style>
@media print {
	header, footer * {
		visibility: hidden;
	}
}

</style>

<script type="text/javascript">
	function printf(){
		
		window.print();
	}
	
	
</script>

<div class="container">
  <div Id="ticket" class="panel panel-default">
	  <table class="table table-bordered">
		  <thead>
			  <tr>
				  <img src="includes/head.jpg" style="width: 100%;">
			  </tr>
			  <tr>
				  <th></th>
				  <th>Participant Details</th>
				  <th></th>
				  <th>Print</th>
			  </tr>
		  </thead>
		  <tbody>
			  	<tr>
					<td><img src="<?php echo $_GET['location']; ?>" style="height: 150px; width: 125px;"></td>
					<td>Name:<br><hr style=" margin: 10px 0px 0px 0px;">E-mail:<br><hr style=" margin: 10px 0px 0px 0px;">Phone:<br><hr style=" margin: 10px 0px 0px 0px;">Sex:</td>
					<td><?php echo $_GET['first'].' '.$_GET['last']; ?><br><hr style=" margin: 10px 0px 0px 0px;"><?php echo $_GET['email']; ?><br><hr style=" margin: 10px 0px 0px 0px;"><?php echo $_GET['phone']; ?><br><hr style=" margin: 10px 0px 0px 0px;"><?php echo $_GET['sex']; ?></td>
					<td><a type="button" class="btn btn-success" onclick="printf()">Print</a></td>
			  </tr>
			  <tr><td></td><td><strong>Event Details</strong></td><td></td><td><strong>Status</strong></td></tr>
			  <tr>
				  <td><img src="<?php echo 'admin-panel/examples/'.$_GET['file']; ?>" style="height: 150px; width: 200px;"></td>
				  <td>ID Name: <?php echo $_GET['eid'].' '.$_GET['ename']; ?><br><hr style=" margin: 10px 0px 0px 0px;">Date | Time: <?php echo $_GET['edate'].'|'.$_GET['etime']; ?><br><hr style=" margin: 10px 0px 0px 0px;">Venue: <?php echo $_GET['evenue']; ?></td>
				  <td>Quantity: <?php echo $_GET['qty'].'<br>'; for($i=0;$i<$_GET['qty'];$i++){
							echo"<input type='checkbox' />&nbsp;";
						} ?><br><hr style=" margin: 10px 0px 0px 0px;"> Transactio ID: <?php echo $_GET['tid']; ?><br><hr style=" margin: 10px 0px 0px 0px;">Total Bill: &#x20B9;<?php echo $_GET['amt']; ?></td>
				  <td><?php echo $_GET['status']; ?></td>
			  </tr>
			  <tr><p>Note: Show this ticket at the PR desk to avail entry. Avoid any damage to the ticket. PRINT it or keep PDF with you.</p></tr>
		  </tbody>
	  </table>
  </div>      
</div>
<?php include('includes/footer.html');?>