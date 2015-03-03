<?php 
	include('header.php');
	include('config.php');
	if(isset($_POST['donate_blood'])){
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$donor_number = $_POST['donor_number'];
		$donate_blood = $_POST['donate_blood'];
		$district = $_POST['district'];
		$state = $_POST['state'];
		$union = $_POST['union'];
		$word = $_POST['word'];
		$verification_code = mt_rand(100000, 999999);	//send this code to mobile phone
		if( empty($name) || empty($mobile) || empty($donate_blood) || empty($district) || empty($state) || empty($union) || empty($word) ){
			$search_donor_error = "You can not leave any field empty. Please re enter your details.";
			header('refresh:3;url=index.php');
		}else{
			try{
				if(!is_numeric($mobile)){
					throw new Exception("Please enter your mobile number correctly.");
				}
				
				$statement = $db->prepare("INSERT INTO blood_seeker VALUES(?,?,?,?,?,?,?,?,?,?)");
				if( $statement->execute(array('', $name, $mobile, $donor_number, $donate_blood, $district, $state, $union, $word, $verification_code)) ){
					$success_mesg = "Your information submitted successfully.";
				}else{
					$search_donor_error = "Your information did not submit successfully.";
				}
			}
			catch (Exception $e) {
				$search_donor_error = $e->getMessage();
				header('refresh:3;url=index.php');
			}
		}
	}else{
		//header('location:index.php');
	}
	
	
	if(isset($_POST['add_donor'])){
		$ver_code = $_POST['ver_code'];
		$blood_group = $_POST['blood_group'];
		$birth_year = $_POST['birth_year'];
		$birth_month = $_POST['birth_month'];
		$birth_day = $_POST['birth_day'];
		$weight = $_POST['weight'];
		$donation_year = $_POST['donation_year'];
		$donation_month = $_POST['donation_month'];
		$donation_day = $_POST['donation_day'];
		
		if( empty($ver_code) || empty($blood_group) || empty($birth_year) || empty($birth_month) || empty($birth_day) || empty($weight) || empty($donation_year) || empty($donation_month) || empty($donation_day) ){
			$search_donor_error = "You can not leave any field empty. Please re enter your details.";
		}else{
			try{
				$dob[] = $birth_year;
				$dob[] = $birth_month;
				$dob[] = $birth_day;
				$donor_date_of_birth = implode('-', $dob);
				$donationYMD[] = $donation_year;
				$donationYMD[] = $donation_month;
				$donationYMD[] = $donation_day;
				$last_donation = implode('-', $donationYMD);
				$statement = $db->prepare("SELECT * FROM blood_seeker WHERE verification_code=?");
				$statement->execute(array($ver_code));
				$match = $statement->rowCount();
				$donorInfo = $statement->fetch(PDO::FETCH_ASSOC);
				if( $match ) {
					$name = $donorInfo['name'];
					$mobile = $donorInfo['mobile'];
					$donor_num = $donorInfo['donor_num'];
					$district = $donorInfo['district'];
					$state = $donorInfo['state'];
					$seeker_union = $donorInfo['seeker_union'];
					$word = $donorInfo['word'];
					$insertDonor = $db->prepare("INSERT INTO blood_donor VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
					if ( $insertDonor->execute(array('', $name, $blood_group, $mobile, $donor_num, $district, $state, $seeker_union, $word, $donor_date_of_birth, $weight, $last_donation)) ) {
						$current_id = $db->lastInsertId();
						$success_mesg = "Your information submitted successfully to our donor list.";
						header('location: user-details.php?id='.$current_id);
					}else{
						throw new Exception("Something went wrong.");
					}
				}else{
					throw new Exception("Sorry! Your verification code is wrong.");
				}
			}
			catch (Exception $e) {
				$search_donor_error = $e->getMessage();
				//header('refresh:3;url=index.php');
			}
		}
	}
?>
	<div class="container">
		<div class="row <?php echo date("Y-m-d");?>">
			<div class="col-lg-6 col-md-6 col-sm-6 wanted">
				<?php
					if(isset($_POST['donate_blood']) && ($_POST['donate_blood'] == 'no')){
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
				<p class="title"><b>রক্ত দাতাদের তালিকা দেখতে হলে আপনার মোবাইলে পাঠানো কোডটি এখানে প্রবেশ করুন :</b></p>
				<hr />
				<br />
				<form method="post">
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="word">কোডটি প্রবেশ করুন :</label>
					<input type="text" name="ver_code" class="col-lg-6 col-md-6 col-sm-6 form-control" id="word" placeholder="কোডটি প্রবেশ করুন">
				  </div>
				  <button type="submit" name="go_next_page" class="btn btn-info pull-right">পরের পাতায় যান</button>
				</form>
				<?php }elseif(isset($_POST['donate_blood']) && ($_POST['donate_blood']  == 'yes')){
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
				<p class="title"><b>নতুন ব্যাবহারকারী তালিকাভূক্তি সম্পন্ন করুন এবং পরের পাতায় ডোনার লিস্ট দেখুন :</b></p>
				<hr />
				<br />
				<form method="post">
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="word">আপনার মোবাইলে পাঠানো কোডটি এখানে প্রবেশ করুন :</label>
					<input type="text"  name="ver_code" class="col-lg-6 col-md-6 col-sm-6 form-control" id="word" placeholder="কোডটি প্রবেশ করুন">
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
					<input type="text" name="weight" class="col-lg-6 col-md-6 col-sm-6 form-control" id="word" placeholder="আপনার ওজন">
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
				  <button type="submit" name="add_donor" class="btn btn-info pull-right">তালিকাভূক্ত হোন</button>
				</form>
				<?php } ?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 wanted donor">
				<img src="img/donate-blood.png" alt="" />
			</div>
		</div>
	</div>			
	
<?php include('footer.php');?>