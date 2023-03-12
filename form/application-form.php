<?php include('config.php'); ?>
<?php
    if(!isset($_SESSION["application_id"]))
    {
        echo '<script>window.location.href="form.php"</script>';
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=1440px, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <title>Form</title>
    <style>
        .table-bordered , .table-bordered td, .table-bordered th
        {
            border:1px solid black !important;
        }
        /* Absolute Center Spinner */
        .loading {
          position: fixed;
          z-index: 999;
          height: 2em;
          width: 2em;
          overflow: show;
          margin: auto;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
        }

        /* Transparent Overlay */
        .loading:before {
          content: '';
          display: block;
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
            background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

          background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
        }

        /* :not(:required) hides these rules from IE9 and below */
        .loading:not(:required) {
          /* hide "loading..." text */
          font: 0/0 a;
          color: transparent;
          text-shadow: none;
          background-color: transparent;
          border: 0;
        }

        .loading:not(:required):after {
          content: '';
          display: block;
          font-size: 10px;
          width: 1em;
          height: 1em;
          margin-top: -0.5em;
          -webkit-animation: spinner 150ms infinite linear;
          -moz-animation: spinner 150ms infinite linear;
          -ms-animation: spinner 150ms infinite linear;
          -o-animation: spinner 150ms infinite linear;
          animation: spinner 150ms infinite linear;
          border-radius: 0.5em;
          -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
        box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
        }

        /* Animation */

        @-webkit-keyframes spinner {
          0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
        @-moz-keyframes spinner {
          0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
        @-o-keyframes spinner {
          0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
        @keyframes spinner {
          0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
    </style>
</head>

<body>
    <div class="loading" >Loading&#8230;</div>
    <?php
    $application_row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM applicants WHERE id='$_SESSION[application_id]'"));
    $applicant_email=$application_row['applicant_email'];
    $pdf_name=$application_row['applicant_full_name'].' '.$application_row['applicant_surname'];
    ?>
    <div id="container-fluid">
    <div class="container mt-4">
        <div id="1stimg">
            <!-- <div class="row mb-1">
                <div class="col-5">
                    <div class="row">
                        <div class="col-12">
                        <img src="logo/awhl.png" width="150">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <img src="logo/natrahea.jpg" width="150">   
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <img src="logo/haach.jpg" width="150">    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <img src="logo/drhaach.jpg" width="150">  
                        </div>  
                    </div>
                </div>
                <div class="col-7">
                    <div class="row mb-4">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <div class="row mb-4">
                                <div class="col-12">
                                    10 Bukit Batok Crescent #09-05 The Spire Singapore 658079
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    Tel: (65) 6238 8811
                                </div>
                                <div class="col-6">
                                    Fax: (65) 6238 8822
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <u class="float-right font-weight-bold font-italic">Private & Confidential</u>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <u class="text-uppercase font-weight-bold">Application For Employment</u>
                        </div>
                    </div>
                </div>
            </div> -->


            <div class="row mb-1">
                <div class="col-8">
                	<div class="row">
                		<div class="col-12">
                        	<span class="float-left font-weight-bold font-italic">Private & Confidential</span>
                        </div> 
                    </div>
                    <div class="row">
                    	<div class="col-12 mb-2">
                        	<u class="text-uppercase font-weight-bold">Application For Employment</u>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <img src="logo/awhl.png" width="384">   
                        </div> 
                    </div>
                </div>
                <div class="col-4">
                    	<div class="row mb-2">
	                    	<div class="col-6">
	                    		<img src="logo/FIL.jpg" width="100">
	                    	</div>
	                    	<div class="col-6">
	                    		<img src="logo/passage.jpg" width="100">
	                    	</div>
	                    </div>
	                    <div class="row mb-2">
	                    	<div class="col-6">
	                    		<img src="logo/Trichomed.jpg" width="100">
	                    	</div>
	                    	<div class="col-6">
	                    		<img src="logo/physiomed.jpg" width="150">
	                    	</div>
	                    </div>
	                    <div class="row mb-2">
	                    	<div class="col-6">
	                    		<img src="logo/TCC.jpg" width="100">
	                    	</div>
	                    	<div class="col-6">
	                    		<img src="logo/BC.jpg" width="150">
	                    	</div>
	                    </div>
                </div>
            </div>





            <div class="row"><div class="col-12">
                <table class="table table-bordered">
                        <colgroup><col width="11%"><col width="11%"><col width="11%"><col width="11%"><col width="11%"><col width="11%"><col width="11%"><col width="11%"><col width="11%"></colgroup>
                        <tbody>
                        <tr>
                            <td colspan="3" class="text-uppercase" >post applied for : <?php echo $application_row['post_applied_for'] ?></td>
                            <td colspan="3">Application in response to <?php echo $application_row['application_in_response_to'] ?></td>
                            <td colspan="3" class="text-uppercase text-center align-middle" rowspan="3"><img src="uploads/<?php echo $application_row['applicant_photo'] ?>" width="100"></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase text-center font-weight-bold" colspan="6">applicant's particulars</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-capitalize">
                                <?php echo $application_row['applicant_initials'].' '.$application_row['applicant_full_name'] ?>
                            </td>
                            <td colspan="3"><?php echo $application_row['applicant_chinese_name'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="6">Home Address : <?php echo $application_row['applicant_home_address'] ?></td>
                            <td colspan="3" rowspan="2" class="text-capitalize">
                                <p>telephone number</p>
                                <p>mobile : <?php echo $application_row['applicant_telephone_mobile'] ?></p>
                                <p>home : <?php echo $application_row['applicant_telephone_home'] ?></p>
                                <p>email : <?php echo $application_row['applicant_email'] ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">Postal Address (if diffrent from above) : <?php echo $application_row['applicant_postal_address'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p>Emergency Contact</p>
                                <div class="row">
                                    <div class="col-4"><u>Name : <?php echo $application_row['emergency_contact_person_name'] ?></u></div>
                                    <div class="col-4"><u>Relationship : <?php echo $application_row['emergency_contact_person_relationship'] ?></u></div>
                                    <div class="col-4"><u>Contact Number : <?php echo $application_row['emergency_contact_person_number'] ?></u></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Nationality : <?php echo $application_row['applicant_nationality'] ?></td>
                            <td colspan="5" rowspan="2">
                                <span style="margin-right:50px">Are you a Permanent Resident of Singapore?</span><?php echo strtoupper($application_row['applicant_residency_status']) ?><br/><br/>
                                If yes, please state date of issue: <?php echo ($application_row['applicant_residency_status'] == 'Yes') ? date('d-m-Y',strtotime($application_row['applicant_residency_issue_date'])) : '' ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Identity Card No : <?php echo $application_row['applicant_id_number'] ?></td>
                            <td colspan="2">Date of Birth : <?php echo date('d-m-Y',strtotime($application_row['applicant_dob'])) ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Gender : <?php echo $application_row['applicant_gender'] ?></td>
                            <td colspan="2">Country of Birth : <?php echo $application_row['applicant_birth_country'] ?></td>
                            <td colspan="2">Race : <?php echo $application_row['applicant_race'] ?></td>
                            <td colspan="3">Religion : <?php echo $application_row['applicant_religion'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">Marital Status<br/><?php echo $application_row['applicant_marital_status'] ?></td>
                            <td colspan="5">
                                Driving License<br/>
                                <?php echo $application_row['applicant_driving_license'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9">Please give details of family</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">Name</td>
                            <td >Relationship</td>
                            <td >Age</td>
                            <td colspan="5">Occupation/Name of Company</td>
                        </tr>
                        <?php
                        $family_member_details = json_decode($application_row['family_member_details'],true);
                        foreach ($family_member_details as $row)
                        {
                        ?>
                        <tr>
                            <td colspan="2"><?php echo $row['family_member_name'] ?></td>
                            <td><?php echo $row['family_member_relationship'] ?></td>
                            <td><?php echo $row['family_member_age'] ?></td>
                            <td colspan="5"><?php echo $row['family_member_occupation'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="9">
                                <p class="text-uppercase font-weight-bold">full time national service record</p>
                                <br/>
                                <span style="margin-right:200px;">Have you completed full time National Service?</span><span><?php echo strtoupper($application_row['national_service_status']) ?></span>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>Date Enlisted</td>
                            <td>Date Discharged</td>
                            <td>Type of Service</td>
                            <td colspan="6">Highest Rank Held</td>
                        </tr>
                        <?php
                        $national_service_details = json_decode($application_row['national_service_details'],true);
                        foreach ($national_service_details as $row)
                        {
                        ?>
                        <tr>
                            <td><?php echo date('d-m-Y',strtotime($row['ns_date_enlisted'])) ?></td>
                            <td><?php echo date('d-m-Y',strtotime($row['ns_date_discharged'])) ?></td>
                            <td><?php echo $row['ns_service_type'] ?></td>
                            <td colspan="6"><?php echo $row['ns_highest_rank'] ?></td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </div></div>
        </div>
        <div id="2ndimg">
            <div class="row mb-4">
                <div class="col-12">
                    <table class="table table-bordered"> 
                        <tbody>
                    <tr>
                        <td colspan="9" class="text-center">
                            <p class="font-weight-bold">EDUCATION</p>
                            <p>List schools/tertiary institutions attended in chronological order</p>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="2">Schools/Institution Attended</td>
                        <td colspan="3">Heighest Standard Passed</td>
                        <td colspan="4">Year Attained (from/to)</td>
                    </tr>
                    <?php
                    $education_details = json_decode($application_row['education_details'],true);
                    foreach ($education_details as $row)
                    {
                    ?>
                    <tr>
                        <td colspan="2"><?php echo $row['education_school'] ?></td>
                        <td colspan="3"><?php echo $row['education_highest_qualification'] ?></td>
                        <td colspan="4"><?php echo $row['education_year_from'] ?>/<?php echo $row['education_year_to'] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td colspan="9" class="text-center">
                            <p class="font-weight-bold">OTHER QUALIFICATIONS RELEVANT TO THE POSITION YOU ARE APPLYING</p>
                            <p>Typing/Shorthand/Secretarial/Technical Certificates or Diplomas/University/Degrees</p>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="2">Certificate / Diploma / Degree</td>
                        <td colspan="3">Date Qualification Obtained</td>
                        <td colspan="4">Institution</td>
                    </tr>
                    <?php
                    $other_qual_details = json_decode($application_row['other_qual_details'],true);
                    foreach ($other_qual_details as $row)
                    {
                    ?>
                    <tr>
                        <td colspan="2"><?php echo $row['other_qual_certificate'] ?></td>
                        <td colspan="3"><?php echo ($row['other_qual_date'] != '') ? date('d-m-Y',strtotime($row['other_qual_date'])) : '' ?></td>
                        <td colspan="4"><?php echo $row['other_qual_institution'] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td colspan="9">
                            If you are currently pursuing a course, please provide us with the details;<br/>
                            (eg: Course / Institution / Date of Examination)
                            <br><?php echo $application_row['pursuing_course_details'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="9">
                            <span class="font-weight-bold">AWARDS/ SCHOLARSHIPS : </span><span>Please indicate years of award, period of bond (if any) and the bonding authority</span>
                            <br><?php echo $application_row['applicant_awards_scholarship'] ?>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td></td>
                        <td colspan="4">SPOKEN</td>
                        <td colspan="4">WRITTEN</td>
                    </tr>
                    <tr class="text-center">
                        <td>Languages/Dialects</td>
                        <td>Excellent</td>
                        <td>Good</td>
                        <td>Fair</td>
                        <td>Poor</td>
                        <td>Excellent</td>
                        <td>Good</td>
                        <td>Fair</td>
                        <td>Poor</td>
                    </tr>
                    <?php
                    $applicant_language_details = json_decode($application_row['applicant_language_details'],true);
                    foreach ($applicant_language_details as $row)
                    {
                    ?>
                    <tr>
                        <td><?php echo $row['applicant_language'] ?></td>
                        <td><?php echo ($row['applicant_language_spoken_rating'] == 'Excellent') ? '&check;' : '' ?></td>
                        <td><?php echo ($row['applicant_language_spoken_rating'] == 'Good') ? '&check;' : '' ?></td>
                        <td><?php echo ($row['applicant_language_spoken_rating'] == 'Fair') ? '&check;' : '' ?></td>
                        <td><?php echo ($row['applicant_language_spoken_rating'] == 'Poor') ? '&check;' : '' ?></td>
                        <td><?php echo ($row['applicant_language_written_rating'] == 'Excellent') ? '&check;' : '' ?></td>
                        <td><?php echo ($row['applicant_language_written_rating'] == 'Good') ? '&check;' : '' ?></td>
                        <td><?php echo ($row['applicant_language_written_rating'] == 'Fair') ? '&check;' : '' ?></td>
                        <td><?php echo ($row['applicant_language_written_rating'] == 'Poor') ? '&check;' : '' ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td colspan="9">
                            <span class="font-weight-bold">EXTRA-CURRICULAR ACTIVITIES</span><br/>
                            <span>(Please state hobbies/sport/membership of clubs/societies)</span>
                            <br><?php echo $application_row['applicant_extra_curricular'] ?>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>   
        <div id="3rdimg">
            <div class="row mb-4">
                <div class="col-12">
                    <center><b>EMPLOYMENT HISTORY</b></center>
                    <p><b>PRESENT APPOINMENT</b></p>
                    <table class="table table-bordered">
                        <colgroup><col width="20%"><col width="20%"><col width="20%"><col width="20%"><col width="20%"></colgroup>
                        <tbody>
                            <tr>
                                <td colspan="1" rowspan="2">Post : <?php echo $application_row['applicant_present_post'] ?></td>
                                <td colspan="2">
                                    From : <?php echo date('d-m-Y',strtotime($application_row['applicant_present_post_from_date'])) ?><br/>
                                    To : <?php echo date('d-m-Y',strtotime($application_row['applicant_present_post_to_date'])) ?>
                                </td>
                                <td colspan="2">
                                    Earliest available date : <?php echo date('d-m-Y',strtotime($application_row['applicant_earliest_available_date'])) ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Present Salary : <?php echo $application_row['applicant_present_salary'] ?><br/>
                                (Please specify allowance(s) if any)</td>
                                <td colspan="2">
                                    Expected Salary : <?php echo $application_row['applicant_expected_salary'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">Name of Employer : <?php echo $application_row['applicant_present_employer'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="5">Address of Employer : <?php echo $application_row['applicant_present_employer_address'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="5">Reason for leaving : <?php echo $application_row['applicant_leaving_reason'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="5"><p class="font-weight-bold text-uppercase">Previous appointments</p></td>
                            </tr>
                            <tr class="text-center">
                                <td>Name of Employer(s)</td>
                                <td>Position</td>
                                <td>Duration</td>
                                <td>Basic Salary</td>
                                <td>Reason for Leaving</td>
                            </tr>
                            <?php
                            $applicant_previous_employer_details = json_decode($application_row['applicant_previous_employer_details'],true);
                            foreach ($applicant_previous_employer_details as $row)
                            {
                            ?>
                            <tr>
                                <td><?php echo $row['applicant_previous_employer'] ?></td>
                                <td><?php echo $row['applicant_previous_position'] ?></td>
                                <td><?php echo $row['applicant_previous_duration'] ?></td>
                                <td><?php echo $row['applicant_previous_basic_salary'] ?></td>
                                <td><?php echo $row['applicant_previous_leaving_reason'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="5"><p class="font-weight-bold text-uppercase">Character referees</p>
                                <p>Name 2 person whom you reported to in your previous job</p></td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2">Name</td>
                                <td>Position</td>
                                <td>Years Known</td>
                                <td>Contact Number</td>
                            </tr>
                            <?php
                            $applicant_referee_details = json_decode($application_row['applicant_referee_details'],true);
                            foreach ($applicant_referee_details as $row)
                            {
                            ?>
                            <tr>
                                <td colspan="2"><?php echo $row['applicant_referee_name'] ?></td>
                                <td><?php echo $row['applicant_referee_position'] ?></td>
                                <td><?php echo $row['applicant_referee_years_known'] ?></td>
                                <td><?php echo $row['applicant_referee_contact_number'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="5"><span style="margin-right:450px">May we contact your previous employers?</span><span><?php echo strtoupper($application_row['contact_previous_employer']) ?></span></td>
                            </tr>
                            <tr>
                                <td colspan="5"><span style="margin-right:165px">Do you have any relatives or friends presently working in our group of companies?</span><span><?php echo strtoupper($application_row['friends_working_in_applying_company']) ?></span>
                                <br/><p>If yes, please give details:</p></td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2">Name</td>
                                <td>Appoinment</td>
                                <td>Department</td>
                                <td>Relationship</td>
                            </tr>
                            <?php
                            $working_friend_details = json_decode($application_row['working_friend_details'],true);
                            foreach ($working_friend_details as $row)
                            {
                            ?>
                            <tr>
                                <td colspan="2"><?php echo $row['working_friend_name'] ?></td>
                                <td><?php echo $row['working_friend_appointment'] ?></td>
                                <td><?php echo $row['working_friend_department'] ?></td>
                                <td><?php echo $row['working_friend_relationship'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="5"><span style="margin-right:704px">Is any of your relatives or close friends currently working in the wholesale & retail industry e.g watch,pens,fashion business or in departmental store?</span><span><?php echo strtoupper($application_row['friends_working_in_retail']) ?></span>
                                <br/><p>If YES, please state details</p></td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2">Name of family member</td>
                                <td>Appoinment</td>
                                <td>Department</td>
                                <td>Name of Company</td>
                            </tr>
                            <?php
                            $working_friend_retail_details = json_decode($application_row['working_friend_retail_details'],true);
                            foreach ($working_friend_retail_details as $row)
                            {
                            ?>
                            <tr>
                                <td colspan="2"><?php echo $row['working_friend_retail_name'] ?></td>
                                <td><?php echo $row['working_friend_retail_appointment'] ?></td>
                                <td><?php echo $row['working_friend_retail_department'] ?></td>
                                <td><?php echo $row['working_friend_retail_company'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
        <div id="4thimg">
            <div class="row mb-4">
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <center><b><p class="text-uppercase">other information</p></b></center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center><b><p class="text-uppercase">please answer the following question. if the answer are yes, please give details</p></b></center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-10">1. Have you ever been convicted in a court of law of any country?</div>
                                        <div class="col-2"><?php echo strtoupper($application_row['ever_convicted']) ?></div>
                                        <?php
                                        if($application_row['ever_convicted'] == 'Yes')
                                        {
                                        ?>
                                        <p style="margin: 0;font-size: 10px"><?php echo $application_row['ever_convicted_details'] ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-10">2. Have you ever been dismissed, discharged or suspended from employemnt?</div>
                                        <div class="col-2"><?php echo strtoupper($application_row['ever_dismissed']) ?></div>
                                        <?php
                                        if($application_row['ever_dismissed'] == 'Yes')
                                        {
                                        ?>
                                        <p style="margin: 0;font-size: 10px"><?php echo $application_row['ever_dismissed_details'] ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-10">3. Have you ever had, or are you suffering from any impairment/disease/mental illness/medical condition?</div>
                                        <div class="col-2"><?php echo strtoupper($application_row['ever_suffered']) ?></div>
                                        <?php
                                        if($application_row['ever_suffered'] == 'Yes')
                                        {
                                        ?>
                                        <p style="margin: 0;font-size: 10px"><?php echo $application_row['ever_suffered_details'] ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-10">4. Have you ever had any surgical operation previously?</div>
                                        <div class="col-2"><?php echo strtoupper($application_row['ever_surgical']) ?></div>
                                        <?php
                                        if($application_row['ever_surgical'] == 'Yes')
                                        {
                                        ?>
                                        <p style="margin: 0;font-size: 10px"><?php echo $application_row['ever_surgical_details'] ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-10">5. Are you bankrupt?</div>
                                        <div class="col-2"><?php echo strtoupper($application_row['ever_bankrupt']) ?></div>
                                        <?php
                                        if($application_row['ever_bankrupt'] == 'Yes')
                                        {
                                        ?>
                                        <p style="margin: 0;font-size: 10px"><?php echo $application_row['ever_bankrupt_details'] ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-10">6. Are you in debt?</div>
                                        <div class="col-2"><?php echo strtoupper($application_row['ever_debt']) ?></div>
                                        <?php
                                        if($application_row['ever_debt'] == 'Yes')
                                        {
                                        ?>
                                        <p style="margin: 0;font-size: 10px"><?php echo $application_row['ever_debt_details'] ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-10">7. Have you previously submitted an application for an appoinment in this Company?</div>
                                        <div class="col-2"><?php echo strtoupper($application_row['ever_applied']) ?></div>
                                        <?php
                                        if($application_row['ever_applied'] == 'Yes')
                                        {
                                        ?>
                                        <p style="margin: 0;font-size: 10px"><?php echo $application_row['ever_applied_details'] ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-10">8. Have you tried any of our services before?(DR HAACH,HAACH, NATRAHEA)</div>
                                        <div class="col-2"><?php echo strtoupper($application_row['ever_tried']) ?></div>
                                        <?php
                                        if($application_row['ever_tried'] == 'Yes')
                                        {
                                        ?>
                                        <p style="margin: 0;font-size: 10px"><?php echo $application_row['ever_tried_details'] ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-10">9. For female applicant, please declare if you are conceiving at the date of application.</div>
                                        <div class="col-2"><?php echo strtoupper($application_row['ever_conceived']) ?></div>
                                        <?php
                                        if($application_row['ever_conceived'] == 'Yes')
                                        {
                                        ?>
                                        <p style="margin: 0;font-size: 10px"><?php echo $application_row['ever_conceived_details'] ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notes:<br/>
                                    <p style="margin-left:50px;">
                                        1. False particulars or supression of material facts will render you liable to disqualification and if appointed, to dismissal without notice.<br/>
                                        2. Please enclose photocopies certificates / testimonials / National Service Record. Do not enclose originals.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            Signature of Applicant:<img src="<?php echo $application_row['applicant_signature'] ?>">
                                        </div>
                                        <div class="col-6">
                                            Date: <?php echo date('d-m-Y',strtotime($application_row['application_time'])) ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>  
        </div> 
    </div>
    </div>
<script>
window.html2canvas =html2canvas;
window.jsPDF =window.jspdf.jsPDF;
var img1={};
var img2={};
var img3={};
var img4={};
var imgWidth=200;
var imgHeight=290;
html2canvas(document.getElementById('1stimg')).then(function(canvas) {                
    img1.base64=canvas.toDataURL('image/png');
    let height=canvas.height * imgWidth / canvas.width;
    img1.height= height>290?290:height;
    html2canvas(document.getElementById('2ndimg')).then(function(canvas) {                    
        img2.base64=canvas.toDataURL('image/png');
        let height=canvas.height * imgWidth / canvas.width;
        img2.height= height>290?290:height;
        html2canvas(document.getElementById('3rdimg')).then(function(canvas) {                      
            img3.base64=canvas.toDataURL('image/png');
            let height=canvas.height * imgWidth / canvas.width;
            img3.height= height>290?290:height;
            html2canvas(document.getElementById('4thimg')).then(function(canvas) {                  
                img4.base64=canvas.toDataURL('image/png');
                let height=canvas.height * imgWidth / canvas.width;
                img4.height= height>290?290:height;
                let doc = new jsPDF('p', 'mm');
                doc.addImage(img1.base64, 'PNG', 5, 3, imgWidth, img1.height,'','SLOW');
                doc.addPage();
                doc.addImage(img2.base64, 'PNG', 5, 3, imgWidth, img2.height,'','SLOW');
                doc.addPage();
                doc.addImage(img3.base64, 'PNG', 5, 3, imgWidth, img3.height,'','SLOW');
                doc.addPage();
                doc.addImage(img4.base64, 'PNG', 5, 3, imgWidth, img4.height,'','SLOW');
                //doc.save("<?php echo $pdf_name; ?>");
                var blob = doc.output('blob');            
                var formData = new FormData();
                formData.append('pdf', blob);     
                formData.append('id', "<?php echo $application_row["id"] ?>");    
                formData.append('pdf_name', "<?php echo $pdf_name ?>");
         
                $.ajax('ajax/upload.php',
                {
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        let a=new Array();
                        a=JSON.parse(data);
                        if(a.status=='success')
                        {
                            $.post("ajax/send-mail.php",{
                                'sendmail':[a.pdf_name,"<?php echo $applicant_email ?>",a.applicant_photo,a.identity_card_front,a.identity_card_back,a.applicant_id]
                            
				},function(data){
                                if(data=='success')
                                {
                                    $(".loading").hide();
                                    alert("Application submitted successfully");
                                }
                                else
                                {
                                    alert("Something went wrong");
                                }
                            });
                        }
                    },
                    error: function(data){
                        alert("Something went wrong");
                    }
                });
            }); 
        }); 
    }); 
});     
    </script>
</body>

</html>