
<?php 
session_start();
require('settings.php');
include('connection.php');

$logs="";
if (empty($_SESSION['username'])) {
	header("Location:index.html");
}
if (isset($_GET['logout'])) {
	session_destroy();
	header("Location:index.html");
}
?>

<html>
<head>
	<title><?php echo $title; ?></title>
	<!-- include style sheet -->
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	
	<!-- include JavaScript -->
	<script language="JavaScript" src="function.js"></script>

	<!--
	<meta http-equiv="pragma" content="no-cache">
	<META HTTP-EQUIV="Expires" CONTENT="-1">
	-->
    <script type="text/javascript" src="functions.js" ></script>
<script language=javascript src='Date/CalendarControl.js'> </script>
<link rel='stylesheet' href='Date/CalendarControl.css'>

<script type="text/javascript">
function ViewOwnerFullDetails(ownerID)
{
	window.open("ViewOwnersFullDetails.php?OwnerID="+ownerID,"mywindow","menubar=1,resizable=1,width=900,height=500")
	return false;
}

function ConfirmDelete()
{
	if(confirm("Are you Sure you want??"))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function formatx(x) {

var i, txt = x.value, out ,j = 1, res;


for (i = (txt.length - 1);i>=0;i--) txt = txt.replace(',','');

out = '';
res = '';

for (i = (txt.length - 1);i>=0;i--) { out += txt.charAt(i); if ( ( (j % 3) == 0 ) && (txt.length > j) ) out += ','; j++; }

for (i = (out.length - 1);i>=0;i--) res += out.charAt(i);

x.value = res;

}

</script>

</head>

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">


<table cellspacing="0" cellpadding="0" border="0" width=100%>
<tr>
    <td colspan="2" height=60 bgcolor="#c3c3c9" style="padding: 5px 0px 5px 15px;"> 
		<table cellspacing="0" cellpadding="0" border="0">
			<tr>
			<td><img src="images/logo.jpg"  height="100" alt="" border="0"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td align="center" style="color:#ffffff;"><H1><?php echo $Heading; ?></H1><hr/></td>
			
			</tr>
		</table>
	</td>
</tr>
<tr><td colspan=2 height=30 bgcolor="#2c52eb">
		<table cellspacing="0" cellpadding="0" border="0" width=1000>
		<tr>
		    <td class="smalltext" style="color:#ffffff" width=33%>&nbsp;&nbsp;</td>
					  	<td colspan=2 height=33%>
				<table cellspacing="0" cellpadding="0" border="0" width=100%>
				<tr>
				    <td style="color:#ffffff" align=center width=100%><i>Logged in: </i><b><?php echo $_SESSION['username']; ?> </b>&nbsp;&nbsp;</td>
				</tr>
				</table>
			</td>
						<td style="color:#ffffff" align=right width=33%></td>

                        <td style="color:#ffffff" align=right width=13%>
                                                &nbsp;&nbsp;</td>
			
		</tr>
		</table>
	</td></tr>
</table>


<table cellspacing="0" cellpadding="0" border="0" width=100% height=100%>
<tr>
    <td rowspan=2 width=180 valign=top align=center style="padding:5px" bgcolor="#eeeeee">
	<table cellspacing="0" cellpadding="0" border="0">
		<tr>
		    <td align="left" style="padding-left: 1px;" valign=top>
           <?php
		    links();
		   ?>
			
			</td>
		</tr>
	</table></td>
     <td valign=top class=normal>
				<div class=normal style="width:1100;padding:15px 10px 15px 20px">
		<table cellpadding=0 cellspacing=0 border=0 width=100%><tr><td class="header1">
        
<?php if($_SESSION['title']=="FullAccess"){ ?>
<a href="?addNewCar=1">Add New Car </a> 
<?php } ?>
<h3 class="page-header">Search for Cars </h3>
<br />
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return ValidateSimpleSearchForm(this)">

<table>
<tr><td> Make </td> <td><select name="make" >
	<option value="">---Select --- </option>
	<?php
	$sql = "";
	$sql = "SELECT * FROM make";
	$db = getConnection();
	$stmt = $db->prepare($sql);
	$stmt->execute();
	while($record = $stmt->fetch() )
	{
		?>
		<option> <?php echo $record['Make']; ?> </option> 
		<?php
	}//end while loop
	?>
	</select>
	</td> <td width="30"></td>
    
    <td> Model: </td> <td><select ID='carmodel' name="model">
	
	<option value="">---Select --- </option>
	<?php
	$sql = "SELECT * FROM model";
	$stmt = $db->prepare($sql);	
	$stmt->execute();
	while($record = $stmt->fetch())
	{
		?>
		<option> <?php echo $record['Model']; ?> </option> 
		<?php
	}//end while loop
	?>
	</select>
	</td> <td width="30"></td> <td> Transmission: </td> <td><select name="transmission"  >
	 <option value="">---Select --- </option>
	 <option value="Automatic"> Automatic </option>
	 <option value="Manual"> Manual </option>
	 </select>
	 </td> </tr>
	
	<tr><td> Fuel: </td> <td> <select name="fuel"  >
	 <option value="">---Select --- </option>
	 <option value="Petrol"> Pertol / Gasoline </option>
	 <option value="Diesel"> Diesel </option>
	 </select> </td> <td width="30"> <td> Drive: </td> <td> <select name="drive"  >
	 <option value="">---Select --- </option>
	 <option value="2 Wheel Drive"> 2 Wheel Drive </option>
	 <option value="4 Wheel Drive"> 4 Wheel Drive </option>
	 </select> </td> </td> </tr>
	 </table>
	 <br>

<tr><td><input type="submit"  name="Search" value="Search"  class="btn btn-warning" /></td></tr>

</table>

</form>
<!--- changes done here-->     

 
<?php

if(isset($_GET['addNewCar'])){

	NewCarRegistration();

}
else if(isset($_GET['viewCar']))
{
	CarAccount($_GET['viewCar']);
}
else if(isset($_GET['UpdateCarInfo']))
{
	EditCarAccount($_GET['UpdateCarInfo']);
}



function NewCarRegistration()
{
	
	?>
    <h3 class="page-header">Car Information </h3><br />
	<table><tr><td class="alert info">Note: The Uploaded Car Pictures should be less than 1MB</td></tr></table><br>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <table>
    <tr><td> Mileage: </td> <td> <input type="text" name="mileage" onKeyup="formatx(this)" value="" /> </td></tr>
	<tr><td> Make </td> <td><select name="make" >
	<option value="">---Select --- </option>
	<?php
	$sql = "";
	$sql = "SELECT * FROM make";
	$db = getConnection();
	$stmt = $db->prepare($sql);
	$stmt->execute();
	while($record = $stmt->fetch() )
	{
		?>
		<option> <?php echo $record['Make']; ?> </option> 
		<?php
	}//end while loop
	?>
	</select>
	</td> <td width="30"></td>
    
    <td> Model: </td> <td><select ID='carmodel' name="model">
	
	<option value="">---Select --- </option>
	<?php
	$sql = "SELECT * FROM model";
	$stmt = $db->prepare($sql);	
	$stmt->execute();
	while($record = $stmt->fetch())
	{
		?>
		<option> <?php echo $record['Model']; ?> </option> 
		<?php
	}//end while loop
	?>
	</select>
	
	</select>
	</td></tr>
     <tr><td> Transmission: </td> <td><select name="transmission"  >
	 <option value="">---Select --- </option>
	 <option value="Automatic"> Automatic </option>
	 <option value="Manual"> Manual </option>
	 </select>
	 </td> </tr>
     
	 <tr><td> Chasis Number: </td> <td> <input type="text" name="ChasisNumber" /> </td></tr>
	 <tr><td> Engine Size(cc): </td> <td> <input type="text" name="enginesize"  value=""  /> </td></tr>
	 <tr><td> Year Manufactured: </td> <td> <input type="text" name="yearManufactured"  value="" /> </td></tr>
	 <tr><td> Colour: </td> <td> <input type="text" name="colour" value=""  /> </td></tr>
	 <tr><td> Arrival Date: </td> <td> <input type="text" name="arrivalDate" onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''" /> </td></tr>
	 <tr><td> Price: </td> <td> <input type="text" name="price" onKeyup="formatx(this)" value=""   /> </td></tr>
	 <tr><td> Steering Wheel: </td> <td> <select name="wheel"  >
	 <option value="">---Select --- </option>
	 <option value="Right"> Right </option>
	 <option value="Left"> Left </option>
	 </select> </td></tr>
	 
	  <tr><td> Drive: </td> <td> <select name="drive"  >
	 <option value="">---Select --- </option>
	 <option value="2 Wheel Drive"> 2 Wheel Drive </option>
	 <option value="4 Wheel Drive"> 4 Wheel Drive </option>
	 </select> </td></tr>
	 
	  <tr><td> Fuel: </td> <td> <select name="fuel"  >
	 <option value="">---Select --- </option>
	 <option value="Petrol"> Pertol / Gasoline </option>
	 <option value="Diesel"> Diesel </option>
	 </select> </td></tr>
	 
	  <tr><td> Number of Doors: </td> <td> <input type="text" name="doors" value=""  /> </td></tr>
	  <tr><td> Number of Seats: </td> <td> <input type="text" name="seats"  value="" /> </td></tr>
	  <tr><td> Car Profile Picture: </td> <td> <input type="file" name="carPictures"  class='button'> </td></tr>

    <tr><td></td> <td><input type="submit" name="SaveCars" value="Save" class="btn btn-default" /> &nbsp;&nbsp; <a href="carsmanagement.php"><input type="button" value="Cancel" class="btn btn-warning" /></a></td></tr>
    </table>







    </form>
    
    
    <?php
}

?>	
<?php
if(isset($_POST['Search'])){

	SimpleSearchResults($_POST['make'],$_POST['model'],$_POST['transmission'],$_POST['fuel'],$_POST['drive']);
}
elseif(isset($_POST['SaveCars']))
{	
				if (isset($_FILES['carPictures']) && $_FILES['carPictures']['size'] > 0) { 					
					$image = $_FILES['carPictures'];	
					$tmpName  = $_FILES['carPictures']['tmp_name'];  
       
      				// Read the file
      				$fp      = fopen($tmpName, 'r');
     				$data = fread($fp, filesize($tmpName));
      				$data = addslashes($data);
      				fclose($fp); 
			}
	
	SaveCarsDetails($_POST['carid'],$_POST['mileage'],$_POST['make'],$_POST['model'],$_POST['transmission'],$_POST['ChasisNumber'],$_POST['enginesize'],$_POST['yearManufactured'],$_POST['colour'],$_POST['arrivalDate'],$_POST['price'],$_POST['wheel'],$_POST['drive'],$_POST['fuel'],$_POST['seats'],$_POST['doors'],$data);
	
}

function SaveCarsDetails($carid,$mileage,$make,$model,$transmission,$ChasisNumber,$enginesize,$yearManufactured,$colour,$arrivalDate,$price,$wheel,$drive,$fuel,$seats,$doors,$data)
{
	//	echo $logs = $mileage." ||".$make." ||".$model." ||".$transmission." ||".$ChasisNumber." ||".$enginesize." ||".$yearManufactured." ||".$colour." ||".$arrivalDate." ||".$price." ||".$wheel." ||".$drive." ||".$fuel." ||".$seats." ||".$doors." ||";
		$carid=trim($carid);
		$mileage=str_replace(',','',trim($mileage));
		$make=trim($make);
		$model=trim($model);
		$transmission=trim($transmission);
		$ChasisNumber=trim($ChasisNumber);
		$enginesize=trim($enginesize);
		$yearManufactured=trim($yearManufactured);
		$colour=trim($colour);
		$arrivalDate=trim($arrivalDate);
		$price=str_replace(',','',trim($price));
		$wheel=trim($wheel);
		$drive=trim($drive);
		$fuel=trim($fuel);
		$seats = trim($seats);
		$doors = trim($doors);
		
		if($mileage=='' or $make=='' or $model=='' or $transmission=='' or $ChasisNumber=='' or $enginesize=='' or $yearManufactured=='' or $colour=='' or $arrivalDate=='' or $price=='' or $wheel =='' or $drive=='' or $fuel=='' or $seats=='' or $doors=='' )
		{
			NewCarRegistration();
			echo "<span class='error'>Fill All The Fields Please</span>";
		}
		else if($carid=='')
		{
			
			$verifyAbsence = "SELECT * FROM cars WHERE ChasisNumber='$ChasisNumber' ";
			$db=getConnection();
			$stmt = $db->prepare($verifyAbsence);
			$stmt->execute();
			$count=$stmt->fetchObject();
			if($count==false)
			{
				//echo "Car Does not exist do an insert";
				
				$insertCar = "INSERT INTO cars(MakeID,ModelID,Transmission,ChasisNumber,EngineSize,YearManufacture,Colour,ArrivalDate,Price,Steering,Fuel,Drive,Mileage,Doors,Seats,ProfilePicture) VALUES('$make','$model','$transmission','$ChasisNumber','$enginesize','$yearManufactured','$colour','$arrivalDate','$price','$wheel','$fuel','$drive','$mileage','$doors','$seats','$data')";
				$stmt = $db->prepare($insertCar);
				$stmt->execute();
				$findRecordID = "SELECT ID FROM cars WHERE ChasisNumber='$ChasisNumber' ";
				$newId = $db -> lastInsertId();				
							
				CarAccount($newId);
				
			}
			else
			{
				NewCarRegistration();
				echo "<span class='error'>Car already Exists</span>";
			}
		
		
		}else{
			// do an Car detail update
			
			$db=getConnection();
			$stmt = $db->prepare("UPDATE cars SET MakeID=?,ModelID=?,Transmission=?,ChasisNumber=?,EngineSize=?,YearManufacture=?,Colour=?,ArrivalDate=?,Price=?,Steering=?,Fuel=?,Drive=?,Mileage=?,Doors=?,Seats=?,ProfilePicture=? WHERE id=?");
			$stmt->execute(array($make,$model,$transmission,$ChasisNumber,$enginesize,$yearManufactured,$colour,$arrivalDate,$price,$wheel,$fuel,$drive,$mileage,$doors,$seats,$data, $carid));
			$affected_rows = $stmt->rowCount();
			echo "<span class='alert info'>CAR INFO SUCCESSFUL UPDATED:".$affected_rows."</span>";
			CarAccount($carid);
		}
		
}//end function saving details of Car

function EditCarAccount($carid)
{	
	
	$query ="SELECT * FROM cars WHERE ID = '$carid' ";
	$db = getConnection();	 
	foreach($db->query($query) as $recordsPlot){
	?>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	
	<h3 class="page-header">Edit Car Details</h3>

	
	<table>
	<tr><td valign="top"> <img src="picscript.php?ID=<?php echo $recordsPlot['ID']; ?>" height="300" width="400"> </td> <td>
	    
    <table border=1 cellspacing=0><tr><td colspan="2" align="center">
    <table class="table table-striped">
	<input name="carid" value="<?php echo $carid ; ?>" type="hidden" hidden>
    <tr><td> Chasis Number: </td> <td><input type="text" name="ChasisNumber" value=" <?php echo $recordsPlot['ChasisNumber'];  ?>" /> </td> </tr>
    <tr><td> Make: </td> <td><input type="text" name="make" value="  <?php echo $recordsPlot['MakeID'];  ?>" /> </td></tr>
    <tr><td> Model: </td> <td><input type="text" name="model" value="  <?php echo $recordsPlot['ModelID'];  ?>" /> </td></tr>
    <tr><td>Transmission; </td> <td><input type="text" name="transmission" value="  <?php echo $recordsPlot['Transmission']; ?>" />   </td></tr>
	<tr><td>Engine Size: </td> <td><input type="text" name="enginesize" value="  <?php echo $recordsPlot['EngineSize']; ?> "/> cc   </td></tr>
	<tr><td>Year of Manufacture: </td> <td><input type="text" name="yearManufactured" value="  <?php echo $recordsPlot['YearManufacture']; ?>" />   </td></tr>
	<tr><td>Colour: </td> <td><input type="text" name="colour" value="  <?php echo $recordsPlot['Colour']; ?>" />   </td></tr>
	<tr><td>Arrival Date: </td> <td><input type="text" name="arrivalDate" value="  <?php echo $recordsPlot['ArrivalDate']; ?>" />   </td></tr>
	<tr><td>Steering Wheel: </td> <td><input type="text" name="wheel" value="  <?php echo $recordsPlot['Steering']; ?>" />   </td></tr>
	<tr><td>Fuel: </td> <td><input type="text" name="fuel" value="  <?php echo $recordsPlot['Fuel']; ?>" />   </td></tr>
	<tr><td>Drive: </td> <td><input type="text" name="drive" value=" <?php echo $recordsPlot['Drive']; ?>" />   </td></tr>
	<tr><td>Mileage: </td> <td><input type="text" name="mileage" onKeyup="formatx(this)" value="  <?php echo number_format($recordsPlot['Mileage'], 0, '.', ','); ?>" /> km  </td></tr>
	<tr><td>Doors: </td> <td><input type="text" name="doors" value="  <?php echo $recordsPlot['Doors']; ?>" />   </td></tr>
	<tr><td>Seats: </td> <td><input type="text" name="seats" value="  <?php echo $recordsPlot['Seats']; ?>" />  </td></tr>
	<tr><td>Price: </td> <td><input type="text" name="price" value="<?php echo number_format($recordsPlot['Price'], 2, '.', ','); ?>" />  /= </td></tr>
	
    </table>
    
    </td></tr>
   
    
    </tr></table>
    
    <br>
    
    
    <input name="SaveCars" type="submit" class="btn btn-primary"  /></a><a href="?cancelAccount=1" type="button" class="btn btn-default" />Cancel</a>
	</form>
    <?php
	}
	
}//end function Edit Car account

function CarAccount($CarID)
{	
	//echo $PlotRecordID;
	$query ="SELECT * FROM cars WHERE ID = '$CarID' ";
	$db = getConnection();	 
	foreach($db->query($query) as $recordsPlot){
	?>
	
	<h3 class="page-header">CAR DETAILS</h3>
	
	<table>
	<tr><td valign="top"> <img src="picscript.php?ID=<?php echo $recordsPlot['ID']; ?>" height="300" width="400"> </td> <td>
	    
    <table border=1 cellspacing=0><tr><td colspan="2" align="center">
    
    <table class="table table-striped">
    <tr><td> Chasis Number: </td> <td> <?php echo $recordsPlot['ChasisNumber'];  ?>  
<?php if($_SESSION['title']=="FullAccess"){ ?>
<a class="btn btn-default" href="?UpdateCarInfo=<?php echo $CarID; ?>">Edit car Info</a> 
<?php } ?>


</td> </tr>
    <tr><td> Make: </td> <td> <?php echo $recordsPlot['MakeID'];  ?> </td></tr>
    <tr><td> Model: </td> <td> <?php echo $recordsPlot['ModelID'];  ?> </td></tr>
    <tr><td>Transmission; </td> <td> <?php echo $recordsPlot['Transmission']; ?>   </td></tr>
	<tr><td>Engine Size: </td> <td> <?php echo $recordsPlot['EngineSize']; ?>cc   </td></tr>
	<tr><td>Year of Manufacture: </td> <td> <?php echo $recordsPlot['YearManufacture']; ?>   </td></tr>
	<tr><td>Colour: </td> <td> <?php echo $recordsPlot['Colour']; ?>   </td></tr>
	<tr><td>Arrival Date: </td> <td> <?php echo $recordsPlot['ArrivalDate']; ?>   </td></tr>
	<tr><td>Steering Wheel: </td> <td> <?php echo $recordsPlot['Steering']; ?>   </td></tr>
	<tr><td>Fuel: </td> <td> <?php echo $recordsPlot['Fuel']; ?>   </td></tr>
	<tr><td>Drive: </td> <td> <?php echo $recordsPlot['Drive']; ?>   </td></tr>
	<tr><td>Mileage: </td> <td> <?php echo number_format($recordsPlot['Mileage'], 0, '.', ','); ?> km  </td></tr>
	<tr><td>Doors: </td> <td> <?php echo $recordsPlot['Doors']; ?>   </td></tr>
	<tr><td>Seats: </td> <td> <?php echo $recordsPlot['Seats']; ?>  </td></tr>
	<tr><td>Price: </td> <td> Tshs. <?php echo number_format($recordsPlot['Price'], 2, '.', ','); ?>  /= </td></tr>
	
    </table>
    
    </td></tr>
   
    
    </tr></table>
    
    <br>
    
    
    <A href="?cancelAccount=1"><input type="button" value="Back To Search" class="btn btn-primary"  /></A>
    <?php
	}
	
}//end function Car account


function SimpleSearchResults($make,$model,$transmission,$fuel,$drive)
{
	
	$sql = "SELECT * FROM cars ";
	
	if($make!='')
	{
		$sql = $sql."WHERE MakeID ='$make' ";
		$where = true;
	}
	
	if($model!='')
	{
		if($where)
		{
			$sql = $sql." AND ModelID='$model'";
		}
		else
		{
			$sql = $sql."WHERE ModelID ='$model' ";
			$where = true;
		}	
	}
	
	if($transmission!='')
	{
		if($where)
		{
			$sql = $sql." AND Transmission='$transmission'";
		}
		else
		{
			$sql = $sql."WHERE Transmission ='$transmission' ";
			$where = true;
		}	
	}
	
	if($fuel!='')
	{
		if($where)
		{
			$sql = $sql." AND Fuel='$fuel'";
		}
		else
		{
			$sql = $sql."WHERE Fuel ='$fuel' ";
			$where = true;
		}	
	}
	
	if($drive!='')
	{
		if($where)
		{
			$sql = $sql." AND Drive='$drive'";
		}
		else
		{
			$sql = $sql."WHERE Drive ='$drive' ";
			$where = true;
		}	
	}
	
	$db = getConnection();
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$count= $stmt->rowCount();
	$db = null;
	if($count==false)
	{
		echo "<span class='error'>No Car Found </span>";
	}
	else
	{
		echo $count." car(s) Found ";
		?>
		<table class="table table-striped" cellspacing="0" >
		<tr><th> No </th><th>Photo </th><th>Make</th> <th>Model </th> <th>Transmission </th> <th>Engine Size </th> <th>Year </th> <th>Wheel </th> <th>Mileage </th> <th> Price </th><th> view </th></tr>
		<?php
		$num=0;
		$db = getConnection();
		foreach($db->query($sql) as $record)
		{
			$num++;
			?>
			<tr>
			<td> <?php echo $num; ?>. </td>
			<td> <img src="picscript.php?ID=<?php echo $record['ID']; ?>" height="80" width="100"> </td>
			<td> <?php echo $record['MakeID']; ?> </td>
			<td> <?php echo $record['ModelID']; ?> </td>
			<td> <?php echo $record['Transmission']; ?> </td>
			<td> <?php echo $record['EngineSize']; ?> cc </td>
			<td> <?php echo $record['YearManufacture']; ?> </td>
			<td> <?php echo $record['Steering']; ?> </td>
			<td> <?php echo $record['Mileage']; ?> </td>
			<td> Tshs. <?php echo number_format($record['Price'], 2, '.', ',');; ?> /=</td>
			<td> <a href="?viewCar=<?php echo $record['ID']; ?>" > View Car details </a> </td>
			</tr>
			<?php
			
		}//end while loop
		
		?>
		</table>
		<?php
		
	}
	
	
	//echo $sql;
	
}//end search results functions
?>
<p>
<?php echo $logs; ?>
</p>


        
        
        </td></tr></table>
        
		<hr noshade style="color:#B9C2C6" size=1>
		<table width=100% cellpadding=0 cellspacing=0>
			<tr>
			   
				<td align=right><div class="copyright"><?php $footer; ?></div></td>
			</tr>
		</table>
		
		</div><br>
	</td>
</tr>
</table>

	<!-- Modal -->
			<div id="uploadModal" class="modal hide fade" tabindex="-1" role="dialog"
			 data-backdrop="static" data-keyboard="false"
			aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						X
					</button>
					<h3 id="myModalLabel">Advert Image</h3>
				</div>
				<div class="modal-body">
					<form id="imageform" action="file_upload.php" method="post"
					enctype="multipart/form-data">
						<label for="file">Filename:</label>
						<input type="file" name="file" id="file">
						<br>
						<div id='preview' style="width: 300;"></div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="saveButton" class="btn btn-primary" data-dismiss="modal">
						Save
					</button>
					<button id="closeButton" class="btn" data-dismiss="modal" aria-hidden="true">
						Close
					</button>
				</div>
			</div>

</body>
</html>
