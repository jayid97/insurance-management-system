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
     $search = mysqli_query($conn,"SELECT * FROM insurance WHERE dateKeyIn BETWEEN '$start' AND '$end' ORDER BY dateKeyIn");
  }
  else if ($company == 'all') {
      $search = mysqli_query($conn,"SELECT * FROM insurance WHERE dateKeyIn BETWEEN '$start' AND '$end' AND body LIKE '$vehicle' ORDER BY dateKeyIn");
  }
 else if ($vehicle == 'all') {
      $search = mysqli_query($conn,"SELECT * FROM insurance WHERE dateKeyIn BETWEEN '$start' AND '$end' AND company LIKE '$company' ORDER BY dateKeyIn");
  }
  
   else
  {
  
   $search = mysqli_query($conn,"SELECT * FROM insurance WHERE dateKeyIn BETWEEN '$start' AND '$end' AND company LIKE '$company' AND body LIKE '$vehicle' ORDER BY dateKeyIn");
   }
  $count = mysqli_num_rows($search);
}


?>
<html>
<title>Sales</title>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/sales.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
  <h2>Monthly Sales Report</h2>
</center>
<form action="report.php" method="POST">
  <div class="ruang">
   Company <select name="company">
    <option value=""></option>
    <option value="all">All</option>
    <option value="AXA AFFIN">AXA AFFIN</option>
    <option value="ETIQA TAKAFUL">ETIQA TAKAFUL</option>
     <option value="Berjaya ">Berjaya</option>
   </select><br><br>
   Types of Vehicle <select name="vehicle">
    <option value=""></option>
    <option value="all">All</option>
    <option value="CAR">Car</option>
    <option value="LORRY">Lorry</option>
    <option value="MOTORCYCLE">Motorcycle</option>
   </select><br><br>
   From <input type="date" name="from"><br><br>
   To <input type="date" name="to"><br><br>
   <input type="submit" name="search" value="Search">
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
     $search = mysqli_query($conn,"SELECT * FROM insurance WHERE dateKeyIn BETWEEN '$start' AND '$end' ORDER BY dateKeyIn");
  }
  else if ($company == 'all') {
      $search = mysqli_query($conn,"SELECT * FROM insurance WHERE dateKeyIn BETWEEN '$start' AND '$end' AND body LIKE '$vehicle' ORDER BY dateKeyIn");
  }
 else if ($vehicle == 'all') {
      $search = mysqli_query($conn,"SELECT * FROM insurance WHERE dateKeyIn BETWEEN '$start' AND '$end' AND company LIKE '$company' ORDER BY dateKeyIn");
  }
 
  else
  {
  
   $search = mysqli_query($conn,"SELECT * FROM insurance WHERE dateKeyIn BETWEEN '$start' AND '$end' AND company LIKE '$company' AND body LIKE '$vehicle' ORDER BY dateKeyIn");
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
      <th>No</th><th>Name</th><th>Date Key In</th><th>Plate No</th><th>Vehicle Type</th><th>Company</th><th>Status</th><th>Commision</th><th>Gross</th>
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
     echo $row['dateKeyIn'];
?></td>
<td><?php
     echo $row['vehicleNo'];
?></td>
<td><?php
     echo $row['body'];
?></td>
<td><?php
     echo $row['company'];
?></td>
<td><?php
     echo $row['status'];
?></td>
<td>
<?php
     echo $row['commision'];
     $total_commision += $row['commision'];
     ?>
    </td>  
 <td><?php
     echo $row['gross'];
     $total_gross += $row['gross'];
?></td>
</tr>
<?php
      }
      ?>
      <tr>
      <td>Total</td>
      <td colspan="6"></td>
      <td>
      <?php
     echo number_format($total_commision,2);
       ?>
    </td> 
     <td>
      <?php
     echo number_format($total_gross,2);
       ?>
    </td>
      </tr>
<?php 
    }
}
    ?>
       </table>
     </div>
</html>

