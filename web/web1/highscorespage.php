<!DOCTYPE html>
<html>

<head>
    <title> High Scores </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <div id="home">
        <!-- High Scores Header -->
        <h1 id="header"> <font size="9"> High Scores </font> </h1>

        <?php include 'php/main.php'; outputnav(); ?>
        <script src="js/Top_Scores.js">
        </script>

        <div class="table">
            <table style="width:50%" id="check_score">
                <!--High Scores Table-->
                <tr>
                    <th> <font size="5" id="RankingsTable"> Player Name </font> </th>
                    <th> <font size="5"> Score </font> </th>
                </tr>
                <tr>
                    <td> <font size="5">   John   </font> </td>
                    <td> <font size="5">   20   </font> </td>
                </tr>

                <tr>
                    <td> <font size="5">   Sam      </font> </td>
                    <td> <font size="5">   70   </font> </td>
                </tr>
                <tr>
                    <td> <font size="5">   James   </font> </td>
                    <td> <font size="5">   20   </font> </td>
                </tr>
                <tr>
                    <td> <font size="5">   Tom   </font> </td>
                    <td> <font size="5">   30   </font> </td>
                </tr>
            </table>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
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