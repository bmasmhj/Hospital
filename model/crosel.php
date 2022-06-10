<div class="row">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
        <div class="carousel-inner">
            <?php foreach($carouseldata as $key => $carouselvals){   ?>
            <div class="carousel-item <?php if($key == 0){ echo 'active';}?>">
                <img class="d-block img-fluid image-head" src="assets/images/uploads/crosel/<?php echo $carouselvals['image']?>" alt="<?php echo $carouselvals['name']; ?>">
                <div class="carousel-caption caption-head d-none d-md-block">
                    <span><?php echo $carouselvals['name']; ?>
                    </span>
                </div>
            </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</div>