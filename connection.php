<?php
//$connect = mysql_connect('localhost','root','');
//mysql_select_db('yokohamamotors',$connect);

function getConnection() {
	$dbhost = "localhost:3306";
	$dbuser = "root";
	$dbpass = "123456";
	$dbname = "yokohamamotors";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}
?>