<!--
  Created By: Sandesh Koirala 
  UTA ID#: 1001552326

-->

<html>
<head>
  <title> Query 1</title>
  <style>
  table,td,thead {
  border: 1px solid black;
  }
  </style>
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
  else
  {
    $name = filter_input(INPUT_POST, 'name');
    $query = "SELECT C.CDate,C.County_Name,C.Daily_Count_Cases,C.Daily_Deaths
      FROM coviddata C, states S
      WHERE C.State_Ab=S.State_Ab AND S.State_Name=:name";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(':name' => $name));
    if (($rows = $stmt->fetchALL(PDO::FETCH_ASSOC))==NULL){
      echo "Data for given state deos not exists!";
      die();
    }
    else{
  ?>
  <b> All maching records for <?php echo $name?> follows:</b></br></br>
  <table>
  <thead>
  <td>Date</td>
  <td>County Name</td>
  <td>Daily Count Cases</td>
  <td>Daily Deaths</td>
  </thead>
  <?php foreach ($rows as $row) { ?>
  <tr>
  <td><?php echo $row["CDate"];?></td>
  <td><?php echo $row["County_Name"];?></td>
  <td><?php echo $row["Daily_Count_Cases"];?></td>
  <td><?php echo $row["Daily_Deaths"];?></td>
  </tr>
  <?php } }} ?>
  </table>
    
 
</body>
</html>