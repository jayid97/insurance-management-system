<html>
<head>
  <title>Sending Sms using PHP</title>
</head>
<form action="sendsms.php" method="POST">
<label>Mobile Number</label>
<input type="text" name="num">
<br><br>
<label>Country Code</label>
<select name="Code">
  <option value = "">Select</option>
  <option value = "+60">Malaysia +60</option>
</select>
<br><br>
<label>Enter Message</label>
<input type="text" name="message">
<input type="submit" name="submit">    
</form>
</html>