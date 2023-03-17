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
            background-color: #28a745;
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
            <h4>Customers'
                 Upload</h4>
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
                        $personal_interest = $row['personal_interest'];
                        $personal_interest1 = explode(',', $personal_interest);

                    ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><b>First Name</b></label>
                                    <input type="text" class="form-control" name="applicant_first_name" value="<?= $row['applicant_first_name']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><b>Last Name</b></label>
                                    <input type="text" class="form-control" name="applicant_last_name" value="<?= $row['applicant_last_name']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><b>Company Designation</b></label>
                                    <input type="text" class="form-control" name="applicant_company_designation" value="<?= $row['applicant_company_designation']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><b>Address</b></label>
                                    <input type="text" class="form-control" name="applicant_address" value="<?= $row['applicant_address']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><b>Postal Code</b></label>
                                    <input type="tel" pattern="[0-9]{6}" class="form-control" name="applicant_postal_code" value="<?= $row['applicant_postal_code']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><b>Email Address</b></label>
                                    <input type="email" class="form-control" name="applicant_email_address" value="<?= $row['applicant_email_address']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><b>Date Of Birth (DD-MM-YY)</b></label>
                                    <input type="tel" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}" class="form-control" name="applicant_date_of_birth" value="<?= $row['applicant_date_of_birth']; ?>">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><b>Mobile Number</b></label>
                                    <input type="text" class="form-control" name="mobile_number" value="<?= $row['mobile_number']; ?>">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><b>Personal interests</b></label>



                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="watching_sports" id="watching_sports" name="personal_interest[]" 
                                        <?php
                                            if (in_array('watching_sports', $personal_interest1)) {
                                                echo "checked";
                                            }
                                            ?> checked>
                                        <label class="form-check-label" for="watching_sports">
                                            Watching sports
                                        </label>

                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="cooking" id="cooking" name="personal_interest[]"
                                        <?php
                                            if(in_array('cooking',$personal_interest1)){
                                                echo "checked";
                                            }
                                        ?>>
                                        <label class="form-check-label" for="cooking">
                                            Cooking
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="health_and_wellbeing" id="health_and_wellbeing" name="personal_interest[]"
                                        <?php
                                            if(in_array('health_and_wellbeing',$personal_interest1)){
                                                echo "checked";
                                            }
                                            ?>
                                        >
                                        <label class="form-check-label" for="health_and_wellbeing">
                                            Health & Wellbeing
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><b>Notes</b></label>
                                    <textarea name="applicant_notes" id="applicant_notes" rows="7" class="form-control applicant_notes"><?= $row['applicant_notes']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><b>Image</b></label>
                                    <div class="file-input">
                                        <input type="file" accept="image/*" class="form-control file-input__input" id="img" name="img" value="<?= $row['pdf_link']; ?>" />
                                        <label class="file-input__label" for="img">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                            </svg>
                                            <span>Upload Image</span>
                                        </label>

                                    </div>
                                </div>
                                <div id="img-name" class="alert alert-success" style="display: none;"></div>
                            </div>
                        </div>

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
    if (isset($_POST['update'])) {
        $id = $update_id;
        $applicant_first_name = $_POST['applicant_first_name'];
        $applicant_last_name = $_POST['applicant_last_name'];
        $applicant_company_designation = $_POST['applicant_company_designation'];
        $applicant_address = $_POST['applicant_address'];
        $applicant_postal_code = $_POST['applicant_postal_code'];
        $applicant_email_address = $_POST['applicant_email_address'];
        $applicant_date_of_birth = $_POST['applicant_date_of_birth'];
        $mobile_number = $_POST['mobile_number'];
        $personal_interests = $_POST['personal_interest'] ?? '';
		$personal_interest = implode(",", $personal_interests) ?? '';
        $applicant_notes = $_POST['applicant_notes'];

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



        $query = "UPDATE  applicants SET 
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
            applicant_notes						    = '$applicant_notes'";

        if ($_FILES["img"]["tmp_name"]) {
            $query .= ", pdf_link = '$img'";
        }

        $query .= " WHERE id = $id";
        // echo $query;
        // die();
        $flag = 1;

        $applicant_query = "select * from `applicants` where id = $id LIMIT 1";
        $result = mysqli_query($con, $applicant_query);
        $applicant = mysqli_fetch_object($result);

        $admin_query = "select * from `users` where email='". $_SESSION['email'] ."' LIMIT 1";
        $result = mysqli_query($con, $admin_query);
        $admin = mysqli_fetch_object($result);
        $time=  date('d-m-Y h:ia');
        $activity_queries = [];
        if($applicant && $admin) {
            $activity_query = "INSERT INTO activities SET
                admin_id						= '$admin->id',
                applicant_id					= '$applicant->id',
                created_at                      = '$time',
                type						= 'updated'";

            if($applicant->applicant_first_name != $applicant_first_name) {
                $activity_queries[] = $activity_query . ", field = 'applicant_first_name', before_value = '$applicant->applicant_first_name', after_value = '$applicant_first_name'";
            }

            if($applicant->applicant_last_name != $applicant_last_name) {
                $activity_queries[] = $activity_query . ", field = 'applicant_last_name', before_value = '$applicant->applicant_last_name', after_value = '$applicant_last_name'";
            }

            if($applicant->applicant_company_designation != $applicant_company_designation) {
                $activity_queries[] = $activity_query . ", field = 'applicant_company_designation', before_value = '$applicant->applicant_company_designation', after_value = '$applicant_company_designation'";
            }

            //
            if($applicant->applicant_address != $applicant_address) {
                $activity_queries[] = $activity_query . ", field = 'applicant_address', before_value = '$applicant->applicant_address', after_value = '$applicant_address'";
            }

            if($applicant->applicant_postal_code != $applicant_postal_code) {
                $activity_queries[] = $activity_query . ", field = 'applicant_postal_code', before_value = '$applicant->applicant_postal_code', after_value = '$applicant_postal_code'";
            }

            if($applicant->applicant_email_address != $applicant_email_address) {
                $activity_queries[] = $activity_query . ", field = 'applicant_email_address', before_value = '$applicant->applicant_email_address', after_value = '$applicant_email_address'";
            }

            if($applicant->applicant_date_of_birth != $applicant_date_of_birth) {
                $activity_queries[] = $activity_query . ", field = 'applicant_date_of_birth', before_value = '$applicant->applicant_date_of_birth', after_value = '$applicant_date_of_birth'";
            }

            if($applicant->mobile_number != $mobile_number) {
                $activity_queries[] = $activity_query . ", field = 'mobile_number', before_value = '$applicant->mobile_number', after_value = '$mobile_number'";
            }
            
            if($applicant->personal_interest != $personal_interest) {
                $activity_queries[] = $activity_query . ", field = 'personal_interest', before_value = '$applicant->personal_interest', after_value = '$personal_interest'";
            }

            if($applicant->applicant_notes != $applicant_notes) {
                $activity_queries[] = $activity_query . ", field = 'applicant_notes', before_value = '$applicant->applicant_notes', after_value = '$applicant_notes'";
            }

            if ($_FILES["img"]["tmp_name"]) {
                $activity_queries[] = $activity_query . ", field = 'pdf_link', before_value = '$applicant->pdf_link', after_value = '$img'";
            }
        }
    
        if ($flag == 1) {
            mysqli_query($con, $query);
            echo mysqli_error($con);

            if(count($activity_queries) > 0) {
                foreach($activity_queries as $activity_complete_query) {
                    mysqli_query($con, $activity_complete_query); 
                }
            }
            echo '<script>alert("Form Updated successfully");window.location.href="list.php";</script>';
        }
        unlink($img);
    }
    ?>
</body>

</html>