<?php

require 'header.php';

if(!empty($_GET['service'])){
if ($healthresult->num_rows > 0) {

    ?>    

<section>
    <div class="container">
        <div class="title">
            <h2 class="text-center"><?php echo $healthname?> - Health Package</h2>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end mb-3">
                    <a href="Book?package=<?php echo $codeid?>" class="btn btn-danger"> Book Health Package</a>
                </div>
                <div class="card ">
                    <div class="card-body">
                        <?php echo $servicedetailsqze ?>
                    </div>
                </div>
                </a>
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