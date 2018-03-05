<!DOCTYPE html>
<html>

<head>
    <title> Snake Chase </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

    <div id="home">

        <!-- Name Of Game -->
        <h1 id="header"> <font size="9"> Snake Chase </font> </h1>

        <!-- Game Nameavigation -->
        <?php include_once 'php/main.php'; outputnav(); ?>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <p id="help"> <font size="5"> 
			The aim of the game is to control the movement of snake with the arrow keys. 
		<br>
		<br>
			Cubes will be placed randomly around the game.  
		<br>
		<br>
			The game will end if the snake touches the square.
			</font>
        </p>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <?php include_once 'php/main.php'; outputfooter(); ?>

    </div>
</body>
		






</html>
