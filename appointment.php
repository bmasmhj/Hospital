<?php require 'header.php'; 

if(!isset($_POST['with'])){
        $docznames = 'Select Doctor';
        $docszpecial = 'Select Department';
        $docszpecialcode = '';
        $docszpecialid = '';
        $doczsid = '';
        $docsimage = '';
        $doczday = '';
        $docztime = '';
    }	

?>

<section>
    <div class="container">
        <div class="title">
            <h2 class="text-center">Doctor's Appointment</h2>
                <form  class='needs-validation' novalidate method='post' id='appointdoctor'>
                    <div class="card">
                        <div class="card-body">
                            <h3>Appointment Details <span id='alert' class='text-danger'> </span> </h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label class="form-label">Departments</label>
                                    <select class="form-select" required name="speciality" id="speciality">
                                        <option value='<?php echo $docszpecialid?>'><?php echo $docszpecial ?></option>
                                        <?php 
                                        foreach($specialitydata as $key => $department){
                                                if($department['name'] != $docszpecial ) {
                                        ?>
                                        <option value="<?php echo $department['id']?>"><?php echo $department['name']?></option>
                                        <?php } } ?>
                                    </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Doctor Name</label>
                                    <select required class="form-select" name="selecdocs" id="selectdocs">
                                        <option value="<?php echo $doczsid?>"><?php echo $docznames ?></option>
                                        <?php 
                                        foreach($doctordata as $key => $docoption){
                                                if($docoption['doccode'] != $docszpecialcode && $docoption['speciality'] == $docszpecial ) {
                                        ?>
                                            <option value="<?php echo $docoption['id']?>"><?php echo $docoption['name']?></option>
                                        <?php } } ?>

                                    </select>
                                    </div>
                            

                                    <div class="mb-3">
                                        <label class="form-label">Appointment Date</label>
                                        <input required class="form-control" id="datepicker" type="date" name="date">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Reason</label>
                                        <textarea required rows='10' id='apreason' class="form-control" placeholder="Why do you want to book an Appointment ?"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6" id='doctordetails'>
                                    <div class="card-body text-center">
                                        <img class="rounded-circle m-2" src="assets/images/uploads/doctors/<?php echo   $docsimage?>" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                                        <h3><?php echo $docznames ?></h2>
                                        <span><?php echo $docszpecial ?></span>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="text-primary">OPD Scheule</h3>
                                        <hr>
                                        <h5><?php echo $doczday ?></h5>
                                        <h5><?php echo $docztime ?></h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <a href='Doc?tors=<?php echo $docszpecialcode?>' class="btn btn-danger">View Profile</a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3>Patient Details <span id='alert' class='text-danger'> </span> </h3>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">Full Name</label>
                                    <input type="text" class="form-control" id="apfullname" placeholder="First name" value="<?php echo $name?>" required>
                                    
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom02">Address</label>
                                    <input type="text" class="form-control" id="apaddress" placeholder="Address" value="<?php echo $address?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">Email adress</label>
                                    <input type="email" class="form-control" id="apemail" placeholder="abc@email.com" value="<?php echo $email?>" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Address.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id='apnum' value='<?php echo $num?>' required data-toggle="input-mask" placeholder="98XXXXXXXX" data-mask-format="0000000000">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="text" id="range_09" data-plugin="range-slider"
                                    data-grid="true" data-min="0" data-max="100" data-prefix="Age"
                                    data-max_postfix="+" data-from="<?php echo $age?>" name='age' data-to="1000" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" <?php if($gender=='male') { echo "checked"; } ?> id="gender" name="gender" value='male' class="form-check-input" required>
                                        <label class="form-check-label" for="customRadio3">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" <?php if($gender=='female') { echo "checked"; } ?> id="gender" name="gender" value='female' class="form-check-input" required>
                                        <label class="form-check-label" for="customRadio4">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" <?php if($gender=='other') { echo "checked"; } ?> id="gender" name="gender" value='others' class="form-check-input" required>
                                        <label class="form-check-label" for="customRadio4">Others</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-danger text-center">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</section>

            <?php require 'footer.php' ?>

            <script src='assets/js/md5.js'> </script>