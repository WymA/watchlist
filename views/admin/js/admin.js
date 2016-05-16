$(function(){

    $("#submit-admin-form").click(function(){

	$.ajax({

            type: "POST",
            url: "changeEmail",
            dataType: 'json',
	    data: $('#admin-form').serialize(),
            cache: false,
            success: function(o){
		
		$("#msg").html(o.msg) ;

	    },
	    error: function(o){

		console.log(o) ;
	    }


	});

	return false ;
    });
    
});
