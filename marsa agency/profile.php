<html>
<head>
<center><h1 style="font-family: monospace;text-shadow: 1px 1px 5px #ffa31a;">Profile</h1></center>
</head> 
<style>
{box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial;
}

.topnav {
  overflow: hidden;
  background-color: #404040;
  box-shadow: 10px 10px 5px grey;
  position: fixed;
  width: 100%;
}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 12px 16px;
  text-decoration: none;
  font-size: 18px;
  font-style: italic;
  text-shadow: 1px 1px 5px red;
}

.topnav a:hover {
  background-color:  #ffebcc;
  color: black;
}

.topnav a.active {
  background-color:  #ffa31a;
  color: white;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>

<body>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="insurance.php">Customer</a>
  <a href="inputData.php">Add Customer</a>
  <a href="logout.php">Log Out</a>
</div>
</body>
</html>
<?php 
session_start();

// connects to the database
$mysqli = new mysqli("localhost","root","","marsa agency");

$query = "SELECT * FROM staff WHERE username = '".$_SESSION['username']."'";
if($result = $mysqli->query($query))
{
    while($row = $result->fetch_assoc())
    {
        echo "<br><br><br><br><br><br>";
        echo "<center>";
        echo "<h2>User Profile</h2>";
        echo "</center>";
        echo "<br>";
        echo "<div class='card'>";
        echo "<br><h2>".$row['username'];
        echo "</h2>";
        echo "<br />".$row['email'];
        echo "<br>";
        echo "<br />".$row['phone'];
        echo "<br>";
        echo "<br /> ".$row['title'];
        echo "<br>";
        echo "<form action='update.php' method='post'>";
        echo "";
        echo "<button>Update</button>";
        echo "</form>";
        echo "</div>";   
    }
    $result->free();
}
else
{
    echo "No results found";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

</body>
</html>