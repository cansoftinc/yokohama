<?php
if(isset($_GET['DocumentID']))
{

require('connection.php');
 $documentID = $_GET['DocumentID'];
$query = "SELECT filename,type, size, DocumentImage " .
         "FROM files WHERE IDENTIFICATION = '$documentID'";

$result = mysql_query($query) or die('Error, query failed');
list($filename, $type, $size, $DocumentImage) =  mysql_fetch_array($result);
$filename=str_replace(" ", "", $filename);
header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$filename");
echo $DocumentImage;


}//end isset
?>
<?php 
session_start();
require('settings.php');
?>

<html>
<head>
	<title><?php echo $title; ?></title>
	<!-- include style sheet -->
	<link rel="STYLESHEET" type="text/css" href="css/general.css">
	
	
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
    <td colspan="2" height=60 bgcolor="#9DB3AC" style="padding: 5px 0px 5px 15px;"> 
		<table cellspacing="0" cellpadding="0" border="0">
			<tr>
			<td><img src="images/mwenge.gif" width="32" height="45" alt="" border="0"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td align="center" style="color:#f5f5f5;"><H1><?php echo $Heading; ?></H1></td>
			
			</tr>
		</table>
	</td>
</tr>
<tr><td colspan=2 height=30 bgcolor="#888888">
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
    <td rowspan=2 width=180 valign=top align=center style="padding:5px" bgcolor="#eeeeee"><table cellspacing="0" cellpadding="0" border="0">
		<tr>
		    <td align="left" style="padding-left: 1px;" valign=top>
			
            <table style="border-bottom:1px black solid;border-top:1px black solid;border-left:1px black solid;border-right:1px black solid;">
           <?php
		    links();
		   ?>
           
            </table>
			
			</td>
		</tr>
	</table></td>
     <td valign=top class=normal>
				<div class=normal style="width:1100;padding:15px 10px 15px 20px">
		<table cellpadding=0 cellspacing=0 border=0 width=100%><tr><td class="header1">
        
        
        <?php

function SimpleSearch()
{
?>

<a href="?addNewPlot=1">Add New Car </a> <br /><br>

 Search for Cars <br /><br />

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return ValidateSimpleSearchForm(this)">

<table>
<tr><td> Make </td> <td><select name="make" >
	<option value="">---Select --- </option>
	<?php
	require('connection.php');
	$query=mysql_query("SELECT * FROM make",$connect) or die(mysql_error());
	while($record = mysql_fetch_array($query))
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
	require('connection.php');
	$query=mysql_query("SELECT * FROM model",$connect) or die(mysql_error());
	while($record = mysql_fetch_array($query))
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

<tr><td><input type="submit"  name="Search" value="Search"  class="button" /></td></tr>

</table>

</form>

<?php
}//end function simple search
?>

<?php

function SimpleSearchResults($make,$model,$transmission,$fuel,$drive)
{
	require('connection.php');
	//echo $PlotRecordID;
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
	
	
	$query = mysql_query($sql,$connect) or die(mysql_error());
	
	if(mysql_num_rows($query)==0)
	{
		echo "<span class='error'>No Car Found </span>";
	}
	else
	{
		echo mysql_num_rows($query)." car(s) Found ";
		?>
		<table border="1" cellspacing="0" >
		<tr><th> No </th><th>Photo </th><th>Make</th> <th>Model </th> <th>Transmission </th> <th>Engine Size </th> <th>Year </th> <th>Wheel </th> <th>Mileage </th> <th> Price </th><th> view </th></tr>
		<?php
		$num=0;
		while($record = mysql_fetch_array($query))
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
			<td> <a href="?viewCar=<?php echo $record[ID]; ?>" > View Car details </a> </td>
			</tr>
			<?php
			
		}//end while loop
		
		?>
		</table>
		<?php
		
	}
	
	
	//echo $sql;
	
}//end search results functions

function NewCarRegistration()
{
	
	?>
    Car Information <br />
	<table><tr><td class="error">Note: The Uploaded Car Pictures should be less than 1MB</td></tr></table><br>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <table>
    <tr><td> Mileage: </td> <td> <input type="text" name="mileage" onKeyup="formatx(this)" /> </td></tr>
    <tr><td> Make </td> <td><select name="make" >
	<option value="">---Select --- </option>
	<?php
	require('connection.php');
	$query=mysql_query("SELECT * FROM make",$connect) or die(mysql_error());
	while($record = mysql_fetch_array($query))
	{
		?>
		<option> <?php echo $record['Make']; ?> </option> 
		<?php
	}//end while loop
	?>
	</select>
	</td></tr>
    
    <tr><td> Model: </td> <td><select ID='carmodel' name="model">
	
	<option value="">---Select --- </option>
	<?php
	require('connection.php');
	$query=mysql_query("SELECT * FROM model",$connect) or die(mysql_error());
	while($record = mysql_fetch_array($query))
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
     
	 <tr><td> Chasis Number: </td> <td> <input type="text" name="ChasisNumber"  /> </td></tr>
	 <tr><td> Engine Size(cc): </td> <td> <input type="text" name="enginesize"  /> </td></tr>
	 <tr><td> Year Manufactured: </td> <td> <input type="text" name="yearManufactured"  /> </td></tr>
	 <tr><td> Colour: </td> <td> <input type="text" name="colour"  /> </td></tr>
	 <tr><td> Arrival Date: </td> <td> <input type="text" name="arrivalDate" onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''" /> </td></tr>
	 <tr><td> Price: </td> <td> <input type="text" name="price" onKeyup="formatx(this)"  /> </td></tr>
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
	 
	  <tr><td> Number of Doors: </td> <td> <input type="text" name="doors"  /> </td></tr>
	  <tr><td> Number of Seats: </td> <td> <input type="text" name="seats"  /> </td></tr>
	  <tr><td> Car Profile Picture: </td> <td> <input type="file" name="carPictures"  class='button'> </td></tr>
	 
    <tr><td></td> <td><input type="submit" name="SaveCars" value="Save" class="button" /> &nbsp;&nbsp; <a href="carsmanagement.php"><input type="button" value="Cancel" class="button" /></a></td></tr>
    </table>
    </form>
    
    
    <?php
}


function SaveCarsDetails($mileage,$make,$model,$transmission,$ChasisNumber,$enginesize,$yearManufactured,$colour,$arrivalDate,$price,$wheel,$drive,$fuel,$seats,$doors,$data)
{
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
		else
		{
		
			require('connection.php');
		
			$verifyAbsence = mysql_query("SELECT * FROM cars WHERE ChasisNumber='$ChasisNumber' ",$connect) or die(mysql_error());
		
		//$sql="SELECT * FROM plot WHERE PlotNumber='$PlotNumber' AND Block='$block' AND Location='$location'";
		//echo $sql;
		
			if(mysql_num_rows($verifyAbsence)==0)
			{
				//echo "Plot Does not exist";
				
				$insertPlot = mysql_query("INSERT INTO cars(MakeID,ModelID,Transmission,ChasisNumber,EngineSize,YearManufacture,Colour,ArrivalDate,Price,Steering,Fuel,Drive,Mileage,Doors,Seats,ProfilePicture) VALUES('$make','$model','$transmission','$ChasisNumber','$enginesize','$yearManufactured','$colour','$arrivalDate','$price','$wheel','$fuel','$drive','$mileage','$doors','$seats','$data')",$connect)or die(mysql_error());
				
				$findRecordID = mysql_query("SELECT ID FROM cars WHERE ChasisNumber='$ChasisNumber' ",$connect) or die(mysql_error());
				$recID = mysql_fetch_array($findRecordID);
				
				$PlotRecordID = $recID['ID'];
				
				CarAccount($PlotRecordID);
				
			}
			else
			{
				NewCarRegistration();
				echo "<span class='error'>Car already Exists</span>";
			}
		
		}
		
}//end function saving details of plots


function CarAccount($CarID)
{
	require('connection.php');
	//echo $PlotRecordID;
	$query = mysql_query("SELECT * FROM cars WHERE ID = '$CarID' ",$connect) or die(mysql_error());
	
	$recordsPlot = mysql_fetch_array($query);
	
	?>
	
	CAR DETAILS
	
	<table>
	<tr><td valign="top"> <img src="picscript.php?ID=<?php echo $recordsPlot['ID']; ?>" height="300" width="400"> </td> <td>
	    
    <table border=1 cellspacing=0><tr><td colspan="2" align="center">
    
    <table>
    <tr><td> Chasis Number: </td> <td> <?php echo $recordsPlot['ChasisNumber'];  ?>  <a href="?UpdatePlotInfo=<?php echo $CarID; ?>">Edit car Info</a> </td> </tr>
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
    
    
    <A href="?cancelAccount=1"><input type="button" value="Back To Search" class="button"  /></A>
    <?php
	
	
}//end function Plot account


