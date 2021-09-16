<!--
  Created By: Sandesh Koirala 
  UTA ID#: 1001552326

-->

<html>
<head>
  <title> Query 5 Controller</title>
</head>
<body>
  <?php

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "covid19";

  $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);

  if(!$conn)
  {
    die("Connection Failed");
  }
  else{
    $name = filter_input(INPUT_POST, 'name');
    $state_name = filter_input(INPUT_POST,'state_name');
      $query="DELETE FROM `counties` WHERE County_Name=:name AND State_Ab=(SELECT State_Ab FROM states WHERE State_Name = :state_name)";
      $stmt = $conn->prepare($query);
      if($stmt->execute(array(':name' => $name,":state_name"=>$state_name)))
      {
        echo "County Name: ";
        echo $name;
        echo '</br>';
        echo "State Name: ";
        echo $state_name;
        echo '</br>';
        echo "</br>";

        echo "County Deleted Successfully !";
        echo '</br>';
      }
      else{
        echo "County Does not Exist!";
      }
    }

  ?>
</body>
</html>