<?php
include('config.php');
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
$created_by = 0;
if(isset($_SESSION['email']) && $_SESSION['email']) {
    $query = "select * from `users` where email='". $_SESSION['email'] ."' LIMIT 1";
    $result = mysqli_query($con,$query);
    $admin = mysqli_fetch_object($result);

    if($admin) {
        $created_by = $admin->id;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>List</title>
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
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    
    <div class="header">
        <img src="logo/NH-Upload-Form-Background.jpg" alt="">
        <div class="description">
            <h4>NATRAHEA</h4>
            <h5>Customers' Upload List</h5>
        </div>
    </div>
    <div class="mx-4">
        <!-- <a href="send-mail.php" class="btn btn-info mb-4" style="float: right;">Send Mail</a> -->
        <?php
        $where = "WHERE created_by IN ('0'";
        if($created_by) {
            $where .= ",'$created_by'";
        }
        $where .= ")";
        $sql = "select * from applicants ".$where;
        $result = mysqli_query($con, $sql);

        $total_data = mysqli_num_rows($result);

        $dir = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);

        ?>
        <div class="">
            <table id="myTable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Department</th>
                        <th scope="col">Status</th>
                        <!-- <th scope="col">Date of Purchase</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Approved By</th>
                        <th scope="col">Name of Vendor</th>
                        <th scope="col">Vendor’s contact number</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sub-Category</th> -->
                        <th scope="col">Date Submitted</th>
                        <th scope="col">Date Updated</th>
                        <th scope="col">Reciept</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($total_data > 0) {
                        while ($row = mysqli_fetch_object($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row->applicant_full_name ?></td>
                                <td><?php echo $row->mobile_number ?></td>
                                <td><?php echo $row->applicant_email_address ?></td>
                                <td><?php echo $row->applicant_department ?></td>
                                <td><?php echo $row->status ?></td>
                                <!-- <td><?php echo $row->date_of_purchase ?></td>
                                <td>$<?php echo $row->amount ?></td>
                                <td><?php echo $row->approved_by ?></td>
                                <td><?php echo $row->name_of_vendor ?></td>
                                <td><?php echo $row->vendor_contact_number ?></td>
                                <td><?php echo $row->category ?></td>
                                <td><?php echo $row->sub_category ?></td> -->
                                <td>
                                    <a href="uploads/reciept/<?php echo $row->link; ?>" class="btn btn-primary" target="_blank">Reciept</a>
                                    <!-- <img src="uploads/img/<?php echo $row->pdf_link; ?>" height="50"> -->
                                </td>
                                <td><?php echo $row->created_at ?></td>
                                <td><?php echo $row->updated_at ?></td>
                                <!-- <td style="text-align: center;">
                                    <div style="display: inline;">
                                        <a href="update-form.php?id=<?php echo $row->id; ?>" class="btn btn-info mt-2">Edit</a>
                                        <a href="send-mail-user.php?id=<?php echo $row->id; ?>" class="btn btn-info mt-2">Send Mail</a>
                                        <a href="log.php?id=<?php echo $row->id; ?>" class="btn btn-info mt-2">Log</a>
                                    </div>
                                </td> -->
                                <td>
                                     <a href="form-update.php?id=<?php echo $row->id; ?>" class="btn btn-primary" target="_blank">Update</a>
                                </td>

                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
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