function EditCarInfo($CarID)
{
	require('connection.php');
	$query = mysql_query("SELECT * FROM cars WHERE ID = '$CarID' ",$connect) or die(mysql_error());
	$records = mysql_fetch_array($query);
	?>
    EDITING CAR INFORMATION <BR /><BR />
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <table>
    <tr><td> Mileage: </td> <td> <input type="text" name="mileage" onKeyup="formatx(this)" value="<?php echo $records['Mileage']; ?>" /> </td></tr>
    <tr><td> Make </td> <td><select name="make" >
	<option><?php echo $records['MakeID']; ?> </option>
	<option value="">---Select --- </option>
	<?php
	require('connection.php');
	$query=mysql_query("SELECT * FROM make",$connect) or die(mysql_error());
	while($record = mysql_fetch_array($query))
	{
		?>
		<option> <?php echo $record['Make']; ?> </option> 
		<?php
	}//end while loop
	?>
	</select>
	</td></tr>
    
    <tr><td> Model: </td> <td><select ID='carmodel' name="model">
	<option> <?php echo $records['ModelID']; ?> </option>
	<option value="">---Select --- </option>
	<?php
	require('connection.php');
	$query=mysql_query("SELECT * FROM model",$connect) or die(mysql_error());
	while($record = mysql_fetch_array($query))
	{
		?>
		<option> <?php echo $record['Model']; ?> </option> 
		<?php
	}//end while loop
	?>
	</select>
	
	</td></tr>
     <tr><td> Transmission: </td> <td><select name="transmission"  >
	 <option><?php echo $records['Transmission']; ?> </option>
	 <option value="">---Select --- </option>
	 <option value="Automatic"> Automatic </option>
	 <option value="Manual"> Manual </option>
	 </select>
	 </td> </tr>
     
	 <tr><td> Chasis Number: </td> <td> <input type="text" name="ChasisNumber" value="<?php echo $records['ChasisNumber']; ?>"   /> </td></tr>
	 <tr><td> Engine Size(cc): </td> <td> <input type="text" name="enginesize" value="<?php echo $records['EngineSize']; ?>" /> </td></tr>
	 <tr><td> Year Manufactured: </td> <td> <input type="text" name="yearManufactured" value="<?php echo $records['YearManufacture']; ?>" /> </td></tr>
	 <tr><td> Colour: </td> <td> <input type="text" name="colour" value="<?php echo $records['Colour']; ?>" /> </td></tr>
	 <tr><td> Arrival Date: </td> <td> <input type="text" name="arrivalDate" onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''"  value="<?php echo $records['ArrivalDate']; ?>"  /> </td></tr>
	 <tr><td> Price: </td> <td> <input type="text" name="price" onKeyup="formatx(this)" value="<?php echo $records['Price']; ?>"  /> </td></tr>
	 <tr><td> Steering Wheel: </td> <td> <select name="wheel"  >
	 <option><?php echo $records['Steering']; ?> </option>
	 <option value="">---Select --- </option>
	 <option value="Right"> Right </option>
	 <option value="Left"> Left </option>
	 </select> </td></tr>
	 
	  <tr><td> Drive: </td> <td> <select name="drive"  >
	  <option><?php echo $records['Drive']; ?> </option>
	 <option value="">---Select --- </option>
	 <option value="2 Wheel Drive"> 2 Wheel Drive </option>
	 <option value="4 Wheel Drive"> 4 Wheel Drive </option>
	 </select> </td></tr>
	 
	  <tr><td> Fuel: </td> <td> <select name="fuel"  >
	  <option><?php echo $records['Fuel']; ?> </option>
	 <option value="">---Select --- </option>
	 <option value="Petrol"> Pertol / Gasoline </option>
	 <option value="Diesel"> Diesel </option>
	 </select> </td></tr>
	 
	  <tr><td> Number of Doors: </td> <td> <input type="text" name="doors" value="<?php echo $records['Doors']; ?>"   /> </td></tr>
	  <tr><td> Number of Seats: </td> <td> <input type="text" name="seats" value="<?php echo $records['Seats']; ?>"  /> </td></tr>
	  <tr><td> Car Profile Picture: </td> <td> <input type="file" name="carPictures"  class='button'> </td></tr>
	 
    <tr><td></td> <td><input type="submit" name="EditCarInformation" value="Save" class="button" /> &nbsp;&nbsp; <a href="?cancelEditCar=<?php echo $records[ID]; ?>"><input type="button" value="Cancel" class="button" /></a></td></tr>
    </table>
	
	<input type="hidden" name="ID" value="<?php echo $records[ID]; ?>" >
	
    </form><?php

}//end function Edit plot info

function PlotOwners($PlotRecordID)
{
	require('connection.php');
	
	$query = mysql_query("SELECT * FROM landowner L,ownership O,plot P WHERE L.OwnerID=O.OwnerID AND P.recordID=O.recordID AND P.recordID='$PlotRecordID' AND DateTo='0000-00-00' ",$connect)or die(mysql_error());
	
	if(mysql_num_rows($query)==0)
	{
		echo "<span class='error'>The Plot has No Owner</span><br>";
		?>
        <a href="?AddNewOwner=<?php echo $PlotRecordID; ?>" > Add New Owner </a>
        <?php
	}else
	{
		$fetchQuery = mysql_fetch_array($query);
		if($fetchQuery['Ownerstatus']=='Individual'){
		
		?>
        <b>PLOT CURRENT OWNER</b>(<a href="" onClick="return ViewOwnerFullDetails('<?php echo $fetchQuery['OwnerID']; ?>')">Edit Details</a>)
        <table>
        <tr><td colspan="2" align="center"><img src="picscript.php?ownerID=<?php echo $fetchQuery['OwnerID']; ?>" height="150" width="150" /></td></tr>
        <tr><td> First Name: </td> <td > <?php echo $fetchQuery['firstname']  ?> </td></tr>
        <tr><td> Middle Name: </td> <td> <?php echo $fetchQuery['middlename']  ?> </td></tr>
        <tr><td> Last Name: </td> <td> <?php echo $fetchQuery['surname']  ?> </td></tr>
        <tr><td> Gender: </td> <td> <?php echo $fetchQuery['Gender']  ?> </td></tr>
        <tr><td> Address: </td> <td> <?php echo $fetchQuery['Address']  ?> </td></tr>
        <tr><td> Physical Address: </td> <td> <?php echo $fetchQuery['PhysicalAddress']  ?> </td></tr>
        <tr><td> Nationality: </td> <td> <?php echo $fetchQuery['Nationality']  ?> </td></tr>
        </table>
        <A href="?TransferPlot=<?php echo $PlotRecordID; ?>"> Transfer Plot </A> <br />
        <?php
		}
		else
		{
		?>
		<b>PLOT CURRENT OWNER</b>(<a href="" onClick="return ViewOwnerFullDetails('<?php echo $fetchQuery['OwnerID']; ?>')">Edit Details</a>)
        <table>
        <tr><td colspan="2" align="center"><img src="picscript.php?ownerID=<?php echo $fetchQuery['OwnerID']; ?>" height="150" width="150" /></td></tr>
        <tr><td> Company Name: </td> <td > <?php echo $fetchQuery['CompanyName']  ?> </td></tr>
        <tr><td> Company Activities: </td> <td width="200"> <?php echo $fetchQuery['CompanyDealing']  ?> </td></tr>
        <tr><td> Address: </td> <td> <?php echo $fetchQuery['Address']  ?> </td></tr>
        <tr><td> Physical Address: </td> <td> <?php echo $fetchQuery['PhysicalAddress']  ?> </td></tr>
        </table>
        <A href="?TransferPlot=<?php echo $PlotRecordID; ?>"> Transfer Plot </A> <br />
        
        <?php
		}
	}
	
	PlotPreviousOwners($PlotRecordID);
	
}//ed function for displaying plot owners

function PlotPreviousOwners($PlotRecordID)
{
	require('connection.php');
	
	$query = mysql_query("SELECT * FROM landowner L,ownership O,plot P WHERE L.OwnerID=O.OwnerID AND P.recordID=O.recordID AND P.recordID='$PlotRecordID' AND DateTo!='0000-00-00' ",$connect)or die(mysql_error());
	
	if(mysql_num_rows($query)==0)
	{
		//echo "The Plot has No Previous owners";
	}
	else
	{
		?>
        <a href="?ViewPreviousOwners=<?php echo $PlotRecordID; ?>" > View Previuos Owners </a>
        <?php
	}	
	
}//end function Previuos owners

function ViewPreviousOwners($PlotRecordID)
{
	
	require('connection.php');
	
	$query = mysql_query("SELECT *,DATE_FORMAT(DateFrom, ' %W %D %M %Y') as DateFroms,DATE_FORMAT(DateTo, ' %W %D %M %Y') as DateTos FROM landowner L,ownership O,plot P WHERE L.OwnerID=O.OwnerID AND P.recordID=O.recordID AND P.recordID='$PlotRecordID' AND DateTo!='0000-00-00' ORDER BY DateFrom,DateTo ",$connect)or die(mysql_error());
	
	?>
    <table border=1 cellspacing="0">
    <tr><th>No.</th><th> Previous Owner Name</th> <th>Address</th> <th>Physical Address </th> <th>From Date: </th> <th>To Date: </th></tr>
    <?php
	$num=0;
	while($record = mysql_fetch_array($query))
	{
	
	
	$num++;
		?>
			<tr>
            <td><?php echo $num; ?>.</td>
            <?php
			if($record['Ownerstatus']=='Individual')
			{
			?>
            <td><a href="#" onClick="return ViewOwnerFullDetails('<?php echo $record['OwnerID'] ?>')"> <?php echo $record['firstname']." ".$record['middlename']." ".$record['surname']; ?> </a> </td>
            
            <?php
			}else
			{
			?>
            <td>Company: <br /><a href="#" onClick="return ViewOwnerFullDetails('<?php echo $record['OwnerID'] ?>')"> <?php echo $record['CompanyName']; ?> </a> </td>
            
            <?php
			}
			
			?>
            <td><?php echo $record['Address']; ?> </td>
            <td><?php echo $record['PhysicalAddress']; ?> </td>
            <td><?php echo $record['DateFroms']; ?> </td>
            <td><?php echo $record['DateTos']; ?> </td>
            </tr>
        <?
	}//end while loop
	?>
    <tr><td colspan="7" align="right"> <a href="?HidePreviosOwner=<?php echo $PlotRecordID; ?>" > Hide Previous Owners </a>
    </table>
    <?php
	
}//end function View Previous owners

