
<?php
session_start();
include "connect.php";
$sql="SELECT * FROM insurance ";
 $result=mysqli_query($conn,$sql);

  if(!isset($_SESSION['username']))
 {
  die(Header("Location: index.php"));
 }
 

    if(isset($_POST['submit']))
    {
      $date = date('Y-m-d');
      $net = $_POST['netamount'];
      $gross = $_POST['grossamount'];
      $cal = $gross - $net;
      $selected_val = $_POST['cover'];
      $selected_val = $_POST['company'];
      $selected_val = $_POST['body'];
      $selected_val = $_POST['uses'];
        $sql = "INSERT INTO insurance (NRIC, name,address,poskod,state,phone,vehicleNo,remark,remark1,remark2,periodFrom,periodTo,cover,company,uses,model,year,body,engineNo,chassisNo,engineCC,capacity,ncd,roadtax,commision,net,gross,dateKeyIn)
        VALUES (".$_POST["NRIC"]."','".$_POST["name"]."','".$_POST["address"]."','".$_POST["poskod"]."','".$_POST["state"]."','".$_POST["phone"]."','".$_POST["vehicleNo"]."','".$_POST["remark"]."','".$_POST["remark1"]."','".$_POST["remark2"]."','".$_POST["periodFrom"]."','".$_POST["periodTo"]."','".$_POST["cover"]."','".$_POST["company"]."','".$_POST["uses"]."','".$_POST["model"]."','".$_POST["year"]."','".$_POST["body"]."','".$_POST["engineNo"]."','".$_POST["chassisNo"]."','".$_POST["engineCC"]."','".$_POST["ncd"]."','".$_POST["roadtax"]."','".$cal."','".$_POST["netamount"]."','".$_POST["grossamount"]."',$date)";
    }
    $sql = "INSERT INTO insurance (NRIC, name, address,poskod,state,phone,vehicleNo,remark,remark1,remark2,periodFrom,periodTo,cover,company,uses,model,year,body,engineNo,chassisNo,engineCC,ncd,roadtax,commision,net,gross,dateKeyIn)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssssssssssssiisddds" ,  $_POST['NRIC'], 
          $_POST['name'],$_POST['address'],$_POST['poskod'],$_POST['state'],$_POST['phone'], $_POST['vehicleNo'], $_POST['remark'],$_POST['remark1'],$_POST['remark2'], $_POST['periodFrom'], $_POST['periodTo'],$_POST['cover'],$_POST['company'],$_POST['uses'],$_POST['model'],$_POST['year'],$_POST['body'],$_POST['engineNo'],$_POST['chassisNo'],$_POST['engineCC'],$_POST['ncd'],$_POST['roadtax'],$cal,$_POST['netamount'],$_POST['grossamount'],$date);
        
    if($stmt->execute())
    {
    ?> <script>alert("Successful Insert")
    window.location.href="home.php";
    </script>
    <?php
   {
    echo "Unable to add".$conn->error;
    }
    }
?>
    




