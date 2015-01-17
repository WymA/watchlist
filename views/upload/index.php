
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>views/upload/css/upload.css" />


<style>
 .description{
   height: 100px;
 }

</style>



<!--Step 1: profile-->

<div id="profile-box" align="center">

<h2>Input the Suspect Information</h2>

<form id="profile-form" class="pure-form">


    <fieldset class="pure-group">
     <input name="firstname" type="text" class="pure-input-1-3" placeholder="First Name">
     <input name="lastname" type="text" class="pure-input-1-3" placeholder="Last Name">
    </fieldset>

    <fieldset class="pure-group">
     <input name="age" type="text" class="pure-input-1-3" placeholder="Age">

    <fieldset class="pure-group">
     <label for="gender" >Gender</label>
     <select id="gender" name="gender" class="pure-input-1-4" >
     <option>male</option>
     <option>female</option>
     </select>
     </fieldset>

     <input name="description" type="text" class="pure-input-1-3 description" placeholder="Description">
    </fieldset>

    <button id="profile-next" type="submit" class="pure-button pure-input-1-3 pure-button-primary">Next Step</button>
</form>

</div>


<!-- Search Results-->
<div id="suspect-table" class="l-box hide" align="center">

<h2>Familiar Suspects Information</h2>

     <table class="pure-table pure-table-horizontal">
     <thead id="thead">
     <tr>
     <th>First Name</th>
     <th>Last Name</th>
     <th>Gender</th>
     <th>Age</th>
     <th>Check</th></tr>
     </thead> 
     <tbody id="tbody"></tbody>
     </table>
      <br />
      <br />
    <button id="suspect-prev" type="submit" class="pure-button pure-input-1-3 pure-button-primary">Previous Step</button>
    <button id="suspect-next" type="submit" class="pure-button pure-input-1-3 pure-button-primary">Create New Profile</button>
    <button id="confirm-add" type="submit" class="pure-button hide pure-input-1-3 pure-button-primary">Confirm to Add</button>
</div>



<!--Confirm Step-->
<div id="confirm-box" class="l-box hide" align="center">

<h2>Confirm to Create?</h2>

     <div id="profile-table" class="l-box" >

     <form id="confirm-form" class="pure-form"
     action="<?php echo URL;?>upload/newSuspect">
     <fieldset class="pure-group">

     <table class="pure-table pure-table-horizontal">
     <thead id="thead-profile">
     <tr>
     <th>First Name</th>
     <th>Last Name</th>
     <th>Gender</th>
     <th>Age</th>
     <th>Check</th>
     </thead> 
     <tbody id="tbody-profile"></tbody>
     </table>
     </fieldset>
     
     </form>

     <button id="upload-prev" type="botton" class="pure-button pure-input-1-3">Cancel</button>
     <button id="profile-confirm" type="submit" class="pure-button pure-input-1-3 pure-button-primary">Confirm to Create</button>

     </div>
     <div class="l-box" id="message"></div>
</div>

<!-- upload step-->
<div id="upload-box" class="l-box hide" align="center">
     <p>

     <form action="<?php echo URL;?>upload/uploadImg" 
     class="pure-form" enctype="multipart/form-data" id="MyUploadForm">
    <fieldset class="pure-group">
     <label for="type" >Choose an Image Type:</label>
      <select id="type" name="type" class="pure-input-1-4">
      <option>face</option>
      <option>eyes</option>
      <option>finger</option>
      <option>iris</option>
      </select>
     </fieldset>

     <div id="upload-wrapper">
     <div align="center">

      <h3 class="information-head">Image Files Upload</h3>

     <input name="FileInput[]" id="FileInput" type="file" multiple="multiple"/>
     <input type="submit"  id="submit-btn" value="Upload" />
     <img src="<?php echo URL;?>public/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>

     <div id="progressbox" ><div id="progressbar"></div ><div id="statustxt">0%</div></div>
     <div id="output"></div>

     </div>
     </div>

     </form>


     </p>
</div>

