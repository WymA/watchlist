
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>views/upload/css/upload.css" />


<style>
.description{
 height: 100px;
}

</style>



<!--Step 1: profile-->

<div id="profile-box" align="center">

  <h3 data-i18n="upload.input-header"></h3>

  <form id="profile-form" class="pure-form">


    <fieldset class="pure-group">
      <input name="firstname" type="text" class="pure-input-1-3" data-i18n="[placeholder]user.firstname" required>
      <input name="lastname" type="text" class="pure-input-1-3" data-i18n="[placeholder]user.lastname" required>
    </fieldset>

    <fieldset class="pure-group">
      <input name="age" type="text" class="pure-input-1-3" data-i18n="[placeholder]user.age">

      <fieldset class="pure-group">
       <label for="gender" data-i18n="user.gender"></label>
       <select id="gender" name="gender" class="pure-input-1-4" >
         <option>male</option>
         <option>female</option>
       </select>
     </fieldset>

     <input name="description" type="text" class="pure-input-1-3 description" data-i18n="[placeholder]user.description">
   </fieldset>


   <div id="profile-msg"> </div>
   <button id="profile-next" type="submit" class="pure-button pure-input-1-3 pure-button-primary" data-i18n="upload.next-step">
   </button>
 </form>

</div>


<!-- Search Results-->
<div id="suspect-table" class="l-box hide" align="center">

  <h3></h3>

  <table class="pure-table pure-table-horizontal">
    <thead id="thead">
      <tr>
       <th data-i18n="user.firstname"></th>
       <th data-i18n="user.lastname"></th>
       <th data-i18n="user.gender"></th>
       <th data-i18n="user.age"></th>
       <th data-i18n="user.add-new-pic"></th></tr>
     </thead> 
     <tbody id="tbody"></tbody>
   </table>
   <br />
   <br />
   <button id="suspect-prev" type="submit" class="pure-button pure-input-1-3 pure-button-primary" data-i18n="upload.previous-step"></button>
   <button id="suspect-next" type="submit" class="pure-button pure-input-1-3 pure-button-primary" data-i18n="upload.create-new"></button>
   

 </div>



 <!--Confirm Step-->
 <div id="confirm-box" class="l-box hide" align="center">

  <h3 data-i18n="upload.confirm-header"></h3>

  <div id="profile-table" class="l-box" >

    <form id="confirm-form" class="pure-form"
    action="<?php echo URL;?>upload/newSuspect">
    <fieldset class="pure-group">

     <table class="pure-table pure-table-horizontal">
       <thead id="thead-profile">
         <tr>
          <th data-i18n="user.firstname"></th>
          <th data-i18n="user.lastname"></th>
          <th data-i18n="user.gender"></th>
          <th data-i18n="user.age"></th>
        </thead> 
        <tbody id="tbody-profile"></tbody>
      </table>
    </fieldset>
    
  </form>

  <button id="upload-prev" type="botton" class="pure-button pure-input-1-3" data-i18n="button.cancel"></button>
  <button id="profile-confirm" type="submit" class="pure-button pure-input-1-3 pure-button-primary" data-i18n="upload.confirm-create"></button>

</div>
<div class="l-box" id="message"></div>
</div>

<!-- upload step-->
<div id="upload-box" class="l-box hide" align="center">
  <p>

    <form action="<?php echo URL;?>upload/uploadImg" 
     class="pure-form" enctype="multipart/form-data" id="MyUploadForm">
     <fieldset class="pure-group">
       <label for="type" data-i18n="upload.choose-type"></label>
       <select id="type" name="type" class="pure-input-1-4">
         <option>Face</option>
         <option>Eye Peninsula</option>
         <option>Fingerprint</option>
         <option>Iris</option>
         <option>Sketch</option>
       </select>
     </fieldset>

     <div id="upload-wrapper">
       <div align="center">

         <h3 class="information-head" data-i18n="upload.information-header"></h3>

         <input name="FileInput[]" id="FileInput" type="file" multiple="multiple"/>
         <button type="submit"  id="submit-btn" data-i18n="upload.upload" ></button>
         <img src="<?php echo URL;?>public/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>

         <div id="progressbox" ><div id="progressbar"></div ><div id="statustxt">0%</div></div>
         <div id="output"></div>

       </div>
     </div>

   </form>


 </p>
</div>

