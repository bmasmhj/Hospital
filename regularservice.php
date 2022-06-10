<?php require 'header.php';
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 mb-2 mb-sm-0">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php foreach($regservicedata as $key => $rgsvalue) {
                        $n = $key ; ?>
                    <a class="nav-link <?php if($n == 0){echo "active show"; } ?>" id="<?php echo $rgsvalue['codeid'] ?>-tab" data-bs-toggle="pill" href="#<?php echo $rgsvalue['codeid'] ?>" role="tab" aria-controls="<?php echo $rgsvalue['codeid'] ?>"
                        aria-selected="true">
                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                        <span class="d-none d-md-block"><?php echo $rgsvalue['name']?></span>
                    </a>
                    <?php } ?>
                </div>
            </div> 
        
            <div class="col-sm-9">
                <div class="tab-content" id="v-pills-tabContent">
                <?php foreach($regservicedata as $key => $rgssvalue) { $q = $key; ?>
                    <div class="tab-pane fade <?php if($q==0){echo "active show";} ?>" id="<?php echo $rgssvalue['codeid'] ?>" role="tabpanel" aria-labelledby="<?php echo $rgssvalue['codeid'] ?>-tab">
                        <p class="mb-0"><?php echo $rgssvalue['details']?></p>
                    </div>
                   <?php } ?>
                </div> 
            </div>
        </div>
    </div>
</section>


<?php require 'footer.php' ?>
        