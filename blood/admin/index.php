<?php 
	include_once (realpath (dirname(__FILE__) . '/../../../bangladesh-administrative-areas/bdaa_php/Areas.php'));
	use \BDAA\Areas;
	$areas = new \BDAA\Areas();
	$divisions = $areas->getAllDivisions();
	include('header.php');
	include('../classes/Donor.php');
	include('config.php');
	$statement1 = $db->prepare("SELECT * FROM blood_donor");
	$statement1->execute();
	$tot_donor = $statement1->rowCount();
	$statement = $db->prepare("SELECT * FROM blood_donor ORDER BY id DESC LIMIT 10");
	$statement->execute();
	$donors = $statement->fetchAll(PDO::FETCH_ASSOC);
	if(isset($_POST['name']) && !empty($_POST['name'])){
		$name = $_POST['name'];
	}
	if(isset($_POST['division']) && !empty($_POST['division'])){
		$division = $_POST['division'];
	}
	if(isset($_POST['district']) && !empty($_POST['district'])){
		$district = $_POST['district'];
	}
	if(isset($_POST['upazila']) && !empty($_POST['upazila'])){
		$upazila = $_POST['upazila'];
	}
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
				<div class="table-responsive">
				  <h3 class="text-center">সম্প্রতি আমাদের ডোনার লিস্টে যারা যোগ হয়েছে।</h3>
				  <hr />
				  <table class="table table-bordered">
					<thead>
						<tr>
							<th>ব্লাড গ্রুপ</th>
							<th>নাম</th>
							<th>ডিভিশন</th>
							<th>জেলা</th>
							<th>থানা</th>
							<th>অপারেশান</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sl = 1;
							if( !isset($_POST['find_donor']) ) {
							foreach ( $donors as $donor ) {
							$sl +=1;
						?>
						<tr class="<?php if($sl % 2 == 0){echo '';}else{echo 'warning';}?>">
							<td><?php $st = new BloodGroup(); echo $st->bloodGroupNaming($donor['blood_group']);?></td>
							<td><a href="donor-details.php?id=<?php echo $donor['id'];?>"><?php echo $donor['name'];?></a></td>
							<td><?php echo $donor['division'];?></td>
							<td><?php echo $donor['district'];?></td>
							<td><?php echo $donor['state'];?></td>
							<td class="text-center"><a href="" class="btn btn-info"><i class="fa fa-pencil"></i> এডিট</a></td>
						</tr>
						<?php }
							}else{
							$find_donor = $db->prepare("SELECT * FROM blood_donor WHERE name=? && division=? && district=? && state=?");
							$find_donor->execute(array($name,$division,$district,$upazila));
							$matchs = $find_donor->rowCount();
							if ( $matchs != 0 ) {
							$blood_donors = $find_donor->fetchAll(PDO::FETCH_ASSOC);
							foreach ( $blood_donors as $blood_donor ) {
						?>
						<tr>
							<td><?php echo $blood_donor['id'];?></td>
							<td><?php echo $blood_donor['name'];?></td>
							<td><?php echo $blood_donor['division'];?></td>
							<td><?php echo $blood_donor['district'];?></td>
							<td><?php echo $blood_donor['state'];?></td>
							<td><?php $st = new BloodGroup(); echo $st->bloodGroupNaming($blood_donor['blood_group']);?></td>
							<td class="text-center"><a href="" class="btn btn-info">কলব্যাক করুন</a></td>
						</tr>
						<?php } }else{ ?>
						<tr>
							<td colspan="8"><h3 class="text-center">Sorry! No donor found in your location.</h3></td>
						</tr>
						<?php } } ?>
					</tbody>	
				  </table>
				  <br />
				  <br />
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6">
					<form method="post">
					  <div class="form-group clearfix">
						<label class="col-lg-6 col-md-6 col-sm-6 nopadding" for="district">কোন কিছু জিজ্ঞেস করুন :</label>
						<select class="form-control" name="message_admin">
							<option value="">পছন্দ করুন</option>
							<option value="technical_admin">Technical Admin</option>
							<option value="admin">Admin</option>
						</select>
					  </div>
					  <textarea class="form-control" name="message" rows="3" placeholder="Messages"></textarea>
					  <div class="clearfix" style="margin-bottom:8px"></div>
					  <button type="submit" name="ask" class="btn btn-info">Ask</button>
					</form>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<form method="post">
					  <div class="form-group clearfix">
						<label class="col-lg-3 col-md-3 col-sm-3 nopadding" for="name">নাম :</label>
						<input type="text" name="name" class="col-lg-3 col-md-3 col-sm-3 form-control" value="<?php if(isset($name)){echo $name;}?>" placeholder="নাম">
					  </div>
					  <div class="form-group clearfix">
						<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার বিভাগ :</label>
						<select class="form-control" name="division" onchange="this.form.submit()">
							<option value="">আপনার বিভাগ পছন্দ করুন</option>
							<?php
								foreach($divisions as $division) {
									$tmpr = null;
									if ( isset ( $_POST['division'] ) && ( $division->getName() == $_POST['division'] )) {
										$tmpr = 'selected';
										$selected_division = $division;
									}
									echo '<option value="'.$division->getName().'"  '. $tmpr .'>'.$division->getNameBn().'</option>'; 
								}
							?>
						</select>
						
					  </div>
					  <?php
						if ( isset ( $selected_division ) ) {
					  ?>
					  <div class="form-group clearfix">
						<label class="col-lg-6 col-md-6 col-sm-6" for="district">আপনার জেলা :</label>
						<select class="form-control" name="district" onchange="this.form.submit()">
							<option value="">আপনার জেলা পছন্দ করুন</option>
							<?php
								foreach($selected_division->getDistricts() as $district) {
									$tmpr = null;
									if ( isset ( $_POST['district'] ) && ($_POST['district'] == $district->getName())) {
										$tmpr = 'selected';
										$selected_district = $district;
									}
									echo '<option '. $tmpr . ' value="'.$district->getName().'">'.$district->getNameBn().'</option>';
								}
							?>
						</select>
					  </div>
					  <?php
						}
						if ( isset ( $selected_district ) ) {
					  ?>
					  <div class="form-group clearfix">
						<label class="col-lg-6 col-md-6 col-sm-6" for="upazila">আপনার থানা :</label>
						<select class="form-control" name="upazila" onchange="this.form.submit()">
							<option value="">আপনার থানা পছন্দ করুন</option>
							<?php
								foreach ( $selected_district->getUpazilas() as $upozila ) {
									$tmpr = null;
									if ( ( isset ($_POST['upazila']) ) && ($upozila->getName() == $_POST['upazila']) ) {
										$tmpr = 'selected';
									}
									echo '<option '. $tmpr .' value="'. $upozila->getName() .'">'. $upozila->getNameBn() .'</option>';
								}
							?> 
						</select>
					  </div>
					  <?php } ?>
					  <div class="clearfix" style="margin-bottom:8px"></div>
					  <button type="submit" name="find_donor" class="btn btn-info">Find Donor</button>
					</form>
				</div>
			</div>	
		</div>
	</div>			
	
<?php include('footer.php');?>