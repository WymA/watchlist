<style>


 .button-success,
 .button-error,
 .button-warning,
 .button-secondary {
   color: white;
   border-radius: 4px;
   text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
 }

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


  <div class="l-box">
    <button id="get-all" class="button-success pure-button" data-i18n="button.all-suspects"></button>
    <button id="get-search" class="button-error pure-button" data-i18n="button.search"></button>
  </div>


  <div class="l-box">

    <form id="search-form" class="pure-form hide">
      <fieldset class="pure-group">
	<input name="firstname" type="text" class="pure-input-1-3" data-i18n="[placeholder]user.firstname" required>
	<input name="lastname" type="text" class="pure-input-1-3" data-i18n="[placeholder]user.lastname">
      </fieldset>
      <button id="submit-search-form" type="submit" class="pure-button pure-input-1-3 pure-button-primary" data-i18n="button.submit"></button>
    </form>
  </div>

  <div id="profile-div" class="l-box">
  </div>


</div> 

<div id="view-picture" class="modal hide fade" tabindex="-1" 
     role="dialog" aria-labelledby="view-label" >

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"
	    aria-hidden="true">&times;</button>
  </div>

  <div class="modal-body">
    <div align="center" id="view-body">
      
      
    </div>
  </div>


  <div class="modal-footer">
    <button class="pure-button" data-dismiss="modal" aria-hidden="true" data-i18n="button.close"></button>
  </div>

</div>

