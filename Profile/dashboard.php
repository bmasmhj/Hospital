<?php require 'header.php' ?>
<body >
     
<?php require 'menu.php' ?>

    <div class="container mt-5">
        <div class="p-5"></div>
     <h2><span id="greeting">Hello</span>, <?php echo $tname?></h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                    <div class="avatar-upload ">
                    <form action="controller/update.php" method="POST" enctype="multipart/form-data">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" name="photo" />
                        <input type='hidden' name="img" value="<?php echo $image;?>" />
                        <input type='hidden' name="id" value="<?php echo $image;?>" />

                        <label for="imageUpload" class=" "><i class="mdi mdi-pencil editpen" ></i></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url(../assets/images/uploads/users/<?php echo $image;?>);">
                        </div>
                    </div>
                    <input type="submit" name="docbtnpp" id="docbtnpp" class="btn btn-success d-none btn-rounded mt-2" value="Update">
                </form>
                </div>
                    </div>
                    <div class="card-body text-center">
                           <h4><?php echo $tname?></h4>
                           <h5 class="text-muted">"<?php echo $email?>"</h5>
                           <h5 class="text-muted"><?php echo $address?></h5>
                           <h5 class="text-muted"><?php echo $phone?></h5>
                           <h5 class="text-muted">DOB : <?php echo $age ?></h5>

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <form action="controller/update.php" method="post" class="needs-validation" novalidate>
                            <label for="">Name</label>
                            <input type="text" name="name" required class="form-control mb-3" value="<?php echo $tname?>">
                            <label for="">email</label>
                            <input type="text" required disabled class="form-control mb-3" value="<?php echo $email?>">
                            <label for="">Address</label>
                            <input type="text" name="address" required class="form-control mb-3" value="<?php echo $address?>">
                            <label for="">Phone</label>
                            <input type="text" name="phone" required class="form-control mb-3" value="<?php echo $phone?>">

                            <label for="">Date of Birth</label>
                            <input type="date" name="date" required class="form-control mb-3" value="<?php echo $age?>">
                            <button class="btn btn-success" name="updateprofile" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



   
</body>
<?php require 'footer.php' ?>

<script>

$('#imageUpload').change(function(){
    var image = document.getElementById('imageUpload').files;     
    var url = URL.createObjectURL(image[0]);
    $('#docbtnpp').removeClass('d-none');

    document.getElementById('imagePreview').style.backgroundImage = "url("+url+")";
});

</script>