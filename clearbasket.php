<?php
session_start();
session_destroy(); 
$pagename="Clear Smart Basket"; //Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=styles/styles.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>";
echo "<body>";
include ("header.php");
echo "<h4>".$pagename."</h4>";
//display name of the page as window title
//include header layout file
//display name of the page on the web page
//display random text
echo "Your basket has been cleared!";
include("footer.php"); //include head layout
echo "</body>";
?>