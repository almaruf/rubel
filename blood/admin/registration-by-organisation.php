<?php 
	include('header.php');
	include('../classes/Donor.php');
	include('config.php');
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
				<form method="post" class="form-inline pull-right reg_by_org">
				  <div class="form-group clearfix">
					<select class="form-control" name="message_admin">
						<option value="">পছন্দ করুন</option>
						<option value="">Sondhani</option>
						<option value="">Curry Hunter</option>
						<option value="">Devs</option>
					</select>
				  </div>
				  <button type="submit" name="ask" class="btn btn-info">See Report</button>
				</form>
				<div class="clearfix"></div>
				<div id="curve_chart" style="width: 100%; height: 500px"></div>
	
				<script type="text/javascript"
					  src="https://www.google.com/jsapi?autoload={
						'modules':[{
						  'name':'visualization',
						  'version':'1',
						  'packages':['corechart']
						}]
					  }"></script>

				<script type="text/javascript">
				  google.setOnLoadCallback(drawChart);

				  function drawChart() {
					var data = google.visualization.arrayToDataTable([
					  ['Month', 'Registration'],
					  ['January',  70],
					  ['February',  190],
					  ['March',  220],
					  ['April',  350],
					  ['May',  550]
					]);

					var options = {
					  title: 'Registration By Organisation',
					  curveType: 'function',
					  legend: { position: 'right' }
					};

					var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

					chart.draw(data, options);
				  }
				</script>
			</div>	
		</div>
	</div>			
	
<?php include('footer.php');?>