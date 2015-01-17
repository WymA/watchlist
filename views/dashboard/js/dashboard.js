$(function(){

    var bioData = [] ;

    var tableHandler = function(o) {
	
	bioData = o ;
	$("#tbody").empty();
        for (var i = 0; i < o.length; i++) {

	    $('#tbody').append('<tr><td>'+ o[i].firstName +'</td>'+
			       '<td>'+ o[i].lastName +'</td>'+
			       '<td>'+ o[i].gender +'</td>'+
			       '<td>'+ o[i].age +'</td>'+
			       '<td><a href="#details" data-target="#check-details" id='+i+' '+
			       'data-toggle="modal">Check</a></td>'+
			       '</tr>') ;
        }
	$("#suspect-table").show(1500);
    };


    $('#check-details').on('show.bs.modal', function(e) {
	
	var idx = e.relatedTarget.id ;
	var dataString = "id="+bioData[idx].id;

	$.ajax({

	    type: "POST",
	    url: "getDetails",
	    data: dataString,
	    dataType: 'json',
	    cache: false,
	    success: function(data){

		$("#detail-tbody-1").empty() ;
		$("#detail-tbody-1").append('<tr>') ;
		$("#detail-tbody-1").append('<td>'+bioData[idx].firstName+'</td>'+
					    '<td>'+bioData[idx].lastName+'</td>'+
					    '<td>'+bioData[idx].gender+'</td>'+
					    '<td>'+bioData[idx].age+'</td>'
					   ) ;
		$("#detail-tbody-1").append('</tr>') ;

		$("#detail-tbody-2").empty() ;
		$("#detail-tbody-2").append('<tr>') ;
		$("#detail-tbody-2").append('<td>'+bioData[idx].userIp+'</td>'+
					    '<td>'+bioData[idx].username+'</td>'+
					    '<td colspan="2">'+bioData[idx].description+'</td>'
					   ) ;
		$("#detail-tbody-2").append('</tr>') ;

		for ( var i = 0 ; i < data.length ; i++ ){

		    $("#detail-tbody-2").append('<tr id="row'+i+'" rowspan="2">') ;
		    $("#detail-tbody-2").append('<td colspan="2"><img src="../'+
						data[i].path+'" alt="x" height="60" width="60"></td>'+
						'<td>'+data[i].type+'</td>'+
						'<td>'+'<form id="delete-form">'+
						'<input id="img-id" name="id" class="hide" value='+data[i].id+'>'+
						'<input id="idx" name="idx" class="hide" value='+i+'>'+
						'<input id="path" name="path" class="hide" value='+data[i].path+'>'+
						'<div id="delete-output">'+
						'<button type="submit" class="delete-img">Delete</button></div></form>'+
						'</td>') ;
		    $("#detail-tbody-2").append('</tr>') ;



		}

		$(".delete-img").click(function(){
		    
		    $.post("deleteImg", 
			   $(this).serialize(),
			   function(out){
			       
			       $("#delete-output").html("<label>Deleted!!</label>") ;
			   },
			   'json');
		    return false ;
		});
		

	    },
	    error: function(e){
		

	    }
	});

	return true ;
    });

    $("#get-all").on("click", function(){

	$.get('getAllSuspects', tableHandler, "json");
    });


    $("#get-search").on("click", function(){

	$("#search-form").show(1500);
    });

    $("#submit-search-form").on("click", function(){
	
	var data = $("#search-form").serialize();
	$.post("../dashboard/search", data, tableHandler, "json");

	return false ;
    });

});
