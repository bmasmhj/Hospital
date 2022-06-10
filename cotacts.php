<?php require 'header.php' ?>
            <section>
                <div class="container">
                    <div class="title">
                        <h2 class="text-center">Contact us</h2>
                    </div>
                    <div class="card">
                       <div class="row">
                           <div class="col-md-6 ">
                                <div class="card-body">
                                    <div class="mapouter">
                                        <div class="gmap_canvas">
                                            <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Simako%20Bus%20Stop,%20Lalitpur%2044700&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <div class="col-md-6 order-first">
                               <div class="card-body">
                                <form class="form-horizontal needs-validation" id="contacthospital" novalidate >
                                    <span id="messages"></span>
                                    <div class="row">
                                        <label for="inputEmail3" class=" col-form-label">Full Name</label>
                                        <div class="col-10">
                                            <input required value="<?php echo $name?>" type="text" class="form-control " name="fname" id="fname" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="inputEmail3" class="col-form-label">Email</label>
                                        <div class="col-10">
                                            <input required type="email" class="form-control" name="email" id="email" placeholder="youremail@email.com" value="<?php echo $email?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="inputEmail3" class="col-form-label">Phone Number</label>
                                        <div class="col-10">
                                            <input required type="text" class="form-control" name="num" id="num" required data-toggle="input-mask" value="<?php echo $num?>" placeholder="98XXXXXXXX" data-mask-format="0000000000">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword5" class="col-form-label">Subject</label>
                                        <div class="col-10">
                                            <input required type="mailsub" class="form-control" name="mailsub" id="mailsub" placeholder="Subject">

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="mailmsg" class="col-form-label">Meesage</label>
                                        <div class="col-10">
                                            <textarea class="form-control " required rows='10' name="mailmsgdeqa" id="mailmsg" placeholder="Type your message here.."></textarea>
                                        </div>
                                    </div>
                                    <div class="row" id="sucessresultcontact">
                                        
                                    </div>
                                    <div class="justify-content-end row">
                                        <div class="col-9">
                                            <button type="submit" name="submitedmailmsgqw" class="btn btn-primary">Send <i class="uil uil-message me-1"></i> </button>
                                        </div>
                                    </div>
                                    
                                </form>
                               </div>
                           </div>
                       </div>
                    </div>
                    </div>
            </section>

<?php require 'footer.php' ?>

<script>
   
</script>