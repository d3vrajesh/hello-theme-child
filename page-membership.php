<?php
/*
 * Template Name: Individual_Membership
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
                        <option value="Individual">Individual</option>
                        
                    </select>

            <label for="mname"><b>Name</b></label> <span class="membership-error">* <?php echo $errorfname; ?></span>
            <input type="text" placeholder="Name" name="mname" maxlength="20"
                value="<?= isset($_POST['mname']) ? $_POST['mname'] : ''; ?>" required>

            <label for="mdob"><b>Date of Birth</b></label> <span class="membership-error">*
                <?php echo $errorfdob; ?></span> <br>
            <input type="date" placeholder="Date of Birth" name="mdob"
                value="<?= isset($_POST['mdob']) ? $_POST['mdob'] : ''; ?>" required> <br>

            <label for="maddress"><b>Address</b></label> <span class="membership-error">*
                <?php echo $errorfaddress; ?></span>
            <textarea name="maddress" rows="5" cols="33" class="textarea" maxlength="200"
                value="<?= isset($_POST['maddress']) ? $_POST['maddress'] : ''; ?>" required> Address</textarea>

            <label for="mtelres"><b>Telephne-Residential</b></label><span class="membership-error">
                <?php echo $errorftelres; ?></span>
            <input type="tel" placeholder="Telephone Residential" name="mtelres"
                value="<?= isset($_POST['mtelres']) ? $_POST['mtelres'] : ''; ?>" >

            <label for="mteloff"><b>Telephne-Office</b></label><span class="membership-error">
                <?php echo $errorfteloffice; ?></span>
            <input type="tel" placeholder="Telephone Office" name="mteloff"
                value="<?= isset($_POST['mteloff']) ? $_POST['mteloff'] : ''; ?>">

            <label for="mmob"><b>Mobile</b></label><span class="membership-error">* <?php echo $errorfmobno; ?></span>
            <input type="tel" placeholder="Mobile" name="mmob"
                value="<?= isset($_POST['mmob']) ? $_POST['mmob'] : ''; ?>" required>

            <label for="memail"><b>Email</b></label><span class="membership-error">* <?php echo $errorfemail; ?></span>
            <input type="text" placeholder="Enter Email" name="memail"
                value="<?= isset($_POST['memail']) ? $_POST['memail'] : ''; ?>" required>

            <label for="mprofession"><b>Profession</b></label><span class="membership-error">*
                <?php echo $errorfprofession; ?></span>
            <input type="text" placeholder="Profession" name="mprofession"
                value="<?= isset($_POST['mprofession']) ? $_POST['mprofession'] : ''; ?>" required>

            <label for="mnameins"><b>Name of Institution</b></label> <span class="membership-error">
                <?php echo $errorfnameins; ?></span>
            <input type="text" placeholder="Name of Institution" name="mnameins"
                value="<?= isset($_POST['mnameins']) ? $_POST['mnameins'] : ''; ?>">

            <label for="mplaceins"><b>Place of Institution</b></label> <span class="membership-error">
                <?php echo $errorfplaceins; ?></span>
            <input type="text" placeholder="Place of Institution" name="mplaceins"
                value="<?= isset($_POST['mplaceins']) ? $_POST['mplaceins'] : ''; ?>">

            <label for="mdesignation"><b>Designation</b></label> <span class="membership-error">
                <?php echo $errorfdesignation; ?></span>
            <input type="text" placeholder="Designation" name="mdesignation"
                value="<?= isset($_POST['mdesignation']) ? $_POST['mdesignation'] : ''; ?>">

            <label for="minterest"><b>Nature of Interest</b></label><span
                class="membership-error">*<?php echo $errorfinterest; ?> </span>
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

            <label for="mem_id_type"><b>ID Proof type </b></label><span class="membership-error">*
                <?php echo $errorf_id_type; ?></span>
            <select name="mem_id_proof_type" value="<?= isset($_POST['mem_id_proof_type']) ? $_POST['mem_id_proof_type'] : ''; ?>" required>
            <option value="-Select-">-Select-</option>
                        <option value="Aadhar Card">Aadhar Card</option>
                        <option value="Driving License">Driving License</option>
                        <option value="Voters ID">Voters ID</option>
                    </select>

            <label for="mem_id_proof_no"><b>ID Proof number </b></label><span class="membership-error">* <?php $errorf_id_no; ?></span>
            <input type="text" placeholder="Id Proof number" name="mem_id_proof_no"
                value="<?= isset($_POST['mem_id_proof_no']) ? $_POST['mem_id_proof_no'] : ''; ?>" required>

            <label for="mamount"><b>Amount Rs.</b></label><span class="membership-error">*
                <?php echo $errorfamount; ?></span>
            <select name="mamount" value="<?= isset($_POST['mamount']) ? $_POST['mamount'] : ''; ?>" required>
                <option value="2000">2,000/-</option>
            </select>    

            <label for="mupload"><b>Photo upload (Passport size, less than 100kb) </b></label><span
                class="membership-error">* <?php echo $errorfupload; ?></span>
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="mupload" id="mupload"
                required>
            <br><br><br>
            <label for="place"><b>Place </b></label><span class="membership-error">* <?php $errorfplace; ?></span>
            <input type="text" placeholder="place" name="mplace"
                value="<?= isset($_POST['mplace']) ? $_POST['mplace'] : ''; ?>" required>

                <label for="date"><b>Date </b></label><span class="membership-error">* <?php $errorfdate; ?></span>
            <input type="text" name="mdate"
                value="<?php echo date('Y-m-d'); ?>" required>
            
            <div class="mform-btn-container">
                <div class="mform-btn">

                    <button type="submit" class="registerbtn" name="individual_submit">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!---------------HTML PAGE/Form DESIGN -END------------>
<?php get_footer(); ?>