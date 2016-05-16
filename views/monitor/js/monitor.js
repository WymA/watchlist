$(function(){


    var times = 0 ;

    var panelHtml = '<div id="panel-_panelID-div" class="panel panel-primary profile-panel">'+
	'<div id="panel-_panelID" class="panel-heading">'+
	'<table class="table table-condensed">'+
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
	'<thead id="th-_panelID">'+

	'<tr>'+
	'<th width="30%">Watchlist Officer: _username</th>'+
	'<th width="30%">IP Address: _ip</th>'+
	'<th width="40%">Matched On: _time</th>'+
	'</tr><tr>'+
	'<th width="30%">Description:</th><th width="70%" colspan="3">_description</th>'+
	'</tr>'+

	'<tr>'+
	'<th width="33%" id="match-_panelID">Match Score(0-100): <span>_matchedScore</span></th>'+
	'<th width="33%" id="mask-_panelID">Face Mask Score(0-100): <span >_maskScore</span></th>'+
	'<th width="33%" id="disguise-_panelID">Disguise Score(0-100): <span >_disguiseScore</span></th>'+
	'</tr>'+

	'</thead>'+
	'</table>'+

	'<table class="table table-condensed">'+

	'<tbody id="tb-_panelID">'+
	'</tbody>'+

	'</table>'+
	'<!--end of table-->'+
	
	'<div align="center" id="msg-_panelID"></div>'+
	
	'<div align="center"><table><tr id="tr-_panelID">'+
	'<td><button id="_panelID" class="check-button pure-button-primary pure-button" >Check</button></td>'+
	'<td><button id="_panelID" class="ignore-button pure-button-primary pure-button" >Ignore</button></td>'+
	'</tr></table></div>'+

	'<div align="right"><button id="_panelID" class="close-button pure-button" >&#8679;</button></div>'+
	'</div></div>'+
	'<!--end of panel-->' ;


	var deleteBtn = '<td><button id="_panelID" class="delete-button pure-button-primary pure-button" >Delete</button></td>' ;

    var imgTable ='<td id="td-_imgID" width="50%">'+
	'<div align="center">'+
	'<table>'+
	'<tr rowspan="2">'+
	'<td colspan="2"><img src="_path" alt="X" height="200" width="200"></td>'+
	'</tr>'+
	'<tr rowspan="2">'+
	'<td>Watchlist Image: </td><td align="center"><span style="color:#cc0000">_type</span></td>'+
	'</tr>'+
	'</table>'+
	'</div>'+
	'</td>';

    var maskTable ='<td id="td-_imgID" width="50%">'+
	'<div align="center">'+
	'<table>'+
	'<tr rowspan="2">'+
	'<td colspan="2"><img src="_path" alt="X" height="300" width="300"></td>'+
	'</tr>'+
	'<tr rowspan="2">'+
	'<td>Watchlist Image: </td><td>_type</td>'+
	'</tr>'+
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


    var handleColor = function( s ){

	var score = parseInt(s) ;

	if ( 0 <= score && score <= 30 )
	    return 'score-green' ;
	if ( 31 <= score && score <= 70 )
	    return 'score-yellow';
	if ( 71 <= score )
	    return 'score-red';
    }

    var panelHandler = function(o) {

	for ( var i = o.data.length-1 ; i >= 0 ; i-- ) {

            var newPanel = panelHtml.replace( /_panelID/g, o.data[i][15] )
		.replace( /_firstname/g, o.data[i].firstName )
		.replace( /_lastname/g, o.data[i].lastName)
		.replace( /_gender/g, o.data[i].gender)
		.replace( /_age/g, o.data[i].age)
		.replace( /_description/g, o.data[i].description )
		.replace( /_username/g, o.data[i].username)
		.replace( /_ip/g, o.data[i].userIp)
		.replace( /_time/g, o.data[i][21] )
		.replace( /_matchedScore/g, o.data[i].matchedScore )
		.replace( /_maskScore/g, o.data[i].maskScore )
		.replace( /_disguiseScore/g, o.data[i].disguiseScore) ; 

        $('#result').append( newPanel ) ;

        if ( o.role == 'admin'){

			var newDelBtn = deleteBtn.replace( /_panelID/g, o.data[i][15] ) ;
			$('#tr-' + o.data[i][15]).append(newDelBtn) ;
		}
	    
	    $('#match-'+o.data[i][15] ).addClass( handleColor( o.data[i].matchedScore ) );
	    $('#mask-'+o.data[i][15] ).addClass( handleColor( o.data[i].maskScore ) );
	    $('#disguise-'+o.data[i][15] ).addClass( handleColor( o.data[i].disguiseScore ) );


        $('#panel-'+o.data[i].id).hide().show( 400);

	    
	    if ( o.data[i].currentMatch == '1'){

		var imageTable = imgTable.replace(/_imgID/g, o.data[i].imgId+o.data[i][15] )
		    .replace(/_path/g, "../data/" + o.data[i][11])//Origin Image Path
		    .replace(/_type/g, typeFilter( o.data[i].type )) ;

		var matchImageTable = imgTable.replace(/_imgID/g, o.data[i].imgId+o.data[i][15]+'1' )
		    .replace(/_path/g, "../" + o.data[i][17])//Matched Image Path
		    .replace(/_type/g, "Current Match") ;
		
		$("#tb-"+o.data[i][15]).append('<tr>') ;
		$("#tb-"+o.data[i][15]).append(imageTable) ;
		$("#tb-"+o.data[i][15]).append(matchImageTable) ;
		$("#tb-"+o.data[i][15]).append('</tr>') ;

	    }else if (o.data[i].isMaskMatch == '1' ){

		var maskImgTable = maskTable.replace(/_imgID/g, o.data[i].imgId+o.data[i][15]+'1' )
		    .replace(/_path/g, "../" + o.data[i][17])//Mask Image Path
		    .replace(/_type/g, "Mask Match") ;

		$("#tb-"+o.data[i][15]).append('<tr>') ;
		$("#tb-"+o.data[i][15]).append( maskImgTable ) ;
		$("#tb-"+o.data[i][15]).append('</tr>') ;




	    }

	}


        $(".panel-heading").click(function(){

            var id = $(this).attr('id') ;
            if ( $("#"+id+"-body").is(":hidden") ) 
		$("#"+id+"-body").slideToggle() ;

        });//end of panel-heading

        $(".close-button").click(function(){

            var id = $(this).attr('id') ;
            $("#panel-"+id+"-body").slideToggle();
        });


    $(".delete-button").click(function(){

		var id = $(this).attr('id') ;
			    

		if ( confirm("Are you sure to delete this record?") ) {
			$.ajax({

			    type: "POST",
			    url: "../monitor/deleteItem",
			    dataType: 'json',
			    data: 'id='+id,
			    cache: false,
			    success: function(o){
				
				$("#msg-"+id).html('<span style="color:#cc0000">'+o.data+'</span>') ;
				
				if (o.status)
				    $("#panel-"+id+"-div").delay(1500).hide(500) ;

			    },
			    error: function(o){
			    	
					console.log(o) ;
			    }
			});
		}
    }) ;



	$(".check-button").click(function(){

	    var id = $(this).attr('id') ;



	    if ( confirm("Have you done checking this suspect?") )
		$.ajax({

		    type: "POST",
		    url: "../monitor/check",
		    dataType: 'json',
		    data: 'id='+id,
		    cache: false,
		    success: function(o){

				

					$("#msg-"+id).html('<span style="color:#cc0000">'+o.data+'</span>') ;			
					if (o.status)
				    	$("#panel-"+id+"-div").delay(1500).hide(500) ;
				//}

		    },
		    error: function(o){
			console.log(o) ;
		    }
		});
	    
	});
	
	$(".ignore-button").click(function(){

	    var id = $(this).attr('id') ;

	    if ( confirm("Are you sure to ignore this suspect?") )
		$.ajax({

		    type: "POST",
		    url: "../monitor/ignore",
		    dataType: 'json',
		    cache: false,
		    data: 'id='+id,
		    success: function(o){
			
			$("#msg-"+id).html('<span style="color:#cc0000">'+o.data+'</span>') ;
			if (o.status)
			    $("#panel-"+id+"-div").delay(1500).hide(500) ;

		    },
		    error: function(o){
			console.log(o) ;
		    }
		});
	    
	});

    };


    $.ajax({

	type: "GET",
	url: "../monitor/getChecking",
	dataType: 'json',
	cache: false,
	success: function(o){

	    if ( o.status ){
		
		panelHandler(o) ;

	    }else{
		
		$("#result").html('<span style="color:#cc0000">'+o.data+'</span>') ;
	    }	    
	},
	error: function(o){
	    console.log(o) ;
	}
    });
    
    
    setInterval( function(){

	$("#result-heading").html("<p><h3>Watchlist Inspecting"  + Array(times).join('.') +"</h3></p>") ;
	times++ ;
	if ( times == 5 )
	    times = 0 ;
	
	$.ajax({

	    type: "GET",
	    url: "../monitor/getDetails",
	    dataType: 'json',
	    cache: false,
	    beforeSend: function(){},
	    success: function(o){

		if ( o.status ){
		    
		    panelHandler(o) ;
		    $('#update-msg').modal('show') ;

		}else{
		    

		}
	    },
	    error: function(o){

		console.log(o) ;
	    }
	});

	
    }, 1000) ;


});

