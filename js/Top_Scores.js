  /* This function is called when a logged in user 
             plays the game and gets a score */
 function updateScore(newScore) {
     //Get the JavaScript object that holds the data for the logged in user
     var usrObj = JSON.parse(localStorage[localStorage.loggedInUser]);

     //Update the user object with the new top score
     /* NOTE YOU NEED TO CHANGE THIS CODE TO CHECK TO SEE IF THE NEW SCORE
         IS GREATER THAN THE OLD SCORE */
     usrObj.topscore = newScore;

     //Put the user data back into local storage.
     localStorage[localStorage.loggedInUser] = JSON.stringify(usrObj);
 }


 /* Loads the rankings table.
     This function should be called when the page containing the rankings table loads */

function showRankingsTable() {
     //Get a reference to the div that will hold the rankings table.
     var rankingDiv = document.getElementById("table");

     //Create a variable that will hold the HTML for the rankings table
     var htmlStr = "";

     //Add a heading 
     htmlStr += "<h1>Rankings Table</h1>";

     //Add the table tag
     htmlStr += "<table>";

     //Work through all of the keys in local storage
     for (var key in localStorage) {
         //All of the keys should point to user data except loggedInUser
         if (key !== "loggedInUser") {
             //Extract object containing user data

             //Extract user name and top score
             htmlStr += "David";
             //Add a table row to the HTML string.
         }
     }

     //Finish off the table
     htmlStr += "</table>";

     //Add the table to the page.

 }