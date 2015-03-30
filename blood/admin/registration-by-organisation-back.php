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
	
	
	/* 
  $con = mysql_connect($dbserver,$dbuser,$dbpass);
  if (!$con){ die('Could not connect: ' . mysql_error()); }
  mysql_select_db($dbname, $con);
  $result = mysql_query($sql_query);

  echo "{ \"cols\": [ {\"id\":\"\",\"label\":\"Nickname\",\"pattern\":\"\",\"type\":\"number\"}, {\"id\":\"\",\"label\":\"Name\",\"pattern\":\"\",\"type\":\"number\"}, {\"id\":\"\",\"label\":\"Label\",\"pattern\":\"\",\"type\":\"number\"}, {\"id\":\"\",\"label\":\"Hover\",\"pattern\":\"\",\"type\":\"number\"}, {\"id\":\"\",\"label\":\"PointSum\",\"pattern\":\"\",\"type\":\"number\"} ], \"rows\": [ ";

  $total_rows = mysql_num_rows($result);
  while($row = mysql_fetch_array($result)){
    echo "{\"c\":[{\"v\":\"" . $row['nickname'] . "\",\"f\":null},{\"v\":\"" . $row['name'] . "\",\"f\":null},{\"v\":\"" . $row['label'] . "\",\"f\":null},{\"v\":\"" . $row['hover'] . "\",\"f\":null},{\"v\":\"" . $row['pointsum'] . "\",\"f\":null}]}, ";
  }

  $result = mysql_query($sql_query2);
  while($row = mysql_fetch_array($result)){
    echo "{\"c\":[{\"v\":\"" . $row['nickname'] . "\",\"f\":null},{\"v\":\"" . "\",\"f\":null},{\"v\":\"" . "\",\"f\":null},{\"v\":\" Total \",\"f\":null},{\"v\":\"" . $row['total'] . "\",\"f\":null}]}";
  }

  echo " ] }";
  mysql_close($con); */
	
?>
	<div class="container">
		
	
		<script type="text/javascript">

		// Load the Visualization API and the piechart,table package.
		google.load('visualization', '1', {'packages':['corechart','table']});

		function drawItems(num) {
		var jsonPieChartData = $.ajax({
		  url: "getpiechartdata.php",
		  data: "q="+num,
		  dataType:"json",
		  async: false
		}).responseText;

		var jsonTableData = $.ajax({
		  url: "gettabledata.php",
		  data: "q="+num,
		  dataType:"json",
		  async: false
		}).responseText;

		// Create our data table out of JSON data loaded from server.
		var piechartdata = new google.visualization.DataTable(jsonPieChartData);
		var tabledata = new google.visualization.DataTable(jsonTableData);

		// Instantiate and draw our pie chart, passing in some options.
		var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		chart.draw(piechartdata, {
		  width: 700,
		  height: 500,
		  chartArea: { left:"5%",top:"5%",width:"90%",height:"90%" }
		});

		// Instantiate and draw our table, passing in some options.
		var table = new google.visualization.Table(document.getElementById('table_div'));
		table.draw(tabledata, {showRowNumber: true, alternatingRowStyle: true});
		}

		</script>

		<form>
		<select name="users" onchange="drawItems(this.value)">
		<option value="">Select a dogg:</option>
		<?php
		$dbuser="database_username";
		$dbname="database_name";
		$dbpass="database_password";
		$dbserver="database_server";
		// Make a MySQL Connection
		$con = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
		mysql_select_db($dbname) or die(mysql_error());
		// Create a Query
		$sql_query = "SELECT id, nickname FROM user ORDER BY nickname ASC";
		// Execute query
		$result = mysql_query($sql_query) or die(mysql_error());
		while ($row = mysql_fetch_array($result)){
		echo '<option value='. $row['id'] . '>'. $row['nickname'] . '</option>';
		}
		mysql_close($con);
		?>
		</select>
		</form>
		<div id="chart_div"></div>
		<div id="table_div"></div>

		
		
		
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
					
					var jsonPieChartData = $.ajax({
					  url: "getpiechartdata.php",
					  data: "q="+num,
					  dataType:"json",
					  async: false
					}).responseText;

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