<?php require 'header.php';?>
        <section>
            <div class="title">
                <h2 class="text-center">Our Doctors</h2>
                <div class="container">
                    <form>
                        <div class="mb-3 row  justify-content-center " >
                            <div class="col-6">
                            <select class="form-select" required name="speciality" id="specialitydcotr">
                                        <option selected disabled> Choose Speciality</option>
                                        <?php 
                                        foreach($specialitydata as $key => $department){      
                                        ?>
                                        <option value="<?php echo $department['id']?>"><?php echo $department['name']?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                        </div>

                    </form>
                    <?php
                    if(isset($_POST['searchingdoctor'])){                      
                        ?>
                            <h5 id='resultsdoctaz' >Showing results for "<?php echo $_POST['searchingdoctor']?>"</h5>

                        <div class="row mt-5" id='doctors'>
                        <?php  
                         if ($docszresult->num_rows > 0) {   	
                            foreach($docszdata as $key => $docname){ ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img src="assets/images/uploads/doctors/<?php echo $docname['image']?>" alt="" style='width : 180px; height:180px; object-fit : cover;'>
                                        <h3> <?php echo $docname['name'] ?> </h3>
                                        <span><?php echo $docname['speciality']?></span>
                                        <br>
                                        <div class="" >
                                            <a href="Doc?tors=<?php echo $docname['doccode']?>" class="doc-btns btn-primary">View Profile </a>
                                            <form action='Appointment' method='post' class="p-0 m-0">
                                                <button value='<?php echo $docname["doccode"] ?>' type='submit' name='with' stylle="box-sizing: none!important"  class="doc-btns btn btn-danger" >Book Appointment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } }else {
                                echo ' <section class="row g-0 justify-content-center">
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <img src="assets/images/file-searching.svg" height="90" alt="File not found Image">
                            
                                                <h1 class="text-error mt-4">OPPS !</h1>
                                                <h4 class="text-uppercase text-danger mt-3">No result Found</h4>
                                                <p class="text-muted mt-3">Sorry ! We did not find any doctor related to your query.</p>
                                            </div> 
                                        </div> 
                                    </section> ';     
                                } ?> 
                        </div>
                        <?php                        
                    }
                    else if(isset($_POST['spciality'])){
                        ?>
                        <h5 id='resultsdoctaz' >Showing results for "<?php echo $sepcialityqwx?>"</h5>

                    <div class="row mt-5" id='doctors'>
                    <?php  
                     if ($docszqwresult->num_rows > 0) {   	
                        foreach($docszqwdata as $key => $docname){ ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="assets/images/uploads/doctors/<?php echo $docname['image']?>" alt="" style='width : 180px; height:180px; object-fit : cover;'>
                                    <h3> <?php echo $docname['name'] ?> </h3>
                                    <span><?php echo $docname['speciality']?></span>
                                    <br>
                                    <div class="" >
                                        <a href="Doc?tors=<?php echo $docname['doccode']?>" class="doc-btns btn-primary">View Profile </a>
                                        <form action='Appointment' method='post' class="p-0 m-0">
                                            <button value='<?php echo $docname["doccode"] ?>' type='submit' name='with' stylle="box-sizing: none!important"  class="doc-btns btn btn-danger" >Book Appointment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } }else {
                            echo ' <section class="row g-0 justify-content-center">
                                    <div class="col-lg-4">
                                        <div class="text-center">
                                            <img src="assets/images/file-searching.svg" height="90" alt="File not found Image">
                        
                                            <h1 class="text-error mt-4">OPPS !</h1>
                                            <h4 class="text-uppercase text-danger mt-3">No result Found</h4>
                                            <p class="text-muted mt-3">Sorry ! We did not find any doctor related to your query.</p>
                                        </div> 
                                    </div> 
                                </section> ';     
                            } ?> 
                    </div>
                    <?php                        
     
                    }
                    
                    else{
                    ?>
                        <h5 id='resultsdoctaz' ></h5>

                    <div class="row mt-5" id='doctors'>
                    <?php  foreach($doctordata as $key => $docname){ ?>
          
                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="assets/images/uploads/doctors/<?php echo $docname['image']?>" alt="" style='width : 180px; height:180px; object-fit : cover;'>
                                <h3> <?php echo $docname['name'] ?> </h3>
                                <span><?php echo $docname['speciality']?></span>
                                <br>
                                    <div class="" >
                                        <a href="Doc?tors=<?php echo $docname['doccode']?>" class="doc-btns btn-primary">View Profile </a>
                                        <form action='Appointment' method='post' class="p-0 m-0">
                                            <button value='<?php echo $docname["doccode"] ?>' type='submit' name='with' stylle="box-sizing: none!important"  class="doc-btns btn btn-danger" >Book Appointment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?> 
                    </div>
                    <?php } ?>

                </div>

       
                <!--     -->
        </section>
<?php require 'footer.php' ?>
<script>
fromurl();
</script>