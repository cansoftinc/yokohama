<?php 
session_start();
require('settings.php');
?>
<html>
<head>
	<title><?php echo $title; ?> </title>
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
				<div class=normal style="width:1000;padding:15px 10px 15px 20px">
		<table cellpadding=0 cellspacing=0 border=0 width=100%><tr><td class="header1">
        
        Change Your Password. <br><br>
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
        
        <table>
        <tr><td>Current Password: </td> <td> <input type="password" name="oldPass" ></td></tr>
        <tr><td>New Password: </td> <td> <input type="password" name="newPass" ></td></tr>
        <tr><td>Confirm new Password: </td> <td> <input type="password" name="confirmnewPass" ></td></tr>
        <tr><td></td><td> <input type="submit" name="ChangePass" value="Change" class="btn btn-default" ></td></tr>
        </table>
        </form>
        
        <?php
		if(isset($_POST['ChangePass']))
		{
			$oldPass = $_POST['oldPass'];
			$newPass = $_POST['newPass'];
			$confnewPass = $_POST['confirmnewPass'];















			
				if($oldPass=='' or $newPass=='' or $confnewPass=='')
				{
					echo "<span class='error'>Fill the fields Please</span>";
				}
				else
				{
					$username = $_SESSION['username'];
					$oldPass = md5($oldPass);
					$newPass = md5($newPass);
					$confnewPass = md5($confnewPass);
					
					if($newPass == $confnewPass)
					{
						require('connection.php');
						$sql="SELECT * FROM staff WHERE username ='$username' AND password='$oldPass' ";
						$db = getConnection();
						$stmt=$db->prepare($sql);
						$stmt->execute();
						$count=$stmt->fetchObject();
						
						if($count==false)
						{
							echo "<span class='error'>Incorrect Current Password</span>";
						}
						else
						{
					//update

						$updatePass = "UPDATE staff SET password='$newPass' WHERE username='$username' ";
							$updatestmt=$db->exec($updatePass);							
							
							if($updatestmt>0){
								echo "<span class='error'>Password Changed.</span>";
							}


						}	
						
					}
					else
					{
						echo "<span class='error'>New passwords Don't Match</span>";
					}
				}
			
		}//end isset
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
