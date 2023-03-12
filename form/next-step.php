<?php
include('config.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');

$post_applied_for = $_POST['post_applied_for'];
$application_in_response_to = $_POST['application_in_response_to'];
$applicant_initials = $_POST['applicant_initials'];
$applicant_full_name = $_POST['applicant_full_name'];
$applicant_surname = $_POST['applicant_surname'];

// $time=time();
// $name=$_FILES['applicant_photo']['name'];
// $temp=$_FILES['applicant_photo']['tmp_name'];
// $ext = pathinfo($name, PATHINFO_EXTENSION);
// $rand=rand(100000,999999);
// if(move_uploaded_file($temp,'uploads/AI'.$time.$rand.'.'.$ext))
// {
//     $applicant_photo = 'AI'.$time.$rand.'.'.$ext;
//     $flag=1;
// }
// else
// {
//     $flag=0;
// }

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
for($i=0;$i<sizeof($education_school);$i++)
{
	$education_details[$i] = array();
	$education_details[$i]['education_school'] = $education_school[$i];
	$education_details[$i]['education_highest_qualification'] = $education_highest_qualification[$i];
	$education_details[$i]['education_year_from'] = $education_year_from[$i];
	$education_details[$i]['education_year_to'] = $education_year_to[$i];
}
$education_details = json_encode($education_details);

$other_qual_details = array();
$other_qual_certificate = $_POST['other_qual_certificate'];
$other_qual_date = $_POST['other_qual_date'];
$other_qual_institution = $_POST['other_qual_institution'];
for($i=0;$i<sizeof($other_qual_certificate);$i++)
{
	$other_qual_details[$i] = array();
	$other_qual_details[$i]['other_qual_certificate'] = $other_qual_certificate[$i];
	$other_qual_details[$i]['other_qual_date'] = $other_qual_date[$i];
	$other_qual_details[$i]['other_qual_institution'] = $other_qual_institution[$i];
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

$query = "INSERT INTO applicants SET
post_applied_for						= '$post_applied_for',
application_in_response_to				= '$application_in_response_to',
applicant_initials						= '$applicant_initials',
applicant_full_name						= '$applicant_full_name',
applicant_surname						= '$applicant_surname',
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
application_time						= '$application_time'";
mysqli_query($con,$query);
?>