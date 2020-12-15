<?php
session_start();
include "connect.php";
$sql="SELECT * FROM staff ";
 $result=mysqli_query($conn,$sql);

 if (isset($_POST['submit'])) {

    $ic =  $_POST['ic'];
    $username =  $_POST['username'];  
    $password = $_POST['password'];  
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $checkUsername = $conn->query("SELECT username FROM staff WHERE username='$username'"); 
    $numOfStaff = $checkUsername->num_rows;   if ($numOfStaff == 0){ 
     $query  = "INSERT INTO staff(ic,username,phone,email,password) VALUES ('$ic','$username','$phone', '$email', '$password')"; 
if ($conn->query($query)) {
            $msg = "Successfully register!  ";
            Header("Location: index.php");
        } else {
            $msg = "Error while registering ! ";
        }
    } else {
        $msg = "Username have been taken";
    }
  }
    $conn->close();
?>

     <?php
if (isset($msg)) {
    echo '<p style="color:black;text-align:center">'.$msg.'</p>';
    echo '<br>';
}
?>
<html>
<style>
body {font-family: Arial;
      background-color: #263238;
}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password],input[type=email] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    border-bottom: 1px solid orange;
    background-color: #263238;
    color: white;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #ffcf33;
    margin-bottom: 25px;
}
h1 {
    color: #f7810a;
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 30px;
    text-align: center;
}
/* Set a style for all buttons */
input[type=submit] {
    background-color:  #ea4c88;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}


/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
    background-color: #263238;
    width: 40%;
    margin-left: 30%;
    margin-top: 5%;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>

<form action=""  method="post" class ="login" name = "form" id="form" onsubmit="return validateform();">
  <div class="container">
    <h1>Sign Up</h1>
    <hr>

    <input type="text" placeholder="Enter IC" name="ic" id="ic">
    <input type="email" placeholder="Enter Email" name="email" id="email">


    <input type="text" placeholder="Enter Username" name="username" id="username">


    <input type="password" placeholder="Enter Password" id="password"  name="password" >

    <input type="text" placeholder="Enter Phone" id="phone"  name="phone" maxlength="12">

    <div class="clearfix">
      <input type = "submit" value="Register" name="submit">
    </div>
  </div>
</form>

</body>
</html>
<script>


function validateform()
{

  var name=document.forms["form"]["username"].value;
  var ic=document.forms["form"]["ic"].value;
  var email = document.forms["form"]["email"].value;
  var phone = document.forms["form"]["phone"].value;
  var password = document.forms["form"]["password"].value;

  if(username == "")
  {
    alert('Name Cannot Be Empty!');
    return false;
  }

  if(username =="" || username.length < 5)
  {
    if(username=="")
    {
      alert('Username cannot be empty!');
      return false;
    }
    else if(username.length < 5)
    {
      alert('Username must be at least 5 characters!');
      return false;
    }

  }

  if(ic.length < 4)
  {
    alert('IC must be exactly 4 or more characters!');
    return false;
  }


if(phone == "")
{
  alert('Phone number cannot be empty!');
  return false;
}
else if(phone.length < 10 || phone.length > 11)
{
  alert('Invalid Phone Number');
  return false;

}

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

 if(email == "" || reg.test(email) == false)
    {
      if(email == "")
      {
        alert('Email cannot be empty!');
        return false;
      }

      if (reg.test(email) == false) 
        {
          alert('Email is not valid!');
          return false;
        }
    }




      if(password =="")
      {
        alert('Password cannot be empty!');
        return false;
      }
      else if(password.length < 6)
      {
        alert('Password must be more than 6 characters!');
        return false;
      }
}
</script>