<?php
require "../config/menu.php";
require_once('../model/Recordset.php');
$rs = new Recordset();
?>

<body>
    <div class="d-flex justify-content-center">
        <h1><strong>Risky</strong> Jobs</h1>
    </div>
    <div class="d-flex justify-content-center">
        <p class="h4">Dangeri Your dream job is out there.<br>
            Do you have the guts to go find it?
        </p>
    </div>
    <main>
        <div class="col-md-6 offset-md-1">

            <h1><strong>Risky Jobs - Registration</strong></h1>

            <form class="form-horizontal" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
                <?php
                if (isset($_POST['submit'])) {

                    function validatePhoneNumber(string $phoneNumber): ?string
                    {
                        $validPhoneNumberRegex = '/^\(?[2-9]\d{2}\)?[-\s]\d{3}-\d{4}$/';
                        $phoneNumberPattern = '/[\(\)\-\s]/';
                        $emptyString = '';
                        if (!preg_match($validPhoneNumberRegex, $phoneNumber)) {
                            echo "<div class='alert alert-primary' role='alert'>
                            <br>
                            Your phone number is invalid " . $phoneNumber . "
                            <br>
                            </div>";
                            return null;
                        }

                        // remove pattern characters from phone number
                        $cleanPhoneNumber = preg_replace($phoneNumberPattern, $emptyString, $phoneNumber);

                        return $cleanPhoneNumber;
                    }

                    /**
                     * Validates an email address using regular expressions and DNS lookup.
                     * @param string $email The email address to be validated.
                     * @throws Some_Exception_Class If the email address is invalid.
                     * @return string|null The validated email address or null if invalid.
                     */

                    function validateEmail(string $email): ?string
                    {
                        $emailPattern = '/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/';
                        if (!preg_match($emailPattern, $email)) {
                            echo "<div class='alert alert-primary' role='alert'>
                            <br>
                            Your email is invalid " . $email . "
                            <br>
                            </div>";
                            return null;
                        }

                        $domainEmail = preg_replace($emailPattern, '', $email);
                        if (!winCheckdnsrr($domainEmail)) {
                            echo "<div class='alert alert-primary' role='alert'>
                            <br>
                            Your domains is invalid " . $domainEmail . "
                            <br>
                            </div>";
                            return null;
                        }
                        return $email;
                    }
                    
                    function winCheckdnsrr($domain, $recType = ''){
                    
                        if(!empty($domain)){
                            if($recType =='') $recType="MX";
                            exec("nslookup -type=$recType $domain", $output);
                            foreach($output as $line){
                                if(preg_match("/^$domain/", $line)){
                                return true;
                                }                            
                            }
                            return false;
                        }
                        return false;
                    }

                    if (validatePhoneNumber($_POST['phone']) != null && validateEmail($_POST['email']) <> null) {

                        $data = [];
                        $cod = $rs->setAutoCode("rj_id", "risky_jobs_registration");

                        $data["rj_id"] = $cod;
                        $data["rj_firstname"] = $_POST['firstname'];
                        $data["rj_lastname"] = $_POST['lastname'];
                        $data["rj_email"] = validateEmail($_POST['email']);
                        $data["rj_phone"] = validatePhoneNumber($_POST['phone']);
                        $data["rj_job"] = $_POST['job'];
                        $data["rj_resume"] = $_POST['resume'];
                        $output_form = 'no';

                        $rs->Insert($data, "risky_jobs_registration");                                                
                        echo "<div class='alert alert-primary' role='alert'>
                        <br>
                        This Topic has add with success! 
                        <br>
                        </div>";
                    }
                }
                ?>
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-6 col-form-label">First Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" maxlength="30" minlength="2" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lastname" class="col-sm-6 col-form-label">last Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" maxlength="30" minlength="2" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-6 col-form-label">E-mail</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" placeholder="E-mail" maxlength="30" minlength="2" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-6 col-form-label">Phone</label>
                    <div class="col-md-6">
                        <input type="phone" class="form-control" name="phone" placeholder="Phone" maxlength="30" minlength="2" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="job" class="col-sm-6 col-form-label">Desired Job</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="job" placeholder="Job" maxlength="30" minlength="2" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="other" class="col-sm-6 col-form-label">Past your resume here</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" placeholder="Leave a comment here" name="resume" required>

                    </textarea><br />
                    </div>



                    <div class="form-grup">
                        <button type="submit" name="submit" class="btn btn-primary"> Save</button>
                    </div>
            </form>

        </div>
    </main>
</body>
<?php
require "../config/footer.php";
?>