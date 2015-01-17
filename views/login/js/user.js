$(function(){

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

		$("#login").val('Connecting...');

		// var vUsername = validateUsername(username);
		// var vPassword = validatePassword(password);

		// if ( false == vUsername[0] ){

		//     $("#error").html('<span style="color:#cc0000">'+vUsername[1]+'</span>');
		//     return false ;

		// }else if ( false == vPassword[0] ){

		//     $("#error").html('<span style="color:#cc0000">'+vPassword[1]+'</span>');
		//     return false ;
		// }
	    },
	    success: function(data){


		if(data.status == true ){

		    window.location.replace(data.url);

		}else{
		    
		    $("#login").val('Sign in')
		    $("#error").html('<span style="color:#cc0000">'+data.msg+'</span>');
		}
	    },
	    error: function(o){

	    }

	});

	return false;

    });
    


    $("#register").click(function(){


	var password=$("#reg-password").val();
	var repass=$("#re-password").val();
	
	var occupation = $("#occupation").val() ;
	if ( occupation == "" ){

	    $("#reg-error").html('<span style="color:#cc0000">You have to choose an occupation</span>');	    
	    return false ;
	}
	

	if( $.trim(password) == $.trim(repass) ){

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
			$("#register").fadeOut() ;

		    }else{
			
			$("#register").val('Sign Up')
			$("#reg-error").html('<span style="color:#cc0000">'+data.msg+'</span>');
		    }
		},
		error: function(data){
		    $("#register").val('Sign Up') ;
		    $("#cancel").trigger("click") ;
		}

	    });

	}else{
	    
	    $("#reg-error").html('<span style="color:#cc0000">Not the same</span>');
	}
	return false;
    });
    


}) ;
