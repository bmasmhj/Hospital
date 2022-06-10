</div>
    </div>
</div>

        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/vendor/ion.rangeSlider.min.js"></script>
        <script src="assets/js/ui/component.range-slider.js"></script>
        <script src="assets/css/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="assets/css/vendor/owl.carousel/owl.carousel.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="assets/js/crosel.js"></script>
        <script src="assets/js/main.js"></script>

        <?php if(!isset($_SESSION['alert'])){ ?>
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Corona aleart',
                text: 'vaccine liyo ta ? leko xaina vae liu',
                footer: '<a href="Package?service=covid_checkup">ka gaera liney ?</a>',
                }).then((result)=> {
                    if(result.isConfirmed){
                        const session = 'covid';
                        // console.log("done");
                        jQuery.ajax({
                                url: "addsession.php",
                                type: "POST",
                                data: {
                                    'sessionalert' : session,		
                                },
                                success:function(data){
    
                                }
                        });
                    }
                })
        </script>
        <?php } ?>
    </body>
    <div class ="p-5"></div>
    <footer class=" bg-light">
            <hr>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-primary"><?php echo $websitename ?></h2>
                        <div class="row">
                            <div class="col-md-6">
                            <h4 class="mx-4">Navigate menu</h4>
                                <ul>
                                    <li class="nav-link"><a href="Home" class="text-dark">Home</a></li>
                                    <li class="nav-link"><a href="FindDoctor" class="text-dark">Find Doctors</a></li>
                                    <li class="nav-link"><a href="EmergencyServices" class="text-dark">Emergency  Services</a></li>
                                    <li class="nav-link"><a href="RegularServices" class="text-dark">Regular  Services</a></li>
                                    <li class="nav-link"><a href="HealthPackageServices" class="text-dark">Health Package  Services</a></li>
                                    <li class="nav-link"><a href="Specialities" class="text-dark">Center of Specialist</a></li>
                                    <li class="nav-link"><a href="Contact" class="text-dark">Contact</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mx-4">Details</h4>
                                <ul>
                                    <li class="nav-link"><a   class="text-dark">Location : <?php echo $websitelocation ?></a></li>
                                    <li class="nav-link"><a href="tel:<?php echo $websitecontactnum; ?>" class="text-dark">Phone : <?php echo $websitecontactnum ?></a></li>
                                    <li class="nav-link"><a href="mailto:<?php echo $websiteemail; ?>" class="text-dark">Email : <?php echo $websiteemail ?></a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                <h3>FEED BACK</h3>

                        <form class="form-horizontal needs-validation" id="footerform"  novalidate>
                            <span id="footermsg"></span>
                            <div class="row">
                                <label for="inputEmail" class=" col-form-label">Full Name</label>
                                <div class="col-10">
                                    <input required type="text" class="form-control footerinput" name="fefirname" id="fefirname" value="<?php echo $name?>" placeholder="First Name">
                                </div>
                            </div>
                            <div class="row">
                                <label for="inputEmail" class="col-form-label">Email</label>
                                <div class="col-10">
                                    <input required type="email" value="<?php echo $email?>" class="form-control footerinput" name="feemail" id="feemail" placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <label for="inputEmail" class="col-form-label">Subject</label>
                                <div class="col-10">
                                    <input required type="text" class="form-control footerinput" name="subfeed" id="subfeed" placeholder="Subject">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword5" class="col-form-label">Meesage</label>
                                <div class="col-10">
                                    <textarea required class="form-control footerinput" id="femessage" name="femessage" placeholder="Type your message here.."></textarea>
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-9">
                                    <button type="submit" id='fesend' class="btn btn-primary">Send <i class="uil uil-message me-1"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> © Shangxin - bimash.com.np
                    </div>
                   
                </div>
            </div> -->
        </footer>
</html>

<script>
    $('#footerform').on('submit', function(e) {
    e.preventDefault();
    const fname = $('#fefirname').val();
    const lname = $('#felasname').val();
    const email = $('#feemail').val();
    const mailmsg = $('#femessage').val();

    if(fname!='' & lname!='' & email!='' & mailmsg!='' ){
    $('#footermsg').html('ok 2');

    $.ajax({
    url: "Controller/save.php",
    type: "POST",
    data: new FormData(this),
    contentType: false,
    processData: false,
    success:function(response){
        var result = $.trim(response);
        if(result == 'failed'){
            $('#footermsg').html('Failed while Saving data!');
            setTimeout(() => {
                $('#footermsg').html('');
            }, 800);
        }
        if(result == 'success'){
            $('#footermsg').html('<div class="col-10"> <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert"> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Thank you - </strong>  We have recieved your message we will reply you soon!</div> </div>');
            setTimeout(() => {
                $('#footermsg').html('');
            }, 1800);
            setTimeout(() => {
                location.reload();
            }, 2000);
        }
        else{
            $('#footermsg').html(response );
        }
    }
});
}
});
</script>