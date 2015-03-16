<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>স্বাগতম আমাদের সাইটে</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png" />
		<link href="../css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css?v=2.1.5" media="screen" />
		<link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="../css/slicknav.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../responsive.css">
		<script src="../js/vendor/modernizr-2.6.2.min.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
		ul.pagination {
			text-align:center;
			color:#829994;
		}
		ul.pagination li {
			display:inline-flex;
			padding:0 3px;
		}
		ul.pagination a {
			color:#0d7963;
			display:inline-block;
			padding:5px 10px;
			border:1px solid #cde0dc;
			text-decoration:none;
		}
		ul.pagination a:hover, 
		ul.pagination a.current {
			background:#0d7963;
			color:#fff; 
		}
		</style>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
          google.load('visualization', '1', {'packages':['corechart']});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');    
            data.addColumn('number', 'Slices');
            data.addRows([
              ['Male', 3],
              ['Female', 1]
            ]);
            // Create the data table.
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Topping');
            data2.addColumn('number', 'Slices');
            data2.addRows([
              ['18-25', 3],
              ['26-30', 1],
              ['31-45', 6],
              ['45+', 4]
            ]);

            // Create the data table.
            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'Topping');
            data3.addColumn('number', 'Slices');
            data3.addRows([
              ['Dhaka', 3],
              ['Chittagonj', 2],
              ['Sylhet', 5],
              ['Rajshahi', 1],
              ['Jessore', 4],
              ['Barishal', 3]
            ]);

            // Set chart options
            var options = {'title':'Number Of Donor By Gender',
                           is3D : true,
						   'width':400,
                           'height':300};
            // Set chart options
            var options2 = {'title':'Number Of Donors By Age Group',
                           is3D : true,
						   'width':400,
                           'height':300};
            // Set chart options
            var options3 = {'title':'Number Of Donors By Divisions',
                           is3D : true,
						   'width':900,
                           'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);
            var chart3 = new google.visualization.PieChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);

          }
		</script>
    </head>
    <body class="index">
		<!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<header class="header_area">
			<div class="container header">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 logo">
						<p class="pull-left"><a href="index.php">Directory for Blood Donor's of Bangladesh</a></p>
						<p class="pull-right"><a href="index.php">বাংলা</a> / <a href="index.php">English</a></p>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 header_right">
						<form class="form-inline">
						  <div class="form-group">
							<input type="text" class="form-control" placeholder="Phone no">
						  </div>
						  <div class="form-group">
							<label class="sr-only" for="exampleInputPassword3">Pin</label>
							<input type="password" class="form-control" placeholder="Pin">
						  </div>
						  <button type="submit" class="btn btn-default">Login</button>
						</form>
						<p class="pull-right"><a href="index.php">প্রথম পাতা</a> | <a href="index.php">সাহায্য</a></p>
					</div>
				</div>
			</div>
		</header>