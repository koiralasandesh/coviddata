<!--
  Created By: Sandesh Koirala 
  UTA ID#: 1001552326

-->

<html>
<head>
  <title> Query 3 Controller</title>
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
  //else {
  // $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);

  //   if(mysqli_connect_error()){
  //     die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
  //   }
  else{
    $name = filter_input(INPUT_POST, 'name');
    $state_name = filter_input(INPUT_POST, 'state_name');
    $popn = filter_input(INPUT_POST, 'popn');

    $query="INSERT INTO `counties`(`County_Name`, `State_Ab`, `Population`) SELECT :name ,state_ab, :popn FROM states S WHERE State_name=:state_name AND state_ab=S.State_Ab";
    $stmt = $conn->prepare($query);

    if($stmt->execute(array(':name' => $name,":popn"=>$popn,":state_name"=>$state_name)))
    {
      echo "County Name: ";
      echo $name;
      echo '</br>';
      echo "State Name: ";
      echo $state_name;
      echo '</br>';
      echo "Population: ";
      echo $popn;
      echo '</br>';
      echo "</br>";

      echo "County Added successfully !";
      echo '</br>';
    }
    else{
      echo "Couldnt Add Record!";
      echo "</br>";
      echo "Record Already Exists!";
    }
  }

  ?>
</body>
</html>