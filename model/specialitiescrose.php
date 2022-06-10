<section class="carousel_se_03">
    <div class="container-fluid px-0 py-5">
        <div class="container ">
            <div class="row">
            
                <div class="col-md-12 px-0 ">
                    <div class="col-sm-12 text-center title">
                        <h2>Center of SPECIALITIES</h2>
                    </div>

                    <div class="col-md-12 px-0 p-t-30 ">
                    <div class="owl-carousel carousel_se_03_carousel owl-theme">
                            <!--1 -->
                            <?php 
                            foreach($specialitydata as $key => $specname){ ?>
                            <div class="item">
                                <div class="col-md-12 wow fadeInUp ">
                                    <div class="main_services text-center">
                                        <a href="#">
                                        <div class="round_icon_img" > 
                                            <img class="w-100" src="assets/images/uploads/speciality/<?php echo $specname['image'] ?>">
                                        </div>
                                        <p class="mt-3"> <?php echo $specname['name'];?> </p>
                                        
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php }  ?>
                            </div>
                        </div>
                </div>

                <div class="col-md-12 px-0 p-t-30 text-center pt-4">
                    <a href="Specialities" class="btn btn-primary">See all</a>
                </div>

            </div>
        </div>
    </div>
</section> 