<?php
session_start();
include("config.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Events</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

			<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/vicons-font.css" />
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<link rel="stylesheet" type="text/css" href="css/buttons.css" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--===============================================================================================-->
<style>
 body{
 /*
 background-image: url("eventsimg.jpg");
  background-size: cover;  or contain depending on what you want
  background-position: center center;
  background-repeat: no-repeat;
 */
}
</style>
</head>
<body>
	<header>
	<div class="codrops-links">
					<a class="codrops-icon codrops-icon--prev" href="members.php" title="Home"><span>Home</span></a>
					<a class="codrops-icon codrops-icon--drop" href="" title="I'm feeling lucky"><span>I'm feeling lucky</span></a>
				</div>
			</header>
	<div class="limiter">
		
			<div class="wrap-table100">
			
				<div class="table100 ver3 m-b-110">
					<div class="table100-head">

						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Name</th>
									<th class="cell100 column2">Date</th>
									<th class="cell100 column3">Expenditure</th>
									<th class="cell100 column4">Location</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
					
									<?php $Resid=$_SESSION["Resident_ID"];
$query5 = "select events.name,events.date,events.expenditure,events.location from resident natural  join res_eve join events on events.name=res_eve.ename and res_eve.date=events.date and res_eve.location=events.location where res_eve.Resident_ID= '$Resid';";
$result5 = pg_query($query5)
or die ("Could not match data because ".pg_last_error());
$num_rows = pg_num_rows($result5);
if ($num_rows <= 0) { 
echo "Sorry, there are no records for this.<br>";
echo "<a href=members.html>Try again</a>";
exit; 
} else {

  									while($row5 = pg_fetch_row($result5)) {
 									 echo '<tr class="row100 body">';
 									 ?>
   									<td class="cell100 column1"><?php echo $row5[0];?></td>
    								<td class="cell100 column2"><?php echo $row5[1];?></td>
    								<td class="cell100 column3"><?php echo $row5[2];?></td>
    								<td class="cell100 column4"><?php echo $row5[3];?></td>
									<?php
									echo '</tr>';
  									}
  								}?>
							

							</tbody>
						</table>
					</div>
				</div>
			</div>

	</div>


<!--===============================================================================================-->	

<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
