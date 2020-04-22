<?php
	/* REMOVE THIS LINE WHEN DONE */
	include_once("php/REMOVE/debug.php");

	session_start();

	include_once("php/core/config.php");

	/* if there is a connection query then we proceeed it */
	if ( (isset($_POST['username'])) && (isset($_POST['password'])) )
	{
		include_once("php/core/engine.php");

		$sql_connection = new mySQLi_helper();
                $res = $sql_connection->query_database("SELECT users.userid FROM users WHERE users.username = '".$_POST['username']."' AND users.userpassword = '".md5($_POST['password'])."';");

		/* if the user exists in the database */
		if ($res[0][userid] != '')
		{
			$_SESSION['userid'] = $res[0][userid];
			$_SESSION['connected'] = 1;

		}else{
			header("location:".$_SESSION['root_url'].'index.php?err=1');
		}


	}

	/* if user isn't connected then show connecting form */
        if ((!isset($_SESSION['connected'])) || ($_SESSION['connected'] == 0))
        {
		echo('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<meta http-equiv="imagetoolbar" content="no" />
				<link rel="icon" href="favicon.ico" type="image/x-icon" />
				<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
				<link rel="stylesheet" href="css/main.css" type="text/css" />
				<link rel="stylesheet" href="css/jquery.tooltip.css" type="text/css" />
				<!--[if IE]>
					<link rel="stylesheet" href="css/ie.css" type="text/css" />
				<![endif]-->
				<script type="text/javascript" src="js/jquery.js"></script>
				<script type="text/javascript" src="js/ajax.js"></script>
				<script type="text/javascript" src="js/helpingsystem/jquery/lib/jquery.js"></script>
				<script type="text/javascript" src="js/helpingsystem/jquery/lib/jquery.bgiframe.js"></script>
				<script type="text/javascript" src="js/helpingsystem/jquery/lib/jquery.dimensions.js"></script>
				<script type="text/javascript" src="js/helpingsystem/script.js"></script>
				<script type="text/javascript" src="js/helpingsystem/jquery/jquery.tooltip.js"></script>
				<script type="text/javascript" src="js/helpingsystem/animation.js"></script>
				<script type="text/javascript" src="js/mail_system.js"></script>
				<title>CS Management System</title>
			</head>
		<body>
			<div id="wrapper">
					<div id="fixed-column">
					</div>
					<div id="dynamic-column">
						<div id="backbar">

						</div>
						<div id="toolbar">

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
		                                                                        echo "The username or password you entered is incorrect.";
		                                                                        break;
		                                                                case 2:
		                                                                        echo "Your session has expired. Please login again.";
		                                                                        break;
		                                                                case 99:
		                                                                        echo "Error establishing connection to database.";
		                                                                        break;
										case 'authors':
											echo "Inventive software 2009: Steven Clark, Thomas Clulow, Nicolas-Olivier De La Cruz, Alexander R. MacDonald, Lachlan Malone, Jonas Termeau, Dean Thomson";
											echo "2020 Refactor: Dylan Forrest, Tommy Lamb";
											break;
		                                                        }
	                                                	}
							echo('</div>
							<form id="login-form" action="" method="POST">
								<div>
									<h2>Username:</h2>
									<input class="username-field" type="text" name="username" value="" size="30" maxlength="30" /><br />
									<h2>Password:</h2>
									<input class="password-field" type="password" name="password" value="" size="30" maxlength="30" /><br />
									<input class="login-button" type="submit" name="Button" value="Login"/>
									<br/>
								</div>
							</form>
						</div>
					</div>');
		include_once('php/ui-layout/footer.inc');
        }
        else
        {
                header("location:".$_SESSION['root_url']."php/modules/staff-members");
        }
?>
