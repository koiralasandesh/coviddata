# coviddata

a web application to to display covid information based on different criteria

##Requirement:##

1. You should already have the COVID Database set up as “covid19” in your system.
##Install:##
1. Extract the provided zip into “xampp/htdocs/” or corresponding folder in your machine.
2. Start apache and php server (manually or via xampp).
##Use:##
1. Visit http://localhost/covid on your browser.
2. The page has hyperlink to 5 queries.
3. Click on Link you wish to visit.
4. For each Query, Description is provided at the top of page. Provide Input as described by
   the input field and click “Submit”.
   a. For Query 1, Input Name of State whose data you want to view and click submit.
   If there exists data for the state, the data will populate on screen. If there is no
   data for the given state, the system will warn you as such.
   b. For Query 2, Input the name of state, County Name and Date, you wish to view
   data for. The data will populate in screen if it exists. If there is no data for given
   combination of input, the system will warn you as such.
   c. For Query 3, Provide name of new county, the state it lies in and the population of
   the county as prompted, the data will be recorded into database and the system
   will inform you. If the data couldn’t be added, the system will warn as such.
   d. For Query 4, Input the county name and state you wish to modify.
   Since there can be counties with same name in several states, you are required to input the state name the county falls in.
   You can choose to update only the “Name” of the county or “Name”, “State” and “Population” of the county.
   In order to update only the name, populate only the “New County Name” input field and submit. The county will be in same “State” with same “Population” as before.
   In order to update all values for the county, populate all input field. The county will now be linked to the New “State” you provided with new “Population”.
   e. For Query 5, Input the “County Name” and the “State Name” it lies in and click submit.
   Since there can be counties with same name in several states, you are required to input the state name the county lies in.
   The county will be deleted, and you will be informed as such.
