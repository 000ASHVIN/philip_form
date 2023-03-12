<?php
include('../config.php');

if(isset($_POST["sendmail"]))
{
	$sendmail=$_POST["sendmail"];
	$education=$_POST["education"];
	$pdf_name=$sendmail[0];
	$applicant_photo = $sendmail[2];
	$identity_card_front = $sendmail[3];
	$identity_card_back = $sendmail[4];
	$applicant_mail=$sendmail[1];
	$application_id = $sendmail[5];

	// Settings
	/*$name        = "IMISSUSG1";
	$email       = "someome@anadress.com";*/
	$to          = "philiptesting@alegantmedia.com";//;$applicant_mail;
	$from        = "test@IMISSUSG.com";
	$subject     = "Application for Employment";
	$message = "Hi, Please find the attached application pdf.";	
	$headers = "From: IMISSUSG";
	
	$pdf_path = "../form_pdf/";
	$photo_path = "../uploads/";
	$identity_card_path = "../uploads/identity_card/";
	$education_certificate_path = "../uploads/education_certificate/";
	$other_certificate_path = "../uploads/other_certificate/";

	$fname = array($pdf_name,$applicant_photo,$identity_card_front,$identity_card_back);
	$fpath = array($pdf_path,$photo_path,$identity_card_path,$identity_card_path);
	
	//Select Data from Database
	$slct_query = mysqli_query($con, "SELECT * FROM applicants WHERE id = '$application_id'");
	$row = mysqli_fetch_array($slct_query);

	$education_details = json_decode($row['education_details'],true);
	foreach ($education_details as $row1) 
	{
		if($row1['education_certificate'] != ''){
			array_push($fname, $row1['education_certificate']);
			array_push($fpath, $education_certificate_path);
		}
	}
	
	$other_qual_details = json_decode($row['other_qual_details'],true);
	foreach ($other_qual_details as $row1) 
	{
		if($row1['other_qual_certificate'] != ''){
			array_push($fname, $row1['other_qual_certificate']);
			array_push($fpath, $other_certificate_path);
		}
	}

	$files = $fname;
	$files_path = $fpath;

	// This attaches the file
	$semi_rand     = md5(time());
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
	// headers for attachment 
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
	// multipart boundary 
        $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
        $message .= "--{$mime_boundary}\n";

	// preparing attachments
    	for($x=0; $x < count($files); $x++){
        	$file = fopen($files_path[$x] . $files[$x],"rb");
        	$data = fread($file,filesize($files_path[$x] . $files[$x]));
        	fclose($file);
        	$data = chunk_split(base64_encode($data));
        	$message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$files[$x]\"\n" . 
        	"Content-Disposition: attachment;\n" . " filename=\"$files[$x]\"\n" . 
        	"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        	$message .= "--{$mime_boundary}\n";
	}

	// Send the email
	if(mail($to, $subject, $message, $headers)) {
		
	  echo "success";

	}
	else {

	  echo "failed";
	}
}

?>