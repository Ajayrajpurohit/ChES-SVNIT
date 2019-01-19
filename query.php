<?php 
include('mysqli_connect.php');

if($_SERVER["REQUEST_METHOD"] == 'GET'){
		$id = $_GET['id'];
		$name = $_GET['name'];
		$email = $_GET['email'];
		$que = $_GET['que'];
		$phone = $_GET['phone'];
		$quer = mysqli_query($dbc,"INSERT INTO fandq (uid, name, email, phone, fandq, date) VALUES ('$id','$name','$email','$phone','$que', NOW())");
		echo"<script>alert('Your Query is submitted successfully. Our team-mate will contact soon.');</script>";
		header("Location: dash.php");
	}


?>