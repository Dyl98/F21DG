<?php
        session_start();
        include_once('../../core/protect.php');

	require_once('controller.php');
	$active = 'staff-members';
	include_once('../../ui-layout/header.inc');
	include_once('edit.inc.php');
	include_once('../../ui-layout/footer.inc');
?>
