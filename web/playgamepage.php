<!DOCTYPE html>
<html>

<head>
    <title> SnakeSnakeGame </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <div id="home">

        <!-- Actual SnakeSnakeGame Page Title -->
        <h1 id="header"> <font size="7"> Play </font> <h1> 
		
		<?php
			include 'php/main.php';
			outputnav();
		?>
		<br>
		<br>
		<canvas id="stage" height="350" width="450"> </canvas>
		
			<script>

				    /**
				     * Created Global variables
				     */
				    var SnakeGame = SnakeGame || {};     			//These will be variables will not change
				    var KeyBoardControl = KeyBoardControl || {};
				    var GameComponent = GameComponent || {};

				/**
				 * Drawing the SnakeGame stage
				 */
				SnakeGame.Draw = function(context, snake) {   // I have created functions where the behaviour of the functions will be described below 

				    // Draw Stage
				    this.drawStage = function() {

				        // Check PressKey And Set Stage SnakeDirection
				        var PressKey = snake.stage.keyEvent.getKey();			// I have created a variable PressKey and when the PressKey is pressed  
				        if (typeof(PressKey) != 'undefined') {
				            snake.stage.SnakeDirection = PressKey;
				        }

				        // Drawing the background stage of game
				        context.fillStyle = "yellow";									// This will change the colour of the background of the game
				        context.fillRect(0, 0, snake.stage.width, snake.stage.height);  // This will determine how much of the background will be yellow from the height and width of the game

				        // The Position of the snake
				        var Border_Width_x = snake.stage.length[0].x;     // This will determine the circles position of the snake by length [0]. x
				        var Border_Height_y = snake.stage.length[0].y;     // This will determine the circles position of the snake by length [0]. y

				        // Adding position by stage SnakeDirection
				        switch (snake.stage.SnakeDirection) {
				            case 'RIGHT':						// This will determine the direction of the snake
				                Border_Width_x++;							
				                break;							// This break will break the loop and continue executing the code after the loop
				            case 'LEFT':						
				                Border_Width_x--;
				                break;
				            case 'UP':        					
				                Border_Height_y--;
				                break;
				            case 'DOWN':						
				                Border_Height_y++;
				                break;
				        }

				        // Checking Collision with the Borders Width and Height
				        if (this.collision(Border_Width_x, Border_Height_y) == true) {			
				            snake.restart();	// This will determine if the snake hits the border of the game it will restart the game and snake back to its original starting position
				            return;													
				        }

				        // Logic of Snake SnakeFood
				        if (Border_Width_x == snake.stage.SnakeFood.x && Border_Height_y == snake.stage.SnakeFood.y) {
				            var tail = {
				                x: Border_Width_x,
				                y: Border_Height_y
				            };
				            snake.stage.SnakeScore++;
				            snake.initSnakeFood();
				        } else {
				            var tail = snake.stage.length.pop();
				            tail.x = Border_Width_x;
				            tail.y = Border_Height_y;
				        }
				        snake.stage.length.unshift(tail);

				        // Drawing the Snake
				        for (var i = 0; i < snake.stage.length.length; i++) {
				            var cell = snake.stage.length[i];
				            this.drawCell(cell.x, cell.y);
				        }

				        // This will be drawing the SnakeFood
				        this.drawCell(snake.stage.SnakeFood.x, snake.stage.SnakeFood.y);

				        // This will be drawing the SnakeScore
				        context.fillText('Points: ' + snake.stage.SnakeScore, 5, (snake.stage.height - 5)); 
				    };

				    // Draw Cell
				    this.drawCell = function(x, y) {
				        context.fillStyle = 'rgb(5, 5, 5)';  	// This will change the colour of the Snake, Points and the Snake Food 
				        context.beginPath();
				        context.arc((x * snake.stage.conf.cw + 6), (y * snake.stage.conf.cw + 6), 4, 0, 2 * Math.PI, false);
				        context.fill();
				    };

				    // Check the Collision with walls
				    this.collision = function(Border_Width_x, Border_Height_y) {
				        if (Border_Width_x == -1 || Border_Width_x == (snake.stage.width / snake.stage.conf.cw) || Border_Height_y == -1 || Border_Height_y == (snake.stage.height / snake.stage.conf.cw)) {
				            return true;
				        }
				        return false;
				    }
				};

				/**
				 * The KeyBoardControl will control the Events
				 */
				KeyBoardControl.ControllerEvents = function() {

				    // Setts
				    var MySelf = this;
				    this.pressKey = null;
				    this.keymap = KeyBoardControl.Keymap;

				    // Keydown Event when a key is pressed
				    document.onkeydown = function(event) {
				        MySelf.pressKey = event.which;
				    };

				    // This will Get Key
				    this.getKey = function() {
				        return this.keymap[this.pressKey];
				    };
				};

				/**
				 * This will be the KeyBoardControl Map to move the snake
				 */									
				KeyBoardControl.Keymap = {						// The numbers will show 
				    37: 'LEFT',
				    38: 'UP',
				    39: 'RIGHT',
				    40: 'DOWN'
				};
				
				/**
				 * The SnakeGame 
				 */
				SnakeGame.Snake = function(elementId, conf) {

				    // Sets
				    var GameCanvas = document.getElementById(elementId);
				    var context = GameCanvas.getContext("2d");
				    var snake = new GameComponent.Snake(GameCanvas, conf);
				    var SnakeGameDraw = new SnakeGame.Draw(context, snake);

				    // SnakeGame Interval
				    setInterval(function() {
				        SnakeGameDraw.drawStage();
				    }, snake.stage.conf.fps);
				};
				
				

				/**
				 * SnakeGame GameComponent Stage
				 */
				GameComponent.Stage = function(GameCanvas, conf) {

				    // Sets
				    this.keyEvent = new KeyBoardControl.ControllerEvents();
				    this.width = GameCanvas.width;
				    this.height = GameCanvas.height;
				    this.length = [];
				    this.SnakeFood = {};
				    this.SnakeScore = 0;
				    this.SnakeDirection = 'RIGHT';
				    this.conf = {
				        cw: 10,
				        size: 5,
				        fps: 1000
				    };

				    // Merge Conf
				    if (typeof conf == 'object') {
				        for (var key in conf) {
				            if (conf.hasOwnProperty(key)) {
				                this.conf[key] = conf[key];
				            }
				        }
				    }

				};

				/**
				 * SnakeGame GameComponent Snake
				 */
				GameComponent.Snake = function(GameCanvas, conf) {

				    // This will be the SnakeGame Stage
				    this.stage = new GameComponent.Stage(GameCanvas, conf);

				    // Init Snake
				    this.initSnake = function() {

				        // Itaration in Snake Conf Size
				        for (var i = 0; i < this.stage.conf.size; i++) {

				            // This will add the Snake Cells
				            this.stage.length.push({
				                x: i,
				                y: 0
				            });
				        }
				    };

				    // Call init Snake
				    this.initSnake();

				    // Init SnakeFood  
				    this.initSnakeFood = function() {

				        // This will add the SnakeFood on the stage
				        this.stage.SnakeFood = {
				            x: Math.round(Math.random() * (this.stage.width - this.stage.conf.cw) / this.stage.conf.cw),
				            y: Math.round(Math.random() * (this.stage.height - this.stage.conf.cw) / this.stage.conf.cw),
				        };
				    };

				    // Init SnakeFood
				    this.initSnakeFood();

				    // Restart Stage
				    this.restart = function() {
				        this.stage.length = [];
				        this.stage.SnakeFood = {};
				        this.stage.SnakeScore = 0;
				        this.stage.SnakeDirection = 'RIGHT';
				        this.stage.keyEvent.pressKey = null;
				        this.initSnake();
				        this.initSnakeFood();
				    };
				};

				/**
				 * Window will Load
				 */
				window.onload = function() {
				    var snake = new SnakeGame.Snake('stage', {
				        fps: 70,
				        size: 4
				    });
				};

			</script>
				
				
	    <br>
		<br>
   	 
  	
	    <?php
	      include_once  'php/main.php';
		  outputfooter();
		?>
	 
			
	</div>
</body>