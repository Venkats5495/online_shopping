<?php 
include "dbc.php";
if(isset($_POST['submit']))
{
$user=$_POST['user'];

$email=$_POST['email'];

$select="select Name from users where Name='$user'";
$selquery= mysqli_query($conn,$select);
$check=mysqli_fetch_array($selquery);
if($check['Name'] != $user)
{
$ins="insert into users(Name,Email) values('$user','$email')";
$reg = mysqli_query($conn,$ins);
if($reg == true)
{
	echo"<script>alert('Data Registered successfully');</script>";
	
	$subject="$user";
   $to="$email";
   $from="venkatsekar5495@gmail.com";
   $msg="Register successfully";//$_POST['message'];
   $header="MIME-Version= 1.0\r\n";
   $header.="Content-type: text/html; charset=UTF-8\r\n";
   $header.="Form: <".$from.">";
   mail($to,$subject,$msg,$header);
   echo "mail sent";   

}
else
{
	echo"<script>alert('Data not Registered');</script>";
	
	$subject="$user";
   $to="$email";
   $from="venkatsekar5495@gmail.com";
   $msg="Register unsuccessfully";//$_POST['message'];
   $header='MIME-Version= 1.0'."\r\n";
   $header.='Content-type: text/html; charset=UTF-8'."\r\n";
   $header.="Form: <".$from.">";
   mail($to,$subject,$msg,$header);
   echo "mail sent";   

}
}

else{
	echo"<script>alert('This Name Already exists');</script>";
}
//Email sent
   
//echo "$reg";
//exit;	

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>

<h1 align="center"> Register page</h1>
<fieldset>
<legend>Register</legend>
<form action="register.php" method="post">
<p>User Name</p>
<input type="text" name="user" autofocus=on	 required>
<p>Email</p>
<input type="email" name="email">
<br><br>	
<input type="submit" name="submit" value="submit">
<br><br>
<a href="index.php">Back</a>
</form>
</fieldset>
</body>
</html>