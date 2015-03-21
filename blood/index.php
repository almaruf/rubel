<?php 
/* 	set_include_path ('bdaa_php/Areas.php');
	use \BDAA;
	$areas = new \BDAA\Areas();
	$divisions = $areas->getAllDivisions(); */
	include('header.php');
	//var_dump($divisions);
	//include('address-list.php');
	include('config.php');
	//adding blood seeker
	if( isset($_POST['name']) ){
		$name = $_POST['name'];
	}
	if( isset($_POST['mobile']) ){
		$mobile = $_POST['mobile'];
	}
	if( isset($_POST['seeker_number']) ){
		$seeker_number = $_POST['seeker_number'];
	}
	if( isset($_POST['donate_blood']) ){
		$donate_blood = $_POST['donate_blood'];
	}
	if( isset($_POST['division']) ){
		$division = $_POST['division'];
	}
	if( isset($_POST['district']) ){
		$district = $_POST['district'];
	}
	if( isset($_POST['state']) ){
		$state = $_POST['state'];
	}
	
	if(isset($_POST['search_donor'])){
		$verification_code = mt_rand(100000, 999999);	//send this code to mobile phone
		if( empty($name) || empty($mobile) || empty($seeker_number) || empty($donate_blood) || empty($division) || empty($district) || empty($state) ){
			$search_donor_error = "You can not leave any field empty. Please re enter your details.";
		}else{
			try{
				if(!is_numeric($mobile)){
					throw new Exception("Please enter your mobile number correctly.");
				}
				
				$statement = $db->prepare("INSERT INTO blood_seeker VALUES(?,?,?,?,?,?,?,?,?)");
				if( $statement->execute(array('', $name, $mobile, $seeker_number, $donate_blood, $division, $district, $state, $verification_code)) ){
					$id = $db->lastInsertId();
					$success_mesg = "Your information submitted successfully.";
					if( $donate_blood == 'yes' ){
						header('refresh:3; url=verification.php?id='.$id.'&donate=1');
					}elseif( $donate_blood == 'no' ){
						header('refresh:3; url=verification.php?id='.$id.'&donate=0');
					}
				}else{
					$search_donor_error = "Sorry! Your information did not submit.";
				}
			}
			catch (Exception $e) {
				$search_donor_error = $e->getMessage();
			}
		}
	}
	
	//adding donor
	if( isset($_POST['donor_name']) ){
		$donor_name = $_POST['donor_name'];
	}
	if( isset($_POST['donor_blood_group']) ){
		$donor_blood_group = $_POST['donor_blood_group'];
	}
	if( isset($_POST['donor_mobile']) ){
		$donor_mobile = $_POST['donor_mobile'];
	}
	if( isset($_POST['donor_secondary_mobile']) ){
		$donor_secondary_mobile = $_POST['donor_secondary_mobile'];
	}
	if( isset($_POST['donor_division']) ){
		$donor_division = $_POST['donor_division'];
	}
	if( isset($_POST['donor_district']) ){
		$donor_district = $_POST['donor_district'];
	}
	if( isset($_POST['donor_state']) ){
		$donor_state = $_POST['donor_state'];
	}
	if( isset($_POST['donor_birth_year']) ){
		$donor_birth_year = $_POST['donor_birth_year'];
	}
	if( isset($_POST['donor_birth_month']) ){
		$donor_birth_month = $_POST['donor_birth_month'];
	}
	if( isset($_POST['donor_birth_day']) ){
		$donor_birth_day = $_POST['donor_birth_day'];
	}
	if( isset($_POST['donor_weight']) ){
		$donor_weight = $_POST['donor_weight'];
	}
	if( isset($_POST['donor_last_donation_year']) ){
		$donor_last_donation_year = $_POST['donor_last_donation_year'];
	}
	if( isset($_POST['donor_last_donation_month']) ){
		$donor_last_donation_month = $_POST['donor_last_donation_month'];
	}
	if( isset($_POST['donor_last_donation_day']) ){
		$donor_last_donation_day = $_POST['donor_last_donation_day'];
	}
	if( isset($_POST['add_donor_list']) ){
		if( empty($donor_name) || empty($donor_blood_group) || empty($donor_mobile) || empty($donor_secondary_mobile) || empty($donor_division) || empty($donor_district) || empty($donor_state) || empty($donor_birth_year) || empty($donor_birth_month) || empty($donor_birth_day) || empty($donor_weight) || empty($donor_last_donation_year) || empty($donor_last_donation_month) || empty($donor_last_donation_day) ){
			$error_message = "You can not leave any field empty. Please re enter your details.";
		}else{
			$birthY[] = $_POST['donor_birth_year'];
			$birthY[] = $_POST['donor_birth_month'];
			$birthY[] = $_POST['donor_birth_day'];
			$dob_donor = implode('-', $birthY);
			$don[] = $_POST['donor_last_donation_year'];
			$don[] = $_POST['donor_last_donation_month'];
			$don[] = $_POST['donor_last_donation_day'];
			$last_donation = implode('-', $don);
			
			$statement = $db->prepare("INSERT INTO blood_donor VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
			if ( $statement->execute(array('',$donor_name,$donor_blood_group,$donor_mobile,$donor_secondary_mobile,$donor_division,$donor_district,$donor_state,$dob_donor,$donor_weight,$last_donation,'no-image.gif')) ) {
				$added_donor = "Added you to donor list successfully.";
				header('refresh:3;url=index.php');
			}else{
				$error_message = "Something went wrong, you did not add to donor list.";
			}
		}
	}
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 wanted">
				<p class="title"><b>রক্ত দরকার</b></p>
				<hr />
				<br />
				<?php
					if(isset($search_donor_error)){
				?>	
				<div class="alert alert-danger alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Warning!</strong> <?php echo $search_donor_error;?>
				</div>
				<?php
					}
					if(isset($success_mesg)){
				?>	
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong><i class="fa fa-check-circle"></i> </strong> <?php echo $success_mesg;?>
				</div>
				<?php } ?>
				<form method="post">
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="name">আপনার নাম :</label>
					<input type="text" name="name" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php if(isset($name)){echo $name;}?>" placeholder="আপনার নাম">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="yourphone">আপনার মোবাইল :</label>
					<input type="text" name="mobile" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php if(isset($mobile)){echo $mobile;}?>" placeholder="আপনার মোবাইল">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donornumber">আপনার ডোনার নম্বর (যদি থাকে) :</label>
					<input type="text" name="seeker_number" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php if(isset($seeker_number)){echo $seeker_number;}?>" placeholder="আপনার ডোনার নম্বর (যদি থাকে)">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donatefuture">ভবিষ্যতে আপনিও অন্যের দরকারে রক্ত দিতে চান :</label>
						<input type="radio" name="donate_blood" id="donatefuture" value="yes" <?php if(isset($donate_blood)&&($donate_blood == 'yes')){echo 'checked';}?>> হ্যাঁ
						<input type="radio" name="donate_blood" id="donatefuture" value="no" <?php if(isset($donate_blood)&&($donate_blood == 'no')){echo 'checked';}?>> না
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার বিভাগ :</label>
					<select class="form-control" name="division" onchange="this.form.submit()">
						<option value="">আপনার বিভাগ পছন্দ করুন</option>
						<?php
							if ( isset ( $_POST['division'] ) ) {
								$div =  $_POST['division'];
								echo '<option selected value="'.$div.'">'.$div.'</option>';
							}
							$divisions = include_once('address-list.php');
							foreach($divisions as $divisionName => $divisionDetails) {
								echo '<option value="'.$divisionName.'">'.$divisionDetails['name_bn'].'</option>';
							}
						?>
					</select>
				  </div>
				  <?php
					if ( isset ( $div ) ) {
				  ?>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার জেলা :</label>
					<select class="form-control" name="district" onchange="this.form.submit()">
						<option value="">আপনার জেলা পছন্দ করুন</option>
						<?php
							if ( isset ( $_POST['district'] ) ) {
								$dist =  $_POST['district'];
								echo '<option selected value="'.$dist.'">'.$dist.'</option>';
							}
							foreach($divisions as $divisionName => $divisionDetails) {
							  if ($divisionName == $div) {
							  echo '<optgroup label="'.$div.'">';
								foreach($divisionDetails['districts'] as $districtName => $districtDetails) {
									echo '<option value="'.$districtName.'">'.$districtDetails['name_bn'].'</option>';
								}	
								echo '</optgroup>';	
								}
							}  
						?>
					</select>
				  </div>
				  <?php
					}
					if ( isset ( $dist ) ) {
				  ?>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="state">আপনার থানা :</label>
					<select class="form-control" name="state" onchange="this.form.submit()">
						<option value="">আপনার থানা পছন্দ করুন</option>
						<?php
							if ( isset ( $_POST['state'] ) ) {
								$state =  $_POST['state'];
								echo '<option selected value="'.$state.'">'.$state.'</option>';
							}
							foreach($divisions as $divisionName => $divisionDetails) {
							  foreach($divisionDetails['districts'] as $districtName => $districtDetails) {
								 if ($districtName == $dist) {
									echo '<optgroup label="'.$dist.'">';
									 foreach($districtDetails['thanas'] as $thanaName => $thanaDetails) {
										echo '<option value="'.$thanaName.'">'.$thanaDetails['name_bn'].'</option>';
									  }
									echo '</optgroup>';  
								}
							  }

							}
						?> 
					</select>
				  </div>
				  <?php } ?>
				  <button type="submit" name="search_donor" class="btn btn-info pull-right">খোঁজ করুন</button>
				</form>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 wanted donor">
				<p class="title"><b>রক্ত দিতে চাই</b></p>
				<hr />
				<br />
				<?php
					if(isset($error_message)){
				?>	
				<div class="alert alert-danger alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Warning!</strong> <?php echo $error_message;?>
				</div>
				<?php
					}
					if(isset($added_donor)){
				?>	
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong><i class="fa fa-check-circle"></i> </strong> <?php echo $added_donor;?>
				</div>
				<?php } ?>
				<form method="post" action="">
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_name">আপনার নাম :</label>
					<input type="text" name="donor_name" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php if(isset($donor_name)){echo $donor_name;}?>" placeholder="আপনার নাম">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার রক্তের গ্রুপ :</label>
					<select class="form-control" name="donor_blood_group">
						<?php if(isset($donor_blood_group)){
							echo '<option value="'. $donor_blood_group .'" selected>'. $donor_blood_group .'</option>';
						} ?>
						<option value="">পছন্দ করুন</option>
						<option value="a_positive">A+</option>
						<option value="a_negative">A-</option>
						<option value="b_positive">B+</option>
						<option value="b_negative">B-</option>
						<option value="ab_positive">AB+</option>
						<option value="ab_negative">AB-</option>
						<option value="o_positive">O+</option>
						<option value="o_negative">O-</option>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_mobile">আপনার মোবাইল :</label>
					<input type="text" name="donor_mobile" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php if(isset($donor_mobile)){echo $donor_mobile;}?>" placeholder="আপনার ডোনার নম্বর (যদি থাকে)">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_secondary_mobile">দ্বিতীয় মোবাইল নম্বর/ইমেইল অ্যাড্রেস (অ্যাকাউন্ট সিকিউরিটির জন্য) :</label>
					<input type="text" name="donor_secondary_mobile" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php if(isset($donor_secondary_mobile)){echo $donor_secondary_mobile;}?>" placeholder="someone@someone.com" style="margin-top: 10px;">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_division">আপনার বিভাগ :</label>
					<select class="form-control" name="donor_division" onchange="this.form.submit()">
						<option value="">আপনার বিভাগ পছন্দ করুন</option>
						<?php
							if ( isset ( $_POST['donor_division'] ) ) {
								$donor_div =  $_POST['donor_division'];
								echo '<option selected value="'.$donor_div.'">'.$donor_div.'</option>';
							}
							foreach($divisions as $divisionName => $divisionDetails) {
								echo '<option value="'.$divisionName.'">'.$divisionDetails['name_bn'].'</option>';
							}
						?>
					</select>
				  </div>
				  <?php
					if ( isset ( $donor_div ) ) {
				  ?>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_district">আপনার জেলা :</label>
					<select class="form-control" name="donor_district" onchange="this.form.submit()">
						<option value="">আপনার জেলা পছন্দ করুন</option>
						<?php
							if ( isset ( $_POST['donor_district'] ) ) {
								$donor_dist =  $_POST['donor_district'];
								echo '<option selected value="'.$donor_dist.'">'.$donor_dist.'</option>';
							}
							foreach($divisions as $divisionName => $divisionDetails) {
							  if ($divisionName == $donor_div) {
							  echo '<optgroup label="'.$donor_div.'">';
								foreach($divisionDetails['districts'] as $districtName => $districtDetails) {
									echo '<option value="'.$districtName.'">'.$districtDetails['name_bn'].'</option>';
								}	
								echo '</optgroup>';	
								}
							}  
						?>
					</select>
				  </div>
				  <?php
					}
					if ( isset ( $donor_dist ) ) {
				  ?>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_state">আপনার থানা :</label>
					<select class="form-control" name="donor_state" onchange="this.form.submit()">
						<option value="">আপনার থানা পছন্দ করুন</option>
						<?php
							if ( isset ( $_POST['donor_state'] ) ) {
								$donor_state =  $_POST['donor_state'];
								echo '<option selected value="'.$donor_state.'">'.$donor_state.'</option>';
							}
							foreach($divisions as $divisionName => $divisionDetails) {
							  foreach($divisionDetails['districts'] as $districtName => $districtDetails) {
								 if ($districtName == $donor_dist) {
									echo '<optgroup label="'.$donor_dist.'">';
									 foreach($districtDetails['thanas'] as $thanaName => $thanaDetails) {
										echo '<option value="'.$thanaName.'">'.$thanaDetails['name_bn'].'</option>';
									  }
									echo '</optgroup>';  
								}
							  }

							}
						?> 
					</select>
				  </div>
				  <?php } ?>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_birth_year">জন্ম তারিখ :</label>
					<select class="form-control dob" name="donor_birth_year">
						<?php if(isset($donor_birth_year) && ($donor_birth_year != '')){
							echo '<option value="'. $donor_birth_year .'" selected>'. $donor_birth_year .'</option>';
						} ?>
						<option value="">বছর</option>
						<?php
							for($yr = 0; $yr <= 115; $yr++){
								if($yr < 10){
									echo '<option value="190'. $yr .'">190'. $yr .'</option>';
								}elseif($yr <= 99){
									echo '<option value="19'. $yr .'">19'. $yr .'</option>';
								}else{
									$yrN = substr($yr, 1,2);
									echo '<option value="20'. $yrN .'">20'. $yrN .'</option>';
								}
							}
						?>
					</select>
					<select class="form-control dob" name="donor_birth_month">
						<?php if(isset($donor_birth_month) && ($donor_birth_year != '')){
							echo '<option value="'. $donor_birth_month .'" selected>'. $donor_birth_month .'</option>';
						} ?>
						<option value="">মাস</option>
						<?php
							for($mnth = 1; $mnth <= 12; $mnth++){
								echo '<option value="'. $mnth .'">'. $mnth .'</option>';
							}
						?>
					</select>
					<select class="form-control dob" name="donor_birth_day">
						<?php if(isset($donor_birth_day) && ($donor_birth_year != '')){
							echo '<option value="'. $donor_birth_day .'" selected>'. $donor_birth_day .'</option>';
						} ?>
						<option value="">দিন</option>
						<?php
							for($dy = 1; $dy <= 31; $dy++){
								echo '<option value="'. $dy .'">'. $dy .'</option>';
							}
						?>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_weight">আপনার ওজন (কেজি) :</label>
					<input type="text" name="donor_weight" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php if(isset($donor_weight)){echo $donor_weight;}?>" placeholder="আপনার ওজন">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donor_last_donation_year">শেষ কবে রক্ত দিয়েছেন :</label>
					<select class="form-control dob" name="donor_last_donation_year">
						<?php if(isset($donor_last_donation_year) && ($donor_birth_year != '')){
							echo '<option value="'. $donor_last_donation_year .'" selected>'. $donor_last_donation_year .'</option>';
						} ?>
						<option value="">বছর</option>
						<?php
						for($yr = 0; $yr <= 5; $yr++){
							echo '<option value="201'. $yr .'">201'. $yr .'</option>';
						}
						?>
					</select>
					<select class="form-control dob" name="donor_last_donation_month">
						<?php if(isset($donor_last_donation_month) && ($donor_birth_year != '')){
							echo '<option value="'. $donor_last_donation_month .'" selected>'. $donor_last_donation_month .'</option>';
						} ?>
						<option value="">মাস</option>
						<?php
							for($mnth = 1; $mnth <= 12; $mnth++){
								echo '<option value="'. $mnth .'">'. $mnth .'</option>';
							}
						?>
					</select>
					<select class="form-control dob" name="donor_last_donation_day">
						<?php if(isset($donor_last_donation_day) && ($donor_birth_year != '')){
							echo '<option value="'. $donor_last_donation_day .'" selected>'. $donor_last_donation_day .'</option>';
						} ?>
						<option value="">দিন</option>
						<?php
							for($dy = 1; $dy <= 31; $dy++){
								echo '<option value="'. $dy .'">'. $dy .'</option>';
							}
						?>
					</select>
				  </div>
				  <button type="submit" name="add_donor_list" class="btn btn-info pull-right">তালিকাভূক্ত হোন</button>
				</form>
			</div>
		</div>
	</div>			
	
<?php include('footer.php');?>