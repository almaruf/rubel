<?php 
	include('header.php');
	include('classes/Donor.php');
	include('config.php');
	if( !isset($_REQUEST['id']) ){
		header('location: index.php');
	}else{
		$id = $_REQUEST['id'];
	}
?>
	<div class="container">
		<div class="row">
			<div class="users">
				<div class="col-lg-7 col-md-7 col-sm-7 user_info">
					<?php
						$statement = $db->prepare("SELECT * FROM blood_donor WHERE id=? LIMIT 1");
						$statement->execute(array($id));
						$user_info = $statement->fetch(PDO::FETCH_ASSOC);
					?>	
					<h3 class="name">স্বাগতম "<?php echo $user_info['name'];?>"</h3>
					<p class="users_info">
						আপনার রক্তের গ্রুপ : <?php $st = new BloodGroup(); echo $st->bloodGroupNaming($user_info['blood_group']);?><br />
						আপনার মোবাইল নম্বর : <?php echo $user_info['mobile'];?><br />
						দ্বিতীয় মোবাইল নম্বর/ইমেইল এড্রেস (অ্যাকাউন্ট সিকিউরিটির জন্য) : <?php echo $user_info['secondary_mobile'];?><br />
						জেলা : <?php echo ucfirst($user_info['district']);?><br />
						থানা : <?php echo ucfirst($user_info['state']);?><br />
						ইউনিয়ন/সিটি কর্পোরেশন : <?php echo ucfirst($user_info['donor_union']);?><br />
						ওয়ার্ড : <?php echo $user_info['word'];?><br />
						জন্ম তারিখ : <?php echo $user_info['date_of_birth'];?><br />
						ওজন : <?php echo $user_info['weight'];?><br />  
						শেষ রক্ত দিয়েছেন : <?php echo $user_info['last_donation'];?><br /><br />
					</p>
					<a href="edit-user-details.php?id=<?php echo $id;?>" class="btn btn-info">বিবরন পরিবর্তন করুন</a>
					<a href="" class="btn btn-info">পাসওয়ার্ড পরিবর্তন করুন</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 user_photo">
					<img src="img/users/user1.jpg" class="img-responsive" alt="" />
					<br />
					<a href="" class="btn btn-info">ছবি পরিবর্তন করুন</a>
				</div>
			</div>
			
			<div class="users_history">
				
			</div>
		</div>
	</div>			
	
<?php include('footer.php');?>