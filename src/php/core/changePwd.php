<?php

	session_start();

        include_once("protect.php");
	include_once("engine.php");
	

	if ( (isset($_POST['current_pwd'])) && (isset($_POST['new_pwd'])) && (isset($_POST['confirm_pwd'])) )
	{
		if ( (($_POST['current_pwd']) != '') && (($_POST['new_pwd']) != '') && (($_POST['confirm_pwd']) != '') )
		{
			if (($_POST['new_pwd']) == ($_POST['confirm_pwd']) )
			{
				$sql_connection = new mySQLi_helper();
		                $res = $sql_connection->query_database("SELECT users.userpassword as pwd FROM users WHERE users.userid = '".$_SESSION['userid']."';");
				
				if (($res[0][pwd]) != '')
				{		
					if ( ($res[0][pwd]) == (md5($_POST['current_pwd'])) )
					{
						$sql_connection->query_database("UPDATE users SET users.userpassword = '".md5($_POST['new_pwd'])."' WHERE users.userid = '".$_SESSION['userid']."';");
						header("location:".$_SESSION['root_url'].'php/core/changePwd.php?err=1');

					} else {
						// current password posted is not valid
						header("location:".$_SESSION['root_url'].'php/core/changePwd.php?err=2');
					}
				}
				else // user do not have password (!)
				{
					header("location:".$_SESSION['root_url'].'php/core/changePwd.php?err=99');
				}
			} else {
				// confirmation password do not match
				header("location:".$_SESSION['root_url'].'php/core/changePwd.php?err=3');
			}
		} else {
			// at least one of the fields is empty
			header("location:".$_SESSION['root_url'].'php/core/changePwd.php?err=4');
		}
		
	}

	echo('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta http-equiv="imagetoolbar" content="no" />
			<link rel="icon" href="../../favicon.ico" type="image/x-icon" />
			<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
			<link rel="stylesheet" href="../../css/main.css" type="text/css" />
			<link rel="stylesheet" href="../../css/jquery.tooltip.css" type="text/css" />
			<!--[if IE]>
				<link rel="stylesheet" href="../../css/ie.css" type="text/css" />
			<![endif]-->
			<script type="text/javascript" src="../../js/jquery.js"></script>
			<script type="text/javascript" src="../../js/ajax.js"></script>
			<script type="text/javascript" src="../../js/helpingsystem/jquery/lib/jquery.js"></script>
			<script type="text/javascript" src="../../js/helpingsystem/jquery/lib/jquery.bgiframe.js"></script>
			<script type="text/javascript" src="../../js/helpingsystem/jquery/lib/jquery.dimensions.js"></script>
			<script type="text/javascript" src="../../js/helpingsystem/script.js"></script>
			<script type="text/javascript" src="../../js/helpingsystem/jquery/jquery.tooltip.js"></script>
			<script type="text/javascript" src="../../js/helpingsystem/animation.js"></script>
			<script type="text/javascript" src="../../js/mail_system.js"></script>
			<title>HoCS Task Management System</title>
		</head>
	<body>
		<div id="wrapper">
				<div id="fixed-column">
				</div>
				<div id="dynamic-column">
					<div id="backbar">

					</div>
					<div id="backbar">
						<ul class="toolbar-buttons"><!-- Typed in reverse display order for window resizing fix -->
							<li id="_helpBack" class="back-button"><a href="../modules/staff-members/" class="_help-show-module-list">Back to Staff Members</a></li>
						</ul>
					</div>
					<div id="toolbar">

						<ul class="toolbar-buttons"><!-- Typed in reverse display order for window resizing fix -->
							<li id="_helpLogout" class="red-button"><a href="logout.php">Logout</a></li>
						</ul>

					</div>
					<div id="timebar">
					</div>
					<div id="content"><!-- Main content area where all content is displayed -->
						<div class="column-headers">');

							if (isset($_GET['err']))
                                                	{
	                                                        $error_number = $_GET['err'];
	                                                        switch($error_number)
	                                                        {       
									case 1:
	                                                                        echo "Password changed successfuly!";
	                                                                        break;
	                                                                case 2:
	                                                                        echo "The current password entered is not valid. Please try again.";
	                                                                        break;
	                                                                case 3:
	                                                                        echo "Confirmation password do not match!";
	                                                                        break;
	                                                                case 4:
	                                                                        echo "You must fill all the three password fields.";
	                                                                        break;
	                                                                case 99:
	                                                                        echo "User error in the database. Password's NOT changed.";
	                                                                        break;
	
	                                                        }
                                                	} else { echo "Changing your current password"; }
						echo('</div>
						<form id="login-form" action="" method="POST">
							<div>
								<h2>Current password:</h2>
								<input class="password-field" type="password" name="current_pwd" value="" size="30" maxlength="30" /><br /><br />
								<h2>New Password:</h2>
								<input class="password-field" type="password" name="new_pwd" value="" size="30" maxlength="30" /><br />
								<h2>Confirm new Password:</h2>
								<input class="password-field" type="password" name="confirm_pwd" value="" size="30" maxlength="30" /><br />
								<input class="login-button" type="submit" name="Button" value="Change"/>
								<br/>
							</div>
						</form>
					</div>
				</div>');
	include_once('../ui-layout/footer.inc');
?>
