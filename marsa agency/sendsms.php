<?php
if(isset($_POST['mno']))
{
	$mobileno=$_POST['mno'];
	$msg=$_POST['msg'];

	$test = "0";

	$sender = "TXTLCL";
	$numbers = "$mobileno";
	$message = "$msg";

	$message = urldecode($message);
	$data = "username=".$username."&hash=".$hash."$message=".$message."$sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
}