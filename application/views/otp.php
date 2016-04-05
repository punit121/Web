<html>
<head>
<style>

body {
background-image: url("http://www.zersey.com/assert/images/Background_1.jpg");
background-size: cover;
background-repeat: no-repeat;}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 7px 14px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 2px 1px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
    border-radius: 12px;
}

.button3:hover {
    background-color: #008CBA;
    color: white;
}
#dialog {
  padding: 20px 30px;
  border: solid 4px rgba(255,255,255,.8);
}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
 
   <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"
        rel="stylesheet" type="text/css" />
<script>

function otp()
{
	var otp=document.getElementById("otp").value;
	if(otp=="")
	{
		document.getElementById("msg").innerHTML='Please Enter your OTP';
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

$(function() {
    $("#dialog").dialog({
                modal: true,
                autoOpen: true,
                title: "Enter OTP",
                width: 600,
                height: 450
            });
});        

</script>
</head>
<body>
<div id="dialog" style="display: none" align="center">
<h2> Please Do not Close this window </h2>
	<form action="<?= base_url();?>auth/verify_otp/<?php echo $plivo ?>/" method="POST" onsubmit="return validate()">
   <div class = "col-sm-4"></div>
<div class = "col-sm-4 text-center" style = "border: 1px solid #999; border-radius: 6px; margin-top: 20px; padding-bottom:20px">
   <h3>Please Enter The OTP</h3>
   <div id="msg"> &nbsp; </div>
<div class="form-group">
    <input type="password" name="otp" class="form-control" id="otp" placeholder="Enter OTP"/>
    <input type="hidden" name="mobile" class="form-control" id="mobile" value="<?php echo $mobno; ?>">
</div>
<h5>Did not receive OTP?</h5>
<a href="<?=base_url();?>auth/resend_otp/<?php echo $mobno; ?>"><input type="button" class="btn btn-danger btn-block" name="resend" value="Resend OTP" style="background-color: #C00;border: 2px solid #C00; color : white; border-radius: 12px; width: 150px; margin-left: 12px"/></a>
   <input type="submit" class="btn btn-success btn-block" name="submit" value="Confirm OTP" style="background-color: #C00;border: 2px solid #C00; color : white; border-radius: 12px; width: 150px; margin-left: 112px"/>
</div>
</form>        
    </div>
</body>
</html>