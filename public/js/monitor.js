$(function(){


    var path = window.location.protocol+"//"+window.location.host+"/watchlist" ;

    setInterval( function(){

	$.ajax({

	    type: "GET",
	    url: path+ "/monitor/getMessage",
	    dataType: 'json',
	    cache: false,
	    beforeSend: function(){ 

	    },
	    success: function(o){

		console.log(o) ;

		if ( o.status ){
		    
		    $('#update-msg').modal('show') ;		    
		    $("#modal-msg").append( '<p><a href="../monitor/index">Please click here to check.</a></p>') ;
		}
	    },
	    error: function(o){

		console.log(o) ;
	    }

	    
	});
    }, 3000) ;

    $('#update-msg').on('show.bs.modal', function(e) {

    	$("#modal-msg").html( "<p>New Suspects Detected.</p>") ;
	document.getElementById('alert-sound').play();
	
    });

    $('#update-modal-close').click(function(e){

	document.getElementById('alert-sound').pause();
    });

});
