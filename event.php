<?php
$p_title = "Events | ChES";
include('includes/header.html');
include('mysqli_connect.php');
require('includes/config.inc.php');



if (isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	$query = mysqli_query($dbc,"SELECT * FROM users where id = $id");
	
	$row1 = mysqli_fetch_row($query);
	if(isset($_GET['deluser'])){
		$ide = $_GET['deluser'];
		
		$query2 = mysqli_query($dbc,"SELECT * FROM events WHERE id = $ide");
		$row2 = mysqli_fetch_row($query2);
	}
	
}else{  }
?>
<style>
	.img-thumbnail{
		height: 250px;
		width: 350px;
		
	}
	
	.col-sm-4 {
		padding-top: 25px;
		padding-bottom: 10px;
	}
	
	.text-block-right {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: black;
    color: white;
}
	
	.tile{
	width: 100%;
	background:#fff;
	border-radius:5px;
	box-shadow:0px 2px 3px -1px rgba(151, 171, 187, 0.7);
	float:left;
  	transform-style: preserve-3d;
  	margin: 10px 5px;

}

.header{
	border-bottom:1px solid #ebeff2;
	padding:19px 0;
	text-align:center;
	color:#59687f;
	font-size:600;
	font-size:19px;	
	position:relative;
}

.banner-img {
	padding: 5px 5px 0;
}

.banner-img img {
	width: 100%;
	border-radius: 5px;
}

.dates{
	border:1px solid #ebeff2;
	border-radius:5px;
	padding:20px 0px;
	margin:10px 20px;
	font-size:16px;
	color:#5aadef;
	font-weight:600;	
	overflow:auto;
}
.dates div{
	float:left;
	width:50%;
	text-align:center;
	position:relative;
}
.dates strong,
.stats strong{
	display:block;
	color:#adb8c2;
	font-size:14px;
	font-weight:600;
}
.dates span{
	width:1px;
	height:40px;
	position:absolute;
	right:0;
	top:0;	
	background:#ebeff2;
}
.stats{
	border-top:1px solid #ebeff2;
	background:#f7f8fa;
	overflow:auto;
	padding:15px 0;
	font-size:12px;
	color:#59687f;
	font-weight:100;
	border-radius: 0 0 5px 5px;
}
.stats div{
	border-right:1px solid #ebeff2;
	width: 100%;
	float:left;
	text-align:center
}
	div.footer {
	text-align: right;
	position: relative;
	margin: 20px 5px;
}
	
	
	
</style>

<script type="text/javascript">
	
	
function deluser(id, title)
  {

	 window.location.href = 'event_register.php?deluser=' + id;
  }
    	
</script>
<div class="container-fluid">
	
	<h2>Events Conducted Throughout the Year</h2>
	
	<div class="row">
		<?php
		
		$query = mysqli_query($dbc, "SELECT * FROM events WHERE del=1 ORDER BY Id DESC");
		while($data = mysqli_fetch_row($query)){
		echo"<div class='col-md-4'>";
                echo"<div class='tile'>";
                    echo "<div class='wrapper' style='width:100%'>
                        <div class='header'>$data[1]</div>";

                       echo "<div class='banner-img'>
                            <img style='width: 100%; height:250px;' src='admin-panel/examples/$data[7]'>
                        </div>";

                        echo "<div class='dates'>
                            <div class='start'>
                                <strong>DATE</strong> $data[2]
                                <span></span>
                            </div>
                            <div class='ends'>
                                <strong>TIME</strong> $data[3]
                            </div>
                        </div>";

                        echo "<div class='stats'>

                            <div>
                                <strong>VENUE</strong> $data[4]
                            </div>

                         </div>";

                        echo "<div class='stats'>

                            <div>
                                <strong>Description</strong> $data[5]
                            </div>

                       </div>";

                        echo "<div class='footer'>"; ?>
							
									<a href="javascript:deluser('<?php echo $data[0];?>','<?php echo $data[1];?>')" class='btn btn-success'  >Register</a>
                          <?php echo"  <a href='$data[8]' target='_blank' class='btn btn-info'>Details</a>
								
                        </div>
                    </div>
                </div> 
            </div>";
		}?>
	</div>
</div>
<?php include('includes/footer.html'); ?>