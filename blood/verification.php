<?php 
	include('header.php');
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 wanted">
				<?php
					if($_POST['donatebld'] == 'no'){
				?>
				<p class="title"><b>রক্ত দাতাদের তালিকা দেখতে হলে আপনার মোবাইলে পাঠানো কোডটি এখানে প্রবেশ করুন :</b></p>
				<hr />
				<br />
				<form method="post">
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="word">কোডটি প্রবেশ করুন :</label>
					<input type="text" name="don_not_code" class="col-lg-6 col-md-6 col-sm-6 form-control" id="word" placeholder="কোডটি প্রবেশ করুন">
				  </div>
				  <button type="submit" name="go_next_page" class="btn btn-info pull-right">পরের পাতায় যান</button>
				</form>
				<?php }elseif($_POST['donatebld'] == 'yes'){ ?>
				<p class="title"><b>নতুন ব্যাবহারকারী তালিকাভূক্তি সম্পন্ন করুন এবং পরের পাতায় ডোনার লিস্ট দেখুন :</b></p>
				<hr />
				<br />
				<form method="post">
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="word">আপনার মোবাইলে পাঠানো কোডটি এখানে প্রবেশ করুন :</label>
					<input type="text"  name="don_yes_code" class="col-lg-6 col-md-6 col-sm-6 form-control" id="word" placeholder="কোডটি প্রবেশ করুন">
				  </div>
				  <div class="form-group clearfix">
					<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার রক্তের গ্রুপ :</label>
					<select class="form-control" name="blood_group">
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
				  <button type="submit" name="add_donor_list" class="btn btn-info pull-right">তালিকাভূক্ত হোন</button>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>			
	
<?php include('footer.php');?>