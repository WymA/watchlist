$(function(){

	function validateUsername( username ){

	    var msg = [] ;

	    if (username.length < 3) {

		msg[0] = false ;
		msg[1] = "Your username must be at least 3 characters";

	    }else{

		msg[0] = true ;
		msg[1] = "correct";
	    }
	    

	    return msg;

	};

	function validatePassword(p) {

	    var msg = [] ;

	    if (p.length < 8) {

		msg[0] = false ;
		msg[1] = "Your password must be at least 8 characters";
	    }else if (p.search(/[a-z]/i) < 0) {

		msg[0] = false ;
		msg[1] = "Your password must contain at least one letter."; 
	    }else if (p.search(/[0-9]/) < 0) {

		msg[0] = false ;
		msg[1] = "Your password must contain at least one digit."; 
	    }else{

		msg[0] = true ;
		msg[1] = "correct";
	    }
	    

	    return msg;
	};

	function validateEmail( email )  
	{  

	    var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	    var msg = new array() ;

	    if( reg.test(email) )  {  

		msg[0] = true ;
		msg[1] = "correct" ;

	    }  else   {  

		msg[0] = false ;
		msg[1] = "You have entered an invalid email address!" ;
	    }  
	    return msg ;
	};  






    $("#login").click(function(){



	var username = $.trim($("#username").val());
	var password = $.trim($("#password").val());

	$.ajax({

	    type: "POST",
	    url: "login/run",
	    data: $('form[name="loginForm"]').serialize(),
	    dataType: 'json',
	    cache: false,
	    beforeSend: function(){ 

		$("#login").attr('data-i18n', 'button.connecting');

	    },
	    success: function(data){


		if(data.status == true ){

		    window.location.replace(data.url);

		}else{
		    
		    $("#login").attr('data-i18n', 'button.sign-in');
		    $("#error").html('<span style="color:#cc0000">'+data.msg+'</span>');
		    $("#login-msg").html('<span style="color:#cc0000">'+data.msg+'</span>') ;
		}
	    },
	    error: function(o){
		
		console.log(o) ;
	    }

	});

	return false;

    });
    


    $("#register").click(function(){


	var username = $.trim( $("#reg-username").val() ) ;
	var password = $.trim( $("#reg-password").val() ) ;
	var repass = $.trim( $("#re-password").val() ) ;


	var vUsername = validateUsername(username);
	var vPassword = validatePassword(password);

	if ( false == vUsername[0] ){

	    $("#reg-error").html('<span style="color:#cc0000">'+vUsername[1]+'</span>');
	    return false ;

	}else if ( false == vPassword[0] ){

	    $("#reg-error").html('<span style="color:#cc0000">'+vPassword[1]+'</span>');
	    return false ;
	}

	
	var occupation = $("#occupation").val() ;
	if ( occupation == "" ){

	    $("#reg-error").html('<span style="color:#cc0000">You have to choose an occupation</span>');	    
	    return false ;
	}

	//alert ( $('form[name="registerForm"]').serialize() ) ;
	

	if( password == repass ){

	    $.ajax({

		type: "POST",
		url: "login/register",
		data: $('form[name="registerForm"]').serialize(),
		dataType: 'json',
		cache: false,
		beforeSend: function(){ $("#register").val('Connecting...');},
		success: function(data){

		    if(data.status == true ){


			$("#reg-error").html('<span style="color:#cc0000">'+data.msg+'</span>');
			$("#login-msg").html('<span style="color:#cc0000">'+data.msg+'</span>') ;
			$("#register").fadeOut() ;

		    }else{
			
			$("#register").val('Sign Up')
			$("#reg-error").html('<span style="color:#cc0000">'+data.msg+'</span>');
			$("#login-msg").html('<span style="color:#cc0000">'+data.msg+'</span>') ;
		    }
		},
		error: function(data){

		    $("#register").val('Sign Up') ;
		    $("#cancel").trigger("click") ;
		}

	    });

	}else{
	    
	    $("#reg-error").html('<span style="color:#cc0000">Two input passwords are not the same</span>');
	}
	return false;
    });



    $("#forgetSubmit").click(function(){

	$.ajax({

	    type: "POST",
	    url: "login/forgetPassword",
	    data: $('form[name="forgetForm"]').serialize(),
	    dataType: 'json',
	    cache: false,
	    beforeSend: function(){ 
	    },
	    success: function(o){
		
		$("#forget-error").html(o.msg) ;
		$("#login-msg").html('<span style="color:#cc0000">'+o.msg+'</span>') ;

	    },
	    error: function(o){
		
		console.log(o) ;
	    }
	    

	    
	});

	return false ;
    });

    
    
}) ;
