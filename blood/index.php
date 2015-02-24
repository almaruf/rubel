<?php 
	include('header.php');
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 wanted">
				<p class="title"><b>রক্ত দরকার</b></p>
				<hr />
				<br />
				<form method="post">
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="name">আপনার নাম :</label>
					<input type="text" class="col-lg-6 col-md-6 col-sm-6 form-control" id="name" placeholder="আপনার নাম">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="yourphone">আপনার মোবাইল :</label>
					<input type="text" class="col-lg-6 col-md-6 col-sm-6 form-control" id="yourphone" placeholder="আপনার মোবাইল">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donornumber">আপনার ডোনার নম্বর (যদি থাকে) :</label>
					<input type="text" class="col-lg-6 col-md-6 col-sm-6 form-control" id="donornumber" placeholder="আপনার ডোনার নম্বর (যদি থাকে)">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="donatefuture">ভবিষ্যতে আপনিও অন্যের দরকারে রক্ত দিতে চান :</label>
						<input type="radio" name="donatefuture" id="donatefuture" value="yes"> হ্যাঁ
						<input type="radio" name="donatefuture" id="donatefuture" value="no"> না
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
				  <button type="search_donor" class="btn btn-info pull-right">খোঁজ করুন</button>
				</form>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 wanted donor">
				<p class="title"><b>রক্ত দিতে চাই</b></p>
				<hr />
				<br />
				<form method="post">
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="name">আপনার নাম :</label>
					<input type="text" class="col-lg-6 col-md-6 col-sm-6 form-control" id="name" placeholder="আপনার নাম">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="yourphone">আপনার রক্তের গ্রুপ :</label>
					<input type="text" class="col-lg-6 col-md-6 col-sm-6 form-control" id="yourphone" placeholder="আপনার মোবাইল">
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
							for($inc = 0; $inc < 10; $inc++){
								echo '<option value="190'. $inc .'">190'. $inc .'</option>';
							}	
						?>
					</select>
					<select class="form-control dob">
						<option value="">মাস</option>
						<option value="dhaka">ঢাকা</option>
						<option value="sylhet">সিলেট</option>
						<option value="rongpur">রংপুর</option>
						<option value="bogura">বগুড়া</option>
					</select>
					<select class="form-control dob">
						<option value="">দিন</option>
						<option value="dhaka">ঢাকা</option>
						<option value="sylhet">সিলেট</option>
						<option value="rongpur">রংপুর</option>
						<option value="bogura">বগুড়া</option>
					</select>
				  </div>
				  <button type="add_donor_list" class="btn btn-info pull-right">তালিকাভুক্ত হোন</button>
				</form>
			</div>
		</div>
	</div>			
	
<?php include('footer.php');?>