<?php 
	include('header.php');
	include('classes/Donor.php');
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
			<div class="find_donors clearfix">
				<h3>গ্রুপ অনুসারে রক্তদাতা খুঁজুন</h3>
				<div class="col-lg-3 col-md-3 col-sm-3 sng">
					<a href=""><img src="img/a_positive.png" alt="" /></a>
					<p class="text-center"><i class="fa fa-users"></i> Donors : 340</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 sng">
					<a href=""><img src="img/a_negative.png" alt="" /></a>
					<p class="text-center"><i class="fa fa-users"></i> Donors : 340</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 sng">
					<a href=""><img src="img/b_positive.png" alt="" /></a>
					<p class="text-center"><i class="fa fa-users"></i> Donors : 340</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 sng">
					<a href=""><img src="img/b_negative.png" alt="" /></a>
					<p class="text-center"><i class="fa fa-users"></i> Donors : 340</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 sng">
					<a href=""><img src="img/ab_positive.png" alt="" /></a>
					<p class="text-center"><i class="fa fa-users"></i> Donors : 340</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 sng">
					<a href=""><img src="img/ab_negative.png" alt="" /></a>
					<p class="text-center"><i class="fa fa-users"></i> Donors : 340</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 sng">
					<a href=""><img src="img/o_positive.png" alt="" /></a>
					<p class="text-center"><i class="fa fa-users"></i> Donors : 340</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 sng">
					<a href=""><img src="img/o_negative.png" alt="" /></a>
					<p class="text-center"><i class="fa fa-users"></i> Donors : 340</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="active_donors">
				<h3>আমাদের নিয়মিত ডোনার</h3>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>নাম</th>
							<th>ব্লাড গ্রুপ</th>
							<th>বয়স</th>
							<th>জেলা</th>
							<th>স্ট্যাটাস</th>
							<th>ইমেইল করুন</th>
							<th>প্রোফাইল</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$statement_donor = $db->prepare("SELECT * FROM blood_donor LIMIT 10");
							$statement_donor->execute();
							$donors = $statement_donor->fetchAll(PDO::FETCH_ASSOC);
							$sl = 1;
							foreach ( $donors as $donor ) {
							$sl +=1;
						?>
						<tr class="<?php if($sl % 2 == 0){echo '';}else{echo 'warning';}?>">
							<td><?php echo $donor['name'];?></td>
							<td><?php $st = new BloodGroup(); echo $st->bloodGroupNaming($donor['blood_group']);?></td>
							<td><?php echo $donor['date_of_birth'];?></td>
							<td><?php echo $donor['district'];?></td>
							<td><?php echo $donor['last_donation'];?></td>
							<td class="text-center"><a href="" class="btn btn-info"><i class="fa fa-envelope"></i> ইমেইল করুন</a></td>
							<td class="text-center"><a href="" class="btn btn-info"><i class="fa fa-pencil"></i> প্রোফাইল</a></td>
						</tr>
						<?php } ?>
					</tbody>	
				</table>
			</div>
		</div>
		<div class="row">	
			<div class="messages">
				<h3>আপনাদের থেকে প্রাপ্ত মেসেজসমূহ</h3>
				<?php 
					/* $sl = 0;
					$sl +=1;
					if($sl%2 != 0){ */
				?>
				<div class="sng_msg odd clearfix">
					<div class="user_info col-lg-3 col-md-3 col-sm-3 text-center">
						<p class="usr"><a href=""><i class="fa fa-user"></i></a></p>
						<p class="name"><?php echo $donor['name'];?></p>
					</div>
					<div class="msgs col-lg-9 col-md-9 col-sm-9">
						<p class="name"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y');?></p>
						<p class="mesg"><?php echo 'Sometimes i wonder asking myself " Is Human Being still the best creation. Yeah there is no doubt that Allah has said the right words. I don\'t possess the right quality to say you thanks brothers. I just want to say what u did and what u r doing for the humanity. In Sha ALLAh you will get the perfect rewards from Allah, the highest. Best luck bro and keep goin';?></p>
					</div>
				</div>
				<?php// }else{ ?>
				<hr />
				<div class="sng_msg evn clearfix">
					<div class="msgs col-lg-9 col-md-9 col-sm-9">
						<p class="name"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y');?></p>
						<p class="mesg"><?php echo 'Sometimes i wonder asking myself " Is Human Being still the best creation. Yeah there is no doubt that Allah has said the right words. I don\'t possess the right quality to say you thanks brothers. I just want to say what u did and what u r doing for the humanity. In Sha ALLAh you will get the perfect rewards from Allah, the highest. Best luck bro and keep goin';?></p>
					</div>
					<div class="user_info col-lg-3 col-md-3 col-sm-3 text-center">
						<p class="usr"><a href=""><i class="fa fa-user"></i></a></p>
						<p class="name"><?php echo $donor['name'];?></p>
					</div>
				</div>
				<?php// }} ?>
			</div>
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
		</div>	
	</div>			
	
<?php include('footer.php');?>