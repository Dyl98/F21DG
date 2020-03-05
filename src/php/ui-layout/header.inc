<?php

     	session_start();
        include_once('protect.php');

	include_once("engine.php");

        if (!isset($_SESSION['helpSysBlocked']))
        {
                $sql_connection = new mySQLi_helper();

                $res = $sql_connection->query_database("SELECT users.helpsys_enabled FROM users WHERE userid = ".$_SESSION['userid'].";");

                if ($res[0][helpsys_enabled] == '1')
                {
                        $_SESSION['helpSysBlocked'] = "False";
                }
                else
           	{
                        $_SESSION['helpSysBlocked'] = "True";
                }
        }

        if (!isset($_SESSION['mailSysBlocked']))
        {
                $sql_connection = new mySQLi_helper();

                $res = $sql_connection->query_database("SELECT users.mail_notify_enabled FROM users WHERE userid = ".$_SESSION['userid'].";");

                if ($res[0][mail_notify_enabled] == '1')
                {
                        $_SESSION['mailSysBlocked'] = "False";
                }
                else
           	{
                        $_SESSION['mailSysBlocked'] = "True";
                }
        }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<link rel="icon" href="../../../favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="../../../css/main.css" type="text/css" />
	<link rel="stylesheet" href="../../../css/jquery.tooltip.css" type="text/css" />
	<link rel="stylesheet" href="../../../css/print.css" type="text/css" media="print" />
	<!--[if IE]>
		<link rel="stylesheet" href="../../../css/ie.css" type="text/css" />
	<![endif]-->
	<script type="text/javascript" src="../../../js/jquery.min.js"></script>
	<script type="text/javascript" src="../../../js/ajax.js"></script>
    <script type="text/javascript" src="../../../js/helpingsystem/jquery/lib/jquery.js"></script>
    <script type="text/javascript" src="../../../js/helpingsystem/jquery/lib/jquery.bgiframe.js"></script>
    <script type="text/javascript" src="../../../js/helpingsystem/jquery/lib/jquery.dimensions.js"></script>
    <script type="text/javascript" src="../../../js/helpingsystem/script.js"></script>
    <script type="text/javascript" src="../../../js/helpingsystem/jquery/jquery.tooltip.js"></script>
    <script type="text/javascript" src="../../../js/helpingsystem/animation.js"></script>
    <script type="text/javascript" src="../../../js/mail_system.js"></script>
	<title>CS Management System</title>
</head>
<body>
	<div id="wrapper">
		<div id="fixed-column">
			<?php include_once('sidebar.inc.php'); ?>
		</div>
