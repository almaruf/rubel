<?php 
	include('header.php');
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 wanted">
				<p class="title"><b>রক্ত দরকার</b></p>
				<hr />
				<br />
				<form method="post" action="verification.php">
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
					<input type="text" name="donor_number" class="col-lg-6 col-md-6 col-sm-6 form-control" id="donornumber" placeholder="আপনার ডোনার নম্বর (যদি থাকে)">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donatefuture">ভবিষ্যতে আপনিও অন্যের দরকারে রক্ত দিতে চান :</label>
						<input type="radio" name="donate_blood" id="donatefuture" value="yes"> হ্যাঁ
						<input type="radio" name="donate_blood" id="donatefuture" value="no"> না
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার জেলা :</label>
					<select class="form-control" name="district">
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
						<option value="">আপনার থানা পছন্দ করুন</option>
						<option value="dhaka">ঢাকা</option>
						<option value="sylhet">সিলেট</option>
						<option value="rongpur">রংপুর</option>
						<option value="bogura">বগুড়া</option>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">ইউনিয়ন/সিটি কর্পোরেশন :</label>
					<select class="form-control" name="union">
						<option value="">পছন্দ করুন</option>
						<option value="dhaka">ঢাকা</option>
						<option value="sylhet">সিলেট</option>
						<option value="rongpur">রংপুর</option>
						<option value="bogura">বগুড়া</option>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="word">আপনার ওয়ার্ড :</label>
					<input type="text" name="word" class="col-lg-6 col-md-6 col-sm-6 form-control" id="word" placeholder="আপনার ওয়ার্ড">
				  </div>
				  <button type="submit" name="search_donor" class="btn btn-info pull-right">খোঁজ করুন</button>
				</form>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 wanted donor">
				<p class="title"><b>রক্ত দিতে চাই</b></p>
				<hr />
				<br />
				<form method="post" action="verification.php">
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="name">আপনার নাম :</label>
					<input type="text" class="col-lg-6 col-md-6 col-sm-6 form-control" id="name" placeholder="আপনার নাম">
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
					<input type="text" class="col-lg-6 col-md-6 col-sm-6 form-control" id="donornumber" placeholder="আপনার ডোনার নম্বর (যদি থাকে)">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donornumber">দ্বিতীয় মোবাইল নম্বর/ইমেইল অ্যাড্রেস (অ্যাকাউন্ট সিকিউরিটির জন্য) :</label>
					<input type="text" class="col-lg-6 col-md-6 col-sm-6 form-control" id="donornumber" placeholder="someone@someone.com" style="margin-top: 10px;">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার জেলা :</label>
					<select class="form-control">
						<option value="">আপনার জেলা পছন্দ করুন</option>
						<option value="dhaka">ঢাকা</option>
						<option value="sylhet">সিলেট</option>
						<option value="rongpur">রংপুর</option>
						<option value="bogura">বগুড়া</option>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার থানা :</label>
					<select class="form-control">
						<option value="">আপনার থানা পছন্দ করুন</option>
						<option value="dhaka">ঢাকা</option>
						<option value="sylhet">সিলেট</option>
						<option value="rongpur">রংপুর</option>
						<option value="bogura">বগুড়া</option>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">ইউনিয়ন/সিটি কর্পোরেশন :</label>
					<select class="form-control">
						<option value="">পছন্দ করুন</option>
						<option value="dhaka">ঢাকা</option>
						<option value="sylhet">সিলেট</option>
						<option value="rongpur">রংপুর</option>
						<option value="bogura">বগুড়া</option>
					</select>
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="word">আপনার ওয়ার্ড :</label>
					<input type="text" class="col-lg-6 col-md-6 col-sm-6 form-control" id="word" placeholder="আপনার ওয়ার্ড">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">জন্ম তারিখ :</label>
					<select class="form-control dob">
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
					<select class="form-control dob">
						<option value="">মাস</option>
						<?php
							for($mnth = 1; $mnth <= 12; $mnth++){
								echo '<option value="'. $mnth .'">'. $mnth .'</option>';
							}
						?>
					</select>
					<select class="form-control dob">
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
					<input type="text" class="col-lg-6 col-md-6 col-sm-6 form-control" id="word" placeholder="আপনার ওজন">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">শেষ কবে রক্ত দিয়েছেন :</label>
					<select class="form-control dob">
						<option value="">বছর</option>
						<?php
						for($yr = 0; $yr <= 5; $yr++){
							echo '<option value="201'. $yr .'">201'. $yr .'</option>';
						}
						?>
					</select>
					<select class="form-control dob">
						<option value="">মাস</option>
						<?php
							for($mnth = 1; $mnth <= 12; $mnth++){
								echo '<option value="'. $mnth .'">'. $mnth .'</option>';
							}
						?>
					</select>
					<select class="form-control dob">
						<option value="">দিন</option>
						<?php
							for($dy = 1; $dy <= 31; $dy++){
								echo '<option value="'. $dy .'">'. $dy .'</option>';
							}
						?>
					</select>
				  </div>
				  <button type="submit" name="add_donor_list" class="btn btn-info pull-right">তালিকাভুক্ত হোন</button>
				</form>
			</div>
		</div>
	</div>			
	
<?php include('footer.php');?>