   /* This will do some basic checking of user data then stores
             user data in localStorage */
 function Register_Check() {
     //This will extract the name and password that the user has entered
     var nameInput = document.getElementById("name").value;
     var emailInput = document.getElementById("email").value;
     var addressInput = document.getElementById("address").value;
     var phoneInput = document.getElementById("number").value;
     var passwordInput = document.getElementById("password").value;

     //This will check to see that the name and password are not empty
     if (nameInput !== "" && emailInput !== "" && addressInput !== "" && phoneInput !== "" && passwordInput !== "") {
         //This will create a JavaScript object to hold the user data.
         var usrObj = {};

         //This will add the users entered data to object
         usrObj.name = nameInput;
         usrObj.email = emailInput;
         usrObj.address = addressInput;
         usrObj.phone = phoneInput;
         usrObj.password = passwordInput;

         //This will add a score field to object to support rankings table
         usrObj.topscore = 0;

         //This will store a string version of the object in local storage.
         localStorage[emailInput] = JSON.stringify(usrObj);
     }
 }

 /* This will check that the username and password match the user name and password of a 
          registered user and provides feedback to user. */
 
 function Login_Check() {
     //This will get a reference to the div where we will display the login result
     var loginResult = document.getElementById("LoginResult");

     //This will extract the name and password that the user has entered
     var emailInput = document.getElementById("loginEmail").value;
     var passwordInput = document.getElementById("loginPassword").value;

     //This will be the output for the debugging
     console.log("Login email: " + emailInput + "; Login password: " + passwordInput);

     //This will check to see if we have data stored for this user
     if (localStorage[emailInput] === undefined) {
         //This will show user found and be able to provide feedback to user.
         loginResult.innerHTML = "User name incorrect";
         return;
     }

     // This will check the password
     //This will get the object that is stored for the user name
     var usrObj = JSON.parse(localStorage[emailInput]);

     //This will compare the entered password with the stored password that have been given
     if (passwordInput !== usrObj.password) {

         //The incorrect password - provide feedback to user
         loginResult.innerHTML = "Password incorrect";
         return;
     }



     //This will record the user that has logged in using the local storage
     localStorage.loggedInUser = emailInput;

     //This will provide feedback to user and you could also provide a logout button 
     loginResult.innerHTML = "User logged in.";
 }
		
		
		
		
		
		
		
		
	