<?php
session_start();
include "connect.php";
 $sql="SELECT * FROM staff ";
 $result=mysqli_query($conn,$sql);

if(isset($_POST['submit']))
{
 $username=$_POST['username'];
 $password=$_POST['password'];

  $_SESSION['username'] = $username;
   
 $sql="SELECT * FROM staff WHERE username='$username' AND password ='$password'";
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)!=0)
  {
echo "<script>alert('Login successful');</script>";
header("Location:home.php");
  }
  else
echo "<script>alert('Invalid username or password');</script>";
}
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>

  <html lang="en-US">
  <head>

    <meta charset="utf-8">

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

  </head>

  <body>
  
    <div class="container">
     <center>WELCOME TO MARSA AGENCY</center> <br><br>
      <div id="login">

        <form  method="post">

          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input type="text" placeholder="Username" name="username"  ></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fontawesome-lock"></span><input type="password"  placeholder="password" name="password" ></p> <!-- JS because of IE support; better: placeholder="Password" -->
            <p><input type="submit" value="Sign In" name="submit"></p>

          </fieldset>

        </form>

        <p>Not a member? <a href="signup.php">Sign up now</a><span class="fontawesome-arrow-right"></span></p>

      </div> <!-- end login -->

    </div>

  </body>
</html>

</body>

</html>