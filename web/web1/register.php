<!DOCTYPE html>
<html>

<head>
    <title> Register/Login </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <div id="home">

                                     <!-- Page Heading -->
        <h1 id="header"> <font size="9"> Register/Login </font> </h1>

        <br>
        <br>

        <?php include 'php/main.php'; outputnav(); ?>

        <div class="container">
                                  <!-- Register Here-->
            <legend> <font size="6"> <b> Register </b> </font> </legend>

            <br>

            <div>
            <form>
                <label> <b> Name </b> </label>
				<input type="text" placeholder="Enter Name" id="name" required>
				
				<label> <b> Email </b> </label>
                <input type="email" placeholder="Enter Email"  id="email" required>
				
                <label> <b> Phone </b> </label>
				<input type="phone" placeholder="Enter Phone" id="number" required>
				
				<label> <b> Address </b> </label>
				<input type="address" placeholder="Enter Address" id="address" required>
				
			    <label> <b> Password </b> </label>
                <input type="password" placeholder="Enter Password" id="password" required>
				
				<br>
				
                <button type="submit" class="signupbtn" onclick="Register_Check()" > SignUp </button>
			</form>
            </div>
	           

            

			
			<script src="js/register_login_function.js"></script>
			

        </div>
        
		<br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
					
					<!-- Login Here -->
        <legend> <font size="6"> <b> Login </b> </font> </legend>

        <br>

        <label> <b> Email </b> </label>
        <input type="text" placeholder="Enter Email" id="loginEmail" required>

		
		<label> <b> Password </b> </label>
        <input type="password" placeholder="Enter Password" id="loginPassword" required>

        <br>

        <div class="clearfix_2">


                 <button type="submit" class="clearfix" onclick="Login_Check()"> Login </button>
                 <p class="clearfix_2" id="LoginResult">Not logged in.</p>

        <br>
        <br>
        <br>
	    <br>
            
    
        </div>

    </div>
	           


            <?php include_once 'php/main.php'; outputfooter(); ?>
</body>

</html>