function PlotTransfer($PlotRecID)
{
?>
	TRANSFER TO ?
	<table>
    <tr><td><a href="?NewIndivialOwnerTransfer=<?php echo  $PlotRecID; ?>">New Owner ( Individual )</a> </td>
    <td width="100"> </td> <td> <a href="?ExistingIndividualOwnerTransfer=<?php echo  $PlotRecID; ?>">Existing Owner ( Individual )</a> </td></tr>
    <tr><td>&nbsp;</td></tr> <tr><td>&nbsp;</td></tr>
    <tr><td><a href="?NewCompanyOwnerTransfer=<?php echo  $PlotRecID; ?>">New Owner ( Company )</a> </td>
    <td width="100"> </td> <td> <a href="?ExistingCompanyOwnerTransfer=<?php echo  $PlotRecID; ?>">Existing Owner ( Company )</a> </td></tr></table>
   
   <br />
   
    <a href="?cancelPlotTransfer=<?php echo $PlotRecID; ?>"><input type="button" name="Cancel" value="Cancel Transfer" class="button" /> </a>
	<?php

}//end Plot Transfer

function FileDocuments($PlotRecordID)
{
		require('connection.php');
		$query2=mysql_query("SELECT *,DATE_FORMAT(withEffectFrom, ' %W %D %M %Y') as EffectFrom
 FROM fileDetails WHERE recordID ='$PlotRecordID' ",$connect)or die(mysql_error());
		
		if(mysql_num_rows($query2)==0)
		{
			echo "<span class='error'>No file has been created</span> <br><br>";
		}
		else
		{
			$queryPlotInfo = mysql_query("SELECT * FROM  plot WHERE recordID='$PlotRecordID' ",$connect)or die(mysql_error());
			$recordPlot = mysql_fetch_array($queryPlotInfo);
			
			$rec = mysql_fetch_array($query2);
			$filenumber = $rec['fileNumber'];
			$LLNo = $rec['LandOfficeNumber'];
			$CTNo = $rec['CertificateOfTitleNo'];
			?>
            <a href="?EditFileDetails=<?php echo $PlotRecordID; ?>">Edit File Details</a> |
            <a href="?changelanduse=<?php echo $PlotRecordID; ?>&story=<?php echo $recordPlot['Landuse']; ?>">Change Land Use</a> | <a href="?changelandrent=<?php echo $PlotRecordID; ?>">Change Land Rent</a><br><br>
            <b>FILE DETAILS:</b>
            <table><tr><td>File Number: </td> <td><?php  echo $filenumber;?> </td> <td>Term: </td> <td><?php echo $rec['Term']; ?></td></tr> 
            <tr><td>Land Office Number: </td> <td><?php  echo $LLNo;?> </td> <td>With Effect from: </td> <td><?php echo $rec['EffectFrom']; ?></td></tr> 
            <tr><td>CertificateOfTitleNo: </td> <td><?php  echo $CTNo;?> </td><td> Land Use: </td> <td><?php echo $recordPlot['Landuse']; ?> </td> </tr>
            <tr><td>Land Rent:</td> <td> <?php echo number_format($recordPlot['Landrent'], 2, '.', ','); ?>/= </td></tr></table><br />
            <?php
		}
	
		?>
        <b>DOCUMENTS WITHIN A FILE:</b>
        <?php
		
		$query = mysql_query("SELECT *,DATE_FORMAT(AddDate, ' %W %D %M %Y') as AddDates FROM files WHERE recordID='$PlotRecordID' ",$connect)or die(mysql_error());
		
		if(mysql_num_rows($query)==0)
		{
			echo "<br><span class='error'>No Documents within  this File</span><br>";
		}else
		{
			echo "<table border=1 cellspacing=0>";
			echo "<tr><th>No</th><th>Description</th><th>Added On</th><th>Download</th><th>Delete</th></tr>";
			$num=0;
			while($record = mysql_fetch_array($query))
			{
			$num++;
			?>
			<tr>
            <td> <?php echo $num; ?>. </td>
            <td width=200> <?php echo $record['DocumentDescription']; ?> </td>
            <td> <?php echo $record['AddDates']; ?> </td>
            <td> <a href="?DocumentID=<?php echo $record['IDENTIFICATION']; ?>">Download</a> </td>
            <td> <a href="?DocumentDelete=<?php echo $record['IDENTIFICATION']; ?>&plotrecID=<?php echo $PlotRecordID; ?>" onClick="return ConfirmDelete()">Delete</a> </td>
            </tr>
            <?php
			}//end while loop
			echo "</table>";
		}
		?>
        <a href="?addDocument=<?php echo $PlotRecordID; ?>">Add Document</a> <br /><br />
        <?php
}//end function Documents within a file

function AddNewDocument($PlotRecordID)
{
	?>
    ADD NEW DOCUMENT TO THE FILE <br /><br />
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <table>
    <input type="hidden" name="MAX_FILE_SIZE" value="320000000">
    <tr><td>Document File: </td> <td> <input type="file" name="userfile" /> </td></tr>
    <tr><td>Document Description: </td> <td><textarea name="DocumentDescription" ></textarea></td></tr>
    <tr><td>Date: </td> <td> <input type="text" name="AddedDate"  onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''"   /> </td></tr>
    <tr><td></td> <td><input type="submit" name="SaveNewDocument" value="Save" class="button" /><a href="?cancelAddNewDocument=<?php echo $PlotRecordID; ?>"><input type="button" value="Cancel" class="button" /></a></td></tr>
    </table>
    <input type="hidden" name="PlotRecordID" value="<?php echo $PlotRecordID;  ?>"  />
    </form>
    <?php
	
}//end function add new document


function NewPlotOwner($PlotRecID)
{
	?>
    NEW OWNER <BR><BR>
	<table>
    <tr><td><a href="?NewIndivialOwner=<?php echo  $PlotRecID; ?>">New Owner ( Individual )</a> </td>
    <td width="100"> </td> <td> <a href="?ExistingIndividualOwner=<?php echo  $PlotRecID; ?>">Existing Owner ( Individual )</a> </td></tr>
    <tr><td>&nbsp;</td></tr> <tr><td>&nbsp;</td></tr>
    <tr><td><a href="?NewCompanyOwner=<?php echo  $PlotRecID; ?>">New Owner ( Company )</a> </td>
    <td width="100"> </td> <td> <a href="?ExistingCompanyOwner=<?php echo  $PlotRecID; ?>">Existing Owner ( Company )</a> </td></tr></table>
    
    <br />
   
    <a href="?cancelPlot=<?php echo $PlotRecID; ?>"><input type="button" name="Cancel" value="Cancel" class="button" /> </a>
	<?php
}//end function New Plot owner

function RegisterNewOwner($plotrecordID)
{
	?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="700000000">
    REGISTER NEW LAND OWNER<BR /><BR />
    <table>
    <tr><td colspan="2" align="center"> <b>OWNER'S DETAILS</b> </td></tr>
    <tr><td> First Name: </td> <td><input type="text" name="fname" value="<?php echo $_POST['fname']; ?>"  /> </td></tr>
    <tr><td> Middle Name: </td> <td><input type="text" name="mname"  value="<?php echo $_POST['mname']; ?>"/> </td></tr>
    <tr><td> Sur Name: </td> <td><input type="text" name="sname"  value="<?php echo $_POST['sname']; ?>"/> </td></tr>
    <tr><td> Gender: </td> <td><select name="gender">
    <option value="M">Male</option>
    <option value="F">Female</option>
    </select>
    </td></tr>
    <tr><td> Address: </td> <td><input type="text" name="address"  value="<?php echo $_POST['address']; ?>"/> </td></tr>
    <tr><td> Physical Address: </td> <td><input type="text" name="physicalAddress"  value="<?php echo $_POST['physicalAddress']; ?>"/> </td></tr>
    <tr><td> Nationality: </td> <td><input type="text" name="nationality"  value="<?php echo $_POST['nationality']; ?>"/> </td></tr>
    <tr><td colspan="2" align="center"> <b>FILE DETAILS</b> </td></tr>
    <tr><td>File Number: </td> <td> <input type="text" name="filenumber" value="<?php echo $_POST['filenumber']; ?>" /></td> </tr>
    <tr><td>Land Office Number: </td> <td> <input type="text" name="LLNo"  value="<?php echo $_POST['LLNo']; ?>" /></td> </tr>
    <tr><td>Certificate Of Title Number: </td> <td> <input type="text" name="CTNo" value="<?php echo $_POST['CTNo']; ?>" /></td> </tr>
    <tr><td>Land rent: </td> <td> <input type="text" name="LandRent" value="<?php echo $_POST['LandRent']; ?>" onKeyUp="formatx(this)" /> Tshs.</td> </tr>
    <tr><td> Land Use: </td> <td><select name="user" >
    <option value="Residential"> Residential </option>
    <option value="Commercial"> Commercial </option>
    </select></td></tr>
    
    <tr><td>Term:</td> <td><select name="term">
	<option><?php echo $_POST['term']; ?> </option>
    <option value="">---Select ---</option>
    <option> 33 Years </option>
    <option> 66 Years </option>
    <option> 99 Years </option>
    
    </select></td></tr>
    <tr><td>With Effect From: </td> <td> <input type="text" name="DateFrom"  onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''" /></td> </tr>
    <tr><td>Owner Image: </td> <td> <input type="file" name="OwnerImage"  /> </td></tr>
    <tr><td><a href="?cancelregnewowner=<?php echo $plotrecordID ?>"><input type="button" value="Cancel" class="button"  /></a> </td> <td><input type="submit" name="SaveNewIndividualOwner" value="Save" class="button" /></td></tr>
    <input type="hidden" name="PlotRecID" value="<?php echo $plotrecordID; ?>"  />
    </table>
    </form>
    <?php
	
}//end function register new owner

function RegisterNewOwnerTransfer($plotrecordID)
{
	?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="700000000">
    TRANSFER TO ? <BR /><BR />
    <table>
    <tr><td> First Name: </td> <td><input type="text" name="fname"  /> </td></tr>
    <tr><td> Middle Name: </td> <td><input type="text" name="mname"  /> </td></tr>
    <tr><td> Sur Name: </td> <td><input type="text" name="sname"  /> </td></tr>
    <tr><td> Gender: </td> <td><select name="gender">
    <option value="M">Male</option>
    <option value="F">Female</option>
    </select>
    </td></tr>
    <tr><td> Address: </td> <td><input type="text" name="address"  /> </td></tr>
    <tr><td> Physical Address: </td> <td><input type="text" name="physicalAddress"  /> </td></tr>
    <tr><td> Nationality: </td> <td><input type="text" name="nationality"  /> </td></tr>
    <tr><td>Transfer Date: </td> <td> <input type="text" name="DateFrom"  onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''" /></td> </tr>
    <tr><td> Owner Image: </td> <td> <input type="file" name="OwnerImage"  /> </td></tr>
    <tr><td><a href="?cancelregnewownerTransfer=<?php echo $plotrecordID ?>"><input type="button" value="Cancel" class="button"  /></a> </td> <td><input type="submit" name="SaveNewIndividualOwnerTransfer" value="Save" class="button" /></td></tr>
    <input type="hidden" name="PlotRecID" value="<?php echo $plotrecordID; ?>"  />
    </table>
    </form>
    <?php
	
}//end function register new owner


function SearchExistingOwner($plotrecordID)
{
	?>
    SEARCH EXISTING LAND OWNERS
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table>
    <tr><td>Search By: </td> <td><select name="criteria">
    <option value="firstname"> Firtname </option>
    <option value="middlename"> Middlename</option>
    <option value="surname"> Surname </option>
    <option value="Gender">Gender </option>
    <option value="Address"> Address </option>
    <option value="PhysicalAddress"> Physical Address</option>
    
    </select> </td><td><input type="text" name="value"  /></td></tr>
    <tr><td></td> <td><input type="submit" name="SearchExistingOwners" value="Search" class="button" /> </td>
    
    <td><a href="?cancelregnewowner=<?php echo $plotrecordID ?>"><input type="button" value="Cancel" class="button"  /></a></td></tr>
    </table>
    <input type="hidden" name="PlotRecID" value="<?php echo $plotrecordID; ?>"  />
    </form>
    <?php
	
}//end function searching existing owners

function SearchExistingOwnersResults($criteria,$value,$plotRecID)
{
	require('connection.php');
	
	$query = mysql_query("SELECT * FROM landowner WHERE $criteria = '$value' ",$connect) or die(mysql_error());
	
	if(mysql_num_rows($query)==0)
	{
		SearchExistingOwner($plotRecID);
		echo "<span class='error'>No match Found!!!</span>";
	}else
	{
			SearchExistingOwner($plotRecID);
			
			?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            
            <table border=1 cellspacing="0">
            <tr><th>No.</th><th>FIRSTNAME</th><th>Middlename</th><th>Surname</th><th>Gender</th><th>Address</th><th>Physical Address</th><th>Nationality</th><th>Select</th></tr>
            <?php
			$num=0;
			
			while($reco = mysql_fetch_array($query))
			{
			$num++;
				?>
               <tr>
               <td><?php echo $num; ?> </td>
               <td><?php echo $reco['firstname']?> </td>
               <td><?php echo $reco['middlename']?> </td>
               <td><?php echo $reco['surname']?> </td>
               <td><?php echo $reco['Gender']?> </td>
               <td><?php echo $reco['Address']?> </td>
               <td><?php echo $reco['PhysicalAddress']?> </td>
               <td><?php echo $reco['Nationality']?> </td>
               <td>
               <input type="radio" name="SelectOwner" value="<?php echo $reco['OwnerID'] ?>"  />
               </td>
               </tr>
                <?php
			}
		
		?>
        <input type="hidden" name="PlotRecID" value="<?php echo $plotRecID; ?>"  />
        </table><br /><br />
        <TABLE><tr><td>File Number: </td> <td> <input type="text" name="filenumber"  /></td> </tr>
    <tr><td>Land Office Number: </td> <td> <input type="text" name="LLNo"  /></td> </tr>
    <tr><td>Certificate Of Title Number: </td> <td> <input type="text" name="CTNo"  /></td> </tr>
     <tr><td>Land rent: </td> <td> <input type="text" name="LandRent" value="<?php echo $_POST['LandRent']; ?>" onKeyUp="formatx(this)" /> Tshs.</td> </tr>
    <tr><td> Land Use: </td> <td><select name="user" >
    <option value="Residential"> Residential </option>
    <option value="Commercial"> Commercial </option>
    </select></td></tr>
    
    <tr><td>Term:</td> <td><select name="term">
    <option value="">---Select ---</option>
    <option> 33 Years </option>
    <option> 66 Years </option>
    <option> 99 Years </option>
    
    </select></td></tr>
        <tr><td>With Effect From:</td> <td> <input type="text" name="OwnFromDate" onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''"   /></td></tr>
       <tr><td> </td> <td><input type="submit" name="AssignExistingOwnerNewLand" value="Assign"  class="button" /> </td></tr>
        
        </form>
        <?php
		
		
	}
}

//****************************88

function SearchExistingOwnerTransfer($plotrecordID)
{
	?>
    SEARCH EXISTING PLOT OWNERS
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table>
    <tr><td>Search By: </td> <td><select name="criteria">
    <option value="firstname"> Firstname </option>
    <option value="middlename"> Middlename</option>
    <option value="surname"> Surname </option>
    <option value="Gender">Gender </option>
    <option value="Address"> Address </option>
    <option value="PhysicalAddress"> Physical Address</option>
    
    </select> </td><td><input type="text" name="value"  /></td></tr>
    <tr><td></td> <td><input type="submit" name="SearchExistingOwnersTransfer" value="Search" class="button" /> </td>
    
    <td><a href="?cancelregnewownerTransfer=<?php echo $plotrecordID ?>"><input type="button" value="Cancel" class="button"  /></a></td></tr>
    </table>
    <input type="hidden" name="PlotRecID" value="<?php echo $plotrecordID; ?>"  />
    </form>
    <?php
	
}//end function searching existing owners

function SearchExistingOwnersResultsTransferPlot($criteria,$value,$plotRecID)
{
	require('connection.php');
	
	$query = mysql_query("SELECT * FROM landowner WHERE $criteria = '$value' AND OwnerID NOT IN(SELECT OwnerID FROM ownership WHERE recordID='$plotRecID' AND DateTo='0000-00-00') ",$connect) or die(mysql_error());
	
	if(mysql_num_rows($query)==0)
	{
		SearchExistingOwnerTransfer($plotRecID);
		echo "<span class='error'>No match Found!!!</span>";
	}else
	{
			SearchExistingOwnerTransfer($plotRecID);
			
			?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            
            <table border=1 cellspacing="0">
            <tr><th>No.</th><th>FIRSTNAME</th><th>Middlename</th><th>Surname</th><th>Gender</th><th>Address</th><th>Physical Address</th><th>Nationality</th><th>Select</th></tr>
            <?php
			$num=0;
			
			while($reco = mysql_fetch_array($query))
			{
			$num++;
				?>
               <tr>
               <td><?php echo $num; ?> </td>
               <td><?php echo $reco['firstname']?> </td>
               <td><?php echo $reco['middlename']?> </td>
               <td><?php echo $reco['surname']?> </td>
               <td><?php echo $reco['Gender']?> </td>
               <td><?php echo $reco['Address']?> </td>
               <td><?php echo $reco['PhysicalAddress']?> </td>
               <td><?php echo $reco['Nationality']?> </td>
               <td>
               <input type="radio" name="SelectOwner" value="<?php echo $reco['OwnerID'] ?>"  />
               </td>
               </tr>
                <?php
			}
		
		?>
        <input type="hidden" name="PlotRecID" value="<?php echo $plotRecID; ?>"  />
        </table><br /><br />
        
        Own From Date: <input type="text" name="OwnFromDate" onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''"   /><br /><br />
        <input type="submit" name="AssignExistingOwnerNewLandTransferPlot" value="Assign"  class="button" />
        
        </form>
        <?php
		
		
	}
}

function NewPlotExistingCompany($plotRecID)
{
?>
	SEARCHING EXISTING COMPANY<br /><br />
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="hidden" name="plotRecID" value="<?php echo $plotRecID; ?>"  />
    <table>
    <tr><td> Search By: </td> <td> <select name="CompanyCriteria">
    <option value="CompanyName"> Company Name </option>
    <option value="CompanyDealing"> Company Activities </option>
    <option value="Address"> Company Address </option>
    <option value="PhysicalAddress"> Company Physical Address </option> </select>
    </td> <td> <input type="text" name="value"  /> </td></tr>
    <tr><td></td><td align="right"><input type="submit" name="SearchCompanyNewOwner" value="Search" class="button" /></td><td><a href="?cancelregnewowner=<?php echo $plotRecID;?>"><input type="button" value="Cancel" class="button" /></a></td></tr></table>
    </form>
<?php
}//end function

function SearchCompanyResults($criteria,$value,$plotRecID)
{
	require('connection.php');
	if($criteria=='' or $value=='')
	{
		NewPlotExistingCompany($plotRecID);
		echo "<br><br><span class='error'>Fill All The Fields </span>";
	}
	else
	{
		$query = mysql_query("SELECT * FROM landowner WHERE $criteria LIKE '%$value%' ",$connect) or die(mysql_error());
		
		if(mysql_num_rows($query)==0)
		{
			NewPlotExistingCompany($plotRecID);
			echo "<br><br><span class='error'>No Match Found!!!!</span>";
		}
		else
		{
				NewPlotExistingCompany($plotRecID);
				echo "<br><br>";
		?>
        	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
        		<table border=1 cellspacing="0">
                <tr><th>No.</th> <th>Company Name</th> <th>Company Activities</th> <th> Address </th> <th> Physical Address </th> <th>Choose</th> </tr>
        <?php
		$num=0;
			while($record = mysql_fetch_array($query))
			{
			$num++;
				?>
                <tr>
                <td><?php echo $num; ?>. </td>
                <td> <?php echo $record['CompanyName']; ?> </td>
                <td> <?php echo $record['CompanyDealing']; ?> </td>
                <td> <?php echo $record['Address']; ?> </td>
                <td> <?php echo $record['PhysicalAddress']; ?> </td>
                <td> <input type="radio" name="OwnerIDTick" value="<?php echo $record['OwnerID']; ?>"  /></td>
                </tr>
                <?php
			}//end while loop
			?>
            </table>
            <br />
            
        <table><tr><td colspan="2" align="center">FILE DETAILS</td></tr>
        <tr><td>File Number: </td> <td> <input type="text" name="filenumber"  /></td> </tr>
    <tr><td>Land Office Number: </td> <td> <input type="text" name="LLNo"  /></td> </tr>
    <tr><td>Certificate Of Title Number: </td> <td> <input type="text" name="CTNo"  /></td> </tr>
    
    <tr><td>Term:</td> <td><select name="term">
    <option value="">---Select ---</option>
    <option> 33 Years </option>
    <option> 66 Years </option>
    <option> 99 Years </option>
    
    </select></td></tr>
    <tr><td>With Effect From: </td> <td> <input type="text" name="DateFrom"  onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''" /></td> </tr>
    <tr><td align="right"><input type="submit" name="AssignExistCompnayNewLand" value="Assign" class="button" /></td> <td><a href="?cancelregnewowner=<?php echo $plotRecID;?>"><input type="button" value="Cancel" class="button" /></a></td></tr>
    
    </table>
          <input type="hidden" name="plotRecID" value="<?php echo $plotRecID; ?>"  />
          <input type="hidden" name="criteria" value="<?php echo $criteria ?>" />
          <input type="hidden" name="value" value="<?php echo $value; ?>"  />
          </form>  
            
            <?php
		}
		
	}
}//end function

function NewCompanyOwner($recordID)
{
	?>
    	NEW OWNER ( COMPANY ) <br /><br /> 
        
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
       <input type="hidden" name="MAX_FILE_SIZE" value="700000000">
       <table>
       <tr><td> Company Name: </td> <td> <input type="text" name="compName"  /></td></tr>
       <tr><td> Company Activities: </td> <td> <textarea name="CompanyActivities" ></textarea></td></tr>
       <tr><td> Company Address: </td> <td><input type="text" name="Address"  /></td></tr>
       <tr><td> Company Physical Address: </td> <td><input type="text" name="PhysicalAddress"  /></td></tr>
       <tr><td> Company Image(Logo) </td> <td> <input type="file" name="CompanyImage"  /> </td></tr>
       <tr><td colspan="2" align="center">FILE DETAILS</td></tr>
        <tr><td>File Number: </td> <td> <input type="text" name="filenumber"  /></td> </tr>
    <tr><td>Land Office Number: </td> <td> <input type="text" name="LLNo"  /></td> </tr>
    <tr><td>Certificate Of Title Number: </td> <td> <input type="text" name="CTNo"  /></td> </tr>
    
    <tr><td>Term:</td> <td><select name="term">
    <option value="">---Select ---</option>
    <option> 33 Years </option>
    <option> 66 Years </option>
    <option> 99 Years </option>
    
    </select></td></tr>
    <tr><td>With Effect From: </td> <td> <input type="text" name="DateFrom"  onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''" /></td> </tr>
       <tr><td> </td> <td><input type="submit" name="SaveNewCompanyOwner" value="Save" class="button" />
       
       <a href="?cancelregnewowner=<?php echo $recordID; ?>"><input type="button" value="Cancel" class="button" /></a>
       
       </td></tr>
       </table>
        
      
   
    
    
       <input type="hidden" name="recordID" value="<?php echo $recordID; ?>"  />
        
        </form>
    <?php
}

function TransferPlotNewCompany($PlotRecID)
{
	?>
    REGISTER COMPANY INFORMATION<BR /><BR />
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
    
    		<input type="hidden" name="MAX_FILE_SIZE" value="700000000">
            <input type="hidden" name="PlotRecID" value="<?php echo $PlotRecID; ?>"  />
       <table>
       <tr><td> Company Name: </td> <td> <input type="text" name="compName"  /></td></tr>
       <tr><td> Company Activities: </td> <td> <textarea name="CompanyActivities" ></textarea></td></tr>
       <tr><td> Company Address: </td> <td><input type="text" name="Address"  /></td></tr>
       <tr><td> Company Physical Address: </td> <td><input type="text" name="PhysicalAddress"  /></td></tr>
       <tr><td> Company Image(Logo) </td> <td> <input type="file" name="CompanyImage"  /> </td></tr>
       <tr><td>Transfer Date: </td> <td> <input type="text" name="dateFrom"  onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''" /></td></tr>
    <tr><td> </td> <td><input type="submit" name="SaveNewCompanyOwnertTransfer" value="Save" class="button" />
       
       <a href="?cancelregnewownerTransfer=<?php echo $PlotRecID; ?>"><input type="button" value="Cancel" class="button" /></a>
       
       </td></tr></table>
    
    </form>
    <?php

}//end function...

function SearchExistingCompanyTransfer($PlotRecID)
{
	?>
    
    SEARCHING EXISTING COMPANY FOR TRANSFER <br /><br />
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="hidden" name="plotRecID" value="<?php echo $PlotRecID; ?>"  />
    <table>
    <tr><td> Search By: </td> <td> <select name="CompanyCriteria">
    <option value="CompanyName"> Company Name </option>
    <option value="CompanyDealing"> Company Activities </option>
    <option value="Address"> Company Address </option>
    <option value="PhysicalAddress"> Company Physical Address </option> </select>
    </td> <td> <input type="text" name="value"  /> </td></tr>
    <tr><td></td><td align="right"><input type="submit" name="SearchCompanyNewOwnerTransfer" value="Search" class="button" /></td><td><a href="?cancelregnewownerTransfer=<?php echo $PlotRecID;?>"><input type="button" value="Cancel" class="button" /></a></td></tr></table>
    </form>
    
    <?php
}//end function 

function SearchCompanyResultsTransfer($criteria,$value,$PlotRecID)
{
	require('connection.php');
	if($criteria=='' or $value=='')
	{
		SearchExistingCompanyTransfer($PlotRecID);
		echo "<br><br><span class='error'>Fill All The Fields </span>";
	}
	else
	{
		$query = mysql_query("SELECT * FROM landowner WHERE $criteria LIKE '%$value%' ",$connect) or die(mysql_error());
		
		if(mysql_num_rows($query)==0)
		{
			SearchExistingCompanyTransfer($PlotRecID);
			echo "<br><br><span class='error'>No Match Found!!!!</span>";
		}
		else
		{
				SearchExistingCompanyTransfer($PlotRecID);
				echo "<br><br>";
		?>
        	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
        		<table border=1 cellspacing="0">
                <tr><th>No.</th> <th>Company Name</th> <th>Company Activities</th> <th> Address </th> <th> Physical Address </th> <th>Choose</th> </tr>
        <?php
		$num=0;
			while($record = mysql_fetch_array($query))
			{
			$num++;
				?>
                <tr>
                <td><?php echo $num; ?>. </td>
                <td> <?php echo $record['CompanyName']; ?> </td>
                <td> <?php echo $record['CompanyDealing']; ?> </td>
                <td> <?php echo $record['Address']; ?> </td>
                <td> <?php echo $record['PhysicalAddress']; ?> </td>
                <td> <input type="radio" name="OwnerIDTick" value="<?php echo $record['OwnerID']; ?>"  /></td>
                </tr>
                <?php
			}//end while loop
			?>
            </table>
            <br />
            
        <table>
    <tr><td>Transfer Date: </td> <td> <input type="text" name="DateFrom"  onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''" /></td> </tr>
    <tr><td align="right"><input type="submit" name="AssignExistCompnayNewLandTransferPlot" value="Assign" class="button" /></td> <td><a href="?cancelregnewownerTransfer=<?php echo $PlotRecID;?>"><input type="button" value="Cancel" class="button" /></a></td></tr>
    
    </table>
          <input type="hidden" name="plotRecID" value="<?php echo $PlotRecID; ?>"  />
          <input type="hidden" name="criteria" value="<?php echo $criteria ?>" />
          <input type="hidden" name="value" value="<?php echo $value; ?>"  />
          </form>  
            
            <?php
		}
		
	}
}//end function

function EditFileDetails($recordID)
{
	require('connection.php');
	$query = mysql_query("SELECT * FROM filedetails WHERE recordID='$recordID' ",$connect) or die(mysql_error());
	$rec = mysql_fetch_array($query);
	?>
    EDIT FILE DETAILS <br><br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
    
    <table>
    <tr><td> File Number: </td> <td> <input type="text" name="filenumber" value="<?php echo $rec['fileNumber']; ?>" > </td></tr>
    <tr><td> Certificate ot Title Number: </td> <td> <input type="text" name="Ctno" value="<?php echo $rec['CertificateOfTitleNo']; ?>" > </td></tr>
    <tr><td> Land Office Number: </td> <td> <input type="text" name="llno" value="<?php echo $rec['LandOfficeNumber']; ?>" > </td></tr>
    <tr><td> Term: </td> <td> <select name="term" >
    <option> <?php echo $rec['Term']; ?> </option>
    <option> 33 Years </option>
    <option> 66 Years </option>
    <option> 99 Years </option>
    </select></td></tr>
    <tr><td> Effect From: </td> <td> <input type="text" name="dateEffect" value="<?php echo $rec['withEffectFrom']; ?>" onfocus='showCalendarControl(this)' onclick='showCalendarControl(this)' onKeyUp="this.value=''" >  </td></tr>
    <tr><td></td><td> <input type="submit" name="saveFileEditDetails" value="Save" class="button" > <a href="?CancelEditFileDetails=<?php echo $recordID; ?>"><input type="button" value="Cancel" class="button" ></a></td></tr>
    </table>
    <input type="hidden" name="recordID" value="<?php echo $recordID; ?>" >
    
    </form>
    <?php
	
}//end function edit file details

function ChangeLandUse($changelanduse,$story)
{
	echo "CHANGING LAND USE<br><br>";
	switch($story)
	{
		case "Residential": $Changeto = "Commercial";
							echo "<br>Are you sure u want to change the Land use to Commercial?";
							?>
    <br><br>
    <a href="?recID=<?php echo $changelanduse; ?>&changeto=<?php echo $Changeto; ?>"><input type="button" value="Yes" class="button" > </a>  &nbsp;&nbsp;&nbsp;<a href="?cancelPlotTransfer=<?php echo $changelanduse; ?>" > <input type="button" value="No" class="button" > </a>
    <?php
							break;
		case "Commercial":	$Changeto = "Residential";
							echo "<br>Are you sure u want to change the land Use to Residential?";
							?>
    <br><br>
    <a href="?recID=<?php echo $changelanduse; ?>&changeto=<?php echo $Changeto; ?>"><input type="button" value="Yes" class="button" > </a>  &nbsp;&nbsp;&nbsp;<a href="?cancelPlotTransfer=<?php echo $changelanduse; ?>" > <input type="button" value="No" class="button" > </a>
    <?php
							break;
		default:
						?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <table>
                        <tr><td> Change To : </td> <td> <select name="changeto">
                        <option value="Residential">Residential</option>
                        <option value="Commercial"> Commercial </option>
                        </select>
                        <tr><td></td><td><input type="submit" name="saveLandUsei" value="Save" class="button"> <a href="?cancelPlotTransfer=<?php echo $changelanduse; ?>"><input type="button" value="Cancel" class="button"></a></td></tr>
                        </table>
                        <input type="hidden" name="recordID" value="<?php echo $changelanduse; ?>"> 
                        </form>
                        <?php
							break;
	}//end case
	
}

function ChangingLandRent($recID)
{
	require('connection.php');
	$query = mysql_query("SELECT * FROM plot WHERE recordID='$recID' ",$connect) or die(mysql_error());
	$record = mysql_fetch_array($query);
	?>
    CHANGING LAND RENT <br><br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
    <table>
    <tr><td> Current Rent </td> <td> <input type="text" name="currentRent" value="<?php echo $record['Landrent']; ?>" disabled > </td></tr>
    <tr><td> New Rent </td> <td> <input type="text" name="newRent" value="<?php echo $_POST['newRent']; ?>" onKeyUp="formatx(this)" > </td></tr>
    <tr><td></td> <td> <input type="submit" name="SaveNewRent" value="Save " class="button" > <a href="?cancelPlotTransfer=<?php echo $recID;?>"><input type="button" value="Cancel" class="button"></a></td></tr>
    </table>
    <input type="hidden" name="recordID" value="<?php echo $recID; ?>" >
    </form>
    <?php
	
}//end function 

//*************************************************************************************************************************************************************************
if(isset($_POST['Search']))
{
	SimpleSearch();
	echo "<br>";
	SimpleSearchResults($_POST['make'],$_POST['model'],$_POST['transmission'],$_POST['fuel'],$_POST['drive']);
}
else if(isset($_POST['saveLandUsei']))
{
	$changeto= $_POST['changeto'];
	$recID = $_POST['recordID'];
	
	require('connection.php');
	mysql_query("UPDATE plot SET Landuse='$changeto' WHERE recordID='$recID' ",$connect)or die(mysql_error());
	CarAccount($recID);
	
}
else if(isset($_POST['SaveNewRent']))
{
	$newRent = str_replace(',','',$_POST['newRent']);
	$recordID = $_POST['recordID'];
	
	if($newRent=='')
	{
		ChangingLandRent($recordID);
		echo "<span class='error'>Fill in The New rent.. </span>";
	}
	else
	{
		require('connection.php');
		mysql_query("UPDATE plot SET Landrent ='$newRent' WHERE recordID='$recordID' ",$connect)  or die(mysql_error());
		CarAccount($recordID);
	}
}
else if(isset($_GET['changeto']))
{
	$changeto = $_GET['changeto'];
	$recID = $_GET['recID'];
	
	require('connection.php');
	mysql_query("UPDATE plot SET Landuse='$changeto' WHERE recordID='$recID' ",$connect) or die(mysql_error());
	CarAccount($recID);
}
else if(isset($_GET['changelandrent']))
{
	ChangingLandRent($_GET['changelandrent']);
}
else if(isset($_GET['ExistingCompanyOwnerTransfer']))
{
	SearchExistingCompanyTransfer($_GET['ExistingCompanyOwnerTransfer']);
}
else if(isset($_GET['changelanduse']))
{
	ChangeLandUse($_GET['changelanduse'],$_GET['story']);
}
else if(isset($_POST['AssignExistCompnayNewLandTransferPlot']))
{
	$OwnerID = $_POST['OwnerIDTick'];
	$DateFrom = $_POST['DateFrom'];
	$plotRecID = $_POST['plotRecID'];
	$criteria = $_POST['criteria'];
	$value = $_POST['value'];
	
		if($OwnerID=='' or $DateFrom=='' )
		{
			SearchCompanyResultsTransfer($criteria,$value,$plotRecID);
			echo "<br><br><span class='error'>Fill All Fields Please</span>";
		}
		else
		{
			require('connection.php');
			
			$queryUpdate=mysql_query("UPDATE ownership SET DateTo='$DateFrom' WHERE recordID='$plotRecID' AND DateTo='0000-00-00' ",$connect) or die(mysql_error());
			
			mysql_query("INSERT INTO ownership(OwnerID,recordID,Ownership,DateFrom) VALUES('$OwnerID','$plotRecID','Company','$dateFrom')",$connect) or die(mysql_error());

			CarAccount($plotRecID);
		}
}
else if(isset($_POST['SaveNewCompanyOwnertTransfer']))
{
	$PlotRecID=$_POST['PlotRecID'];
	$compName = $_POST['compName'];
	$CompanyActivities = $_POST['CompanyActivities'];
	$Address = $_POST['Address'];
	$PhysicalAddress = $_POST['PhysicalAddress'];
	$dateFrom = $_POST['dateFrom'];
	
	if (isset($_FILES['CompanyImage']) && $_FILES['CompanyImage']['size'] > 0) { 
					require('connection.php');
					$image = $_FILES['CompanyImage'];
	
					$tmpName  = $_FILES['CompanyImage']['tmp_name'];  
       
      				// Read the file
      				$fp      = fopen($tmpName, 'r');
     				$data = fread($fp, filesize($tmpName));
      				$data = addslashes($data);
      				fclose($fp); 
			}
			
	
	if($PlotRecID=='' or $compName=='' or $CompanyActivities=='' or $Address=='' or $PhysicalAddress=='' or $dateFrom=='')
	{
		TransferPlotNewCompany($PlotRecID);
		echo "<br><br><span class='error'>Fill All The Fields</span>";
	}else
	{
			$queryInsert = mysql_query("INSERT INTO landowner(Address,PhysicalAddress,Ownerstatus,CompanyName,CompanyDealing,Image) VALUES ('$Address','$PhysicalAddress','Company','$compName','$CompanyActivities','$data') ",$connect) or die(mysql_error());
			if($queryInsert)
			{
			$OwnerID = mysql_insert_id();
			$queryUpdate=mysql_query("UPDATE ownership SET DateTo='$dateFrom' WHERE recordID='$PlotRecID' AND DateTo='0000-00-00' ",$connect) or die(mysql_error());
			
			mysql_query("INSERT INTO ownership(OwnerID,recordID,Ownership,DateFrom) VALUES('$OwnerID','$PlotRecID','Company','$dateFrom')",$connect) or die(mysql_error());
			}
			
		CarAccount($PlotRecID);
			
			
	}//end else.....

}
else if(isset($_GET['NewCompanyOwnerTransfer']))
{
	TransferPlotNewCompany($_GET['NewCompanyOwnerTransfer']);
}
else if(isset($_POST['saveFileEditDetails']))
{
	$filenumber = $_POST['filenumber'];
	$ctno = $_POST['Ctno'];
	$llno = $_POST['llno'];
	$effectDate = $_POST['dateEffect'];
	$term = $_POST['term'];
	$recordID = $_POST['recordID'];
	
	require('connection.php');
	
	if($filenumber=='' or $ctno=='' or $llno=='' or $effectDate=='' or $term=='')
	{
		EditFileDetails($recordID);
		echo "<span class='error'>Fill All the Details..</span>";
	}
	else
	{
	
	mysql_query("UPDATE  filedetails SET fileNumber='$filenumber',Term='$term',LandOfficeNumber='$llno',CertificateOfTitleNo='$ctno',withEffectFrom='$effectDate' WHERE recordID='$recordID' ",$connect) or die(mysql_error());
	
	CarAccount($recordID);
	}
	
}
else if(isset($_POST['SearchCompanyNewOwner']))
{
	$criteria = $_POST['CompanyCriteria'];
	$value = $_POST['value'];
	$plotRecID = $_POST['plotRecID'];
	SearchCompanyResults($criteria,$value,$plotRecID);
	
}
else if(isset($_POST['SearchCompanyNewOwnerTransfer']))
{
	$criteria = $_POST['CompanyCriteria'];
	$value = $_POST['value'];
	$plotRecID = $_POST['plotRecID'];
	SearchCompanyResultsTransfer($criteria,$value,$plotRecID);
	
}
else if(isset($_POST['AssignExistCompnayNewLand']))
{
	$OwnerIDTick = $_POST['OwnerIDTick'];
	$filenumber = $_POST['filenumber'];
	$LLNo = $_POST['LLNo'];
	$CTNo = $_POST['CTNo'];
	$term = $_POST['term'];
	$DateFrom = $_POST['DateFrom'];
	$plotRecID = $_POST['plotRecID'];
	$criteria = $_POST['criteria'];
	$value = $_POST['value'];
	
		if($OwnerIDTick==''  or $filenumber =='' or $LLNo=='' or $CTNo=='' or $term=='' or $DateFrom=='' or $plotRecID=='' or $criteria=='' or $value=='')
		{
			SearchCompanyResults($criteria,$value,$plotRecID);
			echo "<br><br><span class='error'> Fill All Fields Please</span>";
		}
		else
		{
			require("connection.php");
			
			mysql_query("INSERT INTO ownership(OwnerID,recordID,Ownership,DateFrom) VALUES('$OwnerIDTick','$plotRecID','Company','$DateFrom')",$connect) or die(mysql_error());
		
			mysql_query("INSERT INTO filedetails VALUES('$filenumber','$term','$LLNo','$CTNo','$DateFrom','$plotRecID') ",$connect) or die(mysql_error());
		CarAccount($plotRecID);
			
		}//end else part
	
}
else if(isset($_GET['ExistingCompanyOwner']))
{
	NewPlotExistingCompany($_GET['ExistingCompanyOwner']);
}
else if(isset($_GET['CancelEditFileDetails']))
{
	CarAccount($_GET['CancelEditFileDetails']);
}
else if(isset($_POST['SaveNewCompanyOwner']))
{
	$companyName = $_POST['compName'];
	$companyActivities = $_POST['CompanyActivities'];
	$companyAddress = $_POST['Address'];
	$companyPhysicalAddress = $_POST['PhysicalAddress'];
	$recordID = $_POST['recordID'];
	$term = $_POST['term'];
	$filenumber = $_POST['filenumber'];
	$LLNo = $_POST['LLNo'];
	$CTNo = $_POST['CTNo'];
	$dateFrom = $_POST['DateFrom'];
	
	if (isset($_FILES['CompanyImage']) && $_FILES['CompanyImage']['size'] > 0) { 
					require('connection.php');
					$image = $_FILES['CompanyImage'];
	
					$tmpName  = $_FILES['CompanyImage']['tmp_name'];  
       
      				// Read the file
      				$fp      = fopen($tmpName, 'r');
     				$data = fread($fp, filesize($tmpName));
      				$data = addslashes($data);
      				fclose($fp); 
			}
			
			
	if($companyName=='' or $companyActivities=='' or $companyAddress=='' or $companyPhysicalAddress=='' or $term=='' or $filenumber=='' or $LLNo=='' or $CTNo=='' or $dateFrom=='' )
	{
		NewCompanyOwner($recordID);
		echo "<br><br><span class='error'>Fill Fields Please</span>";
	}
	else
	{
		require('connection.php');
		
		$queryInsert = mysql_query("INSERT INTO landowner(Address,PhysicalAddress,Ownerstatus,CompanyName,CompanyDealing,Image) VALUES('$companyAddress','$companyPhysicalAddress','Company','$companyName','$companyActivities','$data') ",$connect) or die(mysql_error());
		
			if($queryInsert)
			{
				$OwnerID = mysql_insert_id();
		
				mysql_query("INSERT INTO ownership(OwnerID,recordID,Ownership,DateFrom) VALUES('$OwnerID','$recordID','Individual','$dateFrom')",$connect) or die(mysql_error());
		
				mysql_query("INSERT INTO filedetails VALUES('$filenumber','$term','$LLNo','$CTNo','$dateFrom','$recordID')",$connect) or die(mysql_error());
		
				CarAccount($recordID);
			}*
			else
			{
				echo "<span class='error'>Fails to register a New Owner</span>";
			}
	}
			
}
else if(isset($_POST['AssignExistingOwnerNewLand']))
{
	$ownerID = $_POST['SelectOwner'];
	$PlotRecID = $_POST['PlotRecID'];
	$dateFrom = $_POST['OwnFromDate'];
	$filenumber =$_POST['filenumber'];
	$LLNo=$_POST['LLNo'];
	$CTNo=$_POST['CTNo'];
	$term=$_POST['term'];
	$landRent = str_replace(',','',$_POST['LandRent']);
	$landuse = $_POST['user'];
		
		//echo $ownerID."<br>";
		//echo $PlotRecID."<br>";
		//echo $dateFrom."<br>";
		
		require('connection.php');
		mysql_query("UPDATE plot SET Landuse='$landuse',Landrent='$landRent' WHERE recordID='$PlotRecID' ",$connect) or die(mysql_error());
		mysql_query("INSERT INTO ownership(OwnerID,recordID,Ownership,DateFrom) VALUES('$ownerID','$PlotRecID','Individual','$dateFrom')",$connect) or die(mysql_error());
		
		mysql_query("INSERT INTO filedetails VALUES('$filenumber','$term','$LLNo','$CTNo','$dateFrom','$PlotRecID') ",$connect) or die(mysql_error());
		CarAccount($PlotRecID);
	
}
else if(isset($_POST['AssignExistingOwnerNewLandTransferPlot']))
{
	$ownerID = $_POST['SelectOwner'];
	$PlotRecID = $_POST['PlotRecID'];
	$dateFrom = $_POST['OwnFromDate'];
		
		//echo $ownerID."<br>";
		//echo $PlotRecID."<br>";
		//echo $dateFrom."<br>";
		
		require('connection.php');
		
		//$sql="UPDATE ownership SET DateTo='$dateFrom' WHERE recordID='$PlotRecID' AND DateTo='0000-00-00'";
		//echo $sql;
		
		$query=mysql_query("UPDATE ownership SET DateTo='$dateFrom' WHERE recordID='$PlotRecID' AND DateTo='0000-00-00' ",$connect) or die(mysql_error());
		if($query){
		mysql_query("INSERT INTO ownership(OwnerID,recordID,Ownership,DateFrom) VALUES('$ownerID','$PlotRecID','Individual','$dateFrom')",$connect) or die(mysql_error());
		}
		
		CarAccount($PlotRecID);
}
else if(isset($_GET['cancelregnewownerTransfer']))
{
	PlotTransfer($_GET['cancelregnewownerTransfer']);
}
else if(isset($_GET['ExistingIndividualOwnerTransfer']))
{
	SearchExistingOwnerTransfer($_GET['ExistingIndividualOwnerTransfer']);
}
else if(isset($_GET['EditFileDetails']))
{
	$recordID = $_GET['EditFileDetails'];
	EditFileDetails($recordID);
}
else if(isset($_POST['SearchExistingOwners']))
{
	$criteria = $_POST['criteria'];
	$value = $_POST['value'];
	$plotRecID = $_POST['PlotRecID'];
	
	SearchExistingOwnersResults($criteria,$value,$plotRecID);
	
}
else if(isset($_POST['SearchExistingOwnersTransfer']))
{
	$criteria = $_POST['criteria'];
	$value = $_POST['value'];
	$plotRecID = $_POST['PlotRecID'];
	
	SearchExistingOwnersResultsTransferPlot($criteria,$value,$plotRecID);
}
else if(isset($_GET['NewIndivialOwner']))
{
	 RegisterNewOwner($_GET['NewIndivialOwner']);
}
else if(isset($_GET['NewIndivialOwnerTransfer']))
{
	RegisterNewOwnerTransfer($_GET['NewIndivialOwnerTransfer']);
}
else if(isset($_GET['addNewPlot']))
{
	NewCarRegistration();
}
else if(isset($_POST['SaveCars']))
{
	
	
				if (isset($_FILES['carPictures']) && $_FILES['carPictures']['size'] > 0) { 
					require('connection.php');
					$image = $_FILES['carPictures'];
	
					$tmpName  = $_FILES['carPictures']['tmp_name'];  
       
      				// Read the file
      				$fp      = fopen($tmpName, 'r');
     				$data = fread($fp, filesize($tmpName));
      				$data = addslashes($data);
      				fclose($fp); 
			}
	
	SaveCarsDetails($_POST['mileage'],$_POST['make'],$_POST['model'],$_POST['transmission'],$_POST['ChasisNumber'],$_POST['enginesize'],$_POST['yearManufactured'],$_POST['colour'],$_POST['arrivalDate'],$_POST['price'],$_POST['wheel'],$_POST['drive'],$_POST['fuel'],$_POST['seats'],$_POST['doors'],$data);
	
}
else if(isset($_POST['SaveNewIndividualOwner']))
{
	$fname=strtoupper($_POST['fname']);
	$mname = strtoupper($_POST['mname']);
	$sname = strtoupper($_POST['sname']);
	$gender = $_POST['gender'];
	$address =$_POST['address'];
	$physicalAddress =$_POST['physicalAddress'];
	$nationality = $_POST['nationality'];
	$dateFrom = $_POST['DateFrom'];
	$plotrecID = $_POST['PlotRecID'];
	$term = $_POST['term'];
	$filenumber = $_POST['filenumber'];
	$LLNo = $_POST['LLNo'];
	$CTNo = $_POST['CTNo'];
	$user = $_POST['user'];
	$LandRent = str_replace(',','',$_POST['LandRent']);
	
	if (isset($_FILES['OwnerImage']) && $_FILES['OwnerImage']['size'] > 0) { 
					require('connection.php');
					$image = $_FILES['OwnerImage'];
	
					$tmpName  = $_FILES['OwnerImage']['tmp_name'];  
       
      				// Read the file
      				$fp      = fopen($tmpName, 'r');
     				$data = fread($fp, filesize($tmpName));
      				$data = addslashes($data);
      				fclose($fp); 
			}
	
	
	if($fname=='' or $mname=='' or $sname=='' or $gender==''or $address=='' or $physicalAddress=='' or $nationality=='' or $dateFrom=='' or $plotrecID=='' or $term=='' or $filenumber=='' or $LLNo=='' or $CTNo=='' or $user=='' or $LandRent=='' )
	{
		RegisterNewOwner($plotrecID);
		echo "<span class='error'>Fill All The fields Please</span>";
	}
	else
	{
		require('connection.php');
		
		mysql_query("INSERT INTO landowner(firstname,middlename,surname,Gender,Address,PhysicalAddress,Nationality,Ownerstatus,Image) VALUES('$fname','$mname','$sname','$gender','$address','$physicalAddress','$nationality','Individual','$data') ",$connect) or die(mysql_error());
		
		$OwnerID = mysql_insert_id();
		
		mysql_query("UPDATE plot SET Landrent='$LandRent',Landuse='$user' WHERE recordID ='$plotrecID' ",$connect) or die(mysql_error());
		
		mysql_query("INSERT INTO ownership(OwnerID,recordID,Ownership,DateFrom) VALUES('$OwnerID','$plotrecID','Individual','$dateFrom')",$connect) or die(mysql_error());
		
		mysql_query("INSERT INTO filedetails VALUES('$filenumber','$term','$LLNo','$CTNo','$dateFrom','$plotrecID')",$connect) or die(mysql_error());
		
		CarAccount($plotrecID);
		
	}
	
}
else if(isset($_POST['SaveNewIndividualOwnerTransfer']))
{
	
	$fname=strtoupper($_POST['fname']);
	$mname = strtoupper($_POST['mname']);
	$sname = strtoupper($_POST['sname']);
	$gender = $_POST['gender'];
	$address =$_POST['address'];
	$physicalAddress =$_POST['physicalAddress'];
	$nationality = $_POST['nationality'];
	$dateFrom = $_POST['DateFrom'];
	$plotrecID = $_POST['PlotRecID'];
	
	
		if (isset($_FILES['OwnerImage']) && $_FILES['OwnerImage']['size'] > 0) { 
					require('connection.php');
					$image = $_FILES['OwnerImage'];
	
					$tmpName  = $_FILES['OwnerImage']['tmp_name'];  
       
      				// Read the file
      				$fp      = fopen($tmpName, 'r');
     				$data = fread($fp, filesize($tmpName));
      				$data = addslashes($data);
      				fclose($fp); 
			}
	
	if($fname=='' or $mname=='' or $sname=='' or $gender==''or $address=='' or $physicalAddress=='' or $nationality=='' or $dateFrom=='' or $plotrecID==''  )
	{
		RegisterNewOwnerTransfer($plotrecID);
		echo "<span class='error'>Fill All The fields Please</span>";
	}
	else
	{
		require('connection.php');
		
		
		//$sql="UPDATE ownership SET DateTo='$dateFrom' WHERE recordID='$plotrecID' AND DateTo='0000-00-00' ";
		//echo $sql;
		
		$query=mysql_query("UPDATE ownership SET DateTo='$dateFrom' WHERE recordID='$plotrecID' AND DateTo='0000-00-00' ",$connect) or die(mysql_error());
		if($query){
		
		mysql_query("INSERT INTO landowner(firstname,middlename,surname,Gender,Address,PhysicalAddress,Nationality,Ownerstatus,Image) VALUES('$fname','$mname','$sname','$gender','$address','$physicalAddress','$nationality','Individual','$data') ",$connect) or die(mysql_error());
		
		$OwnerID = mysql_insert_id();
		
		$query = mysql_query("UPDATE landowner SET Image ='$data' WHERE OwnerID='$OwnerID' ",$connect) or die(mysql_error());
		
		mysql_query("INSERT INTO ownership(OwnerID,recordID,Ownership,DateFrom) VALUES('$OwnerID','$plotrecID','Individual','$dateFrom')",$connect) or die(mysql_error());
		}
		
		CarAccount($plotrecID);
		
	}
	
}
else if(isset($_GET['viewID']))
{
	CarAccount($_GET['viewID']);
}
else if(isset($_GET['AddNewOwner']))
{
	NewPlotOwner($_GET['AddNewOwner']);
}
else if(isset($_GET['viewCar']))
{
	CarAccount($_GET['viewCar']);
}
else if(isset($_GET['cancelPlotTransfer']))
{
	CarAccount($_GET['cancelPlotTransfer']);
}
else if(isset($_GET['TransferPlot']))
{
	PlotTransfer($_GET['TransferPlot']);
}
else if(isset($_GET['cancelPlot']))
{
	CarAccount($_GET['cancelPlot']);
}
else if(isset($_GET['cancelregnewowner']))
{
	NewPlotOwner($_GET['cancelregnewowner']);
}
else if(isset($_GET['ExistingIndividualOwner']))
{
	SearchExistingOwner($_GET['ExistingIndividualOwner']);
}
else if(isset($_GET['cancelAddNewDocument']))
{
	CarAccount($_GET['cancelAddNewDocument']);
}
else if(isset($_GET['addDocument']))
{
	AddNewDocument($_GET['addDocument']);
}
else if(isset($_GET['DocumentDelete']))
{
$documentID = $_GET['DocumentDelete']; 
$plotrecID = $_GET['plotrecID'];

require('connection.php');
mysql_query("DELETE FROM files WHERE IDENTIFICATION='$documentID' ",$connect) or die(mysql_error());
CarAccount($plotrecID);

}
else if(isset($_GET['HidePreviosOwner']))
{
	CarAccount($_GET['HidePreviosOwner']);
}
else if(isset($_GET['ViewPreviousOwners']))
{
	CarAccount($_GET['ViewPreviousOwners']);
	ViewPreviousOwners($_GET['ViewPreviousOwners']);
}
else if(isset($_POST['SaveNewDocument']))
{
		$documentAddDate=$_POST['AddedDate'];
		$documentDescription = $_POST['DocumentDescription'];
		$recordID = $_POST['PlotRecordID'];
		
	if($documentAddDate=='' or $documentDescription=='' or $recordID=='' or $_FILES['userfile']['size'] == 0)
	{
		AddNewDocument($recordID);
		echo "Fill All the fields Please";
	}else{	
		$fileName = $_FILES['userfile']['name'];
		$tmpName  = $_FILES['userfile']['tmp_name'];
		$fileSize = $_FILES['userfile']['size'];
		$fileType = $_FILES['userfile']['type'];

		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

		if(!get_magic_quotes_gpc())
		{
    		$fileName = addslashes($fileName);
			$fileName=str_replace(" ", "", $fileName);
		}

		require('connection.php');

		$query = "INSERT INTO files (recordID,DocumentImage,DocumentDescription,AddDate,size,type,filename) ".
		"VALUES ('$recordID','$content', '$documentDescription','$documentAddDate','$fileSize','$fileType','$fileName')";

		mysql_query($query) or die('Error, query failed');
		
		CarAccount($recordID);
		//echo "<br>File $fileName uploaded<br>";
		}
		
		
}
else if(isset($_GET['UpdatePlotInfo']))
{
	EditCarInfo($_GET['UpdatePlotInfo']);
}
else if(isset($_GET['cancelEditCar']))
{
	CarAccount($_GET['cancelEditCar']);
}
else if(isset($_POST['EditCarInformation']))
{
		$mileage=str_replace(',','',trim($_POST['mileage']));
		$make=trim($_POST['make']);
		$model=trim($_POST['model']);
		$transmission=trim($_POST['transmission']);
		$ChasisNumber=trim($_POST['ChasisNumber']);
		$enginesize=trim($_POST['enginesize']);
		$yearManufactured=trim($_POST['yearManufactured']);
		$colour=trim($_POST['colour']);
		$arrivalDate=trim($_POST['arrivalDate']);
		$price=str_replace(',','',trim($_POST['price']));
		$wheel=trim($_POST['wheel']);
		$drive=trim($_POST['drive']);
		$fuel=trim($_POST['fuel']);
		$seats = trim($_POST['seats']);
		$doors = trim($_POST['doors']);
		$ID = $_POST['ID'];
	
		if($mileage=='' or $make=='' or $model=='' or $transmission=='' or $ChasisNumber=='' or $enginesize=='' or $yearManufactured=='' or $colour=='' or $arrivalDate=='' or $price=='' or $wheel =='' or $drive=='' or $fuel=='' or $seats=='' or $doors=='' )
		{
			EditCarInfo($ID);
			echo "<br><span class='error'>Fill All The Fields Please</span>";
		}
		else
		{
				require('connection.php');
			
				mysql_query("UPDATE cars SET MakeID='$make',ModelID='$model',Transmission='$transmission',ChasisNumber='$ChasisNumber',EngineSize='$enginesize',YearManufacture='$yearManufactured',Colour='$colour',ArrivalDate='$arrivalDate',Price='$price',Steering='$wheel',Fuel='$fuel',Drive='$drive',Mileage='$mileage',Doors='$doors',Seats='$seats' WHERE ID='$ID' ",$connect) or die(mysql_error());
				
				
				if (isset($_FILES['carPictures']) && $_FILES['carPictures']['size'] > 0) { 
					require('connection.php');
					$image = $_FILES['carPictures'];
	
					$tmpName  = $_FILES['carPictures']['tmp_name'];  
       
      				// Read the file
      				$fp      = fopen($tmpName, 'r');
     				$data = fread($fp, filesize($tmpName));
      				$data = addslashes($data);
      				fclose($fp); 
			mysql_query("UPDATE cars SET ProfilePicture='$data' WHERE ID='$ID' ",$connect) or die(mysql_error());
			}
			
			
			
			CarAccount($ID);
		}
}
else if(isset($_GET['NewCompanyOwner']))
{
	NewCompanyOwner($_GET['NewCompanyOwner']);
}
else
{
	SimpleSearch();
}

?>
        
        
        
        
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
	

</body>
</html>
