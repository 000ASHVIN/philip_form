<?php
include('config.php');
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
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
	#canvas 
{
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
  background-color: #28a745;
  box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25);
}

.file-input__label svg {
  height: 16px;
  margin-right: 4px;
}
	</style>
</head>
<body>
	<div class="container">
		<div class="row mt-2 mb-2">
			<div class="col-md-2 col-6 text-center mb-3">
			<img src="logo/awhl.png" width="100%">
			</div>
			<div class="col-md-2 col-6 text-center mb-3">
			<img src="logo/FIL.jpg" width="100%">
			</div>
			<div class="col-md-2 col-6 text-center mb-3">
			<img src="logo/passage.jpg" width="100%">
			</div>
			<div class="col-md-2 col-6 text-center mb-3">
			<img src="logo/Trichomed.jpg" width="100%">
			</div>

			<div class="col-md-2 col-6 text-center mb-3">
			<img src="logo/physiomed.jpg" width="100%">
			</div>
			<div class="col-md-2 col-6 text-center mb-3">
			<img src="logo/TCC.jpg" width="100%">
			</div>
			<div class="col-md-2 col-6 text-center mb-3">
			<img src="logo/BC.jpg" width="100%">
			</div>
		</div>
		<form action="" method="POST" id="myform" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>POST APPLIED FOR</b></label>
						<input type="text" class="form-control" name="post_applied_for" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>Application in response to</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input" name="application_in_response_to" value="Newspaper" required>Newspaper
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input" name="application_in_response_to" value="Jobstreet" required>Jobstreet
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input" name="application_in_response_to" value="Referral" required>Referral
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input" name="application_in_response_to" value="Agency" required>Agency
						  	</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<center><h4>APPLICANT'S PARTICULARS</h4></center>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input" name="applicant_initials" value="Mr" required>Mr
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input" name="applicant_initials" value="Mrs" required>Mrs
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input" name="applicant_initials" value="Mdm" required>Mdm
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input" name="applicant_initials" value="Miss" required>Miss
						  	</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Full Name</b></label>
						<input type="text" class="form-control" name="applicant_full_name" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Surname</b></label>
						<input type="text" class="form-control" name="applicant_surname" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Enter name in Chinese Character</b></label>
						<input type="text" class="form-control" name="applicant_chinese_name" required>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>RECENT PHOTOGRAPH</b></label>
						<input type="file" class="form-control" accept="image/*" name="applicant_photo" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>Home Address</b></label>
						<textarea class="form-control" name="applicant_home_address" id="applicant_home_address" required></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>Postal Address</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" id="same_as_home_address">Same as Home Address
						<textarea class="form-control" name="applicant_postal_address" id="applicant_postal_address" required></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Telephone Number (Mobile)</b></label>
						<input type="number" class="form-control" name="applicant_telephone_mobile" required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Telephone Number (Home)</b></label>
						<input type="number" class="form-control" name="applicant_telephone_home" required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Email</b></label>
						<input type="email" class="form-control" name="applicant_email" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h6>Emergency Contact</h6>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Name</b></label>
						<input type="text" class="form-control" name="emergency_contact_person_name" required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Relationship</b></label>
						<input type="text" class="form-control" name="emergency_contact_person_relationship" required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Contact Number</b></label>
						<input type="number" class="form-control" name="emergency_contact_person_number" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Nationality</b></label>
						<input type="text" class="form-control" name="applicant_nationality" required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Identity Card No (last 3 digit with alphabet)</b></label>
						<input type="text" class="form-control" name="applicant_id_number" required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Identity Card (Front)</b></label>
						<div class="file-input"><input type="file" class="form-control file-input__input" id="identity_card_font" name="identity_card_font" required><label class="file-input__label" for="identity_card_font"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>Upload file</span></label></div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Identity Card (Back)</b></label>
						<div class="file-input"><input type="file" class="form-control file-input__input" id="identity_card_back" name="identity_card_back" required><label class="file-input__label" for="identity_card_back"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>Upload file</span></label></div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label><b>Date of Birth</b></label>
						<input type="date" class="form-control" name="applicant_dob" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Are you a Permanent Resident of Singapore?</b></label>
						<select class="form-control" name="applicant_residency_status" id="applicant_residency_status" required>
							<option value="">Select Any Option</option>
							<option>Yes</option>
							<option>No</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group" id="date_of_issue_row" style="display: none;">
						<label><b>Date of Issue</b></label>
						<input type="date" class="form-control" name="applicant_residency_issue_date" id="applicant_residency_issue_date">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Gender</b></label>
						<input type="text" class="form-control" name="applicant_gender" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Country of Birth</b></label>
						<input type="text" class="form-control" name="applicant_birth_country" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Race</b></label>
						<input type="text" class="form-control" name="applicant_race" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Religion</b></label>
						<input type="text" class="form-control" name="applicant_religion" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Marital Status</b></label>
						<select class="form-control" name="applicant_marital_status" required>
							<option value="">Select Any Option</option>
							<option>Single</option>
							<option>Married</option>
							<option>Divorced</option>
							<option>Widowed</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Driving Licence</b></label>
						<select class="form-control" name="applicant_driving_license" required>
							<option value="">Select Any Option</option>
							<option>Class 2</option>
							<option>Class 3</option>
							<option>Class 4</option>
							<option>Class 5</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h5>Please give details of family&nbsp; <a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="add_more_family()">Add more</a>&nbsp; <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="remove_family()">Remove</a></h5>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th>Relationship</th>
									<th>Age</th>
									<th>Occupation/Name of Company</th>
								</tr>
							</thead>
							<tbody id="family_member_details_tbody">
							<?php
							for($i=0;$i<3;$i++)
							{
							?>
							<tr>
								<td><input type="text" class="form-control" name="family_member_name[]"></td>
								<td><input type="text" class="form-control" name="family_member_relationship[]"></td>
								<td><input type="number" class="form-control" name="family_member_age[]"></td>
								<td><input type="text" class="form-control" name="family_member_occupation[]"></td>
							</tr>
							<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h5>FULL TIME NATIONAL SERVICE RECORD</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Have you completed full time National Service?</b></label>
						<select class="form-control" name="national_service_status" required>
							<option value="">Select Any Option</option>
							<option>Yes</option>
							<option>No</option>
							<option>N.A</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Date Enlisted</th>
									<th>Date Discharged</th>
									<th>Type of Service</th>
									<th>Highest Rank Held</th>
								</tr>
							</thead>
							<tbody>
							<tr>
								<td><input type="date" class="form-control" name="ns_date_enlisted"></td>
								<td><input type="date" class="form-control" name="ns_date_discharged"></td>
								<td><input type="text" class="form-control" name="ns_service_type"></td>
								<td><input type="text" class="form-control" name="ns_highest_rank"></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<center>
						<h4>EDUCATION</h4>
						<p>List schools/tertiary institutions attended in chronological order</p>
					</center>
					<div class="form-group float-right"><a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="add_more_education()">Add more</a>&nbsp; <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="remove_education()">Remove</a></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Schools / Institution Attended</th>
									<th>Highest Standard Passed</th>
									<th>Year Attained (from)</th>
									<th>Year Attained (to)</th>
									<th style="min-width: 140px;">Certificate</th>
								</tr>
							</thead>
							<tbody id="education_tbody">
							<?php
							for($i=0;$i<4;$i++)
							{
							?>
							<tr>
								<td><input type="text" class="form-control" name="education_school[]"></td>
								<td><input type="text" class="form-control" name="education_highest_qualification[]"></td>
								<td><input type="number" class="form-control" name="education_year_from[]"></td>
								<td><input type="number" class="form-control" name="education_year_to[]"></td>
								<td><div class="file-input"><input type="file" class="form-control file-input__input education_certificate" id="education_certificate<?php echo $i?>" name="education_certificate[]"><label class="file-input__label" for="education_certificate<?php echo $i?>"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>Upload file</span></label></div></td>
							</tr>
							<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<center>
						<h4>OTHER QUALIFICATIONS RELEVANT TO THE POSITION YOU ARE APPLYING</h4>
						<p>(Typing/Shorthand/Secretarial/Technical Certificates or Diplomas/University/Degrees)</p>
					</center>
					<div class="form-group float-right"><a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="add_more_other_qualification()">Add more</a>&nbsp; <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="remove_other_qualification()">Remove</a></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Certificate / Diploma / Degree</th>
									<th>Date Qualification Obtained</th>
									<th>Institution</th>
									<th style="min-width: 140px;">Certificate</th>
								</tr>
							</thead>
							<tbody id="other_qualification_tbody">
							<?php
							for($i=0;$i<6;$i++)
							{
							?>
							<tr>
								<td><input type="text" class="form-control" name="other_qual_certificate[]"></td>
								<td><input type="date" class="form-control" name="other_qual_date[]"></td>
								<td><input type="text" class="form-control" name="other_qual_institution[]"></td>
								<td><div class="file-input"><input type="file" class="form-control file-input__input other_qual_certificate" id="other_qual_certificate<?php echo $i?>" name="other_qual_certificate[]"><label class="file-input__label" for="other_qual_certificate<?php echo $i?>"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>Upload file</span></label></div>
    							</td>
							</tr>
							<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>If you are currently pursuing a course, please provide us with the details:(eg. Course / Institution / Date of Examination)</b></label>
						<textarea class="form-control" name="pursuing_course_details"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>AWARDS / SCHOLARSHIPS : Please indicate year of award, period of bond (if any) and the bonding authority</b></label>
						<textarea class="form-control" name="applicant_awards_scholarship"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group float-right"><a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="add_more_language()">Add more</a>&nbsp; <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="remove_language()">Remove</a></div>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Languages/Dialects</th>
									<th>SPOKEN</th>
									<th>WRITTEN</th>
								</tr>
							</thead>
							<tbody id="language_tbody">
							<?php
							for($i=0;$i<6;$i++)
							{
							?>
							<tr>
								<td><input type="text" class="form-control" name="applicant_language[]"></td>
								<td>
									<select class="form-control" name="applicant_language_spoken_rating[]">
										<option value="">Select Any Option</option>
										<option>Excellent</option>
										<option>Good</option>
										<option>Fair</option>
										<option>Poor</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="applicant_language_written_rating[]">
										<option value="">Select Any Option</option>
										<option>Excellent</option>
										<option>Good</option>
										<option>Fair</option>
										<option>Poor</option>
									</select>
								</td>
							</tr>
							<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>EXTRA-CURRICULAR ACTIVITIES(Please state hobbies/sports/membership of clubs/societies)</b></label>
						<textarea class="form-control" name="applicant_extra_curricular"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<center><h4>EMPLOYMENT HISTORY</h4></center>
					<h4>PRESENT APPOINTMENT</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Post</b></label>
						<input type="text" class="form-control" name="applicant_present_post" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>From</b></label>
						<input type="date" class="form-control" name="applicant_present_post_from_date" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>To</b></label>
						<input type="date" class="form-control" name="applicant_present_post_to_date" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<div class="form-group">
							<label><b>Present Salary(Please specify allowance(s) if any)</b></label>
							<input type="text" class="form-control" name="applicant_present_salary" required>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Earliest available date</b></label>
						<input type="date" class="form-control" name="applicant_earliest_available_date" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<div class="form-group">
							<label><b>Expected Salary</b></label>
							<input type="text" class="form-control" name="applicant_expected_salary" required>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Name of Employer</b></label>
						<input type="text" class="form-control" name="applicant_present_employer" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<div class="form-group">
							<label><b>Address of Employer</b></label>
							<input type="text" class="form-control" name="applicant_present_employer_address" required>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>Reason for leaving</b></label>
						<input type="text" class="form-control" name="applicant_leaving_reason" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h4>PREVIOUS APPOINTMENTS&nbsp; <a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="add_more_prev_appointment()">Add more</a>&nbsp; <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="remove_prev_appointment()">Remove</a></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Name of Employer(s)</th>
									<th>Position</th>
									<th>Duration</th>
									<th>Basic Salary</th>
									<th>Reason for Leaving</th>
								</tr>
							</thead>
							<tbody id="prev_appointment_tbody">
							<?php
							for($i=0;$i<6;$i++)
							{
							?>
							<tr>
								<td><input type="text" class="form-control" name="applicant_previous_employer[]"></td>
								<td><input type="text" class="form-control" name="applicant_previous_position[]"></td>
								<td><input type="text" class="form-control" name="applicant_previous_duration[]"></td>
								<td><input type="text" class="form-control" name="applicant_previous_basic_salary[]"></td>
								<td><input type="text" class="form-control" name="applicant_previous_leaving_reason[]"></td>
							</tr>
							<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h4>CHARACTER REFEREES</h4>
					<p>(Name 2 persons whom you reported to in your previous job)</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th>Position</th>
									<th>Years Known</th>
									<th>Contact Number</th>
								</tr>
							</thead>
							<tbody>
							<?php
							for($i=0;$i<2;$i++)
							{
							?>
							<tr>
								<td><input type="text" class="form-control" name="applicant_referee_name[]"></td>
								<td><input type="text" class="form-control" name="applicant_referee_position[]"></td>
								<td><input type="text" class="form-control" name="applicant_referee_years_known[]"></td>
								<td><input type="text" class="form-control" name="applicant_referee_contact_number[]"></td>
							</tr>
							<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>May we contact your previous employers?</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input" name="contact_previous_employer" value="Yes" required>Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input" name="contact_previous_employer" value="No" required>No
						  	</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>Do you have any relatives or friends presently working in our group of companies?</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input working_friend_status" name="friends_working_in_applying_company" value="Yes" required>Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input working_friend_status" name="friends_working_in_applying_company" value="No" required>No
						  	</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row" id="working_friend_row" style="display: none;">
				<div class="col-sm-12">
					<div class="form-group float-right"><a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="add_more_presently_working()">Add more</a>&nbsp; <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="remove_presently_working()">Remove</a></div>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th>Appointment</th>
									<th>Department</th>
									<th>Relationship</th>
								</tr>
							</thead>
							<tbody id="presently_working_tbody">
							<?php
							for($i=0;$i<2;$i++)
							{
							?>
							<tr>
								<td><input type="text" class="form-control working_friend_control" name="working_friend_name[]"></td>
								<td><input type="text" class="form-control working_friend_control" name="working_friend_appointment[]"></td>
								<td><input type="text" class="form-control working_friend_control" name="working_friend_department[]"></td>
								<td><input type="text" class="form-control working_friend_control" name="working_friend_relationship[]"></td>
							</tr>
							<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>Is any of your relatives or close friends currently working in the wholesale & retail industry e.g watch, pens, fashion business or in departmental store?</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input working_friend_retail_status" name="friends_working_in_retail" value="Yes" required>Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input working_friend_retail_status" name="friends_working_in_retail" value="No" required>No
						  	</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row" id="working_friend_retail_row" style="display: none;">
				<div class="col-sm-12">
					<div class="form-group float-right"><a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="add_more_currently_working()">Add more</a>&nbsp; <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="remove_currently_working()">Remove</a></div>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Name of family member</th>
									<th>Appointment</th>
									<th>Department</th>
									<th>Name of Company</th>
								</tr>
							</thead>
							<tbody id="currently_working_tbody">
							<?php
							for($i=0;$i<2;$i++)
							{
							?>
							<tr>
								<td><input type="text" class="form-control working_friend_retail_control" name="working_friend_retail_name[]"></td>
								<td><input type="text" class="form-control working_friend_retail_control" name="working_friend_retail_appointment[]"></td>
								<td><input type="text" class="form-control working_friend_retail_control" name="working_friend_retail_department[]"></td>
								<td><input type="text" class="form-control working_friend_retail_control" name="working_friend_retail_company[]"></td>
							</tr>
							<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<center>
						<h4>OTHER INFORMATION</h4>
						<h5>PLEASE ANSWER THE FOLLOWING QUESTION. IF THE ANSWERS ARE YES, PLEASE GIVE DETAILS</h5>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Have you ever been convicted in a court of law of any country?</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_convicted" name="ever_convicted" value="Yes">Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_convicted" name="ever_convicted" value="No">No
						  	</label>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>DETAILS</b></label>
						<input type="text" class="form-control" name="ever_convicted_details" id="ever_convicted_details" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Have you ever been dismissed, discharged or suspended from employment?</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_dismissed" name="ever_dismissed" value="Yes">Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_dismissed" name="ever_dismissed" value="No">No
						  	</label>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>DETAILS</b></label>
						<input type="text" class="form-control" name="ever_dismissed_details" id="ever_dismissed_details" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Have you ever had, or are you suffering from any impairment/disease/mental illness/medical condition?</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_suffered" name="ever_suffered" value="Yes">Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_suffered" name="ever_suffered" value="No">No
						  	</label>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>DETAILS</b></label>
						<input type="text" class="form-control" name="ever_suffered_details" id="ever_suffered_details" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Have you ever had any surgical operation previously?</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_surgical" name="ever_surgical" value="Yes">Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_surgical" name="ever_surgical" value="No">No
						  	</label>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>DETAILS</b></label>
						<input type="text" class="form-control" name="ever_surgical_details" id="ever_surgical_details" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Are you a bankrupt?</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_bankrupt" name="ever_bankrupt" value="Yes">Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_bankrupt" name="ever_bankrupt" value="No">No
						  	</label>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>DETAILS</b></label>
						<input type="text" class="form-control" name="ever_bankrupt_details" id="ever_bankrupt_details" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Are you in debt?</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_debt" name="ever_debt" value="Yes">Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_debt" name="ever_debt" value="No">No
						  	</label>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>DETAILS</b></label>
						<input type="text" class="form-control" name="ever_debt_details" id="ever_debt_details" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Have you previously submitted an application for an appointment in this Company?</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_applied" name="ever_applied" value="Yes">Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_applied" name="ever_applied" value="No">No
						  	</label>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>DETAILS</b></label>
						<input type="text" class="form-control" name="ever_applied_details" id="ever_applied_details" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Have you tried any of our services before? (DR HAACH, HAACH, NATRAHEA)</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_tried" name="ever_tried" value="Yes">Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_tried" name="ever_tried" value="No">No
						  	</label>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>DETAILS</b></label>
						<input type="text" class="form-control" name="ever_tried_details" id="ever_tried_details" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>For Female Applicant, please declare if you are conceiving at the date of application.</b></label><br>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_conceived" name="ever_conceived" value="Yes">Yes
						  	</label>
						</div>
						<div class="form-check-inline">
						  	<label class="form-check-label">
						    	<input type="radio" class="form-check-input ever_conceived" name="ever_conceived" value="No">No
						  	</label>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>DETAILS</b></label>
						<input type="text" class="form-control" name="ever_conceived_details" id="ever_conceived_details" readonly>
					</div>
				</div>
			</div>
			<div class="row" id="sign_div">
				<div class="col-sm-6">
						<label style="display:inline" class="twelve columns mob-whole"><b>Please Sign in the following box</b>  
			<a href="javascript:void(0)" id="sign_now_a" style="color:#f26522 !important">Fix Screen<a></label>
	                  <div class="twelve columns mob-whole" style="margin-bottom:42px;">
						<i class="fa fa-times" style="position: absolute;right: 30px;top:10px" id="remove_sign"></i>
	                    <svg id="canvas" width="100%" height="200px"></svg>
	                  </div>
				</div>
            </div>
				  <input type="hidden" name="hidden_elem" id="hidden_elem">

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<button type="submit" class="btn btn-success" id="send_mail_preview" name="submit">Submit</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>   
   <script src="js/jquery.flexslider.js"></script>
   <script src="js/jquery.fittext.js"></script>
   <script src="js/backstretch.js"></script> 
   <script src="js/waypoints.js"></script>  
   <script src="js/main.js"></script>
	<script src="js/svg2img.js"></script>
	<script src="d3.v3.js" charset="utf-8"></script>
	<script>
		$("#same_as_home_address").click(function(){
			if($(this).prop('checked') == true)
			{
				$("#applicant_postal_address").val($("#applicant_home_address").val());
			}
			else
			{
				$("#applicant_postal_address").val('');
			}
		});
		$("#applicant_residency_status").change(function(){
			var status = this.value;
			if(status == 'Yes')
			{
				$("#date_of_issue_row").show();
				$("#applicant_residency_issue_date").prop('required',true);
			}
			else
			{
				$("#date_of_issue_row").hide();
				$("#applicant_residency_issue_date").prop('required',false);
			}
		});
		$(".working_friend_status").click(function(){
			var working_friend_status = this.value;
			if(working_friend_status == 'Yes')
			{
				$("#working_friend_row").show();
			}
			else
			{
				$("#working_friend_row").hide();
				$(".working_friend_control").val('');
			}
		});
		$(".working_friend_retail_status").click(function(){
			var working_friend_retail_status = this.value;
			if(working_friend_retail_status == 'Yes')
			{
				$("#working_friend_retail_row").show();
			}
			else
			{
				$("#working_friend_retail_row").hide();
				$(".working_friend_retail_control").val('');
			}
		});
		$(".ever_convicted").click(function(){
			var ever_convicted = this.value;
			if(ever_convicted == 'Yes')
			{
				$("#ever_convicted_details").prop('readonly',false);
				$("#ever_convicted_details").prop('required',true);
			}
			else
			{
				$("#ever_convicted_details").val('');
				$("#ever_convicted_details").prop('readonly',true);
				$("#ever_convicted_details").prop('required',false);
			}
		});
		$(".ever_dismissed").click(function(){
			var ever_dismissed = this.value;
			if(ever_dismissed == 'Yes')
			{
				$("#ever_dismissed_details").prop('readonly',false);
				$("#ever_dismissed_details").prop('required',true);
			}
			else
			{
				$("#ever_dismissed_details").val('');
				$("#ever_dismissed_details").prop('readonly',true);
				$("#ever_dismissed_details").prop('required',false);
			}
		});
		$(".ever_suffered").click(function(){
			var ever_suffered = this.value;
			if(ever_suffered == 'Yes')
			{
				$("#ever_suffered_details").prop('readonly',false);
				$("#ever_suffered_details").prop('required',true);
			}
			else
			{
				$("#ever_suffered_details").val('');
				$("#ever_suffered_details").prop('readonly',true);
				$("#ever_suffered_details").prop('required',false);
			}
		});
		$(".ever_surgical").click(function(){
			var ever_surgical = this.value;
			if(ever_surgical == 'Yes')
			{
				$("#ever_surgical_details").prop('readonly',false);
				$("#ever_surgical_details").prop('required',true);
			}
			else
			{
				$("#ever_surgical_details").val('');
				$("#ever_surgical_details").prop('readonly',true);
				$("#ever_surgical_details").prop('required',false);
			}
		});
		$(".ever_bankrupt").click(function(){
			var ever_bankrupt = this.value;
			if(ever_bankrupt == 'Yes')
			{
				$("#ever_bankrupt_details").prop('readonly',false);
				$("#ever_bankrupt_details").prop('required',true);
			}
			else
			{
				$("#ever_bankrupt_details").val('');
				$("#ever_bankrupt_details").prop('readonly',true);
				$("#ever_bankrupt_details").prop('required',false);
			}
		});
		$(".ever_debt").click(function(){
			var ever_debt = this.value;
			if(ever_debt == 'Yes')
			{
				$("#ever_debt_details").prop('readonly',false);
				$("#ever_debt_details").prop('required',true);
			}
			else
			{
				$("#ever_debt_details").val('');
				$("#ever_debt_details").prop('readonly',true);
				$("#ever_debt_details").prop('required',false);
			}
		});
		$(".ever_applied").click(function(){
			var ever_applied = this.value;
			if(ever_applied == 'Yes')
			{
				$("#ever_applied_details").prop('readonly',false);
				$("#ever_applied_details").prop('required',true);
			}
			else
			{
				$("#ever_applied_details").val('');
				$("#ever_applied_details").prop('readonly',true);
				$("#ever_applied_details").prop('required',false);
			}
		});
		$(".ever_tried").click(function(){
			var ever_tried = this.value;
			if(ever_tried == 'Yes')
			{
				$("#ever_tried_details").prop('readonly',false);
				$("#ever_tried_details").prop('required',true);
			}
			else
			{
				$("#ever_tried_details").val('');
				$("#ever_tried_details").prop('readonly',true);
				$("#ever_tried_details").prop('required',false);
			}
		});
		$(".ever_conceived").click(function(){
			var ever_conceived = this.value;
			if(ever_conceived == 'Yes')
			{
				$("#ever_conceived_details").prop('readonly',false);
				$("#ever_conceived_details").prop('required',true);
			}
			else
			{
				$("#ever_conceived_details").val('');
				$("#ever_conceived_details").prop('readonly',true);
				$("#ever_conceived_details").prop('required',false);
			}
		});
	</script>
	<script>
	$('#myform').submit(function(event) {

 event.preventDefault(); //this will prevent the default submit

  $('#canvas').svg2img();
  
 $(this).unbind('submit').submit(); // continue the submit unbind preventDefault
});
		(function() {
      var SWATCH_D, active_color, active_line, canvas, drag, drawing_data, lines_layer, palette, redraw, render_line, swatches, trash_btn, ui;
    
      SWATCH_D = 22;
    
      render_line = d3.svg.line().x(function(d) {
        return d[0];
      }).y(function(d) {
        return d[1];
      }).interpolate('basis');
    
      drawing_data = {
        lines: [
        ]
      };
    
      active_line = null;
    
      active_color = "#333333";
    
      canvas = d3.select('#canvas');
    
      lines_layer = canvas.append('g');
    
      ui = d3.select('#ui');
    
    
            
            
            
        $("#remove_sign").click(function(){
            drawing_data.lines = [];
            return redraw();
        });    
    
      drag = d3.behavior.drag();
    
      drag.on('dragstart', function() {
        active_line = {
          points: [],
          color: active_color
        };
        drawing_data.lines.push(active_line);
        return redraw(active_line);
      });
    
      drag.on('drag', function() {
        active_line.points.push(d3.mouse(this));
        return redraw(active_line);
      });
    
      drag.on('dragend', function() {
        if (active_line.points.length === 0) {
          drawing_data.lines.pop();
        }
        active_line = null;
      });
    
      canvas.call(drag);
    
      redraw = function(specific_line) {
        var lines;
        lines = lines_layer.selectAll('.line').data(drawing_data.lines);
        lines.enter().append('path').attr({
          "class": 'line',
          stroke: function(d) {
            return d.color;
          }
        }).each(function(d) {
          return d.elem = d3.select(this);
        });
        if (specific_line != null) {
          specific_line.elem.attr({
            d: function(d) {
              return render_line(d.points);
            }
          });
        } else {
          lines.attr({
            d: function(d) {
              return render_line(d.points);
            }
          });
        }
        return lines.exit().remove();
      };
    
      redraw();
    
    }).call(this);
	
	function add_more_family()
	{
		let html='<tr>\
					<td><input type="text" class="form-control" name="family_member_name[]"></td>\
					<td><input type="text" class="form-control" name="family_member_relationship[]"></td>\
					<td><input type="number" class="form-control" name="family_member_age[]"></td>\
					<td><input type="text" class="form-control" name="family_member_occupation[]"></td>\
							</tr>';
		$("#family_member_details_tbody").append(html);
	}
	function remove_family()
	{
		let length=$("#family_member_details_tbody tr").length;
		if(length>3)
		{
			$("#family_member_details_tbody tr:last").remove();
		}
		else
		{
			alert("You can not delete anymore");
		}
	}
	function add_more_education()
	{
		let education_certificate_length=$(".education_certificate").length;
		education_certificate_length=education_certificate_length++;
		let html='<tr>\
					<td><input type="text" class="form-control" name="education_school[]"></td>\
					<td><input type="text" class="form-control" name="education_highest_qualification[]"></td>\
					<td><input type="number" class="form-control" name="education_year_from[]"></td>\
					<td><input type="number" class="form-control" name="education_year_to[]"></td>\
					<td><div class="file-input"><input type="file" class="form-control file-input__input education_certificate" id="education_certificate'+education_certificate_length+'" name="education_certificate[]"><label class="file-input__label" for="education_certificate'+education_certificate_length+'"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>Upload file</span></label></div></td>\
							</tr>';
		$("#education_tbody").append(html);
	}
	function remove_education()
	{
		let length=$("#education_tbody tr").length;
		if(length>4)
		{
			$("#education_tbody tr:last").remove();
		}
		else
		{
			alert("You can not delete anymore");
		}
	}
	function add_more_other_qualification()
	{
		let other_qual_certificate_length=$(".other_qual_certificate").length;
		other_qual_certificate_length=other_qual_certificate_length++;
		let html='<tr>\
					<td><input type="text" class="form-control" name="other_qual_certificate[]"></td>\
					<td><input type="date" class="form-control" name="other_qual_date[]"></td>\
					<td><input type="text" class="form-control" name="other_qual_institution[]"></td>\
					<td><div class="file-input"><input type="file" class="form-control file-input__input other_qual_certificate" id="other_qual_certificate'+other_qual_certificate_length+'" name="other_qual_certificate[]"><label class="file-input__label" for="other_qual_certificate'+other_qual_certificate_length+'"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>Upload file</span></label></div></td>\
							</tr>';
		$("#other_qualification_tbody").append(html);
	}
	function remove_other_qualification()
	{
		let length=$("#other_qualification_tbody tr").length;
		if(length>6)
		{
			$("#other_qualification_tbody tr:last").remove();
		}
		else
		{
			alert("You can not delete anymore");
		}
	}
	function add_more_language()
	{
		let html='<tr>\
					<td><input type="text" class="form-control" name="applicant_language[]"></td>\
					<td>\
						<select class="form-control" name="applicant_language_spoken_rating[]">\
							<option value="">Select Any Option</option>\
							<option>Excellent</option>\
							<option>Good</option>\
							<option>Fair</option>\
							<option>Poor</option>\
						</select>\
					</td>\
					<td>\
						<select class="form-control" name="applicant_language_written_rating[]">\
							<option value="">Select Any Option</option>\
							<option>Excellent</option>\
							<option>Good</option>\
							<option>Fair</option>\
							<option>Poor</option>\
						</select>\
					</td>\
				</tr>';
		$("#language_tbody").append(html);
	}
	function remove_language()
	{
		let length=$("#language_tbody tr").length;
		if(length>6)
		{
			$("#language_tbody tr:last").remove();
		}
		else
		{
			alert("You can not delete anymore");
		}
	}
	function add_more_prev_appointment()
	{
		let html='<tr>\
					<td><input type="text" class="form-control" name="applicant_previous_employer[]"></td>\
					<td><input type="text" class="form-control" name="applicant_previous_position[]"></td>\
					<td><input type="text" class="form-control" name="applicant_previous_duration[]"></td>\
					<td><input type="text" class="form-control" name="applicant_previous_basic_salary[]"></td>\
					<td><input type="text" class="form-control" name="applicant_previous_leaving_reason[]"></td>\
					</tr>';
		$("#prev_appointment_tbody").append(html);
	}
	function remove_prev_appointment()
	{
		let length=$("#prev_appointment_tbody tr").length;
		if(length>6)
		{
			$("#prev_appointment_tbody tr:last").remove();
		}
		else
		{
			alert("You can not delete anymore");
		}
	}
	function add_more_presently_working()
	{
		let html='<tr>\
					<td><input type="text" class="form-control working_friend_control" name="working_friend_name[]"></td>\
					<td><input type="text" class="form-control working_friend_control" name="working_friend_appointment[]"></td>\
					<td><input type="text" class="form-control working_friend_control" name="working_friend_department[]"></td>\
					<td><input type="text" class="form-control working_friend_control" name="working_friend_relationship[]"></td>\
					</tr>';
		$("#presently_working_tbody").append(html);
	}
	function remove_presently_working()
	{
		let length=$("#presently_working_tbody tr").length;
		if(length>2)
		{
			$("#presently_working_tbody tr:last").remove();
		}
		else
		{
			alert("You can not delete anymore");
		}
	}
	function add_more_currently_working()
	{
		let html='<tr>\
					<td><input type="text" class="form-control working_friend_retail_control" name="working_friend_retail_name[]"></td>\
					<td><input type="text" class="form-control working_friend_retail_control" name="working_friend_retail_appointment[]"></td>\
					<td><input type="text" class="form-control working_friend_retail_control" name="working_friend_retail_department[]"></td>\
					<td><input type="text" class="form-control working_friend_retail_control" name="working_friend_retail_company[]"></td>\
							</tr>';
		$("#currently_working_tbody").append(html);
	}
	function remove_currently_working()
	{
		let length=$("#currently_working_tbody tr").length;
		if(length>2)
		{
			$("#currently_working_tbody tr:last").remove();
		}
		else
		{
			alert("You can not delete anymore");
		}
	}
	</script>
<?php
if(isset($_POST['submit']))
{
$post_applied_for = $_POST['post_applied_for'];
$application_in_response_to = $_POST['application_in_response_to'];
$applicant_initials = $_POST['applicant_initials'];
$applicant_full_name = $_POST['applicant_full_name'];
$applicant_surname = $_POST['applicant_surname'];
$applicant_chinese_name = $_POST['applicant_chinese_name'];

$file_name = str_replace(' ', '-', $applicant_full_name);

$time=time();
$name=$_FILES['applicant_photo']['name'];
$temp=$_FILES['applicant_photo']['tmp_name'];
$ext = pathinfo($name, PATHINFO_EXTENSION);
$rand=rand(100000,999999);
if(move_uploaded_file($temp,'uploads/'.$file_name.'-'.$time.$rand.'.'.$ext))
{
    $applicant_photo = $file_name.'-'.$time.$rand.'.'.$ext;
    $flag=1;
}
else
{
    $flag=0;
}

$applicant_home_address = str_replace("'", "&#39;", $_POST['applicant_home_address']);
$applicant_postal_address = str_replace("'", "&#39;", $_POST['applicant_postal_address']);
$applicant_telephone_mobile = $_POST['applicant_telephone_mobile'];
$applicant_telephone_home = $_POST['applicant_telephone_home'];
$applicant_email = $_POST['applicant_email'];
$emergency_contact_person_name = $_POST['emergency_contact_person_name'];
$emergency_contact_person_relationship = $_POST['emergency_contact_person_relationship'];
$emergency_contact_person_number = $_POST['emergency_contact_person_number'];
$applicant_nationality = $_POST['applicant_nationality'];
$applicant_id_number = $_POST['applicant_id_number'];
$applicant_dob = $_POST['applicant_dob'];
$applicant_residency_status = $_POST['applicant_residency_status'];
$applicant_residency_issue_date = $_POST['applicant_residency_issue_date'];
$applicant_gender = $_POST['applicant_gender'];
$applicant_birth_country = $_POST['applicant_birth_country'];
$applicant_race = $_POST['applicant_race'];
$applicant_religion = $_POST['applicant_religion'];
$applicant_marital_status = $_POST['applicant_marital_status'];
$applicant_driving_license = $_POST['applicant_driving_license'];

$family_member_details = array();
$family_member_name = $_POST['family_member_name'];
$family_member_relationship = $_POST['family_member_relationship'];
$family_member_age = $_POST['family_member_age'];
$family_member_occupation = $_POST['family_member_occupation'];
for($i=0;$i<sizeof($family_member_name);$i++)
{
	$family_member_details[$i] = array();
	$family_member_details[$i]['family_member_name'] = $family_member_name[$i];
	$family_member_details[$i]['family_member_relationship'] = $family_member_relationship[$i];
	$family_member_details[$i]['family_member_age'] = $family_member_age[$i];
	$family_member_details[$i]['family_member_occupation'] = $family_member_occupation[$i];
}
$family_member_details = json_encode($family_member_details);

$national_service_status = $_POST['national_service_status'];

$national_service_details = array();
$national_service_details[0]['ns_date_enlisted'] = $_POST['ns_date_enlisted'];
$national_service_details[0]['ns_date_discharged'] = $_POST['ns_date_discharged'];
$national_service_details[0]['ns_service_type'] = $_POST['ns_service_type'];
$national_service_details[0]['ns_highest_rank'] = $_POST['ns_highest_rank'];
$national_service_details = json_encode($national_service_details);

$education_details = array();
$education_school = $_POST['education_school'];
$education_highest_qualification = $_POST['education_highest_qualification'];
$education_year_from = $_POST['education_year_from'];
$education_year_to = $_POST['education_year_to'];

$identity_card_dir='uploads/identity_card/';
$identity_card_front='';
$identity_card_back='';
if($_FILES["identity_card_font"]["tmp_name"])
{
	$fname = $file_name.'-front-'.strtotime("now");
	$uploaded_file=$_FILES["identity_card_font"]["tmp_name"];
	$ext = pathinfo($_FILES["identity_card_font"]["name"], PATHINFO_EXTENSION);
	$new_file_name=$identity_card_dir.$fname.'.'.$ext;
	move_uploaded_file($uploaded_file, $new_file_name);
	$identity_card_front = $fname.$ext;
}
if($_FILES["identity_card_back"]["tmp_name"])
{
	$fname=$file_name.'-back-'.strtotime("now");
	$uploaded_file=$_FILES["identity_card_back"]["tmp_name"];
	$ext = pathinfo($_FILES["identity_card_back"]["name"], PATHINFO_EXTENSION);
	$new_file_name=$identity_card_dir.$fname.'.'.$ext;
	move_uploaded_file($uploaded_file, $new_file_name);
	$identity_card_back = $fname.$ext;
}

$education_certificate_dir='uploads/education_certificate/';
for($i=0;$i<sizeof($education_school);$i++)
{
	$fname=$file_name.'-education-'.strtotime("now").'-'.rand(1,20000);
	$uploaded_file=$_FILES["education_certificate"]["tmp_name"][$i];
	$ext = pathinfo($_FILES["education_certificate"]["name"][$i], PATHINFO_EXTENSION);
	$new_file_name=$education_certificate_dir.$fname.'.'.$ext;
	$education_details[$i] = array();
	$education_details[$i]['education_school'] = $education_school[$i];
	$education_details[$i]['education_highest_qualification'] = $education_highest_qualification[$i];
	$education_details[$i]['education_year_from'] = $education_year_from[$i];
	$education_details[$i]['education_year_to'] = $education_year_to[$i];
	if($uploaded_file!='')
	{
		move_uploaded_file($uploaded_file, $new_file_name);
		$education_details[$i]['education_certificate'] = $fname.$ext;
	}
	else
	{
		$education_details[$i]['education_certificate'] = '';
	}
}
$education_details = json_encode($education_details);

$other_qual_details = array();
$other_qual_certificate = $_POST['other_qual_certificate'];
$other_qual_date = $_POST['other_qual_date'];
$other_qual_institution = $_POST['other_qual_institution'];

$other_qual_certificate_dir='uploads/other_certificate/';
for($i=0;$i<sizeof($other_qual_certificate);$i++)
{
	$fname=$file_name.'-other-'.strtotime("now").'-'.rand(1,20000);
	$uploaded_file=$_FILES["other_qual_certificate"]["tmp_name"][$i];
	$ext = pathinfo($_FILES["other_qual_certificate"]["name"][$i], PATHINFO_EXTENSION);
	$new_file_name=$other_qual_certificate_dir.$fname.'.'.$ext;
	
	$other_qual_details[$i] = array();
	$other_qual_details[$i]['other_qual_certificate'] = $other_qual_certificate[$i];
	$other_qual_details[$i]['other_qual_date'] = $other_qual_date[$i];
	$other_qual_details[$i]['other_qual_institution'] = $other_qual_institution[$i];
	if($uploaded_file!='')
	{
		move_uploaded_file($uploaded_file, $new_file_name);
		$other_qual_details[$i]['other_qual_certificate'] = $fname.$ext;
	}
	else
	{
		$other_qual_details[$i]['other_qual_certificate'] = '';
	}
}
$other_qual_details = json_encode($other_qual_details);

$pursuing_course_details = str_replace("'", "&#39;", $_POST['pursuing_course_details']);
$applicant_awards_scholarship = str_replace("'", "&#39;", $_POST['applicant_awards_scholarship']);

$applicant_language_details = array();
$applicant_language = $_POST['applicant_language'];
$applicant_language_spoken_rating = $_POST['applicant_language_spoken_rating'];
$applicant_language_written_rating = $_POST['applicant_language_written_rating'];
for($i=0;$i<sizeof($applicant_language);$i++)
{
	$applicant_language_details[$i] = array();
	$applicant_language_details[$i]['applicant_language'] = $applicant_language[$i];
	$applicant_language_details[$i]['applicant_language_spoken_rating'] = $applicant_language_spoken_rating[$i];
	$applicant_language_details[$i]['applicant_language_written_rating'] = $applicant_language_written_rating[$i];
}
$applicant_language_details = json_encode($applicant_language_details);

$applicant_extra_curricular = str_replace("'", "&#39;", $_POST['applicant_extra_curricular']);
$applicant_present_post = $_POST['applicant_present_post'];
$applicant_present_post_from_date = $_POST['applicant_present_post_from_date'];
$applicant_present_post_to_date = $_POST['applicant_present_post_to_date'];
$applicant_present_salary = $_POST['applicant_present_salary'];
$applicant_earliest_available_date = $_POST['applicant_earliest_available_date'];
$applicant_expected_salary = $_POST['applicant_expected_salary'];
$applicant_present_employer = $_POST['applicant_present_employer'];
$applicant_present_employer_address = str_replace("'", "&#39;", $_POST['applicant_present_employer_address']);
$applicant_leaving_reason = str_replace("'", "&#39;", $_POST['applicant_leaving_reason']);

$applicant_previous_employer_details = array();
$applicant_previous_employer = $_POST['applicant_previous_employer'];
$applicant_previous_position = $_POST['applicant_previous_position'];
$applicant_previous_duration = $_POST['applicant_previous_duration'];
$applicant_previous_basic_salary = $_POST['applicant_previous_basic_salary'];
$applicant_previous_leaving_reason = $_POST['applicant_previous_leaving_reason'];
for($i=0;$i<sizeof($applicant_previous_employer);$i++)
{
	$applicant_previous_employer_details[$i] = array();
	$applicant_previous_employer_details[$i]['applicant_previous_employer'] = $applicant_previous_employer[$i];
	$applicant_previous_employer_details[$i]['applicant_previous_position'] = $applicant_previous_position[$i];
	$applicant_previous_employer_details[$i]['applicant_previous_duration'] = $applicant_previous_duration[$i];
	$applicant_previous_employer_details[$i]['applicant_previous_basic_salary'] = $applicant_previous_basic_salary[$i];
	$applicant_previous_employer_details[$i]['applicant_previous_leaving_reason'] = str_replace("'", "&#39;", $applicant_previous_leaving_reason[$i]);
}
$applicant_previous_employer_details = json_encode($applicant_previous_employer_details);

$applicant_referee_details = array();
$applicant_referee_name = $_POST['applicant_referee_name'];
$applicant_referee_position = $_POST['applicant_referee_position'];
$applicant_referee_years_known = $_POST['applicant_referee_years_known'];
$applicant_referee_contact_number = $_POST['applicant_referee_contact_number'];
for($i=0;$i<sizeof($applicant_referee_name);$i++)
{
	$applicant_referee_details[$i] = array();
	$applicant_referee_details[$i]['applicant_referee_name'] = $applicant_referee_name[$i];
	$applicant_referee_details[$i]['applicant_referee_position'] = $applicant_referee_position[$i];
	$applicant_referee_details[$i]['applicant_referee_years_known'] = $applicant_referee_years_known[$i];
	$applicant_referee_details[$i]['applicant_referee_contact_number'] = $applicant_referee_contact_number[$i];
}
$applicant_referee_details = json_encode($applicant_referee_details);

$contact_previous_employer = $_POST['contact_previous_employer'];
$friends_working_in_applying_company = $_POST['friends_working_in_applying_company'];

$working_friend_details = array();
$working_friend_name = $_POST['working_friend_name'];
$working_friend_appointment = $_POST['working_friend_appointment'];
$working_friend_department = $_POST['working_friend_department'];
$working_friend_relationship = $_POST['working_friend_relationship'];
for($i=0;$i<sizeof($working_friend_name);$i++)
{
	$working_friend_details[$i] = array();
	$working_friend_details[$i]['working_friend_name'] = $working_friend_name[$i];
	$working_friend_details[$i]['working_friend_appointment'] = $working_friend_appointment[$i];
	$working_friend_details[$i]['working_friend_department'] = $working_friend_department[$i];
	$working_friend_details[$i]['working_friend_relationship'] = $working_friend_relationship[$i];
}
$working_friend_details = json_encode($working_friend_details);

$friends_working_in_retail = $_POST['friends_working_in_retail'];

$working_friend_retail_details = array();
$working_friend_retail_name = $_POST['working_friend_retail_name'];
$working_friend_retail_appointment = $_POST['working_friend_retail_appointment'];
$working_friend_retail_department = $_POST['working_friend_retail_department'];
$working_friend_retail_company = $_POST['working_friend_retail_company'];
for($i=0;$i<sizeof($working_friend_retail_name);$i++)
{
	$working_friend_retail_details[$i] = array();
	$working_friend_retail_details[$i]['working_friend_retail_name'] = $working_friend_retail_name[$i];
	$working_friend_retail_details[$i]['working_friend_retail_appointment'] = $working_friend_retail_appointment[$i];
	$working_friend_retail_details[$i]['working_friend_retail_department'] = $working_friend_retail_department[$i];
	$working_friend_retail_details[$i]['working_friend_retail_company'] = $working_friend_retail_company[$i];
}
$working_friend_retail_details = json_encode($working_friend_retail_details);

$ever_convicted = $_POST['ever_convicted'];
$ever_convicted_details = str_replace("'", "&#39;", $_POST['ever_convicted_details']);
$ever_dismissed = $_POST['ever_dismissed'];
$ever_dismissed_details = str_replace("'", "&#39;", $_POST['ever_dismissed_details']);
$ever_suffered = $_POST['ever_suffered'];
$ever_suffered_details = str_replace("'", "&#39;", $_POST['ever_suffered_details']);
$ever_surgical = $_POST['ever_surgical'];
$ever_surgical_details = str_replace("'", "&#39;", $_POST['ever_surgical_details']);
$ever_bankrupt = $_POST['ever_bankrupt'];
$ever_bankrupt_details = str_replace("'", "&#39;", $_POST['ever_bankrupt_details']);
$ever_debt = $_POST['ever_debt'];
$ever_debt_details = str_replace("'", "&#39;", $_POST['ever_debt_details']);
$ever_applied = $_POST['ever_applied'];
$ever_applied_details = str_replace("'", "&#39;", $_POST['ever_applied_details']);
$ever_tried = $_POST['ever_tried'];
$ever_tried_details = str_replace("'", "&#39;", $_POST['ever_tried_details']);
$ever_conceived = $_POST['ever_conceived'];
$ever_conceived_details = str_replace("'", "&#39;", $_POST['ever_conceived_details']);

$application_time = date('Y-m-d H:i:s');
$applicant_signature = $_POST["hidden_elem"];

$query = "INSERT INTO applicants SET
post_applied_for						= '$post_applied_for',
application_in_response_to				= '$application_in_response_to',
applicant_initials						= '$applicant_initials',
applicant_full_name						= '$applicant_full_name',
applicant_chinese_name						= '$applicant_chinese_name',
applicant_surname						= '$applicant_surname',
applicant_photo							= '$applicant_photo',
applicant_home_address					= '$applicant_home_address',
applicant_postal_address				= '$applicant_postal_address',
applicant_telephone_mobile				= '$applicant_telephone_mobile',
applicant_telephone_home				= '$applicant_telephone_home',
applicant_email 						= '$applicant_email',
emergency_contact_person_name			= '$emergency_contact_person_name',
emergency_contact_person_relationship	= '$emergency_contact_person_relationship',
emergency_contact_person_number			= '$emergency_contact_person_number',
applicant_nationality					= '$applicant_nationality',
applicant_id_number						= '$applicant_id_number',
applicant_dob							= '$applicant_dob',
applicant_residency_status				= '$applicant_residency_status',
applicant_residency_issue_date			= '$applicant_residency_issue_date',
applicant_gender						= '$applicant_gender',
applicant_birth_country					= '$applicant_birth_country',
applicant_race 							= '$applicant_race',
applicant_religion						= '$applicant_religion',
applicant_marital_status				= '$applicant_marital_status',
applicant_driving_license				= '$applicant_driving_license',
family_member_details					= '$family_member_details',
national_service_status					= '$national_service_status',
national_service_details				= '$national_service_details',
education_details						= '$education_details',
other_qual_details						= '$other_qual_details',
pursuing_course_details					= '$pursuing_course_details',
applicant_awards_scholarship			= '$applicant_awards_scholarship',
applicant_language_details				= '$applicant_language_details',
applicant_extra_curricular				= '$applicant_extra_curricular',
applicant_present_post 					= '$applicant_present_post',
applicant_present_post_from_date		= '$applicant_present_post_from_date',
applicant_present_post_to_date			= '$applicant_present_post_to_date',
applicant_present_salary				= '$applicant_present_salary',
applicant_earliest_available_date		= '$applicant_earliest_available_date',
applicant_expected_salary				= '$applicant_expected_salary',
applicant_present_employer 				= '$applicant_present_employer',
applicant_present_employer_address		= '$applicant_present_employer_address',
applicant_leaving_reason 				= '$applicant_leaving_reason',
applicant_previous_employer_details		= '$applicant_previous_employer_details',
applicant_referee_details				= '$applicant_referee_details',
contact_previous_employer				= '$contact_previous_employer',
friends_working_in_applying_company		= '$friends_working_in_applying_company',
working_friend_details 					= '$working_friend_details',
friends_working_in_retail				= '$friends_working_in_retail',
working_friend_retail_details			= '$working_friend_retail_details',
ever_convicted 							= '$ever_convicted',
ever_convicted_details					= '$ever_convicted_details',
ever_dismissed 							= '$ever_dismissed',
ever_dismissed_details					= '$ever_dismissed_details',
ever_suffered 							= '$ever_suffered',
ever_suffered_details					= '$ever_suffered_details',
ever_surgical 							= '$ever_surgical',
ever_surgical_details					= '$ever_surgical_details',
ever_bankrupt 							= '$ever_bankrupt',
ever_bankrupt_details 					= '$ever_bankrupt_details',
ever_debt 								= '$ever_debt',
ever_debt_details 						= '$ever_debt_details',
ever_applied 							= '$ever_applied',
ever_applied_details 					= '$ever_applied_details',
ever_tried 								= '$ever_tried',
ever_tried_details 						= '$ever_tried_details',
ever_conceived 							= '$ever_conceived',
ever_conceived_details 					= '$ever_conceived_details',
application_time						= '$application_time',
applicant_signature                     = '$applicant_signature',
identity_card_front                     = '$identity_card_front',
identity_card_back                      = '$identity_card_back'";

	if($flag == 1)
	{
		mysqli_query($con,$query);
		echo mysqli_error($con);
		$_SESSION['application_id'] = mysqli_insert_id($con);
		//echo '<script>window.location.href="application-form.php";</script>';
		echo '<script>alert("Form submitted successfully");window.location.href="application-form.php";</script>'; 
	}
}
?>
</body>
</html>