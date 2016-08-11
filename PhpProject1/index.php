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
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <script src="scripts/jquery-3.1.0.js"></script>
    </head>
    <body>
        
        <?php
        session_start();
        
        if($_SESSION["usersession"]) {
            // user is logged
            echo '<div class="loginMenu">';
            echo '<a href="" id="logoutbutton">logout</a>';
            echo '</div><br>';
        } else {
            // user is not logged in
            echo '<span class="loginMenu">';                                    // div might also be a good idea
            echo '<form id="loginform" action="index.php" method="POST">';
            echo '<input type="text" name="user" id="userNameInput"><br>';
            echo '<input type="password" name="password" id="userPasswordInput"><br>    ';
            echo '<input type="submit" value="Login">';
            echo '</form>';
            echo '</span><br>';
        }
        
        // get the login info from form
        $uname = $_POST[user];
        $upass = $_POST[password];
        
        //connection for db
        require_once ('config.php');
        require_once ('dbopen.php');
        
        
        $query = "SELECT * FROM MovieUsers WHERE vcUserName = '" . $uname . "' AND vcUserPassword = '" . $upass . "';";
        $reults = mysql_query($query)
                or die("You suck at authenticating users" . mysql_error());
        
        if($row = mysql_fetch_array($reults)) {
            // user auth correct set the session variables
            
            $_SESSION["usersession"] = $uname;                                  // username
            $_SESSION["userlevelsession"] = $row[3];                            // user level 1 = admin 2 = regular
        } else {
            // user auth not correct
            session_unset();                                                    // removes all session variables kinda useless
        }
        
        
        // query all the movies in db
        $query = "SELECT * FROM Movie";
        $results = mysql_query($query)
                or die("You suck at SQL " . mysql_error());
        
        $i = 0;                                                                 // number of movies
        
        // display all the movies on a page
        echo "<div class='movierow'>";                                          // row of 5 movies thumbs
        while ($row = mysql_fetch_array($results) AND $i < 5) {
            echo "<span id=movie" . $i . " class='moviethumb'>";                // div might also bee a good idea
            echo "<p class=movieName>" . $row[1] .  "</p>";                     // print movie name   consider using span
            
            if(is_null($row[2])) {
                echo "<img class=movieImg src='pictures/noimage.jpg'></img>";
            } else {
                echo "<img class=movieImg src='pictures/" . $row[2] . "'></img>";  // path to img src
            }
            
            echo "</span>";
            $i++;
        }
        echo "</div>";
        
        // require_once ('dbclose.php');
        ?>
    </body>
</html>
