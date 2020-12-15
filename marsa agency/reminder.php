<?php
include ("connect.php");

     $_SESSION['reminderid'] = $_POST['reminderid'];
     $id = $_SESSION['reminderid'] ;
     $sql = "SELECT * FROM insurance WHERE vehicleNo ='$id'";
     $result  = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($result);
    
 ?>



<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/reportD.css">
<link rel="stylesheet" href="css/menu.css">
<title>Report</title>
<style>
{box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial;
}



@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  
  
  @media print {
  .h3 {
    display: none;
  }

  @page{
  size: A5;
}  
}
</style>    
</head>
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
<br><br><br><br>


<div>
  <div class="register">
   <form method="post" action="" onsubmit="return checkform();" id="form"> 
    <div class="dalam">
    <img src="header.png"><br><br>
     Kepada : <br>
    <b><?php echo $row['name'];?><br>
    <?php echo $row['address'];?>,<br>
    <?php echo $row['poskod'];?>,<br>
    <?php echo $row['state'];?></b><br>         
    <br>
    Assalamualaikum, kami dari Marsa Agency.Kami ingin mengucapkan ribuan terima kasih kerana sudi menggunakan perkhidmatan kami.Kami ingin memaklumkan kenderaan <b><?php echo strtoupper($row['vehicleNo'])?></b> bahawa insurance akan tamat tempoh pada <b><?php echo $row['roadtax'];?></b>.<br>Sekiranya tuan/puan ingin memperbaharui roadtax dan insurance, sila hubungi kami di Marsa Agency <br><b>
    (011-23521601)</b> bagi memperbaharui roadtax anda. Kami juga menerima pembayaran secara kad kredit dan debit.

    Sekian, terima kasih.
    <br><br>
    <img src="logo.png"><br><br>
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
