<?php 
	include('header.php');
	include('../classes/Donor.php');
	include('../config.php');
	$statement1 = $db->prepare("SELECT * FROM blood_donor");
	$statement1->execute();
	$tot_donor = $statement1->rowCount();
	$statement = $db->prepare("SELECT * FROM blood_donor ORDER BY id DESC LIMIT 10");
	$statement->execute();
	$donors = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 admin_sidebar_left">
				<br />
				<br />
				<br />
				<ul>
					<li><a href="">Home</a></li>
					<li><a href="">Report</a>
						<ul>
							<li><a href="">Donor overall report</a></li>
							<li><a href="">Donor overall report</a></li>
							<li><a href="">Donor overall report</a></li>
						</ul>
					</li>
				</ul>
				<div class="clearfix"></div>
				<br />
				<br />
				<br />
				<br />
				<div class="well">
					<p>You have added <?php echo $tot_donor;?> donors</p>
					<p>You have managed <?php echo $tot_donor;?> donors</p>
					<p>You have donated 0 times this year</p>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 admin_sidebar_right">
				<div id="chart_div" class="pull-left"></div>
				<div id="chart_div2" class="pull-left"></div>
				<div id="chart_div3" class="pull-left"></div>
			</div>	
		</div>
	</div>			
	
<?php include('footer.php');?>