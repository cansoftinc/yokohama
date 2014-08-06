<?php

function drawIt($t='') {
$res[0]="<table border=0 cellpading=0 cellspacing=0 >
	<tr><td background='img/".(($t=='')?'link':$t)."8.jpg' width=18>&nbsp;</td><td background='img/".(($t=='')?'link':$t)."1.jpg'>&nbsp;</td><td background='img/".(($t=='')?'link':$t)."2.jpg'width=18>&nbsp;</td></tr>
	<tr><td background='img/".(($t=='')?'link':$t)."7.jpg'>&nbsp;</td><td style='vertical-align:middle'>";
	
	
$res[1]="</td><td background='img/".(($t=='')?'link':$t)."3.jpg'>&nbsp;</td></tr>
    <tr><td background='img/".(($t=='')?'link':$t)."6.jpg'>&nbsp;</td><td background='img/".(($t=='')?'link':$t)."5.jpg'>&nbsp;</td><td background='img/".(($t=='')?'link':$t)."4.jpg'>&nbsp;</td></tr>
	</table>";
	
return $res;	
}


//$a = drawIt();

//echo $a[0];


//echo $a[1];

function CheckLogin()
{
	if(!session_is_registered(username))
	{
		header("Location:index.php");
	}
}//END FUNCTION check login

function GpaCalculation($semestermarksArray)
{
	
}//end function Division Calculation

function GradeMark($Mark)
{
	if($Mark>=81 and $Mark<=100)
	{
		return "A";
	}
	else if($Mark>=61 and $Mark<81)
	{
		return "B";
	}
	else if($Mark>=41 and $Mark<61)
	{
		return "C";
	}
	else if($Mark>=31 and $Mark<41)
	{
		return "D";
	}
	else if($Mark>=0 and $Mark<31)
	{
		return "F";
	}
	else 
	{
		
	}	
	
}

function Links()
{
	
}

?>