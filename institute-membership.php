<?php
/*
 * Template Name: Institution_Membership
 */
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
 ?>
<!---START------------Page Template ------------->
<?php get_header(); 

require_once("functions.php");
?>

<div class="page-container">

    <div class="mform-title">Apply Online for Membership</div>
    <!---------------PHP code for HTML form ------------->
    <?php 
 
 ?>
    <div class="container">

        <!---form action  <?php /*echo htmlspecialchars($_SERVER["PHP_SELF"]); */?>-->

        <form id="membership" method="post" action="" autocomplete="on" enctype="multipart/form-data">

            <?php 
                if ($row_result == 1) {
                    $to[] = 'email1@example.com'; 
					$to[] = 'email2@example.com'; 
					$subject = "New member has registered for NNHS membership";
					$body = "New member " . $mname . " has registered for NNHS membership" ."<br>". "Please note: This is an auto generated mail, Please do not reply to this mail."  ;
					$headers = array('Content-Type: text/html; charset=UTF-8', 'Cc: email2@example.com', 'From: NNHS <wordpress@domain.in>');					 
 					wp_mail( $to, $subject, $body, $headers );
                    wp_redirect('https://nnhs.in/thank-you/');  
                }       
                
                else {
                    echo $submission_failed;
                    echo '<h5> <center>Fill all the required fields</center></h5>';
                    
                    }
            ?>

            <!----Match form input fields with membership plugin and adatabse columns -->
            <p><span class="membership-error">Fields marked with * are mandatory.</span></p>

            <label for="mem_type"><b>Membership Type</b></label> <span class="membership-error">*
                <?php echo $errorf_mem_type; ?></span>
            <select name="mem_type" value="<?= isset($_POST['mem_type']) ? $_POST['mem_type'] : ''; ?>" required>
                <option value="Institution">Institution</option>
            </select>

            <label for="mname"><b>Applicant Name</b></label> <span class="membership-error">*
                <?php echo $errorfname; ?></span>
            <input type="text" placeholder="Name" name="mname" maxlength="20"
                value="<?= isset($_POST['mname']) ? $_POST['mname'] : ''; ?>" required>

            <label for="mdesignation"><b>Designation</b></label><span class="membership-error">*
                <?php echo $errorfdesignation; ?></span>
            <input type="text" placeholder="Designation" name="mdesignation"
                value="<?= isset($_POST['mdesignation']) ? $_POST['mdesignation'] : ''; ?>" required>

            <label for="mtelres"><b>Telephne-Residential</b></label><span class="membership-error">
                <?php echo $errorftelres; ?></span>
            <input type="tel" placeholder="Telephone Residential" name="mtelres"
                value="<?= isset($_POST['mtelres']) ? $_POST['mtelres'] : ''; ?>">

            <label for="mteloff"><b>Telephne-Office</b></label><span class="membership-error">
                <?php echo $errorfteloffice; ?></span>
            <input type="tel" placeholder="Telephone Office" name="mteloff"
                value="<?= isset($_POST['mteloff']) ? $_POST['mteloff'] : ''; ?>">

            <label for="mmob"><b>Mobile</b></label><span class="membership-error">* <?php echo $errorfmobno; ?></span>
            <input type="tel" placeholder="Mobile" name="mmob"
                value="<?= isset($_POST['mmob']) ? $_POST['mmob'] : ''; ?>" required>

            <label for="memail"><b>Email</b></label><span class="membership-error">* <?php echo $errorfemail; ?></span>
            <input type="text" placeholder="Email" name="memail"
                value="<?= isset($_POST['memail']) ? $_POST['memail'] : ''; ?>" required>

            <label for="mnameins"><b>Name of Institution</b></label> <span class="membership-error">
                <?php echo $errorfnameins; ?></span>
            <input type="text" placeholder="Name of Institution" name="mnameins"
                value="<?= isset($_POST['mnameins']) ? $_POST['mnameins'] : ''; ?>" required>

            <label for="mtype_institution"><b>Type of Institution</b></label><span class="membership-error">*
                <?php echo $errorftype_institution; ?></span>
            <input type="text" placeholder="Type of Institution" name="mtype_institution"
                value="<?= isset($_POST['mtype_institution']) ? $_POST['mtype_institution'] : ''; ?>" required>

            <label for="minstitution_address"><b>Institution Address</b></label> <span class="membership-error">*
                <?php echo $errorfinstitution_address; ?></span>
            <textarea name="minstitution_address" placeholder="Institution Address" rows="5" cols="33" class="textarea" maxlength="200"
                value="<?= isset($_POST['minstitution_address']) ? $_POST['minstitution_address'] : ''; ?>"
                required> </textarea>


                <label for="minterest"><b>Nature of Interest</b></label><span
                class="membership-error">*<?php echo $errorfinterest; ?> </span>
                              
            <textarea class="input-control count-chars textarea" name="minterest" placeholder="Describe your Nature of Interest" rows="5" cols="33" maxlength="60" data-max-chars="200" value="<?= isset($_POST['minterest']) ? $_POST['minterest'] : ''; ?>" required></textarea>
            <label class="input-msg text-red"> </label>
                </br>
                </br>             

            <label for="mrefname"><b>Referred by NNHS member (Please mention Name) </b></label><span
                class="membership-error">* <?php echo $errorfrefnamet; ?></span>
            <input type="text" placeholder="Referral member's name" name="mrefname"
                value="<?= isset($_POST['mrefname']) ? $_POST['mrefname'] : ''; ?>" required>

            <label for="mrefdet"><b>Referral member's Phone/E-mail </b></label><span class="membership-error">*
                <?php echo $errorfrefdet; ?></span>
            <input type="text" placeholder="Referral member's detail" name="mrefdet"
                value="<?= isset($_POST['mrefdet']) ? $_POST['mrefdet'] : ''; ?>" required>

            <!----------------------------------------------------------->
            <label for="id_proof_type"><b>ID Proof Type</b></label> <span class="membership-error">*
                <?php echo $errorfid_proof_type; ?></span>
            <select name="id_proof_type" value="<?= isset($_POST['id_proof_type']) ? $_POST['id_proof_type'] : ''; ?>"
                required>
                <option value="-Select-">-Select-</option>
                <option value="PAN Card">PAN Card</option>
                <option value="Registration Certificate">Registration Certificate</option>
            </select>

            <label for="id_proof_no"><b>ID Proof Number </b></label><span class="membership-error">*
                <?php $errorfid_proof_no; ?></span>
            <input type="text" placeholder="ID Proof Number" name="id_proof_no"
                value="<?= isset($_POST['id_proof_no']) ? $_POST['id_proof_no'] : ''; ?>" required>

            <label for="mamount"><b>Amount Rs.</b></label><span class="membership-error">*
                <?php echo $errorfamount; ?></span>
            <select name="mamount" value="<?= isset($_POST['mamount']) ? $_POST['mamount'] : ''; ?>" required>
                <option value="10000">10,000/-</option>
            </select>

            <label for="mplace"><b>Place </b></label><span class="membership-error">* <?php $errorfplace; ?></span>
            <input type="text" placeholder="place" name="mplace"
                value="<?= isset($_POST['mplace']) ? $_POST['mplace'] : ''; ?>" required>

            <label for="date"><b>Date </b></label><span class="membership-error">* <?php $errorfdate; ?></span>
            <input type="text" name="mdate" value="<?php echo date('Y-m-d'); ?>" required>

            <div class="mform-btn-container">
                <div class="mform-btn">

                    <button type="submit" class="registerbtn" name="institution_submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!---------------HTML PAGE/Form DESIGN -END------------>
<?php get_footer(); ?>