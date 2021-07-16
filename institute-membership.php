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
                    $mail_subject = "New member" . $mname . "has registered for NNHS membership";
                    wp_mail('rajeshr@keystone-foundation.org', $mail_subject, $message);

                    wp_redirect('http://localhost/nnhs/success/');                  
                      
                }       
                
                else {
                    echo $submission_failed;
                    echo '<h5> <center>Fill all the required fields</center></h5>';
                    
                    }
            ?>

<!----Match form input fields with membership plugin and adatabse columns --> 
            <p><span class="membership-error">Fields marked with * are mandatory.</span></p>

            <label for="mem_type"><b>Membership Type</b></label> <span class="membership-error">* <?php echo $errorf_mem_type; ?></span>
            <select name="mem_type" value="<?= isset($_POST['mem_type']) ? $_POST['mem_type'] : ''; ?>" required>
                        <option value="Individual">Individual</option>                    </select>

            <label for="mname"><b>Applicant Name</b></label> <span class="membership-error">* <?php echo $errorfname; ?></span>
            <input type="text" placeholder="Name" name="mname" maxlength="20"
                value="<?= isset($_POST['mname']) ? $_POST['mname'] : ''; ?>" required>
            
            <label for="mdesignation"><b>Designation</b></label><span class="membership-error">* <?php echo $errorfdesignation; ?></span>
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

                <label for="mtype_institution"><b>Type of Institution</b></label><span class="membership-error">*
                <?php echo $errorftype_institution; ?></span>
            <input type="text" placeholder="Type of Institution" name="mtype_institution"
                value="<?= isset($_POST['mtype_institution']) ? $_POST['mtype_institution'] : ''; ?>" required>        

                <label for="minstitution_address"><b>Address</b></label> <span class="membership-error">*
                <?php echo $errorfinstitution_address; ?></span>
            <textarea name="minstitution_address" rows="5" cols="33" class="textarea" maxlength="200"
                value="<?= isset($_POST['minstitution_address']) ? $_POST['minstitution_address'] : ''; ?>" required> Address</textarea>

            <label for="minterest"><b>Nature of Interest</b></label><span class="membership-error">*<?php echo $errorfinterest; ?> </span>
            <textarea name="minterest" rows="5" cols="33" class="textarea"
                value="<?= isset($_POST['minterest']) ? $_POST['minterest'] : ''; ?>"
                required> Describe your Nature of Interest..</textarea>

            <label for="mrefname"><b>Referred by NNHS member (Please mention Name) </b></label><span
                class="membership-error">* <?php echo $errorfrefnamet; ?></span>
            <input type="text" placeholder="Referral member's name" name="mrefname"
                value="<?= isset($_POST['mrefname']) ? $_POST['mrefname'] : ''; ?>" required>

            <label for="mrefdet"><b>Referral member's Phone/E-mail </b></label><span class="membership-error">*
                <?php echo $errorfrefdet; ?></span>
            <input type="text" placeholder="Referral member's detail" name="mrefdet"
                value="<?= isset($_POST['mrefdet']) ? $_POST['mrefdet'] : ''; ?>" required>

            <label for="pan_no"><b>PAN Number </b></label><span class="membership-error">* <?php $errorf_pan_no; ?></span>
            <input type="text" placeholder="PAN Number" name="pan_no"
                value="<?= isset($_POST['pan_no']) ? $_POST['pan_no'] : ''; ?>" required>

                <label for="reg_no"><b>Registration Certificate Number </b></label><span class="membership-error">* <?php $errorf_reg_no; ?></span>
            <input type="text" placeholder="Registration Certificate" name="reg_no"
                value="<?= isset($_POST['reg_no']) ? $_POST['reg_no'] : ''; ?>" required>

            <label for="mamount"><b>Amount Rs.</b></label><span class="membership-error">*
                <?php echo $errorfamount; ?></span>
            <select name="mamount" value="<?= isset($_POST['mamount']) ? $_POST['mamount'] : ''; ?>" required>
                <option value="10000">10,000/-</option>
            </select>    

            
            <label for="mplace"><b>Place </b></label><span class="membership-error">* <?php $errorfplace; ?></span>
            <input type="text" placeholder="place" name="mplace"
                value="<?= isset($_POST['mplace']) ? $_POST['mplace'] : ''; ?>" required>
            
            <label for="date"><b>Date </b></label><span class="membership-error">* <?php $errorfdate; ?></span>
            <input type="text" name="mdate"
                value="<?php echo date('Y-m-d'); ?>" required>

            <div class="mform-btn-container">
                <div class="mform-btn">

                    <button type="submit" class="registerbtn" name="institution_submit">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!---------------HTML PAGE/Form DESIGN -END------------>
<?php get_footer(); ?>