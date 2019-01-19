<?php $p_title = "Quiz! | ChES";
include("includes/header.html");
?>

<div class=" container panel panel-default" style="margin-top: 18px;">
	<div class="panel panel-heading">ChES Quizes...</div>
	<div class="panel panel-body">
		  <table class="table">
    <thead>
      <tr>
		  <th>Sr no.</th>
        <th>Quiz name</th>
        <th>Questions</th>
        <th>Time</th>
		  <th>Play!!<th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
	</div>
	<?php
	if(!isset($_SESSION['id'])){
	echo'<div class="panel panel-footer">
	<p>Note: Playing above quizes will not make your score countable, login to make it worthy. These are just for Guest users.</p>
	</div>';} ?>
</div>

<?php include("includes/footer.html");
?>