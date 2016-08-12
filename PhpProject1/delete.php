<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$movieId = $_GET["id"];

require_once ('config.php');
require_once ('dbopen.php');

//echo "<script>alert('moro: " . $movieId . "');</script>";

$query = "DELETE FROM Movie WHERE idMovie = " . $movieId;
mysql_query($query)
    or die("Something wrong with your delete " . mysql_error());

echo "<script>window.location.href ='index.php'</script>";

//require_once ('dbclose.php');
?>