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
			<td align="center" style="color:#ffffff;"><H1><?php echo $Heading; ?></H1></td>
			
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
        
        STAFF MANAGEMENT <br><br>
        
        <?php
		function SearchUsers()
		{
		?>
        <A href="?AddNewUser=1">Add New Staff </A> <br><br>
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <table>
        <tr><td>Search By: </td> <td><select name="Criteria">
        <option value="firstname">First Name </option>
        <option value="middlename"> Middle Name </option>
        <option value="surname">Last Name </option>
        <option value="address"> Address </option>
 		<option value="phone"> Phone </option>
        <option value="username">Username </option>
        </select></td> <td><input type="text" name="value" value="<?php echo $_POST['value']; ?>" ></td></tr>
        <tr><td></td><td></td> <td><input type="submit" name="SeachUsers" value="Seach" class="btn btn-warning"  ></td></tr></table>
        
        </form>
                
        <?php
		}//end function seach users
		
		function AddNewusers()
		{
			?>
            Add New Staff:<br><br>
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table class="table table-striped">
           	<tr><td> *First Name: </td> <td><input type="text" name="firstname" value="<?php echo $_POST['firstname']; ?>" ></td></tr>
            <tr><td> *Middle Name: </td> <td><input type="text" name="middlename" value="<?php echo $_POST['middlename']; ?>" ></td></tr>
            <tr><td> *Sur Name: </td> <td><input type="text" name="surname" value="<?php echo $_POST['surname']; ?>" ></td></tr>
            <tr><td> Gender: </td> <td> <select name="gender">
            <option value="M"> Male </option>
            <option value="F"> Female </option>
            </select>
            <tr><td> Address: </td> <td><input type="text" name="address" value="<?php echo $_POST['address']; ?>" ></td></tr>
            <tr><td> Email: </td> <td><input type="text" name="email" value="<?php echo $_POST['email']; ?>" ></td></tr>
            <tr><td> Phone: </td> <td><input type="text" name="phone" value="<?php echo $_POST['phone']; ?>" ></td></tr>
            
            <tr><td>Employee Type: </td> <td><select name="EmpType">
            <option value=""> ------- Select ------- </option>
            <option value="LimitedAccess"> With Limited Access </option>
            <option value="FullAccess"> With Full Access </option>
            </select>
            
            <tr><td> *username: </td> <td><input type="text" name="username" value="<?php echo $_POST['username']; ?>" ></td></tr>
            <tr><td> *Password: </td> <td><input type="password" name="userPass"  ></td></tr>
            <tr><td> *Confirm Password: </td> <td><input type="password" name="confpass"  ></td></tr>
            <tr><td></td> <td><input type="submit" name="SaveNewEmployee" value="Save" class="btn btn-primary"> 
            <a href="?Cancel=1"><input type="button" value="Cancel" class="btn btn-warning" ></a>
            </td></tr>
            </table>
            </form>
            <?php
		}//end function add new user
		
		function SeachingUsersResults($criteria,$value)
		{
			require('connection.php');
			
			if($value =='')
			{
				SearchUsers();
				echo "<span class='error'>Provide the value please</span>";
			}
			else{
			
			$query = "SELECT * FROM staff WHERE $criteria like'%$value%' ";
			$db=getConnection();
			$stmt=$db->prepare($query);
			$stmt->execute();
			//$count = $stmt->fetchAll();
			$count= $stmt->rowCount();
			if($count==0)
			{
				SearchUsers();
				echo "<span class='error'>No Match Found!!!!!</span>";
			}
			else
			{
				SearchUsers();
				
				echo "<span class='error'>".$count." User(s) Found..</span><br><br>";
				?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="UserSearchResult">
                
                <table border=1 cellspacing="0" class="table table-striped">
                <tr><th>SNo</th> <th>FirstName </th> <th>MiddleName </th> <th>LastName </th> <th>Gender </th> <th>Address </th><th>Email</th> <th>Phone</th> <th>Username</th> <th>Title</th> <th>Status</th> <th>Tick</th> </tr>
                
                <?php
				$num=0;
				foreach($db->query($query) as $rec )
				{
					$num++;
					?>
                    <tr>
                    <td> <?php echo $num; ?>. </td>
                    <td><?php echo $rec['Firstname']; ?> </td>
                    <td><?php echo $rec['Middlename']; ?> </td>
                    <td><?php echo $rec['Surname']; ?> </td>
                    <td><?php echo $rec['Gender']; ?> </td>
                    <td><?php echo $rec['Address']; ?> </td>
                    <td><?php echo $rec['Emailaddress']; ?> </td>
                    <td><?php echo $rec['PhoneNumber']; ?> </td>
                    <td> <a href="?usernameAccount=<?php echo $rec['username']; ?>&criteria=<?php echo $criteria; ?>&value=<?php echo $value; ?>"><?php echo $rec['username']; ?> </a> </td>
                    <td><?php echo $rec['TypeEmployee']; ?> </td> 
                    <td><?php echo $rec['status']; ?> </td>
                    <td><input type="checkbox" name="userSelected[]" value="<?php echo $rec['username']; ?>" ></td>
                    </tr>
                    <?php
				}//end while loop
				
				?>
                </table> 
                
                <input type="hidden" name="criteria" value="<?php echo $criteria; ?>" >
                <input type="hidden" name="value" value="<?php echo $value; ?>" >
                
                <input type="submit" name="submission" value="Delete" class="button">
                <input type="submit" name="submission" value="Disable" class="button">
                <input type="submit" name="submission" value="Enable" class="button">
                <input type="submit" name="submission" value="Reset Password" class="button"><br><br>
                
                <a href="#" onClick="return CheckAll()" class="link">Check All</a> | <a href="#" onClick="return UnCheckAll()" class="link">UnCheck All</a>
                
                </form>
                <?php
				}
			}
		}//end function
		
		function EDitUserDetails($username,$criteria,$value)
		{
			require('connection.php');
			$query = mysql_query("SELECT * FROM staff WHERE username='$username' ",$connect)or die(mysql_error());
			$rec = mysql_fetch_array($query);
			?>
            Edit User Details <br><br>
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table class="table table-striped">
            <tr><td> First Name: </td> <td> <input type="text" name="fname" value="<?php echo $rec['Firstname']; ?>" > </td></tr>
            <tr><td> Middlename Name: </td> <td> <input type="text" name="mname" value="<?php echo $rec['Middlename']; ?>" > </td></tr>
            <tr><td> Last Name: </td> <td> <input type="text" name="lname" value="<?php echo $rec['Surname']; ?>" > </td></tr>
            <tr><td> Gender: </td> <td> <input type="text" name="gender" value="<?php echo $rec['Gender']; ?>" > </td></tr>
            <tr><td> Address: </td> <td> <input type="text" name="address" value="<?php echo $rec['Address']; ?>" > </td></tr>
            <tr><td> Phone: </td> <td> <input type="text" name="phone" value="<?php echo $rec['PhoneNumber']; ?>" > </td></tr>
            <tr><td> Email: </td> <td> <input type="text" name="email" value="<?php echo $rec['Emailaddress']; ?>" > </td></tr>
            <tr><td> </td> <td><input type="submit" name="SaveEditedDetails" value="Save" class="button" > <a href="?cancelEdituser=<?php echo $username; ?>&criteria=<?php echo $criteria; ?>&value=<?php echo $value; ?>"> <input type="button" value="Cancel" class="button"></a> </td></tr>
            </table>
            
            <input type="hidden" name="criteria" value="<?php echo $criteria; ?>" >
            <input type="hidden" name="value" value="<?php echo $value; ?>" >
            <input type="hidden" name="username" value="<?php echo $username; ?>" >
            
            </form>
            <?php
			
		}//end function editing user details
		//*********************************** MAIN PROGRAM CONTROL STARTS HERE ***********************************************
		
		if(isset($_GET['AddNewUser']))
		{
			AddNewusers();
		}
		else if($_POST['submission']=="Delete")
		{
			//echo "Delete";
			$usersSelected= $_POST['userSelected'];
			$criteria = $_POST['criteria'];
			$value = $_POST['value'];
			
			if(count($usersSelected)==0)
			{
				SeachingUsersResults($criteria,$value);
				echo "<span class='error'>Error:Select At least One use Please </span>";
			}
			else
			{
				echo "Are you sure you want to Delete user(s)?";
				
				$newArray=array();
				?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <?php
				
				foreach($usersSelected as $users)
				{
					echo "<br>".$users;
					?>
                    <input type="hidden" name="usersSelected[]" value="<?php echo $users; ?>" >
                    <?php
				}
				?>
                <input type="hidden" name="criteria" value="<?php echo $criteria; ?>" >
                <input type="hidden" name="value" value="<?php echo $value; ?>" >
                <br><br><input type="submit" name="DeletingUsers" value="Yes" class="button">
                &nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="?cancelEdituser=<?php echo $username; ?>&criteria=<?php echo $criteria; ?>&value=<?php echo $value; ?>"><input type="button" value="No" class="button"> </a>					
                 </form>
                 
                <?php
				
			}
		}
		else if(isset($_GET['DeletingUsers']))
		{
			$users = $_GET['usersSelected'];
			$criteria = $_GET['criteria'];
			$value = $_GET['value'];
			
				require('connection.php');
				foreach($users as $get)
				{
					mysql_query("DELETE FROM staff WHERE username='$get'",$connect) or die(mysql_error());
				}	
				
				SeachingUsersResults($criteria,$value);
				
		}
		else if($_POST['submission']=="Disable")
		{
			$usersSelected= $_POST['userSelected'];
			$criteria = $_POST['criteria'];
			$value = $_POST['value'];
			
			if(count($usersSelected)==0)
			{
				SeachingUsersResults($criteria,$value);
				echo "<span class='error'>Error:Select At least One use Please </span>";
			}
			else
			{
				echo "Are you sure you want to Disable user(s)?";
				
				$newArray=array();
				?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <?php
				
				foreach($usersSelected as $users)
				{
					echo "<br>".$users;
					?>
                    <input type="hidden" name="usersSelectedDis[]" value="<?php echo $users; ?>" >
                    <?php
				}
				?>
                <input type="hidden" name="criteria" value="<?php echo $criteria; ?>" >
                <input type="hidden" name="value" value="<?php echo $value; ?>" >
                <br><br><input type="submit" name="DisableUsers" value="Yes" class="button">
                &nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="?cancelEdituser=<?php echo $username; ?>&criteria=<?php echo $criteria; ?>&value=<?php echo $value; ?>"><input type="button" value="No" class="button"> </a>					
                 </form>
                 
                <?php
			}
		}
		else if(isset($_GET['DisableUsers']))
		{
			$users = $_GET['usersSelectedDis'];
			$criteria = $_GET['criteria'];
			$value = $_GET['value'];
			
				require('connection.php');
				foreach($users as $get)
				{
					mysql_query("UPDATE staff SET status='Disabled' WHERE username='$get'",$connect) or die(mysql_error());
				}	
				
				SeachingUsersResults($criteria,$value);
				
		}
		else if($_POST['submission']=="Enable")
		{
			
			$usersSelected= $_POST['userSelected'];
			$criteria = $_POST['criteria'];
			$value = $_POST['value'];
			
			if(count($usersSelected)==0)
			{
				SeachingUsersResults($criteria,$value);
				echo "<span class='error'>Error:Select At least One use Please </span>";
			}
			else
			{
				echo "Are you sure you want to Enable user(s)?";
				
				$newArray=array();
				?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <?php
				
				foreach($usersSelected as $users)
				{
					echo "<br>".$users;
					?>
                    <input type="hidden" name="usersSelectedEna[]" value="<?php echo $users; ?>" >
                    <?php
				}
				?>
                <input type="hidden" name="criteria" value="<?php echo $criteria; ?>" >
                <input type="hidden" name="value" value="<?php echo $value; ?>" >
                <br><br><input type="submit" name="EnableUsers" value="Yes" class="button">
                &nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="?cancelEdituser=<?php echo $username; ?>&criteria=<?php echo $criteria; ?>&value=<?php echo $value; ?>"><input type="button" value="No" class="button"> </a>					
                 </form>
                 
                <?php
			}
		}
		else if(isset($_GET['EnableUsers']))
		{
			$users = $_GET['usersSelectedEna'];
			$criteria = $_GET['criteria'];
			$value = $_GET['value'];
			
				require('connection.php');
				foreach($users as $get)
				{
					mysql_query("UPDATE staff SET status='Active' WHERE username='$get'",$connect) or die(mysql_error());
				}	
				
				SeachingUsersResults($criteria,$value);
				
		}
		else if($_POST['submission']=="Reset Password")
		{
			$usersSelected= $_POST['userSelected'];
			$criteria = $_POST['criteria'];
			$value = $_POST['value'];
			
			if(count($usersSelected)==0)
			{
				SeachingUsersResults($criteria,$value);
				echo "<span class='error'>Error:Select At least One use Please </span>";
			}
			else
			{
				echo "Are you sure you want to Reset Password for user(s)?";
				
				$newArray=array();
				?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <?php
				
				foreach($usersSelected as $users)
				{
					echo "<br>".$users;
					?>
                    <input type="hidden" name="usersSelectedresPass[]" value="<?php echo $users; ?>" >
                    <?php
				}
				?>
                <input type="hidden" name="criteria" value="<?php echo $criteria; ?>" >
                <input type="hidden" name="value" value="<?php echo $value; ?>" >
                <br><br><input type="submit" name="ResetPasswordUser" value="Yes" class="button">
                &nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="?cancelEdituser=<?php echo $username; ?>&criteria=<?php echo $criteria; ?>&value=<?php echo $value; ?>"><input type="button" value="No" class="button"> </a>					
                 </form>
                 
                <?php
			}
		}
		else if(isset($_GET['ResetPasswordUser']))
		{
			$users = $_GET['usersSelectedresPass'];
			$criteria = $_GET['criteria'];
			$value = $_GET['value'];
			
			$newPass=md5(1234);
			
				require('connection.php');
				foreach($users as $get)
				{
					mysql_query("UPDATE staff SET password='$newPass' WHERE username='$get'",$connect) or die(mysql_error());
				}	
				
				SeachingUsersResults($criteria,$value);
				
				echo "The Temporary Passwords for users is 1234";
				
		}
		else if(isset($_POST['SaveEditedDetails']))
		{
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$sname = $_POST['lname'];
			$gender = $_POST['gender'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$criteria = $_POST['criteria'];
			$value = $_POST['value'];
			$username = $_POST['username'];
			
			require('connection.php');
			mysql_query("UPDATE staff SET firstname='$fname',middlename='$mname',surname='$sname',address='$address',phone='$phone',Email='$email',Gender='$gender' WHERE username ='$username' ",$connect)or die(mysql_error());
			
			SeachingUsersResults($criteria,$value);
			
		}
		else if(isset($_GET['cancelEdituser']))
		{
			SeachingUsersResults($_GET['criteria'],$_GET['value']);
		}
		else if(isset($_GET['usernameAccount']))
		{
			EDitUserDetails($_GET['usernameAccount'],$_GET['criteria'],$_GET['value']);
		}
		else if(isset($_POST['SeachUsers']))
		{
			SeachingUsersResults($_POST['Criteria'],$_POST['value']);
		}
		else if(isset($_GET['usernameAccount']))
		{
			
		}
		else if(isset($_POST['SaveNewEmployee']))
		{
			$fname = $_POST['firstname'];
			$mname = $_POST['middlename'];
			$sname = $_POST['surname'];
			$gender = $_POST['gender'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$Department = $_POST['EmpType'];
			$username = $_POST['username'];
			$pass = $_POST['userPass'];
			$confnewPass = $_POST['confpass'];
			
			if($fname=='' or $mname=='' or $sname=='' or $Department=='' or $username=='' or $pass=='' or $confnewPass=='' )
			{
				AddNewusers();
				echo "<span class='error'>Fill All Fields with a * Please</span>";
			}
			else
			{
					require('connection.php');
					$pass=md5($pass);
					$confnewPass=md5($confnewPass);
					$db = getConnection();
					if($pass==$confnewPass)
					{
						$verifyUsername = $db->prepare("SELECT * FROM staff WHERE username = '$username' ");
						$verifyUsername->execute();
						$count1= $verifyUsername->rowCount();
						if($count1>0)
						{
							AddNewusers();
							echo "<span class='error'>A username is already in use, Try another Username</span>";
						}
						else
						{
						echo "<span class='error'>Inside insert User ...".$fname." ||".$mname." ||". $sname." ||". $Department." ||". $username." ||". $pass." ||". $confnewPass."</span>";
						$queryInsert = "INSERT INTO staff ( Firstname,Middlename,Surname,Gender,Address,PhoneNumber,Emailaddress,username,Password,TypeEmployee,status) VALUES('$fname','$mname','$sname','$gender','$address','$phone','$email','$username','$pass','$Department','Active') ";
						$stmt =$db->prepare($queryInsert);
						$stmt->execute();
						$lastId = $db->lastInsertId();
								if($lastId>0){
									
									$_POST['firstname']='';
									$_POST['middlename']='';
									$_POST['surname']='';
									$_POST['gender']='';
									$_POST['address']='';
									$_POST['phone']='';
									$_POST['email']='';
									$_POST['EmpType']='';
									$_POST['username']='';
									$_POST['userPass']='';
									$_POST['confpass']='';
									
								AddNewusers();
								echo "<span class='error'>User is Registered...</span>";
					
								
								}else{
								echo "<div class='alert alert-warning'>Error...".$lastId."</div>";
								}
						}
					}
					else
					{
							AddNewusers();
							echo "<span class='error'>The Passwords Do not Match</span>";
					}
			}
		}
		else
		{
			SearchUsers();
		}
		?>
        
        </td></tr></table>
        
        
  

		<hr noshade style="color:#B9C2C6" size=1>
		<table width=100% cellpadding=0 cellspacing=0>
			<tr>
			   
				<td align=right><div class="copyright"><?php echo  $footer; ?></div></td>
			</tr>
		</table>
		
		</div><br>
	</td>
</tr>
</table>
	

</body>
</html>