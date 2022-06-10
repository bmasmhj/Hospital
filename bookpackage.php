<?php require 'header.php';

if(!empty($_GET['package'])){
    if ($bookpckgresult->num_rows > 0) {

?>
<section>
    <div class="container">
        <div class="title">
            <h2 class="text-center">Book Health Package</h2>
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-body">
            <h4 class='text-center pt-2 pb-2 text-danger' id='alert'></h4>

                        <form class="needs-validation" novalidate id='bookpack'>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">Full name</label>
                                    <input type="text" class="form-control" id="pkgfullname" placeholder="" value="<?php echo $name?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom03">Address</label>
                                    <input type="text" class="form-control" id="pkgaddress" value='<?php echo $address?>' placeholder="Sunakothi , Lalitpur - 4470" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Address.
                                    </div>
                                </div>
                            </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Package</label>
                                <input type="text" class='form-control' disabled value="<?php echo $bookpckgname?>">
                                <input type="hidden" class='form-control' id="packagename" disabled value="<?php echo $bookpckgname?>">
                                <input type="hidden" class='form-control' value="<?php echo $codeid ?>" id='packagecode'>

                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Appointment Date</label>
                                <input type="text" class="form-control date" id="datepicker" required data-toggle="date-picker" data-single-date-picker="true">
                            </div>

                        </div>
                                
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email adress</label>
                                <?php if(isset($_SESSION['email'])){ ?>
                                <input type="email" class="form-control" disabled value='<?php echo $email?>'>
                                <input type="hidden" class="form-control"  id="pkgemail" placeholder="abc@email.com" value='<?php echo $email?>' required>
                                <?php }else {?>
                                    <input type="email" class="form-control" id="pkgemail" placeholder="abc@email.com" value='<?php echo $email?>' required>
                                <?php } ?>
                                <div class="invalid-feedback">
                                    Please provide a valid Address.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" value='<?php echo $num?>' id='pkgnum' required data-toggle="input-mask" placeholder="98XXXXXXXX" data-mask-format="0000000000">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                            <input type="text" id="range_09" data-plugin="range-slider"
                            data-grid="true" data-min="0" data-max="100" data-prefix="Age"
                            data-max_postfix="+" data-from="<?php echo $age?>" name='age' data-to="1000" />
                            </div>
                            <div class="col-md-6">
                            <label class="form-label">Sex</label>
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
                            <button class="btn btn-primary" type="submit">Book Now</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
}else{
    ?> <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">    
                <div class="text-center">
                    <h1 class="text-error">4<i class="mdi mdi-emoticon-sad"></i>4</h1>
                    <h4 class="text-uppercase text-danger mt-3">Page Not Found</h4>
                    <p class="text-muted mt-3">It's looking like you may have taken a wrong turn. Don't worry... it
                        happens to the best of us. Here's a
                        little tip that might help you get back on track.</p>

                    <a class="btn btn-info mt-3" href="Home"><i class="mdi mdi-reply"></i> Return Home</a>
                </div>
            </div> 
        </div>
      
    </div>
 
</div> 
<?php
}
}else 
{
    ?>  <script> window.location.href = "HealthPackageServices"; </script> <?php

}

require 'footer.php';
?>
<script src='assets/js/md5.js'> </script>
<script>
    

    </script>
