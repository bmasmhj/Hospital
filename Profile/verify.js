
// new user
$("#newuser").submit(function(e){
    e.preventDefault();
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var fullname = $('#fullname').val();
    var regpassword = $('#regpassword').val();
    var regemail = $('#regemail').val();
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
    if( regemail!="" && regemail != "" && fullname  != "" ){
        if(regemail.match(mailformat)){
            $('#alert').html('Creating new account..');
            setTimeout(() => {document.getElementById('alert').innerHTML = "Checking duplication for "+regemail;}, 1000);
            setTimeout(() => {
                jQuery.ajax({
                    url: "controllerUserData.php",
                    type: "POST",
                    data: {
                        'fullname' : fullname,
                        'regemail' : regemail,
                        'regpassword' : regpassword ,                            
                        'code' : code ,                            

                    },
                    success:function(data){
                        var result = $.trim(data);
                            // $('#alert').html(data);
              
                        if(result =='emailerr'){
                            $('#alert').html('Failed while sending code!');
                        }
                        else if(result =='dberr'){
                            $('#alert').html("Failed while inserting data into database!");
                        }
                        else if(result =='duplicateuser'){
                            $('#alert').html("Email that you have entered is already exist!");
                        }
                        else if(result=='verify'){
                            $('#alert').html("Sending Verification !");
                        //     setTimeout(() => {
                          //         window.location.href = "Verification";}, 3000);

                        setTimeout(() => {
                                  window.location.href = "sendmail/index.php?email="+regemail+"&code="+code+"&name="+fullname+"&newacc=true";}, 0000);
                        }

                    }
            });
        }
            , 1500);
    }
}
});

$('#loginpassword').keyup(function(){
    $("#loginpassword").removeClass( "is-invalid" );
});

$('#loginemail').keyup(function(){
    $("#loginemail").removeClass( "is-invalid" );
});

// login 
$("#login").submit(function(e){
    e.preventDefault();
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/;
    var loginemail = $('#loginemail').val();
    var loginpassword = $('#loginpassword').val();
    if( loginemail!="" && loginpassword != "" ){
        if(loginemail.match(mailformat)){
            $('#alert').html('Authenticating..');
            $("#loginpassword").removeClass( "is-invalid" );
            $("#loginemail").removeClass( "is-invalid" );

            setTimeout(() => {document.getElementById('alert').innerHTML = "Verifying user";}, 500);
            setTimeout(() => {
                jQuery.ajax({
                    url: "controllerUserData.php",
                    type: "POST",
                    data: {
                        'loginemail' : loginemail,
                        'loginpassword' : loginpassword ,			
                    },
                    success:function(data){
                        var result = $.trim(data);
                        if(result =='wronguser'){
                            $('#alert').html('Incorrect password!');
                            $('#loginpassword').val('');
                            $("#loginpassword").addClass( "is-invalid" );
                        }
                        else if(result =='nouser'){
                            $('#alert').html("It's look like you're not yet a member! Click on the bottom link to signup");
                            $('#loginpassword').val('');
                            $("#loginpassword").removeClass( "is-invalid" );
                            $("#loginemail").addClass( "is-invalid" );
                        }
                        else if(result=='verify'){
                            $('#alert').html("Unverified Account !");
                            setTimeout(() => {
                                  window.location.href = "Verification";}, 600);
                        }
                        else if(result=='success'){
                            $('#alert').html("Logging in ");
                            setTimeout(() => {
                                  window.location.href = "../Profile";}, 700);
                        }

                        else{
                            $('#alert').html(data);

                        }
                    }
            });
        }
            , 1500);
    }else{
        $('#alert').html("Please insert valid email");
        $("#loginemail").addClass( "is-invalid" );
    }
}else{
    $('#alert').html("Please Fill all form");
    $("#loginpassword").addClass( "is-invalid" );
    $("#loginemail").addClass( "is-invalid" );
}
});



// forget password 
$("#forgetpw").submit(function(e){
    e.preventDefault();
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var resetemail = $('#resetemail').val();
  
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
    if( resetemail!="" ){
        if(resetemail.match(mailformat)){
            setTimeout(() => {document.getElementById('alert').innerHTML = "Checking email "+resetemail;}, 1000);
            setTimeout(() => {
                jQuery.ajax({
                    url: "controllerUserData.php",
                    type: "POST",
                    data: {
                        'resetemail' : resetemail,                      
                        'code' : code ,                            

                    },
                    success:function(data){
                        var result = $.trim(data);
                            // $('#alert').html(data);
            
                        if(result =='emailfail'){
                            $('#alert').html('Failed while sending code!');
                        }
                        else if(result =='dberror'){
                            $('#alert').html("Something went wrong !");
                        }
                        else if(result =='noemail'){
                            $('#alert').html("The email address does not exist");
                        }
                        else if(result=='verify'){
                            $('#alert').html("Sending Verification Link !");
                            window.location.href = "sendmail/index.php?email="+resetemail+"&code="+code+"&name=User&reset=true";
                        }
                        else{
                            $('#alert').html(data);
                        }

                        $('#regpassword').val('');
                        $('#regemail').val('');

                    }
            });
        }
            , 1500);
    }
}
});






// new password
$("#newpasswordacc").submit(function(e){
    e.preventDefault();
   
    var cofirmpassword = $('#cofirmpassword').val();
    var newpassword = $('#newpassword').val();

    if( newpassword!="" && cofirmpassword != "" ){
        
        $('#alert').html('Checking password..');
        setTimeout(() => {
                        
        if(cofirmpassword==newpassword){
            jQuery.ajax({
                    url: "controllerUserData.php",
                    type: "POST",
                    data: {
                        'newpassword' : newpassword,		
                    },
                    success:function(data){
                        var result = $.trim(data);
                        if(result =='dberr'){
                            $('#alert').html('Failed to change password !');
                            $('#newpassword').val('');
                            $("#newpassword").removeClass( "is-invalid" );
                        }
                        else if(result=='success'){
                            $('#alert').html("Your password changed. Now you can login with your new password.");
                            setTimeout(() => {
                                  window.location.href = "PasswordChanged";}, 0000);
                        }
                        else{
                            $('#alert').html("Internal error please contact admin");

                        }   
                    }
            });
            }
        else{
                $('#alert').html('Password did not match !');
            }
        

          }, 3000);

    }
    }
);

