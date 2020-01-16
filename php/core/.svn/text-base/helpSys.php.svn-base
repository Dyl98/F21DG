<?php
	session_start();
        include_once('protect.php');

	include_once("engine.php");

	if ($_SESSION['helpSysBlocked'] == "True")
	{
		$sql_connection = new CMySQL();
	       	$res = $sql_connection->get_data("UPDATE users SET helpsys_enabled = 1 WHERE userid = ".$_SESSION['userid'].";");

		$_SESSION['helpSysBlocked'] = "False";

	} else {
		$sql_connection = new CMySQL();
	       	$res = $sql_connection->get_data("UPDATE users SET helpsys_enabled = 0 WHERE userid = ".$_SESSION['userid'].";");

		$_SESSION['helpSysBlocked'] = "True";
	}
	
	echo '<script type="text/javascript" src="js/helpingsystem/script.js">';
	echo 'setSystemState("'.$_SESSION['helpSysBlocked'].'");';
	echo '</script>';

?>
