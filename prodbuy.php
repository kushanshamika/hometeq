<?php
include ("db.php");
$pagename="A smart buy for a smart home"; //Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=styles/styles.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>";
echo "<body>";
include ("header.php");
echo "<h4>".$pagename."</h4>";
//display name of the page as window title
//include header layout file
//display name of the page on the web page
//display random text

$prodid =  $_GET['u_prod_id'];
$SQL="select prodId, prodName, prodPicNameSmall, prodDescripLong, prodPrice, prodQuantity from Product where prodId = ".$prodid;
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{
 echo "<tr>";
echo "<td style='border: 0px'>";
//display the small image whose name is contained in the array
echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId']."><img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200><a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5>";
echo "<p>".$arrayp['prodDescripLong']."</p>";
echo "<p><b>$".$arrayp['prodPrice']."</b></p>";
echo "<p>Number left in stock: ".$arrayp['prodQuantity']."</p>";
?>
<form action=basket.php method="post">
<?php echo "<input type='hidden' name='h_prodid' value='".$arrayp['prodId']."'>" ?>
    <select name='qty'>
        <?php
            for($x = 1;$x<=$arrayp['prodQuantity'];$x++){
                echo"<option value='".$x."'>".$x."</option>";
            }
        ?>
    </select>
    <input type="submit" value="ADD TO BASKET">
</form>
<?php
echo "</td>";
echo "</tr>";
//display product name as contained in the array
}
echo "</table>";
include("footer.php"); //include head layout
echo "</body>";
?>