<div align="center">
<form name="suspectDataForm" id="suspectDataForm" method="post" enctype="multipart/form-data" 
     action="newSuspect" onSubmit="">

     <table width="760" border="0" cellspacing="0" cellpadding="0">
     <tr>
     <td width="10" class="content">&nbsp;</td>
<td width="100" valign="top" class="content">First Name </td>
     <td width="640" class="content">
     <input name="firstname" id="firstname" type="text" class="textfieldStyle1" maxlength="32" value=""></td>
     <td width="10" class="content">&nbsp;</td>
</tr>

<tr>
<td width="10" class="content">&nbsp;</td>
<td width="100" valign="top" class="content">Last Name </td>
     <td width="640" class="content"><input name="lastname" id="lastname" type="text" class="textfieldStyle1" maxlength="32" value=""></td>
     <td width="10" class="content">&nbsp;</td>
</tr>

<tr>
<td width="10" class="content">&nbsp;</td>
<td width="100" valign="top" class="content">Gender </td>
     <td width="640" class="content">
     <input name="gender" type="radio" value="male" >Male
     <input name="gender" type="radio" value="female" >Female
     </td>
     <td width="10" class="content">&nbsp;</td>
</tr>

<tr>
<td width="10" class="content">&nbsp;</td>
<td width="100" valign="top" class="content">Age</td>
     <td width="640" class="content"><input name="age" type="text" class="textfieldStyle1" maxlength="10" value="">
     (Only number is allowed, range from 01 to 120)
     </td>
     <td width="10" class="content">&nbsp;</td>
</tr>

<tr>
<td width="10" class="content">&nbsp;</td>
<td width="100" valign="top" class="content">ID</td>
     <td width="640" class="content"><input name="id" type="text" class="textfieldStyle1" maxlength="10" value="">
     (Only number and character is allowed)
     </td>
     <td width="10" class="content">&nbsp;</td>
</tr>

<tr>
<td class="content">&nbsp;</td>
<td width="100" valign="top" class="content">&nbsp;</td>
<td width="640" class="content">&nbsp;</td>
<td class="content">&nbsp;</td>
</tr>

<tr>
<td width="10" class="content">&nbsp;</td>
<td width="100" valign="top" class="content">&nbsp;</td>
<td width="640" class="content">
     <input name="Submit" type="submit" class="buttonStyle" value="Submit">
     <input name="Reset" type="reset" class="buttonStyle" value="Reset" 
     onclick="javascript:document.location.href='suspectsData.php?action=reset'"></td>
     <td width="10" class="content">&nbsp;</td>
</tr>

</table>
</form>
</div>
