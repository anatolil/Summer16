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
        <form id="loginform" action="index.php" method="POST">
            <input type="text" name="user"><br>
            <input type="password" name="password">
            <input type="submit" value="Login">
        </form>
        <?php
        
        // get the login info from form
        $uname = $_POST[user];
        $upass = $_POST[password];
        
        //connection for db
        require_once ('config.php');
        require_once ('dbopen.php');
        
        // check for user auth
        $query = "SELECT * FROM MovieUsers WHERE vcUserName = '" . $uname . "' AND vcUserPassword = '" . $upass . "';";
        $reults = mysql_query($query)
                or die("You suck at authenticating users" . mysql_error());
        
        if(mysql_fetch_array($reults)) {
            // user auth correct
            echo "<script>alert('User auth');</script>";
        } else {
            // user auth not correct
            echo "<script>alert('fuck off');</script>";
        }
        
        // check for cookie
        if(!isset($_COOKIE[$movie_cookie])) {
            // cookie not set
        } else {
            // cookie set and user propably logged
        }
        
        
        // query all the movies in db
        $query = "SELECT * FROM Movie";
        $results = mysql_query($query)
                or die("You suck at SQL " . mysql_error());
        
        $i = 0;                                                                 // number of movies
        
        
        // display all the movies on a page
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
