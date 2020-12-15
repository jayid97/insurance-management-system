<?php
include ("connect.php");

     $_SESSION['viewid'] = $_POST['viewid'];
     $id = $_SESSION['viewid'] ;
     $sql = "SELECT * FROM insurance WHERE vehicleNo ='$id'";
     $result  = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($result);

echo date('D-m-Y');
     
 ?>



<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/viewD.css">
<link rel="stylesheet" href="css/menu.css">
<title>Customer Detail</title>   
<body>
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
<body>
<br><br>
<center><h3>Customer Detail</h3></center>

<div>
  <div class="register">
   <form method="post" action="" onsubmit="return checkform();" id="form"> 
    <div class="dalam">
    <b>NAME</b>
    <?php echo $row['name'];?>
    <br><br>
    <b>NRIC</b>
    <?php echo $row['NRIC'];?><br><br>
    <b>ADDRESS</b>
   <?php echo $row['address'];?><br><br>
    <b>POSCODE</b>
   <?php echo $row['poskod'];?><br><br>
    <b>STATE</b>
   <?php echo $row['state'];?><br><br>
    <b>CONTACT NO</b>
    <?php echo $row['phone'];?><br><br>
    <b>VEHICLE REG NO</b>
    <?php echo $row['vehicleNo'];?><br><br>
    <b>PERIOD OF INSURANCE</b>
     <?php echo $row['periodFrom'];?>
    <b>TO</b>
    <?php echo $row['periodTo'];?><br><br>
    <b>TYPE OF COVER</b>
    <?php echo $row['cover'];?><br><br>
    <b>COMPANY</b>
    <?php echo $row['company'];?><br><br>
    <b>TYPE OF USE</b>
   <?php echo $row['uses'];?><br><br>
     <b>MODEL</b>
    <?php echo $row['model'];?><br><br>
    <b>YEAR OF MFG</b>
   <?php echo $row['year'];?><br><br>
    <b>BODY TYPE</b>
   <?php echo $row['body'];?><br><br>
    <b>ENGINE NO</b>
    <?php echo $row['engineNo'];?><br><br>
    <b>CHASSIS NO</b>
    <?php echo $row['chassisNo'];?><br><br>
    <b>ENGINE CC</b>
    <?php echo $row['engineCC'];?><br><br>
    <b>NCD</b>
   <?php echo $row['ncd'];?><br><br>
    <b>ROADTAX EXPIRE</b>
   <?php echo $row['roadtax'];?><br><br>
    <b>REMARK</b>
    <?php echo $row['remark'];?><br><br>
    <?php echo $row['remark1'];?><br><br>
    <?php echo $row['remark2'];?><br><br>
  <button onclick="myFunction()"  class="print" id="printPageButton">Print </button>
  </form>
  </div>
  </form>
</div>

</body>
</html>

<script>
function myFunction() {
    window.print();
}
</script>