<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/menu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/inputD.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>Register</title>
<head> 
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
</div>
<br>
<center><h3>REGISTER INSURANCE</h3></center>
<div class="register">
  <form method="post" action="inputData.php" onsubmit="return validateform();" id="form"> 
    <div class="dalam">
    <b>NAME</b>
    <input type="text" id="name" name="name" placeholder="Enter Your name"><br><br>
    <b>NRIC</b>
    <input type="text" id="NRIC" name="NRIC" placeholder="Enter Your IC number.." maxlength="12">EG : 9123450298<br><br>
    <b>ADDRESS</b>
    <input type="text" id="address" name="address" placeholder="Enter Your address.."><br><br>
    <b>POSTCODE</b>
    <input type="text" id="poskod" name="poskod" placeholder="Enter Your Postcode..">EG :06500 LANGGAR<br><br>
    <b>STATE</b>
    <input type="text" id="state" name="state" placeholder="Enter Your State..">EG: KEDAH<br><br>
    <b>CONTACT NO</b>
    <input type="text" id="phone" name="phone" placeholder="Enter Your Phone Number.." maxlength="11" >EG:0123456789<br><br>
    <b>VEHICLE REG NO</b>
    <input type="text" id="vehicleNo" name="vehicleNo" placeholder="Enter Plate Num.." >EG : ABC123<br><br>
    
    <b>TYPE OF COVER</b>
    <select name ="cover">
   <option value=""></option>
   <option value="COMPREHENSIVE">Comprehensive</option>
   <option value="THIRD PARTY">Third Party</option>
   <option value="TPFT">TPFT</option>
   <option value="COMMERCIAL C PERMIT">Commercial C Permit</option>
   <option value="COMMERCIAL A PERMIT">Commercial A Permit</option>
   </select><br><br>
    <b>COMPANY</b>
   <select name ="company">
   <option value=""></option>
   <option value="ETIQA ">Etiqa Takaful</option>
   <option value="AXA ">Axa Affin</option>
   <option value="BERJAYA ">Berjaya Sampo</option>
   </select> <br><br>
    <b>TYPE OF USE</b>
   <select name ="uses">
   <option value=""></option>
   <option value="Private Use">Private Use</option>
   <option value="Commercial">Commercial</option>
   </select> <br><br> 
     <b>MODEL</b>
    <input type="text" id="model" name="model" placeholder="Enter Model.." ><br><br>
    <b>BODY TYPE</b>
   <select name ="body">
   <option value=""></option>
   <option value="CAR">Car</option>
   <option value="MOTORCYCLE">Motorcycle</option>
   <option value="LORRY">Lorry</option>
   </select> <br><br>
   <b>ENGINE CC</b>
    <input type="text" id="engineCC" name="engineCC" placeholder="Enter engine CC.." >EG :100<br><br>

    <b>YEAR OF MFG</b>
    <input type="text" id="year" name="year" placeholder="Enter year.." >EG :1234<br><br>
    
    <b>ENGINE NO</b>
    <input type="text" id="engineNo" name="engineNo" placeholder="Enter engine number.." ><br><br>
    <b>CHASSIS NO</b>
    <input type="text" id="chassisNo" name="chassisNo" placeholder="Enter chassis number.." ><br><br>
    <b>NCD</b>
    <input type="text" id="ncd" name="ncd" placeholder="Enter NCD.." ><br><br>
     <b>PERIOD OF INSURANCE</b>
    <input type="date" id="periodFrom" name="periodFrom" >
    <b>TO</b>
    <input type="date" id="periodTo" name="periodTo" ><br><br>
    <b>ROADTAX EXPIRE</b>
    <input type="date" id="roadtax" name="roadtax" placeholder="Enter Roadtax Expired Date.." ><br><br>
    <b>GROSS AMOUNT</b>
    <input type="text" id="amount" name="grossamount" placeholder="Enter Gross Amount.." ><br><br>
    <b>NET AMOUNT</b>
    <input type="text" id="amount" name="netamount" placeholder="Enter Net Amount.." ><br><br>
    
    <b>REMARK :</b>
    <input type="text" id="remark" name="remark" placeholder="Enter .." ><br><br>
    <input type="text" id="remark1" name="remark1" placeholder="Enter .." ><br><br>
    <input type="text" id="remark2" name="remark2" placeholder="Enter .." ><br><br>
     <input name="submitid" type="hidden" value="<?php echo $row['vehicleNo'];?>"/>
    <input type="submit" value="Submit" name="submit" onclick="return confirm('Are you sure want to submit?');">
  </div>
  </form>
</div>
</body>
</html>
<script>


function validateform()
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
  var ncd=document.forms["form"]["ncd"].value;
  var roadtax=document.forms["form"]["roadtax"].value;
  var commision=document.forms["form"]["commision"].value;
  var amount=document.forms["form"]["amount"].value;

  if(note == "")
  {
    alert('Cover Note Cannot Be Empty!');
    return false;
  }

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

 if (plateNo == "")
{
    alert('Plate cannot be empty!');
    return false;
}
else if(plateNo.length < 3)
{
 
    alert('Plate No must be exactly 3 or More');
    return false;
  
}

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

     if(amount == "")
  {
    alert('Amount Cannot Be Empty!');
    return false;
  }
     if(commision == "")
  {
    alert('Commision Cannot Be Empty!');
    return false;
  }
}
</script>