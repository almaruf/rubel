<?php 
	include('header.php');
	//include('address-list.php');
	include('config.php');
	if(isset($_POST['search_donor'])){
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$seeker_number = $_POST['seeker_number'];
		if(isset ( $_POST['donate_blood'] )) {
			$donate_blood = $_POST['donate_blood'];
		}
		$district = $_POST['district'];
		$state = $_POST['state'];
		$seeker_union = $_POST['seeker_union'];
		$seeker_word = $_POST['seeker_word'];
		$verification_code = mt_rand(100000, 999999);	//send this code to mobile phone
		if( empty($name) || empty($mobile) || empty($seeker_number) || empty($donate_blood) || empty($district) || empty($state) || empty($seeker_union) || empty($seeker_word) ){
			$search_donor_error = "You can not leave any field empty. Please re enter your details.";
		}else{
			try{
				if(!is_numeric($mobile)){
					throw new Exception("Please enter your mobile number correctly.");
				}
				
				$statement = $db->prepare("INSERT INTO blood_seeker VALUES(?,?,?,?,?,?,?,?,?,?)");
				if( $statement->execute(array('', $name, $mobile, $seeker_number, $donate_blood, $district, $state, $seeker_union, $seeker_word, $verification_code)) ){
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
	
	
	if( isset($_POST['add_donor_list']) ){
		try{
			if ( empty( $_POST['name'] ) ) {
				throw new Exception ("Name can be blank.");
			}
			if ( empty( $_POST['blood_group'] ) ) {
				throw new Exception ("Blood group can be blank.");
			}
			if ( empty( $_POST['mobile'] ) ) {
				throw new Exception ("Mobile can be blank.");
			}
			if ( empty( $_POST['secondary_mobile'] ) ) {
				throw new Exception ("Secondary mobile can be blank.");
			}
			if ( empty( $_POST['district'] ) ) {
				throw new Exception ("District can be blank.");
			}
			if ( empty( $_POST['state'] ) ) {
				throw new Exception ("State can be blank.");
			}
			if ( empty( $_POST['donor_union'] ) ) {
				throw new Exception ("Union can be blank.");
			}
			if ( empty( $_POST['word'] ) ) {
				throw new Exception ("Word can be blank.");
			}
			if ( empty( $_POST['birth_year'] ) ) {
				throw new Exception ("Birth year can be blank.");
			}
			if ( empty( $_POST['birth_month'] ) ) {
				throw new Exception ("Birth month can be blank.");
			}
			if ( empty( $_POST['birth_day'] ) ) {
				throw new Exception ("Birth day can be blank.");
			}
			if ( empty( $_POST['weight'] ) ) {
				throw new Exception ("Weight can be blank.");
			}
			if ( empty( $_POST['donation_year'] ) ) {
				throw new Exception ("Donation year can be blank.");
			}
			if ( empty( $_POST['donation_month'] ) ) {
				throw new Exception ("Donation month can be blank.");
			}
			if ( empty( $_POST['donation_day'] ) ) {
				throw new Exception ("Donation day can be blank.");
			}
			
			$name = $_POST['name'];
			$blood_group = $_POST['blood_group'];
			$mobile = $_POST['mobile'];
			$secondary_mobile = $_POST['secondary_mobile'];
			$district = $_POST['district'];
			$state = $_POST['state'];
			$donor_union = $_POST['donor_union'];
			$word = $_POST['word'];
			$birthY[] = $_POST['birth_year'];
			$birthY[] = $_POST['birth_month'];
			$birthY[] = $_POST['birth_day'];
			$dob_donor = implode('-', $birthY);
			$weight = $_POST['weight'];
			$don[] = $_POST['donation_year'];
			$don[] = $_POST['donation_month'];
			$don[] = $_POST['donation_day'];
			$last_donation = implode('-', $don);
			
			$statement = $db->prepare("INSERT INTO blood_donor VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
			if ( $statement->execute(array('',$name,$blood_group,$mobile,$secondary_mobile,$district,$state,$donor_union,$word,$dob_donor,$weight,$last_donation,'no-image.gif')) ) {
				$added_donor = "Added you to donor list successfully.";
				header('refresh:3;url=index.php');
			}else{
				$error_message = "Something went wrong, you did not add to donor list.";
			}
		}
		catch (Exception $e) {
			$error_message = $e->getMessage();
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
					<input type="text" name="name" class="col-lg-6 col-md-6 col-sm-6 form-control" id="name" placeholder="আপনার নাম">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="yourphone">আপনার মোবাইল :</label>
					<input type="text" name="mobile" class="col-lg-6 col-md-6 col-sm-6 form-control" id="yourphone" placeholder="আপনার মোবাইল">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donornumber">আপনার ডোনার নম্বর (যদি থাকে) :</label>
					<input type="text" name="seeker_number" class="col-lg-6 col-md-6 col-sm-6 form-control" id="donornumber" placeholder="আপনার ডোনার নম্বর (যদি থাকে)">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donatefuture">ভবিষ্যতে আপনিও অন্যের দরকারে রক্ত দিতে চান :</label>
						<input type="radio" name="donate_blood" id="donatefuture" value="yes"> হ্যাঁ
						<input type="radio" name="donate_blood" id="donatefuture" value="no"> না
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার জেলা :</label>
					<select class="form-control" name="district" onchange="this.form.submit()">
						<option value="">আপনার জেলা পছন্দ করুন</option>
						<?php
							if ( isset ( $_POST['district'] ) ) {
								$dist =  $_POST['district'];
								echo '<option selected value="'.$dist.'">'.$dist.'</option>';
							}
							$divisions = include_once('address-list.php');
							foreach($divisions as $divisionName => $divisionDetails) {
								echo '<option value="'.$divisionName.'">'.$divisionDetails['name_bn'].'</option>';
							}
						?>
					</select>
				  </div>
				  <?php
					if ( isset( $_POST['district'] ) ) {
						$dist = $_POST['district'];
				  ?>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার থানা :</label>
					<select class="form-control" name="state">
						<option value="">আপনার থানা পছন্দ করুন</option>
						<?php
							foreach($divisions as $divisionName => $divisionDetails) {
							  foreach($divisionDetails['districts'] as $districtName => $districtDetails) {
								echo '<optgroup label="'.$districtDetails['name_bn'].'">';
								 foreach($districtDetails['thanas'] as $thanaName => $thanaDetails) {
									echo '<option value="'.$thanaName.'">'.$thanaDetails['name_bn'].'</option>';
								  }
								echo '</optgroup>';  
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
					<label class="col-lg-6 col-md-6 col-sm-6" for="name">আপনার নাম :</label>
					<input type="text" name="name" class="col-lg-6 col-md-6 col-sm-6 form-control" placeholder="আপনার নাম">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার রক্তের গ্রুপ :</label>
					<select class="form-control" name="blood_group">
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
					<label class="col-lg-6 col-md-6 col-sm-6" for="donornumber">আপনার মোবাইল :</label>
					<input type="text" name="mobile" class="col-lg-6 col-md-6 col-sm-6 form-control" placeholder="আপনার ডোনার নম্বর (যদি থাকে)">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donornumber">দ্বিতীয় মোবাইল নম্বর/ইমেইল অ্যাড্রেস (অ্যাকাউন্ট সিকিউরিটির জন্য) :</label>
					<input type="text" name="secondary_mobile" class="col-lg-6 col-md-6 col-sm-6 form-control" placeholder="someone@someone.com" style="margin-top: 10px;">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার জেলা :</label>
					<select class="form-control" name="district">
						<option value="">আপনার জেলা পছন্দ করুন</option>
						<?php
							foreach($divisions as $divisionName => $divisionDetails) {
								echo '<optgroup label="'.$divisionName.'">';
								foreach($divisionDetails['districts'] as $districtName => $districtDetails) {
									echo '<option value="'.$districtName.'">'.$districtDetails['name_bn'].'</option>';
								}
								echo '</optgroup>';
							}
						?>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার থানা :</label>
					<select class="form-control" name="state">
						<option value="">আপনার থানা পছন্দ করুন</option>
						<?php
							foreach($divisions as $divisionName => $divisionDetails) {
							  foreach($divisionDetails['districts'] as $districtName => $districtDetails) {
								echo '<optgroup label="'.$districtDetails['name_bn'].'">';
								 foreach($districtDetails['thanas'] as $thanaName => $thanaDetails) {
									echo '<option value="'.$thanaName.'">'.$thanaDetails['name_bn'].'</option>';
								  }
								echo '</optgroup>';  
							  }

							}
						?>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">ইউনিয়ন/সিটি কর্পোরেশন :</label>
					<select class="form-control" name="donor_union">
						<option value="">পছন্দ করুন</option>
						<?php
							foreach($divisions as $divisionName => $divisionDetails) {
							  foreach($divisionDetails['districts'] as $districtName => $districtDetails) {
								echo '<optgroup label="'.$districtDetails['name_bn'].'">';
								 foreach($districtDetails['thanas'] as $thanaName => $thanaDetails) {
									echo '<option value="'.$thanaName.'">'.$thanaDetails['name_bn'].'</option>';
								  }
								echo '</optgroup>';  
							  }

							}
						?>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="word">আপনার ওয়ার্ড :</label>
					<input type="text" name="word" class="col-lg-6 col-md-6 col-sm-6 form-control" placeholder="আপনার ওয়ার্ড">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">জন্ম তারিখ :</label>
					<select class="form-control dob" name="birth_year">
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
					<select class="form-control dob" name="birth_month">
						<option value="">মাস</option>
						<?php
							for($mnth = 1; $mnth <= 12; $mnth++){
								echo '<option value="'. $mnth .'">'. $mnth .'</option>';
							}
						?>
					</select>
					<select class="form-control dob" name="birth_day">
						<option value="">দিন</option>
						<?php
							for($dy = 1; $dy <= 31; $dy++){
								echo '<option value="'. $dy .'">'. $dy .'</option>';
							}
						?>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="word">আপনার ওজন (কেজি) :</label>
					<input type="text" name="weight" class="col-lg-6 col-md-6 col-sm-6 form-control" placeholder="আপনার ওজন">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">শেষ কবে রক্ত দিয়েছেন :</label>
					<select class="form-control dob" name="donation_year">
						<option value="">বছর</option>
						<?php
						for($yr = 0; $yr <= 5; $yr++){
							echo '<option value="201'. $yr .'">201'. $yr .'</option>';
						}
						?>
					</select>
					<select class="form-control dob" name="donation_month">
						<option value="">মাস</option>
						<?php
							for($mnth = 1; $mnth <= 12; $mnth++){
								echo '<option value="'. $mnth .'">'. $mnth .'</option>';
							}
						?>
					</select>
					<select class="form-control dob" name="donation_day">
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