<?php
session_start();
include "connect.php";
 $sql="SELECT * FROM insurance ";
 $result=mysqli_query($conn,$sql);
  
 
  if(!isset($_SESSION['username']))
 {
  die(Header("Location: index.php"));
 }
 
echo date('D-m-Y');

 if(isset($_POST['delete']))
{
  $delete = $_POST['deleteid'];
$sql="DELETE  FROM insurance WHERE  vehicleNo='$delete'";

 if($conn->query($sql)===TRUE)
 {
  ?><script>alert("Successful Delete")
        window.location.href="insurance.php";
      </script>
 <?php
 }

}



?>﻿

<html>
<title>Insurance List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/menu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/insuranceD.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
Welcome <?php echo $_SESSION["username"] ; ?>
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
           <li class="search-container">        
        <form action="insurance.php" method="POST">        
     <input type="text" placeholder="Enter to Search" name="cari"><input type="submit" name="search"></li>
        </form>
      </ul>
</div>


<table id="table">
<thead>
<th>NRIC</th><th>Name</th><th>Address</th><th>Postcode</th><th>State</th><th>Phone No</th><th>Plate No</th><th>Remark </th>
<th>Cover</th><th>Company</th><th>Model</th><th>Year</th><th>Body Type</th><th >Engine No</th><th >Chassis No</th><th >Engine CC</th><th >NCD</th><th>Commision</th><th>Roadtax Expired</th><th>Status</th><th></th>
</thead>
<?php
    while($row=mysqli_fetch_array($result))
        
    {
?>    
<tbody>
<td><?php
     echo $row['NRIC'];
?></td>
<td>
<?php
     echo $row['name'];
?>
    </td>
<td>
<?php
     echo $row['address'];
?>
    </td>
<td>
<?php
     echo $row['poskod'];
?>
    </td>    
<td>
<?php
     echo $row['state'];
?>
    </td>
<td>
<?php
     echo $row['phone'];
?>
    </td>
<td><?php
     echo $row['vehicleNo'];
?></td>
<td><?php
     echo $row['remark'];
     echo "<br>";
     echo $row['remark1'];
     echo "<br>";
     echo $row['remark2'];
?></td>
<td>
<?php
     echo $row['cover'];
?>
    </td>
<td><?php
     echo $row['company'];
?></td>
<td>
<?php
     echo $row['model'];
?>
    </td>
<td>
<?php
     echo $row['year'];
?>
    </td>
<td>
<?php
     echo $row['body'];
?>
    </td>
<td>
<?php
     echo $row['engineNo'];
?>
    </td>
<td>
<?php
     echo $row['chassisNo'];
?>
    </td>
<td>
<?php
     echo $row['engineCC'];
?>
    </td>
<td>
<?php
     echo $row['ncd'];
?>
    </td>
<td>
<?php
     echo $row['commision'];
?>
    </td>
<td>
<?php
  echo date('d-M-Y', strtotime($row['roadtax']))
?>
    </td>
<td>
<?php 
     $date = $row['roadtax'];
     $expdate = date("Y-m-d",strtotime(date("Y-m-d",strtotime($date)). " - 9 day"));
     if(date("Y-m-d")< $expdate)
     {
       ?> <span style="color:#3f9aa3;text-align:center;">Roadtax is Live!</span>

       <?php

     }
     else
     {
      ?> <span style="color:#ad0d2b;text-align:center;">Almost Expired!</span>

      <?php

     } 
?>
    </td>
<td>
 <form method="post" action="insurance.php">
     <input name="deleteid" type="hidden" value="<?php echo $row['vehicleNo'];?>"/>
    <button class="delete" type="submit" name="delete" onclick="return confirm('Are you sure want to delete?');"><span class="glyphicon glyphicon-trash"></span> Delete</button>
  </form>
  <form action="edit.php" method="post">
     <input name="editid" type="hidden" value="<?php echo $row['vehicleNo'];?>"/>
    <button class="edit" type="submit" name="edit" onclick="return confirm('Are You sure want to edit ?')"><span class="glyphicon glyphicon-pencil"></span>Edit</button>
  </form>
  <form action="view.php" method="post">
     <input name="viewid" type="hidden" value="<?php echo $row['vehicleNo'];?>"/>
    <button class="print" type="submit" name="print" onclick="return confirm('Are You sure want to print ?')"><span class="glyphicon glyphicon-print"></span> Print </button><br><br>
  </form>
<button class="report"  onClick="window.open('https://api.whatsapp.com/send?phone=6<?php echo $row['phone']?>&text=Assalamualaikum%20insurance%20kenderaan%20anda%20<?php echo $row['vehicleNo']?>%20akan%20TAMAT%20tempoh%20<?php echo $row['roadtax']?>%2ESila%20datang%20ke%20Marsa%20Agency%20atau%20whatsapp%20ke%200195163088%20untuk%20pembaharuan','_blank');">
     <span class="glyphicon glyphicon-envelope">Reminder</span>
</button>
    </td>        
</tbody>
 <?php
  }
  ?>       
</table>    
</body>    
</html>
