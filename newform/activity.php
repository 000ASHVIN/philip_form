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
    <title>Activities</title>
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
        .even {
            color: #eda553;
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
            <h5>Customers' Activities List</h5>
        </div>
    </div>
    <div class="mx-4">
    
        <?php

        $sql = "SELECT activities.*, users.username, applicants.applicant_first_name, applicants.applicant_last_name FROM `activities`
                JOIN users ON users.id = activities.admin_id
                JOIN applicants on applicants.id = activities.applicant_id
                ORDER BY activities.id DESC;";

        $result = mysqli_query($con, $sql);

        $total_data = mysqli_num_rows($result);

        $dir = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);

        ?>
        <div class="container">
            <ol type="1">
                <?php if ($total_data > 0) {
                    $i = 0;
                    while ($row = mysqli_fetch_object($result)) {
                ?>
                    <li class="<?php if($i % 2 == 0) echo 'even'; else echo 'odd'; ?>">
                        <?php
                            $message = $row->username;
                            if($row->type == 'created') {
                                $message .= " created $row->applicant_first_name as a user.";
                            }

                            if($row->type == 'updated') {
                                if($row->field == 'pdf_link') {
                                    $message .= " edited $row->applicant_first_name's image.";
                                } else {
                                    $field = str_replace('applicant_', '', $row->field);
                                    $field = str_replace('_', ' ', $field);

                                    $message .= " edited $row->applicant_first_name's $field from  $row->before_value to $row->after_value.";
                                }
                            }

                            echo $message;
                            $i++;
                        ?>
                    </li>
                <?php }
                } ?>
            </ol>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true
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