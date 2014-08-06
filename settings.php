<?php

$title = " Yokohama Motors Management System ";
$Heading = "Yokohama Motors Management System";
$footer = "Copyright &copy; Yokohama Motors Management System";



function links($active)
{
?>
			<div class="panel panel-primary">
			<tr><td class="nav nav-list bs-docs-sidenav"> <a href="home.php"> Home </a> </td></tr>
            <tr><td class="nav nav-list bs-docs-sidenav"> <a href="carsmanagement.php"> Cars Management </a> </td></tr>

<?php if($_SESSION['title']=="FullAccess"){ ?>
            <tr><td class="nav nav-list bs-docs-sidenav"> <a href="usermanagement.php"> User Management </a> </td></tr>
            <tr><td class="nav nav-list bs-docs-sidenav"> <a href="ChangePassword.php"> Change Password </a> </td></tr>
<?php } ?>
        
            <tr><td class="nav nav-list bs-docs-sidenav"><a href="logout.php"> <i class="icon-off icon-red"></i>Logout </a>
			</div>

<?php
}//end function

?>