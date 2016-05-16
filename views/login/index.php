<style>

.login-table {
  margin-left: auto;
  margin-right: auto;
  width: 60%;
  max-width: 60%;
  margin-bottom: 20px;
}

</style>


<div class="l-content">

  <div class="information pure-g">
    <div class="pure-u-1 pure-u-md-1-2">
      <div class="l-box">
       <h1 class="information-head" data-i18n="user.welcome"></h1>

       <div id="login-msg"></div>

        <table class="login-table">

          <tr>
            <td><p data-i18n="page.welcome-msg-login"></p></td>
            <td><p data-i18n="page.welcome-msg-register"></p></td>
         </tr>

          <tr>

            <td>
             <a href="#loginForm" role="button" class="pure-button-primary pure-button" 
             data-toggle="modal" data-i18n="button.sign-in"></a>
           </td>


           <td>
             <a href="#registerForm" role="button" class="pure-button-primary pure-button" 
             data-toggle="modal" data-i18n="button.sign-up"></a>
            </td>
         </tr>
       </table>

     </div>
   </div>
 </div> <!-- end information -->

</div> <!-- end l-content -->


<!-- Login Modal-->
<div id="loginForm" class="modal hide fade" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-header">
  <h1 id="myModalLabel" data-i18n="button.sign-in"></h1>
</div>

<div class="modal-body">
  <form name="loginForm" class="pure-form">
    <fieldset class="pure-group">
     <input id="username" name="username" type="text" class="pure-input-1-2" data-i18n="[placeholder]user.username" required>
     <input id="password" name="password" type="password" class="pure-input-1-2" data-i18n="[placeholder]user.password" required>
   </fieldset>

   <fieldset class="pure-group">
     <a class="pure-link" href="#forgetForm" data-toggle="modal" data-dismiss="modal" 
     data-i18n="button.forget-password"></a>
   </fieldset>

   <div id="error"></div> 

 </div>

 <div class="modal-footer">
  <button type="button" class="pure-button" data-dismiss="modal" aria-hidden="true" data-i18n="button.close"></button>
  <button type="submit" id="login" class="pure-button pure-button-primary" data-i18n="button.submit"></button>
</div>

</form>

</div>

<!-- Forget Form-->
<div id="forgetForm" class="modal hide fade" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-header">
  <h1 id="myModalLabel" data-i18n="user.find-password"></h1>
</div>

<div class="modal-body">
  <form name="forgetForm" class="pure-form">

    <fieldset class="pure-group">
      <input id="fog-email" name="email" type="email" class="pure-input-1-2" data-i18n="[placeholder]user.email" required>
    </fieldset>

    <div id="forget-error"></div> 
  </form>
</div>

<div class="modal-footer">
  <button class="pure-button" data-dismiss="modal" aria-hidden="true" data-i18n="button.close"></button>
  <button type="submit" id="forgetSubmit" class="pure-button pure-button-primary" data-i18n="button.submit" ></button>
</div>

</div>

<!-- Register Form-->
<div id="registerForm" class="modal hide fade" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-header">
  <h1 id="myModalLabel" data-i18n="button.sign-up"></h1>
</div>

<div class="modal-body">
  <form name="registerForm" class="pure-form">
    <fieldset class="pure-group">
     <input id="reg-username" name="username" type="text" class="pure-input-1-2" data-i18n="[placeholder]user.username" required>
     <input id="reg-email" name="email" type="email" class="pure-input-1-2" data-i18n="[placeholder]user.email" required>
   </fieldset>

   <fieldset class="pure-group">

     <input id="reg-password" name="password" type="password" class="pure-input-1-2" data-i18n="[placeholder]user.password" required>
     <input id="re-password" name="re-password" type="password" class="pure-input-1-2" data-i18n="[placeholder]user.repassword" required>

   </fieldset>

   <fieldset class="pure-group">
     <select id="occupation" name="occupation" class="pure-input-1-2" >
       <option></option>
       <option data-i18n="button.watchlist"></option>
       <option data-i18n="button.passport"></option>
     </select>
     <label for="occupation" data-i18n="button.select-role"></label>
   </fieldset>

   <div id="reg-error"></div> 

 </div>

 <div class="modal-footer">
  <button id="cancel" class="pure-button" data-dismiss="modal" aria-hidden="true" data-i18n="button.close"></button>
  <button type="submit" id="register" class="pure-button pure-button-primary" data-i18n="button.submit" ></button>
</div>

</form>

</div>


</div>
