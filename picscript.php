<?php
require('connection.php');
$ID = $_GET['ID'];
$query=mysql_query("SELECT ProfilePicture FROM cars WHERE ID='$ID' ",$connect)or die('Couldnot select the students IMAGE due to due to '.mysql_error());
$row = mysql_fetch_assoc($query);
$imagebytes = $row[ProfilePicture];
header("Content-type: image/jpeg");
print $imagebytes;
?>