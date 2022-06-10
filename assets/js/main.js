window.onscroll = function() {myFunction()};

var header = document.getElementById("fixattop");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("fixed-top");
  } else {
    header.classList.remove("fixed-top");
  }
}

//mobile version search
$(document).ready(function(){
  $("#tops-search").keyup(function(){
      $.ajax({
      type: "POST",
      url: "Controller/listsearch.php",
      data:'mobkeywords='+$(this).val(),
      success: function(data){
          // $("#search-dropdown").show();
          $("#search-resultsqwe").html(data);   
          // $("#top-search").css("background","#FFF");
      }
      });
  }); 
});

// web version search
$(document).ready(function(){
	$("#top-search").keyup(function(){
		$.ajax({
		type: "POST",
		url: "Controller/listsearch.php",
		data:'keyword='+$(this).val(),
		success: function(data){
			// $("#search-dropdown").show();
			$("#search-dropdown").html(data);   
			// $("#top-search").css("background","#FFF");
		}
		});
	}); 
});

// speciality and doctors appoitnments chooser
$(document).ready(function(){
  $('#speciality').change(function(){
    var spec_id = $('#speciality').val();
    $.ajax({
      url : 'get_doc.php',
      data: {'spec_id' : spec_id},
      method : 'post',
      dataType : 'text',
      success :function (response){
        $('#selectdocs').empty();
        $('#selectdocs').append(response);
        $('#doctordetails').empty();

      }
    });
  });
  $('#selectdocs').change(function(){
    var doc_id = $('#selectdocs').val();
    $.ajax({
      url : 'get_doc.php',
      data: {'doc_id' : doc_id},
      method : 'post',
      dataType : 'text',
                success :function (response){
        // $('#doctordetails').empty();
        $('#doctordetails').html(response);
      }
    });
  });
       
});

// apppointment final submit

 $("#appointdoctor").submit(function(e){
e.preventDefault();
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;


var speciality = $('#speciality option:selected').text();
var selectdocs = $('#selectdocs option:selected').text();
var docsid = $('#selectdocs option:selected').val();
var datepicker = $('#datepicker').val();
var apreason = $('#apreason').val();
var apfullname = $('#apfullname').val();
var apaddress = $('#apaddress').val();
var apemail = $('#apemail').val();
var apnum = $('#apnum').val();
var age = $('#range_09').val();

let sex = '';
const rbs = document.querySelectorAll('input[name="gender"]');
for (const rb of rbs) {
      if (rb.checked) {
          sex = rb.value;
          break;
      }
  }


const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  function generateString(length) {
      let result = ' ';
      const charactersLength = characters.length;
      for ( let i = 0; i < length; i++ ) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
      }
      return result;
  }
  var code = generateString(5);
  var all = apfullname+apaddress+datepicker+apnum+age+sex+speciality+selectdocs+code;
  var invoice = MD5(all);

  if( datepicker!="" && apaddress != "" && apfullname  != ""  && sex != "" ){

      if(apemail.match(mailformat) || apnum.length==10 ){


          $('#alert').html('Booking health package');   

          setTimeout(() => {document.getElementById('alert').innerHTML = "Booking for "+apemail;}, 300);
          setTimeout(() => {
              jQuery.ajax({
                  url: "Controller/save.php",
                  type: "POST",
                  data: {
                      'speciality' : speciality,
                      'selectdocs' : selectdocs,
                      'datepicker' : datepicker ,                            
                      'apreason' : apreason,
                      'apfullname' : apfullname,
                      'apaddress' : apaddress,
                      'apemail' : apemail ,                            
                      'apnum' : apnum ,                            
                      'age' : age ,   
                      'sex' : sex ,    
                      'invoice' : invoice ,
                      'docsid' : docsid,   
                  },
                  success:function(data){
                      var result = $.trim(data);
                          // $('#alert').html(data);
              
                      if(result == 'fail'){
                          $('#alert').html('Failed while Saving data!');
                      }
                      if(result == 'success'){
                                  var counter = 3 ;
                          setInterval(function() {
                              counter--;
                              if (counter >= 0) {
                              $('#alert').html('Redirecting to Invoice in '+counter+' sec.');
                              }
                              if (counter === 0) {
                                  window.location.href = 'Invoice?name='+apfullname+'&address='+apaddress+'&docname='+selectdocs+'&date='+datepicker+'&email='+apemail+'&age='+age+'&sex='+sex+'&invoice='+invoice;
                                  clearInterval(counter);
                              }
              
                          }, 800);
                      }
                  else{
                      $('#alert').html(result);
          
                  }
                  }
              });

          }, 1000);
      
      }
      else{
          $('#apemail').addClass('is-invalid');
          $('#apnum').addClass('is-invalid');
      }
      } 

});

//booking submiter

