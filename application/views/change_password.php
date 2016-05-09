<script>

function otp()
{
	var password=document.getElementById("password").value;
	if(password=="")
	{
		document.getElementById("msg").innerHTML='Please Enter your Password';
		document.getElementById("msg").style.color="red";
		return false;
	}
	if(password.length<=4)
	{
	document.getElementById("msg").innerHTML='Password should be of more than 4 characters';
		document.getElementById("msg").style.color="red";
		return false;	
	}
	else
	{
		return true;
	}
}
 function validate()
{
	return otp();
}
</script>


<h2> Please Do not Refresh this page </h2>
	<form action="<?= base_url();?>auth/request_password" method="POST" onsubmit="return validate()">
   <div class = "col-sm-4"></div>
<div class = "col-sm-4 text-center" style = "border: 1px solid #999; border-radius: 6px; margin-top: 100px; padding-bottom:20px">
   <h3>Please Enter The Password</h3>
   <div id="msg"> &nbsp; </div>
<div class="form-group">
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password"/>
    <input type="hidden" name="email" class="form-control" id="email" value="<?php echo $email ?>">
</div>
   <input type="submit" class="btn btn-success btn-block" name="submit" value="Change Password" style="width: 200px; margin-left: 112px"/>
</div>
</form>