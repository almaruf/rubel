<?php 
	include('header.php');
	include('../classes/Donor.php');
	include('config.php');
	$statement1 = $db->prepare("SELECT * FROM blood_donor");
	$statement1->execute();
	$tot_donor = $statement1->rowCount();
	$statement = $db->prepare("SELECT * FROM blood_donor ORDER BY id DESC LIMIT 10");
	$statement->execute();
	$donors = $statement->fetchAll(PDO::FETCH_ASSOC);
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
							foreach ( $donors as $donor ) {
							$sl +=1;
						?>
						<tr class="<?php if($sl % 2 == 0){echo '';}else{echo 'warning';}?>">
							<td><?php $st = new BloodGroup(); echo $st->bloodGroupNaming($donor['blood_group']);?></td>
							<td><?php echo $donor['name'];?></td>
							<td><?php echo $donor['division'];?></td>
							<td><?php echo $donor['district'];?></td>
							<td><?php echo $donor['state'];?></td>
							<td class="text-center"><a href="" class="btn btn-info"><i class="fa fa-pencil"></i> এডিট</a></td>
						</tr>
						<?php } ?>
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
						<input type="text" name="name" class="col-lg-3 col-md-3 col-sm-3 form-control" id="name" placeholder="নাম">
					  </div>
					  <div class="form-group clearfix">
						<label class="col-lg-6 col-md-6 col-sm-6 nopadding" for="district">জেলা :</label>
						<select class="form-control" name="district">
							<option value="">জেলা পছন্দ করুন</option>
							<?php
								$divisions = include_once('../address-list.php');
								foreach($divisions as $divisionName => $divisionDetails) {
									echo '<optgroup label="'.$divisionDetails['name_bn'].'">';
									foreach($divisionDetails['districts'] as $districtName => $districtDetails) {
										echo '<option value="'.$districtName.'">'.$districtDetails['name_bn'].'</option>';
									}
									echo '</optgroup>';
								}
							?>
						</select>
					  </div>
					  <div class="form-group clearfix">
						<label class="col-lg-6 col-md-6 col-sm-6 nopadding" for="district">থানা :</label>
						<select class="form-control" name="state">
							<option value="">থানা পছন্দ করুন</option>
							<?php
								foreach($divisions as $divisionName => $divisionDetails) {
								  foreach($divisionDetails['districts'] as $districtName => $districtDetails) {
									echo '<optgroup label="'.$districtDetails['name_bn'].'">';
									 foreach($districtDetails['thanas'] as $thanaName => $thanaDetails) {
										echo '<option value="'.$thanaName.'">'.$thanaDetails['name_bn'].'</option>';
									  }
									echo '</optgroup>';  
								  }

								}
							?>
						</select>
					  </div>
					  <div class="form-group clearfix">
						<label class="col-lg-6 col-md-6 col-sm-6 nopadding" for="district">ইউনিয়ন/সিটি কর্পোরেশন :</label>
						<select class="form-control" name="donor_union">
							<option value="">পছন্দ করুন</option>
							<?php
								foreach($divisions as $divisionName => $divisionDetails) {
								  foreach($divisionDetails['districts'] as $districtName => $districtDetails) {
									echo '<optgroup label="'.$districtDetails['name_bn'].'">';
									 foreach($districtDetails['thanas'] as $thanaName => $thanaDetails) {
										echo '<option value="'.$thanaName.'">'.$thanaDetails['name_bn'].'</option>';
									  }
									echo '</optgroup>';  
								  }

								}
							?>
						</select>
					  </div>
					  <div class="form-group clearfix">
						<label class="col-lg-6 col-md-6 col-sm-6 nopadding" for="seeker_word">ওয়ার্ড :</label>
						<input type="text" name="seeker_word" class="col-lg-6 col-md-6 col-sm-6 form-control" id="word" placeholder="ওয়ার্ড">
					  </div>
					  <div class="clearfix" style="margin-bottom:8px"></div>
					  <button type="submit" name="find_donor" class="btn btn-info">Find Donor</button>
					</form>
				</div>
			</div>	
		</div>
	</div>			
	
<?php include('footer.php');?>