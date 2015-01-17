function validateUsername( username ){

    var msg = new array() ;

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

    var msg = new array() ;

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


