<?php
//$connect = mysql_connect('localhost','root','');
//mysql_select_db('yokohamamotors',$connect);

function getConnection() {
	$dbhost = "127.8.253.130:3306";//"localhost:3306";
	$dbuser = "adminAi8ZGBT";//"root";
	$dbpass = "7XY9vyvz_-QA";//"123456";
	$dbname = "yokohama";//yokohamamotors
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}
?>