<?php 
	include('header.php');
	include('classes/Donor.php');
	include('config.php');
	if ( isset( $_REQUEST['id'] ) ) {
		$id = $_REQUEST['id'];
	}else{
		echo '<h2>Sorry! Your address is wrong.</h2>';
	}	
	if(isset($_POST['update_user_info'])){		
		$name = $_POST['name'];
		$blood_group = $_POST['blood_group'];
		$mobile = $_POST['mobile'];
		$secondary_mobile = $_POST['secondary_mobile'];
		$district = $_POST['district'];
		$state = $_POST['state'];
		$seeker_union = $_POST['seeker_union'];
		$word = $_POST['word'];
		$birth_year = $_POST['birth_year'];
		$birth_month = $_POST['birth_month'];
		$birth_day = $_POST['birth_day'];
		$dob[] = $birth_year;
		$dob[] = $birth_month;
		$dob[] = $birth_day;
		$date_of_birth = implode('-',$dob);
		$weight = $_POST['weight'];
		$donation_year = $_POST['donation_year'];
		$donation_month = $_POST['donation_month'];
		$donation_day = $_POST['donation_day'];
		$lstdon[] = $donation_year;
		$lstdon[] = $donation_month;
		$lstdon[] = $donation_day;
		$last_donation = implode('-',$lstdon);
		  	 	 	 	 	 	 	 	 	 	 
		$updateDonor = $db->prepare("UPDATE blood_donor SET name=?, blood_group=?, mobile=?, secondary_mobile=?, district=?, state=?, donor_union=?, word=?, date_of_birth=?, weight=?, last_donation=? WHERE id=?");
		try{
			if ( $insertDonor->execute(array('', $name, $blood_group, $mobile, $donor_num, $district, $state, $seeker_union, $word, $donor_date_of_birth, $weight, $last_donation)) ) {
				$current_id = $db->lastInsertId();
				$success_mesg = "Your information submitted successfully to our donor list.";
				header('location: user-details.php?id='.$current_id);
			}else{
				throw new Exception("Something went wrong.");
			}
		}
		catch (Exception $e) {
			$search_donor_error = $e->getMessage();
			//header('refresh:3;url=index.php');
		}
	}
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 wanted">
				<p class="title"><b>আপনি আপনার বিবরণগুলো এখান থেকে পরিবর্তন করতে পারেন :</b></p>
				<hr />
				<br />
				<form method="post" action="">
				  <?php
					$statement = $db->prepare("SELECT * FROM blood_donor WHERE id=? LIMIT 1");
					$statement->execute(array($id));
					$donor = $statement->fetch(PDO::FETCH_ASSOC);
				  ?>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="name">আপনার নাম :</label>
					<input type="text" name="name" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php echo $donor['name'];?>" placeholder="আপনার নাম">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার রক্তের গ্রুপ :</label>
					<select class="form-control" name="blood_group">
						<option value="<?php echo $donor['blood_group'];?>"><?php $st = new BloodGroup(); echo $st->bloodGroupNaming($donor['blood_group']);?></option>
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
					<input type="text" name="mobile" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php echo $donor['mobile'];?>" placeholder="আপনার ডোনার নম্বর (যদি থাকে)">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donornumber">দ্বিতীয় মোবাইল নম্বর/ইমেইল অ্যাড্রেস (অ্যাকাউন্ট সিকিউরিটির জন্য) :</label>
					<input type="text" name="secondary_mobile" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php echo $donor['secondary_mobile'];?>" placeholder="someone@someone.com" style="margin-top: 10px;">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার জেলা :</label>
					<select class="form-control" name="district">
						<option value="<?php echo $donor['district'];?>" selected><?php echo $donor['district'];?></option>
						<option value="">আপনার জেলা পছন্দ করুন</option>
						<option value="dhaka">ঢাকা</option>
						<option value="sylhet">সিলেট</option>
						<option value="rongpur">রংপুর</option>
						<option value="bogura">বগুড়া</option>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার থানা :</label>
					<select class="form-control" name="state">
						<option value="<?php echo $donor['state'];?>" selected><?php echo $donor['state'];?></option>
						<option value="">আপনার থানা পছন্দ করুন</option>
						<option value="dhaka">ঢাকা</option>
						<option value="sylhet">সিলেট</option>
						<option value="rongpur">রংপুর</option>
						<option value="bogura">বগুড়া</option>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">ইউনিয়ন/সিটি কর্পোরেশন :</label>
					<select class="form-control" name="seeker_union">
						<option value="<?php echo $donor['donor_union'];?>" selected><?php echo $donor['donor_union'];?></option>
						<option value="">পছন্দ করুন</option>
						<option value="dhaka">ঢাকা</option>
						<option value="sylhet">সিলেট</option>
						<option value="rongpur">রংপুর</option>
						<option value="bogura">বগুড়া</option>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="word">আপনার ওয়ার্ড :</label>
					<input type="text" name="word" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php echo $donor['word'];?>" placeholder="আপনার ওয়ার্ড">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">জন্ম তারিখ :</label>
					<select class="form-control dob" name="birth_year">
						<option value="">বছর</option>
						<option value="<?php echo substr($donor['date_of_birth'], 0, 4);?>" selected><?php echo substr($donor['date_of_birth'], 0, 4);?></option>
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
						<option value="<?php echo substr($donor['date_of_birth'], 5, 2);?>" selected><?php echo substr($donor['date_of_birth'], 5, 2);?></option>
						<?php
							for($mnth = 1; $mnth <= 12; $mnth++){
								echo '<option value="'. $mnth .'">'. $mnth .'</option>';
							}
						?>
					</select>
					<select class="form-control dob" name="birth_day">
						<option value="">দিন</option>
						<option value="<?php echo substr($donor['date_of_birth'], 8, 2);?>" selected><?php echo substr($donor['date_of_birth'], 8, 2);?></option>
						<?php
							for($dy = 1; $dy <= 31; $dy++){
								echo '<option value="'. $dy .'">'. $dy .'</option>';
							}
						?>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="word">আপনার ওজন (কেজি) :</label>
					<input type="text" name="weight" class="col-lg-6 col-md-6 col-sm-6 form-control" value="<?php echo $donor['weight'];?>" placeholder="আপনার ওজন">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">শেষ কবে রক্ত দিয়েছেন :</label>
					<select class="form-control dob" name="donation_year">
						<option value="">বছর</option>
						<option value="<?php echo substr($donor['last_donation'], 0, 4);?>" selected><?php echo substr($donor['last_donation'], 0, 4);?></option>
						<?php
						for($yr = 0; $yr <= 5; $yr++){
							echo '<option value="201'. $yr .'">201'. $yr .'</option>';
						}
						?>
					</select>
					<select class="form-control dob" name="donation_month">
						<option value="">মাস</option>
						<option value="<?php echo substr($donor['last_donation'], 5, 2);?>" selected><?php echo substr($donor['last_donation'], 5, 2);?></option>
						<?php
							for($mnth = 1; $mnth <= 12; $mnth++){
								echo '<option value="'. $mnth .'">'. $mnth .'</option>';
							}
						?>
					</select>
					<select class="form-control dob" name="donation_day">
						<option value="">দিন</option>
						<option value="<?php echo substr($donor['last_donation'], 8, 2);?>" selected><?php echo substr($donor['last_donation'], 8, 2);?></option>
						<?php
							for($dy = 1; $dy <= 31; $dy++){
								echo '<option value="'. $dy .'">'. $dy .'</option>';
							}
						?>
					</select>
				  </div>
				  <button type="submit" name="update_user_info" class="btn btn-info pull-right">পরিবর্তন করুন</button>
				</form>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 wanted donor">
				<img src="img/donate-blood.png" alt="" />
			</div>
		</div>
	</div>			
	
<?php include('footer.php');?>