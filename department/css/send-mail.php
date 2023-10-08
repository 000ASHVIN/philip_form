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
.description h4, .description h5 {
	text-align: center;
	color: #3b5b40;
}
.description h4 {
	margin-bottom: 20px;
}
	</style>
</head>
<body>
	<?php
		$url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
		$url = explode('/', $escaped_url);
		$server_url = '';
		for($i = 0; $i < count($url) - 1; $i++) {
			if($server_url == '') {
				$server_url = $url[$i];
			} else {
				$server_url .= "/".$url[$i];
			}
		}
		
        $sql = "select * from applicants where id='$_GET[id]'";
        $applicant = mysqli_fetch_assoc(mysqli_query($con, $sql));
    ?>
	<div class="title">
		<!-- <h4>NATRAHEA</h4> -->
		<img src="logo/natrahea.jpg" alt="" style="max-width: 180px;">
	</div>
	<div class="header">
		<img src="logo/NH-Upload-Form-Background.jpg" alt="">
		<div class="description">
			<h4>NATRAHEA</h4>
			<h5>Customers' PDF Upload</h5>
		</div>
	</div>
	<div class="container">
		<form action="" method="POST" id="myform" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><b>Email</b></label>
						<input type="text" class="form-control" name="email" required>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<label><b>Message</b></label>
						<textarea name="message" id="editor">
                            <p>Dear <?php echo $applicant['applicant_full_name']; ?></p>

                            <p>Please refer to the following link for your x-ray image.</p>

                            <p>
                                <a href="<?php echo $server_url; ?>/uploads/pdf/<?php echo $applicant['pdf_link']; ?>" target="_blank"><?php echo $applicant['pdf_link']; ?></a>
                            </p>

                            <p>Do not that validity of the link will be 3 days from now. Please download it for your own storage purpose as soon as possible.</p>
                        </textarea>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<button type="submit" class="btn btn-success" id="send_mail_preview" name="submit">Send</button>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
	<script>
	$("#pdf").change(function(){
		var text = this.files[0].name + " is selected."
		$("#pdf-name").text(text);
		$("#pdf-name").show();
	});
    ClassicEditor.create( document.querySelector( '#editor' ) )
	// $('#myform').submit(function(event) {
	// 	event.preventDefault();		
	// 	$(this).unbind('submit').submit(); // continue the submit unbind preventDefault
	// });
	</script>
		
<?php
if(isset($_POST['submit']))
{
	$to = $_POST['email'];
	$message = "
    <html>
    <head>
    <title></title>
    </head>
    <body>".
    $_POST['message']
    ."</body>
    </html>
    ";
    // $message = $_POST['message'];
	
	$from = "test@IMISSUSG.com";
    $subject = "Application for Employment";
    $headers = "From: IMISSUSG";



    // This attaches the file
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
    // headers for attachment
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: text/html;charset=UTF-8\n" . " boundary=\"{$mime_boundary}\"";
	// multipart boundary
    // $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
    // $message .= "--{$mime_boundary}\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {

        echo '<script>alert("Form submitted successfully");window.location.href="list.php";</script>';

    } else {

        echo "failed";
    }
}
?>
</body>
</html>