<style>

 .button-success {
     background: rgb(28, 184, 65); /* this is a green */
 }

 .button-error {
     background: rgb(202, 60, 60); /* this is a maroon */
 }

 .button-warning {
     background: rgb(223, 117, 20); /* this is an orange */
 }

 .button-secondary {
     background: rgb(66, 184, 221); /* this is a light blue */
 }


</style>

<div align="center" >

  <h3 data-i18n="page.admin-header"></h3>

    <div class="l-box">

	<form id="admin-form" class="pure-form">
	    <fieldset class="pure-group">
		<input name="email" type="email" class="pure-input-1-3" data-i18n="[placeholder]page.new-email">
		<input name="password" type="password" class="pure-input-1-3" data-i18n="[placeholder]page.admin-password">

	    </fieldset>
	    <div id="msg" align="center"></div>
	    <button id="submit-admin-form" type="submit" class="pure-button pure-input-1-5 pure-button-primary" data-i18n="button.submit"></button>
	    <button id="reset-admin-form" type="reset" class="pure-button pure-input-1-5" data-i18n="button.reset"></button>
	</form>
    </div>


</div> 



