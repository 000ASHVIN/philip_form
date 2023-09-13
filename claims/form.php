<?php
include('config.php');
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

if(!isset($_SESSION['email'])){
	// header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
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
			<!-- <a href="logout.php" class="btn btn-primary logout">Logout</a> -->
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
						<label><b>Name</b></label>
						<input type="text" class="form-control" name="applicant_first_name" id="applicant_first_name" required oninput="storeFormData()">
					</div>
				</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Mobile Number</b></label>
					<input type="text" class="form-control" name="mobile_number" id="mobile_number" required oninput="storeFormData('mobile_number')">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Email Address</b></label>
					<input type="email" class="form-control" name="applicant_email_address" id="applicant_email_address" required oninput="storeFormData('applicant_email_address')">
				</div>
			</div>


			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Department</b></label>
					<input type="text" class="form-control" name="applicant_department" id="applicant_department" required oninput="storeFormData('applicant_department')">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Date of purchase</b></label>
					<input type="text" class="form-control datepicker" name="date_of_purchase" id="date_of_purchase" required oninput="storeFormData('date_of_purchase')">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Amount($)</b></label>
					<input type="number" class="form-control" name="amount" id="amount" required oninput="storeFormData('amount')">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Approved by </b></label>
					<input type="text" class="form-control" name="approved_by" id="approved_by" required oninput="storeFormData('approved_by')">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Name of Vendor</b></label>
					<input type="text" class="form-control" name="name_of_vendor" id="name_of_vendor" required oninput="storeFormData('name_of_vendor')">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Vendor’s contact number</b></label>
					<input type="text" class="form-control" name="vendor_contact_number" id="vendor_contact_number" required oninput="storeFormData('vendor_contact_number')">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Category</b></label>
					<select name="category" class="form-control" id="category" onchange="storeFormData('category')">
						<option value="">Please select category</option>
						<option value="1">option 1</option>
						<option value="2">option 2</option>
					</select>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Sub-Category</b></label>
					<select name="sub_category" class="form-control" id="sub_category" onchange="storeFormData('sub_category')">
						<option value="">Please select sub-category</option>
						<option value="1">option 1</option>
						<option value="2">option 2</option>
					</select>
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

				<!-- <div class="col-sm-12">
					<div class="form-group">
						<label><b>Notes</b></label>
						<textarea name="applicant_notes" id="applicant_notes" rows="7" class="form-control applicant_notes"></textarea>
					</div>
				</div> -->
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Invoice / Reciept</b></label>
						<div class="file-input">
							<input type="file" class="form-control file-input__input " id="img" name="reciept" required>
							<label class="file-input__label " for="img">
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
								</svg> 
								 <span>Upload Invoice / Reciept</span>
							</label>
						</div>
					</div>
					<div id="img-name" class="alert alert-primary" style="display: none;"></div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group" style="display:flex;justify-content:space-between">
						<div>
							<button type="submit" class="btn btn-success" id="send_mail_preview" name="submit">Submit</button>
						</div>
					</div>
				</div>
			</div>

			
		</form>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

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
		// $( function() {
			$( ".datepicker" ).datepicker({
				dateFormat: "dd-mm-yy"
			});
		// } );
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
		// $applicant_last_name = $_POST['applicant_last_name'];
		$applicant_department = $_POST['applicant_department'];
		$date_of_purchase = $_POST['date_of_purchase'];
		$amount = $_POST['amount'];
		$applicant_email_address = $_POST['applicant_email_address'];
		$approved_by = $_POST['approved_by'];
		$mobile_number = $_POST['mobile_number'];
		$name_of_vendor = $_POST['name_of_vendor'];
		$vendor_contact_number = $_POST['vendor_contact_number'];
		$category = $_POST['category'];
		$sub_category = $_POST['sub_category'];
		$personal_interests = NULL;
		if(isset($_POST['personal_interest'])){
			$personal_interests = $_POST['personal_interest'];
			if(count($personal_interests)) {
				$personal_interest = implode(",", $personal_interests);
			}
		}
		// $applicant_notes = $_POST['applicant_notes'];
		// $applicant_full_name = $_POST['applicant_full_name'];
		// $mobile_number = $_POST['mobile_number'];
		$applicant_full_name = $applicant_first_name;

		$file_name = str_replace(' ', '-', $applicant_full_name);

		$img = '';
		$img_dir = 'uploads/reciept';
		if (!file_exists($img_dir)) {
			mkdir($img_dir, 0777, true);
		}


		if ($_FILES["reciept"]["tmp_name"]) {
			$fname = $file_name . '-reciept-' . strtotime("now");
			$uploaded_file = $_FILES["reciept"]["tmp_name"];
			$ext = pathinfo($_FILES["reciept"]["name"], PATHINFO_EXTENSION);
			$new_file_name = $img_dir . "/" . $fname . '.' . $ext;
			move_uploaded_file($uploaded_file, $new_file_name);
			$img = $fname . "." . $ext;
		}

		$time=  date('d-m-Y h:ia');

		$query = "INSERT INTO applicants SET
			applicant_full_name						= '$applicant_full_name',
			applicant_first_name					= '$applicant_first_name',
			applicant_department			= '$applicant_department',
			date_of_purchase						= '$date_of_purchase',
			amount					= '$amount',
			applicant_email_address					= '$applicant_email_address',
			approved_by					= '$approved_by',
			mobile_number						    = '$mobile_number',
			name_of_vendor						= '$name_of_vendor',
			vendor_contact_number		        = '$vendor_contact_number',
			category		        = '$category',
			sub_category		        = '$sub_category',
			link                                = '$img',
			created_at		        = '$created_at',
			updated_at		        = '$updated_at'";

		$flag = 1;
		if ($flag == 1) {
			$checkin = mysqli_query($con, $query);
			if ($checkin) {
				session_destroy();
			} else {
				echo "Error: " . mysqli_error($con);
			}
			echo mysqli_error($con);
			$application_id = mysqli_insert_id($con);

			// $query = "select * from `users` where email='". $_SESSION['email'] ."' LIMIT 1";
            // $result = mysqli_query($con,$query);
            // $admin = mysqli_fetch_object($result);

			// $activity_query = "INSERT INTO activities SET
			// 	admin_id						= '$admin->id',
			// 	applicant_id					= '$application_id',
			// 	created_at                     =  '$time',
			// 	type						= 'created'";
				
			// mysqli_query($con, $activity_query);

			$ip_address    = getIPAddress();

			$query = "INSERT INTO entries SET
        		applicant_id = '$application_id',
				ip_address = '$ip_address',
				check_in_time = '$time'";
            
            $result = mysqli_query($con, $query);

			echo '<script>alert("Customer Check In Successfully");window.location.href="list.php";</script>';
		}
	}

	?>
	<script>
    var formData = {};
    function storeFormData() {
        formData.applicant_first_name = document.getElementById("applicant_first_name").value;
        formData.mobile_number = document.getElementById("mobile_number").value;
        formData.applicant_email_address = document.getElementById("applicant_email_address").value;
        formData.applicant_department = document.getElementById("applicant_department").value;
        formData.date_of_purchase = document.getElementById("date_of_purchase").value;
        formData.amount = document.getElementById("amount").value;
        formData.approved_by = document.getElementById("approved_by").value;
        formData.name_of_vendor = document.getElementById("name_of_vendor").value;
        formData.vendor_contact_number = document.getElementById("vendor_contact_number").value;
        formData.category = document.getElementById("category").value;
        formData.sub_category = document.getElementById("sub_category").value;
        formData.sub_category = document.getElementById("sub_category").value;

        sessionStorage.setItem('form_data', JSON.stringify(formData));
    }

    function loadFormData() {
        var storedFormData = sessionStorage.getItem('form_data');
        if (storedFormData) {
            formData = JSON.parse(storedFormData);

            document.getElementById("applicant_first_name").value = formData.applicant_first_name;
            document.getElementById("mobile_number").value = formData.mobile_number;
            document.getElementById("applicant_email_address").value = formData.applicant_email_address;
            document.getElementById("applicant_department").value = formData.applicant_department;
            document.getElementById("date_of_purchase").value = formData.date_of_purchase;
            document.getElementById("amount").value = formData.amount;
            document.getElementById("approved_by").value = formData.approved_by;
            document.getElementById("name_of_vendor").value = formData.name_of_vendor;
            document.getElementById("vendor_contact_number").value = formData.vendor_contact_number;
            document.getElementById("category").value = formData.category;
            document.getElementById("sub_category").value = formData.sub_category;

        }
    }

    window.onload = function() {
        loadFormData();
    };
</script>

</body>

</html>