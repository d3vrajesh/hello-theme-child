<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */

//------Custom Style Sheet/CSS attachment (style.css)--------------
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		
	);
}

//------Page title disable from theme --------------
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );
function ele_disable_page_title( $return ) {
return false;
}
add_filter( 'hello_elementor_page_title', 'ele_disable_page_title' );

//------Custom Script attachment (mform.js) --------------
add_action( 'wp_enqueue_scripts', 'my_custom_script_load' );
function my_custom_script_load(){
  wp_enqueue_script( 'my-custom-script', get_stylesheet_directory_uri() . '/mform', array( 'jquery' ) );
}

//==================Membership form - Individual ============== 
if(isset($_POST['individual_submit']))
{

 

 //------Variable mapping with html input fields using name --------------
		$mem_type = $_POST['mem_type'];
		$mname = $_POST["mname"]; 
		$mdob = $_POST["mdob"];
		$maddress = $_POST["maddress"];
		$mtelres = $_POST["mtelres"];
		$mteloff = $_POST["mteloff"];
		$mmob = $_POST["mmob"];
		$memail = $_POST["memail"];
		$mprofession = $_POST["mprofession"];
		$mnameins = $_POST["mnameins"];
		$mplaceins = $_POST["mplaceins"];
		$mdesignation = $_POST["mdesignation"];
		$minterest = $_POST["minterest"];
		$mrefname = $_POST["mrefname"];
		$mrefdet = $_POST["mrefdet"];
		$m_id_proof_type = $_POST["mem_id_proof_type"];
		$m_id_proof_no = $_POST["mem_id_proof_no"];		
		$mamount = $_POST["mamount"];
		$mplace = $_POST["mplace"];
		$mdate =  date('Y-m-d');
		
 
	//-----------Form input Validation-----------	
	$error = array();
	
	//-----Name - input text validation 
	$fname = "/^[a-zA-Z\s]+$/";
	if (!preg_match($fname, $mname)) {
		$error['fname'] = "Invalid input";
		$errorfname = "Invalid Input.";
	}

	//-----Address - input text validation 

	$faddress = "/^[A-Za-z0-9\s\-\,]+$/";
	if (!preg_match($faddress, $maddress)) {
		$error['faddress'] = "Only numeric, alphabetic, dot, comma, hypen are allowed.";
		$errorfaddress = "Only numeric, alphabetic, dot, comma, hypen are allowed.";
	}

	//-----Mobile number - input number validation 
	$fmob = "/^[0-9]+$/";
	$fmobno = strlen($_POST["mmob"]);

	if (!preg_match($fmob, $mmob))  {
		$error['fmob'] = "Only numeric values are allowed";
		$errorfmobno = "Only numeric values are allowed";
	}
	if ($fmobno != 10) {
		$error['fmob'] = "Mobile number is not valid";
		$errorfmobno = "Mobile number is not valid";
	}

	//-----Telephone residential - input number validation 
	if (!preg_match($fmob, $mtelres)) {
		$error['ftelres'] = "Only numeric value is allowed.";
		$errorftelres = "Only numeric value is allowed.";
	}
	
	//-----Telephone office - input number validation 
	if (!preg_match($fmob, $mteloff)) {
		$error['fteloffice'] = "Only numeric value is allowed.";
		$errorfteloffice = "Only numeric value is allowed.";
	}

	//-----Email - input email validation 
	if (is_email($memail) == false) {
		$error['mail'] = "Invalid e-mail.";
		$errorfemail = "Invalid e-mail.";             //errorfemail
	}

	//-----Email - input text validation
	$fprofession = "/^[a-zA-Z\s]+$/";
	if (!preg_match($fprofession, $mprofession)) {
		$error['fprofession'] = "Invalid e-mail.";
		$errorfprofession = "Invalid e-mail.";
	}

	//-----Name of institution - input text validation
	$fnameins = "/^[a-zA-Z\s]+$/";
	if (!preg_match($fnameins, $mnameins)) {
		$error['fnameins'] = "Invalid input";
		$errorfnameins = "Invalid input";
	}

	//-----Place of institution - input text validation
	$fplaceins = "/^[a-zA-Z0-9\s\-\,\.]+$/";
	if (!preg_match($fplaceins, $mplaceins)) {
		$error['fplaceins'] = "Invalid input";
		$errorfplaceins = "Invalid input";
	}
	//-----Designation - input text validation
	$fdesignation = "/^[a-zA-Z\s]+$/";
	if (!preg_match($fdesignation, $mdesignation)) {
		$error['fdesignation'] = "Invalid input.";
		$errorfdesignation = "Invalid input.";
	}

	//-----nature of interest - input text validation
	$finterest = "/^[a-zA-Z\s\,\.]+$/";
	if (!preg_match($finterest, $minterest)) {
		$error['finterest'] = "Invalid input.";
		$errorfinterest = "Invalid input.";
	}

	//-----Reference member name  - input text validation
	$frefname = "/^[a-zA-Z\s]+$/";
	if (!preg_match($frefname, $mrefname)) {
		$error['frefnamet'] = "Invalid input.";
		$errorfrefname = "Invalid input.";
	}

	//-----Reference member detail - input email/mobile number validation
	 
	//-----Reference Email validation  - input length validation
	$frefdet = "/^[0-9]+$/";
	$frefmobno = strlen($_POST["mrefdet"]);
	 
	if ((is_email($mrefdet) == false) && (!preg_match($frefdet, $mrefdet)))
	{
		$error['frefdet'] = "Not a valid input";
		$errorfrefdet = "Not a valid input.";		
	}
	
	if ((!preg_match($frefdet, $mrefdet) == false) && ($frefmobno != 10))
	{
		$error['frefdetmob'] = "Not a valid input";
		$errorfrefdet = "Not a valid input.";		
	 
	} 

	//-----Id_proof_type - input text validation
	$fid_proof_type = "-Select-";
	if ($m_id_proof_type == $fid_proof_type)
	{
		$error['fid_proof_type'] = "Select a Valid ID Proof type.";
		$errorfid_proof_type = "Select a Valid ID Proof type.";
	}
	//-----Id_no - input text validation
	$fid_proof_no = "/^[A-Za-z0-9,\/]+$/";
	if (!preg_match($fid_proof_no, $m_id_proof_no))
	{
		$error['fid_proof_no'] = "Not a valid input";
		$errorfid_proof_no = "Not a valid input.";
	}

	//-----Place of application - input text validation
	$fplace = "/^[a-zA-Z]+$/";
	if (!preg_match($fplace, $mplace)) {
		$error['fplace'] = "Not a valid input.";
		$errorfplace = "not a valid input.";
	} 

	//-----Upload file size validation (100Kb - Max)
	if ($_FILES["mupload"]["size"] > 100000) {
	$error['mupload'] = "File size is too  large. Maximum allowed file size is 100Kb";
	$errorfupload = "File size is too  large. Maximum allowed file size is 100Kb";
	} 

	//-----Upload file format/extension validation (Allowed - jpeg, jpg, png) 

	$file_jpeg = "jpeg";
	$file_jpg = "jpg";
	$file_png = "png";
	$upload_file = wp_check_filetype($_FILES["mupload"]["name"]);
	$upload_file_ext = $upload_file['ext'];

	if (($upload_file_ext != $file_jpeg) && ($upload_file_ext != $file_jpg) && ($upload_file_ext != $file_png)) {
		$error['mupload'] = "upload a png/jpeg/jpg file";
		$errorfupload = "upload a png/jpeg/jpg file";
		}
		
	
	//----- Rename file on upload
 	
	$upload_file = $_FILES['mupload']['name'];
	$upload_file_extension =  end(explode('.', $_FILES['mupload']['name'])); // Get upload file extension
	$rename_format = md5(rand());
	//$rename_format = 'Membership'.date('Ymd').$random_no;
	$new_upload_file = $rename_format .".".$upload_file_extension;

	//-----Get file upload URL   
	$upload_dir = wp_upload_dir();
	$mupload_url = $upload_dir['url']; 
	$mupload = $mupload_url . "/" . $new_upload_file;
	

	//$mupload = $_FILES['mupload']['name'];
	//---Passing default values to the default values 
	$default_app_status = "Pending";
	$not_applicable = "Not applicable";
	$none = "None";

//------Databse Access --------------
	global $wpdb;
	$nnhs_table_name = $wpdb->prefix . 'members_list';
	//-----Save form data in Database  
	if (count($error) == 0) {
		$data_array = array(
			'm_id'=> $none,
			'app_status' => $default_app_status,
		 	'membership_type' => $mem_type,
			'applicant_name' => $mname,
			'dob' => $mdob,
			'contact_address' => $maddress,
			'tel_res' => $mtelres,
			'tel_off' => $mteloff,
			'mob' => $mmob,
			'email' => $memail,
			'profession' => $mprofession,
			'name_ins' => $mnameins,
			'place_ins' => $mplaceins,
			'interest' => $minterest,
			'designation' => $mdesignation, 
			'institution_type' => $not_applicable,
			'institution_address' =>$not_applicable,
			'amount' => $mamount,
			'pay_status' => $none,
			'transaction_type' => $none,
			'transaction_id' => $none,
			'ref_name' => $mrefname,
			'ref_detail' => $mrefdet,  
			'id_proof_type' => $m_id_type,
			'id_proof_no' => $m_id_proof_no, 
			'amount' => $mamount,
			'upload' => $mupload,
			'place' => $mplace,
			'app_date' => $mdate 
			
			);

		$row_result = $wpdb->insert($nnhs_table_name, $data_array, $format=null);	
	
		wp_upload_bits($new_upload_file, null, file_get_contents($_FILES['mupload']['tmp_name'])); 		
		
	}
	else {
		
		
		$submission_failed = 'You application is not submitted, Check all the inputs.';
		

	}
}

