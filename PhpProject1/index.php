<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form id="loginform" action="index.php">
            <input type="text"><br>
            <input type="password">
            <input type="submit" value="Login">
        </form>
        <?php
        require_once ('config.php');
        require_once ('dbopen.php');
        
        if(!isset($_COOKIE[$movie_cookie])) {
            // cookie not set
        } else {
            // cookie set and user propably logged
        }
        
        $query = "SELECT * FROM Movie";
        $results = mysql_query($query)
                or die("You suck at SQL " . mysql_error());
        
        $i = 0;                                                                 // number of movies
        
        while ($row = mysql_fetch_array($results)) {
            echo "<div id=movie" . $i . " class='moviethumb'>";
            echo "<p class=movieName>" . $row[1] .  "</p>";                     // print movie name   consider using span
            
            if(is_null($row[2])) {
                echo "<img class=movieImg src='pictures/noimage.jpg'></img>";
            } else {
                echo "<img class=movieImg src='pictures/" . $row[2] . "'></img>";  // path to img src
            }
            
            echo "</div>";
            $i++;
        }
        
        
        // require_once ('dbclose.php');
        ?>
    </body>
</html>
