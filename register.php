<?php
include "dbc.php";

if(isset($_POST['submit']))
{
$user=$_POST['user'];
$email=$_POST['email'];
$ph_no=$_POST['ph_no'];
$select="select Name from users where Name='$user'";
$selquery= mysqli_query($conn,$select);
$check=mysqli_fetch_array($selquery);
if($check['Name'] != $user)
{
$ins="insert into users(Name,Email,phone) values('$user','$email','$ph_no')";
$reg = mysqli_query($conn,$ins);
if($reg == true)
{
	echo"<script>alert('Data Registered successfully');</script>";

	/*$subject="$user";
   $to="$email";
   $from="venkatsekar5495@gmail.com";
   $msg="Register successfully";//$_POST['message'];
   $header="MIME-Version= 1.0\r\n";
   $header.="Content-type: text/html; charset=UTF-8\r\n";
   $header.="Form: <".$from.">";
   mail($to,$subject,$msg,$header);
   echo "mail sent";
*/
}/*
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
*/
}

else{
	echo"<script>alert('This Name Already exists');</script>";
}
//Email sent

//echo "$reg";
//exit;

}
?>
<?php include "header.php"; ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
<div class="jumbotron my-5">
			<form action="register.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" autofocus="on" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="phone">Phone no</label>
    <input type="tel" class="form-control" id="phone" name="ph_no" placeholder="Phone Number">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Register</button>
</form>

</div>
		</div>
	</div>
</div>

<?php include "footer.php"; ?>
