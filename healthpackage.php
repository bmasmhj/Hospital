<?php require 'header.php';
?>
            <section>
                <div class="container">
                    <div class="title">
                        <h2 class="text-center">Health Package Services</h2>
                    </div>
                    <div class="row">
                    <?php  foreach($healthdata as $key => $specname){ ?>
                        <div class="col-md-3">
                            <a href="Package?service=<?php echo $specname['codeid'] ?>">
                            <div class="card specializecard">
                                <div class="card-body bg-info text-center">
                                        <img  src="assets/images/uploads/health/<?php echo $specname['image'] ?>" alt="" style="width : 90px; height:90px; object-fit : contain">
                                        <h4 class='text-white' ><?php echo $specname['name'] ?></h4>
                                </div>
                            </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
<?php require 'footer.php'?>
