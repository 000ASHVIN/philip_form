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
    <title>Register</title>
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
    </style>
</head>

<body>
    <!-- <div class="header" style="background-image: url('logo/NH-Upload-Form-Background.png');"> -->

    <!-- </div> -->
    <div class="title">
        <!-- <h4>NATRAHEA</h4> -->
        <img src="logo/natrahea.jpg" alt="" style="max-width: 180px;">
    </div>
    <div class="header">
        <img src="logo/NH-Upload-Form-Background.jpg" alt="">
        <div class="description">
            <h4>Register</h4>
            <h5>Contact Philip should you run into any issues</h5>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post" action="register.php" id="myform">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username"class="form-control" required>

                    <div>
                        <label for="password">Email:</label>
                        <input type="email" id="email" name="email"class="form-control" required>
                    </div>

                    <div>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password"class="form-control" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="register" class="btn btn-primary mt-3">Register</button>
                    </div>
                </form>
            </div>
        </div>
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


    <?php
        if(isset($_POST['register'])){
            $username=$_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users SET
				username = '$username',
				email = '$email',
				password = '$hash'";
            $result = mysqli_query($con,$query);
            

            $redirect_back = false;
            if($result) {
                echo("<script>
                    window.alert('User registered successfully');
                    window.location='register.php';</script>");
            } else {
                echo("<script>window.alert('Invalid email or password');
                window.location='register.php';</script>");
            }
        }
    ?>

</body>

</html>