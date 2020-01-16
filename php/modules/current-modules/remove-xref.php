<?php 
	require_once('controller.php');
        include_once('../../core/protect.php');
	
	/* Call function from controller.php and pass id variable */
	remove_module_xref($_GET["staffid"],$_GET["moduleid"]);
	
	/* Notify affected staff members */
	notify_module($_GET['staffid'],$_GET['moduleid'],"UNASSIGNING:  ");
	
	/* On succesful transaction, attempt to redirect to main page */
	echo "
		<script language=javascript>
			setTimeout(\"location.href='edit.php?id=".$_GET["moduleid"]."'\",[0]);
		</script>
		<noscript>
			Everything worked out great! <a href=\"edit.php?id=".$_GET["moduleid"].">Click here to see the results.</a>
		</noscript>
	";
?>
