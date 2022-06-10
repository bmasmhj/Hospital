
<?php require 'header.php' ?>
<?php 
// echo '<pre>';
// print_r($_GET);

if(isset($_GET['invoice'])){
    $name = $_GET['name'];
    $address = $_GET['address'];
    $date = $_GET['date'];
    $email = $_GET['email'];
    $age = $_GET['age'];
    $sex = $_GET['sex'];
    $invoice = $_GET['invoice'];

    if(isset($_GET['docname'])){
        $datetype = "Appointment Date";
        $type = "Doctor Name";
        $typeval = $_GET['docname'];
        $file = 'appointment_'.$typeval;

    }
    if(isset($_GET['pkgname'])){
        $datetype = "Booking Date";
        $type  = "Packagae Name";
        $typeval = $_GET['pkgname'];  
        $file = 'booking_'.$typeval;


    }

    $filename = $name.'_'.$file.'.png';

}
?>  
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-8 col-lg-8">
                <div class="card">
                    <div id="saveit">
                    <div class="card-header text-center text-white bg-primary">
                            <h3><?php echo $websitename?></h3>
                            <span><?php echo "Contact : ".$websitecontactnum.", ".$websitecontact2."<br> Email : ".$websiteemail?></span>
                    </div>
                    <div class="card-body" id='saveit'>
                    <table class="table  mb-0">
                                <tr>
                                    <th colspan="2" > Invoice : <?php echo $invoice?> </th>
                                </tr>
                                <tr>
                                    <td>Name  </td>
                                    <td><?php echo $name?></td>
                                </tr> 
                                <tr>
                                    <td>Email  </td>
                                    <td><?php echo $email?></td>
                                </tr> 
                                <tr>
                                    <td>Address </td>
                                    <td><?php echo $address?></td>
                                </tr> 
                                <tr>
                                    <td>Age  </td>
                                    <td><?php echo $age?></td>
                                </tr> 
                                <tr>
                                    <td>Sex : </td>
                                    <td><?php echo $sex?></td>
                                </tr> 
                                <tr>
                                    <td><?php echo $datetype?></td>
                                    <td><?php echo $date?></td>
                                </tr> 
                                <tr>
                                    <td><?php echo $type?></td>
                                    <td><?php echo $typeval?></td>
                                </tr> 
                               

                            </table>      
                                
                    </div> 
                           
                    </div>
                    <div class="card-body text-center">
                         <button class="btn btn-danger" id='save_booking_detail'>Download </button>

                    </div>
                </div>
                
            </div> 
        </div>
    </div>
 </div>

<?php require 'footer.php'?>
<script src="assets/js/html2canvas.min.js"></script>
<script> 
$(document).ready(function () {

    var filenames = "<?php echo $filename?>";

$("#save_booking_detail").on('click', function () {
    html2canvas(document.getElementById("saveit"),
        {
            allowTaint: true,
            useCORS: true
        }).then(function (canvas) {
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);
            anchorTag.download = filenames;
            anchorTag.href = canvas.toDataURL();
            anchorTag.target = '_blank';
            anchorTag.click();
        });
});

setTimeout(() => {
document.getElementById('save_booking_detail').click();
    
}, 1000);

});
</script>
