<!--
  Created By: Sandesh Koirala 
  UTA ID#: 1001552326

-->

<html>
<head>
  <title> Query 4 Controller</title>
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
    $new_name = filter_input(INPUT_POST,'new_name');
    $old_state_name = filter_input(INPUT_POST, 'old_state_name');
    $new_state_name = filter_input(INPUT_POST, 'new_state_name');
    $popn = filter_input(INPUT_POST, 'popn');
    if ($new_state_name !=NULL && $popn!=NULL){
      $query="UPDATE `counties` SET `County_Name`=:new_name,`State_Ab`=(SELECT State_Ab FROM states WHERE State_Name =:new_state_name),`Population` = :popn WHERE `County_Name`=:name AND `State_Ab`=(SELECT State_Ab FROM states WHERE State_Name = :old_state_name)";
      $stmt = $conn->prepare($query);
      if($stmt->execute(array(':name' => $name,":new_name"=>$new_name,":old_state_name"=>$old_state_name,":new_state_name"=>$new_state_name,":popn"=>$popn)))
      {
        echo "Old County Name: ";
        echo $name;
        echo '</br>';
        echo "Old State Name: ";
        echo $old_state_name;
        echo '</br>';
        echo '</br>';
        echo "New County Name: ";
        echo $new_name;
        echo '</br>';
        echo "New State Name: ";
        echo $new_state_name;
        echo '</br>';
        echo "New Population: ";
        echo $popn;
        echo "</br>";
        echo "</br>";

        echo "County Updated Successfully !";
        echo '</br>';
      }
      else{
        echo "Couldnt Update Record!";
      }
    }
    else{
      $query="UPDATE `counties` SET `County_Name`=:new_name WHERE `County_Name`=:name AND `State_Ab`=(SELECT State_Ab FROM states WHERE State_Name = :old_state_name)";
      $stmt = $conn->prepare($query);
      if($stmt->execute(array(':name' => $name,":new_name"=>$new_name,":old_state_name"=>$old_state_name)))
      {
        echo "Old County Name: ";
        echo $name;
        echo '</br>';
        echo "Old State Name: ";
        echo $old_state_name;
        echo '</br>';
        echo '</br>';
        echo "New County Name: ";
        echo $new_name;
        echo '</br>';
        echo "New State Name: ";
        echo $old_state_name;
        echo "</br>";
        echo "</br>";

        echo "County Updated Successfully !";
        echo '</br>';

      }
      else{
        echo "Couldnt Update Record!";
      }
    }
  }

  ?>
</body>
</html>