<?php
include ("connect.php");

     $_SESSION['editid'] = $_POST['editid'];
     $id = $_SESSION['editid'] ;
     $sql = "SELECT * FROM insurance WHERE vehicleNo ='$id'";
     $result  = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($result);

    if (isset($_POST['submit'])) 
    {

    $date = date('Y-m-d');
    $id1 = $_POST['vehicleNo'];
    $name = $_POST['name'];
    $NRIC = $_POST['NRIC'];
    $address = $_POST['address'];
    $poskod = $_POST['poskod'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];
    $periodTo = $_POST['periodTo'];
    $periodFrom = $_POST['periodFrom'];
    $cover = $_POST['cover'];
    $company = $_POST['company'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $poskod = $_POST['poskod'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];
    $body = $_POST['body'];
    $engineNo = $_POST['engineNo'];
    $chassisNo = $_POST['chassisNo'];
    $engineCC = $_POST['engineCC'];
    $ncd = $_POST['ncd'];
    $roadtax = $_POST['roadtax'];
    $net = $_POST['net'];
    $gross = $_POST['gross'];
    $cal = $gross - $net;
    $commision = $_POST['commision'];
    $remark = $_POST['remark'];
    $remark1 = $_POST['remark1'];
    $remark2 = $_POST['remark2'];
    $status = $_POST['status'];

      $sql1 = "UPDATE insurance SET vehicleNo ='$id1', name = '$name', NRIC = '$NRIC', address = '$address', poskod ='$poskod', state = '$state', phone = '$phone',periodFrom = '$periodFrom', periodTo = '$periodTo', cover ='$cover', company = '$company', model = '$model', year='$year', body ='$body', engineNo ='$engineNo',chassisNo = '$chassisNo', engineCC = '$engineCC', ncd = '$ncd', roadtax ='$roadtax', remark ='$remark', remark1 ='$remark1' ,remark2 ='$remark2', net = '$net', gross = '$gross', commision = '$cal', dateKeyIn ='$date', status='$status'   WHERE vehicleNo = '$id1'";

      if($conn->query($sql1) === TRUE)
      {
       ?> <script>alert("Successful Update")
        window.location.href="home.php";
      </script>
       <?php
   {
    echo "Unable to add".$conn->error;
    }
    }
      

     }
 ?>



<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/editD.css">
<title>Edit Data</title>
</head>
<body>
<div class="header">
    <div class="nav">
      <ul class="menu-bar">
        <li>MARSA AGENCY</li>
        <li>Home</li>
        <li><a href="inputData.php">Add Customer</a></li>
        <li><a href="home.php">Insurance</a></li>
        <li><a href="report.php">Sales Report</a></li>
        <li><a href="logout.php">Log Out</a></li>        
      </ul>
</div>>

<body>
<br><br><br>
<center><h3>EDIT DATA</h3></center>

<div>
  <div class="register">
     <form method="post" action="edit.php" onsubmit="return checkform();" id="form"> 
    <div class="dalam">
    <b>NAME</b>
    <input type="text" id="name" name="name" value="<?php echo $row['name'];?>" ><br><br>
    <b>NRIC</b>
    <input type="text" id="NRIC" name="NRIC" value="<?php echo $row['NRIC'];?>"  maxlength="12">EG : 9123450298<br><br>
    <b>ADDRESS</b>
    <input type="text" id="address" name="address" value="<?php echo $row['address'];?>" ><br><br>
    <b>POSTCODE</b>
    <input type="text" id="poskod" name="poskod" value="<?php echo $row['poskod'];?>" >EG :06500 LANGGAR<br><br>
    <b>STATE</b>
    <input type="text" id="state" name="state" value="<?php echo $row['state'];?>" >EG: KEDAH<br><br>
    <b>CONTACT NO</b>
    <input type="text" id="phone" name="phone" value="<?php echo $row['phone'];?>"  maxlength="11" >EG:0123456789<br><br>
    <b>VEHICLE REG NO</b>
    <input type="text" id="vehicleNo" name="vehicleNo" value="<?php echo $row['vehicleNo'];?>"  >EG : ABC123<br><br>
    
    <b>TYPE OF COVER</b>
    <select name ="cover">
   <option value="<?php echo $row['cover'];?>"><?php echo $row['cover'];?> </option>
   <option value="COMPREHENSIVE">Comprehensive</option>
   <option value="THIRD PARTY">Third Party</option>
   <option value="TPFT">TPFT</option>
   <option value="COMMERCIAL C PERMIT">Commercial C Permit</option>
   <option value="COMMERCIAL A PERMIT">Commercial A Permit</option>
   </select><br><br>
    <b>COMPANY</b>
   <select name ="company">
   <option value="<?php echo $row['company'];?>"><?php echo $row['company'];?> </option>
   <option value="ETIQA ">Etiqa Takaful</option>
   <option value="AXA ">Axa Affin</option>
   <option value="BERJAYA ">Berjaya Sampo</option>
   </select>
   </select> <br><br>
    <b>TYPE OF USE</b>
   <select name ="uses">
   <option value="<?php echo $row['uses'];?>"><?php echo $row['uses'];?> </option>
   <option value="Private Use">Private Use</option>
   <option value="Commercial">Commercial</option>
   </select> <br><br> 
     <b>MODEL</b>
    <input type="text" id="model" name="model" value="<?php echo $row['model'];?>"  ><br><br>
    <b>BODY TYPE</b>
   <select name ="body">
   <option value="<?php echo $row['body'];?>"><?php echo $row['body'];?></option>
   <option value="CAR">Car</option>
   <option value="MOTORCYCLE">Motocycle</option>
   <option value="LORRY">Lorry</option>
   </select> <br><br>
   <b>ENGINE CC</b>
    <input type="text" id="engineCC" name="engineCC" value="<?php echo $row['engineCC'];?>" >EG :100<br><br>

    <b>YEAR OF MFG</b>
    <input type="text" id="year" name="year" value="<?php echo $row['year'];?>"  >EG :1234<br><br>
    
    <b>ENGINE NO</b>
    <input type="text" id="engineNo" name="engineNo" value="<?php echo $row['engineNo'];?>"  ><br><br>
    <b>CHASSIS NO</b>
    <input type="text" id="chassisNo" name="chassisNo" value="<?php echo $row['chassisNo'];?>"  ><br><br>
    <b>NCD</b>
    <input type="text" id="ncd" name="ncd" value="<?php echo $row['ncd'];?>"  ><br><br>
     <b>PERIOD OF INSURANCE</b>
    <input type="date" id="periodFrom" name="periodFrom" value="<?php echo $row['periodFrom'];?>" >
    <b>TO</b>
    <input type="date" id="periodTo" name="periodTo" value="<?php echo $row['periodTo'];?>" ><br><br>
    <b>ROADTAX EXPIRE</b>
    <input type="date" id="roadtax" name="roadtax" value="<?php echo $row['roadtax'];?>"  ><br><br>
    <b>GROSS AMOUNT</b>
    <input type="text" id="amount" name="gross" value="<?php echo $row['gross'];?>"  ><br><br>
    <b>NET AMOUNT</b>
    <input type="text" id="amount" name="net" value="<?php echo $row['net'];?>"  ><br><br>
    <b>STATUS</b>
   <select name ="status">
   <option value="Renew">Renew</option>
   <option value="Not Renew">Not Renew</option>
   </select> <br><br>
    <b>REMARK :</b>
    <input type="text" id="remark" name="remark" value="<?php echo $row['remark'];?>" ><br><br>
    <input type="text" id="remark1" name="remark1" value="<?php echo $row['remark1'];?>"  ><br><br>
    <input type="text" id="remark2" name="remark2" value="<?php echo $row['remark2'];?>"  ><br><br>
     <input name="submitid" type="hidden" value="<?php echo $row['vehicleNo'];?>"/>
    <input type="submit" value="Submit" name="submit" onclick="return confirm('Are you sure want to submit?');">
  </div>
  </form>

</div>

</body>
</html>
<script>
function checkform()
{

  var name=document.forms["form"]["name"].value;
  var nric=document.forms["form"]["NRIC"].value;
  var add=document.forms["form"]["address"].value;
  var poskod=document.forms["form"]["poskod"].value;
  var state=document.forms["form"]["state"].value;
  var periodTo=document.forms["form"]["periodTo"].value;
  var periodFrom=document.forms["form"]["periodFrom"].value;
  var plateNo=document.forms["form"]["vehicleNo"].value;
  var cover=document.forms["form"]["cover"].value;
  var company=document.forms["form"]["company"].value;
  var model=document.forms["form"]["model"].value;
  var phone = document.forms["form"]["phone"].value;
  var uses=document.forms["form"]["uses"].value;
  var body=document.forms["form"]["body"].value;
  var engineNO=document.forms["form"]["engineNo"].value;
  var year=document.forms["form"]["year"].value;  
  var engineCC=document.forms["form"]["engineCC"].value;  
  var seating=document.forms["form"]["seating"].value;
  var ncd=document.forms["form"]["ncd"].value;
  var roadtax=document.forms["form"]["roadtax"].value;

  if(name == "")
  {
    alert('Name Cannot Be Empty!');
    return false;
  }



  if(nric.length < 4)
  {
    alert('IC must be exactly 4 or more characters!');
    return false;
  }
 


 if(add == "")
  {
    alert('Address cannot be empty!');
    return false;
  }

 if(poskod == "")
  {
    alert('Postcode cannot be empty!');
    return false;
  }

   if(state == "")
  {
    alert('State cannot be empty!');
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


 if(cover == "")
  {
    alert('Cover Cannot Be Empty!');
    return false;
  }
 
 if(company == "")
  {
    alert('Company Cannot Be Empty!');
    return false;
  }

  if(uses == "")
  {
    alert('Type Of Use Cannot Be Empty!');
    return false;
  }

  if(model == "")
  {
    alert('Model Cannot Be Empty!');
    return false;
  }

   if(year == "")
  {
    alert('Year Of NFG Cannot Be Empty!');
    return false;
  }
    if(body == "")
  {
    alert('Body Type Cannot Be Empty!');
    return false;
  }
    if(engineNO == "")
  {
    alert('Engine No Cannot Be Empty!');
    return false;
  }
    if(chassisNo == "")
  {
    alert('Chassis No Cannot Be Empty!');
    return false;
  }
    if(engineCC == "")
  {
    alert('Engine CC Cannot Be Empty!');
    return false;
  }
    if(seating == "")
  {
    alert('Seating Capacity Cannot Be Empty!');
    return false;
  }
    if(ncd == "")
  {
    alert('NCD Cannot Be Empty!');
    return false;
  }
    if(roadtax == "")
  {
    alert('Roadtax Expire Cannot Be Empty!');
    return false;
  }
      if(periodFrom == "")
  {
    alert('Start Of Period Cannot Be Empty!');
    return false;
  }
      if(periodTo == "")
  {
    alert('End Of Period Cannot Be Empty!');
    return false;
  }

  if(periodTo != roadtax)
  {
    alert('The End of Period Must Be Same With Roadtax ');
    return false;
  }
}
</script>