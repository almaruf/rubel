<?php 
	include('header.php');
	include('classes/Donor.php');
	include('config.php');
 	if( (!isset( $_REQUEST['district'] )) && (!isset( $_REQUEST['state'] )) && (!isset( $_REQUEST['union'])) && (!isset( $_REQUEST['word'] )) ){
		header('refresh:3;url=index.php');
	}else{
		$district = $_REQUEST['district'];
		$state = $_REQUEST['state'];
		$union = $_REQUEST['union'];
		$word = $_REQUEST['word'];
	}
?>
	<div class="container">
		<div class="row">
			<div class="donor_list">
				<div class="table-responsive">
				  <br />
				  <br />
				  <h3 class="text-center"><?php echo $union.', '.$word.',  '. $state . ', '. $district;?> এর আশেপাশে প্রাপ্ত তালিকাভূক্ত ডোনার</h3>
				  <hr />
				  <table class="table table-bordered">
					<thead>
						<tr>
							<th>আইডি</th>
							<th>নাম</th>
							<th>জেলা</th>
							<th>থানা</th>
							<th>ইউনিয়ন/সিটি কর্পোরেশন</th>
							<th>ওয়ার্ড</th>
							<th>রক্তের গ্রুপ</th>
							<th>কলব্যাক করুন</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$statement = $db->prepare("SELECT * FROM blood_donor WHERE district=? && state=? && donor_union=? && word=?");
							$statement->execute(array($district,$state,$union,$word));
							$matchs = $statement->rowCount();
							if ( $matchs != 0 ) {
							$donors = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ( $donors as $donor ) {
						?>
						<tr>
							<td><?php echo $donor['id'];?></td>
							<td><?php echo $donor['name'];?></td>
							<td><?php echo $donor['district'];?></td>
							<td><?php echo $donor['state'];?></td>
							<td><?php echo $donor['donor_union'];?></td>
							<td><?php echo $donor['word'];?></td>
							<td><?php $st = new BloodGroup(); echo $st->bloodGroupNaming($donor['blood_group']);?></td>
							<td class="text-center"><a href="" class="btn btn-info">কলব্যাক করুন</a></td>
						</tr>
						<?php } }else{ ?>
						<tr>
							<td colspan="8"><h3 class="text-center">Sorry! No donor found in your location.</h3></td>
						</tr>
						<?php } ?>
					</tbody>	
				  </table>
				  <br />
				  <br />
				  <br />
				  <br />
				</div>
			</div>	
		</div>
	</div>			
	
<?php include('footer.php');?>