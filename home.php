<?php 
session_start();
require('settings.php');
?>
<html>
<head>
	<title> <?php echo $title; ?> </title>
	<!-- include style sheet -->
	<link rel="STYLESHEET" type="text/css" href="css/general.css">
<link rel="STYLESHEET" type="text/css" href="assets/css/bootstrap-responsive.css">
<link rel="STYLESHEET" type="text/css" href="assets/css/bootstrap.css">	
	
	<!-- include JavaScript -->
	<script language="JavaScript" src="function.js"></script>

	<!--
	<meta http-equiv="pragma" content="no-cache">
	<META HTTP-EQUIV="Expires" CONTENT="-1">
	-->
</head>

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">


<table cellspacing="0" cellpadding="0" border="0" width=100%>
<tr>
    <td colspan="2" height=60 bgcolor="#c3c3c9" style="padding: 5px 0px 5px 15px;"> 
		<table cellspacing="0" cellpadding="0" border="0">
			<tr>
			<td><img src="images/logo.jpg"  height="100" alt="" border="0"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td align="center" style="color:#ffffff;"><H1><?php echo $Heading; ?></H1>
<hr/></td>
			
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
				<div class=normal style="width:750;padding:15px 10px 15px 20px">
		<table cellpadding=0 cellspacing=0 border=0 width=100%><tr><td class="header1">
        
        
        
        
        </td></tr></table>
        
        
  

		<hr noshade style="color:#B9C2C6" size=1>
		<table width=100% cellpadding=0 cellspacing=0>
			<tr>
			   
				<td align=right><div class="copyright"><?php echo $footer; ?> </div></td>
			</tr>
		</table>
		
		</div><br>
	</td>
</tr>
</table>
	

</body>
</html>
