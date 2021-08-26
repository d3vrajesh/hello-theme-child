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
                                     //  $mail_subject = "New member" . $mname . "has registered for NNHS membership";
                  //  wp_mail('rajeshr@keystone-foundation.org', $mail_subject, $message);

                  //  wp_redirect('http://localhost/nnhs/success/');                  
                  echo "successs";
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
                        <option value="Institution">Institution</option>                    </select>

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