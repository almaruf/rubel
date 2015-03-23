<?php 
	include('header.php');
	include('classes/Donor.php');
	include('config.php');
 	if( (!isset( $_REQUEST['division'] )) && (!isset( $_REQUEST['district'] )) && (!isset( $_REQUEST['state'] )) ){
		header('refresh:3;url=index.php');
	}else{
		$division = $_REQUEST['division'];
		$district = $_REQUEST['district'];
		$state = $_REQUEST['state'];
	}
?>
	<div class="container">
		<div class="row">
			<div class="donor_list">
				<div class="table-responsive">
				  <br />
				  <br />
				  <h3 class="text-center"><?php echo $division.', '.$district.',  '. $state;?> এর আশেপাশে প্রাপ্ত তালিকাভূক্ত ডোনার</h3>
				  <hr />
				  <table class="table table-bordered">
					<thead>
						<tr>
							<th>আইডি</th>
							<th>নাম</th>
							<th>বিভাগ</th>
							<th>জেলা</th>
							<th>থানা</th>
							<th>রক্তের গ্রুপ</th>
							<th>কলব্যাক করুন</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$statement = $db->prepare("SELECT * FROM blood_donor WHERE division=? && district=? && state=?");
							$statement->execute(array($division,$district,$state));
							$matchs = $statement->rowCount();
							if ( $matchs != 0 ) {
							$donors = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ( $donors as $donor ) {
						?>
						<tr>
							<td><?php echo $donor['id'];?></td>
							<td><?php echo $donor['name'];?></td>
							<td><?php echo $donor['division'];?></td>
							<td><?php echo $donor['district'];?></td>
							<td><?php echo $donor['state'];?></td>
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