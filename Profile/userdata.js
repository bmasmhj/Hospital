function greeting(){
    var greethere = document.getElementById('greeting');
   

        var d = new Date();
        var time = d.getHours();

        if (time < 12) {
            greethere.innerHTML= "Good Morning";
        }
        if (time > 12 && time < 18) {
            greethere.innerHTML= "Good Evening";
        }
        if (time > 18 ) {
            greethere.innerHTML= "Good Night";      
        }

}
greeting(); 
function appoitments(){
    $.ajax({
    url: "model/table.php",
    data: {'appoitments' : 'appoitments'},
    method : 'post',
    success: function(data){  
      $("#appoitments").html(data);   
      $("#bookingdetails").html('<div class="d-flex align-items-center"> <strong>Loading...</strong> <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div></div>');   
      $("#records").html('<div class="d-flex align-items-center"> <strong>Loading...</strong> <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div></div>');   
    
    atohere();
    }
    });
  }

  function atohere(){
  console.log('sa');
  setTimeout(() => {
    $('#descending').click();
      
  }, 100);
  setTimeout(() => {
    $('#descending').click();
      
  }, 200);
}
function bookingdetails(){
  $.ajax({
  url: "model/table.php",
  data: {'bookingdetails' : 'bookingdetails'},
  method : 'post',
  success: function(data){  
      $("#appoitments").html('<div class="d-flex align-items-center"> <strong>Loading...</strong> <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div></div>');   
      $("#bookingdetails").html(data);   
      $("#records").html('<div class="d-flex align-items-center"> <strong>Loading...</strong> <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div></div>');   
      atohere();
  
    }
  });
}

function specialities(){
    var spec_id = $('#specialitys').val();
    // alert(spec_id);
    $.ajax({
        url : 'model/specdoc.php',
        data: {'spec_id' : spec_id},
        method : 'post',
        dataType : 'text',
        success :function (response){
          $('#selectdocs').empty();
          $('#selectdocs').append(response);  
        
        }
      });
}

function ageseleeter(val){
    if( val == 100 ){
        val = val+"+";
    }
    $('#ageseleceted').html(val);
}

function recordetail(){
  $.ajax({
  url: "model/table.php",
  data: {'recordetail' : 'recordetail'},
  method : 'post',
  success: function(data){
      $("#appoitments").html('<div class="d-flex align-items-center"> <strong>Loading...</strong> <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div></div>');   
      $("#bookingdetails").html('<div class="d-flex align-items-center"> <strong>Loading...</strong> <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div></div>');    
      $("#recordetail").html(data);   
    atohere();

  }
  });
}

function deleteappoint(id){
 if(confirm("Are you sure want to delete ?")==true){
    $.ajax({
        url: "controller/delete.php",
        data: {'deleteappoint' : id },
        method : 'post',
        success: function(data){
           var results = $.trim(data);
            if(results == 'deleted'){
            document.getElementById('appoint_'+id).style.display = 'none';
            }else{
                alert("Sorry failed due to "+data);
            }
        }
        });
    }
}
function deletebook(id){
    if(confirm("Are you sure want to delete ?")==true){
        $.ajax({
            url: "controller/delete.php",
            data: {'deletebook' : id },
            method : 'post',
            success: function(data){
               var results = $.trim(data);
                if(results == 'deleted'){
                document.getElementById('booking_'+id).style.display = 'none';
                }else{
                    alert("Sorry failed due to "+data);
                }
            }
            });
        }
}

function deleterecord(id){
    if(confirm("Are you sure want to delete ?")==true){
        $.ajax({
            url: "controller/delete.php",
            data: {'deleterecord' : id },
            method : 'post',
            success: function(data){
               var results = $.trim(data);
                if(results == 'deleted'){
                document.getElementById('records_'+id).style.display = 'none';
                }else{
                    alert("Sorry failed due to "+data);
                }
            }
            });
        }
}

function cancelappoint(id){
    if(confirm("Are you sure want to Cancel ?")==true){
        $.ajax({
            url: "controller/update.php",
            data: {'cancelappoint' : id },
            method : 'post',
            success: function(data){
               var results = $.trim(data);
                if(results == 'success'){
                    appoitments();
                }else{
                    alert("Sorry failed due to "+data);
                }
            }
            });
        }
}

function viewimg(id){
    var image = document.getElementById('imagesrc_'+id).src;
    document.getElementById('medicalreportimage').innerHTML = '<img id="reportimage" src = "'+image+'"></img> <br> <a class="btn btn-success" download href="'+image+'">Download</a>';
}

function editapointment(id){
    $.ajax({
        url: "model/table.php",
        data: {'editapointment' : id },
        method : 'post',
        success: function(data){
            document.getElementById('medicalreportimage').innerHTML = data;
        }
        });
}

function editbooking(id){
    $.ajax({
        url: "model/table.php",
        data: {'editbooking' : id },
        method : 'post',
        success: function(data){
            document.getElementById('medicalreportimage').innerHTML = data;
        }
        });
}
