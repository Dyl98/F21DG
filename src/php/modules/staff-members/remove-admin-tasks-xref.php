<?php
	require_once('controller.php');
	require_once('../../core/engine.php')
        include_once('../../core/protect.php');

	/* Call function from engine.php and pass id variable */
	delete_staff_assignment($_GET["staffid"],$_GET["adminid"]);

	/* Notify affected staff members */
	notify_task($_GET['staffid'],$_GET['adminid'],"UNASSIGNING:  ");

	/* On succesful transaction, attempt to redirect to main page */
	echo "
		<script language=javascript>
			setTimeout(\"location.href='edit.php?id=".$_GET["staffid"]."'\",[0]);
		</script>
		<noscript>
			Everything worked out great! <a href=\"edit.php?id=".$_GET["staffid"].">Click here to see the results.</a>
		</noscript>
	";
?>
