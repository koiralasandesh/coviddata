
<!--
  Created By: Sandesh Koirala 
  UTA ID#: 1001552326

-->

<html>
<head>
  <title> Query 2 Controller</title>
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
    $county_name = filter_input(INPUT_POST, 'county_name');
    $date = filter_input(INPUT_POST, 'date');
    $query = "SELECT C.Daily_Count_Cases,C.Daily_Deaths
    FROM coviddata C, states S
    WHERE C.State_Ab=S.State_Ab AND S.State_Name=:name AND C.County_Name=:county_name AND C.CDate=:date";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(':name' => $name,"county_name"=>$county_name,"date"=>$date));
    if (($rows = $stmt->fetchALL(PDO::FETCH_ASSOC))==NULL){
      echo "No records match for given data!";
      die();
    }
    else{
  ?>
  <b> All matching records are given:</b><br><br>
  <table>
  <thead>
  <td>Daily Count Cases</td>
  <td>Daily Deaths</td>
  </thead>
  <?php foreach ($rows as $row) { ?>
  <tr>
  <td><?php echo $row["Daily_Count_Cases"];?></td>
  <td><?php echo $row["Daily_Deaths"];?></td>
  </tr>
  <?php } } }?>
  </table>
    
 
</body>
</html>