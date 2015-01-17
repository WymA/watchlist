$(function(){


    ///
    /// Handle Server-side Events
    ///
    if(typeof(EventSource) !== "undefined") {

	var source = new EventSource("./update");
	source.onmessage = function(event) {

            $("#result").append( event.data + "<br>") ;

	    $("#update-msg").modal("show");
	}
    } else {

	$("#result").html( "Sorry, your browser needs to update to support this feature." ); 
    }

    $('#update-msg').on('show.bs.modal', function(e) {

	$("#modal-msg").append( "<p>"+event.data+"</p>") ;
    });

    setTimeout(function(){
	$('#update-msg').modal('hide')
    }, 5000);



});
