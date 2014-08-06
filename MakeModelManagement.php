<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Car Make and Model </title>
</head>

<?php

function AddNewMake()
{
	?>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	
	<table>
	<tr><td> Car Make(Name): </td> <td> <input type="text" name="Make" > </td></tr>
	</table>
	
	<input type="text" name="SaveMake" value="Save" class="button"> 
	
	</form>
	
	<?php
}

function ViewMake()
{
	require('connection.php');
	$query = mysql_query("SELECT * FROM make");
	if(mysql_num_rows($query)==0)
	{
		echo "No Any Car Make Registered";
	}
	else
	{
		while($record = mysql_fetch_array($query))
		{
		
		?>
	
		<?php
		}//end while Loop
	}
}

function ViewModel($carMake)
{
	require('connection.php');
	?>
	
	<?php
}

//******************************************PROGRAM CONTROLL******************************

if(isset($_POST['SaveMake']))
{

}
else if(isset($_GET['addnewmake']))
{
	AddNewMake();
}
else
{
	
}

?>

<body>
</body>
</html>
