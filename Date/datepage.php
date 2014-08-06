<html>
<head>
<link href="CalendarControl.css"
      rel="stylesheet" type="text/css">
<script src="CalendarControl.js"
        language="javascript"></script>

</head>

<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="dateform" >

<input name="todays_date" type="text" onfocus="showCalendarControl(this);" >

<input type="submit" name="enter" id="enter" value="Submit" >	   
	   
</form>

<?
echo $_POST['todays_date'];
?>

</body>
</html>
