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

        <?php

if (isset($_GET['id'])) {
    $update_id = $_GET['id'];
    // $personal_interest = [];
    $query = "SELECT * FROM applicants WHERE id='$update_id' ";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
            @$personal_interest = $row['personal_interest'];
            $personal_interest1 = explode(',', $personal_interest);

        ?>
            <div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Name</b></label>
						<input type="text" class="form-control" name="applicant_first_name"  value="<?= $row['applicant_first_name']; ?>" required >
					</div>
				</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Mobile Number</b></label>
					<input type="text" class="form-control" name="mobile_number" id="mobile_number" required value="<?= $row['mobile_number']; ?>" >
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Email Address</b></label>
					<input type="email" class="form-control" name="applicant_email_address" id="applicant_email_address"value="<?= $row['applicant_email_address']; ?>" >
				</div>
			</div>


			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Department</b></label>
					<input type="text" class="form-control" name="applicant_department" id="applicant_department" value="<?= $row['applicant_department']; ?>">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Date of purchase</b></label>
					<input type="text" class="form-control datepicker" name="date_of_purchase" id="date_of_purchase" value="<?= $row['date_of_purchase']; ?>">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Amount($)</b></label>
					<input type="number" class="form-control" name="amount" id="amount" required value="<?= $row['amount']; ?>" >
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Approved by </b></label>
					<input type="text" class="form-control" name="approved_by" id="approved_by" required value="<?= $row['approved_by']; ?>" >
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Name of Vendor</b></label>
					<input type="text" class="form-control" name="name_of_vendor" id="name_of_vendor" required value="<?= $row['name_of_vendor']; ?>" >
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Vendor’s contact number</b></label>
					<input type="text" class="form-control" name="vendor_contact_number" id="vendor_contact_number" required value="<?= $row['vendor_contact_number']; ?>" >
				</div>
			</div>


        <div class="col-sm-6">
            <div class="form-group">
                <label><b>Category</b></label>
                <select name="category" class="form-control" id="category">
                    <option value="">Please select category</option>
                    <option value="1"<?php if($row['category'] == '1') echo ' selected="selected"'; ?>>option 1</option>
                    <option value="2"<?php if ($row['category'] == '2') echo ' selected="selected"'; ?>>option 2</option>
                </select>
            </div>
        </div>

       


			<div class="col-sm-6">
				<div class="form-group">
					<label><b>Sub-Category</b></label>
					<select name="sub_category" class="form-control" id="sub_category" onchange="storeFormData('sub_category')">
						<option value="">Please select sub-category</option>
						<option value="1"<?php if($row['sub_category'] == '1') echo 'selected="selected"';?>>option 1</option>
						<option value="2"<?php if($row['sub_category']== '2') echo 'selected="selected"';?>>option 2</option>
					</select>
				</div>
			</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Invoice / Reciept</b></label>
						<div class="file-input">
                            <span><?= $row['link']; ?> </span>
							<input type="file" class="form-control file-input__input " id="img" name="reciept">
                            
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
            <?php include('whatsaap.php');?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="send_mail_preview" name="update">Update</button>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "No Record Found";
    }
}
?>

			
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
	</script>

	<?php

	if (isset($_POST['update'])) {
        $id = $update_id;
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

		$query = "UPDATE applicants SET
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
			link                                = '$img'";
		
        $query .= " WHERE id = $id";
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

			$query = "INSERT INTO entries SET
        		applicant_id = '$application_id',
				ip_address = '$ip_address',
				check_in_time = '$time'";
            
            $result = mysqli_query($con, $query);

			echo '<script>alert("Customer Check In Successfully");window.location.href="list.php";</script>';
		}
	}

	?>
</body>

</html>