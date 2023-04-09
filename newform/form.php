<?php
include('config.php');
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

if(!isset($_SESSION['email'])){
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/base.css">
	<style>
		#canvas {
			background: white;
			border: 3px solid #575859;
		}

		.line {
			fill: none;
			stroke-width: 2px;
			stroke-linejoin: round;
			stroke-linecap: round;
		}

		.file-input__input {
			width: 0.1px;
			height: 0.1px;
			opacity: 0;
			overflow: hidden;
			position: absolute;
			z-index: -1;
		}

		.file-input__label {
			cursor: pointer;
			display: inline-flex;
			align-items: center;
			border-radius: 4px;
			font-size: 14px;
			font-weight: 600;
			color: #fff;
			font-size: 14px;
			padding: 10px 12px;
			background-color: #0069d9;
			box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25);
		}

		.file-input__label svg {
			height: 16px;
			margin-right: 4px;
		}

		.alert {
			padding: 5px 10px;
			padding-bottom: 6px;
			margin-bottom: 10px;
		}

		.header {
			position: relative;
		}

		.header img {
			width: 100%;
			margin-bottom: 25px;
			min-height: 150px;
		}

		.header .description {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.title {
			text-align: center;
			margin: 25px 0;
		}

		.description h4,
		.description h5 {
			text-align: center;
			color: #3b5b40;
		}

		.description h4 {
			margin-bottom: 20px;
		}

		.applicant_notes {
			resize: none;
		}
		.logout{
			float: right;
			margin: 30px;
		}
	</style>
</head>

<body>
	<!-- <div class="header" style="background-image: url('logo/NH-Upload-Form-Background.png');"> -->

	<!-- </div> -->

		<div class="title">
			<!-- <h4>NATRAHEA</h4> -->
			<img src="logo/natrahea.jpg" alt="" style="max-width: 180px;">
			<a href="logout.php" class="btn btn-primary logout">Logout</a>
		</div>
		
	
	<div class="header">
		<img src="logo/NH-Upload-Form-Background.jpg" alt="">
		<div class="description">
			<h4>Customers' PDF Upload</h4>
			<h5>Contact Philip should you run into any issues</h5>
		</div>
	</div>
	<div class="container">
		<form action="" method="POST" id="myform" enctype="multipart/form-data">

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>First Name</b></label>
						<input type="text" class="form-control" name="applicant_first_name" required>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Last Name</b></label>
						<input type="text" class="form-control" name="applicant_last_name" required>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Company Designation</b></label>
						<input type="text" class="form-control" name="applicant_company_designation" required>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Address</b></label>
						<input type="text" class="form-control" name="applicant_address" required>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Postal Code</b></label>
						<input type="tel" pattern="[0-9]{6}" class="form-control" name="applicant_postal_code" required>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Email Address</b></label>
						<input type="email" class="form-control" name="applicant_email_address" required>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Date Of Birth (DD-MM-YY)</b></label>
						<input type="tel" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}" class="form-control" name="applicant_date_of_birth" required>
					</div>
				</div>


				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Mobile Number</b></label>
						<input type="text" class="form-control" name="mobile_number" required>
					</div>
				</div>

				<!-- <div class="col-sm-6">
					<div class="form-group">
						<label><b>Personal interests</b></label>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="watching_sports" id="watching_sports" name="personal_interest[]" checked>
							<label class="form-check-label" for="watching_sports">
								Watching sports
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="cooking" id="cooking" name="personal_interest[]">
							<label class="form-check-label" for="cooking">
								Cooking
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="health_and_wellbeing" id="health_and_wellbeing" name="personal_interest[]">
							<label class="form-check-label" for="health_and_wellbeing">
								Health & Wellbeing
							</label>
						</div>
					</div>
				</div> -->

				<div class="col-sm-12">
					<div class="form-group">
						<label><b>Notes</b></label>
						<textarea name="applicant_notes" id="applicant_notes" rows="7" class="form-control applicant_notes"></textarea>
					</div>
				</div>
			</div>

			<!-- <div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Image</b></label>
						<div class="file-input">
							<input type="file" accept="image/*" class="form-control file-input__input " id="img" name="img" required>
							<label class="file-input__label " for="img">
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
								</svg> 
								 <span>Upload Image</span>
							</label>
						</div>
					</div>
					<div id="img-name" class="alert alert-primary" style="display: none;"></div>
				</div>
			</div> -->

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group" style="display:flex;justify-content:space-between">
						<div>
							<!-- <button type="submit" class="btn btn-success" id="send_mail_preview" name="submit">Submit</button> -->
						</div>
						
						
						<div>
							<button type="submit" class="btn btn-success mb-5 " id="check_in" name="submit">Check in</button>
						</div>
					</div>
				</div>
			</div>

			
		</form>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" crossorigin="anonymous"></script>
	<script>
		window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')
	</script>
	<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/jquery.fittext.js"></script>
	<script src="js/backstretch.js"></script>
	<script src="js/waypoints.js"></script>
	<script src="js/main.js"></script>
	<script src="js/svg2img.js"></script>
	<script src="d3.v3.js" charset="utf-8"></script>

	<script>
		$("#img").change(function() {
			var text = this.files[0].name + " is selected."
			$("#img-name").text(text);
			$("#img-name").show();
		});
		// $('#myform').submit(function(event) {
		// 	event.preventDefault();		
		// 	$(this).unbind('submit').submit(); // continue the submit unbind preventDefault
		// });
	</script>

	<?php

	function getIPAddress()
	{
		// $time = 
		//whether ip is from the share internet  
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		//whether ip is from the proxy  
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		//whether ip is from the remote address  
		else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	if (isset($_POST['submit'])) {
		$applicant_first_name = $_POST['applicant_first_name'];
		$applicant_last_name = $_POST['applicant_last_name'];
		$applicant_company_designation = $_POST['applicant_company_designation'];
		$applicant_address = $_POST['applicant_address'];
		$applicant_postal_code = $_POST['applicant_postal_code'];
		$applicant_email_address = $_POST['applicant_email_address'];
		$applicant_date_of_birth = $_POST['applicant_date_of_birth'];
		$mobile_number = $_POST['mobile_number'];
		$personal_interests = NULL;
		if(isset($_POST['personal_interest'])){
			$personal_interests = $_POST['personal_interest'];
			if(count($personal_interests)) {
				$personal_interest = implode(",", $personal_interests);
			}
		}
		$applicant_notes = $_POST['applicant_notes'];
		// $applicant_full_name = $_POST['applicant_full_name'];
		// $mobile_number = $_POST['mobile_number'];
		$applicant_full_name = $applicant_first_name . ' ' . $applicant_last_name;

		$file_name = str_replace(' ', '-', $applicant_full_name);

		$img = '';
		$img_dir = 'uploads/img';
		if (!file_exists($img_dir)) {
			mkdir($img_dir, 0777, true);
		}


		if ($_FILES["img"]["tmp_name"]) {
			$fname = $file_name . '-img-' . strtotime("now");
			$uploaded_file = $_FILES["img"]["tmp_name"];
			$ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
			$new_file_name = $img_dir . "/" . $fname . '.' . $ext;
			move_uploaded_file($uploaded_file, $new_file_name);
			$img = $fname . "." . $ext;
		}


		$query = "INSERT INTO applicants SET
			applicant_full_name						= '$applicant_full_name',
			applicant_first_name					= '$applicant_first_name',
			applicant_last_name						= '$applicant_last_name',
			applicant_company_designation			= '$applicant_company_designation',
			applicant_address						= '$applicant_address',
			applicant_postal_code					= '$applicant_postal_code',
			applicant_email_address					= '$applicant_email_address',
			applicant_date_of_birth					= '$applicant_date_of_birth',
			mobile_number						    = '$mobile_number',
			personal_interest						= '$personal_interest',
			applicant_notes						    = '$applicant_notes',
			pdf_link                                = '$img'";

		$flag = 1;
		if ($flag == 1) {
			mysqli_query($con, $query);
			echo mysqli_error($con);
			$application_id = mysqli_insert_id($con);

			$query = "select * from `users` where email='". $_SESSION['email'] ."' LIMIT 1";
            $result = mysqli_query($con,$query);
            $admin = mysqli_fetch_object($result);
			$time=  date('d-m-Y h:ia');
			$activity_query = "INSERT INTO activities SET
				admin_id						= '$admin->id',
				applicant_id					= '$application_id',
				created_at                     =  '$time',
				type						= 'created'";
				
			mysqli_query($con, $activity_query);

			$ip_address    = getIPAddress();
            $check_in_time = $time;

			$query = "INSERT INTO entries SET
        		applicant_id = '$application_id',
				ip_address = '$ip_address',
				check_in_time = '$check_in_time'";
            
            $result = mysqli_query($con, $query);

			echo '<script>alert("Customer Check In Successfully");window.location.href="entry.php";</script>';
		}
	}

	?>
</body>

</html>