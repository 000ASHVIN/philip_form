<?php
include('config.php');
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Check In</title>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">



    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>



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

        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        .copy {
            padding: 0px 5px 2px;
            margin-left: 10px;
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

        .logout {
            float: right;
            margin: 30px;
        }

        .dataTables_filter,
        .dataTables_info {
            display: none;
        }
    </style>
</head>

<body>
    <div class="title">
        <!-- <h4>NATRAHEA</h4> -->
        <img src="logo/natrahea.jpg" alt="" style="max-width: 180px;">
        <a href="logout.php" class="btn btn-primary logout">Logout</a>
    </div>
    <div class="header">
        <img src="logo/NH-Upload-Form-Background.jpg" alt="">
        <div class="description">
            <h4>NATRAHEA</h4>
            <h5>Customer's Check In</h5>
        </div>
    </div>
    <div class="mx-4">
        <!-- <a href="send-mail.php" class="btn btn-info mb-4" style="float: right;">Send Mail</a> -->
        <?php

        $sql = "select * from applicants";
        $result = mysqli_query($con, $sql);
        // $search = $_POST['search'];
        $total_data = mysqli_num_rows($result);

        $dir = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);

        ?>
        <div class="">
            <div class="float_end">
                <form action="" method="POST" class="form">
                    <input type="search" id="search" class="form-control" name="search" style="width: 15%; float: right;" />

                </form>
                <?php
                if (@$_POST['search']) {
                    $search = $_POST['search'];
                    $search_query = "select * from applicants  WHERE mobile_number LIKE '%$search%'";
                    $search_result = mysqli_query($con, $search_query);
                    $search_data = mysqli_num_rows($search_result);
                }
                ?>

            </div>
            <div>
                <table id="myTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Company Designation</th>
                            <th scope="col">Address</th>
                            <th scope="col">Postal Code</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Mobile Number</th>
                            <!-- <th scope="col">Personal interests</th> -->
                            <th scope="col">Notes</th>
                            <!-- <th scope="col">Image</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($total_data > 0) {
                            while ($row = mysqli_fetch_object($result)) {
                        ?>
                                <tr style="display: none;" class="applicant" id="applicant-<?php echo $row->id; ?>" data-phone="<?php echo $row->mobile_number; ?>">
                                    <td><?php echo $row->applicant_full_name ?></td>
                                    <td><?php echo $row->applicant_company_designation ?></td>
                                    <td><?php echo $row->applicant_address ?></td>
                                    <td><?php echo $row->applicant_postal_code ?></td>
                                    <td><?php echo $row->applicant_email_address ?></td>
                                    <td><?php echo $row->applicant_date_of_birth ?></td>
                                    <td><?php echo $row->mobile_number ?></td>
                                    <!-- <td>
                                        <?php
                                        $interest = explode(',', $row->personal_interest);
                                        foreach ($interest as $val) {
                                            echo $val . "<br>";
                                        }
                                        ?>
                                    </td> -->
                                    <td><?php echo $row->applicant_notes ?></td>
                                    <!-- <td>
                                        <img src="uploads/img/<?php echo $row->pdf_link; ?>" height="50">
                                    </td> -->
                                    <td style="text-align: center;">
                                        <div style="display: inline;">

                                            <a href="entry.php?id=<?php echo $row->id; ?>" class="btn btn-info " name="check_in" onclick="getIPAddress()">Check-in</a>
                                            <!-- <a href="check.php?id=<?php echo $row->id; ?>" class="btn btn-info " name="check_in">Check-in</a> -->
                                        </div>

                                    </td>
                                </tr>
                        <?php }
                        }
                        ?>



                        <?php if (@$search_data > 0) {
                            while ($row = mysqli_fetch_object($search_result)) {
                        ?>
                                <tr style="display: none;">
                                    <td><?php echo $row->applicant_full_name ?></td>
                                    <td><?php echo $row->applicant_company_designation ?></td>
                                    <td><?php echo $row->applicant_address ?></td>
                                    <td><?php echo $row->applicant_postal_code ?></td>
                                    <td><?php echo $row->applicant_email_address ?></td>
                                    <td><?php echo $row->applicant_date_of_birth ?></td>
                                    <td><?php echo $row->mobile_number ?></td>
                                    <td>
                                        <?php
                                        $interest = explode(',', $row->personal_interest);
                                        foreach ($interest as $val) {
                                            echo $val . "<br>";
                                        }
                                        // echo $row->personal_interest;
                                        ?>
                                    </td>
                                    <td><?php echo $row->applicant_notes ?></td>
                                    <td>
                                        <img src="uploads/img/<?php echo $row->pdf_link; ?>" height="50">
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="display: inline;">
                                            <a href="entry.php?id=<?php echo $row->id; ?>" class="btn btn-info " name="checkin">Check-in</a>
                                        </div>
                                    </td>
                                </tr>
                        <?php }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

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
            $localIP = getIPAddress();
        ?>
        <!-- <input type="text" name="applicant_id" value="<?php echo $id ?>">
        <input type="text" name="ip_address" value="<?php echo $localIP ?>"> -->
        <?php

        // echo $id;
        if (isset($_GET['id'])) {
            $time=  date('d-m-Y h:ia');
            
            $applicant_id    = $_GET['id'];
            $ip_address    = getIPAddress();
            $check_in_time = $time;



            $query = "INSERT INTO entries SET
        	applicant_id = '$applicant_id',
				ip_address = '$ip_address',
				check_in_time = '$check_in_time'";
            // echo $query;
            $result = mysqli_query($con, $query);


            $redirect_back = false;
            // echo ("<script> window.location='entry.php';</script>");
            echo '<script>alert("Customer Check In Successfully");window.location.href="entry.php";</script>';
        }
        ?>

</body>

</html>

<script>
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
            searching: false,
            paging: false,
            info: false,
        });




        $(document).ready(function() {
            $('#search').keyup(function() {
                $('.applicant').hide();
                $('.applicant').each(function(i, obj) {
                    if ($(this).data('phone') == $('#search').val()) {
                        $(this).show();

                    }
                });
            });
        });

    });

    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(element).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>