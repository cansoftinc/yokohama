<?php 
require('connection.php');

$val="";
$error="";
if(isset($_POST['Login']))
{							
	$username = $_POST['username'];
	$password = md5($_POST['pass']);
	
	define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
	define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
	define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
	define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
	define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

	$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
	//$dbh = new PDO($dsn, DB_USER, DB_PASS);

	if($username=='' and $password=='')
	{
		$error = "<br><span class='error'>Fill All fields Please \n".$dsn."  ++ ".DB_USER." ++ ".DB_PASS." </span>";
	}
	else
	{
		try{
			$sql ="SELECT * FROM staff WHERE username=? AND password =?";
			$db=getConnection();
			$stmt=$db->prepare($sql);
			$stmt->bindParam(1,$username);
			$stmt->bindParam(2,$password);
			$stmt->execute();
			$recordfetch = $stmt->fetchObject();
			$users = $stmt -> fetchAll(PDO::FETCH_OBJ);
		
			$db=null;

			if($recordfetch==null)
			{
				$error = "<br><span class='error'>Incorrect username / Password</span>";
			}
			else
			{
			
				$title=$recordfetch->TypeEmployee;
				
				session_start();
				$_SESSION['title'] = $title;
				$_SESSION['username'] = $username;
				header("Location:home.php");
			}
		}catch(PDOException $e){
			echo 'Error';
		}
	}	
	
}//end isset

require('functions.php');
?>
<html>
<head>
<title> Yokohama Motors</title>
<link rel="stylesheet" type="text/css" href="css/signin.css" >
<link rel="STYLESHEET" type="text/css" href="assets/css/bootstrap-responsive.css">
<link rel="STYLESHEET" type="text/css" href="assets/css/bootstrap.css">
</head>
<body onLoad="setFocus()">
<div class="container">
<center>
<img src="images/logo.jpg"  height="100" alt="" border="0">  	
<h2> YOKOHAMA MOTORS LTD</h2>
<hr/>
<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="LoginForm">
        <h5 class="form-signin-heading">Please sign in</h5>
        <input type="text" name="username" class="form-control" placeholder="Username" required="" autofocus="">
        <input type="password" name="pass" class="form-control" placeholder="Password" required="">
		<p id="error" class="alert-error"><?php echo $error;  ?> </p>
        <button class="btn btn-lg btn-primary btn-block"  name="Login" type="submit">Sign in</button>
</form>
<hr/>

</center>
</div>
</body>
</html>