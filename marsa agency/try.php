 <?php
 include('connect.php');

  $query = "SELECT COUNT(company) FROM insurance WHERE seating < 3 AND company LIKE '%AXXA%'";
  $query = "SELECT COUNT(company) FROM insurance WHERE seating < 3 AND company LIKE '%ETIKA%'  ";

 if($conn->multi_query($query))
        {
          $result = $conn->store_result();
          $row = $result->fetch_assoc();
          echo "<pre>";
          print_r($row);

          $conn->next_result();
          $result = $conn->store_result();
          $row = $result->fetch_assoc();
          echo "<pre>";
          print_r($row);
        }