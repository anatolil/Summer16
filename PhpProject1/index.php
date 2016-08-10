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
        
        
        $query = "SELECT * FROM MovieUsers WHERE vcUserName = '" . $uname . "' AND vcUserPassword = '" . $upass . "';";
        $reults = mysql_query($query)
                or die("You suck at authenticating users" . mysql_error());
        
        if(mysql_fetch_array($reults)) {
            // user auth correct set the cookie
            echo "<script>alert('User auth');</script>";
        } else {
            // user auth not correct
            echo "<script>alert('fuck off');</script>";
        }
        
        
        // query all the movies in db
        $query = "SELECT * FROM Movie";
        $results = mysql_query($query)
                or die("You suck at SQL " . mysql_error());
        
        $i = 0;                                                                 // number of movies
        
        // display all the movies on a page
        while ($row = mysql_fetch_array($results)) {
            echo "<div id=movie" . $i . " class='moviethumb'>";
            echo "<span class=movieName>" . $row[1] .  "</span>";                     // print movie name   consider using span
            
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
