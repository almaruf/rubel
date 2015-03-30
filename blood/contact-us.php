<?php 
	include_once (realpath (dirname(__FILE__) . '/../../bangladesh-administrative-areas/bdaa_php/Areas.php'));
	use \BDAA\Areas;
	$areas = new \BDAA\Areas();
	$divisions = $areas->getAllDivisions();
	include('header.php');
	include('config.php');
	if( isset($_POST['your_name']) ){
		$your_name = $_POST['your_name'];
	}
	if( isset($_POST['your_email']) ){
		$your_email = $_POST['your_email'];
	}
	if( isset($_POST['your_phone']) ){
		$your_phone = $_POST['your_phone'];
	}
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 wanted">
				<p class="title"><b>যোগাযোগ করুনঃ</b></p>
				<hr />
				<br />
				<form method="post" action="">
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_name">আপনার নাম :</label>
					<input type="text" name="your_name" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php if(isset($your_name)){echo $your_name;}?>" placeholder="আপনার নাম">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_name">আপনার ইমেইল :</label>
					<input type="text" name="your_email" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php if(isset($your_email)){echo $your_email;}?>" placeholder="আপনার ইমেইল">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_name">আপনার ফোন :</label>
					<input type="text" name="your_phone" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php if(isset($your_phone)){echo $your_phone;}?>" placeholder="আপনার ফোন">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_division">আপনার বিভাগ :</label>
					<select class="form-control" name="donor_division" onchange="this.form.submit()">
						<option value="">আপনার বিভাগ পছন্দ করুন</option>
						<?php
							foreach($divisions as $division) {
								$donor_tmpr = null;
								if ( isset ( $_POST['donor_division'] ) && ( $division->getName() == $_POST['donor_division'] )) {
									$donor_tmpr = 'selected';
									$donor_selected_division = $division;
								}
								echo '<option value="'.$division->getName().'"  '. $donor_tmpr .'>'.$division->getNameBn().'</option>'; 
							}
						?>
					</select>
					
				  </div>
				  <?php
					if ( isset ( $donor_selected_division ) ) {
				  ?>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_district">আপনার জেলা :</label>
					<select class="form-control" name="donor_district" onchange="this.form.submit()">
						<option value="">আপনার জেলা পছন্দ করুন</option>
						<?php
							foreach($donor_selected_division->getDistricts() as $district) {
								$tmpr = null;
								if ( isset ( $_POST['donor_district'] ) && ($_POST['donor_district'] == $district->getName())) {
									$tmpr = 'selected';
									$donor_selected_district = $district;
								}
								echo '<option '. $tmpr . ' value="'.$district->getName().'">'.$district->getNameBn().'</option>';
							}
						?>
					</select>
				  </div>
				  <?php
					}
					if ( isset ( $donor_selected_district ) ) {
				  ?>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_upazila">আপনার থানা :</label>
					<select class="form-control" name="donor_upazila" onchange="this.form.submit()">
						<option value="">আপনার থানা পছন্দ করুন</option>
						<?php
							foreach ( $donor_selected_district->getUpazilas() as $upozila ) {
								$tmpr = null;
								if ( ( isset ($_POST['donor_upazila']) ) && ($upozila->getName() == $_POST['donor_upazila']) ) {
									$tmpr = 'selected';
								}
								echo '<option '. $tmpr .' value="'. $upozila->getName() .'">'. $upozila->getNameBn() .'</option>';
							}
						?> 
					</select>
				  </div>
				  <?php } ?>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6 text-right" for="donor_name" style="text-align:left">আপনার মন্তব্য :</label>
					<textarea name="your_comment" class="form-control" rows="8" placeholder="আপনার মন্তব্য"></textarea>
				  </div>
				  <button type="submit" name="send_query" class="btn btn-info pull-right">পাঠান</button>
				</form>  
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 wanted donor">
				<br />
				<br />
				<br />
				<br />
				<img src="img/contact-us.jpg" alt="" />
			</div>
		</div>
	</div>			
	
<?php include('footer.php');?>