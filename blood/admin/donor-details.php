<?php 
	include('header.php');
	if( !isset($_REQUEST['id']) ){
		header('location:index.php');
	}else{
		$id = $_REQUEST['id'];
	}
	include('../classes/Donor.php');
	include('config.php');
	$statement1 = $db->prepare("SELECT * FROM blood_donor");
	$statement1->execute();
	$tot_donor = $statement1->rowCount();
	$statement2 = $db->prepare("SELECT * FROM blood_donor WHERE id=? LIMIT 1");
	$statement2->execute(array($id));
	$user_info = $statement2->fetch(PDO::FETCH_ASSOC);
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 admin_sidebar_left">
				<br />
				<br />
				<br />
				<ul>
					<li><a href="">Home</a></li>
					<li><a href="">Report</a>
						<ul>
							<li><a href="">Donor overall report</a></li>
							<li><a href="">Donor overall report</a></li>
							<li><a href="">Donor overall report</a></li>
						</ul>
					</li>
				</ul>
				<div class="clearfix"></div>
				<br />
				<br />
				<br />
				<br />
				<div class="well">
					<p>You have added <?php echo $tot_donor;?> donors</p>
					<p>You have managed <?php echo $tot_donor;?> donors</p>
					<p>You have donated 0 times this year</p>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 admin_sidebar_right">
				<h3 class="name">Donor Details</h3><hr />
				<div class="col-lg-7 col-md-7 col-sm-7 user_info">
					<h4 class="name"><?php echo $user_info['name'];?></h4>
					<p class="users_info">
						আপনার রক্তের গ্রুপ : <?php $st = new BloodGroup(); echo $st->bloodGroupNaming($user_info['blood_group']);?><br />
						মোবাইল নম্বর : <?php echo $user_info['mobile'];?><br />
						বিভাগ : <?php echo ucfirst($user_info['division']);?><br />
						জেলা : <?php echo ucfirst($user_info['district']);?><br />
						থানা : <?php echo ucfirst($user_info['state']);?><br />
					</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 user_photo">
					<img src="../img/users/<?php echo $user_info['donor_img'];?>" class="img-responsive pull-right" alt="" />
				</div>
				<div class="clearfix"></div>
				<hr />
				<div class="clearfix"></div>
				<div class="donation_rec">
					<h3 class="name">Donation Records</h3><hr />
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>তারিখ</th>
								<th>ব্যাগ</th>
								<th>গ্রহীতা</th>
							</tr>
						</thead>
						<tbody>
							<tr class="warning">
								<td>১২ জুন ২০১৪</td>
								<td>১</td>
								<td>সাব্বির</td>
							</tr>
							<tr class="">
								<td>১২ জানুয়ারী ২০১৫</td>
								<td>১</td>
								<td>মোহাম্মাদ</td>
							</tr>
							<tr class="warning">
								<td>১২ জুলাই ২০১৫</td>
								<td>১</td>
								<td>সাকিব</td>
							</tr>
						</tbody>	
					</table>
				</div>
			</div>	
		</div>
	</div>			
	
<?php include('footer.php');?>