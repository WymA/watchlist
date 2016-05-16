$(function(){

<<<<<<< HEAD
  var bioData = [] ;

  var panelHtml = '<div class="panel panel-primary profile-panel" >'+
	'<div id="panel-_panelID" class="panel-heading">'+
	'<table class="table table-condensed" width="90%">'+
	'<thead>'+
	'<tr>'+
	'<th width="15%">First Name: </th><th width="15%" align="left"> _firstname</th>'+
	'<th width="15%">Last Name: </th><th width="15%" align="left">_lastname</th>'+
	'<th width="10%">Age: </th><th width="10%" align="left">_age</th>'+
	'<th width="10%">Gender: </th><th width="10%" align="left">_gender</th>'+
	'</tr>'+
	'</thead>'+
	'</table>'+
	'</div>'+
	'<div id="panel-_panelID-body" class="panel-body" style="display:none;">'+
	'<!--table-->'+
	'<table class="table table-condensed">'+
	'<thead>'+
	'<tr>'+
	'<th width="25%">Watchlist Officer: </th><th width="25%">_username</th>'+
	'<th width="25%">IP Address: </th><th width="25%">_ip</th>'+
	'</tr><tr>'+
	'<th width="25%">Description:</th><th colspan="3">_description</th>'+
	'</tr>'+
	'</thead>'+

	'</table>'+
	'<table class="table table-condensed">'+

	'<tbody id="tb-_panelID">'+
	'</tbody>'+

	'</table>'+
	'<!--end of table-->'+
	'<div align="right"><button id="_panelID" class="close-button pure-button" >&#8679;</button></div>'+
	'</div></div>'+
	'<!--end of panel-->' ;

  var imgTable ='<td id="td-_imgID" >'+
	'<div align="center">'+
	'<table>'+
	'<tr rowspan="2">'+
	'<td colspan="2"><img src="_path" alt="X" height="189" width="189"></td>'+
	'</tr>'+
	'<tr rowspan="2">'+
	'<td>Watchlist Image: </td><td align="center"><span style="color:#cc0000">_type</span></td>'+
	'</tr>'+
	'<tr rowspan="2">'+
	'<td><button id="_imgID" data="_path" class="view-button pure-button" >View</button></td>'+
	'<td><button id="_imgID" class="del-button pure-button" >Delete</button></td>'+
	'</table>'+
	'</div>'+
	'</td>';

  var typeFilter = function(type){

    switch ( type ) {
    case 'face':
      return 'Face' ;
      break;
    case 'eyes':
      return 'Eye Peninsula' ;
      break;
    case 'iris':
      return 'Iris' ;
      break;
    case 'fringer':
      return 'Fingerprint' ;
      break;
    case 'sketch':
      return 'Sketch' ;
      break;

    default:
      return 'None' ;
      break;

    }
  }

  var panelHandler = function(o) {

    $('#profile-div').empty() ;

    for (var i = 0; i < o.length; i++) {

      var newPanel = panelHtml.replace( /_panelID/g, o[i].id )
	    .replace( /_firstname/g, o[i].firstName )
	    .replace( /_lastname/g, o[i].lastName)
	    .replace( /_gender/g, o[i].gender)
	    .replace( /_age/g, o[i].age)
	    .replace( /_description/g, o[i].description )
	    .replace( /_username/g, o[i].username)
	    .replace( /_ip/g, o[i].userIp) ;

      $('#profile-div').append( newPanel ) ;
      $('#panel-'+o[i].id).hide().delay(400*i).show( 400);
    }

    $(".panel-heading").click(function(){


      var id = $(this).attr('id') ;

      if ( !$("#"+id+"-body").is(":hidden") ) {

	$("#"+id+"-body").slideToggle() ;
	return false ;
      }

      $("#"+id+"-body").slideToggle() ;

      id = id.split('-')[1];

      var dataString = "id="+id;

      $.ajax({

	type: "POST",
	url: "getDetails",
	data: dataString,
	dataType: 'json',
	cache: true,
	success: function(data){

	  $("#tb-"+id).empty();

	  for ( var i = 0 ; i < data.length ; i++ ){

	    var newImg = imgTable.replace(/_imgID/g, data[i].id)
		  .replace(/_path/g, "../data/"+data[i].path)
		  .replace(/_type/g, typeFilter( data[i].type ) ) ;

	    if( 0 == i%3){
	      $("#tb-"+id).append('<tr id="tr-'+id+parseInt(i/3)+'"></tr>') ;
	    }

	    $("#tr-"+id+parseInt(i/3)).append(newImg) ;

	  }//end of for loop


	  //Delete Button Event Handler
	  $(".del-button").click(function(){

	    var id = $(this).attr('id') ;
	    var delData = "id="+id ;

	    if ( confirm("Are you sure to delete this picture?") ){

	      $.ajax({
		type: "POST",
		url: "deleteImg",
		data: delData,
		dataType: 'json',
		cache: false,
		success: function(o){

		  $("#td-"+id).remove() ;
		},
		error: function(o){
		  console.log(o) ;
		}
	      });
	    }

	  });//end of delete button

	  $(".view-button").click(function(){

	    var viewData = $(this).attr('data') ;
	    $("#view-body").html('<img src='+viewData+' alt="X" height="450" width="360" >') ;
	    $("#view-picture").modal("show") ;

	  });//end of view button

	}//end of success

      });

    });//end of panel-heading






    $(".close-button").click(function(){

      var id = $(this).attr('id') ;
      $("#panel-"+id+"-body").slideToggle();
    });




  };


  $("#get-all").on("click", function(){

    $.get('getAllSuspects', panelHandler, "json");
  });


  $("#get-search").on("click", function(){

    $("#search-form").slideToggle(1000);

  });    

  $("#submit-search-form").on("click", function(){

    var data = $("#search-form").serialize();
    $.post("search", data, panelHandler, "json");

    return false ;
  });
=======
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
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0

});
