$(function(){

    var profileData = new Array();

    var tableData = new Array() ;

    var tmpFirstname, tmpLastname ;
    var lastID = null ;

    ///
    /// for the search results
    ///
    var tableHandler = function(o) {

	if (o.length == 0){

	    $( "#suspect-next" ).trigger( "click" );
	    return false ;
	}
	tableData = o ;
	
	$("#tbody").empty();
        for (var i = 0; i < o.length; i++) {

	    $('#tbody').append('<tr">'+
			       '<td>'+ o[i].firstName +'</td>'+
			       '<td>'+ o[i].lastName +'</td>'+
			       '<td>'+ o[i].gender +'</td>'+
			       '<td>'+ o[i].age +'</td>'+
			       '<td><input type="checkbox" id="check-box" class="check-box" value='+i+' />Add Pictures</td>'+
			       '</tr>') ;
        }
	$("#suspect-table").show();

	$(".check-box").change(function() {

	    if(this.checked) {

		$("#suspect-next").hide() ;
		$("#confirm-add").show() ;
		lastID = tableData[$(this).val()].id ;

	    }else{
		$("#suspect-next").show() ;
		$("#confirm-add").hide() ;
	    }
	});
    };

    $("#confirm-add").on("click", function(){

	$.post("getProfile",
	       { id: lastID },
	       function(o){

		   tmpFirstname = o[0].firstName;
		   tmpLastname = o[0].lastName;

		   console.log(o) ;
	       },
	       'json');

	$("#suspect-table").hide() ;
	$("#upload-box").show() ;
    });

    ///
    /// profile handling
    ///
    $("#profile-next").on("click", function(){

	$("#profile-box").hide() ;

	$.post("../dashboard/search", 
	       $("#profile-form").serialize(), 
	       tableHandler, "json");	

	// Store the data for the rest operation
	profileData = $("#profile-form").serializeArray();

	return false ;
    });


    ////
    /// Confirm to create new suspect
    ///
    $("#suspect-next").on("click", function(){
	
	$("#suspect-table").hide() ;
	$("#confirm-box").show();

	$('#tbody-profile').html('<tr><td>'+ profileData[0].value +'</td>'+
				 '<td>'+ profileData[1].value +'</td>'+
				 '<td>'+ profileData[3].value +'</td>'+
				 '<td>'+ profileData[2].value +'</td>'+
				 '</tr><tr><td colspan="2"><b>Description:</b></td>'+
				 '<td colspan="3">'+profileData[4].value+'</td></tr>') ;
	
	return false ;

    });

    $("#suspect-prev").on("click", function(){
	
	$("#profile-box").show() ;
	$("#suspect-table").hide() ;
	return false ;
    });

    $("#upload-prev").on("click", function(){

	$("#confirm-box").hide() ;
	$("#profile-box").show() ;
	return false;
    });

    $("#profile-confirm").on("click", function(){

	var options = { 
	    type: 'post',
	    target: '#message',
	    dataType: 'json',
	    beforeSubmit:  function(){
		$("#profile-confirm").val("Creating....");
		$("#upload-prev").hide();
	    }, 
	    success:       function( o ){

		lastID = o.id ;

	    	tmpFirstname = profileData[0].value,
	    	tmpLastname = profileData[1].value,

		$("#confirm-box").hide() ;
		$("#upload-box").show() ;
	    },
	    error: function(out){

	    },
	    resetForm: true,
	    data: {
	    	firstname: profileData[0].value,
	    	lastname: profileData[1].value,
	    	age: profileData[2].value,
	    	gender: profileData[3].value,
	    	description: profileData[4].value
	    }
	}; 


	$("#confirm-form").ajaxSubmit(options);  			

	return false; 
    });


    ///
    /// upload javascript
    ///
    $('#MyUploadForm').submit(function() { 

	var options = { 
	    type: 'post',
	    target:   '#output',   // target element(s) to be updated with server response 
	    beforeSubmit:  beforeSubmit,  // pre-submit callback 
	    success:       afterSuccess,  // post-submit callback 
	    uploadProgress: OnProgress, //upload progress callback 
	    error: function(out){
		console.log(out) ;
	    },
	    resetForm: true,        // reset the form after successful submit 
	    data: {
		id: lastID,
	    	firstname: tmpFirstname,
	    	lastname: tmpLastname
	    }
	}; 


	$(this).ajaxSubmit(options);  			
	// always return false to prevent standard browser submit and page navigation 
	return false; 
    }); 
    

    //function after succesful file upload (when server response)
    function afterSuccess( out ) {

	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	$('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar
    }

    //function to check file size before uploading.
    function beforeSubmit(){

	//check whether browser fully supports all File API
	if (window.File && window.FileReader && window.FileList && window.Blob)
	{
	    
	    if( !$('#FileInput').val()) //check empty input filed
	    {
		$("#output").html("No images selected!");
		return false
	    }
	    
	    $('#submit-btn').hide(); //hide submit button
	    $('#loading-img').show(); //hide submit button
	    $("#output").html("");  
	}else{

	    //Output error to older unsupported browsers that doesn't support HTML5 File API
	    $("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
	    return false;
	}
    }

    //progress bar function
    function OnProgress(event, position, total, percentComplete)
    {
	//Progress bar
	$('#progressbox').show();
	$('#progressbar').width(percentComplete + '%') //update progressbar percent complete
	$('#statustxt').html(percentComplete + '%'); //update status text
	if(percentComplete>50)
        {
            $('#statustxt').css('color','#000'); //change status text to white after 50%
        }
    }

    //function to format bites bit.ly/19yoIPO
    function bytesToSize(bytes) {

	var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
	if (bytes == 0) return '0 Bytes';
	var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }
});
