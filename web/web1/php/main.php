<?php

function outputnav () {
echo '<div id= "navigation_bar">';
echo '<button id="button_1"> <a href ="snakechase.php"> Home </a> </button>';
echo '';
echo '<button id="button_1">  <a href="playgamepage.php"> Play </a> </button>';
echo '';
echo '<button id="button_1">  <a href="highscorespage.php"> HighScores </a> </button>';
echo '';
echo '<button id="button_1"> <a href ="register.php"> Register/Login </a> </button>';
echo '</div>';
}

function outputfooter () {
echo '<div class="footer">';
echo '<p>  Game Creator:  Faisal Suliman </p>';
echo '</div>';
echo '';

}



?>