//########################################################################################
//########################################################################################


//==================Membership form - Institution ============== 
if(isset($_POST['institution_submit']))
{

 //------Variable mapping with html input fields using name --------------
		$mem_type = $_POST['mem_type'];
		$mname = $_POST["mname"]; 
		$mdesignation = $_POST["mdesignation"];		
		$mtelres = $_POST["mtelres"];
		$mteloff = $_POST["mteloff"];
		$mmob = $_POST["mmob"];
		$memail = $_POST["memail"];
		$mtype_institution = $_POST["mtype_institution"];
		$minstitution_address = $_POST["minstitution_address"];
		$minterest = $_POST["minterest"];
		$mrefname = $_POST["mrefname"];
		$mrefdet = $_POST["mrefdet"];
		$id_proof_type = $_POST["id_proof_type"];
		$id_proof_no = $_POST["id_proof_no"];
		$mamount = $_POST["mamount"];
		$mplace = $_POST["mplace"];
		$mdate =  date('Y-m-d');
 
	//-----------Form input Validation-----------	
	$error = array();
	
	//-----Name - input text validation 
	$fname = "/^[a-zA-Z\s]+$/";
	if (!preg_match($fname, $mname)) {
		$error['fname'] = "Invalid input";
		$errorfname = "Invalid Input.";
	}

	//-----Designation - input text validation
	$fdesignation = "/^[a-zA-Z\s]+$/";
	if (!preg_match($fdesignation, $mdesignation)) {
	$error['fdesignation'] = "Invalid input.";
	$errorfdesignation = "Invalid input.";
	}


	//-----Mobile number - input number validation 
	$fmob = "/^[0-9]+$/";
	$fmobno = strlen($_POST["mmob"]);

	if (!preg_match($fmob, $mmob))  {
		$error['fmob'] = "Only numeric values are allowed";
		$errorfmobno = "Only numeric values are allowed";
	}
	if ($fmobno != 10) {
		$error['fmob'] = "Mobile number is not valid";
		$errorfmobno = "Mobile number is not valid";
	}

	//-----Telephone residential - input number validation 
	if (!preg_match($fmob, $mtelres)) {
		$error['ftelres'] = "Only numeric value is allowed.";
		$errorftelres = "Only numeric value is allowed.";
	}
	
	//-----Telephone office - input number validation 
	if (!preg_match($fmob, $mteloff)) {
		$error['fteloffice'] = "Only numeric value is allowed.";
		$errorfteloffice = "Only numeric value is allowed.";
	}

	//-----Email - input email validation 
	if (is_email($memail) == false) {
		$error['email'] = "Invalid e-mail.";
		$errorfemail = "Invalid e-mail.";
	}

	//-----Institution Type - input text validation
	$ftype_institution = "/^[a-zA-Z\s]+$/";
	if (!preg_match($ftype_institution, $mtype_institution)) {
		$error['ftype_institution'] = "Invalid input.";
		$errorftype_institution = "Invalid input.";
	}


	//-----Institution Address - input text validation 

	$finstitution_address = "/^[A-Za-z0-9\s\-\,]+$/";
	if (!preg_match($finstitution_address, $minstitution_address)) {
		$error['faddress'] = "Only numeric, alphabetic, comma, hypen are allowed.";
		$errorfinstitution_address = "Only numeric, alphabetic, comma, hypen are allowed.";
	}

	//-----nature of interest - input text validation
	$finterest = "/^[a-zA-Z\s\,\.]+$/";
	if (!preg_match($finterest, $minterest)) {
		$error['finterest'] = "Invalid input.";
		$errorfinterest = "Invalid input.";
	}

	//-----Reference member name  - input text validation
	$frefname = "/^[a-zA-Z\s]+$/";
	if (!preg_match($frefname, $mrefname)) {
		$error['frefnamet'] = "Invalid input.";
		$errorfrefnamet = "Invalid input.";
	}

	//-----Reference member detail - input email/mobile number validation
	 
	//-----Reference Email validation  - input length validation
	$frefdet = "/^[0-9]+$/";
	$frefmobno = strlen($_POST["mrefdet"]);
	 
	if ((is_email($mrefdet) == false) && (!preg_match($frefdet, $mrefdet)))
	{
		$error['frefdet'] = "Not a valid input";
		$errorfrefdet = "Not a valid input.";		
	}
	
	if ((!preg_match($frefdet, $mrefdet) == false) && ($frefmobno != 10))
	{
		$error['frefdetmob'] = "Not a valid input";
		$errorfrefdet = "Not a valid input.";		
	 
	} 

	//-----Id_Proof_Type - input text validation
	$f_id_proof_type = "-Select-";
	if ($id_proof_type = $f_id_proof_type)
	{
		$error['fid_proof_type'] = "Not a valid input";
		$errorfid_proof_types = "Not a valid input.";
	}
	//-----Id_Proof_no - input text validation
	$fid_proof_no = "/^[0-9]\/+$/";
	if (!preg_match($fid_proof_no, $id_proof_no))
	{
		$error['fid_proof_no'] = "Not a valid input";
		$errorfid_proof_no = "Not a valid input.";
	}
	//-----Place of application - input text validation
	$fplace = "/^[a-zA-Z]+$/";
	if (!preg_match($fplace, $mplace)) {
		$error['fplace'] = "Not a valid input.";
		$errorfplace = "not a valid input.";
	} 
	//---Passing default values to the default values 
	$default_app_status = "Pending";
	$not_applicable = "Not applicable";

//------Databse Access --------------
	global $wpdb;
	$nnhs_table_name = $wpdb->prefix . 'members_list';
	//-----Save form data in Database  
	if (count($error) == 0) {
		$data_array = array(
			'm_id'=> $none,
			'app_status' => $default_app_status,
			'membership_type' => $mem_type,
			'applicant_name' => $mname,
			'dob' => $not_applicable,
			'contact_address' => $not_applicable,
			'tel_res' => $mtelres,
			'tel_off' => $mteloff,
			'mob' => $mmob,
			'email' => $memail,
			'profession' => $mprofession,
			'name_ins' => $not_applicable,
			'place_ins' => $not_applicable,
			'interest' => $minterest,
			'designation' => $mdesignation,
			'institution_type' => $mtype_institution,
			'institution_address' => $maddress,
			'ref_name' => $mrefname,
			'ref_detail' => $mrefdet,
			'id_proof_type' => $m_id_type,
			'id_proof_no' => $m_id_proof_no,			
			'amount' => $mamount,
			'place' => $mplace,
			'app_date' => $mdate
			
			);

		$row_result = $wpdb->insert($nnhs_table_name, $data_array, $format=null);	
		
	}
	else {
		
		
		$submission_failed = 'You application is not submitted, Check all the inputs.';
		




	}
}

