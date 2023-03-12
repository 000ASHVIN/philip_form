<?php include('../config.php'); ?>
<?php
//$pdf_name=strtotime("now").".pdf";
$pdf_name=$_POST["pdf_name"].".pdf";
$pdf_link="form_pdf/".$pdf_name;
$return=[];
if(move_uploaded_file($_FILES['pdf']['tmp_name'], "../form_pdf/".$pdf_name))
{
	$application_id=$_POST["id"];

	if(mysqli_query($con,"UPDATE applicants SET pdf_link='$pdf_link' WHERE id='$application_id'"))
	{
		$slct_query = mysqli_query($con, "SELECT * FROM applicants WHERE id = '$application_id'");
		$row = mysqli_fetch_array($slct_query);
		
			
		$return["status"]="success";
		$return["pdf_name"]=$pdf_name;  
		$return["applicant_photo"] = $row["applicant_photo"];
		$return["identity_card_front"] = $row["identity_card_front"];
		$return["identity_card_back"] = $row["identity_card_back"];
		$return["applicant_id"] = $application_id;

	}
	else
	{
		$return["status"]="failed";
	}
}
else
{
	$return["status"]="failed";
}
echo json_encode($return);
?>