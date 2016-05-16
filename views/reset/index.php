
<script>

 $(function(){

 
    $("#submit-reset-form").click(function(){

	$.ajax({

	    type: "POST",
	    url: "resetPassword",
	    data: $('form[name="reset-form"]').serialize(),
	    dataType: 'json',
	    cache: false,
	    beforeSend: function(){ 
	    },
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
</script>

<div align="center" >

  <h3>Please Input Your New Password</h3>

    <div class="l-box">

	<form name="reset-form" class="pure-form">
	    <fieldset class="pure-group">
		<input name="password" type="password" class="pure-input-1-3" placeholder="Password">
		<input name="re-password" type="password" class="pure-input-1-3" placeholder="Repeat Password">

	    </fieldset>
	    <div id="msg" align="center"></div>
	    <button id="submit-reset-form" type="submit" class="pure-button pure-input-1-5 pure-button-primary">Submit</button>
	    <button id="reset-reset-form" type="reset" class="pure-button pure-input-1-5">Reset</button>
	</form>
    </div>


</div> 