$("#bookpack").submit(function(e){
  e.preventDefault();
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var pkgfullname = $('#pkgfullname').val();
  var pkgaddress = $('#pkgaddress').val();
  var datepicker = $('#datepicker').val();
  var packagecode = $('#packagecode').val();
  var pkgemail = $('#pkgemail').val();
  var pkgnum = $('#pkgnum').val();
  var age = $('#range_09').val();
  var packagename = $('#packagename').val();
  let sex = '';
  const rbs = document.querySelectorAll('input[name="gender"]');
  for (const rb of rbs) {
          if (rb.checked) {
              sex = rb.value;
              break;
          }
      }
       const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      function generateString(length) {
          let result = ' ';
          const charactersLength = characters.length;
          for ( let i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * charactersLength));
          }
          return result;
      }
      var code = generateString(5);
  var all = pkgfullname+pkgaddress+datepicker+pkgnum+age+sex+packagename+packagecode+code;

  var invoice = MD5(all);

 
  if( datepicker!="" && pkgaddress != "" && pkgfullname  != ""  && sex != "" ){
      if(pkgemail.match(mailformat) || pkgnumber.length==10 ){
          $('#alert').html('Booking health package');
          setTimeout(() => {document.getElementById('alert').innerHTML = "Booking for "+pkgemail;}, 2000);
          setTimeout(() => {
              jQuery.ajax({
                  url: "Controller/save.php",
                  type: "POST",
                  data: {
                      'pkgfullname' : pkgfullname,
                      'pkgaddress' : pkgaddress,
                      'datepicker' : datepicker ,                            
                      'packagecode' : packagecode , 
                      'packagename' : packagename ,  
                      'pkgemail' : pkgemail ,                            
                      'pkgnum' : pkgnum ,                            
                      'age' : age ,   
                      'sex' : sex ,    
                      'invoice' : invoice ,                            


                  },
                  success:function(data){
                      var result = $.trim(data);
                          // $('#alert').html(data);
              
                      if(result == 'fail'){
                          $('#alert').html('Failed while Saving data!');
                      }
                      if(result == 'success'){
                                   var counter = 3 ;
                          setInterval(function() {
                              counter--;
                              if (counter >= 0) {
                              $('#alert').html('Redirecting to Invoice in '+counter+' sec.');
                              }
                              if (counter === 0) {
                                  window.location.href = 'Invoice?name='+pkgfullname+'&address='+pkgaddress+'&date='+datepicker+'&pkgname='+packagename+'&email='+pkgemail+'&age='+age+'&sex='+sex+'&invoice='+invoice;
                                  clearInterval(counter);
                              }
              
                          }, 1000);
                      }
                  else{
                      $('#alert').html('Internal Server Error !');
                      $('#alert').html(data);

             
                  }
                  }
              });

          }, 3000);


      
      }
      else{
          $('#pkgemail').addClass('is-invalid');
          $('#pkgnum').addClass('is-invalid');
      }
      } 
});

// find doctor
$('#specialitydcotr').change(function(){
  var spec_id = $('#specialitydcotr').val();
  var namqze =  $("#specialitydcotr option:selected").text();
  $.ajax({
      url : 'get_doc.php',
      data: {'spec_doc' : spec_id},
      method : 'post',
      dataType : 'text',
      success :function (response){
          $('#doctors').html(response);
          $('#resultsdoctaz').html('Showing results for "'+namqze+'"');

      }
  });
});


function fromurl(){
    var url_string = window.location.href;
    var url = new URL(url_string);
    var namqze = url.searchParams.get("specialities");
if(namqze){
    $.ajax({
        url : 'get_doc.php',
        data: {'spec_doc_url' : namqze},
        method : 'post',
        dataType : 'text',
        success :function (response){
            $('#doctors').html(response);
            $('#resultsdoctaz').html('Showing results for "'+namqze+'"');
        }
    });   
} 
}





$('#female').click(function (){
    // alert('tab2');
    $('#tab2').addClass('active');
    $('#tab1    ').removeClass('active');

    $('#female').addClass('active');
    $('#male').removeClass('active');


});
$('#male').click(function (){
    // alert('tab2');
    $('#tab1').addClass('active');
    $('#tab2').removeClass('active');
   
    $('#male').addClass('active');
    $('#female').removeClass('active');
});


$('#contacthospital').on('submit', function(e) {
    e.preventDefault();
    const fname = $('#fname').val();
    const email = $('#email').val();
    const num = $('#num').val();
    const mailsub = $('#mailsub').val();

    const mailmsg = $('#mailmsg').val();

    if(fname!=''  & email!='' & num!='' & mailmsg!='' & mailsub!=''){
    $('#messages').html('ok 2');

    $.ajax({
    url: "Controller/save.php",
    type: "POST",
    data: new FormData(this),
    contentType: false,
    processData: false,
    success:function(response){
        var result = $.trim(response);
        if(result == 'failed'){
            $('#messages').html('Failed while Saving data!');
            setTimeout(() => {
                $('#messages').html('');
            }, 800);
        }
        if(result == 'success'){
            $('#messages').html('Message received Successfully !');
            $('#sucessresultcontact').html('<div class="col-10"> <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert"> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><strong>Thank you - </strong>  We have recieved your message we will reply you soon!</div> </div>');
            setTimeout(() => {
                location.reload();
            }, 3000);
        }
        else{
            $('#messages').html(response );
        }
    }
});
}
});




