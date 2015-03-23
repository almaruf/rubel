<?php 
	include('header.php');
	include('classes/Donor.php');
	include('config.php');
	if( !isset($_REQUEST['id']) ){
		header('location: index.php');
	}else{
		$id = $_REQUEST['id'];
	}

	if(isset($_POST['upd_img'])){
		if(!empty($_FILES['profile_pic']['name'])){
			$up_filename=$_FILES['profile_pic']['name'];
			$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
			$file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
			$img_name = $id. $file_ext;
			
			if(($file_ext!='.png')&&($file_ext!='.PNG')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif')){
				$upd_img_error_mesg = "Only jpg, jpeg, png and gif format images are allowed to upload.";
			}else{
				$img_size = $_FILES["profile_pic"]["size"] / 1024;
				if($img_size > 100){
					$upd_img_error_mesg = "Sorry! Your profile picture's size can not be more than 100kb.";
				}else{
					move_uploaded_file($_FILES['profile_pic']['tmp_name'],'img/users/' . $img_name);
					$statement = $db->prepare("UPDATE blood_donor SET donor_img=? WHERE id=?");
					if( $statement->execute(array($img_name, $id)) ){
						$success_message = "Img Updated Successfully.";
						header('refresh:3;url=user-details.php?id='.$id);
					}else{
						$upd_img_error_mesg = "Error";
					}
				}
			}
		}
		else{
			$upd_img_error_mesg = 'Sorry! You didn\'t select image.';
		}
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
						বিভাগ : <?php echo $user_info['division'];?><br />
						জেলা : <?php echo $user_info['district'];?><br />
						উপজেলা : <?php echo $user_info['state'];?><br />
						জন্ম তারিখ : <?php echo $user_info['date_of_birth'];?><br />
						ওজন : <?php echo $user_info['weight'];?><br />  
						শেষ রক্ত দিয়েছেন : <?php echo $user_info['last_donation'];?><br /><br />
					</p>
					<a href="edit-user-details.php?id=<?php echo $id;?>" class="btn btn-info">বিবরন পরিবর্তন করুন</a>
					<a href="" class="btn btn-info">পাসওয়ার্ড পরিবর্তন করুন</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 user_photo">
					<?php
						if(isset($upd_img_error_mesg)){
					?>	
					<div class="alert alert-danger alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Warning!</strong> <?php echo $upd_img_error_mesg;?>
					</div>
					<?php
						}
						if(isset($success_message)){
					?>	
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong><i class="fa fa-check-circle"></i> </strong> <?php echo $success_message;?>
					</div>
					<?php }
					if ( $user_info['donor_img'] != 'no-image.gif' ) { ?>
					<img src="img/users/<?php echo $user_info['donor_img'];?>" class="img-responsive pull-right" alt="" />
					<?php }else { ?>
					<img src="img/users/no-image.gif" class="img-responsive pull-right" alt="" />
					<?php } ?>
					<div class="clearfix"></div><br />
					<a class="fancybox btn btn-info pull-right" href="#pro_pic">ছবি পরিবর্তন করুন</a>
				</div>
				<div id="pro_pic" style="width:500px; display: none;">
					<form action="" method="post" enctype="multipart/form-data">
						<input id="uploadFile" class="form-control" placeholder="Choose File" disabled />
						<div class="fileUpload btn btn-primary">
							<span><i class="fa fa-upload"></i> Upload</span>
							<input id="uploadBtn" name="profile_pic" type="file" class="upload" />
						</div>
						
						<div style="clear:both"></div>
						<br />
						<button type="submit" name="upd_img" class="btn btn-success">Save Profile Picture</button>
					</form>
				</div>
			</div>
			
			<div class="users_history">
				
			</div>
		</div>
	</div>			
	
<?php include('footer.php');?>