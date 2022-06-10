<?php require 'header.php' ?>


<section>
    <div class="title">
        <h2 class="text-center">Our Doctors</h2>
        <div class="container">
        <?php if(!empty($_GET['tors'])){
            $code = $_GET['tors'];
            if(chkcode($code)!=false){
                $codes = $_GET['tors'];
            }else{
                ?>  <script> window.location.href = "TermsAndCondition"; </script> <?php
            }
          
            $docviewsql = "SELECT  s.name as speciality,  d.*
            FROM doctor d
            JOIN speciality s
            ON d.specialityid = s.id
            WHERE doccode = '$codes'
            ";
                $docviewresult = $con->query($docviewsql);
                $docviewdata = [];
                if ($docviewresult->num_rows > 0) {
                    while ($docviewrow = $docviewresult->fetch_assoc()) {
                        $doczday = strtoupper($docviewrow['scheduledaystart'].' to '.$docviewrow['scheduledaayend']);
                        $timea =  date('h:i A', strtotime($docviewrow['scheduletimestart']));
                        $timeb =  date('h:i A', strtotime($docviewrow['scheduletimeend']));
                        $docztime = $timea.' - '.$timeb;
                        // echo $codes;

            ?>
        <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class  ="card-body text-center">
                            <img class="rounded-circle m-2" src="assets/images/uploads/doctors/<?php echo $docviewrow['image'] ?>" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                            <h3><?php echo $docviewrow['name'] ?></h2>
                            <span><?php echo $docviewrow['speciality'] ?></span>
                        </div>
                        <div class="card-body">
                            <h3 class="text-primary">OPD Scheule</h3>
                            <hr>
                            <h5><?php echo $doczday ?></h5>
                            <h5><?php echo $docztime ?></h5>
                        </div>
                        <div class="card-body text-center">
                            <form action='Appointment' method='post'>
                                <button value='<?php echo $code ?>' type='submit' name='with'  class="btn btn-danger">Book Appointment</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-primary pt-3">Professional Journey</h3>
                            <h5 class="text-danger pt-3">WORK EXPERIENCE</h5>
                            <hr>
                            <ul class="doc-list">
                               <?php 
                               $docid = $docviewrow['id'];
                               $educationsql = "SELECT  * FROM education WHERE docid = '$docid' ORDER BY rand()  ";
                               $educationresult = $con->query($educationsql);
                               $educationdata = [];
                               if ($educationresult->num_rows > 0) {
                                 while ($educationrow = $educationresult->fetch_assoc()) {
                                   $edu = $educationrow['description'];
                                     echo "<li>".$edu."</li>";
                                 }
                             }	

                               ?>
                            </ul>
                            <h5 class="text-danger pt-3">EDUCATION &amp; TRAINING</h5>
                            <hr>
                            <ul class="doc-list">
                                <?php  $workexperiencesql = "SELECT  * FROM workexperiene WHERE docid = $docid ORDER BY rand()  ";
                                        $workexperienceresult = $con->query($workexperiencesql);
                                        $workexperiencedata = [];
                                        if ($workexperienceresult ->num_rows > 0) {
                                            while ($workexperiencerow = $workexperienceresult->fetch_assoc()) {
                                            $wrk = $workexperiencerow['description'];
                                                echo "<li>".$wrk."</li>";
                                            }
                                        }	 ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
     <?php   } } else{ ?>
                <section class="row g-0 justify-content-center">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <img src="assets/images/file-searching.svg" height="90" alt="File not found Image">
        
                            <h1 class="text-error mt-4">OPPS !</h1>
                            <h4 class="text-uppercase text-danger mt-3">No result Found</h4>
                            <p class="text-muted mt-3">Sorry ! We did not find any doctor related to your query.</p>
                        </div> 
                    </div> 
                </section> 
                <?php } 
            }
            else { ?>  <script> window.location.href = "FindDoctor"; </script> <?php
            }
             ?>       
        </section>
<?php require 'footer.php'?>