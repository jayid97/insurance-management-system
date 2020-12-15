<?php 
session_start();
include('connect.php');
$sql="SELECT * FROM insurance ";
 $result=mysqli_query($conn,$sql);

  if(!isset($_SESSION['username']))
 {
  die(Header("Location: index.php"));
 }
 
if(isset($_POST['search']))
{
  $company = $_POST['company'];
  $vehicle = $_POST['vehicle'];
  $from = $_POST['from'];
  $start = date("Y-m-d", strtotime($from));
  $to = $_POST['to'];
  $end = date("Y-m-d", strtotime($to));
   
   if($company == 'all' && $vehicle == 'all')
  {
     $search = mysqli_query($conn,"SELECT * FROM insurance WHERE roadtax BETWEEN '$start' AND '$end' ORDER BY roadtax");
  }
  else if ($company == 'all') {
      $search = mysqli_query($conn,"SELECT * FROM insurance WHERE roadtax BETWEEN '$start' AND '$end' AND vehicleNo LIKE '$vehicle' ORDER BY roadtax");
  }
 else if ($vehicle == 'all') {
      $search = mysqli_query($conn,"SELECT * FROM insurance WHERE roadtax BETWEEN '$start' AND '$end' AND company LIKE '$company' ORDER BY roadtax");
  }
   else
  {
  
   $search = mysqli_query($conn,"SELECT * FROM insurance WHERE roadtax BETWEEN '$start' AND '$end' AND company LIKE '$company' AND body LIKE '$vehicle' ORDER BY roadtax");
   }
  $count = mysqli_num_rows($search);
}


?>
<html>
<title>Check</title>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/sales.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    @media print {
  .h2 {
    display: none;
  }

.menu-bar
{
  display: none;
}

.form
{
  display: none;
}

.print
{
  visibility: hidden;
}

}

.print
{
  background-color:  #ffa31a;
    color: white;
    padding: 10px 14px;
    margin: 8px 0;
    width: 5%;
    border: none;
    cursor: pointer;
    opacity: 0.9;
}
  </style>



<div class="header">
    <div class="nav">
      <ul class="menu-bar">
        <li>MARSA AGENCY</li>
        <li>Home</li>
        <li><a href="inputData.php">Add Customer</a></li>
        <li><a href="home.php">Insurance</a></li>
        <li><a href="report.php">Sales Report</a></li>
        <li><a href="check.php">Check</a></li>
        <li><a href="logout.php">Log Out</a></li>        
      </ul>
</div>
<center>
  <h2>Customer Expiry Dates</h2>
</center>
<form action="check.php" method="POST">
  <div class="ruang">
    <div class="form">
   Company <select name="company">
    <option value=""></option>
    <option value="all">All</option>
    <option value="Axa">Axa</option>
    <option value="Etiqa">Etiqa</option>
   </select><br><br>
   Types of Vehicle <select name="vehicle">
    <option value=""></option>
    <option value="all">All</option>
    <option value="Car">Car</option>
    <option value="Lorry">Lorry</option>
    <option value="Motorcycle">Motorcycle</option>
   </select><br><br>
   From <input type="date" name="from" ><br><br>
   To <input type="date" name="to" ><br><br>
   Gross <input type="text" name="gross"><br><br>
   <input type="submit" name="search" value="Search" >
 </div>
   <br><br>
 </form>
  <?php
  if(isset($_POST['search']))
{

  $company = $_POST['company'];
  $vehicle = $_POST['vehicle'];
  $from = $_POST['from'];
  $start = date("Y-m-d", strtotime($from));
  $to = $_POST['to'];
  $end = date("Y-m-d", strtotime($to));
  
  if($company == 'all' && $vehicle == 'all')
  {
     $search = mysqli_query($conn,"SELECT * FROM insurance WHERE roadtax BETWEEN '$start' AND '$end' ORDER BY roadtax");
  }
  else if ($company == 'all') {
      $search = mysqli_query($conn,"SELECT * FROM insurance WHERE roadtax BETWEEN '$start' AND '$end' AND vehicleNo AND LIKE '$vehicle' ORDER BY roadtax");
  }
 else if ($vehicle == 'all') {
      $search = mysqli_query($conn,"SELECT * FROM insurance WHERE roadtax BETWEEN '$start' AND '$end' AND company LIKE '$company' ORDER BY roadtax");
  }
 

  else
  {
  
   $search = mysqli_query($conn,"SELECT * FROM insurance WHERE roadtax BETWEEN '$start' AND '$end' AND company LIKE '$company' AND body LIKE '$vehicle' ORDER BY roadtax");
   }

     $count = mysqli_num_rows($search);
     
    if($count == "0")
    {
      echo "'<h2>'Not Found'</h2>'";
    }
    else
    {
      ?>
      <table border="1" id="myTable">
      <tr>
      <th>No</th><th>Name</th><th>Date</th><th>Phone Number</th><th>Plate No</th><th>IC No</th><th>Vehicle Type</th>  
    </tr>
      <?php

      $count = 1;
      $total_commision = 0;
      while($row = mysqli_fetch_array($search)) 
      {
        ?>
       <tr>
      <td><?php echo $count++?></td>
      <td><?php
     echo $row['name'];
      ?></td>
<td><?php
     echo $row['roadtax'];
?></td>
<td><?php
     echo $row['phone'];
?></td>
<td><?php
     echo $row['vehicleNo'];
?></td>
<td><?php
     echo $row['NRIC'];
?></td>
<td><?php
     echo $row['body'];
?></td>
<td><?php
     echo $row['status'];
?></td>
</tr>

<?php
      }
    }
}
    ?>
       </table>
       
<button onclick="myFunction()"  class="print" id="printPageButton">Print </button>
     </div>
</html>

<script>
function myFunction() {
    window.print();
}
</script>
