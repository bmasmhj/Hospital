<?php require 'header.php'; ?>                 

<section>
    <div class="container">
        <div class="title">
            <h2 class="text-center">Center of Specialities</h2>
        </div>
        <div class="row mt-4 pt-4">
            <?php  foreach($specialitydata as $key => $specname){ ?>
            <div class="col-md-3">
                <form action="FindDoctor" method="post">
                <button type="submit" name="spciality" value="<?php echo $specname['id']?>" class="card w-100 specializecard" >
                    <div class="card-body w-100 text-center">
                        <img src="assets/images/uploads/speciality/<?php echo $specname['image']?>" alt="" class="rounded-circle" style="width: 150px; height: 150px;">
                    </div>
                    <div class="card-body w-100 "><p class="text-center"><?php echo $specname['name']?></p></div>
                </button>
            </form>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<section>
<?php require 'model/bodystructure.php' ?>    

</section>


<?php require 'footer.php' ?>                 
