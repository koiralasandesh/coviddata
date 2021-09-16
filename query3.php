<!--
  Created By: Sandesh Koirala 
  UTA ID#: 1001552326

-->

<html>​

<head>​

<title>Query 3</title>​

</head>​

<body>
<b><br>Insert a new county called ‘Covidd’ in the COUNTIES table in the database. <br>You should insert
values for all the attributes in the COUNTIES table.<br> Link the new county with the state of Texas in
the states table.​<br></b>

<form method="post" action="query3_controller.php">​

    <fieldset>​

       <legend> Please Provide Required Inputs:</legend>​

<label id="label" for="name"> County Name </label> </br>
<input type="text" name="name" placeholder="County Name" > </br></br>
<label id="label" for="state_name"> State Name </label> </br>
<input type="text" name="state_name" placeholder= "State Name"> </br></br>
<label id="label" for="popn"> Population</label> </br>
<input type="text" name="popn" placeholder="Population" > </br></br>​

    <input id="button" type="submit" name="submit">​

  </fieldset>​

​

</body>​

</html>
