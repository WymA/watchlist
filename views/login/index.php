
<div class="l-content">


     <div class="information pure-g">
     <div class="pure-u-1 pure-u-md-1-2">
     <div class="l-box">
     <h1 class="information-head">Welcome</h1>
     <p>
     
     <a href="#loginForm" role="button" class="pure-button-primary pure-button" data-toggle="modal">
     Sign In
    </a>

     <a href="#registerForm" role="button" class="pure-button-primary pure-button" data-toggle="modal">
     Sign Up
    </a>

     </p>
     </div>
     </div>
     </div> <!-- end information -->

</div> <!-- end l-content -->


<!-- Login Modal-->
<div id="loginForm" class="modal hide fade" tabindex="-1" 
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-header">
        <h1 id="myModalLabel">Sign in</h1>
    </div>

    <div class="modal-body">
     <form name="loginForm" class="pure-form">
     <fieldset class="pure-group">
     <input id="username" name="username" type="text" class="pure-input-1-2" placeholder="Username" required>
     <input id="password" name="password" type="password" class="pure-input-1-2" placeholder="Password" required>
     </fieldset>

<!--     <fieldset class="pure-group">
     <a class="pure-link" href="#forgetForm" data-toggle="modal" data-dismiss="modal"  > Forget your password? </a>
     </fieldset> -->

     <div id="error"></div> 

     </div>

     <div class="modal-footer">
     <button class="pure-button" data-dismiss="modal" aria-hidden="true">Close</button>
     <input type="submit" id="login" class="pure-button pure-button-primary" value="Sign in" >
     </div>

     </form>

</div>

<!-- Forget Form-->
<div id="forgetForm" class="modal hide fade" tabindex="-1" 
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-header">
        <h1 id="myModalLabel">Find Your Password</h1>
    </div>

    <div class="modal-body">
     <form name="forgetForm" class="pure-form">
     <fieldset class="pure-group">
     <input id="email" name="email" type="email" class="pure-input-1-2" placeholder="Email" required>
     </fieldset>

     <div id="forget-error"></div> 

     </div>
     </form>
     <div class="modal-footer">
     <button class="pure-button" data-dismiss="modal" aria-hidden="true">Close</button>
     <input type="submit" id="forgetSubmit" class="pure-button pure-button-primary" value="Submit" >
     </div>

</div>

<!-- Register Form-->
<div id="registerForm" class="modal hide fade" tabindex="-1" 
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-header">
        <h1 id="myModalLabel">Sign Up</h1>
    </div>

    <div class="modal-body">
     <form name="registerForm" class="pure-form">
     <fieldset class="pure-group">
     <input id="username" name="username" type="text" class="pure-input-1-2" placeholder="Username" required>
     <input id="email" name="email" type="email" class="pure-input-1-2" placeholder="Email" required>
     </fieldset>

     <fieldset class="pure-group">

     <input id="reg-password" name="password" type="password" class="pure-input-1-2" placeholder="Password" required>
     <input id="re-password" name="re-password" type="password" class="pure-input-1-2" placeholder="Repeat" required>

     </fieldset>

     <fieldset class="pure-group">
     <select id="occupation" name="occupation" class="pure-input-1-2" >
     <option></option>
     <option>Watch List Officer</option>
     <option>Checkport Officer</option>
     </select>
     <label for="occupation">Select Your Occupation</label>
     </fieldset>

     <div id="reg-error"></div> 

     </div>

     <div class="modal-footer">
     <button id="cancel" class="pure-button" data-dismiss="modal" aria-hidden="true">Close</button>
     <input type="submit" id="register" class="pure-button pure-button-primary" value="Sign Up" >
     </div>

     </form>

</div>


</div>