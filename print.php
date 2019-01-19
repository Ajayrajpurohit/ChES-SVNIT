<?php
$p_title = 'Siphon Ticket | ChES';
include('includes/header.html');
include('mysqli_connect.php');

if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$q = mysqli_query($dbc, "SELECT * FROM siphon_register WHERE u_id=$id ORDER BY date DESC");
}
?>
<style>
@media print {
	header, footer * {
		visibility: hidden;
	}
}

</style>

<script>
	window.print();
</script>
<div class="container">
  <div class="panel panel-default">
	  <table class="table table-bordered">
		  <thead>
			  <tr>
				  <img src="includes/head.jpg" style="width: 100%;">
			  </tr>
			  <tr>
				  <th></th>
				  <th>Participant Details</th>
				  <th></th>
				  <th></th>
			  </tr>
		  </thead>
		  <tbody>
			  	<tr>
					<td><img src="<?php echo $_GET['location']; ?>" style="height: 150px; width: 125px;"></td>
					<td>Name:<br><hr style=" margin: 10px 0px 0px 0px;">E-mail:<br><hr style=" margin: 10px 0px 0px 0px;">Phone:<br><hr style=" margin: 10px 0px 0px 0px;">Sex:</td>
					<td><?php echo $_GET['first'].' '.$_GET['last']; ?><br><hr style=" margin: 10px 0px 0px 0px;"><?php echo $_GET['email']; ?><br><hr style=" margin: 10px 0px 0px 0px;"><?php echo $_GET['phone']; ?><br><hr style=" margin: 10px 0px 0px 0px;"><?php echo $_GET['sex']; ?></td>
					<td></td>
			  </tr>
			  <tr><td></td><td><strong>Event Details</strong></td><td></td><td><strong>Status</strong></td></tr>
			  <?php while($data = mysqli_fetch_row($q)){ 
					$q2 = mysqli_query($dbc, "SELECT * FROM siphon WHERE id='$data[1]'");
					$data2 = mysqli_fetch_row($q2);
					
				echo "
			  <tr>
				  <td><img src='admin-panel/examples/$data2[7]' style='height: 150px; width: 200px;'></td>
				  <td>ID Name: $data2[0] $data2[1] <br><hr style=' margin: 10px 0px 0px 0px;'>Date | Time: $data2[2] | $data2[3] <br><hr style=' margin: 10px 0px 0px 0px;'>Venue: $data2[4] </td>
				  <td>Status: $data[7] <br><hr style=' margin: 10px 0px 0px 0px;'> Transactio ID: $data[4] <br><hr style=' margin: 10px 0px 0px 0px;'>Total Bill: &#x20B9;$data[3] </td>
				  <td>Quantity: $data[2] <br>"; 
				for($i=0;$i<$data[2];$i++){echo"<input type='checkbox' /> &nbsp;";} 
				echo"</td>
				</tr>";
			   } ?>
		  </tbody>
	  </table>
  </div>      
</div>
<?php include('includes/footer.html');?>