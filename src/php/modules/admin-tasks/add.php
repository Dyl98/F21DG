<?php
	session_start();

        include_once('../../core/protect.php');

	require_once('controller.php');
	$active = 'admin-tasks';
	include_once('../../ui-layout/header.inc');
	include_once('add.inc.php');
	include_once('../../ui-layout/footer.inc');
?>
