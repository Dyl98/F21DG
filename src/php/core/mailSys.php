<?php
	session_start();
        include_once('protect.php');

	include_once("engine.php");

	if ($_SESSION['mailSysBlocked'] == "True")
	{
		$sql_connection = new CMySQL();
	       	$res = $sql_connection->get_data("UPDATE users SET mail_notify_enabled = 1 WHERE userid = ".$_SESSION['userid'].";");

		$_SESSION['mailSysBlocked'] = "False";

	} else {
		$sql_connection = new CMySQL();
	       	$res = $sql_connection->get_data("UPDATE users SET mail_notify_enabled = 0 WHERE userid = ".$_SESSION['userid'].";");

		$_SESSION['mailSysBlocked'] = "True";
	}
	
	echo '<script type="text/javascript" src="js/mail_system.js">';
	echo 'setMailSystemState("'.$_SESSION['mailSysBlocked'].'");';
	echo '</script>';

?>
