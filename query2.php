<!--
  Created By: Sandesh Koirala 
  UTA ID#: 1001552326

-->

<html>​

<head>​

<title>Query 2</title>​

</head>​

<body>​

<form method="post" action="query2_controller.php">
<b> Display the covidData record details based on any state name, county name, and the date.</b></br>​

    <fieldset>​

       <legend> Please Provide Required Inputs to see matching records:</legend>​

<label id="label" for="name"> State Name </label> </br>​

<input type="text" name="name" placeholder="State" > </br>
<label id="label" for="county_name"> County Name </label> </br>
<input type="text" name="county_name" placeholder= "County"> </br>
<label id="label" for="date"> Date </label> </br>
<input type="text" name="date" placeholder=" Date" > </br>​

    <input id="button" type="submit" name="submit">​

  </fieldset>​

​

</body>​

</html>
